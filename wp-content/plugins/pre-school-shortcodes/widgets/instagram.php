<?php

add_action( 'widgets_init', 'swmsc_add_instagram_widget' );

function swmsc_add_instagram_widget() {
	register_widget( 'SWMSC_Instagram_Widget' );
}

class SWMSC_Instagram_Widget extends WP_Widget {

	function __construct() {	
			$widget_ops = array( 'classname' => '', 'description' => esc_html__('Show your Instagram pictures on your site', 'pre-school-shortcodes'));				
			parent::__construct( 'instagram-widget', esc_html__('Custom - Instagram Photos', 'pre-school-shortcodes'), $widget_ops );
	}
		
	function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$swmsc_instagram_title = apply_filters('widget_title', $instance['title'] );
		$swmsc_instagram_userid = intval($instance['instagram_userid']);
		$swmsc_instagram_token = $instance['instagram_token'];
		$swmsc_number_of_photos = $instance['number-of-photos'];	
		$widgetLocationId = 'instafeed_widget-'.rand();

		echo $before_widget;		
		echo $before_title.wp_kses($swmsc_instagram_title,swmsc_kses_allowed_text()).$after_title;
		echo '<div class="instagram_photos_wrap swmsc_wid_gal_wrap">';
		echo '<div class="instagram_photos swmsc_wid_gal">';
		echo '<ul id="'.esc_attr($widgetLocationId).'" >';
		echo '</ul>';
		echo '</div>';
		echo '</div>';

		if ( $swmsc_instagram_userid != '' ) {
			?>
			<script type="text/javascript" >
				//<![CDATA[
			    jQuery(document).ready(function() {
			        var userFeed = new Instafeed({
						get: 'user',
						target:"<?php echo esc_attr($widgetLocationId); ?>",
						userId: <?php echo intval($swmsc_instagram_userid); ?>,
						accessToken: "<?php echo esc_attr($swmsc_instagram_token); ?>",
						resolution: 'thumbnail',
						limit: <?php echo intval($swmsc_number_of_photos); ?>,
						template: '<li><a href="{{link}}"><img src="{{image}}" /></a></li>'
					});
					userFeed.run();
			 	});
			 	//]]>
			</script>
			<?php
		}

		echo $after_widget;	
	
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Instagram Photos','instagram_userid' => '','instagram_token' => '','number-of-photos' => '6' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Widget Title', 'pre-school-shortcodes') ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" />
		</p>
		<p><a href="http://www.pinceladasdaweb.com.br/instagram/access-token/" target="_blank" ><?php esc_html_e('Help : Find an Instagram User ID / Access Token','pre-school-shortcodes'); ?></a></p>
		<p>
			<label for="<?php echo $this->get_field_id( 'instagram_userid' ); ?>"><?php esc_html_e('Instagram User Id:','pre-school-shortcodes'); ?> </label>
			<input type="text" id="<?php echo $this->get_field_id( 'instagram_userid' ); ?>" name="<?php echo $this->get_field_name( 'instagram_userid' ); ?>" value="<?php echo esc_attr( $instance['instagram_userid'] ); ?>" style="width:95%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'instagram_token' ); ?>"><?php esc_html_e('Instagram Access Token:','pre-school-shortcodes'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'instagram_token' ); ?>" name="<?php echo $this->get_field_name( 'instagram_token' ); ?>" value="<?php echo esc_attr( $instance['instagram_token'] ); ?>" style="width:95%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number-of-photos' ); ?>"><?php esc_html_e('Number of Photos to Display:', 'pre-school-shortcodes') ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'number-of-photos' ); ?>" name="<?php echo $this->get_field_name( 'number-of-photos' ); ?>" value="<?php echo intval( $instance['number-of-photos'] ); ?>" style="width:95%;" />
		</p>		
		<?php	
	}
}	