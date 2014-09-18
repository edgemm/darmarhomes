<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Basic theme setup
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Adding assets into HTML head
add_action( 'wp_enqueue_scripts', 'wm_site_assets' );

//FILTERS
//Shortcodes in text widget
add_filter( 'widget_text', 'do_shortcode' );
//Remove <p> tag from excerpt:
remove_filter( 'the_excerpt', 'wpautop' );





/*
*****************************************************
*      SECURITY
*****************************************************
*/
//Generic login error messages
if ( ! function_exists( 'wm_login_generic_message' ) ) {
	function wm_login_generic_message() {
		return __( 'It seems something went wrong...', WM_THEME_TEXTDOMAIN_ADMIN );
	}
} // /wm_login_generic_message

//Hide login errors
if ( wm_option( 'security-login-error' ) )
	add_filter( 'login_errors', 'wm_login_generic_message' );

//Remove WP version from HTML header
if ( wm_option( 'security-wp-version' ) )
	remove_action( 'wp_head', 'wp_generator' );

//Rremove Windows Live Writer support
if ( wm_option( 'security-live-writer' ) )
	remove_action( 'wp_head', 'wlwmanifest_link' );





/*
*****************************************************
*      THEME SUPPORT
*****************************************************
*/
//Post formats
add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'status', 'video' ) );

//Feed links
$customRSS = wm_social_links( array(
	'links'    => wm_option( 'contact-social' ),
	'networks' => array( 'rss' )
	 ) );
if ( ! $customRSS['rss'] )
	add_theme_support( 'automatic-feed-links' );

//Custom menus
add_theme_support( 'menus' );
//register menus
register_nav_menus( array(
	'main-navigation'   => __( 'Main navigation', WM_THEME_TEXTDOMAIN_ADMIN ),
	'footer-navigation' => __( 'Footer navigation', WM_THEME_TEXTDOMAIN_ADMIN )
	) );

//Thumbnails support
add_theme_support( 'post-thumbnails' ); //thumbs just for posts in categories
//image sizes (x, y, crop)
//frontend image sizes
add_image_size( 'blog', 720, 200, true );
add_image_size( 'portfolio', 720, 720, true );
add_image_size( 'portfolio-no-crop', 720, 9999, false );
add_image_size( 'widget', 50, 50, true );
add_image_size( 'logo', 80, 60, false );
//slider image size
add_image_size( 'slide', WM_SLIDER_IMAGE_WIDTH, WM_SLIDER_IMAGE_HEIGHT, true );





/*
*****************************************************
*      LOCALIZATION
*****************************************************
*/
load_theme_textdomain( WM_THEME_TEXTDOMAIN, WM_LANGUAGES );
if( is_admin() ) {
	load_theme_textdomain( WM_THEME_TEXTDOMAIN_ADMIN, WM_LANGUAGES . '/admin' );
	load_theme_textdomain( WM_THEME_TEXTDOMAIN_HELP, WM_LANGUAGES . '/help' );
}
if( is_admin() && current_user_can( 'edit_themes' ) )
	load_theme_textdomain( WM_THEME_TEXTDOMAIN_ADMIN_PANEL, WM_LANGUAGES . '/wm-admin-panel' );





/*
*****************************************************
*      OTHERS
*****************************************************
*/
/*
* Frontend HTML head assets
*/
if ( ! function_exists( 'wm_site_assets' ) ) {
	function wm_site_assets() {
		global $post;

		//styles
		wp_enqueue_style( 'prettyphoto' );
		if ( ! wm_option( 'general-tipsy' ) )
			wp_enqueue_style( 'tipsy' );
		if( isset( $post ) && 'wm_portfolio' === $post->post_type && 'slider' === wm_meta_option( 'portfolio-type' ) )
			wp_enqueue_style( 'simple-slider' );

		//scripts
		//jquery - only on frontend
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', WM_ASSETS_THEME . 'js/jquery/jquery.1.7.1.min.js', false, '1.7.1', true );
		//wp_register_script( 'jquery', 'http' . ( 443 == $_SERVER['SERVER_PORT']  ? 's' : '' ) . '://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', false, null, true );

		wp_enqueue_script( 'jquery-theme' );
		wp_enqueue_script( 'prettyphoto' );
		if ( ! wm_option( 'general-tipsy' ) )
			wp_enqueue_script( 'tipsy' );

		if ( isset( $post ) && 'pagetpl-portfolio.php' == get_post_meta( $post->ID, '_wp_page_template', TRUE ) && wm_meta_option( 'portfolio-filterable' ) ) {
			wp_enqueue_script( 'quicksand' );
			wp_enqueue_script( 'portfolio' );
		}

		if( isset( $post ) && 'wm_portfolio' === $post->post_type && 'slider' === wm_meta_option( 'portfolio-type' ) )
			wp_enqueue_script( 'simple-slider' );

		wp_enqueue_script( 'wm-theme-scripts' );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply', false, false, false, true ); //true to put it into footer
	}
} // /wm_site_assets



//Max content width
if ( ! isset( $content_width ) )
	$content_width = 680;

?>