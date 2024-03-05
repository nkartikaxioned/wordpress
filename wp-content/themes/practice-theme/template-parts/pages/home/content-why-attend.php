<section class="why-attend-section pt-[60px]">
  <div class="wrapper">
    <?php
    $attendSections = get_sub_field('attend_sections');
    $sectionWhyAttendTitle = get_sub_field('why_attend_section_title');
    ?>
    <?php if (!empty($sectionWhyAttendTitle)) : ?>
      <h4 class="heading font-bold text-4xl text-custom-red"><?php echo $sectionWhyAttendTitle; ?></h4>
    <?php endif; ?>
    <?php if (!empty($attendSections)) : ?>
      <ul class="attend-list flex gap-5 mt-[30px] max-lg:justify-center max-lg:flex-wrap">
        <?php
        foreach ($attendSections as $attendsection) {
          $attendSectionImage = $attendsection['attend_section_image'];
          $attendSectionLink = $attendsection['attend_section_link'];
        ?>
          <?php if (!empty($attendsection)) : ?>
            <li class="bg-pastal-green basis-[35%] relative max-lg:min-w-[300px]">
              <?php if (!empty($attendSectionImage)) : ?>
                <figure class="w-full h-[200px]">
                  <img class="attend-image object-contain w-full h-full" src="<?php echo $attendSectionImage['url']; ?>" alt="<?php echo $attendSectionImage['alt']; ?>">
                </figure>
              <?php endif; ?>
              <div class="p-[20px]">
              <?php if (!empty($attendsection['attend_section_title'])) : ?>
                <h5 class="attend-title text-2xl font-bold flex-nowrap mb-[25px] max-lg:text-xl"><?php echo $attendsection['attend_section_title']; ?></h5>
              <?php endif; ?>
              <?php if (!empty($attendSectionLink)) : ?>
                <div class="absolute bottom-2"><a class="link" href="<?php echo $attendSectionLink['url']; ?>" target="<?php echo $attendSectionLink['target']; ?>"><?php echo $attendSectionLink['title']; ?></a></div>
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
</section>