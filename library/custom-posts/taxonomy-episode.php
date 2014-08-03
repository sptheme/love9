<?php
add_action('init', 'sp_tax_episode_category_init', 0);

function sp_tax_episode_category_init() {
	register_taxonomy(
		'episode',
		array( 'tv', 'radio' ),
		array(
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Episodes', 'sptheme_admin' ),
				'singular_name' => __( 'Episodes', 'sptheme_admin' )
			),
			'sort' => true,
			'rewrite' => array( 'slug' => 'episodes' ),
			'show_in_nav_menus' => false
		)
	);
}