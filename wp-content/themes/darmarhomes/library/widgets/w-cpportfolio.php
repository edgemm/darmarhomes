<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* List portfolio items
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
add_action( 'widgets_init', 'reg_wm_portfolio_list' );



/*
* Widget registration
*/
function reg_wm_portfolio_list() {
	register_widget( 'wm_portfolio_list' );
} // /reg_wm_contact_info





/*
*****************************************************
*      WIDGET CLASS
*****************************************************
*/
class wm_portfolio_list extends WP_Widget {
	/*
	*****************************************************
	*      widget constructor
	*****************************************************
	*/
	function __construct() {
		$id = 'wm-portfolio-list';
		$name = '<span>' . WM_THEME_NAME . ' ' . __( 'Portfolio', WM_THEME_TEXTDOMAIN_ADMIN ) . '</span>';;
		$widget_ops = array(
			'classname'   => 'wm-portfolio-list',
			'description' => __( 'Displays a list of portfolio items', WM_THEME_TEXTDOMAIN_ADMIN )
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
		$title        = ( isset( $title ) ) ? ( $title ) : ( null );
		$titleSection = ( isset( $titleSection ) ) ? ( $titleSection ) : ( null );
		$type         = ( isset( $type ) ) ? ( $type ) : ( null );
		$layout       = ( isset( $layout ) ) ? ( $layout ) : ( null );
		$count        = ( isset( $count ) && 0 < absint( $count ) ) ? ( absint( $count ) ) : ( 5 );

		//HTML to display widget settings form
		?>
		<p class="wm-desc"><?php _e( 'Displays list of portfolio items from all categories. Please set the list type and number of items to display.', WM_THEME_TEXTDOMAIN_ADMIN ); ?></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label><br />
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'titleSection' ); ?>" name="<?php echo $this->get_field_name( 'titleSection' ); ?>" type="checkbox" <?php checked( $titleSection, 'on' ); ?>/>
			<label for="<?php echo $this->get_field_id( 'titleSection' ); ?>"><?php _e( 'Style title as section heading', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e( 'List type:', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label><br />
			<select class="widefat" name="<?php echo $this->get_field_name( 'type' ); ?>" id="<?php echo $this->get_field_id( 'type' ); ?>">
				<?php
				$options = array(
					'rand' => __( 'Random items', WM_THEME_TEXTDOMAIN_ADMIN ),
					'date' => __( 'Recent items', WM_THEME_TEXTDOMAIN_ADMIN )
					);
				foreach ( $options as $optId => $option ) {
					?>
					<option <?php echo 'value="'. $optId . '" '; selected( $type, $optId ); ?>><?php echo $option; ?></option>
					<?php
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Number of items to display:', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label><br />
			<input class="text-center" type="number" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $count; ?>" size="5" maxlength="2" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'layout' ); ?>"><?php _e( 'Horizontal layout:', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label><br />
			<select class="widefat" name="<?php echo $this->get_field_name( 'layout' ); ?>" id="<?php echo $this->get_field_id( 'layout' ); ?>">
				<?php
				$options = array(
					''          => __( '- theme default -', WM_THEME_TEXTDOMAIN_ADMIN ),
					'columns-1' => __( '1 column', WM_THEME_TEXTDOMAIN_ADMIN ),
					'columns-2' => __( '2 columns', WM_THEME_TEXTDOMAIN_ADMIN ),
					'columns-3' => __( '3 columns', WM_THEME_TEXTDOMAIN_ADMIN ),
					'columns-4' => __( '4 columns', WM_THEME_TEXTDOMAIN_ADMIN )
					);
				foreach ( $options as $optId => $option ) {
					?>
					<option <?php echo 'value="'. $optId . '" '; selected( $layout, $optId ); ?>><?php echo $option; ?></option>
					<?php
				}
				?>
			</select>
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

		$instance['title']        = strip_tags($new_instance['title']);
		$instance['titleSection'] = $new_instance['titleSection'];
		$instance['type']         = $new_instance['type'];
		$instance['layout']       = $new_instance['layout'];
		$count                    = ( 0 < absint( $new_instance['count'] ) ) ? ( absint( $new_instance['count'] ) ) : ( 5 );
		$instance['count']        = $count;

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

		$sorting = ( isset( $type ) ) ? ( $type ) : ( 'rand' );
		$count   = ( isset( $count ) && 0 < absint( $count ) ) ? ( absint( $count ) ) : ( 5 );
		$layout  = ( isset( $layout ) ) ? ( ' ' . $layout ) : ( ' ' . wm_option( 'layout-portfolio' ) );

		echo $before_widget;

		//if the title is not filled, no title will be displayed
		if ( isset( $title ) && '' != $title && ' ' != $title && ! isset( $titleSection ) )
			echo $before_title . apply_filters( 'widget_title', $title ) . $after_title;
		if ( isset( $title ) && '' != $title && ' ' != $title && isset( $titleSection ) && $titleSection )
			echo '<h3 class="section-heading">' . apply_filters( 'widget_title', $title ) . '</h3>';

		wp_reset_query();
		$the_portfolios = new WP_Query( array(
			'post_type'           => 'wm_portfolio',
			'posts_per_page'      => $count,
			'orderby'             => $sorting,
			'ignore_sticky_posts' => 1
			) );
		if ( $the_portfolios->have_posts() ) :
			//HTML to display output
			?>
			<div class="portfolio-content<?php echo $layout; ?>">
			<ul>
			<?php
			$i = 0;
			while ( $the_portfolios->have_posts() ) : $the_portfolios->the_post();
				++$i;
				if ( $i > $count )
					break;
				?>
				<li data-type="<?php echo wm_meta_option( 'portfolio-type' ); ?>" class="<?php echo 'type-' . wm_meta_option( 'portfolio-type' ); ?>" title="<?php the_title(); ?>">

					<?php
					$descContent = ( wm_option( 'layout-portfolio-description-content' ) ) ? ( '-' . wm_option( 'layout-portfolio-description-content' ) ) : ( null );
					if ( ' columns-1' === $layout )
						get_template_part( 'inc/content/content', 'portfolio-list-details' . $descContent );
					else
						get_template_part( 'inc/content/content', 'portfolio-list' );
					?>

				</li>
				<?php
			endwhile;
			?>
			</ul>
			</div>
		<?php
		else :
			echo '<p class="warning">' . __( 'No portfolio items found.', WM_THEME_TEXTDOMAIN ) . '</p>';
		endif;
		wp_reset_query();

		echo $after_widget;
	} // /widget
} // /wm_portfolio_list

?>