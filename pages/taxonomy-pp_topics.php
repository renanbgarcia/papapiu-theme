<?php get_header('lessons'); ?>

<main class="container pp-section">
  <h1 class="text-center"><?php echo get_queried_object()->name ?></h1>
  <div class="row mt-5 gy-4">
    <?php

    $query = new WP_Query(array(
      'post_type' => 'pp_lessons',
      'tax_query' => array(
        array(
          'taxonomy' => 'pp_topics',
          'field' => 'slug',
          'terms' => get_queried_object()->slug
        ),
      ),
    ));

    foreach ($query->posts as $post) {
      ?>
      <div class="col-12 col-sm-3">
        <div class="card">
          <img src="<?php echo get_field('pp_lesson_cover', $post->ID) ?>" class="card-img-top" alt="Capa da lição">
          <div class="card-body">
            <h5 class="card-title text-truncate"><?php echo $post->post_title ?></h5>
            <p class="card-text"><?php echo $post->post_excerpt ?></p>
            <a href="<?php echo get_the_permalink() ?>" class="btn btn-primary btn-sm">Ver</a>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>

</main>

<?php get_footer(); ?>