<?php
/**
 * Short codes in visual editor
 * Register short code buttons and add them to the visual mode of editor
 */

// Register Buttons
function sp_shortcodes_register_mce_button( $buttons ) {
	array_push( $buttons, 'col' );
	array_push( $buttons, 'horz_rule' );
	array_push( $buttons, 'email_encoder' );
	array_push( $buttons, 'accordion' );
	array_push( $buttons, 'toggle' );
	array_push( $buttons, 'tab' );
	array_push( $buttons, 'tv' );
	array_push( $buttons, 'soundcloud' );
	array_push( $buttons, 'team' );
	array_push( $buttons, 'photogallery' );

    return $buttons;
}

// Register TinyMCE Plugin
function sp_shortcodes_add_tinymce_plugin($plugin_array) {
	
	if (isset($_GET['post'])) {
		$post = get_post($_GET['post']);
		if ($post)
            $post_type = $post->post_type;
	} elseif ( !isset($_GET['post_type']) )
        $post_type = 'post';
    elseif ( in_array( $_GET['post_type'], get_post_types( array('show_ui' => true ) ) ) )
        $post_type = $_GET['post_type'];
    else
        return;
	
	$plugin_array['col'] 			= ED_JS_URL . 'ed-columns.js';
	$plugin_array['horz_rule']		= ED_JS_URL . 'ed-hr.js';
	$plugin_array['email_encoder']	= ED_JS_URL . 'ed-email-encoder.js';
	$plugin_array['accordion']		= ED_JS_URL . 'ed-accordion.js';
	$plugin_array['toggle']			= ED_JS_URL . 'ed-toggle.js';
	$plugin_array['tab']			= ED_JS_URL . 'ed-tab.js';
	if ( $post_type == 'page' ) :
		$plugin_array['tv']					= ED_JS_URL . 'ed-tv.js';
		$plugin_array['soundcloud']			= ED_JS_URL . 'ed-radio.js';
		$plugin_array['team']				= ED_JS_URL . 'ed-team.js';
		$plugin_array['photogallery']		= ED_JS_URL . 'ed-photogallery.js';
	endif;
	
    return $plugin_array;
 }

// Initialization Function
function sp_shortcodes_add_mce_button() {

    if ( current_user_can( 'edit_posts' ) &&  current_user_can( 'edit_pages' ) ) {
	  add_filter( 'mce_external_plugins', 'sp_shortcodes_add_tinymce_plugin' );
      add_filter( 'mce_buttons_3', 'sp_shortcodes_register_mce_button' );
	}
 }
add_action( 'admin_head', 'sp_shortcodes_add_mce_button' );  

load_template( SC_INC_DIR . 'popup/ajax-tv-shortcode.php' );
load_template( SC_INC_DIR . 'popup/ajax-soundcloud-shortcode.php' );
load_template( SC_INC_DIR . 'popup/ajax-team-shortcode.php' );
load_template( SC_INC_DIR . 'popup/ajax-photogallery-shortcode.php' );

?>