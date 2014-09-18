<nav id="nav-main" class="section"><!-- NAVIGATION -->
	<a class="invisible" href="#main-title" title="<?php _e( 'Skip to content', WM_THEME_TEXTDOMAIN ); ?>"><?php _e( 'Skip to content', WM_THEME_TEXTDOMAIN ); ?></a>

	<?php
	if ( ! function_exists( 'wm_menu_callback' ) ) {
		function wm_menu_callback() {
			echo '<ul class="menu"><li><a href="' . get_bloginfo( 'url' ) . '/wp-admin/nav-menus.php"><span>' . __( 'Please create a menu in WordPress admin and assign it to the Main Navigation menu area.', WM_THEME_TEXTDOMAIN ) . '</span></a></li></ul>';
		}
	} // /wm_menu_callback

	$contactButton = '';
	if ( ! wm_option( 'layout-menu-special' ) && is_active_sidebar( 'contact-section-widgets' ) ) {
		$contactButtonText = ( wm_option( 'layout-menu-special-title' ) ) ? ( wm_option( 'layout-menu-special-title' ) ) : ( __( 'Contact', WM_THEME_TEXTDOMAIN ) );
		$contactButton     = '<li class="right"><a href="#" id="contact-link"><span>' . $contactButtonText . '</span></a></li>';
	}

	//If no menu assigned, falls back to page list menu
	wp_nav_menu( array(
		'theme_location'  => 'main-navigation',
		'menu'            => null,
		'container'       => null,
		'container_class' => null,
		'container_id'    => null,
		'menu_class'      => 'menu',
		'menu_id'         => null,
		'echo'            => true,
		'fallback_cb'     => 'wm_menu_callback',
		'before'          => null,
		'after'           => null,
		'link_before'     => '<span>',
		'link_after'      => '</span>',
		'items_wrap'      => '<ul class="%2$s">%3$s' . $contactButton . '</ul>',
		'depth'           => 0,
		'walker'          => null
		) );
	//get_search_form();
	?>
</nav>