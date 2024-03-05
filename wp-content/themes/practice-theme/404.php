<?php 
/*
 The template for displaying 404 pages (Not Found)
*/
get_header(); ?>
<section class="pt-14 pb-80 text-center">
  <div class="wrapper">
    <h2 class="text-3xl font-bold">404</h2>
    <p class="font-bold">Oops! Didn't find what you're looking for.</p>
    <div class="my-2">
      <a class="btn" href="<?php echo get_home_url(); ?>">Back to the homepage</a>
    </div>
  </div>
</section>
<?php get_footer(); ?>