<?php

/*
 Template Name: Market-Reports-Template
 */

get_header();

?>
<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="our-video-page market-reports-page page-content">
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
            <div class="one-col-page-holder with-videos">

                <div id="lds-ellipsis-holder" class="lds-ellipsis-holder">
                    <div class="lds-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>

                <?php
                //query front page videos
                $the_query = new WP_Query(
                    array(
                        'post_type' => 'Our_videos',
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'paged' => $paged,
                        //Filter taxonomies by terms
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'classification',
                                'terms' => 'market-reports-videos',
                                'field' => 'slug'
                            )
                        )
                    )
                );

                if ($the_query->have_posts()) : ?>
                    <!-- the loop -->
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php
                        $ID = get_the_id();
                        $video_title = get_the_title();
                        $video_content = get_field('content', $ID);
                        $video_id = get_field('video_id',  $ID);
                        $start_second = get_field('start_second', $ID);
                        $end_seconds = get_field('end_seconds', $ID);
                        $start_second = get_field('start_second', $ID);
                        $suggested_video_quality = get_field('suggested_video_quality', $ID);

                        /*
                        echo 'ID=' . $ID . '<br>';
                        echo 'video_title=' . substrwords($video_title, 30) . '<br>';
                        echo 'start_second=' . $start_second . '<br>';
                        echo 'end_seconds=' . $end_seconds . '<br>';
                        echo 'suggested_video_quality=' . $suggested_video_quality . '<br>';
                        */

                        ?>
                        <div class="page-holder-inner one-col-inner video-body video-id-'<?php echo $ID; ?>">
                            <div class="o-video" data-aos="fade-up">
                                <iframe src="https://www.youtube.com/embed/<?php echo  $video_id; ?>" allowfullscreen></iframe>
                            </div>
                            <div data-aos="fade-up">
                                <h2 class="title"><?php echo $video_title; ?></h2>
                                <?php echo wpautop($video_content);  ?>
                            </div>
                        </div>

                    <?php endwhile; ?>
                    <!-- end of the loop -->
 

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

                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>


































            </div>
        </div>
        </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php
get_footer();
