<?php
get_header();
  $post = get_post($post_id);
  $post_title = $post->post_title;
  $speaker_image = $post->speaker_image;
  $speaker_image_url = wp_get_attachment_image_src($speaker_image, 'medium');
  $speaker_image_alt = get_the_post_thumbnail($post);
  $company_logo = $post->company_logo;
  $company_image_url = wp_get_attachment_image_src($company_logo, 'thumbnail');
  $company_image_alt = get_post_meta($company_logo, '_wp_attachment_image_alt', true);
  $designation = $post->speaker_designation_and_company;
  $description = $post->speaker_description;
?>
  <section class="speaker-content py-5">
    <div class="wrapper text-center flex flex-col justify-center items-center">
      <?php if ($post_title) { ?>
        <h2 class="pt-10 text-3xl font-bold pb-5"><?php echo $post_title;?></h2>
      <?php } ?>
      <?php if ($speaker_image_alt) { ?>
        <figure class="speaker-image w-[50%] pb-4">
          <?php echo $speaker_image_alt; ?> 
        </figure>
      <?php } ?>
      <?php if ($company_logo) { ?>
        <figure class="">
          <img src="<?php echo $company_image_url[0]; ?>" alt="<?php echo $company_image_alt; ?>">
        </figure>
      <?php } ?>
      <?php if ($designation) { ?>
        <p class="speaker-designation text-xl font-bold py-3"><?php echo $designation; ?></p>
      <?php } ?>
      <?php if ($description) { ?>
        <p class="speaker-description"><?php echo $description; ?></p>
      <?php } ?>
    </div>
  </section>
  <?php get_footer(); ?>
