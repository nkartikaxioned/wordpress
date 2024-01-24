<?php
  $heading = get_sub_field('want_to_learn_more_heading');
  $description = get_sub_field('want_to_learn_short_description');
  $link = get_sub_field('download_link');
  $image = get_sub_field('want_to_learn_image_');
?>
  <section class="two_container_section">
    <div class="wrapper">
      <?php if ($heading) { ?>
        <h2 class="build_key_connection_section-heading"><?php echo $heading; ?></h2>
      <?php } ?>
      <?php if ($description) { ?>
        <div class="description-container">
          <?php echo $description; ?>
        </div>
      <?php } ?>
      <div class="download-link">
        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" title="<?php echo $link['title']; ?>"><?php echo $link['title']; ?></a>
      </div>
      <?php if ($image) { ?>
        <figure><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></figure>
      <?php } ?>
    </div>
  </section>