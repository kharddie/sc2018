<?php get_header(); ?>

	<?php get_template_part( 'includes/page-title' ); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div class="centered-wrapper">
	
		<section class="percent-page <?php echo dt_sidebar_position($post->ID); ?>">
			<article id="page-<?php the_ID(); ?>" class="begin-content">
					<?php the_content(); ?>
			</article>
			<?php 
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;			
			?>
			<div class="double-space"></div>			
		</section>

		<?php endwhile; ?>

		<?php endif; ?>
		
		<?php
			global $dt_sidebar_pos;
			if(($dt_sidebar_pos === 'sidebar-right') || ($dt_sidebar_pos === 'sidebar-left')) 
				get_sidebar(); 
		?>
		

	</div><!--end centered-wrapper-->

<?php get_footer(); ?>