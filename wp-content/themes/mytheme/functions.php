<?php

function enqueue_style_and_script(){
  wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.js', array(), null, true);
  wp_enqueue_script('jquery-ui', get_stylesheet_directory_uri() . '/js/jquery-ui.min.js', array('jquery'), null, true);
  wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.js', array('jquery'), null, true);
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css', array(), null);
  wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap'), null);
}
add_action('wp_enqueue_scripts', 'enqueue_style_and_script');

function customtheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'customtheme_add_woocommerce_support');


