<section class="featured-speakers">
  <div class="wrapper">
    <div class="quick-add">
      <h3>Quick Draft</h3>
      <input type="text" class="quick-title" name="title" placeholder="title">
      <textarea name="content" class="quick-area" placeholder="content" cols="10" rows="3"></textarea>
      <button class="quick-add-btn">Create Post</button>
    </div>
    <div class="add-container">
      <div class="new-content">
      </div>
      <div class="new-button">
        <a href="#FIXME" class="load-button" title="Load Content">Load Content</a>
      </div>
    </div>
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
          $name = get_field('speaker_name', $id);
          $designation = get_field('speaker_designation_and_company', $id);
          $logo_image = get_field('company_logo', $id);
          $logo_id = $logo_image['ID'];
          $size = 'thumbnail';
          $resized_speaker_image = wp_get_attachment_image($logo_id, $size);
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