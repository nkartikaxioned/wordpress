<?php
/*
Template Name: Home Template
*/
require_once('/var/www/html/kartik/wordpressfolder/wordpress/wp-content/themes/practice-theme/custom-function.php');
get_header();
?>
<section class="banner-section">
  <?php if ($bannerImage = get_field('banner_image')) : ?>
    <figure><img class="banner-image" src="<?php echo $bannerImage['url']; ?>" alt="<?php echo $bannerImage['alt']; ?>"></figure>
  <?php endif; ?>
  <div class="wrapper">
    <?php if ($mainHeading = get_field('banner_main_heading')) : ?>
      <h2 class="banner-main-heading heading"><?php echo $mainHeading; ?></h2>
    <?php endif; ?>
    <?php if ($sustainingHeading = get_field('sustaining_planet_heading')) : ?>
      <h3 class="sustaining-planet-heading heading"><?php echo $sustainingHeading; ?></h3>
    <?php endif; ?>
    <?php if ($shortDescription = get_field('sustaining_planet_short_description')) : ?>
      <p><?php echo $shortDescription; ?></p>
    <?php endif; ?>
    <?php if ($timeLocation = get_field('sustaining_planet_time_and_location')) : ?>
      <p><?php echo $timeLocation; ?></p>
    <?php endif; ?>
    <?php if ($readMoreLink = get_field('read_more_link_to_sustaining_planet')) : ?>
      <div class="read-more-link-container">
        <a href="<?php echo $readMoreLink['url']; ?>" target="<?php echo $readMoreLink['target']; ?>"><?php echo $readMoreLink['title']; ?></a>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php
if (have_rows('home_page')) {
  $data = get_field('home_page');
  while (have_rows('home_page')) : the_row();
    if (get_row_layout() == 'four_cards_') :
      $cards = get_sub_field('cards');
      fourCardsSection($cards);
?>
    <?php
    elseif (get_row_layout() == 'fifty_fifty_section') :
      $sectionTwoByTwo = get_field('fifty_fifty_section');
      twoByTwoSection($sectionTwoByTwo);
    ?>
    <?php
    elseif (get_row_layout() == 'featured_speakers') :
      featuredSpeakerSection();
    ?>
    <?php
    elseif (get_row_layout() == 'topic_discussed_section') :
      topicsDiscussedSection();
    ?>
    <?php elseif (get_row_layout() == 'event_format') : 
    $events = get_sub_field('multiple_events');
      eventFormatAndInPersonVenueSection($events);
      ?>
    <?php elseif (get_row_layout() == 'why_attend_section') : 
      $attendSections = get_sub_field('attend_sections');
      whyAttendSection($attendSections);
      ?>
    <?php elseif (get_row_layout() == 'what_our_attendees_said_section') : 
      $topicsContainer = get_sub_field('topics_container');
      whatOurAttendeesSaidSection($topicsContainer);
      ?>
    <?php elseif (get_row_layout() == 'intrested_in_speaking_section') : 
      intrestedInSpeakingSection();
      ?>
<?php
    endif;
  endwhile;
}
?>