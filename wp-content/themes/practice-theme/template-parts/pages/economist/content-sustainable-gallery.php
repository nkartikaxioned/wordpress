<?php
$heading = get_sub_field('sustainable_gallery_heading');
$gallerys = get_sub_field('images_for_sustainable_gallery');
$sub_heading = get_sub_field('full_width_media_heading');
$image = get_sub_field('full_width_media_image');
?>
<section class="sustainable-gallery">
  <div class="wrapper">
    <?php if ($heading) { ?>
      <h2 class="sustainable-gallery-heading"><?php echo $heading; ?></h2>
    <?php } ?>
    <?php if ($gallerys) { ?>
      <ul class="gallery">
        <?php foreach ($gallerys as $gallery) {
          $image_id = $gallery["ID"];
          $size = 'medium';
          $gallery_image = wp_get_attachment_image($image_id, $size);
        ?>
          <li>
            <?php if ($gallery_image) { ?>
              <figure><?php echo $gallery_image; ?></figure>
            <?php } ?>
          </li>
        <?php } ?>
      </ul>
    <?php } ?>
  </div>
</section>