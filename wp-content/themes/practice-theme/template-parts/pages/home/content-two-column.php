<section class="two-by-two-section">
  <div class="wrapper">
    <?php
    $sectionHeading = get_sub_field('fifty_fifty_section_heading');
    $sectionDescription = get_sub_field('fifty_fifty_section_description');
    $joinText = get_sub_field('join_industry_text');
    $joinLink = get_sub_field('join_industry_link');
    $joinImage = get_sub_field('fifty_fifty_section_image');
    ?>
    <div class="content-container">
      <?php if ($sectionHeading) : ?>
        <h4 class="two-by-two-heading heading"><?php echo $sectionHeading; ?></h4>
      <?php endif; ?>
      <?php if ($sectionDescription) : ?>
        <div class="description">
        <?php echo $sectionDescription; ?>
        </div>
      <?php endif; ?>
      <?php if ($joinText) : ?>
        <p class="join-heading"><?php echo $joinText; ?></p>
      <?php endif; ?>
      <?php if ($joinLink) : ?>
        <div class="join-link-container">
          <a href="<?php echo $joinLink['url']; ?>" title="<?php echo $joinLink['title']; ?>" target="<?php echo $joinLink['target']; ?>"><?php echo $joinLink['title']; ?></a>
        </div>
    </div>
  <?php endif; ?>
  <?php if ($joinImage) : ?>
    <?php
    $size = 'medium';
    $image = $joinImage['ID'];
    $resizedImage = wp_get_attachment_image($image, $size);
    ?>
    <figure class="join-image"><?php echo $resizedImage; ?></figure>
  <?php endif; ?>
  </div>
</section>