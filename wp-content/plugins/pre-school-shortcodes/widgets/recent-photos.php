<?php 
if ( !class_exists( 'SWMSC_Recent_Photos' ) ) {
	class SWMSC_Recent_Photos extends WP_Widget {
		
	    function __construct() {
			$widget_ops = array('description' => __('Display latest portfolio items', 'pre-school-shortcodes'));	
			parent::__construct('swmsc_recent_work_wid',$name = __('Custom - Recent Photos', 'pre-school-shortcodes'),$widget_ops);
	    }

	  /* Displays the Widget in the front-end */
	    function widget($args, $instance){
			extract($args);
			$title = apply_filters('widget_title', !empty($instance['title']) ? $instance['title'] : __('Recent Work', 'pre-school-shortcodes') );
			$no_of_posts = !empty($instance['no_of_posts']) ? $instance['no_of_posts'] : '6' ;		
			$add_category = !empty($instance['add_category']) ? $instance['add_category'] : '' ;		

			echo $before_widget;
			echo $before_title . $title . $after_title;		
			echo '<div class="recent_photos_widget swmsc_wid_gal">';
			echo '<ul>';
			
			$cnt = 0;

			if($add_category != ""){
				$recentposts = new WP_Query('cat='.$add_category.'&posts_per_page='.$no_of_posts.'&orderby=date&order=DESC&post_type=portfolio');
			}else{
				$recentposts = new WP_Query('posts_per_page='.$no_of_posts.'&orderby=date&order=DESC&post_type=portfolio');
			}
			
			while($recentposts->have_posts()): $recentposts->the_post();			
			
			if($cnt < $no_of_posts){
			?>
				<li>
					<?php
					if(has_post_thumbnail()) { ?>
						<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="swmsc_recent_posts_tiny_img"> 
							<?php the_post_thumbnail('swmsc-recent-post-tiny'); ?>
						</a>
						<?php
					}   ?>				
				</li>			
				
				<?php	

				$cnt++;		
			}	

			endwhile;		

			echo '</ul>';
			echo '<div class="clear"></div>';
			echo '</div>';		
			echo $after_widget;		
		}

	  /*Saves the settings. */
	    function update($new_instance, $old_instance){
			$instance = $old_instance;
			$instance['title'] = stripslashes($new_instance['title']);
			$instance['no_of_posts'] = stripslashes($new_instance['no_of_posts']);		
			$instance['add_category'] = stripslashes($new_instance['add_category']);		
			
			return $instance;
		}
		
	    function form($instance){
			//Defaults
			$instance = wp_parse_args( (array) $instance, array('title'=> __('Recent Photos', 'pre-school-shortcodes'), 'no_of_posts'=>'6','add_category'=>'','blog_summery_text'=>'50', 'readmore_btn'=> __('read more', 'pre-school-shortcodes')) );

			$title = htmlspecialchars($instance['title']);
			$no_of_posts = $instance['no_of_posts'];		
			$add_category = $instance['add_category'];		
			
			echo '<p><label for="' . $this->get_field_id('title') . '">' . __('Widget Title:', 'pre-school-shortcodes') . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
			
			echo '<p><label for="' . $this->get_field_id('no_of_posts') . '">' . __('Number of Posts to Display:', 'pre-school-shortcodes') . '</label><input class="widefat" id="' . $this->get_field_id('no_of_posts') . '" name="' . $this->get_field_name('no_of_posts') . '" type="text" value="' . $no_of_posts . '" /></p>';		
			
			
			echo '<p><label for="' . $this->get_field_id('add_category') . '">' . __('Display Specific Categories:', 'pre-school-shortcodes') . '</label><input class="widefat" id="' . $this->get_field_id('add_category') . '" name="' . $this->get_field_name('add_category') . '" type="text" value="' . $add_category . '" /><br /><small>' . __('If you want to display specific category(ies) recent work only, then add Category IDs with comma seperated (e.g. 1,2,3) or <strong>Leave it blank for default.</strong>', 'pre-school-shortcodes') . '</small></p>';	
			
		}
	}
}

function SWMSC_Recent_Photos_Widget() {
  register_widget('SWMSC_Recent_Photos');
}
add_action('widgets_init', 'SWMSC_Recent_Photos_Widget');
?>