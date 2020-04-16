<?php 

function SWMSC_Advertise_Widget_Display() {
	register_widget('SWMSC_Advertise_Widget');
}

add_action('widgets_init', 'SWMSC_Advertise_Widget_Display');
if ( !class_exists( 'SWMSC_Advertise_Widget' ) ) {
	class SWMSC_Advertise_Widget extends WP_Widget {
	    function __construct() {
			$widget_ops = array('description' => esc_html__('Display advertise image with link, title tag and alt tag', 'pre-school-shortcodes'));
			$control_ops = array('width' => 450);
			parent::__construct('swmsc_advertise_wid',$name=esc_html__('Custom - Advertise 125 x 125', 'pre-school-shortcodes'),$widget_ops,$control_ops);
			
		}		

	  	/* Frond-end layout  */
	    function widget($args, $instance){
			extract($args);
			
			$swmsc_widget_title = apply_filters( 'widget_title', !empty( $instance['title'] ) ? esc_html( $instance['title'] ) : ''  );			
			$open_new_window = isset($instance['open_new_window']) ? $instance['open_new_window'] : false;
			$swmsc_adv_numbers = array( "1"=>"one", "2"=>"two", "3"=>"three", "4"=>"four", "5"=>"five", "6"=>"six", "7"=>"seven", "8"=>"eight" );

			foreach ($swmsc_adv_numbers as $digit_number => $word_number) 
			{
				$adv_img_path = 'adv_image_'.$word_number.'_path';
				$adv_img_url = 'adv_image_'.$word_number.'_url';
				$adv_img_title = 'adv_image_'.$word_number.'_title_tag';
				$adv_img_alt = 'adv_image_'.$word_number.'_alt_tag';

				$adv_image_path[$digit_number] = !empty($instance[$adv_img_path]) ? esc_url($instance[$adv_img_path]) : '' ;
				$adv_image_url[$digit_number] = !empty($instance[$adv_img_url]) ? esc_url($instance[$adv_img_url]) : '' ;
				$adv_image_title_tag[$digit_number] = !empty($instance[$adv_img_title]) ? esc_attr($instance[$adv_img_title]) : '' ;
				$adv_image_alt_tag[$digit_number] = !empty($instance[$adv_img_alt]) ? esc_attr($instance[$adv_img_alt]) : '' ;
			} 

			echo $before_widget;

			if ( $swmsc_widget_title )
			echo $before_title . $swmsc_widget_title . $after_title;
			?>	
			<div class="swmsc_sidebar-advertise_wrap swmsc_wid_gal_wrap">
			<div class="swmsc_sidebar-advertise swmsc_wid_gal">
			<ul>
			<?php
			for ($i = 1; $i <= 8; $i++ ) {
				if ($adv_image_path[$i] <> '') { ?><li><a href="<?php echo $adv_image_url[$i] ?>" <?php if ($open_new_window == 1) echo('target="_blank"') ?> > <img src="<?php echo $adv_image_path[$i]; ?>" alt="<?php echo $adv_image_alt_tag[$i]; ?>" title="<?php echo $adv_image_title_tag[$i]; ?>" /></a></li><?php };
			}
			?>
			</ul>
			<div class="clear"></div>
			</div>
			</div>

			<?php
			echo $after_widget;
		}
		/* Update new */
	    function update($new_instance, $old_instance){

	    	$swmsc_adv_numbers = array( "1"=>"one", "2"=>"two", "3"=>"three", "4"=>"four", "5"=>"five", "6"=>"six", "7"=>"seven", "8"=>"eight" );

			$instance = $old_instance;
			
			$instance['title'] = stripslashes($new_instance['title']);		
			
			$instance['open_new_window'] = 0;		
			
			if ( isset($new_instance['open_new_window']) ) $instance['open_new_window'] = 1;

			foreach ($swmsc_adv_numbers as $digit_number => $word_number) 
			{
				$adv_img_path = 'adv_image_'.$word_number.'_path';
				$adv_img_url = 'adv_image_'.$word_number.'_url';
				$adv_img_title = 'adv_image_'.$word_number.'_title_tag';
				$adv_img_alt = 'adv_image_'.$word_number.'_alt_tag';

				$instance[$adv_img_path] = esc_url($new_instance[$adv_img_path]);
				$instance[$adv_img_url] = esc_url($new_instance[$adv_img_url]);
				$instance[$adv_img_title] = esc_attr($new_instance[$adv_img_title]);
				$instance[$adv_img_alt] = esc_attr($new_instance[$adv_img_alt]);
			}			

			return $instance;
		}
	  
	    function form($instance){

	    	$swmsc_adv_numbers = array( "1"=>"one", "2"=>"two", "3"=>"three", "4"=>"four", "5"=>"five", "6"=>"six", "7"=>"seven", "8"=>"eight" );

			/* Defaults display */
			$instance = wp_parse_args( (array) $instance, array('title'=> esc_html__('Advertise', 'pre-school-shortcodes'), 'open_new_window' => true, 'adv_image_one_path'=>'', 'adv_image_one_url'=>'', 'adv_image_one_title_tag'=>'', 'adv_image_one_alt_tag'=>'', 'adv_image_two_path'=>'', 'adv_image_two_url'=>'', 'adv_image_two_title_tag'=>'', 'adv_image_two_alt_tag'=>'', 'adv_image_three_path'=>'', 'adv_image_three_url'=>'', 'adv_image_three_title_tag'=>'', 'adv_image_three_alt_tag'=>'', 'adv_image_four_path'=>'', 'adv_image_four_url'=>'', 'adv_image_four_title_tag'=>'', 'adv_image_four_alt_tag'=>'', 'adv_image_five_path'=>'', 'adv_image_five_url'=>'', 'adv_image_five_title_tag'=>'', 'adv_image_five_alt_tag'=>'', 'adv_image_six_path'=>'', 'adv_image_six_url'=>'', 'adv_image_six_title_tag'=>'', 'adv_image_six_alt_tag'=>'', 'adv_image_seven_path'=>'', 'adv_image_seven_url'=>'', 'adv_image_seven_title_tag'=>'', 'adv_image_seven_alt_tag'=>'', 'adv_image_eight_path'=>'', 'adv_image_eight_url'=>'', 'adv_image_eight_title_tag'=>'', 'adv_image_eight_alt_tag'=>'') );

			foreach ($swmsc_adv_numbers as $digit_number => $word_number) 
			{
				$adv_img_path = 'adv_image_'.$word_number.'_path';
				$adv_img_url = 'adv_image_'.$word_number.'_url';
				$adv_img_title = 'adv_image_'.$word_number.'_title_tag';
				$adv_img_alt = 'adv_image_'.$word_number.'_alt_tag';

				$adv_image_path[$digit_number] = esc_url($instance[$adv_img_path]);
				$adv_image_url[$digit_number] = esc_url($instance[$adv_img_url]);
				$adv_image_title_tag[$digit_number] = esc_attr($instance[$adv_img_title]);
				$adv_image_alt_tag[$digit_number] = esc_attr($instance[$adv_img_alt]);
			} 			

			/* Widget Title */
			
			echo '<p><label for="' . $this->get_field_id('title') . '">' . esc_html__('Widget Title', 'pre-school-shortcodes') . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_html($instance['title']) . '" /></p>';			
			
			echo '<p>' . esc_html__('Image size 125px x 125px', 'pre-school-shortcodes').'</p>';			
			
			/* Open in New Window */
			?>
			
			<input class="checkbox" type="checkbox" <?php checked($instance['open_new_window'], true) ?> id="<?php echo $this->get_field_id('open_new_window'); ?>" name="<?php echo $this->get_field_name('open_new_window'); ?>" />
			<label for="<?php echo $this->get_field_id('open_new_window'); ?>"><?php echo esc_html__('Check this box if you want to open all advertise images links in a  New Window.', 'pre-school-shortcodes') ?></label><br /><br />		
			
			<?php

			foreach ($swmsc_adv_numbers as $digit_number => $word_number) 
			{
				$adv_img_path = 'adv_image_'.$word_number.'_path';
				$adv_img_url = 'adv_image_'.$word_number.'_url';
				$adv_img_title = 'adv_image_'.$word_number.'_title_tag';
				$adv_img_alt = 'adv_image_'.$word_number.'_alt_tag';

				$adv_image_path[$digit_number] = !empty($instance[$adv_img_path]) ? esc_url($instance[$adv_img_path]) : '' ;
				$adv_image_url[$digit_number] = !empty($instance[$adv_img_url]) ? esc_url($instance[$adv_img_url]) : '' ;
				$adv_image_title_tag[$digit_number] = !empty($instance[$adv_img_title]) ? esc_attr($instance[$adv_img_title]) : '' ;
				$adv_image_alt_tag[$digit_number] = !empty($instance[$adv_img_alt]) ? esc_attr($instance[$adv_img_alt]) : '' ;

				/* Advertise Image */			
				echo '<div class="swmsc_advertise_widget">';			
				echo '<div class="swmsc_advertise_widget_title">' . esc_html__('Advertise Image', 'pre-school-shortcodes') .' '.$digit_number.'</div>';			
				echo '<p><label for="' . $this->get_field_id($adv_img_path) . '">' . esc_html__('Image Path:', 'pre-school-shortcodes') . '</label><input id="' . $this->get_field_id($adv_img_path) . '" name="' . $this->get_field_name($adv_img_path) . '" type="text" value="' . $adv_image_path[$digit_number] . '" /></p>';		
				echo '<p><label for="' . $this->get_field_id($adv_img_url) . '">' . esc_html__('Image Link URL:', 'pre-school-shortcodes') . '</label><input id="' . $this->get_field_id($adv_img_url) . '" name="' . $this->get_field_name($adv_img_url) . '" type="text" value="' . $adv_image_url[$digit_number] . '" /></p>';		
				echo '<p><label for="' . $this->get_field_id($adv_img_title) . '">' . esc_html__('Image Title Tag:', 'pre-school-shortcodes') . '</label><input id="' . $this->get_field_id($adv_img_title) . '" name="' . $this->get_field_name($adv_img_title) . '" type="text" value="' . $adv_image_title_tag[$digit_number] . '" /></p>';		
				echo '<p><label for="' . $this->get_field_id($adv_img_alt) . '">' . esc_html__('Image Alt Tag:', 'pre-school-shortcodes') . '</label><input id="' . $this->get_field_id($adv_img_alt) . '" name="' . $this->get_field_name($adv_img_alt) . '" type="text" value="' . $adv_image_alt_tag[$digit_number] . '" /></p>';		
				echo '<div class="clear"></div>';			
				echo '</div>';
			}
				
		}
	}
}
?>