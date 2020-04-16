<?php 
if ( !class_exists( 'SWMSC_Recent_Posts' ) ) {
	class SWMSC_Recent_Posts extends WP_Widget {
	    function __construct() {
			$widget_ops = array('description' => esc_html__('Display latest blog posts', 'pre-school-shortcodes'));	
			parent::__construct('swmsc_recent_posts_wid',$name = esc_html__('Custom - Recent Posts', 'pre-school-shortcodes'),$widget_ops);
	    }

	  	/* Displays the Widget in the front-end */
	    function widget($args, $instance){
			extract($args);
			$title = apply_filters('widget_title', !empty($instance['title']) ? $instance['title'] : esc_html__('Recent Posts', 'pre-school-shortcodes') );
			$no_title_char = !empty($instance['no_title_char']) ? $instance['no_title_char'] : '40' ;
			$no_of_posts = !empty($instance['no_of_posts']) ? $instance['no_of_posts'] : '4' ;		
			$add_category = !empty($instance['add_category']) ? $instance['add_category'] : '' ;	
			

			echo $before_widget;
			echo $before_title . $title . $after_title;		
			echo '<div class="swmsc_recent_posts_tiny">';
			echo '<ul>';		
			
			$cnt = 0;

			if($add_category != ""){
				$recentposts = new WP_Query('cat='.$add_category.'&posts_per_page='.intval($no_of_posts).'&orderby=date&order=DESC');
			}else{
				$recentposts = new WP_Query('posts_per_page='.intval($no_of_posts).'&orderby=date&order=DESC');
			}
			
			while($recentposts->have_posts()): $recentposts->the_post();		
				
				$format = get_post_format(); 

				$rcp_icon = '';

				switch ( $format ) {

					case 'link': $rcp_icon = 'link';
						break;
					case 'aside': $rcp_icon = 'pencil';
						break;
					case 'image': $rcp_icon = 'camera';
						break;
					case 'gallery': $rcp_icon = 'th-large';
						break;
					case 'video': $rcp_icon = 'video-camera';
						break;
					case 'audio': $rcp_icon = 'volume-up';
						break;
					case 'chat': $rcp_icon = 'comments';
						break;
					case 'quote': $rcp_icon = 'quote-left';
						break;
					default: $rcp_icon = 'file-text-o';
						break;
				}				
			
			if($cnt < $no_of_posts){
			?>
				<li>
					<?php
					if(has_post_thumbnail()) { ?>
						<a href="<?php echo get_permalink(); ?>" title="<?php echo esc_attr(strip_tags(get_the_title())); ?>" class="swmsc_recent_posts_tiny_img"> 
							<?php the_post_thumbnail('swmsc-recent-post-tiny'); ?>
						</a>
						<?php
					} else { ?>
						<a href="<?php echo get_permalink(); ?>" title="<?php echo esc_attr(strip_tags(get_the_title())); ?>" class="swmsc_recent_posts_tiny_icon"> 
						<i class="fa fa-<?php echo $rcp_icon; ?>"></i>
					</a>
						<?php
					}  ?>

					<div class="swmsc_recent_posts_tiny_content">				
						<div class="swmsc_recent_posts_tiny_title"><a href="<?php echo get_permalink(); ?>"><?php echo esc_attr(strip_tags(substr(get_the_title(),0,$no_title_char) )  ); ?></a></div>	
						<p><span><?php echo get_the_date('M j, Y'); ?></span> / <span><a href="<?php echo get_comments_link(); ?>" title="<?php echo swmsc_get_comments_number(); ?>" ><?php echo get_comments_number(); ?> <?php echo esc_html__('Comments', 'pre-school-shortcodes'); ?></a></span></p>
					</div>

					
					
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
			
			echo '<p><label for="' . $this->get_field_id('title') . '">' . esc_html__('Widget Title:', 'pre-school-shortcodes') . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($instance['title']) . '" /></p>';

			echo '<p><label for="' . $this->get_field_id('no_title_char') . '">' . esc_html__('Title Text Characters Limit:', 'pre-school-shortcodes') . '</label><input class="widefat" id="' . $this->get_field_id('no_title_char') . '" name="' . $this->get_field_name('no_title_char') . '" type="text" value="' . intval($instance['no_title_char']) . '" /></p>';
			
			echo '<p><label for="' . $this->get_field_id('no_of_posts') . '">' . esc_html__('Number of Posts to Display:', 'pre-school-shortcodes') . '</label><input class="widefat" id="' . $this->get_field_id('no_of_posts') . '" name="' . $this->get_field_name('no_of_posts') . '" type="text" value="' . intval($instance['no_of_posts']) . '" /></p>';		
			
			
			echo '<p><label for="' . $this->get_field_id('add_category') . '">' . esc_html__('Display Specific Categories:', 'pre-school-shortcodes') . '</label><input class="widefat" id="' . $this->get_field_id('add_category') . '" name="' . $this->get_field_name('add_category') . '" type="text" value="' . esc_attr($instance['add_category']) . '" /><br /><small>' . esc_html__('If you want to display specific category(ies) recent posts only, then add Category IDs with comma seperated (e.g. 1,2,3) or Leave it blank for default.', 'pre-school-shortcodes') . '</small></p>';	
			
		}
	}
}

function SWMSC_Recent_Posts_Widget() {
  register_widget('SWMSC_Recent_Posts');
}
add_action('widgets_init', 'SWMSC_Recent_Posts_Widget');
?>