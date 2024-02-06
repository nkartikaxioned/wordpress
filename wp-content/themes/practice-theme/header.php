<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php $site_logo = get_field('site_logo', 'option'); ?>
 <?php
  $header_background_color = get_theme_mod('heading_color_setting', '#000'); // Default color if not set
  $style = 'style="background-color:' . esc_attr($header_background_color) . ';"';
 ?>
  <header class="header-section" <?php echo $style; ?>>
    <div class="wrapper">
    <?php if($site_logo) { ?>
      <h1>
        <a href="<?php  echo esc_url(home_url('/')); ?>">
          <img src="<?php echo $site_logo['url']; ?>" class="logo-image" alt="<?php echo $site_logo['alt']; ?>" title="<?php echo $site_logo['title']; ?>">
        </a>
      </h1>
      <?php }
      wp_nav_menu(array('theme_location' => 'header-menu')); 
    ?>
    </div>
  </header>
