<?php
/*
Template Name: Contact page
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

	<?php get_template_part( 'inc/loop/loop', 'contact' ); ?>

</article> <!-- /main -->

<?php
if ( 'none' != $sidebarLayout ) {
	$class = 'sidebar sidebar-' . $sidebarLayout;

	//wm_sidebar($defaultSidebar, $class, $restrictCount, $overrideSidebar)
	wm_sidebar( 'default', $class, null, $overrideSidebar ); //no restriction, allow override
}
?>

</div> <!-- /wrap-inner -->

<div class="section map-section">
	<?php
	$address  = wm_meta_option( 'contact-address1' );
	$address2 = wm_meta_option( 'contact-address2' );
	$city     = wm_meta_option( 'contact-city' );
	$country  = wm_meta_option( 'contact-country' );

	$mapWidth = ( 'boxed' === wm_option( 'layout-boxed' ) && wm_option( 'layout-boxed-padding' ) ) ? ( 960 + 2 * absint( wm_option( 'layout-boxed-padding' ) ) ) : ( 960 );
	$location = $address . ', ' . $address2 . ', ' . $city . ', ' . $country;
	$zoom     = wm_meta_option( 'contact-map-zoom' );

	//[map location="" width="240" height="240" zoom="5" bubble=""]

	if ( wm_meta_option( 'contact-map-url' ) )
		echo '<iframe width="100%" height="360" src="' . wm_meta_option( 'contact-map-url' ) . '&amp;iwloc=A&amp;z=' . $zoom . '&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>';
	elseif ( $location )
		echo do_shortcode( '[map location="' . $location . '" width="" height="360" zoom="' . $zoom . '" bubble=""]' );
	else
		_e( '<strong>Please, set the map location</strong>', WM_THEME_TEXTDOMAIN );
	?>
</div>
<?php get_footer(); ?>