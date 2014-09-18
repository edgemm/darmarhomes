<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Sub navigation
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
add_action( 'widgets_init', 'reg_wm_subpages' );



/*
* Widget registration
*/
function reg_wm_subpages() {
	register_widget( 'wm_subpages' );
} // /reg_wm_contact_info





/*
*****************************************************
*      WIDGET CLASS
*****************************************************
*/
class wm_subpages extends WP_Widget {
	/*
	*****************************************************
	*      widget constructor
	*****************************************************
	*/
	function __construct() {
		$id = 'wm-sub-pages';
		$name = '<span>' . WM_THEME_NAME . ' ' . __( 'Submenu', WM_THEME_TEXTDOMAIN_ADMIN ) . '</span>';;
		$widget_ops = array(
			'classname'   => 'wm-sub-pages',
			'description' => __( 'Displays a list of subpages (submenu)', WM_THEME_TEXTDOMAIN_ADMIN )
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
		$title = ( isset( $title ) ) ? ( $title ) : ( null );

		//HTML to display widget settings form
		?>
		<p class="wm-desc"><?php _e( 'Displays a hierarchical list of subpages and siblings pages for the current page (page submenu).', WM_THEME_TEXTDOMAIN_ADMIN ) ?></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
			<small><?php _e( 'If you leave blank, the main parent page title will be displayed.', WM_THEME_TEXTDOMAIN_ADMIN ) ?></small>
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

		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	} // /update



	/*
	*****************************************************
	*      output the widget content
	*****************************************************
	*/
	function widget( $args, $instance ) {
		global $post, $page_exclusions;
		extract( $args );
		extract( $instance );

		$post        = ( is_home() ) ? ( get_post( get_option( 'page_for_posts' ) ) ) : ( $post );
		$parents     = ( isset( $post->ancestors ) ) ? ( $post->ancestors ) : ( null ); //get all parent pages in array
		$grandparent = ( ! empty( $parents ) ) ? ( end( $parents ) ) : ( '' ); //get the first parent page (at the end of the array)
		$titleAlt    = ( $grandparent ) ? ( get_the_title( $grandparent ) ) : ( get_the_title( $post->ID ) );

		//subpages or siblings
		if ( $grandparent )
			$children = wp_list_pages( 'sort_column=menu_order&exclude=' . $page_exclusions . '&title_li=&child_of=' . $grandparent . '&echo=0&depth=3' );
		else
			$children = wp_list_pages( 'sort_column=menu_order&exclude=' . $page_exclusions . '&title_li=&child_of=' . $post->ID . '&echo=0&depth=3' );

		//no need to display on archive pages, single post page and when there area no subpages
		if ( is_search() || is_404() || is_archive() || is_single() || ! $children )
			return;

		echo $before_widget;

		//if the title is not filled, no title will be displayed
		if ( isset( $title ) && '' != $title && ' ' != $title )
			echo $before_title . apply_filters( 'widget_title', $title ) . $after_title;
		elseif ( $titleAlt )
			echo $before_title . $titleAlt . $after_title;

		echo '<ul class="sub-nav">' . $children . '</ul> <!-- /sub-nav -->';

		echo $after_widget;
	} // /widget
} // /wm_subpages

?>