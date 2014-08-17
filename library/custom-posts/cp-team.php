<?php
/*
*****************************************************
* Team custom post
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
		add_action( 'init', 'sp_team_cp_init' );
		//CP list table columns
		add_action( 'manage_posts_custom_column', 'sp_team_cp_custom_column' );

	//FILTERS
		//CP list table columns
		add_filter( 'manage_edit-team_columns', 'sp_team_cp_columns' );




/*
*****************************************************
*      2) CREATING A CUSTOM POST
*****************************************************
*/
	/*
	* Custom post registration
	*/
	if ( ! function_exists( 'sp_team_cp_init' ) ) {
		function sp_team_cp_init() {
			global $cp_menu_position;

			$labels = array(
				'name'               => __( 'Love9 Teams', 'sptheme_admin' ),
				'singular_name'      => __( 'Team', 'sptheme_admin' ),
				'add_new'            => __( 'Add New', 'sptheme_admin' ),
				'all_items'          => __( 'All Team', 'sptheme_admin' ),
				'add_new_item'       => __( 'Add New Team', 'sptheme_admin' ),
				'new_item'           => __( 'Add New Team', 'sptheme_admin' ),
				'edit_item'          => __( 'Edit Team', 'sptheme_admin' ),
				'view_item'          => __( 'View Team', 'sptheme_admin' ),
				'search_items'       => __( 'Search Team', 'sptheme_admin' ),
				'not_found'          => __( 'No Team found', 'sptheme_admin' ),
				'not_found_in_trash' => __( 'No Team found in trash', 'sptheme_admin' ),
				'parent_item_colon'  => __( 'Parent Team', 'sptheme_admin' ),
			);	

			$role     = 'post'; // page
			$slug     = 'team';
			$supports = array('title', 'editor', 'thumbnail'); // 'title', 'editor', 'thumbnail'

			$args = array(
				'labels' 				=> $labels,
				'rewrite'               => array( 'slug' => $slug ),
				'menu_position'         => $cp_menu_position['menu_team'],
				'menu_icon'           	=> 'dashicons-groups',
				'supports'              => $supports,
				'capability_type'     	=> $role,
				'query_var'           	=> true,
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_nav_menus'	    => false,
				'publicly_queryable'	=> true,
				'exclude_from_search'   => false,
				'has_archive'			=> false,
				'can_export'			=> true
			);
			register_post_type( 'team' , $args );
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
	if ( ! function_exists( 'sp_team_cp_columns' ) ) {
		function sp_team_cp_columns( $columns ) {
			
			$columns = array(
				'cb'                   	=> '<input type="checkbox" />',
				'team_thumbnail'	   	=> __( 'Thumbnail', 'sptheme_admin' ),
				'title'                	=> __( 'Title', 'sptheme_admin' ),
				'team_category'        => __( 'Team Sections', 'sptheme_admin' ),
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
	if ( ! function_exists( 'sp_team_cp_custom_column' ) ) {
		function sp_team_cp_custom_column( $column ) {
			global $post;
			
			switch ( $column ) {
				case "team_thumbnail":
					echo get_the_post_thumbnail( $post->ID, array(50, 50) );
				break;

				case "team_category":
					$terms = get_the_terms( $post->ID, 'team-section' );

					if ( empty( $terms ) )
					break;
	
					$output = array();
	
					foreach ( $terms as $term ) {
						
						$output[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'team-section' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'team-section', 'display' ) )
						);
	
					}
	
					echo join( ', ', $output );
				break;
				
				default:
				break;
			}
		}
	} // /sp_team_cp_custom_column

	
	