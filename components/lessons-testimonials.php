<section class="pp-section testimony-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-2">
        <div class="col-md-8 text-center heading-section">
          <h2 class="mb-4 line-bottom text-center">O que dizem sobre nós</h2>
          <!-- <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p> -->
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel">
            <?php
            $args = array(
              'post_type' => 'pp_testimonials',
              'post_status' => 'publish',
            );
            $deps = new WP_Query($args);

            foreach($deps->posts as $dep) {
              ?>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img me-4" style="background-image: url(<?php echo get_field('foto', $dep->ID) ?>)">
                  </div>
                  <div class="text ms-2 bg-light">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p><?php echo $dep->post_content ?></p>
                    <p class="name"><?php echo $dep->post_title ?></p>
                    <span class="position"><?php echo get_field('dep_cargo', $dep->ID) ?></span>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>