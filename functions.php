<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function add_theme_scripts()
{
	$directory_uri = get_template_directory_uri();

	wp_enqueue_style('bootstrap-style', $directory_uri . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('carousel-style', $directory_uri . '/assets/css/owl.carousel.min.css');
	wp_enqueue_style('owl-default-style', $directory_uri . '/assets/css/owl.theme.default.min.css');
	wp_enqueue_style('posts-list', $directory_uri . '/assets/css/posts-list.css');
	wp_enqueue_style('testimonial', $directory_uri . '/assets/css/testimonial.css');
	wp_enqueue_style('comments', $directory_uri . '/assets/css/comments.css');
	wp_enqueue_style('footer', $directory_uri . '/assets/css/footer.css');
	wp_enqueue_style('custom-colors', $directory_uri . '/assets/css/colors.css');
	wp_enqueue_style('style', get_stylesheet_uri());

	wp_enqueue_script('jquery-latest', $directory_uri . '/assets/js/jquery.min.js', array(), 3.6, true);
	wp_enqueue_script('bootstrap', $directory_uri . '/assets/js/bootstrap.bundle.min.js', null, null, true );
	wp_enqueue_script('carousel', $directory_uri . '/assets/js/owl.carousel.min.js', array(), 1.0, true);
	wp_enqueue_script('sticky', $directory_uri . '/assets/js/jquery.sticky.js', array('jquery'), 1.0, true);
	wp_enqueue_script('custom', $directory_uri . '/assets/js/custom.js', array('jquery'), 1.0, true);
	wp_enqueue_script('lessons', $directory_uri . '/assets/js/lessons.js', array('jquery', 'bootstrap'), 1.0, true);
	if (is_single() && get_post_type() === "pp_lessons"){
		wp_enqueue_script('pdfjs', 'https://cdn.jsdelivr.net/npm/pdfjs-dist@3.4.120/build/pdf.min.js', [], 1.0, true);
		wp_enqueue_script('pdf-reader', $directory_uri . '/assets/js/pdfReader.js', ['pdfjs'], 1.0, true);
	}
}
add_action('wp_enqueue_scripts', 'add_theme_scripts', 999);

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

function pp_get_posts($extra_args = array())
{

	$args = array(
		'post_type' => 'post',
		'hide_empty'     => 1,
		'posts_per_page' => 10
	);

	$args = array_merge($args, $extra_args);

	$query = new WP_Query($args);

	return $query;
}
add_action('pp_get_posts', 'pp_get_posts');

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


function get_recent_posts()
{
	$popularpost = new WP_Query(array(
		'posts_per_page' => 5,
		'orderby' => 'date',
		'order' => 'DESC',
		'post_type' => 'post',
	));

	$html = "<div class='sidebar-box'> <h3>Recentes</h3>";

	if ($popularpost->have_posts()) {
		while ($popularpost->have_posts()) {
			$popularpost->the_post();
			if (strlen(get_the_post_thumbnail_url()) > 0) {
				$phtml =
					"<div class='tutorial-item mb-3'>" .
					"<a href='" . get_the_permalink() . "'>" .
					'<img src="' . get_the_post_thumbnail_url() . '" class="img-fluid image"/>' .
					"<h3 class='mb-1'>" . get_the_title() . "</h3>" .
					"<p class='meta'>" . get_the_date() . "</p>" .
					"</a>" .
					"</div>";

				$html = $html . $phtml;
			}
		}
	} else {
		// no posts found
	}

	wp_reset_postdata();

	$html = $html . "</div>";

	echo $html;
}
add_action('get_recent_posts', 'get_recent_posts');

/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function pp_search_form($form)
{
	$form = '<form role="search" method="get" id="searchform" class="d-flex searchform search-form" action="' . home_url('/') . '" >
						<div class="form-group">
							<span class="icon icon-search"></span>
							<input class="form-control" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Buscar"/>
						</div>
					</form>';

	return $form;
}
add_filter('get_search_form', 'pp_search_form');

add_filter( 'get_custom_logo', 'change_logo_class' );
function change_logo_class( $html ) {

    $html = str_replace( 'custom-logo', 'logo', $html );
    $html = str_replace( 'logo-link', 'logo-link d-none', $html );

    return $html;
}


include implode(DIRECTORY_SEPARATOR, [get_template_directory(), 'includes', 'dashboard', 'index.php']);

?>