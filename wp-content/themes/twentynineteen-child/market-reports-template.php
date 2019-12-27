<?php

/*
 Template Name: Market-Reports-Template
 */

get_header();
$post_id = filter_input(INPUT_GET, 'pid');
?>
<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="market-reports-page page-content">
            <div class="market-reports-page-header single-page-header">
                <div class="page-header-fade"></div>
                <div class="page_title"><?php echo get_the_title(); ?></div><?php if (has_post_thumbnail()) {
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
                       // the_content();
                    }

                    // Previous/next page navigation.
                    twentynineteen_the_posts_navigation();
                } else {

                    // If no content, include the "No posts found" template.
                    get_template_part('template-parts/content/content', 'none');
                }
                ?>

            </div>

            <div class="all-page-holder with-videos">




                <?php





                /* https://simoncaulfieldproperty.com.au/wordpress999/wp-admin/term.php?taxonomy=category&tag_ID=74&post_type=our_videos&wp_http_referer=%2Fwordpress999%2Fwp-admin%2Fedit-tags.php%3Ftaxonomy%3Dcategory%26post_type%3Dour_videos*/






                $the_query = new WP_Query(array(
                    'post_type' => 'our_videos',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => 'market-reports-videos',

                        )
                    ),
                    'posts_per_page' => 10,
                ));

                while ($the_query->have_posts()) : $the_query->the_post();
                    $post_id = get_the_ID();
                    $video_id = get_field('video_id', $post_id);
                    $video_title = get_field('video_title', $post_id);
                    $video_content = get_field('content', $post_id);

                    $start_second = get_field('start_second', $post_id);
                    $end_seconds = get_field('end_seconds', $post_id);
                    $start_second = get_field('start_second', $post_id);

                    $suggested_video_quality = get_field('suggested_video_quality', $post_id);

                    ?>
                    <div class="page-holder-inner one-col-inner video-body ' video-id-'<?php $post_id; ?>">
                        <div class="o-video" data-aos="fade-up">
                            <iframe src="https://www.youtube.com/embed/<?php echo $video_id; ?>" allowfullscreen></iframe>
                        </div>
                        <div data-aos="fade-up">
                            <h2 class="title"><?php echo $video_title; ?></h2>
                            <?php echo wpautop($video_content);  ?>
                        </div>
                    </div>

                <?php endwhile; ?>


            </div>
        </div>














        </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php
get_footer();
