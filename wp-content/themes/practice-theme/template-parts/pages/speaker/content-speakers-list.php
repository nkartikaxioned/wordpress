<!-- page speaker listing -->
<section class="all-speakers">
  <div class="wrapper">
  <ul class="check-box">
    <li>
      <div>
        <div>
          <input type="checkbox" id="Entertainer Speaker" name="list[]" value="Entertainer Speaker">Entertainer Speaker
        </div>
        <div>
          <input type="checkbox" id="Guest speakers" name="list[]" value="Guest Speakers">Guest speakers
        </div>
        <div>
          <input type="checkbox" id="Keynote speakers" name="list[]" value="Keynote Speakers">Keynote speakers
        </div>
      </div>
      <div class="button-container">
        <a href="#FIXME" class="filter button">Filter</a>
      </div>
    </li>
    <li>
      <div class="input-container">
        <input type="text" class="speakers-name" placeholder="Enter Speaker Name">
      </div>
      <div class="button-container">
        <a href="#FIXME" class="search button">Search</a>
      </div>
    </li>
    <li>
      <div class="button-container">
        <a href="#FIXME" class="clear-button">Reset Filters</a>
      </div>
    </li>
  </ul>
  <div class="speakers-list">
    <?php
    $args = array(
      'post_type' => 'speakers',
      'posts_per_page' => 6,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        $post_id = $query->ID;
        $permalink = get_permalink($post_id);
        $speakerImage = get_field('speaker_image', $post_id);
        $companyLogo = get_field('company_logo', $post_id);
        $speakerName = get_field('speaker_name', $post_id);
        $speakerDesignation = get_field('speaker_designation_and_company', $post_id);
        $size = 'medium';
        $logoSize = 'thumbnail';
        $logoImage = $companyLogo['ID'];
        $resizedLogoImage = wp_get_attachment_image($logoImage, $logoSize);
        $resized_thumbnail = wp_get_attachment_image(get_post_thumbnail_id($post_id), $size);
    ?>
        <article class="speaker-container">
          <a href="<?php echo $permalink; ?>">
            <?php
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
        </article>
    <?php
      }
    } ?>
  </div>
  <div class="load-more-container">
    <button id="load-more-button">Load More</button>
    <button id="show-less-button">Show Less</button>
  </div>
  </div>
</section>