<?php

/*
 Template Name: Our-People-Template-test
 */

get_header();
$post_id = filter_input(INPUT_GET, 'pid');

function check($number){ 
	$whichLoop;
    if($number % 2 == 0){ 
        $whichLoop= "Even";  
    } 
    else{ 
        $whichLoop =  "Odd"; 
	} 
	return $whichLoop;
} 



function limit_text($text, $limit) {
	if (str_word_count($text, 0) > $limit) {
		$words = str_word_count($text, 2);
		$pos = array_keys($words);
		$text = substr($text, 0, $pos[$limit]) . '...';
	}
	return $text;
  }


?>
<section id="primary" class="content-area">
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
            <div class="all-page-holder">


                <?php
			$loopCount=1;
			$qry = $wpdb->get_results("select * from $wpdb->posts where post_type='news' and post_status='publish' order by menu_order asc");
			foreach ($qry as $row) {
				$ID=$row->ID;
				$post_author=$row->post_author;
				$post_date=$row->post_date;
				$post_content=$row->post_content;
				$post_title=$row->post_title;
				$post_name=$row->post_name;

				//imagesßßß
				$imageIds = get_field('photo_gallery', $ID);
			//	echo "$imageIds=".$imageIds. "<br>";

				$arr= explode(",",$imageIds); //prints an array of numbers

				foreach($arr as $id) {
					$img = wp_get_attachment_image_src($id, 'large');
				  //  echo "<img src=\"$img[0]\" width=\"$img[1]\" height=\"$img[2]\">\n";
				}
				/* grab the url for the full size featured image */
				$featured_img_url = get_the_post_thumbnail_url($ID, 'full'); 
			//	echo "%%%%%%%%%".$featured_img_url;



				if(check($loopCount) == 'Odd'){

					?>
                <div class="page-holder-inner two-col-inner" data-aos="fade-up">
                    <div class="page-holder-inner-media-flex">
                        <div class="page-holder-inner-media-left">
                            <img src="<?php echo $featured_img_url;?> " />
                            <div class="preview-content">
                                <h2><?php echo limit_text($post_title, 10);?> </h2>
                                <p><?php echo limit_text($post_content, 20);?> </p>
                                <div class="small-btn">
                                    <a href="<?php echo site_url(); ?>/exclusive-homes/" class="btn white">READ MORE</a>
                                </div>
                            </div>
                        </div>
                        <?php

				}elseif(check($loopCount) == 'Even'){

      				?>
                        <div class="page-holder-inner-media-right">
						<img src="<?php echo $featured_img_url;?> " />
                            <div class="preview-content">
                                <h2><?php echo limit_text($post_title, 10);?> </h2>
                                <p><?php echo limit_text($post_content, 20);?> </p>
                                <div class="small-btn">
                                    <a href="<?php echo site_url(); ?>/exclusive-homes/" class="btn white">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
				}

				?>


                <?php

				
				//echo "loopCount=".$loopCount."<br>";
				$loopCount++;

			}
			?>






            </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php
get_footer();