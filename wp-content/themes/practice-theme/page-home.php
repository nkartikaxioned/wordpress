<?php
/*
Template Name: Home Template
*/
get_header(); // Include the header template
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section>
            <h2>Home</h2>
            <p>This is Home page</p>
            <?php 
            // store the value in variable and echo value on page
            $title = get_field('sample_title');
            echo '<h4>'.$title."</h4><br>";
            var_dump($title);
            echo '<br>'; 
            // print output using the_title 
            //the_field('description');
            echo wp_kses_post(get_field('description'));
            echo '<br>'; 
            the_field('number_field');
            //var_dump(get_field('number_field'));
            // email
            the_field('email');
            echo antispambot(get_field('email'));
            ?>
            <!-- url -->
            <a href="<?php echo esc_attr( get_field('shop_url') ); ?>"><?php echo esc_attr( get_field('shop_url') ); ?></a>
            <!-- image -->
            <?php $image = get_field('image'); 
            $thumb= $image['url'];
            var_dump(get_field('image'));
            ?>
            <figure><img src="<?php echo esc_url($image['url']); ?>" alt="img"></figure>
            <?php 
            //files
            $filesupload = get_field('file_upload');
            var_dump($filesupload);
            ?>
            <div>
            <a href="<?php echo esc_html($filesupload['url']); ?>" >view File</a>
            </div>
            <!-- wysiwyg -->
            <?php the_field('editor'); ?>
            <!-- oEmbed -->
            <div>
            <?php 
            //var_dump(get_field('oembed_youtube'));
            echo get_field('oembed_youtube'); 
            ?>
            </div>
            <!-- gallery -->
            <?php 
            $gallerys = get_field('custom_gallery'); 
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            var_dump($gallerys);
            ?>
           <?php if( $gallerys ): ?>
    <ul>
        <?php foreach( $gallerys as $gallery ): ?>
            <li>
                <a href="<?php echo esc_url($gallery['url']); ?>">
                     <img src="<?php echo esc_url($gallery['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($gallery['alt']); ?>" />
                </a>
                <p><?php echo esc_html($gallery['caption']); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?> 
               <!-- select -->
               <?php 
               $select = get_field_object('select_custom');
               var_dump($select['value']);
               ?>
             <?php  if( $select ): ?>
               <p><?php echo $select['value']['label'] .'='. $select['value']['value']; ?></p>
<?php endif; ?>
              <!-- radio button -->
              <?php var_dump(get_field_object('custom_radio'));
              $radioo = get_field_object('custom_radio');
              echo "<br>".$radioo['value']."<br>";

              //true/ false
              var_dump(get_field('truefalse'));
              echo(get_field('truefalse'));
              echo "<br>";
              //link
              echo 'link <br>';
              var_dump(get_field('custom_link'));
              echo "<br>";
              // pagelink
              var_dump(get_field_object('custom_page_link'));
              echo"====pagelink====";
              echo "<br>";
              // pageobject
              echo"///////////////////////////////+++++++++++";
              var_dump(get_field_object('custom_post_object'));
              echo"///////////////////////////////";
              //relationship
              var_dump(get_field_object('custom_relationship'));
              ?>

        </section>
        <section class="content-area content-thin">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="article-loop">
          <header>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            By: <?php the_author(); ?>
          </header>
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
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer(); // Include the footer template
?>