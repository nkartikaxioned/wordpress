<footer>
  <?php //wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
  <?php //wp_nav_menu(array('theme_location' => 'footer-secondary-menu')); ?>
      <!-- <p>Copyright &copy; 2024</p> -->
    </footer>
    <?php 
     $copy_right = get_field('copyright_text', 'option');
     if($copy_right){ ?>
     <div class="copy-right">
     <p><?php echo $copy_right; ?></p>
     </div>
     <?php }
    ?>
    <?php wp_footer(); ?>
  </body>
</html>