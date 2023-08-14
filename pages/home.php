<?php get_header() ?>

<div class="site-section first-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <?php /** Loop for posts */
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $posts = pp_get_posts(array('paged' => $paged));

        while ($posts->have_posts()) {
          $posts->the_post()
        ?>
          <div class="d-flex tutorial-item mb-4">
            <div class="img-wrap">
              <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_post_thumbnail_caption() ?>" class="img-fluid"></a>
            </div>
            <div>
              <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
              <p><?php the_excerpt() ?></p>
              <p class="meta">
                <?php
                foreach (get_the_category() as $cat) {
                ?>
                  <span class="mr-2 mb-2">
                    <?php echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' . esc_html($cat->name) . '</a>'; ?>
                  </span>
                <?php
                }
                ?>
                <span class="mr-2 mb-2"><?php echo get_the_date() ?></span>
              </p>

              <p><a href="<?php the_permalink() ?>" class="btn btn-primary custom-btn">Ver</a></p>
            </div>
          </div>
        <?php
        }
        the_posts_pagination(array(
          'class' => 'custom-pagination',
          'type' => 'list',
          'prev_text' => '<i class="icon-arrow-left"></i>',
          'next_text' => '<i class="icon-arrow-right"></i>',
        ));

        wp_reset_postdata();
        ?>

      </div>
      <?php get_sidebar() ?>
    </div>
  </div>
</div>
<?php get_footer() ?>