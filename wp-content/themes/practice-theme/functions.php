<?php
// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function add_normalize_CSS()
{
  wp_enqueue_style('normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}

add_action('wp_enqueue_scripts', 'add_normalize_CSS');

//functions.php registering header nav as Header Menu

function theme_setup()
{
  // Register 'header-menu' as a theme location
  register_nav_menus(
    array(
      "header-menu" =>  __("Header Menu"),
      "footer-menu" => __("Footer Menu"),
      "footer-secondary-menu" => __("Footer Secondary Menu")
    )
  );
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

//function to change structure of menu items using hooks

function customize_menu_output($nav_menu, $args)
{
  //var_dump($nav_menu);

  if ($args->theme_location == 'header-menu') {
    $nav_menu = str_replace('<li', '<div', $nav_menu);
    $nav_menu = str_replace('</li>', '</div>', $nav_menu);
  }

  return $nav_menu;
}

add_filter('wp_nav_menu', 'customize_menu_output', 10, 2);


// function customize_menu_output($nav_menu, $args) {
//   if ($args->theme_location == 'header-menu') {
//       $nav_menu = preg_replace('/<li/', '<div', $nav_menu);
//       $nav_menu = preg_replace('/<\/li>/', '</div>', $nav_menu);
//   }

//   return $nav_menu;
// }
// add_filter('wp_nav_menu', 'customize_menu_output', 10, 2);


//adding data attribute to link tag

// function add_data_attribute_to_stylesheet($tag, $handle, $src)
// {
//   $style_ids = array();
//   $style_ids[] = $handle;
//   //  var_dump($style_ids) ;
//   if($handle == "dashicons-css"){
//   $tag = '<link rel="stylesheet" src="' . esc_url($src) . ' id ='. $handle .' data-hello-key="hello">';
//   return $tag;
// }
// }

// // add_filter('style_loader_tag', 'add_data_attribute_to_stylesheet', 10, 3);

// //adding data attribute to script tag

// add_filter('script_loader_tag', 'add_data_attribute_to_script', 10, 3);

// function add_data_attribute_to_script($tag, $handle, $src)
// {
//   $script_ids = array();
//   $script_ids[] = $handle;
//   //var_dump($script_ids) ;
//   if($handle == "admin-bar"){
//   $tag = '<script type="text/javascript" src="' . esc_url($src) .' id ='. $handle . ' data-hola-key="hola"></script>';
//   return $tag;
//   }
// }
/////////////////////////////////////////////////////
function my_acf_load_field( $field ) {
    
  // make required
  $field['required'] = true;
  
  
  // customize instructions with icon
  $field['instructions'] = '<i class="help" title="Instructions here"></i>';
  
  
  // customize wrapper element
  $field['wrapper']['id'] = 'my-custom-id';
  $field['wrapper']['data-jsify'] = '123';
  $field['wrapper']['title'] = 'Text here';
  
  
  // return
  return $field;
  
}

add_filter('acf/load_field/name=description', 'my_acf_load_field');
?>