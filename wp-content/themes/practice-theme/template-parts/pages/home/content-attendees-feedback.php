<section class="feedback-section mt-[60px] pt-[20px] pb-[80px] bg-dark-grey">
  <div class="wrapper">
    <?php
    $topicsContainer = get_sub_field('topics_container');
    $saidTitle = get_sub_field('what_our_attendees_said_title');
    ?>
    <?php if ($saidTitle) : ?>
      <h4 class="heading text-4xl font-bold text-custom-white"><?php echo $saidTitle; ?></h4>
    <?php endif; ?>
    <?php if ($topicsContainer) : ?>
      <ul class="attend-list flex gap-5 pt-[30px] max-lg:justify-center max-lg:flex-wrap">
        <?php
        foreach ($topicsContainer as $topicContainer) {
        ?>
          <?php if ($topicContainer) : ?>
            <li class="basis-[32%] bg-pastal-green p-[30px] max-lg:min-w-[300px]">
              <?php if ($topicContainer['topic_title']) : ?>
                <h6 class="attendees-title text-3xl font-bold xl:text-xl max-lg:text-xl max-md:text-base"><?php echo $topicContainer['topic_title']; ?></h6>
              <?php endif; ?>
              <?php if ($topicContainer['topic_short_description']) : ?>
                <p class="mt-[10px]"><?php echo $topicContainer['topic_short_description']; ?></p>
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