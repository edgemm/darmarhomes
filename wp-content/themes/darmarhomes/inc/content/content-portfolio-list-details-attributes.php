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

	$out .= '<div class="attributes">';

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

	$out .= '<p class="attribute-category"><strong class="attribute-heading">' . __( 'Category', WM_THEME_TEXTDOMAIN ) . ':</strong> ';
	$terms = get_the_terms( $post->ID , 'wm-tax-cats-portfolio' );
	if ( ! is_wp_error( $terms ) && $terms ) {
		$i = 0;
		foreach( $terms as $term ) {
			$separator = ( 0 === $i ) ? ( '' ) : ( ', ' );
			$out .= $separator . '<span>' . $term->name . '</span>';
			$i++;
		}
	}
	$out .= '</p>';

	$out .= '</div>';

	echo $out;
	?>
</div>