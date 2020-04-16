<?php
$kidsworld_prev_post = get_previous_post();
$kidsworld_next_post = get_next_post();

if ( !empty( $kidsworld_prev_post ) || !empty( $kidsworld_next_post ) ) { ?>

<div class="kidsworld_post_single_pagination kidsworld_post_inner_bg">

	<?php if (!empty( $kidsworld_prev_post )) { ?>
		<div class="kidsworld_pp_prev kidsworld_next_prev_box">
		<a href="<?php echo esc_url( get_permalink( $kidsworld_prev_post->ID ) );?>">
		<div class="kidsworld_pp_arrow">
		<i class="fa fa-angle-left"></i>
		</div>
		<div class="kidsworld_pp_link">
		<span class="kidsworld_pp_link_text"><?php echo esc_html__('Previous Post','kids-world'); ?></span>
		<span class="kidsworld_pp_link_title"><?php echo esc_attr( get_the_title( $kidsworld_prev_post->ID ) ); ?></span>
		</div>
		</a>
		</div>
	<?php } ?>

	<?php if (!empty( $kidsworld_next_post )) { ?>
		<div class="kidsworld_pp_next kidsworld_next_prev_box">
		<a href="<?php echo esc_url( get_permalink( $kidsworld_next_post->ID ) ); ?>">
		<div class="kidsworld_pp_arrow">
		<i class="fa fa-angle-right"></i>
		</div>
		<div class="kidsworld_pp_link">
		<span class="kidsworld_pp_link_text"><?php echo esc_html__('Next Post','kids-world'); ?></span>
		<span class="kidsworld_pp_link_title"><?php echo esc_attr( get_the_title( $kidsworld_next_post->ID ) ); ?></span>			
		</div>
		</a>
		</div>			
	<?php } ?>

	<div class="clear"></div>
	</div>

<?php } ?>