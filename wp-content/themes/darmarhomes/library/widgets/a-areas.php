<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Predefined widget areas
*****************************************************
*/

//Widget areas
$widgetAreas = array(

	array(
		'name'          => __( 'General Sidebar', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'            => 'default',
		'description'   => __( 'The default sidebar widget area.', WM_THEME_TEXTDOMAIN_ADMIN ),
		'before_widget' => '<div class="widget %1$s %2$s">',
		'after_widget'  => '</div> <!-- /widget -->',
		'before_title'  => '<h3 class="widget-heading">',
		'after_title'   => '</h3>'
	),

	array(
		'name'          => __( 'Footer Widgets', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'            => 'footer-widgets',
		'description'   => __( 'Flexible layout, maximum 5 widgets.', WM_THEME_TEXTDOMAIN_ADMIN ),
		'before_widget' => '<div class="widget %1$s %2$s">',
		'after_widget'  => '</div> <!-- /widget -->',
		'before_title'  => '<h3 class="widget-heading">',
		'after_title'   => '</h3>'
	),

	array(
		'name'          => __( 'Sitemap / Archives', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'            => 'sitemap',
		'description'   => __( 'Sitemap / Archives page widget area. Flexible layout, maximum 3 widgets.', WM_THEME_TEXTDOMAIN_ADMIN ),
		'before_widget' => '<div class="widget sitemap-item %1$s %2$s">',
		'after_widget'  => '</div> <!-- /sitemap-item -->',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>'
	),

	array(
		'name'          => __( 'Error 404 Page', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'            => 'page-404',
		'description'   => __( 'Error 404 page widget area below error explanation. Flexible layout, maximum 5 widgets.', WM_THEME_TEXTDOMAIN_ADMIN ),
		'before_widget' => '<div class="widget %1$s %2$s">',
		'after_widget'  => '</div> <!-- /widget -->',
		'before_title'  => '<h3 class="widget-heading">',
		'after_title'   => '</h3>'
	),

	array(
		'name'          => __( 'Portfolio Item Page', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'            => 'portfolio-detail',
		'description'   => __( 'Widgets area below portfolio item content. Flexible layout, maximum 5 widgets.', WM_THEME_TEXTDOMAIN_ADMIN ),
		'before_widget' => '<div class="widget %1$s %2$s">',
		'after_widget'  => '</div> <!-- /widget -->',
		'before_title'  => '<h3 class="widget-heading">',
		'after_title'   => '</h3>'
	),

	array(
		'name'          => __( 'Top Bar', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'            => 'top-bar-widgets',
		'description'   => __( 'Flexible layout, maximum 2 widgets. Recommended widgets are Custom menu, Text or Search.', WM_THEME_TEXTDOMAIN_ADMIN ),
		'before_widget' => '<div class="widget %1$s %2$s">',
		'after_widget'  => '</div> <!-- /widget -->',
		'before_title'  => '<h3 class="widget-heading">',
		'after_title'   => '</h3>'
	)

);

if ( ! wm_option( 'layout-menu-special' ) )
	array_push( $widgetAreas, array(
		'name'          => __( 'Special Menu Area', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'            => 'contact-section-widgets',
		'description'   => __( 'Special animated information area in main menu section. Used for contact information by default. Flexible layout, maximum 3 widgets.', WM_THEME_TEXTDOMAIN_ADMIN ),
		'before_widget' => '<div class="widget %1$s %2$s">',
		'after_widget'  => '</div> <!-- /widget -->',
		'before_title'  => '<h3 class="widget-heading">',
		'after_title'   => '</h3>'
		) );

if ( 'widgets' === wm_option( 'layout-status' ) )
	array_push( $widgetAreas, array(
		'name'          => __( 'Header Right', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'            => 'header-right',
		'description'   => __( 'Right side of the website header. Takes only 1 widget.', WM_THEME_TEXTDOMAIN_ADMIN ),
		'before_widget' => '<div class="widget %1$s %2$s">',
		'after_widget'  => '</div> <!-- /widget -->',
		'before_title'  => '<h3 class="widget-heading">',
		'after_title'   => '</h3>'
		) );

?>