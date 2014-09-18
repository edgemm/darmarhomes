<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Custom taxonomies for custom posts
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Registering taxonomies
add_action( 'init', 'wm_create_taxonomies', 0 );
/*
The init action occurs after the theme's functions file has been included, so if you're looking for terms directly in the functions file, you're doing so before they've actually been registered.
*/





/*
*****************************************************
*      TAXONOMIES FUNCTION
*****************************************************
*/
/*
* Custom taxonomies registration
*/
if ( ! function_exists( 'wm_create_taxonomies' ) ) {
	function wm_create_taxonomies() {
		$slugSlidesCategory    = ( wm_option( 'general-permalink-slides' ) ) ? ( wm_option( 'general-permalink-slides' ) . '/category' ) : ( 'slides/category' );
		$slugPortfolioCategory = ( wm_option( 'general-permalink-portfolio-category' ) ) ? ( wm_option( 'general-permalink-portfolio-category' ) ) : ( 'portfolio/category' );
		$slugTeamPosition      = ( wm_option( 'general-permalink-team' ) ) ? ( wm_option( 'general-permalink-team' ) . '/position' ) : ( 'team/position' );

		//Slides categories
		register_taxonomy( 'wm-tax-cats-slides', 'wm_slides', array(
			'hierarchical'      => true,
			'show_in_nav_menus' => false,
			'show_ui'           => true,
			'query_var'         => 'slides-cats',
			'rewrite'           => array( 'slug' => $slugSlidesCategory ),
			'labels'            => array(
				'name'          => __( 'Slides categories', WM_THEME_TEXTDOMAIN_ADMIN ),
				'singular_name' => __( 'Slides category', WM_THEME_TEXTDOMAIN_ADMIN ),
				'search_items'  => __( 'Search categories', WM_THEME_TEXTDOMAIN_ADMIN ),
				'all_items'     => __( 'All categories', WM_THEME_TEXTDOMAIN_ADMIN ),
				'parent_item'   => __( 'Parent category', WM_THEME_TEXTDOMAIN_ADMIN ),
				'edit_item'     => __( 'Edit category', WM_THEME_TEXTDOMAIN_ADMIN ),
				'update_item'   => __( 'Update category', WM_THEME_TEXTDOMAIN_ADMIN ),
				'add_new_item'  => __( 'Add new category', WM_THEME_TEXTDOMAIN_ADMIN ),
				'new_item_name' => __( 'New category title', WM_THEME_TEXTDOMAIN_ADMIN )
			)
		) );

		//Portfolio categories
		register_taxonomy( 'wm-tax-cats-portfolio', 'wm_portfolio', array(
			'hierarchical'      => true,
			'show_in_nav_menus' => false,
			'show_ui'           => true,
			'query_var'         => 'portfolio-cats',
			'rewrite'           => array( 'slug' => $slugPortfolioCategory ),
			'labels'            => array(
				'name'          => __( 'Portfolio categories', WM_THEME_TEXTDOMAIN_ADMIN ),
				'singular_name' => __( 'Portfolio category', WM_THEME_TEXTDOMAIN_ADMIN ),
				'search_items'  => __( 'Search categories', WM_THEME_TEXTDOMAIN_ADMIN ),
				'all_items'     => __( 'All categories', WM_THEME_TEXTDOMAIN_ADMIN ),
				'parent_item'   => __( 'Parent category', WM_THEME_TEXTDOMAIN_ADMIN ),
				'edit_item'     => __( 'Edit category', WM_THEME_TEXTDOMAIN_ADMIN ),
				'update_item'   => __( 'Update category', WM_THEME_TEXTDOMAIN_ADMIN ),
				'add_new_item'  => __( 'Add new category', WM_THEME_TEXTDOMAIN_ADMIN ),
				'new_item_name' => __( 'New category title', WM_THEME_TEXTDOMAIN_ADMIN )
			)
		) );

		//Team positions
		if ( 'disable' != wm_option( 'general-role-team' ) )
			register_taxonomy( 'wm-tax-positions-team', 'wm_team', array(
				'hierarchical'      => false,
				'show_in_nav_menus' => false,
				'show_ui'           => true,
				'query_var'         => 'team-position',
				'rewrite'           => array( 'slug' => $slugTeamPosition ),
				'labels'            => array(
					'name'                       => __( 'Position', WM_THEME_TEXTDOMAIN_ADMIN ),
					'singular_name'              => __( 'Position', WM_THEME_TEXTDOMAIN_ADMIN ),
					'search_items'               => __( 'Search positions', WM_THEME_TEXTDOMAIN_ADMIN ),
					'all_items'                  => __( 'All positions', WM_THEME_TEXTDOMAIN_ADMIN ),
					'edit_item'                  => __( 'Edit position', WM_THEME_TEXTDOMAIN_ADMIN ),
					'update_item'                => __( 'Update position', WM_THEME_TEXTDOMAIN_ADMIN ),
					'add_new_item'               => __( 'Add new position', WM_THEME_TEXTDOMAIN_ADMIN ),
					'new_item_name'              => __( 'New position title', WM_THEME_TEXTDOMAIN_ADMIN ),
					'separate_items_with_commas' => __( 'A job position of this team member', WM_THEME_TEXTDOMAIN_ADMIN )
				)
			) );
	}
} // /wm_create_taxonomies

?>