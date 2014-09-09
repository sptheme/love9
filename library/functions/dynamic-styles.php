<?php
/* ------------------------------------------------------------------------- *
 *  Dynamic styles
/* ------------------------------------------------------------------------- */

/*  Google fonts
/* ------------------------------------ */
if ( ! function_exists( 'sp_google_fonts' ) ) {

	function sp_google_fonts () {
		if ( ot_get_option('dynamic-styles') != 'off' ) {
			if ( ot_get_option( 'font' ) == 'titillium-web-ext' ) { echo '<link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,400italic,300italic,300,600&subset=latin,latin-ext" rel="stylesheet" type="text/css">'. "\n"; }
			if ( ot_get_option( 'font' ) == 'droid-serif' ) { echo '<link href="http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700" rel="stylesheet" type="text/css">'. "\n"; }
			if ( ot_get_option( 'font' ) == 'source-sans-pro' ) { echo '<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300italic,300,400italic,600&subset=latin,latin-ext" rel="stylesheet" type="text/css">'. "\n"; }
			if ( ot_get_option( 'font' ) == 'lato' ) { echo '<link href="http://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700" rel="stylesheet" type="text/css">'. "\n"; }
			if ( ot_get_option( 'font' ) == 'ubuntu' ) { echo '<link href="http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,300italic,300,700&subset=latin,latin-ext" rel="stylesheet" type="text/css">'. "\n"; }
			if ( ot_get_option( 'font' ) == 'ubuntu-cyr' ) { echo '<link href="http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,300italic,300,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">'. "\n"; }
			if ( ot_get_option( 'font' ) == 'roboto-condensed' ) { echo '<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700&subset=latin,latin-ext" rel="stylesheet" type="text/css">'. "\n"; }
			if ( ot_get_option( 'font' ) == 'roboto-condensed-cyr' ) { echo '<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">'. "\n"; }
			if ( ot_get_option( 'font' ) == 'open-sans' ) { echo '<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600&subset=latin,latin-ext" rel="stylesheet" type="text/css">'. "\n"; }
			if ( ot_get_option( 'font' ) == 'open-sans-cyr' ) { echo '<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">'. "\n"; }
			if ( ot_get_option( 'font' ) == 'pt-serif' ) { echo '<link href="http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic&subset=latin,latin-ext" rel="stylesheet" type="text/css">'. "\n"; }
			if ( ot_get_option( 'font' ) == 'pt-serif-cyr' ) { echo '<link href="http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">'. "\n"; }
		}
	}	
	
}
add_action( 'wp_head', 'sp_google_fonts', 2 );	


/*  Dynamic css output
/* ------------------------------------ */
if ( ! function_exists( 'sp_dynamic_css' ) ) {

	function sp_dynamic_css() {
		if ( ot_get_option('dynamic-styles') != 'off' ) {
		
			// start output
			$styles = '<style type="text/css">'."\n";
			$styles .= '/* Dynamic CSS: For no styles in head, copy and put the css below in your custom.css or child theme\'s style.css, disable dynamic styles */'."\n";		
			
			// google fonts
			if ( ot_get_option( 'font' ) == 'titillium-web-ext' ) { $styles .= 'body { font-family: "Titillium Web", Arial, sans-serif; }'."\n"; }
			if ( ot_get_option( 'font' ) == 'droid-serif' ) { $styles .= 'body { font-family: "Droid Serif", serif; }'."\n"; }
			if ( ot_get_option( 'font' ) == 'source-sans-pro' ) { $styles .= 'body { font-family: "Source Sans Pro", Arial, sans-serif; }'."\n"; }
			if ( ot_get_option( 'font' ) == 'lato' ) { $styles .= 'body { font-family: "Lato", Arial, sans-serif; }'."\n"; }
			if ( ( ot_get_option( 'font' ) == 'ubuntu' ) || ( ot_get_option( 'font' ) == 'ubuntu-cyr' ) ) { $styles .= 'body { font-family: "Ubuntu", Arial, sans-serif; }'."\n"; }	
			if ( ( ot_get_option( 'font' ) == 'roboto-condensed' ) || ( ot_get_option( 'font' ) == 'roboto-condensed-cyr' ) ) { $styles .= 'body { font-family: "Roboto Condensed", Arial, sans-serif; }'."\n"; }			
			if ( ( ot_get_option( 'font' ) == 'open-sans' ) || ( ot_get_option( 'font' ) == 'open-sans-cyr' ) )	{ $styles .= 'body { font-family: "Open Sans", Arial, sans-serif; }'."\n"; }
			if ( ( ot_get_option( 'font' ) == 'pt-serif' ) || ( ot_get_option( 'font' ) == 'pt-serif-cyr' ) ) { $styles .= 'body { font-family: "PT Serif", serif; }'."\n"; }
			if ( ot_get_option( 'font' ) == 'arial' ) { $styles .= 'body { font-family: Arial, sans-serif; }'."\n"; }
			if ( ot_get_option( 'font' ) == 'georgia' ) { $styles .= 'body { font-family: Georgia, serif; }'."\n"; }
			
			// body color
			if ( ot_get_option('body-txt-color') != '#6B6B6B' ) {
				$styles .= '
body {	
	color: ' . ot_get_option('body-txt-color') . ';
	background: ' . ot_get_option('body-background') . ';
}
				'."\n";
			}

			// primary color
			if ( ot_get_option('color-1') != '#3b5998' ) {
				$styles .= '
::selection { background-color: ' . ot_get_option('color-1') . '; }
::-moz-selection { background-color: ' . ot_get_option('color-1') . '; }

a,
.pagination li,
.wp-pagenavi a { color: ' . ot_get_option('color-1') . '; }	

a.learn-more { border:2px solid ' . ot_get_option('color-1') . '; }
a.learn-more:hover { background: ' . ot_get_option('color-1') . ' url(' . SP_ASSETS_THEME . 'images/overlay.png); }

input[type="submit"],
button[type="submit"],
.thumb-caption a { background:' . ot_get_option('color-1') . '; }

ul.primary-nav li ul li a:hover,
ul.primary-nav li.current-menu-parent ul li.current-menu-item > a{ 
  background-color: ' . ot_get_option('color-1') . '; 
}
				'."\n";
			}

			// secondary color
			if ( ot_get_option('color-2') != '#d8dfea' ) {
			$styles .= '
ul.primary-nav li a:hover,
ul.primary-nav li.current-menu-item > a,
ul.primary-nav li.current-menu-parent > a,
ul.primary-nav li ul li a:hover,
ul.primary-nav li.current-menu-parent ul li.current-menu-item > a{ 
  color: ' . ot_get_option('color-2') . '; 
}
				'."\n";				
			}
			
			$styles .= '</style>'."\n";
			// end output
			
			echo $styles;		
		}
	}
	
}
add_action( 'wp_head', 'sp_dynamic_css', 100 );
