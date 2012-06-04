<?php
/**
 * Makes a custom Widget for displaying About info
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package squoze
 * @since squoze 1.0
 */
class Squoze_About_Widget extends WP_Widget {

	/**
	 * Constructor
	 *
	 * @return void
	 **/
	public function __construct() {
		parent::__construct(
			'squoze_about_widget',
			'Squoze_About_Widget',
			array( 'description' => __( 'Use this widget to display about info', 'squoze' ), )
		);
	}

	/**
	 * Outputs the HTML for this widget.
	 *
	 * @param array An array of standard parameters for widgets in this theme
	 * @param array An array of settings for this widget instance
	 * @return void Echoes it's output
	 **/
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'About', 'squoze' ) : $instance['title'] );
		$email = isset( $instance['email']) ? esc_attr( $instance['email'] ) : '';
		$name = isset( $instance['name']) ? esc_attr( $instance['name'] ) : '';
		$content = isset( $instance['content']) ? $instance['content'] : '';
		
		echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
		echo get_avatar( $email );
		echo '<div class="name">' . $name . '</div>';
		echo '<div class="clearfix"></div>';
		echo '<div class="content">' . $content . "\n</div>";
		echo $after_widget;

	}

	/**
	 * Deals with the settings when they are saved by the admin. Here is
	 * where any validation should be dealt with.
	 **/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['email'] = strip_tags( $new_instance['email'] );
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['content'] = $new_instance['content'];

		return $instance;
	}

	/**
	 * Displays the form for this widget on the Widgets page of the WP Admin area.
	 **/
	function form( $instance ) {
		$title = isset( $instance['title']) ? esc_attr( $instance['title'] ) : '';
		$email = isset( $instance['email']) ? esc_attr( $instance['email'] ) : '';
		$name = isset( $instance['name']) ? esc_attr( $instance['name'] ) : '';
		$content = isset( $instance['content']) ? $instance['content'] : '';
?>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'squoze' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php _e( 'Email:', 'squoze' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" /></p>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php _e( 'Name:', 'squoze' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" /></p>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>"><?php _e( 'Content:', 'squoze' ); ?></label>
			<textarea rows="5" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'content' ) ); ?>"><?php echo $content; ?></textarea></p>

		<?php
	}
}