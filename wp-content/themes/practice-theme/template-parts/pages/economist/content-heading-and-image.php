<?php
$heading = get_sub_field('section_heading');
$image = get_sub_field('section_single_image');
?>
<section class="section-with-heading-image">
  <div class="wrapper">
    <?php if ($heading) { ?>
      <h2 class="section-with-heading-image-heading"><?php echo $heading; ?></h2>
    <?php } ?>
    <?php if ($image) { ?>
      <figure><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></figure>
    <?php } ?>
  </div>
</section>