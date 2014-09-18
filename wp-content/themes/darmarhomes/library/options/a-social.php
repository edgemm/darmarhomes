<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* WebMan Options Panel - Social links section
*****************************************************
*/

$prefix = 'contact-';

array_push( $options,

array(
	"type" => "section-open",
	"section-id" => "contact",
	"title" => __( 'Social links', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
),

	array(
		"type" => "sub-tabs",
		"parent-section-id" => "contact",
		"list" => array(
			__( 'Social networking', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'Social sharing', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			)
	),

	array(
		"type" => "sub-section-open",
		"sub-section-id" => "contact-1",
		"title" => __( 'Social networking', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'Social networking links', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
		array(
			"type" => "additems",
			"id" => $prefix."social",
			"label" => __( 'Social networking', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Press [+] button to add new social networking link and enter the full URL into the field. The theme will automatically detect which icon to use with the link (if not recognized, link will not be displayed). For RSS feed link prepend the link with "rss:". The theme supports these social networks: deviantArt, Dribbble, Facebook, Flickr, Forrst, Google+, LinkedIn, Twitter, Vimeo and YouTube.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => ""
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."social-new-tab",
			"label" => __( 'Open in new window', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Opens social links in new browser window or tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."social-disable",
			"label" => __( 'Disable social networking links', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Social networking links will not be displayed', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		),
		array(
			"type" => "hrtop"
		),
	array(
		"type" => "sub-section-close"
	),

	array(
		"type" => "sub-section-open",
		"sub-section-id" => "contact-2",
		"title" => __( 'Social sharing', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'Social share buttons on posts and portfolio items', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."share-facebook",
			"label" => __( 'Facebook sharing', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Enable Facebook sharing button', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."share-twitter",
			"label" => __( 'Twitter sharing', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Enable Twitter sharing button', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."share-googleplus",
			"label" => __( 'Google+ sharing', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Enable Google+ sharing button', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		),
		array(
			"type" => "hr"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."share-no-portfolio",
			"label" => __( 'Disable on portfolio', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Disable share buttons on portfolio item pages', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
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