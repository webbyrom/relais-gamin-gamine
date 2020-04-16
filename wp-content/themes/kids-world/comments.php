<?php

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die (esc_html_e( 'Please do not load this page directly. Thanks!', 'kids-world' ));

if ( post_password_required() ) { ?>
	<div id="comments" class="kidsworld_comments kidsworld_content_wrap">
		<p class="kidsworld_nocomments">
			<?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'kids-world' ); ?>
		</p>
	</div>	
	<?php 
	return; 
} ?>

<!-- Blog Responses Start -->

<?php if ( have_comments() ) : ?>
		
		<div class="kidsworld_content_wrap kidsworld_post_inner_bg">				
			<div id="comments" class="kidsworld_comments">

				<h5 class="kidsworld_single_pg_titles"><span><?php comments_number(esc_html__( 'No Comments', 'kids-world' ), esc_html__( 'One Comment', 'kids-world' ), esc_html__( '% Comments', 'kids-world' ) );?></span></h5>
				<?php
				/* -----------------------------
					Comments Listing
				----------------------------- */ ?>

				<section id="comment-wrap">
					<ol class="commentlist">	
						<?php wp_list_comments( array( 'callback' => 'kidsworld_comment_listing' ) );	?>
					</ol>
					<div class="clear"></div>
				</section>
			
				<?php
				/* -----------------------------
					Comments Pagination
				----------------------------- */ ?>

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

					<div class="kidsworld-paginate-com">
						<?php paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;')); ?>
						<div class="clear"></div>
					</div>
			 
				<?php endif; ?>

			</div><!-- #comments -->

		</div> 
	<?php
	else : // this is displayed if there are no comments so far

			if ( comments_open() ) : 
				
				/* If comments are open, but there are no comments. */
	
			else : // comments are closed ?>
				<div id="comments"  class="kidsworld_border_box kidsworld_content_wrap kidsworld_post_inner_bg">
					<p class="kidsworld_nocomments">
						<?php esc_html_e( 'Comments are closed.', 'kids-world' ); ?>
					</p>
				</div>

		<?php endif;	
	
	endif; ?>
<!-- Blog Responses End -->

<div class="clear"></div>

<?php

$kidsworld_num_comments = get_comments_number();

if ($kidsworld_num_comments != 0 ) { ?>
	
<?php }

?>	

<?php
/* ----------------------------------------------------------------------------------
	Comments Form
---------------------------------------------------------------------------------- */ ?>


<?php if ( comments_open() ) : ?>
	
		<?php 
		comment_form( array(
			'label_submit' => esc_html__( 'SUBMIT', 'kids-world' ), 
			'title_reply' => '<span>' . esc_attr__( 'Leave a Reply', 'kids-world' ) . '</span>', 
			'cancel_reply_link' => esc_html__( 'Cancel Reply' , 'kids-world' ), 
			'title_reply_to' => '<span>' . esc_attr__( 'Leave a Reply</span>' , 'kids-world' ) . '</span>'
			) 
		); 
		?>

<?php endif;?>
<div class="clear"></div>
