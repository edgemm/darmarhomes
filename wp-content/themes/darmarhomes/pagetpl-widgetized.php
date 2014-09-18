<?php
/*
Template Name: Fully widgetized
*/

$displayWidgetAreas = ( wm_meta_option( 'widget-areas' ) ) ? ( wm_meta_option( 'widget-areas' ) ) : ( array() );

get_header();
?>

<?php
if ( is_array( $displayWidgetAreas ) && ! empty( $displayWidgetAreas ) ) {

	wm_start_main_content();

	foreach ( $displayWidgetAreas as $id ) {
		$classes = 'widgets columns section full-width';
		if ( '-1' != $id )
			wm_sidebar( $id, $classes, 5, null, 'print', 'wrap-it' ); //restricted to 5 widgets, no override allowed, has outer wrapper
	}

}
?>

<?php get_footer(); ?>