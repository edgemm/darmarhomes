<?php get_header(); ?>
<div class="wrap-inner">

<section class="main">

	<?php
	wm_start_main_content();

	$catDesc = category_description();
	if ( ! empty( $catDesc ) )
		echo '<div class="cat-desc">' . apply_filters( 'the_content', category_description() ) . '</div>';

	if ( is_author() )
		wm_author_info();
	?>

	<?php get_template_part( 'inc/loop/loop', 'index' ); ?>

</section> <!-- /main -->

<?php wm_sidebar(); ?>

</div> <!-- /wrap-inner -->
<?php get_footer(); ?>