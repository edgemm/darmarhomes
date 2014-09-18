<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Content Module custom post meta boxes
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Adding meta boxes
add_action( 'add_meta_boxes', 'wm_modules_cp_admin_box' );
//Saving CP
add_action( 'save_post', 'wm_modules_cp_save_meta' );





/*
*****************************************************
*      META BOX FORM
*****************************************************
*/
/*
* Meta box form fields
*/
if ( ! function_exists( 'wm_modules_meta_fields' ) ) {
	function wm_modules_meta_fields() {
		$prefix   = 'module-';
		$iconPack = ( wm_option( 'design-icon-pack' ) ) ? ( 'img/icons/custom/' . wm_option( 'design-icon-pack' ) . '/' ) : ( 'img/icons/custom/faenza/' );

		$metaFields = array(

			//General settings
			array(
				"type" => "section-open",
				"section-id" => "general",
				"title" => __( 'Content module settings', WM_THEME_TEXTDOMAIN_ADMIN )
			),
				array(
					"type" => "text",
					"id" => $prefix."link",
					"label" => __( 'Custom link to more information on the topic', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'When left blank, no link will be applied', WM_THEME_TEXTDOMAIN_ADMIN ),
					"validate" => "url"
				),
				array(
					"type" => "select",
					"id" => $prefix."type",
					"label" => __( 'Content type', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Select a type of content module styling', WM_THEME_TEXTDOMAIN_ADMIN ),
					"options" => array(
						'content' => __( 'Content module', WM_THEME_TEXTDOMAIN_ADMIN ),
						'icon'    => __( 'Icon module', WM_THEME_TEXTDOMAIN_ADMIN )
						),
					"default" => "content"
				),
				array(
					"conditional" => array(
						"field" => $prefix."type",
						"value" => "icon"
						),
					"type" => "patterns",
					"id" => $prefix."icon",
					"label" => __( 'Icon', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Choose an icon to use with this Icon module. Featured image is prioritized and will be used as an icon when Content type is set to "Icon module".', WM_THEME_TEXTDOMAIN_ADMIN ),
					"options" => wm_get_image_files( $iconPack ),
					"default" => "",
					"repeat" => "no"
				),
			array(
				"type" => "section-close"
			),

		);

		return $metaFields;
	}
} // /wm_modules_meta_fields



/*
* Meta form generator
*
* $post = OBJ [current post object]
*/
if ( ! function_exists( 'wm_modules_cp_meta_options' ) ) {
	function wm_modules_cp_meta_options( $post ) {
		wp_nonce_field( 'wm_modules-metabox-nonce', 'wm_modules-metabox-nonce' );

		//Display custom meta box form HTML
		$metaFields = wm_modules_meta_fields();

		wm_cp_meta_form_generator( $metaFields );
	}
} // /wm_modules_cp_meta_options





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
if ( ! function_exists( 'wm_modules_cp_save_meta' ) ) {
	function wm_modules_cp_save_meta( $post_id ) {
		//Return when doing an auto save
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		//If the nonce isn't there, or we can't verify it, return
		if ( ! isset( $_POST['wm_modules-metabox-nonce'] ) || ! wp_verify_nonce( $_POST['wm_modules-metabox-nonce'], 'wm_modules-metabox-nonce' ) )
			return $post_id;
		//If current user can't edit this post, return
		if ( ! current_user_can( 'edit_post' ) )
			return $post_id;

		//Save each meta field separately
		$metaFields = wm_modules_meta_fields();

		wm_save_meta( $post_id, $metaFields );
	}
} // /wm_modules_cp_save_meta





/*
*****************************************************
*      ADD META BOX
*****************************************************
*/
/*
* Add meta box
*/
if ( ! function_exists( 'wm_modules_cp_admin_box' ) ) {
	function wm_modules_cp_admin_box() {
		add_meta_box( 'wm-metabox-wm_modules-meta', __( 'Content Module settings', WM_THEME_TEXTDOMAIN_ADMIN ), 'wm_modules_cp_meta_options', 'wm_modules', 'normal', 'high' );
	}
} // /wm_modules_cp_admin_box

?>