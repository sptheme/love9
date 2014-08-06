<?php
add_action('init', 'sp_tax_topic_category_init', 0);

function sp_tax_topic_category_init() {
	register_taxonomy(
		'topic-section',
		array( 'topic' ),
		array(
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Topic Sections', 'sptheme_admin' ),
				'singular_name' => __( 'Topic Section', 'sptheme_admin' )
			),
			'sort' => true,
			'rewrite' => array( 'slug' => 'topic-section' ),
			'show_in_nav_menus' => false
		)
	);
}