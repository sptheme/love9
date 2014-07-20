<?php
/*
*****************************************************
* Behind the Scene custom post
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
		add_action( 'init', 'sp_behind_scene_cp_init' );
		//CP list table columns
		add_action( 'manage_posts_custom_column', 'sp_behind_scene_cp_custom_column' );

	//FILTERS
		//CP list table columns
		add_filter( 'manage_edit-behind_scene_columns', 'sp_behind_scene_cp_columns' );




/*
*****************************************************
*      2) CREATING A CUSTOM POST
*****************************************************
*/
	/*
	* Custom post registration
	*/
	if ( ! function_exists( 'sp_behind_scene_cp_init' ) ) {
		function sp_behind_scene_cp_init() {
			global $cp_menu_position;

			$labels = array(
				'name'               => __( 'Behind the Scenes', 'sptheme_admin' ),
				'singular_name'      => __( 'Behind the Scene', 'sptheme_admin' ),
				'add_new'            => __( 'Add New', 'sptheme_admin' ),
				'all_items'          => __( 'Behind the Scenes', 'sptheme_admin' ),
				'add_new_item'       => __( 'Add New Behind the Scene', 'sptheme_admin' ),
				'new_item'           => __( 'Add New Behind the Scene', 'sptheme_admin' ),
				'edit_item'          => __( 'Edit Behind the Scene', 'sptheme_admin' ),
				'view_item'          => __( 'View Behind the Scene', 'sptheme_admin' ),
				'search_items'       => __( 'Search Behind the Scene', 'sptheme_admin' ),
				'not_found'          => __( 'No Behind the Scene found', 'sptheme_admin' ),
				'not_found_in_trash' => __( 'No Behind the Scene found in trash', 'sptheme_admin' ),
				'parent_item_colon'  => __( 'Parent Behind the Scene', 'sptheme_admin' ),
			);	

			$role     = 'post'; // page
			$slug     = 'behind-the-scene';
			$supports = array('title', 'editor', 'thumbnail'); // 'title', 'editor', 'thumbnail'

			$args = array(
				'labels' 				=> $labels,
				'rewrite'               => array( 'slug' => $slug ),
				'menu_position'         => $cp_menu_position['menu_behind_scenes'],
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
			register_post_type( 'behind_scene' , $args );
		}
	} 


/*
*****************************************************
*      3) CUSTOM POST LIST IN ADMIN
*****************************************************
*/
	/*
	* Registration of the table columns
	*
	* $Cols = ARRAY [array of columns]
	*/
	if ( ! function_exists( 'sp_behind_scene_cp_columns' ) ) {
		function sp_behind_scene_cp_columns( $columns ) {
			
			$columns = array(
				'cb'                   	=> '<input type="checkbox" />',
				'behind_scene_thumbnail'	   	=> __( 'Thumbnail', 'sptheme_admin' ),
				'title'                	=> __( 'Title', 'sptheme_admin' ),
				'date'		 			=> __( 'Date', 'sptheme_admin' )
			);

			return $columns;
		}
	}

	/*
	* Outputting values for the custom columns in the table
	*
	* $Col = TEXT [column id for switch]
	*/
	if ( ! function_exists( 'sp_behind_scene_cp_custom_column' ) ) {
		function sp_behind_scene_cp_custom_column( $column ) {
			global $post;
			
			switch ( $column ) {
				case "behind_scene_thumbnail":
					echo get_the_post_thumbnail( $post->ID, array(50, 50) );
				break;
				
				default:
				break;
			}
		}
	} // /sp_behind_scene_cp_custom_column

	
	