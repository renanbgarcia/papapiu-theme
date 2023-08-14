<?php
get_header('lessons');
$topics = get_terms(array('taxonomy' => 'pp_topics'));
$queried_topic = array_key_exists('topic', $_GET) ? $_GET['topic'] : null;
?>

<main class="container pp-section pt-5 mb-5">

  <h1 class="mb-5">Procure lições</h1>

  <div class="row">
    <div class="col-12 col-md-4 ps-md-0 mb-2 mb-md-0">
      <form action="<?php echo get_post_type_archive_link('pp_lessons') ?>" method="GET" class="d-flex search-form">
        <select class="form-select form-select-lg h-100" id="topic-select" aria-label=".form-select-lg">
          <option value="all">Todos os tópicos</option>
          <?php
            foreach ($topics as $topic) {
              $selected = $queried_topic === $topic->slug ? 'selected' : '';
              echo "<option " . $selected .  " value=" . $topic->slug . ">" . $topic->name . "</option>";
            }
          ?>
        </select>
      </form>
    </div>
    <div class="col-12 col-md-8 pe-md-0">
      <form action="<?php echo get_post_type_archive_link('pp_lessons') ?>" method="GET" class="d-flex search-form">
        <input type="search" class="form-control me-2" value="<?php get_search_query() ?>" name="q" id="q" placeholder="Procurar lições">
        <button type="submit" class="btn btn-primary px-4" value="Procurar"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </div>

  <div class="row mt-2 gy-4">
    <nav class="nav nav-underline nav-fill mb-3">
      <li class="nav-item"><a href="<?php echo get_post_type_archive_link('pp_lessons') ?>" class="nav-link <?php echo array_key_exists('module', $_GET)? "" : "active" ?>">Todos</a></li>
      <?php

      $modules = get_terms(array('taxonomy' => 'pp_modules'));

      foreach ($modules as $module) {
        $is_active = array_key_exists('module', $_GET) ? ($_GET['module'] === $module->slug ? true : false) : false;
        echo '<li class="nav-item"><a class="nav-link ' . ($is_active ? 'active' : '') . '" href="' . get_post_type_archive_link('pp_lessons') . '?module=' . $module->slug . '">' . $module->name . '</a></li>';
      }

      ?>
    </nav>

    <?php

    $module = array_key_exists('module', $_GET) ? $_GET['module'] : '';
    $search = array_key_exists('q', $_GET) ? $_GET['q'] : '';

    foreach ($topics as $topic) {
      if ($queried_topic) {
        if ($topic->slug !== $queried_topic && $queried_topic !== "all") {
          continue;
        }
      }

      $args = array(
        'post_type' => 'pp_lessons',
        's' => $search,
        'tax_query' => array(
          array(
            'taxonomy' => 'pp_topics',
            'field'    => 'slug',
            'terms' => $topic->slug
          ),
          array(
            'taxonomy' => 'pp_modules',
            'field'    => 'slug',
            'terms' => $module
          )
        )
      );

      if ($search === "") {
        unset($args['s']);
      }
      if ($module === "") {
        \array_splice($args['tax_query'], 1, 1);
      }

      $query = new WP_Query($args);

      if (!$query->have_posts()) {
        continue;
      }

      ?>
      <div class="bg-white rounded-4 p-4 shadow mb-3 row">
      <?php

      echo "<h3><img class='img-fluid me-2' alt='Icone do tópico' src='" . get_field('pp_topic_icone', $topic->taxonomy . '_' . $topic->term_id ) . "'/>" . $topic->name . "</h3>";
      foreach ($query->posts as $post) {
    ?>
        <div class="col-12 col-sm-4">
          <a href="<?php the_permalink() ?>">
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-5">
                  <img src="<?php echo get_field('pp_lesson_cover') ?>" class="img-fluid rounded-start" alt="Capa do tópico">
                </div>
                <div class="col-md-7">
                  <div class="card-body">
                    <h6 class="card-title"><?php the_title() ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
    <?php
      };
      wp_reset_postdata();
      ?>
      </div>
      <?php
    }
    ?>

  </div>

</main>

<?php get_footer(); ?>