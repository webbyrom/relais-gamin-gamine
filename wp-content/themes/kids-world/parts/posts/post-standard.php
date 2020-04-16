<?php 
$kidsworld_post_date_on 		= is_single() ? kidsworld_get_option('kidsworld_single_date_on','on') : kidsworld_get_option('kidsworld_date_on','on');
$kidsworld_post_author_name 	= is_single() ? kidsworld_get_option('kidsworld_single_author_name_on','on') : kidsworld_get_option('kidsworld_author_name_on','on');
$kidsworld_post_cats 			= is_single() ? kidsworld_get_option('kidsworld_single_cats_on','on') : kidsworld_get_option('kidsworld_cats_on','on');
$kidsworld_post_views 		= is_single() ? kidsworld_get_option('kidsworld_single_views_on','on') : kidsworld_get_option('kidsworld_views_on','on');
$kidsworld_post_likes 		= is_single() ? kidsworld_get_option('kidsworld_single_likes_on','on') : kidsworld_get_option('kidsworld_likes_on','on');
$kidsworld_post_comments 		= is_single() ? kidsworld_get_option('kidsworld_single_comments_on','on') : kidsworld_get_option('kidsworld_comments_on','on');
$kidsworld_post_tags 			= kidsworld_get_option('kidsworld_single_tags_on','on');
$kidsworld_post_share 		= kidsworld_get_option('kidsworld_single_share_on','on');
$kidsworld_post_button 		= kidsworld_get_option('kidsworld_post_button_on','on');
$kidsworld_get_pf_data		= kidsworld_display_post_format();
$kidsworld_excerpt_on 		= kidsworld_get_option('kidsworld_excerpt_on','on');
?>	
<div class="kidsworld_post_content">
	<?php if ($kidsworld_get_pf_data != '' ) { ?>			
		<div class="kidsworld_post_image">				
			<?php echo $kidsworld_get_pf_data; ?>
		</div>
	<?php } ?>	

	<div class="kidsworld_post_content_block <?php if ($kidsworld_get_pf_data == '' ) { echo 'kidsworld_noPostData'; } ?> <?php if ( $kidsworld_excerpt_on == 'on' && !is_single() ) { echo 'kidsworld_postExcerptOn'; } ?>">
		<div class="kidsworld_post_title_content <?php if ( $kidsworld_post_date_on == 'on' ) { echo 'kidsworld_postDateOn'; } ?>">				

			<?php if ( $kidsworld_post_date_on == 'on' ) { ?>
			
				<div class="kidsworld_post_date_pf_icon kidsworld_js_center">
					<span class="kidsworld_post_date">

					<?php if ( is_sticky() ) {
						echo '<i class="swn_sticky_post fa fa-thumb-tack"></i>';
					} ?>

						<?php echo get_the_date(); ?>
					</span>									
					<div class="clear"></div>
				</div>

			<?php } ?>

			<?php echo kidsworld_post_title(); ?>

			<?php if ( $kidsworld_post_date_on == 'on' || $kidsworld_post_author_name == 'on' || $kidsworld_post_views == 'on' || $kidsworld_post_likes == 'on' || $kidsworld_post_comments == 'on' || $kidsworld_post_cats == 'on' ) { ?>
			
				<div class="kidsworld_post_meta">
					<ul>						

						<?php if ( $kidsworld_post_author_name == 'on' ) { ?>
							<li><i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo esc_html(get_the_author()); ?></a></li> 
						<?php } ?>					
							
						<?php if ( $kidsworld_post_views == 'on' ) { ?>
						<li><i class="fa fa-eye"></i><?php  if ( is_single() ) {
								echo kidsworld_set_post_views(get_the_ID()) .' '.esc_html__('Views', 'kids-world');
							} else {
								echo kidsworld_get_post_views(get_the_ID()) .' '.esc_html__('Views', 'kids-world');
							} ?></li>
						<?php } ?>

						<?php if ( $kidsworld_post_likes == 'on' ) { ?>
						<li><i class="fa fa-heart-o"></i><?php echo kidsworld_love().' '.esc_html__('Likes', 'kids-world'); ?></li>
						<?php } ?>

						<?php if ( $kidsworld_post_comments == 'on' ) { ?>
							<li><a href="<?php echo esc_url(get_comments_link()); ?>"><i class="fa fa-comments-o"></i><?php kidsworld_get_comments_number(); ?> </a> </li> 
						<?php } ?>

						<?php if ( $kidsworld_post_cats == 'on' ) { ?>
							<li><i class="fa fa-folder-o"></i><?php
								$kidsworld_meta_cats = get_the_category();		
								$kidsworld_meta_cat_list = array();

								if($kidsworld_meta_cats){					
									foreach($kidsworld_meta_cats as $category) {
										$kidsworld_meta_cat_list[] = '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( esc_html__( 'View all posts in %s', 'kids-world' ), $category->name ) ) . '" >'.esc_html($category->cat_name).'</a>';
									}		 
								 	echo implode(', ', $kidsworld_meta_cat_list);				 	
								} ?>
							</li>
						<?php } ?>

					</ul>
					<div class="clear"></div>
				</div>	

			<?php } ?>

		</div>

		<div class="kidsworld_post_text">											

			<?php echo kidsworld_post_summary_content(); ?>	

			<?php if ( is_single() ) { ?>

				<?php if ( $kidsworld_post_tags == 'on' || $kidsworld_post_share == 'on' ) { ?>

					<div class="kidsworld_post_bottom_meta">
						<?php if ( is_single() && $kidsworld_post_tags == 'on' && get_the_tag_list() != '' ) { ?>
							<div class="kidsworld_post_tags">
								<i class="fa fa-tag"></i><?php echo get_the_tag_list(); ?>
							</div>					
						<?php } ?>

						<?php if ( is_single() && $kidsworld_post_share == 'on' ) {
							echo kidsworld_post_share_icons(get_the_ID()); ?>				
						<?php } ?>
						 <div class="clear"></div>
					</div>

					<div class="clear"></div>

					<?php } ?>
			
			<?php } ?>
			
		</div>

		<div class="clear"></div>

		<?php if ( $kidsworld_post_button == 'on' && !is_single() ) { ?>
			<div class="kidsworld_post_button">
				<a href="<?php echo get_permalink(); ?>">
					<span><?php echo wp_kses( kidsworld_get_option('kidsworld_post_button_text','READ MORE'),kidsworld_kses_allowed_text() ); ?></span>
				</a>
			</div>
		<?php } ?>

		<div class="clear"></div>

	</div>	<!-- .kidsworld_post_content_block -->			

</div> <!-- .kidsworld_post_content -->
		
<div class="clear"></div>