<?php
$postId        = get_option( 'page_for_posts' );
$sidebarLayout = ( wm_meta_option( 'layout', $postId ) ) ? ( wm_meta_option( 'layout', $postId ) ) : ( WM_SIDEBAR_DEFAULT );

if ( has_excerpt() ) {
	if ( has_post_thumbnail() ) {
		wm_thumb( null, 'portfolio-no-crop' );
	} else {
		$videoURL = esc_url( get_the_excerpt() );
		$width    = ( 'none' == $sidebarLayout ) ? ( 960 ) : ( 680 );
		//$height   = $width / 16 * 9;

		echo '<div class="video-container">' . apply_filters( 'the_content',  '[embed width="' . $width . '"]' . $videoURL . '[/embed]' ) . '</div>';
	}
} else {
	echo '<div class="msg type-red icon-box icon-warning">' . __( 'Please place the full YouTube or Vimeo video URL into the excerpt field', WM_THEME_TEXTDOMAIN ) . '</div>';
}
?>

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
	<?php the_content(); ?>
</div>