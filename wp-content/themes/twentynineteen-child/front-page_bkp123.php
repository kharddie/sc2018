<?php

/**
 * front page template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="home-page">
            <div class="video-wrapper"><video class="video-bg" style="height:auto" id="bgvid" loop="" muted=""
                    autoplay="">
                    <source
                        src="https://res.cloudinary.com/luxuryp/video/upload/v1568050353/Hilton_and_Hyland_15_second_kkzd5g.mp4"
                        type="video/mp4">
                </video>
            </div>

            <div class="home-page-inner" style="display:block">
                <div class="home-page-top">
                    <div class="home-logo">
                        <img
                            src="http://thedigitaltree.com.au/a/simoncaulfield/wp-content/uploads/2019/09/cs-logo-full.svg" />
                    </div>
                    <div class="home-content">
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
                    <div class="home-btn">
                        <a href="<?php echo site_url();?>/sales/" class="btn white">VIEW EXCLUSIVE HOMES</a>
                    </div>
                </div>
                <div class="home-page-lower">
				<?php echo do_shortcode('[FeaturedListings]'); ?>				
                </div>
            </div>
        </div>

        <div class="home-page-lower mobile-display" style="display:none;">
            <?php echo do_shortcode('[FeaturedListings]'); ?>
        </div>

    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php
get_footer();