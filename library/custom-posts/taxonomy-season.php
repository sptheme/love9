<?php
add_action('init', 'sp_tax_season_category_init', 0);

function sp_tax_season_category_init() {
	register_taxonomy(
		'season',
		array( 'tv', 'radio' ),
		array(
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Seasons', 'sptheme_admin' ),
				'singular_name' => __( 'Seasons', 'sptheme_admin' )
			),
			'sort' => true,
			'rewrite' => array( 'slug' => 'seasons' ),
			'show_in_nav_menus' => false
		)
	);
}