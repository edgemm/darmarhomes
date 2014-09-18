<?php if ( have_posts() ) : the_post(); ?>
<div class="article-content">

	<div class="column col-13">
		<?php
		$out      = '';
		$name     = wm_meta_option( 'contact-name' );
		$address  = wm_meta_option( 'contact-address1' );
		$address2 = wm_meta_option( 'contact-address2' );
		$city     = wm_meta_option( 'contact-city' );
		$code     = wm_meta_option( 'contact-code' );
		$country  = wm_meta_option( 'contact-country' );
		$email    = wm_meta_option( 'contact-email' );
		$phone    = wm_meta_option( 'contact-phone' );
		$phone    = str_replace( array( "\r\n", "\r", "\n" ), '<br />', $phone );
		$fax      = wm_meta_option( 'contact-fax' );
		$fax      = str_replace( array( "\r\n", "\r", "\n" ), '<br />', $fax );

		//HTML to display output
		if ( isset( $name ) && $name )
			$out .= '<span class="contact-name">' . $name . '</span><br />';
		if ( isset( $address ) && $address )
			$out .= '<span class="contact-address">' . $address . '</span><br />';
		if ( isset( $address2 ) && $address2 )
			$out .= '<span class="contact-address2">' . $address2 . '</span><br />';
		if ( isset( $city ) && $city )
			$out .= '<span class="contact-city">' . $city . '</span>&nbsp;';
		if ( isset( $code ) && $code )
			$out .= '<span class="contact-code">' . $code . '</span>';
		if ( isset( $country ) && $country )
			$out .= '<br /><span class="contact-country">' . $country . '</span><br />';
		if ( isset( $phone ) && $phone )
			$out .= '<span class="contact-phone">' . $phone . '</span>';
		if ( isset( $email ) && is_email( $email ) )
			$out .= '<span class="contact-email"><a href="#" data-address="' . wm_nospam( $email ) . '" class="email-nospam">' . wm_nospam( $email ) . '</a></span><br />';

		if ( $out )
			echo '<address class="address-icons">' . $out . '</address>';
		?>
	</div>

	<div class="column col-23 last">
		<?php the_content(); ?>
	</div>

</div>
<?php wp_reset_query(); endif; ?>