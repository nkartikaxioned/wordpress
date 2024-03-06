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
  $header_background_color = get_theme_mod('heading_color_setting', '#f74df7'); // Default color if not set
  $style = 'style="background-color:' . esc_attr($header_background_color) . ';"';
  ?>
  <header class="fixed top-0 left-0 w-full z-[1]" <?php echo $style; ?>>
    <div class="wrapper flex">
      <?php if ($site_logo) { ?>
        <h1>
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img class="w-16 h-10" src="<?php echo $site_logo['url']; ?>" class="logo-image" alt="<?php echo $site_logo['alt']; ?>" title="<?php echo $site_logo['title']; ?>">
          </a>
        </h1>
      <?php }
      wp_nav_menu(array('theme_location' => 'header-menu'));
      ?>
      <!-- <div class="search">
        <input class="search-value" type="search" placeholder="Search">
        <div>
          <a href="#fixme" class="search-btn">Search</a>
        </div>
      </div> -->
      <div class="hamburger justify-center hover:cursor-pointer z-[1] hidden">
          <span class="bar text-[0] block min-w-[25px] h-[1px] pb-[2px] border-solid border-b-2">bar</span>
          <span class="bar text-[0] block min-w-[25px] h-[1px] pb-[2px] border-solid border-b-2">bar</span>
          <span class="bar text-[0] block min-w-[25px] h-[1px] pb-[2px] border-solid border-b-2">bar</span>
        </div>
    </div>
  </header>