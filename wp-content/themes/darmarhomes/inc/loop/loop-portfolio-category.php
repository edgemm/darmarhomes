<?php if ( have_posts() ) {

$layout = ( wm_option( 'layout-portfolio' ) ) ? ( ' ' . wm_option( 'layout-portfolio' ) ) : ( null );
?>

	<?php wm_before_list(); ?>

	<div class="portfolio">
		<div class="portfolio-content<?php echo $layout; ?>">
			<ul>
				<?php while ( have_posts() ) : the_post(); ?>
				<li data-id="portfolio-<?php the_ID(); ?>" data-type="<?php echo wm_meta_option( 'portfolio-type' ); ?>" class="<?php
				$terms = get_the_terms( $post->ID , 'wm-tax-cats-portfolio' );
				if ( $terms && ! is_wp_error( $terms ) ) {
					foreach( $terms as $term ) {
						echo $term->slug . ' ';
					}
				}
				echo 'type-' . wm_meta_option( 'portfolio-type' );
				?> all">

					<?php
					if ( ' columns-1' === $layout )
						get_template_part( 'inc/content/content', 'portfolio-list-details' );
					else
						get_template_part( 'inc/content/content', 'portfolio-list' );
					?>

				</li>
				<?php endwhile; ?>
			</ul>
		</div> <!-- /portfolio-content -->
	</div> <!-- /portfolio -->

<?php
} else {
	wm_not_found();
}
wp_reset_query();
?>