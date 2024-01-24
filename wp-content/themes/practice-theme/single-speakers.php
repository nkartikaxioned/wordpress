<?php

// Get the post ID from the URL parameter
// $post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;
$post_id = url_to_postid(get_permalink());
// Get post data
$post = get_post($post_id);
if ($post_id) {
   $post_title = $post->post_title;
  $speaker_image = $post->speaker_image;
  $speaker_image_url = wp_get_attachment_image_src($speaker_image, 'medium');
  $speaker_image_alt = get_post_meta($speaker_image, '_wp_attachment_image_alt', true);
  $company_logo = $post->company_logo;
  $company_image_url = wp_get_attachment_image_src($company_logo, 'thumbnail');
  $company_image_alt = get_post_meta($company_logo, '_wp_attachment_image_alt', true);
  $speaker_name = $post->speaker_name;
  $designation = $post->speaker_designation_and_company;
  $description = $post->speaker_description;
?>
  <section class="speaker-detail">
    <div class="wrapper">
      <?php if ($post_title) { ?>
        <h2><?php echo $post_title; ?></h2>
      <?php } ?>
      <?php if ($speaker_image) { ?>
        <figure class="speaker-image"><img src="<?php echo $speaker_image_url[0]; ?>" alt="<?php echo $speaker_image_alt; ?>"></figure>
      <?php } ?>
      <?php if ($company_logo) { ?>
        <figure class="company-logo"><img src="<?php echo $company_image_url[0]; ?>" alt="<?php echo $company_image_alt; ?>"></figure>
      <?php } ?>
      <?php if ($speaker_name) { ?>
        <h3 class="speaker-name"><?php echo $speaker_name; ?></h3>
      <?php } ?>
      <?php if ($designation) { ?>
        <p class="speaker-designation"><?php echo $designation; ?></p>
      <?php } ?>
      <?php if ($description) { ?>
        <p class="speaker-description"><?php echo $description; ?></p>
      <?php } ?>
    </div>
  </section>
<?php
} else {
  echo "Post not found";
}
?>