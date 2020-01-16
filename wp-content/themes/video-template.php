<?php

/*
 Template Name: Video-Template
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
            <div class="all-page-holder">
            <div class="page-holder-inner one-col-inner video-body">
                    <div class="o-video">
                        <iframe src="https://www.youtube.com/embed/4LnS8X4couw" allowfullscreen></iframe>
                    </div>
                    <div data-aos="fade-up fade-up">
                        <h2>Residence 4/138 Dornoch Terrace | Highgate Hill | SANNA</h2>
                        <p>Lorem GENERATED LOREM IPSUM 5 COPY Icon copy red Lorem ipsum dolor sit amet, consectetur adipieque vitae tempus quam pellentesque nec nam aliquam. Nec ultrices dui sapien eget mi proin sed. Adipiscing at in tellus integer. Nunc non blandit massa enim nec dui nunc. Nunc eget lorem dolor sed viverra ipsum nunc aliquet. Nulla pellentesque dignissim enim sit amet. Sed odio morbi quis commodo. Ante in nibh mauris cursus mattis molestie. Vulputate odiomsan. Viverra vitae congue eu consequat ac felis. Adipiscing bibendum est ultricies integer.um.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nosteu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>


                <div class="page-holder-inner one-col-inner video-body">
                    <div class="o-video fade-up">
                        <iframe src="https://www.youtube.com/embed/122Bxyj9yLM" allowfullscreen></iframe>
                    </div>
                    <div data-aos="fade-up">
                        <h2>Residence 6/110 Main Street Kangaroo Point | YUNGABA</h2>
                        <p>Lorem GENERATED LOREM IPSUM 5 COPY Icon copy red Lorem ipsum dolor sit amet, consectetur adipieque vitae tempus quam pellentesque nec nam aliquam. Nec ultrices dui sapien eget mi proin sed. Adipiscing at in tellus integer. Nunc non blandit massa enim nec dui nunc. Nunc eget lorem dolor sed viverra ipsum nunc aliquet. Nulla pellentesque dignissim enim sit amet. Sed odio morbi quis commodo. Ante in nibh mauris cursus mattis molestie. Vulputate odiomsan. Viverra vitae congue eu consequat ac felis. Adipiscing bibendum est ultricies integer.um.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nosteu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>

                <div class="page-holder-inner one-col-inner video-body">
                    <div class="o-video fade-up">
                        <iframe src="https://www.youtube.com/embed/F64pAPno3XQ" allowfullscreen></iframe>
                    </div>
                    <div data-aos="fade-up">
                        <h2>36 Tennyson Street Bulimba | Architectural entertainer with stunning views</h2>
                        <p>Lorem GENERATED LOREM IPSUM 5 COPY Icon copy red Lorem ipsum dolor sit amet, consectetur adipieque vitae tempus quam pellentesque nec nam aliquam. Nec ultrices dui sapien eget mi proin sed. Adipiscing at in tellus integer. Nunc non blandit massa enim nec dui nunc. Nunc eget lorem dolor sed viverra ipsum nunc aliquet. Nulla pellentesque dignissim enim sit amet. Sed odio morbi quis commodo. Ante in nibh mauris cursus mattis molestie. Vulputate odiomsan. Viverra vitae congue eu consequat ac felis. Adipiscing bibendum est ultricies integer.um.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nosteu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>


                <div class="page-holder-inner one-col-inner video-body">
                    <div class="o-video fade-up">
                        <iframe src="https://www.youtube.com/embed/ZrxJ4-HjFCo" allowfullscreen></iframe>
                    </div>
                    <div data-aos="fade-up">
                        <h2>Billionaire | 924 Bel Air Rd | California</h2>
                        <p>Lorem GENERATED LOREM IPSUM 5 COPY Icon copy red Lorem ipsum dolor sit amet, consectetur adipieque vitae tempus quam pellentesque nec nam aliquam. Nec ultrices dui sapien eget mi proin sed. Adipiscing at in tellus integer. Nunc non blandit massa enim nec dui nunc. Nunc eget lorem dolor sed viverra ipsum nunc aliquet. Nulla pellentesque dignissim enim sit amet. Sed odio morbi quis commodo. Ante in nibh mauris cursus mattis molestie. Vulputate odiomsan. Viverra vitae congue eu consequat ac felis. Adipiscing bibendum est ultricies integer.um.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nosteu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>


                <div class="page-holder-inner one-col-inner video-body">
                    <div class="o-video fade-up">
                        <iframe src="https://www.youtube.com/embed/9Mqj7F0MkpM" allowfullscreen></iframe>
                    </div>
                    <div data-aos="fade-up">
                        <h2>Simon Caulfield August 2019 Review</h2>
                        <p>Lorem GENERATED LOREM IPSUM 5 COPY Icon copy red Lorem ipsum dolor sit amet, consectetur adipieque vitae tempus quam pellentesque nec nam aliquam. Nec ultrices dui sapien eget mi proin sed. Adipiscing at in tellus integer. Nunc non blandit massa enim nec dui nunc. Nunc eget lorem dolor sed viverra ipsum nunc aliquet. Nulla pellentesque dignissim enim sit amet. Sed odio morbi quis commodo. Ante in nibh mauris cursus mattis molestie. Vulputate odiomsan. Viverra vitae congue eu consequat ac felis. Adipiscing bibendum est ultricies integer.um.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nosteu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>



            </div>
        </div>
        </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->
<?php
get_footer();
