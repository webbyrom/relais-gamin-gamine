<?php

add_action( 'widgets_init', 'swmsc_add_flickr_widget' );

function swmsc_add_flickr_widget() {
	register_widget( 'SWMSC_Flickr_Widget' );
}

class SWMSC_Flickr_Widget extends WP_Widget {

	function __construct() {	
			$widget_ops = array( 'classname' => '', 'description' => esc_html__('Show your Flickr pictures on your site', 'pre-school-shortcodes'));				
			parent::__construct( 'flickr-widget', esc_html__('Custom - Flickr Photos', 'pre-school-shortcodes'), $widget_ops );
	}
		
	function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$swmsc_flickr_title = apply_filters('widget_title', $instance['title'] );
		$swmsc_flickr_userid = $instance['flickr_userid'];
		$swmsc_number_of_photos = $instance['number-of-photos'];
		
		echo $before_widget;		
		echo $before_title.wp_kses($swmsc_flickr_title,swmsc_kses_allowed_text()).$after_title;
		echo '<div class="flickr_photos_wrap swmsc_wid_gal_wrap"><div class="flickr_photos swmsc_wid_gal"  data-display-photos="'.intval($swmsc_number_of_photos).'" data-flickr-id="'.esc_attr($swmsc_flickr_userid).'"></div><div class="clear"></div></div>';
		echo $after_widget;	
	
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Flickr Photos', 'flickr_userid' => '90291761@N02','number-of-photos' => '6' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Widget Title', 'pre-school-shortcodes') ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'flickr_userid' ); ?>"><?php esc_html_e('Flickr Userid:','pre-school-shortcodes'); ?> (<a href="http://idgettr.com/" target="_blank" ><?php esc_html_e('Help','pre-school-shortcodes'); ?></a>)</label>
			<input type="text" id="<?php echo $this->get_field_id( 'flickr_userid' ); ?>" name="<?php echo $this->get_field_name( 'flickr_userid' ); ?>" value="<?php echo esc_attr( $instance['flickr_userid'] ); ?>" style="width:95%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number-of-photos' ); ?>"><?php esc_html_e('Number of Photos to Display:', 'pre-school-shortcodes') ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'number-of-photos' ); ?>" name="<?php echo $this->get_field_name( 'number-of-photos' ); ?>" value="<?php echo intval( $instance['number-of-photos'] ); ?>" style="width:95%;" />
		</p>		
		<?php	
	}
}	