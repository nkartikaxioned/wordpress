<?php
/*
Template Name: Speaker Listing Template
*/
get_header();

?>
<section class="pt-14">
    <div class="wrapper">
        <h2 class="text-3xl font-bold"><?php echo get_the_title(); ?></h2>
    </div>
</section>
<?php get_template_part('template-parts/pages/speaker/content','speakers-list');
get_footer();
?>
