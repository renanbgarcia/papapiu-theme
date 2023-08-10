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
				'name'          => __('Atividades', 'papapiu'),
				'singular_name' => __('Atividade', 'papapiu'),
			),
			'public'      => true,
			'has_archive' => true,
      'rewrite'     => array( 'slug' => __('atividade', 'papapiu') ),
		)
	);

	register_post_type(
		'pp_testimonials',
		array(
			'labels'      => array(
				'name'          => __('Testimonials', 'papapiu'),
				'singular_name' => __('Testimonial', 'papapiu'),
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
    'labels' => array('name' => __('Cursos', 'papapiu'), 'singular_name' => __('Curso', 'papapiu')),
    'rewrite' => array('slug' => __('cursos', 'papapiu'))
  ));


  register_taxonomy(
    "pp_modules",
    'pp_lessons',
    array(
    'hierarchical' => true,
    'show_ui'                    => true,
    'show_in_quick_edit'         => false,
    'meta_box_cb'                => false,
    'labels' => array('name' => __('Módulos', 'papapiu'), 'singular_name' => __('Módulo', 'papapiu')),
    'rewrite' => array('slug' => __('modulos', 'papapiu'))
  ));

}
add_action('init', 'pp_custom_post_type_and_taxonomy');
