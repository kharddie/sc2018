<?php

/**
 * Loop Property Template: Default
 *
 * @package     EPL
 * @subpackage  Templates/Content
 * @copyright   Copyright (c) 2019, Merv Barrett
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

global $property;


?>

<div data-aos="fade-up" id="post-<?php the_ID(); ?>" <?php post_class('epl-listing-post epl-property-blog epl-clearfix'); ?> <?php //do_action('epl_archive_listing_atts'); 
																											?>>




	<div class="page-holder-inner-media-left">
		<?php if (has_post_thumbnail()) : ?>
			<div class="property-box property-box-left property-featured-image-wrapper">
				<?php do_action('epl_property_archive_featured_image', 'property-listings-preview', 'property-listings-preview-class'); ?>
			</div>
		<?php endif; ?>

		<div class="property-box property-box-right property-content">
			<div class="preview-content">
				<div class="header-preview">
				<h2><a href="<?php the_permalink(); ?>"><?php do_action('epl_property_heading'); ?></a></h2>
				</div>
					<!-- Home Open -->
					<?php do_action('epl_property_inspection_times'); ?>
					<div class="price">
					<?php do_action( 'epl_property_price' ); ?>
				</div>
				<!-- Address -->
				<div class="property-address">
					<a href="<?php the_permalink(); ?>">
						<?php do_action('epl_property_address'); ?>
					</a>
				</div>
				<div class="entry-content">
					<?php epl_the_excerpt(); ?>
				</div>
				<div class="small-btn">
					<a href="<?php the_permalink(); ?>" class="btn white">DETAILS</a>
				</div>
			</div>
		</div>
	</div>




</div>