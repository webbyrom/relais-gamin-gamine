<?php

add_action( 'widgets_init', 'swmsc_advertise_l_widget' );

function swmsc_advertise_l_widget() {
	register_widget( 'SWMSC_Advertise_Large_Widget' );
}

class SWMSC_Advertise_Large_Widget extends WP_Widget {

	function __construct() {	
			$widget_ops = array( 'classname' => '', 'description' => esc_html__('Show large size (300px) ads images', 'pre-school-shortcodes'));				
			parent::__construct( 'advertise-large-widget', esc_html__('Custom - Advertise Large', 'pre-school-shortcodes'), $widget_ops );
	}
		
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$ad_link = $instance['ad_link'];
		$ad_img = $instance['ad_img'];
		$img_html = $instance['img_html'];

		?>
		<div class="swmsc_ad_large_wid">
			<?php		
		
		echo $before_widget;

		if (!empty($title)) {
			echo $before_title.wp_kses($title,swmsc_kses_allowed_text()).$after_title;
		}			

		if ( empty($ad_link) ) { $ad_link = ''; }
		if ( empty($ad_img) ) { $ad_img = ''; }
		if ( empty($img_html) ) { $img_html = ''; }

		if ( !empty($ad_img) ) {
			if ( !empty($ad_link) ) { echo '<a href="'.esc_url($ad_link).'">'; }
			echo '<img src="'.esc_url($ad_img).'" alt="" />';
			if( !empty($ad_link) ) { echo '</a>'; }
		} else {
			echo wp_kses($img_html,swmsc_kses_allowed_textarea());
		}
		?>
		<div class="clear"></div>
		<?php
	
		echo $after_widget;	?>

		</div> <?php
	
	}
	
	function form( $instance ) {

		$defaults = array( 'title' => '', 'ad_link' => '','ad_img' => '','img_html' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Widget Title', 'pre-school-shortcodes') ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" />
		</p><br />
		<hr/>
		<p>
			<label for="<?php echo $this->get_field_id( 'ad_link' ); ?>"><?php esc_html_e('Ad Link URL:','pre-school-shortcodes'); ?> </label>
			<input type="text" id="<?php echo $this->get_field_id( 'ad_link' ); ?>" name="<?php echo $this->get_field_name( 'ad_link' ); ?>" value="<?php echo esc_attr( $instance['ad_link'] ); ?>" style="width:95%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'ad_img' ); ?>"><?php esc_html_e('Image URL:', 'pre-school-shortcodes') ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'ad_img' ); ?>" name="<?php echo $this->get_field_name( 'ad_img' ); ?>" value="<?php echo esc_attr( $instance['ad_img'] ); ?>" style="width:95%;" />
		</p>

		<p>NOTE: <small>If you want to use HTML content for ad image then leave Ad link and Image URL fields blank.</small> </p>
		<hr/><br />

		<p><label for="<?php echo $this->get_field_id('img_html'); ?>"><?php echo esc_html__('HTML Content:', 'pre-school-shortcodes'); ?></label><br />
    		<textarea  class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('img_html'); ?>" name="<?php echo $this->get_field_name('img_html'); ?>"><?php echo esc_textarea( $instance['img_html'] ); ?></textarea></p>		
		<?php	
	}
}	