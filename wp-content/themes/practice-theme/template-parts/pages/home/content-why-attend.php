<section class="why-attend-section">
  <div class="wrapper">
    <?php
    $attendSections = get_sub_field('attend_sections');
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