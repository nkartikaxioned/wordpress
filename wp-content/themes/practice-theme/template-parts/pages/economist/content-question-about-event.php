<?php
 $heading = get_sub_field('question_about_heading');
 $datas = get_sub_field('accordion_data');
?>
 <section class="question_about_event_section">
   <div class="wrapper">
     <?php if ($heading) { ?>
       <h2 class="build_key_connection_section-heading"><?php echo $heading; ?></h2>
     <?php } ?>
     <?php foreach ($datas as $data) {
       $question = $data['questions'];
       $answers = $data['answer_fields'];
     ?>
       <?php if ($question) { ?>
         <h4 class="build_key_connection_section-heading"><?php echo $question; ?></h4>
       <?php } ?>
       <?php if ($answers) { ?>
         <p class="build_key_connection_section-heading"><?php echo $answers; ?></p>
       <?php } ?>
     <?php } ?>
   </div>
 </section>