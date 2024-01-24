<?php
$heading = get_sub_field('feedback_section_heading');
$feedbacks = get_sub_field('feedback_details');
?>
<section class="attendees_feedback">
  <div class="wrapper">
    <?php if ($heading) { ?>
      <h2 class="attendees_feedback-heading"><?php echo $heading; ?></h2>
    <?php } ?>
    <ul>
      <?php
      foreach ($feedbacks as $feedback) {
        $title = $feedback['response_title'];
        $description = $feedback['response_description'];
      ?>
        <li>
          <?php if ($title) { ?>
            <h4 class="attendees_feedback-title"><?php echo $title; ?></h4>
          <?php } ?>
          <?php if ($description) { ?>
            <div class="description-container">
              <?php echo $description; ?>
            </div>
          <?php } ?>
        </li>
      <?php }
      ?>
    </ul>
  </div>
</section>