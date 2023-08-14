<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <h3><?php echo get_bloginfo('name') ?></h3>
          <span><?php echo get_bloginfo('description') ?></span>
          <p class="mt-2">Email: <?php echo get_theme_mod(('pp_email')) ?><br></p>
          <div class="social-links text-left mt-3 pt-3 pt-md-0">
          <a href="<?php echo get_theme_mod("facebook_page") ?>" class="facebook"><i class="icon-facebook"></i></a>
          <a href="<?php echo get_theme_mod("instagram_page") ?>" class="instagram"><i class="icon-instagram"></i></a>
          <a href="<?php echo get_theme_mod("pinterest_page") ?>" class="pinterest"><i class="icon-pinterest"></i></a>
        </div>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
        <h4><?php echo wp_get_nav_menu_name( 'footer_1' ) ?></h4>
          <?php
          wp_nav_menu(array(
              'menu' => 'footer_1',
              'menu_class' => 'site-menu',
              'theme_location' => 'footer_1'
          ));
          ?>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4><?php echo wp_get_nav_menu_name( 'footer_2' ) ?></h4>
          <?php
          wp_nav_menu(array(
              'menu' =>'footer_2',
              'menu_class' => 'site-menu',
              'theme_location' => 'footer_2'
              
          ));
          ?>
        </div>

        <?php
          if(!get_theme_mod('footer_widget_form')) {
        ?>
        <div class="col-lg-4 col-md-6">
          <h4>Receba novas atividades</h4>
          <p>Fique sabendo de novidades e novos materiais per e-mail!</p>
          <form class="form" method="post" action="http://localhost/ppdev/?na=s">

          <input type="hidden" name="nlang" value=""><div class="tnp-field tnp-field-firstname"><label for="tnp-1" class="form-label">Nome</label>
          <input class="tnp-name form-control" type="text" name="nn" id="tnp-1" value=""></div>
          <div class="tnp-field tnp-field-email"><label for="tnp-2" class="form-label">E-mail</label>
          <input class="tnp-email form-control" type="email" name="ne" id="tnp-2" value="" required></div>
          <div class="mt-3"><input class="btn btn-primary" type="submit" value="Receber novidades" >
          </div>
          </form>
        </div>
        <?php } else {
          if (is_active_sidebar('footer_area')) {
            dynamic_sidebar('footer_area');
          }
        } ?>

      </div>
    </div>
  </div>

  <div class="container d-md-flex py-4">
    <div class="mr-md-auto text-center text-md-start">
      <p>
        Copyright &copy;
        <script>
          document.write(new Date().getFullYear());
        </script> Todos os direitos reservados | Website feito com
        <i class="icon-heart text-danger" aria-hidden="true"></i> por <a href="https://papapiu.com.br" target="_blank">Papapiu</a>
      </p>
    </div>

  </div>
</footer><!-- End Footer -->

<!-- <div id="overlayer"></div>
<div class="loader">
  <div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div> -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center small"><i class="icon-chevron-up"></i></a>
<?php wp_footer(); ?>
</body>

</html>