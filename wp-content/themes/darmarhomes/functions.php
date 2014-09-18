<?php
/*
*****************************************************
*      Jaguar WordPress Theme
*
*      Author: WebMan - www.webmandesign.eu
*      http://www.webmandesign.eu
*****************************************************
*/

//Getting theme data
$shortname      = get_template();
if ( function_exists( 'wp_get_theme' ) ) {
	//WP 3.4+
	$themeData    = wp_get_theme( $shortname );
	$themeName    = $themeData->Name;
	$themeVersion = $themeData->Version;
} else {
	//WP 3.3-
	$themeData    = get_theme_data( STYLESHEETPATH . '/style.css' );
	$themeName    = trim( $themeData['Title'] );
	$themeVersion = trim( $themeData['Version'] );
}
if( ! $themeVersion )
	$themeVersion = '';
$options        = array();
$widgetAreas    = array();

//Theme constants
define( 'WM_THEME_NAME',      $themeName );
define( 'WM_THEME_SHORTNAME', $shortname );
define( 'WM_THEME_VERSION',   $themeVersion );

define( 'WM_THEME_SETTINGS_PREFIX', 'wm-' );
define( 'WM_THEME_SETTINGS',        WM_THEME_SETTINGS_PREFIX . $shortname );
define( 'WM_THEME_SETTINGS_META',   WM_THEME_SETTINGS . '-meta' );
define( 'WM_THEME_SETTINGS_STATIC', WM_THEME_SETTINGS . '-static' );

define( 'WM_ADMIN_LIST_THUMB',         '50x50' ); //thumbnail size (width x height) on post/page/custom post listings
define( 'WM_CSS_EXPIRATION',           ( WP_DEBUG || 2 > intval( get_option( WM_THEME_SETTINGS . '-installed' ) ) ) ? ( 30 ) : ( 172800 ) ); //60sec * 60min * 24hours * 2days
define( 'WM_DEFAULT_EXCERPT_LENGTH',   40 ); //words count
define( 'WM_SCRIPTS_VERSION',          20120819 );
define( 'WM_TWITTER_CACHE_EXPIRATION', 900 ); //60sec * 15min
define( 'WM_WP_COMPATIBILITY',         3.1 );

define( 'WM_ADMIN_PANEL_THEME', '' ); //leave empty to use default

//Directories
define( 'WM_COLOR_SCHEMES', TEMPLATEPATH . '/assets/css/colors/' );
define( 'WM_CUSTOMS',       TEMPLATEPATH . '/library/custom-posts/' );
define( 'WM_HELP',          TEMPLATEPATH . '/library/help/' );
define( 'WM_HOOKS',         TEMPLATEPATH . '/library/hooks/' );
define( 'WM_LANGUAGES',     TEMPLATEPATH . '/langs' );
define( 'WM_LIBRARY',       TEMPLATEPATH . '/library/' );
define( 'WM_META',          TEMPLATEPATH . '/library/meta/' );
define( 'WM_OPTIONS',       TEMPLATEPATH . '/library/options/' );
define( 'WM_SHORTCODES',    TEMPLATEPATH . '/library/shortcodes/' );
define( 'WM_SLIDERS',       TEMPLATEPATH . '/library/sliders/' );
define( 'WM_STYLES',        TEMPLATEPATH . '/library/styles/' );
define( 'WM_WIDGETS',       TEMPLATEPATH . '/library/widgets/' );

//Localization
define( 'WM_THEME_TEXTDOMAIN',             $shortname . '_domain' );
define( 'WM_THEME_TEXTDOMAIN_ADMIN',       WM_THEME_TEXTDOMAIN.'_adm' );
define( 'WM_THEME_TEXTDOMAIN_ADMIN_PANEL', WM_THEME_TEXTDOMAIN.'_panel' );
define( 'WM_THEME_TEXTDOMAIN_HELP',        WM_THEME_TEXTDOMAIN.'_help' );

//URLs
define( 'WM_ASSETS_THEME',      get_template_directory_uri() . '/assets/' );
define( 'WM_ASSETS_ADMIN',      get_template_directory_uri() . '/library/assets/' );
define( 'WM_SHORTCODES_URI',    get_template_directory_uri() . '/library/shortcodes/' );
define( 'WM_PLACEHOLDER_SLIDE', get_template_directory_uri() . '/assets/img/slide.gif' );

//Theme layout constants
//slider image size width x height
define( 'WM_SLIDER_IMAGE_WIDTH',  1200 );
define( 'WM_SLIDER_IMAGE_HEIGHT', 360 );
//"left", "right", "none"
define( 'WM_SIDEBAR_FALLBACK', 'default' ); //fallback sidebar ID
define( 'WM_SIDEBAR_DEFAULT',  'right' );
//text color switcher treshold
define( 'WM_COLOR_TRESHOLD', 140 );
//default header sections positions
define( 'WM_HEADER_SECTIONS_POSITIONS', 's-c-h' );

//Get theme options
$themeOptions = get_option( WM_THEME_SETTINGS );



//Global functions
require_once( WM_LIBRARY . 'core.php' );
//Theme settings
require_once( WM_LIBRARY . 'setup.php' );
//Admin functions
require_once( WM_LIBRARY . 'admin.php' );

?>