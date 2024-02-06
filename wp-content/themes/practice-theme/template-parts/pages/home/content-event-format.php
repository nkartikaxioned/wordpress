<section class="event-format-section">
  <div class="wrapper">
    <div>
      <?php
      $formatHeading = get_sub_field('event_section_heading');
      $eventLink = get_sub_field('plan_your_visit_link');
      $events = get_sub_field('multiple_events');
      ?>
      <?php if ($formatHeading) : ?>
        <h4 class="event-format-heading heading"><?php echo $formatHeading; ?></h4>
      <?php endif; ?>
      <?php if ($events) : ?>
        <ul class="events-list">
          <?php
          foreach ($events as $event) {
            $eventImage = $event['event_image'];
          ?>
            <?php if ($event) : ?>
              <li>
                <?php if ($event['event_date']) : ?>
                  <p class="event-date"><?php echo $event['event_date']; ?></p>
                <?php endif; ?>
                <div class="events-container">
                  <?php if ($event['event_image']) : ?>
                    <figure><img class="event-image" src="<?php echo $eventImage['url']; ?>" alt="<?php echo $eventImage['alt']; ?>"></figure>
                  <?php endif; ?>
                  <?php if ($event['event_type']) : ?>
                    <span class="event-type"><?php echo $event['event_type']; ?></span>
                  <?php endif; ?>
                </div>
              </li>
            <?php endif; ?>
          <?php
          }
          ?>
        </ul>
      <?php endif; ?>
    </div>
    <div class="in-person-venue">
      <?php if (get_sub_field('in_person_venue_title')) : ?>
        <p><?php echo get_sub_field('in_person_venue_title'); ?></p>
      <?php endif; ?>
      <div class="venue-container">
        <?php if (get_sub_field('venue_company_name')) : ?>
          <p class="company-name"><?php echo get_sub_field('venue_company_name'); ?></p>
        <?php endif; ?>
        <?php if (get_sub_field('venue_company_adderss')) : ?>
          <p class="company-address"><?php echo get_sub_field('venue_company_adderss'); ?></p>
        <?php endif; ?>
      </div>
      <?php if ($eventLink) : ?>
        <div class="event-link-container">
          <a href="<?php echo $eventLink['url']; ?>" target="<?php echo $eventLink['target']; ?>"><?php echo $eventLink['title']; ?></a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>