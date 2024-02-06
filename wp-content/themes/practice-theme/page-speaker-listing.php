<?php
/*
Template Name: Speaker Listing Template
*/
get_header();

?>
<section>
    <div class="wrapper">
        <h2><?php echo get_the_title(); ?></h2>
    </div>
</section>

<?php get_template_part('template-parts/pages/speaker/content','speakers-list');
get_footer();
?>
