<!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->

<head>
<!-- (c) Copyright <?php bloginfo( 'name' ); ?> -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if ( ! wm_option( 'general-valid-html' ) ) { ?><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><?php } ?>
<meta name="robots" content="<?php if ( is_archive() ) echo wm_option( 'seo-indexing' ); ?>index, follow" />

<!-- website title -->
<title><?php
if ( wm_option( 'seo-default-meta-title' ) )
 wp_title( '' );
else
	wm_seo_title();
?></title>

<!-- website info -->
<meta name="description" content="<?php wm_seo_desc(); ?>" />
<meta name="keywords" content="<?php wm_seo_keywords(); ?>" />
<meta name="author" content="WebMan - www.webmandesign.eu" />
<?php if ( ! wm_option( 'general-valid-html' ) ) { ?>
<!-- Dublin Core Metadata : http://dublincore.org/ -->
<meta name="DC.title" content="<?php bloginfo( 'name' ); ?>" />
<meta name="DC.subject" content="<?php bloginfo('description'); ?>" />
<meta name="DC.creator" content="WebMan - www.webmandesign.eu" />
<?php } ?>

<!-- profile and pingback -->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- css stylesheets -->
<?php
if ( wm_option( 'design-font-custom' ) )
	echo wm_option( 'design-font-custom' ) . "\r\n";
?>
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); echo '?ver=' . WM_SCRIPTS_VERSION; ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/print.css" type="text/css" media="print" />

<!-- favicon and apple-touch-icon -->
<?php wm_favicon();

global $is_IE;
if ( $is_IE ) :
?>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script>window.html5 || document.write('<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/html5.js"><\/script>')</script>
<![endif]-->
<?php
endif;
?>

<!-- wp_head() -->
<?php
wp_head();

//custom in-header styles
$postId = ( is_home() ) ? ( get_option( 'page_for_posts' ) ) : ( null );

$inHeaderStyles = '';
if ( ( isset( $post ) || is_home() ) && wm_css_background_meta( 'background-' ) && ! wm_meta_option( 'background-bg-img-fit-window', $postId ) )
	$inHeaderStyles .= 'body.boxed{background:' . wm_css_background_meta( 'background-' ) . '}' . "\r\n";
if ( ( isset( $post ) || is_home() ) && wm_meta_option( 'slider-roundabout-width' ) )
	$inHeaderStyles .= 'ul.roundabout-slider{width:' . ( 960 + intval( wm_meta_option( 'slider-roundabout-width' ) ) ) . 'px}' . "\r\n";
if ( $inHeaderStyles )
	echo '<style type="text/css">' . $inHeaderStyles . '</style>' . "\r\n";

$boxedClass  = ( 'boxed' === wm_option( 'layout-boxed' ) ) ? ( 'boxed' ) : ( 'no-boxed' );
$schemeClass = ( wm_option( 'design-icon-scheme' ) ) ? ( ' ' . wm_option( 'design-icon-scheme' ) . '-icon-scheme' ) : ( ' dark-icon-scheme' );
$treshold    = ( wm_option( 'design-color-treshold' ) ) ? ( wm_option( 'design-color-treshold' ) ) : ( WM_COLOR_TRESHOLD );

$classBgWrap = $classBgHeader =	$classBgFooter = '';

//wrap background color class
if ( wm_option( 'design-wrap-bg-color' ) )
	$classBgWrap = ( $treshold > wm_color_brightness( wm_option( 'design-wrap-bg-color' ) ) ) ? ( 'bg-dark' ) : ( 'bg-light' );
$setBgWrap = ( wm_css_background( 'design-wrap-' ) ) ? ( ' set-bg' ) : ( '' );

//header background color class
if ( wm_option( 'design-header-bg-color' ) )
	$classBgHeader = ( $treshold > wm_color_brightness( wm_option( 'design-header-bg-color' ) ) ) ? ( 'bg-dark' ) : ( 'bg-light' );
$setBgHeader = ( wm_css_background( 'design-header-' ) ) ? ( ' set-bg' ) : ( '' );

$classBgContactLink = ( $classBgHeader ) ? ( $classBgHeader ) : ( $classBgWrap );
?>
</head>



<body id="top" <?php
$topBarClasses = '';
if ( is_active_sidebar( 'top-bar-widgets' ) && ! wm_meta_option( 'no-top-bar', $postId ) && wm_option( 'layout-top-bar-fixed' ) )
	$topBarClasses = ' top-bar-fixed';

body_class( $boxedClass . $schemeClass . $topBarClasses );
?>>
<?php
//Background image fit browser window width
if ( ( isset( $post ) || is_home() ) && wm_css_background_meta( 'background-' ) && wm_meta_option( 'background-bg-img-fit-window', $postId ) ) {
	$imageURL      = wm_meta_option( 'background-bg-img-url', $postId );
	$imagePosition = ( 'fixed' === wm_meta_option( 'background-bg-img-attachment', $postId ) ) ? ( 'fixed' ) : ( 'absolute' );
	echo '<img src="' . $imageURL . '" alt="" style="position: ' . $imagePosition . '; width: 100%; left: 0; top: 0; z-index: 0;" />';
}

//TOP BAR
if ( is_active_sidebar( 'top-bar-widgets' ) && ! wm_meta_option( 'no-top-bar', $postId ) ) {
	$class    = ( wm_option( 'layout-top-bar-fixed' ) ) ? ( 'fixed' ) : ( '' );
	$class   .= ( wm_option( 'layout-top-bar-boxed' ) ) ? ( ' boxed-bar' ) : ( '' );
	$classOut = ( $class ) ? ( ' class="' . $class . '"' ) : ( '' );

	echo "\r\n\r\n" . '<div id="top-bar"' . $classOut . '>' . "\r\n" . '<!-- TOP BAR -->' . "\r\n";

	//wm_sidebar($defaultSidebar, $class, $restrictCount, $overrideSidebar)
	wm_sidebar( 'top-bar-widgets', 'widgets columns wrap-inner', 2 ); //restricted to 2 widgets, no override allowed

	echo '<!-- /top-bar --></div>' . "\r\n\r\n\r\n";
}
?>



<header id="header" class="<?php echo $classBgHeader . $setBgHeader; ?>">
<!-- HEADER -->

<div class="wrap-inner">

	<?php wm_logo(); ?>

	<?php get_template_part( 'nav' ); ?>

	<?php
	//Contact
	if ( ! wm_option( 'layout-menu-special' ) && is_active_sidebar( 'contact-section-widgets' ) ) :

	if ( wm_option( 'design-footer-bg-color' ) )
		$classBgFooter = ( $treshold > wm_color_brightness( wm_option( 'design-footer-bg-color' ) ) ) ? ( ' bg-dark' ) : ( ' bg-light' );
	$setBgFooter   = ( wm_css_background( 'design-footer-' ) ) ? ( ' set-bg' ) : ( '' );
	if ( 'boxed' != wm_option( 'layout-boxed' ) )
		$classBgFooter = '';

	$classBgContactLink = ( $classBgContactLink ) ? ( $classBgContactLink ) : ( 'default-header-color' );
	?>
	<div id="contact-section" class="contact-section no-js full-width<?php echo $classBgFooter . $setBgFooter; ?>">
		<a href="#" class="contact-link <?php echo $classBgContactLink; ?>"><span><?php echo ( wm_option( 'layout-menu-special-title' ) ) ? ( wm_option( 'layout-menu-special-title' ) ) : ( __( 'Contact', WM_THEME_TEXTDOMAIN ) ); ?></span></a>
		<?php
		//wm_sidebar($defaultSidebar, $class, $restrictCount, $overrideSidebar)
		wm_sidebar( 'contact-section-widgets', 'widgets columns contact-content section', 3 ); //restricted to 3 widgets, no override allowed
		?>
	</div>
	<?php
	endif;
	?>

	<?php
	//Status
	if ( 'none' != wm_option( 'layout-status' ) ) :
	?>
	<div class="status <?php echo ' type-' . wm_option( 'layout-status' ); ?>">
		<?php
		if ( 'widgets' === wm_option( 'layout-status' ) ) {

			//wm_sidebar($defaultSidebar, $class, $restrictCount, $overrideSidebar)
			wm_sidebar( 'header-right', null, 1 ); //1 widget max

		} else {

			wp_reset_query();
			$statusPost = new WP_Query( array(
				'posts_per_page' => 1,
				'tax_query'      => array( array(
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'terms'    => array( 'post-format-status' )
					) )
				) );

			if ( $statusPost->have_posts() ) {
				$statusPost->the_post();

				the_content();
			}
			wp_reset_query();

		}
		?>
	</div>
	<?php
	endif;
	?>

	<?php
	//Social links
	$out            = '';
	$socialLinks    = wm_option( 'contact-social' );
	$socialNetworks = array( 'deviantart', 'dribbble', 'facebook', 'flickr', 'forrst', 'googleplus', 'linkedin', 'twitter', 'vimeo', 'youtube', 'pinterest' );

	if ( ! wm_option( 'contact-social-disable' ) ) {
		$socialLinksArray = wm_social_links( array(
			'class_container' => '',
			'class_item'      => '',
			'links'           => $socialLinks,
			'networks'        => $socialNetworks
			 ) );
		echo $socialLinksArray['links'];
	}
	?>

</div> <!-- /wrap-inner -->
<!-- /header --></header>


<?php wm_after_header(); ?>

<div id="content">
<!-- CONTENT -->

<?php wm_before_main_content(); ?>
