<?php

// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function add_normalize_CSS()
{
  wp_enqueue_style('normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
  wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css'));
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
    'hierarchical'          => true,
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

function custom_post_type_speakers()
{

  $labels = array(
    'name'                  => _x('speakers', 'Post Type General Name', 'text_domain'),
    'singular_name'         => _x('speaker', 'Post Type Singular Name', 'text_domain'),
    'menu_name'             => __('speakers', 'text_domain'),
    'all_items'             => __('All speakers', 'text_domain'),
    'add_new_item'          => __('Add New speaker', 'text_domain'),
    'add_new'               => __('Add New', 'text_domain'),
    'new_item'              => __('New speaker', 'text_domain'),
    'edit_item'             => __('Edit speaker', 'text_domain'),
    'update_item'           => __('Update speaker', 'text_domain'),
    'view_item'             => __('View speaker', 'text_domain'),
    'search_items'          => __('Search speakers', 'text_domain'),
    'not_found'             => __('Not Found', 'text_domain'),
    'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
  );
  $args = array(
    'label'                 => __('speaker', 'text_domain'),
    'description'           => __('speakers custom post type', 'text_domain'),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-thumbnails'),
    'hierarchical'          => true,
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
    'rewrite'               => array('slug' => 'speakers'), // Specify the custom post type's slug
  );
  register_post_type('speakers', $args);
}
add_action('init', 'custom_post_type_speakers', 0);

//function to add thumbnail to post
add_theme_support('post-thumbnails');

//function to load/register google maps api
function my_acf_google_map_api($api)
{
  $api['key'] = 'AIzaSyB994u85dM3OYGVa60AD6foZTTouQczgAc';
  return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

//function to add options page 
// if( function_exists('acf_add_options_page') ) {
//   acf_add_options_page(array(
//       'page_title' => 'Website Settings',
//       'menu_title' => 'Website Settings',
//       'menu_slug'  => 'website-settings',
//       'capability' => 'edit_posts',
//       'icon_url'   => 'dashicons-art',
//   ));
// }

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{

  $parent = acf_add_options_page(array(
    // 'page_title'  => __('Website Settings'),
    'menu_title'  => __('Website Settings'),
    'redirect'    => true,
  ));

  // Add sub page.
  $child = acf_add_options_page(array(
    'page_title'  => __('Header Settings'),
    'menu_title'  => __('Header'),
    'parent_slug' => $parent['menu_slug'],
  ));

  $child = acf_add_options_page(array(
    'page_title'  => __('Footer Settings'),
    'menu_title'  => __('Footer'),
    'parent_slug' => $parent['menu_slug'],
  ));
}


function enqueue_custom_script()
{
  wp_enqueue_script('jquery');
  wp_enqueue_script('custom-ajax-script', get_template_directory_uri() . '/js/custom-ajax.js', array('jquery'), null, true);
  wp_localize_script('custom-ajax-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'enqueue_custom_script');

function get_posts_data_callback()
{
  $current_speaker_count = $_POST['current_speaker_count'];
  $args = array(
    'post_type' => 'speakers',
    'posts_per_page' => 3,
    'offset'         => $current_speaker_count,
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $post_id = $query->ID;
      $permalink = get_permalink($post_id);
      $speakerImage = get_field('speaker_image', $post_id);
      $companyLogo = get_field('company_logo', $post_id);
      $speakerName = get_field('speaker_name', $post_id);
      $speakerDesignation = get_field('speaker_designation_and_company', $post_id);
      $size = 'medium';
      $logoSize = 'thumbnail';
      $logoImage = $companyLogo['ID'];
      $resizedLogoImage = wp_get_attachment_image($logoImage, $logoSize);
      $resized_thumbnail = wp_get_attachment_image(get_post_thumbnail_id($post_id), $size);
?>
      <article class="speaker-container">
        <a href="<?php echo $permalink; ?>">
          <?php
          if ($resized_thumbnail) { ?>
            <figure class="speaker-image"><?php echo $resized_thumbnail; ?></figure>
          <?php }
          if ($resizedLogoImage) { ?>
            <figure class="company-logo"><?php echo $resizedLogoImage; ?></figure>
          <?php }
          if ($speakerName) { ?>
            <h4 class="speaker-name"><?php echo $speakerName; ?></h4>
          <?php }
          if ($speakerDesignation) { ?>
            <p class="speaker-designation"><?php echo $speakerDesignation; ?></p>
          <?php } ?>
        </a>
      </article>
    <?php
    }
  }
  wp_die(); // Always include wp_die() to end the script
}

add_action('wp_ajax_get_posts_data', 'get_posts_data_callback');
add_action('wp_ajax_nopriv_get_posts_data', 'get_posts_data_callback'); // For non-logged in users


function get_speaker_data_callback()
{
  $taxonomies_names = $_POST['speaker_names'];

  $args = array(
    'post_type' => 'speakers',
    'tax_query' => array(
      array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $taxonomies_names,
           'compare'  => 'IN',
      ),
    ),
  );

  $query = new WP_Query($args);
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $post_id = $query->ID;
      $permalink = get_permalink($post_id);
      $companyLogo = get_field('company_logo', $post_id);
      $speakerName = get_field('speaker_name', $post_id);
      $speakerDesignation = get_field('speaker_designation_and_company', $post_id);
      $size = 'medium';
      $logoSize = 'thumbnail';
      $logoImage = $companyLogo['ID'];
      $resizedLogoImage = wp_get_attachment_image($logoImage, $logoSize);
      $resized_thumbnail = wp_get_attachment_image(get_post_thumbnail_id($post_id), $size);
    ?>
      <article class="speaker-container">
        <a href="<?php echo $permalink; ?>">
          <h3><?php echo get_the_title(); ?></h3>
          <?php
          if ($resized_thumbnail) { ?>
            <figure class="speaker-image"><?php echo $resized_thumbnail; ?></figure>
          <?php }
          if ($resizedLogoImage) { ?>
            <figure class="company-logo"><?php echo $resizedLogoImage; ?></figure>
          <?php }
          if ($speakerName) { ?>
            <h4 class="speaker-name"><?php echo $speakerName; ?></h4>
          <?php }
          if ($speakerDesignation) { ?>
            <p class="speaker-designation"><?php echo $speakerDesignation; ?></p>
          <?php } ?>
        </a>
      </article>
<?php
    }
  }
  wp_die(); // Always include wp_die() to end the script
  wp_reset_postdata();
}

add_action('wp_ajax_get_speaker_data', 'get_speaker_data_callback');
add_action('wp_ajax_nopriv_get_speaker_data', 'get_speaker_data_callback'); // For non-logged in users

function get_speaker_callback()
{
  $speaker_name = $_POST['speaker_name'];

  $args = array(
    'post_type'      => 'speakers',
    'posts_per_page' => -1,
    'meta_query'    => array(
      'relation'      => 'AND',
      array(
        'key'       => 'speaker_name',
        'value'     => $speaker_name,
        'compare'   => 'IN',
    ),
  ),
  );


  $query = new WP_Query($args);
  var_dump($query);
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $post_id = $query->ID;
      $permalink = get_permalink($post_id);
      $companyLogo = get_field('company_logo', $post_id);
      $speakerName = get_field('speaker_name', $post_id);
      $speakerDesignation = get_field('speaker_designation_and_company', $post_id);
      $size = 'medium';
      $logoSize = 'thumbnail';
      $logoImage = $companyLogo['ID'];
      $resizedLogoImage = wp_get_attachment_image($logoImage, $logoSize);
      $resized_thumbnail = wp_get_attachment_image(get_post_thumbnail_id($post_id), $size);
    ?>
      <article class="speaker-container">
        <a href="<?php echo $permalink; ?>">
          <h3><?php echo get_the_title(); ?></h3>
          <?php
          if ($resized_thumbnail) { ?>
            <figure class="speaker-image"><?php echo $resized_thumbnail; ?></figure>
          <?php }
          if ($resizedLogoImage) { ?>
            <figure class="company-logo"><?php echo $resizedLogoImage; ?></figure>
          <?php }
          if ($speakerName) { ?>
            <h4 class="speaker-name"><?php echo $speakerName; ?></h4>
          <?php }
          if ($speakerDesignation) { ?>
            <p class="speaker-designation"><?php echo $speakerDesignation; ?></p>
          <?php } ?>
        </a>
      </article>
<?php
    }
  }
  wp_die(); // Always include wp_die() to end the script
}

add_action('wp_ajax_get_speaker', 'get_speaker_callback');
add_action('wp_ajax_nopriv_get_speaker', 'get_speaker_callback');

// function my_acf_init() {
//   acf_update_setting('google_api_key', 'AIzaSyB994u85dM3OYGVa60AD6foZTTouQczgAc');
// }
// add_action('acf/init', 'my_acf_init');
//hooks practice
//printing hello all once page is loaded
// function sayHello( $id ) {
//    echo('Hello all' . $id );
// }
// add_action( 'init', 'sayHello', 10 , 2 );

///function and hooks to append hello to title of specific post
// function append_hello_to_custom_post_titles($title)
// {
//   // Check if we are on a custom post type
//   if ('books' === get_post_type()) {
//     // Append "Hello" to the title
//     $title .= ' -- Hello --';
//   }
//   return $title;
// }
// add_filter('the_title', 'append_hello_to_custom_post_titles');

//function to change structure of menu items using hooks

// function customize_menu_output($nav_menu, $args)
// {
//   //var_dump($nav_menu);

//   if ($args->theme_location == 'header-menu') {
//     $nav_menu = str_replace('<li', '<div', $nav_menu);
//     $nav_menu = str_replace('</li>', '</div>', $nav_menu);
//   }

//   return $nav_menu;
// }

// add_filter('wp_nav_menu', 'customize_menu_output', 10, 2);


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

//function to remove default wysiwyg editor and add media button (editor access)
// function remove_wysiwyg_editor() {
//   remove_post_type_support('post', 'editor');
//   remove_post_type_support('page', 'editor');
// }

// add_action('init', 'remove_wysiwyg_editor');
