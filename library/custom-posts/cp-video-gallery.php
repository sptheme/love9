<?php
/*
*****************************************************
* Video Gallery custom post
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
		add_action( 'init', 'sp_video_gallery_cp_init' );
		//CP list table columns




/*
*****************************************************
*      2) CREATING A CUSTOM POST
*****************************************************
*/
	/*
	* Custom post registration
	*/
	if ( ! function_exists( 'sp_video_gallery_cp_init' ) ) {
		function sp_video_gallery_cp_init() {
			global $cp_menu_position;

			$labels = array(
				'name'               => __( 'Videos', 'sptheme_admin' ),
				'singular_name'      => __( 'Video', 'sptheme_admin' ),
				'add_new'            => __( 'Add New', 'sptheme_admin' ),
				'all_items'          => __( 'Videos', 'sptheme_admin' ),
				'add_new_item'       => __( 'Add New Video', 'sptheme_admin' ),
				'new_item'           => __( 'Add New Video', 'sptheme_admin' ),
				'edit_item'          => __( 'Edit Video', 'sptheme_admin' ),
				'view_item'          => __( 'View Video', 'sptheme_admin' ),
				'search_items'       => __( 'Search Video', 'sptheme_admin' ),
				'not_found'          => __( 'No Video found', 'sptheme_admin' ),
				'not_found_in_trash' => __( 'No Video found in trash', 'sptheme_admin' ),
				'parent_item_colon'  => __( 'Parent Video', 'sptheme_admin' ),
			);	

			$role     = 'post'; // page
			$slug     = 'video-gallery';
			$supports = array('title'); // 'title', 'editor', 'thumbnail'

			$args = array(
				'labels' 				=> $labels,
				'rewrite'               => array( 'slug' => $slug ),
				'menu_position'         => $cp_menu_position['menu_video'],
				'menu_icon'           	=> 'dashicons-video-alt',
				'supports'              => $supports,
				'capability_type'     	=> $role,
				'query_var'           	=> true,
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_nav_menus'	    => false,
				'show_in_menu'			=> 'edit.php',
				'publicly_queryable'	=> true,
				'exclude_from_search'   => false,
				'has_archive'			=> false,
				'can_export'			=> true
			);
			register_post_type( 'video_gallery' , $args );
		}
	} 
