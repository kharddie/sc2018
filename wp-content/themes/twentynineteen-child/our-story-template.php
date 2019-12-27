<?php

/*
 Template Name: Our-History-Template
 */

get_header();
$post_id = filter_input(INPUT_GET, 'pid');
?>
<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="our-people-page page-content">
            <div class="our-history-page-header single-page-header"><div class="page_title"><?php echo get_the_title(); ?></div>
            <div class="page-header-fade"></div>
                <?php
                if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail('full');
                }
                ?>
            </div>
            <div class="page-holder all-page-holder">
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
        </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php
get_footer();
