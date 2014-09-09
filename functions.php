<?php
/*
|--------------------------------------------------------------------------
| default theme constants & repeating variables
| * do not change
|--------------------------------------------------------------------------
*/ 
 
/* ---------------------------------------------------------------------- */
/*	Basic Theme Settings
/* ---------------------------------------------------------------------- */
$shortname = get_template(); 

//WP 3.4+ only
$themeData     = wp_get_theme( $shortname );
$themeName     = $themeData->Name;
$themeName = str_replace( ' ', '', $themeName );

//Basic constants	
define( 'SP_THEME_NAME', strtoupper($themeName) );
define( 'SP_TEXT_DOMAIN', strtolower($themeName) );
define( 'SP_SCRIPTS_VERSION', '20140701' ); // yyyymmdd

define( 'SP_BASE_DIR',   get_template_directory() . '/' );
define( 'SP_BASE_URL',     get_template_directory_uri() . '/' );
define( 'SP_ASSETS_THEME', get_template_directory_uri() . '/assets/' );
define( 'SP_ASSETS_ADMIN', get_template_directory_uri() . '/library/assets/' );

//Custom post WordPress admin menu position - 30, 33, 39, 42, 45, 48
if ( ! isset( $cp_menu_position ) )
	$cp_menu_position = array(
			'menu_tv'				=> 5,
			'menu_radio'			=> 5,
			'menu_team'				=> 5,
			'menu_document'			=> 5,
			'menu_gallery'			=> 5,
		);


/* ---------------------------------------------------------------------- */
/*	Load some backend functions
/* ---------------------------------------------------------------------- */
/* theme setup */
load_template( SP_BASE_DIR . 'library/functions/theme-setup.php');
load_template( SP_BASE_DIR . 'library/functions/aq_resizer.php');
load_template( SP_BASE_DIR . 'library/functions/theme-functions.php');
load_template( SP_BASE_DIR . 'library/functions/dynamic-styles.php' );

//Theme Admin
load_template( SP_BASE_DIR . 'library/functions/admin-functions.php' );
