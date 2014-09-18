<?php
/*
Template Name: Portfolio page
*/

get_header();
?>
<div class="wrap-inner">

<article class="main<?php
	$sidebarLayout   = ( wm_meta_option( 'layout' ) ) ? ( wm_meta_option( 'layout' ) ) : ( 'none' );
	$overrideSidebar = ( wm_meta_option( 'sidebar' ) && -1 != wm_meta_option( 'sidebar' ) ) ? ( wm_meta_option( 'sidebar' ) ) : ( '' );

	if ( 'none' == $sidebarLayout )
		echo ' full-width';
	elseif ( 'left' == $sidebarLayout )
		echo ' sidebar-left normal-width';
	else
		echo ' normal-width';
	?>">

	<?php wm_start_main_content(); ?>

	<?php
	get_template_part( 'inc/loop/loop', 'portfolio' );

	if ( wm_meta_option( 'portfolio-widget-area' ) )
		wm_sidebar( wm_meta_option( 'portfolio-widget-area' ), 'widgets columns below-portfolio', 5 ); //restricted to 5 widgets, no override allowed
	?>

</article> <!-- /main -->

<?php
if ( 'none' != $sidebarLayout ) {

	$class = 'sidebar sidebar-' . $sidebarLayout;

	//wm_sidebar($defaultSidebar, $class, $restrictCount, $overrideSidebar)
	wm_sidebar( 'default', $class, '', $overrideSidebar ); //no restriction, allow override
}
?>

</div> <!-- /wrap-inner -->
<?php get_footer(); ?>