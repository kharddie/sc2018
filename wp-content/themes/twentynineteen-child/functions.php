<?php

add_action('wp_enqueue_scripts', 'tnt_enqueue_parent_styles');

function tnt_enqueue_parent_styles()
{
    $rand = rand(1, 99999999999);
    //wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    // wp_enqueue_style( 'wpshout-style', get_stylesheet_uri(), '', $rand );
}

/*

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

function clear_br($content) {
return str_replace("<br/>","<br clear='none'/>", $content);
}
add_filter('the_content','clear_br');

 */

/*
 * Creating a function to create our CPT
 */

function custom_post_type()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Staff', 'Post Type General Name', 'twentythirteen'),
        'singular_name' => _x('Staff', 'Post Type Singular Name', 'twentythirteen'),
        'menu_name' => __('Staff', 'twentythirteen'),
        'parent_item_colon' => __('Parent Staff', 'twentythirteen'),
        'all_items' => __('All Staff', 'twentythirteen'),
        'view_item' => __('View Staff', 'twentythirteen'),
        'add_new_item' => __('Add New Staff', 'twentythirteen'),
        'add_new' => __('Add New', 'twentythirteen'),
        'edit_item' => __('Edit Staff', 'twentythirteen'),
        'update_item' => __('Update Staff', 'twentythirteen'),
        'search_items' => __('Search Staff', 'twentythirteen'),
        'not_found' => __('Not Found', 'twentythirteen'),
        'not_found_in_trash' => __('Not found in Trash', 'twentythirteen'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label' => __('staff', 'twentythirteen'),
        'description' => __('Staff news and reviews', 'twentythirteen'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('staff', $args);
}

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */

add_action('init', 'custom_post_type', 0);

/*
 * Creating a function to create our CPT
 */

function custom_post_type_exclusive_homes()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Homes', 'Post Type General Name', 'twentythirteen'),
        'singular_name' => _x('Home', 'Post Type Singular Name', 'twentythirteen'),
        'menu_name' => __('Homes', 'twentythirteen'),
        'parent_item_colon' => __('Parent Homes', 'twentythirteen'),
        'all_items' => __('All Homes', 'twentythirteen'),
        'view_item' => __('View Homes', 'twentythirteen'),
        'add_new_item' => __('Add New Homes', 'twentythirteen'),
        'add_new' => __('Add New', 'twentythirteen'),
        'edit_item' => __('Edit Homes', 'twentythirteen'),
        'update_item' => __('Update Homes', 'twentythirteen'),
        'search_items' => __('Search Homes', 'twentythirteen'),
        'not_found' => __('Not Found', 'twentythirteen'),
        'not_found_in_trash' => __('Not found in Trash', 'twentythirteen'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label' => __('homes', 'twentythirteen'),
        'description' => __('Homes news and reviews', 'twentythirteen'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('homes', $args);
}

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */

add_action('init', 'custom_post_type_exclusive_homes', 0);














/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 */

//hook into the init action and call create_book_taxonomies when it fires
add_action('init', 'create_classification_hierarchical_taxonomy', 0);

function create_classification_hierarchical_taxonomy()
{

    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI

    $labels = array(
        'name' => _x('Classification', 'taxonomy general name'),
        'singular_name' => _x('Classification', 'taxonomy singular name'),
        'search_items' => __('Search Classification'),
        'all_items' => __('All Classification'),
        'parent_item' => __('Parent Classification'),
        'parent_item_colon' => __('Parent Classification:'),
        'edit_item' => __('Edit Classification'),
        'update_item' => __('Update Classification'),
        'add_new_item' => __('Add New Classification'),
        'new_item_name' => __('New Classification Name'),
        'menu_name' => __('Classification'),
    );

    // Now register the taxonomy

    register_taxonomy('classification', 'Our_videos', array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'classification'),
    ));
}













/*
 * Creating a function to create our CPT VIDEOS Videos
 */

function custom_post_type_our_video()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Our_videos', 'Post Type General Name', 'twentythirteen'),
        'singular_name' => _x('Our_video', 'Post Type Singular Name', 'twentythirteen'),
        'menu_name' => __('Our_video', 'twentythirteen'),
        'parent_item_colon' => __('Parent Our_video', 'twentythirteen'),
        'all_items' => __('All Our_videos', 'twentythirteen'),
        'view_item' => __('View Our_video', 'twentythirteen'),
        'add_new_item' => __('Add New Our_video', 'twentythirteen'),
        'add_new' => __('Add New', 'twentythirteen'),
        'edit_item' => __('Edit Our_video', 'twentythirteen'),
        'update_item' => __('Update Our_video', 'twentythirteen'),
        'search_items' => __('Search Our_video', 'twentythirteen'),
        'not_found' => __('Not Found', 'twentythirteen'),
        'not_found_in_trash' => __('Not found in Trash', 'twentythirteen'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label' => __('our_videos', 'twentythirteen'),
        'description' => __('Video news and reviews', 'twentythirteen'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('genres', 'category','classification'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('Our_videos', $args);
}

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */

add_action('init', 'custom_post_type_our_video', 0);
















/*
 * Creating a function to create our CPT EARNED MEDIA Media
 */

function custom_post_type_earned_media()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Media', 'Post Type General Name', 'twentythirteen'),
        'singular_name' => _x('Media', 'Post Type Singular Name', 'twentythirteen'),
        'menu_name' => __('Media', 'twentythirteen'),
        'parent_item_colon' => __('Parent Media', 'twentythirteen'),
        'all_items' => __('All Media', 'twentythirteen'),
        'view_item' => __('View Media', 'twentythirteen'),
        'add_new_item' => __('Add New Media', 'twentythirteen'),
        'add_new' => __('Add New', 'twentythirteen'),
        'edit_item' => __('Edit Media', 'twentythirteen'),
        'update_item' => __('Update Media', 'twentythirteen'),
        'search_items' => __('Search Media', 'twentythirteen'),
        'not_found' => __('Not Found', 'twentythirteen'),
        'not_found_in_trash' => __('Not found in Trash', 'twentythirteen'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label' => __('media', 'twentythirteen'),
        'description' => __('Media news and reviews', 'twentythirteen'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('media', $args);
}

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */

//add_action('init', 'custom_post_type_earned_media', 0);

/*
 * Creating a function to create our CPT Developments Development  developments
 */

function custom_post_type_developments()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Developments', 'Post Type General Name', 'twentythirteen'),
        'singular_name' => _x('Development', 'Post Type Singular Name', 'twentythirteen'),
        'menu_name' => __('Developments', 'twentythirteen'),
        'parent_item_colon' => __('Parent Development', 'twentythirteen'),
        'all_items' => __('All Developments', 'twentythirteen'),
        'view_item' => __('View Development', 'twentythirteen'),
        'add_new_item' => __('Add New Development', 'twentythirteen'),
        'add_new' => __('Add New', 'twentythirteen'),
        'edit_item' => __('Edit Development', 'twentythirteen'),
        'update_item' => __('Update Development', 'twentythirteen'),
        'search_items' => __('Search Development', 'twentythirteen'),
        'not_found' => __('Not Found', 'twentythirteen'),
        'not_found_in_trash' => __('Not found in Trash', 'twentythirteen'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label' => __('developments', 'twentythirteen'),
        'description' => __('Developments news and reviews', 'twentythirteen'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        // This is where we add taxonomies to our CPT
        //'taxonomies'          => array('category'),
    );

    // Registering your Custom Post Type
    register_post_type('developments', $args);
}

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */

add_action('init', 'custom_post_type_developments', 0);

/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 */

//hook into the init action and call create_book_taxonomies when it fires
add_action('init', 'create_status_hierarchical_taxonomy', 0);

function create_status_hierarchical_taxonomy()
{

    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI

    $labels = array(
        'name' => _x('Status', 'taxonomy general name'),
        'singular_name' => _x('Status', 'taxonomy singular name'),
        'search_items' => __('Search Status'),
        'all_items' => __('All Status'),
        'parent_item' => __('Parent Status'),
        'parent_item_colon' => __('Parent Status:'),
        'edit_item' => __('Edit Status'),
        'update_item' => __('Update Status'),
        'add_new_item' => __('Add New Status'),
        'new_item_name' => __('New Status Name'),
        'menu_name' => __('Status'),
    );

    // Now register the taxonomy

    register_taxonomy('status', 'developments', array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'status'),
    ));
}

/*
 * Creating a function to create our CPT News
 */

function custom_post_type_news()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('News', 'Post Type General Name', 'twentythirteen'),
        'singular_name' => _x('News', 'Post Type Singular Name', 'twentythirteen'),
        'menu_name' => __('News', 'twentythirteen'),
        'parent_item_colon' => __('Parent News', 'twentythirteen'),
        'all_items' => __('All News', 'twentythirteen'),
        'view_item' => __('View News', 'twentythirteen'),
        'add_new_item' => __('Add New News', 'twentythirteen'),
        'add_new' => __('Add New', 'twentythirteen'),
        'edit_item' => __('Edit News', 'twentythirteen'),
        'update_item' => __('Update News', 'twentythirteen'),
        'search_items' => __('Search News', 'twentythirteen'),
        'not_found' => __('Not Found', 'twentythirteen'),
        'not_found_in_trash' => __('Not found in Trash', 'twentythirteen'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label' => __('news', 'twentythirteen'),
        'description' => __('News and reviews', 'twentythirteen'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('news', $args);
}

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */

add_action('init', 'custom_post_type_news', 0);

//for all properties
add_image_size('property-listings-preview', 617, 442, true);
function limit_text($text, $limit)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

//epl_property_icons
remove_action('epl_property_icons', 'epl_property_icons');
function my_epl_property_icons()
{
    global $property;
    echo '<ul class="epl-property-icons">';
    echo $property->get_property_bed('l') .
        $property->get_property_bath('l') .
        $property->get_property_parking('l') .
        $property->get_property_air_conditioning('l') .
        $property->get_property_pool('l');
    echo '</ul>';
}
add_action('epl_property_icons', 'my_epl_property_icons');

function FeaturedListingshortCode()
{
    $testHolder = null;

    $test = '<div class="feature-listings-flex">'
        . '<div class="feature-listings-flex-inner">'
        . '<div class="feature-listings-flex-inner-content">'
        . '<a href="#">'
        . '<span class="price">$1,000,000</span>'
        . '<span class="title">FEATURE LISTINGS NUMBER ONE HERE</span>'
        . '</a>'
        . '</div>'
        . '</div>'
        . '</div>';

    for ($i = 0; $i < 5; $i++) {
        $testHolder .= $test;
    }
    return $testHolder;
}

add_shortcode('FeaturedListings', 'FeaturedListingshortCode');

//set the default sort to current first
function my_epl_listing_sort_status($query)
{
    // Do nothing if in dashboard or not an archive page
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    // Do nothing if Easy Property Listings is not active
    if (!function_exists('epl_all_post_types')) {
        return;
    }

    // Do nothing if doing search
    if (epl_is_search()) {
        return;
    }

    // Do nothing if using sorting
    if (isset($_GET['sortby'])) {
        return;
    }

    // Sort EPL listings by price on archive page
    if (is_post_type_archive(epl_all_post_types() == 'true')) {
        $query->set('meta_key', 'property_status');
        $query->set(
            'orderby',
            array(
                'meta_value' => 'ASC',
                'date' => 'DESC',
            )
        );
        return;
    }
}
add_action('pre_get_posts', 'my_epl_listing_sort_status', 99);

function phone_number_format($number)
{
    // Allow only Digits, remove all other characters.
    $number = preg_replace("/[^\d]/", "", $number);

    // get number length.
    $length = strlen($number);

    // if number = 10
    if ($length == 10) {
        $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number);
    }

    return $number;
}

/*
 * Creating a function to create our CPT
 */

function custom_post_type_earnedMedia()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('EarnedMedia', 'Post Type General Name', 'twentythirteen'),
        'singular_name' => _x('EarnedMedia', 'Post Type Singular Name', 'twentythirteen'),
        'menu_name' => __('EarnedMedia', 'twentythirteen'),
        'parent_item_colon' => __('Parent EarnedMedia', 'twentythirteen'),
        'all_items' => __('All EarnedMedia', 'twentythirteen'),
        'view_item' => __('View EarnedMedia', 'twentythirteen'),
        'add_new_item' => __('Add New EarnedMedia', 'twentythirteen'),
        'add_new' => __('Add New', 'twentythirteen'),
        'edit_item' => __('Edit EarnedMedia', 'twentythirteen'),
        'update_item' => __('Update EarnedMedia', 'twentythirteen'),
        'search_items' => __('Search EarnedMedia', 'twentythirteen'),
        'not_found' => __('Not Found', 'twentythirteen'),
        'not_found_in_trash' => __('Not found in Trash', 'twentythirteen'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label' => __('EarnedMedia', 'twentythirteen'),
        'description' => __('EarnedMedia news and reviews', 'twentythirteen'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('earnedMedia', $args);
}

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */

add_action('init', 'custom_post_type_earnedMedia', 0);

// Add a Custom Incremental Class
function custom_nav_class($classes, $item)
{
    global $post;
    $classes[] = "custom-class-" . $item->menu_order;
    return $classes;
}
add_filter('nav_menu_css_class', 'custom_nav_class', 10, 2);





//Excluding Sold and Leased from Property Loop pre_get_posts
function my_property_filter($query)
{
    // Do nothing if is dashboard/admin or doing search
    if (is_admin() || epl_is_search())
        return;

    // The query to only show 'current' listings
    $meta_query = array(
        array(
            'key' => 'property_status',
            'value' => 'current',
            'compare' => '==',
        ),
    );

    // Only show current listings on your main /property/ page
    if ($query->is_main_query() && is_post_type_archive('property')) {
        $query->set('meta_query', $meta_query);
        return;
    }

    // Only show current listings on your main /rental/ page
    if ($query->is_main_query() && is_post_type_archive('rental')) {
        $query->set('meta_query', $meta_query);
        return;
    }
}
add_action('pre_get_posts', 'my_property_filter', 20);




function substrwords($text, $maxchar, $end = '...')
{
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);
        $output = '';
        $i      = 0;
        while (1) {
            $length = strlen($output) + strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } else {
        $output = $text;
    }
    return $output;
}



//Adding a Taxonomy Filter to Admin List for a Custom Post Type
//developments CPT
add_action( 'restrict_manage_posts', 'filter_backend_by_taxonomies' , 99, 2);
/* Filter CPT via Custom Taxonomy */
/* https://generatewp.com/filtering-posts-by-taxonomies-in-the-dashboard/ */


function filter_backend_by_taxonomies( $post_type, $which ) {
// Apply this to a specific CPT
if ( 'developments' !== $post_type )
    return;
// A list of custom taxonomy slugs to filter by
$taxonomies = array( 'status' );
foreach ( $taxonomies as $taxonomy_slug ) {
    // Retrieve taxonomy data
    $taxonomy_obj = get_taxonomy( $taxonomy_slug );
    $taxonomy_name = $taxonomy_obj->labels->name;
    // Retrieve taxonomy terms
    $terms = get_terms( $taxonomy_slug );
    // Display filter HTML
    echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
    echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
    foreach ( $terms as $term ) {
        printf(
            '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
            $term->slug,
            ( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
            $term->name,
            $term->count
        );
    }
    echo '</select>';
}
}




//Adding a Taxonomy Filter to Admin List for a Custom Post Type
//our_videos CPT
add_action( 'restrict_manage_posts', 'filter_backend_by_taxonomies_v' , 99, 2);
/* Filter CPT via Custom Taxonomy */
/* https://generatewp.com/filtering-posts-by-taxonomies-in-the-dashboard/ */


function filter_backend_by_taxonomies_v( $post_type, $which ) {
// Apply this to a specific CPT
if ( 'our_videos' !== $post_type )
    return;
// A list of custom taxonomy slugs to filter by
$taxonomies = array( 'classification' );
foreach ( $taxonomies as $taxonomy_slug ) {
    // Retrieve taxonomy data
    $taxonomy_obj = get_taxonomy( $taxonomy_slug );
    $taxonomy_name = $taxonomy_obj->labels->name;
    // Retrieve taxonomy terms
    $terms = get_terms( $taxonomy_slug );
    // Display filter HTML
    echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
    echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
    foreach ( $terms as $term ) {
        printf(
            '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
            $term->slug,
            ( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
            $term->name,
            $term->count
        );
    }
    echo '</select>';
}
}