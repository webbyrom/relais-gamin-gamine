<?php 
if ( !class_exists( 'SWMSC_Recent_Posts_Large' ) ) {
	class SWMSC_Recent_Posts_Large extends WP_Widget {
	    function __construct() {
			$widget_ops = array('description' => esc_html__('Display latest blog posts with large image', 'pre-school-shortcodes'));	
			parent::__construct('swmsc_recent_posts_large_wid',$name = esc_html__('Custom - Recent Posts Large', 'pre-school-shortcodes'),$widget_ops);
	    }

	  	/* Displays the Widget in the front-end */
	    function widget($args, $instance){
			extract($args);
			$title = apply_filters('widget_title', !empty($instance['title']) ? $instance['title'] : esc_html__('Recent Posts', 'pre-school-shortcodes') );
			$no_title_char = !empty($instance['no_title_char']) ? $instance['no_title_char'] : '40' ;
			$no_of_posts = !empty($instance['no_of_posts']) ? $instance['no_of_posts'] : '4' ;		
			$add_category = !empty($instance['add_category']) ? $instance['add_category'] : '' ;	
			
			echo $before_widget;
			 if ( $title ) {
                echo $before_title . wp_kses($title,swmsc_kses_allowed_text()) . $after_title;      
            }
			echo '<div class="swmsc_recent_posts_large">';
			echo '<ul>';
			
			$cnt = 0;

			if($add_category != ""){
				$recentposts = new WP_Query('cat='.$add_category.'&posts_per_page='.intval($no_of_posts).'&orderby=date&order=DESC&meta_key=_thumbnail_id');
			}else{
				$recentposts = new WP_Query('posts_per_page='.intval($no_of_posts).'&orderby=date&order=DESC&meta_key=_thumbnail_id');
			}
			
			while($recentposts->have_posts()): $recentposts->the_post();							
			
			if($cnt < $no_of_posts && has_post_thumbnail() ){
			?>
				<li>
					<?php
					if(has_post_thumbnail()) { ?>
						<a href="<?php echo get_permalink(); ?>" title="<?php echo esc_attr(strip_tags(get_the_title())); ?>" class="mid_img"> 
							<?php the_post_thumbnail('swmsc-related-posts'); ?>
						</a>
						<?php
					}  ?>
								
					<div class="swmsc_recent_posts_large_title"><a href="<?php echo get_permalink(); ?>"><?php echo esc_attr(strip_tags(substr(get_the_title(),0,$no_title_char) )  ); ?></a></div>				
					
					<div class="clear"></div>
				</li>				
				<?php
				$cnt++;		
			}	

			endwhile;		

			echo '</ul>';
			echo '</div>';
			echo '<div class="clear"></div>';
			echo $after_widget;		
		}

	  	/*Saves the settings. */
	    function update($new_instance, $old_instance){
			$instance = $old_instance;
			$instance['title'] = stripslashes($new_instance['title']);
			$instance['no_title_char'] = stripslashes($new_instance['no_title_char']);
			$instance['no_of_posts'] = stripslashes($new_instance['no_of_posts']);		
			$instance['add_category'] = stripslashes($new_instance['add_category']);		
			
			return $instance;
		}
		
	    function form($instance){
			//Defaults
			$instance = wp_parse_args( (array) $instance, array('title'=> esc_html__('Recent Posts', 'pre-school-shortcodes'), 'no_title_char'=>'40','no_of_posts'=>'4','add_category'=>'' ) );
		
			echo '<p><label for="' . $this->get_field_id('title') . '">' . esc_html__('Widget Title:', 'pre-school-shortcodes') . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . htmlspecialchars($instance['title']) . '" /></p>';

			echo '<p><label for="' . $this->get_field_id('no_title_char') . '">' . esc_html__('Title Text Characters Limit:', 'pre-school-shortcodes') . '</label><input class="widefat" id="' . $this->get_field_id('no_title_char') . '" name="' . $this->get_field_name('no_title_char') . '" type="text" value="' . intval($instance['no_title_char']) . '" /></p>';
			
			echo '<p><label for="' . $this->get_field_id('no_of_posts') . '">' . esc_html__('Number of Posts to Display:', 'pre-school-shortcodes') . '</label><input class="widefat" id="' . $this->get_field_id('no_of_posts') . '" name="' . $this->get_field_name('no_of_posts') . '" type="text" value="' . intval($instance['no_of_posts']) . '" /></p>';			
			
			echo '<p><label for="' . $this->get_field_id('add_category') . '">' . esc_html__('Display Specific Categories:', 'pre-school-shortcodes') . '</label><input class="widefat" id="' . $this->get_field_id('add_category') . '" name="' . $this->get_field_name('add_category') . '" type="text" value="' . esc_attr($instance['add_category']) . '" /><br /><small>' . esc_html__('If you want to display specific category(ies) recent posts only, then add Category IDs with comma seperated (e.g. 1,2,3) or Leave it blank for default.', 'pre-school-shortcodes') . '</small></p>';	
			
		}
	}
}

function SWMSC_Recent_Posts_Large_Widget() {
  register_widget('SWMSC_Recent_Posts_Large');
}
add_action('widgets_init', 'SWMSC_Recent_Posts_Large_Widget');
?>