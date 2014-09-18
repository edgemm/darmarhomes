<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* WebMan Options Panel - SEO section
*****************************************************
*/

$prefix = 'seo-';

array_push( $options,

array(
	"type" => "section-open",
	"section-id" => "seo",
	"title" => __( 'SEO settings', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
),

	array(
		"type" => "sub-tabs",
		"parent-section-id" => "seo",
		"list" => array(
			__( 'Basic SEO', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'Breadcrums', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			)
	),

	array(
		"type" => "sub-section-open",
		"sub-section-id" => "seo-1",
		"title" => __( 'Basic SEO', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'Website Search Engine Optimization', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
		array(
			"type" => "paragraph",
			"content" => __( 'Basic <abbr title="Search Engine Optimization">SEO</abbr> settings include global website keywords and description displayed in the HTML head section of the website. You can also set whether search engines should index archive lists or not. To improve the SEO it is recommended to set the permalink structure (in <strong>Settings / Permalinks</strong>) to "Post name".', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "textarea",
			"id" => $prefix."keywords",
			"label" => __( 'Default meta keywords', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'The theme generates meta keywords automatically depending on the page you are on (from categories and tags)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => "",
			"rows" => 3
		),
		array(
			"type" => "textarea",
			"id" => $prefix."description",
			"label" => __( 'Default meta description', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'The theme generates meta description automatically depending on the page you are on (from excerpt)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => "",
			"rows" => 3
		),
		array(
			"type" => "text",
			"id" => $prefix."meta-title-separator",
			"label" => __( 'Website meta title separator', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Empty spaces will be applied on both sides of the separator, so no need to type them in', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => "|",
			"class" => "shortest text-center",
			"size" => 3,
			"maxlength" => 3
		),
		array(
			"type" => "hr"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."indexing",
			"label" => __( 'Disable indexing archives', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Disallow search engines to index all archive pages (like category, tag, author, date, search archive)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"value" => "no"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."default-meta-title",
			"label" => __( 'Use default WordPress meta title', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Some SEO plugins meta title settings may not work with Jaguar. You can try to enable this for more compatibility.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "hr"
		),
		array(
			"type" => "help",
			"topic" => __( 'Where to put Google Analytics code?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"content" => __( 'To include Google Analytics script please use <strong>General &rarr; Tracking</strong> section of this admin panel.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "hrtop"
		),
	array(
		"type" => "sub-section-close"
	),

	array(
		"type" => "sub-section-open",
		"sub-section-id" => "seo-2",
		"title" => __( 'Breadcrumbs', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'Breadcrumbs navigation settings', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."breadcrumbs",
			"label" => __( 'Disable breadcrumbs', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Disables breadcrumbs navigation on the whole website', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "info",
			"content" => __( 'The above option will disable breadcrumbs navigation altogether. However, it is recommended to use breadcrumbs navigation as it improves SEO. Alternatively you can choose to disable breadcrumbs only on specific website sections (see the settings below) or on specific page (see the corresponding page settings).', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "space"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."breadcrumbs-archives",
			"label" => __( 'Disable breadcrumbs on archives', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Disables breadcrumbs navigation on all archive pages', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."breadcrumbs-404",
			"label" => __( 'Disable breadcrumbs on Error 404 page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Disables breadcrumbs navigation on Error 404 page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "hr"
		),
		array(
			"type" => "select",
			"id" => $prefix."breadcrumbs-portfolio-page",
			"label" => __( 'Portfolio list page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Select a portfolio list page used as base for single portfolio item page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => wm_pages(),
			"default" => ""
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