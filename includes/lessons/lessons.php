<?php

/**
 * Cria o Post Type de Lessons
 */
function pp_custom_post_type_and_taxonomy()
{
	register_post_type(
		'pp_lessons',
		array(
			'labels'      => array(
				'name'          => __('Lessons', 'textdomain'),
				'singular_name' => __('Lesson', 'textdomain'),
			),
			'public'      => true,
			'has_archive' => true,
      'rewrite'     => array( 'slug' => 'lessons' ),
		)
	);

	register_post_type(
		'pp_testimonials',
		array(
			'labels'      => array(
				'name'          => __('Testimonials', 'textdomain'),
				'singular_name' => __('Testimonial', 'textdomain'),
			),
			'public'      => true,
			'has_archive' => false,
		)
	);

  register_post_type(
		'pp_prices',
		array(
			'labels'      => array(
				'name'          => __('Prices', 'textdomain'),
				'singular_name' => __('Price', 'textdomain'),
			),
			'public'      => true,
			'has_archive' => false,
		)
	);

  register_taxonomy(
    "pp_courses",
    'pp_lessons',
    array(
    'hierarchical' => true,
    'show_ui'                    => true,
    'show_in_quick_edit'         => false,
    'meta_box_cb'                => false,
    'labels' => array('name' => 'Courses', 'singular_name' => 'Course'),
    'rewrite' => array('slug' => 'courses')
  ));

  register_taxonomy(
    "pp_modules",
    'pp_lessons',
    array(
    'hierarchical' => true,
    'show_ui'                    => true,
    'show_in_quick_edit'         => false,
    'meta_box_cb'                => false,
    'labels' => array('name' => 'Modules', 'singular_name' => 'Module'),
    'rewrite' => array('slug' => 'modules')
  ));

  register_taxonomy(
    "pp_topics",
    'pp_lessons',
    array(
    'hierarchical' => true,
    'show_ui'                    => true,
    'show_in_quick_edit'         => false,
    'meta_box_cb'                => false,
    'labels' => array('name' => 'Topics', 'singular_name' => 'Topic'),
    'rewrite' => array('slug' => 'topic')
  ));
}
add_action('init', 'pp_custom_post_type_and_taxonomy');

include(ABSPATH . 'wp-content/plugins/papapiu/includes/lessons/fields.php');