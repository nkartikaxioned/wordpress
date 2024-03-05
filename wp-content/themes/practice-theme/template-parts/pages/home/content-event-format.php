<section class="pt-[60px]">
  <div class="wrapper">
    <div>
      <?php
      $formatHeading = get_sub_field('event_section_heading');
      $eventLink = get_sub_field('plan_your_visit_link');
      $events = get_sub_field('multiple_events');
      ?>
      <?php if ($formatHeading) { ?>
        <h4 class="heading text-4xl font-bold text-custom-red"><?php echo $formatHeading; ?></h4>
      <?php } ?>
      <?php if ($events) { ?>
        <ul class="events-list flex mt-[30px] mb-[20px] gap-5 max-lg:justify-center max-lg:flex-wrap">
          <?php
          foreach ($events as $event) {
            $eventImage = $event['event_image'];
          ?>
            <?php if ($event) { ?>
              <li class="first:bg-custom-black basis-[22%] border-solid border-[1px] p-4 bg-custom-red text-custom-white max-lg:min-w-[200px] max-md:min-w-[350px]">
                <?php if ($event['event_date']) { ?>
                  <p class="event-date text-center"><?php echo $event['event_date']; ?></p>
                <?php } ?>
                <div class="events-container flex items-center mt-4">
                  <?php if ($event['event_image']) { ?>
                    <figure class="w-[30px] h-[30px]"><img class="event-image object-cover w-full h-full rounded-full" src="<?php echo $eventImage['url']; ?>" alt="<?php echo $eventImage['alt']; ?>"></figure>
                  <?php } ?>
                  <?php if ($event['event_type']) { ?>
                    <span class="event-type block ml-[15px]"><?php echo $event['event_type']; ?></span>
                  <?php } ?>
                </div>
              </li>
            <?php } ?>
          <?php
          }
          ?>
        </ul>
      <?php } ?>
    </div>
    <div class="in-person-venue bg-custom-pastal p-[30px] w-[50%] ml-[45%] max-md:ml-[24%] max-md:min-w-[350px]">
      <?php if (get_sub_field('in_person_venue_title')) { ?>
        <p class="text-sm font-bold"><?php echo get_sub_field('in_person_venue_title'); ?></p>
      <?php } ?>
      <div class="venue-container">
        <?php if (get_sub_field('venue_company_name')) { ?>
          <p class="text-2xl font-bold text-custom-red mt-[5px]"><?php echo get_sub_field('venue_company_name'); ?></p>
        <?php } ?>
        <?php if (get_sub_field('venue_company_adderss')) { ?>
          <p class="text-2xl font-bold"><?php echo get_sub_field('venue_company_adderss'); ?></p>
        <?php } ?>
      </div>
      <?php if ($eventLink) { ?>
        <div class="event-link-container mt-[25px]">
          <a class="link font-bold" href="<?php echo $eventLink['url']; ?>" target="<?php echo $eventLink['target']; ?>"><?php echo $eventLink['title']; ?></a>
        </div>
      <?php } ?>
    </div>
  </div>
</section>