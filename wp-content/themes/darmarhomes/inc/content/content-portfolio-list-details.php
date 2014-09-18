<div class="column col-34">
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
</div>

<div class="column col-14 last">
	<?php
	$out      = '';
	$clientId = wm_meta_option( 'portfolio-client' );

	$out .= '<h2 class="portfolio-list-heading mt0"><a href="' . $link . '">' . get_the_title() . '</a></h2>';

	$out .= get_the_content();

	echo $out;
	?>
</div>