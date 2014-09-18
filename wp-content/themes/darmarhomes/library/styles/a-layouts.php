<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Layouts
*****************************************************
*/

//Website layout
$websiteLayout = array(

	array(
		'name' => __( 'Boxed layout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		'id'   => 'boxed',
		'desc' => __( 'Boxed - website sections will be contained in a centered box', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		'img'  => WM_ASSETS_ADMIN . 'img/layouts/layout-boxed.png'
	),

	array(
		'name' => __( 'Full width layout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		'id'   => 'fullwidth',
		'desc' => __( 'Full width - website sections will spread across the whole browser window width', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
		'img'  => WM_ASSETS_ADMIN . 'img/layouts/layout-full-width.png'
	),

);



//Sidebar positions
$sidebarPosition = array(

	array(
		'name' => __( 'Default theme settings', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'   => '',
		'desc' => __( 'Use default theme position of the sidebar', WM_THEME_TEXTDOMAIN_ADMIN ),
		'img'  => WM_ASSETS_ADMIN . 'img/layouts/layout-default.png'
	),

	array(
		'name' => __( 'Sidebar right', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'   => 'right',
		'desc' => __( 'Sidebar is aligned right from the page/post content', WM_THEME_TEXTDOMAIN_ADMIN ),
		'img'  => WM_ASSETS_ADMIN . 'img/layouts/layout-sidebar-right.png'
	),

	array(
		'name' => __( 'Sidebar left', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'   => 'left',
		'desc' => __( 'Sidebar is aligned left from the page/post content', WM_THEME_TEXTDOMAIN_ADMIN ),
		'img'  => WM_ASSETS_ADMIN . 'img/layouts/layout-sidebar-left.png'
	),

	array(
		'name' => __( 'No sidebar, full width', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'   => 'none',
		'desc' => __( 'No sidebar is displayed, the page content takes the full width of the website', WM_THEME_TEXTDOMAIN_ADMIN ),
		'img'  => WM_ASSETS_ADMIN . 'img/layouts/layout-sidebar-none.png'
	)

);



//Portfolio layout
$portfolioLayout = array(

	array(
		'name' => __( 'Default theme settings', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'   => '',
		'desc' => __( 'Use default theme portfolio layout', WM_THEME_TEXTDOMAIN_ADMIN ),
		'img'  => WM_ASSETS_ADMIN . 'img/layouts/layout-portfolio-default.png'
	),

	array(
		'name' => __( 'One column', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'   => 'columns-1',
		'desc' => __( 'Large preview and item description', WM_THEME_TEXTDOMAIN_ADMIN ),
		'img'  => WM_ASSETS_ADMIN . 'img/layouts/layout-portfolio-columns-1.png'
	),

	array(
		'name' => __( 'Two columns', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'   => 'columns-2',
		'desc' => __( 'Two columns preview with basic info', WM_THEME_TEXTDOMAIN_ADMIN ),
		'img'  => WM_ASSETS_ADMIN . 'img/layouts/layout-portfolio-columns-2.png'
	),

	array(
		'name' => __( 'Three columns', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'   => 'columns-3',
		'desc' => __( 'Three columns preview with basic info', WM_THEME_TEXTDOMAIN_ADMIN ),
		'img'  => WM_ASSETS_ADMIN . 'img/layouts/layout-portfolio-columns-3.png'
	),

	array(
		'name' => __( 'Four columns', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'   => 'columns-4',
		'desc' => __( 'Four columns preview with basic info', WM_THEME_TEXTDOMAIN_ADMIN ),
		'img'  => WM_ASSETS_ADMIN . 'img/layouts/layout-portfolio-columns-4.png'
	)

);



//Portfolio single layout
$portfolioSingleLayout = array(

	array(
		'name' => __( 'Portfolio preview left', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'   => 'left',
		'desc' => __( 'First portfolio preview, then portfolio description', WM_THEME_TEXTDOMAIN_ADMIN ),
		'img'  => WM_ASSETS_ADMIN . 'img/layouts/layout-portfolio-single-left.png'
	),

	array(
		'name' => __( 'Portfolio preview right', WM_THEME_TEXTDOMAIN_ADMIN ),
		'id'   => 'right',
		'desc' => __( 'First portfolio description, then portfolio preview', WM_THEME_TEXTDOMAIN_ADMIN ),
		'img'  => WM_ASSETS_ADMIN . 'img/layouts/layout-portfolio-single-right.png'
	),

);

?>