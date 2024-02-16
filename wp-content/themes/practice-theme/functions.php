<?php

// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function add_normalize_CSS()
{
  wp_enqueue_style('normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
  wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/css/style.css'));
  wp_enqueue_style('font-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css");
  // wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/css/style.css', array(), filemtime(get_template_directory() . '/css/style.css'));
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
      // "footer-secondary-menu" => __("Footer Secondary Menu")
    )
  );
}

add_action('after_setup_theme', 'theme_setup');

// Register Custom Post Type

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
    'taxonomies'            => array('category'), // Add support for categories and tags
    'rewrite'               => array('slug' => 'speakers'), // Specify the custom post type's slug
  );
  register_post_type('speakers', $args);
}
add_action('init', 'custom_post_type_speakers', 0);

function custom_post_type($plural_name, $singular_name)
{

  $labels = array(
    'name'                  => _x($plural_name, 'Post Type General Name', 'text_domain'),
    'singular_name'         => _x($singular_name, 'Post Type Singular Name', 'text_domain'),
    'menu_name'             => __($plural_name, 'text_domain'),
    'all_items'             => __('All ' . $plural_name, 'text_domain'),
    'add_new_item'          => __('Add New ' . $singular_name, 'text_domain'),
    'add_new'               => __('Add New', 'text_domain'),
    'new_item'              => __('New ' . $singular_name, 'text_domain'),
    'edit_item'             => __('Edit ' . $singular_name, 'text_domain'),
    'update_item'           => __('Update ' . $singular_name, 'text_domain'),
    'view_item'             => __('View ' . $singular_name, 'text_domain'),
    'search_items'          => __('Search ' . $plural_name, 'text_domain'),
    'not_found'             => __('Not Found', 'text_domain'),
    'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
  );
  $args = array(
    'label'                 => __($singular_name, 'text_domain'),
    'description'           => __($plural_name . ' custom post type', 'text_domain'),
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
    'rewrite'               => array('slug' => $plural_name), // Specify the custom post type's slug
  );
  register_post_type($plural_name, $args);
}

function custom_post_bottles()
{
  $plural_name = 'Bottles';
  $singular_name = 'Bottle';
  custom_post_type($plural_name, $singular_name);
}

add_action('init', 'custom_post_bottles');

function custom_post_books()
{
  $plural_name = 'Books';
  $singular_name = 'Book';
  custom_post_type($plural_name, $singular_name);
}

add_action('init', 'custom_post_books', 0);

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
    'menu_title'  => __('Website Settings'),
    'redirect'    => true,
  ));

  // Add sub page.
  acf_add_options_page(array(
    'page_title'  => __('Header Settings'),
    'menu_title'  => __('Header'),
    'parent_slug' => $parent['menu_slug'],
  ));

  acf_add_options_page(array(
    'page_title'  => __('Footer Settings'),
    'menu_title'  => __('Footer'),
    'parent_slug' => $parent['menu_slug'],
  ));
}


function enqueue_custom_script()
{
  //wp_enqueue_script('jquery');
  wp_enqueue_script('custom-ajax-script', get_template_directory_uri() . '/js/custom-ajax.js', array('jquery'), null, true);
  wp_localize_script('custom-ajax-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
  wp_enqueue_script('rest-script', get_template_directory_uri() . '/js/rest.js', null, 1.0, true);
  wp_localize_script('rest-script', 'restObj', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'restNonce' => wp_create_nonce('wp_rest')
  ));
}

add_action('wp_enqueue_scripts', 'enqueue_custom_script');

function print_data($query)
{
  ob_start(); // Start output buffering

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

  $output = ob_get_clean(); // Get the output and clean the buffer
  return $output;
}


// function get_posts_data_callback()
// {
//   $current_speaker_count = $_POST['current_speaker_count'];
//   $args = array(
//     'post_type' => 'speakers',
//     'posts_per_page' => 3,
//     'offset'         => $current_speaker_count,
//   );
//   $query = new WP_Query($args);
//   if ($query) {
//     echo print_data($query);
//   }
//   wp_die(); // Always include wp_die() to end the script
//   wp_reset_postdata();
// }

// add_action('wp_ajax_get_posts_data', 'get_posts_data_callback');
// add_action('wp_ajax_nopriv_get_posts_data', 'get_posts_data_callback'); // For non-logged in users


function get_speaker_data_callback()
{
  $taxonomies_names = $_POST['speaker_names'];
  $current_speaker_count = $_POST['current_speaker_count'];
  $args = array(
    'post_type' => 'speakers',
    'posts_per_page' => 3,
    'offset' => $current_speaker_count,
  );

  if (isset($taxonomies_names) && !empty($taxonomies_names)) {
    $args['tax_query'] = array(
      'relation' => 'AND',
      array(
        'taxonomy' => 'category',
        'field'    => 'slug',
        'terms'    => $taxonomies_names,
        'compare'  => '=',
      ),
    );
  }

  $query = new WP_Query($args);
  if ($query) {
    echo print_data($query);
    wp_reset_postdata();
  }
  wp_die();
}

add_action('wp_ajax_get_speaker_data', 'get_speaker_data_callback');
add_action('wp_ajax_nopriv_get_speaker_data', 'get_speaker_data_callback'); // For non-logged in users

//add menu to customise menu in appearance
function custom_customize_section($wp_customize)
{
  // Add a new section for header style
  $wp_customize->add_section('custom_header_section', array(
    'title'    => __('Header Style', 'theme-text-domain'),
    'priority' => 30,
  ));

  // Add a setting for heading color
  $wp_customize->add_setting('heading_color_setting', array(
    'default'           => '#000',
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

//function to make featured image in post required
add_action('save_post', 'wpds_check_thumbnail');
add_action('admin_notices', 'wpds_thumbnail_error');

function wpds_check_thumbnail($post_id)
{
  if ('trash' != get_post_status($post_id)) {
    if (get_post_type($post_id) != 'speakers')
      return;

    if (!has_post_thumbnail($post_id)) {
      // set a transient to show the users an admin message
      set_transient("has_post_thumbnail", "no");
      // unhook this function so it doesn't loop infinitely
      remove_action('save_post', 'wpds_check_thumbnail');
      wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'));
      add_action('save_post', 'wpds_check_thumbnail');
    } else {
      delete_transient("has_post_thumbnail");
    }
  }
}

function wpds_thumbnail_error()
{
  // check if the transient is set, and display the error message
  if (get_transient("has_post_thumbnail") == "no") {
    echo '<div class="notice notice-error is-dismissible">';
    echo '<p><strong> Error: You must set a featured image before publishing this </strong></p>';
    echo '</div>';
    delete_transient("has_post_thumbnail");
  }
}

/////
function custom_register_user_route()
{
  register_rest_route('cur/v1', '/register/', array(
    'methods'  => 'POST',
    'callback' => 'custom_handle_registration',
    'permission_callback' => '__return_true'
  ));
}

function custom_handle_registration()
{
  $username = 'maxpayne3';
  $email = 'max3@email.com';
  $password = 'Pass@123#word';
  $role = 'subscriber';

  $user_id = wp_create_user($username, $password, $email);

  if (is_wp_error($user_id)) {
    return new WP_Error('registration_failed', $user_id->get_error_message(), array('status' => 400));
  }

  $user = new WP_User($user_id);
  $user->set_role($role);

  return array('message' => 'Registration successful!', 'user_id' => $user_id, 'user_role' => $role);
}

add_action('rest_api_init', 'custom_register_user_route');
////

// function get_speaker_callback()
// {
//   $speaker_name = $_POST['speaker_name'];
//   if ($speaker_name) {
//     $args = array(
//       'post_type'      => 'speakers',
//       'posts_per_page' => -1,
//       'meta_query'    => array(
//         'relation'      => 'AND',
//         array(
//           'key'       => 'speaker_name',
//           'value'     => $speaker_name,
//           'compare'   => 'LIKE',
//         ),
//       ),
//     );


//     $query = new WP_Query($args);
//     if ($query) {
//       echo print_data($query);
//     }
//     wp_die(); // Always include wp_die() to end the script
//     wp_reset_postdata();
//   } else {
//     echo "<h3>Enter Name to Search</h3>";
//   }
// }

// add_action('wp_ajax_get_speaker', 'get_speaker_callback');
// add_action('wp_ajax_nopriv_get_speaker', 'get_speaker_callback');

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
function customize_menu_output($nav_menu, $args)
{
  if ($args->theme_location == 'header-menu') {
    $nav_menu = preg_replace('/<div/', '<nav', $nav_menu);
    $nav_menu = preg_replace('/<\/div>/', '</nav>', $nav_menu);
  }

  return $nav_menu;
}
add_filter('wp_nav_menu', 'customize_menu_output', 10, 2);


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

// var_dump(curl_version());
?>