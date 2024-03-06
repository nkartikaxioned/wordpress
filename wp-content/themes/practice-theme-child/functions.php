<?php

//enqueue scripts ans stylesheets
function scripts_and_style_enqueue(){
wp_enqueue_script('hamburger-script',get_stylesheet_directory_uri() . '/js/hamburger.js',array(),null, 0.1,true);
}

add_action('init','scripts_and_style_enqueue');

function custom_post($post_singular_name, $post_plural_name, $capability_type)
{
  $labels = array(
    'name'                  => _x($post_plural_name, 'Post type general name', 'textdomain'),
    'singular_name'         => _x($post_singular_name, 'Post type singular name', 'textdomain'),
    'menu_name'             => _x($$post_plural_name, 'Admin Menu text', 'textdomain'),
    'name_admin_bar'        => _x($post_singular_name, 'Add New on Toolbar', 'textdomain'),
    'add_new'               => __('Add New ' . $post_singular_name, 'textdomain'),
    'add_new_item'          => __('Add New ' . $post_singular_name, 'textdomain'),
    'new_item'              => __('New ' . $post_singular_name, 'textdomain'),
    'edit_item'             => __('Edit ' . $post_singular_name, 'textdomain'),
    'view_item'             => __('View ' . $post_singular_name, 'textdomain'),
    'all_items'             => __('All ' . $post_plural_name, 'textdomain'),
    'search_items'          => __('Search ' . $$post_plural_name, 'textdomain'),
    'parent_item_colon'     => __('Parent ' . $$post_plural_name, 'textdomain'),
    'not_found'             => __('No ' . $post_plural_name . 'found.', 'textdomain'),
    'not_found_in_trash'    => __('No ' . $post_plural_name . 'found in Trash.', 'textdomain'),
    'featured_image'        => _x($post_singular_name . ' Cover Image', 'Overrides the “Featured Image” phrase for this ' . $capability_type . ' type. Added in 4.3', 'textdomain'),
    'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this ' . $capability_type . ' type. Added in 4.3', 'textdomain'),
    'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this ' . $capability_type . ' type. Added in 4.3', 'textdomain'),
    'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this ' . $capability_type . ' type. Added in 4.3', 'textdomain'),
    'archives'              => _x($post_singular_name . ' archives', 'The ' . $capability_type . ' type archive label used in nav menus. Default “' . $capability_type . ' Archives”. Added in 4.4', 'textdomain'),
    'insert_into_item'      => _x('Insert into ' . $post_singular_name, 'Overrides the “Insert into ' . $capability_type . '”/”Insert into page” phrase (used when inserting media into a ' . $capability_type . '). Added in 4.4', 'textdomain'),
    'uploaded_to_this_item' => _x('Uploaded to this ' . $post_singular_name, 'Overrides the “Uploaded to this ' . $capability_type . ' ”/”Uploaded to this page” phrase (used when viewing media attached to a ' . $capability_type . '). Added in 4.4', 'textdomain'),
    'filter_items_list'     => _x('Filter ' . $$post_plural_name . ' list', 'Screen reader text for the filter links heading on the ' . $capability_type . ' type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
    'items_list_navigation' => _x($$post_plural_name . ' list navigation', 'Screen reader text for the pagination heading on the ' . $capability_type . ' type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
    'items_list'            => _x($$post_plural_name . ' list', 'Screen reader text for the items list heading on the ' . $capability_type . ' type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => $post_singular_name),
    'capability_type'    => $capability_type,
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'can_export'         => true,
    'has_archive'        => true,
    'exclude_from_search'=> false,
    'publicly_queryable' => true,
    'supports'           => array('title', 'author', 'thumbnail', 'excerpt', 'comments'),
    'taxonomies'         => array('category'),
  );

  register_post_type($post_singular_name, $args);
}

function custom_computer_post()
{
  $post_singular_name = 'Computer';
  $post_plural_name = 'Computers';
  $capability_type = 'post';
  custom_post($post_singular_name, $post_plural_name, $capability_type);
}
add_action('init', 'custom_computer_post');

// function featured_image_requirement() {
//     if(!has_post_thumbnail()) {
//          wp_die( 'You forgot to set the featured image. Click the back button on your browser and set it.' ); 
//     } 
// }
// add_action( 'pre_post_update', 'featured_image_requirement' );

// add_action('save_post', 'wpds_check_thumbnail');
// add_action('admin_notices', 'wpds_thumbnail_error');

// function wpds_check_thumbnail($post_id)
// {
//   if ('trash' != get_post_status($post_id)) {
//     if (get_post_type($post_id) != 'computer')
//       return;

//     if (!has_post_thumbnail($post_id)) {
//       // set a transient to show the users an admin message
//       set_transient("has_post_thumbnail", "no");
//       // unhook this function so it doesn't loop infinitely
//       remove_action('save_post', 'wpds_check_thumbnail');
//       wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'));
//       add_action('save_post', 'wpds_check_thumbnail');
//     } else {
//       delete_transient("has_post_thumbnail");
//     }
//   }
// }

// function wpds_thumbnail_error()
// {
//   // check if the transient is set, and display the error message
//   if (get_transient("has_post_thumbnail") == "no") {
//     echo '<div class="notice notice-error is-dismissible">';
//     echo '<p><strong> Error: You must set a featured image before publishing this </strong></p>';
//     echo '</div>';
//     delete_transient("has_post_thumbnail");
//   }
// }

function custom_customize_section($wp_customize)
{
  // Add a new section for header style
  $wp_customize->add_section('custom_header_section', array(
    'title'    => __('Header Style', 'theme-text-domain'),
    'priority' => 30,
  ));

  // Add a setting for heading color
  $wp_customize->add_setting('heading_color_setting', array(
    'default'           => '#fff',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  // Add a control for heading color
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'heading_color_control', array(
    'label'    => __('Heading Color', 'theme-text-domain'),
    'section'  => 'custom_header_section',
    'settings' => 'heading_color_setting',
  )));

  // Add a new section for footer style
  $wp_customize->add_section('custom_footer_section', array(
    'title'    => __('Footer Style', 'theme-text-domain'),
    'priority' => 31, // Adjust the priority to place it after the header section
  ));

  // Add a setting for footer color
  $wp_customize->add_setting('footer_color_setting', array(
    'default'           => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  // Add a control for footer color
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_color_control', array(
    'label'    => __('Footer Color', 'theme-text-domain'),
    'section'  => 'custom_footer_section',
    'settings' => 'footer_color_setting',
  )));
}

add_action('customize_register', 'custom_customize_section');
