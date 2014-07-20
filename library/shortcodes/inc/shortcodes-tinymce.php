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
	array_push( $buttons, 'presenter' );
	/*array_push( $buttons, 'actor' );
	array_push( $buttons, 'behind_scene' );
	array_push( $buttons, 'photogallery' );
	array_push( $buttons, 'video_gallery' );
	array_push( $buttons, 'annoucement' );
	array_push( $buttons, 'document' );*/

    return $buttons;
}

// Register TinyMCE Plugin
function sp_shortcodes_add_tinymce_plugin($plugin_array) {
	
	$post =  $post = get_post($_GET['post']);
	
	$plugin_array['col'] 			= ED_JS_URL . 'ed-columns.js';
	$plugin_array['horz_rule']		= ED_JS_URL . 'ed-hr.js';
	$plugin_array['email_encoder']	= ED_JS_URL . 'ed-email-encoder.js';
	$plugin_array['accordion']		= ED_JS_URL . 'ed-accordion.js';
	$plugin_array['toggle']			= ED_JS_URL . 'ed-toggle.js';
	$plugin_array['tab']			= ED_JS_URL . 'ed-tab.js';
	if ( $post->post_type != 'presenter' )
		$plugin_array['presenter']		= ED_JS_URL . 'ed-presenter.js';
	/*$plugin_array['actor']			= ED_JS_URL . 'ed-actor.js';
	$plugin_array['behind_scene']	= ED_JS_URL . 'ed-behind-scene.js';
	$plugin_array['photogallery']		= ED_JS_URL . 'ed-photogallery.js';
	$plugin_array['video_gallery']	= ED_JS_URL . 'ed-video-gallery.js';
	$plugin_array['annoucement']	= ED_JS_URL . 'ed-annoucement.js';
	$plugin_array['document']		= ED_JS_URL . 'ed-document.js';*/
	
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

load_template( SC_INC_DIR . 'popup/ajax-photogallery-shortcode.php' );

/*load_template( SC_INC_DIR . 'popup/ajax-tv-shortcode.php' );
load_template( SC_INC_DIR . 'popup/ajax-radio-shortcode.php' );*/

?>