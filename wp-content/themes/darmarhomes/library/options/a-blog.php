<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* WebMan Options Panel - Pages section
*****************************************************
*/

$prefix = 'blog-';

array_push( $options,

array(
	"type" => "section-open",
	"section-id" => "blog",
	"title" => __( 'Blog', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
),

	array(
		"type" => "sub-tabs",
		"parent-section-id" => "blog",
		"list" => array(
			__( 'Blog', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			)
	),

	array(
		"type" => "sub-section-open",
		"sub-section-id" => "blog-1",
		"title" => __( 'Blog', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),

		array(
			"type" => "heading3",
			"content" => __( 'Blog posts list settings', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
			array(
				"type" => "slider",
				"id" => $prefix."posts-count",
				"label" => __( 'Number of posts to display', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'This will affect the number of posts listed on blog page only. Other archives will display posts according to WordPress settings (check <strong>Settings / Reading</strong>). Value of "-1" will display all posts. When you set the value of "0", WordPress settings are applied.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => get_option( 'posts_per_page' ),
				"min" => -1,
				"max" => 25,
				"step" => 1,
				"validate" => "int"
			),
		array(
			"type" => "hr"
		),

			array(
				"type" => "additems",
				"id" => $prefix."cats",
				"label" => __( 'Posts source', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'You can choose to display all posts or posts from specific categories. Press [+] button to add a category and select the category name from dropdown list.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => "0",
				"field" => "select",
				"options" => wm_categories()
			),
			array(
				"type" => "radio",
				"id" => $prefix."cats-action",
				"label" => __( 'Exclude / use categories', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Choose whether above categories should be excluded or used (does not apply on "All posts")', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					'category__in'     => __( 'Posts just from these categories', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'category__not_in' => __( 'Exclude posts from these categories', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
					),
				"default" => "category__in"
			),
		array(
			"type" => "hr"
		),

			array(
				"type" => "radio",
				"id" => $prefix."content-type",
				"label" => __( 'Excerpt or content', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Display post excerpt or content (until "More" tag) on posts list pages', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"options" => array(
					'excerpt' => __( 'Show just excerpt', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
					'content' => __( 'Show content until "More" tag', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
					),
				"default" => "excerpt"
			),
			array(
				"type" => "space"
			),
			array(
				"type" => "slider",
				"id" => $prefix."excerpt-length",
				"label" => __( 'Excerpt length', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Sets the excerpt length in words', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"default" => 40,
				"min" => 10,
				"max" => 70,
				"step" => 1,
				"validate" => "absint"
			),
		array(
			"type" => "hr"
		),


		array(
			"type" => "heading3",
			"content" => __( 'Blog entry meta information', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
			array(
				"type" => "paragraph",
				"content" => __( 'Choose the post meta information to display. By default all the information below are displayed.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."disable-featured-image",
				"label" => __( 'Disable featured image in a single post view', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Hides featured image when displaying actual post', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "space"
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."disable-author",
				"label" => __( 'Disable author name', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Hides post author', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."disable-date",
				"label" => __( 'Disable publish date', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Hides post publish date and time', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."disable-cats",
				"label" => __( 'Disable categories', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Hides post categories links', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."disable-tags",
				"label" => __( 'Disable tags', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Hides post tags list', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."disable-comments-count",
				"label" => __( 'Disable comments count', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Hides post comments count link', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."disable-format",
				"label" => __( 'Disable post format icon', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Hides post format icon', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			),
			array(
				"type" => "space"
			),
			array(
				"type" => "checkbox",
				"id" => $prefix."disable-bio",
				"label" => __( 'Disable author biography altogether', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				"desc" => __( 'Hides author information below all posts (otherwise the information is displayed, but only if author entered Biographical Info in his/her user profile). You can hide this information also on per post basis (see corresponding post settings).', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
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