<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Display a page
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
add_action( 'widgets_init', 'reg_wm_page_content' );



/*
* Widget registration
*/
function reg_wm_page_content() {
	register_widget( 'wm_page_content' );
} // /reg_wm_contact_info





/*
*****************************************************
*      WIDGET CLASS
*****************************************************
*/
class wm_page_content extends WP_Widget {
	/*
	*****************************************************
	*      widget constructor
	*****************************************************
	*/
	function __construct() {
		$id = 'wm-page-content';
		$name = '<span>' . WM_THEME_NAME . ' ' . __( 'Page', WM_THEME_TEXTDOMAIN_ADMIN ) . '</span>';;
		$widget_ops = array(
			'classname'   => 'wm-page-content',
			'description' => __( 'Displays content of the specific Page', WM_THEME_TEXTDOMAIN_ADMIN )
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
		$title    = ( isset( $title ) ) ? ( $title ) : ( null );
		$no_title = ( isset( $no_title ) ) ? ( $no_title ) : ( null );
		$moreURL  = ( isset( $moreURL ) ) ? ( $moreURL ) : ( null );
		$btnTitle = ( isset( $btnTitle ) ) ? ( $btnTitle ) : ( null );
		$no_thumb = ( isset( $no_thumb ) ) ? ( $no_thumb ) : ( null );
		$pageID   = ( isset( $pageID ) ) ? ( $pageID ) : ( null );

		//HTML to display widget settings form
		?>
		<p class="wm-desc"><?php _e( 'Displays content of the specific page. Please choose the page and set other options.', WM_THEME_TEXTDOMAIN_ADMIN ) ?></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label><br />
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'pageID' ); ?>"><?php _e( 'A page to display:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label><br />
			<select class="widefat" id="<?php echo $this->get_field_id( 'pageID' ); ?>" name="<?php echo $this->get_field_name( 'pageID' ); ?>">
				<option value="" <?php selected( $pageID, '' ); ?>><?php _e( '- Select page -', WM_THEME_TEXTDOMAIN_ADMIN ); ?></option>
				<?php
				$pages = get_pages( 'hierarchical=0' );
				foreach ( $pages as $page ) {
					?>
					<option<?php echo ' value="'. $page->ID . '" '; selected( $pageID, $page->ID ); ?>><?php echo $page->post_title; ?></option>
					<?php
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'moreURL' ); ?>"><?php _e( 'Custom URL:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label><br />
			<input class="widefat" id="<?php echo $this->get_field_id( 'moreURL' ); ?>" name="<?php echo $this->get_field_name( 'moreURL' ); ?>" type="text" value="<?php echo esc_URL( $moreURL ); ?>" />
			<small><?php _e( 'This will apply link on image, title and button', WM_THEME_TEXTDOMAIN_ADMIN ) ?></small>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'btnTitle' ); ?>"><?php _e( 'Button title:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label><br />
			<input class="widefat" id="<?php echo $this->get_field_id( 'btnTitle' ); ?>" name="<?php echo $this->get_field_name( 'btnTitle' ); ?>" type="text" value="<?php echo strip_tags( $btnTitle ); ?>" />
			<small><?php _e( 'Leave empty to hide the button', WM_THEME_TEXTDOMAIN_ADMIN ) ?></small>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'no_title' ); ?>" name="<?php echo $this->get_field_name( 'no_title' ); ?>" type="checkbox" <?php checked( $no_title, 'on' ); ?>/>
			<label for="<?php echo $this->get_field_id( 'no_title' ); ?>"><?php _e( 'Disable page title', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'no_thumb' ); ?>" name="<?php echo $this->get_field_name( 'no_thumb' ); ?>" type="checkbox" <?php checked( $no_thumb, 'on' ); ?>/>
			<label for="<?php echo $this->get_field_id( 'no_thumb' ); ?>"><?php _e( 'Disable featured image', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label>
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

		$instance['title']     = strip_tags( $new_instance['title'] );
		$instance['pageID']    = absint( $new_instance['pageID'] );
		$instance['no_title'] = $new_instance['no_title'];
		$instance['moreURL']   = esc_URL( $new_instance['moreURL'] );
		$instance['btnTitle']  = strip_tags( $new_instance['btnTitle'] );
		$instance['no_thumb']     = $new_instance['no_thumb'];

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

		$no_title = ( isset( $no_title ) ) ? ( $no_title ) : ( null );
		$theURL   = ( isset( $moreURL ) && $moreURL ) ? ( esc_url( $moreURL ) ) : ( null );
		$btnTitle = ( isset( $btnTitle ) ) ? ( $btnTitle ) : ( null );
		$no_thumb = ( isset( $no_thumb ) ) ? ( $no_thumb ) : ( null );
		$pageID   = ( isset( $pageID ) ) ? ( $pageID ) : ( null );

		echo $before_widget;

		//if the title is not filled, no title will be displayed
		if ( isset( $title ) && '' != $title && ' ' != $title )
			echo $before_title . apply_filters( 'widget_title', $title ) . $after_title;

		//get the page content
		wp_reset_query();
		$the_page_content = new WP_Query( array(
			'page_id' => ( isset( $pageID ) && $pageID ) ? ( absint( $pageID ) ) : ( null )
			) );
		if ( $the_page_content->have_posts() && isset( $pageID ) && $pageID ) {
			$the_page_content->the_post();

			//HTML to display output
			$classWrapper  = ( $no_thumb ) ? ( ' no-thumb' ) : ( '' );
			$classWrapper .= ( ! $theURL ) ? ( ' no-link' ) : ( '' );
			$classWrapper .= ( $no_title ) ? ( ' no-title' ) : ( '' );
			$classWrapper .= ( ! $btnTitle ) ? ( ' no-btn' ) : ( '' );

			echo '<div class="content' . $classWrapper . '">';

				if ( has_post_thumbnail() && ! $no_thumb ) {
					?>
					<div class="image-container">
						<?php
						$fullImg = get_the_post_thumbnail( $pageID, 'blog' );
						echo preg_replace( '/(width|height)=\"\d*\"\s/', "", $fullImg );
						?>
					</div>

					<?php
				}

				if ( ! isset( $no_title ) ) {
					$pageTitle = '<h2>';
					$pageTitle .= ( $theURL ) ? ( '<a href="' . $theURL . '">' ) : ( '' );
					$pageTitle .= get_the_title();
					$pageTitle .= ( $theURL ) ? ( '</a>' ) : ( '' );
					$pageTitle .= '</h2>';
					echo $pageTitle;
				}

				echo '<div class="page-content article-content">' . apply_filters( 'the_content', get_the_content() ) . '</div>';

				if ( $theURL && $btnTitle )
					echo '<a href="' . $theURL . '" class="btn btn-more">' . $btnTitle . '</a>';

			echo '</div>';
		} else {
			echo '<p class="warning">' . __( 'No content found.', WM_THEME_TEXTDOMAIN ) . '</p>';
		}
		wp_reset_query();

		echo $after_widget;
	} // /widget
} // /wm_page_content

?>