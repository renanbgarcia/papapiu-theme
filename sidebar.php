<div class="col-lg-4 sidebar">
  <?php do_action('before_sidebar'); ?>
  <?php
  if (is_active_sidebar('posts_side_right')) {
    dynamic_sidebar('posts_side_right');
  } else { ?>
    <div id="search" class="widget widget_search sidebar-box">
      <?php get_search_form(); ?>
    </div><!-- #search -->

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
  <?php } ?>
</div>