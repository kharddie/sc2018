<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $smof_data;
	$sidebar_class = '';
	$page_class = '';
	if($smof_data['woo_layout'] == 'sidebar-left') {
		$sidebar_class = 'sidebar-left';
		$page_class = 'percent-blog';
	}
	else if($smof_data['woo_layout'] == 'sidebar-right') {
		$sidebar_class = 'sidebar-right';
		$page_class = 'percent-blog';
	}
	
	if($smof_data['woo_layout'] == 'no-sidebar') {
		$page_class = 'fullwidth-shop';
	}
get_header( 'shop' ); 

?>


<div class="centered-wrapper">
	
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		
	?>

	<div class="page-title-subtitle">
		<?php do_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb' );?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h2 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h2>

		<?php endif; ?>
	</div>

	<?php do_action( 'woocommerce_after_main_content'); ?>
	<div class="<?php echo $page_class;?> <?php echo $sidebar_class; ?>">


		<?php do_action( 'woocommerce_archive_description' ); 


if ( woocommerce_product_loop() ) {
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		// do_action( 'woocommerce_after_main_content' );
	?>
	</div><!--end percent-blog-->
	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */

		if($smof_data['woo_layout'] != 'no-sidebar') {
			echo '<div class="percent-sidebar">';
				if(isset($smof_data['woo_sidebar'])) { 
					dynamic_sidebar( $smof_data['woo_sidebar'] ); 
				}
				else dynamic_sidebar('sidebar');
			echo '</div>';
		}
	?>

</div>	

<?php get_footer( 'shop' ); ?>