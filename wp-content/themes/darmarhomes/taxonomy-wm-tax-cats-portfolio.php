<?php get_header(); ?>
<div class="wrap-inner">

<article class="main<?php
	$sidebarLayout   = ( wm_option( 'layout-portfolio-sidebar-position' ) ) ? ( wm_option( 'layout-portfolio-sidebar-position' ) ) : ( 'none' );

	if ( 'none' == $sidebarLayout )
		echo ' full-width';
	elseif ( 'left' == $sidebarLayout )
		echo ' sidebar-left normal-width';
	else
		echo ' normal-width';
	?>">

	<?php wm_start_main_content(); ?>

	<?php get_template_part( 'inc/loop/loop', 'portfolio-category' ); ?>

</article> <!-- /main -->

<?php
if ( 'none' != $sidebarLayout && wm_option( 'layout-portfolio-sidebar' ) ) {

	$class = 'sidebar sidebar-' . $sidebarLayout;

	//wm_sidebar($defaultSidebar, $class, $restrictCount, $overrideSidebar)
	wm_sidebar( wm_option( 'layout-portfolio-sidebar' ), $class ); //no restriction
}
?>

</div> <!-- /wrap-inner -->
<?php get_footer(); ?>