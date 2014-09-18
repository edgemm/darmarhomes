<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Slides custom post - for sliders
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Registering CP
add_action( 'init', 'wm_slides_cp_init' );
//CP list table columns
add_action( 'manage_posts_custom_column', 'wm_slides_cp_custom_column' );

//FILTERS
//CP list table columns
add_filter( 'manage_edit-wm_slides_columns', 'wm_slides_cp_columns' );
//Return messages
add_filter( 'post_updated_messages', 'wm_slides_cp_messages' );





/*
*****************************************************
*      CREATING A CUSTOM POST
*****************************************************
*/
/*
* Custom post registration
*/
if ( ! function_exists( 'wm_slides_cp_init' ) ) {
	function wm_slides_cp_init() {
		$role = ( wm_option( 'general-role-slides' ) ) ? ( wm_option( 'general-role-slides' ) ) : ( 'page' );
		$slug = ( wm_option( 'general-permalink-slides' ) ) ? ( wm_option( 'general-permalink-slides' ) ) : ( 'slide' );

		$args = array(
			'query_var'           => 'slides',
			'capability_type'     => $role,
			'public'              => true,
			'show_in_nav_menus'   => false,
			'show_ui'             => true,
			'exclude_from_search' => true,
			'hierarchical'        => false,
			'rewrite'             => array( 'slug' => $slug ),
			'menu_position'       => ( wm_option( 'general-default-admin-menu' ) ) ? ( 32 ) : ( 9 ),
			'menu_icon'           => WM_ASSETS_ADMIN . 'img/icons/ico-featured.png',
			'supports'            => array( 'title', 'thumbnail' ),
			'labels'              => array(
				'name'               => __( 'Slides', WM_THEME_TEXTDOMAIN_ADMIN ),
				'singular_name'      => __( 'Slide', WM_THEME_TEXTDOMAIN_ADMIN ),
				'add_new'            => __( 'Add new slide', WM_THEME_TEXTDOMAIN_ADMIN ),
				'add_new_item'       => __( 'Add new slide', WM_THEME_TEXTDOMAIN_ADMIN ),
				'new_item'           => __( 'Add new slide', WM_THEME_TEXTDOMAIN_ADMIN ),
				'edit_item'          => __( 'Edit slide', WM_THEME_TEXTDOMAIN_ADMIN ),
				'view_item'          => __( 'View slide', WM_THEME_TEXTDOMAIN_ADMIN ),
				'search_items'       => __( 'Search slides', WM_THEME_TEXTDOMAIN_ADMIN ),
				'not_found'          => __( 'No slide found', WM_THEME_TEXTDOMAIN_ADMIN ),
				'not_found_in_trash' => __( 'No slides found in trash', WM_THEME_TEXTDOMAIN_ADMIN ),
				'parent_item_colon'  => ''
			)
		);
		register_post_type( 'wm_slides' , $args );
	}
} // /wm_slides_cp_init





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
if ( ! function_exists( 'wm_slides_cp_messages' ) ) {
	function wm_slides_cp_messages( $messages ) {
		global $post, $post_ID;

		$messages['wm_slides'] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'Slide updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			2  => __( 'Custom field updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			3  => __( 'Custom field deleted.', WM_THEME_TEXTDOMAIN_ADMIN ),
			4  => __( 'Slide updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			5  => ( isset( $_GET['revision'] ) ) ? ( sprintf(
				__( 'Slide restored to revision from %s', WM_THEME_TEXTDOMAIN_ADMIN ),
				wp_post_revision_title( (int) $_GET['revision'], false )
				) ) : ( false ),
			6  => __( 'Slide published.', WM_THEME_TEXTDOMAIN_ADMIN ),
			7  => __( 'Slide saved.', WM_THEME_TEXTDOMAIN_ADMIN ),
			8  => __( 'Slide submitted.', WM_THEME_TEXTDOMAIN_ADMIN ),
			9  => sprintf(
				__( 'Slide scheduled for: <strong>%1$s</strong>.', WM_THEME_TEXTDOMAIN_ADMIN ),
				get_the_date() . ', ' . get_the_time()
				),
			10 => __( 'Slide draft updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			);

		return $messages;
	}
} // /wm_slides_cp_messages





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
if ( ! function_exists( 'wm_slides_cp_columns' ) ) {
	function wm_slides_cp_columns( $wm_slidesCols ) {
		$prefix = 'wm_slides-';

		$wm_slidesCols = array(
			//standard columns
			"cb"                 => '<input type="checkbox" />',
			$prefix . "thumb"    => __( 'Image', WM_THEME_TEXTDOMAIN_ADMIN ),
			"title"              => __( 'Slide title', WM_THEME_TEXTDOMAIN_ADMIN ),
			"date"               => __( 'Published', WM_THEME_TEXTDOMAIN_ADMIN ),
			"author"             => __( 'Created by', WM_THEME_TEXTDOMAIN_ADMIN ),
			//custom columns
			$prefix . "category" => __( 'Category', WM_THEME_TEXTDOMAIN_ADMIN ),
			$prefix . "link"     => __( 'Slide link', WM_THEME_TEXTDOMAIN_ADMIN )
		);

		return $wm_slidesCols;
	}
} // /wm_slides_cp_columns

/*
* Outputting values for the custom columns in the table
*
* $Col = TEXT [column id for switch]
*/
if ( ! function_exists( 'wm_slides_cp_custom_column' ) ) {
	function wm_slides_cp_custom_column( $wm_slidesCol ) {
		global $post;
		$prefix     = 'wm_slides-';
		$prefixMeta = 'slide-';

		switch ( $wm_slidesCol ) {
			case $prefix . "category":

				$terms = get_the_terms( $post->ID , 'wm-tax-cats-slides' );
				if ( $terms ) {
					echo '<ul>';
					foreach ( $terms as $term ) {
						$termName = ( isset( $term->name ) ) ? ( $term->name ) : ( null );
						echo '<li>' . $termName . '</li>';
					}
					echo '</ul>';
				}

			break;
			case $prefix . "thumb":

				$size = explode( 'x', WM_ADMIN_LIST_THUMB );
				$image = ( has_post_thumbnail() ) ? ( get_the_post_thumbnail( null, 'widget' ) ) : ( '<img src="' . WM_ASSETS_ADMIN . 'img/no-thumb.png" alt="' . __( 'No image', WM_THEME_TEXTDOMAIN_ADMIN ) . '" title="' . __( 'No image', WM_THEME_TEXTDOMAIN_ADMIN ) . '" width="' . $size[0] . '" height="' . $size[1] . '" />' );

				if ( get_edit_post_link() )
					edit_post_link( $image );
				else
					echo '<a href="' . get_permalink() . '">' . $image . '</a>';

			break;
			case $prefix . "link":

				$wm_slidesLink = esc_url( stripslashes( wm_meta_option( $prefixMeta . 'link' ) ) );
				echo '<a href="' . $wm_slidesLink . '" target="_blank">' . $wm_slidesLink . '</a>';

			break;
			default:
			break;
		}
	}
} // /wm_slides_cp_custom_column

?>