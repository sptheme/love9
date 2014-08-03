<?php

//All custom posts
load_template( SP_BASE_DIR . 'library/custom-posts/cp-presenter.php' );
load_template( SP_BASE_DIR . 'library/custom-posts/cp-actor.php' );
load_template( SP_BASE_DIR . 'library/custom-posts/cp-behind-scene.php' );
load_template( SP_BASE_DIR . 'library/custom-posts/cp-gallery.php' );
load_template( SP_BASE_DIR . 'library/custom-posts/cp-video-gallery.php' );
load_template( SP_BASE_DIR . 'library/custom-posts/cp-announcement.php' );
load_template( SP_BASE_DIR . 'library/custom-posts/cp-document.php' );
load_template( SP_BASE_DIR . 'library/custom-posts/cp-tv.php' );

//Taxonomies
load_template( SP_BASE_DIR . 'library/custom-posts/taxonomy-tv.php' );
load_template( SP_BASE_DIR . 'library/custom-posts/taxonomy-episode.php' );
	
/*==========================================================================*/

//Change title text when creating new post
if ( is_admin() )
	add_filter( 'enter_title_here', 'sp_change_new_post_title' );	
	
/*
* Changes "Enter title here" text when creating new post
*/
if ( ! function_exists( 'sp_change_new_post_title' ) ) {
	function sp_change_new_post_title( $title ){
		$screen = get_current_screen();

		if ( 'gallery' == $screen->post_type )
			$title = __( "Album name", 'sptheme_admin' );

		return $title;
	}
} // /sp_change_new_post_title