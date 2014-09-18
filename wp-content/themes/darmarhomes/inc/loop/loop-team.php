<?php
$team = new WP_Query( array(
	'post_type'      => 'wm_team',
	'posts_per_page' => 100,
	'order'          => 'ASC'
	) );
if ( $team->have_posts() ) {

$i          = 0;
$last       = '';
$maxColumns = 4;
$count      = ( $maxColumns >= $team->post_count ) ? ( $team->post_count ) : ( $maxColumns );
?>
<div class="team<?php if ( 4 >= $count ) echo ' text-small'; ?>">
<div class="members-row">
<?php
while ( $team->have_posts() ) : $team->the_post();

if ( $last )
	echo '</div><div class="members-row">';

if ( ++$i % $count == 0 )
	$last = ' last';
else
	$last = '';
?>
	<div id="member-<?php the_ID(); ?>" class="member column col-1<?php echo $count . $last; ?> show-tooltip" title="<?php echo esc_attr( strip_tags( wm_meta_option( 'team-description' ) ) ); ?>">
		<?php
		if ( has_post_thumbnail() )
			wm_thumb( null, 'medium' );
		else
			echo '<div class="image-container"><img src="' . WM_ASSETS_THEME . 'img/sample-face.png" alt="" /></div>';
		?>

		<h4><?php the_title(); ?></h4>

		<?php
		$terms = get_the_terms( $post->ID , 'wm-tax-positions-team' );

		if ( $terms ) {
			$out = $separator = '';

			foreach ( $terms as $term ) {
				$out .= $separator . $term->name;
				$separator = ', ';
			}

			echo '<h6 class="position border-color">' . $out . '</h6>';
		}
		?>

		<?php
		//if ( get_the_content() )
		//	echo '<div class="description">' . apply_filters( 'the_content', get_the_content() ) . '</div>';
		?>

		<?php
		$out = '';

		if ( wm_meta_option( 'team-facebook' ) )
			$out .= '<a href="' . esc_url( wm_meta_option( 'team-facebook' ) ) . '" title="' . get_the_title() . __( ' on Facebook', WM_THEME_TEXTDOMAIN ) . '" class="facebook">Facebook</a>';
		if ( wm_meta_option( 'team-google' ) )
			$out .= '<a href="' . esc_url( wm_meta_option( 'team-google' ) ) . '" title="' . get_the_title() . __( ' on Google+', WM_THEME_TEXTDOMAIN ) . '" class="googleplus">Google+</a>';
		if ( wm_meta_option( 'team-twitter' ) )
			$out .= '<a href="' . esc_url( wm_meta_option( 'team-twitter' ) ) . '" title="' . get_the_title() . __( ' on Twitter', WM_THEME_TEXTDOMAIN ) . '" class="twitter">Twitter</a>';

		if ( $out )
			echo '<div class="social-small">' . $out . '</div>';
		?>
	</div>
<?php
endwhile;
?>
</div>
</div> <!-- /team -->
<?php
}
wp_reset_query();
?>