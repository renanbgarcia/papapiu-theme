<?php get_header('lessons'); ?>

<main class="container">
  <h2><?php echo get_the_archive_title() ?></h2>
  <div class="row">
    <?php
    $terms = get_terms( array(
      'taxonomy' => 'pp_modules',
      'hide_empty' => false,
    ));
    foreach ($terms as $term) {
      ?>
      <div class="card col-12 col-sm-4">
        <img src="..." class="card-img-top" alt="Capa do módulo">
        <h5 class="card-title"><?php echo $term->name ?></h5>
        <p class="card-text"><?php echo $term->description ?></p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
      <?php
    }
    ?>
  </div>

</main>

<?php get_footer(); ?>