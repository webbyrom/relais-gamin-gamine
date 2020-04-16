<?php
if ( !class_exists( 'SWMSC_Categories_Widget' ) ) {
    class SWMSC_Categories_Widget extends WP_Widget {

        function __construct() {
            $widget_ops = array( 'classname' => 'widget_categories', 'description' => esc_html__( "Category list with count", 'pre-school-shortcodes' ) );
            parent::__construct('my_categories', esc_html__('Custom - Categories', 'pre-school-shortcodes'), $widget_ops);
        }

        function widget( $args, $instance ) {
            extract( $args );

            $title = apply_filters('widget_title', empty( $instance['title'] ) ? esc_html__( 'Categories', 'pre-school-shortcodes' ) : $instance['title']);
            $c = $instance['count'] ? '1' : '0'; 
    		$exclude_cat = $instance['exclude_cat'];	

            echo '<div class="swmsc_custom_cat_widget">';
            echo $before_widget;
            if ( $title ) {
                echo $before_title . wp_kses($title,swmsc_kses_allowed_text()) . $after_title;      
            }
            
            ?>
            <ul class="swmsc_cat_widget_items">
            <?php
            
    		$categories = wp_list_categories('title_li=&show_count='.intval($c).'&echo=0&hierarchical=0&exclude='.esc_attr($exclude_cat));
    		$categories = preg_replace('#</a> \(([0-9]+)\)#', ' </a><small>\\1</small> <div class="clear"></div>', $categories);
    		echo $categories;
            ?>
            </ul>
            <div class="clear"></div>
            <?php

            echo $after_widget;
            echo '</div>';
        }

        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = wp_kses($new_instance['title'],swmsc_kses_allowed_text());
            $instance['count'] = $new_instance['count'] ? 1 : 0; 
    		$instance['exclude_cat'] = wp_kses($new_instance['exclude_cat'],swmsc_kses_allowed_text());
            return $instance;
        }

        function form( $instance ) {
            //Defaults
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Categories', 'exclude_cat' => '', 'count' => 1) );		
    		?>		
    		<p>
    			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Widget Title:', 'pre-school-shortcodes') ?></label>
    			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" />			
    		</p>		
    		<p>
    			<label for="<?php echo $this->get_field_id( 'exclude_cat' ); ?>"><?php esc_html_e('Exclude Categories:', 'pre-school-shortcodes') ?></label>
    			<input type="text" id="<?php echo $this->get_field_id( 'exclude_cat' ); ?>" name="<?php echo $this->get_field_name( 'exclude_cat' ); ?>" value="<?php echo esc_attr( $instance['exclude_cat'] ); ?>" style="width:95%;" /><br /><small><?php esc_html_e( 'Categories IDs, separated by commas (e.g. 1,8)','pre-school-shortcodes' ) ?></small>
    		</p>		
    		<p>
    			<input class="checkbox" type="checkbox" <?php checked($instance['count'], true) ?> id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" />
    			<label for="<?php echo $this->get_field_id('count'); ?>"><?php esc_html_e('Show post counts', 'pre-school-shortcodes') ?></label>		
    		</p>
    		<?php
        }

    }
}

function SWMSC_Cats_Widget() {
  register_widget('SWMSC_Categories_Widget');
}
add_action('widgets_init', 'SWMSC_Cats_Widget');