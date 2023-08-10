<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Template Name: Courses
 */

 get_header();
 ?>

 <main class="d-flex pp-section">
  <?php //get_template_part('template-parts/lessons', 'sidebar') ?>
  <section class="container container-small">

<?php

    $terms = get_terms(array(
      'taxonomy' => 'pp_courses',
      'hide_empty' => false
    ));


    foreach ($terms as $term) {
      ?>
      <div class="col-12 col-sm-3">
        <div class="card">
          <img src="<?php echo get_field('pp_course_cover', $term->taxonomy . '_' . $term->term_id) ?>" class="card-img-top" alt="Capa do curso <?php echo $term->name ?>">
          <div class="card-body">
            <h5 class="card-title text-truncate"><?php echo $term->name ?></h5>
            <p class="card-text"><?php echo $term->description ?></p>
            <a href="<?php echo get_the_permalink() ?>" class="btn btn-primary btn-sm">Ver</a>
          </div>
        </div>
      </div>
      <?php
    }
    ?>

  </section>
</main>

<?php get_footer() ?>