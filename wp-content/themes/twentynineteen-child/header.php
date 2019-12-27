<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=0" /> -->
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
    <link href="<?php echo get_home_url(); ?>/wp-content/themes/twentynineteen-child/style-dev.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <?php $postid = $post->ID; ?>
    <style>
        <?php echo '.post-id-' . $postid . ' '; ?>.main-navigation .main-menu>li>a {
            /* color: rgba(255,255,255,.7) !important;*/
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="overlay-loading">
        <div id="overlay-inner">

            <svg id="loading-spinner" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                <g fill="none">
                    <path id="track" fill="#C6CCD2" d="M24,48 C10.745166,48 0,37.254834 0,24 C0,10.745166 10.745166,0 24,0 C37.254834,0 48,10.745166 48,24 C48,37.254834 37.254834,48 24,48 Z M24,44 C35.045695,44 44,35.045695 44,24 C44,12.954305 35.045695,4 24,4 C12.954305,4 4,12.954305 4,24 C4,35.045695 12.954305,44 24,44 Z" />
                    <path id="section" fill="#3F4850" d="M24,0 C37.254834,0 48,10.745166 48,24 L44,24 C44,12.954305 35.045695,4 24,4 L24,0 Z" />
                </g>
            </svg>
        </div>
    </div>

    <section class="contact-form-overlay">
        <div class="contact-form-overlay-inner">
            <a class="overlay-close">×</a>
            <div class="contact-form-overlay-wrapper">
                <div class="container">
                    <h2 class="pull-title"><span></span></h2>
                    <div class="contact-block-flex">
                        <div class="contact-block">
                            <h3 style="margin-bottom: 10px;"><span>Contact Details</span></h3><span>CONTACT SIMON
                                CAULFIELD</span>
                            <div class="description"><a href="0437 935 912">0437 935 912</a><br><a href="mailto:sc@eplace.com.au">sc@eplace.com.au</a>
                            </div>
                            <div class="description"><a target="_blank" href="https://goo.gl/maps/8pDwX14UqPvjmye2A"> 291 Shafston Ave, <br>Kangaroo Point Qld 4169<br>Australia</a></div>
                            <hr>

                        </div>
                        <div class="form-block">
                            <h3 class="contact-form-heading">Online Inquiry</h3>
                            <div id="contactForm">
                                <div class="online-inquiry-form">
                                    <?php echo do_shortcode('[contact-form-7 id="5" title="Online inquiry"]'); ?>
                                </div>
                                <div class="development-form">
                                    <?php echo do_shortcode('[contact-form-7 id="5438" title="development form"]'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="page" class="site <?php echo ' post-id-' . $postid . ' '; ?>">
        <div class="site-inner">
            <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'twentynineteen'); ?></a>
            <header id="masthead" class="hide-before-load <?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">

                <nav id="site-navigation" style="display:none" class="main-navigation custom-menu" aria-label="<?php esc_attr_e('Top Menu', 'twentynineteen'); ?>">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_class' => 'main-menu',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        )
                    );
                    ?>
                </nav><!-- #site-navigation -->

                <div class="site-branding-container">
                    <a class="logo-holder xxx" href="<?php echo get_site_url(); ?>"></a>
                    <?php get_template_part('template-parts/header/site', 'branding'); ?>
                </div><!-- .site-branding-container -->
                <div id="progress-bar">
                    <div class="bar"></div>
                </div>

            </header><!-- #masthead -->

            <div id="content" class="site-content hide-before-load">