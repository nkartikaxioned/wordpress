<?php
/*
Template Name: Home Template
*/
get_header();
?>
<section class="banner-section">
  <?php if ($bannerImage = get_field('banner_image')) : ?>
    <figure>
      <img class="banner-image" src="<?php echo $bannerImage['url']; ?>" alt="<?php echo $bannerImage['alt']; ?>">
    </figure>
  <?php endif; ?>
  <div class="wrapper">
    <?php if ($mainHeading = get_field('banner_main_heading')) : ?>
      <h2 class="banner-main-heading heading"><?php echo $mainHeading; ?></h2>
    <?php endif; ?>
    <div class="sustainable-container">
    <?php if ($sustainingHeading = get_field('sustaining_planet_heading')) : ?>
      <h3 class="sustaining-planet-heading heading"><?php echo $sustainingHeading; ?></h3>
    <?php endif; ?>
    <?php if ($shortDescription = get_field('sustaining_planet_short_description')) : ?>
      <p><?php echo $shortDescription; ?></p>
    <?php endif; ?>
    <?php if ($timeLocation = get_field('sustaining_planet_time_and_location')) : ?>
      <p class="time-location"><?php echo $timeLocation; ?></p>
    <?php endif; ?>
    <?php if ($readMoreLink = get_field('read_more_link_to_sustaining_planet')) : ?>
      <div class="read-more-link-container">
        <a href="<?php echo $readMoreLink['url']; ?>" target="<?php echo $readMoreLink['target']; ?>"><?php echo $readMoreLink['title']; ?></a>
      </div>
    <?php endif; ?>
    </div>
  </div>
</section>
<?php
if (have_rows('home_page')) {
  while (have_rows('home_page')) {
    the_row();
    switch (get_row_layout()) {
      case 'four_cards_':
        get_template_part('template-parts/pages/home/content','four-cards');
        break;
      case 'fifty_fifty_section':
        get_template_part('template-parts/pages/home/content','two-column');
        break;
      case 'featured_speakers':
        get_template_part('template-parts/pages/home/content','featured-speakers');
        break;
      case 'topic_discussed_section':
        get_template_part('template-parts/pages/home/content','topics-discussed');
        break;
      case 'event_format':
        get_template_part('template-parts/pages/home/content','event-format');
        break;
      case 'why_attend_section':
        get_template_part('template-parts/pages/home/content','why-attend');
        break;
      case 'what_our_attendees_said_section':
        get_template_part('template-parts/pages/home/content','attendees-feedback');
        break;
      case 'intrested_in_speaking_section':
        get_template_part('template-parts/pages/home/content','intrested');
        break;
    }
  }
}
get_footer();
?>