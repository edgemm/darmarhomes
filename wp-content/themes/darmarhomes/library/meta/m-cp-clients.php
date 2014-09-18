<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Clients custom post meta boxes
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Adding meta boxes
add_action( 'add_meta_boxes', 'wm_clients_cp_admin_box' );
//Saving CP
add_action( 'save_post', 'wm_clients_cp_save_meta' );





/*
*****************************************************
*      META BOX FORM
*****************************************************
*/
/*
* Meta box form fields
*/
if ( ! function_exists( 'wm_clients_meta_fields' ) ) {
	function wm_clients_meta_fields() {
		$prefix = 'client-';
		$metaFields = array(

			//General settings
			array(
				"type" => "section-open",
				"section-id" => "general",
				"title" => __( 'Client info', WM_THEME_TEXTDOMAIN_ADMIN )
			),
				array(
					"type" => "text",
					"id" => $prefix."link",
					"label" => __( "URL of the client's website", WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'When left blank, no link will be applied', WM_THEME_TEXTDOMAIN_ADMIN ),
					"validate" => "url"
				),
				array(
					"type" => "paragraph",
					"content" => __( 'Use featured image area to upload the clients logo.', WM_THEME_TEXTDOMAIN_ADMIN )
				),
			array(
				"type" => "section-close"
			)

		);

		return $metaFields;
	}
} // /wm_clients_meta_fields



/*
* Meta form generator
*
* $post = OBJ [current post object]
*/
if ( ! function_exists( 'wm_clients_cp_meta_options' ) ) {
	function wm_clients_cp_meta_options( $post ) {
		wp_nonce_field( 'wm_clients-metabox-nonce', 'wm_clients-metabox-nonce' );

		//Display custom meta box form HTML
		$metaFields = wm_clients_meta_fields();

		wm_cp_meta_form_generator( $metaFields );
	}
} // /wm_clients_cp_meta_options





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
if ( ! function_exists( 'wm_clients_cp_save_meta' ) ) {
	function wm_clients_cp_save_meta( $post_id ) {
		//Return when doing an auto save
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		//If the nonce isn't there, or we can't verify it, return
		if ( ! isset( $_POST['wm_clients-metabox-nonce'] ) || ! wp_verify_nonce( $_POST['wm_clients-metabox-nonce'], 'wm_clients-metabox-nonce' ) )
			return $post_id;
		//If current user can't edit this post, return
		if ( ! current_user_can( 'edit_post' ) )
			return $post_id;

		//Save each meta field separately
		$metaFields = wm_clients_meta_fields();

		wm_save_meta( $post_id, $metaFields );
	}
} // /wm_clients_cp_save_meta





/*
*****************************************************
*      ADD META BOX
*****************************************************
*/
/*
* Add meta box
*/
if ( ! function_exists( 'wm_clients_cp_admin_box' ) ) {
	function wm_clients_cp_admin_box() {
		add_meta_box( 'wm-metabox-wm_clients-meta', __( 'Client info', WM_THEME_TEXTDOMAIN_ADMIN ), 'wm_clients_cp_meta_options', 'wm_clients', 'normal', 'high' );
	}
} // /wm_clients_cp_admin_box

?>