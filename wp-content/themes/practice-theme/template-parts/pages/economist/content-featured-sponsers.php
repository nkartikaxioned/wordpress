<?php
$heading = get_sub_field('featured_sponsor_heading');
$sponsors = get_sub_field('sponsors_field_repeater');
?>
<section class="featured-sponsors-section">
  <div class="wrapper">
    <?php if ($heading) { ?>
      <h2 class="featured-sponsors-section-heading"><?php echo $heading; ?></h2>
    <?php }
    foreach ($sponsors as $sponsor) {
      $title = $sponsor['sponsor_title'];
      $image = $sponsor['sponsor_image'];
      $image_size = 'medium';
      $resized_sponsor_image = wp_get_attachment_image($image, $image_size);
    ?>
      <ul>
        <li>
          <?php if ($title) { ?>
            <h4 class="featured-sponsors-section-heading"><?php echo $title; ?></h4>
          <?php } ?>
          <figure><?php echo $resized_sponsor_image; ?></figure>
        </li>
      </ul>

    <?php }
    ?>
  </div>
</section>