<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Widget areas generator
*****************************************************
*/

//Load widget areas array
require_once( WM_WIDGETS . 'a-areas.php' );

//Add widgets
require_once( WM_WIDGETS . 'w-contact.php' );
require_once( WM_WIDGETS . 'w-cpmodules.php' );
require_once( WM_WIDGETS . 'w-cpportfolio.php' );
require_once( WM_WIDGETS . 'w-pagecontent.php' );
require_once( WM_WIDGETS . 'w-postslist.php' );
require_once( WM_WIDGETS . 'w-subpages.php' );
require_once( WM_WIDGETS . 'w-twitter.php' );





/*
*****************************************************
*      WIDGET AREAS REGISTRATION
*****************************************************
*/
//Register predefined widget areas (sidebars)
foreach( $widgetAreas as $widgetArea ) {
	register_sidebar( array(
		'name'          => $widgetArea['name'],
		'id'            => $widgetArea['id'],
		'description'   => $widgetArea['description'],
		'before_widget' => $widgetArea['before_widget'],
		'after_widget'  => $widgetArea['after_widget'],
		'before_title'  => $widgetArea['before_title'],
		'after_title'   => $widgetArea['after_title']
		) );
}



/*
*****************************************************
*      CUSTOM WIDGET AREAS REGISTRATION
*****************************************************
*/
$widgetAreasCustom      = array();
$sidebarArraysCheck     = array();
$widgetAreasCustomNames = wm_option( 'general-sidebars' );
$sidebarDescription     = sprintf( __( 'Custom widget area created in %s admin panel. Flexible layout, maximum 5 widgets (when displayed horizontally).', WM_THEME_TEXTDOMAIN_ADMIN ), WM_THEME_NAME );

if ( is_array( $widgetAreasCustomNames ) && ! empty( $widgetAreasCustomNames ) ) {
	foreach ( $widgetAreasCustomNames as $sidebarName ) {

		$sidebarID = ereg_replace( '[^A-Za-z0-9]', '', $sidebarName ); //remove non-alfanumeric characters
		$sidebarID = esc_attr( $sidebarID ); //get the sidebar name
		$sidebarID = 'wmcs-' . preg_replace( '/\s+/', '', $sidebarID ); //creating sidebar ID
		$sidebarID = strtolower( $sidebarID );

		//creating custom sidebars array
		if ( 'wmcs-' != $sidebarID && ! in_array( $sidebarID, $sidebarArraysCheck ) ) {
			$newSidebar = array(
					'name' => esc_attr( preg_replace( '/\s+/', ' ', $sidebarName ) ),
					'id'   => $sidebarID
				);
			array_push( $widgetAreasCustom, $newSidebar ); //add a sidebar at the end of all sidebars array
			array_push( $sidebarArraysCheck, $sidebarID ); //add a sidebar at the end of all sidebars array
		}

	}
}

//Register custom widget areas (sidebars)
if ( ! empty( $widgetAreasCustom ) ) {
	foreach ( $widgetAreasCustom as $widgetAreaCustom ) {
		register_sidebar( array(
			'name'          => $widgetAreaCustom['name'],
			'id'            => $widgetAreaCustom['id'],
			'description'   => $sidebarDescription,
			'before_widget' => '<div class="widget %1$s %2$s">',
			'after_widget'  => '</div> <!-- /widget -->',
			'before_title'  => '<h3 class="widget-heading">',
			'after_title'   => '</h3>'
			) );
	}
}

?>