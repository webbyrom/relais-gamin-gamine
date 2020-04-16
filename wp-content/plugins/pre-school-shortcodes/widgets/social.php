<?php
if ( !class_exists( 'SWMSC_Social_Widget' ) ) {
    class SWMSC_Social_Widget extends WP_Widget {

        function __construct() {
            $widget_ops = array( 'classname' => 'widget_social', 'description' => esc_html__( "Social media icons", 'pre-school-shortcodes' ) );
            parent::__construct('swmsc_social', esc_html__('Custom - Social Media Icons', 'pre-school-shortcodes'), $widget_ops);
        }

        function widget( $args, $instance ) {
            extract( $args );

            $title = apply_filters('widget_title', empty( $instance['title'] ) ? '' : $instance['title']);
            $new_window_open = $instance['new_window_open'] ? '1' : '0';
            $icons_col = $instance['icons_col'] ? esc_html($instance['icons_col']) : '';
            $iconsize = isset($instance['iconsize']) ? $instance['iconsize'] : 'ic_medium' ;
            $iconstyle = isset($instance['iconstyle']) ? $instance['iconstyle'] : 'ic_round' ;

            $nos = array( "one","two","three","four","five","six","seven","eight","nine","ten" );
            $target = '';

            for ( $i = 0; $i<10; $i++ ) { 

                $iconname = 'icon'.$nos[$i].'_name';
                $iconurl = 'icon'.$nos[$i].'_url';
                $iconbg = 'icon'.$nos[$i].'_bg';

                $icon_name[$i] = !empty($instance[$iconname]) ? esc_html($instance[$iconname]) : '' ;     
                $icon_url[$i] = !empty($instance[$iconurl]) ? esc_html($instance[$iconurl]) : '' ;
                $icon_bg[$i] = !empty($instance[$iconbg]) ? esc_html($instance[$iconbg]) : '';
               
            }

            echo '<div class="swmsc_custom_social_widget">';
            echo $before_widget;
            if ( $title != '' ) {
                echo $before_title . wp_kses($title,swmsc_kses_allowed_text()) . $after_title;      
            }

            if ($new_window_open == 1) { 
                $target = 'target="_blank"';
            }
            
            ?>
            <div class="swmsc_sm_wid_icons">
                <ul>
                    <?php
                    for ( $i = 0; $i<10; $i++ ) {
                       if ( $icon_name[$i] != '' ) {
                            echo '<li class="'.esc_attr($iconsize).' '.esc_attr($iconstyle).'"><a href="'.esc_url($icon_url[$i]).'" '.esc_html($target).' style="color:'.esc_attr($icons_col).';background-color:'.esc_attr($icon_bg[$i]).';"><i class="fa fa-'.esc_attr($icon_name[$i]).'"></i></a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="clear"></div>
            <?php

            echo $after_widget;
            echo '</div>';
        }

        function update( $new_instance, $old_instance ) {

            $instance = $old_instance;
            $instance['title'] = wp_kses($new_instance['title'],swmsc_kses_allowed_text());
            $instance['new_window_open'] = $new_instance['new_window_open'] ? 1 : 0;
            $instance['icons_col']=$new_instance['icons_col'];
            $instance['iconsize'] = $new_instance['iconsize'];
            $instance['iconstyle'] = $new_instance['iconstyle'];

            $nos = array( "one","two","three","four","five","six","seven","eight","nine","ten" );

            for ( $i = 0; $i<10; $i++ ) { 

                $iconname = 'icon'.$nos[$i].'_name';
                $iconurl = 'icon'.$nos[$i].'_url';
                $iconbg = 'icon'.$nos[$i].'_bg';

                $instance[$iconname] =  $new_instance[$iconname];
                $instance[$iconurl] =  $new_instance[$iconurl];
                $instance[$iconbg] =  $new_instance[$iconbg];
            } 

            return $instance;
        }

        function form( $instance ) {
            //Defaults
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Follow Us', 'icons_col'=>'#ffffff', 'iconsize'=>'ic_medium', 'iconstyle'=>'ic_round', 'iconone_bg'=>'#29c5f6', 'icontwo_bg'=>'#3b5998', 'iconthree_bg'=>'#bc805f', 'iconfour_bg'=>'#4da9cd', 'iconfive_bg'=>'#c61118', 'iconsix_bg'=>'#ff6fa3', 'iconseven_bg'=>'#dd332c', 'iconeight_bg'=>'#0082c9', 'iconnine_bg'=>'#3284c2', 'iconten_bg'=>'#fd8b05', 'iconone_name' => 'twitter', 'icontwo_name' => 'facebook', 'iconthree_name' => 'instagram', 'iconfour_name' => 'vimeo', 'iconfive_name' => 'pinterest', 'iconsix_name' => 'dribbble', 'iconseven_name' => 'youtube-play', 'iconeight_name' => 'linkedin', 'iconnine_name' => 'digg', 'iconten_name' => 'rss', 'iconone_url' => '#', 'icontwo_url' => '#', 'iconthree_url' => '#', 'iconfour_url' => '#', 'iconfive_url' => '#', 'iconsix_url' => '#', 'iconseven_url' => '#', 'iconeight_url' => '#', 'iconnine_url' => '#', 'iconten_url' => '#', 'new_window_open' => 1 ));
            ?>
            
            <script type="text/javascript">
                //<![CDATA[
                    jQuery(document).ready(function() {jQuery('#widgets-right .swmsc-social-wid-color-pick').wpColorPicker(); }); 
                //]]>
            </script> 

            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Widget Title:', 'pre-school-shortcodes') ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" />            
            </p>
            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['new_window_open'], true) ?> id="<?php echo $this->get_field_id('new_window_open'); ?>" name="<?php echo $this->get_field_name('new_window_open'); ?>" />
                <label for="<?php echo $this->get_field_id('new_window_open'); ?>"><?php esc_html_e('Open social media website in new window', 'pre-school-shortcodes') ?></label>       
            </p>            

            <p><strong><?php esc_html_e('Icon Names Page:', 'pre-school-shortcodes') ?></strong> <a href="http://fortawesome.github.io/Font-Awesome/icons/#brand" target="_blank">Font Awesome</a><br /></p>            
            
            <hr />
            <p>
                <label for="<?php echo $this->get_field_id('icons_col'); ?>"><?php esc_html__('Icons Color', 'pre-school-shortcodes'); ?></label><br>
                <input class="widefat swmsc-social-wid-color-pick" id="<?php echo $this->get_field_id('icons_col'); ?>" name="<?php echo $this->get_field_name('icons_col'); ?>" type="text" value="<?php echo esc_attr( $instance['icons_col'] ); ?>" />
                
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('iconsize'); ?>"><?php echo esc_html__('Icon Size:', 'pre-school-shortcodes'); ?></label>
                <select id="<?php echo $this->get_field_id('iconsize'); ?>" name="<?php echo $this->get_field_name('iconsize'); ?>" class="widefat" style="width:100%;">
                    <option value="ic_small" <?php if ( $instance['iconsize'] == 'ic_small') { echo 'selected="selected"'; } ?>><?php echo esc_html__('Small', 'pre-school-shortcodes'); ?></option>
                    <option value="ic_medium" <?php if ( $instance['iconsize'] == 'ic_medium') { echo 'selected="selected"'; } ?>><?php echo esc_html__('Medium', 'pre-school-shortcodes'); ?></option>
                    <option value="ic_large" <?php if ( $instance['iconsize'] == 'ic_large') { echo 'selected="selected"'; } ?>><?php echo esc_html__('Large', 'pre-school-shortcodes'); ?></option>
                    <option value="ic_xlarge" <?php if ( $instance['iconsize'] == 'ic_xlarge') { echo 'selected="selected"'; } ?>><?php echo esc_html__('X Large', 'pre-school-shortcodes'); ?></option>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('iconstyle'); ?>"><?php echo esc_html__('Icon Style:', 'pre-school-shortcodes'); ?></label>
                <select id="<?php echo $this->get_field_id('iconstyle'); ?>" name="<?php echo $this->get_field_name('iconstyle'); ?>" class="widefat" style="width:100%;">
                    <option value="ic_square" <?php if ( $instance['iconstyle'] == 'ic_square') { echo 'selected="selected"'; } ?>><?php echo esc_html__('Square', 'pre-school-shortcodes'); ?></option>
                    <option value="ic_round" <?php if ( $instance['iconstyle'] == 'ic_round') { echo 'selected="selected"'; } ?>><?php echo esc_html__('Rounded', 'pre-school-shortcodes'); ?></option>
                    <option value="ic_circle" <?php if ( $instance['iconstyle'] == 'ic_circle') { echo 'selected="selected"'; } ?>><?php echo esc_html__('Circle', 'pre-school-shortcodes'); ?></option>
                </select>
            </p>
            <hr />

           <?php 
            $nos = array( "one","two","three","four","five","six","seven","eight","nine","ten" );

            for ( $i = 0; $i<10; $i++ ) { 

                $iconname = 'icon'.$nos[$i].'_name';
                $iconurl = 'icon'.$nos[$i].'_url';
                $iconbg = 'icon'.$nos[$i].'_bg';
                ?>
                <p>
                    <label for="<?php echo $this->get_field_id( $iconname ); ?>"><?php printf(esc_html('Icon %s : Name, URL and Background Color', 'pre-school-shortcodes'),$i+1) ?></label>
                    <input type="text" id="<?php echo $this->get_field_id( $iconname ); ?>" name="<?php echo $this->get_field_name( $iconname ); ?>" value="<?php echo esc_attr( $instance[$iconname] ); ?>" style="width:95%;" />
                    <input type="text" id="<?php echo $this->get_field_id( $iconurl ); ?>" name="<?php echo $this->get_field_name( $iconurl ); ?>" value="<?php echo esc_attr( $instance[$iconurl] ); ?>" style="width:95%;" />
                    <input class="widefat swmsc-social-wid-color-pick" id="<?php echo $this->get_field_id($iconbg); ?>" name="<?php echo $this->get_field_name($iconbg); ?>" type="text" value="<?php echo esc_attr( $instance[$iconbg] ); ?>" />
                </p>

                <?php 
            }

        }

    }
}

function SWMSC_Social_Media_Widget() {
  register_widget('SWMSC_Social_Widget');
}
add_action('widgets_init', 'SWMSC_Social_Media_Widget');