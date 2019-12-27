<?php

/*
Template Name: Development-Template
 */

get_header();
$post_cat = filter_input(INPUT_GET, 'sortby');

$hold_content_array = array();

?>
<section id="primary" class="content-area dev-page">
    <main id="main" class="site-main">
        <div class="media-page page-content">
            <div class="media-page-header single-page-header">
                <div class="page_title"><?php echo get_the_title(); ?></div>
                <div class="page-header-fade"></div>
                <div class="page-header-fade"></div>
                <?php if (has_post_thumbnail()) {
    the_post_thumbnail('full');
}?>
            </div>
            <div class="page-holder all-page-holder">

                <?php
$terms = get_terms(array(
    'taxonomy' => 'status',
    'hide_empty' => false,
));
//print_r($terms);
?>



                <div class="page-holder-inner-media-flex">
                    <?php
if (have_posts()) {
    // Load posts loop.
    while (have_posts()) {
        the_post();
        //get_template_part( 'template-parts/content/content' );
        the_content();
    }

    // Previous/next page navigation.
    twentynineteen_the_posts_navigation();
} else {

    // If no content, include the "No posts found" template.
    get_template_part('template-parts/content/content', 'none');
}
?>
                </div>

                <div class="two-col-page-holder">
                    <div class="epl-loop-tools epl-loop-tools-switch-sort epl-switching-sorting-wrap"
                        style="width: 100% !important;margin: 0!important;">
                        <div class="epl-loop-tool epl-tool-sorting epl-properties-sorting epl-clearfix">
                            <select id="epl-sort-listings">
                                <option selected="selected" value=""> Sort </option>
                                <?php
foreach ($terms as $cat):
?>
                                <option value="<?php echo $cat->slug ?>"><?php echo $cat->name; ?></option>
                                <?php
endforeach;
?>
                            </select>
                        </div>
                    </div>

                    <?php
//Protect against arbitrary paged values
$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

$tax_query = array(
    'relation' => 'AND',
);

if (empty($post_cat)) {
    if (isset($search_course_area)) {
        $tax_query[] = array(
            'taxonomy' => 'status',
        );
    }
} else if ($post_cat == "sold") {
    $tax_query[] = array(
        'taxonomy' => 'status',
        'terms' => 'sold',
        'field' => 'slug',
    );
} 


else if ($post_cat == "under-construction") {
    $tax_query[] = array(
        'taxonomy' => 'status',
        'terms' => 'under-construction',
        'field' => 'slug',
    );
} 

else if ($post_cat == "build") {
    $tax_query[] = array(
        'taxonomy' => 'status',
        'terms' => 'build',
        'field' => 'slug',
    );
} 


else if ($post_cat == "coming-soon") {
    $tax_query[] = array(
        'taxonomy' => 'status',
        'terms' => 'coming-soon',
        'field' => 'slug',
    );
} 



else {
    $tax_query[] = array(
        'taxonomy' => 'status',
        'terms' => 'sold',
        'field' => 'slug',
    );
}

// the query
//print_r($tax_query);
$the_query = new WP_Query(
    array(
        'post_type' => 'developments',
        'post_status' => 'publish',
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC',
        //Filter taxonomies by terms
        'tax_query' => $tax_query,
    )
);

if ($the_query->have_posts()): ?>
                    <!-- pagination here -->

                    <!-- the loop -->
                    <?php while ($the_query->have_posts()): $the_query->the_post();?>
                    <?php
    $ID = get_the_id();
    $post_title = get_the_title();
    $post_date = get_the_date('l F j, Y');

    $site_address = get_field('site_address', $ID);
    $development_website_url = get_field('website_of_the_development', $ID);
    $suburb = get_field('suburb', $ID);
    $description = get_field('description', $ID);
    $website_of_the_development = get_field('website_of_the_development', $ID);
    $development_logo = get_field('development_logo', $ID);

    //echo "$site_address =" . $site_address . "<br>";

    // echo "$date_published=".$date_published. "<br>";
    // echo "$article_link_url=".$article_link_url. "<br>";

    //images
    $imageIds = get_field('photo_gallery', $ID);
    //    echo "$imageIds=".$imageIds. "<br>";

    $arr = explode(",", $imageIds); //prints an array of numbers

    foreach ($arr as $id) {
        $img = wp_get_attachment_image_src($id, 'large');
        //  echo "<img src=\"$img[0]\" width=\"$img[1]\" height=\"$img[2]\">\n";
    }
    /* grab the url for the full size featured image */
    $featured_img_url = get_the_post_thumbnail_url($ID, 'property-listings-preview');
    //    echo "%%%%%%%%%".$featured_img_url;
    ?>

                    <div class="page-holder-inner" data-aos="fade-up">
                        <div class="page-holder-inner-media-img-holder"
                            style="background-image: url(<?php echo $featured_img_url; ?>);">
                            <img style="display:none" src="<?php echo $featured_img_url; ?> " />
                        </div>
                        <div class="preview-content">
                            <h2><?php echo limit_text($post_title, 10); ?><br><span><?php echo $suburb; ?></span></h2>
                            <div class="show-address"> <?php echo $site_address . " " . $suburb; ?></div>
                            <p><?php echo limit_text($description, 20); ?> </p>
                            <div class="small-btn">
                                <?php if ($development_website_url != '') {
        echo '<a target="_blank" href="' . $development_website_url . '" class="btn white">VIEW SITE</a>';
    }?>
                                <a href="#" data-name="<?php echo limit_text($post_title, 10); ?>"
                                    data-suburb="<?php echo $suburb; ?>" class="btn white register-form">REGISTER</a>
                            </div>
                        </div>
                    </div>

                    <?php endwhile;?>
                    <!-- end of the loop -->
                </div>

                <!-- pagination here -->
                <div class="pagination">
                    <?php
$translated = __('Page', 'mytextdomain'); // Supply translatable string
echo paginate_links(array(
    'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
    'total' => $the_query->max_num_pages,
    'current' => max(1, get_query_var('paged')),
    'format' => '?paged=%#%',
    'show_all' => false,
    'type' => 'plain',
    'end_size' => 2,
    'mid_size' => 1,
    'prev_next' => true,
    'prev_text' => sprintf('<i></i> %1$s', __('Previous Page', 'text-domain')),
    'next_text' => sprintf('%1$s <i></i>', __('Next page', 'text-domain')),
    'add_args' => false,
    'add_fragment' => '',
    'before_page_number' => '<span class="screen-reader-text">' . $translated . ' </span>',
));
?>
                </div>
                <?php wp_reset_postdata();?>
                <?php else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.');?></p>
                <?php endif;?>

            </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->





<script>
jQuery(document).ready(function() {
    jQuery(".epl-sort-listings option[value=2]").attr('selected', 'selected'); 
    function changeListing() {
        var str = location.href;
        if (str.indexOf("sold") > -1) {
            var optionToSelect = "sold";
            jQuery("#epl-sort-listings").val(optionToSelect);
            jQuery("#epl-sort-listings option[value=3]").attr('selected', 'selected'); 
        }
        if (str.indexOf("coming-soon") > -1) {
            var optionToSelect = "coming-soon";
            jQuery("#epl-sort-listings").val(optionToSelect);
            jQuery("#epl-sort-listings option[value=3]").attr('selected', 'selected'); 
        }
        if (str.indexOf("under-construction") > -1) {
            var optionToSelect = "under-construction";
            jQuery("#epl-sort-listings").val(optionToSelect);
            jQuery("#epl-sort-listings option[value=4]").attr('selected', 'selected'); 
        }
    }

    changeListing();

    jQuery(".epl-sort-listings").change(function() {
        changeListing();
    });

})
</script>
<?php
get_footer();