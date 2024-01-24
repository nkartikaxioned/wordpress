<?php
 $heading = get_sub_field('build_key_connection_heading');
 $image = get_sub_field('build_key_connection_image_');
 $description = get_sub_field('build_key_connections_description');
 $link = get_sub_field('download_media_pack_link'); ?>
 <section class="build-key-connection-section">
   <div class="wrapper">
     <?php if ($heading) { ?>
       <h2 class="build_key_connection_section-heading"><?php echo $heading; ?></h2>
     <?php } ?>
     <?php if ($image) { ?>
       <figure><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></figure>
     <?php } ?>
     <?php if ($description) { ?>
       <div class="description-container">
         <?php echo $description; ?>
       </div>
     <?php } ?>
     <?php if ($link) { ?>
       <div class="download-link">
         <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" title="<?php echo $link['title']; ?>"><?php echo $link['title']; ?></a>
       </div>
     <?php } ?>
   </div>
 </section>