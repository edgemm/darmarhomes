<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Portfolio custom post
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Registering CP
add_action( 'init', 'wm_portfolio_cp_init' );
//CP list table columns
add_action( 'manage_posts_custom_column', 'wm_portfolio_cp_custom_column' );

//FILTERS
//CP list table columns
add_filter( 'manage_edit-wm_portfolio_columns', 'wm_portfolio_cp_columns' );
//Return messages
add_filter( 'post_updated_messages', 'wm_portfolio_cp_messages' );





/*
*****************************************************
*      CREATING A CUSTOM POST
*****************************************************
*/
/*
* Custom post registration
*/
if ( ! function_exists( 'wm_portfolio_cp_init' ) ) {
	function wm_portfolio_cp_init() {
		$role = ( wm_option( 'general-role-portfolio' ) ) ? ( wm_option( 'general-role-portfolio' ) ) : ( 'post' );
		$slug = ( wm_option( 'general-permalink-portfolio' ) ) ? ( wm_option( 'general-permalink-portfolio' ) ) : ( 'portfolio' );

		$args = array(
			'query_var'           => 'portfolio',
			'capability_type'     => $role,
			'public'              => true,
			'show_ui'             => true,
			'exclude_from_search' => false,
			'hierarchical'        => false,
			'rewrite'             => array( 'slug' => $slug ),
			'menu_position'       => ( wm_option( 'general-default-admin-menu' ) ) ? ( 30 ) : ( 7 ),
			'menu_icon'           => WM_ASSETS_ADMIN . 'img/icons/ico-portfolio.png',
			'supports'            => array( 'title', 'editor', 'thumbnail' ),
			'labels'              => array(
				'name'               => __( 'Portfolio', WM_THEME_TEXTDOMAIN_ADMIN ),
				'singular_name'      => __( 'Portfolio', WM_THEME_TEXTDOMAIN_ADMIN ),
				'add_new'            => __( 'Add new item', WM_THEME_TEXTDOMAIN_ADMIN ),
				'add_new_item'       => __( 'Add new item', WM_THEME_TEXTDOMAIN_ADMIN ),
				'new_item'           => __( 'Add new item', WM_THEME_TEXTDOMAIN_ADMIN ),
				'edit_item'          => __( 'Edit item', WM_THEME_TEXTDOMAIN_ADMIN ),
				'view_item'          => __( 'View item', WM_THEME_TEXTDOMAIN_ADMIN ),
				'search_items'       => __( 'Search portfolio', WM_THEME_TEXTDOMAIN_ADMIN ),
				'not_found'          => __( 'No item found', WM_THEME_TEXTDOMAIN_ADMIN ),
				'not_found_in_trash' => __( 'No items found in trash', WM_THEME_TEXTDOMAIN_ADMIN ),
				'parent_item_colon'  => ''
			)
		);
		register_post_type( 'wm_portfolio' , $args );
	}
} // /wm_portfolio_cp_init





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
if ( ! function_exists( 'wm_portfolio_cp_messages' ) ) {
	function wm_portfolio_cp_messages( $messages ) {
		global $post, $post_ID;

		$messages['wm_portfolio'] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => sprintf(
				__( 'Portfolio item updated. <a href="%s">View item</a>', WM_THEME_TEXTDOMAIN_ADMIN ),
				esc_url( get_permalink( $post_ID ) )
				),
			2  => __( 'Custom field updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			3  => __( 'Custom field deleted.', WM_THEME_TEXTDOMAIN_ADMIN ),
			4  => __( 'Portfolio item updated.', WM_THEME_TEXTDOMAIN_ADMIN ),
			5  => ( isset( $_GET['revision'] ) ) ? ( sprintf(
				__( 'Portfolio item restored to revision from %s', WM_THEME_TEXTDOMAIN_ADMIN ),
				wp_post_revision_title( (int) $_GET['revision'], false )
				) ) : ( false ),
			6  => sprintf(
				__( 'Portfolio item published. <a href="%s">View item</a>', WM_THEME_TEXTDOMAIN_ADMIN ),
				esc_url( get_permalink($post_ID) )
				),
			7  => __( 'Portfolio item saved.', WM_THEME_TEXTDOMAIN_ADMIN ),
			8  => sprintf(
				__( 'Portfolio item submitted. <a target="_blank" href="%s">Preview item</a>', WM_THEME_TEXTDOMAIN_ADMIN ),
				esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) )
				),
			9  => sprintf(
				__( 'Portfolio item scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview item</a>', WM_THEME_TEXTDOMAIN_ADMIN ),
				get_the_date() . ', ' . get_the_time(),
				esc_url( get_permalink( $post_ID ) )
				),
			10 => sprintf(
				__( 'Portfolio item draft updated. <a target="_blank" href="%s">Preview item</a>', WM_THEME_TEXTDOMAIN_ADMIN ),
				esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) )
				),
			);

		return $messages;
	}
} // /wm_portfolio_cp_messages





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
if ( ! function_exists( 'wm_portfolio_cp_columns' ) ) {
	function wm_portfolio_cp_columns( $wm_portfolioCols ) {
		$prefix = 'wm_portfolio-';

		$wm_portfolioCols = array(
			//standard columns
			"cb"                 => '<input type="checkbox" />',
			$prefix . "thumb"    => __( 'Image', WM_THEME_TEXTDOMAIN_ADMIN ),
			"title"              => __( 'Portfolio item', WM_THEME_TEXTDOMAIN_ADMIN ),
			"date"               => __( 'Published', WM_THEME_TEXTDOMAIN_ADMIN ),
			"author"             => __( 'Created by', WM_THEME_TEXTDOMAIN_ADMIN ),
			//custom columns
			$prefix . "type"     => __( 'Type', WM_THEME_TEXTDOMAIN_ADMIN ),
			$prefix . "category" => __( 'Category', WM_THEME_TEXTDOMAIN_ADMIN ),
			$prefix . "link"     => __( 'Custom link', WM_THEME_TEXTDOMAIN_ADMIN )
		);

		return $wm_portfolioCols;
	}
} // /wm_portfolio_cp_columns

/*
* Outputting values for the custom columns in the table
*
* $Col = TEXT [column id for switch]
*/
if ( ! function_exists( 'wm_portfolio_cp_custom_column' ) ) {
	function wm_portfolio_cp_custom_column( $wm_portfolioCol ) {
		global $post;
		$prefix     = 'wm_portfolio-';
		$prefixMeta = 'portfolio-';

		switch ( $wm_portfolioCol ) {
			case $prefix . "type":

				$wm_portfolioType = esc_attr( wm_meta_option( $prefixMeta . 'type' ) );
				if ( 'image' == $wm_portfolioType )
					_e( 'Single image', WM_THEME_TEXTDOMAIN_ADMIN );
				elseif ( 'slider' == $wm_portfolioType )
					_e( 'Image slider', WM_THEME_TEXTDOMAIN_ADMIN );
				elseif ( 'video' == $wm_portfolioType )
					_e( 'Video', WM_THEME_TEXTDOMAIN_ADMIN );

			break;
			case $prefix . "category":

				$terms = get_the_terms( $post->ID , 'wm-tax-cats-portfolio' );
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

				$wm_portfolioLink = esc_url( stripslashes( wm_meta_option( $prefixMeta . 'link' ) ) );
				echo '<a href="' . $wm_portfolioLink . '" target="_blank">' . $wm_portfolioLink . '</a>';

			break;
			default:
			break;
		}
	}
} // /wm_portfolio_cp_custom_column

?>