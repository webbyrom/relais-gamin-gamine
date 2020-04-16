<?php
global $post;
$output = '';
$kidsworld_get_related = kidsworld_get_related_posts($post->ID, 3);

if ( $kidsworld_get_related->have_posts() ) {  ?>
	
	<div class="kidsworld_related_posts_wrap kidsworld_content_wrap kidsworld_post_inner_bg">	
		<div class="kidsworld_related_posts kidsworld_content_border">
			<h5 class="kidsworld_single_pg_titles"><span><?php echo esc_html__('Related Posts', 'kids-world'); ?></span></h5>
			<ul>
				<?php
				while($kidsworld_get_related->have_posts()): $kidsworld_get_related->the_post();
					if (has_post_thumbnail()): ?>
						<li>	
							<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
								<div class="kidsworld_related_post_img">	
									<a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'kidsworld-related-posts' ); ?></a>
								</div>
							<?php } ?>								
							<div class="kidsworld_related_post_text">								
								<span class="kidsworld_related_link"><h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6></span>
								<span class="kidsworld_related_date"> <?php echo get_the_date(); ?></span>
							</div>
						</li>
						<?php
					endif;
				endwhile; ?>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
		
<?php } ?>

<?php wp_reset_postdata(); ?>