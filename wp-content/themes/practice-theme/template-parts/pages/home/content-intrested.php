<section class="interested-in-speaking bg-custom-pastal">
  <div class="wrapper flex flex-wrap">
    <?php
    $sectionIntrestedInSpeakingTitle = get_sub_field('intrested_in_speaking_title');
    $sectionIntrestedInSpeakingText = get_sub_field('intersted_in_speaking_text');
    $contactEmail = get_sub_field('contact_email');
    $becomeSpeakerLink = get_sub_field('become_a_speaker_link');
    $sectionImage = get_sub_field('interested_in_speaking_section_image');
    ?>
    <div class="text-section w-[40%]">
      <?php if ($sectionIntrestedInSpeakingTitle) { ?>
        <h4 class="heading text-4xl font-bold w-[60%] mt-[50px]"><?php echo $sectionIntrestedInSpeakingTitle; ?></h4>
      <?php }; ?>
      <?php if ($sectionIntrestedInSpeakingText) { ?>
        <p class="text-sm mt-[15px]"><?php echo $sectionIntrestedInSpeakingText; ?></p>
      <?php }; ?>
      <?php if ($contactEmail) { ?>
        <div class="mail-container"><a class="text-dark-blue text-sm" href="malito{ <?php echo   $contactEmail; ?>" title="<?php echo $contactEmail; ?>">example@email.com</a></div>
      <?php }; ?>
      <?php if ($becomeSpeakerLink) { ?>
        <div class="become-speaker-container mt-[15px]">
          <a class="btn" href="<?php echo $becomeSpeakerLink['url']; ?>" target="<?php echo $becomeSpeakerLink['target']; ?>"><?php echo $becomeSpeakerLink['title']; ?></a>
        </div>
      <?php }; ?>
    </div>
    <?php if ($sectionImage) { ?>
      <div class="image-section w-[60%] max-h-[300px]">
        <img class="w-full h-full object-contain" src="<?php echo $sectionImage['url']; ?>" alt="<?php echo $sectionImage['alt']; ?>">
      </div>
    <?php }; ?>
  </div>
</section>