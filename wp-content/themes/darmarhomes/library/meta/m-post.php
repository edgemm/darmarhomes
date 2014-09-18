<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Post meta boxes generator
*****************************************************
*/

/*
*****************************************************
*      META ADDITIONS
*****************************************************
*/
require_once( WM_META . 'a-meta-post.php' );





/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
add_action( 'add_meta_boxes', 'wm_post_metabox_add' );
add_action( 'save_post', 'wm_post_metabox_save' );





/*
*****************************************************
*      META BOX FORM
*****************************************************
*/
/*
* Meta form generator
*
* $post = OBJ [current post object]
*/
if ( ! function_exists( 'wm_post_metabox' ) ) {
	function wm_post_metabox( $post ) {
		$slidesTaxonomy  = wm_slides_categories( 'noEmpty' );
		$metaPostOptions = wm_meta_post_options( $slidesTaxonomy );

		wp_nonce_field( 'wm_post_metabox_nonce', 'post_metabox_nonce' );

		//Display meta box form HTML
		$out = '<div class="wm-wrap meta jquery-ui-tabs">';

			//Tabs
			$out .= '<ul class="tabs no-js">';
			$i = 0;
			foreach ( $metaPostOptions as $tab ) {
				if ( 'section-open' == $tab['type'] ) {
					++$i;
					$out .= '<li class="item-' . $i . ' ' . $tab['section-id'] . '"><a href="#wm-meta-' . $tab['section-id'] . '">' . $tab['title'] . '</a></li>';
				}
			}
			$out .= '</ul> <!-- /tabs -->';

			echo $out;

			//Content
			wm_render_form( $metaPostOptions, 'meta' );

		echo '</div> <!-- /wm-wrap -->';
	}
} // /wm_post_metabox





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
if ( ! function_exists( 'wm_post_metabox_save' ) ) {
	function wm_post_metabox_save( $post_id ) {
		$metaPostOptions = wm_meta_post_options();

		//Return when doing an auto save
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;
		//If the nonce isn't there, or we can't verify it, return
		if ( ! isset( $_POST['post_metabox_nonce'] ) || ! wp_verify_nonce( $_POST['post_metabox_nonce'], 'wm_post_metabox_nonce' ) )
			return;
		//If current user can't edit this post, return
		if ( ! current_user_can( 'edit_post' ) )
			return;

		//Save the data
		wm_save_meta( $post_id, $metaPostOptions );
	}
} // /wm_post_metabox_save





/*
*****************************************************
*      ADD META BOX
*****************************************************
*/
/*
* Add meta box
*/
if ( ! function_exists( 'wm_post_metabox_add' ) ) {
	function wm_post_metabox_add() {
		add_meta_box( 'wm-metabox-postmeta', __( 'Post settings', WM_THEME_TEXTDOMAIN_ADMIN ), 'wm_post_metabox', 'post', 'normal', 'high' );
	}
} // /wm_post_metabox_add

?>