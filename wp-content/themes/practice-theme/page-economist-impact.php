<?php
/*
Template Name: Economist Impact Template
*/
get_header();

if (have_rows('flexible_layout')) {
  while (have_rows('flexible_layout')) {
    the_row();
    switch (get_row_layout()) {
      case 'banner_section':
        get_template_part('template-parts/pages/economist/content', 'banner');
        break;
      case 'heading_and_description_section':
        get_template_part('template-parts/pages/economist/content', 'heading-and-description');
        break;
      case 'featured_speakers':
        get_template_part('template-parts/pages/economist/content', 'speakers');
        break;
      case 'sustainable_gallery':
        get_template_part('template-parts/pages/economist/content', 'sustainable-gallery');
        break;
      case 'full_width':
        get_template_part('template-parts/pages/economist/content', 'heading-and-image');
        break;
      case 'build_key_connection_section':
        get_template_part('template-parts/pages/economist/content', 'build-key');
        break;
      case 'map_location':
        get_template_part('template-parts/pages/economist/content', 'maps');
        break;
      case 'build_key_connection_section_2':
        get_template_part('template-parts/pages/economist/content', 'build-key');
        break;
      case 'section_with_heading_and_image_2':
        get_template_part('template-parts/pages/economist/content', 'heading-and-image');
        break;
      case 'question_about_event_section':
        get_template_part('template-parts/pages/economist/content', 'question-about-event');
        break;
      case 'two_container_section':
        get_template_part('template-parts/pages/economist/content', 'two-container');
        break;
      case 'six_cards_section':
        get_template_part('template-parts/pages/economist/content', 'six-cards');
        break;
      case 'two_container_section_2':
        get_template_part('template-parts/pages/economist/content', 'two-container');
        break;
      case 'partnered_company_section':
        get_template_part('template-parts/pages/economist/content', 'partnered-company');
        break;
      case 'featured_sponsors_section':
        get_template_part('template-parts/pages/economist/content', 'featured-sponsers');
        break;
      case 'attendees_feedback':
        get_template_part('template-parts/pages/economist/content', 'attendees-feedback');
        break;
    }
  }
}
get_footer();
?>