<?php
if ( !class_exists( 'SWMSC_video_widget' ) ) {
    class SWMSC_video_widget extends WP_Widget {

        function __construct() {
            $widget_ops = array('classname' => '', 'description' => esc_html__('Show YouTube, Vimeo videos','pre-school-shortcodes'));
            $control_ops = array('height' => 450);
            parent::__construct('video-widget', esc_html__('Custom - Video','pre-school-shortcodes'), $widget_ops, $control_ops);
        }

        function widget( $args, $instance ) {
            extract($args);
            $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
            $embed_code = apply_filters( 'widget_text', empty( $instance['embed_code'] ) ? '' : $instance['embed_code'], $instance );

            echo $before_widget;
            if ( !empty( $title ) ) {
                echo $before_title . $title . $after_title;
             }

            echo '<div class="swmsc_video_widget">';
    		echo '<div class="fitVids">';
    		echo '<p>'.wp_kses($embed_code,swmsc_kses_allowed_textarea()).'</p>';
    		echo '</div>';
    		echo '</div>';
    		echo $after_widget;
        }

        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = strip_tags($new_instance['title']);
            if ( current_user_can('unfiltered_html') ) {
                $instance['embed_code'] =  $new_instance['embed_code'];
            } else {
                $instance['embed_code'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['embed_code']) ) );
            }
            return $instance;
        }

        function form( $instance ) {
            $instance = wp_parse_args( (array) $instance, array(
            'title' => 'Latest Video',
            'embed_code' => '<iframe src="http://player.vimeo.com/video/40176915?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'
    		) );

            ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:', 'pre-school-shortcodes'); ?></label><br />
            <input style="width:99%;"  id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo strip_tags($instance['title']); ?>" /></p>

    		<p><label for="<?php echo $this->get_field_id('embed_code'); ?>"><?php echo esc_html__('YouTube / Vimeo Embed Code:', 'pre-school-shortcodes'); ?></label><br />
    		<textarea  class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('embed_code'); ?>" name="<?php echo $this->get_field_name('embed_code'); ?>"><?php echo esc_textarea($instance['embed_code']); ?></textarea></p>
            <?php
        }
    }
}

function SWMSC_video_widget_class() {
  register_widget('SWMSC_video_widget');
}
add_action('widgets_init', 'SWMSC_video_widget_class');
