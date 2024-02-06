<section class="feedback-section">
  <div class="wrapper">
    <?php
    $topicsContainer = get_sub_field('topics_container');
    $saidTitle = get_sub_field('what_our_attendees_said_title');
    ?>
    <?php if ($saidTitle) : ?>
      <h4 class="attendees-heading heading"><?php echo $saidTitle; ?></h4>
    <?php endif; ?>
    <?php if ($topicsContainer) : ?>
      <ul class="feedback-list">
        <?php
        foreach ($topicsContainer as $topicContainer) {
        ?>
          <?php if ($topicContainer) : ?>
            <li>
              <?php if ($topicContainer['topic_title']) : ?>
                <h6 class="feedback-title"><?php echo $topicContainer['topic_title']; ?></h6>
              <?php endif; ?>
              <?php if ($topicContainer['topic_short_description']) : ?>
                <p><?php echo $topicContainer['topic_short_description']; ?></p>
              <?php endif; ?>
            </li>
          <?php endif; ?>
        <?php
        }
        ?>
      </ul>
    <?php endif; ?>
  </div>
</section>