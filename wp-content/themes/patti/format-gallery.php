<?php
/**
 * The template for displaying posts in the Gallery post format.
 *
 * @package WordPress
 * @subpackage Delicious
 *
 */
 
	$time = get_the_time(get_option('date_format'));

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('post post-masonry'); ?>>

	<?php delicious_gallery($post->ID); ?>

	<div class="post-content">
		<?php if(!is_single()) { ?>
			<h3 class="masonry-title entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h3>
		<?php } else { ?> 
			<h1 class="masonry-title entry-title"><?php the_title(); ?></h1>
		<?php }  ?>
		<span class="post-meta">
		<i class="for-sticky fa fa-exclamation"></i><i class="fa fa-camera-retro"></i>
		<?php 
			echo '<em class="post_date date_updated">' . $time. '</em>';
			
			if(is_single()) {
				echo '<div class="single-extra">';
				echo '<em>' . get_the_category_list( __( ', ', 'delicious' ) ) . '</em>';
				comments_popup_link(__('No Comments', 'delicious'), __('1 Comment', 'delicious'), __('% Comments', 'delicious')); 
				echo '</div>';
			}
		?>
		</span>			
		<div class="clear"></div>
	
		<?php  
			global $more; 
			if(!is_single()) { $more = 0; }
			the_content(__('Read More', 'delicious')); ?> 
			
	</div><!--end post-content-->
	
</article><!-- #post -->