<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Admin functions
*****************************************************
*/

/*
*****************************************************
*      BASIC SETTINGS
*****************************************************
*/
//define('EMPTY_TRASH_DAYS', 30); //Empties trash automatically after specific amount of days



//Layouts and patterns
require_once( WM_STYLES . 'a-layouts.php' );

//Widgets areas
require_once( WM_LIBRARY . 'sidebars.php' );

//Custom posts
if ( 'disable' != wm_option( 'general-role-clients' ) )
	require_once( WM_CUSTOMS . 'cp-clients.php' );
require_once( WM_CUSTOMS . 'cp-modules.php' );
require_once( WM_CUSTOMS . 'cp-portfolio.php' );
require_once( WM_CUSTOMS . 'cp-slides.php' );
if ( 'disable' != wm_option( 'general-role-team' ) )
	require_once( WM_CUSTOMS . 'cp-team.php' );

//Taxonomies
require_once( WM_CUSTOMS . 'ct-taxonomies.php' );

//Help
if ( is_admin() && ! wm_option( 'general-no-help' ) )
	require_once( WM_HELP . 'help.php' );


//Load the form generator functions
if ( is_admin() && current_user_can( 'edit_posts' ) )
	require_once( WM_LIBRARY . 'form-generator.php' );

//Admin panel
if ( is_admin() && current_user_can( 'edit_themes' ) )
	require_once( WM_LIBRARY . 'wm-options-panel.php' );

//Meta boxes
if ( is_admin() && current_user_can( 'edit_pages' ) )
	require_once( WM_META . 'm-page.php' );
if ( is_admin() && current_user_can( 'edit_posts' ) ) {
	require_once( WM_META . 'm-post.php' );
	require_once( WM_META . 'm-cp-clients.php' );
	require_once( WM_META . 'm-cp-modules.php' );
	require_once( WM_META . 'm-cp-portfolio.php' );
	require_once( WM_META . 'm-cp-slides.php' );
	if ( ! wm_option( 'general-cp-team' ) )
		require_once( WM_META . 'm-cp-team.php' );
}

//Shortcodes
require_once( WM_SHORTCODES . 'shortcodes.php' );
if ( is_admin() && current_user_can( 'edit_posts' ) )
	require_once( WM_SHORTCODES . 'shortcodes-generator.php' );

//Theme updater
if ( is_admin() && current_user_can( 'edit_themes' ) && ! wm_option( 'general-no-update-notifier' ) )
	require_once( WM_LIBRARY . 'updater/update-notifier.php' );






/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
$adminPages = array( 'page', 'post', 'wm_clients', 'wm_modules', 'wm_portfolio', 'wm_slides', 'wm_team' ); //admin pages with below styles and scripts applied

//ACTIONS
//Admin customization
add_action( 'admin_head', 'wm_admin_head' );
add_action( 'admin_enqueue_scripts', 'wm_admin_include' );
//add_action( 'wp_dashboard_setup', 'wm_admin_remove_dashboard_widgets' );
add_action( 'admin_footer', 'wm_admin_footer_scripts' );
//Login customization
add_action( 'login_head', 'wm_login_css' );
//Admin menu and submenus
if ( is_admin() && ! wm_option( 'general-default-admin-menu' ) )
	add_action( 'admin_menu', 'wm_change_admin_menu' );
//add_action( '_admin_menu', 'wm_remove_editor_menu', 1 );
//Disable comments
if ( is_admin() && wm_option( 'general-page-comments' ) )
	add_action ( 'admin_footer', 'wm_comments_page_off' );
if ( is_admin() && wm_option( 'general-post-comments' ) )
	add_action ( 'admin_footer', 'wm_comments_post_off' );

//FILTERS
//TinyMCE customization
if ( is_admin() ) {
	add_filter( 'tiny_mce_before_init', 'wm_custom_mce_format' );
	add_filter( 'mce_buttons', 'wm_add_buttons_row1' );
	add_filter( 'mce_buttons_2', 'wm_add_buttons_row2' );
}
//Login customization
add_filter( 'login_headertitle', 'wm_login_headertitle' );
add_filter( 'login_headerurl', 'wm_login_headerurl' );
//Admin customization
if ( is_admin() )
	add_filter( 'admin_footer_text', 'wm_admin_footer' );
//User profile
add_filter( 'user_contactmethods', 'wm_user_contact_methods' );
//Post/page thumbnail in admin list
if ( is_admin() ) {
	add_filter( 'manage_post_posts_columns', 'wm_admin_post_list_columns' );
	add_filter( 'manage_post_posts_custom_column', 'wm_admin_post_list_columns_content', 10, 2 );
	add_filter( 'manage_pages_columns', 'wm_admin_page_list_columns' );
	add_filter( 'manage_pages_custom_column', 'wm_admin_post_list_columns_content', 10, 2 );
}
//Change title text when creating new post
if ( is_admin() )
	add_filter( 'enter_title_here', 'wm_change_new_post_title' );





/*
*****************************************************
*      STYLES AND SCRIPTS INCLUSION
*****************************************************
*/
/*
* Admin assets
*/
if ( ! function_exists( 'wm_admin_include' ) ) {
	function wm_admin_include( ) {
		global $current_screen, $adminPages;

		//styles
		wp_enqueue_style( 'wm-admin-addons' );
		//scripts
		wp_enqueue_script( 'wm-wp-admin' );

		//WordPress 3.3+ specific
		if ( wm_check_wp_version( 3.3 ) ) {
			//styles
			wp_enqueue_style( 'wp-pointer' );
			//scripts
			wp_enqueue_script( 'wp-pointer' );
		}

		//admin sections specific
		if ( in_array( $current_screen->id, $adminPages ) ) {
			//styles
			wp_enqueue_style( 'fancybox' );
			wp_enqueue_style( 'wm-options-panel' );

			//scripts
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-tabs' );
			wp_enqueue_script( 'jquery-ui-slider' );
			wp_enqueue_script( 'fancybox' );
			wp_enqueue_script( 'wm-options-panel' );
		}
	}
} // /wm_admin_include



/*
* Admin scripts codes in footer
*/
if ( ! function_exists( 'wm_admin_footer_scripts' ) ) {
	function wm_admin_footer_scripts() {
		global $current_screen, $adminPages;

		$out = '';

		//admin sections specific
		if ( in_array( $current_screen->id, $adminPages ) )
			$out .= "\r\n" . 'jQuery( ".wm-wrap.jquery-ui-tabs" ).tabs();';

		/*
		if ( isset( $_GET['post'] ) && $_GET['post'] == get_option( 'page_for_posts' ) )
			$out .= "\r\n" . 'jQuery( "#postdivrich" ).hide();';
		*/

		//output
		if ( $out )
			echo '
				<script type="text/javascript">
				//<![CDATA[
				jQuery(function() {
					' . $out . '
				});
				//]]>
				</script>';
	}
} // /wm_admin_footer_scripts





/*
*****************************************************
*      ADMIN LOGIN
*****************************************************
*/
/*
* Login CSS styles file
*/
if ( ! function_exists( 'wm_login_css' ) ) {
	function wm_login_css() {
		$url = WM_ASSETS_ADMIN . 'css/login-addon.css';

		echo '<link rel="stylesheet" type="text/css" href="' . $url . '" media="screen" />' . "\r\n";
	}
} // /wm_login_css



/*
* Login logo title
*/
if ( ! function_exists( 'wm_login_headertitle' ) ) {
	function wm_login_headertitle() {
		return get_bloginfo( 'name' );
	}
} // /wm_login_headertitle



/*
* Login logo URL
*/
if ( ! function_exists( 'wm_login_headerurl' ) ) {
	function wm_login_headerurl() {
		return get_bloginfo( 'url' );
	}
} // /wm_login_headerurl





/*
*****************************************************
*      ADMIN DASHBOARD CUSOMIZATION
*****************************************************
*/
/*
* Admin footer text customization
*/
if ( ! function_exists( 'wm_admin_footer' ) ) {
	function wm_admin_footer() {
		$out = ( wm_option( 'design-admin-footer' ) ) ? ( '&copy; ' . get_bloginfo( 'name' ) . ' | ' . wm_option( 'design-admin-footer' ) ) : ( '&copy; ' . get_bloginfo( 'name' ) . ' | Powered by <a href="http://wordpress.org/">WordPress</a> | Customized by <a href="http://www.webmandesign.eu">WebMan</a>' );

		echo $out;
	}
} // /wm_admin_footer



/*
* Admin HTML head
*/
if ( ! function_exists( 'wm_admin_head' ) ) {
	function wm_admin_head() {
		$out = '';

		//HTML5 tags registration for WordPress 3.2- (just in case)
		if ( ! wm_check_wp_version( '3.3' ) ) {
			$out .= '<!--[if lt IE 9]>' . "\r\n";
			$out .= '<script src="' . WM_ASSETS_THEME . 'js/html5.js" type="text/javascript"></script>' . "\r\n";
			$out .= '<![endif]-->' . "\r\n";
		}

		/*
		* WordPress admin logo sizes
		*
		* WP 3.1 = 32x32
		* WP 3.2 = 16x16
		* WP 3.3 = 20x20
		*/
		if ( wm_option( 'design-admin-logo' ) ) {
			$out .= '<style type="text/css">' . "\r\n";
			$out .= '#header-logo, #wp-admin-bar-wp-logo .ab-icon {' . "\r\n";
			$out .= 'background-image: url(' . wm_option( 'design-admin-logo' ) . ') !important;' . "\r\n";
			$out .= 'background-repeat: no-repeat !important;' . "\r\n";
			$out .= 'background-position: 50% 50% !important;' . "\r\n";
			$out .= '}' . "\r\n";
			$out .= '</style>' . "\r\n";
		}

		echo $out;
	}
} // /wm_admin_head





/*
*****************************************************
*      ADMIN POST / PAGE FUNCTIONS
*****************************************************
*/
/*
* Admin post list columns
*
* $columns = ARRAY [check WordPress codex on this]
*/
if ( ! function_exists( 'wm_admin_post_list_columns' ) ) {
	function wm_admin_post_list_columns( $columns ) {
		$add = array_slice( $columns, 0, 1 );

		$add['wm-thumb'] = __( 'Image', WM_THEME_TEXTDOMAIN_ADMIN );

		$columns = array_merge( $add, array_slice( $columns, 1 ) );

		return $columns;
	}
} // /wm_admin_post_list_columns

/*
* Admin page list columns
*
* $columns = ARRAY [check WordPress codex on this]
*/
if ( ! function_exists( 'wm_admin_page_list_columns' ) ) {
	function wm_admin_page_list_columns( $columns ) {
		$columns['wm-template'] = __( 'Page template', WM_THEME_TEXTDOMAIN_ADMIN );
		$columns['wm-thumb']    = __( 'Image', WM_THEME_TEXTDOMAIN_ADMIN );

		return $columns;
	}
} // /wm_admin_page_list_columns

/*
* Admin post list columns content
*
* $columns = ARRAY [check WordPress codex on this]
* $post_id = # [current post ID]
*/
if ( ! function_exists( 'wm_admin_post_list_columns_content' ) ) {
	function wm_admin_post_list_columns_content( $columns, $post_id ) {
		$size = explode( 'x', WM_ADMIN_LIST_THUMB );

		switch ( $columns ) {
			case 'wm-thumb': //post/page thumbnail

				$image = ( has_post_thumbnail() ) ? ( get_the_post_thumbnail( null, 'widget' ) ) : ( '<img src="' . WM_ASSETS_ADMIN . 'img/no-thumb.png" alt="' . __( 'No image', WM_THEME_TEXTDOMAIN_ADMIN ) . '" title="' . __( 'No image', WM_THEME_TEXTDOMAIN_ADMIN ) . '" width="' . $size[0] . '" height="' . $size[1] . '" />' );

				if ( get_edit_post_link() )
					edit_post_link( $image );
				else
					echo '<a href="' . get_permalink() . '">' . $image . '</a>';

			break;
			case 'wm-template': //page template

				$tplFile = get_post_meta( $post_id, '_wp_page_template', TRUE );

				if ( $tplFile && 'default' != $tplFile ) {
					$tplName = array_search( $tplFile, get_page_templates() );
					echo '<strong>"' . $tplName . '"</strong>';
				}

			break;
		}
	}
} // /wm_admin_post_list_columns_content





/*
*****************************************************
*      VISUAL EDITOR IMPROVEMENTS
*****************************************************
*/
add_editor_style( 'assets/css/visual-editor.css' );



/*
* Add buttons to visual editor first row
*
* $buttons = ARRAY [default WordPress visual editor buttons array]
*/
if ( ! function_exists( 'wm_add_buttons_row1' ) ) {
	function wm_add_buttons_row1( $buttons ) {
		//inserting buttons after "link" buttons group
		$pos = array_search( 'unlink', $buttons, true );
		if ( $pos != false ) {
			$add = array_slice( $buttons, 0, $pos + 1 );
			$add[] = 'anchor';
			$add[] = '|';
			$buttons = array_merge( $add, array_slice( $buttons, $pos + 1 ) );
		}
		//inserting buttons after "more" button
		$pos = array_search( 'wp_more', $buttons, true );
		if ( $pos != false ) {
			$add = array_slice( $buttons, 0, $pos + 1 );
			$add[] = 'wp_page';
			$buttons = array_merge( $add, array_slice( $buttons, $pos + 1 ) );
		}
		//at the end of the row
		$rowEnd = array( '|', 'styleselect' );
		array_push( $buttons, implode( ',', $rowEnd ) );
		return $buttons;
	}
} // /wm_add_buttons_row1

/*
* Add buttons to visual editor second row
*
* $buttons = ARRAY [default WordPress visual editor buttons array]
*/
if ( ! function_exists( 'wm_add_buttons_row2' ) ) {
	function wm_add_buttons_row2( $buttons ) {
		//inserting buttons after "foreground color" button
		$pos = array_search( 'forecolor', $buttons, true );
		if ( $pos != false ) {
			$add = array_slice( $buttons, 0, $pos + 1 );
			$add[] = '|';
			$add[] = 'sub';
			$add[] = 'sup';
			$add[] = '|';
			$add[] = 'removeformat';
			$buttons = array_merge( $add, array_slice( $buttons, $pos + 1 ) );
		}
		return $buttons;
	}
} // /wm_add_buttons_row2



/*
* Customizing format dropdown items and styles dropdown
*
* $init = ARRAY [check WordPress codex on this]
*/
if ( ! function_exists( 'wm_custom_mce_format' ) ) {
	function wm_custom_mce_format( $init ) {
		//define styles
		/*
		title [required]
			= label for this dropdown item

		selector | block | inline [required]
			= selector limits the style to a specific HTML tag, and will apply the style to an existing tag instead of creating one
			= block creates a new block-level element with the style applied, and WILL REPLACE the existing block element around the cursor
			= inline creates a new inline element with the style applied, and will wrap whatever is selected in the editor, not replacing any tags

		classes [optional]
			= space-separated list of classes to apply to the element

		styles [optional]
			= array of inline styles to apply to the element (two-word attributes, like font-weight, are written in Javascript-friendly camel case: fontWeight)

		attributes [optional]
			= assigns attributes to the element (same syntax as styles)

		wrapper [optional, default = false]
			= if set to true, creates a NEW BLOCK-LEVEL ELEMENT AROUND ANY SELECTED BLOCK-LEVEL ELEMENTS

		exact [optional, default = false]
			= disables the "merge similar styles" feature, needed for some CSS inheritance issues
		*/
		$styles = array(

			//image frame, margin, big text
			array(
				'title'    => __( 'No top margin', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected paragraph, address or heading element', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>',
				'selector' => 'p,h1,h2,h3,h4,h5,h6,address',
				'classes'  => 'mt0'
			),
			array(
				'title'    => __( 'Big text', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected text', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>',
				'selector' => 'p,h2,h3,h4,h5,h6',
				'classes'  => 'big-size'
			),
			array(
				'title'    => __( 'Framed image', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected image', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>',
				'selector' => 'img',
				'classes'  => 'frame'
			),

			//accordion
			array(
				'title' => __( 'ACCORDION', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected unordered list', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>'
			),
				array(
					'title'   => __( 'Section title', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected unformated text inside accordion section (list item)', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>',
					'inline'  => 'h3',
					'classes' => 'accordion-heading'
				),
				array(
					'title'   => __( 'Accordion wrapper', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'accordion-wrapper',
					'wrapper' => true
				),
				array(
					'title'    => __( '- automatic accordion', WM_THEME_TEXTDOMAIN_ADMIN ),
					'selector' => 'div.accordion-wrapper',
					'classes'  => 'auto'
				),

			//buttons
			array(
				'title' => __( 'BUTTONS', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected link, that will be transformed to button', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>'
			),
				array(
					'title'    => __( 'Gray button', WM_THEME_TEXTDOMAIN_ADMIN ),
					'selector' => 'a',
					'classes'  => 'btn type-gray'
				),
				array(
					'title'    => __( 'Green button', WM_THEME_TEXTDOMAIN_ADMIN ),
					'selector' => 'a',
					'classes'  => 'btn type-green'
				),
				array(
					'title'    => __( 'Blue button', WM_THEME_TEXTDOMAIN_ADMIN ),
					'selector' => 'a',
					'classes'  => 'btn type-blue'
				),
				array(
					'title'    => __( 'Orange button', WM_THEME_TEXTDOMAIN_ADMIN ),
					'selector' => 'a',
					'classes'  => 'btn type-orange'
				),
				array(
					'title'    => __( 'Red button', WM_THEME_TEXTDOMAIN_ADMIN ),
					'selector' => 'a',
					'classes'  => 'btn type-red'
				),
				array(
					'title'    => __( '- medium size', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Rising size of created button', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>',
					'selector' => 'a.btn',
					'classes'  => 'size-medium'
				),
				array(
					'title'    => __( '- large size', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Rising size of created button', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>',
					'selector' => 'a.btn',
					'classes'  => 'size-large'
				),

			//code
			array(
				'title' => __( 'CODE', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected unformated text', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>'
			),
				array(
					'title'   => __( 'Inline code', WM_THEME_TEXTDOMAIN_ADMIN ),
					'inline'   => 'code'
				),

			//columns
			array(
				'title' => __( 'COLUMNS', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected unformated text. You can format the text afterwards.', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>'
			),
				array(
					'title'      => __( '- last column in row', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on last column in row', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>',
					'selector'   => 'div.column',
					'classes'    => 'last',
					'attributes' => array(
						'dataLast' => 'last'
						)
				),
				array(
					'title'   => __( 'Column 1/2', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'column col-12'
				),
				array(
					'title'   => __( 'Column 1/3', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'column col-13'
				),
				array(
					'title'   => __( 'Column 2/3', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'column col-23'
				),
				array(
					'title'   => __( 'Column 1/4', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'column col-14'
				),
				array(
					'title'   => __( 'Column 3/4', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'column col-34'
				),
				array(
					'title'   => __( 'Column 1/5', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'column col-15'
				),
				array(
					'title'   => __( 'Column 2/5', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'column col-25'
				),
				array(
					'title'   => __( 'Column 3/5', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'column col-35'
				),
				array(
					'title'   => __( 'Column 4/5', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'column col-45'
				),
				array(
					'title'   => __( 'Column 1/6', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'column col-16'
				),
				array(
					'title'   => __( 'Column 5/6', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'column col-56'
				),

			//dropcaps
			array(
				'title' => __( 'DROPCAPS', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected letter', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>'
			),
				array(
					'title'   => __( 'Normal dropcap', WM_THEME_TEXTDOMAIN_ADMIN ),
					'inline'  => 'span',
					'classes' => 'dropcap'
				),
				array(
					'title'   => __( 'Rounded dropcap', WM_THEME_TEXTDOMAIN_ADMIN ),
					'inline'  => 'span',
					'classes' => 'dropcap round'
				),
				array(
					'title'   => __( 'Square dropcap', WM_THEME_TEXTDOMAIN_ADMIN ),
					'inline'  => 'span',
					'classes' => 'dropcap square'
				),

			//lists
			array(
				'title' => __( 'LIST ITEMS', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected unordered list', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>'
			),
				array(
					'title'    => __( 'Arrow list', WM_THEME_TEXTDOMAIN_ADMIN ),
					'selector' => 'ul',
					'classes'  => 'arrow'
				),
				array(
					'title'    => __( 'Arrow (inverted) list', WM_THEME_TEXTDOMAIN_ADMIN ),
					'selector' => 'ul',
					'classes'  => 'arrow-invert'
				),
				array(
					'title'    => __( 'Star list', WM_THEME_TEXTDOMAIN_ADMIN ),
					'selector' => 'ul',
					'classes'  => 'star'
				),
				array(
					'title'    => __( 'Star (inverted) list', WM_THEME_TEXTDOMAIN_ADMIN ),
					'selector' => 'ul',
					'classes'  => 'star-invert'
				),
				array(
					'title'    => __( 'Check list', WM_THEME_TEXTDOMAIN_ADMIN ),
					'selector' => 'ul',
					'classes'  => 'check'
				),
				array(
					'title'    => __( 'Check (inverted) list', WM_THEME_TEXTDOMAIN_ADMIN ),
					'selector' => 'ul',
					'classes'  => 'check-invert'
				),
				array(
					'title'    => __( 'Plus list', WM_THEME_TEXTDOMAIN_ADMIN ),
					'selector' => 'ul',
					'classes'  => 'plus'
				),
				array(
					'title'    => __( 'Plus (inverted) list', WM_THEME_TEXTDOMAIN_ADMIN ),
					'selector' => 'ul',
					'classes'  => 'plus-invert'
				),

			//highlights, markers
			array(
				'title' => __( 'MARKERS', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected unformated text', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>'
			),
				array(
					'title'   => __( 'Gray marker', WM_THEME_TEXTDOMAIN_ADMIN ),
					'inline'  => 'span',
					'classes' => 'marker type-gray'
				),
				array(
					'title'   => __( 'Green marker', WM_THEME_TEXTDOMAIN_ADMIN ),
					'inline'  => 'span',
					'classes' => 'marker type-green'
				),
				array(
					'title'   => __( 'Blue marker', WM_THEME_TEXTDOMAIN_ADMIN ),
					'inline'  => 'span',
					'classes' => 'marker type-blue'
				),
				array(
					'title'   => __( 'Orange marker', WM_THEME_TEXTDOMAIN_ADMIN ),
					'inline'  => 'span',
					'classes' => 'marker type-orange'
				),
				array(
					'title'   => __( 'Red marker', WM_THEME_TEXTDOMAIN_ADMIN ),
					'inline'  => 'span',
					'classes' => 'marker type-red'
				),

			//message boxes
			array(
				'title' => __( 'MESSAGE BOXES', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected unformated text. You can format the text afterwards.', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>'
			),
				array(
					'title'   => __( 'General (gray)', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'msg type-gray'
				),
				array(
					'title'   => __( 'Success (green)', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'msg type-green'
				),
				array(
					'title'   => __( 'Info (blue)', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'msg type-blue'
				),
				array(
					'title'   => __( 'Warning (orange)', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'msg type-orange'
				),
				array(
					'title'   => __( 'Error (red)', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'msg type-red'
				),
				array(
					'title'    => __( '- icon "Info"', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Adding icon to message box', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>',
					'selector' => 'div.msg',
					'classes'  => 'icon-box icon-info'
				),
				array(
					'title'    => __( '- icon "Question"', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Adding icon to message box', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>',
					'selector' => 'div.msg',
					'classes'  => 'icon-box icon-question'
				),
				array(
					'title'    => __( '- icon "Check"', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Adding icon to message box', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>',
					'selector' => 'div.msg',
					'classes'  => 'icon-box icon-check'
				),
				array(
					'title'    => __( '- icon "Warning"', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Adding icon to message box', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>',
					'selector' => 'div.msg',
					'classes'  => 'icon-box icon-warning'
				),
				array(
					'title'    => __( '- icon "Cancel"', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Adding icon to message box', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>',
					'selector' => 'div.msg',
					'classes'  => 'icon-box icon-cancel'
				),

			//pullquotes
			array(
				'title' => __( 'PULLQUOTES', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected unformated text (do not apply on blockquote elements)', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>'
			),
				array(
					'title'   => __( 'Left pullquote', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'blockquote',
					'classes' => 'pullquote alignleft'
				),
				array(
					'title'   => __( 'Right pullquote', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'blockquote',
					'classes' => 'pullquote alignright'
				),

			//tabs
			array(
				'title' => __( 'TABS', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected unordered list', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>'
			),
				array(
					'title'   => __( 'Section title', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected unformated text inside tab section (list item)', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>',
					'inline'  => 'h3',
					'classes' => 'tab-heading'
				),
				array(
					'title'   => __( 'Tabs wrapper', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'tabs-wrapper',
					'wrapper' => true
				),

			//toggle
			array(
				'title' => __( 'TOGGLE', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on selected heading and subsequent text', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>'
			),
				array(
					'title'    => __( 'Section title', WM_THEME_TEXTDOMAIN_ADMIN ) . ' <span class="inline-help" title="' . __( 'Apply on toggle heading (first heading in selected text section)', WM_THEME_TEXTDOMAIN_ADMIN ) . '"></span>',
					'selector' => 'h2,h3,h4,h5,h6',
					'classes'  => 'toggle-heading'
				),
				array(
					'title'   => __( 'Toggle wrapper', WM_THEME_TEXTDOMAIN_ADMIN ),
					'block'   => 'div',
					'classes' => 'toggle-wrapper',
					'exact'   => true,
					'wrapper' => true
				),

		);

		$init['style_formats'] = json_encode( $styles );

		//format buttons, default = 'p,address,pre,h1,h2,h3,h4,h5,h6'
		$init['theme_advanced_blockformats'] = 'p,h2,h3,h4,h5,h6,pre,address,div';

		//command separated string of extended elements
		$ext = 'pre[id|name|class|style]';
		//add to extended_valid_elements if it alreay exists
		if ( isset( $init['extended_valid_elements'] ) )
			$init['extended_valid_elements'] .= ',' . $ext;
		else
			$init['extended_valid_elements'] = $ext;

		return $init;
	}
} // /wm_custom_mce_format





/*
*****************************************************
*      OTHER FUNCTIONS
*****************************************************
*/
/*
* Adding new contact fields to WordPress user profile
*
* $user_contactmethods = ARRAY [default WordPress user account contact fields]
*/
if ( ! function_exists( 'wm_user_contact_methods' ) ) {
	function wm_user_contact_methods( $user_contactmethods ) {
		//unset( $user_contactmethods['yim'] );
		//unset( $user_contactmethods['aim'] );
		//unset( $user_contactmethods['jabber'] );

		$user_contactmethods['twitter']    = 'Twitter';
		$user_contactmethods['facebook']   = 'Facebook';
		$user_contactmethods['googleplus'] = 'Google+';

		return $user_contactmethods;
	}
} // /wm_user_contact_methods



/*
* Rearrange admin menu items
*
* Thanks to Randy Hoyt (http://randyhoyt.com/) for inspiration
*/
if ( ! function_exists( 'wm_change_admin_menu' ) ) {
	function wm_change_admin_menu() {
		global $menu;

		$menu[6] = $menu[5]; //copies "Posts" one position down
		$menu[5] = $menu[20]; //copies "Pages" on "Posts" position
		unset( $menu[20] ); //removes original "Pages" position

		$menu[12] = $menu[4]; //separator

		$menu[14] = $menu[10]; //copies "Media" right before "Links"
		unset( $menu[10] ); //removes original "Media" position
	}
} // /wm_change_admin_menu



/*
* Changes "Enter title here" text when creating new post
*/
if ( ! function_exists( 'wm_change_new_post_title' ) ) {
	function wm_change_new_post_title( $title ){
		$screen = get_current_screen();

		if ( 'wm_clients' == $screen->post_type )
			$title = __( "Client's name", WM_THEME_TEXTDOMAIN_ADMIN );

		if ( 'wm_team' == $screen->post_type )
			$title = __( 'Full name', WM_THEME_TEXTDOMAIN_ADMIN );

		return $title;
	}
} // /wm_change_new_post_title



/*
* Switch page comments and pingbacks off
*/
if ( ! function_exists( 'wm_comments_page_off' ) ) {
	function wm_comments_page_off() {
		global $current_screen;

		if ( isset( $current_screen->post_type ) && 'page' == $current_screen->post_type && isset( $current_screen->action ) && 'add' == $current_screen->action ) {
			$out = '<script>
				if ( document.post ) {
					var the_comment = document.post.comment_status,
					    the_ping    = document.post.ping_status;
					if ( the_comment && the_ping ) {
						the_comment.checked = false;
						the_ping.checked    = false;
					}
				}
				</script>';

			echo $out;
		}
	}
} // /wm_comments_page_off

/*
* Switch post comments and pingbacks off
*/
if ( ! function_exists( 'wm_comments_post_off' ) ) {
	function wm_comments_post_off() {
		global $current_screen;

		if ( isset( $current_screen->post_type ) && 'post' == $current_screen->post_type && isset( $current_screen->action ) && 'add' == $current_screen->action ) {
			$out = '<script>
				if ( document.post ) {
					var the_comment = document.post.comment_status,
					    the_ping    = document.post.ping_status;
					if ( the_comment && the_ping ) {
						the_comment.checked = false;
						the_ping.checked    = false;
					}
				}
				</script>';

			echo $out;
		}
	}
} // /wm_comments_post_off

?>