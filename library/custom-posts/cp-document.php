<?php
/*
*****************************************************
* Document custom post
*
* CONTENT:
* - 1) Actions and filters
* - 2) Creating a custom post
* - 3) Custom post list in admin
*****************************************************
*/





/*
*****************************************************
*      1) ACTIONS AND FILTERS
*****************************************************
*/
	//ACTIONS
		//Registering CP
		add_action( 'init', 'sp_document_cp_init' );


/*
*****************************************************
*      2) CREATING A CUSTOM POST
*****************************************************
*/
	/*
	* Custom post registration
	*/
	if ( ! function_exists( 'sp_document_cp_init' ) ) {
		function sp_document_cp_init() {
			global $cp_menu_position;

			$labels = array(
				'name'               => __( 'Documents', 'sptheme_admin' ),
				'singular_name'      => __( 'Document', 'sptheme_admin' ),
				'add_new'            => __( 'Add New', 'sptheme_admin' ),
				'all_items'          => __( 'Documents', 'sptheme_admin' ),
				'add_new_item'       => __( 'Add New Document', 'sptheme_admin' ),
				'new_item'           => __( 'Add New Document', 'sptheme_admin' ),
				'edit_item'          => __( 'Edit Document', 'sptheme_admin' ),
				'view_item'          => __( 'View Document', 'sptheme_admin' ),
				'search_items'       => __( 'Search Document', 'sptheme_admin' ),
				'not_found'          => __( 'No Document found', 'sptheme_admin' ),
				'not_found_in_trash' => __( 'No Document found in trash', 'sptheme_admin' ),
				'parent_item_colon'  => __( 'Parent Document', 'sptheme_admin' ),
			);	

			$role     = 'post'; // page
			$slug     = 'document';
			$supports = array('title', 'editor', 'thumbnail', 'post-formats'); // 'title', 'editor', 'thumbnail'

			$args = array(
				'labels' 				=> $labels,
				'rewrite'               => array( 'slug' => $slug ),
				'menu_position'         => $cp_menu_position['menu_document'],
				'menu_icon'           	=> 'dashicons-book-alt',
				'supports'              => $supports,
				'capability_type'     	=> $role,
				'query_var'           	=> true,
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_nav_menus'	    => false,
				'publicly_queryable'	=> true,
				'exclude_from_search'   => false,
				'has_archive'			=> true,
				'can_export'			=> true
			);
			register_post_type( 'document' , $args );
		}
	} 

