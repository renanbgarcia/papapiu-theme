<?php

$args = array(
  'post_type' => 'pp_lessons',
  'post_status' => 'publish',
  'posts_per_page' => 4
);

$query = new WP_Query($args);
$posts = $query->posts;

$featured_lesson = array(
  'cover' => get_field('pp_lesson_cover', $posts[0]->ID),
  'topic' => get_field('pp_lesson_primary_topic', $posts[0]->ID)->name,
  'title' => $posts[0]->post_title,
  'excerpt' =>  $posts[0]->post_content,
  'time' => get_field('pp_tempo_de_aplicacao', $posts[0]->ID),
  'level' => get_field('pp_nivel', $posts[0]->ID)['label'],
  'date' => $posts[0]->post_date,
  'url' => get_permalink($posts[0]->ID),
  'topic_url' => get_term_link(get_field('pp_lesson_primary_topic', $posts[0]->ID)->term_id, 'pp_topics')
);

function getLessonFields($index, $posts) {
  return array(
    'cover' => get_field('pp_lesson_cover', $posts[$index]->ID),
    'topic' => get_field('pp_lesson_primary_topic', $posts[$index]->ID)->name,
    'title' => $posts[$index]->post_title,
    'url' => get_permalink($posts[$index]->ID),
    'topic_url' => get_term_link(get_field('pp_lesson_primary_topic', $posts[$index]->ID)->term_id, 'pp_topics')
  );
}

?>

<div class="site-section pb-0">
  <div class="container mb-md-5 mb-4 pb-md-3 pb-0">
    <div class="row align-items-stretch overlap">
      <div class="col-lg-8">
        <div class="box h-100 rounded-4">
          <div class="d-flex align-items-center row">
            <div class="col-md-5 col-12"><img src="<?php echo $featured_lesson['cover'] ?>" class="img-fluid rounded-4" alt="Image"></div>
            <div class="text col-md-7 col-12">
              <a href="<?php echo $featured_lesson['topic_url'] ?>" class="category"><?php echo $featured_lesson['topic'] ?></a>
              <h3><a href="<?php echo $featured_lesson['url'] ?>"><?php echo $featured_lesson['title'] ?></a></h3>
              <p><?php echo $featured_lesson['excerpt'] ?></p>
              <p class="mb-0">
                <span class="brand-react h5"></span>
                <span class="brand-javascript h5"></span>
              </p>
              <p class="meta">
                <span class="mr-2 mb-2"><?php echo $featured_lesson['time'] ?> minutos</span>
                <span class="mr-2 mb-2"><?php echo $featured_lesson['level'] ?></span>
                <span class="mr-2 mb-2"><?php echo $featured_lesson['date'] ?></span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="box small rounded-4 h-100">
          <?php
          
          for ($i=1; $i <= 3; $i++) { 
            ?>
            <div class="d-flex align-items-center mb-2">
              <div class="img"><img src="<?php echo getLessonFields($i, $posts)['cover'] ?>" class="img-fluid rounded-4" alt="Image"></div>
              <div class="text">
                <a href="<?php echo getLessonFields($i, $posts)['topic_url'] ?>" class="category"><?php echo getLessonFields($i, $posts)['topic'] ?></a>
                <h3><a href="<?php echo getLessonFields($i, $posts)['url'] ?>"><?php echo getLessonFields($i, $posts)['title'] ?></a></h3>
              </div>
            </div>
            <?php
          }
          
          ?>
        </div>
      </div>
    </div>
  </div>
</div>