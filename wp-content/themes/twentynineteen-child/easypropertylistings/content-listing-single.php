<?php

/**
 * Single Property Template: Expanded
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

global $wpdb;
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('epl-listing-single epl-property-single view-expanded'); ?>>
	<div class="entry-header epl-header epl-clearfix">
		<div class="title-meta-wrapper">
			<div class="entry-col ">
				<h2 class="entry-title property-title"><?php do_action('epl_property_heading'); ?></h2>
				<div class="epl-property-featured-icons property-feature-icons epl-clearfix">
					<?php do_action('epl_property_icons'); ?>
				</div>
				<div class="entry-address">
					<?php do_action('epl_property_title'); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="entry-content epl-content epl-clearfix">
		<?php do_action('epl_property_featured_image'); ?>

		<div class="epl-tab-wrapper tab-wrapper tab-wrapper-flex epl-tab-wrapper-dertail-page ">
			<div class="epl-tab-wrapper-left">
				<div class="epl-tab-section epl-section-property-details">
					<h3 class="epl-tab-title">
						<?php
						$title_details = apply_filters('property_tab_title', __('Property Details', 'easy-property-listings'));
						echo esc_html($title_details);
						?>
					</h3>
					<div class="epl-tab-content tab-content">
						<div class="epl-property-address property-details">
							<?php do_action('epl_property_land_category'); ?>
							<?php do_action('epl_property_price_content'); ?>
							<?php do_action('epl_property_commercial_category'); ?>
						</div>
						<div class="epl-property-meta property-meta">
							<?php do_action('epl_property_available_dates'); // meant for rent only. 
							?>
							<?php do_action('epl_property_inspection_times'); ?>
						</div>
					</div>
				</div>
				<div class="epl-tab-section epl-section-description">
					<h3 class="epl-tab-title">
						<?php
						$title_desc = apply_filters('epl_property_tab_title_description', __('Description', 'easy-property-listings'));
						echo esc_html($title_desc);
						?>
					</h3>
					<div class="epl-tab-content tab-content">
						<!-- heading -->
						<?php
						do_action('epl_property_content_before');

						do_action('epl_property_the_content');

						do_action('epl_property_content_after'); // For Extension Support.
						?>
					</div>
				</div>

				<div class="epl-tab-section epl-tab-section-features">
					<?php do_action('epl_property_tab_section'); ?>
				</div>
	
			</div>
			<div class="epl-tab-wrapper-right">

				<?php
				$postid = get_the_ID();
				$property_agent = "";
				$property_second_agent = "";
				$property_agent = get_field('property_agent', $postid);
				$property_second_agent = get_field('property_second_agent', $postid);
				$agentsArray = array($property_agent, $property_second_agent);

				//echo "postID==" . $postid . "<br>";
				//echo "property_agent==" . $property_agent . "<br>";
				//echo "property_second_agent==" . $property_second_agent . "<br>";
				//echo count($agentsArray) . "<br>";

				if (count($agentsArray) > 0) {



					foreach ($agentsArray  as &$value) {
						//echo $value . "<br>";
						$qry = $wpdb->get_row("select ID from $wpdb->posts where post_type='staff' and post_status='publish'  and `post_name` = '" . $value . "' ");
						if (is_object($qry)) {
							$pID = $qry->ID;
							//echo "id=" . $pID . "<br>";
							$first_name = get_field('first_name', $pID);
							$last_name = get_field('last_name', $pID);
							$email = get_field('email', $pID);
							$phone = get_field('phone', $pID);
							$position = get_field('position', $pID);
							$linkedin = get_field('linkedin', $pID);
							$fullImageArray = get_field('photo', $pID);
							$fullImageUrlImageSize = 'medium_large';
							$fullImageUrl = $fullImageArray['sizes'][$fullImageUrlImageSize];

							?>
							<div class="our-people-page-detailed-left">
								<span class="d-photo">
									<span style="display:flex;">
										<img src="<?php echo $fullImageUrl; ?>">
									</span>
								</span>
								<span class="agent-name-epl">
									<h3><?php echo $first_name . " " . $last_name . " - " . $position ?></h3>
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
								<div class="btn-group back-to-our-people">
									<a href="<?php echo site_url() . '/our-people/?pid=' .  $pID;  ?>" class="btn btn-black"><?php echo $first_name; ?>’S CREDENTIALS</a>
								</div>
							</div>
					<?php
							}
						}
					} else {
						?>
					<h3> CONTACT PLACE HQ</h3>
					Phone: 07 3153 1457 <br>
					Address: 291 Shafston Avenue, Kangaroo Point<br>
					Office opening hours Monday to Friday 8:30 to 5:30pm
				<?php
				}
				?>
			</div>
		</div>
		<div class="map-holder">
		<?php do_action('epl_property_map'); ?>
		</div>
	</div>
	<!-- categories, tags and comments -->
	<div class="entry-footer epl-footer epl-clearfix">
		<div class="entry-meta">
			<?php
			wp_link_pages(
				array(
					'before'         => '<div class="entry-utility entry-pages">' . __('Pages:', 'easy-property-listings') . '',
					'after'          => '</div>',
					'next_or_number' => 'number',
				)
			);
			?>
		</div>
	</div>
</div>
<!-- end property -->