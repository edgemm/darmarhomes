<?php if ( have_posts() ) : the_post(); ?>

<?php wm_before_post(); ?>

<div class="article-content">
	<?php wm_start_post(); ?>

	<?php the_content(); ?>

	<div class="sitemap">
		<?php
		//wm_sidebar($defaultSidebar, $class, $restrictCount, $overrideSidebar)
		wm_sidebar( 'sitemap', 'widgets columns', 3 ); //restricted to 3 widgets, no override allowed
		?>

		<div class="sitemap-item inline-item categories column col-14 text-center">
			<h5><?php _e( 'Portfolio categories', WM_THEME_TEXTDOMAIN ); ?></h5>
			<ul class="list-inline no-bullets">
			<?php wp_list_categories( array(
				'orderby'      => 'name',
				'hierarchical' => false,
				'show_count'   => true,
				'title_li'     => null,
				'taxonomy'     => 'wm-tax-cats-portfolio'
				) ); ?>
			</ul>
		</div>

		<div class="sitemap-item inline-item categories column col-14 text-center">
			<h5><?php _e( 'Blog categories', WM_THEME_TEXTDOMAIN ); ?></h5>
			<ul class="list-inline no-bullets">
			<?php wp_list_categories( array(
				'orderby'      => 'name',
				'hierarchical' => false,
				'show_count'   => true,
				'title_li'     => null
				) ); ?>
			</ul>
		</div>

		<div class="sitemap-item inline-item tags column col-14 text-center">
			<h5><?php _e( 'Tag archives', WM_THEME_TEXTDOMAIN ); ?></h5>
			<?php wp_tag_cloud( 'separator= ' ); ?>
		</div>

		<div class="sitemap-item inline-item archives column col-14 last text-center">
			<h5><?php _e( 'Monthly archives', WM_THEME_TEXTDOMAIN ); ?></h5>
			<ul class="list-inline no-bullets">
			<?php wp_get_archives( 'type=monthly&show_post_count=1' ); ?>
			</ul>
		</div>

	</div> <!-- /sitemap -->

	<?php wm_end_post(); ?>
</div>

<?php wp_reset_query(); wm_after_post(); endif; ?>