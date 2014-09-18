<?php
$redirectToHome = array( 'wm_clients', 'wm_modules', 'wm_slides', 'wm_team' );
if ( in_array( get_post_type( $post->ID ), $redirectToHome ) ) {
	wp_redirect( home_url() );
	exit;
}

get_header(); ?>
<div class="wrap-inner">

<article class="main<?php
	$postId          = get_option( 'page_for_posts' );

	$sidebarLayout   = ( wm_meta_option( 'layout' ) ) ? ( wm_meta_option( 'layout' ) ) : ( null );
	if ( ! $sidebarLayout )
		$sidebarLayout   = ( wm_meta_option( 'layout', $postId ) ) ? ( wm_meta_option( 'layout', $postId ) ) : ( WM_SIDEBAR_DEFAULT );

	$overrideSidebar = ( wm_meta_option( 'sidebar' ) && -1 != wm_meta_option( 'sidebar' ) ) ? ( wm_meta_option( 'sidebar' ) ) : ( null );
	if ( ! $overrideSidebar )
		$overrideSidebar = ( wm_meta_option( 'sidebar', $postId ) && -1 != wm_meta_option( 'sidebar', $postId ) ) ? ( wm_meta_option( 'sidebar', $postId ) ) : ( null );

	if ( 'none' == $sidebarLayout )
		echo ' full-width';
	elseif ( 'left' == $sidebarLayout )
		echo ' sidebar-left normal-width';
	else
		echo ' normal-width';
	?>">

	<?php wm_start_main_content(); ?>

	<?php get_template_part( 'inc/loop/loop', 'singular' ); ?>

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