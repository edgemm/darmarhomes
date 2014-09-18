<?php
wp_reset_query();

if ( is_home() ) {
	$articleCount = ( wm_option( 'blog-posts-count' ) ) ? ( wm_option( 'blog-posts-count' ) ) : ( '' );
	$catsAction   = ( wm_option( 'blog-cats-action' ) ) ? ( wm_option( 'blog-cats-action' ) ) : ( 'category__not_in' );
	$cats         = ( wm_option( 'blog-cats' ) ) ? ( array_filter( wm_option( 'blog-cats' ) ) ) : ( array() );
	if ( 0 < count( $cats ) ) {
		$cats = implode( ',', $cats ); /* rearange array keys */
		$cats = explode( ',', $cats ); /* rearange array keys */
	}

	$args = array(
		'posts_per_page' => $articleCount,
		'paged'          => $paged
		);
	if ( 0 < count( $cats ) )
		$args = $args + array( $catsAction => $cats );

	query_posts( $args );
}

if ( have_posts() ) {
?>
	<?php wm_before_list(); ?>

	<section class="list-articles">

		<?php
		$odd               = 'odd';
		$thumbPostFormats  = array( 'image', 'standard' );
		$noBodyPostFormats = array( 'link', 'status' );

		while ( have_posts() ) :
		the_post();

		$format  = ( get_post_format() ) ? ( get_post_format() ) : ( 'standard' );
		$sticky  = ( is_sticky() ) ? ( ' sticky-post' ) : ( '' );
		$classes = ( $format || $odd || $sticky ) ? ( ' class="' . $odd . $sticky . ' format-' . $format . '"' ) : ( '' );
		?>
		<article<?php echo $classes; ?>>

		<?php
		get_template_part( 'inc/formats/format', $format );
		?>

		</article>
		<?php
		if ( 'odd' == $odd )
			$odd = '';
		else
			$odd = 'odd';

		endwhile;
		?>

	</section> <!-- /list-articles -->

	<?php wm_after_list(); ?>

<?php
} else {
	wm_not_found();
}
wp_reset_query();
?>