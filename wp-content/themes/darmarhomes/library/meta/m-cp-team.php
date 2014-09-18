<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Team custom post meta boxes
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Adding meta boxes
add_action( 'add_meta_boxes', 'wm_team_cp_admin_box' );
//Saving CP
add_action( 'save_post', 'wm_team_cp_save_meta' );





/*
*****************************************************
*      META BOX FORM
*****************************************************
*/
/*
* Meta box form fields
*/
if ( ! function_exists( 'wm_team_meta_fields' ) ) {
	function wm_team_meta_fields() {
		$prefix = 'team-';
		$metaFields = array(

			//Social networks connections settings
			array(
				"type" => "section-open",
				"section-id" => "general",
				"title" => __( 'Member information', WM_THEME_TEXTDOMAIN_ADMIN )
			),
				array(
					"type" => "textarea",
					"id" => $prefix."description",
					"label" => __( 'Member bio', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Short biography or description text (only plain text allowed, no HTML tags). Will be displayed when hovering the member box on About page.', WM_THEME_TEXTDOMAIN_ADMIN ),
					"default" => "",
					"cols" => 80,
					"rows" => 4
				),

				array(
					"type" => "heading4",
					"content" => __( 'Social connections', WM_THEME_TEXTDOMAIN_ADMIN )
				),
				array(
					"type" => "text",
					"id" => $prefix."facebook",
					"label" => __( 'Facebook', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Link to Facebook profile', WM_THEME_TEXTDOMAIN_ADMIN ),
					"validate" => "url"
				),
				array(
					"type" => "text",
					"id" => $prefix."google",
					"label" => __( 'Google+', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Link to Google+ profile', WM_THEME_TEXTDOMAIN_ADMIN ),
					"validate" => "url"
				),
				array(
					"type" => "text",
					"id" => $prefix."twitter",
					"label" => __( 'Twitter', WM_THEME_TEXTDOMAIN_ADMIN ),
					"desc" => __( 'Link to Twitter profile', WM_THEME_TEXTDOMAIN_ADMIN ),
					"validate" => "url"
				),
			array(
				"type" => "section-close"
			)

		);

		return $metaFields;
	}
} // /wm_team_meta_fields



/*
* Meta form generator
*
* $post = OBJ [current post object]
*/
if ( ! function_exists( 'wm_team_cp_meta_options' ) ) {
	function wm_team_cp_meta_options( $post ) {
		wp_nonce_field( 'wm_team-metabox-nonce', 'wm_team-metabox-nonce' );

		//Display custom meta box form HTML
		$metaFields = wm_team_meta_fields();

		wm_cp_meta_form_generator( $metaFields );
	}
} // /wm_team_cp_meta_options





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
if ( ! function_exists( 'wm_team_cp_save_meta' ) ) {
	function wm_team_cp_save_meta( $post_id ) {
		//Return when doing an auto save
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		//If the nonce isn't there, or we can't verify it, return
		if ( ! isset( $_POST['wm_team-metabox-nonce'] ) || ! wp_verify_nonce( $_POST['wm_team-metabox-nonce'], 'wm_team-metabox-nonce' ) )
			return $post_id;
		//If current user can't edit this post, return
		if ( ! current_user_can( 'edit_post' ) )
			return $post_id;

		//Save each meta field separately
		$metaFields = wm_team_meta_fields();

		wm_save_meta( $post_id, $metaFields );
	}
} // /wm_team_cp_save_meta





/*
*****************************************************
*      ADD META BOX
*****************************************************
*/
/*
* Add meta box
*/
if ( ! function_exists( 'wm_team_cp_admin_box' ) ) {
	function wm_team_cp_admin_box() {
		add_meta_box( 'wm-metabox-wm_team-meta', __( 'Member information', WM_THEME_TEXTDOMAIN_ADMIN ), 'wm_team_cp_meta_options', 'wm_team', 'normal', 'high' );
	}
} // /wm_team_cp_admin_box

?>