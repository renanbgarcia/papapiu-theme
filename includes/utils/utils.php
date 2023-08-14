<?php

if (!defined('ABSPATH')) exit;


function pp_get_component($slug, $args = array(), $once = true)
{
   $templates[] = "components/{$slug}/_index.php";
   $templates[] = "components/{$slug}.php";

   if (!locate_template($templates, true, $once, $args))
   {
      return false;
   }
}


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