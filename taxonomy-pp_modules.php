<?php get_header('lessons'); ?>

<main class="container pp-section">
  <h1 class="text-center"><?php echo get_queried_object()->name ?></h1>
  <div class="row mt-5 gy-4">
    <?php

    $terms = get_field('pp_lesson_topics');
    foreach ($terms as $term) {
      ?>
      <div class="col-12 col-sm-3">
        <div class="card">
          <img src="<?php echo get_field('pp_topic_cover', $post->ID) ?>" class="card-img-top" alt="Capa do tópico">
          <div class="card-body">
            <h5 class="card-title text-truncate"><?php echo $term->name ?></h5>
            <p class="card-text"><?php echo $term->description ?></p>
            <a href="<?php echo get_term_link( $term, 'pp_lesson_topics' ) ?>" class="btn btn-primary btn-sm">Ver</a>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>

</main>

<?php get_footer(); ?>