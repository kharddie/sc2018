<?php get_header(); ?>
	<?php
	global $smof_data;
	$portfolio_slide = get_post_meta($post->ID,'dt_slider_repeat',true);
	$portf_more_images = get_post_meta($post->ID, 'dt_more_images_block', true);
	$portf_align = get_post_meta($post->ID, 'dt_portf_fullwidth', true);
	?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<?php get_template_part( 'includes/page-title' ); ?>
	
	<?php if($portf_align != 'fullwidth') { ?> <div class="centered-wrapper"> <?php }
		else { ?> <div class="fullwidth-wrapper"> <?php } ?>
		<section class="portfolio-single" id="ajaxp">
			<article id="post-<?php the_ID(); ?>" class="begin-content">

			<div class="clear"></div>

			<?php the_content(); ?>		
		
			</article>
		</section>
		
		<div class="clear"></div>
		
		<?php if(isset($smof_data['portfolio_author'])) { if($smof_data['portfolio_author'] =='1') { ?>
			<div class="double-separator"></div>
			<div class="author-bio">							
				<?php echo get_avatar( get_the_author_meta('user_email'), '70', '' ); ?>
				<div class="authorp">
					<h2><span><?php _e('Author: ', 'delicious'); ?></span><?php the_author_link(); ?></h2>
					<p><?php the_author_meta('description'); ?></p>							
				</div>
			</div>	
		
		<?php  } } ?>

	</div><!--centered-wrapper/fullwidth-wrapper-->

	<div class="portfolio-nav"> 
		<?php

		if(isset($smof_data['patti_portfolio_nav_behaviour'])&& ($smof_data['patti_portfolio_nav_behaviour'] == 'same-category')) { 
			next_post_link('%link', '<i class="fa fa-angle-left"></i>', TRUE, ' ', 'portfolio_cats'); 
		} else {
			next_post_link('%link', '<i class="fa fa-angle-left"></i>'); 
		}
		 ?>
		<a href="<?php if((isset($smof_data['portfolio_back_link'])) && ($smof_data['portfolio_back_link'] !='')) { echo esc_url($smof_data['portfolio_back_link']); } else echo home_url(); ?>" class="close-portfolio external"><i class="fa fa-th"></i></a>

		<?php
		if(isset($smof_data['patti_portfolio_nav_behaviour'])&& ($smof_data['patti_portfolio_nav_behaviour'] == 'same-category')) { 
			previous_post_link('%link', '<i class="fa fa-angle-right"></i>', TRUE, ' ', 'portfolio_cats'); 
		} else {
			previous_post_link('%link', '<i class="fa fa-angle-right"></i>'); 
		}
		?>

	</div>	


	<?php endwhile; endif; ?>	

<?php get_footer(); ?>