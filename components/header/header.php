<?php get_template_part('components/head-tags') ?>
<body>
  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>
  <nav class="site-nav mb-5 pb-2">
    <div class="py-1 top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-lg-9">
            <a href="<?php echo get_theme_mod("facebook_page") ?>" class="small facebook"><i class="icon-facebook me-2"></i></a>
            <a href="<?php echo get_theme_mod("instagram_page") ?>" class="small instagram"><i class="icon-instagram me-2"></i></a>
            <a href="<?php echo get_theme_mod("pinterest_page") ?>" class="small instagram"><i class="icon-pinterest me-2"></i></a>
            <a href="mailto:<?php echo get_theme_mod("pp_email") ?>" class="small me-3"><i class="icon-envelope me-2"></i> <span
                class="d-none d-lg-inline-block"><span class=""
                ><?php echo get_theme_mod("pp_email") ?></span></span></a>
          </div>
        </div>
      </div>
    </div>
    <div class="sticky-nav js-sticky-header">
      <div class="container position-relative pt-2">
        <div class="site-navigation d-flex justify-content-between text-center">
          <?php if (has_custom_logo()) the_custom_logo() ?>
          <a href="<?php echo get_bloginfo('url') ?>" class="logo-link-negative"><img src="<?php echo get_theme_mod("pp_negative_logo") ?>" class="logo"/></a>
          <?php
            wp_nav_menu(array(
              'menu' =>'primary_menu',
              'menu_class' => 'js-clone-nav d-none d-lg-inline-block site-menu',
              'theme_location' => 'primary_menu'
            ));
          ?>
          <a href="#" class="burger ms-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
            data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>
        </div>
      </div>
    </div>
  </nav>