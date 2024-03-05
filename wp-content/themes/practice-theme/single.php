<?php get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <?php
    while (have_posts()) {
      the_post() ?>
      <h2 class="pt-16 font-bold text-2xl"><?php the_title(); ?></h2>
      <?php the_content(); ?>
      <?php }; ?>
  </main>
</div>

<?php get_footer(); ?>