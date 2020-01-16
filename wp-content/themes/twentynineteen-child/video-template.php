<?php

/*
 Template Name: Video-Template
 */
get_header();

$terms = get_terms(array(
    'taxonomy' => 'classification',
    'hide_empty' => false,
));

//print_r($terms);

$term_id = filter_input(INPUT_GET, 'sortby');

$terms_holder_array = array();

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


            <div class="one-col-page-holder with-videos">

                <div id="lds-ellipsis-holder" class="lds-ellipsis-holder">
                    <div class="lds-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>

                <div class="epl-loop-tools epl-loop-tools-switch-sort epl-switching-sorting-wrap" style="width: 100% !important;margin: 0!important;">
                    <div class="epl-loop-tool epl-tool-sorting epl-properties-sorting epl-clearfix">
                        <select id="epl-sort-listings">
                            <option selected="selected" value=""> Sort </option>
                            <option value="all-videos">All videos</option>
                            <?php
                            foreach ($terms as $cat) :
                                array_push($terms_holder_array, $cat->slug);
                            ?>
                             <option value="<?php echo $cat->term_id ?>"><?php echo $cat->name; ?></option>
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


                if (empty($term_id)) {
                    $tax_query[] = array(
                        'taxonomy' => 'classification',
                        'terms' => $terms_holder_array,
                        'field' => 'slug',
                    );
                ?>
                    <script>
                        var term_id = -1;
                        console.log("term_id=" + term_id);
                    </script>
                <?php
                } else {
                    $tax_query[] = array(
                        'taxonomy' => 'classification',
                        'terms' => $term_id,
                        'field' => 'term_id',
                    );
                ?>
                    <script>
                        var term_id = <?php echo $term_id; ?>;
                        console.log("term_id=" + term_id);
                    </script>
                <?php
                }


                $args = array(
                    'post_type' => 'our_videos',
                    'paged' => $paged,
                    'orderby' => 'meta_value date_published',
                    'order' => 'ASC',
                    'tax_query' => $tax_query,
                    //'posts_per_page' => 6
                );

                // the query
                $the_query = new WP_Query($args);
                $num = $the_query->post_count;
                //echo "totalposts=" . $num;
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

                        //echo $i;
                        if ($i == $num) {
                        ?>
                            <script>
                                jQuery("#lds-ellipsis-holder").addClass("hide-loader");
                            </script>
                        <?php
                        }

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

<script>
    jQuery(document).ready(function() {

        function changeListing() {
            if (term_id > 0) {
                jQuery("#epl-sort-listings").val(term_id);
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