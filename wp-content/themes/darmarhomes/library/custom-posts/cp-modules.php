<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Content Module custom post - for widget
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Registering CP
add_action( 'init', 'wm_modules_cp_init' );
//CP list table columns
add_action( 'manage_posts_custom_column', 'wm_modules_cp_custom_column' );

//FILTERS
//CP list table columns
add_filter( 'manage_edit-wm_modules_columns', 'wm_modules_cp_columns' );
//Return messages
add_filter( 'post_updated_messages', 'wm_modules_cp_messages' );





/*
*****************************************************
*      CREATING A CUSTOM POST
*****************************************************
*/
/*
* Custom post registration
*/
if ( ! function_exists( 'wm_modules_cp_init' ) ) {
	function wm_modules_cp_init() {
		$role = ( wm_option( 'general-role-modules' ) ) ? ( wm_option( 'general-role-modules' ) ) : ( 'post' );
		$slug = ( wm_option( 'general-permalink-modules' ) ) ? ( wm_option( 'general-permalink-modules' ) ) : ( 'module' );

		$args = array(
			'query_var'           => 'modules',
			'capability_type'     => $role,
			'public'              => true,
			'show_in_nav_menus'   => false,
			'show_ui'             => true,
			'exclude_from_search' => true,
			'hierarchical'        => false,
			'rewrite'             => array( 'slug' => $slug ),
			'menu_position'       => ( wm_option( 'general-default-admin-menu' ) ) ? ( 33 ) : ( 11 ),
			'menu_icon'           => WM_ASSETS_ADMIN . 'img/icons/ico-column.png',
			'supports'            => array( 'title', 'editor', 'thumbnail' ),
			'labels'              => array(
				'name'               => __( 'Content Modules', WM_THEME_TEXTDOMAIN_ADMIN ),
				'singular_name'      => __( 'Content module', WM_THEME_TEXTDOMAIN_ADMIN ),
				'add_new'            => __( 'Add new module', WM_THEME_TEXTDOMAIN_ADMIN ),
				'add_new_item'       => __( 'Add new module', WM_THEME_TEXTDOMAIN_ADMIN ),
				'new_item'           => __( 'Add new module', WM_THEME_TEXTDOMAIN_ADMIN ),
				'edit_item'          => __( 'Edit module', WM_THEME_TEXTDOMAIN_ADMIN ),
				'view_item'          => __( 'View module', WM_THEME_TEXTDOMAIN_ADMIN ),
				'search_items'       => __( 'Search modules', WM_THEME_TEXTDOMAIN_ADMIN ),
				'not_found'          => __( 'No module found', WM_THEME_TEXTDOMAIN_ADMIN ),
				'not_found_in_trash' => __( 'No module found in trash', WM_THEME_TEXTDOMAIN_ADMIN ),
				'parent_item_colon'  => ''
			)
		);
		register_post_type( 'wm_modules' , $args );
	}
} // /wm_modules_cp_init





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
if ( ! function_exists( 'wm_modules_cp_messages' ) ) {
	function wm_modules_cp_messages( $messages ) {
		global $post, $post_ID;

		$messages['wm_modules'] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'Module updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			2  => __( 'Custom field updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			3  => __( 'Custom field deleted.', WM_THEME_TEXTDOMAIN_ADMIN ),
			4  => __( 'Module updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			5  => ( isset( $_GET['revision'] ) ) ? ( sprintf(
				__( 'Module restored to revision from %s', WM_THEME_TEXTDOMAIN_ADMIN ),
				wp_post_revision_title( (int) $_GET['revision'], false )
				) ) : ( false ),
			6  => __( 'Module published.', WM_THEME_TEXTDOMAIN_ADMIN ),
			7  => __( 'Module saved.', WM_THEME_TEXTDOMAIN_ADMIN ),
			8  => __( 'Module submitted.', WM_THEME_TEXTDOMAIN_ADMIN ),
			9  => sprintf(
				__( 'Module scheduled for: <strong>%1$s</strong>.', WM_THEME_TEXTDOMAIN_ADMIN ),
				get_the_date() . ', ' . get_the_time()
				),
			10 => __( 'Module draft updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			);

		return $messages;
	}
} // /wm_modules_cp_messages





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
if ( ! function_exists( 'wm_modules_cp_columns' ) ) {
	function wm_modules_cp_columns( $wm_modulesCols ) {
		$prefix = 'wm_modules-';

		$wm_modulesCols = array(
			//standard columns
			"cb"                  => '<input type="checkbox" />',
			$prefix . "thumb"     => __( 'Image <small>[type]</small>', WM_THEME_TEXTDOMAIN_ADMIN ),
			"title"               => __( 'Content module', WM_THEME_TEXTDOMAIN_ADMIN ),
			"date"                => __( 'Published', WM_THEME_TEXTDOMAIN_ADMIN ),
			"author"              => __( 'Created by', WM_THEME_TEXTDOMAIN_ADMIN ),
			//custom columns
			$prefix . "link"      => __( 'More info link', WM_THEME_TEXTDOMAIN_ADMIN ),
			$prefix . "shortcode" => __( 'Shortcode', WM_THEME_TEXTDOMAIN_ADMIN )
		);

		return $wm_modulesCols;
	}
} // /wm_modules_cp_columns

/*
* Outputting values for the custom columns in the table
*
* $Col = TEXT [column id for switch]
*/
if ( ! function_exists( 'wm_modules_cp_custom_column' ) ) {
	function wm_modules_cp_custom_column( $wm_modulesCol ) {
		global $post;
		$prefix     = 'wm_modules-';
		$prefixMeta = 'module-';

		switch ( $wm_modulesCol ) {
			case $prefix . "thumb":

				$size     = explode( 'x', WM_ADMIN_LIST_THUMB );
				$iconPack = ( wm_option( 'design-icon-pack' ) ) ? ( 'img/icons/custom/' . wm_option( 'design-icon-pack' ) . '/' ) : ( 'img/icons/custom/faenza/' );

				$image = ( wm_meta_option( $prefixMeta . 'icon' ) ) ? ( '<img src="' . WM_ASSETS_THEME . $iconPack . wm_meta_option( $prefixMeta . 'icon' ) . '.png" alt="" />' ) : ( null );
				$image = ( has_post_thumbnail() ) ? ( get_the_post_thumbnail( null, 'widget' ) ) : ( $image );
				$image = ( $image ) ? ( $image ) : ( '<img src="' . WM_ASSETS_ADMIN . 'img/no-thumb.png" alt="' . __( 'No image', WM_THEME_TEXTDOMAIN_ADMIN ) . '" title="' . __( 'No image', WM_THEME_TEXTDOMAIN_ADMIN ) . '" width="' . $size[0] . '" height="' . $size[1] . '" />' );

				if ( get_edit_post_link() )
					edit_post_link( $image );
				else
					echo '<a href="' . get_permalink() . '">' . $image . '</a>';

				if ( 'icon' == wm_meta_option( $prefixMeta . 'type' ) )
					echo ' <small>' . __( '[Icon module]', WM_THEME_TEXTDOMAIN_ADMIN ) . '</small>';

			break;
			case $prefix . "link":

				$wm_modulesLink = esc_url( stripslashes( wm_meta_option( $prefixMeta . 'link' ) ) );
				echo '<a href="' . $wm_modulesLink . '" target="_blank">' . $wm_modulesLink . '</a>';

			break;
			case $prefix . "shortcode":

				$wm_modulesLink = esc_url( stripslashes( wm_meta_option( $prefixMeta . 'link' ) ) );
				echo '<input type="text" onfocus="this.select();" readonly="readonly" value="[content_module id=' . $post->ID . ']" class="shortcode-in-list-table">';

			break;
			default:
			break;
		}
	}
} // /wm_modules_cp_custom_column

?>