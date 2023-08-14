<?php

if (!defined('ABSPATH')) exit;

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init()
{
	register_sidebar(array(
		'name'          => __('Posts Sidebar'),
		'description'   => __('Sidebar que aparece na página de blog posts.'),
		'id'            => 'posts_side_right',
		'before_widget' => '<div id="%1$s" class="sidebar-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
}
add_action('widgets_init', 'arphabet_widgets_init');


/**
 * Register our sidebars and widgetized areas.
 *
 */
function footer_widgets_area()
{
	register_sidebar(array(
		'name'          => __('Footer area'),
		'description'   => __('Area de widget do footer.'),
		'id'            => 'footer_area',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
}
add_action('widgets_init', 'footer_widgets_area');
