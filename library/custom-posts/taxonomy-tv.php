<?php
add_action('init', 'sp_tax_tv_category_init', 0);

function sp_tax_tv_category_init() {
	register_taxonomy(
		'tv-category',
		array( 'tv' ),
		array(
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'TV Categories', 'sptheme_admin' ),
				'singular_name' => __( 'TV Category', 'sptheme_admin' )
			),
			'sort' => true,
			'rewrite' => array( 'slug' => 'tv-category' ),
			'show_in_nav_menus' => false
		)
	);
}