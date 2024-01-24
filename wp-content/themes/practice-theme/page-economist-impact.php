<?php
/*
Template Name: Economist Impact Template
*/
get_header();
?>
<?php
$flexible_layout = get_field('flexible_layout');
if (have_rows('flexible_layout')) {
  while (have_rows('flexible_layout')) {
    the_row();
    switch (get_row_layout()) {
      case 'banner_section':
        $heading = get_sub_field('banner_heading');
        $description = get_sub_field('banner_description');

?>
        <Section class="banner_section">
          <div class="wrapper">
            <?php if (!empty($heading)) { ?>
              <h2 class="ways-to-align-heading"><?php echo $heading; ?></h2>
            <?php } ?>
            <?php if (!empty($description)) { ?>
              <?php echo $description; ?>
            <?php } ?>

          </div>
        </Section>
      <?php
        break;
      case 'heading_and_description_section':
        $cta_title = get_sub_field('normal_content_heading');
        $cta_description = get_sub_field('normal_content_description');
        $link = get_sub_field('form_link');
      ?>
        <section class="heading-and-description-section">
          <div class="wrapper">
            <?php if (!empty($cta_title)) { ?>
              <h3 class="cta-title"><?php echo $cta_title; ?></h3>
            <?php } ?>
            <?php if (!empty($cta_description)) { ?>
              <?php echo $cta_description; ?>
            <?php } ?>
            <?php if (!empty($link)) { ?>
              <div class="form-link">
                <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
              </div>
            <?php } ?>
          </div>
        </section>
      <?php
        break;
      case 'featured_speakers':
        $heading = get_sub_field('featured_speaker_heading');
        $speakers = get_sub_field('speakers_list');
        $speakers_list = get_sub_field('see_full_speakers_list_link');
      ?>
        <section class="featured-speakers">
          <div class="wrapper">
            <?php if (!empty($heading)) { ?>
              <h2 class="featured-speakers-heading"><?php echo $heading; ?></h2>
            <?php } ?>
            <?php if (!empty($speakers)) { ?>
              <ul class="speakers-list">
                <?php foreach ($speakers as $speaker) {
                  $speaker_id = $speaker->ID;
                  $speaker_image_array = get_field('speaker_image', $speaker_id);
                  $company_logo_array = get_field('company_logo', $speaker_id);
                  $speaker_name = get_field('speaker_name', $speaker_id);
                  $speaker_desgnation = get_field('speaker_designation_and_company', $speaker_id);
                  $image_size = 'medium';
                  $logo_size = 'thumbnail';
                  $logoImage = $company_logo_array['ID'];
                  $speakerImage = $speaker_image_array['ID'];
                  $resizedLogoImage = wp_get_attachment_image($logoImage, $logo_size);
                  $resizedSpeakerImage = wp_get_attachment_image($speakerImage, $image_size); ?>
                  <li>
                    <?php if (!empty($resizedSpeakerImage)) { ?>
                      <figure class="speaker-image">
                        <?php echo $resizedSpeakerImage; ?>
                      </figure>
                    <?php } ?>
                    <?php if (!empty($resizedLogoImage)) { ?>
                      <figure class="company-logo">
                        <?php echo $resizedLogoImage; ?>
                      </figure>
                    <?php } ?>
                    <?php if (!empty($speaker_name)) { ?>
                      <h3 class="speaker-name"><?php echo $speaker_name; ?></h3>
                    <?php } ?>
                    <?php if (!empty($speaker_desgnation)) { ?>
                      <p class="speaker-designation"><?php echo $speaker_desgnation; ?></p>
                    <?php } ?>
                  </li>
                <?php } ?>
              </ul>
            <?php } ?>
            <?php if (!empty($speakers_list)) { ?>
              <div>
                <a href="<?php echo $speakers_list['url']; ?>" target="<?php echo $speakers_list['target']; ?>"><?php echo $speakers_list['title']; ?></a>
              </div>
            <?php } ?>
          </div>
        </section>
      <?php
        break;
      case 'sustainable_gallery':
        $heading = get_sub_field('sustainable_gallery_heading');
        $gallerys = get_sub_field('images_for_sustainable_gallery');
        $sub_heading = get_sub_field('full_width_media_heading');
        $image = get_sub_field('full_width_media_image');
      ?>
        <section class="sustainable-gallery">
          <div class="wrapper">
            <?php if (!empty($heading)) { ?>
              <h2 class="sustainable-gallery-heading"><?php echo $heading; ?></h2>
            <?php } ?>
            <?php if (!empty($gallerys)) { ?>
              <ul class="gallery">
                <?php foreach ($gallerys as $gallery) {
                  $image_id = $gallery["ID"];
                  $size = 'medium';
                  $gallery_image = wp_get_attachment_image($image_id, $size);
                ?>
                  <li>
                    <?php if (!empty($gallery_image)) { ?>
                      <?php echo $gallery_image; ?>
                    <?php } ?>
                  </li>
                <?php } ?>
              </ul>
            <?php } ?>
          </div>
        </section>
      <?php
        break;
      case 'full_width':
        $heading = get_sub_field('section_heading');
        $image = get_sub_field('section_single_image');
      ?>
        <section class="section-with-heading-image">
          <div class="wrapper">
            <?php if (!empty($heading)) { ?>
              <h2 class="section-with-heading-image-heading"><?php echo $heading; ?></h2>
            <?php } ?>
            <?php if (!empty($image)) { ?>
              <figure><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></figure>
            <?php } ?>
          </div>
        </section>
      <?php
        break;
      case 'build_key_connection_section':
        $heading = get_sub_field('build_key_connection_heading');
        $image = get_sub_field('build_key_connection_image_');
        $description = get_sub_field('build_key_connections_description');
        $link = get_sub_field('download_media_pack_link'); ?>
        <section class="build-key-connection-section">
          <div class="wrapper">
            <?php if (!empty($heading)) { ?>
              <h2 class="build_key_connection_section-heading"><?php echo $heading; ?></h2>
            <?php } ?>
            <?php if (!empty($image)) { ?>
              <figure><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></figure>
            <?php } ?>
            <?php if (!empty($description)) { ?>
             <?php echo $description; ?>
            <?php } ?>
            <?php if (!empty($link)) { ?>
             <div class="download-link">
              <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
             </div>
            <?php } ?>
          </div>
        </section>
<?php
        break;
      case 'map_location':
        $map = get_sub_field('google_map');
        if( $map ){ ?>
          <div class="acf-map" data-zoom="16">
              <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
          </div>
      <?php } ?>
      <?php
        break;
      case 'build_key_connection_section_2':
        $heading = get_sub_field('build_key_connection_heading');
        $image = get_sub_field('build_key_connection_image_');
        $description = get_sub_field('build_key_connections_description');
        $link = get_sub_field('download_media_pack_link'); ?>
        <section class="build-key-connection-section">
          <div class="wrapper">
            <?php if (!empty($heading)) { ?>
              <h2 class="build_key_connection_section-heading"><?php echo $heading; ?></h2>
            <?php } ?>
            <?php if (!empty($image)) { ?>
              <figure><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></figure>
            <?php } ?>
            <?php if (!empty($description)) { ?>
             <?php echo $description; ?>
            <?php } ?>
            <?php if (!empty($link)) { ?>
             <div class="download-link">
              <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
             </div>
            <?php } ?>
          </div>
        </section>
<?php
        break;
      case 'section_with_heading_and_image_2':
        $image = get_sub_field('section_single_image');
        ?>
        <section class="section_with_heading_and_image_2">
          <div class="wrapper">
          <?php if (!empty($image)) { ?>
              <figure><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></figure>
            <?php } ?>
          </div>
        </section>
        <?php
        break;
      case 'question_about_event_section':
        $heading = get_sub_field('question_about_heading');
        $datas = get_sub_field('accordion_data');
        ?>
          <section class="question_about_event_section">
            <div class="wrapper">
            <?php if (!empty($heading)) { ?>
              <h2 class="build_key_connection_section-heading"><?php echo $heading; ?></h2>
            <?php } ?>
            <?php foreach($datas as $data){
              $question = $data['questions'];
              $answers = $data['answer_fields'];
              ?>
              <?php if (!empty($question)) { ?>
              <h4 class="build_key_connection_section-heading"><?php echo $question; ?></h4>
            <?php } ?>
            <?php if (!empty($answers)) { ?>
              <p class="build_key_connection_section-heading"><?php echo $answers; ?></p>
            <?php } ?>
           <?php } ?>
            </div>
          </section>
        <?php
        break;
      case 'two_container_section':
        $heading = get_sub_field('want_to_learn_more_heading');
        $description = get_sub_field('want_to_learn_short_description');
        $link = get_sub_field('download_link');
        $image = get_sub_field('want_to_learn_image_');
        ?>
        <section class="two_container_section">
          <div class="wrapper">
          <?php if (!empty($heading)) { ?>
              <h2 class="build_key_connection_section-heading"><?php echo $heading; ?></h2>
            <?php } ?>
            <?php if (!empty($description)) { ?>
             <?php echo $description; ?>
            <?php } ?>
            <div class="download-link">
              <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
             </div>
             <?php if (!empty($image)) { ?>
              <figure><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></figure>
            <?php } ?>
          </div>
        </section>
        <?php
        break;
      case 'six_cards_section':
        $heading = get_sub_field('six_cards_heading');
        $topics = get_sub_field('topics_repeater');
        ?>
        <?php if (!empty($heading)) { ?>
              <h2 class="build_key_connection_section-heading"><?php echo $heading; ?></h2>
            <?php } 
            foreach($topics as $topic){
              $image_size = 'medium';
              $image = $topic['topic_image'];
              $resizedSpeakerImage = wp_get_attachment_image($image, $image_size); 
              $title = $topic['topics_title'];
              $link = $topic['learn_more_link'];
              ?>
              <div class="topics-container"> 
              <?php if (!empty($resizedSpeakerImage)) { ?>
              <figure><?php echo $resizedSpeakerImage; ?></figure>
            <?php } ?>
            <?php if (!empty($title)) { ?>
              <h4 class="topics-title"><?php echo $title; ?></h4>
            <?php } ?>
            <?php if (!empty($link)) { ?>
             <div class="download-link">
              <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
             </div>
            <?php } ?>
              </div>
              <?php
            }
            ?>
        <?php
        break;
      case 'two_container_section_2':
        $heading = get_sub_field('want_to_learn_more_heading');
        $description = get_sub_field('want_to_learn_short_description');
        $link = get_sub_field('download_link');
        $image = get_sub_field('want_to_learn_image_');
        ?>
        <section class="two-container-section-2">
          <div class="wrapper">
          <?php if (!empty($heading)) { ?>
              <h2 class="two-container-section-2-heading"><?php echo $heading; ?></h2>
            <?php } ?>
            <?php if (!empty($description)) { ?>
             <?php echo $description; ?>
            <?php } ?>
             <?php if (!empty($image)) { ?>
              <figure><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></figure>
            <?php } ?>
          </div>
        </section>
        <?php
        break;
      case 'partnered_company_section':
        $heading = get_sub_field('section_heading');
        $logo_gallerys = get_sub_field('companies_logo_image_gallery');
        ?>
        <?php if (!empty($heading)) { ?>
              <h2 class="partnered_company_section-heading"><?php echo $heading; ?></h2>
            <?php } ?>
            <?php if (!empty($logo_gallerys)) { 
              foreach($logo_gallerys as $logo_gallery){
                $logo_id = $logo_gallery;
                $image_size = 'medium';
              $resizedSpeakerImage = wp_get_attachment_image($logo_id, $image_size);
                ?>
                <?php if (!empty($resizedSpeakerImage)) {?>
                <figure><?php echo $resizedSpeakerImage; ?></figure>
                <?php } ?>
                <?php
              }
              ?>
            <?php } ?>
        <?php
        break;
      case 'featured_sponsors_section':
        $heading =get_sub_field('featured_sponsor_heading');
        $sponsors = get_sub_field('sponsors_field_repeater');
        ?>
        <section class="featured-sponsors-section">
          <div class="wrapper">
          <?php if (!empty($heading)) { ?>
              <h2 class="featured-sponsors-section-heading"><?php echo $heading; ?></h2>
            <?php } 
            foreach($sponsors as $sponsor){ 
              $title = $sponsor['sponsor_title'];
              $image = $sponsor['sponsor_image'];
              $image_size = 'medium';
              $resized_sponsor_image = wp_get_attachment_image($image, $image_size);
              ?>
              <ul>
              <li>
              <?php if (!empty($title)) { ?>
              <h4 class="featured-sponsors-section-heading"><?php echo $title; ?></h4>
            <?php } ?>
               <figure><?php echo $resized_sponsor_image; ?></figure>
              </li>
              </ul>

           <?php }
            ?>
          </div>
        </section>
        <?php
        break;
        case 'attendees_feedback':
          $heading = get_sub_field('feedback_section_heading');
          $feedbacks = get_sub_field('feedback_details');
          ?>
          <section class="attendees_feedback">
            <div class="wrapper">
            <?php if (!empty($heading)) { ?>
              <h2 class="attendees_feedback-heading"><?php echo $heading; ?></h2>
            <?php } ?> 
            <ul>
            <?php
            foreach($feedbacks as $feedback){
               $title = $feedback['response_title'];
               $description = $feedback['response_description'];
              ?>
              <li>
              <?php if (!empty($title)) { ?>
              <h4 class="attendees_feedback-title"><?php echo $title; ?></h4>
            <?php } ?> 
            <?php if (!empty($description)) { ?>
              <?php echo $description; ?>
            <?php } ?> 
              </li>
           <?php }
            ?>
            </ul>
            </div>
          </section>
          <?php
          break;
    }
  }
}
get_footer();
?>