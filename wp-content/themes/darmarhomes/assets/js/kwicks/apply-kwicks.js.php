<?php
//include WP core
require_once '../../../../../../wp-load.php';

/*
*****************************************************
*      OUTPUT
*****************************************************
*/

$out       = '';
$prefix    = 'slider-kwicks-';
$setKwicks = array();

$setKwicksKeys = array(
	'min'          => null,
	'sticky'       => null,
	'defaultKwick' => null,
	'duration'     => null,
	'easing'       => 'text'
	);

foreach ( $setKwicksKeys as $key => $treatment ) {
	$getOption = strval( wm_option( $prefix . $key ) );

	if ( $getOption ) {

		$value = ( 'text' == $treatment ) ? ( '"' . $getOption . '"' ) : ( $getOption );

		if ( '"none"' == $value )
			break;

		$setKwicks[ $key ] = $value;

		if ( 'defaultKwick' == $key && isset( $setKwicks[ 'sticky' ] ) )
			$setKwicks[ 'defaultKwick' ] = intval( $value ) - 1;

	}
}

$setKwicks = wp_parse_args( $setKwicks, $setKwicksDefaults );

if ( ! empty( $setKwicks ) ) {
	$separator = '';

	$out .= "jQuery(function(){
		var slider = jQuery('#kwicks-slider'),
		    wrapperWidth = jQuery('body.boxed #wrap').outerWidth(),
		    slidesCount = slider.children().length,
		    speedIn = 400,
		    speedOut = 1000,
		    moveHorizontal = '1500px',
		    moveVertical = '1000px',
		    easing = 'linear';

		if(!wrapperWidth) wrapperWidth = 960;

		slider.find('li').width(wrapperWidth/slidesCount);

		jQuery('#kwicks-slider').kwicks({";
	foreach ( $setKwicks as $key => $value ) {
		$out .= $separator . $key . ':' . $value;
		$separator = ',';
	}
	$out .= "});

		jQuery('#kwicks-slider .slide').mouseenter(function(){
				var captionDiv = jQuery(this).find('.slider-caption-content');

				if( captionDiv.hasClass('left') || captionDiv.hasClass('right') ) {
					captionDiv.show().animate({left: 0},speedIn,easing);
				} else if( captionDiv.hasClass('top') || captionDiv.hasClass('bottom') ) {
					captionDiv.show().animate({bottom: 0},speedIn,easing);
				} else {
					captionDiv.css({bottom: 0}).fadeIn();
				}
			}).mouseleave(function(){
				var captionDiv = jQuery(this).find('.slider-caption-content');

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