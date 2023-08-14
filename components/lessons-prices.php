<div class="pp-section mb-5">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-7 text-center" >
        <h2 class="line-bottom text-center mb-4">Pricing</h2>
        <p>Pare de perder conteúdo e garanta o melhor que você não encontra em outro lugar por um preço super acessível.</p>
      </div>
    </div>
    <div class="row">
      <?php
      $args = array(
        'post_type' => 'pp_prices',
        'post_status' => 'publish',
        'meta_key'          => 'preco_ordem',
        'orderby'           => 'meta_value',
        'order'             => 'ASC'
      );
      $prices = new WP_Query($args);

      foreach( $prices->posts as $price) {
        $is_featured = get_field('preco_destacado', $price->ID);
        ?>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" >
          <div class="pricing">
            <div class="pricing-img mb-4"><img src="<?php echo get_field('preco_imagem', $price->ID) ?>" alt="Image do preço" class="img-fluid"></div>
            <div class="pricing-body">
              <h3 class="pricing-plan"><?php echo $price->post_title ?></h3>
              <p class="mb-4"><?php echo $price->post_content ?></p>
              <div class="price"><span class="fig">R$<?php echo get_field('preco', $price->ID) ?></span><span>/mês</span></div>
              <p><a href="<?php echo get_field('preco_link', $price->ID) ?>" class="btn <?php echo $is_featured ? 'btn-secondary' : 'btn-outline-primary' ?>">Quero esse</a></p>
            </div>
          </div>
        </div>
        <?php
      }

      ?>
    </div>
  </div>
</div>