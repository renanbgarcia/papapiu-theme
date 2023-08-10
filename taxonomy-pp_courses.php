<?php
get_header('lessons');
?>

<main class="d-flex pp-section">
  <?php get_template_part('template-parts/lessons', 'sidebar') ?>
  <section class="container container-small">
  <h1 class="text-center"><?php echo get_queried_object()->name ?></h1>
  <div class="row mt-5 gy-4">
    <?php

    $terms = get_terms(array(
      'taxonomy' => 'pp_modules'
    ));

    foreach ($terms as $term) {
      ?>
      <div class="col-12 col-sm-3">
        <div class="card">
          <img src="<?php echo get_field('pp_module_cover', $term->ID) ?>" class="card-img-top" alt="Capa da lição">
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
  </section>
</main>
<?php
get_footer();
