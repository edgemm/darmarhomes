<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Kwicks slider
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
add_action( 'wp_enqueue_scripts', 'wm_slider_kwicks_assets', 100 );





/*
*****************************************************
*      SETTINGS
*****************************************************
*/
//Default kwicks slider settings
$setKwicksDefaults = array(
	//must provide max OR min, but not both
	//'max'          => 960, //expanded kwick width
	'min'          => 100, //shrink kwick width
	'spacing'      => 0, //spacing between kwicks
	//vertical accordion slider instead of horizontal
	'isVertical'   => 'false',
	//the specific kwick will be expanded
	'sticky'       => 'false',
	'defaultKwick' => 0,
	//trigger event
	'event'        => '"mouseover"', //click, dblclick
	//transition time
	'duration'     => 200,
	//easing effect
	//'easing'       => '"easeOutBounce"'
);





/*
*****************************************************
*      STYLES AND SCRIPTS INCLUSION
*****************************************************
*/
/*
* Assets to include in footer
*/
if ( ! function_exists( 'wm_slider_kwicks_assets' ) ) {
	function wm_slider_kwicks_assets() {
		$blogPageId = ( is_home() ) ? ( get_option( 'page_for_posts' ) ) : ( null );
		if ( 'kwicks' == wm_meta_option( 'slider-type', $blogPageId ) ) {
			$prefix = 'slider-kwicks-';

			//enqueue styles
			wp_enqueue_style( 'kwicks' );

			//enqueue scripts
			if ( wm_option( $prefix . 'easing' ) && 'none' != wm_option( $prefix . 'easing' ) )
				wp_enqueue_script( 'easing' );

			wp_enqueue_script( 'kwicks' );
			wp_enqueue_script( 'apply-kwicks' );
		}
	}
} // /wm_slider_kwicks_assets





/*
*****************************************************
*      KWICKS HTML GENERATOR
*****************************************************
*/
/*
* Slider generator
*
* $slidesCount   = # [number of slides to display]
* $slidesContent = TEXT [type of slides content]
* $slidesCat     = # [category from which slides content will be taken - only when using post or wm_slides as content]
*/
if ( ! function_exists( 'wm_slider_kwicks' ) ) {
	function wm_slider_kwicks( $slidesCount = 3, $slidesContent = null, $slidesCat = null, $imageSize = 'slide' ) {
		$out        = '';
		$prefix     = 'slider-kwicks-';
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
				$out .= '<ul id="kwicks-slider" class="kwicks-slider slider-content">';

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
					$content .= ( $link && $buttonText ) ? ( '<div class="button"><a href="' . esc_url( $link ) . '" class="btn size-medium">' . $buttonText . '</a></div>' ) : ( null );

					$out .= '<li id="kwick-' . $i . '" class="slide">';
					$out .= ( $link ) ? ( '<a href="' . esc_url( $link ) . '">' ) : ( '' );

					if ( has_post_thumbnail() )
						$out .= get_the_post_thumbnail( get_the_ID(), $imageSize, array(
							'class'	=> null,
							'alt'	=> trim( strip_tags( get_the_title() ) )
							) );
					else
						$out .= '<img src="' . WM_PLACEHOLDER_SLIDE . '" alt="' . get_the_title() . '" width="960" height="420" />';

					$out .= ( $link ) ? ( '</a>' ) : ( '' );

					if ( $content ) {
						$out .= '<div class="slider-caption-content ' . wm_meta_option( 'slide-animation' ) . '">';
						$out .= apply_filters( 'the_content', $content );
						$out .= '</div> <!-- /slider-caption-content -->';
					}

					$out .= '</li>';
				}

				$out .= '</ul> <!-- /kwicks-slider -->';
			} // /have_posts

		} elseif ( is_array( $slides ) && ! empty( $slides ) ) {

			$slides = array_slice( $slides, 0, $slidesCount );

			//Images
			$out .= '<ul id="kwicks-slider" class="kwicks-slider slider-content">';

			$i = 0;
			foreach ( $slides as $imageId) {
				++$i;

				$attachment = get_post( $imageId );

				if ( $attachment ) {
					$content = '';
					$content .= ( $attachment->post_excerpt ) ? ( '<h2>' . wptexturize( $attachment->post_excerpt ) . '</h2>' ) : ( '' );
					$content .= ( $attachment->post_content ) ? ( '<div class="desc">' . wptexturize( $attachment->post_content ) . '</div>' ) : ( '' );

					$out .= '<li id="kwick-' . $i . '" class="slide">';

					$out .= wp_get_attachment_image( $imageId, $imageSize, null, array(
							'class'	=> 'img-featured'
							) );

					if ( $content ) {
						$out .= '<div class="slider-caption-content">';
						$out .= apply_filters( 'the_content', $content );
						$out .= '</div> <!-- /slider-caption-content -->';
					}

					$out .= '</li>';
				}
			}

			$out .= '</ul> <!-- /kwicks-slider -->';

		} // /slides gallery array

		wp_reset_query();

		if ( $out )
			return $out;
		else
			return;
	}
} // /wm_slider_kwicks

?>