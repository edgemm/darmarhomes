<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Shortcodes registration
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//FILTERS
//Fixes HTML issues created by wpautop
add_filter( 'the_content', 'wm_shortcode_paragraph_insertion_fix' );





/*
* Plugin Name: Shortcode Empty Paragraph Fix
* Plugin URI: http://www.johannheyne.de/wordpress/shortcode-empty-paragraph-fix/
* Description: Fix issues when shortcodes are embedded in a block of content that is filtered by wpautop.
* Author URI: http://www.johannheyne.de
* Version: 0.1
* Put this in /wp-content/plugins/ of your Wordpress installation
*
* Update: by WebMan - www.webmandesign.eu, www.webmandesign.eu
*/
if ( ! function_exists( 'wm_shortcode_paragraph_insertion_fix' ) ) {
	function wm_shortcode_paragraph_insertion_fix( $content ) {
		$fix = array (
			'<p>['          => '[',
			']</p>'         => ']',
			']<br />'       => ']',

			'<p></p>'       => '<span class="br"></span>',
			'<p>&nbsp;</p>' => '<span class="br"></span>',

			'<h1></h1>'       => '<span class="br"></span>',
			'<h1>&nbsp;</h1>' => '<span class="br"></span>',

			'<h2></h2>'       => '<span class="br"></span>',
			'<h2>&nbsp;</h2>' => '<span class="br"></span>',

			'<h3></h3>'       => '<span class="br"></span>',
			'<h3>&nbsp;</h3>' => '<span class="br"></span>',

			'<h4></h4>'       => '<span class="br"></span>',
			'<h4>&nbsp;</h4>' => '<span class="br"></span>',

			'<h5></h5>'       => '<span class="br"></span>',
			'<h5>&nbsp;</h5>' => '<span class="br"></span>',

			'<h6></h6>'       => '<span class="br"></span>',
			'<h6>&nbsp;</h6>' => '<span class="br"></span>'
		);
		$content = strtr( $content, $fix );

		return $content;
	}
} // /wm_shortcode_paragraph_insertion_fix





/*
*****************************************************
*      ACCORDION
*****************************************************
*/
/*
* [accordion auto="1"]content[/accordion]
*
* Accordion wrapper
*
* auto = BOOLEAN/NONE
*/
if ( ! function_exists( 'wm_shortcode_accordion' ) ) {
	function wm_shortcode_accordion( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'auto' => ''
			), $atts)
			);

		//validation
		if ( $auto )
			$auto = ' auto';

		//output
		$out = '<div class="accordion-wrapper' . $auto . '"><ul>' . do_shortcode( $content ) . '</ul></div>';
		return $out;
	}
} // /wm_shortcode_accordion
add_shortcode( 'accordion', 'wm_shortcode_accordion' );



/*
* [accordion_item title="Accordion item title"]content[/accordion_item]
*
* Accordion item
*
* title = TEXT
*/
if ( ! function_exists( 'wm_shortcode_accordion_item' ) ) {
	function wm_shortcode_accordion_item( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'title' => ''
			), $atts)
			);

		//validation
		if ( '' == $title )
			$title = 'Accordion';

		$title = strip_tags( $title );

		//output
		$out = '<li><h3 class="accordion-heading">' . $title . '</h3>' . wpautop( do_shortcode( $content ) ) . '</li>';
		return $out;
	}
} // /wm_shortcode_accordion_item
add_shortcode( 'accordion_item', 'wm_shortcode_accordion_item' );





/*
*****************************************************
*      BUTTONS
*****************************************************
*/
/*
* [button url="#" type="green" size="" color="fff" background="012345"]content[/button]
*
* url        = URL/NONE
* type       = gray/green/blue/orange/red/NONE
* size       = medium/large/NONE
* color      = #HEX/NONE
* background = #HEX/NONE
*/
if ( ! function_exists( 'wm_shortcode_button' ) ) {
	function wm_shortcode_button( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'url'        => '#',
			'type'       => '',
			'size'       => '',
			'color'      => '',
			'background' => ''
			), $atts )
			);

		$buttonTypes = array( 'gray', 'green', 'blue', 'orange', 'red' );
		$buttonSizes = array( 'medium', 'large' );

		//validation
		$url        = esc_url( $url );
		$type       = ( in_array( $type, $buttonTypes ) ) ? ( ' type-' . esc_attr( $type ) ) : ( '' );
		$size       = ( in_array( $size, $buttonSizes ) ) ? ( ' size-' . esc_attr( $size ) ) : ( '' );

		$color      = preg_replace( '/\s+/', '', $color ); //remove spaces
		$color      = ereg_replace( '[^A-Fa-f0-9]', '', $color ); //remove non-numeric characters
		$colorRough = $color;
		$color      = ( 6 === strlen( $color ) || 3 === strlen( $color ) ) ? ( 'color:#' . $color . ';' ) : ( '' );
		$textShadow = null;

		if ( $color ) {
			$treshold   = ( wm_option( 'design-color-treshold' ) ) ? ( wm_option( 'design-color-treshold' ) ) : ( WM_COLOR_TRESHOLD );
			$textShadow = ( $treshold < wm_color_brightness( $colorRough ) ) ? ( 'text-shadow:0 -1px rgba(0,0,0, 0.33);' ) : ( 'text-shadow:0 1px rgba(255,255,255, 0.5);' );
		}

		$background = preg_replace( '/\s+/', '', $background ); //remove spaces
		$background = ereg_replace( '[^A-Fa-f0-9]', '', $background ); //remove non-numeric characters
		$background = ( 6 === strlen( $background ) || 3 === strlen( $background ) ) ? ( 'background-color:#' . $background . ';border-color:#' . $background . ';' ) : ( '' );

		//output
		$out = '<a href="' . $url . '" class="btn' . $size . $type . '" style="' . $color . $textShadow . $background . '">' . do_shortcode( $content ) . '</a>';
		return $out;
	}
} // /wm_shortcode_button
add_shortcode( 'button', 'wm_shortcode_button' );





/*
*****************************************************
*      COLUMNS
*****************************************************
*/
/*
* [column type="1/4" last="1"]content[/column]
*
* Single column
*
* type = '1/2', '1/3', '2/3', '1/4', '3/4', '1/5', '2/5', '3/5', '4/5', '1/6', '5/6', NONE
* last = BOOLEAN/NONE
*/
if ( ! function_exists( 'wm_shortcode_column' ) ) {
	function wm_shortcode_column( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type' => '1/2',
			'last' => ''
			), $atts )
			);

		$columnTypes = array( '1/2', '1/3', '2/3', '1/4', '3/4', '1/5', '2/5', '3/5', '4/5', '1/6', '5/6' );

		//validation
		$type = ( in_array( $type, $columnTypes ) ) ? ( 'col-' . str_replace( '/', '', $type ) ) : ( 'col-12' );
		$last = ( $last ) ? ( ' last' ) : ( '' );

		//output
		$out = '<div class="column ' . $type . $last . '">' . wpautop( do_shortcode( $content ) ) . '</div>';
		return $out;
	}
} // /wm_shortcode_column
add_shortcode( 'column', 'wm_shortcode_column' );





/*
*****************************************************
*      CONTENT MODULE
*****************************************************
*/
/*
* [content_module id="123"]
*
* Content module
*
* id          = POST ID [required]
* no_thumb    = BOOLEAN
* no_link     = BOOLEAN
* no_title    = BOOLEAN
* button_text = TEXT/NONE
* widget      = BOOLEAN
*/
if ( ! function_exists( 'wm_shortcode_content_module' ) ) {
	function wm_shortcode_content_module( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'id'          => null,
			'no_thumb'    => null,
			'no_link'     => null,
			'no_title'    => null,
			'button_text' => null,
			'layout'      => null,
			'widget'      => true
			), $atts )
			);

		if ( ! $id )
			return;

		$out = '';

		//get the Content Module content
		wp_reset_query();
		$the_module = new WP_Query( array(
			'p'         => ( $id ) ? ( absint( $id ) ) : ( null ),
			'post_type' => 'wm_modules'
			) );
		if ( $the_module->have_posts() && $id ) {

			$the_module->the_post();

			$moreURL  = esc_url( stripslashes( wm_meta_option( 'module-link' ) ) );
			$iconPack = ( wm_option( 'design-icon-pack' ) ) ? ( 'img/icons/custom/' . wm_option( 'design-icon-pack' ) . '/' ) : ( 'img/icons/custom/faenza/' );
			$iconURL  = WM_ASSETS_THEME . $iconPack . wm_meta_option( 'module-icon' ) . '.png';
			$layout   = ( $layout ) ? ( ' layout-' . $layout ) : ( null );

			//HTML to display output
			$classWrapper  = ( 'icon' === wm_meta_option( 'module-type' ) ) ? ( ' icon-module' ) : ( '' );
			$classWrapper .= ( $no_thumb ) ? ( ' no-thumb' ) : ( '' );
			$classWrapper .= ( $no_link ) ? ( ' no-link' ) : ( '' );
			$classWrapper .= ( $no_title ) ? ( ' no-title' ) : ( '' );
			$classWrapper .= ( $no_link || ! $button_text ) ? ( ' no-btn' ) : ( '' );

			$out .= '<div class="content' . $classWrapper . $layout . '">';

				if ( has_post_thumbnail() && ! $no_thumb ) {

					$imageContainerClass = ( 'icon' === wm_meta_option( 'module-type' ) ) ? ( 'icon-container' ) : ( 'image-container' );
					$out .= '<div class="' . $imageContainerClass . '">';
					if ( ! $no_link && $moreURL )
						$out .= '<a href="' . $moreURL . '">';
					$fullImg = ( 'icon' === wm_meta_option( 'module-type' ) ) ? ( get_the_post_thumbnail( $id, 'widget' ) ) : ( get_the_post_thumbnail( $id, 'blog' ) );
					$out .= preg_replace( '/(width|height)=\"\d*\"\s/', "", $fullImg );
					if ( ! $no_link && $moreURL )
						$out .= '</a>';
					$out .= '</div>';

				} elseif ( wm_meta_option( 'module-icon' ) && ! $no_thumb ) {

					$out .= '<div class="icon-container">';
					if ( ! $no_link && $moreURL )
						$out .= '<a href="' . $moreURL . '">';
					$out .= '<img src="' . $iconURL . '" alt="" />';
					if ( ! $no_link && $moreURL )
						$out .= '</a>';
					$out .= '</div>';

				}

				if ( ! $no_title ) {
					$pageTitle = '<h2>';
					$pageTitle .= ( ! $no_link && $moreURL ) ? ( '<a href="' . $moreURL . '">' ) : ( '' );
					$pageTitle .= get_the_title();
					$pageTitle .= ( ! $no_link && $moreURL ) ? ( '</a>' ) : ( '' );
					$pageTitle .= '</h2>';
					$out .= $pageTitle;
				}

				$out .= '<div class="module-content article-content border-color">' . apply_filters( 'the_content', get_the_content() ) . '</div>';

				$customs = get_post_custom();
				if ( ! $no_link && $moreURL && $button_text )
					$out .= '<a href="' . $moreURL . '" class="btn btn-more">' . $button_text . '</a>';

			$out .= '</div>';

		}	else {

			return;

		}
		wp_reset_query();

		//output
		if ( $widget )
			return '<div class="widget wm-content-module">' . $out . '</div>';
		else
			return $out;
	}
} // /wm_shortcode_content_module
add_shortcode( 'content_module', 'wm_shortcode_content_module' );





/*
*****************************************************
*      DEVIDER
*****************************************************
*/
/*
* [devider type="space" height="60" no_border="1"]
*
* type      = space/top/NONE
* height    = #/NONE
* no_border = BOOLEAN
*/
if ( ! function_exists( 'wm_shortcode_devider' ) ) {
	function wm_shortcode_devider( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type'      => '',
			'height'    => '',
			'no_border' => ''
			), $atts )
			);

		$spaceTypes = array( 'space', 'top' );

		//validation
		$height = ( isset( $height ) && '' != $height ) ? ( ' style="margin-bottom:' . intval( $height ) . 'px"' ) : ( '' );
		$type   = ( in_array( $type, $spaceTypes ) ) ? ( ' type-' . esc_attr( $type ) ) : ( '' );
		$border = ( $no_border ) ? ( ' no-border' ) : ( '' );

		//output
		$out = '<div class="devider' . $type . $border . '"' . $height . '>';
		$out .= ( ' type-top' == $type ) ? ( '<a href="#top" class="top-of-page">' . __( 'Top', WM_THEME_TEXTDOMAIN ) . '</a>' ) : ( '' );
		$out .= '</div>';
		return $out;
	}
} // /wm_shortcode_devider
add_shortcode( 'devider', 'wm_shortcode_devider' );





/*
*****************************************************
*      DROPCAPS
*****************************************************
*/
/*
* [dropcap type="round"]content[/dropcap]
*
* type = round/square/NONE
*/
if ( ! function_exists( 'wm_shortcode_dropcap' ) ) {
	function wm_shortcode_dropcap( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type' => ''
			), $atts )
			);

		$dropcapTypes = array( 'round', 'square' );;

		//validation
		$type = ( in_array( $type, $dropcapTypes ) ) ? ( ' ' . $type ) : ( '' );

		//output
		$out = '<span class="dropcap' . $type . '">' . do_shortcode( $content ) . '</span>';
		return $out;
	}
} // /wm_shortcode_dropcap
add_shortcode( 'dropcap', 'wm_shortcode_dropcap' );





/*
*****************************************************
*      LISTS
*****************************************************
*/
/*
* [list type="star"]content[/list]
*
* type = arrow/arrow-invert/star/star-invert/check/check-invert/plus/plus-invert/NONE
*/
if ( ! function_exists( 'wm_shortcode_list' ) ) {
	function wm_shortcode_list( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type' => 'arrow'
			), $atts )
			);

		$listTypes = array( 'arrow', 'arrow-invert', 'star', 'star-invert', 'check', 'check-invert', 'plus', 'plus-invert' );

		//validation
		$type   = ( in_array( $type, $listTypes ) ) ? ( esc_attr( $type ) ) : ( 'arrow' );

		//output
		$out = '<div class="list-wrapper ' . $type . '">' . do_shortcode( shortcode_unautop( $content ) ) . '</div>';
		return $out;
	}
} // /wm_shortcode_list
add_shortcode( 'list', 'wm_shortcode_list' );





/*
*****************************************************
*      LOGIN FORM
*****************************************************
*/
/*
* [login heading="h2" show_email="1" show_url="0" show_biotitle="0"]
*
* heading       = h1/h2/h3/h4/h5/h6/NONE
* show_email    = BOOLEAN/NONE
* show_url      = BOOLEAN/NONE
* show_biotitle = BOOLEAN/NONE
*/
if ( ! function_exists( 'wm_shortcode_login' ) ) {
	function wm_shortcode_login( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'heading'       => 'h2',
			'show_email'    => '',
			'show_url'      => '',
			'show_biotitle' => ''
			), $atts )
			);

		$headingTypes = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );

		//validation
		$heading       = ( in_array( $heading, $headingTypes ) ) ? ( esc_attr( $heading ) ) : ( 'h2' );
		$show_email    = ( $show_email ) ? ( '1' ) : ( '' );
		$show_url      = ( $show_url ) ? ( '1' ) : ( '' );
		$show_biotitle = ( $show_biotitle ) ? ( '1' ) : ( '' );

		$out = '';
		$out .= '<div class="login-wrapper">';

		if ( ! is_user_logged_in() ) {
			$out .= wp_login_form( array(
				'echo'           => false,
				'redirect'       => get_permalink(),
				'form_id'        => 'loginform',
				'label_username' => __( 'Username', WM_THEME_TEXTDOMAIN ),
				'label_password' => __( 'Password', WM_THEME_TEXTDOMAIN ),
				'label_remember' => __( 'Remember Me', WM_THEME_TEXTDOMAIN ),
				'label_log_in'   => __( 'Log In', WM_THEME_TEXTDOMAIN ),
				'id_username'    => 'user_login',
				'id_password'    => 'user_pass',
				'id_remember'    => 'rememberme',
				'id_submit'      => 'wp-submit',
				'remember'       => true,
				'value_username' => null,
				'value_remember' => false
				) );
			$out .= '<p>' . wp_register('', '', false) . ' | <a href="' . wp_lostpassword_url( get_permalink() ) . '" title="' . __( 'Password will be resent to you e-mail address.', WM_THEME_TEXTDOMAIN ) . '">' . __( 'I have lost my password', WM_THEME_TEXTDOMAIN ) . '</a></p>';
		} else {
			global $current_user;
			get_currentuserinfo();
			$userAvatar = get_avatar( $current_user->ID, 64 );
			$desc = ( $current_user->user_description ) ? ( apply_filters( 'the_content', $current_user->user_description ) ) : ( '<p><em>' . __( 'You have not filled in your biographical info.', WM_THEME_TEXTDOMAIN ) . '</em></p>' );

			$out .= '<' . $heading . '><em>' . __( 'Hello', WM_THEME_TEXTDOMAIN ) . '</em> ' . $current_user->display_name . '</' . $heading . '>';
			$out .= '<p><a href="' . wp_logout_url( get_permalink() ) . '" class="log-out" title="' . __( 'Log out', WM_THEME_TEXTDOMAIN ) . '">' . __( 'Log out', WM_THEME_TEXTDOMAIN ) . '</a></p>';
			$out .= '<p>';
			if ( $show_email )
				$out .= '<strong>' . __( 'Your email:', WM_THEME_TEXTDOMAIN ) . '</strong> ' . $current_user->user_email . '<br />';
			if ( $show_url )
				$out .= '<strong>' . __( 'Your homepage:', WM_THEME_TEXTDOMAIN ) . '</strong> <a href="' . $current_user->user_url . '">' . $current_user->user_url . '</a><br />';
			$out .= '<strong>' . __( 'Twitter account:', WM_THEME_TEXTDOMAIN ) . '</strong> <a href="' . $current_user->user_url . '">' . get_user_meta( $current_user->ID, 'twitter', true ) . '</a><br />';
			$out .= '</p>';
			$out .= '<div class="bio">';
			if ( $show_biotitle )
				$out .= '<p><strong>' . __( 'Your biography:', WM_THEME_TEXTDOMAIN ) . '</strong></p>';
			$out .= $userAvatar . $desc . '</div>';
		}

		$out .= '</div> <!-- /login-wrapper -->';

		//output
		return $out;
	}
} // /wm_shortcode_login
add_shortcode( 'login', 'wm_shortcode_login' );





/*
*****************************************************
*      MAPS
*****************************************************
*/
/*
* [map location="My address 1, City, Country" width="640" height="360" zoom="14" bubble="1"]
*
* location = Google Maps location, address
* width    = #/NONE
* height   = #/NONE
* zoom     = #/NONE
* bubble   = BOOLEAN/NONE
*/
if ( ! function_exists( 'wm_shortcode_map' ) ) {
	function wm_shortcode_map( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'location' => '',
			'width'    => '100%',
			'height'   => 240,
			'zoom'     => 14,
			'bubble'   => ''
			), $atts)
			);

		//validation
		$bubble   = ( $bubble || '0' == $bubble ) ? ( '&amp;iwloc=A' ) : ( '&amp;iwloc=near' );

		$location = urlencode( strip_tags( $location ) );
		$link     = esc_url( 'http://maps.google.cm/maps?q=' . $location . '&amp;z=' . $zoom . '&amp;output=embed' . $bubble );

		$width    = ( $width ) ? ( absint( $width ) ) : ( '100%' );
		$height   = ( $height ) ? ( absint( $height ) ) : ( 240 );
		$zoom     = ( $zoom ) ? ( absint( $zoom ) ) : ( 10 );

		//output
		$out = '<iframe width="' . $width . '" height="' . $height . '" src="' . $link . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>';
		return $out;
	}
} // /wm_shortcode_map
add_shortcode( 'map', 'wm_shortcode_map' );





/*
*****************************************************
*      MARKERS
*****************************************************
*/
/*
* [marker type="green" color="fff" background="012345"]content[/marker]
*
* type       = gray/green/blue/orange/red/NONE
* color      = #HEX/NONE
* background = #HEX/NONE
*/
if ( ! function_exists( 'wm_shortcode_marker' ) ) {
	function wm_shortcode_marker( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type'       => 'gray',
			'color'      => '',
			'background' => ''
			), $atts )
			);

		$buttonTypes = array( 'gray', 'green', 'blue', 'orange', 'red' );

		//validation
		$type       = ( in_array( $type, $buttonTypes ) ) ? ( ' type-' . esc_attr( $type ) ) : ( ' type-gray' );

		$color      = preg_replace( '/\s+/', '', $color ); //remove spaces
		$color      = ereg_replace( '[^A-Fa-f0-9]', '', $color ); //remove non-numeric characters
		$color      = ( 6 === strlen( $color ) || 3 === strlen( $color ) ) ? ( 'color:#' . $color . ';' ) : ( '' );

		$background = preg_replace( '/\s+/', '', $background ); //remove spaces
		$background = ereg_replace( '[^A-Fa-f0-9]', '', $background ); //remove non-numeric characters
		$background = ( 6 === strlen( $background ) || 3 === strlen( $background ) ) ? ( 'background-color:#' . $background . ';' ) : ( '' );

		//output
		$out = '<span class="marker' . $type . '" style="' . $color . $background . '">' . do_shortcode( $content ) . '</span>';
		return $out;
	}
} // /wm_shortcode_marker
add_shortcode( 'marker', 'wm_shortcode_marker' );





/*
*****************************************************
*      MESSAGE BOXES
*****************************************************
*/
/*
* [msg type="green" icon="check"]content[/msg]
*
* type = gray/green/blue/orange/red/NONE
* icon = info/question/check/warning/NONE
*/
if ( ! function_exists( 'wm_shortcode_box' ) ) {
	function wm_shortcode_box( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type' => 'gray',
			'icon' => ''
			), $atts )
			);

		$listTypes = array( 'gray', 'green', 'blue', 'orange', 'red' );
		$listIcons = array( 'info', 'question', 'check', 'warning' );

		//validation
		$type = ( in_array( $type, $listTypes ) ) ? ( esc_attr( $type ) ) : ( 'gray' );
		$icon = ( in_array( $icon, $listIcons ) ) ? ( ' icon-box icon-' . esc_attr( $icon ) ) : ( '' );

		//output
		$out = '<div class="msg type-' . $type . $icon . '">' . do_shortcode( $content ) . '</div>';
		return $out;
	}
} // /wm_shortcode_box
add_shortcode( 'msg', 'wm_shortcode_box' );





/*
*****************************************************
*      PULLQUOTES
*****************************************************
*/
/*
* [pullquote align="left"]content[/pullquote]
*
* align = left/right/NONE
*/
if ( ! function_exists( 'wm_shortcode_pullquote' ) ) {
	function wm_shortcode_pullquote( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'align' => 'left'
			), $atts )
			);

		$pullquoteAlign = array( 'left', 'right' );;

		//validation
		$align = ( in_array( $align, $pullquoteAlign ) ) ? ( ' align' . $align ) : ( ' alignleft' );

		//output
		$out = '<blockquote class="pullquote ' . $align . '">' . do_shortcode( $content ) . '</blockquote>';
		return $out;
	}
} // /wm_shortcode_pullquote
add_shortcode( 'pullquote', 'wm_shortcode_pullquote' );





/*
*****************************************************
*      VIDEOS
*****************************************************
*/
/*
* [youtube id="SAMPLE123" width="640" height="360"]
*
* Youtube video
*
* id     = ID
* width  = #/NONE
* height = #/NONE
*/
if ( ! function_exists( 'wm_shortcode_youtube' ) ) {
	function wm_shortcode_youtube( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'id'     => '',
			'width'  => null,
			'height' => null
			), $atts)
			);

		//validation
		if ( ! $width && ! $height ) {
			$width  = 320;
			$height = 180;
		} elseif ( ! $width && $height ) {
			$width = absint( $height ) / 9 * 16;
		} elseif ( $width && ! $height ) {
			$height = absint( $width ) / 16 * 9;
		} else {
			$width  = absint( $width );
			$height = absint( $height );
		}

		//output
		$out = '<iframe width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/' . $id . '?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
		return $out;
	}
} // /wm_shortcode_youtube
add_shortcode( 'youtube', 'wm_shortcode_youtube' );



/*
* [vimeo id="SAMPLE123" width="640" height="360"]
*
* Vimeo video
*
* id     = ID
* width  = #/NONE
* height = #/NONE
*/
if ( ! function_exists( 'wm_shortcode_vimeo' ) ) {
	function wm_shortcode_vimeo( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'id'     => '',
			'width'  => null,
			'height' => null
			), $atts)
			);

		//validation
		if ( ! $width && ! $height ) {
			$width  = 320;
			$height = 180;
		} elseif ( ! $width && $height ) {
			$width = absint( $height ) / 9 * 16;
		} elseif ( $width && ! $height ) {
			$height = absint( $width ) / 16 * 9;
		} else {
			$width  = absint( $width );
			$height = absint( $height );
		}

		//output
		$out = '<iframe src="http://player.vimeo.com/video/' . $id . '?title=0&amp;byline=0&amp;portrait=0" width="' . $width . '" height="' . $height . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
		return $out;
	}
} // /wm_shortcode_vimeo
add_shortcode( 'vimeo', 'wm_shortcode_vimeo' );





/*
*****************************************************
*      TABS
*****************************************************
*/
/*
* [tabs]content[/tabs]
*
* Tabs wrapper
*/
if ( ! function_exists( 'wm_shortcode_tabs' ) ) {
	function wm_shortcode_tabs( $atts, $content = null ) {
		//output
		$out = '<div class="tabs-wrapper"><ul>' . do_shortcode( $content ) . '</ul></div>';
		return $out;
	}
} // /wm_shortcode_tabs
add_shortcode( 'tabs', 'wm_shortcode_tabs' );



/*
* [tab title="Tab title"]content[/tab]
*
* Tab item/content
*
* title = TEXT, required
*/
if ( ! function_exists( 'wm_shortcode_tab' ) ) {
	function wm_shortcode_tab( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'title' => ''
			), $atts)
			);

		//validation
		if ( '' == $title )
			return;

		$title = strip_tags( $title );

		//output
		$out = '<li><h3 class="tab-heading">' . $title . '</h3>' . do_shortcode( $content ) . '</li>';
		return $out;
	}
} // /wm_shortcode_tab
add_shortcode( 'tab', 'wm_shortcode_tab' );





/*
*****************************************************
*      TOGGLES
*****************************************************
*/
/*
* [toggle title="Toggle title"]content[/toggle]
*
* title = TEXT, required
*/
if ( ! function_exists( 'wm_shortcode_toggle' ) ) {
	function wm_shortcode_toggle( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'title' => ''
			), $atts)
			);

		//validation
		if ( '' == $title )
			return;

		$title = strip_tags( $title );

		//output
		$out = '<div class="toggle-wrapper"><h3 class="toggle-heading">' . $title . '</h3>' . wpautop( do_shortcode( $content ) ) . '</div>';
		return $out;
	}
} // /wm_shortcode_toggle
add_shortcode( 'toggle', 'wm_shortcode_toggle' );





/*
*****************************************************
*      WIDGET AREA
*****************************************************
*/
/*
* [widgets area="default"]
*
* area = widget area ID
*/
if ( ! function_exists( 'wm_shortcode_widget_area' ) ) {
	function wm_shortcode_widget_area( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'area' => ''
			), $atts )
			);

		$widgetAreas = array_flip( wm_widget_areas() );

		//validation
		$area = ( in_array( $area, $widgetAreas ) && '' != $area ) ? ( $area ) : ( null );

		//wm_sidebar($defaultSidebar, $class, $restrictCount, $overrideSidebar, $print)
		if( $area )
			return wm_sidebar( $area, 'columns', 5, null, 'return' );
	}
} // /wm_shortcode_widget_area
add_shortcode( 'widgets', 'wm_shortcode_widget_area' );

?>