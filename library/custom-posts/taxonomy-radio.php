<?php
add_action('init', 'sp_tax_radio_category_init', 0);

function sp_tax_radio_category_init() {
	register_taxonomy(
		'radio-section',
		array( 'radio' ),
		array(
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Radio Sections', 'sptheme_admin' ),
				'singular_name' => __( 'Radio Section', 'sptheme_admin' )
			),
			'sort' => true,
			'rewrite' => array( 'slug' => 'radio-section' ),
			'show_in_nav_menus' => false
		)
	);
}