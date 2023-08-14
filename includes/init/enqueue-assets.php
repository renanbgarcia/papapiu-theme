<?php

if (!defined('ABSPATH')) exit;

function add_theme_scripts()
{
	$directory_uri = get_template_directory_uri();

	wp_enqueue_style('bootstrap-style', $directory_uri . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('posts-list', $directory_uri . '/assets/css/posts-list.css');
	wp_enqueue_style('testimonial', $directory_uri . '/assets/css/testimonial.css');
	wp_enqueue_style('comments', $directory_uri . '/assets/css/comments.css');
	wp_enqueue_style('footer', $directory_uri . '/assets/css/footer.css');
	wp_enqueue_style('custom-colors', $directory_uri . '/assets/css/colors.css');
	wp_enqueue_style('main-style', $directory_uri . '/assets/css/main.min.css');
	wp_enqueue_style('style', get_stylesheet_uri());

	wp_enqueue_script('vendor', $directory_uri . '/assets/js/vendor.min.js', array('jquery'), 1.0, true);
	wp_enqueue_script('custom', $directory_uri . '/assets/js/custom.min.js', array('jquery'), 1.0, true);
	if (is_singular("pp_lessons")){
		wp_enqueue_script('pdfjs', 'https://cdn.jsdelivr.net/npm/pdfjs-dist@3.4.120/build/pdf.min.js', [], 1.0, true);
		// wp_enqueue_script('pdf-reader', $directory_uri . '/assets/js/pdfReader.js', ['pdfjs'], 1.0, true);
	}
}
add_action('wp_enqueue_scripts', 'add_theme_scripts', 999);