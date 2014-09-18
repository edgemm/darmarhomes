<?php wm_thumb( null, 'blog' ); ?>

<?php
$positions = array(
	'formaticon',
	'date-special',
	'comments',
	'cats',
	'author'
	);

wm_meta( $positions );
?>

<?php wm_heading( 'list' ); ?>

<div class="article-content">
	<?php
	if ( 'content' === wm_option( 'blog-content-type' ) )
		the_content( __( 'Read more...', WM_THEME_TEXTDOMAIN ) );
	else
		wm_excerpt( 'wm_excerpt_length_blog', 'wm_excerpt_more' );
	?>
</div>

<?php
if ( 'content' != wm_option( 'blog-content-type' ) )
	wm_more( 'print', 'nobtn' );
?>