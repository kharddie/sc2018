<?php

/*
 Template Name: Earned-Media-Template
 */

get_header();
$post_id = filter_input(INPUT_GET, 'pid');

$hold_content_array = array();

function check($number)
{
    $whichLoop;
    if ($number % 2 == 0) {
        $whichLoop = "Even";
    } else {
        $whichLoop =  "Odd";
    }
    return $whichLoop;
}



?>
<section id="primary" class="content-area earned-media-page">
    <main id="main" class="site-main">
        <div class="media-page page-content">
            <div class="media-page-header single-page-header">
                <div class="page_title"><?php echo get_the_title(); ?></div>
                <div class="page-header-fade"></div>
                <div class="page-header-fade"></div>
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                } ?>
            </div>
            <div class="page-holder all-page-holder" style="margin:0%!important;">
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

                <?php

                $args = array(
                    'post_type' => 'earnedmedia',
                    'post_status' => 'publish',
                    'meta_key' => 'date_published', 
                    'paged' => $paged,
                    'orderby' => 'meta_value date_published',
                    'order'   => 'DESC',
                  // 'posts_per_page' => -1
                );

                // the query
                $the_query = new WP_Query($args); ?>
                <?php if ($the_query->have_posts()) : ?>
                <!-- pagination here -->

                <!-- the loop -->
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php
                                $ID = get_the_id();
                                $post_title = get_the_title();
                                $post_date = get_the_date( 'l F j, Y' );

                                $date_published = get_field('date_published', $ID);
                                $article_link_url = get_field('article_link_url', $ID);
                                $excerpt_copy = get_field('excerpt_copy', $ID);

                                // echo "$date_published=".$date_published. "<br>";
                                // echo "$article_link_url=".$article_link_url. "<br>";

                                //images
                                $imageIds = get_field('photo_gallery', $ID);
                                //	echo "$imageIds=".$imageIds. "<br>";

                                $arr = explode(",", $imageIds); //prints an array of numbers

                                foreach ($arr as $id) {
                                    $img = wp_get_attachment_image_src($id, 'large');
                                    //  echo "<img src=\"$img[0]\" width=\"$img[1]\" height=\"$img[2]\">\n";
                                }
                                /* grab the url for the full size featured image */
                                $featured_img_url = get_the_post_thumbnail_url($ID, 'property-listings-preview');
                                //	echo "%%%%%%%%%".$featured_img_url;
                                ?>
                <div class="page-holder-inner" data-aos="fade-up">
                    <div class="page-holder-inner-media-img-holder"
                        style="background-image: url(<?php echo $featured_img_url; ?>);">
                        <img style="display:none" src="<?php echo $featured_img_url; ?> " />
                    </div>
                    <div class="preview-content">
                        <h2><?php echo limit_text($post_title, 10); ?> </h2>
                        <!-- <div class="show-date"> <?php echo date('F j, Y', strtotime($post_date)); ?></div>-->
                        <div class="show-date"> <?php echo $date_published; ?></div>
                        <div class="epl-excerpt-content"><p><?php echo limit_text($excerpt_copy, 20); ?> </p></div>
                        <div class="small-btn">
                            <a target="_blank" href="<?php echo $article_link_url; ?>" class="btn white">READ
                                MORE</a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <!-- end of the loop -->
            </div>

            <!-- pagination here -->
            <div class="pagination">
                    <?php
                        $translated = __('Page', 'mytextdomain'); // Supply translatable string
                        echo paginate_links(array(
                            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                            'total'        => $the_query->max_num_pages,
                            'current'      => max(1, get_query_var('paged')),
                            'format'       => '?paged=%#%',
                            'show_all'     => false,
                            'type'         => 'plain',
                            'end_size'     => 2,
                            'mid_size'     => 1,
                            'prev_next'    => true,
                            'prev_text'    => sprintf('<i></i> %1$s', __('Previous Page', 'text-domain')),
                            'next_text'    => sprintf('%1$s <i></i>', __('Next page', 'text-domain')),
                            'add_args'     => false,
                            'add_fragment' => '',
                            'before_page_number' => '<span class="screen-reader-text">' . $translated . ' </span>',
                        ));
                        ?>
                </div>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>

    </main><!-- .site-main -->
</section><!-- .content-area -->



<?php
get_footer();