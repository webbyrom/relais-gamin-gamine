<?php

/**
 * 
 * SCHED Widget Class
 *
 * @version 1.0
 * @author  Rik de Vos
 */
class SCHED_Widget extends WP_Widget {

	public static $options = array(
		'title' => '',
		'schedule' => '',
		'custom_options' => '',
	);

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'SCHED_Widget',
			'Timetable Widget',
			array('description' => 'Add a timetable to your page') // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance) {
		echo $args['before_widget'];

		if(self::get_option('title', $instance) !== '') {
			echo $args['before_title'] . apply_filters( 'widget_title', self::get_option('title', $instance)). $args['after_title'];
		}
		
		$schedule = (int)self::get_option('schedule', $instance);
		$custom_options = self::get_option('custom_options', $instance);

		if($schedule == '') {
			echo 'Invalid schedule';
		}else {
			echo do_shortcode('[timetable id="'.$schedule.'" '.$custom_options.']');
		}

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance) {
		$schedule_id = self::get_option('schedule', $instance);
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( self::get_option('title', $instance) ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'schedule' ); ?>">Timetable:</label><br />
			<select id="<?php echo $this->get_field_id( 'schedule' ); ?>" name="<?php echo $this->get_field_name( 'schedule' ); ?>" style="width: 100%">
				<?php
				$schedules = SCHED_DB::get_schedules(false);
				foreach($schedules as $schedule) { ?>
				<option value="<?php echo $schedule['id']; ?>" <?php if($schedule_id == $schedule['id']) { echo 'selected="selected"'; } ?>><?php echo esc_html($schedule['name']); ?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'custom_options' ); ?>">Custom Options:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'custom_options' ); ?>" name="<?php echo $this->get_field_name( 'custom_options' ); ?>" type="text" value="<?php echo esc_attr( self::get_option('custom_options', $instance) ); ?>">
			<em style="font-size: 12px; padding: 5px; background: #eee; display: block;  word-wrap: break-word; word-break: break-all;"><strong>Example: </strong>event_tooltip="1" animations="0"<br /></em>
			<em>View documentation for a complete list of custom options.</em>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		foreach(self::$options as $key => $option) {
			$instance[$key] = ( ! empty( $new_instance[$key] ) ) ? strip_tags( $new_instance[$key] ) : '';
		}
		return $instance;
	}

	public function get_option($key, $instance) {
		if(!isset($instance[$key])) {
			return self::$options[$key];
		}else {
			return $instance[$key];
		}
	}

}