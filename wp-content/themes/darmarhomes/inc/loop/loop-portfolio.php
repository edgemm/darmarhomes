<?php
if ( have_posts() ) {
	the_post();

	$layoutDefault = ( wm_option( 'layout-portfolio' ) ) ? ( ' ' . wm_option( 'layout-portfolio' ) ) : ( null );
	$descContent   = ( wm_option( 'layout-portfolio-description-content' ) ) ? ( '-' . wm_option( 'layout-portfolio-description-content' ) ) : ( null );
	$layout        = ( wm_meta_option( 'portfolio-layout', $post->ID ) ) ? ( ' ' . wm_meta_option( 'portfolio-layout', $post->ID ) ) : ( $layoutDefault );
	$itemsCount    = ( wm_meta_option( 'portfolio-filterable' ) ) ? ( -1 ) : ( wm_meta_option( 'portfolio-count' ) );

	if ( get_the_content() )
		the_content();

	wp_reset_query();
}

$hideFilterClass = ( wm_meta_option( 'portfolio-no-catlist' ) && ! wm_meta_option( 'portfolio-filterable' ) ) ? ( ' hide' ) : ( null );
$noPagination    = wm_meta_option( 'portfolio-no-pagination' );
$showFilterCats  = ( wm_meta_option( 'portfolio-show-filter' ) ) ? ( null ) : ( ' hide-filter-cats' );
?>

<div class="portfolio"<?php if ( wm_meta_option( 'portfolio-filterable' ) ) echo ' id="portfolio-filterable"'; ?>>

	<?php
	if ( wm_meta_option( 'portfolio-title' ) || ! $hideFilterClass ) echo '<nav class="portfolio-nav' . $showFilterCats . '">';

		if ( wm_meta_option( 'portfolio-title' ) ) echo '<h3 class="section-heading">' . wm_meta_option( 'portfolio-title' ) . '</h3>';

		echo '<ul class="filter' . $hideFilterClass . '">';

			//"All" terms
			if ( wm_meta_option( 'portfolio-cat' ) && wm_meta_option( 'portfolio-filterable' ) ) {
				$termID       = wm_meta_option( 'portfolio-cat' );
				$taxonomyName = 'wm-tax-cats-portfolio';
				$term = get_term( $termID, $taxonomyName );
				if ( $term )
					echo '<li class="active all"><a href="#" data-id="all">' . sprintf( __( 'All Projects', WM_THEME_TEXTDOMAIN ) , $term->name ) . '</a></li>';
			} elseif ( wm_meta_option( 'portfolio-filterable' ) ) {
				echo '<li class="active all"><a href="#" data-id="all">' . __( 'All Projects', WM_THEME_TEXTDOMAIN ) . '</a></li>';
			}

			//The actual terms and their direct subterms
			if ( wm_meta_option( 'portfolio-cat' ) ) {
				$termID       = wm_meta_option( 'portfolio-cat' );
				$taxonomyName = 'wm-tax-cats-portfolio';
				$termchildren = get_term_children( $termID, $taxonomyName );
				$count        = count( $termchildren );
				if ( ! is_wp_error( $termchildren ) && $count > 0 ) {
					$outFilter = array();
					foreach ( $termchildren as $child ) {
						$term = get_term_by( 'id', $child, $taxonomyName );
						$outFilter['<li><a href="' . get_term_link( $term->slug, 'wm-tax-cats-portfolio' ) . '" data-id="' . $term->slug . '">' . $term->name . '</a></li>'] = $term->name;
					}
					asort( $outFilter );
					$outFilter = array_flip( $outFilter );
					echo implode( ' ', $outFilter );
				}
			} else {
				$terms = get_terms( 'wm-tax-cats-portfolio' );
				$count = count( $terms );
				if ( ! is_wp_error( $terms ) && $count > 0 ) {
					foreach ( $terms as $term ) {
						echo '<li><a href="' . get_term_link( $term->slug, 'wm-tax-cats-portfolio' ) . '" data-id="' . $term->slug . '">' . $term->name . '</a></li>';
					}
				}
			}

		echo '</ul>';

	if ( wm_meta_option( 'portfolio-title' ) || ! $hideFilterClass ) echo '</nav>';



	//set taxonomy
	if ( wm_meta_option( 'portfolio-cat' ) ) {
		$portfolioCat = array( array(
			'taxonomy'         => 'wm-tax-cats-portfolio',
			'field'            => 'id',
			'include_children' => true,
			'terms'            => wm_meta_option( 'portfolio-cat' )
			) );
	} else {
		$portfolioCat = array();
	}

	//set ordering
	if ( 'oldest' === wm_meta_option( 'portfolio-ordering' ) ) {
		$order   = 'ASC';
		$orderBy = 'date';
	} elseif ( 'name' === wm_meta_option( 'portfolio-ordering' ) ) {
		$order   = 'ASC';
		$orderBy = 'name';
	} elseif ( 'random' === wm_meta_option( 'portfolio-ordering' ) ) {
		$order   = '';
		$orderBy = 'rand';
	} else {
		$order   = 'DESC';
		$orderBy = 'date';
	}

	//set query
	$portfolio = new WP_Query( array(
		'post_type'      => 'wm_portfolio',
		'posts_per_page' => $itemsCount,
		'paged'          => ( isset( $page ) ) ? ( $page ) : ( $paged ),
		'tax_query'      => $portfolioCat,
		'orderby'        => $orderBy,
		'order'          => $order
		) );
	if ( $portfolio->have_posts() ) {
	?>
	<div class="portfolio-content<?php echo $layout; ?>">
		<ul>
			<?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>
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
					get_template_part( 'inc/content/content', 'portfolio-list-details' . $descContent );
				else
					get_template_part( 'inc/content/content', 'portfolio-list' );
				?>

			</li>
			<?php endwhile; ?>
		</ul>
	</div> <!-- /portfolio-content -->

	<?php
	if ( ! $noPagination )
		wm_pagination( null, $portfolio );
	}
	wp_reset_query();
	?>

</div>

<?php wm_after_list(); ?>
