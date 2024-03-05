<section class="two-by-two-section pb-10">
  <div class="wrapper flex gap-6 max-lg:flex-wrap">
    <?php
    $sectionHeading = get_sub_field('fifty_fifty_section_heading');
    $sectionDescription = get_sub_field('fifty_fifty_section_description');
    $joinText = get_sub_field('join_industry_text');
    $joinLink = get_sub_field('join_industry_link');
    $joinImage = get_sub_field('fifty_fifty_section_image');
    ?>
    <div class="content-container w-2/4 max-lg:w-full">
      <?php if ($sectionHeading) : ?>
        <h4 class="heading font-bold text-4xl text-red-600 max-lg:mb-4"><?php echo $sectionHeading; ?></h4>
      <?php endif; ?>
      <?php if ($sectionDescription) : ?>
        <div class="description">
        <?php echo $sectionDescription; ?>
        </div>
      <?php endif; ?>
      <?php if ($joinText) : ?>
        <p class="join-heading font-bold text-lg mt-[30px]"><?php echo $joinText; ?></p>
      <?php endif; ?>
      <?php if ($joinLink) : ?>
        <div class="join-link-container pt-3">
          <a class="btn" href="<?php echo $joinLink['url']; ?>" title="<?php echo $joinLink['title']; ?>" target="<?php echo $joinLink['target']; ?>"><?php echo $joinLink['title']; ?></a>
        </div>
    </div>
  <?php endif; ?>
  <?php if ($joinImage) : ?>
    <?php
    $size = 'medium';
    $image = $joinImage['ID'];
    $resizedImage = wp_get_attachment_image($image, $size);
    ?>
    <figure class="join-image w-2/4 max-lg:w-full"><img class="object-cover w-full h-full" src="<?php echo $joinImage['url']; ?>" alt="<?php echo $joinImage['alt']; ?>"></figure>
  <?php endif; ?>
  </div>
</section>