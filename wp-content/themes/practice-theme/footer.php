<footer>
  <?php //wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
  <?php //wp_nav_menu(array('theme_location' => 'footer-secondary-menu')); ?>
      <!-- <p>Copyright &copy; 2024</p> -->
    </footer>
    <?php 
     $site_logo = get_field('site_logo', 'option');
     if(!empty($site_logo)){ ?>
     <figure class="site-logo"><img src="<?php echo $site_logo['url']; ?>" alt="<?php echo $site_logo['alt']; ?>"></figure>
     <?php }
    ?>
    <?php wp_footer(); ?>
  </body>
</html>