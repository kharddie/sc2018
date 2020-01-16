<?php
/*-----------------------------------------------------------------------------------*/
/*	Include files that theme needs to work smoothly
/*-----------------------------------------------------------------------------------*/

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/framework/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/framework/ReduxFramework/ReduxCore/framework.php' );
}
if ( file_exists( dirname( __FILE__ ) . '/framework/ReduxFramework/config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/framework/ReduxFramework/config.php' );
}

include ('framework/delicious-cpt.php');
include ('framework/meta/my-meta-box-class.php');
include ('framework/meta/class-usage.php');

include ("framework/widgets/widget-recent-posts.php");
include ("framework/widgets/widget-twitter.php");
include ("framework/widgets/widget-flickr.php");
include ("framework/widgets/widget-contact.php");

include ("framework/image-resizer.php");
include ("framework/navigation.php");

// require_once(get_template_directory().'/framework/plugins/envato_setup/envato_setup.php');


// include composer after default init
function include_composer() {
	include('framework/extend-composer.php');
}
add_action('init', 'include_composer', 9999);


// woocommerce theme support
function delicious_wooc_init () {
	add_theme_support( 'woocommerce' );
}
add_action('after_setup_theme','delicious_wooc_init');



add_action( 'wp_enqueue_scripts', 'dt_dequeue_owlcarousel' );
function dt_dequeue_owlcarousel()
{
    wp_deregister_script( 'prettyphoto' );
    wp_deregister_style( 'prettyphoto' );
}



/*-----------------------------------------------------------------------------------*/
/*	Creating the theme setup function
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'delicious_theme_setup' ) ) {
	function delicious_theme_setup() {
		
		add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'audio', 'video' ) );
		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		if ( !isset( $content_width ) ) {
			$content_width = 762;
		}	

		// theme localization
		$lang = get_stylesheet_directory() . '/lang';
	    load_theme_textdomain('delicious', $lang);				
	}
	
	add_action( 'after_setup_theme', 'delicious_theme_setup' );
}



/*-----------------------------------------------------------------------------------*/
/*	Register blog sidebar, footer and custom sidebar
/*-----------------------------------------------------------------------------------*/
	
if( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'name' => 'Blog Sidebar',
			'id' => 'sidebar',
			'description' => 'Widgets in this area will be shown in the sidebar.',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));

		register_sidebar(array(
			'name' => 'Footer',
			'id' => 'top-footer',
			'description' => 'Widgets in this area will be shown in the footer.',
			'before_widget' => '<div class="footer-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		
		register_sidebar(array(
			'name' => 'Page Sidebar',
			'id' => 'page-sidebar',
			'description' => 'Widgets in this area will be shown in the sidebar of any page.',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));	
	}

// count sidebar widgets
if( !function_exists('delicious_count_sidebar_widgets') ) {
	function delicious_count_sidebar_widgets( $sidebar_id, $echo = true ) {
		$the_sidebars = wp_get_sidebars_widgets();
		if( !isset( $the_sidebars[$sidebar_id] ) )
			return __( 'Invalid sidebar ID', 'delicious' );
		if( $echo )
			echo count( $the_sidebars[$sidebar_id] );
		else
			return count( $the_sidebars[$sidebar_id] );
	}
}

// get all sidebars in an array 
if( !function_exists('delicious_my_sidebars') ) {
	function delicious_my_sidebars() {
        global $wp_registered_sidebars;
        $all_sidebars = array();
        if ( $wp_registered_sidebars && ! is_wp_error( $wp_registered_sidebars ) ) {
            
            foreach ( $wp_registered_sidebars as $sidebar ) {
                $all_sidebars[ $sidebar['id'] ] = $sidebar['name'];
            }
            
        }
        return $all_sidebars;
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Register Navigation Menus
/*-----------------------------------------------------------------------------------*/

if( !function_exists('delicious_register_menu') ) {
	function delicious_register_menu() {
		register_nav_menus(
			array(
			'top_menu' => __('Main Menu', 'delicious')
			)
		);
	}
	add_action( 'init', 'delicious_register_menu' );
}



/*-----------------------------------------------------------------------------------*/
/*	Set different thumbnail dimensions
/*-----------------------------------------------------------------------------------*/

if( !function_exists('delicious_image_sizes') ) {	
	function delicious_image_sizes() {
		add_image_size( 'blog-thumb', 780, 9999, false ); 		// Blog thumbnails
		add_image_size( 'gallery-thumb', 1120, 9999, false ); 	// Gallery thumbnails
		add_image_size( 'member-thumb', 640, 640, true); 		// Team Member thumbnails
		add_image_size( 'full-size',  9999, 9999, false ); 		// Full Size
	}

	add_action( 'init', 'delicious_image_sizes' );
}


/*-----------------------------------------------------------------------------------*/
/*	Register and Load Javascript, CSS and Custom Styles
/*-----------------------------------------------------------------------------------*/

if( !function_exists('delicious_enqueue_scripts') ) {
		
	add_action('wp_enqueue_scripts','delicious_enqueue_scripts');	
	
	function delicious_enqueue_scripts() {
		
		// THEME STYLES

		wp_enqueue_style( 'dt-delicious-font', "//fonts.googleapis.com/css?family=Open+Sans:300italic,400,300,600,700,800");

		wp_enqueue_style( 'dt-default-style', get_stylesheet_uri() );
		wp_enqueue_style( 'dt-prettyphoto-lightbox', get_template_directory_uri() . '/css/prettyPhoto.css' );
		wp_enqueue_style( 'dt-superfish', get_template_directory_uri() . '/css/superfish.css' );
		wp_enqueue_style( 'dt-font-awesome', get_template_directory_uri() . '/framework/fonts/font-awesome/css/font-awesome.css' );
		wp_enqueue_style( 'dt-audioplayer', get_template_directory_uri() . '/css/audioplayer.css' );
		wp_enqueue_style( 'dt-owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );

		wp_register_style( 'dt-tipsy', get_template_directory_uri() . '/css/tipsy.css' );

		if(function_exists('vc_map')) {
			wp_enqueue_style( 'extend-composer', get_template_directory_uri() . '/css/extend-composer.css' );
		}

		global $smof_data;
		if(!isset($smof_data['responsive_enabled'])) {
			wp_enqueue_style( 'dt-responsive', get_template_directory_uri() . '/css/responsive.css' );
		}
		else 
		if(isset($smof_data['responsive_enabled']) && ($smof_data['responsive_enabled'] =='1')) { 
			wp_enqueue_style( 'dt-responsive', get_template_directory_uri() . '/css/responsive.css' );

			if(isset($smof_data['layout_type'])) { 
				if($smof_data['layout_type'] == 2 ) { 
					wp_enqueue_style( 'dt-fluid', get_template_directory_uri() . '/css/fluid.css' );
				}
			}
		}
		if(!isset($smof_data['custom_color_scheme']) || ($smof_data['custom_color_scheme'] === '') ) {
			if(!isset($smof_data['scheme'])) {
				wp_enqueue_style( 'dt-color-scheme', get_template_directory_uri() . '/css/color-schemes/orange.css' );
			}
			else {
				wp_enqueue_style( 'dt-color-scheme', get_template_directory_uri() . '/css/color-schemes/'.$smof_data['scheme'] );
			}
		}
	
	
		// THEME SCRIPTS
		wp_enqueue_script( 'jquery' );

		if(isset($smof_data['enable_preloader'])) {
			if($smof_data['enable_preloader'] != 0) {	
				wp_enqueue_script('dt-qloader', get_template_directory_uri() . '/js/jquery.queryloader2.js', array('jquery'), '1.0', false );
				wp_enqueue_script('dt-custom-loader', get_template_directory_uri() . '/js/custom/custom-loader.js', array('jquery', 'dt-qloader'), '1.0', false );			
			}
		}
		wp_enqueue_script('dt-scripts-top', get_template_directory_uri() . '/js/scripts-top.js', array('jquery'), false, false );

		if(isset($smof_data['lazyload']) && ($smof_data['lazyload'] =='1')) { 
			wp_enqueue_script('dt-lazyload', get_template_directory_uri() . '/js/jquery.lazyload.js', array('jquery'), '1.9.3', true );
		}

		wp_register_script('dt-isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery'), '1.0', true );
		wp_register_script('dt-custom-isotope-portfolio', get_template_directory_uri() . '/js/custom/custom-isotope-portfolio.js', array('jquery', 'dt-isotope'), '1.0', true );
		wp_register_script('dt-custom-isotope-blog', get_template_directory_uri() . '/js/custom/custom-isotope-blog.js', array('jquery', 'dt-isotope'), '1.0', true );

		wp_register_script('dt-custom-custom', get_template_directory_uri() . '/js/custom/custom.js', array('jquery', 'dt-custom-isotope-blog', 'dt-custom-isotope-portfolio'), '1.0', true );	
		
		wp_register_script('dt-waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), '2.0.4', true );
		wp_register_script('dt-waypoints-custom', get_template_directory_uri() . '/js/custom/custom-waypoints.js', array('jquery'), '2.0.4', true );
		wp_register_script('dt-count-to', get_template_directory_uri() . '/js/jquery.countTo.js', array('jquery'), FALSE, true );

		wp_register_script('dt-jflickrfeed', get_template_directory_uri() . '/js/jflickrfeed.js', array('jquery'), '1.0', true );		
		wp_register_script('dt-custom-flickr', get_template_directory_uri() . '/js/custom/custom-flickr.js', array('jquery'), '1.0', true );		

		wp_enqueue_script('dt-hoverintent', get_template_directory_uri() . '/js/hoverIntent.js', array('jquery'), 'r7', true );		

		wp_register_script('dt-jplayer', get_template_directory_uri() . '/js/jquery.jplayer.min.js', array('jquery'), '2.2.0', true );
		wp_register_script('dt-social', get_template_directory_uri() . '/js/custom/custom-social.js', array('jquery'), FALSE, true );	
		wp_register_script('dt-tipsy', get_template_directory_uri() . '/js/jquery.tipsy.js', array('jquery'), '1.0.0a', true );	

		wp_enqueue_script('dt-scripts-bottom', get_template_directory_uri() . '/js/scripts-bottom.js', array('jquery'), FALSE, true );
		wp_enqueue_script('dt-nav', get_template_directory_uri() . '/js/jquery.nav.js', array('jquery'), '2.2.0', true );
		wp_enqueue_script('dt-custom-nav', get_template_directory_uri() . '/js/custom/custom-nav.js', array('jquery', 'dt-nav', 'dt-custom-isotope-portfolio', 'dt-custom-isotope-blog'), '1.0', true );
		
		if(isset($smof_data['responsive_enabled']) && ($smof_data['responsive_enabled'] =='1')) { 
			wp_enqueue_script('dt-custom-responsive-nav', get_template_directory_uri() . '/js/custom/custom-responsive-nav.js', array('dt-nav'), false, false );
		}

		if(isset($smof_data['responsive_enabled']) && ($smof_data['responsive_enabled'] =='0')) { 
			wp_enqueue_script('dt-non-responsive', get_template_directory_uri() . '/js/custom/custom-non-responsive.js', array('jquery'), false, true );	
		}

		if(isset($smof_data['smoothscroll_enabled']) && ($smof_data['smoothscroll_enabled'] =='1')) { 
			wp_enqueue_script('dt-smoothscroll', get_template_directory_uri() . '/js/smoothScroll.js', array('jquery'), '1.2.1', true );
		}

		wp_enqueue_script('dt-custom-navscroll', get_template_directory_uri() . '/js/custom/custom-navscroll.js', array('jquery'), '1.0', false );		

		$grid_manager = $grid_very_wide = $grid_wide = $grid_normal = $grid_small = $grid_tablet = $grid_phone = $grid_gutter_width = '' ;
		if(isset($smof_data['grid_layout_manager'])) { $grid_manager = $smof_data['grid_layout_manager']; }
		if(isset($smof_data['grid_column_very_wide'])) { $grid_very_wide = $smof_data['grid_column_very_wide']; }
		if(isset($smof_data['grid_column_wide'])) { $grid_wide = $smof_data['grid_column_wide']; }
		if(isset($smof_data['grid_column_normal'])) { $grid_normal = $smof_data['grid_column_normal']; }
		if(isset($smof_data['grid_column_small'])) { $grid_small = $smof_data['grid_column_small']; }
		if(isset($smof_data['grid_column_tablet'])) { $grid_tablet = $smof_data['grid_column_tablet']; }
		if(isset($smof_data['grid_column_phone'])) { $grid_phone = $smof_data['grid_column_phone']; }
		if(isset($smof_data['grid_column_small_phone'])) { $grid_small_phone = $smof_data['grid_column_small_phone']; }
		if(isset($smof_data['grid_gutter_width'])) { $grid_gutter_width = $smof_data['grid_gutter_width']; }

		wp_localize_script( 'dt-custom-isotope-portfolio', 'vals', array( 'grid_manager' => $grid_manager, 'grid_very_wide' => $grid_very_wide, 'grid_wide' => $grid_wide, 'grid_normal' => $grid_normal, 'grid_small' => $grid_small, 'grid_tablet' => $grid_tablet, 'grid_phone' => $grid_phone, 'grid_small_phone' => $grid_small_phone, 'grid_gutter_width' => $grid_gutter_width) );

		if( is_singular() ) wp_enqueue_script( 'comment-reply' );
		
		if ((is_page_template('template-portfolio.php')) || is_tax('portfolio_cats')) {
			wp_enqueue_script('dt-isotope');	
			wp_enqueue_script('dt-custom-isotope-portfolio');
		}

		if (is_page_template('template-blog.php')) {
			wp_enqueue_script('dt-isotope');	
			wp_enqueue_script('dt-custom-isotope-blog');
		}

		if(isset($smof_data['social_box'])) { 
			if($smof_data['social_box'] =='1') {			
				wp_enqueue_script('dt-social');
			}
		}
	
		wp_enqueue_script('dt-custom-custom');	
				
		
		
		// Custom Styles
		global $post;
		

		// Parallax bg for portfolio items				
		$parallax_bg = '';
		$dt_bg = get_post_meta($post->ID, 'dt_bg_img', true);	
		$dt_bg_repeat = get_post_meta($post->ID, 'dt_bg_repeat', true);	
		$dt_bg_color = get_post_meta($post->ID, 'dt_bg_color', true);	
		$dt_rgb_color = hex2rgb($dt_bg_color);
		$dt_color_opacity = get_post_meta($post->ID, 'dt_bg_color_opacity', true);	
		$dt_op_val = '';	

		if(!empty($dt_bg)) {
			$parallax_bg .= '#parallax-'.$post->ID.' {background: url('.$dt_bg["url"].') 50% 0 '.$dt_bg_repeat.' fixed;}';
		}

		if(!empty($dt_bg_color)) { 
			$parallax_bg .= '.parallax-padding { background-color: rgba('.$dt_rgb_color.', 0.'.$dt_color_opacity.') }';
		}

		wp_add_inline_style( 'dt-default-style', $parallax_bg );	
		

		// disabling parallax effect
		$no_parallax = '';
		if(isset($smof_data['parallax_enabled']) && ($smof_data['parallax_enabled'] =='0')) { 
			$no_parallax = 'div[class*="parallax-"] { background-attachment: initial !important; }';
		}
		wp_add_inline_style( 'dt-default-style', $no_parallax );


		// custom color scheme
		$color_scheme = '';
		$output_scheme = '';
		if((isset($smof_data['custom_color_scheme'])) && ($smof_data['custom_color_scheme'] != '')) {
			$color_scheme = $smof_data['custom_color_scheme'];

		$output_scheme = '#footer a:hover,#header-social li a:hover,.wrap ul.wrap-nav > li a:hover,.wrap ul.wrap-nav li.current > a,#toggle-view li.activated h3,.authorp h2 a:hover,.comment a:hover,.customlist li i,.dark-header ul#mainnav li a.current-menu-item,.dark-header ul#mainnav li a:active,.dark-header ul#mainnav li a:hover,.dark-header ul#mainnav li ul li a:hover,.thin-fill .dt-service-icon i,.dark-header ul#mainnav li ul li ul li a:hover,.dark-header ul#mainnav li>a.sf-with-ul:active,.dark-header ul#mainnav>li.item-active>a,.dark-header ul#mainnav>li>a.sf-with-ul:hover,.nav-btn:hover,.next-prev-posts a:hover,.portfolio h3 a:hover,.post-content h1 a:hover,.no-fill .dt-service-icon i,.service-item i,.share-options a:hover,.sidebar-post span a,.team-social a:hover,.testimonial-name,.toggle-minus,.tweet_time a:hover,.widget a:hover,.widget-tweet-text a,.wrapper-service i,a,a.tweet_action:hover,h1.masonry-title a:hover,h3.masonry-title a:hover,html .wpb_accordion .wpb_accordion_wrapper .ui-state-active .ui-icon,html .wpb_accordion .wpb_accordion_wrapper .ui-state-active a,html h4.wpb_toggle.wpb_toggle_title_active:after,html h4.wpb_toggle_title_active,ul#mainnav li ul li a:hover,ul#mainnav li ul li ul li a:hover,ul#mainnav>li.current>a span,ul#mainnav>li.highlighted-state>a span,ul.tags a:hover{color:'.$color_scheme.'}.dt-service-item:hover,.featured-column .column-shadow,.featured-column .package-title,.pagenav a:hover,.skillbar-bar,.tags ul li a:hover,.widget .tagcloud a:hover,a.comment-reply-link:hover,div.jp-play-bar,div.jp-volume-bar-value,h1.section-title:after,span.current-menu-item,.bold-fill .dt-service-icon i,ul#filters li.selected a{background:'.$color_scheme.'}.team-text h3 span,ul#mainnav>li.current>a span,ul#mainnav>li.highlighted-state>a span{border-bottom:1px solid '.$color_scheme.'}.dark-header ul#mainnav>li>a:hover>span{border-bottom:1px solid '.$color_scheme.'!important}.dt-service-item:hover,.pagenav a:hover,span.current-menu-item,ul#filters li a.selected,ul#filters li a:hover{border:1px solid '.$color_scheme.'}ul#social li a:hover{border-color:'.$color_scheme.'}ul.tabs li.active{border-top:2px solid '.$color_scheme.'}#spinner:before{border-top-color:'.$color_scheme.';border-left-color:'.$color_scheme.';border-right-color:'.$color_scheme.'}.featured-column .package-title{border-bottom:3px solid '.$color_scheme.'}html .wpb_content_element .wpb_tabs_nav li.ui-state-active{border-top:2px solid '.$color_scheme.'}html .wpb_tour.wpb_content_element .wpb_tour_tabs_wrapper .wpb_tabs_nav li.ui-state-active{border-left:2px solid '.$color_scheme.'}.thin-fill .dt-service-icon i{border: 1px solid '.$color_scheme.'}';

		} 

		wp_add_inline_style( 'dt-default-style', $output_scheme );	

		wp_localize_script( 'dt-custom-loader', 'dt_loader', array( 'bcolor' => $color_scheme) );


		// portfolio link
		$current_link = '';
		if((isset($smof_data['portfolio_back_link'])) && ($smof_data['portfolio_back_link'] != '')) {
			$current_link = $smof_data['portfolio_back_link'];
		}

		// scroll offset
		$scrolloffset = '';
		if((isset($smof_data['scrolloffset'])) && ($smof_data['scrolloffset'] != '')) {
			$scrolloffset = $smof_data['scrolloffset'];
		}

		// hashtags
		$dt_hashtags = '';
		if((isset($smof_data['nav_hashtags'])) && ($smof_data['nav_hashtags'] != '')) {
			$dt_hashtags = $smof_data['nav_hashtags'];
		}	

		// hashtags
		$dt_navspeed = 750;
		if((isset($smof_data['scrollspeed'])) && ($smof_data['scrollspeed'] != '')) {
			$dt_navspeed = $smof_data['scrollspeed'];
		}				

		wp_localize_script( 'dt-custom-nav', 'dt_handler', array( 'curlink' => $current_link , 'scrolloffset' => $scrolloffset, 'hashtag' => $dt_hashtags, 'navspeed' => $dt_navspeed) );

			
		// custom background colors	
		$style_css ='';

		if((!isset($smof_data['header_background'])) || ($smof_data['header_background'] === '')) { $smof_data['header_background'] = '#ffffff'; }
		$default_header_color = $smof_data['header_background'];
		$header_color = hex2rgb($smof_data['header_background']);
		if(isset($smof_data['header_scroll_opacity'])) {
			$scroll_op = $smof_data['header_scroll_opacity'];
		}
		else {
			$scroll_op = 70;
		}

		if(!empty($smof_data['body_background'])) {
			$style_css .= 'html body {background: '.$smof_data['body_background'].';}';
		}	
		if(!empty($smof_data['wrapper_background'])) {
			$style_css .= '#wrapper {background: '.$smof_data['wrapper_background'].';}';
		}
		if(!empty($smof_data['header_background'])) {
			$style_css .= '#header {background: '.$smof_data['header_background'].';}';
		}			
		if(!empty($smof_data['footer_background'])) {
			$style_css .= '#footer {background: '.$smof_data['footer_background'].';}';
		}	
		
		if(!empty($smof_data['bottomfooter_background'])) {
			$style_css .= '#bottomfooter {background: '.$smof_data['bottomfooter_background'].';}';
		}	
		
		if(!empty($smof_data['selected_text_background'])) {
			$style_css .= '::selection {background: '.$smof_data['selected_text_background'].'; color: #fff; } ';
			$style_css .= '::-moz-selection {background: '.$smof_data['selected_text_background'].'; color: #fff; } ';
		}			
		
		if((!empty($smof_data['pattern'])) && ($smof_data['pattern'] != 'bg12')) {
			$style_css .= 'html body #wrapper { background: url('.get_template_directory_uri().'/images/bg/'.$smof_data['pattern'].'.png) repeat scroll 0 0;}';
		}
		else {
			$style_css .= 'body { background: #efefef; }';
		}
		
		// margin-top for logo
		if(!empty($smof_data['margin_logo'])) {
			$style_css .= '#header .logo img { margin-top: '.$smof_data['margin_logo'].'px;}';
		}
					
		wp_add_inline_style( 'dt-default-style', $style_css );

		// disable floating header 
		$no_float = '';
		if(isset($smof_data['floating_header'])) {
			if($smof_data['floating_header'] == 0) {
				$no_float .= '#header { position: relative; } .menu-fixer { display: none !important }';
			}
		}

		wp_add_inline_style('dt-default-style', $no_float);
		
		
		// disable main blog title & tagline for blog articles
		$title_tagline_css = '';
		if(is_singular()) {
			if(isset($smof_data['blog_title_subtitle'])) { 
				if($smof_data['blog_title_subtitle'] =='0') {
					$title_tagline_css .='.single-post .page-title-subtitle { display: none; }';
					$title_tagline_css .='.single-post .post-single { border-top: 1px solid #efefef; padding-top: 60px; }';
				} 
			}
		}
		wp_add_inline_style('dt-default-style', $title_tagline_css);

		//counting footer widgets number and assigning them a width
		$number = delicious_count_sidebar_widgets( 'top-footer', false );
		$footer_columns = '';
			if($number == 2) { 
				$footer_columns = '.footer-widget { width: 48% !important; }'; }   	
			else if($number == 3) { 
				$footer_columns = '.footer-widget { width:30.66% !important; }'; } 	
			
			else if ($number == 4) { 
			$footer_columns = '.footer-widget { width:22% !important; }'; } 
			
			else if ($number == 5) { 
			$footer_columns = '.footer-widget { width:16.8% !important; }'; } 
			
		wp_add_inline_style( 'dt-default-style', $footer_columns );


		// Grayscale effect

		$grayscale_css = '';
		$grayscale_svg = "filter: url("."data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg'><filter id='grayscale'><feColorMatrix type='matrix' values='0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0'/></filter></svg>#grayscale".");";
		if(isset($smof_data['grayscale_effect'])&& ($smof_data['grayscale_effect'] == 1)) {
			$grayscale_css .= '.map-wrapper [id^="google_map_"], .portfolio li a img, .team-member img, .post-masonry a img, .client-item img, iframe{-webkit-filter: grayscale(100%); -moz-filter: grayscale(100%); -ms-filter: grayscale(100%); -o-filter: grayscale(100%); filter: grayscale(100%); filter: gray; '.$grayscale_svg.' }';			
		}		

		wp_add_inline_style( 'dt-default-style', $grayscale_css );
	
		//custom css	
		$custom_css = '';
		if(!empty($smof_data['more_css'])) {
			$custom_css .= $smof_data['more_css'];
		}	
		wp_add_inline_style( 'dt-default-style', $custom_css );


		$logo_image_id = '';
		$mainlogo_src = '';
		$logo_details = array('0', '100', '35');
		if(isset($smof_data['custom_logo']['id']) && ($smof_data['custom_logo']['id'] != '')) {
			$logo_details = wp_get_attachment_image_src($smof_data['custom_logo']['id'], 'full-size');	
			$mainlogo_src = $smof_data['custom_logo']['url'];
		}

		$alternativelogo_src = '';
		if(isset($smof_data['alternativelogo_enabled']) && ($smof_data['alternativelogo_enabled'] == '1')) {
			if(isset($smof_data['alternative_logo']['id']) && ($smof_data['alternative_logo']['url'] != '')) {
				$alternativelogo_src = $smof_data['alternative_logo']['url'];	
			}			
		}

		$dt_logo_width = $logo_details[1];
		$dt_logo_height = $logo_details[2];
		$dt_svg_logo = '';

		if(isset($smof_data['svg_enabled']) && ($smof_data['svg_enabled'] == '1')) {
			$dt_svg_logo = $smof_data['svg_logo']['url'];
			$dt_logo_width = $smof_data['svg_logo_width'];
			$dt_logo_height = $smof_data['svg_logo_height'];
		}

		$init_pt = 55;
		$init_pb = 25;
		$scroll_pt = 15;
		$scroll_pb = 15;

		if(isset($smof_data['initial_header_padding'])) {
			$init_pt = $smof_data['initial_header_padding']['padding-top'];
			$init_pb = $smof_data['initial_header_padding']['padding-bottom'];
		}	

		if(isset($smof_data['onscroll_header_padding'])) {
			$scroll_pt = $smof_data['onscroll_header_padding']['padding-top'];
			$scroll_pb = $smof_data['onscroll_header_padding']['padding-bottom'];
		}		

		$scrolling_effect = 1;	
		if(isset($smof_data['scrolling_effect'])) {
			if ($smof_data['scrolling_effect'] == 0) {
				$scrolling_effect = 0;
			}
		}
		wp_localize_script( 'dt-custom-navscroll', "dt_styles", array( 'header_bg' => $header_color, 'header_scroll_opacity' => $scroll_op, 'default_color' => $default_header_color, 'logo_width' => $dt_logo_width, 'logo_height' => $dt_logo_height, 'init_pt' => $init_pt, 'init_pb' => $init_pb, 'scroll_pt' => $scroll_pt, 'scroll_pb' => $scroll_pb, 'scrolling_effect' => $scrolling_effect, 'mainlogosrc' => $mainlogo_src , 'alternativelogosrc' => $alternativelogo_src , 'alternativelogo' => $smof_data['alternativelogo_enabled'], 'svglogo' => $dt_svg_logo) );			
		
		$init_h_padding = '';
		$init_h_padding = '#header { padding-top: '.$init_pt.'px; padding-bottom: '.$init_pb.'px;  }';
		wp_add_inline_style( 'dt-default-style', $init_h_padding );


		if(isset($smof_data['grid_layout_manager'])) { $grid_manager = $smof_data['grid_layout_manager']; }



		// admin bar showing
		$adminb = '';
		if(is_admin_bar_showing()) {
			$adminb = '#header {top: 32px !important;}';
		}
		wp_add_inline_style( 'dt-default-style', $adminb );

	}
}


function delicious_descript() {
	global $smof_data;
	if(isset($smof_data['floating_header'])) { 
		if($smof_data['floating_header'] == 0) {
	    	wp_dequeue_script( 'dt-custom-navscroll' );
	    }
	}
}

add_action( 'wp_print_scripts', 'delicious_descript', 100 );

function delicious_custom_js() {
	global $smof_data;
	if(isset($smof_data['js_editor']) && ($smof_data['js_editor'] !='')) { echo '<script>'. $smof_data['js_editor'] .'</script>'; }
}

add_action('wp_footer', 'delicious_custom_js', 100);


function delicious_admin_theme_style() {
    wp_enqueue_style('delicious-admin-style', get_template_directory_uri() . '/css/admin-style.css');
    wp_enqueue_style( 'dt-font-awesome', get_template_directory_uri() . '/framework/fonts/font-awesome/css/font-awesome.css' );
}
add_action('admin_enqueue_scripts', 'delicious_admin_theme_style');



/*-----------------------------------------------------------------------------------*/
/*	Delicious Gallery Function
/*-----------------------------------------------------------------------------------*/	
if ( !function_exists( 'delicious_gallery' ) ) {
	function delicious_gallery($postid) {  

	$token = wp_generate_password(5, false, false);
   	wp_enqueue_script('custom-gallery', get_template_directory_uri() . '/js/custom/custom-gallery.js', array('jquery'), '1.0', false );	
	wp_localize_script( 'custom-gallery', 'dt_gallery_' . $token, array( 'post_id' => $postid) );
	
		$i=0;
		$gallery_images = get_post_meta($postid, 'dt_gallery_block',true);

		if(!empty($gallery_images)) {	
	
				echo '<div class="owl-carousel gallery-slider" id="gs-'.$postid.'" data-token="' . $token . '">';	
					
					foreach ($gallery_images as $gallery_item) {
						$item_url = $gallery_item['dt_gallery_post'];
						$item_name = $gallery_item['dt_gallery_photo_name'];
						$item_desc = $gallery_item['dt_gallery_photo_desc'];
						
						$resizer_url = $item_url['url'];
						$resized_image = aq_resize( $resizer_url, 780, 408, true );

							echo  '<div class="slider-item">';
								echo  '<a rel="prettyPhoto[blog_image_gal'.$postid.']" href="'.esc_url($resizer_url).'" title="'.esc_attr($item_name).'">';
									echo  '<img src="'.esc_url($resized_image).'" alt="'.esc_attr($item_desc).'" />';
								echo  '</a>';
							echo  '</div>';
					}

				echo  '</div><!--end slides-->';
		}
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Delicious Audio Function
/*-----------------------------------------------------------------------------------*/	

if(!function_exists('delicious_audio')) { 
	function delicious_audio($postid) { 
	

		$mp3_item = get_post_meta($postid, 'dt_mp3_audio_block', true);
		$ogg_item = get_post_meta($postid, 'dt_ogg_audio_block', true);
		$swfpath = get_template_directory_uri() .'/js';
		
		$token = wp_generate_password(5, false, false);
		wp_enqueue_script('dt-jplayer');
		wp_enqueue_script('custom-audio', get_template_directory_uri() . '/js/custom/custom-audio.js', array('jquery'), '1.0', false );	
		wp_localize_script( 'custom-audio', 'dt_audio_' . $token, array( 'post_id' => $postid, 'mp3_item' => $mp3_item, 'ogg_item' => $ogg_item, 'spath' => $swfpath) );		
		
		?>
		
		
		<div id="audio_jplayer_<?php echo $postid; ?>" class="jp-jplayer del_audio" data-token="<?php echo $token; ?>"></div>
		<div id="jp_container_<?php echo $postid; ?>" class="jp-audio">
			<div class="jp-type-single">
				<div class="jp-gui jp-interface">
					<div class="jp-controls">
						<a href="javascript:;" class="jp-play" tabindex="1">play</a>
						<a href="javascript:;" class="jp-pause" tabindex="1">pause</a>
						<div class="jp-current-time"></div>
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
						<div class="jp-volume-bar">
							<div class="jp-volume-bar-value"></div>
						</div>																

						<a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a>
						<a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a>
						<div class="jp-duration"></div>								
					</div>
				</div>
				<div class="jp-no-solution">
					<span><?php _e('Update required', 'delicious'); ?></span>
					<?php _e('To play the media you will need to either update your browser to a recent version or change it with a better one like Google Chrome.', 'delicious'); ?>
				</div>
			</div>
		</div>		

<?php	
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Delicious Video Function
/*-----------------------------------------------------------------------------------*/	

if(!function_exists('delicious_video')) { 
	function delicious_video($postid) { 
	
		$external_item = get_post_meta($postid, 'dt_external_video_block', true);		
		
		if(($external_item != '')) {
			if( strpos($external_item, 'youtube') ) {
				preg_match(
						'/[\\?\\&]v=([^\\?\\&]+)/',
						$external_item,
						$matches
					);
				$id = $matches[1];
				 
				$width = '780';
				$height = '440';
				echo '<div class="post-video"><iframe class="dt-youtube" width="' .$width. '" height="'.$height.'" src="//www.youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen></iframe></div>';
			}
			
			if( strpos($external_item, 'vimeo') ) {
				preg_match(
						'/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/',
						$external_item,
						$matches
					);
				$id = $matches[2];	

				$width = '780';
				$height = '440';		
				
				echo '<div class="post-video"><iframe src="http://player.vimeo.com/video/'.$id.'?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=ffffff" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';	
			}			
		}

	}
}



/*-----------------------------------------------------------------------------------*/
/*	Sets how comments are displayed
/*-----------------------------------------------------------------------------------*/	

if(!function_exists('delicious_comment')) { 
	function delicious_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li class="comment" <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			<div class="commentwrap">
				<div class="avatar">
					<?php echo get_avatar($comment,$size='60'); ?>
				</div><!--end avatar-->
				
				<div class="metacomment">
					<span><?php echo get_comment_author_link() ?></span>
					<?php printf(__('on %1$s at %2$s', 'delicious'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('Edit', 'delicious'),'  ','') ?> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 
					  
				</div><!--end metacomment-->
			
				<div class="bodycomment">
					<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('<em>Your comment is awaiting moderation.</em>', 'delicious') ?></em>
					<br />
					<?php endif; ?>
					<?php comment_text() ?>
				</div><!--end bodycomment-->
			</div><!--end commentwrap-->
		
	<?php }
}


function delicious_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form class="post-password-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <p>' . __( "This content is password protected. To view it please enter your password below:" ) . '</p>
    <label for="' . $label . '">' . __( "Password:" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><input type="submit" class="button orange" name="Submit" value="' . esc_attr__( "Submit" ) . '" />
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'delicious_password_form' );


/*-----------------------------------------------------------------------------------*/
/*	Other Functions
/*-----------------------------------------------------------------------------------*/

// Disable WooCommerce CSS

if(class_exists('WooCommerce')) {
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

	add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 15 );

	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
}

	function delicious_loop_columns() {
		global $smof_data;
		return $smof_data["woo_products_per_row"];
	}

	add_filter('loop_shop_columns', 'delicious_loop_columns', 20 );


// Lazy load images

// if(isset($smof_data['lazyload']) && ($smof_data['lazyload'] =='1')) { 
// 	add_filter( 'wp_get_attachment_image_attributes', 'delicious_add_lazyload_to_attachment_image', 10, 2 );
// 	function delicious_add_lazyload_to_attachment_image( $attr, $attachment ) {
// 	    $attr['data-original'] = $attr['src'];
// 	    $attr['class'] = 'lazy';
// 	    $attr['src'] = get_template_directory_uri() .'/images/grey.gif';
// 	    return $attr;
// 	}
// }

// Include the Google Analytics Tracking Code (ga.js)
function delicious_google_analytics_tracking_code(){
	global $smof_data;
	if(isset($smof_data['analytics_enabled'])) {
		if ($smof_data['analytics_enabled'] === '1') { 

			wp_enqueue_script('google-analytics', get_template_directory_uri() . '/js/google-analytics.js', array('jquery'), '1.0', false );	
			wp_localize_script( 'google-analytics', "ga", array( 'ga_id' => $smof_data['ga_id']) );		

		}
	}
}

add_action('wp_footer', 'delicious_google_analytics_tracking_code');

// Language Switcher for WPML
if (!function_exists('delicious_language_selector')) {
	function delicious_language_selector() {
		if (function_exists('icl_get_languages')) {
			$languages = icl_get_languages('skip_missing=0&orderby=code');
			wp_enqueue_script( 'dt-tipsy' );
			wp_enqueue_style( 'dt-tipsy' );
			if(!empty($languages)){
				echo '<div id="header_language_list"><ul>';
					foreach($languages as $l){
						if($l['active']) { echo '<li class="active-lang switch-lang" original-title="'.$l['native_name'].'">'; }
							else { echo '<li class="switch-lang" original-title="'.$l['native_name'].'">'; }
						if(!$l['active']) echo '<a href="'.$l['url'].'">';
							if($l['code'] != 'zh-hant') { echo substr($l['native_name'], 0, 2); } else { echo $l['native_name']; }
						if(!$l['active']) echo '</a>';
						echo '</li>';
					}
				echo '</ul></div>';
			}
		}
	}
}




//get sidebar position
if(!function_exists('dt_sidebar_position')) { 
	function dt_sidebar_position($postid) {
		global $dt_sidebar_pos;
		$dt_sidebar_pos = get_post_meta($postid, 'dt_sidebar_position', true);
		
		$sidebar_class = '';
		
		if($dt_sidebar_pos == 'sidebar-right')
			$sidebar_class = 'sidebar-right';
		else if($dt_sidebar_pos == 'sidebar-left')
			$sidebar_class = 'sidebar-left';
		else if($dt_sidebar_pos == 'no-sidebar')
			$sidebar_class = 'no-sidebar';
		echo $sidebar_class;	
	}
}


// Hex 2 RGB values
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   // return $rgb; // returns an array with the rgb values
}

	
//setting a random id
if(!function_exists('dt_random_id')) { 
	function dt_random_id($id_length) {
	$random_id_length = $id_length; 
	$rnd_id = md5(uniqid(rand(),1)); 
	$rnd_id = strip_tags(stripslashes($rnd_id)); 
	$rnd_id = str_replace(".","",$rnd_id); 
	$rnd_id = strrev(str_replace("/","",$rnd_id)); 
	$rnd_id = str_replace(range(0,9),"",$rnd_id); 
	$rnd_id = substr($rnd_id,0,$random_id_length); 
	$rnd_id = strtolower($rnd_id);  

	return $rnd_id;
	}
}


//wrap "Read more" button 
if(!function_exists('delicious_wrap_readmore')) { 
	function delicious_wrap_readmore($more_link)
	{
		return '<div class="post-read-more">'.$more_link.'</div>';
	}
	add_filter('the_content_more_link', 'delicious_wrap_readmore', 10, 1);
}


// make "Read more" button to start from top
function dt_remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'dt_remove_more_jump_link');


// Require and recommend plugins

define( 'THEMENAME', 'Patti' ); 

require_once ('framework/plugins/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'delicious_register_required_plugins', 99 ); 

function delicious_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
				'name'                  => 'Delicious Shortcodes', // The plugin name
				'version'				=> '1.9.2',
				'slug'                  => 'delicious-shortcodes', // The plugin slug (typically the folder name)
				'source'                => get_template_directory_uri() . '/framework/plugins/delicious-shortcodes/delicious-shortcodes.zip', // The plugin source
				'required'              => true, // If false, the plugin is only 'recommended' instead of required
			),	

		array(
				'name'                  => 'WPBakery Page Builder(formerly Visual Composer)', // The plugin name
				'version'				=> '5.5.2',
				'slug'                  => 'js_composer', // The plugin slug (typically the folder name)
				'source'                => get_template_directory_uri() . '/framework/plugins/visual-composer/js_composer.zip', // The plugin source
				'required'              => true, // If false, the plugin is only 'recommended' instead of required
			),	

		array(
				'name'                  => 'Ultimate Addons for WPBakery Page Builder(formerly Visual Composer)', // The plugin name
				'version'				=> '3.16.24',
				'slug'                  => 'Ultimate_VC_Addons', // The plugin slug (typically the folder name)
				'source'                => get_template_directory_uri() . '/framework/plugins/visual-composer/Ultimate_VC_Addons.zip', // The plugin source
				'required'              => false, // If false, the plugin is only 'recommended' instead of required
			),			

		array(
				'name'                  => 'Templatera Addon for Visual Composer', // The plugin name
				'version'				=> '1.1.12',
				'slug'                  => 'templatera', // The plugin slug (typically the folder name)
				'source'                => get_template_directory_uri() . '/framework/plugins/visual-composer/templatera.zip', // The plugin source
				'required'              => false, // If false, the plugin is only 'recommended' instead of required
			),			

		array(
				'name'                  => 'Revolution Slider', // The plugin name
				'version'				=> '5.4.8',
				'slug'                  => 'revslider', // The plugin slug (typically the folder name)
				'source'                => get_template_directory_uri() . '/framework/plugins/revolution-slider/revslider.zip', // The plugin source
				'required'              => false, // If false, the plugin is only 'recommended' instead of required
			),	
			
		array(
			'name' 		=> 'Sidebar Generator',
			'slug' 		=> 'smk-sidebar-generator',
			'version'				=> '',
			'required' 	=> false,
		),				

		array(
			'name' 		=> 'Contact Form 7',
			'slug' 		=> 'contact-form-7',
			'version'				=> '',
			'required' 	=> false,
		),	

		array(
			'name' 		=> esc_html__('One Click Demo Import', 'delicious'),
			'slug' 		=> 'one-click-demo-import',
			'version'				=> '',
			'required' 	=> false,
		),			

			array(
					'name'                  => esc_html__('Envato Market', 'delicious'), 
					'version'				=> '2.0.0',
					'slug'                  => 'envato-market', 
					'source'                => get_template_directory_uri() . '/framework/plugins/envato-market/envato-market.zip', 
					'required'              => false,
				),						

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'delicious';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}

	function delicious_ocdi_import_files() {
		return array(
			array(
				'import_file_name'           => 'PATTI DEMO CONTENT',
				'import_file_url'            => 'https://dev.deliciousthemes.com/patti/PATTI-ALL-CONTENT.xml',
			),
		);
	}


	function delicious_ocdi_after_import_setup() {		

		register_nav_menu( 'top_menu', esc_html__( 'Main Menu', 'delicious' ) );
		$menu_header = get_term_by('name', 'Patti Menu', 'nav_menu');
		set_theme_mod( 'nav_menu_locations', array(
					'top_menu' => $menu_header->term_id) );	

		// Assign front page
		$front_page_id = get_page_by_title( 'Homepage' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );	

	}

	add_action( 'pt-ocdi/after_import', 'delicious_ocdi_after_import_setup' );
	add_filter( 'pt-ocdi/import_files', 'delicious_ocdi_import_files' );	
	add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
	add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );	


    function delicious_set_theme_setup_wizard_username($username){
        return 'deliciousthemes';
    }


    function delicious_set_theme_setup_wizard_oauth_script($oauth_url){
        return 'https://deliciousthemes.com/envato/api/server-script.php';
    }

	add_filter('delicious_theme_setup_wizard_username', 'delicious_set_theme_setup_wizard_username', 10);
	add_filter('delicious_theme_setup_wizard_oauth_script', 'delicious_set_theme_setup_wizard_oauth_script', 10);    


// disable plugin notifications
add_action( 'init', 'dt_disable_revslider' );
function dt_disable_revslider() {
	if(function_exists('set_revslider_as_theme')) { 
		set_revslider_as_theme();
	}
}

add_action( 'vc_before_init', 'dt_disable_vc', 9 );
function dt_disable_vc() {
	if(function_exists('vc_set_as_theme')) { 
    	vc_set_as_theme($disable_updater = true);
    }
}

//set excerpt length
if(!function_exists('delicious_custom_excerpt_length')) { 
	function delicious_custom_excerpt_length( $length ) {
		return 25;
	}
	add_filter( 'excerpt_length', 'delicious_custom_excerpt_length', 999 );

}	

// allow svg files to be used with the theme
function dt_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'dt_mime_types');

//add excerpt link
if(!function_exists('delicious_new_excerpt_more')) { 
	function delicious_new_excerpt_more($more) {
		   global $post;
		return '...<p class="readmore"><a class="more-btn" href="'. get_permalink($post->ID) . '">'.__('Read More', 'delicious').'</a></p>';
	}
	add_filter('excerpt_more', 'delicious_new_excerpt_more');
}

// disable admin bar for users

if(isset($smof_data['adminbar_enabled']) && ($smof_data['adminbar_enabled'] =='0')) { 
	show_admin_bar( false );
}

// If theme is activated for the first time
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	$wp_rewrite->flush_rules();
}


add_action('get_footer', 'child_remove_genesis_do_footer');
function child_remove_genesis_do_footer() {
if (is_home()) {
remove_action('genesis_footer', 'genesis_do_footer');
remove_action('genesis_footer', 'genesis_footer_markup_open', 5);
remove_action('genesis_footer', 'genesis_footer_markup_close', 15);
}
}
