<?php

/*
 Template Name: Our-People-Template
 */

get_header();
$post_id = filter_input(INPUT_GET, 'pid');





?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="our-people-page page-content">


            <?php if (empty($post_id)) {
                ?>

                <div class="our-people-page-header  single-page-header">
                    <div class="page_title"><?php echo get_the_title(); ?></div>
                    <div class="page-header-fade"></div>
                    <?php
                        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                            the_post_thumbnail('full');
                        }
                        ?>
                </div>

            <?php
            } else {
                ?><div class="holder-div" style="height:60px;width:100%;"></div><?php
                                                                                }


                                                                                ?>
            <div class="our-people-page-holder all-page-holder">
                <div class="our-people-page">
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



                <?php
                if (empty($post_id)) {
                    ?>

                    <div class="our-people-page-staff-holder">

                        <?php
                            $qry = $wpdb->get_results("select ID, post_title from $wpdb->posts where post_type='staff' and post_status='publish' order by menu_order asc");
                            foreach ($qry as $row) {
                                $first_name = get_field('first_name', $row->ID);
                                $last_name = get_field('last_name', $row->ID);
                                $content = get_field('content', $row->ID);
                                $email = get_field('email', $row->ID);
                                $phone = get_field('phone', $row->ID);
                                $position = strtoupper(get_field('position', $row->ID));
                                $photo = get_field('photo', $row->ID);
                                $show_staff_bio = get_field('show_staff_bio', $row->ID);
                                $photoUrl = $photo['sizes']['medium_large'];

                                /*
							echo $first_name . "<br>";
							echo $last_name . "<br>";
							echo $content . "<br>";
							echo $phone . "<br>";
							echo $position . "<br>";
							print_r($photo) . "<br>";
							echo $photoUrl . "<br>";
                            */

                                //echo $show_staff_bio . "<br>";

                                //SHOW BIO
                                if ($show_staff_bio == "Yes") {
                                    $display_bio = '<a href="' . site_url() . '/our-people/?pid=' .  $row->ID . '" class="img-hover-zoom img-hover-zoom--basic" style="display:block;"><img class="dont-lazy-load" src="' . $photoUrl . '"/></a>';
                                } else {
                                    $display_bio = '<a class="img-hover-zoom img-hover-zoom--basic" style="display:block;cursor: auto;"><img class="dont-lazy-load" src="' . $photoUrl . '" /></a>';
                                }
                                ?>
                            <div class="our-people" data-aos="fade-up">
                                <span class="d-photo">
                                    <?php echo $display_bio; ?>
                                </span>
                                <span class="p-name">
                                    <?php echo $first_name . " " . $last_name . " - " .  ucfirst($position); ?>
                                </span>
                            </div>


                        <?php      }  ?>
                    </div>
                    <?php
                    }
                    if (!empty($post_id)) {
                        global $wpdb;
                        $post_exists = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE id = '" . $post_id . "'", 'ARRAY_A');
                        if ($post_exists) {
                            //echo "post exists. <br> ";
                            $mypost = get_post($post_id);

                            $first_name = get_field('first_name', $post_id);
                            $last_name = get_field('last_name', $post_id);
                            $content = get_field('post_content', $post_id);
                            $email = get_field('email', $post_id);
                            $phone = get_field('phone', $post_id);
                            $position = get_field('position', $post_id);
                            $linkedin = get_field('linkedin', $post_id);
                            $fullImageArray = get_field('photo', $post_id);
                            $fullImageUrlImageSize = 'medium_large';
                            $fullImageUrl = $fullImageArray['sizes'][$fullImageUrlImageSize];

                            ?>
                        <div class="our-people-page-detailed-flex-holder">
                            <div class="our-people-page-detailed-flex">
                                <div class="our-people-page-detailed-left">
                                    <span class="d-photo display-desktop">
                                        <span style="display:flex;">
                                            <img src="<?php echo $fullImageUrl; ?>">
                                        </span>
                                    </span>
                                    <span class="phone-email">
                                        <span class="phone-holder">
                                            <a href="tel:<?php echo $phone; ?>">
                                                Phone: <?php echo phone_number_format($phone); ?>
                                            </a>
                                        </span>
                                        <span class="email-holder">
                                            <a href="mailto:<?php echo $email; ?>">
                                                Email: <?php echo $email; ?>
                                            </a>
                                        </span>
                                    </span>
                                    <?php
                                            if ($linkedin) {
                                                ?>
                                        <span class="LinkedIn">
                                            <a target="_blank" href="https://www.linkedin.com/in/<?php echo $linkedin; ?>">
                                                Connect with
                                                <?php echo ucwords(strtolower($first_name)) . " " . ucwords(strtolower($last_name)); ?>
                                                on LinkedIn
                                            </a>
                                        </span>
                                    <?php
                                            }
                                            ?>
                                    <div class="btn-group back-to-our-people">
                                        <a href="<?php echo site_url() . '/our-people' ?>" class="btn btn-black">Return to Our
                                            People</a>
                                    </div>

                                </div>
                                <div class="our-people-page-detailed-right">
                                    <span class="name">
                                        <h2><?php echo ucwords(strtolower($first_name)) . " " . ucwords(strtolower($last_name)); ?>
                                        </h2>
                                    </span>
                                    <span class="position">
                                        <h3><?php echo $position; ?> </h3>
                                    </span>

                                    <span class="d-photo display-mobile" style="display:none">
                                        <span style="display:flex;">
                                            <img src="<?php echo $fullImageUrl; ?>">
                                        </span>
                                    </span>

                                    <?php echo apply_filters('the_content', $mypost->post_content); ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        } else {
                            ?>
                        <div class="our-people-page-detailed-flex-holder">
                            <div class="our-people-page-detailed-error" style="flex-flow:column;">
                                <div>
                                    <p>Error no content to display<br></p>
                                </div>
                                <div class="btn-group back-to-our-people">
                                    <a href="<?php echo site_url() . '/our-people' ?>" class="btn btn-black">Return to Our
                                        People</a>
                                </div>
                                <br>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php
get_footer();
