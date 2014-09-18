<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* CSS stylesheet generator
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
@include 'forms.css';
@include 'typography.css';
@include 'header.css';
@include 'slider.css';
@include 'columns-990.css';
@include 'content.css';
@include 'comments.css';
@include 'sidebar.css';
@include 'footer.css';
@include 'shortcodes.css';
@include 'colors/' . $colorScheme;

//Stop including files and editing output
$out = ob_get_clean(); //output and clear the buffer





/*
*****************************************************
*      CUSTOM STYLES FROM ADMIN PANEL
*****************************************************
*/
//basic colors
//text colors basics
$textOnLight         = ( wm_option( 'design-color-bglight' ) ) ? ( wm_option( 'design-color-bglight', 'color' ) ) : ( '#000000' );
$textOnLightHeadings = ( wm_option( 'design-color-bglight-headings' ) ) ? ( wm_option( 'design-color-bglight-headings', 'color' ) ) : ( '#000000' );
$textOnDark         = ( wm_option( 'design-color-bgdark' ) ) ? ( wm_option( 'design-color-bgdark', 'color' ) ) : ( '#ffffff' );
$textOnDarkHeadings = ( wm_option( 'design-color-bgdark-headings' ) ) ? ( wm_option( 'design-color-bgdark-headings', 'color' ) ) : ( '#ffffff' );

//elements
if ( ! wm_option( 'design-type-gray-color', 'color' ) )
	$grayTextColor = ( $treshold > wm_color_brightness( wm_option( 'design-type-gray-bg-color' ) ) ) ? ( $textOnDarkHeadings ) : ( $textOnLightHeadings );
else
	$grayTextColor = wm_option( 'design-type-gray-color', 'color' );

if ( ! wm_option( 'design-type-green-color', 'color' ) )
	$greenTextColor = ( $treshold > wm_color_brightness( wm_option( 'design-type-green-bg-color' ) ) ) ? ( $textOnDarkHeadings ) : ( $textOnLightHeadings );
else
	$greenTextColor = wm_option( 'design-type-green-color', 'color' );

if ( ! wm_option( 'design-type-blue-color', 'color' ) )
	$blueTextColor = ( $treshold > wm_color_brightness( wm_option( 'design-type-blue-bg-color' ) ) ) ? ( $textOnDarkHeadings ) : ( $textOnLightHeadings );
else
	$blueTextColor = wm_option( 'design-type-blue-color', 'color' );

if ( ! wm_option( 'design-type-orange-color', 'color' ) )
	$orangeTextColor = ( $treshold > wm_color_brightness( wm_option( 'design-type-orange-bg-color' ) ) ) ? ( $textOnDarkHeadings ) : ( $textOnLightHeadings );
else
	$orangeTextColor = wm_option( 'design-type-orange-color', 'color' );

if ( ! wm_option( 'design-type-red-color', 'color' ) )
	$redTextColor = ( $treshold > wm_color_brightness( wm_option( 'design-type-red-bg-color' ) ) ) ? ( $textOnDarkHeadings ) : ( $textOnLightHeadings );
else
	$redTextColor = wm_option( 'design-type-red-color', 'color' );

if ( ! wm_option( 'design-main-heading-color', 'color' ) && wm_option( 'design-main-heading-bg-color' ) )
	$mainHeadingTextColor = ( $treshold > wm_color_brightness( wm_option( 'design-main-heading-bg-color' ) ) ) ? ( $textOnDarkHeadings ) : ( $textOnLightHeadings );
else
	$mainHeadingTextColor = wm_option( 'design-main-heading-color', 'color' );

//wrap shadow
if ( wm_option( 'design-wrap-shadow' ) )
	$wrapShadow = '0 10px 20px 0 rgba(0,0,0,' . ( absint( wm_option( 'design-wrap-shadow' ) ) / 100 ) . ')';
elseif ( 0 === absint( wm_option( 'design-wrap-shadow' ) ) )
	$wrapShadow = 'none';
else
	$wrapShadow = null;

//header link color
if ( wm_option( 'design-header-color' ) )
	$headerLinkColor = wm_option( 'design-header-color', 'color !important' );
elseif ( wm_option( 'design-wrap-color' ) && ! wm_option( 'design-header-bg-color' ) )
	$headerLinkColor = wm_option( 'design-wrap-color', 'color !important' );
else
	$headerLinkColor = null;

//Array of custom styles from admin panel
$customStyles = array(

	/* link color */
		array(
			'selector' => 'a, .bg-light .article-content a, .bg-dark .article-content a, a:hover',
			'styles' => array(
				'color' => wm_option( 'design-link-color', 'color' ),
				)
		),
		array(
			'selector' => 'a.btn, input[type="submit"], .icon-format, .portfolio-content .desc a, .portfolio-nav ul li a:hover, .portfolio-nav ul li.active a, .simpleSlider-nav a, .nivo-controlNav a, .nivo-directionNav a',
			'styles' => array(
				'background-color' => wm_option( 'design-link-color', 'color' ),
			)
		),
		array(
			'selector' => '.simpleSlider-nav a.active, .simpleSlider-nav a:hover, .nivo-controlNav a.active, .nivo-controlNav a:hover, .nivo-directionNav a:hover',
			'styles' => array(
				'background-color' => ( $treshold > wm_color_brightness( wm_option( 'design-link-color' ) ) ) ? ( '#fff' ) : ( '#000' ),
			)
		),
		array(
			'selector' => '::-moz-selection',
			'styles' => array(
				'background-color' => wm_option( 'design-link-color', 'color' ),
				'color' => ( $treshold > wm_color_brightness( wm_option( 'design-link-color' ) ) ) ? ( '#fff' ) : ( '#000' ),
			)
		),
		array(
			'selector' => '::selection',
			'styles' => array(
				'background-color' => wm_option( 'design-link-color', 'color' ),
				'color' => ( $treshold > wm_color_brightness( wm_option( 'design-link-color' ) ) ) ? ( '#fff' ) : ( '#000' ),
			)
		),
		array(
			'selector' => 'a.btn, input[type="submit"], #nav-main li a:hover span, #nav-main li:hover > a span, #nav-main li.active > a span, #nav-main li.current-menu-item > a span, #nav-main li.current-menu-parent > a span, #nav-main li.current-post-ancestor > a span, #nav-main li.current-page-ancestor > a span, #nav-main li.current-menu-ancestor > a span, #contact-section:hover .contact-link > span, #contact-section.active .contact-link > span',
			'styles' => array(
				'border-color' => wm_option( 'design-link-color', 'color' ),
			)
		),



	/* colors */
		array(
			'selector' => '.bg-light, .bg-light h2.subtitle, .bg-light ul.tabs a, .bg-light .active .accordion-heading, .bg-light #nav-main a, .contact-link.bg-light, .bg-light .page-404 h1',
			'styles' => array(
				'color' => $textOnLight,
				)
		),
		array(
			'selector' => '.bg-dark, .bg-dark h2.subtitle, .bg-dark ul.tabs a, .bg-dark .active .accordion-heading, .bg-dark #nav-main a, .contact-link.bg-dark, .bg-dark .page-404 h1',
			'styles' => array(
				'color' => $textOnDark,
			)
		),
		array(
			'selector' => '.bg-light h1, .bg-light h2, .bg-light h3, .bg-light h4, .bg-light h5, .bg-light h6, .bg-light h1 a, .bg-light h2 a, .bg-light h3 a, .bg-light h4 a, .bg-light h5 a, .bg-light h6 a, .bg-light .big-size, .bg-light .widget h3 a',
			'styles' => array(
				'color' => $textOnLightHeadings,
			)
		),
		array(
			'selector' => '.bg-dark h1, .bg-dark h2, .bg-dark h3, .bg-dark h4, .bg-dark h5, .bg-dark h6, .bg-dark h1 a, .bg-dark h2 a, .bg-dark h3 a, .bg-dark h4 a, .bg-dark h5 a, .bg-dark h6 a, .bg-dark .big-size, .bg-dark .widget h3 a',
			'styles' => array(
				'color' => $textOnDarkHeadings,
			)
		),

		array(
			'selector' => 'html',
			'styles' => array(
				'background-color' => ( 'boxed' === wm_option( 'layout-boxed' ) && wm_option( 'design-body-bg-color', 'color' ) && ! ( wm_option( 'design-body-bg-img-url' ) || wm_option( 'design-body-bg-pattern' ) ) ) ? ( wm_option( 'design-body-bg-color', 'color' ) ) : ( null ),
				'background' => ( 'boxed' === wm_option( 'layout-boxed' ) && ( wm_option( 'design-body-bg-img-url' ) || wm_option( 'design-body-bg-pattern' ) ) ) ? ( wm_css_background( 'design-body-' ) ) : ( null ),
			)
		),
		array(
			'selector' => '#wrap, .boxed #wrap',
			'styles' => array(
				'background' => wm_css_background( 'design-wrap-' ),
				'color' => wm_option( 'design-wrap-color', 'color' ),
				'-webkit-box-shadow' => $wrapShadow,
				'-moz-box-shadow' => $wrapShadow,
				'box-shadow' => $wrapShadow,
			)
		),
		array(
			'selector' => '#header',
			'styles' => array(
				'background' => wm_css_background( 'design-header-' ),
			)
		),
			array(
				'selector' => '#header, #nav-main a, .contact-link',
				'styles' => array(
					'color' => $headerLinkColor,
				)
			),
		array(
			'selector' => '#slider, #slider.set-bg',
			'styles' => array(
				'background' => wm_css_background( 'design-slider-' ),
			)
		),
		array(
			'selector' => '#cta',
			'styles' => array(
				'background' => wm_css_background( 'design-cta-' ),
			)
		),
			array(
				'selector' => '#cta .cta',
				'styles' => array(
					'color' => wm_option( 'design-cta-color', 'color' ),
				)
			),
		array(
			'selector' => '#main-heading, #main-heading.set-bg, #content .widget-heading',
			'styles' => array(
				'background' => wm_css_background( 'design-main-heading-' ),
			)
		),
			array(
				'selector' => '#main-heading h1, #main-heading h2, #content .widget-heading',
				'styles' => array(
					'color' => $mainHeadingTextColor,
				)
			),
		array(
			'selector' => '#above-footer',
			'styles' => array(
				'background' => wm_css_background( 'design-clients-' ),
				'color' => wm_option( 'design-clients-color', 'color' ),
			)
		),
		array(
			'selector' => '#footer, .boxed #contact-section .contact-content',
			'styles' => array(
				'background' => wm_css_background( 'design-footer-' ),
				'color' => wm_option( 'design-footer-color', 'color' ),
			)
		),

		array(
			'selector' => 'a.btn.type-gray, .marker.type-gray, div.msg.type-gray, div.msg.type-gray a',
			'styles' => array(
				'background-color' => wm_option( 'design-type-gray-bg-color', 'color' ),
				'color' => $grayTextColor . ' !important',
				'text-shadow' => ( $treshold < wm_color_brightness( substr( $grayTextColor, 1, 7 ) ) ) ? ( '0 -1px rgba(0,0,0, 0.33)' ) : ( '0 1px rgba(255,255,255, 0.5)' )
			)
		),
		array(
			'selector' => 'a.btn.type-green, .marker.type-green, div.msg.type-green, div.msg.type-green a',
			'styles' => array(
				'background-color' => wm_option( 'design-type-green-bg-color', 'color' ),
				'color' => $greenTextColor . ' !important',
				'text-shadow' => ( $treshold < wm_color_brightness( substr( $greenTextColor, 1, 7 ) ) ) ? ( '0 -1px rgba(0,0,0, 0.33)' ) : ( '0 1px rgba(255,255,255, 0.5)' )
			)
		),
		array(
			'selector' => 'a.btn.type-blue, .marker.type-blue, div.msg.type-blue, div.msg.type-blue a',
			'styles' => array(
				'background-color' => wm_option( 'design-type-blue-bg-color', 'color' ),
				'color' => $blueTextColor . ' !important',
				'text-shadow' => ( $treshold < wm_color_brightness( substr( $blueTextColor, 1, 7 ) ) ) ? ( '0 -1px rgba(0,0,0, 0.33)' ) : ( '0 1px rgba(255,255,255, 0.5)' )
			)
		),
		array(
			'selector' => 'a.btn.type-orange, .marker.type-orange, div.msg.type-orange, div.msg.type-orange a',
			'styles' => array(
				'background-color' => wm_option( 'design-type-orange-bg-color', 'color' ),
				'color' => $orangeTextColor . ' !important',
				'text-shadow' => ( $treshold < wm_color_brightness( substr( $orangeTextColor, 1, 7 ) ) ) ? ( '0 -1px rgba(0,0,0, 0.33)' ) : ( '0 1px rgba(255,255,255, 0.5)' )
			)
		),
		array(
			'selector' => 'a.btn.type-red, .marker.type-red, div.msg.type-red, div.msg.type-red a',
			'styles' => array(
				'background-color' => wm_option( 'design-type-red-bg-color', 'color' ),
				'color' => $redTextColor . ' !important',
				'text-shadow' => ( $treshold < wm_color_brightness( substr( $redTextColor, 1, 7 ) ) ) ? ( '0 -1px rgba(0,0,0, 0.33)' ) : ( '0 1px rgba(255,255,255, 0.5)' )
			)
		),

		array(
			'selector' => 'a.btn.type-gray:hover, div.msg.type-gray h2, div.msg.type-gray h3, div.msg.type-gray h4, div.msg.type-gray h5, div.msg.type-gray h6',
			'styles' => array(
				'color' => $grayTextColor,
			)
		),
		array(
			'selector' => 'a.btn.type-green:hover, div.msg.type-green h2, div.msg.type-green h3, div.msg.type-green h4, div.msg.type-green h5, div.msg.type-green h6',
			'styles' => array(
				'color' => $greenTextColor,
			)
		),
		array(
			'selector' => 'a.btn.type-blue:hover, div.msg.type-blue h2, div.msg.type-blue h3, div.msg.type-blue h4, div.msg.type-blue h5, div.msg.type-blue h6',
			'styles' => array(
				'color' => $blueTextColor,
			)
		),
		array(
			'selector' => 'a.btn.type-orange:hover, div.msg.type-orange h2, div.msg.type-orange h3, div.msg.type-orange h4, div.msg.type-orange h5, div.msg.type-orange h6',
			'styles' => array(
				'color' => $orangeTextColor,
			)
		),
		array(
			'selector' => 'a.btn.type-red:hover, div.msg.type-red h2, div.msg.type-red h3, div.msg.type-red h4, div.msg.type-red h5, div.msg.type-red h6',
			'styles' => array(
				'color' => $redTextColor,
			)
		),

		array(
			'selector' => 'a.btn.type-gray, div.msg.type-gray',
			'styles' => array(
				'border-color' => wm_option( 'design-type-gray-bg-color', 'color' ),
			)
		),
		array(
			'selector' => 'a.btn.type-green, div.msg.type-green',
			'styles' => array(
				'border-color' => wm_option( 'design-type-green-bg-color', 'color' ),
			)
		),
		array(
			'selector' => 'a.btn.type-blue, div.msg.type-blue',
			'styles' => array(
				'border-color' => wm_option( 'design-type-blue-bg-color', 'color' ),
			)
		),
		array(
			'selector' => 'a.btn.type-orange, div.msg.type-orange',
			'styles' => array(
				'border-color' => wm_option( 'design-type-orange-bg-color', 'color' ),
			)
		),
		array(
			'selector' => 'a.btn.type-red, div.msg.type-red',
			'styles' => array(
				'border-color' => wm_option( 'design-type-red-bg-color', 'color' ),
			)
		),



	/* paddings */
		array(
			'selector' => '.logo, h1.logo',
			'styles' => array(
				'margin' => ( -1 < intval( wm_option( 'design-logo-margin' ) ) ) ? ( intval( wm_option( 'design-logo-margin' ) ) . 'px 0' ) : ( null ),
			)
		),
		array(
			'selector' => '.boxed .status, .status',
			'styles' => array(
				'padding-top' => ( -1 < intval( wm_option( 'layout-status-margin' ) ) ) ? ( intval( wm_option( 'layout-status-margin' ) ) . 'px' ) : ( null ),
			)
		),
		array(
			'selector' => '.boxed #wrap, .boxed #top-bar.boxed-bar',
			'styles' => array(
				'width' => ( 'boxed' === wm_option( 'layout-boxed' ) && wm_option( 'layout-boxed-padding' ) ) ? ( ( 960 + 2 * absint( wm_option( 'layout-boxed-padding' ) ) ) . 'px' ) : ( null ),
				'margin' => ( 'boxed' === wm_option( 'layout-boxed' ) && wm_option( 'layout-boxed-padding' ) ) ? ( '0 -' . ( 960 + 2 * absint( wm_option( 'layout-boxed-padding' ) ) ) / 2 . 'px' ) : ( null ),
			)
		),
		array(
			'selector' => '.boxed .wrap-inner, .boxed .wrap-widgets, .boxed .section, .boxed #nav-main ul',
			'styles' => array(
				'padding-left' => ( 'boxed' === wm_option( 'layout-boxed' ) && wm_option( 'layout-boxed-padding' ) ) ? ( absint( wm_option( 'layout-boxed-padding' ) ) . 'px' ) : ( null ),
			)
		),
		array(
			'selector' => '.boxed .wrap-inner, .boxed .wrap-widgets, .boxed .section, .boxed #nav-main ul, .boxed .cta.no-btn',
			'styles' => array(
				'padding-right' => ( 'boxed' === wm_option( 'layout-boxed' ) && wm_option( 'layout-boxed-padding' ) ) ? ( absint( wm_option( 'layout-boxed-padding' ) ) . 'px' ) : ( null ),
			)
		),
		array(
			'selector' => '.boxed .section',
			'styles' => array(
				'margin' => ( 'boxed' === wm_option( 'layout-boxed' ) && wm_option( 'layout-boxed-padding' ) ) ? ( '0 -' . absint( wm_option( 'layout-boxed-padding' ) ) . 'px' ) : ( null ),
			)
		),
		array(
			'selector' => '.boxed .cta',
			'styles' => array(
				'padding-right' => ( 'boxed' === wm_option( 'layout-boxed' ) && wm_option( 'layout-boxed-padding' ) ) ? ( ( 160 + absint( wm_option( 'layout-boxed-padding' ) ) ) . 'px' ) : ( null ),
			)
		),
		array(
			'selector' => '.boxed .cta .btn, .boxed .status',
			'styles' => array(
				'margin-right' => ( 'boxed' === wm_option( 'layout-boxed' ) && wm_option( 'layout-boxed-padding' ) ) ? ( absint( wm_option( 'layout-boxed-padding' ) ) . 'px' ) : ( null ),
			)
		),



	/* fonts */
		array(
			'selector' => '.font-primary, body, .quote-source, input, select, textarea',
			'styles' => array(
				'font-family' => ( wm_option( 'design-font-primary' ) ) ? ( str_replace( ';', '', wm_option( 'design-font-' . wm_option( 'design-font-body-stack' ) ) ) ) : ( null ),
				'font-size' => ( wm_option( 'design-font-body-size' ) ) ? ( wm_option( 'design-font-body-size' ) . 'px' ) : ( null ),
			)
		),
		array(
			'selector' => '.btn, input[type="submit"]',
			'styles' => array(
				'font-family' => ( wm_option( 'design-font-primary' ) ) ? ( str_replace( ';', '', wm_option( 'design-font-' . wm_option( 'design-font-body-stack' ) ) ) ) : ( null ),
			)
		),
		array(
			'selector' => '.font-secondary, blockquote',
			'styles' => array(
				'font-family' => ( wm_option( 'design-font-secondary' ) ) ? ( str_replace( ';', '', wm_option( 'design-font-secondary' ) ) ) : ( null ),
			)
		),
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
				'font-size' => ( wm_option( 'design-font-heading-size' ) ) ? ( ( 1.4 * wm_option( 'design-font-heading-size' ) ) . '%' ) : ( null ),
			)
		),
		array(
			'selector' => 'h3, #main-heading h2',
			'styles' => array(
				'font-size' => ( wm_option( 'design-font-heading-size' ) ) ? ( ( 1.2 * wm_option( 'design-font-heading-size' ) ) . '%' ) : ( null ),
			)
		),
		array(
			'selector' => 'h4, h5, h6',
			'styles' => array(
				'font-size' => ( wm_option( 'design-font-heading-size' ) ) ? ( ( 1 * wm_option( 'design-font-heading-size' ) ) . '%' ) : ( null ),
			)
		),
		array(
			'selector' => '.status, .format-status .article-content, .cta, .big-size, .list-articles .date',
			'styles' => array(
				'font-family' => ( wm_option( 'design-font-cta-stack' ) ) ? ( str_replace( ';', '', wm_option( 'design-font-' . wm_option( 'design-font-cta-stack' ) ) ) ) : ( null ),
			)
		),
		array(
			'selector' => '.cta-text',
			'styles' => array(
				'font-size' => ( wm_option( 'design-font-cta-size' ) ) ? ( ( 1 * wm_option( 'design-font-cta-size' ) ) . '%' ) : ( null ),
			)
		)


);



//Generate CSS output
if ( ! empty( $customStyles ) && 2 === intval( get_option( WM_THEME_SETTINGS . '-installed' ) ) ) {
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



//Add manually written styles from admin panel
$out .= ( wm_option( 'design-custom-css' ) ) ? ( "\r\n\r\n\r\n/* Custom styles */\r\n" . wm_option( 'design-custom-css' ) ) : ( '' );
$out .= "\r\n\r\n" . '/* End of file */';





/*
*****************************************************
*      CSS HEADER
*****************************************************
*/
$expireOffset = WM_CSS_EXPIRATION;

header( 'content-type: text/css; charset: UTF-8' );
header( 'expires: ' . gmdate( 'D, d M Y H:i:s', time() + $expireOffset ) . ' GMT' );
header( 'cache-control: public, max-age=' . $expireOffset );

if ( ( isset( $_GET['c'] ) && $_GET['c'] ) || ( wm_option( 'design-minimize-css' ) ) )
	$out = wm_minimize_css( $out );

echo $out;

//Clean the buffer
//ob_end_clean();

?>