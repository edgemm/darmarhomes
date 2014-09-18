<?php
if ( ! wm_option( 'blog-disable-featured-image' ) )
	wm_thumb( null, 'blog' );
?>

<?php
$positions = array(
	'formaticon',
	'date',
	'comments',
	'cats',
	'author'
	);

wm_meta( $positions );
?>

<div class="article-content">
	<?php
	if ( has_excerpt() && ! post_password_required() )
		echo '<div class="article-excerpt">' . get_the_excerpt() . '</div>';

	the_content();
	?>
</div>

<?php wm_meta( array( 'tags' ) ); ?>