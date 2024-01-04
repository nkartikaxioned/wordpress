<?php
// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function add_normalize_CSS() {
   wp_enqueue_style( 'normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}

add_action('wp_enqueue_scripts', 'add_normalize_CSS');

// Register Custom Post Type
function custom_post_type_books() {

    $labels = array(
        'name'                  => _x( 'Books', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Book', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Books', 'text_domain' ),
        'all_items'             => __( 'All Books', 'text_domain' ),
        'add_new_item'          => __( 'Add New Book', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Book', 'text_domain' ),
        'edit_item'             => __( 'Edit Book', 'text_domain' ),
        'update_item'           => __( 'Update Book', 'text_domain' ),
        'view_item'             => __( 'View Book', 'text_domain' ),
        'search_items'          => __( 'Search Books', 'text_domain' ),
        'not_found'             => __( 'Not Found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    );
   $args = array(
    'label'                 => __( 'Book', 'text_domain' ),
    'description'           => __( 'Books custom post type', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', 'categories', 'tags' ),
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
    register_post_type( 'books', $args );

}
add_action( 'init', 'custom_post_type_books', 0 );

