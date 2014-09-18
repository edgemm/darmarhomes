<?php get_header(); ?>
<div class="wrap-inner">

<article class="main full-width article-content">
	<?php //wm_start_main_content(); ?>

	<?php get_template_part( 'inc/loop/loop', 'portfolio-single' ); ?>

</article> <!-- /main -->

</div> <!-- /wrap-inner -->

<?php
//wm_sidebar($defaultSidebar, $class, $restrictCount, $overrideSidebar)
wm_sidebar( 'portfolio-detail', 'columns section full-width', 5, null, 'print', 'wrap-it' ); //restricted to 5 widgets, no override allowed, has outer wrapper
?>

<?php
//Related portfolio posts
if ( ! wm_option( 'layout-related-portfolio' ) ) {

$cats    = array();
$count   = 4;
$sorting = 'rand';
$terms   = get_the_terms( $post->ID , 'wm-tax-cats-portfolio' );

if ( ! is_wp_error( $terms ) && $terms ) {
	foreach( $terms as $term ) {
		$cats[] = $term->term_id;
	}
}

wp_reset_query();
$related = new WP_Query( array(
	'post_type'      => 'wm_portfolio',
	'posts_per_page' => $count,
	'orderby'        => $sorting,
	'post__not_in'   => array( get_the_ID() ),
	'tax_query' => array( array(
			'taxonomy' => 'wm-tax-cats-portfolio',
			'field'    => 'id',
			'terms'    => $cats
		) )
	) );

if ( $related->have_posts() ) :
//HTML to display output
?>
<div class="portfolio-content section"><div class="wrap-inner">
	<h3 class="section-heading"><?php _e( 'Related items', WM_THEME_TEXTDOMAIN ); ?></h3>
	<ul>
	<?php while ( $related->have_posts() ) : $related->the_post();	?>
		<li>
			<?php
			$postThumbId = get_post_thumbnail_id();
			if ( $postThumbId ) {
				$image = ( wm_meta_option( 'portfolio-list-image' ) ) ? ( array( wm_meta_option( 'portfolio-list-image' ) ) ) : ( wp_get_attachment_image_src( $postThumbId, 'portfolio' ) );
				echo '<img src="' . $image[0] . '" alt="' . get_the_title() . '" />';
			}
			?>
			<div class="desc"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div> <!-- /desc -->
		</li>
	<?php endwhile; ?>
	</ul>
<!-- /portfolio-content --></div></div>
<?php
endif;

wp_reset_query();

} //related portfolio items enabled
?>

<?php get_footer(); ?>