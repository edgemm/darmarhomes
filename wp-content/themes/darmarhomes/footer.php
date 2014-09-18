<!-- /content --></div>


<?php
//Clients
$treshold = ( wm_option( 'design-color-treshold' ) ) ? ( wm_option( 'design-color-treshold' ) ) : ( WM_COLOR_TRESHOLD );

$logoCount = wp_count_posts( 'wm_clients' )->publish;
$logoCount = ( 6 < $logoCount ) ? ( 6 ) : ( $logoCount );

if ( 1 < $logoCount && ! wm_option( 'layout-clients' ) && 'disable' != wm_option( 'general-role-clients' ) && (
	( is_front_page() && ! wm_option( 'layout-clients-home' ) ) ||
	( is_page() && ! is_front_page() && ! wm_option( 'layout-clients-subpages' ) ) ||
	( ! is_front_page() && isset( $post ) && 'pagetpl-portfolio.php' === get_post_meta( $post->ID, '_wp_page_template', TRUE ) && ! wm_option( 'layout-clients-portfolio' ) ) ||
	( isset( $post ) && 'wm_portfolio' === $post->post_type && ! wm_option( 'layout-clients-portfolio-detail' ) )
	) ) {

	//clients background color class
	$classBgClients = '';
	if ( wm_option( 'design-clients-bg-color' ) )
		$classBgClients = ( $treshold > wm_color_brightness( wm_option( 'design-clients-bg-color' ) ) ) ? ( 'bg-dark' ) : ( 'bg-light' );
	$setBgClients = ( wm_css_background( 'design-clients-' ) ) ? ( ' set-bg' ) : ( '' );
?>
<div id="above-footer" class="<?php echo $classBgClients . $setBgClients; ?>"><div class="wrap-inner">
	<div class="above-footer section">
		<div class="clients">
			<?php
			if ( wm_option( 'layout-clients-title' ) )
				echo '<h3 class="section-heading">' . wm_option( 'layout-clients-title' ) . '</h3>';

			$count   = 6;
			$sorting = 'rand';
			$i       = 0;

			wp_reset_query();
			$the_clients = new WP_Query( array(
				'post_type'      => 'wm_clients',
				'posts_per_page' => $count,
				'orderby'        => $sorting
				) );
			if ( $the_clients->have_posts() ) :
				global $is_IE;

				//HTML to display output
				$out       = '<ul class="columns count-' . $logoCount . '">';
				$ie7BugFix = ( $is_IE ) ? ( '&nbsp;' ) : ( '' ); //bug fix for IE7 for vertical align, although will be applied on all versions of IE...

				while ( $the_clients->have_posts() ) : $the_clients->the_post();
					++$i;
					if ( $i > $count )
						break;

					$out .= '<li class="column">';
					$out .= ( wm_meta_option( 'client-link' ) ) ? ( '<a href="' . esc_url( wm_meta_option( 'client-link' ) ) . '" title="' . get_the_title() . '">' ) : ( '' );
					$out .= ( has_post_thumbnail() ) ? ( get_the_post_thumbnail( null, 'logo', null ) . $ie7BugFix ) : ( '' );
					$out .= ( wm_meta_option( 'client-link' ) ) ? ( '</a>' ) : ( '' );
					$out .= '</li>';
				endwhile;

				$out .= '</ul>';
				echo $out;
			endif;
			wp_reset_query();

			?>
		</div>
	</div>
</div></div>
<?php
}
?>


<?php
wm_before_footer();

$classBgFooter = '';

if ( wm_option( 'design-footer-bg-color' ) )
	$classBgFooter = ( $treshold > wm_color_brightness( wm_option( 'design-footer-bg-color' ) ) ) ? ( ' bg-dark' ) : ( ' bg-light' );
$setBgFooter = ( wm_css_background( 'design-footer-' ) ) ? ( ' set-bg' ) : ( '' );
?>

<footer id="footer" class="full-width <?php echo $classBgFooter . $setBgFooter; ?>">
<!-- FOOTER -->
<?php
if ( is_active_sidebar( 'footer-widgets' ) )
	echo '<div class="footer-widgets-wrap">';
//wm_sidebar($defaultSidebar, $class, $restrictCount, $overrideSidebar)
wm_sidebar( 'footer-widgets', 'wrap-inner footer-content widgets columns', 5 ); //restricted to 5 widgets, no override allowed
if ( is_active_sidebar( 'footer-widgets' ) )
	echo '</div>';
?>
<div class="wrap-inner">

	<?php
	wp_nav_menu( array(
		'theme_location'  => 'footer-navigation',
		'menu'            => null,
		'container'       => null,
		'container_class' => null,
		'container_id'    => null,
		'menu_class'      => 'menu-footer',
		'menu_id'         => null,
		'echo'            => true,
		'fallback_cb'     => null,
		'before'          => null,
		'after'           => null,
		'link_before'     => null,
		'link_after'      => null,
		'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
		'depth'           => 1
		) );

	wm_credits();

	echo '<a href="#top" class="top-of-page">' . __( 'Top', WM_THEME_TEXTDOMAIN ) . '</a>';
	?>

</div> <!-- /wrap-inner -->
<!-- /footer --></footer>


<?php wm_after_footer(); ?>

<!-- /wrapper --></div>

<!-- wp_footer() -->
<?php wp_footer(); ?>

<?php
//Social sharing buttons JS
$out = '';

if ( wm_option( 'contact-share-facebook' ) )
	$out .= '<div id="fb-root"></div>
		<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, \'script\', \'facebook-jssdk\'));
		</script>';

if ( wm_option( 'contact-share-twitter' ) )
	$out .= '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';

if ( wm_option( 'contact-share-googleplus' ) )
	$out .= "<script>(function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();</script>";

if ( $out && is_single() )
	echo $out;
?>
</body>

<!-- <?php echo wm_static_option( 'static-webdesigner' ); ?> -->

</html>