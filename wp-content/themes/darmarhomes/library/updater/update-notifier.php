<?php
/**************************************************************
 *                                                            *
 *   Provides a notification to the user everytime            *
 *   your WordPress theme is updated                          *
 *                                                            *
 *   Author: Joao Araujo                                      *
 *   Profile: http://themeforest.net/user/unisphere           *
 *   Follow me: http://twitter.com/unispheredesign            *
 *                                                            *
 **************************************************************/
/*
*
* Modified by WebMan - www.webmandesign.eu
*
*/

/*
*****************************************************
*      CONTSTANTS
*****************************************************
*/
// Constants for the theme name, folder and remote XML url
define( 'NOTIFIER_THEME_NAME', WM_THEME_NAME ); // The theme name
define( 'NOTIFIER_THEME_FOLDER_NAME', WM_THEME_SHORTNAME ); // The theme folder name
define( 'NOTIFIER_XML_FILE', 'http://www.webmandesign.eu/updates/' . WM_THEME_SHORTNAME . '/' . WM_THEME_SHORTNAME . '-version.xml' ); // The remote notifier XML file containing the latest version of the theme and changelog
define( 'NOTIFIER_CACHE_INTERVAL', 86400 ); // The time interval for the remote XML cache in the database (86400 seconds = 24 hours)





/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
add_action( 'admin_menu', 'update_notifier_menu' );
add_action( 'admin_bar_menu', 'update_notifier_bar_menu', 1000 );





/*
*****************************************************
*      DASHBOARD MENU AND ADMIN BAR
*****************************************************
*/
// Adds an update notification to the WordPress Dashboard menu
function update_notifier_menu() {
	if ( function_exists( 'simplexml_load_string' ) ) { // Stop if simplexml_load_string funtion isn't available
		$xml = get_latest_theme_version( NOTIFIER_CACHE_INTERVAL ); // Get the latest remote XML file on our server

		if ( (float) $xml->latest > (float) WM_THEME_VERSION ) { // Compare current theme version with the remote XML version
			add_dashboard_page( sprintf( __( '%s Theme Updates', WM_THEME_TEXTDOMAIN_ADMIN ), NOTIFIER_THEME_NAME ), NOTIFIER_THEME_NAME . ' <span class="update-plugins count-1"><span class="update-count">1</span></span>', 'administrator', 'theme-update-notifier', 'update_notifier' );
		}
	}
} // /update_notifier_menu



// Adds an update notification to the WordPress 3.1+ Admin Bar
function update_notifier_bar_menu() {
	if ( function_exists( 'simplexml_load_string' ) ) { // Stop if simplexml_load_string funtion isn't available
		global $wp_admin_bar, $wpdb;

		if ( ! is_super_admin() || ! is_admin_bar_showing() ) // Don't display notification in admin bar if it's disabled or the current user isn't an administrator
			return;

		$xml = get_latest_theme_version( NOTIFIER_CACHE_INTERVAL ); // Get the latest remote XML file on our server

		if( (float) $xml->latest > (float) WM_THEME_VERSION ) { // Compare current theme version with the remote XML version
			$wp_admin_bar->add_menu( array( 'id' => 'update_notifier', 'title' => '<span>' . NOTIFIER_THEME_NAME . ' <span id="ab-updates">1</span></span>', 'href' => get_admin_url() . 'index.php?page=theme-update-notifier' ) );
		}
	}
} // /update_notifier_bar_menu





/*
*****************************************************
*      UPDATE NOTIFIER PAGE
*****************************************************
*/
function update_notifier() {
	$xml = get_latest_theme_version( NOTIFIER_CACHE_INTERVAL ); // Get the latest remote XML file on our server
	?>
	<div class="wrap update-notifier">

		<div id="icon-tools" class="icon32"></div>
		<h2><?php printf( __( '<strong>%s</strong> Theme Updates', WM_THEME_TEXTDOMAIN_ADMIN ), NOTIFIER_THEME_NAME ); ?></h2>

		<br />

		<div id="message" class="updated below-h2">
			<p>
			<strong><?php echo $xml->message; ?></strong><br />
			<?php printf( __( 'You have version %1$s installed. Update to version %2$s.', WM_THEME_TEXTDOMAIN_ADMIN ), WM_THEME_VERSION, $xml->latest ); ?>
			</p>
		</div>

		<div id="instructions">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/screenshot.png" alt="" class="theme-img" />

			<h3><?php _e( 'Update Download and Instructions', WM_THEME_TEXTDOMAIN_ADMIN ); ?></h3>

			<p><?php _e( 'To update the Theme, login to <a href="http://www.themeforest.net/">ThemeForest</a>, head over to your <strong>downloads</strong> section and re-download the theme like you did when you bought it.', WM_THEME_TEXTDOMAIN_ADMIN ); ?></p>

			<p><?php _e( 'To install the new updated theme extract the zipped file, look for the extracted theme folder, and after you have all the new files upload them using FTP client (such as <a href="http://filezilla-project.org/download.php">FileZilla</a>) and replace all current theme files.', WM_THEME_TEXTDOMAIN_ADMIN ); ?></p>

			<p class="note"><?php _e( "<strong>Note:</strong> <em>If you didn't make any changes to the theme files, you are free to overwrite them with the new ones without the risk of losing theme settings, pages, posts, etc, and backwards compatibility is guaranteed. In case you have made changes to the theme files, make sure you have a backup copy of the theme files before you overwrite them.</em>", WM_THEME_TEXTDOMAIN_ADMIN ); ?></p>
		</div>

		<div id="changelog" class="note">
		  <div class="icon32 icon32-posts-page" id="icon-edit-pages"><br /></div><h2><?php _e( 'Update Changes', WM_THEME_TEXTDOMAIN_ADMIN ); ?></h2>
			<?php echo $xml->changelog; ?>
		</div>
	</div>
	<?php
} // /update_notifier





/*
*****************************************************
*      REMOTE XML DATA
*****************************************************
*/
// Get the remote XML file contents and return its data (Version and Changelog)
// Uses the cached version if available and inside the time interval defined
function get_latest_theme_version( $interval ) {
	$notifier_file_url           = NOTIFIER_XML_FILE;
	$db_cache_field              = 'notifier-cache';
	$db_cache_field_last_updated = 'notifier-cache-last-updated';
	$last                        = get_option( $db_cache_field_last_updated );
	$now                         = time();

	// check the cache
	if ( ! $last || ( ( $now - $last ) > $interval ) || 2 > intval( get_option( WM_THEME_SETTINGS . '-installed' ) ) ) {
		// cache doesn't exist, or is old, so refresh it
		if ( function_exists( 'curl_init' ) ) { // if cURL is available, use it...
			$ch = curl_init( $notifier_file_url );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch, CURLOPT_HEADER, 0 );
			curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );
			$cache = curl_exec( $ch );
			curl_close( $ch );
		} else {
			$cache = ( file_get_contents( $notifier_file_url ) ) ? ( file_get_contents( $notifier_file_url ) ) : ( '' ); // ...if not, use the common file_get_contents()
		}
		if ( $cache ) {
			// we got good results
			update_option( $db_cache_field, $cache );
			update_option( $db_cache_field_last_updated, time() );
		}
		// read from the cache file
		$notifier_data = get_option( $db_cache_field );
	} else {
		// cache file is fresh enough, so read from it
		$notifier_data = get_option( $db_cache_field );
	}

	// Let's see if the $xml data was returned as we expected it to.
	// If it didn't, use the default 1.0 as the latest version so that we don't have problems when the remote server hosting the XML file is down
	if ( strpos( (string) $notifier_data, '<notifier>' ) === false ) {
		$notifier_data = '<?xml version="1.0" encoding="UTF-8"?><notifier><latest>1.0</latest><changelog></changelog></notifier>';
	}

	// Load the remote XML data into a variable and return it
	$xml = simplexml_load_string( $notifier_data );

	return $xml;
} // /get_latest_theme_version

?>