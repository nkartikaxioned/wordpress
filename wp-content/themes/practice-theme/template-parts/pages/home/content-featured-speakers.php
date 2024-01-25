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
          ?>
            <?php if ($name) : ?>
              <p><?php echo $name; ?></p>
            <?php endif; ?>
            <?php if ($designation) : ?>
              <p><?php echo $designation; ?></p>
            <?php endif; ?>
            <?php if ($logo_image) : ?>
              <figure><img src="<?php echo $logo_image['url']; ?>" alt="<?php echo $logo_image['alt']; ?>"></figure>
            <?php endif; ?>
          <?php } ?>
        </ul>
      <?php endif; ?>
    </div>
  </section>