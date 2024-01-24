<!DOCTYPE html>
<html <?php language_attributes(); ?> 
<head>
<title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- <header class="my-logo">
    <h1><a href="<?php // echo esc_url(home_url('/')); ?>"><?php //bloginfo('name'); ?></a></h1>
  </header> -->
  <?php //wp_nav_menu(array('theme_location' => 'header-menu')); 
  $site_logo = get_field('site_logo', 'option');
  if(!empty($site_logo)){ ?>
  <figure class="site-logo"><img src="<?php echo $site_logo['url']; ?>" alt="<?php echo $site_logo['alt']; ?>"></figure>
  <?php }
  ?>
  