<?php
 $cta_title = get_sub_field('normal_content_heading');
 $cta_description = get_sub_field('normal_content_description');
 $link = get_sub_field('form_link');
?>
 <section class="heading-and-description-section">
   <div class="wrapper">
     <?php if ($cta_title) { ?>
       <h2 class="cta-title"><?php echo $cta_title; ?></h2>
     <?php } ?>
     <?php if ($cta_description) { ?>
       <div class="description-container">
         <?php echo $cta_description; ?>
       </div>
     <?php } ?>
     <?php if ($link) { ?>
       <div class="form-link">
         <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" title="<?php echo $link['title']; ?>"><?php echo $link['title']; ?></a>
       </div>
     <?php } ?>
   </div>
 </section>