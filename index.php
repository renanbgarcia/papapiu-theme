<?php get_header() ?>
  <div class="pp-hero overlay" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/images/hero_bg.jpg);">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-left">
            <div class="col-lg-6 text-center align-self-center order-lg-2">
              <a href="https://vimeo.com/342333493" data-fancybox class="video-play-btn" >
                <span class="icon-play"></span>
              </a>
            </div>
            <div class="col-lg-6 text-center text-lg-left">
              <h1 class="mb-4 heading text-white" >
                <?php echo get_theme_mod( "hero_heading" ) ?>
              </h1>
              <div class="mb-5 text-white desc mx-" >
                <p><?php echo get_theme_mod( "hero_sub_heading" ) ?></p>
              </div>
              <!-- <p class="mb-0" ><a href="#" class="btn btn-primary">Explore
                  now</a></p> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php 
    if (get_theme_mod("home_featured_lessons")) {
    ?>
    <div class="site-section pb-0">
      <div class="container mb-md-5 mb-4 pb-md-3 pb-0">
        <div class="row align-items-stretch overlap">
          <div class="col-lg-8">
            <div class="box h-100">
              <div class="d-flex align-items-center row">
                <div class="col-md-4 col-12"><img src="<?php echo get_template_directory_uri() ?>/assets/images/img_1.jpg" class="img-fluid" alt="Image"></div>
                <div class="text col-md-8 col-12">
                  <a href="#" class="category">Tutorial</a>
                  <h3><a href="#">Learning React Native</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum quidem totam exercitationem eveniet blanditiis nulla, et possimus, itaque alias maxime!</p>
                  <p class="mb-0">
                    <span class="brand-react h5"></span>
                    <span class="brand-javascript h5"></span>
                  </p>
                  <p class="meta">
                    <span class="mr-2 mb-2">1hr 24m</span>
                    <span class="mr-2 mb-2">Advanced</span>
                    <span class="mr-2 mb-2">Jun 18, 2020</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="box small h-100">
              <div class="d-flex align-items-center mb-2">
                <div class="img"><img src="images/img_2.jpg" class="img-fluid" alt="Image"></div>
                <div class="text">
                  <a href="#" class="category">Tutorial</a>
                  <h3><a href="#">Learning React Native</a></h3>
                </div>
              </div>
              <div class="d-flex align-items-center mb-2">
                <div class="img"><img src="images/img_3.jpg" class="img-fluid" alt="Image"></div>
                <div class="text">
                  <a href="#" class="category">Tutorial</a>
                  <h3><a href="#">Learning React Native</a></h3>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <div class="img"><img src="images/img_4.jpg" class="img-fluid" alt="Image"></div>
                <div class="text">
                  <a href="#" class="category">Tutorial</a>
                  <h3><a href="#">Learning React Native</a></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    }
  ?>

  <div class="site-section bg-light">
    <div class="container">
      <div class="row mb-5 align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <form action="#" class="d-flex search-form">
            <span class="icon-"></span>
            <input type="search" class="form-control me-2" placeholder="Search subjects">
            <input type="submit" class="btn btn-primary px-4" value="Search">
          </form>
        </div>
        <div class="col-lg-6 text-lg-right">
          <div class="d-inline-flex align-items-center ms-auto">
            <span class="mr-4">Share:</span>
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
              <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" alt="Image" class="img-fluid"></a>
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
              <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" alt="Image" class="img-fluid"></a>
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
        <div class="col-lg-7 text-center" >
          <h2 class="line-bottom text-center mb-4">What We Offer</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
            blind texts.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" >
          <div class="feature">
            <span class="icon-music_note color-1"></span>
            <h3>Music Class</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" >
          <div class="feature">
            <span class="icon-calculator color-2"></span>
            <h3>Math Class</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" >
          <div class="feature">
            <span class="icon-leanpub color-3"></span>
            <h3>English Class</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" >
          <div class="feature">
            <span class="icon-book color-4"></span>
            <h3>Reading for Kids</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" >
          <div class="feature">
            <span class="icon-change_history color-5"></span>
            <h3>History Class</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" >
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

  <?php if (get_theme_mod("home_show_princing")) {?>
  <div class="pp-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-7 text-center" >
          <h2 class="line-bottom text-center mb-4">Pricing</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
            blind texts.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" >
          <div class="pricing">
            <div class="pricing-img mb-4"><img src="<?php echo get_template_directory_uri() ?>/assets/images/1x/asset-1.png" alt="Image" class="img-fluid"></div>
            <div class="pricing-body">
              <h3 class="pricing-plan">Infant</h3>
              <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                there live the blind texts.</p>
              <div class="price"><span class="fig">$50.99</span><span>/month</span></div>
              <p><a href="#" class="btn btn-outline-primary">Get Started</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" >
          <div class="pricing">
            <div class="pricing-img mb-4"><img src="<?php echo get_template_directory_uri() ?>/assets/images/1x/asset-2.png" alt="Image" class="img-fluid"></div>
            <div class="pricing-body">
              <h3 class="pricing-plan">Toddler</h3>
              <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                there live the blind texts.</p>
              <div class="price"><span class="fig">$99.99</span><span>/month</span></div>
              <p><a href="#" class="btn btn-primary">Get Started</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" >
          <div class="pricing">
            <div class="pricing-img mb-4"><img src="<?php echo get_template_directory_uri() ?>/assets/images/1x/asset-3.png" alt="Image" class="img-fluid"></div>
            <div class="pricing-body">
              <h3 class="pricing-plan">Lad</h3>
              <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                there live the blind texts.</p>
              <div class="price"><span class="fig">$199.99</span><span>/month</span></div>
              <p><a href="#" class="btn btn-outline-primary">Get Started</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php if (get_theme_mod("home_show_testimonials")) {?>
  <section class="pp-section testimony-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-2">
        <div class="col-md-8 text-center heading-section">
          <h2 class="mb-4 line-bottom text-center">What Parents Says About Us</h2>
          <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel">
            <div class="item">
              <div class="testimony-wrap d-flex">
                <div class="user-img me-4" style="background-image: url(images/teacher-1.jpg)">
                </div>
                <div class="text ms-2 bg-light">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Racky Henderson</p>
                  <span class="position">Father</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap d-flex">
                <div class="user-img me-4" style="background-image: url(images/teacher-2.jpg)">
                </div>
                <div class="text ms-2 bg-light">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Henry Dee</p>
                  <span class="position">Mother</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap d-flex">
                <div class="user-img me-4" style="background-image: url(images/teacher-3.jpg)">
                </div>
                <div class="text ms-2 bg-light">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Mark Huff</p>
                  <span class="position">Mother</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap d-flex">
                <div class="user-img me-4" style="background-image: url(images/teacher-4.jpg)">
                </div>
                <div class="text ms-2 bg-light">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Rodel Golez</p>
                  <span class="position">Mother</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap d-flex">
                <div class="user-img me-4" style="background-image: url(images/teacher-1.jpg)">
                </div>
                <div class="text ms-2 bg-light">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Ken Bosh</p>
                  <span class="position">Mother</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php } ?>


  <?php get_footer() ?>