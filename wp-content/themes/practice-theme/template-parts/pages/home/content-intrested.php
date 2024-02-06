<section class="interested-in-speaking">
  <div class="wrapper">
    <?php
    $sectionIntrestedInSpeakingTitle = get_sub_field('intrested_in_speaking_title');
    $sectionIntrestedInSpeakingText = get_sub_field('intersted_in_speaking_text');
    $contactEmail = get_sub_field('contact_email');
    $becomeSpeakerLink = get_sub_field('become_a_speaker_link');
    $sectionImage = get_sub_field('interested_in_speaking_section_image');
    ?>
    <div class="text-section">
    <?php if ($sectionIntrestedInSpeakingTitle) : ?>
      <h4 class="interested-heading heading"><?php echo $sectionIntrestedInSpeakingTitle; ?></h4>
    <?php endif; ?>
    <?php if ($sectionIntrestedInSpeakingText) : ?>
      <p><?php echo $sectionIntrestedInSpeakingText; ?></p>
    <?php endif; ?>
    <?php if ($contactEmail) : ?>
      <div class="mail-container"><a href="malito: <?php echo $contactEmail; ?>">example@email.com</a></div>
    <?php endif; ?>
    <?php if ($becomeSpeakerLink) : ?>
      <div class="become-speaker-container"><a href="<?php echo $becomeSpeakerLink['url']; ?>" target="<?php echo $becomeSpeakerLink['target']; ?>"><?php echo $becomeSpeakerLink['title']; ?></a></div>
    <?php endif; ?>
    </div>
    <?php if ($sectionImage) : ?>
      <div class="image-section">
        <img src="<?php echo $sectionImage['url']; ?>" alt="<?php echo $sectionImage['alt']; ?>">
      </div>
    <?php endif; ?>
  </div>
</section>