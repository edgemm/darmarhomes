<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* List of posts
*****************************************************
*/

/*
*****************************************************
*      ACTIONS AND FILTERS
*****************************************************
*/
add_action( 'widgets_init', 'reg_wm_post_list' );



/*
* Widget registration
*/
function reg_wm_post_list() {
	register_widget( 'wm_post_list' );
} // /reg_wm_contact_info





/*
*****************************************************
*      WIDGET CLASS
*****************************************************
*/
class wm_post_list extends WP_Widget {
	/*
	*****************************************************
	*      widget constructor
	*****************************************************
	*/
	function __construct() {
		$id = 'wm-post-list';
		$name = '<span>' . WM_THEME_NAME . ' ' . __( 'Posts', WM_THEME_TEXTDOMAIN_ADMIN ) . '</span>';;
		$widget_ops = array(
			'classname'   => 'wm-post-list',
			'description' => __( 'Displays a list of recent, popular, random or upcoming posts with thumbnail images', WM_THEME_TEXTDOMAIN_ADMIN )
			);
		$control_ops = array( 'width' => 280 );

		//$this->WP_Widget( $id, $name, $widget_ops, $control_ops );
		parent::__construct( $id, $name, $widget_ops, $control_ops );
	} // /__construct



	/*
	*****************************************************
	*      widget options form in admin
	*****************************************************
	*/
	public function form( $instance ) {
		extract( $instance );
		$title         = ( isset( $title ) ) ? ( $title ) : ( null );
		$type          = ( isset( $type ) ) ? ( $type ) : ( null );
		$excerptLength = ( isset( $excerptLength ) ) ? ( absint( $excerptLength ) ) : ( null );
		$category      = ( isset( $category ) ) ? ( $category ) : ( null );
		$thumb         = ( isset( $thumb ) ) ? ( $thumb ) : ( null );
		$date          = ( isset( $date ) ) ? ( $date ) : ( null );
		$excerpt       = ( isset( $excerpt ) ) ? ( $excerpt ) : ( null );
		$more          = ( isset( $more ) ) ? ( $more ) : ( null );
		$count         = ( isset( $count ) && 0 < absint( $count ) ) ? ( absint( $count ) ) : ( 5 );
		$layout        = ( isset( $layout ) ) ? ( $layout ) : ( null );

		//HTML to display widget settings form
		?>
		<p class="wm-desc"><?php _e( 'Displays advanced posts list. You can set multiple post categories, just press [CTRL] key and click the category names. Note that only standard and gallery post formats will be displayed in the list.', WM_THEME_TEXTDOMAIN_ADMIN ) ?></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label><br />
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e( 'List type:', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label><br />
			<select class="widefat" name="<?php echo $this->get_field_name( 'type' ); ?>" id="<?php echo $this->get_field_id( 'type' ); ?>">
				<?php
				$options = array(
					'date'          => __( 'Recent posts', WM_THEME_TEXTDOMAIN_ADMIN ),
					'comment_count' => __( 'Popular posts', WM_THEME_TEXTDOMAIN_ADMIN ),
					'rand'          => __( 'Random posts', WM_THEME_TEXTDOMAIN_ADMIN ),
					'future'        => __( 'Upcoming posts', WM_THEME_TEXTDOMAIN_ADMIN )
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
			<label for="<?php echo $this->get_field_id( 'excerptLength' ); ?>"><?php _e( 'Excerpt length:', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label><br />
			<select class="widefat" name="<?php echo $this->get_field_name( 'excerptLength' ); ?>" id="<?php echo $this->get_field_id( 'excerptLength' ); ?>">
				<?php
				$options = array(
					'5'  => __( '5 words', WM_THEME_TEXTDOMAIN_ADMIN ),
					'10' => __( '10 words', WM_THEME_TEXTDOMAIN_ADMIN ),
					'15' => __( '15 words', WM_THEME_TEXTDOMAIN_ADMIN ),
					'20' => __( '20 words', WM_THEME_TEXTDOMAIN_ADMIN ),
					'25' => __( '25 words', WM_THEME_TEXTDOMAIN_ADMIN ),
					'30' => __( '30 words', WM_THEME_TEXTDOMAIN_ADMIN ),
					'35' => __( '35 words', WM_THEME_TEXTDOMAIN_ADMIN ),
					'40' => __( '40 words', WM_THEME_TEXTDOMAIN_ADMIN )
					);
				foreach ( $options as $optId => $option ) {
					?>
					<option <?php echo 'value="'. $optId . '" '; selected( $excerptLength, $optId ); ?>><?php echo $option; ?></option>
					<?php
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Posts source (category):', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label><br />
			<select class="widefat" name="<?php echo $this->get_field_name( 'category' ); ?>[]" id="<?php echo $this->get_field_id( 'category' ); ?>" multiple="multiple">
				<?php
				$options = wm_categories( 'no-empty' );
				foreach ( $options as $optId => $option ) {
					?>
					<option <?php echo 'value="'. $optId . '" ';
					if ( is_array( $category ) && in_array( $optId, $category ) )
						echo 'selected="selected"';
					else
						selected( $category, $optId );
					?>><?php echo $option; ?></option>
					<?php
				}
				?>
			</select>
			<small><?php _e( 'Hold down control key for multiselection', WM_THEME_TEXTDOMAIN_ADMIN ) ?></small>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Number of posts to display:', WM_THEME_TEXTDOMAIN_ADMIN ) ?></label><br />
			<input class="text-center" type="number" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $count; ?>" size="5" maxlength="2" />
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'thumb' ); ?>" name="<?php echo $this->get_field_name( 'thumb' ); ?>" type="checkbox" <?php checked( $thumb, 'on' ); ?>/>
			<label for="<?php echo $this->get_field_id( 'thumb' ); ?>"><?php _e( 'Disable thumbnail image', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'date' ); ?>" name="<?php echo $this->get_field_name( 'date' ); ?>" type="checkbox" <?php checked( $date, 'on' ); ?>/>
			<label for="<?php echo $this->get_field_id( 'date' ); ?>"><?php _e( 'Disable publish date', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'excerpt' ); ?>" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" type="checkbox" <?php checked( $excerpt, 'on' ); ?>/>
			<label for="<?php echo $this->get_field_id( 'excerpt' ); ?>"><?php _e( 'Disable excerpt text', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'more' ); ?>" name="<?php echo $this->get_field_name( 'more' ); ?>" type="checkbox" <?php checked( $more, 'on' ); ?>/>
			<label for="<?php echo $this->get_field_id( 'more' ); ?>"><?php _e( 'Disable more link', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'layout' ); ?>"><?php _e( 'List layout:', WM_THEME_TEXTDOMAIN_ADMIN ); ?></label><br />
			<select class="widefat" name="<?php echo $this->get_field_name( 'layout' ); ?>" id="<?php echo $this->get_field_id( 'layout' ); ?>">
				<?php
				$options = array(
					''  => __( 'Vertical', WM_THEME_TEXTDOMAIN_ADMIN ),
					'2' => __( 'Horizontal 1/2', WM_THEME_TEXTDOMAIN_ADMIN ),
					'3' => __( 'Horizontal 1/3', WM_THEME_TEXTDOMAIN_ADMIN ),
					'4' => __( 'Horizontal 1/4', WM_THEME_TEXTDOMAIN_ADMIN ),
					'5' => __( 'Horizontal 1/5', WM_THEME_TEXTDOMAIN_ADMIN )
					);
				foreach ( $options as $optId => $option ) {
					?>
					<option <?php echo 'value="'. $optId . '" '; selected( $layout, $optId ); ?>><?php echo $option; ?></option>
					<?php
				}
				?>
			</select>
			<small><?php _e( 'Set only for a single widget in horiztal widget area. Number of posts will be changed accordingly.', WM_THEME_TEXTDOMAIN_ADMIN ) ?></small>
		</p>
		<?php
	} // /form



	/*
	*****************************************************
	*      process and save the widget options
	*****************************************************
	*/
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']         = strip_tags($new_instance['title']);
		$instance['type']          = $new_instance['type'];
		$instance['excerptLength'] = absint( $new_instance['excerptLength'] );
		$instance['category']      = $new_instance['category'];
		$count                     = ( 0 < absint( $new_instance['count'] ) ) ? ( absint( $new_instance['count'] ) ) : ( 5 );
		$instance['count']         = $count;
		$instance['thumb']         = $new_instance['thumb'];
		$instance['date']          = $new_instance['date'];
		$instance['excerpt']       = $new_instance['excerpt'];
		$instance['more']          = $new_instance['more'];
		$instance['layout']        = $new_instance['layout'];

		return $instance;
	} // /update



	/*
	*****************************************************
	*      output the widget content
	*****************************************************
	*/
	public function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$excerptLength = ( isset( $excerptLength ) ) ? ( absint( $excerptLength ) ) : ( 15 );
		$sorting       = ( isset( $type ) && 'future' != $type ) ? ( $type ) : ( 'date' );
		$future        = ( isset( $type ) && 'future' == $type ) ? ( true ) : ( false );
		$count         = ( isset( $count ) && 0 < absint( $count ) ) ? ( absint( $count ) ) : ( 5 );
		$layout        = ( isset( $layout ) ) ? ( $layout ) : ( 0 );
		//$count         = ( 0 < $layout ) ? ( $layout ) : ( $count );

		if ( isset( $category ) && is_array( $category ) )
			$category = implode( ',', $category );
		elseif ( isset( $category ) )
			$category = $category;
		else
			$category = 0;

		$class = '';
		if ( isset( $thumb ) )
			$class .= 'no-thumb';
		if ( isset( $date ) ) {
			$space = ( $class ) ? ( ' ' ) : ( '' );
			$class .= $space . 'no-date';
		}
		if ( isset( $excerpt ) ) {
			$space = ( $class ) ? ( ' ' ) : ( '' );
			$class .= $space . 'no-excerpt';
		}
		if ( isset( $more ) ) {
			$space = ( $class ) ? ( ' ' ) : ( '' );
			$class .= $space . 'no-more-link';
		}

		echo $before_widget;

		//if the title is not filled, no title will be displayed
		if ( isset( $title ) && '' != $title && ' ' != $title && ! $layout )
			echo $before_title . apply_filters( 'widget_title', $title ) . $after_title;
		if ( isset( $title ) && '' != $title && ' ' != $title && $layout )
			echo '<h3 class="section-heading">' . $title . '</h3>';

		wp_reset_query();
		if ( ! $future )
			$the_articles = new WP_Query( array(
				'posts_per_page'      => $count,
				'orderby'             => $sorting,
				'ignore_sticky_posts' => 1,
				'cat'                 => $category,
				'tax_query'           => array( array(
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'terms'    => array( 'post-format-link', 'post-format-quote', 'post-format-status', 'post-format-video' ),
					'operator' => 'NOT IN'
					) ) //do not display specific post formats
				) );
		else
			$the_articles = new WP_Query( array(
				'posts_per_page'      => $count,
				'ignore_sticky_posts' => 1,
				'orderby'             => 'date',
				'order'               => 'DESC',
				'post_status'         => 'future',
				'cat'                 => $category,
				'tax_query'      => array( array(
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'terms'    => array( 'post-format-link', 'post-format-quote', 'post-format-status', 'post-format-video' ),
					'operator' => 'NOT IN'
					) ) //do not display specific post formats
				) );

		if ( $the_articles->have_posts() ) :
			//HTML to display output
			?>
			<ul class="mt0<?php if ( $class ) echo ' ' . $class; if ( 0 < $layout ) echo ' layout-horizontal'; ?>">
			<?php
			$i = 0;
			while ( $the_articles->have_posts() ) : $the_articles->the_post();
				++$i;
				if ( $i > $count )
					break;

				$layoutClass = '';
				$imgSize     = 'widget';

				if ( $layout ) {
					if ( 0 === $i % $layout )
						$last = ' last';
					else
						$last = '';

					$layoutClass = ' column col-1' . $layout . $last;
					$imgSize     = 'blog';
				}

				echo '<li class="border-color' . $layoutClass . '">';

				if ( ! isset( $date ) && $layout )
					echo '<time datetime="' . get_the_date( DATE_W3C ) . '" class="date">' . get_the_date() . '</time>';

				if ( ! isset( $thumb ) )
					wm_thumb( '', $imgSize, null, null, 'list' );

				echo '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';

				if ( ! isset( $date ) && ! $layout )
					echo '<time datetime="' . get_the_date( DATE_W3C ) . '" class="date">' . get_the_date() . '</time>';

				if ( ! isset( $excerpt ) ) {
					$excerptText = get_the_excerpt();
					$excerptText = explode( ' ', $excerptText );
					$excerptText = array_slice( $excerptText, 0, $excerptLength );
					$excerptText = implode( ' ', $excerptText );
					if ( $excerptText )
						echo '<div class="excerpt">' . $excerptText . '&hellip;</div>';
				}

				if ( ! isset( $more ) )
					wm_more( 'print', 'nobtn' );

				echo '</li>';

				if ( $layout && 0 === $i % $layout && $count > $i )
					echo '<li class="no-border clear row-separator"></li>';
			endwhile;
			?>
			</ul>
			<?php
		else :
			echo '<div class="msg type-red icon-box icon-warning">' . __( 'No articles found.', WM_THEME_TEXTDOMAIN ) . '</div>';
		endif;
		wp_reset_query();

		echo $after_widget;
	} // /widget

} // /wm_post_list

?>