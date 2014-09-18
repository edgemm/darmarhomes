<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* File prefixes used:
* a-            options array
* cp-           custom post
* ct-           custom taxonomies
* m-            meta box
* s-            slider content
* w-            widget
* no prefix     core function files
*
* Core functions
*****************************************************
*/

//Theme hooks
require_once( WM_HOOKS . 'hooks.php' );

//Slider generator functions
require_once( WM_SLIDERS . 's-simple.php' );
require_once( WM_SLIDERS . 's-nivo.php' );
require_once( WM_SLIDERS . 's-kwicks.php' );
require_once( WM_SLIDERS . 's-roundabout.php' );



/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
//ACTIONS
//Registering theme styles and scripts
add_action( 'init', 'wm_register_assets' );
//Main content start
/*
* c = call to action
* h = page / post heading
* s = slider
*
* Default positions: 's-c-h'
*/
$beforeMainContentPositions = ( wm_option( 'layout-chs-positions' ) && 5 === strlen( wm_option( 'layout-chs-positions' ) ) ) ? ( explode( '-', wm_option( 'layout-chs-positions' ) ) ) : ( explode( '-', WM_HEADER_SECTIONS_POSITIONS ) );
$beforeMainContentPositions = array_flip( $beforeMainContentPositions );

add_action( 'wm_after_header', 'wm_call_to_action', $beforeMainContentPositions['c'] );
add_action( 'wm_after_header', 'wm_heading', $beforeMainContentPositions['h'] );
add_action( 'wm_after_header', 'wm_slider', $beforeMainContentPositions['s'] );
add_action( 'wm_before_main_content', 'wm_display_breadcrumbs' );
//Posts list
add_action( 'wm_after_list', 'wm_pagination', 1 );
//Post/page end
add_action( 'wm_end_post', 'wm_display_gallery', 1 );
add_action( 'wm_end_post', 'wm_post_parts', 10 );
add_action( 'wm_after_post', 'wm_author_info', 10 );
add_action( 'wm_sharing', 'wm_social_share_buttons', 1 );
//Custom scripts
add_action( 'wp_head', 'wm_scripts_header', 1000 );
add_action( 'wp_footer', 'wm_scripts_footer', 1000 );
//Feeds
add_action( 'wp_head', 'wm_custom_feed', 10 );

//FILTERS
//Password protected post
add_filter( 'the_password_form', 'wm_password_form' );
//Custom avatar
//add_filter( 'avatar_defaults', 'wm_custom_avatar' );
//Remove invalid HTML5 rel attribute
add_filter( 'the_category', 'wm_remove_rel' );
//Feed
add_filter( 'pre_get_posts', 'wm_feed_exclude_post_formats' );
add_filter( 'request', 'wm_feed_include_post_types' );
//Media uploader image sizes
add_filter( 'image_size_names_choose', 'wm_media_uploader_image_sizes' );





/*
*****************************************************
*      REGISTER STYLES AND SCRIPTS
*****************************************************
*/
/*
* Registering theme styles and scripts
*/
if ( ! function_exists( 'wm_register_assets' ) ) {
	function wm_register_assets() {
		//STYLES
		//for jquery plugins
		wp_register_style( 'prettyphoto', WM_ASSETS_THEME . 'css/prettyphoto/prettyphoto.css', false, WM_SCRIPTS_VERSION, 'screen' );
		wp_register_style( 'fancybox', WM_ASSETS_ADMIN . 'js/fancybox/jquery.fancybox.css', false, WM_SCRIPTS_VERSION, 'screen' );
		wp_register_style( 'color-picker', WM_ASSETS_ADMIN . 'css/colorpicker.css', false, WM_SCRIPTS_VERSION, 'screen' );
		wp_register_style( 'tipsy', WM_ASSETS_THEME . 'css/tipsy/tipsy.css', false, WM_SCRIPTS_VERSION, 'screen' );

		//sliders
		wp_register_style( 'simple-slider', WM_ASSETS_THEME . 'css/simple/simple.css', false, WM_SCRIPTS_VERSION, 'all' );
		wp_register_style( 'nivo', WM_ASSETS_THEME . 'css/nivo/nivo.css', false, WM_SCRIPTS_VERSION, 'all' );
		wp_register_style( 'kwicks', WM_ASSETS_THEME . 'css/kwicks/kwicks.css', false, WM_SCRIPTS_VERSION, 'all' );
		wp_register_style( 'roundabout', WM_ASSETS_THEME . 'css/roundabout/roundabout.css', false, WM_SCRIPTS_VERSION, 'all' );

		//other backend
		wp_register_style( 'wm-options-panel', WM_ASSETS_ADMIN . 'css/wm-options' . WM_ADMIN_PANEL_THEME . '/wm-options-panel.css', false, WM_SCRIPTS_VERSION, 'screen' );
		wp_register_style( 'wm-options-panel-white-label', WM_ASSETS_ADMIN . 'css/wm-options-white-label' . WM_ADMIN_PANEL_THEME . '/wm-options-panel.css', false, WM_SCRIPTS_VERSION, 'screen' );
		wp_register_style( 'wm-admin-addons', WM_ASSETS_ADMIN . 'css/admin-addon.css', false, WM_SCRIPTS_VERSION, 'screen' );
		wp_register_style( 'wm-buttons', WM_ASSETS_ADMIN . 'css/shortcodes/shortcodes.css', false, WM_SCRIPTS_VERSION, 'screen' );

		//SCRIPTS
		//backend
		wp_register_script( 'jquery-cookies', WM_ASSETS_ADMIN . 'js/jquery.cookies.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'easing', WM_ASSETS_THEME . 'js/jquery.easing/jquery.easing-1.3.pack.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'drag', WM_ASSETS_THEME . 'js/jquery.dragdrop/jquery.event.drag-2.2.min.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'drop', WM_ASSETS_THEME . 'js/jquery.dragdrop/jquery.event.drop-2.2.min.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'fancybox', WM_ASSETS_ADMIN . 'js/fancybox/jquery.fancybox.min.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'color-picker', WM_ASSETS_ADMIN . 'js/colorpicker.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true);
		if ( ! wm_check_wp_version( '3.3' ) )
			wp_register_script( 'jquery-ui-slider', WM_ASSETS_ADMIN . 'js/jquery/jquery.ui.slider.min.js', array( 'jquery' ), '1.8.16', true );

		//other backend
		wp_register_script( 'wm-wp-admin', WM_ASSETS_ADMIN . 'js/wm-scripts.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'wm-options-panel', WM_ASSETS_ADMIN . 'js/wm-options-panel.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'wm-options-panel-tabs', WM_ASSETS_ADMIN . 'js/wm-options-panel-tabs.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'wm-shortcodes', WM_ASSETS_ADMIN . 'js/shortcodes/wm-shortcodes.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );

		//sliders
		wp_register_script( 'simple-slider', WM_ASSETS_THEME . 'js/simple/simple.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'apply-simple-slider', WM_ASSETS_THEME . 'js/simple/apply-simple.js.php', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'nivo', WM_ASSETS_THEME . 'js/nivo/jquery.nivo.slider.pack.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'apply-nivo', WM_ASSETS_THEME . 'js/nivo/apply-nivo.js.php', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'kwicks', WM_ASSETS_THEME . 'js/kwicks/jquery.kwicks-1.5.1.pack.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'apply-kwicks', WM_ASSETS_THEME . 'js/kwicks/apply-kwicks.js.php', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'roundabout', WM_ASSETS_THEME . 'js/roundabout/jquery.roundabout.min.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'roundabout-shapes', WM_ASSETS_THEME . 'js/roundabout/jquery.roundabout-shapes.min.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'apply-roundabout', WM_ASSETS_THEME . 'js/roundabout/apply-roundabout.js.php', array( 'jquery' ), WM_SCRIPTS_VERSION, true );

		//frontend
		wp_register_script( 'imagesloaded', WM_ASSETS_THEME . 'js/imagesloaded/jquery.imagesloaded.min.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'wm-theme-scripts', WM_ASSETS_THEME . 'js/scripts.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'prettyphoto', WM_ASSETS_THEME . 'js/prettyphoto/jquery.prettyPhoto.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'quicksand', WM_ASSETS_THEME . 'js/quicksand/quicksand.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'portfolio', WM_ASSETS_THEME . 'js/portfolio.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
		wp_register_script( 'tipsy', WM_ASSETS_THEME . 'js/tipsy/jquery.tipsy.js', array( 'jquery' ), WM_SCRIPTS_VERSION, true );
	}
} // /wm_register_assets





/*
*****************************************************
*      VARIABLES
*****************************************************
*/
/*
* Categories list - returns array [id => name]
*
* $noEmpty = TEXT [if set the first empty option is not displayed]
*/
if ( ! function_exists( 'wm_categories' ) ) {
	function wm_categories( $noEmpty = null ) {
		$categories        = get_categories( 'hide_empty=0&hierarchical=1' );
		$categoryListArray = array();
		$postsCount        = wp_count_posts( 'post', 'readable' );

		if ( ! $noEmpty )
			$categoryListArray[-1] = __( '- Select posts category -', WM_THEME_TEXTDOMAIN_ADMIN );
		$categoryListArray[0]    = sprintf( __( '- All posts (%d) -', WM_THEME_TEXTDOMAIN_ADMIN ), absint( $postsCount->publish ) );

		foreach ( $categories as $category ) {
			$categoryListArray[$category->cat_ID] = $category->cat_name . ' (' . $category->count . ')';
		}

		return $categoryListArray;
	}
} // /wm_categories



/*
* Slides custom post categories list - returns array [id => name]
*
* $noEmpty = TEXT [if set the first empty option is not displayed]
*/
if ( ! function_exists( 'wm_slides_categories' ) ) {
	function wm_slides_categories( $noEmpty = null ) {
		$terms           = get_terms( 'wm-tax-cats-slides', 'hide_empty=0&hierarchical=1' );
		$count           = count( $terms );
		$slidesCatsArray = array();
		$slidesCount     = wp_count_posts( 'wm_slides', 'readable' );

		if ( ! $noEmpty )
			$slidesCatsArray[-1] = __( '- Select slides category -', WM_THEME_TEXTDOMAIN_ADMIN );
		$slidesCatsArray[0]    = sprintf( __( '- All slides (%d) -', WM_THEME_TEXTDOMAIN_ADMIN ), absint( $slidesCount->publish ) );

		if ( ! is_wp_error( $terms ) && $count > 0 ) {
			foreach ( $terms as $term ) {
				$slidesCatsArray[$term->term_id] = $term->name . ' (' . $term->count . ')';
			}
		}

		return $slidesCatsArray;
	}
} // /wm_slides_categories



/*
* Portfolio custom post categories list - returns array [id => name]
*
* $noEmpty = TEXT [if set the first empty option is not displayed]
*/
if ( ! function_exists( 'wm_portfolio_categories' ) ) {
	function wm_portfolio_categories( $noEmpty = null, $getAll = null ) {
		$terms      = get_terms( 'wm-tax-cats-portfolio', 'hide_empty=0&hierarchical=1' );
		$count      = count( $terms );
		$catsArray  = array();
		$itemsCount = wp_count_posts( 'wm_portfolio', 'readable' );

		if ( ! $noEmpty )
			$catsArray[-1] = __( '- Select portfolio category -', WM_THEME_TEXTDOMAIN_ADMIN );
		$catsArray[0]    = sprintf( __( '- All projects (%d) -', WM_THEME_TEXTDOMAIN_ADMIN ), absint( $itemsCount->publish ) );

		if ( ! is_wp_error( $terms ) && $count > 0 ) {
			foreach ( $terms as $term ) {
				if ( $getAll ) {
					$catsArray[$term->term_id] = $term->name . ' (' . $term->count . ')';
				} else {
					if ( ! $term->parent ) //get only parent categories, no children
						$catsArray[$term->term_id] = $term->name . ' (' . $term->count . ')';
				}
			}
		}

		return $catsArray;
	}
} // /wm_portfolio_categories



/*
* Pages list - returns array [id => name]
*/
if ( ! function_exists( 'wm_pages' ) ) {
	function wm_pages() {
		$pages             = get_pages();
		$pagesListArray    = array();
		$pagesListArray[0] = __( '- Select page -', WM_THEME_TEXTDOMAIN_ADMIN );

		foreach ( $pages as $page ) {
			$pagesListArray[$page->ID] = $page->post_title;
		}

		return $pagesListArray;
	}
} // /wm_pages



/*
* Get array of widget areas - returns array [id => name]
*/
if ( ! function_exists( 'wm_widget_areas' ) ) {
	function wm_widget_areas() {
		global $wp_registered_sidebars;
		$areas     = array();
		$areas[''] = __( '- Select area -', WM_THEME_TEXTDOMAIN_ADMIN );

		foreach ( $wp_registered_sidebars as $area ) {
			$areas[ $area['id'] ] = $area['name'];
		}

		return $areas;
	}
} // /wm_widget_areas



/*
* Get color schemes
*/
if ( ! function_exists( 'wm_color_schemes' ) ) {
	function wm_color_schemes() {
		//empty item
		$colorSchemes = array();

		//get files
		$files = array();

		if ( $dir = @opendir( WM_COLOR_SCHEMES ) ) {
			//this is the correct way to loop over the directory
			while ( false != ( $file = readdir( $dir ) ) ) {
				$files[] = $file;
			}
			closedir( $dir );
		}

		asort( $files );

		//create output array
		foreach ( $files as $file ) {
			if ( 5 < strlen( $file ) && 'css' == strtolower( pathinfo( $file, PATHINFO_EXTENSION ) ) ) {
				if ( wm_color_scheme_meta( $file, 'color-scheme' ) && WM_THEME_NAME === wm_color_scheme_meta( $file, 'package' ) )
					//$colorSchemes[$file] = wm_color_scheme_meta( $file, 'color-scheme' );
					$fileName       = str_replace( array( '.css', '.CSS' ), '', $file );
					$previewImage   = WM_ASSETS_THEME . 'css/colors/preview/' . $fileName . '.png';
					$item           = array();
					$item['name']   = wm_color_scheme_meta( $file, 'color-scheme' );
					$item['desc']   = wm_color_scheme_meta( $file, 'color-scheme' ) . ' - ' . wm_color_scheme_meta( $file, 'description' );
					$item['id']     = esc_attr( $fileName );
					$item['value']  = esc_attr( $file );
					$item['img']    = ( file_exists( WM_COLOR_SCHEMES . '/preview/' . $fileName . '.png' ) ) ? ( $previewImage ) : ( WM_ASSETS_ADMIN . 'img/color-scheme.png' );
					$colorSchemes[] = $item;
			}
		}

		return $colorSchemes;
	}
} // /wm_color_schemes



/*
* Get theme assets files
*
* $folder = TEXT [subfolder of theme assets folder - defaults to "img/patterns/"]
* $format = TEXT [file format to look for - defaults to ".png"]
*/
if ( ! function_exists( 'wm_get_image_files' ) ) {
	function wm_get_image_files( $folder = 'img/patterns/', $format = '.png' ) {
		//empty item
		$filesArray = array(
			array(
				'name' => __( '- None -', WM_THEME_TEXTDOMAIN_ADMIN ),
				'id'   => '',
				'img'  => ''
			)
		);

		//get files
		$files = array();

		if ( $dir = @opendir( TEMPLATEPATH . '/assets/' . $folder ) ) {
			//this is the correct way to loop over the directory
			while ( false != ( $file = readdir( $dir ) ) ) {
				$files[] = $file;
			}
			closedir( $dir );
		}

		asort( $files );

		//create output array
		foreach ( $files as $file ) {
			if ( 5 < strlen( $file ) && 'png' == strtolower( pathinfo( $file, PATHINFO_EXTENSION ) ) ) {
				$fileName = str_replace( $format, '', strtolower( $file ) );
				$itemName = str_replace( array( '-', '_' ), ' ', $fileName );

				$item         = array();
				$item['name'] = ucwords( $itemName );
				$item['id']   = esc_attr( $fileName );
				$item['img']  = esc_url( WM_ASSETS_THEME . $folder . $file );
				$filesArray[] = $item;
			}
		}

		return $filesArray;
	}
} // /wm_get_image_files





/*
*****************************************************
*      GET/SAVE THEME/META OPTIONS
*****************************************************
*/
/*
* Checks whether array value is "-1"
*/
if ( ! function_exists( 'wm_remove_negative_array' ) ) {
	function wm_remove_negative_array( $id ) {
		return ( -1 != $id );
	}
} // /wm_remove_negative_array

/*
* Checks whether array value is empty array
*/
if ( ! function_exists( 'wm_remove_empty_array' ) ) {
	function wm_remove_empty_array( $array ) {
		$arrayEmptyValuesOut = array_filter( $array );
		return ! empty( $arrayEmptyValuesOut );
	}
} // /wm_remove_empty_array



/*
* Get or echo the option
*
* $name  = TEXT [option name]
* $css   = TEXT ["css", "bgimg" - outputs CSS color or background image]
* $print = TEXT ["print" the value]
*/
function wm_option( $name, $css = null, $print = null ) {
	if ( ! isset( $name ) )
		return;

	global $themeOptions;

	$options = ( $themeOptions ) ? ( $themeOptions ) : ( get_option( WM_THEME_SETTINGS ) );
	$name    = WM_THEME_SETTINGS_PREFIX . $name;

	if ( ! isset( $options[$name] ) || ! $options[$name] )
		return;

	$array = ( is_array( $options[$name] ) ) ? ( true ) : ( false );

	//CSS output helper
	$color = ( is_string( $css ) && 5 <= strlen( $css ) && 'color' == substr( $css, 0, 5 ) ) ? ( '#' . str_replace( '#', '', stripslashes( $options[$name] ) ) ) : ( '' );
		$colorSuffix = ( $color && 5 < strlen( $css ) ) ? ( str_replace( 'color', '', $css ) ) : ( '' ); // use for example like "color !important"
	$bg = ( is_string( $css ) && 5 <= strlen( $css ) && 'bgimg' == substr( $css, 0, 5 ) ) ? ( 'url(' . esc_url( stripslashes( $options[$name] ) ) . ')' ) : ( '' );
		$bgSuffix = ( $bg && 5 < strlen( $css ) ) ? ( str_replace( 'bgimg', '', $css ) ) : ( '' ); // use for example for css positioning, repeat, ...

	//setting the output
	if ( $bg )
		$output = $bg . $bgSuffix;
	elseif ( $color )
		$output = $color . $colorSuffix;
	else
		$output = ( $array ) ? ( $options[$name] ) : ( stripslashes( $options[$name] ) );

	//output method
	if ( 'print' == $print )
		echo $output;
	else
		return $output;
} // /wm_option



/*
* Get the static option
*
* $name = TEXT [option name]
*/
if ( ! function_exists( 'wm_static_option' ) ) {
	function wm_static_option( $name ) {
		$options = get_option( WM_THEME_SETTINGS_STATIC );

		if ( isset( $options[$name] ) )
			return stripslashes( $options[$name] );
	}
} // /wm_static_option



/*
* Get or echo post/page meta option
*
* $name = TEXT [option name]
* $postId = # [specific post ID, else uses the current post ID]
* $print = TEXT ["print" the value]
*/
if ( ! function_exists( 'wm_meta_option' ) ) {
	function wm_meta_option( $name, $postId = null, $print = null ) {
		global $post;
		$postIdObj = ( $post ) ? ( $post->ID ) : ( null );
		$postId    = ( $postId ) ? ( absint( $postId ) ) : ( $postIdObj );

		if ( ! isset( $name ) || ! $postId )
			return;

		$meta = get_post_meta( $postId, WM_THEME_SETTINGS_META, true ); //TRUE = retrieve only the first value of a given key;
		$name = WM_THEME_SETTINGS_PREFIX . $name;

		if ( ! isset( $meta[$name] ) || ! $meta[$name] )
			return;

		$array = ( is_array( $meta[$name] ) ) ? ( true ) : ( false );

		if ( 'print' == $print )
			echo stripslashes( $meta[$name] );
		else
			return ( $array ) ? ( $meta[$name] ) : ( stripslashes( $meta[$name] ) );
	}
} // /wm_meta_option



/*
* Saves post/page meta (custom fields)
*
* $post_id = # [current post ID]
* $options = ARRAY [options array to save]
*/
if ( ! function_exists( 'wm_save_meta' ) ) {
	function wm_save_meta( $post_id, $options ) {
		if ( ! isset( $options ) || ! is_array( $options ) || empty( $options ) || ! $post_id )
			return;

		$newMetaOptions = get_post_meta( $post_id, WM_THEME_SETTINGS_META, true );
		if ( ! $newMetaOptions || empty( $newMetaOptions ) )
			$newMetaOptions = array();

		foreach ( $options as $value ) {

			if ( isset( $value['id'] ) ) {
				$valId = WM_THEME_SETTINGS_PREFIX . $value['id'];

				if ( isset( $_POST[$valId] ) ) {

					if ( is_array( $_POST[$valId] ) && ! empty( $_POST[$valId] ) ) {
						$updVal = $_POST[$valId];
						if ( isset( $value['field'] ) && 'attributes' == $value['field'] ) {
							$updVal = array_filter( $updVal, 'wm_remove_empty_array' );
						} else {
							$updVal = array_filter( $updVal, 'strlen' ); //removes null array items
							$updVal = array_filter( $updVal, 'wm_remove_negative_array' ); //removes '-1' array items
						}
					} else {
						$updVal = stripslashes( $_POST[$valId] );
					} //if value is array or not

					if ( isset( $value['validate'] ) && 'url' == $value['validate'] ) {
						$updVal = esc_url( $updVal );
					} elseif ( isset( $value['validate'] ) && 'absint' == $value['validate'] ) {
						$updVal = absint( $updVal );
					} elseif ( isset( $value['validate'] ) && 'int' == $value['validate'] ) {
						$updVal = intval( $updVal );
					}

				} //if $_POST set

				if ( isset( $_POST[$valId] ) && $value['id'] )
					$newMetaOptions[$valId] = $updVal;
				else
					$newMetaOptions[$valId] = '';
			} //if value ID set

		} // /foreach options

		update_post_meta( $post_id, WM_THEME_SETTINGS_META, $newMetaOptions );
	}
} // /wm_save_meta



/*
* Get color scheme meta
*
* $schemeFile = TEXT [color scheme file name]
* $meta       = TEXT [meta info title]
*/
if ( ! function_exists( 'wm_color_scheme_meta' ) ) {
	function wm_color_scheme_meta( $schemeFile, $meta ) {
		if ( ! $schemeFile || ! $meta || ! file_exists( WM_COLOR_SCHEMES . $schemeFile ) )
			return;

		$default_headers = array(
			'package'     => 'Package',
			'color-scheme' => 'Color Scheme',

			'html-bg-color'         => 'HTML',
			'wrap-bg-color'         => '#wrap',
			'wrap-shadow'           => '#wrap shadow',
			'header-bg-color'       => 'Header',
			'slider-bg-color'       => 'Slider',
			'cta-bg-color'          => 'Callout',
			'main-heading-bg-color' => 'Main heading',
			'clients-bg-color'      => 'Clients',
			'footer-bg-color'       => 'Footer',

			'link-color'             => 'Link color',
			'color-bglight'          => 'Text color on light background',
			'color-bglight-headings' => 'Headings color on light background',
			'color-bgdark'           => 'Text color on dark background',
			'color-bgdark-headings'  => 'Headings color on dark background',

			'gray-color'        => 'Gray color',
			'gray-text-color'   => 'Text on gray',
			'green-color'       => 'Green color',
			'green-text-color'  => 'Text on green',
			'blue-color'        => 'Blue color',
			'blue-text-color'   => 'Text on blue',
			'orange-color'      => 'Orange color',
			'orange-text-color' => 'Text on orange',
			'red-color'         => 'Red color',
			'red-text-color'    => 'Text on red',

			'icon-scheme'    => 'Icon scheme',

			'font-embed'     => 'Font embed',
			'font-primary'   => 'Font primary',
			'font-secondary' => 'Font secondary',

			'description' => 'Description',
			'version'     => 'Version',
			'author'      => 'Author'
			 );

		$fileMeta = get_file_data( WM_COLOR_SCHEMES . $schemeFile, $default_headers );

		$out = '';

		if ( $fileMeta['color-scheme'] && WM_THEME_NAME === $fileMeta['package'] ) {

			if ( is_array( $meta ) && ! empty( $meta ) ) {
				$metaArray = $fileMeta[ $meta[0] ];
				$metaArray = explode( ', ', $metaArray );
				$out = array();
				foreach ( $metaArray as $metaValue ) {
					$keyValue = explode( ' = ', $metaValue );
					$out[ $keyValue[0] ] = $keyValue[1];
				}
				$out = ( isset( $out[ $meta[1] ] ) ) ? ( $out[ $meta[1] ] ) : ( null );
			} else {
				$out = $fileMeta[$meta];
			}
		}

		return $out;
	}
} // /wm_color_scheme_meta





/*
*****************************************************
*      WIDGET AREAS
*****************************************************
*/
/*
* Display widget area (sidebar)
*
* $defaultSidebar  = TEXT [widget area ID to fall back as default (if not set, the first widget area defined is used)]
* $class           = TEXT [CSS class added on area container]
* $restrictCount   = # [do not display the sidebar if the number of widgets contained is higher]
* $overrideSidebar = TEXT [if set, the default widget area can be overridden with this area]
* $print           = TEXT ["print" the value]
* $hasInner        = TEXT [whether it contains inner content wrapper]
*/
if ( ! function_exists( 'wm_sidebar' ) ) {
	function wm_sidebar( $defaultSidebar = WM_SIDEBAR_FALLBACK, $class = 'sidebar', $restrictCount = null, $overrideSidebar = null, $print = 'print', $hasInner = null ) {
		global $post, $wp_registered_sidebars, $_wp_sidebars_widgets;

		//restriction = 0 means any number of widgets allowed
		$restrictCount = ( isset( $restrictCount ) && $restrictCount ) ? ( absint( $restrictCount ) ) : ( 0 );
		//set the sidebar to display - default sidebar
		$sidebar       = ( isset( $defaultSidebar ) && $defaultSidebar ) ? ( $defaultSidebar ) : ( $wp_registered_sidebars[0]['id'] );
		//set the sidebar to display - override sidebar
		$sidebar       = ( isset( $overrideSidebar ) && $overrideSidebar ) ? ( $overrideSidebar ) : ( $sidebar );
		//fall back to default if the sidebar doesn't exist
		$sidebar       = ( ! in_array( $sidebar, array_keys( $wp_registered_sidebars ) ) ) ? ( WM_SIDEBAR_FALLBACK ) : ( $sidebar );
		//get all widgets in all widget areas into array
		$widgetsList   = wp_get_sidebars_widgets();

		/*
		//cut the widgets over the restricted amount
		if( count($widgetsList[$sidebar]) > $restrictCount ) {
			$slicedWidgets = array_slice( $widgetsList[$sidebar], 0, $restrictCount );
			$widgetsList[$sidebar] = $slicedWidgets;
			wp_set_sidebars_widgets($widgetsList);
		}
		*/

		//if there are some widgets in $sidebar AND no restrictions applied or the number of the widgets in $sidebar is not greater then restriction
		$out = '';

		if ( is_active_sidebar( $sidebar ) && ( 0 == $restrictCount || ( $restrictCount >= count( $widgetsList[$sidebar] ) ) ) ) {
			if ( $hasInner )
				$out .= '<div class="' . $sidebar . '-wrap wrap-widgets">' . "\r\n";

			$out .= '<section id="' . $sidebar . '" class="widgets count-' . sizeof( $widgetsList[$sidebar] ) . ' ' . $class . '">' . "\r\n";

			$out .= wm_start_sidebar(); //hook

			if ( function_exists( 'ob_start' ) && function_exists( 'ob_end_flush' ) ) {
				ob_start();
				dynamic_sidebar( $sidebar );
				$out .= ob_get_clean(); //output and clear the buffer
			}

			$out .= wm_end_sidebar(); //hook

			$out .= '<!-- /' . $sidebar . ' /widgets --></section>' . "\r\n";

			if ( $hasInner )
				$out .= '<!-- /wrap-widgets --></div>' . "\r\n";
		}

		//output
		if ( 'print' == $print )
			echo $out;
		else
			return $out;
	}
} // /wm_sidebar





/*
*****************************************************
*      BREADCRUMBS AND PAGINATION
*****************************************************
*/
/*
* Pagination
*
* $args = ARRAY [array of settings:
	label_previous = TEXT ["Previous"]
	label_next     = TEXT ["Next"]
	before_output  = HTML [wrapper tag strat]
	after_output   = HTML [wrapper tag end]
	]
*/
if ( ! function_exists( 'wm_pagination' ) ) {
	function wm_pagination( $args = array(), $query = null ) {
		global $wp_query, $wp_rewrite;
		$defaults = array(
			'label_previous' => __( '&laquo; Prev', WM_THEME_TEXTDOMAIN ),
			'label_next'     => __( 'Next &raquo;', WM_THEME_TEXTDOMAIN ),
			'before_output'  => '<div class="pagination">',
			'after_output'   => '</div> <!-- /pagination -->'
			);
		$args = wp_parse_args( $args, $defaults );

		if ( $query )
			$wp_query = $query;

		//get current page
		$current = ( $wp_query->query_vars['paged'] > 1 ) ? ( $wp_query->query_vars['paged'] ) : ( 1 );

		//WordPress pagination settings
		$pagination = array(
			'base'      => @add_query_arg( 'paged', '%#%' ),
			'format'    => '',
			'total'     => $wp_query->max_num_pages,
			'current'   => $current,
			'prev_text' => $args['label_previous'],
			'next_text' => $args['label_next'],
			'type'      => 'plain'
			);

		//nice URLs
		if ( $wp_rewrite->using_permalinks() )
			$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
		//search
		if ( ! empty( $wp_query->query_vars['s'] ) )
			$pagination['add_args'] = array( 's' => get_query_var( 's' ) );

		//output
		if( 1 < $wp_query->max_num_pages )
			echo $args['before_output'] . paginate_links( $pagination ) . $args['after_output'];
	}
} // /wm_pagination



/*
* Breadcrumbs
*
* $args = ARRAY [array of settings:
	separator     = TEXT [">"]
	before_output = HTML [wrapper tag strat]
	after_output  = HTML [wrapper tag end]
	]
*/
if ( ! function_exists( 'wm_breadcrumbs' ) ) {
	function wm_breadcrumbs( $args = array() ) {
		global $post, $wp_query;

		$defaults = array(
			'separator'     => '&raquo;',
			'before_output' => '<div id="breadcrumbs" class="section border-color"><div class="wrap-inner">',
			'after_output'  => '<!-- /breadcrumbs --></div></div>'
			);
		$args      = wp_parse_args( $args, $defaults );
		$out       = '';

		$cats      = ( $post ) ? ( get_the_category() ) : ( array() );

		$parents   = ( isset( $post->ancestors ) ) ? ( $post->ancestors ) : ( null ); //get all parent pages in array
		$parents   = ( ! empty( $parents ) ) ? ( array_reverse( $parents ) ) : ( '' );  //flip the array

		$separator = ' <span class="separator">' . $args['separator'] . '</span> ';

		//Do not display breadcrumbs on homepage or main blog page
		if ( ! is_home() && ! is_front_page() ) {
		//no front page, nor home (posts list) page

			$out = $args['before_output'] . '<a href="' . get_bloginfo( 'url' ) . '" class="home-item">' . __( 'Home', WM_THEME_TEXTDOMAIN ) . '</a>' . $separator;

			if ( is_category() ) {
			//output single cat name and its parents

				$catId    = intval( get_query_var('cat') );
				$parent   = &get_category( $catId );
				$catsOut  = '';
				$blogPage = ( get_option( 'page_for_posts' ) ) ? ( '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . get_the_title( get_option( 'page_for_posts' ) ) . '</a>' . $separator ) : ( null );

				if ( is_wp_error( $parent ) )
					return $parent;
				if ( $parent->parent && ( $parent->parent != $parent->term_id ) )
					$catsOut .= get_category_parents( $parent->parent, true, $separator );

				$out .= $blogPage . $catsOut . '<span class="current-item">' . single_cat_title( '', FALSE ) . '</span>';;

			} elseif ( is_date() ) {
			//date archives

				$year      = get_the_time('Y');
				$month     = get_the_time('m');
				$monthname = get_the_time('F');
				$day       = get_the_time('d');
				$dayname   = get_the_time('l');

				if ( is_year() )
					$out .= '<span class="current-item">' . sprintf( __( 'Year %d archive', WM_THEME_TEXTDOMAIN ), absint( $year ) ) . '</span>';
				if ( is_month() )
					$out .= '<a href="' . get_year_link( $year ) . '">' . $year . '</a>' . $separator . '<span class="current-item">' . sprintf( __( '%s archive', WM_THEME_TEXTDOMAIN ), $monthname ) . '</span>';
				if ( is_day() )
					$out .= '<a href="' . get_year_link( $year ) . '">' . $year . '</a>' . $separator . '<a href="' . get_month_link( $year, $month ) . '">' . $monthname . '</a>' . $separator . '<span class="current-item">' . sprintf( __( 'Day %1$d, %2$s archive', WM_THEME_TEXTDOMAIN ), $day, $dayname ) . '</span>';

			} elseif ( is_author() ) {
			//author archives

				$curauth = get_user_by( 'slug', get_query_var( 'author_name' ) );
				$out .= '<span class="current-item">' . sprintf( __( 'Posts by <em>%s</em>', WM_THEME_TEXTDOMAIN ), $curauth->display_name ) . '</span>';

			} elseif ( is_tag() ) {
			//tag archives

				$out .= '<span class="current-item">' . sprintf( __( '<em>%s</em> tag archive', WM_THEME_TEXTDOMAIN ), single_tag_title( '', false ) ) . '</span>';

			} elseif ( is_search() ) {
			//search results

				$out .= '<span class="current-item">' . sprintf( __( 'Search results for <em>"%s"</em>', WM_THEME_TEXTDOMAIN ), get_search_query() ) . '</span>';

			} elseif ( is_tax( 'wm-tax-cats-portfolio' ) ) {
			//custom taxonomy

				$portfolioPage = '';

				if ( wm_option( 'seo-breadcrumbs-portfolio-page' ) )
					$portfolioPage = '<a href="' . get_permalink( wm_option( 'seo-breadcrumbs-portfolio-page' ) ) . '">' . get_the_title( wm_option( 'seo-breadcrumbs-portfolio-page' ) ) . '</a>' . $separator;

				$out .= $portfolioPage . '<span class="current-item">' . $wp_query->queried_object->name . '</span>';


			} elseif ( is_single() && ! empty( $cats ) ) {
			//single post with hierarchical categories

				$cat      = $cats[0];
				$catsOut  = '';
				$blogPage = ( get_option( 'page_for_posts' ) ) ? ( '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . get_the_title( get_option( 'page_for_posts' ) ) . '</a>' . $separator ) : ( null );

				if ( is_object( $cat ) ) {
					if ( 0 != $cat->parent ) {
						$catsOut = get_category_parents( $cat->term_id, true, $separator );
					} else {
						$catsOut = '<a href="' . get_category_link( $cat->term_id ) . '">' . $cat->name . '</a>' . $separator;
					}
				}

				$out .= $blogPage . $catsOut . '<span class="current-item">' . get_the_title() . '</span>';

			} elseif ( is_single() && 'wm_portfolio' == $post->post_type ) {
			//single portfolio

				$terms = get_the_terms( $post->ID , 'wm-tax-cats-portfolio' );
				if ( $terms && ! is_wp_error( $terms ) ) {
					foreach( $terms as $term ) {
						$cats[] = $term;
					}
				}

				$catsOut = $portfolioPage = '';
				$cat     = $cats[0];

				if ( is_object( $cat ) )
					$catsOut = '<a href="' . get_term_link( $cat->slug, 'wm-tax-cats-portfolio' ) . '">' . $cat->name . '</a>' . $separator;

				if ( wm_option( 'seo-breadcrumbs-portfolio-page' ) )
					$portfolioPage = '<a href="' . get_permalink( wm_option( 'seo-breadcrumbs-portfolio-page' ) ) . '">' . get_the_title( wm_option( 'seo-breadcrumbs-portfolio-page' ) ) . '</a>' . $separator;

				$out .= $portfolioPage . $catsOut . '<span class="current-item">' . get_the_title() . '</span>';

			} elseif ( is_single() ) {
			//single post

				$blogPage = ( get_option( 'page_for_posts' ) ) ? ( '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . get_the_title( get_option( 'page_for_posts' ) ) . '</a>' . $separator ) : ( null );

				$out .= $blogPage . '<span class="current-item">' . get_the_title() . '</span>';

			} elseif ( is_404() ) {
			//error 404 page

				$out .= '<span class="current-item">' . __( 'Page not found', WM_THEME_TEXTDOMAIN ) . '</span>';

			} elseif ( is_page() ) {
			//page with hierarchical parent pages

				if ( $parents ) {
					foreach ( $parents as $parent ) {
						$out .= '<a href="' . get_permalink( $parent ) . '">' . get_the_title( $parent ) . '</a>' . $separator; // print all page parents
					}
				}
				$out .= '<span class="current-item">' . get_the_title() . '</span>';

			} else {
			//default

				$out .= '<span class="current-item">' . __( 'Archive', WM_THEME_TEXTDOMAIN ) . '</span>';

			}

			//output
			echo $out . $args['after_output'];

		} elseif ( is_home() ) {
		//home (posts list) page

			//$title = ( wm_option( 'pages-default-archives-title' ) ) ? ( wm_option( 'pages-default-archives-title' ) ) : ( __( 'Archives', WM_THEME_TEXTDOMAIN ) );
			$title = get_the_title( get_option( 'page_for_posts' ) );

			if ( get_option( 'page_on_front' ) )
				echo $args['before_output'] . '<a href="' . get_bloginfo( 'url' ) . '" class="home-item">' . __( 'Home', WM_THEME_TEXTDOMAIN ) . '</a>' . $separator . '<span class="current-item">' . $title . '</span>' . $args['after_output'];

		}
	}
} // /wm_breadcrumbs

/*
* Display breadcrumbs
*/
if ( ! function_exists( 'wm_display_breadcrumbs' ) ) {
	function wm_display_breadcrumbs() {
		$postId = ( is_home() ) ? ( get_option( 'page_for_posts' ) ) : ( null );
		if ( ! wm_option( 'seo-breadcrumbs' ) && ! wm_meta_option( 'breadcrumbs', $postId ) ) {

			if ( ( is_archive() || is_home() ) && wm_option( 'seo-breadcrumbs-archives' ) ) {
				return;
			} elseif ( is_404() && wm_option( 'seo-breadcrumbs-404' ) ) {
				return;
			} else {
				wm_breadcrumbs();
			}

		}
	}
} // /wm_display_breadcrumbs





/*
*****************************************************
*      PASSWORD PROTECTED POST
*****************************************************
*/
/*
* Password protected post form
*/
if ( ! function_exists( 'wm_password_form' ) ) {
	function wm_password_form( $form ) {
		global $post;
		$label     = 'pwbox-' . ( ( empty( $post->ID ) ) ? ( rand() ) : ( $post->ID ) );
		$checkPage = ( wm_check_wp_version( 3.4 ) ) ? ( 'wp-login.php?action=postpass' ) : ( 'wp-pass.php' );
		$out       = '';

		$out = '
		<div class="msg type-red icon-box icon-warning">
		<form class="protected-post-form" action="' . get_option( 'siteurl' ) . '/' . $checkPage . '" method="post">
			<h4>' . __( 'Enter password to view the content:', WM_THEME_TEXTDOMAIN ) . '</h4>
			<p><input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" id="submit" value="' . esc_attr__( 'Submit', WM_THEME_TEXTDOMAIN ) . '" /></p>
		</form>
		</div>';

		return $out;
	}
} // /wm_password_form





/*
*****************************************************
*      COMMENTS
*****************************************************
*/
/*
* Prints comment/trackback
*
* $comment, $args, $depth - check WordPress codex for info
*/
if ( ! function_exists( 'wm_comment' ) ) {
	function wm_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;

		switch ( $comment->comment_type ) {
			case 'pingback' :
			case 'trackback' :

			?>
			<li class="pingback">
				<p>
					<strong><?php _e( 'Pingback:', WM_THEME_TEXTDOMAIN ); ?></strong>
					<?php comment_author_link(); ?>
					<?php
					if ( get_edit_comment_link() )
						echo '<a href="' . get_edit_comment_link() . '" class="btn edit-link">' . __( 'Edit', WM_THEME_TEXTDOMAIN ) . '</a>';
					?>

				</p>
			<?php

			break;
			default :

			?>
			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<article>

					<div class="gravatar"><?php
						$avatar_size = 50;
						echo get_avatar( $comment, $avatar_size );
					?></div> <!-- /gravatar -->

					<div class="comment-content">

						<div class="comment-heading">
							<p>
								<cite class="author vcard"><?php comment_author_link(); ?></cite>
								<span class="additional-text"><?php _e( 'says:', WM_THEME_TEXTDOMAIN ); ?></span>
							</p>
							<p class="meta">
								<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" class="published-on">
									<time datetime="<?php comment_time( DATE_W3C ); ?>"><?php printf( __( '%1$s at %2$s', WM_THEME_TEXTDOMAIN ), get_comment_date(), get_comment_time() ); ?></time>
								</a>
							</p>
						</div> <!-- /comment-heading -->

						<div class="comment-text border-color">
							<?php
							comment_text();

							if ( '0' == $comment->comment_approved )
								echo '<p class="awaiting"><em>' . __( 'Your comment is awaiting moderation.', WM_THEME_TEXTDOMAIN ) . '</em></p>';

							comment_reply_link( array_merge( $args, array(
								'reply_text' => __( 'Reply', WM_THEME_TEXTDOMAIN ),
								'depth'      => $depth,
								'max_depth'  => $args['max_depth']
								) ) );
							if ( get_edit_comment_link() )
								echo '<p><a href="' . get_edit_comment_link() . '" class="btn edit-link">' . __( 'Edit', WM_THEME_TEXTDOMAIN ) . '</a></p>';
							?>
						</div> <!-- /comment-text -->

					</div> <!-- /comment-content -->
				</article>
			<?php

			break;
		} // /switch
	}
} // /wm_comment



/*
* List pingbacks and trackback
*
* $tag = TEXT ["h2" heading wrapper tag]
*/
if ( ! function_exists( 'wm_pings' ) ) {
	function wm_pings( $tag = 'h2' ) {
		$haveTrackbacks = array();
		$haveTrackbacks = get_comments( array( 'type' => 'pings' ) );

		if ( ! empty( $haveTrackbacks ) ) {
			echo '<' . $tag . '>' . __( 'Pingbacks list', WM_THEME_TEXTDOMAIN ) . '</' . $tag . '>';
			?>
			<ol class="commentlist pingbacks">
				<?php
				wp_list_comments( array(
					'type'     => 'pings',
					'callback' => 'wm_comment'
					) );
				?>
			</ol>
			<?php
		}
	}
} // /wm_pings





/*
*****************************************************
*      CALL TO ACTION
*****************************************************
*/
/*
* Prints call to action
*/
if ( ! function_exists( 'wm_call_to_action' ) ) {
	function wm_call_to_action() {
		global $post;

		$cta['enable']       = wm_option( 'cta-enable' );
		$cta['enable-pages'] = wm_option( 'cta-enable-override' );
		$cta['on-pages']     = wm_option( 'cta-pages' );
		$cta['on-posts']     = wm_option( 'cta-posts' );
		$cta['on-portfolio'] = wm_option( 'cta-portfolio' );
		$cta['on-archives']  = wm_option( 'cta-archives' );
		$cta['text']         = wm_option( 'cta-text' );
		$cta['btn-disable']  = wm_option( 'cta-btn-disable' );
		$cta['btn-text']     = wm_option( 'cta-btn-text' );
		$cta['btn-url']      = ( wm_option( 'cta-btn-url' ) ) ? ( wm_option( 'cta-btn-url' ) ) : ( '#' );
		$cta['btn-type']     = wm_option( 'cta-btn-type' );
		$cta['classes']      = ( ! $cta['btn-disable'] && $cta['btn-text'] ) ? ( '' ) : ( ' no-btn' );
		$isPortfolio         = ( isset( $post ) && $post && 'wm_portfolio' == $post->post_type ) ? ( true ) : ( false );

		$postId = ( is_home() ) ? ( get_option( 'page_for_posts' ) ) : ( null );

		if ( ! $cta['enable'] || ( ! $cta['enable-pages'] && wm_meta_option( 'cta-text', $postId ) ) )
			return;

		if ( ! wm_meta_option( 'cta-text', $postId ) && ! is_front_page() && ! (
			( is_page() && $cta['on-pages'] ) ||
			( ( is_single() && $isPortfolio ) && $cta['on-portfolio'] ) ||
			( ( is_single() && ! $isPortfolio ) && $cta['on-posts'] ) ||
			( ( is_archive() || is_home() ) && $cta['on-archives'] )
			) && $cta['text'] )
			return;

		$cta['text'] = ( wm_meta_option( 'cta-text', $postId ) ) ? ( wm_meta_option( 'cta-text', $postId ) ) : ( $cta['text'] );

		if ( ! $cta['text'] )
			return;

		if ( wm_meta_option( 'cta-btn-text', $postId ) ) {
			$cta['btn-text']    = wm_meta_option( 'cta-btn-text', $postId );
			$cta['btn-disable'] = false;
			$cta['classes']     = '';
			$cta['btn-url']     = wm_meta_option( 'cta-btn-url', $postId );
			$cta['btn-type']    = wm_meta_option( 'cta-btn-type', $postId );
		}

		//CTA background color class
		$treshold   = ( wm_option( 'design-color-treshold' ) ) ? ( wm_option( 'design-color-treshold' ) ) : ( WM_COLOR_TRESHOLD );
		$classBgCTA = '';
		if ( wm_option( 'design-cta-bg-color' ) )
			$classBgCTA = ( $treshold > wm_color_brightness( wm_option( 'design-cta-bg-color' ) ) ) ? ( 'bg-dark' ) : ( 'bg-light' );
		$setBgCTA   = ( wm_css_background( 'design-cta-' ) ) ? ( ' set-bg' ) : ( '' );

		?>
		<div id="cta" class="<?php echo $classBgCTA . $setBgCTA; ?>"><div class="wrap-inner">
		<div class="cta section<?php echo $cta['classes']; ?>">
			<?php wm_before_cta(); ?>
			<?php if ( ! $cta['btn-disable'] && $cta['btn-text'] ) { ?>
			<a href="<?php echo esc_url( $cta['btn-url'] ); ?>" class="btn size-medium <?php echo $cta['btn-type']; ?>"><?php echo $cta['btn-text']; ?></a>
			<?php } ?>
			<div class="cta-text"><?php
			$cta['text'] = apply_filters( 'the_content', $cta['text'] );
			$cta['text'] = str_replace( ']]>', ']]&gt;', $cta['text'] );
			echo $cta['text'];
			?></div>
			<?php wm_after_cta(); ?>
		</div> <!-- /call-to-action -->
		</div></div>
		<?php
	}
} // /wm_call_to_action





/*
*****************************************************
*      SLIDERS
*****************************************************
*/
/*
* Slider type switch
*/
if ( ! function_exists( 'wm_slider' ) ) {
	function wm_slider() {
		global $paged, $page;

		if ( ( ! is_singular() && ! is_home() ) || 1 < $paged || 1 < $page )
			return;

		$out = $class = '';
		$postId = ( is_home() ) ? ( get_option( 'page_for_posts' ) ) : ( null );

		//Slider animation type
		$sliderType = ( wm_meta_option( 'slider-type', $postId ) ) ? ( wm_meta_option( 'slider-type', $postId ) ) : ( 'none' );

		//Do not continue, if no slider type selected
		if ( 'none' == $sliderType )
			return;

		//number of slides
		$slidesCount = ( wm_meta_option( 'slider-count', $postId ) ) ? ( wm_meta_option( 'slider-count', $postId ) ) : ( 3 );

		//slider image size
		$imageSize = ( wm_meta_option( 'slider-image', $postId ) ) ? ( wm_meta_option( 'slider-image', $postId ) ) : ( 'slide' );

		//custom posts, post gallery or blog posts to populate slides
		$slidesContent = ( wm_meta_option( 'slider-content', $postId ) ) ? ( wm_meta_option( 'slider-content', $postId ) ) : ( 'wm_slides' );

		//set category only if custom posts or blog posts populate the slider
		$slidesCat = null;
		$slidesCat = ( 'wm_slides' == wm_meta_option( 'slider-content', $postId ) ) ? ( wm_meta_option( 'slider-slides-cat', $postId ) ) : ( $slidesCat );

		//choose slider type
		switch ( $sliderType ) {
			case 'nivo':

				$out .= wm_slider_nivo( $slidesCount, $slidesContent, $slidesCat, $imageSize );

				$class = '';

			break;
			case 'kwicks':

				$out .= wm_slider_kwicks( $slidesCount, $slidesContent, $slidesCat, $imageSize );

				$class = '';

			break;
			case 'roundabout':

				if ( 'slide' === $imageSize )
					$imageSize = 'portfolio';

				$out  .= wm_slider_roundabout( $slidesCount, $slidesContent, $slidesCat, $imageSize );

				$class = ' high';

			break;
			case 'simple':

				$out  .= wm_slider_simple( $slidesCount, $slidesContent, $slidesCat, $imageSize );

				$class = '';

			break;
			case 'video':

				if ( ! wm_meta_option( 'slider-video-url', $postId ) )
					return;

				$videoURL = esc_url( wm_meta_option( 'slider-video-url', $postId ) ) . '&amp;wmode=transparent';
				$width    = 960;
				$height   = $width / 16 * 9;

				$coverImage    = '';
				$hasCoverImage = ' no-cover';

				if ( has_post_thumbnail( $postId ) && get_post( get_post_thumbnail_id( $postId ) ) ) {
					//Post featured image used as video cover image
					$attachment    = get_post( get_post_thumbnail_id( $postId ) );
					$coverImage    = get_the_post_thumbnail( $postId, $imageSize, array( 'class' => 'video-cover' ) );
					$hasCoverImage = ' has-cover';
				}

				$out .= '<div id="video-slider" class="video-slider slider-content' . $hasCoverImage . '">';
				$out .= '<div class="video-container">' . apply_filters( 'the_content',  '[embed width="' . $width . '" height="' . $height . '"]' . $videoURL . '[/embed]' ) . '</div>' . $coverImage;
				$out .= '</div> <!-- /video-slider -->';

				$class = ' video';

			break;
			case 'static':

				if ( has_post_thumbnail( $postId ) && get_post( get_post_thumbnail_id( $postId ) ) ) {

					//Post featured image
					$attachment = get_post( get_post_thumbnail_id( $postId ) );
					$link = esc_url( wm_meta_option( 'slider-url', $postId ) );

					$out .= '<div id="static-slider" class="static-slider slider-content img-content">';
					$out .= ( $link ) ? ( '<a href="' . $link . '">' ) : ( '' );
					$out .=  get_the_post_thumbnail( $postId, $imageSize );
					$out .= ( $link ) ? ( '</a>' ) : ( '' );
					$content = '';
					$content .= ( $attachment->post_excerpt ) ? ( '<h2>' . wptexturize( $attachment->post_excerpt ) . '</h2>' ) : ( '' );
					$content .= ( $attachment->post_content ) ? ( '<div class="desc">' . wptexturize( $attachment->post_content ) . '</div>' ) : ( '' );
					if ( $content ) {
						$out .= '<div class="slider-caption-content">';
						$out .= apply_filters( 'the_content', $content );
						$out .= '</div>';
					}
					$out .= '</div> <!-- /static-slider -->';

					$class = '';

				}

			break;
			case 'none':
			break;
			default:
			break;
		} // /switch

		//slider background color class
		$treshold = ( wm_option( 'design-color-treshold' ) ) ? ( wm_option( 'design-color-treshold' ) ) : ( WM_COLOR_TRESHOLD );
		$classBgSlider = '';
		if ( wm_option( 'design-slider-bg-color' ) )
			$classBgSlider = ( $treshold > wm_color_brightness( wm_option( 'design-slider-bg-color' ) ) ) ? ( 'bg-dark' ) : ( 'bg-light' );
		$setBgSlider = ( wm_css_background( 'design-slider-' ) ) ? ( ' set-bg' ) : ( null );

		if ( $out )
			echo '<div id="slider" class="' . $classBgSlider . $setBgSlider . $class . '"><div class="wrap-inner"><section class="slider section">' . $out . '</section></div></div>';
	}
} // /wm_slider





/*
*****************************************************
*      HEADER AND FOOTER FUNCTIONS
*****************************************************
*/
/*
* Prints logo
*/
if ( ! function_exists( 'wm_logo' ) ) {
	function wm_logo() {
		$separator = ( wm_option( 'seo-meta-title-separator' ) ) ? ( ' ' . strip_tags( wm_option( 'seo-meta-title-separator' ) ) . ' ' ) : ( ' | ' );
		$logoType  = ( wm_option( 'design-logo-type' ) ) ? ( wm_option( 'design-logo-type' ) ) : ( 'img' );
		$logoURL   = ( wm_option( 'design-logo-img-url' ) ) ? ( wm_option( 'design-logo-img-url' ) ) : ( WM_ASSETS_THEME . 'img/logo-jaguar.png' );

		if ( is_home() || is_front_page() )
			$logoTag = 'h1';
		else
			$logoTag = 'div';

		?>
		<<?php echo $logoTag; ?> class="logo">
			<a href="<?php bloginfo( 'url' ); ?>" title="<?php echo get_bloginfo( 'name' ) . $separator . get_bloginfo( 'description' ); ?>">
			<?php
			if ( isset( $logoType ) && 'text' == $logoType ) {

				bloginfo( 'name' );

			} else {

				?>
				<img src="<?php echo esc_url( $logoURL ); ?>" alt="<?php bloginfo( 'name' ); _e( ' logo', WM_THEME_TEXTDOMAIN ); ?>" title="<?php echo get_bloginfo( 'name' ) . $separator . get_bloginfo( 'description' ); ?>" />
				<span class="invisible"><?php bloginfo( 'name' ); ?></span>
				<?php

			}
			?>
			</a>
		</<?php echo $logoTag; ?>>
		<?php
	}
} // /wm_logo



/*
* Prints favicon and touch icon
*/
if ( ! function_exists( 'wm_favicon' ) ) {
	function wm_favicon() {
		$out = '';

		if ( wm_option( 'design-favicon-url' ) ) {
			$out .= '<link rel="shortcut icon" href="' . esc_url( wm_option( 'design-favicon-url' ) ) . '"/>' . "\r\n";
			$out .= '<link rel="icon" type="image/png" href="' . esc_url( wm_option( 'design-favicon-url' ) ) . '">' . "\r\n";
		}
		if ( wm_option( 'design-touch-icon-url' ) )
			$out .= '<link rel="apple-touch-icon" href="' . esc_url( wm_option( 'design-touch-icon-url' ) ) . '" />' . "\r\n";

		echo $out;
	}
} // /wm_favicon



/*
* Prints copyright text
*/
if ( ! function_exists( 'wm_credits' ) ) {
	function wm_credits() {
		$copyText = ( wm_option( 'general-credits' ) ) ? ( wm_option( 'general-credits' ) ) : ( '&copy; ' . get_bloginfo( 'name' ) );
		$copyText = str_replace( array( '(c)', '(C)' ), '&copy;', $copyText );
		$copyText = str_replace( array( '(r)', '(R)' ), '&reg;', $copyText );
		$copyText = str_replace( array( '(tm)', '(TM)', '(Tm)', '(tM)' ), '&trade;', $copyText );
		$copyText = str_replace( 'YEAR', date( 'Y' ), $copyText );
		?>
		<!-- CREDITS -->
		<div class="credits">
			<?php	echo $copyText; ?>
		</div> <!-- /credits -->
		<?php
	}
} // /wm_credits





/*
*****************************************************
*      SEO FUNCTIONS
*****************************************************
*/
/*
* SEO website title
*/
if ( ! function_exists( 'wm_seo_title' ) ) {
	function wm_seo_title() {
		global $page, $paged;
		$separator = ( wm_option( 'seo-meta-title-separator' ) ) ? ( ' ' . strip_tags( wm_option( 'seo-meta-title-separator' ) ) . ' ' ) : ( ' | ' );

		$out = '';
		if ( is_tag() ) {
		//tag archive

			$out .= __( 'Tag archive for &quot;', WM_THEME_TEXTDOMAIN ) . single_tag_title( '', false ) . '&quot;' . $separator;

		} elseif ( is_search() ) {
		//search

			$out .= __( 'Search for &quot;', WM_THEME_TEXTDOMAIN ) . get_search_query() . '&quot;' . $separator;

		} elseif ( is_archive() ) {
		//general archive

			$out .= __( 'Archive for', WM_THEME_TEXTDOMAIN ) . wp_title( ' ', false ) . $separator;

		} elseif ( is_singular() && ! is_404() && ! is_front_page() && ! is_home() ) {
		//is page or post but not 404, front page nor home page post list

			$out .= wp_title( '', false ) . $separator;

		} elseif ( is_404() ) {
		//404 page

			$out .= __( 'Web page was not found', WM_THEME_TEXTDOMAIN ) . $separator;

		} elseif ( is_home() && get_option( 'page_for_posts' ) ) {

			$out .= get_the_title( get_option( 'page_for_posts' ) ) . $separator;

		}

		$out .= get_bloginfo( 'name' );

		//paginated
		if ( 1 < $paged )
			$out .= __( ' (part ', WM_THEME_TEXTDOMAIN ) . $paged . ')';
		//article parts
		if ( 1 < $page )
			$out .= __( ' (part ', WM_THEME_TEXTDOMAIN ) . $page . ')';

		echo $out;
	}
} // /wm_seo_title



/*
* SEO description
*/
if ( ! function_exists( 'wm_seo_desc' ) ) {
	function wm_seo_desc() {
		$out         = '';
		$description = ( wm_option( 'seo-description' ) ) ? ( wm_option( 'seo-description' ) ) : ( get_bloginfo( 'description' ) );

		if ( is_singular() && ! ( is_404() || is_home() || is_front_page() ) ) {
		//is page or post but not 404, front page nor home page post list

			wp_reset_query();
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					$excerpt = strip_tags( get_the_excerpt( '' ) );
					$out .= $excerpt;
				}
			}
			wp_reset_query();

		}

		if ( '' == $out || ' ' == $out )
			$out .= $description;

		echo $out;
	}
} // /wm_seo_desc



/*
* SEO keywords
*/
if ( ! function_exists( 'wm_seo_keywords' ) ) {
	function wm_seo_keywords() {
		$out       = '';
		$separator = ', ';
		$keywords  = wm_option( 'seo-keywords' );

		if ( is_tag() ) {
		//tag archive

			$out .= single_tag_title( '', false );
			if ( $keywords )
				$out .= $separator . $keywords;

		} elseif ( is_archive() ) {
		//general archive

			$out .= wp_title( '', false ) . __( ' archive', WM_THEME_TEXTDOMAIN );
			if ( $keywords )
				$out .= $separator . $keywords;

		} elseif ( is_singular() && ! is_404() ) {
		//is page or post but not 404
			global $post;

			if ( 'wm_portfolio' === $post->post_type ) {
				$terms = get_the_terms( $post->ID , 'wm-tax-cats-portfolio' );
				if ( $terms ) {
					foreach ( $terms as $term ) {
						$out .= $term->name . $separator . $keywords;
					}
				}
			}

			if ( get_the_category() && ! is_page() ) {
			//get post categories
				foreach ( get_the_category() as $categoryKeyword ) {
					$out .= $categoryKeyword->cat_name . $separator;
				}
			}
			if ( get_the_tags() && ! is_page() ) {
			//get post tags
				$i = 0;
				foreach ( get_the_tags() as $tagKeyword ) {
					if ( $i )
						$out .= $separator;
					$out .= $tagKeyword->name;
					++$i;
				}
			}

		}

		if ( '' == $out || ' ' == $out )
			$out .= $keywords;

		echo $out;
	}
} // /wm_seo_keywords



/*
* Prints header scripts (analytics)
*/
if ( ! function_exists( 'wm_scripts_header' ) ) {
	function wm_scripts_header() {
		echo wm_option( 'general-custom-head' ) . "\r\n";
	}
} // /wm_scripts_header

/*
* Prints footer scripts (analytics)
*/
if ( ! function_exists( 'wm_scripts_footer' ) ) {
	function wm_scripts_footer() {
		echo wm_option( 'general-custom-footer' ) . "\r\n";
	}
} // /wm_scripts_footer





/*
*****************************************************
*      POST / PAGE FUNCTIONS
*****************************************************
*/
/*
* H1 or H2 headings (on singular pages also checks for subtitle)
*
* $list    = TEXT [if set, outputs H2 instead of H1]
* $wrap    = HTML ["span" inside H1/H2 text wrapper]
*/
if ( ! function_exists( 'wm_heading' ) ) {
	function wm_heading( $list = null, $wrap = null ) {
		global $page, $paged, $wp_query;

		$blogPageId = ( is_home() ) ? ( get_option( 'page_for_posts' ) ) : ( null );
		$subheading = wm_meta_option( 'subheading', $blogPageId );
		if ( ( is_archive() || is_search() ) && ! is_home() )
			$subheading = __( 'Number of items found:', WM_THEME_TEXTDOMAIN ) . ' ' . $wp_query->found_posts;

		//List title
		if ( isset( $list ) && $list ) {
			$out = '';

			if ( has_post_format( 'status' ) )
				$out .= ( get_the_title() ) ? ( get_the_title() ) : ( '' );
			else
				$out .= ( get_the_title() ) ? ( '<a href="' . get_permalink() . '">' . get_the_title() . '</a>' ) : ( '' );

			$titleSticky = '';
			if ( is_sticky() )
				$titleSticky = ' title="' . __( 'This is featured post', WM_THEME_TEXTDOMAIN ) . '"';

			$output =  ( $out ) ? ( '<header class="post-title"' . $titleSticky . '><h2>' . $out . '</h2></header>' ) : ( '' );

			//output
			echo $output;
			return;
		}

		//Main H1 title
		$out = '';
		if ( is_singular() || $blogPageId ) {
		//post or page

			$title = ( isset( $wrap ) && $wrap ) ? ( '<' . $wrap . '>' . get_the_title( $blogPageId ) . '</' . $wrap . '>' ) : ( get_the_title( $blogPageId ) );
			if ( 1 < $page )
				$out .= ( $title ) ? ( '<a href="' . get_permalink() . '">' . $title . '</a> <small>(part ' . $page . ')</small>' ) : ( '' );
			else
				$out .= ( $title ) ? ( $title ) : ( '' );

		} elseif ( is_day() ) {
		//dayly archives

			$out .= sprintf( __( 'Daily Archives: <span>%s</span>', WM_THEME_TEXTDOMAIN ), get_the_date() );

		} elseif ( is_month() ) {
		//monthly archives

			$out .= sprintf( __( 'Monthly Archives: <span>%s</span>', WM_THEME_TEXTDOMAIN ), get_the_date( 'F Y' ) );

		} elseif ( is_year() ) {
		//yearly archives

			$out .= sprintf( __( 'Yearly Archives: <span>%s</span>', WM_THEME_TEXTDOMAIN ), get_the_date( 'Y' ) );

		} elseif ( is_author() ) {
		//author archive

			$userID = $wp_query->query_vars['author'];

			$out .= sprintf( __( 'Posts by <span>%s</span>', WM_THEME_TEXTDOMAIN ), get_the_author_meta( 'display_name', $userID ) );

		} elseif ( is_category() ) {
		//category archive

			$out .= sprintf( __( 'Posts in <span>%s</span> Category', WM_THEME_TEXTDOMAIN ), single_cat_title( '', false ) );

		} elseif ( is_tag() ) {
		//tag archive

			$out .= sprintf( __( 'Posts Tagged "<span>%s</span>"', WM_THEME_TEXTDOMAIN ), single_tag_title( '', false ) );

		} elseif ( is_search() ) {
		//search

			$out .= sprintf( __( 'Search results for <span>%s</span>', WM_THEME_TEXTDOMAIN ), get_search_query() );

		} elseif ( is_tax( 'wm-tax-cats-portfolio' ) ) {
		//custom taxonomy

			$portfolioPage = ( wm_option( 'seo-breadcrumbs-portfolio-page' ) ) ? ( get_the_title( wm_option( 'seo-breadcrumbs-portfolio-page' ) ) . ' / ' ) : ( '' );

			$out .= $portfolioPage . $wp_query->queried_object->name;

		} else {
		//other situations

			$out .= ( wm_option( 'pages-default-archives-title' ) ) ? ( wm_option( 'pages-default-archives-title' ) ) : ( '' );

		}

		//paged
		$out .= ( 1 < $paged ) ? ( ' <small>(page ' . $paged . ')</small>' ) : ( '' );

		//post, page title and subtitle display
		$class = $classContainer = '';
		if ( wm_meta_option( 'no-heading', $blogPageId ) || ! $out ) {
			$class          = ( $subheading ) ? ( ' class="invisible"' ) : ( '' );
			$classContainer = ( ! $subheading ) ? ( ' invisible' ) : ( '' );
		}

		$subtitleH2 = ( $subheading ) ? ( '<h2 class="subtitle">' . strip_tags( $subheading ) . '</h2>' ) : ( '' );
		$wrapper    = ( $subtitleH2 ) ? ( '<hgroup>' ) : ( '' );
		$wrapperEnd = ( $wrapper ) ? ( '</hgroup>' ) : ( '' );

		//main heading background color class
		$treshold = ( wm_option( 'design-color-treshold' ) ) ? ( wm_option( 'design-color-treshold' ) ) : ( WM_COLOR_TRESHOLD );
		$classBgMainHeading = '';
		if ( wm_option( 'design-main-heading-bg-color' ) )
			$classBgMainHeading = ( $treshold > wm_color_brightness( wm_option( 'design-main-heading-bg-color' ) ) ) ? ( 'bg-dark' ) : ( 'bg-light' );
		$setBgMainHeading = ( wm_css_background( 'design-main-heading-' ) ) ? ( ' set-bg' ) : ( '' );

		$before = '<section id="main-heading" class="' . $classBgMainHeading . $setBgMainHeading . $classContainer . '"><div class="wrap-inner">';
		$after  = '</div></section>';

		//output
		echo $before . '<header class="section">' . $wrapper . '<h1' . $class . '>' . $out . '</h1>' . $subtitleH2 . $wrapperEnd . '</header>' . $after;
	}
} // /wm_heading



/*
* Thumbnail image
*
* $class = TEXT [image container additional CSS class name]
* $size  = TEXT [image size]
* $attr  = ARRAY [check WordPress codex on this]
* $post  = OBJECT [WordPress post object]
* $list  = TEXT [set this to use post permalink in Posts widget even on single post page]
*/
if ( ! function_exists( 'wm_thumb' ) ) {
	function wm_thumb( $class = null, $size = 'thumbnail', $attr = null, $post = null, $list = null ) {
		global $post;

		$attrDefaults = array(
			'title'	=> '',
			);

		$attr = wp_parse_args( $attr, $attrDefaults );

		$theClass  = ( isset( $class ) && $class ) ? ( ' ' . esc_attr( $class ) ) : ( '' );
		$imageFull = ( has_post_thumbnail() ) ? ( get_the_post_thumbnail( null, $size, $attr ) ) : ( '' );
		$image     = preg_replace( '/(width|height)=\"\d*\"\s/', "", $imageFull );

		$out = '';
		if ( is_singular() && isset( $post->ID ) && ! $list ) {

			if ( $image ) {
				$largeImageUrl = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), wm_option( 'general-lightbox-img' ) );
				$out .= '<div class="image-container' . $theClass . '">';
				$out .= '<a href="' . $largeImageUrl[0] . '" data-modal>' . $image . '</a>';
				$out .= '</div>';
			}

		} else {

			if ( $image ) {
				$out .= '<div class="image-container' . $theClass . '">';
				$out .= '<a href="' . get_permalink() . '">' . $image . '</a>';
				$out .= '</div>';
			}

		}

		echo $out;
	}
} // /wm_thumb



/*
* Get all images attached to the post
*
* $numberposts = # [number of images to get (-1 = all)]
* $post_id     = # [specific post id, else current post id used]
* $size  = TEXT [image size]
*/
if ( ! function_exists( 'wm_get_post_images' ) ) {
	function wm_get_post_images( $numberposts = -1, $post_id = null, $size = null ) {
		global $post;
		if ( ! $post_id && ! $post )
			return;

		$post_id     = ( $post_id ) ? ( absint( $post_id ) ) : ( $post->ID );
		$size        = ( $size ) ? ( $size ) : ( 'widget' );
		$outputArray = array();

		$args = array(
			'numberposts'    => $numberposts,
			'post_parent'    => $post_id,
			'orderby'        => 'menu_order',
			'order'          => 'asc',
			'post_mime_type' => 'image',
			'post_type'      => 'attachment'
			);
		$images =& get_children( $args );

		if ( ! empty( $images ) ) {
			foreach ( $images as $attachment_id => $attachment ) {
				$imgUrlArray   = wp_get_attachment_image_src( $attachment_id, $size );
				$entry         = array();
				$entry['name'] = strip_tags( $attachment->post_excerpt );
				$entry['id']   = esc_attr( $attachment_id );
				//$entry['img']  = wp_get_attachment_thumb_url( $attachment_id );
				$entry['img']  = $imgUrlArray[0];
				$outputArray[] = $entry;
			}
		}

		return $outputArray;
	}
} // /wm_get_post_images



/*
* Media uploader image sizes
*
* $sizes = ARRAY [check WordPress codex on this]
*/
if ( ! function_exists( 'wm_media_uploader_image_sizes' ) ) {
	function wm_media_uploader_image_sizes( $sizes ) {
		$customSizes = array(
			'blog'   => __( 'Blog featured image', WM_THEME_TEXTDOMAIN_ADMIN ),
			'widget' => __( 'Small thumb', WM_THEME_TEXTDOMAIN_ADMIN )
			);

		return array_merge( $sizes, $customSizes );
	}
} // /wm_media_uploader_image_sizes



/*
* WP gallery improvements
*
* Improves WordPress [gallery] shortcode: removes inline CSS, changes HTML markup to valid, makes it easier to remove images from gallery.
* $attr = ARRAY [check WordPress codex on this]
*/
//deactivate WP gallery function
remove_shortcode( 'gallery', 'gallery_shortcode' );

//WebMan gallery function
if ( ! function_exists( 'wm_shortcode_gallery' ) ) {
	function wm_shortcode_gallery( $attr ) {
		global $post;

		static $instance = 0;
		$instance++;

		// Allow plugins/themes to override the default gallery template.
		$output = apply_filters('post_gallery', '', $attr);
		if ( $output != '' )
			return $output;

		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if ( isset( $attr['orderby'] ) ) {
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
				unset( $attr['orderby'] );
		}

		extract(shortcode_atts(array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post->ID,
			'itemtag'    => 'figure',
			'icontag'    => 'span',
			'captiontag' => 'span',
			'columns'    => 3,
			'size'       => 'portfolio',
			'include'    => '',
			'exclude'    => '',
			'portfolio'  => '',
			'remove'     => ''
		), $attr));

		$excludeImages = wm_meta_option( 'gallery-images' );
		$excludeImages = ( is_array( $excludeImages ) && ! empty( $excludeImages ) ) ? ( implode( ',', $excludeImages ) ) : ( '' );
		$exclude = ( $exclude ) ? ( $exclude ) : ( $excludeImages );
		$remove = preg_replace( '/[^0-9,]+/', '', $remove );
		$remove = ( $remove ) ? ( explode( ',', $remove ) ) : ( array() );

		$id = intval($id);
		if ( 'RAND' == $order )
			$orderby = 'none';

		if ( !empty($include) ) {
			$include = preg_replace( '/[^0-9,]+/', '', $include );
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif ( !empty($exclude) ) {
			$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
			$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		} else {
			$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}

		if ( empty($attachments) )
			return '';

		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment )
				$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
			return $output;
		}

		$itemtag = tag_escape($itemtag);
		$wrapper = ( 'li' == $itemtag ) ? ( '<ul>' ) : ( '' );
		$wrapperEnd = ( $wrapper ) ? ( '</ul>' ) : ( '' );
		$captiontag = tag_escape($captiontag);
		$columns = intval($columns);
		$columns = ( 3 > $columns || 6 < $columns ) ? ( 3 ) : ( $columns ); //only 3, 4, 5 or 6 columns allowed
		$float = is_rtl() ? 'right' : 'left';

		$selector = "gallery-{$instance}";

		$gallery_div = '';

		$size_class = sanitize_html_class( $size );
		$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-columns gallery-size-{$size_class}'>" . $wrapper;
		$output = apply_filters( 'gallery_style', $gallery_div );

		$i = $j = 0;
		foreach ( $attachments as $id => $attachment ) {
			//$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
			//$link = wp_get_attachment_link($id, $size, false, false);
			$linkFullImg = wp_get_attachment_link( $id, $size, false, false );
			$link        = preg_replace( '/(width|height)=\"\d*\"\s/', "", $linkFullImg );

			if ( ++$j % $columns == 0 )
				$last = ' last';
			else
				$last = '';

			if ( ! in_array( $j, $remove ) ) {
				$last .= ( $j <= $columns ) ? ( ' first-row' ) : ( null );

				$output .= "<{$itemtag} class='gallery-item column col-1{$columns}$last'>";
				$output .= "
					<{$icontag} class='gallery-icon'>
						$link
					</{$icontag}>";
				if ( $captiontag && trim($attachment->post_excerpt) ) {
					$output .= "
						<{$captiontag} class='wp-caption-text gallery-caption'>
						" . wptexturize( $attachment->post_excerpt ) . "
						</{$captiontag}>";
				}
				$output .= "</{$itemtag}>";
				if ( $columns > 0 && ++$i % $columns == 0 )
					$output .= '';
			}
		}

		$output .= $wrapperEnd . "</div>\n";

		return $output;
	}
} // /wm_shortcode_gallery

//activate WebMan gallery function
add_shortcode( 'gallery', 'wm_shortcode_gallery' );

/*
* Displays gallery
*/
if ( ! function_exists( 'wm_display_gallery' ) ) {
	function wm_display_gallery() {
		global $page, $numpages; //display only on the last page of paged post

		if ( wm_meta_option( 'gallery' ) && $numpages === $page ) {
			$columns = wm_meta_option( 'gallery-columns' );
			$images  = wm_meta_option( 'gallery-images' );
			$images  = ( is_array( $images ) && ! empty( $images ) ) ? ( implode( ',', $images ) ) : ( '' );

			echo do_shortcode( '[gallery columns="' . $columns . '" include="' . $images . '" link="file"]' );
		}
	}
} // /wm_display_gallery



/*
* WordPress image captions
*
* Improves WordPress image captions by removing inline styling.
*/
//deactivate WP image caption function
remove_shortcode( 'wp_caption', 'img_caption_shortcode' );
remove_shortcode( 'caption', 'img_caption_shortcode' );

//WebMan image caption function
if ( ! function_exists( 'wm_shortcode_image_caption' ) ) {
	function wm_shortcode_image_caption( $attr, $content = null ) {
		// New-style shortcode with the caption inside the shortcode with the link and image tags.
		if ( ! isset( $attr['caption'] ) ) {
			if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
				$content         = $matches[1];
				$attr['caption'] = trim( $matches[2] );
			}
		}

		$out = apply_filters( 'img_caption_shortcode', '', $attr, $content );

		if ( $out != '' )
			return $out;

		extract( shortcode_atts( array(
			'id'      => '',
			'align'   => 'alignnone',
			'width'   => '',
			'caption' => ''
			), $attr)
			);

		if ( 1 > (int) $width || empty($caption) )
			return $content;

		if ( $id )
			$id = 'id="' . esc_attr( $id ) . '" ';

		return '<div ' . $id . 'class="wp-caption caption-overlay ' . esc_attr( $align ) . '">' . do_shortcode( $content ) . '<p class="wp-caption-text border-color">' . $caption . '</p></div>';
	}
} // /wm_shortcode_image_caption

//activate WebMan image caption function
add_shortcode( 'wp_caption', 'wm_shortcode_image_caption' );
add_shortcode( 'caption', 'wm_shortcode_image_caption' );



/*
* Excerpt
*
* $length_fn = FN [callback function setting the excerpt length]
* $more_fn   = FN [callback function setting the "..." string after excerpt]
*/
if ( ! function_exists( 'wm_excerpt' ) ) {
	function wm_excerpt( $length_fn = null, $more_fn = null ) {
		if ( $length_fn && is_callable( $length_fn ) )
			add_filter( 'excerpt_length', $length_fn, 999 );
		else
			add_filter( 'excerpt_length', 'wm_excerpt_length_blog', 999 );

		if ( $more_fn && is_callable( $more_fn ) )
			add_filter( 'excerpt_more', $more_fn );
		else
			add_filter( 'excerpt_more', 'wm_excerpt_more' );

		$excerpt = get_the_excerpt();
		$exc     = apply_filters( 'wptexturize', $excerpt );

		$out = '';
		if ( get_the_excerpt() ) {
			$out .= '<div class="excerpt"><p>';
			$out .= apply_filters( 'convert_chars', $exc );
			$out .= '</p></div>';
		}

		echo $out;
	}
} // /wm_excerpt

/*
* Different excerpt length callback functions
*/
if ( ! function_exists( 'wm_excerpt_length_blog' ) ) {
	function wm_excerpt_length_blog( $length ) {
		$defaultLength = ( wm_option( 'blog-excerpt-length' ) ) ? ( wm_option( 'blog-excerpt-length' ) ) : ( WM_DEFAULT_EXCERPT_LENGTH );
		$customLength  = ( wm_option( 'blog-excerpt-length' ) ) ? ( wm_option( 'blog-excerpt-length' ) ) : ( $defaultLength );
		return $customLength;
	}
} // /wm_excerpt_length_blog

if ( ! function_exists( 'wm_excerpt_length_short' ) ) {
	function wm_excerpt_length_short( $length ) {
		$customLength = ( wm_option( 'blog-excerpt-length-short' ) ) ? ( wm_option( 'blog-excerpt-length-short' ) ) : ( 25 );
		return $customLength;
	}
} // /wm_excerpt_length_short

if ( ! function_exists( 'wm_excerpt_length_very_short' ) ) {
	function wm_excerpt_length_very_short( $length ) {
		$customLength = ( wm_option( 'blog-excerpt-length-shortest' ) ) ? ( wm_option( 'blog-excerpt-length-shortest' ) ) : ( 10 );
		return $customLength;
	}
} // /wm_excerpt_length_very_short

/*
* Excerpt "more" callback function
*/
if ( ! function_exists( 'wm_excerpt_more' ) ) {
	function wm_excerpt_more( $more ) {
		return '&hellip;';
	}
} // /wm_excerpt_more

/*
* Displays excerpt
*/
if ( ! function_exists( 'wm_display_excerpt' ) ) {
	function wm_display_excerpt() {
		if ( is_single() && has_excerpt() )
			wm_excerpt( 'wm_excerpt_length_blog', null );
	}
} // /wm_display_excerpt



/*
* "Read more" button
*
* $print = TEXT ["print" the value]
*/
if ( ! function_exists( 'wm_more' ) ) {
	function wm_more( $print = null, $nobtn = null ) {
		$out = '<a href="' . get_permalink() . '" class="btn btn-more">' . __( 'Read more &raquo;', WM_THEME_TEXTDOMAIN ) . '</a>';

		if ( $nobtn )
			$out = '<a href="' . get_permalink() . '" class="more-link">' . __( 'Read more &raquo;', WM_THEME_TEXTDOMAIN ) . '</a>';

		if ( $print )
			echo $out;
		else
			return $out;
	}
} // /wm_more



/*
* Post meta info
*
* $positions = ARRAY [array of meta information positions]
*/
if ( ! function_exists( 'wm_meta' ) ) {
	function wm_meta( $positions = null, $tag = 'footer' ) {
		if ( ( is_page() || is_front_page() || is_home() ) && ! $positions )
		  return;

		if ( ! $positions )
			$positions = array(
				'formaticon',
				'date',
				'comments',
				'cats',
				'author',
				'tags'
				);

		$out    = '';
		$format = ( get_post_format() ) ? ( get_post_format() ) : ( 'standard' );

		if ( ! empty( $positions ) ) {
			foreach ( $positions as $position ) {
				switch ( $position ) {
					case 'author':

						if ( ! wm_option( 'blog-disable-author' ) )
							$out .= '<span class="author vcard meta-item">' . __( 'By ', WM_THEME_TEXTDOMAIN ) . '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '">' . get_the_author() . '</a></span>';

					break;
					case 'cats':

						if ( ! wm_option( 'blog-disable-cats' ) )
							$out .= ( get_the_category_list( '' ) ) ? ( '<span class="categories meta-item">' . __( 'In ', WM_THEME_TEXTDOMAIN ) . get_the_category_list( ', ' ) . '</span>' ) : ( '' );

					break;
					case 'comments':

						if ( ! wm_option( 'blog-disable-comments-count' ) ) {
							$elementId = ( get_comments_number() ) ? ( '#comments' ) : ( '#respond' );
							$out      .= '<span class="comments meta-item"><a href="' . get_permalink() . $elementId . '">' . __( 'Comments: ', WM_THEME_TEXTDOMAIN ) . '<span class="comments-count" title="' . __( 'Comments: ', WM_THEME_TEXTDOMAIN ) . get_comments_number() . '">' . get_comments_number() . '</span></a></span>';
						}

					break;
					case 'date':

						if ( ! wm_option( 'blog-disable-date' ) )
							$out .= '<time datetime="' . get_the_date( DATE_W3C ) . '" class="date meta-item">' . get_the_date() . ', ' . get_the_time() . '</time>';

					break;
					case 'date-special':

						if ( ! wm_option( 'blog-disable-date' ) )
							$out .= '<time datetime="' . get_the_date( DATE_W3C ) . '" class="date meta-item">
								<span class="day">' . get_the_date( 'd' ) . '</span>
								<span class="month">' . get_the_time( 'M' ) . '</span>
								<span class="year">' . get_the_time( 'Y' ) . '</span>
								<span class="time">' . get_the_time() . '</span>
								</time>';

					break;
					case 'formaticon':

						$permalinkFormats = array( 'standard', 'gallery', 'image', 'link', 'video' );
						if ( 'link' === $format )
							$link = ( has_excerpt() ) ? ( esc_url( get_the_excerpt() ) ) : ( '#' );
						else
							$link = get_permalink();

						if ( ! wm_option( 'blog-disable-format' ) )
							$out .= ( in_array( $format, $permalinkFormats ) ) ? ( '<a href="' . $link . '" class="icon-format icon-format-' . $format . ' meta-item"></a>' ) : ( '<span class="icon-format icon-format-' . $format . ' meta-item"></span>' );

					break;
					case 'tags':

						if ( ! wm_option( 'blog-disable-tags' ) )
							$out .= ( get_the_tag_list( '', '', '' ) ) ? ( '<span class="tags meta-item">' . __( 'Tags: ', WM_THEME_TEXTDOMAIN ) . get_the_tag_list( '', ', ', '' ) . '</span>' ) : ( '' );

					break;
					default:
					break;
				} // /switch
			} // /foreach

			$out = ( $out ) ? ( '<' . $tag . ' class="meta-article border-color">' . $out . '</' . $tag . '>' ) : ( '' );
		} // /if $position

		echo $out;

		wm_sharing();
	}
} // /wm_meta



/*
* Post/page parts pagination
*/
if ( ! function_exists( 'wm_post_parts' ) ) {
	function wm_post_parts() {
		wp_link_pages( array(
			'before'         => '<p class="pagination post">',
			'after'          => '</p>',
			'next_or_number' => 'number',
			'pagelink'       => '<span class="page-numbers">' . __( 'Part', WM_THEME_TEXTDOMAIN ) . ' %</span>',
		) );
	}
} // /wm_post_parts



/*
* Post author info
*/
if ( ! function_exists( 'wm_author_info' ) ) {
	function wm_author_info() {
		if ( is_page() || wm_meta_option( 'author' ) || wm_option( 'blog-disable-bio' ) )
			return;

		$authorDescription = get_the_author_meta( 'description' );

		if ( $authorDescription ) {

			$authorName     = get_the_author_meta( 'display_name' );
			$authorWebsite  = ( get_the_author_meta( 'user_url' ) ) ? ( ' <a href="' . esc_url( get_the_author_meta( 'user_url' ) ) . '">[' . __( 'More about the author', WM_THEME_TEXTDOMAIN ) . ']</a>' ) : ( '' );
			$authorPostsUrl = get_author_posts_url( get_the_author_meta( 'ID' ) );
			$authorAvatar   = get_avatar( get_the_author_meta( 'ID' ), 64 );

			$out = '<div class="bio border-color">';
			$out .= '<div class="avatar-container"><a href="' . $authorPostsUrl . '">' . $authorAvatar . '</a></div><h4 class="mt0"><small>' . __( 'By', WM_THEME_TEXTDOMAIN ) . '</small> <a href="' . $authorPostsUrl . '">' . $authorName . '</a></h4>';

			$outSocial = '';
			if ( get_the_author_meta( 'facebook' ) )
				$outSocial .= '<a href="' . esc_url( get_the_author_meta( 'facebook' ) ) . '" title="' . $authorName . __( ' on Facebook', WM_THEME_TEXTDOMAIN ) . '" class="facebook">Facebook</a>';
			if ( get_the_author_meta( 'googleplus' ) )
				$outSocial .= '<a href="' . esc_url( get_the_author_meta( 'googleplus' ) ) . '" title="' . $authorName . __( ' on Google+', WM_THEME_TEXTDOMAIN ) . '" class="googleplus">Google+</a>';
			if ( get_the_author_meta( 'twitter' ) )
				$outSocial .= '<a href="' . esc_url( get_the_author_meta( 'twitter' ) ) . '" title="' . $authorName . __( ' on Twitter', WM_THEME_TEXTDOMAIN ) . '" class="twitter">Twitter</a>';

			if ( $outSocial )
				$out .= '<div class="social-small">' . $outSocial . '</div>';

			$out .= '<p>' . $authorDescription . $authorWebsite . '</p>';

			$out .= '</div> <!-- /author-details -->';

			echo $out;

		}
	}
} // /wm_author_info



/*
* Prints no content found message
*/
if ( ! function_exists( 'wm_not_found' ) ) {
	function wm_not_found() {
		$out = '<article class="not-found">';
		$out .= '<header><h2>' . __( 'No item found', WM_THEME_TEXTDOMAIN ) . '</h2></header>';
		$out .= '<p>' . __( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related content.', WM_THEME_TEXTDOMAIN ) . '</p>';
		$out .= '</article>';

		echo $out;
	}
} // /wm_not_found





/*
*****************************************************
*      OTHER FUNCTIONS
*****************************************************
*/
/*
* Check WordPress version
*
* $version = #FLOAT ["3.1" - at least this version]
*/
if ( ! function_exists( 'wm_check_wp_version' ) ) {
	function wm_check_wp_version( $version = '3.0' ) {
		global $wp_version;

		return version_compare( $wp_version, $version, '>=' );
	}
} // /wm_check_wp_version



/*
* Prevent your email address from stealing (requires jQuery functions)
*
* $email  = TEXT [email address to encrypt]
* $method = TEXT ["wp" encrypt method]
*/
if ( ! function_exists( 'wm_nospam' ) ) {
	function wm_nospam( $email, $method = null ) {
		if ( ! isset( $email ) || ! $email )
			return;

		if ( 'wp' == $method ) {
			$email = antispambot( $email );
		} else {
			$email = strrev( $email );
			$email = preg_replace( '[@]', ']ta[', $email );
			$email = preg_replace( '[\.]', '/', $email );
		}

		return $email;
	}
} // /wm_nospam



/*
* CSS output minimizer
*
* $buffer = TEXT [code text to minimize]
*/
if ( ! function_exists( 'wm_minimize_css' ) ) {
	function wm_minimize_css( $buffer ) {
		$buffer = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer ); //remove css comments
		$buffer = str_replace( array( "\r\n", "\r", "\n", "\t", "  ", "    " ), '', $buffer ); //remove tabs, spaces, line breaks, etc.

		return $buffer;
	}
} // /wm_minimize_css



/*
* Custom avatar
*
* $avatar_defaults = ARRAY [default WordPress gravatars array]
*/
if ( ! function_exists( 'wm_custom_avatar' ) ) {
	function wm_custom_avatar( $avatar_defaults ) {
		$customAvatar = WM_ASSETS_THEME . 'img/gravatar.gif';
		$avatar_defaults[$customAvatar] = get_bloginfo( 'name' );

		return $avatar_defaults;
	}
} // /wm_custom_avatar



/*
* Get background CSS styles
*
* $optionBase = TEXT [wm_option base name (option full name minus function suffixes: bg-color, bg-img-url, bg-img-repeat, bg-img-attachment, bg-img-position, bg-pattern)]
*/
if ( ! function_exists( 'wm_css_background' ) ) {
	function wm_css_background( $optionBase = '' ) {
		$patternsSubfolder = 'img/patterns/';
		$patternFileFormat = '.png';

		//get background color
		$bgColor = ( wm_option( $optionBase . 'bg-color' ) ) ? ( '#' . wm_option( $optionBase . 'bg-color' ) ) : ( '' );

		//get background image
		if ( wm_option( $optionBase . 'bg-pattern' ) )
			$bgImg = ' url(' . esc_url( WM_ASSETS_THEME . $patternsSubfolder . wm_option( $optionBase . 'bg-pattern' ) . $patternFileFormat ) . ')';
		else
			$bgImg = ( wm_option( $optionBase . 'bg-img-url' ) ) ? ( ' url(' . esc_url( wm_option( $optionBase . 'bg-img-url' ) ) . ')' ) : ( '' );

		$bgImgRepeat     = ( wm_option( $optionBase . 'bg-img-repeat' ) ) ? ( ' ' . wm_option( $optionBase . 'bg-img-repeat' ) ) : ( '' );
		$bgImgAttachment = ( wm_option( $optionBase . 'bg-img-attachment' ) ) ? ( ' ' . wm_option( $optionBase . 'bg-img-attachment' ) ) : ( '' );
		$bgImgPosition   = ( wm_option( $optionBase . 'bg-img-position' ) ) ? ( ' ' . wm_option( $optionBase . 'bg-img-position' ) ) : ( '' );
		$bgImgParameters = $bgImgRepeat . $bgImgAttachment . $bgImgPosition;

		if ( wm_option( $optionBase . 'bg-pattern' ) )
			$bgImgParameters = ' repeat' . $bgImgAttachment;

		if ( $bgImg )
			$bgImg .= $bgImgParameters;

		if ( $bgColor || $bgImg )
			return ( $bgColor . $bgImg );
	}
} // /wm_css_background



/*
* Get background CSS styles from post meta
*
* $optionBase = TEXT [wm_meta_option base name (option full name minus function suffixes: bg-color, bg-img-url, bg-img-repeat, bg-img-attachment, bg-img-position, bg-pattern)]
*/
if ( ! function_exists( 'wm_css_background_meta' ) ) {
	function wm_css_background_meta( $optionBase = '' ) {
		$patternsSubfolder = 'img/patterns/';
		$patternFileFormat = '.png';
		$postId = ( is_home() ) ? ( get_option( 'page_for_posts' ) ) : ( null );

		//get background color
		$bgColor = ( wm_meta_option( $optionBase . 'bg-color', $postId ) ) ? ( '#' . wm_meta_option( $optionBase . 'bg-color', $postId ) ) : ( '' );

		//get background image
		if ( wm_meta_option( $optionBase . 'bg-pattern', $postId ) )
			$bgImg = ' url(' . esc_url( WM_ASSETS_THEME . $patternsSubfolder . wm_meta_option( $optionBase . 'bg-pattern', $postId ) . $patternFileFormat ) . ')';
		else
			$bgImg = ( wm_meta_option( $optionBase . 'bg-img-url', $postId ) ) ? ( ' url(' . esc_url( wm_meta_option( $optionBase . 'bg-img-url', $postId ) ) . ')' ) : ( '' );

		$bgImgRepeat     = ( wm_meta_option( $optionBase . 'bg-img-repeat', $postId ) ) ? ( ' ' . wm_meta_option( $optionBase . 'bg-img-repeat', $postId ) ) : ( '' );
		$bgImgAttachment = ( wm_meta_option( $optionBase . 'bg-img-attachment', $postId ) ) ? ( ' ' . wm_meta_option( $optionBase . 'bg-img-attachment', $postId ) ) : ( '' );
		$bgImgPosition   = ( wm_meta_option( $optionBase . 'bg-img-position', $postId ) ) ? ( ' ' . wm_meta_option( $optionBase . 'bg-img-position', $postId ) ) : ( '' );
		$bgImgParameters = $bgImgRepeat . $bgImgAttachment . $bgImgPosition;

		if ( wm_meta_option( $optionBase . 'bg-pattern', $postId ) )
			$bgImgParameters = ' repeat' . $bgImgAttachment;

		if ( $bgImg )
			$bgImg .= $bgImgParameters;

		if ( $bgColor || $bgImg )
			return ( $bgColor . $bgImg );
	}
} // /wm_css_background_meta



/*
* Custom feed link
*/
if ( ! function_exists( 'wm_custom_feed' ) ) {
	function wm_custom_feed() {
		$customRSS = wm_social_links( array(
			'links'    => wm_option( 'contact-social' ),
			'networks' => array( 'rss' )
			 ) );

		$customRSS = $customRSS['rss'];

		if ( empty( $customRSS ) )
			return;

		if ( 1 < count( $customRSS ) )
			$i = 1;
		else
			$i = null;

		foreach ( $customRSS as $feed ) {
			$j = ( $i ) ? ( ' ' . $i ) : ( null );
			echo '<link rel="alternate" type="application/rss+xml" title="' . get_bloginfo( 'name' ) . __( ' feed', WM_THEME_TEXTDOMAIN ) . $j . '" href="' . $feed . '" />' . "\r\n";
			$i++;
		}
	}
} // /wm_custom_feed



/*
* Strip string by words count
*
* $str   = TEXT [string to process]
* $words = # [wordcount]
* $more  = TEXT ["..."]
*/
if ( ! function_exists( 'wm_string_length' ) ) {
	function wm_string_length( $str, $words = 20, $more = '' ) {
		if ( ! $str )
			return;

		$str = explode( ' ', $str, ( $words + 1 ) );

		if ( count( $str ) > $words )
			array_pop( $str );

		return implode( ' ', $str ) . $more;
	}
} // /wm_string_length



/*
* Remove invalid HTML5 rel attribute
*/
if ( ! function_exists( 'wm_remove_rel' ) ) {
	function wm_remove_rel( $link ) {
		return ( str_replace ( 'rel="category tag"', '', $link ) );
	}
} // /wm_remove_rel



/*
* Exclude post formats from feed
*/
if ( ! function_exists( 'wm_feed_exclude_post_formats' ) ) {
	function wm_feed_exclude_post_formats( &$wp_query ) {
		if ( $wp_query->is_feed() ) {

			//post formats to exclude by slug
			$formatsToExclude = array(
				'post-format-aside',
				'post-format-chat',
				'post-format-status'
				);

			//extra query to hack onto the $wp_query
			$extraQuery = array(
				'taxonomy' => 'post_format',
				'field'    => 'slug',
				'terms'    => $formatsToExclude,
				'operator' => 'NOT IN'
				);

			$query = $wp_query->get( 'tax_query' );

			if ( is_array( $query ) )
				$query = $query + $extraQuery;
			else
				$query = array( $extraQuery );

			$wp_query->set( 'tax_query', $query );
		}
	}
} // /wm_feed_exclude_post_formats



/*
* Include post types in feed
*/
if ( ! function_exists( 'wm_feed_include_post_types' ) ) {
	function wm_feed_include_post_types( $query ) {
		if ( isset( $query['feed'] ) && ! isset( $query['post_type'] ) )
			$query['post_type'] = array( 'post', 'wm_portfolio' );

		return $query;
	}
} // /wm_feed_include_post_types



/*
* Color brightness detection
*
* $hex = HEX [color hex string (either ffffff or fff, without "#")]
*/
if ( ! function_exists( 'wm_color_brightness' ) ) {
	function wm_color_brightness( $hex ) {
		$hex = preg_replace( "/[^0-9A-Fa-f]/", '', $hex );
		$rgb = array();

		if ( 6 == strlen( $hex ) ) {

			$color    = hexdec( $hex );
			$rgb['r'] = 0xFF & ( $color >> 0x10 );
			$rgb['g'] = 0xFF & ( $color >> 0x8 );
			$rgb['b'] = 0xFF & $color;

		} elseif ( 3 == strlen( $hex ) ) { //if shorthand notation, need some string manipulations

			$rgb['r'] = hexdec( str_repeat( substr( $hex, 0, 1 ), 2 ) );
			$rgb['g'] = hexdec( str_repeat( substr( $hex, 1, 1 ), 2 ) );
			$rgb['b'] = hexdec( str_repeat( substr( $hex, 2, 1 ), 2 ) );

		} else {
			return;
		}

		$brightness = ( ( $rgb['r'] * 299 ) + ( $rgb['g'] * 587 ) + ( $rgb['b'] * 114 ) ) / 1000; //returns value from 0 to 255

		return $brightness;
	}
} // /wm_color_brightness



/*
* Social share buttons
*/
if ( ! function_exists( 'wm_social_share_buttons' ) ) {
	function wm_social_share_buttons() {
		if ( ! is_single() )
			return;

		$out = '';

		if ( wm_option( 'contact-share-facebook' ) )
			$out .= '<div class="share-button"><div class="fb-like" data-href="' . wp_get_shortlink() . '" data-send="false" data-layout="button_count" data-width="80" data-show-faces="true"></div></div>';

		if ( wm_option( 'contact-share-twitter' ) )
			$out .= '<div class="share-button"><a href="https://twitter.com/share" class="twitter-share-button" data-url="' . wp_get_shortlink() . '" data-lang="en">Tweet</a></div>';

		if ( wm_option( 'contact-share-googleplus' ) )
			$out .= '<div class="share-button"><div class="g-plusone" data-size="medium" data-href="' . wp_get_shortlink() . '"></div></div>';

		if ( $out )
			echo '<div class="social-share">' . $out . '</div>';
	}
} // /wm_social_share_buttons



/*
* Displays social networks links
*
* $args = ARRAY [array of settings:
		class_container = TEXT [CSS classes applied on links container DIV]
		class_item      = TEXT [CSS classes applied on a link item]
		links           = ARRAY [array of links to process (for RSS link, prepend the link with "rss=")]
		networks        = ARRAY [array of accepted social networks names]
		]
*/
if ( ! function_exists( 'wm_social_links' ) ) {
	function wm_social_links( $args = array() ) {
		$defaults = array(
			'class_container' => 'container',
			'class_item'      => 'item',
			'links'           => array(),
			'networks'        => array()
			);
		$args = wp_parse_args( $args, $defaults );

		$customRSS = array();

		//do nothing if no links or networks set
		if ( ! is_array( $args['links'] ) || empty( $args['links'] ) || ! is_array( $args['networks'] ) || empty( $args['networks'] ) )
			return;

		$target = ( wm_option( 'contact-social-new-tab' ) ) ? ( ' target="_blank"' ) : ( null );

		$out = '';

		foreach ( $args['links'] as $socialLink ) {
			if ( 0 === strpos( $socialLink, 'rss:' ) ) {
			//RSS link

				$socialLink = str_replace( 'rss:', '', $socialLink );

				$out .= '<a href="' . esc_url( $socialLink ) . '"' . $target . ' class="ico-rss"><img alt="' . get_bloginfo( 'name' ) . __( ' RSS feed', WM_THEME_TEXTDOMAIN ) . '" title="' . get_bloginfo( 'name' ) . __( ' RSS feed', WM_THEME_TEXTDOMAIN ) . '" src="' . WM_ASSETS_THEME . 'img/icons/social/rss.png" /></a>';
				$customRSS[] = esc_url( $socialLink );

			} else {
			//other link

				$fullUrlSplit    = explode( '.', esc_url( $socialLink ) );
				$fullUrlSplit[0] = str_replace( array( 'http://', 'https://' ), '', $fullUrlSplit[0] );
				$fullUrlSplit    = implode( '/', $fullUrlSplit );
				$fullUrlSplit    = explode( '/', $fullUrlSplit );
				$networkName     = array_search( 'com', $fullUrlSplit );
				$networkName     = ( $networkName ) ? ( $fullUrlSplit[ $networkName - 1 ] ) : ( null );

				if ( $networkName ) {
					if ( 'google' === $networkName )
						$network = 'googleplus';
					else
						$network = $networkName;

					if ( isset( $network ) && $network && in_array( $network, $args['networks'] ) ) {
						$networkName = ( 'googleplus' === $network ) ? ( 'plus.google.com' ) : ( $network . '.com' );
						$out .= '<a href="' . esc_url( $socialLink ) . '"' . $target . ' class="ico-' . $network . ' ' . $args['class_item'] . '"><img alt="' . get_bloginfo( 'name' ) . __( ' on ', WM_THEME_TEXTDOMAIN ) . ucfirst( $network ) . '" title="' . get_bloginfo( 'name' ) . __( ' on ', WM_THEME_TEXTDOMAIN ) . $networkName . '" src="' . WM_ASSETS_THEME . 'img/icons/social/' . $network . '.png" /></a>';
					}
				}

			}
		}

		$output          = array();
		$output['links'] = ( $out ) ? ( '<div class="social-links ' . $args['class_container'] . '">' . $out . '</div>' ) : ( '' );
		$output['rss']   = ( isset( $customRSS ) ) ? ( $customRSS ) : ( null );

		return $output;
	}
} // /wm_social_links




/*
Plugin Name: Previous and Next Post in Same Taxonomy
Plugin URI: http://core.trac.wordpress.org/ticket/17807
Description: Extends the prev/next links to let you limit to same taxonomy. Used for testing WP Core patch, and can be disabled if patch is committed to core.
Author: Bill Erickson
Version: 1.0
Author URI: http://www.billerickson.net
*/
	/**
	 * Retrieve previous post that is adjacent to current post.
	 *
	 * @since 1.5.0
	 *
	 * @param bool $in_same_cat Optional. Whether post should be in same category.
	 * @param array|string $excluded_categories Optional. Array or comma-separated list of excluded category IDs.
	 * @param string $taxonomy Optional. Which taxonomy to use.
	 * @return mixed Post object if successful. Null if global $post is not set. Empty string if no corresponding post exists.
	 */
	function be_get_previous_post($in_same_cat = false, $excluded_categories = '', $taxonomy = 'category') {
		return be_get_adjacent_post($in_same_cat, $excluded_categories, true, $taxonomy);
	}
	/**
	 * Retrieve next post that is adjacent to current post.
	 *
	 * @since 1.5.0
	 *
	 * @param bool $in_same_cat Optional. Whether post should be in same category.
	 * @param array|string $excluded_categories Optional. Array or comma-separated list of excluded category IDs.
	 * @param string $taxonomy Optional. Which taxonomy to use.
	 * @return mixed Post object if successful. Null if global $post is not set. Empty string if no corresponding post exists.
	 */
	function be_get_next_post($in_same_cat = false, $excluded_categories = '', $taxonomy = 'category') {
		return be_get_adjacent_post($in_same_cat, $excluded_categories, false, $taxonomy);
	}
	/**
	 * Retrieve adjacent post.
	 *
	 * Can either be next or previous post.
	 *
	 * @since 2.5.0
	 *
	 * @param bool $in_same_cat Optional. Whether post should be in same category.
	 * @param array|string $excluded_categories Optional. Array or comma-separated list of excluded category IDs.
	 * @param bool $previous Optional. Whether to retrieve previous post.
	 * @param string $taxonomy Optional. Which taxonomy to use.
	 * @return mixed Post object if successful. Null if global $post is not set. Empty string if no corresponding post exists.
	 */
	function be_get_adjacent_post( $in_same_cat = false, $excluded_categories = '', $previous = true, $taxonomy = 'category' ) {
		global $post, $wpdb;

		if ( empty( $post ) )
			return null;

		$current_post_date = $post->post_date;

		$join = '';
		$posts_in_ex_cats_sql = '';
		if ( $in_same_cat || ! empty( $excluded_categories ) ) {
			$join = " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id";

			if ( $in_same_cat ) {
				$cat_array = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));
				$join .= " AND tt.taxonomy = '$taxonomy' AND tt.term_id IN (" . implode(',', $cat_array) . ")";
			}

			$posts_in_ex_cats_sql = "AND tt.taxonomy = '$taxonomy'";
			if ( ! empty( $excluded_categories ) ) {
				if ( ! is_array( $excluded_categories ) ) {
					// back-compat, $excluded_categories used to be IDs separated by " and "
					if ( strpos( $excluded_categories, ' and ' ) !== false ) {
						_deprecated_argument( __FUNCTION__, '3.3', sprintf( 'Use commas instead of %s to separate excluded categories.', "'and'" ) );
						$excluded_categories = explode( ' and ', $excluded_categories );
					} else {
						$excluded_categories = explode( ',', $excluded_categories );
					}
				}

				$excluded_categories = array_map( 'intval', $excluded_categories );

				if ( ! empty( $cat_array ) ) {
					$excluded_categories = array_diff($excluded_categories, $cat_array);
					$posts_in_ex_cats_sql = '';
				}

				if ( !empty($excluded_categories) ) {
					$posts_in_ex_cats_sql = " AND tt.taxonomy = '$taxonomy' AND tt.term_id NOT IN (" . implode($excluded_categories, ',') . ')';
				}
			}
		}

		$adjacent = $previous ? 'previous' : 'next';
		$op = $previous ? '<' : '>';
		$order = $previous ? 'DESC' : 'ASC';

		$join  = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_cat, $excluded_categories );
		$where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare("WHERE p.post_date $op %s AND p.post_type = %s AND p.post_status = 'publish' $posts_in_ex_cats_sql", $current_post_date, $post->post_type), $in_same_cat, $excluded_categories );
		$sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT 1" );

		$query = "SELECT p.* FROM $wpdb->posts AS p $join $where $sort";
		$query_key = 'adjacent_post_' . md5($query);
		$result = wp_cache_get($query_key, 'counts');
		if ( false !== $result )
			return $result;

		$result = $wpdb->get_row("SELECT p.* FROM $wpdb->posts AS p $join $where $sort");
		if ( null === $result )
			$result = '';

		wp_cache_set($query_key, $result, 'counts');
		return $result;
	}

?>