<?php
$heading = get_sub_field('featured_speaker_heading');
$speakers = get_sub_field('speakers_list');
$speakers_list = get_sub_field('see_full_speakers_list_link');
?>
<section class="featured-speakers">
  <div class="wrapper">
    <?php if ($heading) { ?>
      <h2 class="featured-speakers-heading"><?php echo $heading; ?></h2>
    <?php } ?>
    <?php if ($speakers) { ?>
      <ul class="speakers-list">
        <?php foreach ($speakers as $speaker) {
          $speaker_id = $speaker->ID;
          $speaker_image_array = get_field('speaker_image', $speaker_id);
          $company_logo_array = get_field('company_logo', $speaker_id);
          $speaker_name = get_field('speaker_name', $speaker_id);
          $speaker_desgnation = get_field('speaker_designation_and_company', $speaker_id);
          $image_size = 'medium';
          $logo_size = 'thumbnail';

          $logoImage = $company_logo_array['id'];
          $speakerImage = $speaker_image_array;
          $resizedLogoImage = wp_get_attachment_image($logoImage, $logo_size);
          $resizedSpeakerImage = wp_get_attachment_image($speakerImage, $image_size); ?>
          <li>
            <?php if ($resizedSpeakerImage) { ?>
              <figure class="speaker-image">
                <?php echo $resizedSpeakerImage; ?>
              </figure>
            <?php } ?>
            <?php if ($resizedLogoImage) { ?>
              <figure class="company-logo">
                <?php echo $resizedLogoImage; ?>
              </figure>
            <?php } ?>
            <?php if ($speaker_name) { ?>
              <h3 class="speaker-name"><?php echo $speaker_name; ?></h3>
            <?php } ?>
            <?php if ($speaker_desgnation) { ?>
              <p class="speaker-designation"><?php echo $speaker_desgnation; ?></p>
            <?php } ?>
          </li>
        <?php } ?>
      </ul>
    <?php } ?>
    <?php if ($speakers_list) { ?>
      <div>
        <a href="<?php echo $speakers_list['url']; ?>" target="<?php echo $speakers_list['target']; ?>" title="<?php echo $speakers_list['title']; ?>"><?php echo $speakers_list['title']; ?></a>
      </div>
    <?php } ?>
  </div>
</section>