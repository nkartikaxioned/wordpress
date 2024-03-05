<?php
$cards = get_sub_field('cards');
if ($cards) {
?>
  <section class="cards-section">
    <div class="wrapper">
      <ul class="cards-list flex w-full justify-center gap-4 max-lg:flex-wrap">
        <?php foreach ($cards as $card) {
          $cardImage = $card['cards_image'];
          $cardText = $card['cards_text'];
          $totalNumber = $card['total_number'];
          $symbol = $card['symbol'];
        ?>
          <li class="bg-custom-pastal basis-1/5 bg-f5f4ef p-2 max-lg:min-w-[200px] max-md:min-w-[250px]">
            <?php if ($cardImage) : ?>
              <figure class="w-8 h-8 mb-3"><img class="w-full h-full rounded-full" src="<?php echo $cardImage['url']; ?>" alt="<?php echo $cardImage['alt']; ?>"></figure>
            <?php endif; ?>
            <?php if ($cardText) : ?>
              <p class="font-bold text-sm mb-2"><?php echo $cardText; ?></p>
            <?php endif; ?>
            <?php if ($totalNumber) : ?>
              <span class="number font-bold text-4xl"><?php echo $totalNumber; ?></span>
            <?php endif; ?>
            <?php if ($symbol) : ?>
              <span class="number font-bold text-4xl"><?php echo $symbol; ?></span>
            <?php endif; ?>
          </li>
        <?php } ?>
      </ul>
    </div>
  </section>
<?php } ?>