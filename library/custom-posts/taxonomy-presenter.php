<?php
add_action('init', 'sp_tax_presenter_category_init', 0);

function sp_tax_presenter_category_init() {
	register_taxonomy(
		'presenter-category',
		array( 'presenter' ),
		array(
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Presenter Categories', 'sptheme_admin' ),
				'singular_name' => __( 'Presenter Categories', 'sptheme_admin' )
			),
			'sort' => true,
			'rewrite' => array( 'slug' => 'presenter-category' ),
			'show_in_nav_menus' => false
		)
	);
}