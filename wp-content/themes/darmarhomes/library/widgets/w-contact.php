<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Contact information widget
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
add_action( 'widgets_init', 'reg_wm_contact_info' );



/*
* Widget registration
*/
function reg_wm_contact_info() {
	register_widget( 'wm_contact_info' );
} // /reg_wm_contact_info





/*
*****************************************************
*      WIDGET CLASS
*****************************************************
*/
class wm_contact_info extends WP_Widget {
	/*
	*****************************************************
	*      widget constructor
	*****************************************************
	*/
	function __construct() {
		$id = 'wm-contact-info';
		$name = '<span>' . WM_THEME_NAME . ' ' . __( 'Contact', WM_THEME_TEXTDOMAIN_ADMIN ) . '</span>';
		$widget_ops = array(
			'classname'   => 'wm-contact-info',
			'description' => __( 'Displays a contact information', WM_THEME_TEXTDOMAIN_ADMIN )
			);
		$control_ops = array( 'width' => 360, 'height' => 200 );

		//$this->WP_Widget( $id, $name, $widget_ops, $control_ops );
		parent::__construct( $id, $name, $widget_ops, $control_ops );
	} // /__construct



	/*
	*****************************************************
	*      widget options form in admin
	*****************************************************
	*/
	function form( $instance ) {
		extract( $instance );
		$title    = ( isset( $title ) ) ? ( $title ) : ( null );
		$name     = ( isset( $name ) ) ? ( $name ) : ( null );
		$address  = ( isset( $address ) ) ? ( $address ) : ( null );
		$address2 = ( isset( $address2 ) ) ? ( $address2 ) : ( null );
		$city     = ( isset( $city ) ) ? ( $city ) : ( null );
		$code     = ( isset( $code ) ) ? ( $code ) : ( null );
		$country  = ( isset( $country ) ) ? ( $country ) : ( null );
		$phone    = ( isset( $phone ) ) ? ( $phone ) : ( null );
		$email    = ( isset( $email ) && is_email( $email ) ) ? ( $email ) : ( null );

		//HTML to display widget settings form
		?>
		<p class="wm-desc"><?php _e( 'Displays specially styled contact information. If the field is left empty, the information will not be displayed. JavaScript anti-spam protection will be applied on the email address (also, email will not be displayed when JavaScript is turned off).', WM_THEME_TEXTDOMAIN_ADMIN ) ?></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address line 1:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'address2' ); ?>"><?php _e( 'Address line 2:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'address2' ); ?>" name="<?php echo $this->get_field_name( 'address2' ); ?>" type="text" value="<?php echo esc_attr( $address2 ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'city' ); ?>"><?php _e( 'City:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'city' ); ?>" name="<?php echo $this->get_field_name( 'city' ); ?>" type="text" value="<?php echo esc_attr( $city ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'code' ); ?>"><?php _e( 'Postal code:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'code' ); ?>" name="<?php echo $this->get_field_name( 'code' ); ?>" type="text" value="<?php echo esc_attr( $code ); ?>" size="10" maxlength="10" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'country' ); ?>"><?php _e( 'Country:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'country' ); ?>" name="<?php echo $this->get_field_name( 'country' ); ?>" type="text" value="<?php echo esc_attr( $country ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone number:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email address (JavaScript anti-spam protection applied):', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
		</p>
		<?php
	} // /form



	/*
	*****************************************************
	*      process and save the widget options
	*****************************************************
	*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']    = strip_tags( $new_instance['title'] );
		$instance['name']     = strip_tags( $new_instance['name'] );
		$instance['address']  = strip_tags( $new_instance['address'] );
		$instance['address2'] = strip_tags( $new_instance['address2'] );
		$instance['city']     = strip_tags( $new_instance['city'] );
		$instance['code']     = strip_tags( $new_instance['code'] );
		$instance['country']  = strip_tags( $new_instance['country'] );
		$instance['phone']    = strip_tags( $new_instance['phone'] );
		$instance['email']    = ( is_email( $new_instance['email'] ) ) ? ( strip_tags( $new_instance['email'] ) ) : ( null );

		return $instance;
	} // /update



	/*
	*****************************************************
	*      output the widget content
	*****************************************************
	*/
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$out = $outAddress = '';

		//if the title is not filled, no title will be displayed
		if ( isset( $title ) && '' != $title && ' ' != $title )
			$out .= $before_title . apply_filters( 'widget_title', $title ) . $after_title;

		//HTML to display output
		if ( isset( $name ) && $name )
			$outAddress .= '<span class="contact-name">' . $name . '</span><br />';
		if ( isset( $address ) && $address )
			$outAddress .= '<span class="contact-address">' . $address . '</span><br />';
		if ( isset( $address2 ) && $address2 )
			$outAddress .= '<span class="contact-address2">' . $address2 . '</span><br />';
		if ( isset( $city ) && $city )
			$outAddress .= '<span class="contact-city">' . $city . '</span>&nbsp;';
		if ( isset( $code ) && $code )
			$outAddress .= '<span class="contact-code">' . $code . '</span>';
		if ( isset( $country ) && $country )
			$outAddress .= '<br /><span class="contact-country">' . $country . '</span><br />';
		if ( isset( $phone ) && $phone )
			$outAddress .= '<span class="contact-phone">' . $phone . '</span><br />';
		if ( isset( $email ) && is_email( $email ) )
			$outAddress .= '<span class="contact-email"><a href="#" data-address="' . wm_nospam( $email ) . '" class="email-nospam">' . wm_nospam( $email ) . '</a></span><br />';

		if ( $outAddress )
			$out .= '<address class="address-icons">' . $outAddress . '</address>';

		if ( $out )
			echo $before_widget . $out . $after_widget;
	} // /widget
} // /wm_contact_info

?>