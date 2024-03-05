<?php
/*
Template Name: Home Template
*/
get_header();
?>
<section class="banner-section relative w-full h-screen max-md:h-[65vh]">
  <?php if ($bannerImage = get_field('banner_image')) : ?>
    <figure class="w-full h-full absolute top-0 left-0 z-[-1]">
      <img class="banner-image w-full h-full object-cover" src="<?php echo $bannerImage['url']; ?>" alt="<?php echo $bannerImage['alt']; ?>">
    </figure>
  <?php endif; ?>
  <div class="wrapper h-full flex">
    <?php if ($mainHeading = get_field('banner_main_heading')) : ?>
      <h2 class="banner-heading text-6xl font-bold absolute border-solid border-4 border-red-600 text-white top-[50%] left-[18%] py-[55px] px-[40px] transform -translate-x-[18%] -translate-y-[50%] w-[44%]"><?php echo $mainHeading; ?></h2>
    <?php endif; ?>
    <div class="sustainable-container absolute top-[35%] right-[8%] transform -translate-x-[8%] -translate-y-[35%] w-[30%]">
    <?php if ($sustainingHeading = get_field('sustaining_planet_heading')) : ?>
      <h3 class="sustaining-planet-heading font-bold text-2xl text-white w-64 max-lg:text-xl max-md:text-lg"><?php echo $sustainingHeading; ?></h3>
    <?php endif; ?>
    <?php if ($shortDescription = get_field('sustaining_planet_short_description')) : ?>
      <p class="text-white text-sm"><?php echo $shortDescription; ?></p>
    <?php endif; ?>
    <?php if ($timeLocation = get_field('sustaining_planet_time_and_location')) : ?>
      <p class="time-location text-custom-red mb-3 text-sm"><?php echo $timeLocation; ?></p>
    <?php endif; ?>
    <?php if ($readMoreLink = get_field('read_more_link_to_sustaining_planet')) : ?>
      <div class="read-more-link border-t border-solid border-white ">
      <a class="font-bold link text-custom-black before:content-rightArrow before:inline-block before:w-4" href="<?php echo $readMoreLink['url']; ?>" target="<?php echo $readMoreLink['target']; ?>"><?php echo $readMoreLink['title']; ?></a>
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