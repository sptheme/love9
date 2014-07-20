<?php
/*
*****************************************************
* Announcement custom post
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
		add_action( 'init', 'sp_announcement_cp_init' );


/*
*****************************************************
*      2) CREATING A CUSTOM POST
*****************************************************
*/
	/*
	* Custom post registration
	*/
	if ( ! function_exists( 'sp_announcement_cp_init' ) ) {
		function sp_announcement_cp_init() {
			global $cp_menu_position;

			$labels = array(
				'name'               => __( 'Announcements', 'sptheme_admin' ),
				'singular_name'      => __( 'Announcement', 'sptheme_admin' ),
				'add_new'            => __( 'Add New', 'sptheme_admin' ),
				'all_items'          => __( 'Announcements', 'sptheme_admin' ),
				'add_new_item'       => __( 'Add New Announcement', 'sptheme_admin' ),
				'new_item'           => __( 'Add New Announcement', 'sptheme_admin' ),
				'edit_item'          => __( 'Edit Announcement', 'sptheme_admin' ),
				'view_item'          => __( 'View Announcement', 'sptheme_admin' ),
				'search_items'       => __( 'Search Announcement', 'sptheme_admin' ),
				'not_found'          => __( 'No Announcement found', 'sptheme_admin' ),
				'not_found_in_trash' => __( 'No Announcement found in trash', 'sptheme_admin' ),
				'parent_item_colon'  => __( 'Parent Announcement', 'sptheme_admin' ),
			);	

			$role     = 'post'; // page
			$slug     = 'announcement';
			$supports = array('title', 'editor'); // 'title', 'editor', 'thumbnail'

			$args = array(
				'labels' 				=> $labels,
				'rewrite'               => array( 'slug' => $slug ),
				'menu_position'         => $cp_menu_position['menu_announcement'],
				'menu_icon'           	=> 'dashicons-megaphone',
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
			register_post_type( 'announcement' , $args );
		}
	} 

