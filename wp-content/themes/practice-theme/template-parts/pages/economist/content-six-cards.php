<?php
 $heading = get_sub_field('six_cards_heading');
 $topics = get_sub_field('topics_repeater');
?>
 <section class="six-cards-section">
   <div class="wrapper">
     <?php if ($heading) { ?>
       <h2 class="build_key_connection_section-heading"><?php echo $heading; ?></h2>
     <?php }
     foreach ($topics as $topic) {
       $image_size = 'medium';
       $image = $topic['topic_image'];
       $resizedSpeakerImage = wp_get_attachment_image($image, $image_size);
       $title = $topic['topics_title'];
       $link = $topic['learn_more_link'];
     ?>
       <div class="topics-container">
         <?php if ($resizedSpeakerImage) { ?>
           <figure><?php echo $resizedSpeakerImage; ?></figure>
         <?php } ?>
         <?php if ($title) { ?>
           <h4 class="topics-title"><?php echo $title; ?></h4>
         <?php } ?>
         <?php if ($link) { ?>
           <div class="download-link">
             <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" title="<?php echo $link['title']; ?>"><?php echo $link['title']; ?></a>
           </div>
         <?php } ?>
       </div>
     <?php
     }
     ?>
   </div>
 </section>