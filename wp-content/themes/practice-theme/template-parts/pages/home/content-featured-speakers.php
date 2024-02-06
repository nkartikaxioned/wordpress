<section class="featured-speakers">
    <div class="wrapper">
      <?php
      $sectionTitle = get_sub_field('speakers_section_title');
      $speakers = get_sub_field('speakers');
      ?>
      <?php if ($sectionTitle) : ?>
        <h4 class="featured-speakers-heading heading"><?php echo $sectionTitle; ?></h4>
      <?php endif; ?>
      <?php if ($speakers) : ?>
        <ul>
          <?php
          foreach ($speakers as $speaker) {
            $id = $speaker->ID;
            $name = get_field('speaker_name',$id);
            $designation = get_field('speaker_designation_and_company',$id);
            $logo_image = get_field('company_logo',$id);
            $logo_id = $logo_image['ID'];
            $size = 'thumbnail';
            $resized_speaker_image = wp_get_attachment_image($logo_id,$size);
          ?>
          <li>
              <?php if ($resized_speaker_image) { ?>
                <figure class="speaker-img"><?php echo $resized_speaker_image; ?></figure>
              <?php } ?>
            <div class="speaker-content">
            <?php if ($name) { ?>
              <p><?php echo $name; ?></p>
            <?php } ?>
            <?php if ($designation) { ?>
              <p class="designation"><?php echo $designation; ?></p>
            <?php } ?>
            </div>
          <?php } ?>
          </li>
        </ul>
      <?php endif; ?>
    </div>
  </section>