<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* WebMan Options Panel - Callout (call to action) section
*****************************************************
*/

$prefix = 'cta-';

array_push( $options,

array(
	"type" => "section-open",
	"section-id" => "cta",
	"title" => __( 'Callout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
),

	array(
		"type" => "sub-tabs",
		"parent-section-id" => "cta",
		"list" => array(
			__( 'Global callout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			)
	),

	array(
		"type" => "sub-section-open",
		"sub-section-id" => "cta-1",
		"title" => __( 'Callout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'Callout area settings', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
		array(
			"type" => "paragraph",
			"content" => __( 'Below are global callout options. They can be overridden when you set callout for a specific page.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."enable",
			"label" => __( 'Enable callout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Enables callout area on home page (for other website sections check the settings below)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."enable-override",
			"label" => __( 'Enable callout overriding on pages', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Adds page settings to override default callout texts and button', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."btn-disable",
			"label" => __( 'Disable button only', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Removes button from callout area', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "textarea",
			"id" => $prefix."text",
			"label" => __( 'Text', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Callout text', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => "",
			"cols" => 57,
			"rows" => 5
		),
		array(
			"type" => "text",
			"id" => $prefix."btn-text",
			"label" => __( 'Button text', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Callout button text', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => ""
		),
		array(
			"type" => "text",
			"id" => $prefix."btn-url",
			"label" => __( 'Button link', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Callout button URL link', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => ""
		),
		array(
			"type" => "select",
			"id" => $prefix."btn-type",
			"label" => __( 'Button color', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Choose what type of button is displayed', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => array(
				''            => __( 'Link color button (default)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'type-gray'   => __( 'Gray button', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'type-green'  => __( 'Green button', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'type-blue'   => __( 'Blue button', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'type-orange' => __( 'Orange button', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'type-red'    => __( 'Red button', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				),
			"default" => ""
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "checkbox",
			"id" => $prefix."pages",
			"label" => __( 'On pages', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'By default, callout is only enabled on homepage. This will show it also on pages and subpages.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."posts",
			"label" => __( 'On posts', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'By default, callout is only enabled on homepage. This will show it also on posts.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."portfolio",
			"label" => __( 'On portfolio items', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'By default, callout is only enabled on homepage. This will show it also on portfolio items.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."archives",
			"label" => __( 'On archives', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'By default, callout is only enabled on homepage. This will show it also on archives.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
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