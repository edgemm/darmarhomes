<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* CSS stylesheet for WordPress visual editor
*****************************************************
*/

//include WP core
require_once '../../../../../wp-load.php';

/*
*****************************************************
*      OUTPUT
*****************************************************
*/
$out = '';

ob_start(); //This function will turn output buffering on. While output buffering is active no output is sent from the script (other than headers), instead the output is stored in an internal buffer.



$treshold    = ( wm_option( 'design-color-treshold' ) ) ? ( wm_option( 'design-color-treshold' ) ) : ( WM_COLOR_TRESHOLD );
$colorScheme = ( wm_option( 'design-color-scheme' ) ) ? ( wm_option( 'design-color-scheme' ) ) : ( 'default.css' );

//Start including files and editing output
@include 'normalize.css';
@include 'core.css';
@include 'wp-styles.css';
@include 'typography.css';
@include 'columns-990.css';
@include 'shortcodes.css';
@include 'visual-editor-core.css';

//Stop including files and editing output
$out = ob_get_clean(); //output and clear the buffer





/*
*****************************************************
*      CUSTOM STYLES FROM ADMIN PANEL
*****************************************************
*/
//Array of custom styles from admin panel
$customStyles = array(

	/* fonts */
		array(
			'selector' => 'h1, h2, h3, h4, h5, h6',
			'styles' => array(
				'font-family' => ( wm_option( 'design-font-heading-stack' ) ) ? ( str_replace( ';', '', wm_option( 'design-font-' . wm_option( 'design-font-heading-stack' ) ) ) ) : ( null ),
				)
		),
		array(
			'selector' => 'h1',
			'styles' => array(
				'font-size' => ( wm_option( 'design-font-heading-size' ) ) ? ( ( 2 * wm_option( 'design-font-heading-size' ) ) . '%' ) : ( null ),
				)
		),
		array(
			'selector' => 'h2',
			'styles' => array(
				'font-size' => ( wm_option( 'design-font-heading-size' ) ) ? ( ( 1.45 * wm_option( 'design-font-heading-size' ) ) . '%' ) : ( null ),
				)
		),
		array(
			'selector' => 'h3',
			'styles' => array(
				'font-size' => ( wm_option( 'design-font-heading-size' ) ) ? ( ( 1.25 * wm_option( 'design-font-heading-size' ) ) . '%' ) : ( null ),
				)
		),
		array(
			'selector' => 'h4, h5, h6',
			'styles' => array(
				'font-size' => ( wm_option( 'design-font-heading-size' ) ) ? ( ( 1 * wm_option( 'design-font-heading-size' ) ) . '%' ) : ( null ),
				)
		)

);



//Generate CSS output
if ( ! empty( $customStyles ) ) {
	$outStyles = '';

	foreach ( $customStyles as $selector ) {
		if ( isset( $selector['styles'] ) && is_array( $selector['styles'] ) && ! empty( $selector['styles'] ) ) {
			$selectorStyles = '';
			foreach ( $selector['styles'] as $property => $style ) {
				if ( isset( $style ) && $style )
					$selectorStyles .= $property . ': ' . $style . '; ';
			}

			if ( $selectorStyles )
				$outStyles .= $selector['selector'] . ' {' . $selectorStyles . '}' . "\r\n";
		}
	}

	if ( $outStyles )
		$out .= "\r\n\r\n\r\n/* Custom styles */\r\n" . $outStyles;
}





/*
*****************************************************
*      CSS HEADER
*****************************************************
*/
$expireOffset = WM_CSS_EXPIRATION;

header( 'content-type: text/css; charset: UTF-8' );
header( 'expires: ' . gmdate( 'D, d M Y H:i:s', time() + $expireOffset ) . ' GMT' );
header( 'cache-control: public, max-age=' . $expireOffset );

$out = wm_minimize_css( $out );

echo $out;

//Clean the buffer
//ob_end_clean();

?>