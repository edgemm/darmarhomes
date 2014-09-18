<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Simple slider
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
add_action( 'wp_enqueue_scripts', 'wm_slider_simple_assets', 100 );





/*
*****************************************************
*      SETTINGS
*****************************************************
*/
//Default Simple slider settings
$setSimpleDefaults = array(
	'transitionTime' => 400, // animation speed
	'slideDuration'  => 5000 // slide display time
);





/*
*****************************************************
*      STYLES AND SCRIPTS INCLUSION
*****************************************************
*/
/*
* Assets to include in footer
*/
if ( ! function_exists( 'wm_slider_simple_assets' ) ) {
	function wm_slider_simple_assets() {
		$blogPageId = ( is_home() ) ? ( get_option( 'page_for_posts' ) ) : ( null );
		if ( 'simple' == wm_meta_option( 'slider-type', $blogPageId ) ) {
			//enqueue styles
			wp_enqueue_style( 'simple-slider' );

			//enqueue scripts
			wp_enqueue_script( 'simple-slider' );
			wp_enqueue_script( 'apply-simple-slider' );
		}
	}
} // /wm_slider_simple_assets





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
if ( ! function_exists( 'wm_slider_simple' ) ) {
	function wm_slider_simple( $slidesCount = 3, $slidesContent = null, $slidesCat = null, $imageSize = 'slide' ) {
		$out        = '';
		$prefix     = 'slider-simple-';
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
				$out .= '<div id="simple-slider" class="simple-slider slider-content dynamic-height">';

				$i = 0;
				while ( $slides->have_posts() ) {
					$slides->the_post();
					++$i;

					$link = wm_meta_option( 'slide-link' );

					$out .= '<figure>';
					$out .= ( $link ) ? ( '<a href="' . esc_url( $link ) . '">' ) : ( '' );

					if ( has_post_thumbnail() )
						$out .= get_the_post_thumbnail( get_the_ID(), $imageSize, array(
							'class'	=> 'img-featured',
							'alt'	=> trim( strip_tags( get_the_title() ) )
							) );
					else
						$out .= '<img src="' . WM_PLACEHOLDER_SLIDE . '" alt="' . get_the_title() . '" width="960" height="420" />';

					$out .= ( $link ) ? ( '</a>' ) : ( '' );
					$out .= '</figure>';
				}

				$out .= '</div> <!-- /simple-slider -->';
			} // /have_posts

		} elseif ( is_array( $slides ) && ! empty( $slides ) ) {

			$slides = array_slice( $slides, 0, $slidesCount );

			//Images
			$out .= '<div id="simple-slider" class="simple-slider slider-content dynamic-height">';

			$i = 0;
			foreach ( $slides as $imageId) {
				++$i;
				$out .= '<figure>';
				$out .= wp_get_attachment_image( $imageId, $imageSize, null, array(
						'class'	=> 'img-featured'
						) );
				$out .= '</figure>';
			}

			$out .= '</div> <!-- /simple-slider -->';

		} // /slides gallery array

		wp_reset_query();

		if ( $out )
			return $out;
		else
			return;
	}
} // /wm_slider_simple

?>