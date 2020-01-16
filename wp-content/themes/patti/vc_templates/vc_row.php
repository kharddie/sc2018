<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$output = $dt_id = $dt_bg_image = $dt_bg_repeat = $dt_bg_color = $dt_color_opacity = $dt_text_scheme = $dt_class = $el_class = $dt_no_mb = $dt_row_type = $dt_youtube_url = $video_raster = $css = $full_height = $content_placement = $equal_height = $flex_row = $columns_placement = '';

$disable_element = '';

extract(shortcode_atts(array(
    'dt_id'        		=> '',
    'full_height'       => '',
    'content_placement' => 'middle',
    'equal_height'      => '',
    'disable_element'   => '',
    'flex_row'          => '',
    'columns_placement' => '',
    'bg_image'       	=> '',
    'dt_parallax_inertia'=>'0.4',
    'dt_bg_repeat'      => '',
    'bg_color' 			=> '',
    'dt_color_opacity'  => '',
    'dt_text_scheme'    => '',
    'dt_padding_top'    => '',
    'dt_padding_bottom' => '',
    'dt_class'          => '',
    'el_class'   		=> '',
    'dt_no_mb'  		=> '',
    'dt_row_type'       => '',
    'dt_youtube_url'    => '',
    'video_raster'      => '',
    'css'               => ''
), $atts));

wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
wp_enqueue_style('js_composer_custom_css');

$css_classes = array(
    'vc_row',
    'wpb_row', //deprecated
    'vc_row-fluid',
    $el_class,
    $dt_no_mb,
    $dt_row_type,
    vc_shortcode_custom_css_class( $css ),
);

global $smof_data;

$full_height_class = $content_placement_class = '';

$rnd_id = dt_random_id(3);
$token = wp_generate_password(5, false, false);

    // youtube video bg
    if(($dt_id != '') && ($dt_youtube_url != '')) {
        wp_enqueue_script('dt-yotube-video-bg', get_template_directory_uri() . '/js/jquery-ytp.js', array('jquery'), '1.0', true ); 
        wp_localize_script( 'dt-yotube-video-bg', 'dt_vbg_' . $token, array( 'id' => $rnd_id) );
    }

    $video_bg = '';
    $dt_vid = '#'.$dt_id;

    if(($dt_id != '') && ($dt_youtube_url != '')) {
        $boolv = 'false';
        if($video_raster != '') {
            $boolv = 'true';
        }
        
        $video_bg = 'data-property="{videoURL: \'' . $dt_youtube_url . '\', containment: \'' .$dt_vid. '\', autoPlay:true, realfullscreen: true, addRaster: '.$boolv.', showControls: false, mute:true, startAt:0, opacity:1}"';
    }

if(isset($smof_data['parallax_enabled']) && ($smof_data['parallax_enabled'] =='1')) { 
    wp_enqueue_script('dt-custom-parallax', get_template_directory_uri() . '/js/custom/custom-parallax.js', array('dt-custom-isotope-blog', 'dt-custom-isotope-portfolio', 'dt-custom-custom'), '1.0', true ); 
    wp_localize_script( 'dt-custom-parallax', 'dt_parallax_' . $token, array( 'id' => $rnd_id, 'inertia' => $dt_parallax_inertia ) );
}

$dt_class = $this->getExtraClass($dt_class);

$css_classes[] = $dt_class;



	$style = '';
	if(!empty($bg_image)) {
		$css_classes[] = 'parallax-bag-'.$rnd_id;
	}

    if(($dt_id != '') && ($dt_youtube_url != '')) {
        $css_classes[] = 'ytp-player-'.$rnd_id;
    }

    // Color overlay
    $rgbcolor = '';
    if(!empty($bg_color)) {
        $rgbcolor = hex2rgb($bg_color);
    }

    // Opacity
    $cop = '0.70';
    if(!empty($dt_color_opacity)) { 
        if($dt_color_opacity  == 100) {
            $cop = '1';
        }
        else if($dt_color_opacity  < 100) {
            $cop = '0.'.$dt_color_opacity.'';
        }
    } 

    if ( 'yes' === $disable_element ) {
        if ( vc_is_page_editable() ) {
            $css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
        } else {
            return '';
        }
    }    

    // BG Image
    $has_image = false;
    if((int)$bg_image > 0 && ($image_url = wp_get_attachment_url( $bg_image, 'large' )) !== false) {
        $has_image = true;

        if(isset($smof_data['lazyload']) && ($smof_data['lazyload'] =='1')) {
            $style .= "background-image: url(".get_template_directory_uri().'/images/grey.gif'.");";
        }
        else {
            $style .= "background-image: url(".$image_url.");";    
        }
        
    }
    if(!empty($dt_bg_repeat) && $has_image) {
        if($dt_bg_repeat === 'no-repeat') {
            $style .= "background-repeat:no-repeat;";
        } elseif($dt_bg_repeat === 'repeat-x') {
            $style .= "background-repeat:repeat-x;";
        } elseif($dt_bg_repeat === 'repeat-y') {
            $style .= 'background-repeat: repeat-y;';
        } elseif($dt_bg_repeat === 'repeat') {
            $style .= 'background-repeat: repeat;';
        }
        $style .= 'background-attachment: fixed;';
        $style .= 'background-position: 50% 0;';
    }

    // Padding
    $padding = '';
    if(!empty($dt_padding_top)) {
        $padding .= 'padding-top: '.$dt_padding_top.'px;';
    }
    if(!empty($dt_padding_bottom)) {
        $padding .= 'padding-bottom: '.$dt_padding_bottom.'px;';
    }  

    // Data Img:original or src for lazyload
    $dataimg = '';
    if(!empty($image_url)) {
        if(isset($smof_data['lazyload']) && ($smof_data['lazyload'] =='1')) { 
            $dataimg = 'data-original="'.$image_url.'"';
            $css_classes[] = 'lazy';
        }
        else {
           $dataimg = 'src="'.$image_url.'"'; 
        }
    }

    // ID
    $output_id = '';
    if(!empty($dt_id)) {
        $output_id = 'id="'.$dt_id.'"';
    }

$full_height_class = $equal_height_class = $columns_placement_class = $content_placement_class = $row_flex_class = '';
if ( ! empty( $full_height ) ) {
    $full_height_class = ' vc_row-o-full-height';
    if ( ! empty( $columns_placement ) ) {
        $flex_row = true;
        $columns_placement_class = ' vc_row-o-columns-' . $columns_placement;
    }
}

if ( ! empty( $equal_height ) ) {
    $flex_row = true;
    $equal_height_class = ' vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
    $flex_row = true;
    $content_placement_class = ' vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
    $row_flex_class = ' vc_row-flex';
}


$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base']);

// $output .= '<div class="dt-row">';
$output .= '<div '.$output_id.' '.$video_bg.' class="' . esc_attr( trim( $css_class ) ) . '" '.$dataimg.' style="'.$style.'"  data-token="' . $token . '">';
    if( (!empty($bg_image)) || (!empty($bg_color)) || (!empty($dt_padding_top)) || (!empty($dt_padding_bottom)) ) {
        $output .= '<div class="'.$dt_text_scheme.$full_height_class . $columns_placement_class . $equal_height_class . $content_placement_class . $row_flex_class .'" style="'.$padding.' background-color: rgba('.$rgbcolor.', '.$cop.');">';
    }
	   $output .= wpb_js_remove_wpautop($content);
    if( (!empty($bg_image)) || (!empty($bg_color)) || (!empty($dt_padding_top)) || (!empty($dt_padding_bottom)) ) {
        $output .= '<div class="clear"></div></div>';
    }       
$output .= '</div>'.$this->endBlockComment('row');
// $output .= '</div>';

echo $output;