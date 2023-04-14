<?php
get_header('lessons');
?>

<script src="https://apis.google.com/js/platform.js" async defer></script>

<main class="d-flex pp-lesson-main">
  <?php get_template_part('template-parts/lessons', 'sidebar') ?>
  <section class="container container-small">

    <nav aria-label="breadcrumb" class="pt-3">
      <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item"><a itemprop="item" href="<?php echo get_post_type_archive_link('pp_lessons') . "?module=" . get_field('pp_lesson_module')[0]->slug ?>"><span itemprop="name"><?php echo get_field('pp_lesson_course')[0]->name ?></span></a></li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item"><a itemprop="item" href="<?php echo get_post_type_archive_link('pp_lessons') . "?module=" . get_field('pp_lesson_module')[0]->slug ?>"><span itemprop="name"><?php echo get_field('pp_lesson_module')[0]->name ?></span></a></li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item"><a itemprop="item" href="<?php echo get_post_type_archive_link('pp_lessons') . "?topic=" . get_field('pp_lesson_primary_topic')->slug ?>"><span itemprop="name"><?php echo get_field('pp_lesson_primary_topic')->name ?></span></a></li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item active" aria-current="page"><span itemprop="item"><span itemprop="name"><?php the_title() ?></span></span></li>
      </ol>
    </nav>

    <div class="pp-lesson pt-2">

      <div class="pp-lesson-header shadow row mb-4 mx-0">
        <div class="col-12 col-md-5">
          <img class="mb-2" src="<?php echo get_field('pp_lesson_cover') ?>" />
        </div>
        <div class="pp-lesson-info col-12 col-md-7">
          <h1><?php the_title() ?></h1>

          <!-- Download buttons -->
          <div class="row">
            <div class="col-12 col-md-4 d-flex align-items-start gap-2 flex-wrap">
              <div class="w-100">História:</div>
              <a href="<?php echo get_field('pp_lesson_story') ?>" download class="btn btn-primary mb-2"><i class="bi bi-book-half"></i> Baixar</a>
              <div class="btn btn-primary g-savetodrive" data-src="<?php echo get_field('pp_lesson_story') ?>" data-filename="<?php echo substr(get_field('pp_lesson_story'), strrpos(get_field('pp_lesson_story'), "/") + 1); ?>" data-sitename="Papapiu"></div>
            </div>
            <div class="col-12 col-md-4 d-flex align-items-start gap-2 flex-wrap">
              <div class="w-100">Atividades:</div>
              <a href="<?php echo get_field('pp_lesson_pdf_worksheets') ?>" download class="btn btn-success mb-2"><i class="bi bi-journal-richtext"></i> Baixar</a>
              <div class="btn btn-primary g-savetodrive" data-src="<?php echo get_field('pp_lesson_pdf_worksheets') ?>" data-filename="<?php echo substr(get_field('pp_lesson_pdf_worksheets'), strrpos(get_field('pp_lesson_pdf_worksheets'), "/") + 1); ?>" data-sitename="Papapiu"></div>
            </div>
            <div class="col-12 col-md-4 d-flex align-items-start gap-2 flex-wrap">
              <div class="w-100">Extras:</div>
              <a href="<?php echo get_field('pp_lesson_extras_pdf') ?>" download class="btn btn-primary mb-2 <?php if (!get_field('pp_lesson_extras_pdf')) echo "disabled" ?>"><i class="bi bi-journal-plus"></i> Baixar</a>
              <div class="btn btn-primary g-savetodrive" data-src="<?php echo get_field('pp_lesson_extras_pdf') ?>" data-filename="<?php echo substr(get_field('pp_lesson_extras_pdf'), strrpos(get_field('pp_lesson_extras_pdf'), "/") + 1); ?>" data-sitename="Papapiu"></div>
            </div>
          </div>

          <hr>
          <p class="small form-text">Compartilhar:</p>
          <div class="d-flex gap-3">
            <!-- e-mail share -->
            <a href="mailto:?subject=Vejas essas atividades&amp;body=Esse site tem ótimas atividades: <?php echo get_the_permalink() ?>" title="Envie por e-mail">
              <button class="btn bg-light rounded-4">
                <i class="bi bi-envelope-fill"></i> E-mail
              </button>
            </a>

            <!-- facebook share -->
            <a href="#" onClick="MyWindow=window.open('https://www.facebook.com/dialog/share?app_id=2792108687587763&display=popup&href=<?php echo get_the_permalink() ?>','MyWindow','width=600,height=300'); return false;" title="Facebook" target="_blank">
              <button class="btn bg-primary text-white rounded-4">
                <i class="bi bi-facebook"></i>
              </button>
            </a>

            <!-- whatsapp share -->
            <a href="https://wa.me/?text=Veja esse site de atividades maravilhoso que eu achei! <?php echo get_the_permalink() ?>" title="Envie por Whatsapp" target="_blank">
              <button class="btn btn-success rounded-4">
                <i class="bi bi-whatsapp"></i>
              </button>
            </a>
          </div>

        </div>
      </div>

      <div class="row">

        <div class="col mb-4 d-flex flex-column align-items-start">
          <h6 class="d-flex align-items-center">Nível</h6>
          <div class="lesson-info-icons me-2">
            <?php
            echo "<img src=" . get_level_icon(get_field('pp_nivel')['value']) . " alt='Icone do nivel" . get_field('pp_nivel')['label'] . "'/>";
            echo get_field('pp_nivel')['label'];
            ?>
          </div>
        </div>

        <div class="col justify-content-center d-none d-lg-flex" style="max-width: 25px;"><span class="vr h-100"></span></div>

        <div class="col mb-4 d-flex flex-column align-items-start">
          <h6 class="d-flex align-items-center" style="white-space: nowrap;">Tempo estimado</h6>
          <div class="lesson-info-icons me-2">
            <div class="lesson-info-icon-number"><?php echo get_field('pp_tempo_de_aplicacao') ?></div>
            min
          </div>
        </div>

        <div class="col justify-content-center d-none d-lg-flex" style="max-width: 25px;"><span class="vr h-100"></span></div>

        <div class="col mb-4 d-flex flex-column align-items-start">
          <h6 class="d-flex align-items-center">Tópico</h6>
          <div class="lesson-info-icons me-0">
            <?php
            $topic = get_field('pp_lesson_primary_topic');
            echo "<img src=" . get_field('pp_topic_icone', $topic->taxonomy . '_' . $topic->term_id) . " alt='Icone do tópico'/>";
            echo  $topic->name;
            ?>
          </div>
        </div>

        <div class="col justify-content-center d-none d-lg-flex" style="max-width: 25px;"><span class="vr h-100"></span></div>

        <div class="col mb-4 d-flex flex-column align-items-start">
          <h6>Skills</h6>
          <div class="d-flex">
            <?php
            $skills = get_field('pp_language_skills');
            foreach ($skills as $skill) {
              echo '<div class="lesson-info-icons me-2 d-inline-block">';
              echo "<img src=" . get_language_skill_icon($skill['value']) . " alt='Icone da habilidade'/>";
              echo $skill['label'];
              echo '</div>';
            }
            ?>
          </div>
        </div>

      </div>

      <div class="bg-white rounded-4 p-4 shadow mb-3">
        <h6 class="mb-3 mb-3 d-flex align-items-center">
          <img class="icon-small me-2" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/box.png' ?>" alt="icone de conteudo">
          Conteúdo
        </h6>
        <hr>
        <div class="row">
          <div class="col-12 col-md-6">
            <a href="#accordion-story">
              <img class="icon-small me-2" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/fairytale.png' ?>" alt="icone de historia">
              Uma história de <?php echo get_field('pp_lesson_story_pages') ?> páginas.
            </a>
          </div>
          <div class="col-12 col-md-6">
            <a href="#accordion-worksheets">
              <img class="icon-small me-2" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/literature.png' ?>" alt="icone de atividades">
              <?php echo get_field('pp_lesson_worksheet_pages') ?> páginas de atividades.
            </a>
          </div>
          <div class="col-12 mt-3">
            <a href="#accordion-extras">
              <p class="fw-semibold"><img class="icon-small me-2" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/mais.png' ?>" alt="icone de extras">
                Extras:</p>
              <div class="px-2 small-text"><?php echo get_field('pp_lesson_conteudo_extra') ?></div>
            </a>
          </div>
        </div>

      </div>

      <div class="bg-white rounded-4 p-4 shadow mb-3">
        <h6 class="mb-3 mb-3 d-flex align-items-center">
          <img class="icon-small me-2" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/bussola.png' ?>" alt="icone do guia de atividades">
          Guia de atividade
        </h6>
        <hr>
        <div class="card-body">
          <?php the_content() ?>
        </div>
      </div>

      <div class="bg-white rounded-4 p-4 shadow mb-3 pp-lesson-vocabulary">
        <h6 class="mb-3 mb-3 d-flex align-items-center">
          <img class="icon-small me-2" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/word.png' ?>" alt="icone do vocabulario">
          Vocabulário
        </h6>
        <hr>
        <div class="card-body">
          <?php echo get_field('pp_vocabulario') ?>
        </div>
      </div>

      <div class="bg-white rounded-4 p-4 shadow mb-3">
        <h6 class="mb-3 mb-3 d-flex align-items-center">
          <img class="icon-small me-2" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/target.png' ?>" alt="icone dos objetivos">
          Objetivos
        </h6>
        <hr>
        <div class="card-body">
          <?php echo get_field('pp_lesson_objective') ?>
        </div>
      </div>

      <div class="accordion shadow">
        <div class="accordion-item" id="accordion-story">
          <h6 class="accordion-header" id="headingStory">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseStory" aria-expanded="true" aria-controls="collapseOne">
              <img class="icon-small me-2" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/fairytale.png' ?>" alt="icone de historia">
              Story
            </button>
          </h6>
          <div id="collapseStory" class="accordion-collapse collapse show" aria-labelledby="headingStory" data-bs-parent="#accordionStory">
            <div class="accordion-body">
              <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              <div id="the-canvas" data-src="<?php echo get_field('pp_lesson_story') ?>" class="row position-relative px-5" oncontextmenu="return false"></div>
              <a href="<?php echo get_field('pp_lesson_story') ?>" download class="btn btn-success mb-2 mt-2"><i class="bi bi-book-half"></i> Baixar História em PDF</a>
              <a href="<?php echo get_field('pp_lesson_story') ?>" class="btn btn-primary mb-2 mt-2" target="_blank"><i class="bi bi-eye-fill"></i> Ver</a>
            </div>
          </div>
        </div>

        <div class="accordion-item" id="accordion-worksheets">
          <h6 class="accordion-header" id="headingWorksheets">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWorksheets" aria-expanded="true" aria-controls="collapseOne">
              <img class="icon-small me-2" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/literature.png' ?>" alt="icone de atividades">
              Worksheets
            </button>
          </h6>
          <div id="collapseWorksheets" class="accordion-collapse collapse show" aria-labelledby="headingWorksheets" data-bs-parent="#accordion-worksheets">
            <div class="accordion-body">
              <?php echo get_field('pp_lesson_conteudo_atividades') ?>
              <a href="<?php echo get_field('pp_lesson_pdf_worksheets') ?>" download class="btn btn-success mb-2 mt-2"><i class="bi bi-journal-richtext"></i> Baixar Atividades em PDF</a>
              <a href="<?php echo get_field('pp_lesson_pdf_worksheets') ?>" class="btn btn-primary mb-2 mt-2" target="_blank"><i class="bi bi-eye-fill"></i> Ver</a>
            </div>
          </div>
        </div>

        <div class="accordion-item" id="accordion-extras">
          <h6 class="accordion-header" id="headingExtras">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExtras" aria-expanded="true" aria-controls="collapseOne">
              <img class="icon-small me-2" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/mais.png' ?>" alt="icone de extras">
              Extras
            </button>
          </h6>
          <div id="collapseExtras" class="accordion-collapse collapse show" aria-labelledby="headingExtras" data-bs-parent="#accordion-extras">
            <div class="accordion-body">
              <?php echo get_field('pp_lesson_extras') ?>
              <a href="<?php echo get_field('pp_lesson_extras_pdf') ?>" download class="btn btn-success mb-2 mt-2"><i class="bi bi-journal-plus"></i> Baixar Extras em PDF</a>
              <a href="<?php echo get_field('pp_lesson_extras_pdf') ?>" class="btn btn-primary mb-2 mt-2" target="_blank"><i class="bi bi-eye-fill"></i> Ver</a>
            </div>
          </div>
        </div>

      </div>

    </div>

  </section>
</main>
<?php
get_footer();
