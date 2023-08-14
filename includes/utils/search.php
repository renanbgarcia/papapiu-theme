<?php

if (!defined('ABSPATH')) exit;


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