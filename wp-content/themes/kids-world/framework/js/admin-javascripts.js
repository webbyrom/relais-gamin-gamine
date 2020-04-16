(function ($) { $(document).ready(function() {

/* Post Metabox Display as per Post Format ------------------------------------------------------ */

function kidsworld_post_template_metabox() {

	// meta boxes
	var pf_metabox = $('#kidsworld-post-meta-box').css('display', 'none'),
		m_video = $( '.field-kidsworld_meta_video' ).css('display', 'none'),
		m_gallery = $( '#kidsworld-meta-box-gallery' ).css('display', 'none'),
		m_link = $( '#kidsworld-meta-box-link' ).css('display', 'none'),
		m_audio = $( '#kidsworld-meta-box-audio' ).css('display', 'none'),
		m_quote = $( '#kidsworld-meta-box-quote' ).css('display', 'none'),
		m_image = $( '#kidsworld-meta-box-image' ).css('display', 'none'),
		m_status = $('#postexcerpt').css('display', 'block'),
		video_onlick = $('#post-format-video'),
		gallery_onlick = $('#post-format-gallery'),
		link_onlick = $('#post-format-link'),
		audio_onlick = $('#post-format-audio'),
		quote_onlick = $('#post-format-quote'),
		image_onlick = $('#post-format-image');
		status_onlick = $('#post-format-status');

	// video
	if ( video_onlick.is(':checked') ) {
		m_video.css('display', 'block');
		pf_metabox.css('display', 'block');
	}
	// gallery
	if ( gallery_onlick.is(':checked') ) {
		m_gallery.css('display', 'block');
	}
	// link
	if ( link_onlick.is(':checked') ) {
		m_link.css('display', 'block');
	}
	// audio
	if ( audio_onlick.is(':checked') ) {
		m_audio.css('display', 'block');
	}
	// quote
	if ( quote_onlick.is(':checked') ) {
		m_quote.css('display', 'block');
	}
	// image
	if ( image_onlick.is(':checked') ) {
		m_image.css('display', 'block');
	}
	// status
	if ( status_onlick.is(':checked') ) {
		m_status .css('display', 'none');
	}

}

function kidsworldShowHideMetaElementsAll() {

	function kidsworldShowHideMetaElements(mainElement,subElement,value) {

		var selectedValue = $('input[name='+mainElement+']:checked').val();

		if (selectedValue == value){
			$(subElement).css('display','block');
		} else {
			$(subElement).css('display','none');
		}
	}

	kidsworldShowHideMetaElements('kidsworld_meta_sub_header_title_on','.kidsworld_meta_sub_header_title_elements','on');

	$("input[name=kidsworld_meta_sub_header_title_on]").on('click',function() {
		kidsworldShowHideMetaElements('kidsworld_meta_sub_header_title_on','.kidsworld_meta_sub_header_title_elements','on');
	});

	kidsworldShowHideMetaElements('kidsworld_meta_sub_header_on','.kidsworld_meta_subheader_fields','on');

	$("input[name=kidsworld_meta_sub_header_on]").on('click',function() {
		kidsworldShowHideMetaElements('kidsworld_meta_sub_header_on','.kidsworld_meta_subheader_fields','on');
	});

}

function kidsworld_page_header_options() {

var kidsworld_header_bg_field = $('.kidsworld_meta_header_background_fields').hide(),
	kidsworld_header_slider_field = $('.kidsworld_meta_header_revolution_fields').hide(),
	kidsworld_header_map_embed_field = $('.kidsworld_meta_header_google_map_embed_fields').hide(),
	kidsworld_header_map_field = $('.kidsworld_meta_header_google_map_fields').hide();

	var header_style = $( '#kidsworld_meta_header_style' ).val();

	if ( header_style == 'standard' ) {
			kidsworld_header_bg_field.show();
	}
	else if ( header_style == 'revolution_slider' ) {
		kidsworld_header_slider_field.show();
	}
	else if ( header_style == 'google_map_embed' ) {
		kidsworld_header_map_embed_field.show();
	}
	else if ( header_style == 'google_map' ) {
		kidsworld_header_map_field.show();
	}

	var get_kidsworld_meta_sub_header_on = $('input[name=kidsworld_meta_sub_header_on]:checked').val();

	if ( get_kidsworld_meta_sub_header_on == 'off' ||  get_kidsworld_meta_sub_header_on == 'default' ) {
		$('.kidsworld_meta_subheader_fields').hide();
	}

}


/* Page Options Display as per Page Template ------------------------------------------------------ */

function kidsworld_page_template_metabox() {

	// meta boxes
	var m_portfolio = $( '#kidsworld_portfolio_page_image_header' ).hide(),
		m_testimonials = $( '#kidsworld_testimonials_page' ).hide(),
		m_archives = $( '#kidsworld_archives_page' ).hide(),
		m_events = $( '#kidsworld_events_page' ).hide(),
		m_classes = $( '#kidsworld_classes_page' ).hide(),
		m_testimonials = $( '#kidsworld_testimonials_page' ).hide(),
		template = $( '#page_template' ).val();

	if ( template == 'templates/archives.php' ) { m_archives.show(); }
	if ( template == 'templates/testimonials.php' ) { m_testimonials.show(); }
	if ( template == 'templates/portfolio.php' ) { m_portfolio.show(); }
	if ( template == 'templates/events.php' ) { m_events.show(); }
	if ( template == 'templates/classes.php' ) { m_classes.show(); }
	if ( template == 'templates/testimonials.php' ) { m_testimonials.show(); }
}



/* Page Options Display as per Page Template ------------------------------------------------------ */

	/* Run all functions ------------------------------------------------------ */

	kidsworld_post_template_metabox();
	$( '#post-formats-select' ).on( 'change', kidsworld_post_template_metabox );

	kidsworld_page_template_metabox();
	$( '#page_template' ).on( 'change', kidsworld_page_template_metabox );

	jQuery('input#customizer-upload').change(function() {
		jQuery('#customizer-submit').removeAttr('disabled');
	});

	kidsworldShowHideMetaElementsAll();

	kidsworld_page_header_options();
	$( '#kidsworld_meta_header_style' ).on( 'change', kidsworld_page_header_options );



}); })(jQuery); // if document ready