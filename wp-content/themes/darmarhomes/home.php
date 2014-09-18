<?php get_header(); ?>
<div class="wrap-inner">

<section class="main<?php
	$postId          = get_option( 'page_for_posts' );
	$sidebarLayout   = ( wm_meta_option( 'layout', $postId ) ) ? ( wm_meta_option( 'layout', $postId ) ) : ( WM_SIDEBAR_DEFAULT );
	$overrideSidebar = ( wm_meta_option( 'sidebar', $postId ) && -1 != wm_meta_option( 'sidebar', $postId ) ) ? ( wm_meta_option( 'sidebar', $postId ) ) : ( '' );

	if ( 'none' == $sidebarLayout )
		echo ' full-width';
	elseif ( 'left' == $sidebarLayout )
		echo ' sidebar-left normal-width';
	else
		echo ' normal-width';
	?>">

	<?php
	wm_start_main_content();

	//Blog page content
	if ( $postId && 2 > $paged ) {
		$blogPage = get_post( $postId );

		$content  = $blogPage->post_content;
		$content  = apply_filters( 'the_content', $content );
		$content  = str_replace( ']]>', ']]&gt;', $content );

		if ( $content )
			echo '<div class="article-content">' . $content . '</div>';

		wm_after_post();
	}
	?>

	<!-- BLOG ENTRIES -->
	<?php
	//Blog posts list
	get_template_part( 'inc/loop/loop', 'index' );
	?>

</section> <!-- /main -->

<?php
if ( 'none' != $sidebarLayout ) {

	$class = 'sidebar sidebar-' . $sidebarLayout;

	//wm_sidebar($defaultSidebar, $class, $restrictCount, $overrideSidebar)
	wm_sidebar( 'default', $class, '', $overrideSidebar ); //no restriction, allow override
}
?>

</div> <!-- /wrap-inner -->
<?php get_footer(); ?>