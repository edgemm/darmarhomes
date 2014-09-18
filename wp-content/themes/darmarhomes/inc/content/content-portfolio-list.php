<?php
$out  = '';
$link = ( wm_meta_option( 'portfolio-link-list' ) ) ? ( esc_url( wm_meta_option( 'portfolio-link' ) ) ) : ( get_permalink() );

$postThumbId = get_post_thumbnail_id();
if ( $postThumbId ) {
	$image = ( wm_meta_option( 'portfolio-list-image' ) ) ? ( array( wm_meta_option( 'portfolio-list-image' ) ) ) : ( wp_get_attachment_image_src( $postThumbId, 'portfolio' ) );
	$out .= '<a href="' . $link . '">';
	$out .= '<img src="' . $image[0] . '" alt="' . get_the_title() . '" />';
	$out .= '</a>';
}

echo $out;
?>
<div class="desc">
	<?php
	$out = '';

	$out .= '<a href="' . $link . '">';

	$out .= get_the_title();

	$terms = get_the_terms( $post->ID , 'wm-tax-cats-portfolio' );
	if ( ! is_wp_error( $terms ) && $terms ) {
		foreach( $terms as $term ) {
			$out .= '<span class="category">' . $term->name . '</span>';
		}
	}

	$out .= '</a>';

	echo $out;
	?>
</div> <!-- /desc -->