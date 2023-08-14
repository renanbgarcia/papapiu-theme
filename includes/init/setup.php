<?php

if (!defined('ABSPATH')) exit;

function my_theme_setup()
{
	add_theme_support('post-thumbnails');
	add_theme_support( 'custom-logo' );
	register_nav_menu( 'primary_menu', __( 'Menu Principal', 'papapiu' ) );
	register_nav_menu( 'lessons_menu', __( 'Menu das Lessons', 'papapiu' ) );
	register_nav_menu( 'footer_1', __( 'Menu do Footer 1', 'papapiu' ) );
	register_nav_menu( 'footer_2', __( 'Menu do Footer 2', 'papapiu' ) );
}
add_action('after_setup_theme', 'my_theme_setup');


function filter_menus_classes($nav_menu, $args = array()) {
	$n_nav_menu = str_replace(array('sub-menu', 'menu-item-has-children', 'current-menu-item'), array('sub-menu dropdown', 'menu-item-has-children has-children', 'current-menu-item active') ,$nav_menu);
	return $n_nav_menu;
}
add_filter('wp_nav_menu', 'filter_menus_classes');