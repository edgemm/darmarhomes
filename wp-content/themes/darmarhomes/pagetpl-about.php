<?php
/*
Template Name: About page with team view
*/

get_header();
?>
<div class="wrap-inner">

<article class="main<?php
	$sidebarLayout   = ( wm_meta_option( 'layout' ) ) ? ( wm_meta_option( 'layout' ) ) : ( WM_SIDEBAR_DEFAULT );
	$overrideSidebar = ( wm_meta_option( 'sidebar' ) && -1 != wm_meta_option( 'sidebar' ) ) ? ( wm_meta_option( 'sidebar' ) ) : ( '' );

	if ( 'none' == $sidebarLayout )
		echo ' full-width';
	elseif ( 'left' == $sidebarLayout )
		echo ' sidebar-left normal-width';
	else
		echo ' normal-width';
	?>">

	<?php wm_start_main_content(); ?>

	<?php get_template_part( 'inc/loop/loop', 'singular' ); ?>

	<?php
	if ( ! wm_option( 'general-cp-team' ) )
		get_template_part( 'inc/loop/loop', 'team' );
	?>

</article> <!-- /main -->

<?php
if ( 'none' != $sidebarLayout ) {
	$class = 'sidebar sidebar-' . $sidebarLayout;

	//wm_sidebar($defaultSidebar, $class, $restrictCount, $overrideSidebar)
	wm_sidebar( 'default', $class, null, $overrideSidebar ); //no restriction, allow override
}
?>

</div> <!-- /wrap-inner -->
<?php get_footer(); ?>