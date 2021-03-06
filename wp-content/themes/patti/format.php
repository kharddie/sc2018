<?php
/**
 * The template for displaying posts in the Standard post format.
 *
 * @package WordPress
 * @subpackage Delicious
 *
 */
 
	$time = get_the_time(get_option('date_format'));
	
	$standard_post_data = get_post_meta($post->ID,'dt_standard_select',true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post post-masonry'); ?>>

	<?php
		$thumb_id = get_post_thumbnail_id($post->ID);
		$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
		$image_url = wp_get_attachment_url($thumb_id);		
 		
 		$image_vals = wp_get_attachment_image_src($thumb_id, 'blog-thumb');
 		if ( has_post_thumbnail() ) { 
 			if(is_single()) {
 				?>
				<div class="post-thumbnail">
					<a href="<?php echo $image_url; ?>" rel="prettyPhoto" title="<?php the_title(); ?>">
						<span class="item-on-hover"><span class="hover-link"><i class="fa fa-search"></i></span></span>
						
						<?php if(isset($smof_data['lazyload']) && ($smof_data['lazyload'] =='1')) { ?>
							<img class="lazy" data-original="<?php echo $image_url; ?>" width="<?php echo $image_vals[1];?>"  height="<?php echo $image_vals[2];?>" alt="<?php echo $alt; ?>" />

						<?php } else {  the_post_thumbnail('blog-thumb', array('alt'   => $alt));  } ?>
					</a>
				</div><!--end post-thumbnail-->		
			<?php 
			}
			else 
			{ ?>
				<div class="post-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<span class="item-on-hover"><span class="hover-link"><i class="fa fa-external-link"></i></span></span>
						<?php the_post_thumbnail('blog-thumb', array('alt'   => $alt)); ?>
					</a>
				</div><!--end post-thumbnail-->		
				<?php 
			}
		}  ?>

	<div class="post-content">
		
			<?php if(!is_single()) { ?>
			<h3 class="masonry-title entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h3>
			<?php } else { ?> 
			<h1 class="masonry-title entry-title"><?php the_title(); ?></h1>
			<?php }  ?>
			
		<span class="post-meta">
		<i class="for-sticky fa fa-exclamation"></i><i class="fa fa-pencil"></i>
		<?php 
			echo '<em class="post_date date updated">' . $time. '</em>';
			
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
			
			<?php wp_link_pages('before=<div class="page-links">Pages: &after=</div>'); ?>
	</div><!--end post-content-->
	
</article><!-- #post -->