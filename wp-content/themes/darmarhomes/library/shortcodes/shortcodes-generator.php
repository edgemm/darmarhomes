<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* WebMan Shortcodes Generator
*****************************************************
*/

//Include shortcodes generator array
require_once( WM_SHORTCODES . 'a-shortcodes.php' );





/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
$wmGeneratorIncludes = array( 'post.php', 'post-new.php' );
if ( in_array( $pagenow, $wmGeneratorIncludes ) ) {
	add_action( 'admin_enqueue_scripts', 'wm_mce_assets', 1000 );
	add_action( 'init', 'wm_shortcode_generator_button' );
	add_action( 'admin_footer', 'wm_add_generator_popup', 1000 );
}





/*
*****************************************************
*      ASSETS NEEDED
*****************************************************
*/
/*
* Assets files
*/
if ( ! function_exists( 'wm_mce_assets' ) ) {
	function wm_mce_assets() {
		global $pagenow;

		$wmGeneratorIncludes = array( 'post.php', 'post-new.php' );

		if ( in_array( $pagenow, $wmGeneratorIncludes ) ) {
			//styles
			wp_enqueue_style( 'wm-buttons' );

			//scripts
			wp_enqueue_script( 'wm-shortcodes' );
		}
	}
} // /wm_mce_assets





/*
*****************************************************
*      TINYMCE BUTTON REGISTRATION
*****************************************************
*/
/*
* Register visual editor custom button position
*/
if ( ! function_exists( 'wm_register_tinymce_buttons' ) ) {
	function wm_register_tinymce_buttons( $buttons ) {
		$wmButtons = array( '|', 'wm_mce_button' );

		array_push( $buttons, implode( ',', $wmButtons ) );

		return $buttons;
	}
} // /wm_register_tinymce_buttons



/*
* Register the button functionality script
*/
if ( ! function_exists( 'wm_add_tinymce_plugin' ) ) {
	function wm_add_tinymce_plugin( $plugin_array ) {
		$plugin_array['wm_mce_button'] = WM_ASSETS_ADMIN . 'js/shortcodes/wm-mce-button.js?ver=' . WM_SCRIPTS_VERSION;

		return $plugin_array;
	}
} // /wm_add_tinymce_plugin



/*
* Adding the button to visual editor
*/
if ( ! function_exists( 'wm_shortcode_generator_button' ) ) {
	function wm_shortcode_generator_button() {
		if ( ! ( current_user_can( 'edit_posts' ) || current_user_can( 'edit_pages' ) ) )
			return;

		if ( 'true' == get_user_option( 'rich_editing' ) ) {
			//filter the tinymce buttons and add custom ones
			add_filter( 'mce_external_plugins', 'wm_add_tinymce_plugin' );
			add_filter( 'mce_buttons_2', 'wm_register_tinymce_buttons' );
		}
	}
} // /wm_shortcode_generator_button





/*
*****************************************************
*      SHORTCODE GENERATOR POPUP
*****************************************************
*/
/*
* Shortcode generator popup form
*/
if ( ! function_exists( 'wm_add_generator_popup' ) ) {
	function wm_add_generator_popup() {
		global $wmShortcodeGeneratorTabs;

		$shortcodes = $wmShortcodeGeneratorTabs;

		$out = '<div id="wm-shortcode-generator">';
		$out .= '<div id="wm-shortcode-form">';

		if ( ! empty( $shortcodes ) ) {

			//tabs
			$out .= '<ul class="wm-tabs">';
			foreach ( $shortcodes as $shortcode ) {
				$shortcodeId = 'wm-generate-' . $shortcode['id'];
				$out .= '<li><a href="#' . $shortcodeId . '">' . $shortcode['name'] . '</a></li>';
			}
			$out .= '</ul>';

			//content
			$out .= '<div class="wm-tabs-content">';
			foreach ( $shortcodes as $shortcode ) {

				$shortcodeId         = 'wm-generate-' . $shortcode['id'];
				$settings            = ( isset( $shortcode['settings'] ) ) ? ( $shortcode['settings'] ) : ( null );
				$shortcodeOutputHTML = ( isset( $shortcode['output'] ) ) ? ( $shortcode['output'] ) : ( null );
				$shortcodeOutput     = ( isset( $shortcode['output-shortcode'] ) ) ? ( $shortcode['output-shortcode'] ) : ( null );
				$close               = ( isset( $shortcode['close'] ) ) ? ( ' ' . $shortcode['close'] ) : ( null );
				$settingsCount       = count( $settings );

				$out .= '<div id="' . $shortcodeId . '" class="tab-content"><p class="shortcode-title"><strong>' . $shortcode['name'] . '</strong> ' . __( 'shortcode', WM_THEME_TEXTDOMAIN_ADMIN ) . '</p>';

				$out .= '<div class="form-wrap"><form method="get" action=""><table class="items-' . $settingsCount . '">';

				if ( $settings ) {
					$i = 0;
					foreach ( $settings as $id => $labelValue ) {
						$i++;
						$desc      = ( isset( $labelValue['desc'] ) ) ? ( esc_attr( $labelValue['desc'] ) ) : ( '' );
						$maxlength = ( isset( $labelValue['maxlength'] ) ) ? ( ' maxlength="' . absint( $labelValue['maxlength'] ) . '"' ) : ( '' );

						$out .= '<tr class="item-' . $i . '"><td>';
						$out .= '<label for="' . $shortcodeId . '-' . $id . '" title="' . $desc . '">' . $labelValue['label'] . '</label></td><td>';
						if ( is_array( $labelValue['value'] ) ) {

							$out .= '<select name="' . $shortcodeId . '-' . $id . '" id="' . $shortcodeId . '-' . $id . '" title="' . $desc . '">';
							foreach ( $labelValue['value'] as $value => $valueName ) {
								$out .= '<option value="' . $value . '">' . $valueName . '</option>';
							}
							$out .= '</select>';

						} else {

							$out .= '<input type="text" name="' . $shortcodeId . '-' . $id . '" value="' . $labelValue['value'] . '" id="' . $shortcodeId . '-' . $id . '" class="widefat" title="' . $desc . '"' . $maxlength . ' /><img src="' . WM_ASSETS_ADMIN . 'img/shortcodes/apply.png" alt="' . __( 'Apply changes', WM_THEME_TEXTDOMAIN_ADMIN ) . '" title="' . __( 'Apply changes', WM_THEME_TEXTDOMAIN_ADMIN ) . '" class="ico-apply" />';

						}
						$out .= '</td></tr>';
					}
				}

				$out .= '<tr><td>&nbsp;</td><td><p><a data-parent="' . $shortcodeId . '" class="send-to-generator button-primary">' . __( 'Insert into editor', WM_THEME_TEXTDOMAIN_ADMIN ) . '</a></p></td></tr>';
				$out .= '</table>';

				$out .= '<textarea name="wm-shortcode-html-reference" class="wm-shortcode-html-reference" cols="6" rows="2" style="display:none">' . $shortcodeOutputHTML . '</textarea>';
				$out .= '<textarea name="wm-shortcode-reference" class="wm-shortcode-reference" cols="6" rows="2" style="display:none">' . $shortcodeOutput . '</textarea>';
				$out .= '<textarea name="wm-shortcode-html-output" class="wm-shortcode-html-output' . $close . '" cols="6" rows="2" style="display:none">' . $shortcodeOutputHTML . '</textarea></form>';

				$out .= '<p><strong>' . __( 'Or copy and insert this shortcode', WM_THEME_TEXTDOMAIN_ADMIN ) . '</strong></p>';
				$out .= '<div class="wm-shortcode-output">' . esc_attr( $shortcodeOutput ) . '</div>';
				$out .= '</div>';
				$out .= '</div>';

			}
			$out .= '</div> <!-- /wm-tabs-content -->';

		}

		$out .= '</div><p><small>&copy; WebMan, <a href="http://www.webmandesign.eu" target="_blank">webmandesign.eu</a></small></p></div>';

		echo $out;
	}
} // /wm_add_generator_popup

?>