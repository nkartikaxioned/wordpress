<section class="discussed-topics">
    <div class="wrapper">
        <?php
        $sectionTitle = get_sub_field('topic_discussed_title');
        $topics = get_sub_field('topics_to_be_discussed');
        ?>
        <?php if ($sectionTitle) : ?>
          <h3 class="discussed-topics-heading heading"><?php echo $sectionTitle; ?></h3>
        <?php endif; ?>
        <?php if ($topics) : ?>
          <ul class="topics-list">
            <?php
            foreach ($topics as $topic) {
              $topicImage = $topic['topic_image'];
              $topicLink = $topic['topic_link'];
            ?>
            <li>
              <?php if ($topicImage) : ?>
                <figure><img class="topic-image" src="<?php echo $topicImage['url']; ?>" alt="<?php echo $topicImage['alt']; ?>"></figure>
              <?php endif; ?>
              <div class="text-content">
              <?php if ($topic['topic_title']) : ?>
                <h5 class="topic-title heading"><?php echo $topic['topic_title']; ?></h5>
              <?php endif; ?>
              <?php if ($topicLink) : ?>
                <div class="topic-link-container">
                  <a href="<?php echo $topicLink['url']; ?>" target="<?php echo $topicLink['target']; ?>"><?php echo $topicLink['title']; ?></a>
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