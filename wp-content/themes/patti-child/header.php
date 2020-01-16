<?php global $smof_data;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<!-- mobile meta tag -->
	<?php if (isset($smof_data['responsive_enabled']) && ($smof_data['responsive_enabled'] == '1')) {  ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php } else {  ?>
		<meta name="viewport" content="width=1150">
	<?php } ?>

	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

	<!-- Custom Favicon -->
	<?php if (!empty($smof_data['custom_favicon']['url'])) { ?>
		<link rel="icon" type="image/png" href="<?php echo esc_url($smof_data['custom_favicon']['url']); ?>" /><?php } ?>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php esc_url(bloginfo('pingback_url')); ?>">

	<?php wp_head(); ?>


	<?php
	$patti_layout_class = '';
	if (isset($smof_data['patti_layout']) && ($smof_data['patti_layout'] != '')) {
		$patti_layout = $smof_data['patti_layout'];
	}  ?>

	<?php

	$url = site_url();
	$pageID = $wp_query->post->ID;
	echo "<script> var pageId= " . $pageID . " </script>";
	?>

	<!-- JS includes -->
	<script src="https://webfonts.creativecloud.com/lato:n3,n1,n7,n4:all;abel:n4:all;open-sans:n4:all.js" type="text/javascript"></script>
	<script src="https://use.typekit.net/ik/F7uJ9xCUpfha6w1-e5-ArMkwFiyaT_EFwJfHhOyKcMMfenjffHOF6bjPHQIkFRMowQ6hWDIojcZywRbD5Q9XjRbkFRF8F263wQbuw2wujhIowD63e09gHKoD-AuzdcFyiAUc-AmCZYgkdag8S1soOcFzdPoyiPUTdc4kdaiDZW48Ze8X-Ao1OcBqdh48OcFzdPUTdc4kdaiDZW48Ze8X-Ao1OcuuShm3ScmkZAU8jWF8OcFzdPUD-AuzdcFyiAUc-AmCZYgkdag8S1soOcFzdPoyiPUaiaS0-AoKScNaShmkZAsTie80ZkoyZeNKZPoRdhXCiaiaOc80j14ziaF8Scmq-WsTdcS0dWmDZWgkZW48demySh90jhNlOYiaikoD-AuzdcFyiAUc-AmCZYgkdag8S1soOcFzdPoyiPJIdeBXdkG4fFuEIMMjMkMgP6sFiWF8qMe6zJWKgb.js" type="text/javascript"></script>
	<!-- Other scripts -->
	<script type="text/javascript">
		try {
			Typekit.load();
		} catch (e) {}
	</script>
	<!--HTML Widget code-->


	<style>


	</style>

</head>

<body <?php body_class($patti_layout); ?>>

	<a class="nav-btn-left"><i class="fa fa-bars"></i></a>
	<div id="menu-close" data-text-swap="← CLOSE">← MENU</div>
	<div class="left-menu">
		<ul>
			<li><a href="">HOME</a></li>
			<li><a href="<?php echo $url ?>#aboutsimon">ABOUT SIMON</a></li>
			<li><a href="<?php echo $url ?>#achievements">ACHIEVEMENTS</a></li>
			<li><a href="">WATERFRONT PRESTIGE</a></li>
			<li><a href="">PROJECTS</a></li>
			<li><a href="https://www.ratemyagent.com.au/real-estate-agent/simon-caulfield-bu627/sales/reviews">TESTIMONIALS</a></li>
			<li><a href="https://www.eplace.com.au/office/kangaroo-point">LISTINGS</a></li>
			<li><a href="https://www.eplace.com.au/agent/simon-caulfield">SOLD</a></li>
			<li><a href="<?php echo $url ?>#developers">SERVICES</a></li>
			<li><a href="">PROPERTY OWNERS</a></li>
			<li><a href="">CONTACT</a></li>
		</ul>
	</div>



	<!-- preloader-->
	<?php
	if (isset($smof_data['enable_preloader'])) {
		if ($smof_data['enable_preloader'] != 0) { ?>
			<div id="qLoverlay"></div>

		<?php }
} ?>

	<header id="header" class="<?php if (isset($smof_data['header_style'])) {
									echo $smof_data['header_style'];
								} else {
									echo 'solid-header';
								} ?>">
		<div class="centered-wrapper">

			<?php
			$isfullscreen = 'no-fullscreen-menu';
			if (isset($smof_data['menu_type']) && ($smof_data['menu_type'] === 'fullscreen-menu')) {
				$isfullscreen = 'yes-fullscreen-menu';
			} ?>

			<div class="percent-one-fourth <?php echo $isfullscreen ?>">
				<div class="logo">
					<?php
					if (isset($smof_data['svg_enabled']) && ($smof_data['svg_enabled'] == '1')) {
						if (isset($smof_data['svg_logo']['url']) && ($smof_data['svg_logo']['url'] != '')) {
							?>
							<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" rel="home"><img src="<?php echo $smof_data['svg_logo']['url']; ?>" alt="<?php bloginfo('name') ?>" width="<?php echo $smof_data['svg_logo_width']; ?>" height="<?php echo $smof_data['svg_logo_height']; ?>" /></a>
						<?php	}
				} else if (isset($smof_data['custom_logo']['url']) && ($smof_data['custom_logo']['url'] != '')) { ?>
						<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" rel="home"><img src="<?php echo $smof_data['custom_logo']['url']; ?>" alt="<?php bloginfo('name') ?>" /></a>
					<?php } else { ?>

						<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name') ?>" /></a>
					<?php } ?>

					<?php
					if (isset($smof_data['site_desc_enabled']) && ($smof_data['site_desc_enabled'] == '1')) {
						$description = get_bloginfo('description', 'display');
						if ($description || is_customize_preview()) {  ?>
							<span class="site-description"><?php echo $description; ?></span>
						<?php }
				}
				?>
				</div>
				<!--end logo-->
			</div>
			<!--end one-fourth-->

			<?php
			if (isset($smof_data['menu_type']) && ($smof_data['menu_type'] != 'fullscreen-menu')) {
				if (isset($smof_data['responsive_enabled']) && ($smof_data['responsive_enabled'] == '1')) {  ?>
					<a class="nav-btn <?php if (isset($smof_data['header_scheme']) && ($smof_data['header_scheme'] == 'dark-header')) {
											echo 'dark-things';
										} ?>"><i class="fa fa-bars"></i></a>
				<?php }
		} ?>



			<?php
			if (isset($smof_data['header_scheme'])) {
				$headerscheme = $smof_data['header_scheme'];
			}

			if (isset($smof_data['menu_type']) && ($smof_data['menu_type'] != 'fullscreen-menu')) { ?>

				<div class="percent-three-fourth column-last">

					<div id="regular-navigation">
						<?php get_template_part('includes/header-widgets'); ?>
					</div>


					<nav id="navigation" class="<?php echo $headerscheme ?>">
						<?php wp_nav_menu(array(
							'theme_location' => 'top_menu',
							'menu_id' => 'mainnav',
							'menu_class' => 'sf-menu',
							'sort_column' => 'menu_order',
							'fallback_cb' => ''
						)); ?>
					</nav>
					<!--end navigation-->

				</div>
				<!--end three-fourth-->
				<div class="clear"></div>
			</div>
			<!--end centered-wrapper-->

		<?php } else { ?>

			<div class="bm <?php echo $headerscheme ?>">
				<div class="bi burger-icon">
					<div id="burger-menu">
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
					</div>
				</div>
			</div>

			<div class="clear"></div>
			</div>
			<!--end centered-wrapper-->

			<!-- fullscreen navigation - remove the "displaynone" class to enable the fullscreen navigation -->
			<div class="overlay">
				<div class="wrap centered-wrapper">
					<?php wp_nav_menu(array(
						'theme_location' => 'top_menu',
						'menu_id' => 'wrap-navigation',
						'menu_class' => 'wrap-nav',
						'sort_column' => 'menu_order',
						'fallback_cb' => ''
					)); ?>
					<div class="clear"></div>

					<!-- social icons for the fullscreen navigation -->
					<!--
 							<ul class="overlaymenu-social">
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul> 
							-->
					<?php get_template_part('includes/header-widgets'); ?>
				</div>
			</div>

		<?php } ?>

	</header>

	<div id="wrapper">

		<?php

		if (is_front_page()) {
			echo '<div id="homeUp"></div>';
		}

		if (isset($smof_data['header_style'])) {
			if (($smof_data['header_style'] == 'solid-header') && (is_page_template('template-homepage.php'))) {
				echo '<div class="menu-fixer"></div>';
			}
		} else if (!isset($smof_data['header_style'])) {
			echo '<div class="menu-fixer"></div>';
		}
		if (!is_page_template('template-homepage.php')) {
			if (isset($smof_data['header_style'])) {
				echo '<div class="menu-fixer"></div>';
			}
		}

		?>