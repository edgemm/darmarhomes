<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Portfolio custom post meta boxes
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Adding meta boxes
add_action( 'add_meta_boxes', 'wm_portfolio_cp_admin_box' );
//Saving CP
add_action( 'save_post', 'wm_portfolio_cp_save_meta' );





/*
*****************************************************
*      META BOX FORM
*****************************************************
*/
/*
* Meta box form fields
*/
if ( ! function_exists( 'wm_portfolio_meta_fields' ) ) {
	function wm_portfolio_meta_fields() {
		$prefix   = 'portfolio-';
		$prefixBg = 'background-';

		// Clients list
		if ( 'disable' != wm_option( 'general-role-clients' ) ) {
			$clientsList         = get_posts( array(
				'numberposts' => -1,
				'orderby'     => 'title',
				'order'       => 'ASC',
				'post_type'   => 'wm_clients'
				) );
			$clientsListArray    = array();
			$clientsListArray[0] = __( '- Select client -', WM_THEME_TEXTDOMAIN_ADMIN );
			foreach ( $clientsList as $client ) {
				$clientsListArray[$client->ID] = $client->post_title;
			}
		}

		$metaFields = array(

			//General settings
			array(
				"type" => "section-open",
				"section-id" => "general",
				"title" => __( 'General', WM_THEME_TEXTDOMAIN_ADMIN )
			),
				array(
					"type" => "paragraph",
					"content" => __( 'Do not forget to set the featured image.', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "select",
					"id" => $prefix."type",
					"label" => __( 'Portfolio type', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Select a type of portfolio item styling', WM_THEME_TEXTDOMAIN_ADMIN ),
					"options" => array(
						'image'  => __( 'Single image', WM_THEME_TEXTDOMAIN_ADMIN ),
						'slider' => __( 'Image slider', WM_THEME_TEXTDOMAIN_ADMIN ),
						'video'  => __( 'Video', WM_THEME_TEXTDOMAIN_ADMIN )
						),
					"default" => "image"
				),
				array(
					"conditional" => array(
						"field" => $prefix."type",
						"value" => "video"
						),
					"type" => "text",
					"id" => $prefix."video",
					"label" => __( 'Video URL', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Enter full video URL (check the <a href="http://codex.wordpress.org/Embeds#Can_I_Use_Any_URL_With_This.3F" target="_blank">list of supported video portals</a>)', WM_THEME_TEXTDOMAIN_ADMIN ),
				),
				array(
					"conditional" => array(
						"field" => $prefix."type",
						"value" => "slider"
						),
					"type" => "slider",
					"id" => $prefix."slider-duration",
					"label" => __( 'Slide display time', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Time of slide being displayed (in miliseconds)', WM_THEME_TEXTDOMAIN_ADMIN ),
					"default" => 5000,
					"min" => 1000,
					"max" => 15000,
					"step" => 250,
					"validate" => "absint"
				),
				array(
					"conditional" => array(
						"field" => $prefix."type",
						"value" => "slider"
						),
					"type" => "patterns",
					"id" => $prefix."slider-gallery-images",
					"label" => __( 'Choose slider images', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Select which images from gallery will be displayed in the slider (you may need to save/publish/update the post first to enable images selection)', WM_THEME_TEXTDOMAIN_ADMIN ),
					"options" => wm_get_post_images(),
					"field" => "checkbox",
					"default" => ""
				),
				array(
					"conditional" => array(
						"field" => $prefix."type",
						"value" => "slider"
						),
					"type" => "checkbox",
					"id" => $prefix."slider-full-images",
					"label" => __( 'Do not crop images', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Keeps aspect ratio of slider images', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"conditional" => array(
						"field" => $prefix."type",
						"value" => "image,slider"
						),
					"type" => "checkbox",
					"id" => $prefix."no-zoom",
					"label" => __( 'Remove image zooming', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Disables PrettyPhoto zooming effect on images', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "space"
				),

				array(
					"type" => "text",
					"id" => $prefix."link",
					"label" => __( 'Project URL link', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'When left blank, no link will be displayed', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "checkbox",
					"id" => $prefix."link-list",
					"label" => __( 'Use the link in portfolio list', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Apply the project URL link directly on the item in portfolio list', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "space"
				),
		);

	if ( 'disable' != wm_option( 'general-role-clients' ) )
		array_push( $metaFields,
				array(
					"type" => "select",
					"id" => $prefix."client",
					"label" => __( 'Client', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Select a client from the list below', WM_THEME_TEXTDOMAIN_ADMIN ),
					"options" => $clientsListArray
				)
			);

	array_push( $metaFields,
				array(
					"type" => "additems",
					"id" => $prefix."attributes",
					"label" => __( 'Portfolio attributes', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Press [+] button to add an attribute, then type in the attribute name and value', WM_THEME_TEXTDOMAIN_ADMIN ),
					"default" => "",
					"field" => "attributes"
				),
			array(
				"type" => "section-close"
			)

		);

		if ( 'boxed' === wm_option( 'layout-boxed' ) )
			array_push( $metaFields,
				//Design settings
				array(
					"type" => "section-open",
					"section-id" => "design",
					"title" => __( 'Design', WM_THEME_TEXTDOMAIN_ADMIN )
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

		array_push( $metaFields,

			//Gallery
			array(
				"type" => "section-open",
				"section-id" => "gallery-section",
				"title" => __( 'Gallery', WM_THEME_TEXTDOMAIN_ADMIN )
			),
				array(
					"type" => "checkbox",
					"id" => $prefix."enable-gallery",
					"label" => __( 'Gallery below portfolio item preview', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Displays gallery from attached images below portfolio item preview', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "checkbox",
					"id" => $prefix."gallery-image",
					"label" => __( 'Keep image proportions', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Images will not be cropped, original proportions are kept', WM_THEME_TEXTDOMAIN_ADMIN ),
					"value" => "true"
				),
				array(
					"type" => "space"
				),
				array(
					"type" => "slider",
					"id" => $prefix."gallery-columns",
					"label" => __( 'Gallery columns', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Set the number of columns for the gallery', WM_THEME_TEXTDOMAIN_ADMIN ),
					"default" => 3,
					"min" => 3,
					"max" => 6,
					"step" => 1,
					"validate" => "absint"
				),
			array(
				"type" => "section-close"
			),



			//List image
			array(
				"type" => "section-open",
				"section-id" => "custom-image",
				"title" => __( 'List image', WM_THEME_TEXTDOMAIN_ADMIN )
			),
				array(
					"type" => "image",
					"id" => $prefix."list-image",
					"label" => __( 'Custom image displayed in portfolio list', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'This setting will override the featured image (note that featured image needs to be set). Leave blank to use featured image in portfolio list. To keep the list layout use square images of minimum 720 &times; 720 px, please.<br />To upload a new image, press the [+] button and use the Media Uploader as you would be adding an image into post.', WM_THEME_TEXTDOMAIN_ADMIN ),
					"default" => "",
					"validate" => "url"
				),
			array(
				"type" => "section-close"
			),



			//Other settings
			array(
				"type" => "section-open",
				"section-id" => "others",
				"title" => __( 'Others', WM_THEME_TEXTDOMAIN_ADMIN )
			),
				array(
					"type" => "checkbox",
					"id" => "no-heading",
					"label" => __( 'Disable main heading', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Hides main heading - the title', WM_THEME_TEXTDOMAIN_ADMIN ),
					"value" => "true"
				),
				array(
					"type" => "space"
				),
				array(
					"type" => "textarea",
					"id" => "subheading",
					"label" => __( 'Subtitle (tagline)', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'If defined, the specially styled subtitle will be displayed', WM_THEME_TEXTDOMAIN_ADMIN ),
					"default" => "",
					"rows" => 3
				),
			array(
				"type" => "section-close"
			)

		);

		return $metaFields;
	}
} // /wm_portfolio_meta_fields



/*
* Meta form generator
*
* $post = OBJ [current post object]
*/
if ( ! function_exists( 'wm_portfolio_cp_meta_options' ) ) {
	function wm_portfolio_cp_meta_options( $post ) {
		wp_nonce_field( 'wm_portfolio-metabox-nonce', 'wm_portfolio-metabox-nonce' );

		//Display custom meta box form HTML
		$metaFields = wm_portfolio_meta_fields();

		wm_cp_meta_form_generator( $metaFields, 'tabbed' );
	}
} // /wm_portfolio_cp_meta_options





/*
*****************************************************
*      SAVING META
*****************************************************
*/
/*
* Saves post meta options
*
* $post_id = # [current post ID]
*/
if ( ! function_exists( 'wm_portfolio_cp_save_meta' ) ) {
	function wm_portfolio_cp_save_meta( $post_id ) {
		//Return when doing an auto save
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		//If the nonce isn't there, or we can't verify it, return
		if ( ! isset( $_POST['wm_portfolio-metabox-nonce'] ) || ! wp_verify_nonce( $_POST['wm_portfolio-metabox-nonce'], 'wm_portfolio-metabox-nonce' ) )
			return $post_id;
		//If current user can't edit this post, return
		if ( ! current_user_can( 'edit_post' ) )
			return $post_id;

		//Save each meta field separately
		$metaFields = wm_portfolio_meta_fields();

		wm_save_meta( $post_id, $metaFields );
	}
} // /wm_portfolio_cp_save_meta





/*
*****************************************************
*      ADD META BOX
*****************************************************
*/
/*
* Add meta box
*/
if ( ! function_exists( 'wm_portfolio_cp_admin_box' ) ) {
	function wm_portfolio_cp_admin_box() {
		add_meta_box( 'wm-metabox-wm_portfolio-meta', __( 'Portfolio settings', WM_THEME_TEXTDOMAIN_ADMIN ), 'wm_portfolio_cp_meta_options', 'wm_portfolio', 'normal', 'high' );
	}
} // /wm_portfolio_cp_admin_box

?>