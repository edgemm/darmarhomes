<?php
//include WP core
require_once '../../../../../../wp-load.php';

/*
*****************************************************
*      OUTPUT
*****************************************************
*/

$out     = '';
$prefix  = 'slider-nivo-';
$setNivo = array();

$setNivoKeys = array(
	'effect'           => 'text',
	'slices'           => null,
	'boxCols'          => null,
	'boxRows'          => null,
	'animSpeed'        => null,
	'pauseTime'        => null,
	'pauseOnHover'     => null,
	'manualAdvance'    => null,
	'directionNav'     => null,
	'directionNavHide' => null,
	'prevText'         => 'text',
	'nextText'         => 'text',
	'controlNav'       => null,
	'controlNavThumbs' => null,
	'randomStart'      => null
	);

foreach ( $setNivoKeys as $key => $treatment ) {
	$getOption = strval( wm_option( $prefix . $key ) );

	if ( $getOption ) {

		$value = ( 'text' == $treatment ) ? ( '"' . $getOption . '"' ) : ( $getOption );

		$setNivo[ $key ] = $value;

		if ( 'controlNavThumbs' == $key )
			$setNivo[ 'controlNavThumbsFromRel' ] = $value;

	}
}

$setNivo = wp_parse_args( $setNivo, $setNivoDefaults );

if ( ! empty( $setNivo ) ) {
	$separator = '';

	$out .= "jQuery(function(){
		var speedIn = 400,
		    speedOut = 1000,
		    moveHorizontal = '1500px',
		    moveVertical = '1000px',
		    easing = 'linear';

		jQuery('#nivo-slider').nivoSlider({";
	foreach ( $setNivo as $key => $value ) {
		$out .= $separator . $key . ':' . $value;
		$separator = ',';
	}
	$out .= ",
		afterLoad:function(){
			var captionDiv = jQuery('#nivo-slider .nivo-caption .slider-caption-content');

			if( captionDiv.hasClass('left') || captionDiv.hasClass('right') ) {
				captionDiv.show().animate({left: 0},speedIn,easing);
			} else if( captionDiv.hasClass('top') || captionDiv.hasClass('bottom') ) {
				captionDiv.show().animate({bottom: 0},speedIn,easing);
			} else {
				captionDiv.css({bottom: 0}).fadeIn();
			}
		},
		afterChange:function(){
			var captionDiv = jQuery('#nivo-slider .nivo-caption .slider-caption-content');

			if( captionDiv.hasClass('left') || captionDiv.hasClass('right') ) {
				captionDiv.show().animate({left: 0},speedIn,easing);
			} else if( captionDiv.hasClass('top') || captionDiv.hasClass('bottom') ) {
				captionDiv.show().animate({bottom: 0},speedIn,easing);
			} else {
				captionDiv.css({bottom: 0}).fadeIn();
			}
		},
		beforeChange:function(){
			var captionDiv = jQuery('#nivo-slider .nivo-caption .slider-caption-content');

			if( captionDiv.hasClass('left') ) {
				captionDiv.animate({left: '-'+moveHorizontal},speedOut,easing).fadeOut();
			} else if( captionDiv.hasClass('right') ) {
				captionDiv.animate({left: moveHorizontal},speedOut,easing).fadeOut();
			} else if( captionDiv.hasClass('top') ) {
				captionDiv.animate({bottom: moveVertical},speedOut,easing).fadeOut();
			} else if( captionDiv.hasClass('bottom') ) {
				captionDiv.animate({bottom: '-'+moveVertical},speedOut,easing).fadeOut();
			} else {
				captionDiv.css({bottom: 0, left: 0}).fadeOut();
			}
		}
	});

	});";
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