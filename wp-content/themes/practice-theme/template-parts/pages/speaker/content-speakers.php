<article class="speaker-card">
    <?php foreach ($featured_posts as $featured_post) {
      $post_id = $featured_post->ID;
      $permalink = get_permalink($post_id);
      $speakerImage = get_field('speaker_image', $post_id);
      $companyLogo = get_field('company_logo', $post_id);
      $speakerName = get_field('speaker_name', $post_id);
      $speakerDesignation = get_field('speaker_designation_and_company', $post_id);
      $size = 'medium';
      $logoSize = 'thumbnail';
      $logoImage = $companyLogo['ID'];
      $resizedLogoImage = wp_get_attachment_image($logoImage, $logoSize);
    ?>
      <a href="<?php echo $permalink; ?>">
        <?php $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post_id));
        $resized_thumbnail = wp_get_attachment_image(get_post_thumbnail_id($post_id), $size);
        if ($resized_thumbnail) { ?>
          <figure class="speaker-image"><?php echo $resized_thumbnail; ?></figure>
        <?php }
        if ($resizedLogoImage) { ?>
          <figure class="company-logo"><?php echo $resizedLogoImage; ?></figure>
        <?php } 
        if ($speakerName) { ?>
          <h4 class="speaker-name"><?php echo $speakerName; ?></h4>
        <?php } 
         if ($speakerDesignation) { ?>
          <p class="speaker-designation"><?php echo $speakerDesignation; ?></p>
        <?php } ?>
      </a>
    <?php } ?>
  </article>