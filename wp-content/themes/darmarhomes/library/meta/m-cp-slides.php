<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Slides custom post meta boxes
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Adding meta boxes
add_action( 'add_meta_boxes', 'wm_slides_cp_admin_box' );
//Saving CP
add_action( 'save_post', 'wm_slides_cp_save_meta' );





/*
*****************************************************
*      META BOX FORM
*****************************************************
*/
/*
* Meta box form fields
*/
if ( ! function_exists( 'wm_slides_meta_fields' ) ) {
	function wm_slides_meta_fields() {
		$prefix = 'slide-';
		$metaFields = array(

			//General settings
			array(
				"type" => "section-open",
				"section-id" => "general",
				"title" => __( 'Slide settings', WM_THEME_TEXTDOMAIN_ADMIN )
			),
				array(
					"type" => "heading4",
					"content" => __( 'General settings', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "paragraph",
					"content" => __( 'Do not forget to set the featured image.', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "checkbox",
					"id" => $prefix."no-title",
					"label" => __( 'Hide title', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Disables slide title', WM_THEME_TEXTDOMAIN_ADMIN ),
					"value" => "true"
				),
				array(
					"type" => "space"
				),
				array(
					"type" => "text",
					"id" => $prefix."link",
					"label" => __( 'Link to more information on the topic', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'When left blank, no link will be applied', WM_THEME_TEXTDOMAIN_ADMIN ),
					"validate" => "url"
				),
				array(
					"type" => "text",
					"id" => $prefix."button-text",
					"label" => __( 'Link button text', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Text of the more information link button in slide description area (if left blank no button will be displayed). Requires link to be set.', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "textarea",
					"id" => $prefix."description",
					"label" => __( 'Slide description', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Additional slide description text', WM_THEME_TEXTDOMAIN_ADMIN ),
					"default" => "",
					"cols" => 80,
					"rows" => 4
				),

				array(
					"type" => "heading4",
					"content" => __( 'Slide animation', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "select",
					"id" => $prefix."animation",
					"label" => __( 'Slide text animation', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Select the slide text animation effect', WM_THEME_TEXTDOMAIN_ADMIN ),
					"options" => array(
						'fade'   => __( 'Fading', WM_THEME_TEXTDOMAIN_ADMIN ),
						'top'    => __( 'Top', WM_THEME_TEXTDOMAIN_ADMIN ),
						'right'  => __( 'Right', WM_THEME_TEXTDOMAIN_ADMIN ),
						'bottom' => __( 'Bottom', WM_THEME_TEXTDOMAIN_ADMIN ),
						'left'   => __( 'Left', WM_THEME_TEXTDOMAIN_ADMIN )
						),
					"default" => "fade"
				),
			array(
				"type" => "section-close"
			)

		);

		return $metaFields;
	}
} // /wm_slides_meta_fields



/*
* Meta form generator
*
* $post = OBJ [current post object]
*/
if ( ! function_exists( 'wm_slides_cp_meta_options' ) ) {
	function wm_slides_cp_meta_options( $post ) {
		wp_nonce_field( 'wm_slides-metabox-nonce', 'wm_slides-metabox-nonce' );

		//Display custom meta box form HTML
		$metaFields = wm_slides_meta_fields();

		wm_cp_meta_form_generator( $metaFields );
	}
} // /wm_slides_cp_meta_options





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
if ( ! function_exists( 'wm_slides_cp_save_meta' ) ) {
	function wm_slides_cp_save_meta( $post_id ) {
		//Return when doing an auto save
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		//If the nonce isn't there, or we can't verify it, return
		if ( ! isset( $_POST['wm_slides-metabox-nonce'] ) || ! wp_verify_nonce( $_POST['wm_slides-metabox-nonce'], 'wm_slides-metabox-nonce' ) )
			return $post_id;
		//If current user can't edit this post, return
		if ( ! current_user_can( 'edit_post' ) )
			return $post_id;

		//Save each meta field separately
		$metaFields = wm_slides_meta_fields();

		wm_save_meta( $post_id, $metaFields );
	}
} // /wm_slides_cp_save_meta





/*
*****************************************************
*      ADD META BOX
*****************************************************
*/
/*
* Add meta box
*/
if ( ! function_exists( 'wm_slides_cp_admin_box' ) ) {
	function wm_slides_cp_admin_box() {
		add_meta_box( 'wm-metabox-wm_slides-meta', __( 'Slide settings', WM_THEME_TEXTDOMAIN_ADMIN ), 'wm_slides_cp_meta_options', 'wm_slides', 'normal', 'high' );
	}
} // /wm_slides_cp_admin_box

?>