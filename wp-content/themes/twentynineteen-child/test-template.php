<?php

/*
 Template Name: Test-Template
 */
get_header();
$post_id = filter_input(INPUT_GET, 'pid');

?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="our-video-page page-content">
            <div class="our-video-page-header single-page-header">
                <div class="page-header-fade"></div>
                <div class="page_title"><?php echo get_the_title(); ?></div>
                <div class="page-header-fade"></div>
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                } ?>
            </div>



            <div class="page-holder">
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


            <div class="one-col-page-holder">

                <div class="lds-ellipsis-holder">
                    <div class="lds-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>

                <?php
                $args = array(
                    'post_type' => 'our_videos',
                    'post_status' => 'publish',
                    'paged' => $paged,
                    'orderby' => 'meta_value date_published',
                    'order'   => 'DESC',
                    //'posts_per_page' =>6
                );
                // the query
                $the_query = new WP_Query($args);
                //$total = $the_query->found_posts;
                echo $total;
                ?>



                <?php if ($the_query->have_posts()) : ?>
                    <!-- the loop -->

                    <?php
                        $i = 0;
                        while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php
                                $i++;
                                $ID = get_the_id();
                                $post_title = get_the_title();
                                $featured_video = get_field('featured_video', $ID);
                                $video_id = get_field('video_id', $ID);
                                $video_title = get_field('video_title', $ID);
                                $start_second = get_field('start_second', $ID);
                                $end_seconds = get_field('end_seconds', $ID);
                                $start_second = get_field('start_second', $ID);
                                $video_content = get_field('content', $ID);
                                $suggested_video_quality = get_field('suggested_video_quality', $ID);

                                ?>
                        <div class="page-holder-inner one-col-inner video-body <?php echo '  video-id-' . $ID; ?>">
                            <div class="o-video" data-aos="fade-up">
                                <iframe src="https://www.youtube.com/embed/<?php echo $video_id; ?>" allowfullscreen></iframe>
                            </div>
                            <div data-aos="fade-up">
                                <h2 class="title"><?php echo $video_title; ?></h2>
                                <?php echo wpautop($video_content);  ?>
                            </div>
                        </div>
                        <?php
                                /*
                                echo "----" . $the_query->current_post;if ($total == ($the_query->current_post) + 1) { echo "doneeeeeeeeee";}
                                */

                                ?>

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

        </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->
<?php
get_footer();
