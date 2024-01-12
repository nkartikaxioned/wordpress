<?php
/*
Template Name: Home Template
*/
get_header(); 
?>
<?php
$image = get_field('banner_image');
?>
<section class="banner">
  <figure>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
  </figure>
  <ul>
  <?php 
  while( have_rows('cards') ) : the_row();
  $sub_value = get_sub_field('icon');
  $sub_value2 = get_sub_field('attendees');
  // var_dump($sub_value);
  // var_dump($sub_value2); ?>
<li>
  <figure><img src="<?php echo $sub_value; ?>" alt="img"></figure>
  <p><?php echo $sub_value2; ?></p>
</li>
<?php endwhile; ?>
  </ul>
</section>
<section>
  <div class="wrapper">
  <?php //var_dump(get_field('section_second')); 
  $sectionSecond = get_field('section_second');
  $imagesGallery = $sectionSecond[0]['images_gallery'];  
  //var_dump(['title']);
  ?>
  <div>
  <h2> <?php echo $sectionSecond[0]['title1']; ?> </h2>
  <?php echo $sectionSecond[0]['text_area']; ?>
  <p><?php echo $sectionSecond[0]['register']; ?></p>
  <div>
    <a href="<?php echo ['url'][0]; ?> " target="<?php echo ['target'][0];?>">Register</a>
  </div>
  </div>
  <div>
    <figure><img src="<?php echo esc_url($imagesGallery[0]); ?>" alt="image"></figure>
    <figure><img src="<?php echo esc_url($imagesGallery[1]); ?>" alt="image"></figure>
    <figure><img src="<?php echo esc_url($imagesGallery[2]); ?>" alt="image"></figure>
  </div>
  </div>
</section>
<section>
  <div class="wrapper">
    <ul>
    <?php //var_dump(get_field_object('all_speakers')); 
    $fieldSpeakers = get_field_object('all_speakers');
    foreach( $fieldSpeakers['value'] as $featured_post ):
    ?>
    <li><?php echo $featured_post->post_content; ?></li>
<?php endforeach; ?>
</ul>
  </div>
</section>
<section>
  <div class="wrapper">
    <h2><?php echo esc_html( get_field('section_thied_title') ); ?></h2>
  <ul>
  <?php 
  while( have_rows('topics') ) : the_row();
  $topic_value = get_sub_field('topic_image');
  $topic_value2 = get_sub_field('topic_title');
  $topic_value3 = get_sub_field('topic_link');
  // var_dump($topic_value);
  // var_dump($topic_value2);
  // var_dump($topic_value3);
   ?>
<li>
  <figure><img src="<?php echo $topic_value; ?>" alt="img"></figure>
  <p><?php echo $topic_value2; ?></p>
  <div>
    <a href="<?php echo $topic_value3; ?>">Learn More</a>
  </div>
</li>
<?php endwhile; ?>
  </ul>
  </div>
  <div class="event-format">
  <h2><?php echo esc_html( get_field('event_format') ); ?></h2>
  <ul>
  <?php 
  while( have_rows('event_format_data') ) : the_row();
  $eventFormat = get_sub_field('event_format_text');
  //var_dump($eventFormat);
   ?>
<li>
  <p><?php echo $eventFormat; ?></p>
</li>
<?php endwhile; ?>
  </ul>
  </div>
  <div class="inperson-venu">
    <?php //var_dump(get_field('in_person_venu_field')); 
    $inpersonMenu=get_field('in_person_venu_field');
    ?>
    <?php echo $inpersonMenu[0]['in_person_venu_text']; ?>
    <div>
      <a href="<?php echo $inpersonMenu[0]['plan_your_visit']; ?>">plan your visit</a>
    </div>
  </div>
  <div>
    <?php //var_dump(get_field('why_attend_container')); 
     $whyAttend = get_field('why_attend_container');
    ?>
    <h2><?php echo $whyAttend[0]['title_why_attend']; ?></h2>
    <ul>
    <?php
    foreach ($whyAttend[0]['attend'] as $attend_item) :
      $attend_image = $attend_item['attend_image'];
      $attend_txt_content = $attend_item['attend_txt_content'];
      $meet_our_sponsers = $attend_item['meet_our_sponsers'];
  ?>
      <img src="<?php echo $attend_image; ?>" alt="image">
      <?php echo $attend_txt_content; ?>
      <div>
        <a href="<?php echo $meet_our_sponsers; ?>">Meet Our Sponsers</a>
      </div>
<?php endforeach; ?>
  </ul>
  </div>
</section>
<section>
  <div class="wrapper">
    <?php //var_dump(get_field('attendees_said')); 
    $atteneesSaid = get_field('attendees_said');?>
  <h2><?php echo esc_html( $atteneesSaid[0]['what_attendees_said_title']); ?></h2>
  <?php //var_dump($atteneesSaid[0]['content_repeater'][1]['content_editor_']);?>
  <?php 
   foreach ($atteneesSaid[0]['content_repeater'] as $content_item):
    $content_editor_value = $content_item['content_editor_']; 
    ?>
    <p> <?php echo $content_editor_value; ?> </p>
   <?php endforeach; ?>
  </div>
</section>
<section>
  <div class="wrapper">
    <?php //var_dump(get_field('intrested_in_speaking_container')); 
    $sectionintersted = get_field('intrested_in_speaking_container');
    ?>
    <div>
      <h2><?php echo $sectionintersted[0]['container_title']; ?></h2>
      <p><?php echo $sectionintersted[0]['container_text_content']; ?></p>
      <a href="mailto:<?php echo $sectionintersted[0]['email_content']; ?>"><?php echo $sectionintersted[0]['email_content']; ?></a>
      <div>
        <a href="<?php echo $sectionintersted[0]['become_a_speaker_link']; ?>">Become a Speaker</a>
      </div>
    </div>
    <div>
      <img src="<?php echo $sectionintersted[0]['image_content_']; ?>" alt="image">
    </div>
  </div>
</section>
<?php
get_footer(); 
?>