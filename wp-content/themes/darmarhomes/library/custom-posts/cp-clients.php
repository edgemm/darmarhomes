<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Clients custom post
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Registering CP
add_action( 'init', 'wm_clients_cp_init' );
//CP list table columns
add_action( 'manage_posts_custom_column', 'wm_clients_cp_custom_column' );

//FILTERS
//CP list table columns
add_filter( 'manage_edit-wm_clients_columns', 'wm_clients_cp_columns' );
//Return messages
add_filter( 'post_updated_messages', 'wm_clients_cp_messages' );





/*
*****************************************************
*      CREATING A CUSTOM POST
*****************************************************
*/
/*
* Custom post registration
*/
if ( ! function_exists( 'wm_clients_cp_init' ) ) {
	function wm_clients_cp_init() {
		$role = ( wm_option( 'general-role-clients' ) ) ? ( wm_option( 'general-role-clients' ) ) : ( 'post' );
		$slug = ( wm_option( 'general-permalink-clients' ) ) ? ( wm_option( 'general-permalink-clients' ) ) : ( 'client' );

		$args = array(
			'query_var'           => 'clients',
			'capability_type'     => $role,
			'public'              => true,
			'show_in_nav_menus'   => false,
			'show_ui'             => true,
			'exclude_from_search' => true,
			'hierarchical'        => false,
			'rewrite'             => array( 'slug' => $slug ),
			'menu_position'       => ( wm_option( 'general-default-admin-menu' ) ) ? ( 31 ) : ( 8 ),
			'menu_icon'           => WM_ASSETS_ADMIN . 'img/icons/ico-clients.png',
			'supports'            => array( 'title', 'thumbnail' ),
			'labels'              => array(
				'name'               => __( 'Clients', WM_THEME_TEXTDOMAIN_ADMIN ),
				'singular_name'      => __( 'Client', WM_THEME_TEXTDOMAIN_ADMIN ),
				'add_new'            => __( 'Add new client', WM_THEME_TEXTDOMAIN_ADMIN ),
				'add_new_item'       => __( 'Add new client', WM_THEME_TEXTDOMAIN_ADMIN ),
				'new_item'           => __( 'Add new client', WM_THEME_TEXTDOMAIN_ADMIN ),
				'edit_item'          => __( 'Edit client', WM_THEME_TEXTDOMAIN_ADMIN ),
				'view_item'          => __( 'View client', WM_THEME_TEXTDOMAIN_ADMIN ),
				'search_items'       => __( 'Search clients', WM_THEME_TEXTDOMAIN_ADMIN ),
				'not_found'          => __( 'No client found', WM_THEME_TEXTDOMAIN_ADMIN ),
				'not_found_in_trash' => __( 'No clients found in trash', WM_THEME_TEXTDOMAIN_ADMIN ),
				'parent_item_colon'  => ''
			)
		);
		register_post_type( 'wm_clients' , $args );
	}
} // /wm_clients_cp_init





/*
*****************************************************
*      ADMIN MESSAGES
*****************************************************
*/
/*
* Custom post admin area messages
*
* $messages = ARRAY [array of messages]
*/
if ( ! function_exists( 'wm_clients_cp_messages' ) ) {
	function wm_clients_cp_messages( $messages ) {
		global $post, $post_ID;

		$messages['wm_clients'] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'Client updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			2  => __( 'Custom field updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			3  => __( 'Custom field deleted.', WM_THEME_TEXTDOMAIN_ADMIN ),
			4  => __( 'Client updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			5  => ( isset( $_GET['revision'] ) ) ? ( sprintf(
				__( 'Client restored to revision from %s', WM_THEME_TEXTDOMAIN_ADMIN ),
				wp_post_revision_title( (int) $_GET['revision'], false )
				) ) : ( false ),
			6  => __( 'Client published.', WM_THEME_TEXTDOMAIN_ADMIN ),
			7  => __( 'Client saved.', WM_THEME_TEXTDOMAIN_ADMIN ),
			8  => __( 'Client submitted.', WM_THEME_TEXTDOMAIN_ADMIN ),
			9  => sprintf(
				__( 'Client scheduled for: <strong>%1$s</strong>.', WM_THEME_TEXTDOMAIN_ADMIN ),
				get_the_date() . ', ' . get_the_time()
				),
			10 => __( 'Client draft updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			);

		return $messages;
	}
} // /wm_clients_cp_messages





/*
*****************************************************
*      CUSTOM POST LIST IN ADMIN
*****************************************************
*/
/*
* Registration of the table columns
*
* $Cols = ARRAY [array of columns]
*/
if ( ! function_exists( 'wm_clients_cp_columns' ) ) {
	function wm_clients_cp_columns( $wm_clientsCols ) {
		$prefix = 'wm_clients-';

		$wm_clientsCols = array(
			//standard columns
			"cb"                 => '<input type="checkbox" />',
			$prefix . "thumb"    => __( 'Logo', WM_THEME_TEXTDOMAIN_ADMIN ),
			"title"              => __( 'Client name', WM_THEME_TEXTDOMAIN_ADMIN ),
			"date"               => __( 'Published', WM_THEME_TEXTDOMAIN_ADMIN ),
			"author"             => __( 'Created by', WM_THEME_TEXTDOMAIN_ADMIN ),
			//custom columns
			$prefix . "link"     => __( 'Client URL', WM_THEME_TEXTDOMAIN_ADMIN )
		);

		return $wm_clientsCols;
	}
} // /wm_clients_cp_columns

/*
* Outputting values for the custom columns in the table
*
* $Col = TEXT [column id for switch]
*/
if ( ! function_exists( 'wm_clients_cp_custom_column' ) ) {
	function wm_clients_cp_custom_column( $wm_clientsCol ) {
		global $post;
		$prefix     = 'wm_clients-';
		$prefixMeta = 'client-';

		switch ( $wm_clientsCol ) {
			case $prefix . "thumb":

				$size  = explode( 'x', WM_ADMIN_LIST_THUMB );
				$image = ( has_post_thumbnail() ) ? ( get_the_post_thumbnail( null, 'widget' ) ) : ( '<img src="' . WM_ASSETS_ADMIN . 'img/no-thumb.png" alt="' . __( 'No image', WM_THEME_TEXTDOMAIN_ADMIN ) . '" title="' . __( 'No image', WM_THEME_TEXTDOMAIN_ADMIN ) . '" width="' . $size[0] . '" height="' . $size[1] . '" />' );

				if ( get_edit_post_link() )
					edit_post_link( $image );
				else
					echo '<a href="' . get_permalink() . '">' . $image . '</a>';

			break;
			case $prefix . "link":

				$wm_clientsLink = esc_url( stripslashes( wm_meta_option( $prefixMeta . 'link' ) ) );
				echo '<a href="' . $wm_clientsLink . '" target="_blank">' . $wm_clientsLink . '</a>';

			break;
			default:
			break;
		}
	}
} // /wm_clients_cp_custom_column

?>