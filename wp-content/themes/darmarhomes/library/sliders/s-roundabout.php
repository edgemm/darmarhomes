<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Roundabout slider
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
add_action( 'wp_enqueue_scripts', 'wm_slider_roundabout_assets', 100 );





/*
*****************************************************
*      SETTINGS
*****************************************************
*/
//Default roundabout slider settings
$setRoundaboutDefaults = array(
	//Animation settings
	'shape'                      => '"lazySusan"',
	'minOpacity'                 => 0.4,
	//'maxOpacity'               => 1.0,
	'minScale'                   => 0.4,
	//'maxScale'                 => 1.0,
	//'easing'                   => '"swing"',
	'startingChild'              => 0,
	'reflect'                    => 'false',
	'autoplay'                   => 'true',
	'duration'                   => 600,
	'autoplayDuration'           => 3000,
	'autoplayPauseOnHover'       => 'false',

	//Touchscreen dragging
	'enableDrag'                 => 'false',
	'dropDuration'               => 600,
	//'dropEasing'               => '"swing"',
	//'dropAnimateTo'            => '"nearest"',
	//'dropCallback'             => 'function(){}',
	//'dragAxis'                 => '"x"',
	//'dragFactor'               => 4,

	//Navigation
	//'btnNext'                  => 'null',
	//'btnNextCallback'          => 'function(){}',
	//'btnPrev'                  => 'null',
	//'btnPrevCallback'          => 'function(){}',
	//'btnToggleAutoplay'        => 'null',
	//'btnStartAutoplay'         => 'null',
	//'btnStopAutoplay'          => 'null',
	//'clickToFocus'             => 'true',
	//'clickToFocusCallback'     => 'function(){}',

	//Other settings and defaults
	'minZ'                       => 10,
	'maxZ'                       => 80,
	//'tilt'                     => 0.0,
	//'bearing'                  => 0.0,
	//'focusBearing'             => 0.0,
	//'childSelector'            => '"li"',
	//'floatComparisonThreshold' => 0.001,
	//'triggerFocusEvents'       => 'true',
	//'triggerBlurEvents'        => 'true',
	//'responsive'               => 'false',

	//Enable debugging
	//'debug'                      => 'true',
);





/*
*****************************************************
*      STYLES AND SCRIPTS INCLUSION
*****************************************************
*/
/*
* Assets to include in footer
*/
if ( ! function_exists( 'wm_slider_roundabout_assets' ) ) {
	function wm_slider_roundabout_assets() {
		$blogPageId = ( is_home() ) ? ( get_option( 'page_for_posts' ) ) : ( null );
		if ( 'roundabout' == wm_meta_option( 'slider-type', $blogPageId ) ) {
			$prefix = 'slider-roundabout-';

			//enqueue styles
			wp_enqueue_style( 'roundabout' );

			//enqueue scripts
			wp_enqueue_script( 'imagesloaded' );
			if ( wm_option( $prefix . 'easing' ) && 'none' != wm_option( $prefix . 'easing' ) )
				wp_enqueue_script( 'easing' );

			wp_enqueue_script( 'roundabout' );

			if ( wm_option( $prefix . 'shape' ) && 'lazySusan' != wm_option( $prefix . 'shape' ) )
				wp_enqueue_script( 'roundabout-shapes' );

			if ( wm_option( $prefix . 'enableDrag' ) ) {
				wp_enqueue_script( 'drag' );
				wp_enqueue_script( 'drop' );
			}

			wp_enqueue_script( 'apply-roundabout' );
		}
	}
} // /wm_slider_roundabout_assets





/*
*****************************************************
*      ROUNDABOUT HTML GENERATOR
*****************************************************
*/
/*
* Slider generator
*
* $slidesCount   = # [number of slides to display]
* $slidesContent = TEXT [type of slides content]
* $slidesCat     = # [category from which slides content will be taken - only when using post or wm_slides as content]
*/
if ( ! function_exists( 'wm_slider_roundabout' ) ) {
	function wm_slider_roundabout( $slidesCount = 3, $slidesContent = null, $slidesCat = null, $imageSize = 'portfolio' ) {
		$out        = '';
		$prefix     = 'slider-roundabout-';
		$blogPageId = ( is_home() ) ? ( get_option( 'page_for_posts' ) ) : ( null );

		//generate HTML
		wp_reset_query();

		//Setting query
		if ( 'wm_slides' == $slidesContent && 0 < $slidesCat ) {

			//Slides custom posts with category specified
			$slides = new WP_Query( array(
				'post_type'      => $slidesContent,
				'posts_per_page' => $slidesCount,
				'tax_query'      => array( array(
						'taxonomy' => 'wm-tax-cats-slides',
						'field'    => 'id',
						'terms'    => $slidesCat
					) ),
				'post__not_in'   => get_option( 'sticky_posts' )
				) );

		} elseif ( 'wm_slides' == $slidesContent ) {

			//Slides custom posts all
			$slides = new WP_Query( array(
				'post_type'      => $slidesContent,
				'posts_per_page' => $slidesCount,
				'post__not_in'   => get_option( 'sticky_posts' )
				) );

		} elseif ( 'gallery' == $slidesContent ) {

			//Post gallery images
			$slides = wm_meta_option( 'slider-gallery-images', $blogPageId );

		}



		if ( 'gallery' != $slidesContent ) {

			if ( $slides->have_posts() ) {
				//Images
				$out .= '<ul id="roundabout-slider" class="roundabout-slider slider-content size-' . $imageSize . '">';

				$i = 0;
				while ( $slides->have_posts() ) {
					$slides->the_post();
					$i++;

					$link       = wm_meta_option( 'slide-link' );
					$buttonText = strip_tags( wm_meta_option( 'slide-button-text' ) );

					$slideTitle  = '<h2>';
					$slideTitle .= ( $link ) ? ( '<a href="' . esc_url( $link ) . '">' . get_the_title() . '</a>' ) : ( get_the_title() );
					$slideTitle .= '</h2>';

					$content  = ( ! wm_meta_option( 'slide-no-title' ) ) ? ( $slideTitle ) : ( '' );
					$content .= ( wm_meta_option( 'slide-description' ) ) ? ( '<div class="desc">' . wm_meta_option( 'slide-description' ) . '</div>' ) : ( null );
					$content .= ( $link && $buttonText ) ? ( '<div class="button"><a href="' . esc_url( $link ) . '" class="btn">' . $buttonText . '</a></div>' ) : ( null );

					$out .= '<li id="roundabout-' . $i . '" class="slide">';

					if ( has_post_thumbnail() ) {
						$out .= ( $link ) ? ( '<a href="' . esc_url( $link ) . '">' ) : ( '' );
						$imageTag = get_the_post_thumbnail( get_the_ID(), $imageSize, array(
							'class'	=> 'img-featured',
							'alt'	=> trim( strip_tags( get_the_title() ) )
							) );
						$out .= preg_replace( '/(width|height)=\"\d*\"\s/', "", $imageTag );
						$out .= ( $link ) ? ( '</a>' ) : ( '' );
					}

					if ( $content ) {
						$out .= '<div class="slider-caption-content ' . wm_meta_option( 'slide-animation' ) . '">';
						$out .= apply_filters( 'the_content', $content );
						$out .= '</div> <!-- /slider-caption-content -->';
					}

					$out .= '</li>';
				}

				$out .= '</ul> <!-- /roundabout-slider -->';
			} // /have_posts

		} elseif ( is_array( $slides ) && ! empty( $slides ) ) {

			$slides = array_slice( $slides, 0, $slidesCount );

			//Images
			$out .= '<ul id="roundabout-slider" class="roundabout-slider slider-content size-' . $imageSize . '">';

			$i = 0;
			foreach ( $slides as $imageId) {
				++$i;

				$attachment = get_post( $imageId );

				if ( $attachment ) {
					$content = '';
					$content .= ( $attachment->post_excerpt ) ? ( '<h2>' . wptexturize( $attachment->post_excerpt ) . '</h2>' ) : ( '' );
					$content .= ( $attachment->post_content ) ? ( '<div class="desc">' . wptexturize( $attachment->post_content ) . '</div>' ) : ( '' );

					$out .= '<li id="roundabout-' . $i . '" class="slide">';

					$imageTag = wp_get_attachment_image( $imageId, $imageSize, null, array(
							'class'	=> 'img-featured'
							) );
					$out .= preg_replace( '/(width|height)=\"\d*\"\s/', "", $imageTag );

					if ( $content ) {
						$out .= '<div class="slider-caption-content">';
						$out .= apply_filters( 'the_content', $content );
						$out .= '</div> <!-- /slider-caption-content -->';
					}

					$out .= '</li>';
				}
			}

			$out .= '</ul> <!-- /roundabout-slider -->';

		} // /slides gallery array

		wp_reset_query();

		if ( $out )
			return $out;
		else
			return;
	}
} // /wm_slider_roundabout

?>