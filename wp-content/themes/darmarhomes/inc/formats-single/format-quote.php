<?php
$positions = array(
	'formaticon',
	'date',
	'cats',
	'author'
	);

wm_meta( $positions );
?>

<div class="article-content">
	<?php
	if ( has_excerpt() ) {
		$excerpt = get_the_excerpt();
		$exc     = apply_filters( 'wptexturize', $excerpt );
		echo '<blockquote>' . $exc . '<div class="quote-source">' . get_the_content() . '</div></blockquote>';
	} else {
		echo '<div class="msg type-red icon-box icon-warning">' . __( 'Please place the quote text into the excerpt field', WM_THEME_TEXTDOMAIN ) . '</div>';
	}
	?>
</div>

<?php wm_meta( array( 'tags' ) ); ?>