<?php
$cards = get_sub_field('cards');
if ($cards) {
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
            <?php if ($cardImage) : ?>
              <figure><img src="<?php echo $cardImage['url']; ?>" alt="<?php echo $cardImage['alt']; ?>"></figure>
            <?php endif; ?>
            <?php if ($cardText) : ?>
              <p><?php echo $cardText; ?></p>
            <?php endif; ?>
            <?php if ($totalNumber) : ?>
              <span class="number"><?php echo $totalNumber; ?></span>
            <?php endif; ?>
            <?php if ($symbol) : ?>
              <span class="number"><?php echo $symbol; ?></span>
            <?php endif; ?>
          </li>
        <?php } ?>
      </ul>
    </div>
  </section>
<?php } ?>