<div class="col-lg-3 sidebar">
  <?php do_action('before_sidebar'); ?>

    <div class="wp-block-categories sidebar-box">
      <?php the_widget(
        'WP_Widget_Categories',
        array(
          'title' => 'Categorias',
          'count' => 1
        ),
        array(
          'before_title' => '<h3>',
          'after_title' => '</h3>',
        )
      ) ?>
    </div>

    <?php get_recent_posts() ?>
</div>