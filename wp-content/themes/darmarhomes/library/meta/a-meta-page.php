<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Page meta boxes
*****************************************************
*/

/*
* Meta settings options for pages
*
* Has to be set up as function to pass the custom taxonomies array.
* Custom taxonomies are hooked onto 'init' action which is executed after the theme's functions file has been included.
* So if you're looking for taxonomy terms directly in the functions file, you're doing so before they've actually been registered.
* Meta box generator, which uses these settings options, is hooked onto 'add_meta_boxes' which is executed after 'init' action.
*/
if ( ! function_exists( 'wm_meta_page_options' ) ) {
	function wm_meta_page_options( $slidesTaxonomy = null ) {
		global $post_id, $portfolioLayout, $sidebarPosition;
		$prefix   = '';
		$prefixBg = 'background-';

		//Other page settings
		$metaPageOptions = array(

			//Contact settings
			array(
				"type" => "section-open",
				"section-id" => "contact-section",
				"title" => __( 'Contact', WM_THEME_TEXTDOMAIN_ADMIN ),
				"exclude" => array( '', 'default', 'blog-page', 'pagetpl-about.php', 'pagetpl-portfolio.php', 'pagetpl-sitemap.php', 'pagetpl-widgetized.php' )
			),
				array(
					"type" => "text",
					"id" => $prefix."contact-map-url",
					"label" => __( 'Map URL', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Map link obtained from Google Maps (or leave blank and map will set the location on the address below)', WM_THEME_TEXTDOMAIN_ADMIN ),
					"validate" => "url"
				),
				array(
					"type" => "slider",
					"id" => $prefix."contact-map-zoom",
					"label" => __( 'Map zoom', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Map zoom on location', WM_THEME_TEXTDOMAIN_ADMIN ),
					"default" => 10,
					"min" => 5,
					"max" => 19,
					"step" => 1,
					"validate" => "absint"
				),
				array(
					"type" => "hr"
				),
				array(
					"type" => "heading4",
					"content" => __( 'Address', WM_THEME_TEXTDOMAIN_ADMIN )
					),
				array(
					"type" => "paragraph",
					"content" => __( 'The address will be displayed on the page and also used as map location (if no map URL set).', WM_THEME_TEXTDOMAIN_ADMIN )
					),
				array(
					"type" => "text",
					"id" => $prefix."contact-name",
					"label" => __( 'Name', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Your name or the name of your company', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "text",
					"id" => $prefix."contact-address1",
					"label" => __( 'Address line 1', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'First address line', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "text",
					"id" => $prefix."contact-address2",
					"label" => __( 'Address line 2', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Second address line', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "text",
					"id" => $prefix."contact-city",
					"label" => __( 'City', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Enter city or town name here', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "text",
					"id" => $prefix."contact-code",
					"label" => __( 'Postal code', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Enter the postal code here', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "text",
					"id" => $prefix."contact-country",
					"label" => __( 'Country', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Enter country / state here', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "text",
					"id" => $prefix."contact-email",
					"label" => __( 'Email', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Enter email address here (JavaScript antispam filter will be applied on the address)', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "textarea",
					"id" => $prefix."contact-phone",
					"label" => __( 'Phones', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Enter phone numbers here', WM_THEME_TEXTDOMAIN_ADMIN ),
					"default" => "",
					"rows" => 3
				),
			array(
				"type" => "section-close"
			),



			//Portfolio settings
			array(
				"type" => "section-open",
				"section-id" => "portfolio-section",
				"title" => __( 'Portfolio', WM_THEME_TEXTDOMAIN_ADMIN ),
				"exclude" => array( '', 'default', 'blog-page', 'pagetpl-about.php', 'pagetpl-contact.php', 'pagetpl-sitemap.php', 'pagetpl-widgetized.php' )
			),
				array(
					"type" => "text",
					"id" => $prefix."portfolio-title",
					"label" => __( 'Portfolio list title', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Set the title text for portfolio items list section on the page', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "select",
					"id" => $prefix."portfolio-cat",
					"label" => __( 'Portfolio main category', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Select whether to display all portfolio items or just those from specific main category (only first level categories can be chosen)', WM_THEME_TEXTDOMAIN_ADMIN ),
					"options" => wm_portfolio_categories( 'no-empty' ),
					"default" => "0"
				),
				array(
					"type" => "select",
					"id" => $prefix."portfolio-ordering",
					"label" => __( 'Portfolio order', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Choose how portfolio items are being displayed', WM_THEME_TEXTDOMAIN_ADMIN ),
					"options" => array(
						''       => __( 'Newest first', WM_THEME_TEXTDOMAIN_ADMIN ),
						'oldest' => __( 'Oldest first', WM_THEME_TEXTDOMAIN_ADMIN ),
						'name'   => __( 'Alphabetically', WM_THEME_TEXTDOMAIN_ADMIN ),
						'random' => __( 'Random ordering', WM_THEME_TEXTDOMAIN_ADMIN )
						)
				),
				array(
					"type" => "checkbox",
					"id" => $prefix."portfolio-filterable",
					"label" => __( 'Filterable list', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Enable filterable portfolio items. Note that all portfolio items (from the category if set previously) will be listed on the page with no pagination applied.', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "checkbox",
					"id" => $prefix."portfolio-show-filter",
					"label" => __( 'Do not hide filter categories', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Filter categories are being displayed all the time', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "space"
				),
				array(
					"type" => "slider",
					"id" => $prefix."portfolio-count",
					"label" => __( 'Number of portfolio items', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'This will affect the number of portfolio items listed on the page. Set "-1" to display all items, set "0" to use default WordPress settings.', WM_THEME_TEXTDOMAIN_ADMIN ),
					"default" => get_option( 'posts_per_page' ),
					"min" => -1,
					"max" => 32,
					"step" => 1,
					"validate" => "int"
				),
				array(
					"type" => "layouts",
					"id" => $prefix."portfolio-layout",
					"label" => __( 'Portfolio layout', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Choose, how the portfolio list will be displayed', WM_THEME_TEXTDOMAIN_ADMIN ),
					"options" => $portfolioLayout,
					"default" => ""
				),
				array(
					"type" => "hr"
				),
				array(
					"type" => "checkbox",
					"id" => $prefix."portfolio-no-catlist",
					"label" => __( 'Disable portfolio categories', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'You can hide portfolio list categories for non-filterable list', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "checkbox",
					"id" => $prefix."portfolio-no-pagination",
					"label" => __( 'Disable portfolio pagination', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'You can hide pagination for non-filterable portfolio list (like for example pagination makes little sense on random portfolio list)', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "hr"
				),
				array(
					"type" => "select",
					"id" => $prefix."portfolio-widget-area",
					"label" => __( 'Widget area below portfolio', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'If set, displays a widget area below the portfolio items list', WM_THEME_TEXTDOMAIN_ADMIN ),
					"options" => wm_widget_areas(),
					"default" => ""
				),
			array(
				"type" => "section-close"
			),



			//Widget Areas section
			array(
				"type" => "section-open",
				"section-id" => "widgetized-section",
				"title" => __( 'Widget Areas', WM_THEME_TEXTDOMAIN_ADMIN ),
				"exclude" => array( '', 'default', 'blog-page', 'pagetpl-about.php', 'pagetpl-contact.php', 'pagetpl-portfolio.php', 'pagetpl-sitemap.php' ) // '' is page template value when creating new page
			),
				array(
					"type" => "additems",
					"id" => $prefix."widget-areas",
					"label" => __( 'Add widget areas displayed on this page', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Press [+] button to add a new widget area and select the area from dropdown list', WM_THEME_TEXTDOMAIN_ADMIN ),
					"default" => "",
					"field" => "select",
					"options" => wm_widget_areas()
				),
			array(
				"type" => "section-close"
			),



			//General settings
			array(
				"type" => "section-open",
				"section-id" => "general-section",
				"title" => __( 'General', WM_THEME_TEXTDOMAIN_ADMIN ),
				"exclude" => array()
			)
		);

		if ( is_active_sidebar( 'top-bar-widgets' ) )
			array_push( $metaPageOptions,
				array(
					"type" => "checkbox",
					"id" => $prefix."no-top-bar",
					"label" => __( 'Disable top bar', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Disables top bar widget area on this page', WM_THEME_TEXTDOMAIN_ADMIN ),
					"value" => "true"
				)
			);

		if ( ! wm_option( 'seo-breadcrumbs' ) )
			array_push( $metaPageOptions,
				array(
					"type" => "checkbox",
					"id" => $prefix."breadcrumbs",
					"label" => __( 'Disable breadcrumbs', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Disables breadcrumbs navigation on this page', WM_THEME_TEXTDOMAIN_ADMIN ),
					"value" => "true"
				)
			);

		if ( is_active_sidebar( 'top-bar-widgets' ) || ! wm_option( 'seo-breadcrumbs' ) )
			array_push( $metaPageOptions,
				array(
					"type" => "hr"
				)
			);

		array_push( $metaPageOptions,
				array(
					"type" => "checkbox",
					"id" => $prefix."no-heading",
					"label" => __( 'Disable main heading', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Hides page main heading - the title', WM_THEME_TEXTDOMAIN_ADMIN ),
					"value" => "true"
				),
				array(
					"type" => "space"
				),
				array(
					"type" => "textarea",
					"id" => $prefix."subheading",
					"label" => __( 'Page subtitle', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'If defined, the specially styled subtitle will be displayed', WM_THEME_TEXTDOMAIN_ADMIN ),
					"default" => "",
					"rows" => 3
				),
			array(
				"type" => "section-close"
			),



			//Slider settings
			array(
				"type" => "section-open",
				"section-id" => "slider-section",
				"title" => __( 'Slider', WM_THEME_TEXTDOMAIN_ADMIN ),
				"exclude" => array()
			),
				array(
					"type" => "select",
					"id" => $prefix."slider-type",
					"label" => __( 'Enable slider', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Select a slider type from the dropdown list below', WM_THEME_TEXTDOMAIN_ADMIN ),
					"options" => array(
						'none'       => __( '- no slider -', WM_THEME_TEXTDOMAIN_ADMIN ),
						'simple'     => __( 'Simple Slider', WM_THEME_TEXTDOMAIN_ADMIN ),
						'roundabout' => __( 'Roundabout Slider', WM_THEME_TEXTDOMAIN_ADMIN ),
						'nivo'       => __( 'Nivo Slider', WM_THEME_TEXTDOMAIN_ADMIN ),
						'kwicks'     => __( 'Kwicks Accordion', WM_THEME_TEXTDOMAIN_ADMIN ),
						'video'      => __( 'Video', WM_THEME_TEXTDOMAIN_ADMIN ),
						'static'     => __( 'Static featured image', WM_THEME_TEXTDOMAIN_ADMIN ),
						),
					"default" => "none"
				),

					array(
						"id" => $prefix."slider-settings",
						"type" => "inside-wrapper-open"
					),

						array(
							"conditional" => array(
								"field" => $prefix."slider-type",
								"value" => "static"
								),
							"type" => "text",
							"id" => $prefix."slider-url",
							"label" => __( 'Static featured image custom link', WM_THEME_TEXTDOMAIN_ADMIN ),
							"desc" => __( 'Enter a slider more link when static featured image is used', WM_THEME_TEXTDOMAIN_ADMIN ),
							"default" => "",
							"size" => "",
							"maxlength" => "",
							"validate" => "url"
						),

						array(
							"conditional" => array(
								"field" => $prefix."slider-type",
								"value" => "video"
								),
							"type" => "text",
							"id" => $prefix."slider-video-url",
							"label" => __( 'Video URL', WM_THEME_TEXTDOMAIN_ADMIN ),
							"desc" => __( 'Enter full video URL (check the <a href="http://codex.wordpress.org/Embeds#Can_I_Use_Any_URL_With_This.3F" target="_blank">list of supported video portals</a>)', WM_THEME_TEXTDOMAIN_ADMIN ),
							"default" => "",
							"size" => "",
							"maxlength" => "",
							"validate" => "url"
						),

						array(
							"id" => $prefix."slider-settings-content",
							"type" => "inside-wrapper-open"
						),

							array(
								"conditional" => array(
									"field" => $prefix."slider-type",
									"value" => "roundabout"
									),
								"type" => "slider",
								"id" => $prefix."slider-roundabout-width",
								"label" => __( 'Slider width', WM_THEME_TEXTDOMAIN_ADMIN ),
								"desc" => __( 'Adjust Roundabout slider width', WM_THEME_TEXTDOMAIN_ADMIN ),
								"default" => 0,
								"min" => -200,
								"max" => 200,
								"step" => 1,
								"validate" => "int",
								"zero" => true
							),
							array(
								"type" => "slider",
								"id" => $prefix."slider-count",
								"label" => __( 'Number of slides', WM_THEME_TEXTDOMAIN_ADMIN ),
								"desc" => __( 'Maximum number of slides (items) to be displayed in the slider', WM_THEME_TEXTDOMAIN_ADMIN ),
								"default" => 3,
								"min" => 1,
								"max" => ( wm_option( 'slider-max-number' ) ) ? ( wm_option( 'slider-max-number' ) ) : ( 8 ),
								"step" => 1,
								"validate" => "absint"
							),
							array(
								"type" => "select",
								"id" => $prefix."slider-content",
								"label" => __( 'Slider content', WM_THEME_TEXTDOMAIN_ADMIN ),
								"desc" => __( 'Choose which content type will populate the slider', WM_THEME_TEXTDOMAIN_ADMIN ),
								"options" => array(
									'wm_slides' => __( 'Slides custom posts', WM_THEME_TEXTDOMAIN_ADMIN ),
									'gallery'   => __( 'Page image gallery', WM_THEME_TEXTDOMAIN_ADMIN )
									),
								"default" => "wm_slides"
							),
								array(
									"conditional" => array(
										"field" => $prefix."slider-content",
										"value" => "wm_slides"
										),
									"type" => "select",
									"id" => $prefix."slider-slides-cat",
									"label" => __( 'Slides category', WM_THEME_TEXTDOMAIN_ADMIN ),
									"desc" => __( 'Choose which slides category items will populate the slider', WM_THEME_TEXTDOMAIN_ADMIN ),
									"options" => $slidesTaxonomy,
									"default" => 0
								),
								array(
									"conditional" => array(
										"field" => $prefix."slider-content",
										"value" => "gallery"
										),
									"type" => "patterns",
									"id" => $prefix."slider-gallery-images",
									"label" => __( 'Choose slider images', WM_THEME_TEXTDOMAIN_ADMIN ),
									"desc" => __( 'Select which images will be displayed in the slider (you may need to save/publish/update the post to see the images)', WM_THEME_TEXTDOMAIN_ADMIN ),
									"options" => wm_get_post_images(),
									"field" => "checkbox",
									"default" => ""
								),

						array(
							"conditional" => array(
								"field" => $prefix."slider-type",
								"value" => "roundabout,nivo,kwicks,simple"
								),
							"id" => $prefix."slider-settings-content",
							"type" => "inside-wrapper-close"
						),

						array(
							"conditional" => array(
								"field" => $prefix."slider-type",
								"value" => "kwicks,nivo,roundabout,static,video,simple"
								),
							"type" => "select",
							"id" => $prefix."slider-image",
							"label" => __( 'Slider image size', WM_THEME_TEXTDOMAIN_ADMIN ),
							"desc" => __( 'Choose which image size should be used in slider', WM_THEME_TEXTDOMAIN_ADMIN ),
							"options" => array(
								'slide' => __( 'Default slider images', WM_THEME_TEXTDOMAIN_ADMIN ),
								'full'   => __( 'Full size images', WM_THEME_TEXTDOMAIN_ADMIN )
								),
							"default" => "slide"
						),

				array(
					"conditional" => array(
						"field" => $prefix."slider-type",
						"value" => "roundabout,nivo,kwicks,static,video,simple"
						),
					"id" => $prefix."slider-settings",
					"type" => "inside-wrapper-close"
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
					"desc" => __( 'Exclude images from image gallery shortcode used in the page content', WM_THEME_TEXTDOMAIN_ADMIN ),
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
					"label" => __( 'Display excluded images below the page', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Displays these excluded images in a new gallery below the page content', WM_THEME_TEXTDOMAIN_ADMIN ),
					"value" => "true"
				),
				array(
					"type" => "space"
				),
				array(
					"type" => "slider",
					"id" => $prefix."gallery-columns",
					"label" => __( 'Gallery columns', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Set the number of columns for the gallery below the page content', WM_THEME_TEXTDOMAIN_ADMIN ),
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
				"title" => __( 'Sidebar', WM_THEME_TEXTDOMAIN_ADMIN ),
				"exclude" => array( 'pagetpl-sitemap.php', 'pagetpl-widgetized.php' )
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

		if ( wm_option( 'cta-enable' ) && wm_option( 'cta-enable-override' ) )
			array_push( $metaPageOptions,

				//Call to action settings
				array(
					"type" => "section-open",
					"section-id" => "cta-section",
					"title" => __( 'Callout', WM_THEME_TEXTDOMAIN_ADMIN ),
					"exclude" => array()
				),
					array(
						"type" => "textarea",
						"id" => $prefix."cta-text",
						"label" => __( 'Text', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'Callout text (required for callout to be displayed)', WM_THEME_TEXTDOMAIN_ADMIN ),
						"default" => "",
						"cols" => 57,
						"rows" => 5
					),
					array(
						"type" => "text",
						"id" => $prefix."cta-btn-text",
						"label" => __( 'Button text', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'Callout button text (required for button to be displayed)', WM_THEME_TEXTDOMAIN_ADMIN ),
						"default" => ""
					),
					array(
						"type" => "text",
						"id" => $prefix."cta-btn-url",
						"label" => __( 'Button link', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'Callout button URL link', WM_THEME_TEXTDOMAIN_ADMIN ),
						"default" => ""
					),
					array(
						"type" => "select",
						"id" => $prefix."cta-btn-type",
						"label" => __( 'Button color', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'Choose what type of button is displayed', WM_THEME_TEXTDOMAIN_ADMIN ),
						"options" => array(
							''            => __( 'Link color button (default)', WM_THEME_TEXTDOMAIN_ADMIN ),
							'type-gray'   => __( 'Gray button', WM_THEME_TEXTDOMAIN_ADMIN ),
							'type-green'  => __( 'Green button', WM_THEME_TEXTDOMAIN_ADMIN ),
							'type-blue'   => __( 'Blue button', WM_THEME_TEXTDOMAIN_ADMIN ),
							'type-orange' => __( 'Orange button', WM_THEME_TEXTDOMAIN_ADMIN ),
							'type-red'    => __( 'Red button', WM_THEME_TEXTDOMAIN_ADMIN ),
							),
						"default" => ""
					),
				array(
					"type" => "section-close"
				)

			);

		if ( 'boxed' === wm_option( 'layout-boxed' ) )
			array_push( $metaPageOptions,

				//Design - website background settings
				array(
					"type" => "section-open",
					"section-id" => "design",
					"title" => __( 'Design', WM_THEME_TEXTDOMAIN_ADMIN ),
					"exclude" => array()
				),
					array(
						"type" => "image",
						"id" => $prefixBg."bg-img-url",
						"label" => __( 'Custom background image', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'To upload a new image, press the [+] button and use the Media Uploader as you would be adding an image into post', WM_THEME_TEXTDOMAIN_ADMIN ),
						"default" => "",
						"validate" => "url"
					),
					array(
						"type" => "select",
						"id" => $prefixBg."bg-img-position",
						"label" => __( 'Background image position', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'Set background image position', WM_THEME_TEXTDOMAIN_ADMIN ),
						"options" => array(
							'50% 50%'   => __( 'Center', WM_THEME_TEXTDOMAIN_ADMIN ),
							'50% 0'     => __( 'Center horizontally, top', WM_THEME_TEXTDOMAIN_ADMIN ),
							'50% 100%'  => __( 'Center horizontally, bottom', WM_THEME_TEXTDOMAIN_ADMIN ),
							'0 0'       => __( 'Left, top', WM_THEME_TEXTDOMAIN_ADMIN ),
							'0 50%'     => __( 'Left, center vertically', WM_THEME_TEXTDOMAIN_ADMIN ),
							'0 100%'    => __( 'Left, bottom', WM_THEME_TEXTDOMAIN_ADMIN ),
							'100% 0'    => __( 'Right, top', WM_THEME_TEXTDOMAIN_ADMIN ),
							'100% 50%'  => __( 'Right, center vertically', WM_THEME_TEXTDOMAIN_ADMIN ),
							'100% 100%' => __( 'Right, bottom', WM_THEME_TEXTDOMAIN_ADMIN ),
							),
						"default" => '50% 0'
					),
					array(
						"type" => "select",
						"id" => $prefixBg."bg-img-repeat",
						"label" => __( 'Background image repeat', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'Set background image repeating', WM_THEME_TEXTDOMAIN_ADMIN ),
						"options" => array(
							'no-repeat' => __( 'Do not repeat the image', WM_THEME_TEXTDOMAIN_ADMIN ),
							'repeat'    => __( 'Tile the image', WM_THEME_TEXTDOMAIN_ADMIN ),
							'repeat-x'  => __( 'Tile horizontally', WM_THEME_TEXTDOMAIN_ADMIN ),
							'repeat-y'  => __( 'Tile vertically', WM_THEME_TEXTDOMAIN_ADMIN )
							),
						"default" => 'no-repeat'
					),
					array(
						"type" => "radio",
						"id" => $prefixBg."bg-img-attachment",
						"label" => __( 'Background image attachment', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'Set background image attachment', WM_THEME_TEXTDOMAIN_ADMIN ),
						"options" => array(
							'fixed'  => __( 'Fixed position', WM_THEME_TEXTDOMAIN_ADMIN ),
							'scroll' => __( 'Move on scrolling', WM_THEME_TEXTDOMAIN_ADMIN )
							),
						"default" => 'fixed'
					),
					array(
						"type" => "checkbox",
						"id" => $prefixBg."bg-img-fit-window",
						"label" => __( 'Fit browser window width', WM_THEME_TEXTDOMAIN_ADMIN ),
						"desc" => __( 'Makes the image to scale to browser window width. Note that background image position and repeat options does not apply when this is checked.', WM_THEME_TEXTDOMAIN_ADMIN ),
						"value" => "true"
					),
				array(
					"type" => "section-close"
				)

			);

		return $metaPageOptions;
	}
} // /wm_meta_page_options

?>