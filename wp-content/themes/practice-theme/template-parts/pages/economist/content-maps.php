<?php
$map = get_sub_field('google_map');
?>
<section class="google-maps">
  <div class="wrapper">
    <?php
    if ($map) { ?>
      <div class="acf-map" data-zoom="16">
        <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
      </div>
    <?php } ?>
  </div>
</section>