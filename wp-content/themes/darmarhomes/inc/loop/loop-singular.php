<?php if ( have_posts() ) : the_post(); ?>

<?php wm_before_post(); ?>

<?php wm_start_post(); ?>

<?php
if ( is_page() ) {

	if ( get_the_content() )
		echo '<div class="article-content">' . apply_filters( 'the_content', get_the_content() ) . '</div>';

} else {

	$format = ( get_post_format() ) ? ( get_post_format() ) : ( 'standard' );
	get_template_part( 'inc/formats-single/format', $format );

}
?>

<?php wm_end_post(); ?>

<?php wp_reset_query(); wm_after_post(); endif; ?>

<?php comments_template( null, true ); ?>