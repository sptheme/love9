<?php

/*  Initialize the options before anything else. 
/* ------------------------------------ */
add_action( 'admin_init', 'custom_theme_options', 1 );


/*  Build the custom settings & update OptionTree.
/* ------------------------------------ */
function custom_theme_options() {
	
	// Get a copy of the saved settings array.
	$saved_settings = get_option( 'option_tree_settings', array() );

	// Custom settings array that will eventually be passed to the OptionTree Settings API Class.
	$custom_settings = array(

/*  Help pages
/* ------------------------------------ */	
	'contextual_help' => array(
      'content'       => array( 
        array(
          'id'        => 'general_help',
          'title'     => 'Documentation',
          'content'   => '
			<h1>Hueman</h1>
			<p>Thanks for using this theme! Enjoy.</p>
			<ul>
				<li>Read the theme documentation <a target="_blank" href="'.get_template_directory_uri().'/functions/documentation/documentation.html">here</a></li>
				<li>Download the sample child theme <a href="https://github.com/AlxMedia/hueman-child/archive/master.zip">here</a></li>
				<li>Download or contribute translations <a target="_blank" href="https://github.com/AlxMedia/hueman-languages">here</a></li>
				<li>Feel free to rate/review the theme <a target="_blank" href="http://wordpress.org/support/view/theme-reviews/hueman">here</a></li>
				<li>If you have theme questions, go <a target="_blank" href="http://wordpress.org/support/theme/hueman">here</a></li>
				<li>Hueman is on <a target="_blank" href="https://github.com/AlxMedia/hueman">GitHub</a></li>
			</ul>
			<hr />
			<p>You can support the theme author by donating <a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=K54RW72RZM2HN">here</a> – any amount is always appreciated.</p>
		'
        )
      )
    ),
	
/*  Admin panel sections
/* ------------------------------------ */	
	'sections'        => array(
		array(
			'id'		=> 'general',
			'title'		=> 'General'
		),
		array(
			'id'		=> 'header',
			'title'		=> 'Header'
		),
		array(
			'id'		=> 'footer',
			'title'		=> 'Footer'
		),
		array(
			'id'		=> 'blog',
			'title'		=> 'Blog'
		),
		array(
			'id'		=> 'layout',
			'title'		=> 'Layout'
		),
		array(
			'id'		=> 'sidebars',
			'title'		=> 'Sidebars'
		),
		array(
			'id'		=> 'social-links',
			'title'		=> 'Social Links'
		),
		array(
			'id'		=> 'styling',
			'title'		=> 'Styling'
		),
	),
	
/*  Theme options
/* ------------------------------------ */
	'settings'        => array(
		
		// General: Responsive Layout
		array(
			'id'		=> 'responsive',
			'label'		=> 'Responsive Layout',
			'desc'		=> 'Mobile and tablet optimizations [ <strong>responsive.css</strong> ]',
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'general'
		),
		
		// Header: Custom Logo
		array(
			'id'		=> 'custom-logo',
			'label'		=> 'Custom Logo',
			'desc'		=> 'Upload your custom logo image. Set logo max-height in styling options.',
			'std'		=> SP_ASSETS_THEME . 'images/logo.png',
			'type'		=> 'upload',
			'section'	=> 'header'
		),
		// Header: Favicon
		array(
			'id'		=> 'favicon',
			'label'		=> 'Browser favicon',
			'desc'		=> 'Upload a 16px x 16px Png image',
			'std'		=> SP_BASE_URL . 'favicon.ico',
			'type'		=> 'upload',
			'section'	=> 'header'
		),
		array(
			'id'		=> 'custom-android-icon128',
			'label'		=> 'Add to homescreen for Chrome on Android',
			'desc'		=> 'Upload a 128px x 128px Png image',
			'std'		=> SP_ASSETS_THEME . 'images/touch/icon-128x128.png',
			'type'		=> 'upload',
			'section'	=> 'header'
		),
		array(
			'id'		=> 'custom-ios-title',
			'label'		=> 'Custom iOS Bookmark Title',
			'desc'		=> 'Enter a custom title for your site for when it is added as an iOS bookmark.',
			'std'		=> '',
			'type'		=> 'text',
			'section'	=> 'header'
		),
		array(
			'id'		=> 'custom-ios-icon152',
			'label'		=> 'Add to homescreen for Safari on iOS',
			'desc'		=> 'Upload a 152px x 152px Png image',
			'std'		=> SP_ASSETS_THEME . 'images/touch/apple-touch-icon-precomposed.png',
			'type'		=> 'upload',
			'section'	=> 'header'
		),
		array(
			'id'		=> 'custom-win8-tile-icon144',
			'label'		=> 'Tile icon for Win8',
			'desc'		=> 'Upload a 144px x 144px Png image',
			'std'		=> SP_ASSETS_THEME . 'images/touch/ms-touch-icon-144x144-precomposed.png',
			'type'		=> 'upload',
			'section'	=> 'header'
		),
		// Footer: Widget Columns
		/*array(
			'id'		=> 'footer-widgets',
			'label'		=> 'Footer Widget Columns',
			'desc'		=> 'Select columns to enable footer widgets<br /><i>Recommended number: 3</i>',
			'std'		=> '0',
			'type'		=> 'radio-image',
			'section'	=> 'footer',
			'class'		=> '',
			'choices'	=> array(
				array(
					'value'		=> '0',
					'label'		=> 'Disable',
					'src'		=> SP_ASSETS_ADMIN . 'images/layout-off.png'
				),
				array(
					'value'		=> '1',
					'label'		=> '1 Column',
					'src'		=> SP_ASSETS_ADMIN . 'images/footer-widgets-1.png'
				),
				array(
					'value'		=> '2',
					'label'		=> '2 Columns',
					'src'		=> SP_ASSETS_ADMIN . 'images/footer-widgets-2.png'
				),
				array(
					'value'		=> '3',
					'label'		=> '3 Columns',
					'src'		=> SP_ASSETS_ADMIN . 'images/footer-widgets-3.png'
				),
				array(
					'value'		=> '4',
					'label'		=> '4 Columns',
					'src'		=> SP_ASSETS_ADMIN . 'images/footer-widgets-4.png'
				)
			)
		),*/
		// Footer: Sponsors Logo
		/*array(
			'id'		=> 'footer-logo',
			'label'		=> 'Sponsors Logo',
			'desc'		=> 'Dispaly/Hide sponsor logo',
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'footer'
		),

		array(
			'id'		=> 'sponsor-logo',
			'label'		=> 'Sponsor logo',
			'desc'		=> 'By not selecting a sponsor category, it will show your latest logos',
			'type'		=> 'taxonomy-select',
			'taxonomy'  => 'logo-type',
			'section'	=> 'footer',
			'condition' => 'footer-logo:is(on)'
		),*/

		// Footer: Copyright
		array(
			'id'		=> 'copyright',
			'label'		=> 'Footer Copyright',
			'desc'		=> 'Replace the footer copyright text',
			'std'		=> 'WP Theme Testing © 2014. All Rights Reserved.',
			'type'		=> 'text',
			'section'	=> 'footer'
		),
		array(
			'id'		=> 'about-footer-text',
			'label'		=> 'Text Highlight of About page',
			'desc'		=> 'Select highlight about page to show in footer',
			'type'		=> 'page_select',
			'section'	=> 'footer'
		),
		array(
			'id'		=> 'sponsor-footer-text',
			'label'		=> 'Sponsor page',
			'desc'		=> 'Select sponsor page to show in footer',
			'type'		=> 'page_select',
			'section'	=> 'footer'
		),
		array(
			'id'		=> 'quick-contact',
			'label'		=> 'Contact page',
			'desc'		=> 'Select Contact or Get in touch page',
			'type'		=> 'page_select',
			'section'	=> 'footer'
		),
		// Blog: Single - Social Share
		array(
			'id'		=> 'social_share',
			'label'		=> 'Single &mdash; Share Bar',
			'desc'		=> 'Social sharing buttons for each article',
			'std'		=> 'on',
			'type'		=> 'on-off',
			'section'	=> 'blog'
		),
		// Blog: Twitter Username
		array(
			'id'		=> 'twitter-username',
			'label'		=> 'Twitter Username',
			'desc'		=> 'Your @username will be added to share-tweets of your posts (optional)',
			'type'		=> 'text',
			'section'	=> 'blog'
		),
		// Blog: Single - Related Posts
		array(
			'id'		=> 'related-posts',
			'label'		=> 'Single &mdash; Related Posts',
			'desc'		=> 'Shows randomized related articles below the post',
			'std'		=> 'categories',
			'type'		=> 'radio',
			'section'	=> 'blog',
			'choices'	=> array(
				array( 
					'value' => '1',
					'label' => 'Disable'
				),
				array( 
					'value' => 'categories',
					'label' => 'Related by categories'
				),
				array( 
					'value' => 'tags',
					'label' => 'Related by tags'
				)
			)
		),
		// Layout : Global
		array(
			'id'		=> 'layout-global',
			'label'		=> 'Global Layout',
			'desc'		=> 'Other layouts will override this option if they are set',
			'std'		=> 'col-1c',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> SP_ASSETS_ADMIN . 'images/col-1c.png'
				),
				array(
					'value'		=> 'col-cell-2',
					'label'		=> '1 Column with Bottom sidebar',
					'src'		=> SP_ASSETS_ADMIN . 'images/col-cell-2.png'
				),
				/*array(
					'value'		=> 'col-3cm',
					'label'		=> '3 Column Middle',
					'src'		=> SP_ASSETS_ADMIN . 'images/col-3cm.png'
				),
				array(
					'value'		=> 'col-3cl',
					'label'		=> '3 Column Left',
					'src'		=> SP_ASSETS_ADMIN . 'images/col-3cl.png'
				),
				array(
					'value'		=> 'col-3cr',
					'label'		=> '3 Column Right',
					'src'		=> SP_ASSETS_ADMIN . 'images/col-3cr.png'
				)*/
			)
		),
		// Layout : Home
		array(
			'id'		=> 'layout-home',
			'label'		=> 'Home',
			'desc'		=> '[ <strong>is_home</strong> ] Posts homepage layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
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
		),
		// Layout : Single
		array(
			'id'		=> 'layout-single',
			'label'		=> 'Single',
			'desc'		=> '[ <strong>is_single</strong> ] Single post layout - If a post has a set layout, it will override this.',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
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
		),
		// Layout : Archive
		array(
			'id'		=> 'layout-archive',
			'label'		=> 'Archive',
			'desc'		=> '[ <strong>is_archive</strong> ] Category, date, tag and author archive layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
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
		),
		// Layout : Archive - Category
		array(
			'id'		=> 'layout-archive-category',
			'label'		=> 'Archive &mdash; Category',
			'desc'		=> '[ <strong>is_category</strong> ] Category archive layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
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
		),
		// Layout : Search
		array(
			'id'		=> 'layout-search',
			'label'		=> 'Search',
			'desc'		=> '[ <strong>is_search</strong> ] Search page layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
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
		),
		// Layout : Error 404
		array(
			'id'		=> 'layout-404',
			'label'		=> 'Error 404',
			'desc'		=> '[ <strong>is_404</strong> ] Error 404 page layout',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
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
		),
		// Layout : Default Page
		array(
			'id'		=> 'layout-page',
			'label'		=> 'Default Page',
			'desc'		=> '[ <strong>is_page</strong> ] Default page layout - If a page has a set layout, it will override this.',
			'std'		=> 'inherit',
			'type'		=> 'radio-image',
			'section'	=> 'layout',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Global Layout',
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
		),
		// Sidebars: Create Areas
		array(
			'id'		=> 'sidebar-areas',
			'label'		=> 'Create Sidebars',
			'desc'		=> 'You must save changes for the new areas to appear below. <br /><i>Warning: Make sure each area has a unique ID.</i>',
			'type'		=> 'list-item',
			'section'	=> 'sidebars',
			'choices'	=> array(),
			'settings'	=> array(
				array(
					'id'		=> 'id',
					'label'		=> 'Sidebar ID',
					'desc'		=> 'This ID must be unique, for example "sidebar-about"',
					'std'		=> 'sidebar-',
					'type'		=> 'text',
					'choices'	=> array()
				)
			)
		),
		// Sidebar 1 & 2
		array(
			'id'		=> 's1-home',
			'label'		=> 'Home',
			'desc'		=> '[ <strong>is_home</strong> ] Primary',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-single',
			'label'		=> 'Single',
			'desc'		=> '[ <strong>is_single</strong> ] Primary - If a single post has a unique sidebar, it will override this.',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-archive',
			'label'		=> 'Archive',
			'desc'		=> '[ <strong>is_archive</strong> ] Primary',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-archive-category',
			'label'		=> 'Archive &mdash; Category',
			'desc'		=> '[ <strong>is_category</strong> ] Primary',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-search',
			'label'		=> 'Search',
			'desc'		=> '[ <strong>is_search</strong> ] Primary',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-404',
			'label'		=> 'Error 404',
			'desc'		=> '[ <strong>is_404</strong> ] Primary',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		array(
			'id'		=> 's1-page',
			'label'		=> 'Default Page',
			'desc'		=> '[ <strong>is_page</strong> ] Primary - If a page has a unique sidebar, it will override this.',
			'type'		=> 'sidebar-select',
			'section'	=> 'sidebars'
		),
		// Social Links : List
		array(
			'id'		=> 'facebook-url',
			'label'		=> 'Facebook URL',
			'desc'		=> 'Enter facebook URL or Link',
			'type'		=> 'text',
			'std'		=> '#',
			'section'	=> 'social-links'
		),
		array(
			'id'		=> 'youtube-url',
			'label'		=> 'Youtube Channel',
			'desc'		=> 'Enter Youtube channel',
			'type'		=> 'text',
			'std'		=> '#',
			'section'	=> 'social-links'
		),
		array(
			'id'		=> 'soundcloud-url',
			'label'		=> 'Soundcloud',
			'desc'		=> 'Enter Soundcloud channel',
			'type'		=> 'text',
			'std'		=> '#',
			'section'	=> 'social-links'
		),
		// Styling: Enable
		array(
			'id'		=> 'dynamic-styles',
			'label'		=> 'Dynamic Styles',
			'desc'		=> 'Turn on to use the styling options below',
			'std'		=> 'off',
			'type'		=> 'on-off',
			'section'	=> 'styling'
		),
		// Styling: Font
		array(
			'id'		=> 'font',
			'label'		=> 'Font',
			'desc'		=> 'Select font for the theme',
			'type'		=> 'select',
			'std'		=> '30',
			'section'	=> 'styling',
			'choices'	=> array(
				array( 
					'value' => 'open-sans-cyr',
					'label' => 'Open Sans, Latin / Cyrillic-Ext (Google Fonts)'
				),
				array( 
					'value' => 'titillium-web',
					'label' => 'Titillium Web, Latin (Self-hosted)'
				),
				array( 
					'value' => 'titillium-web-ext',
					'label' => 'Titillium Web, Latin-Ext (Google Fonts)'
				),
				array( 
					'value' => 'droid-serif',
					'label' => 'Droid Serif, Latin (Google Fonts)'
				),
				array( 
					'value' => 'source-sans-pro',
					'label' => 'Source Sans Pro, Latin-Ext (Google Fonts)'
				),
				array( 
					'value' => 'lato',
					'label' => 'Lato, Latin (Google Fonts)'
				),
				array( 
					'value' => 'ubuntu',
					'label' => 'Ubuntu, Latin-Ext (Google Fonts)'
				),
				array( 
					'value' => 'ubuntu-cyr',
					'label' => 'Ubuntu, Latin / Cyrillic-Ext (Google Fonts)'
				),
				array( 
					'value' => 'roboto-condensed',
					'label' => 'Roboto Condensed, Latin-Ext (Google Fonts)'
				),
				array( 
					'value' => 'roboto-condensed-cyr',
					'label' => 'Roboto Condensed, Latin / Cyrillic-Ext (Google Fonts)'
				),
				array( 
					'value' => 'open-sans',
					'label' => 'Open Sans, Latin-Ext (Google Fonts)'
				),
				array( 
					'value' => 'pt-serif',
					'label' => 'PT Serif, Latin-Ext (Google Fonts)'
				),
				array( 
					'value' => 'pt-serif-cyr',
					'label' => 'PT Serif, Latin / Cyrillic-Ext (Google Fonts)'
				),
				array( 
					'value' => 'arial',
					'label' => 'Arial'
				),
				array( 
					'value' => 'georgia',
					'label' => 'Georgia'
				)
			)
		),
		// Styling: Primary Color
		array(
			'id'		=> 'color-1',
			'label'		=> 'Primary Color',
			'std'		=> '#3b5998',
			'type'		=> 'colorpicker',
			'section'	=> 'styling',
			'class'		=> ''
		),
		// Styling: Secondary Color
		array(
			'id'		=> 'color-2',
			'label'		=> 'Secondary Color',
			'std'		=> '#f05950',
			'type'		=> 'colorpicker',
			'section'	=> 'styling',
			'class'		=> ''
		),
		// Styling: Body Text Color
		array(
			'id'		=> 'body-txt-color',
			'label'		=> 'Body text Color',
			'std'		=> '#6B6B6B',
			'type'		=> 'colorpicker',
			'section'	=> 'styling',
			'class'		=> ''
		),
		// Styling: Body Background
		array(
			'id'		=> 'body-background',
			'label'		=> 'Body Background',
			'desc'		=> 'Set background color for body page',
			'std'		=> '#ffffff',
			'type'		=> 'colorpicker',
			'section'	=> 'styling'
		),
		// Header: Header background image
		array(
			'id'		=> 'header-bg',
			'label'		=> 'Header Background Image',
			'desc'		=> 'Upload a background partern png image for header. Size 960px x 100px.',
			'std'		=> SP_ASSETS_THEME . 'images/topbar.png',
			'type'		=> 'upload',
			'section'	=> 'styling'
		),
	)
);

/*  Settings are not the same? Update the DB
/* ------------------------------------ */
	if ( $saved_settings !== $custom_settings ) {
		update_option( 'option_tree_settings', $custom_settings ); 
	} 
}
