<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* WebMan Options Panel - General section
*****************************************************
*/

$prefix = 'general-';

$intallationJustDone = get_option( WM_THEME_SETTINGS . '-installed' );

array_push( $options,

array(
	"type" => "section-open",
	"section-id" => "general",
	"title" => __( 'General', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
),

	array(
		"type" => "sub-tabs",
		"parent-section-id" => "general",
		"list" => array(
			__( 'Basics', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'Custom posts', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'Widget areas', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'Tracking', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'Export / import', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			)
	),

	array(
		"type" => "sub-section-open",
		"sub-section-id" => "general-1",
		"title" => __( 'Basics', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'Footer credits', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
			array(
				"type" => "textarea",
				"id" => $prefix."credits",
				"label" => __( 'Credits (copyright) text', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Copyright text at the bottom of the website. You can use (C) to display &copy; sign, (R) for &reg;, (TM) for &trade; or YEAR for dynamic year.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => '(C) '.get_bloginfo('name'),
				"cols" => 60,
				"rows" => 3
			),
			array(
				"type" => "hr"
			),

		array(
			"type" => "heading3",
			"content" => __( 'Comments', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "checkbox",
				"id" => $prefix."page-comments",
				"label" => __( 'Disallow page comments', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Disables page comments and pingbacks only (even if global comments are enabled)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => "true"
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."post-comments",
				"label" => __( 'Disallow post comments', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Disables post comments and pingbacks only (even if global comments are enabled)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "hr"
			),

		array(
			"type" => "heading3",
			"content" => __( 'Search field', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "text",
				"id" => $prefix."search-placeholder",
				"label" => __( 'Search placeholder text', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Search input field placeholder text', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => __( 'Search term', WM_THEME_TEXTDOMAIN )
			),
			array(
				"type" => "hr"
			),

		array(
			"type" => "heading3",
			"content" => __( 'Others', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "select",
				"id" => $prefix."lightbox-img",
				"label" => __( 'Zoomed image size', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Choose what image size should be displayed when portfolio or blog featured image is zoomed', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					'full' => __( 'Full original size of the image', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'large' => __( 'Large image (can be set in Settings > Media)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					),
				"default" => "page"
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."tipsy",
				"label" => __( 'Disable Tipsy tooltips', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Disables jQuery Tipsy tooltips', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "space"
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."valid-html",
				"label" => __( 'Make valid HTML code', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Removes recommended, but invalid (according to W3C validator) meta tags from HTML head (whole Dublin core and X-UA-Compatible will be removed)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "space"
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."no-help",
				"label" => __( 'Disable theme contextual help', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Removes theme help from WordPress contextual help', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "space"
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."no-update-notifier",
				"label" => __( 'Disable theme update notifier', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'The theme is using update notifier script that checks for new theme update connecting to WebMan server. If you notice slow response of WordPress admin, please try to disable update notifier as it is possible that your server can not connect and obtain correct theme version which causes the slowdown.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "space"
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."theme-options-reset",
				"label" => __( 'Add reset button to this admin panel', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Show [RESET] button at the bottom of this admin panel. You will loose all changes by resetting the theme options!', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "space"
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."default-admin-menu",
				"label" => __( 'Do not rearrange WordPress admin menu', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Some plugins may add an item to WordPress admin menu. Check this for best compatibility with the plugins. ', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "hrtop"
			),
	array(
		"type" => "sub-section-close"
	),

	array(
		"type" => "sub-section-open",
		"sub-section-id" => "general-2",
		"title" => __( 'Custom posts', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "box",
			"content" => __( 'When setting permalinks, use URL address allowed characters only, please.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '<br /><br />' . __( 'Clients, Slides, Content Modules and Team custom posts are being redirected to homepage when visited directly. There is no need to display them individually.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),

		array(
			"type" => "heading3",
			"content" => __( 'Clients', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "select",
				"id" => $prefix."role-"."clients",
				"label" => __( 'Clients custom post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Choose how clients should be treated', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					'disable' => __( 'Disable', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'post'    => __( 'As post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'page'    => __( 'As page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					),
				"default" => "page"
			),
			array(
				"type" => "text",
				"id" => $prefix."permalink-clients",
				"label" => __( '"client" permalink', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Although Clients posts are being redirected to homepage, you might want to change this in case the permalink colides with some plugins', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => "client"
			),
		array(
			"type" => "hrtop"
		),

		array(
			"type" => "heading3",
			"content" => __( 'Content Modules', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "select",
				"id" => $prefix."role-"."modules",
				"label" => __( 'Content Modules custom post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Choose how content modules should be treated', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					'post' => __( 'As post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'page' => __( 'As page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					),
				"default" => "page"
			),
			array(
				"type" => "text",
				"id" => $prefix."permalink-modules",
				"label" => __( '"module" permalink', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Although Content Modules posts are being redirected to homepage, you might want to change this in case the permalink colides with some plugins', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => "module"
			),
		array(
			"type" => "hrtop"
		),

		array(
			"type" => "heading3",
			"content" => __( 'Portfolio', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "select",
				"id" => $prefix."role-"."portfolio",
				"label" => __( 'Portfolio custom post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Choose how the portfolio post should be treated', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					'post'    => __( 'As post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'page'    => __( 'As page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					),
				"default" => "page"
			),
			array(
				"type" => "text",
				"id" => $prefix."permalink-portfolio",
				"label" => __( '"portfolio" permalink', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Portfolio posts permalink base - you might need to change this for localization purposes', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => "portfolio"
			),
			array(
				"type" => "text",
				"id" => $prefix."permalink-portfolio-category",
				"label" => __( 'Portfolio "category" permalink', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Portfolio categories permalink base - you might need to change this for localization purposes', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => "portfolio/category"
			),
		array(
			"type" => "hrtop"
		),

		array(
			"type" => "heading3",
			"content" => __( 'Slides', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "select",
				"id" => $prefix."role-"."slides",
				"label" => __( 'Slides custom post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Choose how slides should be treated', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					'post' => __( 'As post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'page' => __( 'As page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					),
				"default" => "page"
			),
			array(
				"type" => "text",
				"id" => $prefix."permalink-slides",
				"label" => __( '"slide" permalink', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Although Slides posts are being redirected to homepage, you might want to change this in case the permalink colides with some plugins', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => "slide"
			),
		array(
			"type" => "hrtop"
		),

		array(
			"type" => "heading3",
			"content" => __( 'Team', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "select",
				"id" => $prefix."role-"."team",
				"label" => __( 'Team custom post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Choose how team custom post should be treated', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					'disable' => __( 'Disable', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'post'    => __( 'As post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'page'    => __( 'As page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					),
				"default" => "page"
			),
			array(
				"type" => "text",
				"id" => $prefix."permalink-team",
				"label" => __( '"team-member" permalink', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Although Team posts are being redirected to homepage, you might want to change this in case the permalink colides with some plugins', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => "team-member"
			),
		array(
			"type" => "hrtop"
		),
	array(
		"type" => "sub-section-close"
	),

	array(
		"type" => "sub-section-open",
		"sub-section-id" => "general-3",
		"title" => __( 'Widget areas', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'Adding a custom widget areas', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
		array(
			"type" => "info",
			"content" => __( 'In addition to predefined widget areas you can create custom ones directly from this Admin Panel, without any coding knowledge or editing theme files. To create a new widget area use the generator below.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "hr"
		),
		array(
			"type" => "additems",
			"id" => $prefix."sidebars",
			"label" => __( 'Create additional widget areas', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Press [+] button and enter the name for new widget area. If the widget area of the same name already exists, it will not be created again. To remove a custom widget area press [X] button preceding its name in the list. Note that renaming previously created widget area changes its ID and all widgets assigned to it will be lost! Do not forget to save the changes.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => __( 'Custom widget area', WM_THEME_TEXTDOMAIN_ADMIN )
		),
		array(
			"type" => "hrtop"
		),
	array(
		"type" => "sub-section-close"
	),

	array(
		"type" => "sub-section-open",
		"sub-section-id" => "general-4",
		"title" => __( 'Tracking', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'Tracking codes or custom <abbr title="JavaScript">JS</abbr> scripts', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
		array(
			"type" => "textarea",
			"id" => $prefix."custom-head",
			"label" => __( 'HTML head', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Custom scripts in HTML head. Can be used for tracking code placement. Please include a SCRIPT tag too.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => "",
			"class" => "code"
		),
		array(
			"type" => "textarea",
			"id" => $prefix."custom-footer",
			"label" => __( 'Page footer', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Custom scripts at the end of the website HTML code just before closing BODY tag. Can be used for tracking code placement. Please include a SCRIPT tag too.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => "",
			"class" => "code"
		),
		array(
			"type" => "hrtop"
		),
	array(
		"type" => "sub-section-close"
	),

	array(
		"type" => "sub-section-open",
		"sub-section-id" => "general-5",
		"title" => __( 'Export / import', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'Theme settings export / import', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
		array(
			"type" => "settingsExporter",
			"id" => "settingsExporter",
			"label-export" => __( 'Export', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc-export" => __( 'To export the current settings copy and keep (save to external file) the settings string below', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"label-import" => __( 'Import', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc-import" => __( 'To import previously saved settings, insert the settings string below. Note that by importing new settings you will loose all current ones. Always keep the backup of current settings.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
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