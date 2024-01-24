<?php
$heading = get_sub_field('banner_heading');
$description = get_sub_field('banner_description');
?>
<Section class="banner_section">
  <div class="wrapper">
    <?php if (($heading)) { ?>
      <h2 class="ways-to-align-heading"><?php echo $heading; ?></h2>
    <?php } ?>
    <?php if ($description) { ?>
      <div class="description-container">
        <?php echo $description; ?>
      </div>
    <?php } ?>
  </div>
</Section>