<?php
if ( !class_exists( 'SWMSC_Tabs_Widget_Class' ) ) {
	class SWMSC_Tabs_Widget_Class extends WP_Widget {
	    function __construct() {
			$widget_ops = array('description' => esc_html__('Display latest, popular posts and comments', 'pre-school-shortcodes'));
			parent::__construct('swmsc_tabs_wid',$name = esc_html__('Custom - Tabs Widget', 'pre-school-shortcodes'),$widget_ops);
	    }

	  	/* Displays the Widget in the front-end */
	    function widget($args, $instance){

	    	global $data, $post;
			extract($args);
			$no_title_char = !empty($instance['no_title_char']) ? $instance['no_title_char'] : '40' ;
			$no_of_popular_posts = !empty($instance['no_of_popular_posts']) ? $instance['no_of_popular_posts'] : '3' ;
			$no_of_recent_posts = !empty($instance['no_of_recent_posts']) ? $instance['no_of_recent_posts'] : '3' ;
			$no_of_comments = !empty($instance['no_of_comments']) ? $instance['no_of_comments'] : '3' ;
			$show_popular_posts = isset($instance['show_popular_posts']) ? 'true' : 'false';
			$show_recent_posts = isset($instance['show_recent_posts']) ? 'true' : 'false';
			$show_comments = isset($instance['show_comments']) ? 'true' : 'false';
			$add_category = !empty($instance['add_category']) ? $instance['add_category'] : '' ;
			$background_color = !empty($instance['background_color']) ? $instance['background_color'] : '#444444' ;

			$orderby = isset($instance['orderby']) ? $instance['orderby'] : 'comments' ;

			?>

			<div class="swmsc_widget_tabs">
				<div class="swmsc_wid_tabs_holder">

					<ul id="swmsc_wid_tabs" class="swmsc_wid_tabs">
						<?php if($show_popular_posts == 'true'): ?>
						<li><a href="#wid_tab_popular"><?php echo esc_html__('Popular', 'pre-school-shortcodes'); ?></a></li>
						<?php endif; ?>
						<?php if($show_recent_posts == 'true'): ?>
						<li><a href="#wid_tab_recent"><?php echo esc_html__('Recent', 'pre-school-shortcodes'); ?></a></li>
						<?php endif; ?>
						<?php if($show_comments == 'true'): ?>
						<li><a href="#wid_tab_comments"><?php echo esc_html__('Comments', 'pre-school-shortcodes'); ?></a></li>
						<?php endif; ?>
					</ul>
					<div class="swmsc_wid_tabs_container">

						<?php
						if ( $show_popular_posts == 'true' ): ?>

							<div id="wid_tab_popular" class="swmsc_wid_tab_content" style="display: none;">
								<div class="swmsc_recent_posts_tiny">
									<ul>

										<?php

										$cnt = 0;

										if($orderby == 'comments') {
											$order_string = '&orderby=comment_count';
										} else {
											$order_string = '&meta_key=post_views_count&orderby=meta_value_num';
										}
										$popular_posts = new WP_Query('showposts='.$no_of_popular_posts.$order_string.'&order=DESC');

										while($popular_posts->have_posts()): $popular_posts->the_post();

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

										if ( $cnt < intval($no_of_popular_posts) ){
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

										endwhile;	?>

									</ul>
								</div>
							</div>
							<div class="clear"></div>
							<?php

						endif; //if...show_popular_posts

						if ( $show_recent_posts == 'true' ): ?>

							<div id="wid_tab_recent" class="swmsc_wid_tab_content" style="display: none;">
								<div class="swmsc_recent_posts_tiny">
									<ul>

										<?php

										$cnt = 0;

										if ($add_category != ""){
											$recentposts = new WP_Query('cat='.$add_category.'&posts_per_page='.intval($no_of_recent_posts).'&orderby=date&order=DESC');
										} else {
											$recentposts = new WP_Query('posts_per_page='.intval($no_of_recent_posts).'&orderby=date&order=DESC');
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

										if ( $cnt < intval($no_of_recent_posts) ){
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

										endwhile;	?>

									</ul>
								</div>
							</div>
							<div class="clear"></div>
							<?php

						endif; //if...show_recent_posts
						?>

						<?php if($show_comments == 'true'): ?>
						<div id="wid_tab_comments" class="swmsc_wid_tab_content" style="display: none;">
							<div class="swmsc_recent_posts_tiny">
								<ul>
									<?php
									$number = intval($instance['no_of_comments']);
									global $wpdb;
									$recent_comments = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved, comment_type, comment_author_url, SUBSTRING(comment_content,1,210) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT $number";
									$the_comments = $wpdb->get_results($recent_comments);
									foreach($the_comments as $comment) { ?>
									<li>
										<div class="swmsc_recent_posts_tiny_content">
											<a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>" title="<?php echo strip_tags($comment->comment_author); ?> on <?php echo esc_attr($comment->post_title); ?>"><?php echo get_avatar($comment, '75'); ?> </a>

											<div class="swmsc_recent_posts_tiny_title">
											<a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>" title="<?php echo strip_tags($comment->comment_author); ?> on <?php echo esc_attr($comment->post_title); ?>"><?php echo strip_tags($comment->comment_author); ?> says:</a>
											</div>
											<div>
												<p><?php echo strip_tags(substr($comment->com_excerpt,0,100)); ?>...</p>
											</div>
										</div>
										<div class="clear"></div>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<?php endif;  //if...show_comments
						?>
					</div><div class="clear"></div>
				</div><div class="clear"></div>
			</div> <!-- swmsc_widget_tabs -->

		<?php

		}

	  	/*Saves the settings. */
	    function update($new_instance, $old_instance){
			$instance = $old_instance;
			$instance['no_title_char'] = stripslashes($new_instance['no_title_char']);
			$instance['no_of_popular_posts'] = stripslashes($new_instance['no_of_popular_posts']);
			$instance['no_of_recent_posts'] = stripslashes($new_instance['no_of_recent_posts']);
			$instance['no_of_comments'] = stripslashes($new_instance['no_of_comments']);
			$instance['show_popular_posts'] = $new_instance['show_popular_posts'];
			$instance['show_recent_posts'] = $new_instance['show_recent_posts'];
			$instance['show_comments'] = $new_instance['show_comments'];
			$instance['add_category'] = stripslashes($new_instance['add_category']);
			$instance['orderby'] = $new_instance['orderby'];
			$instance['background_color'] = $new_instance['background_color'];

			return $instance;
		}

	    function form($instance){
			//Defaults
			$instance = wp_parse_args( (array) $instance, array('no_title_char'=>'40','show_popular_posts'=> 'on','show_recent_posts'=> 'on','show_comments'=> 'on','no_of_popular_posts'=>'3','no_of_recent_posts'=>'3','no_of_comments'=>'3','add_category'=>'','orderby' => 'comments','background_color' => '#444444' ) );
			?>
			<p>
    			<input class="checkbox" type="checkbox" <?php checked($instance['show_popular_posts'], 'on') ?> id="<?php echo $this->get_field_id('show_popular_posts'); ?>" name="<?php echo $this->get_field_name('show_popular_posts'); ?>" />
    			<label for="<?php echo $this->get_field_id('show_popular_posts'); ?>"><?php esc_html_e('Show popular posts', 'pre-school-shortcodes') ?></label>
    		</p>
			<p>
				<input class="checkbox" type="checkbox" <?php checked($instance['show_recent_posts'], 'on'); ?> id="<?php echo $this->get_field_id('show_recent_posts'); ?>" name="<?php echo $this->get_field_name('show_recent_posts'); ?>" />
				<label for="<?php echo $this->get_field_id('show_recent_posts'); ?>"><?php echo esc_html__('Show recent posts', 'pre-school-shortcodes'); ?></label>
			</p>
			<p>
				<input class="checkbox" type="checkbox" <?php checked($instance['show_comments'], 'on'); ?> id="<?php echo $this->get_field_id('show_comments'); ?>" name="<?php echo $this->get_field_name('show_comments'); ?>" />
				<label for="<?php echo $this->get_field_id('show_comments'); ?>"><?php echo esc_html__('Show comments', 'pre-school-shortcodes'); ?></label>
			</p>

			<hr/>
			<p>
				<label for="<?php echo $this->get_field_id('no_of_popular_posts'); ?>"><?php echo esc_html__('Number of popular posts:', 'pre-school-shortcodes'); ?></label>
				<input class="widefat" type="text" style="width: 30px;" id="<?php echo $this->get_field_id('no_of_popular_posts'); ?>" name="<?php echo $this->get_field_name('no_of_popular_posts'); ?>" value="<?php echo intval($instance['no_of_popular_posts']); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('no_of_recent_posts'); ?>"><?php echo esc_html__('Number of recent posts:', 'pre-school-shortcodes'); ?></label>
				<input class="widefat" type="text" style="width: 30px;" id="<?php echo $this->get_field_id('no_of_recent_posts'); ?>" name="<?php echo $this->get_field_name('no_of_recent_posts'); ?>" value="<?php echo intval($instance['no_of_recent_posts']); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('no_of_comments'); ?>"><?php echo esc_html__('Number of comments:', 'pre-school-shortcodes'); ?></label>
				<input class="widefat" type="text" style="width: 30px;" id="<?php echo $this->get_field_id('no_of_comments'); ?>" name="<?php echo $this->get_field_name('no_of_comments'); ?>" value="<?php echo intval($instance['no_of_comments']); ?>" />
			</p>
			<hr/>
			<p>
				<label for="<?php echo $this->get_field_id('no_title_char'); ?>"><?php echo esc_html__('Title Text Characters Limit:', 'pre-school-shortcodes'); ?></label>
				<input class="widefat" type="text" style="width: 60px;" id="<?php echo $this->get_field_id('no_title_char'); ?>" name="<?php echo $this->get_field_name('no_title_char'); ?>" value="<?php echo intval($instance['no_title_char']); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php echo esc_html__('Popular Posts Order By:', 'pre-school-shortcodes'); ?></label>
				<select id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>" class="widefat" style="width:100%;">
					<option value="comments" <?php if ( $instance['orderby'] == 'comments') { echo 'selected="selected"'; } ?>><?php echo esc_html__('Comments', 'pre-school-shortcodes'); ?></option>
					<option value="views" <?php if ( $instance['orderby'] == 'views') { echo 'selected="selected"'; } ?>><?php echo esc_html__('Views', 'pre-school-shortcodes'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('add_category'); ?>"><?php echo esc_html__('Display Specific Categories Recent Posts:', 'pre-school-shortcodes'); ?></label>
				<input class="widefat" type="text"  id="<?php echo $this->get_field_id('add_category'); ?>" name="<?php echo $this->get_field_name('add_category'); ?>" value="<?php echo esc_attr($instance['add_category']); ?>" /><small><?php echo esc_html__('If you want to display specific category(ies) recent posts only, then add Category IDs with comma seperated (e.g. 1,2,3) or Leave it blank for default.', 'pre-school-shortcodes');?></small>
			</p>
			<hr/>
			<small><strong><?php echo esc_html__('READ ME:', 'pre-school-shortcodes'); ?></strong> <?php echo esc_html__('You can edit tab text color, size, background etc. from', 'pre-school-shortcodes'); ?> <br />
			<?php echo esc_html__('(for sidebar) Admin > Customizer > Sidebar > Sidebar Widget Tab Styling Section.', 'pre-school-shortcodes'); ?><br />
			<?php echo esc_html__('(for footer) Admin > Customizer > Footer Options > Widget Footer > Footer Widget Tab Styling Section', 'pre-school-shortcodes'); ?></small><br /><br />
		<?php

		}
	}
}

function SWMSC_Tabs_Widget() {
  register_widget('SWMSC_Tabs_Widget_Class');
}
add_action('widgets_init', 'SWMSC_Tabs_Widget');
?>