<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Display a Content Module custom post
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
add_action( 'widgets_init', 'reg_wm_cpmodules_content' );



/*
* Widget registration
*/
function reg_wm_cpmodules_content() {
	register_widget( 'wm_cpmodules_content' );
} // /reg_wm_cpmodules_content





/*
*****************************************************
*      WIDGET CLASS
*****************************************************
*/
class wm_cpmodules_content extends WP_Widget {
	/*
	*****************************************************
	*      widget constructor
	*****************************************************
	*/
	function __construct() {
		$id         = 'wm-content-module';
		$name       = '<span>' . WM_THEME_NAME . ' ' . __( 'Content Module', WM_THEME_TEXTDOMAIN_ADMIN ) . '</span>';
		$widget_ops = array(
			'classname'   => 'wm-content-module',
			'description' => __( 'Displays content of the specific Content Module post', WM_THEME_TEXTDOMAIN_ADMIN )
			);
		$control_ops = array();

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
		$title       = ( isset( $title ) ) ? ( $title ) : ( null );
		$moduleTitle = ( isset( $moduleTitle ) ) ? ( $moduleTitle ) : ( null );
		$btnTitle    = ( isset( $btnTitle ) ) ? ( $btnTitle ) : ( null );
		$useLink     = ( isset( $useLink ) ) ? ( $useLink ) : ( null );
		$thumb       = ( isset( $thumb ) ) ? ( $thumb ) : ( null );
		$layout      = ( isset( $layout ) ) ? ( $layout ) : ( null );
		$moduleID    = ( isset( $moduleID ) ) ? ( $moduleID ) : ( null );

		//HTML to display widget settings form
		?>
		<p class="wm-desc"><?php _e( 'Displays content of the specific Content Module custom post. Please choose the Content Module and set other options.', WM_THEME_TEXTDOMAIN_ADMIN ) ?></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label><br />
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<?php
			$contentModules = new WP_Query( array(
				'post_type'      => 'wm_modules',
				'order'          => 'ASC',
				'orderby'        => 'title',
				'posts_per_page' => -1
				) );
			if ( $contentModules->have_posts() ) {
				?>
				<label for="<?php echo $this->get_field_id( 'moduleID' ); ?>"><?php _e( 'Content Module to display:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label><br />
				<select class="widefat" id="<?php echo $this->get_field_id( 'moduleID' ); ?>" name="<?php echo $this->get_field_name( 'moduleID' ); ?>">
					<option value="" <?php selected( $moduleID, '' ); ?>><?php _e( '- Select Content Module -', WM_THEME_TEXTDOMAIN_ADMIN ); ?></option>
				<?php
				while ( $contentModules->have_posts() ) {
				$contentModules->the_post();
				$infomoduleID = get_the_ID();
				?>
					<option<?php echo ' value="'. $infomoduleID . '" '; selected( $moduleID, $infomoduleID ); ?>><?php the_title(); ?></option>
				<?php } ?>
				</select>
				<?php
			} else {
				_e( 'There are no Content Modules to choose from. Please add a new Content Module first.', WM_THEME_TEXTDOMAIN_ADMIN );
			};
			?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'btnTitle' ); ?>"><?php _e( 'Button title:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label><br />
			<input class="widefat" id="<?php echo $this->get_field_id( 'btnTitle' ); ?>" name="<?php echo $this->get_field_name( 'btnTitle' ); ?>" type="text" value="<?php echo strip_tags( $btnTitle ); ?>" />
			<small><?php _e( 'Leave empty to hide the button', WM_THEME_TEXTDOMAIN_ADMIN ) ?></small>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'useLink' ); ?>" name="<?php echo $this->get_field_name( 'useLink' ); ?>" type="checkbox" <?php checked( $useLink, 'on' ); ?>/>
			<label for="<?php echo $this->get_field_id( 'useLink' ); ?>"><?php _e( 'Disable Content Module custom link', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'moduleTitle' ); ?>" name="<?php echo $this->get_field_name( 'moduleTitle' ); ?>" type="checkbox" <?php checked( $moduleTitle, 'on' ); ?>/>
			<label for="<?php echo $this->get_field_id( 'moduleTitle' ); ?>"><?php _e( 'Disable Content Module title', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'thumb' ); ?>" name="<?php echo $this->get_field_name( 'thumb' ); ?>" type="checkbox" <?php checked( $thumb, 'on' ); ?>/>
			<label for="<?php echo $this->get_field_id( 'thumb' ); ?>"><?php _e( 'Disable featured image', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'layout' ); ?>" value="center" name="<?php echo $this->get_field_name( 'layout' ); ?>" type="checkbox" <?php checked( $layout, 'center' ); ?>/>
			<label for="<?php echo $this->get_field_id( 'layout' ); ?>"><?php _e( 'Use centered text layout', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label>
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

		$instance['title']       = strip_tags( $new_instance['title'] );
		$instance['moduleID']    = absint( $new_instance['moduleID'] );
		$instance['moduleTitle'] = $new_instance['moduleTitle'];
		$instance['btnTitle']    = strip_tags( $new_instance['btnTitle'] );
		$instance['useLink']     = $new_instance['useLink'];
		$instance['thumb']       = $new_instance['thumb'];
		$instance['layout']      = $new_instance['layout'];

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

		echo $before_widget;

		//if the title is not filled, no title will be displayed
		if ( isset( $title ) && '' != $title && ' ' != $title )
			echo $before_title . apply_filters( 'widget_title', $title ) . $after_title;

		echo do_shortcode( '[content_module id="' . $moduleID . '" no_thumb="' . $thumb . '" no_link="' . $useLink . '" no_title="' . $moduleTitle . '" button_text="' . $btnTitle . '" layout="' . $layout . '" widget="0"]' );

		echo $after_widget;
	} // /widget
} // /wm_cpmodules_content

?>