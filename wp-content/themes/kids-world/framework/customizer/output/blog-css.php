
.kidsworld_post_title h2,.kidsworld_post_title h2 a,.kidsworld_post_title h1 { 
	color:<?php echo $kidsworld_post_title_color; ?>; 
	font-size:<?php echo $kidsworld_post_title_size; ?>px;
	letter-spacing:<?php echo $kidsworld_post_title_letter_space; ?>px;
	text-transform:<?php echo $kidsworld_post_title_transform; ?>;
	font-style:<?php echo $kidsworld_post_title_text_style; ?>;
	line-height:<?php echo $kidsworld_post_title_lineheight; ?>px;
	}

.kidsworld_post_title h2 a:hover { color:<?php echo $kidsworld_post_title_hover_color; ?>; }

<?php if ( is_single() ) { ?>

	.kidsworld_post_title h1  {
		font-size:<?php echo $kidsworld_single_post_title_size; ?>px;
		letter-spacing:<?php echo $kidsworld_single_post_title_letter_space; ?>px;
		line-height:<?php echo $kidsworld_single_post_title_lineheight; ?>px;
		text-transform:<?php echo $kidsworld_single_post_title_transform; ?>;
		font-style:<?php echo $kidsworld_single_post_title_text_style; ?>;
	}

<?php } ?>

.kidsworld_post_date { background:<?php echo $kidsworld_post_box_bg; ?>; color:<?php echo $kidsworld_post_box_text_color; ?>;  }

h5.kidsworld_single_pg_titles,
#comments h5.kidsworld_single_pg_titles,
#respond h3.comment-reply-title { 
	color:<?php echo $kidsworld_post_single_section_ttl_col; ?>; 
	font-size:<?php echo $kidsworld_post_single_section_ttl_size; ?>px;
	letter-spacing:<?php echo $kidsworld_post_single_section_ttl_letter_space; ?>px;
	text-transform:<?php echo $kidsworld_post_single_section_ttl_transform; ?>;
	font-style:<?php echo $kidsworld_post_single_section_ttl_style; ?>;
	line-height:<?php echo $kidsworld_post_single_section_ttl_lineheight; ?>px;
}

.kidsworld_about_author .kidsworld_single_pg_titles a { color:<?php echo $kidsworld_post_single_section_ttl_col; ?>; }

.kidsworld_related_link a,.kidsworld_next_prev_box a,.comment_author a { color:<?php echo $kidsworld_content_color; ?>; }
#comments .kidsworld_comment_reply a.comment-reply-link:hover,.kidsworld_related_link a:hover,.kidsworld_next_prev_box:hover a { color:<?php echo $kidsworld_content_link_hover_color; ?>; } 
#respond input[type="submit"] { background:<?php echo $kidsworld_skin_color; ?>;  }
#comments .kidsworld_comment_reply a.comment-reply-link { color:<?php echo $kidsworld_skin_color; ?>; }
.kidsworld_next_prev_box:hover a span, .kidsworld_next_prev_box:hover a i { color:<?php echo $kidsworld_skin_text_color; ?>; }
.kidsworld_next_prev_box:hover { background:<?php echo $kidsworld_skin_color; ?>;  }
h3.comment-reply-title:after,h5.kidsworld_single_pg_titles:after { background: <?php echo $kidsworld_post_single_section_ttl_border; ?>; }
h3.comment-reply-title span:after,h5.kidsworld_single_pg_titles span:after, h3.comment-reply-title span:after  { border:1px solid <?php echo $kidsworld_post_single_section_ttl_border_circle; ?>; }

@media only screen and (max-width: 767px) { 
}

