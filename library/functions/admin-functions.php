<?php

//meta boxes
load_template( SP_BASE_DIR . 'library/functions/meta-boxes.php');

// shortcodes
load_template( SP_BASE_DIR . 'library/shortcodes/shortcodes.php');

//Custom post type and taxonomies
load_template( SP_BASE_DIR . 'library/custom-posts/custom-posts.php');

//Custom post type and taxonomies
load_template( SP_BASE_DIR . 'library/widgets/widgets.php');

/* ---------------------------------------------------------------------- */
/*	Rename the default "Post" to "Love9 Village" or something else
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'sp_change_post_label' ) ) {

	add_action( 'admin_menu', 'sp_change_post_label' );
	function sp_change_post_label() {
		global $menu;
	    global $submenu;
	    $menu[5][0] = 'Love9 village';
	    $submenu['edit.php'][5][0] = 'Blog';
	    
	    remove_submenu_page( 'edit.php', 'post-new.php');
	    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category');
	    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag');
	}
}

/* ---------------------------------------------------------------------- */
/*	Enqueue Custom Admin Styles and Scripts
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'sp_admin_scripts_styles' ) ) {

	add_action('admin_enqueue_scripts', 'sp_admin_scripts_styles');
	function sp_admin_scripts_styles( $hook ) {
		if ( !in_array($hook, array('post.php','post-new.php')) )
			return;
		wp_enqueue_script('post-formats', SP_ASSETS_ADMIN . 'js/post-formats.js', array( 'jquery' ));
	}

}	

/* ---------------------------------------------------------------------- */
/*	Add Option Tree to WordPress admin bar
/* ---------------------------------------------------------------------- */
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
load_template( SP_BASE_DIR . 'library/option-tree/ot-loader.php' );
load_template( SP_BASE_DIR . 'library/functions/theme-options.php');

if ( ! function_exists( 'option_tree_admin_bar_render' ) ) {

	function option_tree_admin_bar_render() {
	
		if ( current_user_can('edit_theme_options') ) {
		global $wp_admin_bar;
		$wp_admin_bar->add_menu( array(
			'parent' => false, // use 'false' for a root menu, or pass the ID of the parent menu
			'id' => 'option_tree_admin_bar', // link ID, defaults to a sanitized title value
			'title' => 'Theme Options', // link title
			'href' => admin_url( 'themes.php?page=ot-theme-options'), // name of file
			'meta' => false // array of any of the following options: array( 'html' => '', 'class' => '', 'onclick' => '', target => '', title => '' );
		));
		}
	}

}	
add_action( 'wp_before_admin_bar_render', 'option_tree_admin_bar_render' );