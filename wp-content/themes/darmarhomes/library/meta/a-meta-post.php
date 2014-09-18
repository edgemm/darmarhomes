<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Post meta boxes
*****************************************************
*/

/*
* Meta settings options for posts
*
* Has to be set up as function to pass the custom taxonomies array.
* Custom taxonomies are hooked onto 'init' action which is executed after the theme's functions file has been included.
* So if you're looking for taxonomy terms directly in the functions file, you're doing so before they've actually been registered.
* Meta box generator, which uses these settings options, is hooked onto 'add_meta_boxes' which is executed after 'init' action.
*/
if ( ! function_exists( 'wm_meta_post_options' ) ) {
	function wm_meta_post_options( $slidesTaxonomy = null ) {
		global $sidebarPosition;
		$prefix = '';

		$metaPostOptions = array(

			//General settings
			array(
				"type" => "section-open",
				"section-id" => "general-section",
				"title" => __( 'General', WM_THEME_TEXTDOMAIN_ADMIN )
			)
		);

		if ( is_active_sidebar( 'top-bar-widgets' ) )
			array_push( $metaPostOptions,
				array(
					"type" => "checkbox",
					"id" => $prefix."no-top-bar",
					"label" => __( 'Disable top bar', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Disables top bar widget area on this page', WM_THEME_TEXTDOMAIN_ADMIN ),
					"value" => "true"
				)
			);

		if ( ! wm_option( 'seo-breadcrumbs' ) )
			array_push( $metaPostOptions,
				array(
					"type" => "checkbox",
					"id" => $prefix."breadcrumbs",
					"label" => __( 'Disable breadcrumbs', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Disables breadcrumbs navigation on this page', WM_THEME_TEXTDOMAIN_ADMIN ),
					"value" => "true"
				)
			);

		if ( ! wm_option( 'blog-disable-bio' ) )
			array_push( $metaPostOptions,
				array(
					"type" => "checkbox",
					"id" => $prefix."author",
					"label" => __( 'Disable author details', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Disables author information below the post content', WM_THEME_TEXTDOMAIN_ADMIN ),
					"value" => "true"
				)
			);

		if ( is_active_sidebar( 'top-bar-widgets' ) || ! wm_option( 'seo-breadcrumbs' ) || ! wm_option( 'blog-disable-bio' ) )
			array_push( $metaPostOptions,
				array(
					"type" => "hr"
				)
			);

		array_push( $metaPostOptions,
					array(
						"type" => "checkbox",
						"id" => $prefix."no-heading",
						"label" => __( 'Disable main heading', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'Hides post main heading - the title', WM_THEME_TEXTDOMAIN_ADMIN ),
						"value" => "true"
					),
					array(
						"type" => "space"
					),
					array(
						"type" => "textarea",
						"id" => $prefix."subheading",
						"label" => __( 'Post subtitle', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'If defined, the specially styled subtitle will be displayed', WM_THEME_TEXTDOMAIN_ADMIN ),
						"default" => "",
						"rows" => 3
					),
				array(
					"type" => "section-close"
				),



				//Gallery settings
				array(
					"type" => "section-open",
					"section-id" => "gallery-section",
					"title" => __( 'Gallery', WM_THEME_TEXTDOMAIN_ADMIN ),
					"exclude" => array( 'blog-page', 'pagetpl-contact.php', 'pagetpl-portfolio.php', 'pagetpl-sitemap.php', 'pagetpl-widgetized.php' )
				),
					array(
						"type" => "patterns",
						"id" => $prefix."gallery-images",
						"label" => __( 'Exclude gallery images', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'Exclude images from image gallery shortcode used in the post content', WM_THEME_TEXTDOMAIN_ADMIN ),
						"options" => wm_get_post_images(),
						"field" => "checkbox",
						"default" => ""
					),
					array(
						"type" => "space"
					),
					array(
						"type" => "checkbox",
						"id" => $prefix."gallery",
						"label" => __( 'Display excluded images below the post', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'Displays these excluded images in a new gallery below the post content', WM_THEME_TEXTDOMAIN_ADMIN ),
						"value" => "true"
					),
					array(
						"type" => "space"
					),
					array(
						"type" => "slider",
						"id" => $prefix."gallery-columns",
						"label" => __( 'Gallery columns', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'Set the number of columns for the gallery below the post content', WM_THEME_TEXTDOMAIN_ADMIN ),
						"default" => 3,
						"min" => 3,
						"max" => 6,
						"step" => 1,
						"validate" => "absint"
					),
				array(
					"type" => "section-close"
				),



				//Sidebar settings
				array(
					"type" => "section-open",
					"section-id" => "sidebar-section",
					"title" => __( 'Sidebar', WM_THEME_TEXTDOMAIN_ADMIN )
				),
					array(
						"type" => "select",
						"id" => $prefix."sidebar",
						"label" => __( 'Choose a sidebar', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'Select a widget area used as a sidebar for this page (if not set, the dafault theme settings will apply)', WM_THEME_TEXTDOMAIN_ADMIN ),
						"options" => wm_widget_areas(),
						"default" => ""
					),
					array(
						"type" => "layouts",
						"id" => $prefix."layout",
						"label" => __( 'Sidebar position', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'Choose a sidebar position on the page (set the first one to use the theme default settings)', WM_THEME_TEXTDOMAIN_ADMIN ),
						"options" => $sidebarPosition,
						"default" => ""
					),
				array(
					"type" => "section-close"
				)

			);

		return $metaPostOptions;
	}
} // /wm_meta_post_options

?>