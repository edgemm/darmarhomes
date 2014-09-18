<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* WebMan Options Panel - Layout section
*****************************************************
*/

$prefix = 'layout-';

array_push( $options,

array(
	"type" => "section-open",
	"section-id" => "layout",
	"title" => __( 'Layout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
),

	array(
		"type" => "sub-tabs",
		"parent-section-id" => "layout",
		"list" => array(
			__( 'Layout settings', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'Website sections', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			)
	),



	array(
		"type" => "sub-section-open",
		"sub-section-id" => "layout-1",
		"title" => __( 'Layout settings', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),

		array(
			"type" => "heading3",
			"content" => __( 'Main website layout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
		array(
			"type" => "layouts",
			"id" => $prefix."boxed",
			"label" => __( 'Website layout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Choose the website layout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => $websiteLayout,
			"default" => "boxed"
		),
		array(
			"type" => "slider",
			"id" => $prefix."boxed-padding",
			"label" => __( 'Box padding', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Set the box padding size when boxed website layout used', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 60,
			"min" => 30,
			"max" => 120,
			"step" => 5,
			"validate" => "absint"
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "heading3",
			"content" => __( 'Portfolio list layout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "radio",
			"id" => $prefix."portfolio-description-content",
			"label" => __( 'Portfolio description', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Choose what type of portfolio item description to use when displaying portfolio items in single column view', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => array(
				'' => __( 'Item description text', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'attributes' => __( 'Item attributes', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				),
			"default" => ""
		),
		array(
			"type" => "layouts",
			"id" => $prefix."portfolio",
			"label" => __( 'Portfolio list layout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Choose, how the portfolio archives will be displayed', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => array_slice( $portfolioLayout, -4 ),
			"default" => "columns-4"
		),
		array(
			"type" => "select",
			"id" => $prefix."portfolio-sidebar",
			"label" => __( 'Sidebar on portfolio category page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Select a widget area used as a sidebar displayed on portfolio category page (if not set no sidebar is displayed)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => wm_widget_areas(),
			"default" => ""
		),
		array(
			"type" => "layouts",
			"id" => $prefix."portfolio-sidebar-position",
			"label" => __( 'Sidebar on portfolio category page position', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Choose a sidebar position on portfolio category page (set the first one to use the theme default settings - no sidebar)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => $sidebarPosition,
			"default" => ""
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "heading3",
			"content" => __( 'Portfolio details layout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "layouts",
				"id" => $prefix."portfolio-single",
				"label" => __( 'Portfolio single item layout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Choose, how the portfolio item detail page will be displayed', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => $portfolioSingleLayout,
				"default" => "left"
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."related-portfolio",
				"label" => __( 'Disable related items', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Hides related portfolio items displayed on portfolio item detail page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
		array(
			"type" => "hrtop"
		),

	array(
		"type" => "sub-section-close"
	),



	array(
		"type" => "sub-section-open",
		"sub-section-id" => "layout-2",
		"title" => __( 'Website sections', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),

		array(
			"type" => "heading3",
			"content" => __( 'Top bar', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
			array(
				"type" => "checkbox",
				"id" => $prefix."top-bar-fixed",
				"label" => __( 'Sticky top bar', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Sticks the top bar to the top of the browser window even when scrolling', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."top-bar-boxed",
				"label" => __( 'Boxed top bar', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Place top bar inside website container box', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "hr"
			),

		array(
			"type" => "heading3",
			"content" => __( 'Website header', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
			array(
				"type" => "select",
				"id" => $prefix."status",
				"label" => __( 'Status area', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Status posts are being displayed in the right side of the website header. Choose how this area should be treated.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					'none' => __( 'Display nothing', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'status' => __( 'Display status posts', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'widgets' => __( 'Display "Header Right" widget area', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					),
				"default" => 'status'
			),
			array(
				"type" => "slider",
				"id" => $prefix."status-margin",
				"label" => __( 'Status area margin', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Set the top margin size for status posts area in header ("-1" sets default theme margin)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => 50,
				"min" => -1,
				"max" => 100,
				"step" => 1,
				"validate" => "int",
				"zero" => true
			),
			array(
				"type" => "text",
				"id" => $prefix."menu-special-title",
				"label" => __( 'Special menu area title', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Enter the toggle button title of the special menu area (do not forget to assign widgets to "Special Menu Area" widget area)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => __( 'Contact', WM_THEME_TEXTDOMAIN )
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."menu-special",
				"label" => __( 'Disable special menu area', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Removes special menu area from website main menu area', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "hr"
			),

		array(
			"type" => "heading3",
			"content" => __( 'Main heading, slider and callout order', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "select",
				"id" => $prefix."chs-positions",
				"label" => __( 'Website content header sections', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Please choose the order of displaying the Callout, Main Heading and Slider sections', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					'c-h-s' => __( 'Callout | Heading | Slider', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'c-s-h' => __( 'Callout | Slider | Heading', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),

					'h-c-s' => __( 'Heading | Callout | Slider', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'h-s-c' => __( 'Heading | Slider | Callout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),

					's-c-h' => __( 'Slider | Callout | Heading', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					's-h-c' => __( 'Slider | Heading | Callout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					),
				"default" => WM_HEADER_SECTIONS_POSITIONS
			),
			array(
				"type" => "hr"
			),

		array(
			"type" => "heading3",
			"content" => __( 'Clients list', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "text",
			"id" => $prefix."clients-title",
			"label" => __( 'Clients section title', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Enter the title for clients (or partners) list section', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."clients",
			"label" => __( 'Disable clients section on the whole website', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'By default, clients list is displayed on homepage, pages, portfolio list and portfolio item detail pages', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "space"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."clients-home",
			"label" => __( 'No clients on homepage', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Disable clients on homepage', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."clients-subpages",
			"label" => __( 'No clients on pages', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Disable clients on pages', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."clients-portfolio",
			"label" => __( 'No clients on portfolio page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Disable clients on portfolio items list page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."clients-portfolio-detail",
			"label" => __( 'No clients on portfolio item page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Disable clients on portfolio item details page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
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