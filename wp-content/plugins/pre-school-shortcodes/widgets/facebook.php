<?php
if ( !class_exists( 'SWMSC_Facebook_Widget' ) ) {
    class SWMSC_Facebook_Widget extends WP_Widget {

        function __construct() {
            $widget_ops = array( 'classname' => 'widget_facebook', 'description' => esc_html__( "Show facebook page with posts", 'pre-school-shortcodes' ) );
            parent::__construct('swmsc_facebook_wid', esc_html__('Custom - Facebook', 'pre-school-shortcodes'), $widget_ops);
        }

        function widget( $args, $instance ) {
            extract( $args );

            $title = apply_filters('widget_title', empty( $instance['title'] ) ? esc_html__( 'Facebook', 'pre-school-shortcodes' ) : $instance['title']);
            $fb_recent_posts = isset($instance['fb_recent_posts']) ? 'true' : 'false';
    		$fb_url = $instance['fb_url'];	

            echo $before_widget;
            ?>

            <div class="swmsc_facebook_widget">
                <?php               

                if ( $title ) {
                    echo $before_title . wp_kses($title,swmsc_kses_allowed_text()) . $after_title;      
                }                
                ?>

                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                    //<![CDATA[
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
                    fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                    //]]>
                </script>

                <div class="fb-page" data-href="<?php echo esc_url($fb_url); ?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="<?php echo esc_html($fb_recent_posts); ?>"></div>

                <div class="clear"></div>

            </div>
            <?php

            echo $after_widget;
        }

        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = wp_kses($new_instance['title'],swmsc_kses_allowed_text());
            $instance['fb_recent_posts'] = $new_instance['fb_recent_posts'];
    		$instance['fb_url'] = wp_kses($new_instance['fb_url'],swmsc_kses_allowed_text());
            return $instance;
        }

        function form( $instance ) {
            //Defaults
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Facebook', 'fb_url' => 'https://www.facebook.com/envato', 'fb_recent_posts' => 'on') );	
    		?>		
    		<p>
    			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Facebook', 'pre-school-shortcodes') ?></label>
    			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" />			
    		</p>		
    		<p>
    			<label for="<?php echo $this->get_field_id( 'fb_url' ); ?>"><?php esc_html_e('Facebook Page URL', 'pre-school-shortcodes') ?></label>
    			<input type="text" id="<?php echo $this->get_field_id( 'fb_url' ); ?>" name="<?php echo $this->get_field_name( 'fb_url' ); ?>" value="<?php echo esc_attr( $instance['fb_url'] ); ?>" style="width:95%;" />
    		</p>		
    		<p>
    			<input class="checkbox" type="checkbox" <?php checked($instance['fb_recent_posts'], 'on') ?> id="<?php echo $this->get_field_id('fb_recent_posts'); ?>" name="<?php echo $this->get_field_name('fb_recent_posts'); ?>" />
    			<label for="<?php echo $this->get_field_id('fb_recent_posts'); ?>"><?php esc_html_e('Show posts', 'pre-school-shortcodes') ?></label>		
    		</p>
    		<?php
        }

    }
}

function SWMSC_FB_Widget() {
  register_widget('SWMSC_Facebook_Widget');
}
add_action('widgets_init', 'SWMSC_FB_Widget');