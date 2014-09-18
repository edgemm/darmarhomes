<?php
//include WP core
require_once '../../../../../../wp-load.php';

/*
*****************************************************
*      OUTPUT
*****************************************************
*/

$out           = '';
$prefix        = 'slider-roundabout-';
$setRoundabout = array();

$setRoundaboutKeys = array(
	'shape'                => 'text',
	'duration'             => null,
	'startingChild'        => null,
	'autoplay'             => null,
	'reflect'              => null,
	'enableDrag'           => null,
	'dropDuration'         => null,
	'minOpacity'           => 'float',
	'minScale'             => 'float',
	'tilt'                 => 'float',
	'easing'               => 'text'
	);

if ( ! wm_option( 'slider-roundabout-autoplay' ) ) {
	$setRoundaboutKeys['autoplayDuration']     = null;
	$setRoundaboutKeys['autoplayPauseOnHover'] = null;
}

foreach ( $setRoundaboutKeys as $key => $treatment ) {
	$getOption = strval( wm_option( $prefix . $key ) );

	if ( $getOption ) {

		if ( 'text' == $treatment )
			$value = '"' . $getOption . '"';
		elseif ( 'float' == $treatment )
			$value = intval( $getOption ) / 100;
		else
			$value = $getOption;

		if ( '"none"' != $value ) {
			$setRoundabout[ $key ] = $value;

			if ( 'easing' == $key && isset( $setRoundabout[ 'easing' ] ) && isset( $setRoundabout[ 'enableDrag' ] ) )
				$setRoundabout[ 'dropEasing' ] = $value;

			if ( 'startingChild' == $key )
				$setRoundabout[ 'startingChild' ] = intval( $value ) - 1;
		}

	}
}

$setRoundabout = wp_parse_args( $setRoundabout, $setRoundaboutDefaults );

if ( ! empty( $setRoundabout ) ) {
	$separator = '';

	$out .= "jQuery(function(){
		var container      = jQuery('#roundabout-slider'),
		    speedIn        = 400,
		    speedOut       = 1000,
		    moveHorizontal = '1500px',
		    moveVertical   = '1000px',
		    easing         = 'linear',
		    lastFocused    = 0;

		container.imagesLoaded( function() {

			container.roundabout({";
		foreach ( $setRoundabout as $key => $value ) {
			$out .= $separator . $key . ':' . $value;
			$separator = ',';
		}
		$out .= "});

			//initial animation
			var captionDiv = jQuery('#roundabout-slider .roundabout-in-focus .slider-caption-content');
			if( captionDiv.hasClass('left') || captionDiv.hasClass('right') ) {
				captionDiv.show().animate({left: 0},speedIn,easing);
			} else if( captionDiv.hasClass('top') || captionDiv.hasClass('bottom') ) {
				captionDiv.show().animate({bottom: 0},speedIn,easing);
			} else {
				captionDiv.css({bottom: 0}).fadeIn();
			}

			jQuery('#roundabout-slider').bind( 'animationEnd', function(){
					var captionDiv = jQuery('#roundabout-slider .roundabout-in-focus .slider-caption-content');

					lastFocused = jQuery('#roundabout-slider .roundabout-in-focus').index();

					if( captionDiv.hasClass('left') || captionDiv.hasClass('right') ) {
						captionDiv.show().animate({left: 0},speedIn,easing);
					} else if( captionDiv.hasClass('top') || captionDiv.hasClass('bottom') ) {
						captionDiv.show().animate({bottom: 0},speedIn,easing);
					} else {
						captionDiv.css({bottom: 0}).fadeIn();
					}
				});

			jQuery('#roundabout-slider').bind( 'animationStart', function(){
					var captionDiv = jQuery('#roundabout-slider .slide').eq( lastFocused ).find('.slider-caption-content');

					if( captionDiv.hasClass('left') ) {
						captionDiv.animate({left: '-'+moveHorizontal},speedOut,easing);
					} else if( captionDiv.hasClass('right') ) {
						captionDiv.animate({left: moveHorizontal},speedOut,easing);
					} else if( captionDiv.hasClass('top') ) {
						captionDiv.animate({bottom: moveVertical},speedOut,easing);
					} else if( captionDiv.hasClass('bottom') ) {
						captionDiv.animate({bottom: '-'+moveVertical},speedOut,easing);
					} else {
						captionDiv.css({bottom: 0, left: 0}).fadeOut();
					}
				});

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