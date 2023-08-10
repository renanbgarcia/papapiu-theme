<div class="pp-lessons-sidebar flex-shrink-0 collapse collapse-horizontal " id="lesson-sidebar">
    <ul class="list-unstyled ps-0 pt-3">
    <?php
      $modules = get_terms('pp_modules');
      foreach( $modules as $i => $module) {  
        ?>
        <li class="mb-1">
          <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#topic-collapse-<?php echo $i ?>" aria-expanded="true">
          <i class="icon-folder d-inline-block"></i> <span class="inline-block mx-2"><?php echo $module->name ?></span>
          </button>
          <div class="collapse" id="topic-collapse-<?php echo $i ?>">
            <ul class="list-unstyled list-group">
              <?php
                $args = array(
                  'post_type' => 'pp_lessons',
                  'post_status' => 'publish',
                  'tax_query' => array(
                      array(
                          'taxonomy' => 'pp_modules',
                          'field'    => 'slug',
                          'terms'    => array( $module->name )
                      )
                  )
                );

                $query = new WP_Query($args);

                foreach ($query->posts as $post) {
                  ?> <li class=""><a href="<?php echo get_the_permalink($post->ID); ?>" class="d-inline-flex text-decoration-none list-group-item list-group-item-action"><?php echo $post->post_title ?></a></li> <?php
                }

                wp_reset_postdata();
              ?>
            </ul>
          </div>
        </li>
        <?php
      }
    ?>
    </ul>

  </div>