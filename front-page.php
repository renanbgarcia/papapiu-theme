  <?php get_header() ?>
  <div class="pp-hero overlay" style="background-image: url('<?php echo get_theme_mod('hero_image') ?>')">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-left">
            <!-- <div class="col-lg-6 text-center align-self-center order-lg-2">
              <a href="https://vimeo.com/342333493" data-fancybox class="video-play-btn" data-aos="fade-up" data-aos-delay="400">
                <span class="icon-play"></span>
              </a>
            </div> -->
            <div class="col-lg-6 text-center text-lg-left">
              <h1 class="mb-4 heading text-white text-start" data-aos="fade-up" data-aos-delay="100">
                <?php echo get_theme_mod( "hero_heading" ) ?>
              </h1>
              <div class="mb-5 text-white desc mx-" data-aos="fade-up" data-aos-delay="200">
                <p class="text-start"><?php echo get_theme_mod( "hero_sub_heading" ) ?></p>
              </div>
              <?php echo get_theme_mod( "action_button" ) ?
                    '<p class="mb-0 text-start"><a href="#" class="btn btn-secondary">Baixe agora <i class="bi bi-arrow-right"></i></a></p>' : ""
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php 
    if (get_theme_mod("home_featured_lessons")) {
      get_template_part('template-parts/featured', 'lessons');
    }
  ?>

  <div class="site-section bg-light">
    <div class="container">
      <div class="row mb-5 align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <form action="<?php home_url( '/' ) ?>" method="GET" class="d-flex search-form">
            <span class="icon-"></span>
            <input type="search" class="form-control me-2" value="<?php get_search_query() ?>" name="s" id="s" placeholder="Procurar atividades">
            <input type="submit" class="btn btn-primary px-4" value="Buscar">
          </form>
        </div>
        <div class="col-lg-6 text-lg-right">
          <div class="d-inline-flex align-items-center ms-auto">
            <span class="mr-4">Compartilhe:</span>
            <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fpapapiu.com.br" class="mx-2 social-item"><span class="icon-facebook"></span></a>
            <a href="https://wa.me/?text=https://papapiu.com.br" class="mx-2 social-item"><span class="icon-whatsapp"></span></a>
            <a href="https://pinterest.com/pin/create/button/?url=https%3A%2F%2Fpapapiu.com.br&media=&description=" class="mx-2 social-item"><span class="icon-pinterest"></span></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="heading mb-4">
            <span class="caption">Últimas</span>
            <h2>Atividades diversas</h2>
          </div>
        </div>
        <div class="col-lg-8">

        <?php /** Loop for posts */
        $posts = get_posts(array('numberposts' => 7));
        foreach ($posts as $post) {
        ?>
          <div class="d-flex flex-wrap flex-md-nowrap tutorial-item mb-4">
            <div class="img-wrap mb-sm-4">
              <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('medium') ?>" alt="<?php the_post_thumbnail_caption() ?>" class="img-fluid"></a>
            </div>
            <div>
              <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
              <p><?php the_excerpt() ?></p>
              <p class="meta">
                <?php
                foreach (get_the_category() as $cat) {
                ?>
                  <span class="mr-2 mb-2">
                    <?php echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a>'; ?>
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
        wp_reset_postdata();
        ?>

        <!-- pagination -->
        <div class="custom-pagination">
          <ul class="list-unstyled">
          <?php $nposts = wp_count_posts();
            $npages = ceil($nposts->publish / 10);
            $i = 1;
            while ($i <= $npages) {
              echo "<li><a href='" . get_post_type_archive_link( 'post' ) . "page/" . $i . "'><span>" . $i . "</span></a></li>";
              $i++;
            }
          ?>
          </ul>
        </div>
      </div>

        <div class="col-lg-4">
          <?php $posts = get_posts(array('numberposts' => 3, 'offset' => 7));
          foreach ($posts as $post) {
          ?>
            <!-- side blog items -->
            <div class="box-side mb-3">
              <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('medium') ?>" alt="<?php the_post_thumbnail_caption() ?>" class="img-fluid"></a>
              <h3><a href="<?php the_permalink() ?>"> <?php the_title() ?> </a></h3>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <?php if (get_theme_mod("home_show_whatweoffer")) {?>
  <div class="pp-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="0">
          <h2 class="line-bottom text-center mb-4">What We Offer</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
            blind texts.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="feature">
            <span class="icon-music_note color-1"></span>
            <h3>Music Class</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="feature">
            <span class="icon-calculator color-2"></span>
            <h3>Math Class</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="feature">
            <span class="icon-leanpub color-3"></span>
            <h3>English Class</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="feature">
            <span class="icon-book color-4"></span>
            <h3>Reading for Kids</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="feature">
            <span class="icon-change_history color-5"></span>
            <h3>History Class</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="feature">
            <span class="icon-class color-6"></span>
            <h3>Active Class</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }
  ?>

  <?php if (get_theme_mod("home_show_princing")) {
    get_template_part('template-parts/lessons', 'prices');
  } ?>

  <?php if (get_theme_mod("home_show_testimonials")) {
    get_template_part('template-parts/lessons', 'testimonials');
  } ?>


  <?php get_footer() ?>