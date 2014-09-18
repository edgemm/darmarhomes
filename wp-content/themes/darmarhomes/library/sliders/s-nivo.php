<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Nivo slider
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
add_action( 'wp_enqueue_scripts', 'wm_slider_nivo_assets', 100 );





/*
*****************************************************
*      SETTINGS
*****************************************************
*/
/*
Nivo animation effects:
	sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft
	fold
	fade
	random
	slideInRight, slideInLeft
	boxRandom
	boxRain, boxRainReverse, boxRainGrow, boxRainGrowReverse
*/
//Default Nivo slider settings
$setNivoDefaults = array(
	//set the effect
	'effect'                  => '"sliceDown"', // animation effect
	//image slices
	'slices'                  => 8, // slice animation
	'boxCols'                 => 8, // box animation
	'boxRows'                 => 4, // box animation
	//speed
	'animSpeed'               => 500, // transition speed
	'pauseTime'               => 2000, // slide display time
	'pauseOnHover'            => 'false', // stop on mouseover
	'manualAdvance'           => 'false', // force manual slide switching
	//prev & next nav
	'directionNav'            => 'true', // activation
	'directionNavHide'        => 'false', // hide, show on mouseover
	'prevText'                => '"' . __( '&laquo; Previous', WM_THEME_TEXTDOMAIN ) . '"', // previous direction text
	'nextText'                => '"' . __( 'Next &raquo;', WM_THEME_TEXTDOMAIN ) . '"', // next direction text
	//buttons nav
	'controlNav'              => 'false', // activation
	'controlNavThumbs'        => 'false', // use thumbs
	//other settings
	'startSlide'              => 0, // set starting slide
	'randomStart'             => 'false', // start on a random slide
	/*
	'beforeChange'            =>  function(){}, // triggers before a slide transition
	'afterChange'             =>  function(){}, // triggers after a slide transition
	'slideshowEnd'            =>  function(){}, // triggers after all slides have been shown
	'lastSlide'               =>  function(){}, // triggers when last slide is shown
	'afterLoad'               =>  function(){} // triggers when slider has loaded
	*/
);





/*
*****************************************************
*      STYLES AND SCRIPTS INCLUSION
*****************************************************
*/
/*
* Assets to include in footer
*/
if ( ! function_exists( 'wm_slider_nivo_assets' ) ) {
	function wm_slider_nivo_assets() {
		$blogPageId = ( is_home() ) ? ( get_option( 'page_for_posts' ) ) : ( null );
		if ( 'nivo' == wm_meta_option( 'slider-type', $blogPageId ) ) {
			//enqueue styles
			wp_enqueue_style( 'nivo' );

			//enqueue scripts
			wp_enqueue_script( 'nivo' );
			wp_enqueue_script( 'apply-nivo' );
		}
	}
} // /wm_slider_nivo_assets





/*
*****************************************************
*      NIVO HTML GENERATOR
*****************************************************
*/
/*
* Slider generator
*
* $slidesCount   = # [number of slides to display]
* $slidesContent = TEXT [type of slides content]
* $slidesCat     = # [category from which slides content will be taken - only when using post or wm_slides as content]
*/
if ( ! function_exists( 'wm_slider_nivo' ) ) {
	function wm_slider_nivo( $slidesCount = 3, $slidesContent = null, $slidesCat = null, $imageSize = 'slide' ) {
		$out        = '';
		$prefix     = 'slider-nivo-';
		$blogPageId = ( is_home() ) ? ( get_option( 'page_for_posts' ) ) : ( null );

		//Generating HTML output
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

		} else {

			//Blog posts (with or without category specified)
			$slides = new WP_Query( array(
				'posts_per_page' => $slidesCount,
				'cat'            => $slidesCat,
				'post__not_in'   => get_option( 'sticky_posts' )
				) );

		}



		if ( 'gallery' != $slidesContent ) {

			if ( $slides->have_posts() ) {
				//Images
				$out .= '<div id="nivo-slider" class="nivo-slider slider-content">';

				$i = 0;
				while ( $slides->have_posts() ) {
					$slides->the_post();
					++$i;

					$link     = wm_meta_option( 'slide-link' );
					$imgClass = ( ! $link ) ? ( ' slide' ) : ( '' );

					$out .= ( $link ) ? ( '<a href="' . esc_url( $link ) . '" class="slide">' ) : ( '' );


					if ( has_post_thumbnail() )
						$out .= get_the_post_thumbnail( get_the_ID(), $imageSize, array(
							'class'	=> 'img-featured' . $imgClass,
							'alt'	=> trim( strip_tags( get_the_title() ) ),
							'title'	=> '#nivo-slider-caption-' . $i
							) );
					else
						$out .= '<img src="' . WM_PLACEHOLDER_SLIDE . '" alt="' . get_the_title() . '" width="960" height="420" />';

					$out .= ( $link ) ? ( '</a>' ) : ( '' );
				}

				$out .= '</div> <!-- /nivo-slider -->';

				//Captions
				$out .= '<div id="nivo-captions-container" class="hide">';

				$i = 0;
				while ( $slides->have_posts() ) {
					$slides->the_post();
					++$i;

					$link       = wm_meta_option( 'slide-link' );
					$buttonText = strip_tags( wm_meta_option( 'slide-button-text' ) );

					$slideTitle  = '<h2>';
					$slideTitle .= ( $link ) ? ( '<a href="' . esc_url( $link ) . '">' . get_the_title() . '</a>' ) : ( get_the_title() );
					$slideTitle .= '</h2>';
					$content  = ( ! wm_meta_option( 'slide-no-title' ) ) ? ( $slideTitle ) : ( '' );
					$content .= ( wm_meta_option( 'slide-description' ) ) ? ( '<div class="desc">' . wm_meta_option( 'slide-description' ) . '</div>' ) : ( null );
					$content .= ( $link && $buttonText ) ? ( '<div class="button"><a href="' . esc_url( $link ) . '" class="btn size-medium">' . $buttonText . '</a></div>' ) : ( null );

					if ( $content ) {
						$out .= '<div id="nivo-slider-caption-' . $i . '"><div class="slider-caption-content ' . wm_meta_option( 'slide-animation' ) . '">';
						$out .= apply_filters( 'the_content', $content );
						$out .= '</div></div> <!-- /nivo-slider-caption-' . $i . ' -->';
					}
				}

				$out .= '</div> <!-- /nivo-captions -->';
			} // /have_posts

		} elseif ( is_array( $slides ) && ! empty( $slides ) ) {

			$slides = array_slice( $slides, 0, $slidesCount );

			//Images
			$out .= '<div id="nivo-slider" class="nivo-slider slider-content">';

			$i = 0;
			foreach ( $slides as $imageId) {
				++$i;
				$out .= wp_get_attachment_image( $imageId, $imageSize, null, array(
						'class'	=> 'img-featured',
						'title'	=> '#nivo-slider-caption-' . $i
						) );
			}

			$out .= '</div> <!-- /nivo-slider -->';

			//Captions
			$out .= '<div id="nivo-captions-container" class="hide">';

			$i = 0;
			foreach ( $slides as $imageId ) {
				$i++;

				$attachment = get_post( $imageId );

				if ( $attachment ) {
					$content = '';
					$content .= ( $attachment->post_excerpt ) ? ( '<h2>' . wptexturize( $attachment->post_excerpt ) . '</h2>' ) : ( '' );
					$content .= ( $attachment->post_content ) ? ( '<div class="desc">' . wptexturize( $attachment->post_content ) . '</div>' ) : ( '' );

					if ( $content ) {
						$out .= '<div id="nivo-slider-caption-' . $i . '"><div class="slider-caption-content">';
						$out .= apply_filters( 'the_content', $content );
						$out .= '</div></div> <!-- /nivo-slider-caption-' . $i . ' -->';
					}
				}
			}

			$out .= '</div> <!-- /nivo-captions -->';

		} // /slides gallery array

		wp_reset_query();

		if ( $out )
			return $out;
		else
			return;
	}
} // /wm_slider_nivo

?>