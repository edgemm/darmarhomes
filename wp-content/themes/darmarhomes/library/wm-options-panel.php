<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* WebMan Options Panel
* version 1.0
*****************************************************
*/

//Load the options (the same order as the main tabs are)
require_once( WM_OPTIONS . 'a-quickstart.php' );
require_once( WM_OPTIONS . 'a-general.php' );
require_once( WM_OPTIONS . 'a-cta.php' );
require_once( WM_OPTIONS . 'a-slider.php' );
require_once( WM_OPTIONS . 'a-blog.php' );
require_once( WM_OPTIONS . 'a-social.php' );
require_once( WM_OPTIONS . 'a-layout.php' );
require_once( WM_OPTIONS . 'a-design.php' );
require_once( WM_OPTIONS . 'a-seo.php' );
require_once( WM_OPTIONS . 'a-security.php' );





/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Theme installation
add_action( 'after_setup_theme', 'wm_install' );
//Admin panel assets
add_action( 'admin_enqueue_scripts', 'wm_options_panel_include' );
//Menu registration
add_action( 'admin_menu', 'wm_theme_options' );
//Flush rewrites
add_action( 'wp_loaded', 'wm_flush_rewrite' );





/*
*****************************************************
*      STYLES AND SCRIPTS INCLUSION
*****************************************************
*/
/*
* Admin panel assets
*/
if ( ! function_exists( 'wm_options_panel_include' ) ) {
	function wm_options_panel_include() {
		global $current_screen;

		if ( 'toplevel_page_' . WM_THEME_SHORTNAME . '-options' == $current_screen->id ) {
			//styles
			wp_enqueue_style( 'fancybox' );
			wp_enqueue_style( 'tipsy' );
			if ( wm_option( 'design-panel-logo' ) || wm_option( 'design-panel-no-logo' ) )
				wp_enqueue_style( 'wm-options-panel-white-label' );
			else
				wp_enqueue_style( 'wm-options-panel' );
			wp_enqueue_style( 'color-picker' );
			wp_enqueue_style( 'thickbox' );

			//scripts
			wp_enqueue_script( 'jquery-cookies' );
			wp_enqueue_script( 'fancybox' );
			wp_enqueue_script( 'tipsy' );
			wp_enqueue_script( 'wm-options-panel-tabs' );
			wp_enqueue_script( 'wm-options-panel' );
			wp_enqueue_script( 'color-picker' );
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-slider' );
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'media-upload' );
			wp_enqueue_script( 'thickbox' );
		}
	}
} // /wm_options_panel_include





/*
*****************************************************
*      THEME INSTALLATION
*****************************************************
*/
/*
* Theme installation
*/
if ( ! function_exists( 'wm_install' ) ) {
	function wm_install() {
		$themeStatus = get_option( WM_THEME_SETTINGS . '-installed' );

		if ( ! $themeStatus ) {
			/*
			//delete dummy post, page and comment
			wp_delete_post( 1, true );
			wp_delete_post( 2, true );
			wp_delete_comment( 1 );
			*/

			update_option( WM_THEME_SETTINGS . '-installed', 1 );

			//Static settings
			require_once( WM_OPTIONS . 'a-wmstatic.php' );
			$saveStaticOptions = array();
			foreach ( $staticOptions as $value ) {
				$saveStaticOptions[ $value['id'] ] = $value['default'];
			}
			update_option( WM_THEME_SETTINGS_STATIC, $saveStaticOptions );

			$shortname = WM_THEME_SHORTNAME;
			header( "Location: admin.php?page=$shortname-options" );
			die;
		}
	}
} // /wm_install

/*
* Theme uninstallation
*/
if ( ! function_exists( 'wm_uninstall' ) ) {
	function wm_uninstall() {
		delete_option( WM_THEME_SETTINGS . '-installed' );
		delete_option( WM_THEME_SETTINGS );

		update_option( 'template', 'default' );
		update_option( 'stylesheet', 'default' );

		delete_option( 'current_theme' );

		$theme = get_current_theme();

		do_action( 'switch_theme', $theme );
	}
} // /wm_uninstall





/*
*****************************************************
*      ADDING ADMIN PAGE AND SAVING DATA
*****************************************************
*/
/*
* Saving options and adding WordPress admin menu item
*/
if ( ! function_exists( 'wm_theme_options' ) ) {
	function wm_theme_options() {
		global $options, $blog_id;

		//Check that the user is allowed to edit options
		if ( ! current_user_can( 'edit_themes' ) )
			wp_die( __( 'You do not have sufficient permissions to access this page.', WM_THEME_TEXTDOMAIN_ADMIN ) );

		//Saving fields from theme options form
		if ( isset( $_GET['page'] ) && ! empty( $_GET['page'] ) && WM_THEME_SHORTNAME . '-options' == $_GET['page'] ) {
			if ( isset( $_POST['action'] ) && ! empty( $_POST['action'] ) && 'save' == $_POST['action'] ) {
			//Saving

				check_admin_referer( 'wm-theme-options-form' );

				$newOptions = array();

				if ( ! $_POST[ WM_THEME_SETTINGS_PREFIX . 'settingsExporter'] ) {
				//Normal options saving

					foreach ( $options as $value ) {
						if ( isset( $value['id'] ) ) {
							$valId = WM_THEME_SETTINGS_PREFIX . $value['id'];

							if ( isset( $_POST[$valId] ) && $value['id'] ) {

								if ( is_array( $_POST[$valId] ) ) {

									$updValue = $_POST[$valId];
									if ( ! ( isset( $updValue[0] ) && is_array( $updValue[0] ) ) ) {
										$updValue = array_filter( $updValue, 'strlen' ); //removes null array items
										$updValue = array_filter( $updValue, 'wm_remove_negative_array' ); //removes '-1' array items
										if ( ! isset( $value['duplicate'] ) )
											$updValue = array_unique( $updValue ); //removes duplicates from array
									}

								} else {

									if ( isset( $value['validate'] ) && 'url' == $value['validate'] ) {
										$updValue = preg_replace( '/\s+/', '', $_POST[$valId] ); //remove spaces
										$updValue = esc_url( $updValue );
									} elseif ( isset( $value['validate'] ) && 'absint' == $value['validate'] ) {
										$updValue = absint( $_POST[$valId] );
									} elseif ( isset( $value['validate'] ) && 'int' == $value['validate'] ) {
										$updValue = intval( $_POST[$valId] );
									} elseif ( isset( $value['validate'] ) && 'color' == $value['validate'] ) {
										$updValue = ereg_replace( '[^A-Za-z0-9]', '', $_POST[$valId] ); //remove non-alfanumeric characters
										$updValue = preg_replace( '/\s+/', '', esc_attr( $updValue ) ); //remove spaces
										$updValue = ( 6 == strlen( $updValue ) ) ? ( strtolower( $updValue ) ) : ( '' );
									} else {
										$updValue = stripslashes( $_POST[$valId] );
									}

								}

								$newOptions[$valId] = $updValue;

							} elseif ( $value['id'] ) {

								if ( isset( $value['default'] ) && $value['default'] && 'checkbox' != $value['type'] )
									$newOptions[$valId] = $value['default'];
								else
									$newOptions[$valId] = '';

							}
						}
					} // /foreach

				} else {
				//Importing settings

					//decoding new imported options
					$newOptions = htmlspecialchars_decode( gzinflate( base64_decode( $_POST[ WM_THEME_SETTINGS_PREFIX . 'settingsExporter'] ) ) );
					$newOptions = unserialize( $newOptions );

				}

				update_option( WM_THEME_SETTINGS, $newOptions );
				//theme installed status update not to display the intro message again
				update_option( WM_THEME_SETTINGS . '-installed', 2 );

				$shortname = WM_THEME_SHORTNAME;
				header( "Location: admin.php?page=$shortname-options&saved=true" );
				die;

			} elseif ( isset( $_POST['action'] ) && ! empty( $_POST['action'] ) && 'reset' == $_POST['action'] ) {
			//Reset

				check_admin_referer( 'wm-theme-options-reset' );

				delete_option( WM_THEME_SETTINGS );
				delete_option( WM_THEME_SETTINGS . '-installed' );
				delete_option( WM_THEME_SETTINGS_STATIC );

				$shortname = WM_THEME_SHORTNAME;
				header( "Location: admin.php?page=$shortname-options&reset=true" );
				die;

			} elseif ( isset( $_POST['action'] ) && ! empty( $_POST['action'] ) && 'uninstall' == $_POST['action'] ) {
			//Uninstall

				check_admin_referer( 'wm-theme-options-uninstall' );

				wm_uninstall();

				header( "Location: themes.php" );
				die;

			}
		}

		//Adding admin menu item under "Appearance" menu
		//add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function);
		//add_theme_page( WM_THEME_NAME, WM_THEME_NAME, 'edit_themes', WM_THEME_SHORTNAME . '-options', 'wm_theme_options_page' ); //use "themes.php" in redirect
		//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
		add_menu_page( sprintf( __( '%s options', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ), WM_THEME_NAME ), WM_THEME_NAME, 'edit_themes', WM_THEME_SHORTNAME . '-options', 'wm_theme_options_page', WM_ASSETS_ADMIN . 'img/logos/admin-logo.png', 91 ); //use "admin.php" in redirect
	}
} // /wm_theme_options





/*
*****************************************************
*      THEME OPTIONS FORM GENERATOR
*****************************************************
*/
/*
* Admin panel page generator
*/
if ( ! function_exists( 'wm_theme_options_page' ) ) {
	function wm_theme_options_page() {
		global $options, $options_tabs, $wp_version, $current_user;

		$wp_version_class = substr( str_replace( '.', '', $wp_version ), 0, 2 );

		//Theme options page
		?>
	<div class="wm-wrap wm-options-panel wp-<?php echo $wp_version_class; ?> <?php echo $current_user->admin_color; ?>">
		<?php
		//Status messages
		$msg       = array();
		$delayLong = '';

		if ( $wp_version < WM_WP_COMPATIBILITY ) {
			$msg[]     = __( 'THIS THEME IS NOT COMPATIBLE WITH YOUR WORDPRESS VERSION. PLEASE UPGRADE YOUR WORDPRESS INSTALLATION.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL );
			$delayLong = ' class="delay-long warning"';
		}
		if ( isset( $_GET['saved'] ) && ! empty( $_GET['saved'] ) && $_GET['saved'] )
			$msg[] = __( 'Settings were updated successfully.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL );
		if ( isset( $_GET['reset'] ) && ! empty( $_GET['reset'] ) && $_GET['reset'] )
			$msg[] = __( 'Settings were reset.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL );

		//Display message box if any message sent
		if ( ! empty( $msg ) ) {
			$msgOut = '<div id="message"' . $delayLong . ' class="wm-message"><p>';
			$msgOut .=  implode( '<br /><br />', $msg );
			$msgOut .= '</p></div>';
			echo $msgOut;
		}
		?>

		<!-- SIDE PANEL -->
		<div id="nav">
			<!-- Logo -->
			<?php
			$whiteLabel       = ( wm_option( 'design-panel-logo' ) || wm_option( 'design-panel-no-logo' ) ) ? ( 'white-label/' ) : ( null );
			$panelLogoURL     = ( wm_option( 'design-panel-logo' ) || wm_option( 'design-panel-no-logo' ) ) ? ( '#' ) : ( 'http://www.webmandesign.eu' );
			if ( wm_option( 'design-panel-logo' ) && ! wm_option( 'design-panel-no-logo' ) )
				$panelLogoImage = '<img src="' . esc_url( wm_option( 'design-panel-logo' ) ) . '" alt="" />';
			elseif ( wm_option( 'design-panel-no-logo' ) )
				$panelLogoImage = '';
			else
				$panelLogoImage = '<img src="' . WM_ASSETS_ADMIN . 'img/logo-webman-adminpanel.png" alt="WebMan Design" />';

			echo '<a href="' . $panelLogoURL . '" title="WebMan Design" class="logo">' . $panelLogoImage . '</a>';
			?>

			<!-- Main tabs -->
			<ul class="tabs">
				<?php
				if ( is_array( $options ) ) {
					$i = 0;
					foreach ( $options as $value ) {
						if ( 'section-open' == $value['type'] ) {
							++$i;
							$out = '<li class="item-' . $i . ' ' . $value['section-id'] . '"><a href="#set-' . $value['section-id'] . '">';
							$out .= '<span class="icon"><img src="' . WM_ASSETS_ADMIN . 'img/icons/' . $whiteLabel . 'ico-settings-' . $value['section-id'] . '.png" alt="" /></span>';
							$out .= $value['title'];
							$out .= '</a></li>';
							echo $out;
						}
					}
				}
				?>
			</ul> <!-- /tabs -->
		</div> <!-- /nav -->


		<!-- CONTENT -->
		<form class="content no-js" method="post" action="<?php echo admin_url( 'admin.php?page=' . WM_THEME_SHORTNAME . '-options' ); ?>">

			<!-- HEADER -->
			<h2>
				<?php
				if ( wm_option( 'design-panel-logo' ) || wm_option( 'design-panel-no-logo' ) )
					printf( '<small>' . __( 'Using %1$s theme, version %2$s', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</small>', WM_THEME_NAME, WM_THEME_VERSION );
				else
					echo WM_THEME_NAME . ' ' . WM_THEME_VERSION;
				?>
				<input name="save" type="submit" value="<?php _e( 'Save changes', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) ?>" class="btn submit" />
			</h2>

			<!-- MAIN CONTENT -->
			<fieldset id="main">
				<?php wm_render_form( $options ); ?>
			</fieldset> <!-- /main -->

			<!-- FOOTER -->
			<div id="wrap-footer">
				<p>&copy; WebMan | Version 1.2</p>
				<input name="save" type="submit" value="<?php _e( 'Save changes', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) ?>" class="btn submit" />
				<?php wp_nonce_field( 'wm-theme-options-form' ); ?>
				<input type="hidden" name="action" value="save" />
			</div> <!-- /footer -->

		</form> <!-- /content -->

		<?php if ( wm_option( 'general-theme-options-reset' ) ) { //is reset button enabled? ?>
		<form method="post" class="reset-form" action="<?php echo admin_url( 'admin.php?page=' . WM_THEME_SHORTNAME . '-options' ); ?>">
			<input name="reset" type="submit" value="<?php _e( 'Reset defaults', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) ?>" class="btn submit" />
			<?php wp_nonce_field( 'wm-theme-options-reset' ); ?>
			<input type="hidden" name="action" value="reset" />
		</form>
		<?php } ?>

	</div> <!-- /wm-wrap -->
		<?php
	}
} // /wm_theme_options_page





/*
*****************************************************
*      OTHERS
*****************************************************
*/
/*
* Rewrite flush when saving due to permalinks settings
*/
if ( ! function_exists( 'wm_flush_rewrite' ) ) {
	function wm_flush_rewrite() {
		if ( current_user_can( 'edit_themes' ) && isset( $_GET['page'] ) && ! empty( $_GET['page'] ) && WM_THEME_SHORTNAME . '-options' === $_GET['page'] && isset( $_GET['saved'] ) && ! empty( $_GET['saved'] ) && 'true' === $_GET['saved'] ) {
			global $wp_rewrite;
			$wp_rewrite->flush_rules();
		}
	}
} // /wm_flush_rewrite

?>