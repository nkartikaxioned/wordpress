<?php get_header(); ?>
<main class="wrap">
  <section class="content-area content-thin">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="article-loop">
          <header>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            By: <?php the_author(); ?>
          </header>
          <?php //the_excerpt(); ?> 
        </article>
      <?php endwhile;
    else : ?>
      <article>
        <p>Sorry, no posts were found!</p>
      </article>
    <?php endif; ?>
  </section>
  <section>
  <?php
  $args = array(
    'date_query' => array(
       array(
         'after' => '2024-01-02',
       ),
       array(
          'before' => '2024-01-05',
       ),
       'relation' => 'AND'
       //'compare' => 'BETWEEN',
    ), 
    'post_type' => 'books',
    'title' => 'Hamlet',
    'category_name' => 'book',
    'tag' => 'book_hamlet',
    'posts_per_page' => -1, // -1 to show all posts
);

$custom_query = new WP_Query($args);

if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
        the_title('<h2>', '</h2>');
        the_content();
    endwhile;
else :
    echo '<p>No custom posts found.</p>';
endif;

// Reset Post Data
wp_reset_postdata();
?>
  </section>
</main>
<?php get_footer(); ?>
