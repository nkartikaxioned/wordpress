<?php 
$footer_background_color = get_theme_mod('footer_color_setting','#f74df7'); 
$footer_style = 'style="background-color:' . esc_attr($footer_background_color) . ';"';
?>
<footer <?php echo $footer_style; ?>>
<div class="wrapper">
<?php
wp_nav_menu(array('theme_location' => 'footer-menu'));
  $copy_right = get_field('copyright_text', 'option');
  if ($copy_right) { ?>
    <div class="copy-right">
      <p><?php echo $copy_right; ?></p>
    </div>
  <?php } ?>
</footer>
<?php wp_footer(); ?>
</div>
</body>

</html>
