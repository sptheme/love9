<?php
/**
 * Theme short codes
 * Containes short codes for layout columns, tabs, accordion, slider, carousel, posts, etc.
 */

/* ---------------------------------------------------------------------- */
/*	Add shortcode support to text widget
/* ---------------------------------------------------------------------- */
add_filter( 'widget_text', 'do_shortcode' );

/* ---------------------------------------------------------------------- */
/*	Print script and style of shortcodes
/* ---------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'add_script_style_sc' );

function add_script_style_sc() {
	global $post;
	if( !is_admin() ){
		wp_enqueue_script( 'shortcode-js', SC_JS_URL . 'shortcodes.js', array(), SC_VER, true );
		//wp_enqueue_style( 'shortcode', SC_CSS_URL . 'shortcodes.css', false, SC_VER );
	}
	
}

// Register and initialize short codes
function sp_add_shortcodes() {
	add_shortcode( 'col', 'col' );
	add_shortcode( 'hr', 'sp_hr_shortcode_sc' );
	add_shortcode( 'email_encoder', 'sp_email_encoder_sc' );
	add_shortcode( 'accordion', 'sp_accordion_shortcode' );
	add_shortcode( 'accordion_section', 'sp_accordion_section_shortcode' );	
	add_shortcode( 'toggle', 'sp_toggle_shortcode' );
	add_shortcode( 'toggle_section', 'sp_toggle_section_shortcode' );	
	add_shortcode( 'tabgroup', 'sp_tabgroup_shortcode' );
	add_shortcode( 'tab', 'sp_tab_shortcode' );
	add_shortcode( 'sc_photogallery', 'sp_photogallery_sc' );
	add_shortcode( 'video_gallery', 'sp_video_gallery_sc' );
	add_shortcode( 'presenter', 'sp_presenter_sc' );
	
}
add_action( 'init', 'sp_add_shortcodes' );

// Fix Shortcodes 
if( !function_exists('sp_fix_shortcodes') ) {
	function sp_fix_shortcodes($content){
		$array = array (
			'<p>['		=> '[', 
			']</p>'		=> ']', 
			']<br />'	=> ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
}
add_filter('the_content', 'sp_fix_shortcodes');

// Helper function for removing automatic p and br tags from nested short codes
function return_clean( $content, $p_tag = false, $br_tag = false )
{
	$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );

	if ( $br_tag )
		$content = preg_replace( '#<br \/>#', '', $content );

	if ( $p_tag )
		$content = preg_replace( '#<p>|</p>#', '', $content );

	return do_shortcode( shortcode_unautop( trim( $content ) ) );
}

/*--------------------------------------------------------------------------------------*/
/* 	Columns
/*--------------------------------------------------------------------------------------*/
function col( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type' => 'full'
	), $atts ) );
	$out = '<div class="column ' . $type . '">' . return_clean($content) . '</div>';
	if ( strpos( $type, 'last' ) )
		$out .= '<div class="clear"></div>';
	return $out;
}

/*--------------------------------------------------------------------------------------*/
/* 	Accordion
/*--------------------------------------------------------------------------------------*/

// Main accordion container
function sp_accordion_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'style' => 'one',
		'size' => 'small',		
		'open_index' => 0
	), $atts));

	return '<div class="accordion ' . $size . ' ' . $style . ' clearfix" data-opened="' . $open_index . '">' . return_clean($content) . '</div>';
}

// Accordion section
function sp_accordion_section_shortcode($atts, $content = null) {

	extract(shortcode_atts(array(
		'title' => 'Title Goes Here',		
	), $atts));

	return '<section><h4>' . $title . '</h4><div><p>' . return_clean($content) . '</p></div></section>';
	
}

/*--------------------------------------------------------------------------------------*/
/* 	Toggle
/*--------------------------------------------------------------------------------------*/

// Main toggle container
function sp_toggle_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'style' => 'one',		
		'open_index' => 0
	), $atts));

	return '<div class="accordion small ' . $style . ' clearfix toggle" data-opened="' . $open_index . '">' . return_clean($content) . '</div>';
}

// toggle section
function sp_toggle_section_shortcode($atts, $content = null) {

	extract(shortcode_atts(array(
		'title' => 'Title Goes Here',		
	), $atts));

	return '<section><h4>' . $title . '</h4><div><p>' . return_clean($content) . '</p></div></section>';
	
}

/*--------------------------------------------------------------------------------------*/
/* 	Tabs
/*--------------------------------------------------------------------------------------*/

// Main Tabgroup
function sp_tabgroup_shortcode($atts, $content = null) {

	$defaults = array();
	//extract( shortcode_atts( $defaults, $atts ) );
	extract(shortcode_atts(array(
		'style' => 'light'
	), $atts));
	
	STATIC $i = 0;
	$i++;

	// Extract the tab titles for use in the tab widget.
	preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
	
	$tab_titles = array();
	if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
	
	$output = '';
	
	if( count($tab_titles) ){
	    $output .= '<div id="sp-tabs-'. $i .'" class="tabs-container ' . $style . ' clearfix">';
		$output .= '<ul class="titles clearfix">';
		
		foreach( $tab_titles as $tab ){
			$output .= '<li><a href="#sp-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
		}
	    
	    $output .= '</ul><div class="tab-contents clearfix">';
	    $output .= do_shortcode( $content );
	    $output .= '</div></div>';
	} else {
		$output .= do_shortcode( $content );
	}

	return $output;

}

// Individual Tabs
function sp_tab_shortcode($atts, $content = null) {

	$defaults = array( 'title' => 'Tab' );
	extract( shortcode_atts( $defaults, $atts ) );
	
	return '<div id="sp-tab-'. sanitize_title( $title ) .'">'. do_shortcode( $content ) .'</div>';
	
}

/*--------------------------------------------------------------------------------------*/
/* 	Devide
/*--------------------------------------------------------------------------------------*/

function sp_hr_shortcode_sc($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'style' => 'dashed',
		'margin_top' => '40',
		'margin_bottom' => '40',
	), $atts));
	
	return '<hr class="' .$style . '" style="margin-top:' . $margin_top . 'px;margin-bottom:' . $margin_bottom . 'px;" />';
	
}

/*--------------------------------------------------------------------------------------*/
/* 	Email encoder
/*--------------------------------------------------------------------------------------*/

function sp_email_encoder_sc($atts, $content = null){
	extract(shortcode_atts(array(
		'email' 	=> 'name@domainname.com',
		'subject'	=> 'General Inquirie'
	), $atts));

	return '<a href="mailto:' . antispambot($email) . '?subject=' . $subject . '">' . antispambot($email) . '</a>';
}

/*--------------------------------------------------------------------------------------*/
/* Presenter shortcode
/*--------------------------------------------------------------------------------------*/
function sp_presenter_sc( $atts, $content = null ){

	extract( shortcode_atts( array(
		'post_num' => null
	), $atts ) );

	return sp_get_posts_type( 'presenter', array('posts_per_page' => $post_num) );

}

/*--------------------------------------------------------------------------------------*/
/* Photogallery
/*--------------------------------------------------------------------------------------*/
function sp_photogallery_sc( $atts, $content = null ){

	global $post;

	extract( shortcode_atts( array(
		'album_id' => null,
		'postnum' => null,
	), $atts ) );

	$out = '';

	if ( $album_id == '-1' ) { // Show each cover album		
		$out .= sp_get_posts_type( 'gallery', array('posts_per_page' => $post_num) );
	} else { // show individual album
		$out .= sp_get_album_gallery( $album_id, $postnum, 'thumb-medium' );
	}

	return $out;

}

/*--------------------------------------------------------------------------------------*/
/* Video Gallery
/*--------------------------------------------------------------------------------------*/
function sp_video_gallery_sc( $atts, $content = null ){

	global $post;

	extract( shortcode_atts( array(
		'postnum' => null,
	), $atts ) );

	$out = sp_get_video_village( $postnum );

	return $out;

}




