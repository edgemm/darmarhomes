<?php get_header(); ?>
<div class="wrap-inner">

<section class="main page-404 full-width">

	<?php wm_start_main_content(); ?>

	<article>
		<header>
			<h1><?php _e( 'Error 404', WM_THEME_TEXTDOMAIN ); ?></h1>
		</header>

		<div class="msg type-gray icon-box icon-warning">
			<h2><?php _e( 'Requested page does not exist', WM_THEME_TEXTDOMAIN ); ?></h2>
			<?php _e( 'The page you are looking for was not found.', WM_THEME_TEXTDOMAIN ); ?> <a href="<?php echo get_bloginfo( 'url' ); ?>"><?php _e( 'Return to <strong>homepage</strong>', WM_THEME_TEXTDOMAIN ); ?></a>
		</div>
	</article>

</section> <!-- /main -->

<?php
//wm_sidebar($defaultSidebar, $class, $restrictCount, $overrideSidebar)
wm_sidebar( 'page-404', 'columns widgets section', 5 );
?>

</div> <!-- /wrap-inner -->
<?php get_footer(); ?>