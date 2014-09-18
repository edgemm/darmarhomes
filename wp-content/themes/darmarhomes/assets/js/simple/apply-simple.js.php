<?php
//include WP core
require_once '../../../../../../wp-load.php';

/*
*****************************************************
*      OUTPUT
*****************************************************
*/

$out       = '';
$prefix    = 'slider-simple-';
$setSimple = array();

$setSimpleKeys = array(
	'transitionTime' => null,
	'slideDuration'  => null
	);

foreach ( $setSimpleKeys as $key => $treatment ) {
	$getOption = strval( wm_option( $prefix . $key ) );

	if ( $getOption ) {

		$value = ( 'text' == $treatment ) ? ( '"' . $getOption . '"' ) : ( $getOption );

		$setSimple[ $key ] = $value;

		if ( 'controlNavThumbs' == $key )
			$setSimple[ 'controlNavThumbsFromRel' ] = $value;

	}
}

$setSimple = wp_parse_args( $setSimple, $setSimpleDefaults );

if ( ! empty( $setSimple ) ) {
	$separator = '';

	$out .= "jQuery(function(){ jQuery('#simple-slider').simpleSlider({";
	foreach ( $setSimple as $key => $value ) {
		$out .= $separator . $key . ':' . $value;
		$separator = ',';
	}
	$out .= "}); });";
}





/*
*****************************************************
*      JS HEADER
*****************************************************
*/
$expireOffset = WM_CSS_EXPIRATION;

header( 'content-type: text/javascript; charset: UTF-8' );
header( 'expires: ' . gmdate( 'D, d M Y H:i:s', time() + $expireOffset ) . ' GMT' );
header( 'cache-control: public, max-age=' . $expireOffset );

echo $out;

?>