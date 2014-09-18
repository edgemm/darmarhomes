<?php if ( have_posts() ) : the_post();

$portfolioLayout = array();





//Portfolio description
$out      = '';
$clientId = wm_meta_option( 'portfolio-client' );

if ( 0 < $clientId ) {
	$link  = ( wm_meta_option( 'client-link', $clientId ) ) ? ( esc_url( wm_meta_option( 'client-link', $clientId ) ) ) : ( '' );
	$title = ( $link ) ? ( '<a href="' . $link . '">' . get_the_title( $clientId ) . '</a>' ) : ( get_the_title( $clientId ) );
	$out  .= '<p class="attribute-client"><strong class="attribute-heading">' . __( 'Client', WM_THEME_TEXTDOMAIN ) . ':</strong> ';
	$out  .= $title . '</p>';
}

if ( wm_meta_option( 'portfolio-link' ) ) {
	$out .= '<p class="attribute-link"><strong class="attribute-heading">' . __( 'Project URL', WM_THEME_TEXTDOMAIN ) . ':</strong> ';
	$out .= '<a href="' . esc_url( wm_meta_option( 'portfolio-link' ) ) . '">' . wm_meta_option( 'portfolio-link' ) . '</a></p>';
}

if ( wm_meta_option( 'portfolio-attributes' ) ) {
	foreach ( wm_meta_option( 'portfolio-attributes' ) as $item ) {
		$out .= '<p><strong class="attribute-heading">' . $item['attr'] . ':</strong> ';
		$out .= $item['val'] . '</p>';
	}
}

$out = ( $out ) ? ( '<div class="attributes">' . $out . '</div>' ) : ( '' );

$portfolioLayout['description'] = $out . apply_filters( 'the_content', get_the_content() );





//Portfolio preview image/video
$out = '';

if ( 'image' === wm_meta_option( 'portfolio-type' ) ) {

	$postThumbId = get_post_thumbnail_id();
	if ( $postThumbId ) {
		$image = wp_get_attachment_image_src( $postThumbId, wm_option( 'general-lightbox-img' ) );
		$out  .= ( wm_meta_option( 'portfolio-no-zoom' ) ) ? ( null ) : ( '<a href="' . $image[0] . '" data-modal class="portfolio-preview">' );
		$out  .= preg_replace( '/(width|height)=\"\d*\"\s/', '', get_the_post_thumbnail( $post->ID, 'portfolio-no-crop' ) );
		$out  .= ( wm_meta_option( 'portfolio-no-zoom' ) ) ? ( null ) : ( '</a>' );
	}

} elseif ( 'slider' === wm_meta_option( 'portfolio-type' ) ) {

	$slides        = array();
	$slideDuration = ( wm_meta_option( 'portfolio-slider-duration' ) ) ? ( absint( wm_meta_option( 'portfolio-slider-duration' ) ) ) : ( 5000 );
	$imageSizes    = ( wm_meta_option( 'portfolio-slider-full-images' ) ) ? ( ' full-images dynamic-height' ) : ( ' slider-images' );

	$out .= '<div class="portfolio-slider' . $imageSizes . '" data-duration="' . $slideDuration . '">';

	if ( wm_meta_option( 'portfolio-slider-gallery-images' ) )
		$slides = wm_meta_option( 'portfolio-slider-gallery-images' );

	foreach ( $slides as $imageId) {
		$image     = wp_get_attachment_image_src( $imageId, wm_option( 'general-lightbox-img' ) );
		$imageType = ( ' slider-images' === $imageSizes ) ? ( 'portfolio' ) : ( 'portfolio-no-crop' );

		$out .= '<figure>';
		$out .= ( wm_meta_option( 'portfolio-no-zoom' ) ) ? ( null ) : ( '<a href="' . $image[0] . '" data-modal class="portfolio-preview">' );
		$out .= preg_replace( '/(width|height)=\"\d*\"\s/', '', wp_get_attachment_image( $imageId, $imageType ) );
		$out .= ( wm_meta_option( 'portfolio-no-zoom' ) ) ? ( null ) : ( '</a>' );
		$out .= '</figure>';
	}

	$out .= '</div> <!-- /portfolio-slider -->';

} elseif ( 'video' === wm_meta_option( 'portfolio-type' ) && wm_meta_option( 'portfolio-video' ) ) {

	$videoURL = wm_meta_option( 'portfolio-video' );
	$width    = 711;
	//$height   = $width / 16 * 9;

	$out .= '<div class="video-container">' . apply_filters( 'the_content',  '[embed width="' . $width . '"]' . $videoURL . '[/embed]' ) . '</div>';

}

if ( wm_meta_option( 'portfolio-enable-gallery' ) ) {
	$columns   = ( wm_meta_option( 'portfolio-gallery-columns' ) ) ? ( wm_meta_option( 'portfolio-gallery-columns' ) ) : ( 3 );
	$imageSize = ( wm_meta_option( 'portfolio-gallery-image' ) ) ? ( 'portfolio-no-crop' ) : ( 'blog' );

	$out .= do_shortcode( '[gallery columns="' . $columns . '" link="file" portfolio="true" size="' . $imageSize . '"]' );
}

$out .= '<footer class="meta-article">';
$out .= ( be_get_previous_post( true, '', 'wm-tax-cats-portfolio' ) ) ? ( '<span class="meta-item prev"><a href="' . get_permalink( be_get_previous_post( true, '', 'wm-tax-cats-portfolio' )->ID ) . '">&laquo; ' . get_the_title( be_get_previous_post( true, '', 'wm-tax-cats-portfolio' )->ID ) . '</a> ' . __( '(previous entry)', WM_THEME_TEXTDOMAIN ) . '</span>' ) : ( null );
$out .= ( be_get_next_post( true, '', 'wm-tax-cats-portfolio' ) ) ? ( '<span class="meta-item next">' . __( '(next entry)', WM_THEME_TEXTDOMAIN ) . ' <a href="' . get_permalink( be_get_next_post( true, '', 'wm-tax-cats-portfolio' )->ID ) . '">' . get_the_title( be_get_next_post( true, '', 'wm-tax-cats-portfolio' )->ID ) . ' &raquo;</a></span>' ) : ( null );
$out .= '</footer>';

$portfolioLayout['preview'] = $out;





//Output
if ( ! wm_option( 'contact-share-no-portfolio' ) )
	wm_sharing();

if ( 'right' === wm_option( 'layout-portfolio-single' ) )
	echo '<div class="column col-14">' . $portfolioLayout['description'] . '</div><div class="column col-34 last">' . $portfolioLayout['preview'] . '</div>';
else
	echo '<div class="column col-34">' . $portfolioLayout['preview'] . '</div><div class="column col-14 last">' . $portfolioLayout['description'] . '</div>';

?>

<?php wm_end_post(); ?>

<?php wp_reset_query(); endif; ?>