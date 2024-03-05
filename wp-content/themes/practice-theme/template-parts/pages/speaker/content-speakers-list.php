<!-- page speaker listing -->
<section class="all-speakers pt-5">
  <div class="wrapper">
  <ul class="check-box flex flex-wrap mb-6 w-full">
    <li class="basis-1/3 flex min-w-[350px] max-lg:pb-4">
      <div>
        <div>
          <input type="checkbox" id="Entertainer Speaker" name="list[]" value="Entertainer Speaker"> Entertainer Speaker
        </div>
        <div>
          <input type="checkbox" id="Guest speakers" name="list[]" value="Guest Speakers"> Guest speakers
        </div>
        <div>
          <input type="checkbox" id="Keynote speakers" name="list[]" value="Keynote Speakers"> Keynote speakers
        </div>
      </div>
      <div class="button-container ml-2 text-center mt-2">
        <a class="btn" href="#FIXME" class="filter button">Filter</a>
      </div>
    </li>
    <li class="basis-1/3 flex min-w-[350px] max-lg:pb-4">
      <div class="input-container">
        <input type="text" class="placeholder:italic speakers-name border-solid border-custom-red border-2 rounded-full p-1" placeholder="Enter Speaker Name">
      </div>
      <div class="button-container mt-2">
        <a href="#FIXME" class="btn ml-2 search button">Search</a>
      </div>
    </li>
    <li class="basis-1/3 min-w-[350px] max-lg:pb-4">
      <div class="button-container mt-2">
        <a href="#FIXME" class="btn clear-button">Reset Filters</a>
      </div>
    </li>
  </ul>
  <div class="speakers-list flex flex-wrap gap-5 justify-center">
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
        <article class="speaker-container min-w-[250px] basis-[32%] border-[1px] border-solid">
          <a href="<?php echo $permalink; ?>">
            <?php
            if ($resized_thumbnail) { ?>
              <figure class="speaker-image w-full min-h-[200px]"><?php echo $resized_thumbnail; ?></figure>
            <?php }
            if ($resizedLogoImage) { ?>
              <figure class="company-logo w-[30px] h-[30px]"><?php echo $resizedLogoImage; ?></figure>
            <?php }
            if ($speakerName) { ?>
              <h4 class="speaker-name text-xl font-bold py-3"><?php echo $speakerName; ?></h4>
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
  <div class="load-more-container py-4">
    <button id="load-more-button" class="btn">Load More</button>
    <button id="show-less-button" class="btn">Show Less</button>
  </div>
  </div>
</section>
<p class="tracking-tight optional:border-gray-300">Tight Letter Spacing</p>
<p class="tracking-normal">Normal Letter Spacing</p>
<p class="tracking-wide">Wide Letter Spacing</p>
<div class="group border-solid border-2 border-custom-red hover:bg-custom-pastal">
  <h3 class="group-hover:text-green-400">styling based on parent/group</h3>
  <p class="group-hover:text-green-400">practical on group selector where we will be discovering styling based on parent</p>
</div>
