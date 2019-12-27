<?php

/*
 Template Name: Development-Test-Template
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
            <div class="page-holder all-page-holder">
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



                <!-- SELECT * FROM `wp_posts` WHERE post_type='news' and post_status='publish' order by menu_order asc-->
                <div class="two-col-page-holder">


                    <?php
                    if (empty($post_id)) {
                        $loopCount = 1;
                        $qry = $wpdb->get_results("select ID,post_title,post_date from $wpdb->posts where post_type='developments' and post_status='publish' order by menu_order asc");

                        foreach ($qry as $row) {
                            $ID = $row->ID;
                            $post_title = $row->post_title;
                            $post_date = $row->post_date;

                            $site_address = get_field('site_address', $ID);
                            $suburb = get_field('suburb', $ID);
                            $description = get_field('description', $ID);
                            $website_of_the_development = get_field('website_of_the_development', $ID);
                            $development_logo = get_field('development_logo', $ID);

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

                            $temp_array = array(
                                "ID" => $ID,
                                "post_date" => $post_date,
                                "post_title" => $post_title
                            );

                            array_push($hold_content_array, $temp_array);

                            ?>


                            <!--
                            <div class="page-holder-inner">
                                <img src="https://simoncaulfieldproperty.com.au/wordpress999//wp-content/uploads/2019/09/test-2.jpg">
                                <div class="preview-content">
                                    <h2>HEADING TITLE TO BE<br> NO MORE THAN TEN WORDS</h2>
                                    <p>Preview text no more than 20 words. Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                    <div class="small-btn">
                                        <a href="https://simoncaulfieldproperty.com.au/wordpress999/exclusive-homes/" class="btn white">READ MORE</a>
                                    </div>
                                </div>
                            </div>

                        -->



                            <div class="page-holder-inner">
                                <div class="page-holder-inner-media-img-holder" style="background-image: url(<?php echo $featured_img_url; ?>);">
                                    <img style="display:none" src="<?php echo $featured_img_url; ?> " />
                                </div>
                                <div class="preview-content">
                                    <h2><?php echo limit_text($post_title, 10); ?><br><span><?php echo $suburb; ?></span></h2>

                                    <div class="show-address"> <?php echo $site_address . " " . $suburb; ?></div>

                                    <p><?php echo limit_text($description, 20); ?> </p>
                                    <div class="small-btn">

                                        <a href="<?php echo get_site_url() . '/developments-test/?pid=' .  $ID; ?> " class="btn white">VIEW SITE</a>
                                        <a href="#" data-name="<?php echo limit_text($post_title, 10); ?>"  data-suburb="<?php echo $suburb; ?>" class="btn white register-form">REGISTER</a>
                                    </div>
                                </div>
                            </div>


                    <?php
                            //echo "loopCount=".$loopCount."<br>";
                            $loopCount++;
                        }
                    }


                    ?>

                </div>
            </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->



<?php
get_footer();
