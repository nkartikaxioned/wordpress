<section class="discussed-topics pt-10">
    <div class="wrapper">
        <?php
        $sectionTitle = get_sub_field('topic_discussed_title');
        $topics = get_sub_field('topics_to_be_discussed');
        ?>
        <?php if ($sectionTitle) : ?>
          <h3 class="heading text-red-600 font-bold text-4xl pb-8 w-[35%] max-lg:w-[50%] max-lg:pb-4"><?php echo $sectionTitle; ?></h3>
        <?php endif; ?>
        <?php if ($topics) : ?>
          <ul class="topics-list flex w-full flex-wrap gap-5 max-lg:justify-center">
            <?php
            foreach ($topics as $topic) {
              $topicImage = $topic['topic_image'];
              $topicLink = $topic['topic_link'];
            ?>
            <li class="w-[30%] p-3 mt-5 relative bg-custom-pastal max-lg:min-w-[350px] max-md:min-w-[450px] max-lg:mt-3">
              <?php if ($topicImage) : ?>
                <figure class="w-full h-full"><img class="object-cover w-full h-full" src="<?php echo $topicImage['url']; ?>" alt="<?php echo $topicImage['alt']; ?>"></figure>
              <?php endif; ?>
              <div class="text-content absolute bottom-6">
              <?php if ($topic['topic_title']) : ?>
                <h5 class="topic-title font-bold text-2xl mb-4 max-lg:text-xl"><?php echo $topic['topic_title']; ?></h5>
              <?php endif; ?>
              <?php if ($topicLink) : ?>
                <div class="topic-link-container">
                  <a class="link font-bold" href="<?php echo $topicLink['url']; ?>" target="<?php echo $topicLink['target']; ?>"><?php echo $topicLink['title']; ?></a>
                </div>
              <?php endif; ?>
              </div>
              </li>
            <?php
            }
            ?>
          </ul>
        <?php endif; ?>
    </div>
  </section>