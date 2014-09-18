<?php
$positions = array(
	'formaticon',
	'date',
	'cats',
	'author'
	);

wm_meta( $positions );
?>

<div class="format-status">
<div class="article-content">
	<br />
	<?php the_content(); ?>
	<br />
</div>
</div>

<?php wm_meta( array( 'tags' ) ); ?>