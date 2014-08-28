<?php

/*  Initialize the meta boxes.
/* ------------------------------------ */
add_action( 'admin_init', '_custom_meta_boxes' );

function _custom_meta_boxes() {

	$prefix = 'sp_';
  
/*  Custom meta boxes
/* ------------------------------------ */
$page_options = array(
	'id'          => 'page-options',
	'title'       => 'Page Options',
	'desc'        => '',
	'pages'       => array( 'page', 'post', 'team', 'gallery' ),
	'context'     => 'normal',
	'priority'    => 'default',
	'fields'      => array(
		array(
			'label'		=> 'Primary Sidebar',
			'id'		=> $prefix . 'sidebar_primary',
			'type'		=> 'sidebar-select',
			'desc'		=> 'Overrides default'
		),
		array(
			'label'		=> 'Layout',
			'id'		=> $prefix . 'layout',
			'type'		=> 'radio-image',
			'desc'		=> 'Overrides the default layout option',
			'std'		=> 'inherit',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Layout',
					'src'		=> SP_ASSETS_ADMIN . 'images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> SP_ASSETS_ADMIN . 'images/col-1c.png'
				),
				array(
					'value'		=> 'col-cell-2',
					'label'		=> '1 Column with Bottom sidebar',
					'src'		=> SP_ASSETS_ADMIN . 'images/col-cell-2.png'
				)
			)
		)
	)
);

/*$post_options = array(
	'id'          => 'post-options',
	'title'       => 'Post Options',
	'desc'        => '',
	'pages'       => array( 'post' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Primary Sidebar',
			'id'		=> $prefix . 'sidebar_primary',
			'type'		=> 'sidebar-select',
			'desc'		=> 'Overrides default'
		),
		array(
			'label'		=> 'Layout',
			'id'		=> $prefix . 'layout',
			'type'		=> 'radio-image',
			'desc'		=> 'Overrides the default layout option',
			'std'		=> 'inherit',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Layout',
					'src'		=> SP_ASSETS_ADMIN . 'images/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> SP_ASSETS_ADMIN . 'images/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> SP_ASSETS_ADMIN . 'images/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> SP_ASSETS_ADMIN . 'images/col-2cr.png'
				)
			)
		)
	)
);*/

/* ---------------------------------------------------------------------- */
/*	Team post type
/* ---------------------------------------------------------------------- */
$post_type_team = array(
	'id'          => 'team-setting',
	'title'       => 'Team Member meta',
	'desc'        => '',
	'pages'       => array( 'team' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Position',
			'id'		=> $prefix . 'team_position',
			'type'		=> 'text',
			'desc'		=> 'Enter the team member\'s position within the team.'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Gallery post type
/* ---------------------------------------------------------------------- */
$post_type_gallery = array(
	'id'          => 'gallery-setting',
	'title'       => 'Upload photos',
	'desc'        => 'These settings enable you to upload photos.',
	'pages'       => array( 'gallery' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Location',
			'id'		=> $prefix . 'album_location',
			'type'		=> 'text',
			'desc'		=> 'Where this album take photos'
		),
		array(
			'label'		=> 'Upload photo',
			'id'		=> $prefix . 'gallery',
			'type'		=> 'gallery',
			'desc'		=> 'Upload photos'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Post Format: video
/* ---------------------------------------------------------------------- */
$post_format_video = array(
	'id'          => 'format-video',
	'title'       => 'Video meta',
	'desc'        => 'These settings enable you to embed videos into your posts.',
	'pages'       => array( 'post', 'video_gallery', 'document', 'tv' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Video URL',
			'id'		=> $prefix . 'video_url',
			'type'		=> 'text',
			'desc'		=> 'Recommended to use.'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Post Format: Audio
/* ---------------------------------------------------------------------- */
$post_format_audio = array(
	'id'          => 'format-audio',
	'title'       => 'Audio meta',
	'desc'        => 'These settings enable you to embed audio into your posts. You must provide both .mp3 and .ogg/.oga file formats in order for self hosted audio to function accross all browsers.',
	'pages'       => array( 'post', 'document', 'radio' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Soundcloud URL',
			'id'		=> $prefix . 'soundcloud_url',
			'type'		=> 'text',
			'desc'		=> 'Enter share URL of sound from Soundcloud'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Post Format: Gallery
/* ---------------------------------------------------------------------- */
$post_format_gallery = array(
	'id'          => 'format-gallery',
	'title'       => 'Format: Gallery',
	'desc'        => 'These settings enable you to present photos as slideshow in post',
	'pages'       => array( 'post' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Upload photo',
			'id'		=> $prefix . 'gallery',
			'type'		=> 'gallery',
			'desc'		=> 'Upload photos'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Post Format: Chat
/* ---------------------------------------------------------------------- */
$post_format_chat = array(
	'id'          => 'format-chat',
	'title'       => 'Format: Chat',
	'desc'        => 'Input chat dialogue.',
	'pages'       => array( 'post' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Chat Text',
			'id'		=> $prefix . 'chat',
			'type'		=> 'textarea',
			'rows'		=> '2'
		)
	)
);
/* ---------------------------------------------------------------------- */
/*	Post Format: Link
/* ---------------------------------------------------------------------- */
$post_format_link = array(
	'id'          => 'format-link',
	'title'       => 'Format: Link',
	'desc'        => 'Input your link.',
	'pages'       => array( 'post' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Link Title',
			'id'		=> $prefix . 'link_title',
			'type'		=> 'text'
		),
		array(
			'label'		=> 'Link URL',
			'id'		=> $prefix . 'link_url',
			'type'		=> 'text'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Post Format: quote
/* ---------------------------------------------------------------------- */
$post_format_quote = array(
	'id'          => 'format-quote',
	'title'       => 'Format: Quote',
	'desc'        => 'Input your quote.',
	'pages'       => array( 'post' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Quote',
			'id'		=> $prefix . 'quote',
			'type'		=> 'textarea',
			'rows'		=> '2'
		),
		array(
			'label'		=> 'Quote Author',
			'id'		=> $prefix . 'quote_author',
			'type'		=> 'text'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Home template
/* ---------------------------------------------------------------------- */
$page_template_home = array(
	'id'          => 'home-settings',
	'title'       => 'Home settings',
	'desc'        => 'Option setting for homepage',
	'pages'       => array( 'page' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Welcome',
			'id'		=> $prefix . 'intro_options',
			'type'		=> 'tab'
		),
		array(
			'label'		=> 'Intro title',
			'id'		=> $prefix . 'intro_title',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'TV',
			'id'		=> $prefix . 'tv_options',
			'type'		=> 'tab'
		),
		array(
			'label'		=> 'TV title',
			'id'		=> $prefix . 'tv_title',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'TV Drama',
			'id'		=> $prefix . 'tv_drama',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Select TV Drama page',
			'id'		=> $prefix . 'page_tv_drama',
			'type'		=> 'page_select',
		),
		/*array(
			'label'		=> 'Video Drama URL/Link ',
			'id'		=> $prefix . 'video_drama',
			'type'		=> 'text',
		),*/
		array(
			'label'		=> 'TV Magazine',
			'id'		=> $prefix . 'tv_magazine',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Select TV Magazine page',
			'id'		=> $prefix . 'page_tv_mag',
			'type'		=> 'page_select',
		),
		/*array(
			'label'		=> 'Video Magazine URL/Link ',
			'id'		=> $prefix . 'video_magazine',
			'type'		=> 'text',
		),*/
		array(
			'label'		=> 'TV Board',
			'id'		=> $prefix . 'tv_board',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'TV Time',
			'id'		=> $prefix . 'tv_time',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Radio',
			'id'		=> $prefix . 'radio_options',
			'type'		=> 'tab'
		),
		array(
			'label'		=> 'Radio title',
			'id'		=> $prefix . 'radio_title',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Select section (Listen to podcast) for Weekly Topic',
			'id'		=> $prefix . 'weekly_topic',
			'type'		=> 'taxonomy-select',
			'post_type' => 'radio',
        	'taxonomy'  => 'radio-section',
		),
		array(
			'label'		=> 'Radio actor',
			'id'		=> $prefix . 'radio_actor',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'FM 102 and Time',
			'id'		=> $prefix . 'radio_fm102',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Radio Drama',
			'id'		=> $prefix . 'radio_drama',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Select Radio Drama page',
			'id'		=> $prefix . 'page_radio_drama',
			'type'		=> 'page_select',
		),
		/*array(
			'label'		=> 'Radio Drama track ID',
			'id'		=> $prefix . 'track_drama_id',
			'type'		=> 'text',
		),*/
		array(
			'label'		=> 'Listen to podcast',
			'id'		=> $prefix . 'listen_podcast',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Select Listen to podcast page',
			'id'		=> $prefix . 'page_radio_podcast',
			'type'		=> 'page_select',
		),
		/*array(
			'label'		=> 'Listen to podcast track ID',
			'id'		=> $prefix . 'track_weekly_id',
			'type'		=> 'text',
		),*/
		array(
			'label'		=> 'Love9 Village',
			'id'		=> $prefix . 'village_options',
			'type'		=> 'tab'
		),
		array(
			'label'		=> 'Love9 Village title',
			'id'		=> $prefix . 'village_title',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Presenter',
			'id'		=> $prefix . 'presenter',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Actor',
			'id'		=> $prefix . 'actor',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Photo Gallery',
			'id'		=> $prefix . 'photo_gallery',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Behind the sences',
			'id'		=> $prefix . 'behind_sence',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Videos Gallery',
			'id'		=> $prefix . 'video_gallery',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Announcement',
			'id'		=> $prefix . 'announcement',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Blog',
			'id'		=> $prefix . 'blog',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'Documents',
			'id'		=> $prefix . 'document',
			'type'		=> 'upload',
		),
		array(
			'label'		=> 'About',
			'id'		=> $prefix . 'about_options',
			'type'		=> 'tab'
		),
		array(
			'label'		=> 'About title',
			'id'		=> $prefix . 'about_title',
			'type'		=> 'upload',
		)
	)
);

function rw_maybe_include() {
	// Include in back-end only
	if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
		return false;
	}
	// Always include for ajax
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	}
	elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}
	else {
		$post_id = false;
	}

	$post_id = (int) $post_id;
	$post = get_post( $post_id );
	$template = get_post_meta( $post_id, '_wp_page_template', true );
	
	return $template;
}

/*  Register meta boxes
/* ------------------------------------ */
	ot_register_meta_box( $page_options );
	ot_register_meta_box( $post_format_audio );
	ot_register_meta_box( $post_format_gallery );
	ot_register_meta_box( $post_format_video );
	/*ot_register_meta_box( $post_options );
	ot_register_meta_box( $post_format_chat );
	ot_register_meta_box( $post_format_link );
	ot_register_meta_box( $post_format_quote );*/
	ot_register_meta_box( $post_type_team );
	ot_register_meta_box( $post_type_gallery );
	
	$template_file = rw_maybe_include();
	if ( $template_file == 'template-onepage.php' ) {
		ot_register_meta_box( $page_template_home );
	}
}