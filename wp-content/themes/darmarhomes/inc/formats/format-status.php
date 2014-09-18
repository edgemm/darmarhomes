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
if ( get_the_content() )
	echo '<div class="article-content">' . get_the_content() . '</div>';
else
	echo '<div class="msg type-red icon-box icon-warning">' . __( 'Please place the status into the post content area', WM_THEME_TEXTDOMAIN ) . '</div>';
?>