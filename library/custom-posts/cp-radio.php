<?php
/*
*****************************************************
* Radio custom post
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
		add_action( 'init', 'sp_radio_cp_init' );
		//CP list table columns
		add_action( 'manage_posts_custom_column', 'sp_radio_cp_custom_column' );

	//FILTERS
		//CP list table columns
		add_filter( 'manage_edit-radio_columns', 'sp_radio_cp_columns' );




/*
*****************************************************
*      2) CREATING A CUSTOM POST
*****************************************************
*/
	/*
	* Custom post registration
	*/
	if ( ! function_exists( 'sp_radio_cp_init' ) ) {
		function sp_radio_cp_init() {
			global $cp_menu_position;

			$labels = array(
				'name'               => __( 'Radio', 'sptheme_admin' ),
				'singular_name'      => __( 'Radio', 'sptheme_admin' ),
				'add_new'            => __( 'Add New', 'sptheme_admin' ),
				'all_items'          => __( 'All Sounds', 'sptheme_admin' ),
				'add_new_item'       => __( 'Add New Radio', 'sptheme_admin' ),
				'new_item'           => __( 'Add New Radio', 'sptheme_admin' ),
				'edit_item'          => __( 'Edit Radio', 'sptheme_admin' ),
				'view_item'          => __( 'View Radio', 'sptheme_admin' ),
				'search_items'       => __( 'Search Radio', 'sptheme_admin' ),
				'not_found'          => __( 'No Radio found', 'sptheme_admin' ),
				'not_found_in_trash' => __( 'No Radio found in trash', 'sptheme_admin' ),
				'parent_item_colon'  => __( 'Parent Radio', 'sptheme_admin' ),
			);	

			$role     = 'post'; // page
			$slug     = 'radio';
			$supports = array('title', 'editor', 'thumbnail'); // 'title', 'editor', 'thumbnail'

			$args = array(
				'labels' 				=> $labels,
				'rewrite'               => array( 'slug' => $slug ),
				'menu_position'         => $cp_menu_position['menu_radio'],
				'menu_icon'           	=> 'dashicons-megaphone',
				'supports'              => $supports,
				'capability_type'     	=> $role,
				'query_var'           	=> true,
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_nav_menus'	    => true,
				'publicly_queryable'	=> true,
				'exclude_from_search'   => false,
				'has_archive'			=> true,
				'can_export'			=> true
			);
			register_post_type( 'radio' , $args );
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
	if ( ! function_exists( 'sp_radio_cp_columns' ) ) {
		function sp_radio_cp_columns( $columns ) {
			
			$columns = array(
				'cb'                   	=> '<input type="checkbox" />',
				'title'                	=> __( 'Title', 'sptheme_admin' ),
				'radio_category'        => __( 'Radio Sections', 'sptheme_admin' ),
				'radio_episode'        	=> __( 'Episode', 'sptheme_admin' ),
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
	if ( ! function_exists( 'sp_radio_cp_custom_column' ) ) {
		function sp_radio_cp_custom_column( $column ) {
			global $post;
			
			switch ( $column ) {
				
				case "radio_category":
					$terms = get_the_terms( $post->ID, 'radio-section' );

					if ( empty( $terms ) )
					break;
	
					$output = array();
	
					foreach ( $terms as $term ) {
						
						$output[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'radio-section' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'radio-section', 'display' ) )
						);
	
					}
	
					echo join( ', ', $output );
				break;

				case "radio_episode":
					$terms = get_the_terms( $post->ID, 'episode' );

					if ( empty( $terms ) )
					break;
	
					$output = array();
	
					foreach ( $terms as $term ) {
						
						$output[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'episode' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'episode', 'display' ) )
						);
	
					}
	
					echo join( ', ', $output );
				break;
				
				default:
				break;
			}
		}
	} // /sp_radio_cp_custom_column

	
	