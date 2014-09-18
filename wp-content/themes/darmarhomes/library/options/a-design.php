<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* WebMan Options Panel - Design section
*****************************************************
*/

$loginLogoFile = ( wm_check_wp_version( '3.2' ) ) ? ( "logo-login.png" ) : ( "logo-login.gif" );
$loginLogoFile = ( wm_check_wp_version( '3.4' ) ) ? ( "wordpress-logo.png" ) : ( $loginLogoFile );

$prefix = 'design-';

array_push( $options,

array(
	"type" => "section-open",
	"section-id" => "design",
	"title" => __( 'Design', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
),

	array(
		"type" => "sub-tabs",
		"parent-section-id" => "design",
		"list" => array(
			__( 'Design', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'Branding', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'Login', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'Fonts', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'CSS styles', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			)
	),



	array(
		"type" => "sub-section-open",
		"sub-section-id" => "design-1",
		"title" => __( 'Design', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "help",
			"topic" => __( 'Why my changes are not being applied?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"content" => __( 'Please note, that CSS styles are being cached (the theme sets this to 2 days interval). If your changes are not being applied, clean the browser cache first and reload the website. Or you can put WordPress into debug mode when the cache interval decreases to 30 seconds.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "heading3",
			"content" => __( 'Website main color skin', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),

		array(
			"type" => "skins",
			"id" => $prefix."color-scheme",
			"label" => __( 'Website color skins', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'It is recommended to set a website color scheme first to be used as a base for your additional design changes. When color scheme is changed, save the settings (note that you will loose any color and font changes made as these will be set to color skin values; you will need to reapply these changes again).', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => wm_color_schemes(),
			"default" => "default.css"
		),
		array(
			"type" => "info",
			"content" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( '<strong>' . wm_color_scheme_meta( wm_option( 'default.css' ), 'color-scheme' ) . ' ' . __( 'color scheme description', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . ':</strong><br />' . wm_color_scheme_meta( 'default.css', 'description' ) ) : ( '<strong>' . wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'color-scheme' ) . ' ' . __( 'color scheme description', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . ':</strong><br />' . wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'description' ) . '<br />&mdash; by ' . wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'author' ) )
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "heading3",
			"content" => __( 'Basic colors', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "color",
			"id" => $prefix."link-color",
			"label" => __( 'Link color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'The main link color. Will be used also on various other elements, like default button color for example.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'link-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'link-color' ) ),
			"validate" => "color"
		),
		array(
			"type" => "space"
		),
		array(
			"type" => "heading4",
			"content" => __( 'Light background text colors', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "color",
				"id" => $prefix."color-bglight",
				"label" => __( 'Text color on light background', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Default text color on light backgrounds', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'color-bglight' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'color-bglight' ) ),
				"validate" => "color"
			),
			array(
				"type" => "color",
				"id" => $prefix."color-bglight-headings",
				"label" => __( 'Headings color on light background', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Default headings color on light backgrounds', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'color-bglight-headings' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'color-bglight-headings' ) ),
				"validate" => "color"
			),
		array(
			"type" => "space"
		),
		array(
			"type" => "heading4",
			"content" => __( 'Dark background text colors', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "color",
				"id" => $prefix."color-bgdark",
				"label" => __( 'Text color on dark background', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Default text color on dark backgrounds', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'color-bgdark' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'color-bgdark' ) ),
				"validate" => "color"
			),
			array(
				"type" => "color",
				"id" => $prefix."color-bgdark-headings",
				"label" => __( 'Headings color on dark background', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Default headings color on dark backgrounds', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'color-bgdark-headings' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'color-bgdark-headings' ) ),
				"validate" => "color"
			),
		array(
			"type" => "space"
		),
		array(
			"type" => "heading4",
			"content" => __( 'Automatic text color tweaking', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "slider",
			"id" => $prefix."color-treshold",
			"label" => __( 'Background color brightness treshold', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Color brightness value when to switch between text colors (set above) depending on the background color brightness', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => WM_COLOR_TRESHOLD,
			"min" => 1,
			"max" => 250,
			"step" => 1,
			"validate" => "absint"
		),
		array(
			"type" => "space"
		),
		array(
			"type" => "heading4",
			"content" => __( 'Elements colors', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),

		//basic colors:
			array(
				"type" => "heading4",
				"content" => __( 'Define gray color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"id" => "heading-to-set-gray"
			),
			array(
				"id" => $prefix."set-gray",
				"type" => "inside-wrapper-open",
				"class" => "toggle"
			),
				array(
					"type" => "color",
					"id" => $prefix."type-gray-bg-color",
					"label" => __( 'General gray color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Gray color used on special elements like buttons, message boxes, markers', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'gray-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'gray-color' ) ),
					"validate" => "color"
				),
				array(
					"type" => "color",
					"id" => $prefix."type-gray-color",
					"label" => __( 'Text on gray color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Text color on gray background (will be set automatically if left blank)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'gray-text-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'gray-text-color' ) ),
					"validate" => "color"
				),
			array(
				"id" => $prefix."set-gray",
				"type" => "inside-wrapper-close"
			),

			array(
				"type" => "heading4",
				"content" => __( 'Define green color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"id" => "heading-to-set-green"
			),
			array(
				"id" => $prefix."set-green",
				"type" => "inside-wrapper-open",
				"class" => "toggle"
			),
				array(
					"type" => "color",
					"id" => $prefix."type-green-bg-color",
					"label" => __( 'General green color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Green color used on special elements like buttons, message boxes, markers', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'green-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'green-color' ) ),
					"validate" => "color"
				),
				array(
					"type" => "color",
					"id" => $prefix."type-green-color",
					"label" => __( 'Text on green color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Text color on green background (will be set automatically if left blank)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'green-text-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'green-text-color' ) ),
					"validate" => "color"
				),
			array(
				"id" => $prefix."set-green",
				"type" => "inside-wrapper-close"
			),

			array(
				"type" => "heading4",
				"content" => __( 'Define blue color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"id" => "heading-to-set-blue"
			),
			array(
				"id" => $prefix."set-blue",
				"type" => "inside-wrapper-open",
				"class" => "toggle"
			),
				array(
					"type" => "color",
					"id" => $prefix."type-blue-bg-color",
					"label" => __( 'General blue color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Blue color used on special elements like buttons, message boxes, markers', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'blue-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'blue-color' ) ),
					"validate" => "color"
				),
				array(
					"type" => "color",
					"id" => $prefix."type-blue-color",
					"label" => __( 'Text on blue color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Text color on blue background (will be set automatically if left blank)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'blue-text-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'blue-text-color' ) ),
					"validate" => "color"
				),
			array(
				"id" => $prefix."set-blue",
				"type" => "inside-wrapper-close"
			),

			array(
				"type" => "heading4",
				"content" => __( 'Define orange color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"id" => "heading-to-set-orange"
			),
			array(
				"id" => $prefix."set-orange",
				"type" => "inside-wrapper-open",
				"class" => "toggle"
			),
				array(
					"type" => "color",
					"id" => $prefix."type-orange-bg-color",
					"label" => __( 'General orange color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Orange color used on special elements like buttons, message boxes, markers', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'orange-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'orange-color' ) ),
					"validate" => "color"
				),
				array(
					"type" => "color",
					"id" => $prefix."type-orange-color",
					"label" => __( 'Text on orange color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Text color on orange background (will be set automatically if left blank)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'orange-text-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'orange-text-color' ) ),
					"validate" => "color"
				),
			array(
				"id" => $prefix."set-orange",
				"type" => "inside-wrapper-close"
			),

			array(
				"type" => "heading4",
				"content" => __( 'Define red color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"id" => "heading-to-set-red"
			),
			array(
				"id" => $prefix."set-red",
				"type" => "inside-wrapper-open",
				"class" => "toggle"
			),
				array(
					"type" => "color",
					"id" => $prefix."type-red-bg-color",
					"label" => __( 'General red color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Red color used on special elements like buttons, message boxes, markers', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'red-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'red-color' ) ),
					"validate" => "color"
				),
				array(
					"type" => "color",
					"id" => $prefix."type-red-color",
					"label" => __( 'Text on red color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Text color on red background (will be set automatically if left blank)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'red-text-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'red-text-color' ) ),
					"validate" => "color"
				),
			array(
				"id" => $prefix."set-red",
				"type" => "inside-wrapper-close"
			),
		array(
			"type" => "hr"
		),

		array(
			"type" => "heading3",
			"content" => __( 'Icons', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "select",
			"id" => $prefix."icon-scheme",
			"label" => __( 'Main website icons scheme', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Depends on the color scheme used and background color set, you can choose between light and dark icon scheme (will affect message box and post formats icons)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => array(
				'light' => __( 'Light icon scheme', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'dark'  => __( 'Dark icon scheme', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				),
			"default" => "dark"
		),
		array(
			"type" => "select",
			"id" => $prefix."icon-pack",
			"label" => __( 'Custom icons packs', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Choose preferred icons pack to use with icon modules (the theme contains just a selection of icons from each pack)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => array(
				'darkglass'   => __( 'DarkGlass icons pack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'defaulticon' => __( 'DefaultIcon icons pack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'faenza'      => __( 'Faenza icons pack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'hydroxygen'  => __( 'HydroxyGen icons pack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'nuovext'     => __( 'NuoveXT icons pack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'tango'       => __( 'Tango icons pack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'woofunction' => __( 'WooFunction icons pack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
				),
			"default" => "faenza"
		),
		array(
			"type" => "hr"
		),


		//backgrounds:

			//BODY background
			array(
				"type" => "heading3",
				"content" => __( 'HTML container background', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"id" => "heading-to-set-body"
			),
			array(
				"id" => $prefix."body-bg-container",
				"type" => "inside-wrapper-open",
				"class" => "toggle"
			),
				array(
					"type" => "paragraph",
					"content" => __( 'This works only with boxed website layout. For full width layout set just Website container background.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
				),
				array(
					"type" => "color",
					"id" => $prefix."body-bg-color",
					"label" => __( 'HTML container background color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => "",
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'html-bg-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'html-bg-color' ) ),
					"validate" => "color"
				),
				array(
					"type" => "image",
					"id" => $prefix."body-bg-img-url",
					"label" => __( 'Custom background image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'To upload a new image, press the [+] button and use the Media Uploader as you would be adding an image into post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => "",
					"validate" => "url"
				),
				array(
					"type" => "select",
					"id" => $prefix."body-bg-img-position",
					"label" => __( 'Background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'50% 50%'   => __( 'Center', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 0'     => __( 'Center horizontally, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 100%'  => __( 'Center horizontally, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 0'       => __( 'Left, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 50%'     => __( 'Left, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 100%'    => __( 'Left, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 0'    => __( 'Right, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 50%'  => __( 'Right, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 100%' => __( 'Right, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						),
					"default" => '50% 0'
				),
				array(
					"type" => "select",
					"id" => $prefix."body-bg-img-repeat",
					"label" => __( 'Background image repeat', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image repeating', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'no-repeat' => __( 'Do not repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat'    => __( 'Repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-x'  => __( 'Tile horizontally', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-y'  => __( 'Tile vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'no-repeat'
				),
				array(
					"type" => "radio",
					"id" => $prefix."body-bg-img-attachment",
					"label" => __( 'Background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'scroll' => __( 'Move on scrolling', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'fixed'  => __( 'Fixed position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'scroll'
				),
				array(
					"type" => "patterns",
					"id" => $prefix."body-bg-pattern",
					"label" => __( 'Or: set background pattern', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Patterns are prioritized over background image. For transparent patterns you can also set the background color.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => wm_get_image_files(),
					"default" => "",
					"class" => " toggle-patterns",
					"preview" => true
				),
				array(
					"type" => "hrtop"
				),
			array(
				"id" => $prefix."body-bg-container",
				"type" => "inside-wrapper-close"
			),



			//website container background
			array(
				"type" => "heading3",
				"content" => __( 'Website container background', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"id" => "heading-to-set-wrap"
			),
			array(
				"id" => $prefix."wrap-bg-container",
				"type" => "inside-wrapper-open",
				"class" => "toggle"
			),
				array(
					"type" => "paragraph",
					"content" => __( 'When boxed layout used, this is the box background. Otherwise the background spreads full width of the browser window.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
				),
				array(
					"type" => "color",
					"id" => $prefix."wrap-bg-color",
					"label" => __( 'Website background color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'For automatic text color try to match this background color to dominant color on applied background image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'wrap-bg-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'wrap-bg-color' ) ),
					"validate" => "color"
				),
				array(
					"type" => "color",
					"id" => $prefix."wrap-color",
					"label" => __( 'Website text color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set this only if you need to override the automatic text color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => "",
					"validate" => "color"
				),
				array(
					"type" => "slider",
					"id" => $prefix."wrap-shadow",
					"label" => __( 'Website container shadow transparency', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the transparency of website container shadow in % (100% = opaque, 0% = fully transparent / no border)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( absint( wm_color_scheme_meta( 'default.css', 'wrap-shadow' ) ) ) : ( absint( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'wrap-shadow' ) ) ),
					"min" => 0,
					"max" => 100,
					"step" => 1,
					"validate" => "absint",
					"zero" => true
				),
				array(
					"type" => "image",
					"id" => $prefix."wrap-bg-img-url",
					"label" => __( 'Custom background image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'To upload a new image, press the [+] button and use the Media Uploader as you would be adding an image into post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => "",
					"validate" => "url"
				),
				array(
					"type" => "select",
					"id" => $prefix."wrap-bg-img-position",
					"label" => __( 'Background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'50% 50%'   => __( 'Center', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 0'     => __( 'Center horizontally, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 100%'  => __( 'Center horizontally, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 0'       => __( 'Left, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 50%'     => __( 'Left, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 100%'    => __( 'Left, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 0'    => __( 'Right, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 50%'  => __( 'Right, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 100%' => __( 'Right, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						),
					"default" => '50% 0'
				),
				array(
					"type" => "select",
					"id" => $prefix."wrap-bg-img-repeat",
					"label" => __( 'Background image repeat', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image repeating', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'no-repeat' => __( 'Do not repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat'    => __( 'Repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-x'  => __( 'Tile horizontally', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-y'  => __( 'Tile vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'no-repeat'
				),
				array(
					"type" => "radio",
					"id" => $prefix."wrap-bg-img-attachment",
					"label" => __( 'Background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'scroll' => __( 'Move on scrolling', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'fixed'  => __( 'Fixed position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'scroll'
				),
				array(
					"type" => "patterns",
					"id" => $prefix."wrap-bg-pattern",
					"label" => __( 'Or: set background pattern', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Patterns are prioritized over background image. For transparent patterns you can also set the background color.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => wm_get_image_files(),
					"default" => "",
					"class" => " toggle-patterns",
					"preview" => true
				),
				array(
					"type" => "hrtop"
				),
			array(
				"id" => $prefix."wrap-bg-container",
				"type" => "inside-wrapper-close"
			),



			//header background
			array(
				"type" => "heading3",
				"content" => __( 'Header background', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"id" => "heading-to-set-header"
			),
			array(
				"id" => $prefix."header-bg-container",
				"type" => "inside-wrapper-open",
				"class" => "toggle"
			),
				array(
					"type" => "color",
					"id" => $prefix."header-bg-color",
					"label" => __( 'Website header background color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'For automatic text color try to match this background color to dominant color on applied background image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'header-bg-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'header-bg-color' ) ),
					"validate" => "color"
				),
				array(
					"type" => "color",
					"id" => $prefix."header-color",
					"label" => __( 'Website header text color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set this only if you need to override the automatic text color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => "",
					"validate" => "color"
				),
				array(
					"type" => "image",
					"id" => $prefix."header-bg-img-url",
					"label" => __( 'Custom background image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'To upload a new image, press the [+] button and use the Media Uploader as you would be adding an image into post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => "",
					"validate" => "url"
				),
				array(
					"type" => "select",
					"id" => $prefix."header-bg-img-position",
					"label" => __( 'Background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'50% 50%'   => __( 'Center', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 0'     => __( 'Center horizontally, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 100%'  => __( 'Center horizontally, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 0'       => __( 'Left, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 50%'     => __( 'Left, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 100%'    => __( 'Left, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 0'    => __( 'Right, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 50%'  => __( 'Right, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 100%' => __( 'Right, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						),
					"default" => '50% 0'
				),
				array(
					"type" => "select",
					"id" => $prefix."header-bg-img-repeat",
					"label" => __( 'Background image repeat', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image repeating', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'no-repeat' => __( 'Do not repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat'    => __( 'Repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-x'  => __( 'Tile horizontally', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-y'  => __( 'Tile vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'no-repeat'
				),
				array(
					"type" => "radio",
					"id" => $prefix."header-bg-img-attachment",
					"label" => __( 'Background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'scroll' => __( 'Move on scrolling', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'fixed'  => __( 'Fixed position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'scroll'
				),
				array(
					"type" => "patterns",
					"id" => $prefix."header-bg-pattern",
					"label" => __( 'Or: set background pattern', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Patterns are prioritized over background image. For transparent patterns you can also set the background color.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => wm_get_image_files(),
					"default" => "",
					"class" => " toggle-patterns",
					"preview" => true
				),
				array(
					"type" => "hrtop"
				),
			array(
				"id" => $prefix."header-bg-container",
				"type" => "inside-wrapper-close"
			),



			//slider background
			array(
				"type" => "heading3",
				"content" => __( 'Slider background', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"id" => "heading-to-set-slider"
			),
			array(
				"id" => $prefix."slider-bg-container",
				"type" => "inside-wrapper-open",
				"class" => "toggle"
			),
				array(
					"type" => "color",
					"id" => $prefix."slider-bg-color",
					"label" => __( 'Slider container background color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => "",
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'slider-bg-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'slider-bg-color' ) ),
					"validate" => "color"
				),
				array(
					"type" => "image",
					"id" => $prefix."slider-bg-img-url",
					"label" => __( 'Custom background image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'To upload a new image, press the [+] button and use the Media Uploader as you would be adding an image into post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => "",
					"validate" => "url"
				),
				array(
					"type" => "select",
					"id" => $prefix."slider-bg-img-position",
					"label" => __( 'Background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'50% 50%'   => __( 'Center', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 0'     => __( 'Center horizontally, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 100%'  => __( 'Center horizontally, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 0'       => __( 'Left, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 50%'     => __( 'Left, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 100%'    => __( 'Left, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 0'    => __( 'Right, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 50%'  => __( 'Right, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 100%' => __( 'Right, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						),
					"default" => '50% 0'
				),
				array(
					"type" => "select",
					"id" => $prefix."slider-bg-img-repeat",
					"label" => __( 'Background image repeat', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image repeating', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'no-repeat' => __( 'Do not repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat'    => __( 'Repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-x'  => __( 'Tile horizontally', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-y'  => __( 'Tile vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'no-repeat'
				),
				array(
					"type" => "radio",
					"id" => $prefix."slider-bg-img-attachment",
					"label" => __( 'Background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'scroll' => __( 'Move on scrolling', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'fixed'  => __( 'Fixed position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'scroll'
				),
				array(
					"type" => "patterns",
					"id" => $prefix."slider-bg-pattern",
					"label" => __( 'Or: set background pattern', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Patterns are prioritized over background image. For transparent patterns you can also set the background color.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => wm_get_image_files(),
					"default" => "",
					"class" => " toggle-patterns",
					"preview" => true
				),
				array(
					"type" => "hrtop"
				),
			array(
				"id" => $prefix."slider-bg-container",
				"type" => "inside-wrapper-close"
			),



			//call to action background
			array(
				"type" => "heading3",
				"content" => __( 'Callout background', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"id" => "heading-to-set-cta"
			),
			array(
				"id" => $prefix."cta-bg-container",
				"type" => "inside-wrapper-open",
				"class" => "toggle"
			),
				array(
					"type" => "color",
					"id" => $prefix."cta-bg-color",
					"label" => __( 'Callout background color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'For automatic text color try to match this background color to dominant color on applied background image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'cta-bg-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'cta-bg-color' ) ),
					"validate" => "color"
				),
				array(
					"type" => "color",
					"id" => $prefix."cta-color",
					"label" => __( 'Callout text color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set this only if you need to override the automatic text color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => "",
					"validate" => "color"
				),
				array(
					"type" => "image",
					"id" => $prefix."cta-bg-img-url",
					"label" => __( 'Custom background image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'To upload a new image, press the [+] button and use the Media Uploader as you would be adding an image into post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => "",
					"validate" => "url"
				),
				array(
					"type" => "select",
					"id" => $prefix."cta-bg-img-position",
					"label" => __( 'Background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'50% 50%'   => __( 'Center', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 0'     => __( 'Center horizontally, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 100%'  => __( 'Center horizontally, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 0'       => __( 'Left, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 50%'     => __( 'Left, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 100%'    => __( 'Left, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 0'    => __( 'Right, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 50%'  => __( 'Right, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 100%' => __( 'Right, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						),
					"default" => '50% 0'
				),
				array(
					"type" => "select",
					"id" => $prefix."cta-bg-img-repeat",
					"label" => __( 'Background image repeat', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image repeating', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'no-repeat' => __( 'Do not repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat'    => __( 'Repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-x'  => __( 'Tile horizontally', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-y'  => __( 'Tile vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'no-repeat'
				),
				array(
					"type" => "radio",
					"id" => $prefix."cta-bg-img-attachment",
					"label" => __( 'Background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'scroll' => __( 'Move on scrolling', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'fixed'  => __( 'Fixed position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'scroll'
				),
				array(
					"type" => "patterns",
					"id" => $prefix."cta-bg-pattern",
					"label" => __( 'Or: set background pattern', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Patterns are prioritized over background image. For transparent patterns you can also set the background color.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => wm_get_image_files(),
					"default" => "",
					"class" => " toggle-patterns",
					"preview" => true
				),
				array(
					"type" => "hrtop"
				),
			array(
				"id" => $prefix."cta-bg-container",
				"type" => "inside-wrapper-close"
			),



			//main heading background
			array(
				"type" => "heading3",
				"content" => __( 'Main heading background', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"id" => "heading-to-set-main-heading"
			),
			array(
				"id" => $prefix."main-heading-bg-container",
				"type" => "inside-wrapper-open",
				"class" => "toggle"
			),
				array(
					"type" => "paragraph",
					"content" => __( 'These styles will be applied also on widget titles.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
				),
				array(
					"type" => "color",
					"id" => $prefix."main-heading-bg-color",
					"label" => __( 'Main heading background color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'For automatic text color try to match this background color to dominant color on applied background image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'main-heading-bg-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'main-heading-bg-color' ) ),
					"validate" => "color"
				),
				array(
					"type" => "color",
					"id" => $prefix."main-heading-color",
					"label" => __( 'Main heading text color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set this only if you need to override the automatic text color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => "",
					"validate" => "color"
				),
				array(
					"type" => "image",
					"id" => $prefix."main-heading-bg-img-url",
					"label" => __( 'Custom background image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'To upload a new image, press the [+] button and use the Media Uploader as you would be adding an image into post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => "",
					"validate" => "url"
				),
				array(
					"type" => "select",
					"id" => $prefix."main-heading-bg-img-position",
					"label" => __( 'Background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'50% 50%'   => __( 'Center', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 0'     => __( 'Center horizontally, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 100%'  => __( 'Center horizontally, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 0'       => __( 'Left, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 50%'     => __( 'Left, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 100%'    => __( 'Left, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 0'    => __( 'Right, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 50%'  => __( 'Right, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 100%' => __( 'Right, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						),
					"default" => '50% 0'
				),
				array(
					"type" => "select",
					"id" => $prefix."main-heading-bg-img-repeat",
					"label" => __( 'Background image repeat', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image repeating', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'no-repeat' => __( 'Do not repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat'    => __( 'Repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-x'  => __( 'Tile horizontally', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-y'  => __( 'Tile vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'no-repeat'
				),
				array(
					"type" => "radio",
					"id" => $prefix."main-heading-bg-img-attachment",
					"label" => __( 'Background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'scroll' => __( 'Move on scrolling', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'fixed'  => __( 'Fixed position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'scroll'
				),
				array(
					"type" => "patterns",
					"id" => $prefix."main-heading-bg-pattern",
					"label" => __( 'Or: set background pattern', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Patterns are prioritized over background image. For transparent patterns you can also set the background color.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => wm_get_image_files(),
					"default" => "",
					"class" => " toggle-patterns",
					"preview" => true
				),
				array(
					"type" => "hrtop"
				),
			array(
				"id" => $prefix."main-heading-bg-container",
				"type" => "inside-wrapper-close"
			),



			//clients background
			array(
				"type" => "heading3",
				"content" => __( 'Clients section background', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"id" => "heading-to-set-clients"
			),
			array(
				"id" => $prefix."clients-bg-container",
				"type" => "inside-wrapper-open",
				"class" => "toggle"
			),
				array(
					"type" => "color",
					"id" => $prefix."clients-bg-color",
					"label" => __( 'Clients / partners section background color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => "",
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'clients-bg-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'clients-bg-color' ) ),
					"validate" => "color"
				),
				array(
					"type" => "image",
					"id" => $prefix."clients-bg-img-url",
					"label" => __( 'Custom background image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'To upload a new image, press the [+] button and use the Media Uploader as you would be adding an image into post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => "",
					"validate" => "url"
				),
				array(
					"type" => "select",
					"id" => $prefix."clients-bg-img-position",
					"label" => __( 'Background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'50% 50%'   => __( 'Center', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 0'     => __( 'Center horizontally, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 100%'  => __( 'Center horizontally, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 0'       => __( 'Left, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 50%'     => __( 'Left, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 100%'    => __( 'Left, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 0'    => __( 'Right, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 50%'  => __( 'Right, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 100%' => __( 'Right, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						),
					"default" => '50% 0'
				),
				array(
					"type" => "select",
					"id" => $prefix."clients-bg-img-repeat",
					"label" => __( 'Background image repeat', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image repeating', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'no-repeat' => __( 'Do not repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat'    => __( 'Repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-x'  => __( 'Tile horizontally', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-y'  => __( 'Tile vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'no-repeat'
				),
				array(
					"type" => "radio",
					"id" => $prefix."clients-bg-img-attachment",
					"label" => __( 'Background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'scroll' => __( 'Move on scrolling', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'fixed'  => __( 'Fixed position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'scroll'
				),
				array(
					"type" => "patterns",
					"id" => $prefix."clients-bg-pattern",
					"label" => __( 'Or: set background pattern', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Patterns are prioritized over background image. For transparent patterns you can also set the background color.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => wm_get_image_files(),
					"default" => "",
					"class" => " toggle-patterns",
					"preview" => true
				),
				array(
					"type" => "hrtop"
				),
			array(
				"id" => $prefix."clients-bg-container",
				"type" => "inside-wrapper-close"
			),



			//footer background
			array(
				"type" => "heading3",
				"content" => __( 'Footer background', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"id" => "heading-to-set-footer"
			),
			array(
				"id" => $prefix."footer-bg-container",
				"type" => "inside-wrapper-open",
				"class" => "toggle"
			),
				array(
					"type" => "color",
					"id" => $prefix."footer-bg-color",
					"label" => __( 'Website footer background color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'For automatic text color try to match this background color to dominant color on applied background image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'footer-bg-color' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'footer-bg-color' ) ),
					"validate" => "color"
				),
				array(
					"type" => "color",
					"id" => $prefix."footer-color",
					"label" => __( 'Website footer text color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set this only if you need to override the automatic text color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => "",
					"validate" => "color"
				),
				array(
					"type" => "image",
					"id" => $prefix."footer-bg-img-url",
					"label" => __( 'Custom background image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'To upload a new image, press the [+] button and use the Media Uploader as you would be adding an image into post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"default" => "",
					"validate" => "url"
				),
				array(
					"type" => "select",
					"id" => $prefix."footer-bg-img-position",
					"label" => __( 'Background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'50% 50%'   => __( 'Center', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 0'     => __( 'Center horizontally, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'50% 100%'  => __( 'Center horizontally, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 0'       => __( 'Left, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 50%'     => __( 'Left, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'0 100%'    => __( 'Left, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 0'    => __( 'Right, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 50%'  => __( 'Right, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'100% 100%' => __( 'Right, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						),
					"default" => '50% 0'
				),
				array(
					"type" => "select",
					"id" => $prefix."footer-bg-img-repeat",
					"label" => __( 'Background image repeat', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image repeating', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'no-repeat' => __( 'Do not repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat'    => __( 'Repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-x'  => __( 'Tile horizontally', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'repeat-y'  => __( 'Tile vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'no-repeat'
				),
				array(
					"type" => "radio",
					"id" => $prefix."footer-bg-img-attachment",
					"label" => __( 'Background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Set the background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => array(
						'scroll' => __( 'Move on scrolling', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
						'fixed'  => __( 'Fixed position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
						),
					"default" => 'scroll'
				),
				array(
					"type" => "patterns",
					"id" => $prefix."footer-bg-pattern",
					"label" => __( 'Or: set background pattern', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"desc" => __( 'Patterns are prioritized over background image. For transparent patterns you can also set the background color.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"options" => wm_get_image_files(),
					"default" => "",
					"class" => " toggle-patterns",
					"preview" => true
				),
				array(
					"type" => "hrtop"
				),
			array(
				"id" => $prefix."footer-bg-container",
				"type" => "inside-wrapper-close"
			),

		array(
			"type" => "sub-section-close"
		),



	array(
		"type" => "sub-section-open",
		"sub-section-id" => "design-2",
		"title" => __( 'Branding', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "help",
			"topic" => __( 'Why my changes are not being applied?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"content" => __( 'Please note, that CSS styles are being cached (the theme sets this to 2 days interval). If your changes are not being applied, clean the browser cache first and reload the website. Or you can put WordPress into debug mode when the cache interval decreases to 30 seconds.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "heading3",
			"content" => __( 'Website logo, favicon and touch icon', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "radio",
			"id" => $prefix."logo-type",
			"label" => __( 'Logo type', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'You can use image or text logo.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => array(
				'img'  => __( 'Use image logo', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'text' => __( 'Use website title from WordPress Settings', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ).' ("'.get_bloginfo('title').'")'
				),
			"default" => "img"
		),
		array(
			"type" => "slider",
			"id" => $prefix."logo-margin",
			"label" => __( 'Logo margin', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Set the top and bottom logo margin size ("-1" sets the default logo margin)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 30,
			"min" => -1,
			"max" => 100,
			"step" => 1,
			"validate" => "absint",
			"zero" => true
		),
		array(
			"type" => "image",
			"id" => $prefix."logo-img-url",
			"label" => __( 'Custom logo image URL address', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'To upload a new image, press the [+] button and use the Media Uploader as you would be adding an image into post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => "",
			"validate" => "url"
		),
		array(
			"type" => "hr"
		),
		array(
			"type" => "image",
			"id" => $prefix."favicon-url",
			"label" => __( 'Custom favicon (16x16, .ico format) URL address', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Favicon will be displayed as bookmark icon or on browser tab or in browser address line', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => "",
			"validate" => "url"
		),
		array(
			"type" => "hr"
		),
		array(
			"type" => "image",
			"id" => $prefix."touch-icon-url",
			"label" => __( 'Custom touch icon URL address', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Touch icon will be displayed on smartphones or in Speed Dial of Opera browser', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => "",
			"validate" => "url"
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "heading3",
			"content" => __( 'WordPress admin area customization', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "image",
			"id" => $prefix."admin-logo",
			"label" => __( 'Admin page logo', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Maximum size is 20px &times; 20px. For WordPress older than version 3.3 the maximum image size is 16px &times; 16px', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => "",
			"validate" => "url"
		),
		array(
			"type" => "textarea",
			"id" => $prefix."admin-footer",
			"label" => __( 'Admin custom footer text', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Text (you can use inline HTML tags) will be inserted into Paragraph HTML tag of WordPress admin footer', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => ""
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "heading3",
			"content" => __( 'Theme admin panel branding', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "image",
			"id" => $prefix."panel-logo",
			"label" => __( 'Admin panel logo', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Sets the logo displayed above admin panel main navigation', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => "",
			"validate" => "url"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."panel-no-logo",
			"label" => __( 'Remove logo from admin panel', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'No logo will be displayed in theme admin panel', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "hrtop"
		),
	array(
		"type" => "sub-section-close"
	),



	array(
		"type" => "sub-section-open",
		"sub-section-id" => "design-3",
		"title" => __( 'Login', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "help",
			"topic" => __( 'Why my changes are not being applied?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"content" => __( 'Please note, that CSS styles are being cached (the theme sets this to 2 days interval). If your changes are not being applied, clean the browser cache first and reload the website. Or you can put WordPress into debug mode when the cache interval decreases to 30 seconds.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "heading3",
			"content" => __( 'Login page customization', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "image",
			"id" => $prefix."login-logo",
			"label" => __( 'Login logo', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'To upload a new image, press the [+] button and use the Media Uploader as you would be adding an image into post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => site_url() . "/wp-admin/images/" . $loginLogoFile,
			"validate" => "url"
		),
		array(
			"type" => "slider",
			"id" => $prefix."login-logo-height",
			"label" => __( 'Logo container height', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Set the hight of login logo container in pixels', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 100,
			"min" => 60,
			"max" => 300,
			"step" => 5,
			"validate" => "absint"
		),
		array(
			"type" => "hr"
		),
		array(
			"type" => "heading4",
			"content" => __( 'Login page background', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "color",
				"id" => $prefix."login-bg-color",
				"label" => __( 'Page background color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => "",
				"default" => "",
				"validate" => "color"
			),
			array(
				"type" => "image",
				"id" => $prefix."login-bg-img-url",
				"label" => __( 'Custom background image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'To upload a new image, press the [+] button and use the Media Uploader as you would be adding an image into post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => "",
				"validate" => "url"
			),
			array(
				"type" => "select",
				"id" => $prefix."login-bg-img-position",
				"label" => __( 'Background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Set the background image position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					'50% 50%'   => __( 'Center', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'50% 0'     => __( 'Center horizontally, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'50% 100%'  => __( 'Center horizontally, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'0 0'       => __( 'Left, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'0 50%'     => __( 'Left, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'0 100%'    => __( 'Left, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'100% 0'    => __( 'Right, top', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'100% 50%'  => __( 'Right, center vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'100% 100%' => __( 'Right, bottom', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					),
				"default" => '50% 0'
			),
			array(
				"type" => "select",
				"id" => $prefix."login-bg-img-repeat",
				"label" => __( 'Background image repeat', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Set the background image repeating', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					'no-repeat' => __( 'Do not repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'repeat'    => __( 'Repeat the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'repeat-x'  => __( 'Tile horizontally', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'repeat-y'  => __( 'Tile vertically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
					),
				"default" => 'no-repeat'
			),
			array(
				"type" => "radio",
				"id" => $prefix."login-bg-img-attachment",
				"label" => __( 'Background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Set the background image attachment', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					'scroll' => __( 'Move on scrolling', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'fixed'  => __( 'Fixed position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
					),
				"default" => 'scroll'
			),
			array(
				"type" => "patterns",
				"id" => $prefix."login-bg-pattern",
				"label" => __( 'Or: set background pattern', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Patterns are prioritized over background image. For transparent patterns you can also set the background color.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => wm_get_image_files(),
				"default" => "",
				"class" => " toggle-patterns"
				),
			array(
				"type" => "hr"
			),

		array(
			"type" => "heading4",
			"content" => __( 'Form settings', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "color",
				"id" => $prefix."login-form-bg-color",
				"label" => __( 'Form background color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Label color will be set automatically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => "",
				"validate" => "color"
			),
			array(
				"type" => "color",
				"id" => $prefix."login-form-button-bg-color",
				"label" => __( 'Submit button color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Button text color will be set automatically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => "",
				"validate" => "color"
			),
			array(
				"type" => "hr"
			),

		array(
			"type" => "heading4",
			"content" => __( 'Links below login form settings', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "color",
				"id" => $prefix."login-link-color",
				"label" => __( 'Link text color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => "",
				"default" => "",
				"validate" => "color"
			),
			array(
				"type" => "color",
				"id" => $prefix."login-link-bg-color",
				"label" => __( 'Link background color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => "",
				"default" => "",
				"validate" => "color"
			),
			array(
				"type" => "hr"
			),

		array(
			"type" => "heading4",
			"content" => __( 'Messages settings', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "color",
				"id" => $prefix."login-message-bg-color",
				"label" => __( 'Messages background color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Message text color will be set automatically', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => "",
				"validate" => "color"
			),
			array(
				"type" => "hrtop"
			),
	array(
		"type" => "sub-section-close"
	),



	array(
		"type" => "sub-section-open",
		"sub-section-id" => "design-4",
		"title" => __( 'Fonts', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "help",
			"topic" => __( 'Why my changes are not being applied?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"content" => __( 'Please note, that CSS styles are being cached (the theme sets this to 2 days interval). If your changes are not being applied, clean the browser cache first and reload the website. Or you can put WordPress into debug mode when the cache interval decreases to 30 seconds.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "heading3",
			"content" => __( 'Font families', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "textarea",
				"id" => $prefix."font-custom",
				"label" => __( 'Custom font stylesheet link (HTML)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Use embedding LINK tag for custom font (obtained from <a href="http://www.google.com/webfonts" target="_blank">Google Web Fonts</a>, for example)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => ( wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'font-embed' ) ) : ( null ),
				"cols" => 70,
				"rows" => 8,
				"class" => "code"
			),
			array(
				"type" => "text",
				"id" => $prefix."font-primary",
				"label" => __( 'Primary font stack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Enter font names hierarchically separated by commas. Provide also the most basic fallback ("sans-serif" or "serif").', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'font-primary' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'font-primary' ) ),
				"size" => "",
				"maxlength" => ""
			),
			array(
				"type" => "text",
				"id" => $prefix."font-secondary",
				"label" => __( 'Secondary font stack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Enter font names hierarchically separated by commas. Provide also the most basic fallback ("sans-serif" or "serif").', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => ( ! wm_option( 'design-color-scheme' ) || 'none' === wm_option( 'design-color-scheme' ) ) ? ( wm_color_scheme_meta( 'default.css', 'font-secondary' ) ) : ( wm_color_scheme_meta( wm_option( 'design-color-scheme' ), 'font-secondary' ) ),
				"size" => "",
				"maxlength" => ""
			),

		array(
			"type" => "hr"
		),
		array(
			"type" => "heading3",
			"content" => __( 'Basic website font', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "select",
				"id" => $prefix."font-body-stack",
				"label" => __( 'Basic website font stack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Select previously set font stack for entire website', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					"primary" => __( 'Primary font stack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"secondary" => __( 'Secondary font stack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
					),
				"default" => "primary"
			),
			array(
				"type" => "slider",
				"id" => $prefix."font-body-size",
				"label" => __( 'Basic font size', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Set the basic font size of the website (in pixels).', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => 13,
				"min" => 9,
				"max" => 18,
				"step" => 1,
				"validate" => "absint"
			),

		array(
			"type" => "hr"
		),
		array(
			"type" => "heading3",
			"content" => __( 'Heading font', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "select",
				"id" => $prefix."font-heading-stack",
				"label" => __( 'Headings font stack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Select previously set font stack for website headings', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					"primary" => __( 'Primary font stack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"secondary" => __( 'Secondary font stack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
					),
				"default" => "secondary"
			),
			array(
				"type" => "slider",
				"id" => $prefix."font-heading-size",
				"label" => __( 'Headings sizes', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Set the relative heading font size in % against the theme default sizes', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => 100,
				"min" => 50,
				"max" => 200,
				"step" => 5,
				"validate" => "absint"
			),
			array(
				"type" => "hr"
			),

		array(
			"type" => "heading3",
			"content" => __( 'Callout font', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "select",
				"id" => $prefix."font-cta-stack",
				"label" => __( 'Callout font stack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Select previously set font stack for call to action section', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					"primary" => __( 'Primary font stack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					"secondary" => __( 'Secondary font stack', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
					),
				"default" => "secondary"
			),
			array(
				"type" => "slider",
				"id" => $prefix."font-cta-size",
				"label" => __( 'Callout font size', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Set the relative call to action font size in % against the theme default sizes', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => 155,
				"min" => 50,
				"max" => 200,
				"step" => 5,
				"validate" => "absint"
			),
			array(
				"type" => "hrtop"
			),
	array(
		"type" => "sub-section-close"
	),



	array(
		"type" => "sub-section-open",
		"sub-section-id" => "design-5",
		"title" => __( 'CSS styles', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "help",
			"topic" => __( 'Why my changes are not being applied?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"content" => __( 'Please note, that CSS styles are being cached (the theme sets this to 2 days interval). If your changes are not being applied, clean the browser cache first and reload the website. Or you can put WordPress into debug mode when the cache interval decreases to 30 seconds.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "heading3",
			"content" => __( 'Other CSS settings ', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "checkbox",
				"id" => $prefix."minimize-css",
				"label" => __( 'Minimize CSS', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Compress the main CSS stylesheet file (speeds up website loading)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => "true"
			),
			array(
				"type" => "hr"
			),

			array(
				"type" => "textarea",
				"id" => $prefix."custom-css",
				"label" => __( 'Custom CSS', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Type in custom CSS styles. These styles will be added at the end of the main CSS stylesheet file.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => "",
				"cols" => 70,
				"rows" => 15,
				"class" => "code"
			),
			array(
				"type" => "hrtop"
			),
	array(
		"type" => "sub-section-close"
	),

array(
	"type" => "section-close"
)

);

?>