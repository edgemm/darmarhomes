<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Contextual help generator
*****************************************************
*/

//Load the help text
require_once( WM_HELP . 'a-help.php' );



/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Help
add_action( 'contextual_help', 'wm_help', 10, 3 );





/*
*****************************************************
*      HELP TEXT
*****************************************************
*/
/*
* Contextual help text
*
* $contextual_help, $screen_id, $screen - check WordPress codex for info
*/
if ( ! function_exists( 'wm_help' ) ) {
	function wm_help( $contextual_help, $screen_id, $screen ) {
		global $helpTexts;

		if ( ! ( is_array( $helpTexts ) && isset( $helpTexts[$screen_id] ) && $helpTexts[$screen_id] && is_array( $helpTexts[$screen_id] ) ) )
			return $contextual_help;

		$contextualHelpTabs = $helpTexts[$screen_id];

		if ( wm_check_wp_version( '3.3' ) ) {
		//WP3.3+
			foreach ( $contextualHelpTabs as $contextualHelpTab ) {
				$screen->add_help_tab( array(
					'id'      => $contextualHelpTab['tabId'],
					'title'   => $contextualHelpTab['tabTitle'],
					'content' => $contextualHelpTab['tabContent']
				) );
			}
		} else {
		//WP3.3-
			$contextual_help_add = '';

			foreach ( $contextualHelpTabs as $contextualHelpTab ) {
				$contextual_help_add .= '<div class="contextual-help-tab toggle"><h2 class="contextual-help-tab-title toggle-title">' . $contextualHelpTab['tabTitle'] . '</h2><div class="contextual-help-tab-content toggle-content">' . $contextualHelpTab['tabContent'] . '</div></div>';
			}
			$contextual_help = $contextual_help_add . $contextual_help;

			return $contextual_help;
		}
	}
} // /wm_help

?>