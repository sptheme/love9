<?php


if( !function_exists('sp_touch_scripts_styles') ) {
	
	if(!is_admin()){
		add_action('wp_enqueue_scripts', 'sp_touch_scripts_styles'); //print Script and CSS
	}

	function sp_touch_scripts_styles() {

		if ( ot_get_option('responsive') != 'off' ) {
			wp_enqueue_style('font-awesome', SP_ASSETS_THEME . 'fonts/font-awesome/css/font-awesome.min.css', array('layout'), SP_SCRIPTS_VERSION);
			wp_enqueue_style('menu-mobile', SP_ASSETS_THEME . 'css/menu-mobile.css', array('layout'), SP_SCRIPTS_VERSION);
			wp_enqueue_style('responsive', SP_ASSETS_THEME . 'css/responsive.css', array('layout'), SP_SCRIPTS_VERSION);
			wp_enqueue_script('mobile-menu', SP_ASSETS_THEME . 'js/mobile-menu.js', array('jquery'), SP_SCRIPTS_VERSION, true);
		}

		if ( is_front_page() || is_home() ) {
			wp_enqueue_style('front-touch', SP_ASSETS_THEME . 'css/front-touch.css', array('layout'), SP_SCRIPTS_VERSION);
		}

	}	
}

/* ---------------------------------------------------------------------- */               							
/* Render HTML Team
/* ---------------------------------------------------------------------- */

function sp_render_team_post( $post_id, $size = 'post-slider', $cols = '3' ) {

	$team_position = get_post_meta($post_id, 'sp_team_position', true);
	$placeholder = SP_ASSETS_THEME . 'images/placeholder/thumbnail-960x720.jpg';
	
	$out = '<article class="post-' . $post_id . ' ' . $cols . '">';
	$out .= '<div class="thumb-effect">';
	if ( has_post_thumbnail() ) :
		$out .= '<img class="attachment-medium wp-post-image" src="' . sp_post_thumbnail( $size ) . '" />';
	else :
		$out .= '<img class="attachment-medium wp-post-image" src="' . $placeholder . '" />';
	endif; 
	
	$out .= '<h5><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>';
	$out .= '<span class="entry-meta">' . $team_position . '</span>';
	$out .= '</div>';
    $out .= '</article>';

	return $out;
}

/* ---------------------------------------------------------------------- */               							
/* Render HTML Radio
/* ---------------------------------------------------------------------- */
function sp_render_sound_post( $post_id, $size = 'post-slider', $cols = '3' ) {

	$sound_url = get_post_meta($post->ID, 'sp_soundcloud_url', true);
	$sound_cover = SP_ASSETS_THEME . 'images/placeholder/thumbnail-960x720.jpg';

	$out = '<article class="post-' . $post_id . ' ' . $cols . '">';
	$out .= '<div class="thumb-effect">';
	if ( has_post_thumbnail() ) :
		$out .= '<img class="attachment-medium wp-post-image" src="' . sp_post_thumbnail( $size ) . '" />';
	else :
		$out .= '<img class="attachment-medium wp-post-image" src="' . $sound_cover . '" />';
	endif; 
	$out .= '<h5><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>';
	$out .= '<span class="entry-meta">' . get_the_date() . '</span>';
	$out .= '</div>';
    $out .= '</article>';
	return $out;
}

/* ---------------------------------------------------------------------- */               							
/* Render HTML Video
/* ---------------------------------------------------------------------- */
function sp_render_video_post( $post_id, $size = 'thumbnail', $cols = '3' ) {

	$video_url = get_post_meta($post_id, 'sp_video_url', true);
	$video_cover = sp_get_video_img( $video_url );

	$out = '<article class="post-' . $post_id . ' ' . $cols . '">';
	$out .= '<div class="thumb-effect">';
	if ( has_post_thumbnail() ) :
		$out .= '<img class="attachment-medium wp-post-image" src="' . sp_post_thumbnail( $size ) . '" />';
	else :
		$out .= '<img class="attachment-medium wp-post-image" src="' . $video_cover . '" />';
	endif; 
	$out .= '<h5><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>';
	$out .= '<span class="entry-meta">' . get_the_date() . '</span>';
	$out .= '</div>';
    $out .= '</article>';
	return $out;
}

/* ---------------------------------------------------------------------- */               							
/* Render HTML Albums
/* ---------------------------------------------------------------------- */
function sp_render_photogallery_post( $post_id, $size = 'thumbnail', $cols ) {

	$album_location = get_post_meta($post_id, 'sp_album_location', true);
	$placeholder = SP_ASSETS_THEME . 'images/placeholder/thumbnail-960x720.jpg';

	$out = '<article class="post-' . $post_id . ' ' . $cols . '">';
	$out .= '<div class="thumb-effect">';
	if ( has_post_thumbnail() ) :
		$out .= '<img class="attachment-medium wp-post-image" src="' . sp_post_thumbnail( $size ) . '" />';
	else :
		$out .= '<img class="attachment-medium wp-post-image" src="' . $placeholder . '" />';
	endif; 
	$out .= '<h5><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>';
	$out .= '<span class="entry-meta">' . $album_location . '</span>';
	$out .= '<span class="entry-meta">' . get_the_date() . '</span>';
	$out .= '</div>';
    $out .= '</article>';

	return $out;
}

/* ---------------------------------------------------------------------- */
/*	Get gallery/photos detail
/* ---------------------------------------------------------------------- */
function sp_get_album_gallery( $post_id, $post_num = 10, $size = 'thumbnail', $cols ) {

	$album_location = get_post_meta($post_id, 'sp_album_location', true);
	$photos = explode( ',', get_post_meta( $post_id, 'sp_gallery', true ) );
	$out = '';

	if ( $photos[0] != '' ) :
		$out = '<div class="gallery sp-posts clearfix">';
		foreach ( $photos as $image ) :
			$imageid = wp_get_attachment_image_src($image, $size);
			$out .= '<article class="post-' . $post_id . ' ' . $cols . '">';
			$out .= '<a href="' . wp_get_attachment_url($image) . '">';
			$out .= '<img class="attachment-medium wp-post-image" src="' . $imageid[0] . '">';
			$out .= '</a>';
		    $out .= '</article>';
		endforeach; 
		$out .= '</div>';
	else : 
		$out .= '<h4>' . __( 'Sorry there is no image for this album.', SP_TEXT_DOMAIN ) . '</h4>';	
	endif;

	return $out;
}