<?php
/*
*****************************************************
* Topic custom post
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
		add_action( 'init', 'sp_topic_cp_init' );
		//CP list table columns
		add_action( 'manage_posts_custom_column', 'sp_topic_cp_custom_column' );

	//FILTERS
		//CP list table columns
		add_filter( 'manage_edit-topic_columns', 'sp_topic_cp_columns' );




/*
*****************************************************
*      2) CREATING A CUSTOM POST
*****************************************************
*/
	/*
	* Custom post registration
	*/
	if ( ! function_exists( 'sp_topic_cp_init' ) ) {
		function sp_topic_cp_init() {
			global $cp_menu_position;

			$labels = array(
				'name'               => __( 'Weekly topics', 'sptheme_admin' ),
				'singular_name'      => __( 'Topic', 'sptheme_admin' ),
				'add_new'            => __( 'Add New', 'sptheme_admin' ),
				'all_items'          => __( 'All Topics', 'sptheme_admin' ),
				'add_new_item'       => __( 'Add New Topic', 'sptheme_admin' ),
				'new_item'           => __( 'Add New Topic', 'sptheme_admin' ),
				'edit_item'          => __( 'Edit Topic', 'sptheme_admin' ),
				'view_item'          => __( 'View Topic', 'sptheme_admin' ),
				'search_items'       => __( 'Search Topic', 'sptheme_admin' ),
				'not_found'          => __( 'No Topic found', 'sptheme_admin' ),
				'not_found_in_trash' => __( 'No Topic found in trash', 'sptheme_admin' ),
				'parent_item_colon'  => __( 'Parent Topic', 'sptheme_admin' ),
			);	

			$role     = 'post'; // page
			$slug     = 'topic';
			$supports = array('title', 'editor'); // 'title', 'editor', 'thumbnail'

			$args = array(
				'labels' 				=> $labels,
				'rewrite'               => array( 'slug' => $slug ),
				'menu_position'         => $cp_menu_position['menu_topic'],
				'menu_icon'           	=> 'dashicons-calendar',
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
			register_post_type( 'topic' , $args );
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
	if ( ! function_exists( 'sp_topic_cp_columns' ) ) {
		function sp_topic_cp_columns( $columns ) {
			
			$columns = array(
				'cb'                   	=> '<input type="checkbox" />',
				'title'                	=> __( 'Topic of the week', 'sptheme_admin' ),
				'topic_category'        => __( 'Topic Sections', 'sptheme_admin' ),
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
	if ( ! function_exists( 'sp_topic_cp_custom_column' ) ) {
		function sp_topic_cp_custom_column( $column ) {
			global $post;
			
			switch ( $column ) {
				
				case "topic_category":
					$terms = get_the_terms( $post->ID, 'topic-section' );

					if ( empty( $terms ) )
					break;
	
					$output = array();
	
					foreach ( $terms as $term ) {
						
						$output[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'topic-section' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'topic-section', 'display' ) )
						);
	
					}
	
					echo join( ', ', $output );
				break;

				default:
				break;
			}
		}
	} // /sp_topic_cp_custom_column

	
	