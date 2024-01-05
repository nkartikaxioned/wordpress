<?php
// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function add_normalize_CSS()
{
  wp_enqueue_style('normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}

add_action('wp_enqueue_scripts', 'add_normalize_CSS');

// functions.php

function theme_setup() {
  // Register 'header-menu' as a theme location
  register_nav_menu('header-menu', 'Header Menu');
}

add_action('after_setup_theme', 'theme_setup');

// Register Custom Post Type
function custom_post_type_books()
{

  $labels = array(
    'name'                  => _x('Books', 'Post Type General Name', 'text_domain'),
    'singular_name'         => _x('Book', 'Post Type Singular Name', 'text_domain'),
    'menu_name'             => __('Books', 'text_domain'),
    'all_items'             => __('All Books', 'text_domain'),
    'add_new_item'          => __('Add New Book', 'text_domain'),
    'add_new'               => __('Add New', 'text_domain'),
    'new_item'              => __('New Book', 'text_domain'),
    'edit_item'             => __('Edit Book', 'text_domain'),
    'update_item'           => __('Update Book', 'text_domain'),
    'view_item'             => __('View Book', 'text_domain'),
    'search_items'          => __('Search Books', 'text_domain'),
    'not_found'             => __('Not Found', 'text_domain'),
    'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
  );
  $args = array(
    'label'                 => __('Book', 'text_domain'),
    'description'           => __('Books custom post type', 'text_domain'),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'thumbnail', 'categories', 'tags'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'show_in_nav_menus'     => true,
    'show_in_admin_bar'     => true,
    'menu_position'         => 5,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post', // Change to 'post' for standard posts
    'taxonomies'            => array('category', 'post_tag'), // Add support for categories and tags
    'rewrite'               => array('slug' => 'books'), // Specify the custom post type's slug
  );
  register_post_type('books', $args);
}
add_action('init', 'custom_post_type_books', 0);

//hooks practice
//printing hello all once page is loaded
// function sayHello( $id ) {
//    echo('Hello all' . $id );
// }
// add_action( 'init', 'sayHello', 10 , 2 );

///function and hooks to append hello to title of specific post
function append_hello_to_custom_post_titles($title)
{
  // Check if we are on a custom post type
  if ('books' === get_post_type()) {
    // Append "Hello" to the title
    $title .= ' -- Hello --';
  }
  return $title;
}
add_filter('the_title', 'append_hello_to_custom_post_titles');

//function to change structure of menu using hooks
// function modify_menu_structure($items, $menu, $args) {
//   // Check if this is the primary menu (replace 'primary' with your menu location or theme location)
//   if ($args->theme_location == 'header-menu') {
//       foreach ($items as &$item) {
//           // Replace <li> with <div>
//           // $item->classes[] = 'menu-item-div'; // Add a class for styling purposes
//           // $item->menu_item_parent = ''; // Remove parent relationship
//           // $item->type = 'div'; // Change the item type to 'div'
//           echo"itemmmm";
//       }
//   }

//   return $items;
// }

// add_filter('wp_get_nav_menu_items', 'modify_menu_structure', 10, 3);


// add_filter( 'wp_nav_menu_items', 'prefix_add_div', 10, 2 );

// function prefix_add_div( $items, $args ) {
//     $items = '<div></div>' . $items . '<div></div>';
//     return $items;
// }

add_filter( 'wp_nav_menu_objects', function( $items ) {
  foreach ( $items as $item ) {
    if (!$item->menu_item_parent) {
       $item->title = '<div>' . $item->title . '</div>';
    }
}
return $items;
});
