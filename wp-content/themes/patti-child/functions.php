<?php
/**
 * Loads the parent stylesheet.
 */
function load_parent_stylesheet()
{
  wp_enqueue_style('parent-styles', get_template_directory_uri() . '/style.css?' . rand());
}
add_action('wp_enqueue_scripts', 'load_parent_stylesheet');










/*
* Creating a function to create our CPT
*/

//function staff_custom_post_type()
//{

// Set UI labels for Custom Post Type
/*
  $labels = array(
    'name'                => _x('Staff Members', 'Post Type General Name'),
    'singular_name'       => _x('Staff', 'Post Type Singular Name'),
    'menu_name'           => __('Staff'),
    'parent_item_colon'   => __('Parent Staff'),
    'all_items'           => __('All Staff Members'),
    'view_item'           => __('View Staff Member'),
    'add_new_item'        => __('Add New Staff Member'),
    'add_new'             => __('Add New'),
    'edit_item'           => __('Edit Staff Member'),
    'update_item'         => __('Update Staff Member'),
    'search_items'        => __('Search Staff Member'),
    'not_found'           => __('Not Found'),
    'not_found_in_trash'  => __('Not found in Trash'),
  );
*/
// Set other options for Custom Post Type
/*
  $args = array(
    'label'               => __('Staff Members'),
    'description'         => __('Staff Members and details'),
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
    // You can associate this CPT with a taxonomy or custom taxonomy. 
    'taxonomies'          => array('staff'),
    /* A hierarchical CPT is like Pages and can have
          * Parent and child items. A non-hierarchical CPT
          * is like Posts.
          */
/*
    'hierarchical'        => false,
    'menu_icon'           => get_stylesheet_directory_uri() . '/lib/TeamProfiles/team-icon.png',
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );

  // Registering your Custom Post Type
 // register_post_type('wpmama_staff', $args);
}

/* Hook into the 'init' action so that the function
  * Containing our post type registration is not 
  * unnecessarily executed. 
  */
/*
//add_action('init', 'staff_custom_post_type', 0);


//loop through team members
*/


/*
function custom_query_shortcode($atts)
{

  the_post();

  // Get 'team' posts
  $team_posts = get_posts(array(
    'post_type' => 'team',
    'posts_per_page' => -1, // Unlimited posts
    'orderby' => 'title', // Order alphabetically by name
  ));

  echo "team_posts=" . $team_posts;

  print_r($team_posts);

  // Reset and setup variables
  $output = '';
  $temp_title = '';
  $temp_link = '';


  if ($team_posts) {
    setup_postdata($post);
  }
}

add_shortcode("team", "custom_query_shortcode");
*/



// Add a new custom grid shortcode module
// Usage [team posts_per_page="4" term="4"]
// You can also go to Visual Composer > Shortcode Mapper to add your custom module
function team_shortcode($atts)
{

  // Parse your shortcode settings with it's defaults
  $atts = shortcode_atts(array(
    'posts_per_page' => '-1'
  ), $atts, 'team');

  // Extract shortcode atributes
  extract($atts);

  // Define output var
  $output = '';

  // Define query
  $query_args = array(
    'post_type'      => 'team', // Change this to the type of post you want to show
    'posts_per_page' => $posts_per_page,
    'orderby' => 'date',
    'order' => 'ASC',
  );

  // Query posts
  $custom_query = new WP_Query($query_args);

  // Add content if we found posts via our query
  if ($custom_query->have_posts()) {

    // Open div wrapper around loop
    $output .= '<div class="team">';

    // Loop through posts
    while ($custom_query->have_posts()) : $custom_query->the_post();

      // Sets up post data so you can use functions like get_the_title(), get_permalink(), etc
      //$custom_query->the_post();

      // This is the output for your entry so what you want to do for each post.
      $output .= '<div><h1 class="H1-Grey" id="u24708-2">' . get_the_title() . '</h1><p class="Body-Grey">' . get_field('dt_member_position') . '</p></div>';

    endwhile;
    wp_reset_query();
    // Close div wrapper around loop
    $output .= '</div>';

    // Restore data
    wp_reset_postdata();
  }

  // Return your shortcode output
  return $output;
}
add_shortcode('team', 'team_shortcode');
