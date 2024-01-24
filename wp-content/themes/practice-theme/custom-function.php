<?php
/*
custom-function.php
*/

function fourCardsSection($cards)
{
  if (!empty($cards)) :
?>
    <section class="cards-section">
      <div class="wrapper">
        <ul class="cards-list">
          <?php foreach ($cards as $card) {
            $cardImage = $card['cards_image'];
            $cardText = $card['cards_text'];
            $totalNumber = $card['total_number'];
            $symbol = $card['symbol'];
          ?>
            <li>
              <?php if (!empty($cardImage)) : ?>
                <figure><img src="<?php echo $cardImage['url']; ?>" alt="<?php echo $cardImage['alt']; ?>"></figure>
              <?php endif; ?>
              <?php if (!empty($cardText)) : ?>
                <p><?php echo $cardText; ?></p>
              <?php endif; ?>
              <?php if (!empty($totalNumber)) : ?>
                <span><?php echo $totalNumber; ?></span>
              <?php endif; ?>
              <?php if (!empty($symbol)) : ?>
                <span><?php echo $symbol; ?></span>
              <?php endif; ?>
            </li>
          <?php } ?>
        </ul>
      </div>
    </section>
  <?php
  endif;
}

function twoByTwoSection()
{
  ?>
  <section class="two-by-two-section">
    <div class="wrapper">
      <?php
      $sectionHeading = get_sub_field('fifty_fifty_section_heading');
      $sectionDescription = get_sub_field('fifty_fifty_section_description');
      $joinText = get_sub_field('join_industry_text');
      $joinLink = get_sub_field('join_industry_link');
      $joinImage = get_sub_field('fifty_fifty_section_image');
      ?>
      <?php if (!empty($sectionHeading)) : ?>
        <h4 class="two-by-two-heading heading"><?php echo $sectionHeading; ?></h4>
      <?php endif; ?>
      <?php if (!empty($sectionDescription)) : ?>
        <?php echo $sectionDescription; ?>
      <?php endif; ?>
      <?php if (!empty($joinText)) : ?>
        <p><?php echo $joinText; ?></p>
      <?php endif; ?>
      <?php if (!empty($joinLink) && !empty($joinText)) : ?>
        <div class="join-link-container">
          <a href="<?php echo $joinLink['url']; ?>"><?php echo $joinLink['title']; ?></a>
        </div>
      <?php endif; ?>
      <?php if (!empty($joinImage)) : ?>
        <?php
        $size = 'medium';
        $image = $joinImage['ID'];
        $resizedImage = wp_get_attachment_image($image,$size);
        ?>
        <figure class="join-image"><?php echo $resizedImage; ?></figure>
      <?php endif; ?>
    </div>
  </section>
<?php
}

function featuredSpeakerSection()
{
?>
  <section class="featured-speakers">
    <div class="wrapper">
      <?php
      $sectionTitle = get_sub_field('speakers_section_title');
      $speakers = get_sub_field('speakers');
      ?>
      <?php if (!empty($sectionTitle)) : ?>
        <h4 class="featured-speakers-heading heading"><?php echo $sectionTitle; ?></h4>
      <?php endif; ?>
      <?php if (!empty($speakers)) : ?>
        <ul>
          <?php
          foreach ($speakers as $speaker) {
            $content = $speaker->post_content;
          ?>
            <?php if (!empty($content)) : ?>
              <li><?php echo $content; ?></li>
            <?php endif; ?>
          <?php } ?>
        </ul>
      <?php endif; ?>
    </div>
  </section>
<?php
}

function topicsDiscussedSection()
{
?>
  <section class="discussed-topics">
    <div class="wrapper">
      <div>
        <?php
        $sectionTitle = get_sub_field('topic_discussed_title');
        $topics = get_sub_field('topics_to_be_discussed');
        ?>
        <?php if (!empty($sectionTitle)) : ?>
          <h4 class="discussed-topics-heading"><?php echo $sectionTitle; ?></h4>
        <?php endif; ?>
        <?php if (!empty($topics)) : ?>
          <ul class="topics-list">
            <?php
            foreach ($topics as $topic) {
              $topicImage = $topic['topic_image'];
              $topicLink = $topic['topic_link'];
            ?>
              <?php if (!empty($topicImage)) : ?>
                <figure><img class="topic-image" src="<?php echo $topicImage['url']; ?>" alt="<?php echo $topicImage['alt']; ?>"></figure>
              <?php endif; ?>
              <?php if (!empty($topic['topic_title'])) : ?>
                <h5 class="topic-title heading"><?php echo $topic['topic_title']; ?></h5>
              <?php endif; ?>
              <?php if (!empty($topicLink)) : ?>
                <div class="topic-link-container">
                  <a href="<?php echo $topicLink['url']; ?>" target="<?php echo $topicLink['target']; ?>"><?php echo $topicLink['title']; ?></a>
                </div>
              <?php endif; ?>
            <?php
            }
            ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php
}

function eventFormatAndInPersonVenueSection($events)
{
?>
  <section class="event-format-section">
    <div class="wrapper">
      <div>
        <?php
        $formatHeading = get_sub_field('event_section_heading');
        $eventLink = get_sub_field('plan_your_visit_link');
        ?>
        <?php if (!empty($formatHeading)) : ?>
          <h4 class="event-format-heading heading"><?php echo $formatHeading; ?></h4>
        <?php endif; ?>
        <?php if (!empty($events)) : ?>
          <ul class="events-list">
            <?php
            foreach ($events as $event) {
              $eventImage = $event['event_image'];
            ?>
              <?php if (!empty($event)) : ?>
                <li>
                  <?php if (!empty($event['event_date'])) : ?>
                    <p><?php echo $event['event_date']; ?></p>
                  <?php endif; ?>
                  <?php if (!empty($event['event_image'])) : ?>
                    <figure><img class="event-image" src="<?php echo $eventImage['url']; ?>" alt="<?php echo $eventImage['alt']; ?>"></figure>
                  <?php endif; ?>
                  <?php if (!empty($event['event_type'])) : ?>
                    <p><?php echo $event['event_type']; ?></p>
                  <?php endif; ?>

                </li>
              <?php endif; ?>
            <?php
            }
            ?>
          </ul>
        <?php endif; ?>
      </div>
      <div class="in-person-venue">
        <?php if (!empty(get_sub_field('in_person_venue_title'))) : ?>
          <p><?php echo get_sub_field('in_person_venue_title'); ?></p>
        <?php endif; ?>
        <?php if (!empty(get_sub_field('venue_company_name'))) : ?>
          <p><?php echo get_sub_field('venue_company_name'); ?></p>
        <?php endif; ?>
        <?php if (!empty(get_sub_field('venue_company_adderss'))) : ?>
          <p><?php echo get_sub_field('venue_company_adderss'); ?></p>
        <?php endif; ?>
        <?php if (!empty($eventLink)) : ?>
          <div class="event-link-container">
            <a href="<?php echo $eventLink['url']; ?>" target="<?php echo $eventLink['target']; ?>"><?php echo $eventLink['title']; ?></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php
}

function whyAttendSection($attendSections)
{
?>
  <section class="why-attend-section">
    <div class="wrapper">
      <?php
      $sectionWhyAttendTitle = get_sub_field('why_attend_section_title');
      ?>
      <?php if (!empty($sectionWhyAttendTitle)) : ?>
        <h4 class="why-attend-heading heading"><?php echo $sectionWhyAttendTitle; ?></h4>
      <?php endif; ?>
      <?php if (!empty($attendSections)) : ?>
        <ul class="attend-section-lists">
          <?php
          foreach ($attendSections as $attendsection) {
            $attendSectionImage = $attendsection['attend_section_image'];
            $attendSectionLink = $attendsection['attend_section_link'];
          ?>
            <?php if (!empty($attendsection)) : ?>
              <li>
                <?php if (!empty($attendSectionImage)) : ?>
                  <img class="attend-image" src="<?php echo $attendSectionImage['url']; ?>" alt="<?php echo $attendSectionImage['alt']; ?>">
                <?php endif; ?>
                <?php if (!empty($attendsection['attend_section_title'])) : ?>
                  <h5 class="attend-section-title"><?php echo $attendsection['attend_section_title']; ?></h5>
                <?php endif; ?>
                <?php if (!empty($attendSectionLink)) : ?>
                  <div class="attend-link-container"><a href="<?php echo $attendSectionLink['url']; ?>" target="<?php echo $attendSectionLink['target']; ?>"><?php echo $attendSectionLink['title']; ?></a></div>
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
<?php
}

function whatOurAttendeesSaidSection($topicsContainer)
{
?>
  <section class="why-attend-section">
    <div class="wrapper">
      <?php
      $saidTitle = get_sub_field('what_our_attendees_said_title');
      ?>
      <?php if (!empty($saidTitle)) : ?>
        <h4 class="attendees-heading"><?php echo $saidTitle; ?></h4>
      <?php endif; ?>
      <?php if (!empty($topicsContainer)) : ?>
        <ul class="topics-list">
          <?php
          foreach ($topicsContainer as $topicContainer) {
          ?>
            <?php if (!empty($topicContainer)) : ?>
              <li>
                <?php if (!empty($topicContainer['topic_title'])) : ?>
                  <h6 class="topic-title"><?php echo $topicContainer['topic_title']; ?></h6>
                <?php endif; ?>
                <?php if (!empty($topicContainer['topic_short_description'])) : ?>
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
<?php
}

function intrestedInSpeakingSection()
{
?>
  <section class="interested-in-speaking">
    <div class="wrapper">
      <?php
      $sectionIntrestedInSpeakingTitle = get_sub_field('intrested_in_speaking_title');
      $sectionIntrestedInSpeakingText = get_sub_field('intersted_in_speaking_text');
      $contactEmail = get_sub_field('contact_email');
      $becomeSpeakerLink = get_sub_field('become_a_speaker_link');
      $sectionImage = get_sub_field('interested_in_speaking_section_image');
      ?>
      <?php if (!empty($sectionIntrestedInSpeakingTitle)) : ?>
        <h4 class="interested-inspeaking-heading"><?php echo $sectionIntrestedInSpeakingTitle; ?></h4>
      <?php endif; ?>
      <?php if (!empty($sectionIntrestedInSpeakingText)) : ?>
        <p><?php echo $sectionIntrestedInSpeakingText; ?></p>
      <?php endif; ?>
      <?php if (!empty($contactEmail)) : ?>
        <div class="mail-container"><a href="malito: <?php echo $contactEmail; ?>">example@email.com</a></div>
      <?php endif; ?>
      <?php if (!empty($becomeSpeakerLink)) : ?>
        <div class="become-speaker-container"><a href="<?php echo $becomeSpeakerLink['url']; ?>" target="<?php echo $becomeSpeakerLink['target']; ?>"><?php echo $becomeSpeakerLink['title']; ?></a></div>
      <?php endif; ?>
      <?php if (!empty($sectionImage)) : ?>
        <div class="image-section">
          <img src="<?php echo $sectionImage['url']; ?>" alt="<?php echo $sectionImage['alt']; ?>">
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php
}
?>