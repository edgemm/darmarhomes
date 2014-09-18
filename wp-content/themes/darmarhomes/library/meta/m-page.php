<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Page meta boxes generator
*****************************************************
*/

/*
*****************************************************
*      META ADDITIONS
*****************************************************
*/
require_once( WM_META . 'a-meta-page.php' );





/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
add_action( 'add_meta_boxes', 'wm_page_metabox_add' );
add_action( 'save_post', 'wm_page_metabox_save' );





/*
*****************************************************
*      META BOX FORM
*****************************************************
*/
/*
* Meta form generator
*/
if ( ! function_exists( 'wm_page_metabox' ) ) {
	function wm_page_metabox( $post ) {
		$slidesTaxonomy  = wm_slides_categories( 'noEmpty' );
		$metaPageOptions = wm_meta_page_options( $slidesTaxonomy );
		$pageTpl         = get_post_meta( $post->ID, '_wp_page_template', TRUE );
		if ( $post->ID == get_option( 'page_for_posts' ) )
			$pageTpl = 'blog-page';

		wp_nonce_field( 'wm_page_metabox_nonce', 'page_metabox_nonce' );

		//Display meta box form HTML
		$out = '<div class="wm-wrap meta jquery-ui-tabs">';

			//Tabs
			$out .= '<ul class="tabs no-js">';
			$i = 0;
			foreach ( $metaPageOptions as $tab ) {
				if ( 'section-open' == $tab['type'] ) {
					++$i;
					$hideThis = ( isset( $tab['exclude'] ) && in_array( $pageTpl, $tab['exclude'] ) ) ? ( ' hide' ) : ( null );

					$out .= '<li class="item-' . $i . $hideThis . ' ' . $tab['section-id'] . '"><a href="#wm-meta-' . $tab['section-id'] . '">' . $tab['title'] . '</a></li>';
				}
			}
			$out .= '</ul> <!-- /tabs -->';

			echo $out;

			//Content
			wm_render_form( $metaPageOptions, 'meta', $pageTpl );

		echo '</div> <!-- /wm-wrap -->';
	}
} // /wm_page_metabox





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
if ( ! function_exists( 'wm_page_metabox_save' ) ) {
	function wm_page_metabox_save( $post_id ) {
		$metaPageOptions = wm_meta_page_options();

		//Return when doing an auto save
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;
		//If the nonce isn't there, or we can't verify it, return
		if ( ! isset( $_POST['page_metabox_nonce'] ) || ! wp_verify_nonce( $_POST['page_metabox_nonce'], 'wm_page_metabox_nonce' ) )
			return;
		//If current user can't edit this post, return
		if ( ! current_user_can( 'edit_post' ) )
			return;

		//Save the data
		wm_save_meta( $post_id, $metaPageOptions );
	}
} // /wm_page_metabox_save





/*
*****************************************************
*      ADD META BOX
*****************************************************
*/
/*
* Add meta box
*/
if ( ! function_exists( 'wm_page_metabox_add' ) ) {
	function wm_page_metabox_add() {
		add_meta_box( 'wm-metabox-pagemeta', __( 'Page settings', WM_THEME_TEXTDOMAIN_ADMIN ), 'wm_page_metabox', 'page', 'normal', 'high' );
	}
} // /wm_page_metabox_add

?>