<?php
$positions = array(
	'formaticon',
	'date-special',
	'cats',
	'author'
	);

wm_meta( $positions );
?>

<?php
$link = ( has_excerpt() ) ? ( esc_url( get_the_excerpt() ) ) : ( '#' );
?>
<header class="post-title">
	<h2>
		<small><?php _e( 'Link:', WM_THEME_TEXTDOMAIN ); ?></small> <a href="<?php echo $link; ?>"><?php the_title(); ?></a>
	</h2>
</header>

<div class="article-content">
	<?php
	if ( ! has_excerpt() )
		echo '<div class="msg type-red icon-box icon-warning">' . __( 'Please place the URL address into the excerpt field', WM_THEME_TEXTDOMAIN ) . '</div>';

	the_content();
	?>
</div>