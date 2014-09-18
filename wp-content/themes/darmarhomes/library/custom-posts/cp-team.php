<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Team custom post
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Registering CP
add_action( 'init', 'wm_team_cp_init' );
//CP list table columns
add_action( 'manage_posts_custom_column', 'wm_team_cp_custom_column' );

//FILTERS
//CP list table columns
add_filter( 'manage_edit-wm_team_columns', 'wm_team_cp_columns' );
//Return messages
add_filter( 'post_updated_messages', 'wm_team_cp_messages' );





/*
*****************************************************
*      CREATING A CUSTOM POST
*****************************************************
*/
/*
* Custom post registration
*/
if ( ! function_exists( 'wm_team_cp_init' ) ) {
	function wm_team_cp_init() {
		$role = ( wm_option( 'general-role-team' ) ) ? ( wm_option( 'general-role-team' ) ) : ( 'page' );
		$slug = ( wm_option( 'general-permalink-team' ) ) ? ( wm_option( 'general-permalink-team' ) ) : ( 'team-member' );

		$args = array(
			'query_var'           => 'team',
			'capability_type'     => $role,
			'public'              => true,
			'show_in_nav_menus'   => false,
			'show_ui'             => true,
			'exclude_from_search' => true,
			'hierarchical'        => false,
			'rewrite'             => array( 'slug' => $slug ),
			'menu_position'       => ( wm_option( 'general-default-admin-menu' ) ) ? ( 34 ) : ( 32 ),
			'menu_icon'           => WM_ASSETS_ADMIN . 'img/icons/ico-team.png',
			'supports'            => array( 'title', 'thumbnail' ),
			'labels'              => array(
				'name'               => __( 'Team', WM_THEME_TEXTDOMAIN_ADMIN ),
				'singular_name'      => __( 'Team', WM_THEME_TEXTDOMAIN_ADMIN ),
				'add_new'            => __( 'Add new member', WM_THEME_TEXTDOMAIN_ADMIN ),
				'add_new_item'       => __( 'Add new member', WM_THEME_TEXTDOMAIN_ADMIN ),
				'new_item'           => __( 'Add new member', WM_THEME_TEXTDOMAIN_ADMIN ),
				'edit_item'          => __( 'Edit member', WM_THEME_TEXTDOMAIN_ADMIN ),
				'view_item'          => __( 'View member', WM_THEME_TEXTDOMAIN_ADMIN ),
				'search_items'       => __( 'Search members', WM_THEME_TEXTDOMAIN_ADMIN ),
				'not_found'          => __( 'No member found', WM_THEME_TEXTDOMAIN_ADMIN ),
				'not_found_in_trash' => __( 'No members found in trash', WM_THEME_TEXTDOMAIN_ADMIN ),
				'parent_item_colon'  => ''
			)
		);
		register_post_type( 'wm_team' , $args );
	}
} // /wm_team_cp_init





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
if ( ! function_exists( 'wm_team_cp_messages' ) ) {
	function wm_team_cp_messages( $messages ) {
		global $post, $post_ID;

		$messages['wm_team'] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'Member info updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			2  => __( 'Custom field updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			3  => __( 'Custom field deleted.', WM_THEME_TEXTDOMAIN_ADMIN ),
			4  => __( 'Member info updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			5  => ( isset( $_GET['revision'] ) ) ? ( sprintf(
				__( 'Member info restored to revision from %s', WM_THEME_TEXTDOMAIN_ADMIN ),
				wp_post_revision_title( (int) $_GET['revision'], false )
				) ) : ( false ),
			6  => __( 'Member info published.', WM_THEME_TEXTDOMAIN_ADMIN ),
			7  => __( 'Member info saved.', WM_THEME_TEXTDOMAIN_ADMIN ),
			8  => __( 'Member info submitted.', WM_THEME_TEXTDOMAIN_ADMIN ),
			9  => sprintf(
				__( 'Member info scheduled for: <strong>%1$s</strong>.', WM_THEME_TEXTDOMAIN_ADMIN ),
				get_the_date() . ', ' . get_the_time()
				),
			10 => __( 'Member info draft updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			);

		return $messages;
	}
} // /wm_team_cp_messages





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
if ( ! function_exists( 'wm_team_cp_columns' ) ) {
	function wm_team_cp_columns( $wm_teamCols ) {
		$prefix = 'wm_team-';

		$wm_teamCols = array(
			//standard columns
			"cb"                 => '<input type="checkbox" />',
			$prefix . "thumb"    => __( 'Image', WM_THEME_TEXTDOMAIN_ADMIN ),
			"title"              => __( 'Name', WM_THEME_TEXTDOMAIN_ADMIN ),
			"date"               => __( 'Published', WM_THEME_TEXTDOMAIN_ADMIN ),
			"author"             => __( 'Created by', WM_THEME_TEXTDOMAIN_ADMIN ),
			//custom columns
			$prefix . "position" => __( 'Position', WM_THEME_TEXTDOMAIN_ADMIN ),
			$prefix . "excerpt"  => __( 'About', WM_THEME_TEXTDOMAIN_ADMIN )
		);

		return $wm_teamCols;
	}
} // /wm_team_cp_columns

/*
* Outputting values for the custom columns in the table
*
* $Col = TEXT [column id for switch]
*/
if ( ! function_exists( 'wm_team_cp_custom_column' ) ) {
	function wm_team_cp_custom_column( $wm_teamCol ) {
		global $post;
		$prefix = 'wm_team-';

		switch ( $wm_teamCol ) {
			case $prefix . "position":

				$terms = get_the_terms( $post->ID , 'wm-tax-positions-team' );

				if ( $terms ) {
					$out = $separator = '';

					foreach ( $terms as $term ) {
						$out .= $separator . $term->name;
						$separator = ', ';
					}

					echo '<strong>' . $out . '</strong>';
				}

			break;
			case $prefix . "excerpt":

				//the_excerpt();
				wm_excerpt( 'wm_excerpt_length_very_short' );

			break;
			case $prefix . "thumb":

				$size = explode( 'x', WM_ADMIN_LIST_THUMB );
				$image = ( has_post_thumbnail() ) ? ( get_the_post_thumbnail( null, 'widget' ) ) : ( '<img src="' . WM_ASSETS_ADMIN . 'img/no-thumb.png" alt="' . __( 'No image', WM_THEME_TEXTDOMAIN_ADMIN ) . '" title="' . __( 'No image', WM_THEME_TEXTDOMAIN_ADMIN ) . '" width="' . $size[0] . '" height="' . $size[1] . '" />' );

				if ( get_edit_post_link() )
					edit_post_link( $image );
				else
					echo '<a href="' . get_permalink() . '">' . $image . '</a>';

			break;
			default:
			break;
		}
	}
} // /wm_team_cp_custom_column

?>