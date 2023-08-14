<?php get_template_part('template-parts/head', 'tags') ?>
<body>
  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>
  <nav class="navbar sticky-top navbar-light bg-white navbar-shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo get_home_url() ?>">
        <img src="<?php echo wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' )[0] ?>" alt="Papapiu logo" class="logo position-static d-inline-block align-text-top">
      </a>

      <?php
        wp_nav_menu(array(
          'menu' =>'lessons_menu',
          'menu_class' => 'js-clone-nav d-none d-lg-inline-block site-menu',
          'theme_location' => 'lessons_menu'
        ));
      ?>

      <form action="<?php echo get_post_type_archive_link('pp_lessons') ?>" method="GET" class="d-flex search-form  ms-auto me-3">
        <input type="search" class="form-control me-2" value="<?php get_search_query() ?>" name="q" id="q" placeholder="Procurar lições">
        <button type="submit" class="btn btn-outline-primary px-4" value="Procurar"><i class="bi bi-search"></i></button>
      </form>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#lesson-sidebar" aria-controls="lesson-sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>