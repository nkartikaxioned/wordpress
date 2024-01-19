<?php
/*
Template Name: Speaker Listing Template
*/
?>
<?php
//397
$featured_posts = get_field('speakers_list');
if ($featured_posts) { ?>
  <article class="speaker-card">
    <?php foreach ($featured_posts as $featured_post) {
      $permalink = get_permalink($featured_post->ID);
      $post_id = $featured_post->ID;
      $speakerImage = get_field('speaker_image', $post_id);
      $companyLogo = get_field('company_logo', $post_id);
      $speakerName = get_field('speaker_name', $post_id);
      $speakerDesignation = get_field('speaker_designation_and_company', $post_id);
      $size = 'medium';
      $logoSize = 'thumbnail';
      $logoImage = $companyLogo['ID'];
      $speakerImage = $speakerImage['ID'];
      $resizedLogoImage = wp_get_attachment_image($logoImage, $logoSize);
      $resizedSpeakerImage = wp_get_attachment_image($speakerImage, $size);
      $page_id = 397;
      $post_link = get_permalink($page_id) . '?post_id=' . $post_id;
      $post_link = isset($post_link) ? $post_link : '#FIXME';
    ?>
      <a href="<?php echo $post_link; ?>">
        <?php if (!empty($resizedSpeakerImage)) { ?>
          <figure class="speaker-image"><?php echo $resizedSpeakerImage; ?></figure>
        <?php } ?>
        <?php if (!empty($resizedSpeakerImage)) { ?>
          <figure class="company-logo"><?php echo $resizedLogoImage; ?></figure>
        <?php } ?>
        <?php if (!empty($resizedSpeakerImage)) { ?>
          <h4 class="speaker-name"><?php echo $speakerName; ?></h4>
        <?php } ?>
        <?php if (!empty($resizedSpeakerImage)) { ?>
          <p class="speaker-designation"><?php echo $speakerDesignation; ?></p>
        <?php } ?>
      </a>
    <?php } ?>
  </article>
<?php } ?>