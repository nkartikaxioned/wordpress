<?php
$heading = get_sub_field('section_heading');
$logo_gallerys = get_sub_field('companies_logo_image_gallery');
?>
<section class="partnered-company-section">
  <div class="wrapper">
    <?php if ($heading) { ?>
      <h2 class="partnered_company_section-heading"><?php echo $heading; ?></h2>
    <?php } ?>
    <?php if ($logo_gallerys) {
      foreach ($logo_gallerys as $logo_gallery) {
        $logo_id = $logo_gallery;
        $image_size = 'medium';
        $resizedSpeakerImage = wp_get_attachment_image($logo_id, $image_size);
    ?>
        <?php if ($resizedSpeakerImage) { ?>
          <figure><?php echo $resizedSpeakerImage; ?></figure>
        <?php } ?>
      <?php
      }
      ?>
    <?php } ?>
  </div>
</section>