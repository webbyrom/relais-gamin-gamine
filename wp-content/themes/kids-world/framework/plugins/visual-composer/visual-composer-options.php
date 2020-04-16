<?php

require_once( 'visual-composer-settings.php' );

function kidsworld_vc_one_to_final_number ( $final_number, $all = true, $default = false, $start_number = 1 ) {
	if($all) {
		$kidsworld_count_number['-1'] = 'All';
	}

	if($default) {
		$kidsworld_count_number[''] = 'Default';
	}

	foreach(range($start_number, $final_number) as $number) {
		$kidsworld_count_number[$number] = $number;
	}

	return $kidsworld_count_number;
}

if ( ! function_exists( 'kidsworld_visual_composer_map_shortcodes' ) && kidsworld_vc_settings_on() ) {

	function kidsworld_visual_composer_map_shortcodes() {

		/* ======= VARIABLES ======= */

		$kidsworld_fontawesome_icons_list = array( '- Select Icon -', '500px', 'adjust', 'adn', 'align-center', 'align-justify', 'align-left', 'align-right', 'amazon', 'ambulance', 'anchor', 'android', 'angellist', 'angle-double-down', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-down', 'angle-left', 'angle-right', 'angle-up', 'apple', 'archive', 'area-chart', 'arrow-circle-down', 'arrow-circle-left', 'arrow-circle-o-down', 'arrow-circle-o-left', 'arrow-circle-o-right', 'arrow-circle-o-up', 'arrow-circle-right', 'arrow-circle-up', 'arrow-down', 'arrow-left', 'arrow-right', 'arrow-up', 'arrows', 'arrows-alt', 'arrows-h', 'arrows-v', 'asterisk', 'at', 'automobile', 'backward', 'balance-scale', 'ban', 'bank', 'bar-chart', 'bar-chart-o', 'barcode', 'bars', 'battery-0', 'battery-1', 'battery-2', 'battery-3', 'battery-4', 'battery-empty', 'battery-full', 'battery-half', 'battery-quarter', 'battery-three-quarters', 'bed', 'beer', 'behance', 'behance-square', 'bell', 'bell-o', 'bell-slash', 'bell-slash-o', 'bicycle', 'binoculars', 'birthday-cake', 'bitbucket', 'bitbucket-square', 'bitcoin', 'black-tie', 'bluetooth', 'bluetooth-b', 'bold', 'bolt', 'bomb', 'book', 'bookmark', 'bookmark-o', 'briefcase', 'btc', 'bug', 'building', 'building-o', 'bullhorn', 'bullseye', 'bus', 'buysellads', 'cab', 'calculator', 'calendar', 'calendar-check-o', 'calendar-minus-o', 'calendar-o', 'calendar-plus-o', 'calendar-times-o', 'camera', 'camera-retro', 'car', 'caret-down', 'caret-left', 'caret-right', 'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'caret-up', 'cart-arrow-down', 'cart-plus', 'cc', 'cc-amex', 'cc-diners-club', 'cc-discover', 'cc-jcb', 'cc-mastercard', 'cc-paypal', 'cc-stripe', 'cc-visa', 'certificate', 'chain', 'chain-broken', 'check', 'check-circle', 'check-circle-o', 'check-square', 'check-square-o', 'chevron-circle-down', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-down', 'chevron-left', 'chevron-right', 'chevron-up', 'child', 'chrome', 'circle', 'circle-o', 'circle-o-notch', 'circle-thin', 'clipboard', 'clock-o', 'clone', 'close', 'cloud', 'cloud-download', 'cloud-upload', 'cny', 'code', 'code-fork', 'codepen', 'codiepie', 'coffee', 'cog', 'cogs', 'columns', 'comment', 'comment-o', 'commenting', 'commenting-o', 'comments', 'comments-o', 'compass', 'compress', 'connectdevelop', 'contao', 'copy', 'copyright', 'creative-commons', 'credit-card', 'credit-card-alt', 'crop', 'crosshairs', 'css3', 'cube', 'cubes', 'cut', 'cutlery', 'dashboard', 'dashcube', 'database', 'dedent', 'delicious', 'desktop', 'deviantart', 'diamond', 'digg', 'dollar', 'dot-circle-o', 'download', 'dribbble', 'dropbox', 'drupal', 'edge', 'edit', 'eject', 'ellipsis-h', 'ellipsis-v', 'empire', 'envelope', 'envelope-o', 'envelope-square', 'eraser', 'eur', 'euro', 'exchange', 'exclamation', 'exclamation-circle', 'exclamation-triangle', 'expand', 'expeditedssl', 'external-link', 'external-link-square', 'eye', 'eye-slash', 'eyedropper', 'facebook', 'facebook-f', 'facebook-official', 'facebook-square', 'fast-backward', 'fast-forward', 'fax', 'feed', 'female', 'fighter-jet', 'file', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 'file-movie-o', 'file-o', 'file-pdf-o', 'file-photo-o', 'file-picture-o', 'file-powerpoint-o', 'file-sound-o', 'file-text', 'file-text-o', 'file-video-o', 'file-word-o', 'file-zip-o', 'files-o', 'film', 'filter', 'fire', 'fire-extinguisher', 'firefox', 'flag', 'flag-checkered', 'flag-o', 'flash', 'flask', 'flickr', 'floppy-o', 'folder', 'folder-o', 'folder-open', 'folder-open-o', 'font', 'fonticons', 'fort-awesome', 'forumbee', 'forward', 'foursquare', 'frown-o', 'futbol-o', 'gamepad', 'gavel', 'gbp', 'ge', 'gear', 'gears', 'genderless', 'get-pocket', 'gg', 'gg-circle', 'gift', 'git', 'git-square', 'github', 'github-alt', 'github-square', 'gittip', 'glass', 'globe', 'google', 'google-plus', 'google-plus-square', 'google-wallet', 'graduation-cap', 'gratipay', 'group', 'h-square', 'hacker-news', 'hand-grab-o', 'hand-lizard-o', 'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'hand-paper-o', 'hand-peace-o', 'hand-pointer-o', 'hand-rock-o', 'hand-scissors-o', 'hand-spock-o', 'hand-stop-o', 'hashtag', 'hdd-o', 'header', 'headphones', 'heart', 'heart-o', 'heartbeat', 'history', 'home', 'hospital-o', 'hotel', 'hourglass', 'hourglass-1', 'hourglass-2', 'hourglass-3', 'hourglass-end', 'hourglass-half', 'hourglass-o', 'hourglass-start', 'houzz', 'html5', 'i-cursor', 'ils', 'image', 'inbox', 'indent', 'industry', 'info', 'info-circle', 'inr', 'instagram', 'institution', 'internet-explorer', 'intersex', 'ioxhost', 'italic', 'joomla', 'jpy', 'jsfiddle', 'key', 'keyboard-o', 'krw', 'language', 'laptop', 'lastfm', 'lastfm-square', 'leaf', 'leanpub', 'legal', 'lemon-o', 'level-down', 'level-up', 'life-bouy', 'life-buoy', 'life-ring', 'life-saver', 'lightbulb-o', 'line-chart', 'link', 'linkedin', 'linkedin-square', 'linux', 'list', 'list-alt', 'list-ol', 'list-ul', 'location-arrow', 'lock', 'long-arrow-down', 'long-arrow-left', 'long-arrow-right', 'long-arrow-up', 'magic', 'magnet', 'mail-forward', 'mail-reply', 'mail-reply-all', 'male', 'map', 'map-marker', 'map-o', 'map-pin', 'map-signs', 'mars', 'mars-double', 'mars-stroke', 'mars-stroke-h', 'mars-stroke-v', 'maxcdn', 'meanpath', 'medium', 'medkit', 'meh-o', 'mercury', 'microphone', 'microphone-slash', 'minus', 'minus-circle', 'minus-square', 'minus-square-o', 'mixcloud', 'mobile', 'mobile-phone', 'modx', 'money', 'moon-o', 'mortar-board', 'motorcycle', 'mouse-pointer', 'music', 'navicon', 'neuter', 'newspaper-o', 'object-group', 'object-ungroup', 'odnoklassniki', 'odnoklassniki-square', 'opencart', 'openid', 'opera', 'optin-monster', 'outdent', 'pagelines', 'paint-brush', 'paper-plane', 'paper-plane-o', 'paperclip', 'paragraph', 'paste', 'pause', 'pause-circle', 'pause-circle-o', 'paw', 'paypal', 'pencil', 'pencil-square', 'pencil-square-o', 'percent', 'phone', 'phone-square', 'photo', 'picture-o', 'pie-chart', 'pied-piper', 'pied-piper-alt', 'pinterest', 'pinterest-p', 'pinterest-square', 'plane', 'play', 'play-circle', 'play-circle-o', 'plug', 'plus', 'plus-circle', 'plus-square', 'plus-square-o', 'power-off', 'print', 'product-hunt', 'puzzle-piece', 'qq', 'qrcode', 'question', 'question-circle', 'quote-left', 'quote-right', 'ra', 'random', 'rebel', 'recycle', 'reddit', 'reddit-alien', 'reddit-square', 'refresh', 'registered', 'remove', 'renren', 'reorder', 'repeat', 'reply', 'reply-all', 'retweet', 'rmb', 'road', 'rocket', 'rotate-left', 'rotate-right', 'rouble', 'rss', 'rss-square', 'rub', 'ruble', 'rupee', 'safari', 'save', 'scissors', 'scribd', 'search', 'search-minus', 'search-plus', 'sellsy', 'send', 'send-o', 'server', 'share', 'share-alt', 'share-alt-square', 'share-square', 'share-square-o', 'shekel', 'sheqel', 'shield', 'ship', 'shirtsinbulk', 'shopping-bag', 'shopping-basket', 'shopping-cart', 'sign-in', 'sign-out', 'signal', 'simplybuilt', 'sitemap', 'skyatlas', 'skype', 'slack', 'sliders', 'slideshare', 'smile-o', 'soccer-ball-o', 'sort', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-asc', 'sort-desc', 'sort-down', 'sort-numeric-asc', 'sort-numeric-desc', 'sort-up', 'soundcloud', 'space-shuttle', 'spinner', 'spoon', 'spotify', 'square', 'square-o', 'stack-exchange', 'stack-overflow', 'star', 'star-half', 'star-half-empty', 'star-half-full', 'star-half-o', 'star-o', 'steam', 'steam-square', 'step-backward', 'step-forward', 'stethoscope', 'sticky-note', 'sticky-note-o', 'stop', 'stop-circle', 'stop-circle-o', 'street-view', 'strikethrough', 'stumbleupon', 'stumbleupon-circle', 'subscript', 'subway', 'suitcase', 'sun-o', 'superscript', 'support', 'table', 'tablet', 'tachometer', 'tag', 'tags', 'tasks', 'taxi', 'television', 'tencent-weibo', 'terminal', 'text-height', 'text-width', 'th', 'th-large', 'th-list', 'thumb-tack', 'thumbs-down', 'thumbs-o-down', 'thumbs-o-up', 'thumbs-up', 'ticket', 'times', 'times-circle', 'times-circle-o', 'tint', 'toggle-down', 'toggle-left', 'toggle-off', 'toggle-on', 'toggle-right', 'toggle-up', 'trademark', 'train', 'transgender', 'transgender-alt', 'trash', 'trash-o', 'tree', 'trello', 'tripadvisor', 'trophy', 'truck', 'try', 'tty', 'tumblr', 'tumblr-square', 'turkish-lira', 'tv', 'twitch', 'twitter', 'twitter-square', 'umbrella', 'underline', 'undo', 'university', 'unlink', 'unlock', 'unlock-alt', 'unsorted', 'upload', 'usb', 'usd', 'user', 'user-md', 'user-plus', 'user-secret', 'user-times', 'users', 'venus', 'venus-double', 'venus-mars', 'viacoin', 'video-camera', 'vimeo', 'vimeo-square', 'vine', 'vk', 'volume-down', 'volume-off', 'volume-up', 'warning', 'wechat', 'weibo', 'weixin', 'whatsapp', 'wheelchair', 'wifi', 'wikipedia-w', 'windows', 'won', 'wordpress', 'wrench', 'xing', 'xing-square', 'y-combinator', 'y-combinator-square', 'yahoo', 'yc', 'yc-square', 'yelp', 'yen', 'youtube', 'youtube-play', 'youtube-square' );

		$kidsworld_fontawesome_social_icons = array( '- Select Icon -', '500px', 'adn', 'amazon', 'android', 'angellist', 'apple', 'behance', 'behance-square', 'bitbucket', 'bitbucket-square', 'bitcoin', 'black-tie', 'bluetooth', 'bluetooth-b', 'btc', 'buysellads', 'cc-amex', 'cc-diners-club', 'cc-discover', 'cc-jcb', 'cc-mastercard', 'cc-paypal', 'cc-stripe', 'cc-visa', 'chrome', 'codepen', 'codiepie', 'connectdevelop', 'contao', 'css3', 'dashcube', 'delicious', 'deviantart', 'digg', 'dribbble', 'dropbox', 'drupal', 'edge', 'empire', 'expeditedssl', 'facebook', 'facebook-f', 'facebook-official', 'facebook-square', 'firefox', 'flickr', 'fonticons', 'fort-awesome', 'forumbee', 'foursquare', 'ge', 'get-pocket', 'gg', 'gg-circle', 'git', 'git-square', 'github', 'github-alt', 'github-square', 'gittip', 'google', 'google-plus', 'google-plus-square', 'google-wallet', 'gratipay', 'hacker-news', 'houzz', 'html5', 'instagram', 'internet-explorer', 'ioxhost', 'joomla', 'jsfiddle', 'lastfm', 'lastfm-square', 'leanpub', 'linkedin', 'linkedin-square', 'linux', 'maxcdn', 'meanpath', 'medium', 'mixcloud', 'modx', 'odnoklassniki', 'odnoklassniki-square', 'opencart', 'openid', 'opera', 'optin-monster', 'pagelines', 'paypal', 'pied-piper', 'pied-piper-alt', 'pinterest', 'pinterest-p', 'pinterest-square', 'product-hunt', 'qq', 'ra', 'rebel', 'reddit', 'reddit-alien', 'reddit-square', 'renren', 'safari', 'scribd', 'sellsy', 'share-alt', 'share-alt-square', 'shirtsinbulk', 'simplybuilt', 'skyatlas', 'skype', 'slack', 'slideshare', 'soundcloud', 'spotify', 'stack-exchange', 'stack-overflow', 'steam', 'steam-square', 'stumbleupon', 'stumbleupon-circle', 'tencent-weibo', 'trello', 'tripadvisor', 'tumblr', 'tumblr-square', 'twitch', 'twitter', 'twitter-square', 'usb', 'viacoin', 'vimeo', 'vimeo-square', 'vine', 'vk', 'wechat', 'weibo', 'weixin', 'whatsapp', 'wikipedia-w', 'windows', 'wordpress', 'xing', 'xing-square', 'y-combinator', 'y-combinator-square', 'yahoo', 'yc', 'yc-square', 'yelp', 'youtube', 'youtube-play', 'youtube-square' );

	    sort( $kidsworld_fontawesome_icons_list );
	    sort( $kidsworld_fontawesome_social_icons );

		$kidsworld_sc_font_size = kidsworld_vc_one_to_final_number( 200, false, false, 8 );
		$kidsworld_sc_border_width = kidsworld_vc_one_to_final_number( 10, false, false, 0 );

		$kidsworld_fontawesome_icon_name = array(
			'param_name' => 'icon_name',
			'type' => 'dropdown',
			'heading' => esc_html__('Icon Name', 'kids-world'),
			'description' => esc_html__( 'Select icon from dropdown menu.', 'kids-world' ),
			'value' => $kidsworld_fontawesome_icons_list,
			'holder' => 'div',
			'save_always' => true
		);

		$kidsworld_fontawesome_social_icon_name = array(
			'param_name' => 'icon_name',
			'type' => 'dropdown',
			'heading' => esc_html__('Icon Name', 'kids-world'),
			'description' => esc_html__( 'Select icon from dropdown menu.', 'kids-world' ),
			'value' => $kidsworld_fontawesome_social_icons,
			'holder' => 'div',
			'save_always' => true
		);

		$kidsworld_sc_element_unique_id = array(
			'param_name' => 'id',
			'type' => 'textfield',
			'heading' => esc_html__('Unique Id', 'kids-world'),
			'description' => esc_html__('(Optional) Enter a unique Id.', 'kids-world'),
			'std' => '',
			'holder' => 'div',
			'save_always' => true	
		);

		$kidsworld_sc_element_unique_class = array(
			'param_name' => 'class',
			'type' => 'textfield',
			'heading' => esc_html__('Class', 'kids-world'),
			'description' => esc_html__('(Optional) Enter a unique class name.', 'kids-world'),
			'std' => '',
			'holder' => 'div',
			'save_always' => true	
		);

		$kidsworld_sc_element_inline_style = array(
			'param_name' => 'style',
			'type' => 'textfield',
			'heading' => esc_html__('Style', 'kids-world'),
			'description' => esc_html__('(Optional) Enter inline CSS.', 'kids-world'),
			'std' => '',
			'holder' => 'div',
			'save_always' => true	
		);

		$kidsworld_vc_border_type = array(	
			esc_html__('Solid', 'kids-world') 	=> 'solid',
			esc_html__('Dotted', 'kids-world') 	=> 'dotted',
			esc_html__('Dashed', 'kids-world') 	=> 'dashed',
			esc_html__('Double', 'kids-world') 	=> 'double'
		);

		$kidsworld_vc_container_childs = 'vc_row,vc_column,vc_column_text,vc_single_image,vc_carousel,vc_widget_sidebar,vc_raw_html,vc_gmaps,vc_raw_js,contact-form-7,rev_slider,rev_slider_vc, swmsc_counter_boxes, icon_list, swmsc_toggle_accordion_container, swmsc_tabs, swmsc_social_media_icons, swmsc_image_slider, swmsc_progress_bar, swmsc_toggle, swmsc_recent_posts_tiny, swmsc_recent_posts_large, swmsc_recent_posts_square, swmsc_testimonials, swmsc_testimonials_slider, swmsc_testimonials_wide_slider, swmsc_video, swmsc_tooltip, swmsc_team_member, swmsc_team_member_small, swmsc_image, swmsc_image_gallery, swmsc_promotion_box, swmsc_pricing_table, swmsc_button, blockquote, swmsc_pullquote, swmsc_alert, swmsc_icon, swmsc_text_block, gap, hr, swmsc_divider, swmsc_fancy_heading, swmsc_dropcap, swmsc_font, swmsc_school_service, swmsc_events, swmsc_events_posts_square, swmsc_portfolio, swmsc_classes, swmsc_logo_slider, swmsc_logo_grid, swmsc_service_style_icon,swmsc_service_style_image, swmsc_icon_title, clear';

		$kidsworld_vc_yes_no = array(					
			esc_html__('Yes', 'kids-world')	=> 'true',
			esc_html__('No', 'kids-world') 	=> 'false'											
		);

		$kidsworld_vc_left_center_right = array(
			esc_html__('Left', 'kids-world')	=> 'left',
			esc_html__('Center', 'kids-world')	=> 'center',
			esc_html__('Right', 'kids-world') 	=>'right'							
		);

		$kidsworld_vc_left_right = array(
			esc_html__('Left', 'kids-world')	=> 'left',
			esc_html__('Right', 'kids-world') 	=> 'right'							
		);

		/* ======= CONTAINER ( PARENT AND CHILD )  ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_simple_section',
				'name'        => esc_html__( 'Simple Container', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'container',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Include container in 100% width template section', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_container kidsworld_vc_parent_element',
				'as_parent'=> array( 'only' => $kidsworld_vc_container_childs.',swmsc_half_bg_content,swmsc_content_box' ),
				'content_element' => true,
				'js_view'	  => 'VcColumnView',
				'params'      => array(
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= ADVANCED CONTAINER ( PARENT AND CHILD )  ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_section',
				'name'        => esc_html__( 'Advanced Container', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'container',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Include container with background, padding, margin etc. for 100% width template section', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_container kidsworld_vc_parent_element',
				'as_parent'=> array( 'only' => $kidsworld_vc_container_childs.',swmsc_half_bg_content,swmsc_content_box' ),
				'content_element' => true,
				'js_view'	  => 'VcColumnView',
				'params'      => array(
					array(
		            	'param_name' => 'background_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Background Color', 'kids-world'),
						'description' => esc_html__('Set section backgorund color', 'kids-world'),
						'std' => '#ffffff',
						'holder' => 'div',
						'save_always' => true
					),
		            array(
					'param_name' => 'background_image',
						'type' => 'attach_image',
						'heading' => esc_html__('Background Image', 'kids-world'),
						'description' => esc_html__('Upload background image', 'kids-world'),
						'holder' => 'div',
						'save_always' => true			
					),
					array(
						'param_name' => 'background_repeat',
						'type' => 'dropdown',
						'heading' => esc_html__('Background Repeat', 'kids-world'),
						'description' => '',
						'std' => 'repeat',
						'value' => array(
							esc_html__( 'Repeat', 'kids-world' )	=> 'repeat',   
					        esc_html__( 'No Repeat', 'kids-world' )	=> 'no-repeat', 
					        esc_html__( 'Repeat X', 'kids-world' )	=> 'repeat-x',   
					        esc_html__( 'Repeat Y', 'kids-world') 	=> 'repeat-y' 
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'background_position',
						'type' => 'dropdown',
						'heading' => esc_html__('Background Position', ''),
						'description' => '',
						'std' => 'center-top',
						'value' => array(
							esc_html__( 'Left Top', 'kids-world' )		=> "left-top",     
					        esc_html__( 'Left Center', 'kids-world' )	=> "left-center",  
					        esc_html__( 'Left Bottom', 'kids-world' )	=> "left-bottom",  
					        esc_html__( 'Right Top', 'kids-world' )		=> "right-top",    
					        esc_html__( 'Right Center', 'kids-world' )	=> "right-center", 
					        esc_html__( 'Right Bottom', 'kids-world' )	=> "right-bottom", 
					        esc_html__( 'Center Top', 'kids-world' )	=> "center-top",   
					        esc_html__( 'Center Center', 'kids-world' )	=> "center-center",
					        esc_html__( 'Center Bottom', 'kids-world' ) => "center-bottom"
						),
						'holder' => 'div',
						'save_always' => true
					),	
					array(
		            	'param_name' => 'background_attachment',
						'type' => 'dropdown',
						'heading' => esc_html__('Background Attachment', 'kids-world'),
						'description' => '',
						'std' => 'scroll',
						'value' => array(
							esc_html__( 'Scroll', 'kids-world' ) => 'scroll',
			       			esc_html__( 'Fixed', 'kids-world' ) => 'fixed'   									
						),
						'holder' => 'div',
						'save_always' => true
					),	
					array(
		            	'param_name' => 'background_stretch',
						'type' => 'dropdown',
						'heading' => esc_html__('100% Background Image Width', 'kids-world'),
						'description' => '',
						'std' => 'false',
						'value' => array(
							esc_html__('No', 'kids-world') 	=> 'false',
							esc_html__('Yes', 'kids-world')	=> 'true' 									
						),
						'holder' => 'div',
						'save_always' => true
					),	
					array(
					'param_name' => 'border_width',
						'std' => '0',
						'type' => 'textfield',
						'heading' => esc_html__('Border Width', 'kids-world'),
						'description' => esc_html__('If you want to make section with border then set border width and then set top and/or bottom border colors', 'kids-world'),	
						'holder' => 'div',
						'save_always' => true
					),
					array(
		            	'param_name' => 'border_top_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Top Border Color', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true
					),
					array(
		            	'param_name' => 'border_bottom_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Bottom Border Color', 'kids-world'),			
						'std' => '',
						'holder' => 'div',
						'save_always' => true
					),
					array(
		            	'param_name' => 'arrow_direction',
						'type' => 'dropdown',
						'heading' => esc_html__('Arrow Direction', 'kids-world'),
						'description' => esc_html__('If you want to make section with top or bottom direction arrow then select from above drop down.', 'kids-world'),
						'std' => 'none',
						'value' => array(
							esc_html__( 'Hide Arrow', 'kids-world' ) 			=> 'none',
							esc_html__( 'Display Arrow Top', 'kids-world' ) 	=> 'top',
			       			esc_html__( 'Display Arrow Bottom', 'kids-world' )	=> 'bottom'
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
		            	'param_name' => 'arrow_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Arrow Color', 'kids-world'),			
						'std' => '',
						'holder' => 'div',
						'save_always' => true
					),
					array(
		            	'param_name' => 'padding_top',
						'type' => 'textfield',
						'heading' => esc_html__('Padding Top', 'kids-world'),
						'description' => esc_html__('Enter section padding top value in pixels.', 'kids-world'),
						'std' => '0',
						'holder' => 'div',
						'save_always' => true
					),
					array(
		            	'param_name' => 'padding_bottom',
						'type' => 'textfield',
						'heading' => esc_html__('Padding Bottom', 'kids-world'),
						'description' => esc_html__('Enter section padding bottom value in pixels.', 'kids-world'),
						'std' => '0',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'margin_top',
						'std' => '0',
						'type' => 'textfield',
						'heading' => esc_html__('Magin Top', 'kids-world'),
						'description' => esc_html__('Enter section margin top value in pixels.', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),	
					array(
					'param_name' => 'margin_bottom',
						'std' => '0',
						'type' => 'textfield',
						'heading' => esc_html__('Magin Bottom', 'kids-world'),
						'description' => esc_html__('Enter section margin bottom value in pixels.', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),	
					array(
		            	'param_name' => 'font_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Section Font Color', 'kids-world'),
						'description' => esc_html__('This will change general body color like paragraph text etc. in the section.', 'kids-world'),		
						'std' => '',
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= HALF CONTENT AND BACKGROUND ( PARENT AND CHILD ) ======= */
		vc_map(
		  	array(
				'base'        => 'swmsc_half_bg_content',
				'name'        => esc_html__( 'Half Background and Content', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'cbox',
				'category'    => esc_html__( 'Advanced', 'kids-world' ),
				'description' => esc_html__( 'Display content with half background block', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_cbox kidsworld_vc_parent_element',
				'as_parent'=> array( 'only' => $kidsworld_vc_container_childs.',swmsc_content_box' ),
				'content_element' => true,
				'js_view'	  => 'VcColumnView',
				'params'      => array(
					array(
		            	'param_name' => 'bg_image',
						'type' => 'attach_image',
						'heading' => esc_html__('Background Image', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
		            	'param_name' => 'text_align',
						'type' => 'dropdown',
						'heading' => esc_html__('Content Block Position', 'kids-world'),
						'std' => 'left',
						'value' => array(	
							esc_html__('Left', 'kids-world') => 'left',
							esc_html__('Right', 'kids-world') => 'right' 
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
		            	'param_name' => 'padding_top',
						'type' => 'textfield',
						'heading' => esc_html__('Top Padding', 'kids-world'),
						'std' => '80px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
		            	'param_name' => 'padding_bottom',
						'type' => 'textfield',
						'heading' => esc_html__('Bottom Padding', 'kids-world'),
						'std' => '80px',
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= CONTENT BOX ( PARENT AND CHILD ) ======= */
		vc_map(
		  	array(
				'base'        => 'swmsc_content_box',
				'name'        => esc_html__( 'Services/Content Box', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'cbox',
				'category'    => esc_html__( 'Advanced', 'kids-world' ),
				'description' => esc_html__( 'Display content inside box with various style', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_cbox kidsworld_vc_parent_element',
				'as_parent'=> array( 'only' => $kidsworld_vc_container_childs.',swmsc_half_bg_content' ),
				'content_element' => true,
				'js_view'	  => 'VcColumnView',
				'params'      => array(
					array(
					'param_name' => 'background_image',
						'type' => 'attach_image',
						'heading' => esc_html__('Background Image', 'kids-world'),
						'description' => esc_html__('Upload background image', 'kids-world')			
					),
					array(
						'param_name' => 'background_repeat',
						'type' => 'dropdown',
						'heading' => esc_html__('Background Repeat', 'kids-world'),
						'description' => '',
						'std' => 'repeat',
						'value' => array(
							esc_html__( 'Repeat', 'kids-world' )		=> 'repeat',   
					        esc_html__( 'No Repeat', 'kids-world' )	=> 'no-repeat', 
					        esc_html__( 'Repeat X', 'kids-world' )	=> 'repeat-x',   
					        esc_html__( 'Repeat Y', 'kids-world') 	=> 'repeat-y' 
						)
					),
					array(
						'param_name' => 'background_position',
						'type' => 'dropdown',
						'heading' => esc_html__('Background Position', 'kids-world'),
						'description' => '',
						'std' => 'center-top',
						'value' => array(
							esc_html__( 'Left Top', 'kids-world' )		=> "left-top",     
					        esc_html__( 'Left Center', 'kids-world' )	=> "left-center",  
					        esc_html__( 'Left Bottom', 'kids-world' )	=> "left-bottom",  
					        esc_html__( 'Right Top', 'kids-world' )		=> "right-top",    
					        esc_html__( 'Right Center', 'kids-world' )	=> "right-center", 
					        esc_html__( 'Right Bottom', 'kids-world' )	=> "right-bottom", 
					        esc_html__( 'Center Top', 'kids-world' )		=> "center-top",   
					        esc_html__( 'Center Center', 'kids-world' )	=> "center-center",
					        esc_html__( 'Center Bottom', 'kids-world' ) 	=> "center-bottom"
						)
					),
					array(
					'param_name' => 'background_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Box Background Color', 'kids-world'),
						'std' => '#ffffff',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'border_width',
						'std' => '1px',
						'type' => 'textfield',
						'heading' => esc_html__('Box Border Width', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'border_type',
						'type' => 'dropdown',
						'heading' => esc_html__('Box Border Type', 'kids-world'),
						'std' => 'solid',
						'value' => $kidsworld_vc_border_type,
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'border_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Box Border Color', 'kids-world'),
						'std' => '#e6e6e6',
						'holder' => 'div',
						'save_always' => true
					),		
					array(
					'param_name' => 'border_radius',
						'type' => 'textfield',
						'heading' => esc_html__('Box Border Radius', 'kids-world'),
						'std' => '0',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
					'param_name' => 'box_padding',
						'std' => '20px',
						'type' => 'textfield',
						'heading' => esc_html__('Box Padding', 'kids-world'),
						'description' => esc_html__('Inner space between box and content in pixels', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'margin_bottom',
						'std' => '20px',
						'type' => 'textfield',
						'heading' => esc_html__('Magin Bottom', 'kids-world'),
						'description' => esc_html__('Enter bottom margin in pixels', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'image_width',
						'type' => 'dropdown',
						'heading' => esc_html__('Content Image Width', 'kids-world'),
						'std' => 'auto_width',
						'description' => esc_html__('Image width feature to set as per box width.', 'kids-world'),
						'value' => array(	
							esc_html__('Auto Width', 'kids-world') 	=> 'auto_width',
							esc_html__('Full - 100% Width of Box', 'kids-world') 	=> 'full_width'
						),
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= COUNTER BOXES ( PARENT AND CHILD ) ======= */

			vc_map(
			  	array(
					'base'        		=> 'swmsc_counter_boxes',
					'name'        		=> esc_html__( 'Counter Boxes', 'kids-world' ),
					'weight'      		=> 1,
					'icon'        		=> 'counter',
					'category'    		=> esc_html__( 'Advanced', 'kids-world' ),
					'description' 		=> esc_html__( 'Include counter boxes in your content', 'kids-world' ),
					'class'       		=> 'kidsworld_content_element kidsworld_content_element_counter kidsworld_vc_parent_element',
					'as_parent'       	=> array( 'only' => 'swmsc_counter_box' ),
			        'content_element' 	=> true,
			        'js_view'         	=> 'VcColumnView',
					'params'      		=> array(						
						$kidsworld_sc_element_unique_id,
						$kidsworld_sc_element_unique_class,
						$kidsworld_sc_element_inline_style
					)
				)
			);

			vc_map(
			  	array(
					'base'        		=> 'swmsc_counter_box',
					'name'        		=> esc_html__( 'Counter Box', 'kids-world' ),
					'weight'      		=> 1,
					'icon'        		=> 'counter',
					'category'    		=> esc_html__( 'Advanced', 'kids-world' ),
					'description' 		=> esc_html__( 'Add counter box.', 'kids-world' ),
					'class'       		=> 'kidsworld_content_element kidsworld_content_element_counter',
					'as_child'        	=> array( 'only' => 'swmsc_counter_boxes' ),
        			'content_element' 	=> true,
					'params'      		=> array(
						array(
			            	'param_name' => 'box_bg_color',
							'type' => 'colorpicker',
							'heading' => esc_html__('Box Background Color', 'kids-world'),
							'std' => '#FFFFFF',
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'font_color',
							'type' => 'colorpicker',
							'heading' => esc_html__('Font Color', 'kids-world'),
							'std' => '#606060',
							'holder' => 'div',
							'save_always' => true
						),
						$kidsworld_fontawesome_icon_name,
						array(
							'param_name' => 'icon_bg_color',
							'type' => 'colorpicker',
							'heading' => esc_html__('Icon Background Color', 'kids-world'),
							'std' => '#606060',
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'icon_color',
							'type' => 'colorpicker',
							'heading' => esc_html__('Icon Color', 'kids-world'),
							'std' => '#FFFFFF',
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'counter_number',
							'type' => 'textfield',
							'heading' => esc_html__('Counter Number', 'kids-world'),
							'description' => esc_html__('Counter will animated above numter', 'kids-world'),
							'std' => '1000',
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'unit',
							'type' => 'textfield',
							'heading' => esc_html__('Unit', 'kids-world'),
							'description' => esc_html__('Enter the unit for the counter number ( Example %, $, + ).', 'kids-world'),
							'std' => '',
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'unit_position',
							'type' => 'dropdown',
							'heading' => esc_html__('Unit Position', 'kids-world'),
							'value' => array(
								esc_html__('Before Number', 'kids-world') => 'before_number',
								esc_html__('After Number', 'kids-world') => 'after_number'				
							),
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'speed',
							'type' => 'textfield',
							'heading' => esc_html__('Animation Speed', 'kids-world'),
							'description' => esc_html__('Add animation speed in miliseconds ( Example 1000 = 1 second, 5000 = 5 second. )', 'kids-world'),
							'std' => '2000',
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'column',
							'type' => 'dropdown',
							'heading' => esc_html__('Column', 'kids-world'),
							'description' => esc_html__('Select counter box display column', 'kids-world'),
							'value' => array(
								'2' => '2',
								'3' => '3',
								'4' => '4',
								'5' => '5' 					
							),
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'content',
							'std' => esc_html__('description text', 'kids-world'),
							'type' => 'textarea_html',
							'heading' => esc_html__('Small Description text', 'kids-world'),
							'holder' => 'div',
							'save_always' => true
						)						
					)
				)
			);

		/* ======= LIST ICONS ( PARENT AND CHILD ) ======= */

			vc_map(
			  	array(
					'base'        		=> 'icon_list',
					'name'        		=> esc_html__( 'List Icons', 'kids-world' ),
					'weight'      		=> 1,
					'icon'        		=> 'list',
					'category'    		=> esc_html__( 'Typography', 'kids-world' ),
					'description' 		=> esc_html__( 'Include list icons in your content', 'kids-world' ),
					'class'       		=> 'kidsworld_content_element kidsworld_content_element_list kidsworld_vc_parent_element',
					'as_parent'       	=> array( 'only' => 'swmsc_list_icon' ),
			        'content_element' 	=> true,
			        'js_view'         	=> 'VcColumnView',
					'params'      		=> array(						
						$kidsworld_sc_element_unique_id,
						$kidsworld_sc_element_unique_class,
						$kidsworld_sc_element_inline_style
					)
				)
			);

			vc_map(
			  	array(
					'base'        		=> 'swmsc_list_icon',
					'name'        		=> esc_html__( 'List Icon', 'kids-world' ),
					'weight'      		=> 1,
					'icon'        		=> 'list',
					'category'    		=> esc_html__( 'Typography', 'kids-world' ),
					'description' 		=> esc_html__( 'Add list icon.', 'kids-world' ),
					'class'       		=> 'kidsworld_content_element kidsworld_content_element_list',
					'as_child'        	=> array( 'only' => 'icon_list' ),
        			'content_element' 	=> true,
					'params'      		=> array(
						$kidsworld_fontawesome_icon_name,
						array(
							'param_name' => 'icon_color',
							'type' => 'colorpicker',
							'heading' => esc_html__('Icon Color', 'kids-world'),
							'std' => '#606060',
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'content',
			                'std' => 'list item details here',
			                'type' => 'textarea_html',
			                'heading' => esc_html__('List Content', 'kids-world'),
			                'holder' => 'div',
							'save_always' => true
			            )
					)
				)
			);

		/* ======= TOOGLE ACCORDION ( PARENT AND CHILD ) ======= */

			vc_map(
			  	array(
					'base'        		=> 'swmsc_toggle_accordion_container',
					'name'        		=> esc_html__( 'Accordion Toggle', 'kids-world' ),
					'weight'      		=> 1,
					'icon'        		=> 'toggle',
					'category'    		=> esc_html__( 'Typography', 'kids-world' ),
					'description' 		=> esc_html__( 'Include accordion toggles in your content', 'kids-world' ),
					'class'       		=> 'kidsworld_content_element kidsworld_content_element_toggle kidsworld_vc_parent_element',
					'as_parent'       	=> array( 'only' => 'swmsc_toggle_accordion' ),
			        'content_element' 	=> true,
			        'js_view'         	=> 'VcColumnView',
					'params'      		=> array(
						array(
							'param_name' => 'status',
							'type' => 'dropdown',
							'heading' => esc_html__('Toogle Status', 'kids-world'),
							'std' => 'open',
							'value' => array(
								esc_html__('Close', 'kids-world') => 'closed',
								esc_html__('Open', 'kids-world') => 'open'							
							),
							'holder' => 'div',
							'save_always' => true
						),
						$kidsworld_sc_element_unique_id,
						$kidsworld_sc_element_unique_class,
						$kidsworld_sc_element_inline_style
					)
				)
			);

			vc_map(
			  	array(
					'base'        		=> 'swmsc_toggle_accordion',
					'name'        		=> esc_html__( 'Toggle', 'kids-world' ),
					'weight'      		=> 1,
					'icon'        		=> 'toggle',
					'category'    		=> esc_html__( 'Typography', 'kids-world' ),
					'description' 		=> esc_html__( 'Add accordion toggle.', 'kids-world' ),
					'class'       		=> 'kidsworld_content_element kidsworld_content_element_toggle',
					'as_child'        	=> array( 'only' => 'swmsc_toggle_accordion_container' ),
        			'content_element' 	=> true,
					'params'      		=> array(
						$kidsworld_fontawesome_icon_name,
						array(
							'param_name' => 'title',
							'type' => 'textfield',
							'heading' => esc_html__('Toggle Content Title', 'kids-world'),
							'description' => esc_html__('Add the title that will go above the toggle content', 'kids-world'),
							'std' => esc_html__('Title', 'kids-world'),
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'title_bg',
							'type' => 'colorpicker',
							'heading' => esc_html__('Toggle Content Title Background Color', 'kids-world'),
							'std' => '#adcb69',
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'title_color',
							'type' => 'colorpicker',
							'heading' => esc_html__('Toggle Content Title Text Color', 'kids-world'),
							'std' => '#ffffff',
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'content',
							'std' => esc_html__(' [p] Insert toggle content here [/p]  ', 'kids-world'),
							'type' => 'textarea_html',
							'heading' => esc_html__('Toggle Content', 'kids-world'),
							'description' => esc_html__('Add the toggle content. If you are adding more than one line then you can remove [p]...[/p] shortcode because wordpress will automatically add paragraph tag for all next lines.', 'kids-world'),
							'holder' => 'div',
							'save_always' => true
						)
					)
				)
			);			

			/* ======= TABS ( PARENT AND CHILD ) ======= */

			vc_map(
			  	array(
					'base'        		=> 'swmsc_tabs',
					'name'        		=> esc_html__( 'Tabs', 'kids-world' ),
					'weight'      		=> 1,
					'icon'        		=> 'tabs',
					'category'    		=> esc_html__( 'Typography', 'kids-world' ),
					'description' 		=> esc_html__( 'Include tabs your content', 'kids-world' ),
					'class'       		=> 'kidsworld_content_element kidsworld_content_element_tabs kidsworld_vc_parent_element',
					'as_parent'       	=> array( 'only' => 'swmsc_tab' ),
			        'content_element' 	=> true,
			        'js_view'         	=> 'VcColumnView',
					'params'      		=> array(						
						array(
							'param_name' => 'tabs_style',
							'type' => 'dropdown',
							'heading' => esc_html__('Tabs Style', 'kids-world'),
							'value' => array(
								esc_html__('Horizontal Tabs', 'kids-world') => 'tabs_horizontal',
								esc_html__('Vertical Tabs', 'kids-world') => 'tabs_vertical'					
							),
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'tabs_align',
							'type' => 'dropdown',
							'std' => 'center',
							'heading' => esc_html__('Tabs Align', 'kids-world'),
							'value' => $kidsworld_vc_left_center_right,
							'holder' => 'div',
							'save_always' => true
						),
						$kidsworld_sc_element_unique_id,
						$kidsworld_sc_element_unique_class,
						$kidsworld_sc_element_inline_style
					)
				)
			);

			vc_map(
			  	array(
					'base'        		=> 'swmsc_tab',
					'name'        		=> esc_html__( 'Tab', 'kids-world' ),
					'weight'      		=> 1,
					'icon'        		=> 'tabs',
					'category'    		=> esc_html__( 'Typography', 'kids-world' ),
					'description' 		=> esc_html__( 'Add tab in your content.', 'kids-world' ),
					'class'       		=> 'kidsworld_content_element kidsworld_content_element_tabs',
					'as_child'        	=> array( 'only' => 'swmsc_tabs' ),
        			'content_element' 	=> true,
					'params'      		=> array(
						array(
							'param_name' => 'title',
							'type' => 'textfield',
							'heading' => esc_html__('Tab Title', 'kids-world'),
							'description' => esc_html__('Add the title that will go above the content', 'kids-world'),
							'std' => esc_html__('Title', 'kids-world'),
							'holder' => 'div',
							'save_always' => true
						),
						$kidsworld_fontawesome_icon_name,
						array(
							'param_name' => 'content',
							'std' => esc_html__('Insert content here', 'kids-world'),
							'type' => 'textarea_html',
							'heading' => esc_html__('Tab Content', 'kids-world'),
							'description' => esc_html__('tab content text here', 'kids-world'),
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'background',
							'type' => 'colorpicker',
							'heading' => esc_html__('Tab Title Background Color', 'kids-world'),
							'std' => '#f1f1f1',
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'color',
							'type' => 'colorpicker',
							'heading' => esc_html__('Tab Title Text Color', 'kids-world'),
							'std' => '#555555',
							'holder' => 'div',
							'save_always' => true
						)

					)
				)
			);			

		/* ======= SOCIAL MEDIA ICONS ( PARENT AND CHILD ) ======= */

			vc_map(
			  	array(
					'base'        		=> 'swmsc_social_media_icons',
					'name'        		=> esc_html__( 'Social Media Icons', 'kids-world' ),
					'weight'      		=> 1,
					'icon'        		=> 'social',
					'category'    		=> esc_html__( 'Advanced', 'kids-world' ),
					'description' 		=> esc_html__( 'Include social icons in your content', 'kids-world' ),
					'class'       		=> 'kidsworld_content_element kidsworld_content_element_social kidsworld_vc_parent_element',
					'as_parent'       	=> array( 'only' => 'swmsc_social_media_icon' ),
			        'content_element' 	=> true,
			        'js_view'         	=> 'VcColumnView',
					'params'      		=> array(						
						$kidsworld_sc_element_unique_id,
						$kidsworld_sc_element_unique_class,
						$kidsworld_sc_element_inline_style
					)
				)
			);

			vc_map(
			  	array(
					'base'        		=> 'swmsc_social_media_icon',
					'name'        		=> esc_html__( 'Social Media Icon', 'kids-world' ),
					'weight'      		=> 1,
					'icon'        		=> 'social',
					'category'    		=> esc_html__( 'Advanced', 'kids-world' ),
					'description' 		=> esc_html__( 'Add social icon.', 'kids-world' ),
					'class'       		=> 'kidsworld_content_element kidsworld_content_element_social',
					'as_child'        	=> array( 'only' => 'swmsc_social_media_icons' ),
        			'content_element' 	=> true,
					'params'      		=> array(
						$kidsworld_fontawesome_social_icon_name,
			            array(
			            	'param_name' => 'link',
							'type' => 'textfield',
							'heading' => esc_html__('Link', 'kids-world'),
							'std' => '#',
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'icon_color',
							'type' => 'colorpicker',
							'heading' => esc_html__('Icon Color', 'kids-world'),
							'std' => '#f2f2f2',
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'bg_color',
							'type' => 'colorpicker',
							'heading' => esc_html__('Icon Background Color', 'kids-world'),
							'std' => '#555555',
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'target',
							'type' => 'dropdown',
							'heading' => esc_html__('Link Target', 'kids-world'),
							'value' => array(				
								esc_html__('Open page in same window', 'kids-world') => '_self',
								esc_html__('Open page in new window', 'kids-world') => '_blank'																				
							),
							'std' => '_blank',
							'holder' => 'div',
							'save_always' => true
						),
					)
				)
			);		


		/* ======= IMAGE SLIDER ( PARENT AND CHILD ) ======= */

			vc_map(
			  	array(
					'base'        		=> 'swmsc_image_slider',
					'name'        		=> esc_html__( 'Image Slider', 'kids-world' ),
					'weight'      		=> 1,
					'icon'        		=> 'slider',
					'category'    		=> esc_html__( 'Sliders', 'kids-world' ),
					'description' 		=> esc_html__( 'Simple image slider', 'kids-world' ),
					'class'       		=> 'kidsworld_content_element kidsworld_content_element_slider kidsworld_vc_parent_element',
					'as_parent'       	=> array( 'only' => 'swmsc_image_slide' ),
			        'content_element' 	=> true,
			        'js_view'         	=> 'VcColumnView',
					'params'      		=> array(
						array(
				    		'param_name' => 'animation_type',
							'type' => 'dropdown',
							'heading' => esc_html__('Animation Type', 'kids-world'),
							'value' => array(					
								__('Fade', 'kids-world')  => 'fade',
								__('Slide', 'kids-world')	=> 'slide'									
							),
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'auto_play',
							'type' => 'dropdown',
							'heading' => esc_html__('Auto Play', 'kids-world'),
							'value' => $kidsworld_vc_yes_no,
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'bullet_navigation',
							'type' => 'dropdown',
							'heading' => esc_html__('Display Bullet Navigation', 'kids-world'),
							'value' => $kidsworld_vc_yes_no,
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'arrow_navigation',
							'type' => 'dropdown',
							'heading' => esc_html__('Display Arrow Navigation', 'kids-world'),
							'value' => $kidsworld_vc_yes_no,
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'slide_interval',
							'type' => 'textfield',
							'heading' => esc_html__('Slideshow Speed', 'kids-world'),
							'description' => esc_html__('Intreval between two slides. 1000=1 second, 5000= 5 second', 'kids-world'),
							'std' => '5000',
							'holder' => 'div',
							'save_always' => true	
						),
						$kidsworld_sc_element_unique_id,
						$kidsworld_sc_element_unique_class,
						$kidsworld_sc_element_inline_style
					)
				)
			);

			vc_map(
			  	array(
					'base'        		=> 'swmsc_image_slide',
					'name'        		=> esc_html__( 'Image Slide', 'kids-world' ),
					'weight'      		=> 1,
					'icon'        		=> 'image',
					'category'    		=> esc_html__( 'Sliders', 'kids-world' ),
					'description' 		=> esc_html__( 'Add image slide.', 'kids-world' ),
					'class'       		=> 'kidsworld_content_element kidsworld_content_element_image',
					'as_child'        	=> array( 'only' => 'swmsc_image_slider' ),
        			'content_element' 	=> true,
					'params'      		=> array(
						array(
			            	'param_name' => 'src',
							'type' => 'attach_image',
							'heading' => esc_html__('Image', 'kids-world'),
							'description' => esc_html__('Maximum image width : 940px, height size is flexible.', 'kids-world'),
							'holder' => 'div',
							'save_always' => true				
						),
						array(
							'param_name' => 'link',
							'type' => 'textfield',
							'heading' => esc_html__('Link on Image', 'kids-world'),
							'description' => esc_html__('Add link to open page or post by click on image', 'kids-world'),
							'std' => '#',
							'holder' => 'div',
							'save_always' => true
						),
						array(
							'param_name' => 'target',
							'type' => 'dropdown',
							'heading' => esc_html__('Link Target', 'kids-world'),
							'value' => array(				
								esc_html__('Open page in same window', 'kids-world') => '_self',
								esc_html__('Open page in new window', 'kids-world') => '_blank'																				
							),
							'holder' => 'div',
							'save_always' => true
						),
					)
				)
			);

	/* ======= PROGRESS BAR ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_progress_bar',
				'name'        => esc_html__( 'Skill Bar', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'skill_bar',
				'category'    => esc_html__( 'Advanced', 'kids-world' ),
				'description' => esc_html__( 'Include skill bar in your content.', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_skill_bar',
				'params'      => array(
					array(
		            	'param_name' => 'percentage',
						'type' => 'dropdown',
						'heading' => esc_html__('Percentage', 'kids-world'),
						'std' => '80',
						'value' => kidsworld_vc_one_to_final_number( 100, false, false ),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'title_text',
						'type' => 'textfield',
						'heading' => esc_html__('Title Text', 'kids-world'),
						'std' => 'Skill Name',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'background',
						'type' => 'colorpicker',
						'heading' => esc_html__('Background Color', 'kids-world'),
						'std' => '#606060',
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= SIMPLE TOGGLES ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_toggle',
				'name'        => esc_html__( 'Simple Toggle', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'toggle',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Include simple toggle in your content.', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_toggle',
				'params'      => array(
					array(
						'param_name' => 'status',
						'type' => 'dropdown',
						'heading' => esc_html__('Toogle Status', 'kids-world'),
						'value' => array(
							esc_html__('Close', 'kids-world') => 'closed',
							esc_html__('Open', 'kids-world') => 'open'							
						),
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_fontawesome_icon_name,
					array(
						'param_name' => 'title',
						'type' => 'textfield',
						'heading' => esc_html__('Toggle Content Title', 'kids-world'),
						'description' => esc_html__('Add the title that will go above the toggle content', 'kids-world'),
						'std' => esc_html__('Title', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'title_bg',
						'type' => 'colorpicker',
						'heading' => esc_html__('Toggle Content Title Background Color', 'kids-world'),
						'std' => '#adcb69',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'title_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Toggle Content Title Text Color', 'kids-world'),
						'std' => '#ffffff',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'content',
						'std' => esc_html__(' [p] Insert toggle content here [/p]  ', 'kids-world'),
						'type' => 'textarea_html',
						'heading' => esc_html__('Toggle Content', 'kids-world'),
						'description' => esc_html__('Add the toggle content. If you are adding more than one line then you can remove [p]...[/p] shortcode because wordpress will automatically add paragraph tag for all next lines.', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);


		/* ======= RECENT POSTS TINY ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_recent_posts_tiny',
				'name'        => esc_html__( 'Recent Posts - Tiny', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'recent_posts',
				'category'    => esc_html__( 'Recent Posts', 'kids-world' ),
				'description' => esc_html__( 'Posts with tiny thumb, title and meta.', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_recent_posts',
				'params'      => array(			
					array(
						'param_name' => 'post_limit',
						'type' => 'textfield',
						'heading' => esc_html__('Post Limit', 'kids-world'),
						'description' => esc_html__('Number of posts to display', 'kids-world'),
						'std' => '2',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'cat',
						'type' => 'textfield',
						'heading' => esc_html__('Categories', 'kids-world'),
						'description' => esc_html__('If you want to display specific category(ies) recent posts only, then add Category IDs with comma seperated (e.g. 1,2,3) or Leave it blank for default.', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true	
					),
					array(
						'param_name' => 'exclude',
						'type' => 'textfield',
						'heading' => esc_html__('Exclude Categories', 'kids-world'),
						'description' => esc_html__('add post categories IDs with comma seperate to exclude from post list', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true	
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= RECENT POSTS FULL ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_recent_posts_large',
				'name'        => esc_html__( 'Recent Posts - Large', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'recent_posts',
				'category'    => esc_html__( 'Recent Posts', 'kids-world' ),
				'description' => esc_html__( 'Posts with medium thumb, title, excerpt etc.', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_recent_posts',
				'params'      => array(
					array(
						'param_name' => 'column',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Column', 'kids-world'),
						'description' => esc_html__('Select display column for recent posts', 'kids-world'),
						'std' => '3',
						'value' => array(
							__('1 Column', 'kids-world') => '1',
							__('2 Column', 'kids-world') => '2'								
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'display_posts',
						'type' => 'textfield',
						'heading' => esc_html__('Post Limit', 'kids-world'),
						'description' => esc_html__('Number of posts to display', 'kids-world'),
						'std' => '2',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'desc_limit',
						'type' => 'textfield',
						'heading' => esc_html__('Description Limit', 'kids-world'),
						'description' => esc_html__('Number of characters to display in summery text', 'kids-world'),
						'std' => '150',
						'holder' => 'div',
						'save_always' => true,
					),
					array(
						'param_name' => 'read_more_text',
						'type' => 'textfield',
						'heading' => esc_html__('Read More Link Text', 'kids-world'),
						'description' => esc_html__('Leave it blank to hide "Read More" link', 'kids-world'),
						'std' => 'Read more',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'post_date',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Date', 'kids-world'),
						'std' => 'true',
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'post_meta',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Author Name and Comments', 'kids-world'),
						'std' => 'true',
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'featured_img',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Featured Image', 'kids-world'),
						'std' => 'true',
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'cat',
						'type' => 'textfield',
						'heading' => esc_html__('Categories', 'kids-world'),
						'description' => esc_html__('If you want to display specific category(ies) recent posts only, then add Category IDs with comma seperated (e.g. 1,2,3) or Leave it blank for default.', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true	
					),
					array(
						'param_name' => 'exclude',
						'type' => 'textfield',
						'heading' => esc_html__('Exclude Categories', 'kids-world'),
						'description' => esc_html__('add post categories IDs with comma seperate to exclude from post list', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true	
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= RECENT POSTS SQUAR STYLE ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_recent_posts_square',
				'name'        => esc_html__( 'Recent Posts - Square Box', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'recent_posts',
				'category'    => esc_html__( 'Recent Posts', 'kids-world' ),
				'description' => esc_html__( 'Post with datebox, title, excerpt and meta.', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_recent_posts',
				'params'      => array(
					array(
						'param_name' => 'post_limit',
						'type' => 'textfield',
						'heading' => esc_html__('Post Limit', 'kids-world'),
						'description' => esc_html__('Number of posts to display', 'kids-world'),
						'std' => '2',
						'holder' => 'div',
						'save_always' => true
					), 
					array(
						'param_name' => 'desc_limit',
						'type' => 'textfield',
						'heading' => esc_html__('Description Limit', 'kids-world'),
						'description' => esc_html__('Number of characters to display in summery text', 'kids-world'),
						'std' => '150',
						'holder' => 'div',
						'save_always' => true
					),		
					array(
						'param_name' => 'cat',
						'type' => 'textfield',
						'heading' => esc_html__('Categories', 'kids-world'),
						'description' => esc_html__('If you want to display specific category(ies) recent posts only, then add Category IDs with comma seperated (e.g. 1,2,3) or Leave it blank for default.', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true	
					),
					array(
						'param_name' => 'exclude',
						'type' => 'textfield',
						'heading' => esc_html__('Exclude Categories', 'kids-world'),
						'description' => esc_html__('add post categories IDs with comma seperate to exclude from post list', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true	
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= TESTIMONIALS ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_testimonials',
				'name'        => esc_html__( 'Testimonials', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'testimonials',
				'category'    => esc_html__( 'Recent Posts', 'kids-world' ),
				'description' => esc_html__( 'Display recent testimonials', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_testimonials',
				'params'      => array(
					array(
						'param_name' => 'display_testimonials',
						'type' => 'textfield',
						'heading' => esc_html__('Number of Testimonials', 'kids-world'),
						'description' => esc_html__('Enter number to display testimonials', 'kids-world'),
						'std' => '3',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
						'param_name' => 'columns',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Column', 'kids-world'),
						'std' => '3',
						'value' => array(
							__('1 Column', 'kids-world') => '1',
							__('2 Column', 'kids-world') => '2',				
							__('3 Column', 'kids-world') => '3',		
							__('4 Column', 'kids-world') => '4'			
						),
						'holder' => 'div',
						'save_always' => true
					),		
					array(
						'param_name' => 'person_img',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Person Image', 'kids-world'),
						'std' => 'true',
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'quote_icon',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Quote Icon', 'kids-world'),
						'std' => 'true',
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'exclude',
						'type' => 'textfield',
						'heading' => esc_html__('Exclude Categories', 'kids-world'),
						'description' => esc_html__('add testimonials categories IDs with comma seperate to exclude from display', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true	
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= TESTIMONIALS BOX SLIDER ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_testimonials_slider',
				'name'        => esc_html__( 'Testimonials Box Slider', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'testimonials_slider',
				'category'    => esc_html__( 'Sliders', 'kids-world' ),
				'description' => esc_html__( 'Slider with Testimonials posts', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_testimonials_slider',
				'params'      => array(
					array(
						'param_name' => 'person_img',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Client Image', 'kids-world'),
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'quote_icon',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Quote Icon', 'kids-world'),
						'std' => 'true',
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'arrow_navigation',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Arrow Navigation', 'kids-world'),
						'std' => 'true',
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'auto_play',
						'type' => 'dropdown',
						'heading' => esc_html__('Auto Play Sideshow', 'kids-world'),
						'std' => 'true',
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'slide_interval',
						'type' => 'textfield',
						'heading' => esc_html__('Slideshow Speed', 'kids-world'),
						'description' => esc_html__('Intreval between two slides. 1000=1 second, 5000= 5 second', 'kids-world'),
						'std' => '5000',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'slide_limit',
						'type' => 'textfield',
						'heading' => esc_html__('Slide Limit', 'kids-world'),
						'description' => esc_html__('Enter number to display testimonials slides in slideshows', 'kids-world'),
						'std' => '3',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
						'param_name' => 'exclude',
						'type' => 'textfield',
						'heading' => esc_html__('Exclude Categories', 'kids-world'),
						'description' => esc_html__('add testimonials categories IDs with comma seperate to exclude from display', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true	
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= TESTIMONIALS WIDE SLIDER ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_testimonials_wide_slider',
				'name'        => esc_html__( 'Testimonials Wide Slider', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'testimonials_slider',
				'category'    => esc_html__( 'Sliders', 'kids-world' ),
				'description' => esc_html__( 'Slider with Testimonials posts', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_testimonials_slider',
				'params'      => array(
					array(
						'param_name' => 'person_img',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Client Image', 'kids-world'),
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'arrow_navigation',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Arrow Navigation', 'kids-world'),
						'std' => 'true',
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'circle_navigation',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Circle Navigation', 'kids-world'),
						'std' => 'true',
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'auto_play',
						'type' => 'dropdown',
						'heading' => esc_html__('Auto Play Sideshow', 'kids-world'),
						'std' => 'true',
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'slide_interval',
						'type' => 'textfield',
						'heading' => esc_html__('Slideshow Speed', 'kids-world'),
						'description' => esc_html__('Intreval between two slides. 1000=1 second, 5000= 5 second', 'kids-world'),
						'std' => '5000',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'slide_limit',
						'type' => 'textfield',
						'heading' => esc_html__('Slide Limit', 'kids-world'),
						'description' => esc_html__('Enter number to display testimonials slides in slideshows', 'kids-world'),
						'std' => '3',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
						'param_name' => 'max_width',
						'type' => 'textfield',
						'heading' => esc_html__('Slider Maximum Width', 'kids-world'),
						'description' => esc_html__('Enter maximum display width in pixels', 'kids-world'),
						'std' => '800px',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
						'param_name' => 'image_border_width',
						'type' => 'textfield',
						'heading' => esc_html__('Client Image Border Width', 'kids-world'),
						'description' => esc_html__('Enter border width around client image. Enter "0px" to hide border', 'kids-world'),
						'std' => '5px',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
						'param_name' => 'exclude',
						'type' => 'textfield',
						'heading' => esc_html__('Exclude Categories', 'kids-world'),
						'description' => esc_html__('add testimonials categories IDs with comma seperate to exclude from display', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true	
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);


		/* ======= VIDEO ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_video',
				'name'        => esc_html__( 'Video', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'video_player',
				'category'    => esc_html__( 'Media', 'kids-world' ),
				'description' => esc_html__( 'Add YouTube, Vimeo or any embed video', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_video_player',
				'params'      => array(
					array(
						'param_name' => 'source',
						'type' => 'textfield',
						'heading' => esc_html__('Video URL', 'kids-world'),
						'description' => esc_html__('Enter embed YouTube/Vimeo video URL. Use sample URLs and replace video ids in sample URL. YouTube [ https://www.youtube.com/embed/sn1GG20V_m8 ] Vimeo: [ https://player.vimeo.com/video/30955798 ]', 'kids-world'),
						'std' => 'https://www.youtube.com/embed/sn1GG20V_m8',
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= TOOLTIPS ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_tooltip',
				'name'        => esc_html__( 'Tooltip', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'tooltip',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Tooltip with left, right, up and down direction', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_tooltip',
				'params'      => array(
					array(
						'param_name' => 'position',
						'type' => 'dropdown',
						'heading' => esc_html__('Tooltip Position', 'kids-world'),
						'description' => esc_html__('Select tooltip display position', 'kids-world'),
						'value' => array(
							__('Up', 'kids-world') 	=> 'tipUp',
							__('Down', 'kids-world') 	=> 'tipDown',	
							__('Left', 'kids-world') 	=> 'tipLeft',
							__('Right', 'kids-world') => 'tipRight'
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'tooltip_text',
						'std' => esc_html__('Exmaple of tooltip text', 'kids-world'),
						'type' => 'textfield',
						'heading' => esc_html__('Tooltip Text', 'kids-world'),
						'description' => esc_html__('Enter text which you want to display in tooltip', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'content',
						'std' => esc_html__('Tooltip', 'kids-world'),
						'type' => 'textarea_html',
						'heading' => esc_html__('Content', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= TEAM MEMBER - LARGE ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_team_member',
				'name'        => esc_html__( 'Team Member', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'author',
				'category'    => esc_html__( 'Advanced', 'kids-world' ),
				'description' => esc_html__( 'Person image with description', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_author',
				'params'      => array(
					array(
						'param_name' => 'image_src',
						'type' => 'attach_image',
						'heading' => esc_html__('Team Member Photo', 'kids-world'),
						'description' => esc_html__('Upload team member image. Recommended Size:[ 401px x 594px ]', 'kids-world'),
						'holder' => 'div',
						'save_always' => true			
					),
					array(
						'param_name' => 'name',
						'type' => 'textfield',
						'heading' => esc_html__('Name', 'kids-world'),
						'std' => esc_html__('John Doe', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'position',
						'type' => 'textfield',
						'heading' => esc_html__('Position', 'kids-world'),
						'std' => esc_html__('Team Leader', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),		
					array(
						'param_name' => 'content',
						'std' => '',
						'type' => 'textarea_html',
						'heading' => esc_html__('Team Member Info', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),		
					array(
						'param_name' => 'title_text_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Title Text Color', 'kids-world'),
						'std' => '#8373ce',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'image_align',
						'type' => 'dropdown',
						'heading' => esc_html__('Team Member Image Alignment', 'kids-world'),
						'std' => 'left',
						'value' => $kidsworld_vc_left_right,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'content_bg',
						'type' => 'dropdown',
						'heading' => esc_html__('Content Background', 'kids-world'),
						'std' => '',
						'value' => array(				
							__('Light Gray', 'kids-world')	=> 'gray',
							__('White', 'kids-world')			=> 'white' 												
						),
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= TEAM MEMBER - SMALL ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_team_member_small',
				'name'        => esc_html__( 'Team Member - Small', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'author',
				'category'    => esc_html__( 'Advanced', 'kids-world' ),
				'description' => esc_html__( 'Person image with name, position and icons ', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_author',
				'params'      => array(
					array(
						'param_name' => 'image_src',
						'type' => 'attach_image',
						'heading' => esc_html__('Team Member Photo', 'kids-world'),
						'description' => esc_html__('Upload team member image. Recommended Size: 401px x 594px', 'kids-world'),
						'holder' => 'div',
						'save_always' => true			
					),
					array(
						'param_name' => 'name',
						'type' => 'textfield',
						'heading' => esc_html__('Name', 'kids-world'),
						'std' => esc_html__('John Doe', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'name_text_size',
						'std' => '22px',
						'type' => 'textfield',
						'heading' => esc_html__('Name Text Size', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'position',
						'type' => 'textfield',
						'heading' => esc_html__('Position', 'kids-world'),
						'std' => esc_html__('Team Leader', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'position_text_size',
						'std' => '16px',
						'type' => 'textfield',
						'heading' => esc_html__('Position Text Size', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'text_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Text Color', 'kids-world'),
						'std' => '#8373ce',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'border_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Content Box Border Color', 'kids-world'),
						'std' => '#fcb54d',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'border_width',
						'std' => '2px',
						'type' => 'textfield',
						'heading' => esc_html__('Content Box Border Width', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'border_radius',
						'std' => '20px',
						'type' => 'textfield',
						'heading' => esc_html__('Content Box Border Radius', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'content_box_bg',
						'type' => 'colorpicker',
						'heading' => esc_html__('Content Box Background Color', 'kids-world'),
						'holder' => 'div',
						'save_always' => true,
						'std' => '#ffffff'
					),
					array(
						'param_name' => 'content_box_position',
						'type' => 'dropdown',
						'heading' => esc_html__('Team Member Image Alignment', 'kids-world'),
						'std' => '',
						'value' => array(			
							__('Below Person Image', 'kids-world') => 'bottom',
							__('Above Person Image', 'kids-world') => 'top'												
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'icon1_name',
						'type' => 'textfield',
						'heading' => esc_html__('Icon 1 URL', 'kids-world'),
						'description' => esc_html__('You can refer social media icon from this page: https://fontawesome.com/v4.7.0/icons/#brand', 'kids-world'),
						'std' => 'twitter',
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'icon1_url',
						'type' => 'textfield',
						'heading' => esc_html__('Icon 1 Link', 'kids-world'),
						'std' => '#',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'icon2_name',
						'type' => 'textfield',
						'heading' => esc_html__('Icon 2 URL', 'kids-world'),
						'std' => 'facebook',
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'icon2_url',
						'type' => 'textfield',
						'heading' => esc_html__('Icon 2 Link', 'kids-world'),
						'std' => '#',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'icon3_name',
						'type' => 'textfield',
						'heading' => esc_html__('Icon 3 URL', 'kids-world'),
						'std' => 'linkedin',
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'icon3_url',
						'type' => 'textfield',
						'heading' => esc_html__('Icon 3 Link', 'kids-world'),
						'std' => '#',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'icon4_name',
						'type' => 'textfield',
						'heading' => esc_html__('Icon 4 URL', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'icon4_url',
						'type' => 'textfield',
						'heading' => esc_html__('Icon 4 Link', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'icon5_name',
						'type' => 'textfield',
						'heading' => esc_html__('Icon 5 URL', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'icon5_url',
						'type' => 'textfield',
						'heading' => esc_html__('Icon 5 Link', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= IMAGE FRAME WITH ALIGNMENT ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_image',
				'name'        => esc_html__( 'Single Image', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'image',
				'category'    => esc_html__( 'Media', 'kids-world' ),
				'description' => esc_html__( 'Add image with left-right align and lightbox', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_image',
				'params'      => array(
					array(
						'param_name' => 'src',
						'type' => 'attach_image',
						'heading' => esc_html__('Image', 'kids-world'),
						'holder' => 'div',
						'save_always' => true		
					),		
					array(
						'param_name' => 'link',
						'type' => 'textfield',
						'heading' => esc_html__('Link on Image', 'kids-world'),
						'description' => esc_html__('If you want to add lightbox property on this image then give full size image path in above box.', 'kids-world'),
						'std' => '#',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'lightbox',
						'type' => 'dropdown',
						'heading' => esc_html__('Lightbox', 'kids-world'),
						'description' => esc_html__('Select event you want after click on thumbnail', 'kids-world'),
						'value' => array(
							__('Display Large Image In Lightbox', 'kids-world') 		=> 'true',
							__('Disable Lightbox and Go to link page', 'kids-world') 	=> 'false' 														
						),
						'holder' => 'div',
						'save_always' => true		         
					),
					array(
						'param_name' => 'lightbox_type',
						'type' => 'dropdown',
						'heading' => esc_html__('Lightbox Type', 'kids-world'),
						'description' => esc_html__('If you want to display video in light box then select Video.', 'kids-world'),
						'value' => array(
							__('Image', 'kids-world') => 'image',
							__('Video', 'kids-world') => 'video' 														
						),
						'holder' => 'div',
						'save_always' => true		         
					),
					array(
						'param_name' => 'align',
						'type' => 'dropdown',
						'heading' => esc_html__('Image Alignment', 'kids-world'),
						'description' => esc_html__('Select column as per images size.', 'kids-world'),
						'std' => 'left',
						'value' => $kidsworld_vc_left_center_right,
						'holder' => 'div',
						'save_always' => true
					),				
					array(
						'param_name' => 'alt',
						'type' => 'textfield',
						'heading' => esc_html__('Image Alternate Text', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true
					),		
					array(
						'param_name' => 'title',
						'type' => 'textfield',
						'heading' => esc_html__('Image Title Text', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'border_radius',
						'type' => 'textfield',
						'heading' => esc_html__('Image Border Radius', 'kids-world'),
						'std' => '10px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'target',
						'type' => 'dropdown',
						'heading' => esc_html__('Page Link Target', 'kids-world'),
						'value' => array(				
							esc_html__('Open page in same window', 'kids-world') => '_self',
							esc_html__('Open page in new window', 'kids-world') => '_blank'																				
						),
						'std' => '_self',
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);


		/* ======= IMAGE GALLERY ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_image_gallery',
				'name'        => esc_html__( 'Gallery', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'portfolio',
				'category'    => esc_html__( 'Media', 'kids-world' ),
				'description' => esc_html__( 'Custom gallery with 1-9 column', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_portfolio',
				'params'      => array(
					array(
					'param_name' => 'image_ids',
						'type' => 'attach_images',
						'heading' => __('Add Gallery Images', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'border_radius',
						'std' => '20px',
						'type' => 'textfield',
						'heading' => __('Image Border Radius', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'image_margin',
						'std' => '20px',
						'type' => 'textfield',
						'heading' => __('Space Between Two Images', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'image_size',
						'std' => 'full',
						'type' => 'textfield',
						'heading' => __('Image Size', 'kids-world'),
						'description' => __('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme like "kidsworld-square-image","kidsworld-related-posts","kidsworld-grid-image","kidsworld-blog-featured". ).', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'columns',
						'type' => 'dropdown',
						'heading' => __('Display Column', 'kids-world'),
						'description' => '',
						'std' => '3',
						'value' => array(
							__('1 Column', 'kids-world') => '1',
							__('2 Column', 'kids-world') => '2',				
							__('3 Column', 'kids-world') => '3',		
							__('4 Column', 'kids-world') => '4',
							__('5 Column', 'kids-world') => '5',
							__('6 Column', 'kids-world') => '6',
							__('7 Column', 'kids-world') => '7',
							__('8 Column', 'kids-world') => '8',
							__('9 Column', 'kids-world') => '9'		
						),
						'holder' => 'div',
						'save_always' => true
					),	
					array(
					'param_name' => 'grid_type',
						'type' => 'dropdown',
						'heading' => __('Grid Type', 'kids-world'),
						'std' => 'none',
						'value' => array(	
							__('Masonry', 'kids-world') => 'masonry',
							__('Fit Rows', 'kids-world') => 'fitRows'
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'lightbox',
						'type' => 'dropdown',
						'heading' => __('Lightbox', 'kids-world'),
						'description' => __('Enable/Disable large image popup box', 'kids-world'),
						'value' => array(
							__('Display Large Image in Lightbox', 'kids-world') => 'true',
							__('Disable Lightbox', 'kids-world') => 'false' 														
						)		         
					),
					array(
					'param_name' => 'image_text',
						'type' => 'dropdown',
						'heading' => __('Show/Hide Image Text', 'kids-world'),
						'std' => 'none',
						'value' => array(	
							__('No Text', 'kids-world') => 'none',
							__('Only Title', 'kids-world') => 'only_title',
							__('Title and Caption', 'kids-world') => 'title_caption' 
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'hover_icon_color',
						'type' => 'colorpicker',
						'heading' => __('Image Hover Icon Color', 'kids-world'),
						'std' => '#ffffff',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'hover_icon_bg_color',
						'type' => 'colorpicker',
						'heading' => __('Image Hover Icon Background Color', 'kids-world'),
						'std' => '#f8b54e',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'title_text_size',
						'type' => 'textfield',
						'heading' => __('Image Title Text Size', 'kids-world'),
						'std' => '20px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'title_text_color',
						'type' => 'colorpicker',
						'heading' => __('Image Title Text Color', 'kids-world'),
						'std' => '#555555',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'caption_text_size',
						'type' => 'textfield',
						'heading' => __('Image Caption Text Size', 'kids-world'),
						'std' => '16px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'caption_text_color',
						'type' => 'colorpicker',
						'heading' => __('Image Caption Text Color Color', 'kids-world'),
						'std' => '#777777',
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= PROMOTION BOX ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_promotion_box',
				'name'        => esc_html__( 'Promotion Box', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'promo',
				'category'    => esc_html__( 'Advanced', 'kids-world' ),
				'description' => esc_html__( 'Box with heading, small description and button', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_promo',
				'params'      => array(
					array(
						'param_name' => 'content',
						'std' => esc_html__('This is title text of promotion box', 'kids-world'),
						'type' => 'textarea_html',
						'heading' => esc_html__('Promotion Text', 'kids-world'),
						'description' => esc_html__('Add the promotion text', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'title_text_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Title Text Color', 'kids-world'),
						'std' => '#ffffff',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'title_text_size',
						'type' => 'dropdown',
						'heading' => esc_html__('Title Text Size', 'kids-world'),
						'std' => '22',
						'value' => $kidsworld_sc_font_size,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'sub_text',
						'std' => esc_html__('this is sub line promo text', 'kids-world'),
						'type' => 'textarea',
						'heading' => esc_html__('Sub Text', 'kids-world'),
						'description' => esc_html__('Add the subline promotext', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'sub_text_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Sub Text Color', 'kids-world'),
						'std' => '#ffffff',
						'holder' => 'div',
						'save_always' => true
					),		
					array(
						'param_name' => 'sub_text_size',
						'type' => 'dropdown',
						'heading' => esc_html__('Sub Text Size', 'kids-world'),
						'std' => '13',
						'value' => $kidsworld_sc_font_size,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'button_text',
						'type' => 'textfield',
						'heading' => esc_html__('Button Text', 'kids-world'),
						'description' => esc_html__('If you want to hide button then leave this field blank', 'kids-world'),
						'std' => esc_html__('Signup Now!', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'button_link',
						'type' => 'textfield',
						'heading' => esc_html__('Button Link', 'kids-world'),
						'std' => '#',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'target',
						'type' => 'dropdown',
						'heading' => esc_html__('Button Link Target', 'kids-world'),
						'value' => array(				
							esc_html__('Open page in same window', 'kids-world') => '_self',
							esc_html__('Open page in new window', 'kids-world') => '_blank'																				
						),
						'std' => '_self',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'button_bg',
						'type' => 'colorpicker',
						'heading' => esc_html__('Button Background Color', 'kids-world'),
						'std' => '#fcb54d',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'button_text_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Button Text Color', 'kids-world'),
						'std' => '#ffffff',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'display_style',
						'type' => 'dropdown',
						'heading' => esc_html__('Box Display Stayle', 'kids-world'),
						'value' => array(
							__('Default', 'kids-world') => 'default',
							__('Text and Button Center Align', 'kids-world') => 'text_center'
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'box_background',
						'type' => 'colorpicker',
						'heading' => esc_html__('Box Background Color', 'kids-world'),
						'std' => '#8373ce',
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'border',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Border Around Box', 'kids-world'),
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= PRICING TABLES ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_pricing_table',
				'name'        => esc_html__( 'Pricing Table', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'pricing_table',
				'category'    => esc_html__( 'Advanced', 'kids-world' ),
				'description' => esc_html__( 'Add pricing table', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_pricing_table',
				'params'      => array(
					array(
						'param_name' => 'image_src',
						'type' => 'attach_image',
						'heading' => esc_html__('Heading Image', 'kids-world'),
						'description' => esc_html__('Upload heading image', 'kids-world'),
						'holder' => 'div',
						'save_always' => true		
					),
					array(
						'param_name' => 'price',
						'type' => 'textfield',
						'heading' => esc_html__('Price', 'kids-world'),
						'std' => '19',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'currency_symbol',
						'type' => 'textfield',
						'heading' => esc_html__('Currency Symbol', 'kids-world'),
						'std' => '$',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'price_sub_text',
						'type' => 'textfield',
						'heading' => esc_html__('Price Sub Text', 'kids-world'),
						'std' => 'per day',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'title',
						'type' => 'textfield',
						'heading' => esc_html__('Table Title', 'kids-world'),
						'std' => esc_html__('Title Here', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'small_description',
						'std' => 'this is a small description text about this plan',
						'type' => 'textarea',
						'heading' => esc_html__('Small Description', 'kids-world'),
						'description' => esc_html__('Add small description of this plan', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'button_text',
						'type' => 'textfield',
						'heading' => esc_html__('Button Text', 'kids-world'),
						'std' => esc_html__('Join Now!', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'button_link',
						'type' => 'textfield',
						'heading' => esc_html__('Button Link', 'kids-world'),
						'std' => '#',
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'target',
						'type' => 'dropdown',
						'heading' => esc_html__('Link Target', 'kids-world'),
						'value' => array(				
							esc_html__('Open page in same window', 'kids-world') => '_self',
							esc_html__('Open page in new window', 'kids-world') => '_blank'																				
						),
						'std' => '_self',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'content',
						'std' => '
							<ul>
							<li> Table Item One </li>
							<li> Table Item Two </li>
							<li> Table Item Three </li>
							</ul>',
						'type' => 'textarea_html',
						'heading' => esc_html__('Table Content', 'kids-world'),
						'description' => esc_html__('Add the table content in list format.', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'skin_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Skin Color', 'kids-world'),
						'std' => '#adcb69',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'skin_color_bg_text',
						'type' => 'colorpicker',
						'heading' => esc_html__('Text Color on Skin Color Background', 'kids-world'),
						'std' => '#ffffff',
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= BUTTONS ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_button',
				'name'        => esc_html__( 'Button', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'el_button',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Add button with lots of variations', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_el_button',
				'params'      => array(
					array(
						'param_name' => 'content',
						'std' => esc_html__('Read more', 'kids-world'),
						'type' => 'textarea_html',
						'heading' => esc_html__('Button Text', 'kids-world'),
						'description' => esc_html__('Add the button text. If you want to add icon before button text then use simple shortcode [fa_icon icon_name="fa-star"]. Icon Referce Website : https://fontawesome.com/v4.7.0/icons/', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'link',
						'type' => 'textfield',
						'heading' => esc_html__('Button Link', 'kids-world'),
						'std' => '#',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'target',
						'type' => 'dropdown',
						'heading' => esc_html__('Button Link Target', 'kids-world'),
						'value' => array(				
							esc_html__('Open page in same window', 'kids-world') => '_self',
							esc_html__('Open page in new window', 'kids-world') => '_blank'																				
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'bg_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Background Color', 'kids-world'),
						'std' => '#fcb54d',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'text_shadow',
						'type' => 'colorpicker',
						'heading' => esc_html__('Text Shadow Color', 'kids-world'),
						'description' => esc_html__('Add Little dark color of Button Background color to create shadow effect', 'kids-world'),
						'std' => '#e69e35',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'text_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Text Color', 'kids-world'),
						'std' => '#FFFFFF',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'text_size',
						'type' => 'dropdown',
						'heading' => esc_html__('Font Size', 'kids-world'),			
						'std' => '18',
						'value' => $kidsworld_sc_font_size,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'button_style',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Style', 'kids-world'),
						'value' => array(
							__('Default', 'kids-world') 							=> 'button_standard',	
							__('Outline - Transparent Background', 'kids-world') 	=> 'button_outline'
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'border_radius',
						'type' => 'textfield',
						'heading' => esc_html__('Border Radius', 'kids-world'),
						'description' => esc_html__('You can add border radius with diff. styles for four corners like "10px 0 10px 0" to create diff. shapes.  ', 'kids-world'),
						'std' => '10px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'line_height',
						'type' => 'textfield',
						'heading' => esc_html__('Line Height', 'kids-world'),
						'std' => '30px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'padding',
						'type' => 'textfield',
						'heading' => esc_html__('Padding', 'kids-world'),
						'description' => esc_html__('Top Bottom Left and Right side padding example : "3px 20px 3px 20px"', 'kids-world'),
						'std' => '3px 20px',
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= BLOCK QUOTE ======= */

		vc_map(
		  	array(
				'base'        => 'blockquote',
				'name'        => esc_html__( 'Blockquote', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'blockquote',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Add blockquote in your content', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_blockquote',
				'params'      => array(
					array(
						'param_name' => 'content',
						'std' => esc_html__('This is sample text for blockquote', 'kids-world'),
						'type' => 'textarea_html',
						'heading' => esc_html__('Quote Text', 'kids-world'),
						'description' => esc_html__('Add the quote text', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= PULL QUOTES ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_pullquote',
				'name'        => esc_html__( 'Pull Quote', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'pullquote',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Include pull quotes in your content.', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_pullquote',
				'params'      => array(
					array(
						'param_name' => 'quote_style',
						'type' => 'dropdown',
						'heading' => esc_html__('Quote Style', 'kids-world'),
						'description' => esc_html__('Select quote style', 'kids-world'),
						'value' => array(
							esc_html__('Pull Quote Left', 'kids-world') => 'pullquote_left',
							esc_html__('Pull Quote Right', 'kids-world') => 'pullquote_right'									
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'content',
						'std' => esc_html__('This is sample text', 'kids-world'),
						'type' => 'textarea_html',
						'heading' => esc_html__('Quote Text', 'kids-world'),
						'description' => esc_html__('Add the quote text', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= INFO BOXES ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_alert',
				'name'        => esc_html__( 'Alert', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'alert',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Provide information to users with alerts', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_alert',
				'params'      => array(
					array(
						'param_name' => 'alert_type',
						'type' => 'dropdown',
						'heading' => esc_html__('Info Box Style', 'kids-world'),
						'description' => esc_html__('Select info box style', 'kids-world'),
						'value' => array(
							esc_html__('Info', 'kids-world')		=> 'info',
							esc_html__('Success', 'kids-world')	=> 'success', 	 
							esc_html__('Error', 'kids-world')		=> 'error', 	 
							esc_html__('Warning', 'kids-world')	=> 'warning', 	 
							esc_html__('Download', 'kids-world')	=> 'download', 	 
							esc_html__('Note', 'kids-world')		=> 'note' 		 
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'content',
						'std' => esc_html__('Sample text', 'kids-world'),
						'type' => 'textarea_html',
						'heading' => esc_html__('Info Box Text', 'kids-world'),
						'description' => esc_html__('Add the info box text', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= ICON ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_icon',
				'name'        => esc_html__( 'Icon', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'el_icon',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Add Font Awesome icon with variations', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_el_icon',
				'params'      => array(
					$kidsworld_fontawesome_icon_name,
					array(
						'param_name' => 'icon_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Icon Color', 'kids-world'),
						'std' => '#606060',
						'holder' => 'div',
						'save_always' => true
					),		
					array(
						'param_name' => 'icon_size',
						'type' => 'dropdown',
						'heading' => esc_html__('Icon Size', 'kids-world'),
						'value' => array(
							esc_html__('Tiny', 'kids-world')		=> 'tiny',
							esc_html__('Small', 'kids-world') 	=> 'small',
							esc_html__('Medium', 'kids-world')	=> 'medium',
							esc_html__('Large', 'kids-world') 	=> 'large',
							esc_html__('xlarge', 'kids-world')	=> 'xlarge'
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'icon_style',
						'type' => 'dropdown',
						'heading' => esc_html__('Icon Style', 'kids-world'),
						'value' => array(
							esc_html__('Default', 'kids-world') 					=> 'default',
							esc_html__('Icon with Square Shape', 'kids-world') 	=> 'square',
							esc_html__('Icon with Circle Shape', 'kids-world') 	=> 'circle'					
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'icon_bg_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Icon Background', 'kids-world'),
						'description' => __('If "Icon Style" drodown is selected "Icon with Square or Circle Shape" then enter icon background color', 'kids-world'),				
						'std' => '#FFFFFF',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'icon_border',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Icon Border', 'kids-world'),
						'description' => esc_html__('If "Icon Style" drodown is selected "Icon with Square or Circle Shape" then you can add border on square or circle shape', 'kids-world'),
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'border_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Border Color', 'kids-world'),
						'description' => __('If "Display Icon Border" drodown is selected "Yes" then enter icon border color', 'kids-world'),
						'std' => '#FFFFFF',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'link',
						'type' => 'textfield',
						'heading' => esc_html__('Link', 'kids-world'),
						'description' => esc_html__('Enter full url to create clickable icon', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'target',
						'type' => 'dropdown',
						'heading' => esc_html__('Link Target', 'kids-world'),
						'value' => array(				
							esc_html__('Open page in same window', 'kids-world') => '_self',
							esc_html__('Open page in new window', 'kids-world') => '_blank'																				
						),
						'std' => '_self',
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'margin',
						'type' => 'textfield',
						'heading' => esc_html__('Margin', 'kids-world'),
						'description' => esc_html__('Set margin around icon.', 'kids-world'),
						'std' => '3px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'rotate',
						'type' => 'dropdown',
						'heading' => esc_html__('Rotate Icon', 'kids-world'),			
						'value' => array(
							esc_html__('No', 'kids-world') 	=> 'false',
							esc_html__('Yes', 'kids-world')	=> 'true'
						),
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'animation_style',
						'type' => 'dropdown',
						'heading' => esc_html__('Animation Style', 'kids-world'),
						'description' => esc_html__('Select icon animation style', 'kids-world'),
						'value' => array(
							esc_html__('None', 'kids-world')					=> 'none',				
							esc_html__('Expand from Center', 'kids-world')	=> 'kidsworld_center_expand',
							esc_html__('Move Left to Right', 'kids-world')	=> 'move_left_to_right',
							esc_html__('Move Right to Left', 'kids-world')	=> 'move_right_to_left',
							esc_html__('Move Top to Bottom', 'kids-world')	=> 'move_top_to_bottom',
							esc_html__('Move Bottom to Top', 'kids-world')	=> 'move_bottom_to_top'
						),
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= TEXT BLOCK ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_text_block',
				'name'        => esc_html__( 'Text Block ( Custom )', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'pagetext',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Include a block of text in your content. Use [break] shortcode for line break in text block content.', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_pricing_table',
				'params'      => array(	
					array(
						'param_name' => 'content',
						'std' => 'add your content here',
						'type' => 'textarea_html',
						'heading' => esc_html__('Enter Your Text', 'kids-world'),
						'description' => esc_html__('Include a block of text in your content', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= GAP ======= */

		vc_map(
		  	array(
				'base'        => 'gap',
				'name'        => esc_html__( 'Gap', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'gap',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Blank space with Custom Height', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_gap',
				'params'      => array(
					array(
						'param_name' => 'size',
						'type' => 'textfield',
						'heading' => esc_html__('Size', 'kids-world'),
						'description' => esc_html__('Enter gap size in pixels.', 'kids-world'),
						'std' => '30px',
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= HORIZONTAL LINE ======= */

		vc_map(
		  	array(
				'base'        => 'hr',
				'name'        => esc_html__( 'Horizontal Line', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'line',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Add horizontal line with icon ', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_line',
				'params'      => array(
					$kidsworld_fontawesome_icon_name,
					array(
						'param_name' => 'icon_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Icon Color', 'kids-world'),
						'std' => '#8373ce',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'border_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Border Color', 'kids-world'),
						'std' => '#fbb44d',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'margin_top',
						'type' => 'textfield',
						'heading' => esc_html__('Top Margin', 'kids-world'),
						'std' => '80px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'margin_bottom',
						'type' => 'textfield',
						'heading' => esc_html__('Bottom Margin', 'kids-world'),
						'std' => '80px',
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= DIVIDERS ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_divider',
				'name'        => esc_html__( 'Dividers', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'line',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Add dividers between content', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_line',
				'params'      => array(
					array(
						'param_name' => 'divider_type',
						'type' => 'dropdown',
						'heading' => esc_html__('Divider Type', 'kids-world'),
						'std' => 'line2',
						'value' => array(
							esc_html__('Line 1px', 'kids-world')	=> 'line1',
							esc_html__('Line 2px', 'kids-world')	=> 'line2',
							esc_html__('Line 3px', 'kids-world')	=> 'line3',
							esc_html__('Double Line', 'kids-world')	=> 'double_line',
							esc_html__('Square Open', 'kids-world')	=> 'square_o',
							esc_html__('Square Full', 'kids-world')	=> 'square',
							esc_html__('Circle Open', 'kids-world')	=> 'circle_o',
							esc_html__('Circle Full', 'kids-world')	=> 'circle'										
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Divider Color', 'kids-world'),
						'std' => '#444444',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'max_width',
						'type' => 'textfield',
						'heading' => esc_html__('Divider Maximum Width', 'kids-world'),
						'description' => esc_html__('Only for divider type "Line 1px, Line 2px, Line 3px and Double Line". (e.g. 100px, 100%, 50px)', 'kids-world'),
						'std' => '50px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'text_align',
						'type' => 'dropdown',
						'heading' => esc_html__('Text Align', 'kids-world'),
						'std' => 'left',
						'value' => array(	
							esc_html__('Left', 'kids-world') 	=> 'left',
							esc_html__('Center', 'kids-world') 	=> 'center',
							esc_html__('Right', 'kids-world') => 'right' 
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'margin_top',
						'type' => 'textfield',
						'heading' => esc_html__('Top Margin', 'kids-world'),
						'std' => '20px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'margin_bottom',
						'type' => 'textfield',
						'heading' => esc_html__('Bottom Margin', 'kids-world'),
						'std' => '20px',
						'holder' => 'div',
						'save_always' => true
					),				
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= FANCY HEADING ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_fancy_heading',
				'name'        => esc_html__( 'Fancy Heading', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'heading',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Heading with border and icon', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_heading',
				'params'      => array(
					array(
						'param_name' => 'content',
						'std' => esc_html__('Title Text Here', 'kids-world'),
						'type' => 'textarea_html',
						'heading' => esc_html__('Section Title', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'font_size',
						'type' => 'dropdown',
						'heading' => esc_html__('Font Size', 'kids-world'),
						'std' => '30',
						'value' => $kidsworld_sc_font_size,
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'text_align',
						'type' => 'dropdown',
						'heading' => esc_html__('Title Align', 'kids-world'),
						'std' => 'repeat',
						'std' => 'center',
						'value' => $kidsworld_vc_left_center_right,
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_fontawesome_icon_name,
					array(
						'param_name' => 'icon_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Icon Color', 'kids-world'),
						'std' => '#8373ce',
						'holder' => 'div',
						'save_always' => true
					),		
					array(
						'param_name' => 'border_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Border Color', 'kids-world'),
						'std' => '#f8b54d',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'line_height',
						'type' => 'dropdown',
						'heading' => esc_html__('Line Height', 'kids-world'),
						'std' => '36',
						'value' => $kidsworld_sc_font_size,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'margin_top',
						'type' => 'textfield',
						'heading' => esc_html__('Margin Top', 'kids-world'),
						'description' => esc_html__('Enter title margin top value in pixels.', 'kids-world'),
						'std' => '40px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'margin_bottom',
						'type' => 'textfield',
						'heading' => esc_html__('Margin Bottom', 'kids-world'),
						'description' => esc_html__('Enter title margin bottom value in pixels.', 'kids-world'),
						'std' => '40px',
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= DROPCAPS ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_dropcap',
				'name'        => esc_html__( 'Dropcaps', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'dropcap',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Include dropcap in your content', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_dropcap',
				'params'      => array(
					array(
						'param_name' => 'dropcap_style',
						'type' => 'dropdown',
						'heading' => esc_html__('Dropcap Style', 'kids-world'),
						'description' => esc_html__('Select dropcaps style', 'kids-world'),
						'value' => array(				
							esc_html__('Light', 'kids-world') => 'light',
							esc_html__('Dark', 'kids-world') => 'dark' 				
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'border_radius',
						'std' => '5px',
						'type' => 'textfield',
						'heading' => esc_html__('Dropcap Border Radius', 'kids-world'),
						'holder' => 'div',
						'save_always' => true		
					),					
					array(
						'param_name' => 'content',
						'std' => esc_html__('A', 'kids-world'),
						'type' => 'textfield',
						'heading' => esc_html__('Dropcap Text', 'kids-world'),
						'description' => esc_html__('Add the dropcap text', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= FONT ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_font',
				'name'        => esc_html__( 'Font', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'font',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Include text with size, line height, color', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_font',
				'params'      => array(
					array(
						'param_name' => 'color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Font Color', 'kids-world'),			
						'std' => '',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'size',
						'type' => 'dropdown',
						'heading' => esc_html__('Font Size', 'kids-world'),			
						'std' => '22',
						'value' => $kidsworld_sc_font_size,
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'line_height',
						'type' => 'dropdown',
						'heading' => esc_html__('Font Line Height', 'kids-world'),			
						'std' => '22',
						'value' => $kidsworld_sc_font_size,
						'holder' => 'div',
						'save_always' => true
					),		
					array(
						'param_name' => 'weight',
						'type' => 'dropdown',
						'heading' => esc_html__('Font Weight', 'kids-world'),			
						'value' => array(				
							esc_html__('Normal', 'kids-world') => 'normal',
							esc_html__('Bold', 'kids-world') => 'bold' 				
						),
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'content',
						'std' => esc_html__('Your Text Here', 'kids-world'),
						'type' => 'textarea_html',
						'heading' => esc_html__('Description Text', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= SERVICES ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_school_service',
				'name'        => esc_html__( 'Services - Default Style', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'services',
				'category'    => esc_html__( 'Advanced', 'kids-world' ),
				'description' => esc_html__( 'Include services in your content', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_services',
				'params'      => array(
					$kidsworld_fontawesome_icon_name,
					array(
						'param_name' => 'title',
						'std' => esc_html__('Service Title', 'kids-world'),
						'type' => 'textfield',
						'heading' => esc_html__('Service Title', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'content',
						'std' => esc_html__('Service description text here', 'kids-world'),
						'type' => 'textarea_html',
						'heading' => esc_html__('Service Description', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'skin_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Skin Color', 'kids-world'),			
						'std' => '#adcb69',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'border_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Border Color', 'kids-world'),			
						'std' => '#fdd94e',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'text_align',
						'type' => 'dropdown',
						'heading' => esc_html__('Text Align', 'kids-world'),
						'value' => $kidsworld_vc_left_right,
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= EVENTS ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_events',
				'name'        => esc_html__( 'Events - Large', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'calendar',
				'category'    => esc_html__( 'Recent Posts', 'kids-world' ),
				'description' => esc_html__( 'Add Upcoming or Past events', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_calendar',
				'params'      => array(
					array(
						'param_name' => 'event_type',
						'type' => 'dropdown',
						'heading' => esc_html__('Event Type', 'kids-world'),
						'std' => 'upcoming',
						'value' => array(
							esc_html__('Upcoming Events', 'kids-world')	=> 'upcoming',
							esc_html__('Past Events', 'kids-world')	 	=> 'past' 					
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'display_events',
						'type' => 'textfield',
						'heading' => esc_html__('Post Limit', 'kids-world'),
						'description' => esc_html__('Number of posts to display', 'kids-world'),
						'std' => '3',
						'holder' => 'div',
						'save_always' => true	
					),
					array(
						'param_name' => 'excerpt',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Excerpt', 'kids-world'),			
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'address',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Address', 'kids-world'),			
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true		         
					),
					array(
						'param_name' => 'exclude',
						'type' => 'textfield',
						'heading' => esc_html__('Exclude Categories', 'kids-world'),
						'description' => esc_html__('add events categories IDs with comma seperate to exclude from post list', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true		
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= EVENTS ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_events_posts_square',
				'name'        => esc_html__( 'Events - Square Box', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'calendar',
				'category'    => esc_html__( 'Recent Posts', 'kids-world' ),
				'description' => esc_html__( 'Add Upcoming or Past events', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_calendar',
				'params'      => array(
					array(
						'param_name' => 'event_type',
						'type' => 'dropdown',
						'heading' => esc_html__('Event Type', 'kids-world'),
						'std' => 'upcoming',
						'value' => array(
							esc_html__('Upcoming Events', 'kids-world')	=> 'upcoming',
							esc_html__('Past Events', 'kids-world')	 	=> 'past' 					
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'display_events',
						'type' => 'textfield',
						'heading' => esc_html__('Post Limit', 'kids-world'),
						'description' => esc_html__('Number of posts to display', 'kids-world'),
						'std' => '3',
						'holder' => 'div',
						'save_always' => true	
					),
					array(
						'param_name' => 'desc_limit',
						'type' => 'textfield',
						'heading' => esc_html__('Description Limit', 'kids-world'),
						'description' => esc_html__('Number of characters to display in summery text', 'kids-world'),
						'std' => '150',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
						'param_name' => 'exclude',
						'type' => 'textfield',
						'heading' => esc_html__('Exclude Categories', 'kids-world'),
						'description' => esc_html__('add events categories IDs with comma seperate to exclude from post list', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true		
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= PORTFOLIO ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_portfolio',
				'name'        => esc_html__( 'Portfolio', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'portfolio',
				'category'    => esc_html__( 'Recent Posts', 'kids-world' ),
				'description' => esc_html__( 'Display portfolio items with variations', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_portfolio',
				'params'      => array(
					array(
						'param_name' => 'display_items',
						'type' => 'textfield',
						'heading' => esc_html__('Post Limit', 'kids-world'),
						'description' => esc_html__('Number of posts to display', 'kids-world'),
						'std' => '3',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
						'param_name' => 'excerpt',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Excerpt', 'kids-world'),			
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true		         
					),
					array(
						'param_name' => 'title_section',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Title', 'kids-world'),			
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true		         
					),
					array(
						'param_name' => 'column',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Column', 'kids-world'),
						'description' => esc_html__('Select display column for recent work items', 'kids-world'),
						'std' => '3',
						'value' => array(
							esc_html__('2 Column', 'kids-world') => '2',
							esc_html__('3 Column', 'kids-world') => '3',
							esc_html__('4 Column', 'kids-world') => '4' 								
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'lightbox',
						'type' => 'dropdown',
						'heading' => esc_html__('Lightbox', 'kids-world'),
						'description' => esc_html__('Select event you want after click on thumbnail', 'kids-world'),
						'value' => array(
							esc_html__('Display Large Image In Lightbox', 'kids-world') => 'true',
							esc_html__('Disable Lightbox and Go to link page', 'kids-world') => 'false' 														
						),
						'holder' => 'div',
						'save_always' => true		         
					),
					array(
						'param_name' => 'title_text_link',
						'type' => 'dropdown',
						'heading' => esc_html__('Add link on Portfolio Title Text', 'kids-world'),			
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true		         
					),
					array(
						'param_name' => 'title_text_size',
						'type' => 'dropdown',
						'heading' => esc_html__('Title Text Size', 'kids-world'),			
						'std' => '20',
						'value' => $kidsworld_sc_font_size,
						'holder' => 'div',
						'save_always' => true
					),	
					array(
						'param_name' => 'title_text_line_height',
						'type' => 'textfield',
						'heading' => esc_html__('Title Text Line Height', 'kids-world'),
						'std' => '30px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'excerpt_text_size',
						'type' => 'dropdown',
						'heading' => esc_html__('Excerpt Font Size', 'kids-world'),			
						'std' => '16',
						'value' => $kidsworld_sc_font_size,
						'holder' => 'div',
						'save_always' => true
					), 
					array(
						'param_name' => 'excerpt_text_line_height',
						'type' => 'textfield',
						'heading' => esc_html__('Excerpt Text Line Height', 'kids-world'),
						'std' => '24px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'item_space',
						'type' => 'textfield',
						'heading' => esc_html__('Space Between Two Items', 'kids-world'),
						'description' => esc_html__('Add space between two portfolio items. Enter only numbers.', 'kids-world'),
						'std' => '12',
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'exclude',
						'type' => 'textfield',
						'heading' => esc_html__('Exclude Categories', 'kids-world'),
						'description' => esc_html__('add portfolio categories IDs with comma seperate to exclude from post list', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true		
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= CLASSES ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_classes',
				'name'        => esc_html__( 'Classes', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'education',
				'category'    => esc_html__( 'Recent Posts', 'kids-world' ),
				'description' => esc_html__( 'Include Class posts in your content', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_education',
				'params'      => array(
					array(
						'param_name' => 'display_items',
						'type' => 'textfield',
						'heading' => esc_html__('Post Limit', 'kids-world'),
						'description' => esc_html__('Number of posts to display', 'kids-world'),
						'std' => '3',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
						'param_name' => 'excerpt',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Excerpt', 'kids-world'),			
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true		         
					),
					array(
						'param_name' => 'column',
						'type' => 'dropdown',
						'heading' => __('Column', 'kids-world'),		
						'std' => '3',	
						'value' => array(
							'1'	=> '1',
							'2' => '2',
							'3' => '3'												
						),
						'holder' => 'div',
						'save_always' => true		         
					),
					array(
						'param_name' => 'exclude',
						'type' => 'textfield',
						'heading' => esc_html__('Exclude Categories', 'kids-world'),
						'description' => esc_html__('add events categories IDs with comma seperate to exclude from post list', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true		
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= LOGO SLIDER ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_logo_slider',
				'name'        => esc_html__( 'Logo Slider', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'slider',
				'category'    => esc_html__( 'Sliders', 'kids-world' ),
				'description' => esc_html__( 'Display Client logos with carousel slider', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_slider',
				'params'      => array(
					array(
					'param_name' => 'display_logos',
						'type' => 'textfield',
						'heading' => esc_html__('Number of Logo Thumbnails', 'kids-world'),
						'description' => esc_html__('Enter number of logo thumbnails to display in slider', 'kids-world'),
						'std' => '20',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
					'param_name' => 'margin',
						'type' => 'textfield',
						'heading' => esc_html__('Thumbnail Margin', 'kids-world'),
						'description' => esc_html__('Enter margin between two thumbnails in pixels e.g. "5px" "10px"', 'kids-world'),
						'std' => '-1px',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
					'param_name' => 'lightbox',
						'type' => 'dropdown',
						'heading' => esc_html__('Lightbox', 'kids-world'),
						'description' => esc_html__('Select event you want after click on thumbnail', 'kids-world'),
						'std' => 'false',
						'value' => array(
							esc_html__('Disable Lightbox and Go to link page', 'kids-world')	=> 'false',												
							esc_html__('Display Large Image In Lightbox', 'kids-world')		=> 'true'
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'arrow_navigation',
						'type' => 'dropdown',
						'heading' => esc_html__('Display Arrow Navigation', 'kids-world'),
						'std' => 'false',
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),	
					array(	
					'param_name' => 'slide_interval',
						'type' => 'textfield',
						'heading' => esc_html__('Slideshow Speed', 'kids-world'),
						'description' => esc_html__('Intreval between two slides. 1000=1 second, 5000= 5 second', 'kids-world'),
						'std' => '5000',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
					'param_name' => 'auto_play',
						'type' => 'dropdown',
						'heading' => esc_html__('Auto Play', 'kids-world'),
						'std' => 'true',
						'value' => $kidsworld_vc_yes_no,
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'thumbnail_background',
						'type' => 'colorpicker',
						'heading' => esc_html__('Thumbnail Background Color', 'kids-world'),
						'std' => '#ffffff',
						'holder' => 'div',
						'save_always' => true
					),
					array(	
					'param_name' => 'desktop_items',
						'type' => 'textfield',
						'heading' => esc_html__('Number of Thumbnails for Large Screens', 'kids-world'),
						'description' => esc_html__('Enter number to display logo thumbnails in desktop resolution', 'kids-world'),
						'std' => '5',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
					'param_name' => 'tablet_vertical_items',
						'type' => 'textfield',
						'heading' => esc_html__('Number of Thumbnails for Tablet/iPad ', 'kids-world'),
						'description' => esc_html__('Enter number to display in Tablet Vertical resolution ', 'kids-world'),
						'std' => '4',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
					'param_name' => 'mobile_horizontal_items',
						'type' => 'textfield',
						'heading' => esc_html__('Number of Thumbnails for Mobile Horizontal', 'kids-world'),
						'description' => esc_html__('Enter number to display in mobile horizontal resolution', 'kids-world'),
						'std' => '2',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
					'param_name' => 'mobile_vertical_items',
						'type' => 'textfield',
						'heading' => esc_html__('Number of Thumbnails for Mobile Vertical', 'kids-world'),
						'description' => esc_html__('Enter number to display in mobile vertical resolution', 'kids-world'),
						'std' => '1',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
					'param_name' => 'exclude',
						'type' => 'textfield',
						'heading' => esc_html__('Exclude Categories', 'kids-world'),
						'description' => esc_html__('add logo categories IDs with comma seperate to exclude from post list', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'target',
						'type' => 'dropdown',
						'heading' => esc_html__('Thumbnail Link Target', 'kids-world'),
						'value' => array(				
							esc_html__('Open page in same window', 'kids-world') => '_self',
							esc_html__('Open page in new window', 'kids-world') => '_blank'																				
						),
						'std' => '_blank',
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= LOGO - GRID ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_logo_grid',
				'name'        => esc_html__( 'Logos Grid', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'paint',
				'category'    => esc_html__( 'Recent Posts', 'kids-world' ),
				'description' => esc_html__( 'Display Logo Thumbnails with Grid Columns', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_paint',
				'params'      => array(
					array(
					'param_name' => 'display_logos',
						'type' => 'textfield',
						'heading' => esc_html__('Number of Logo Thumbnails', 'kids-world'),
						'description' => esc_html__('Enter number of logo thumbnails to display', 'kids-world'),
						'std' => '20',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
					'param_name' => 'columns',
						'type' => 'textfield',
						'heading' => esc_html__('Grid Column', 'kids-world'),
						'description' => esc_html__('Enter number to display thumbnails in grid column', 'kids-world'),
						'std' => '5',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
					'param_name' => 'margin',
						'type' => 'textfield',
						'heading' => esc_html__('Thumbnail Margin', 'kids-world'),
						'description' => esc_html__('Enter margin between two thumbnails in pixels e.g. "5px" "10px"', 'kids-world'),
						'std' => '-1px',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
					'param_name' => 'thumbnail_background',
						'type' => 'colorpicker',
						'heading' => esc_html__('Thumbnail Background Color', 'kids-world'),
						'std' => '#ffffff',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'thumbnail_border_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Thumbnail Border Color', 'kids-world'),
						'std' => '#ffffff',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'thumbnail_border_width',
						'type' => 'textfield',
						'heading' => esc_html__('Thumbnail Border Width', 'kids-world'),
						'std' => '1px',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
					'param_name' => 'thumbnail_border_radius',
						'type' => 'textfield',
						'heading' => esc_html__('Thumbnail Border Radius', 'kids-world'),
						'std' => '0',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
					'param_name' => 'lightbox',
						'type' => 'dropdown',
						'heading' => esc_html__('Lightbox', 'kids-world'),
						'description' => esc_html__('Select event you want after click on thumbnail', 'kids-world'),
						'std' => 'false',
						'value' => array(
							esc_html__('Disable Lightbox and Go to link page', 'kids-world')	=> 'false',												
							esc_html__('Display Large Image In Lightbox', 'kids-world')		=> 'true'
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'exclude',
						'type' => 'textfield',
						'heading' => esc_html__('Exclude Categories', 'kids-world'),
						'description' => esc_html__('add logo categories IDs with comma seperate to exclude from post list', 'kids-world'),
						'std' => '',
						'holder' => 'div',
						'save_always' => true		
					),
					array(
						'param_name' => 'target',
						'type' => 'dropdown',
						'heading' => esc_html__('Thumbnail Link Target', 'kids-world'),
						'value' => array(				
							esc_html__('Open page in same window', 'kids-world') => '_self',
							esc_html__('Open page in new window', 'kids-world') => '_blank'																				
						),
						'std' => '_blank',
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= SERVICES - STYLE ICON ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_service_style_icon',
				'name'        => esc_html__( 'Services - Icon Style', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'services',
				'category'    => esc_html__( 'Advanced', 'kids-world' ),
				'description' => esc_html__( 'Display services with icon style', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_services',
				'params'      => array(
					array(
					'param_name' => 'title_text',
						'std' => esc_html__('Service Title', 'kids-world'),
						'type' => 'textfield',
						'heading' => esc_html__('Service Title', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'content',
						'std' => esc_html__('Service description text here', 'kids-world'),
						'type' => 'textarea_html',
						'heading' => esc_html__('Service Description', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'title_text_size',
						'std' => '18px',
						'type' => 'textfield',
						'heading' => esc_html__('Title Text Size', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'title_text_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Title Text Color', 'kids-world'),			
						'std' => '#444444',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'title_bottom_margin',
						'type' => 'textfield',
						'heading' => esc_html__('Title Text Bottom Margin', 'kids-world'),
						'std' => '10px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'title_icon_link',
						'std' => '',
						'type' => 'textfield',
						'heading' => esc_html__('Link on Title Text and Icon', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'target',
						'type' => 'dropdown',
						'heading' => esc_html__('Link Target', 'kids-world'),
						'value' => array(				
							esc_html__('Open page in same window', 'kids-world') => '_self',
							esc_html__('Open page in new window', 'kids-world') => '_blank'																				
						),
						'std' => '_self',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'icon_space',
						'std' => '20px',
						'type' => 'textfield',
						'heading' => esc_html__('Space Between Icon and Content', 'kids-world'),
						'description' => esc_html__('Enter margin between icon and content in pixels', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_fontawesome_icon_name,
					array(
					'param_name' => 'icon_position',
						'type' => 'dropdown',
						'heading' => esc_html__('Icon Position', 'kids-world'),
						'std' => 'left',
						'value' => $kidsworld_vc_left_center_right,
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'icon_size',
						'type' => 'dropdown',
						'heading' => esc_html__('Icon Size', 'kids-world'),
						'std' => 'medium',
						'value' => array(	
							esc_html__('Tiny', 'kids-world') 	=> 'tiny',
							esc_html__('Small', 'kids-world') 	=> 'small',
							esc_html__('Medium', 'kids-world') 	=> 'medium',
							esc_html__('Large', 'kids-world') 	=> 'large',
							esc_html__('X-Large', 'kids-world') 	=> 'x-large',
							esc_html__('Super Large', 'kids-world') 	=> 'super-large' 
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'icon_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Icon Color', 'kids-world'),			
						'std' => '#444444',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'icon_style',
						'type' => 'dropdown',
						'heading' => esc_html__('Icon Display Style', 'kids-world'),
						'std' => 'icon_box',
						'value' => array(	
							esc_html__('Icon with Border and Background Box', 'kids-world') 	=> 'icon_box',
							esc_html__('Simple Icon', 'kids-world') 	=> 'icon_nobox'
						),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'icon_background',
						'type' => 'colorpicker',
						'heading' => esc_html__('Icon Box Background Color', 'kids-world'),
						'description' => __('Skip this option if "Icon Display Style" is "Simple Icon"', 'kids-world'),		
						'std' => '#ffffff',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'border_width',
						'std' => '1px',
						'type' => 'textfield',
						'heading' => esc_html__('Icon Box Border Width', 'kids-world'),
						'description' => __('Skip this option if "Icon Display Style" is "Simple Icon"', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'border_radius',
						'std' => '5px',
						'type' => 'textfield',
						'heading' => esc_html__('Icon Box Border Radius', 'kids-world'),
						'description' => __('Skip this option if "Icon Display Style" is "Simple Icon"', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'border_type',
						'type' => 'dropdown',
						'heading' => esc_html__('Icon Box Border Type', 'kids-world'),
						'std' => 'medium',
						'description' => __('Skip this option if "Icon Display Style" is "Simple Icon"', 'kids-world'),
						'value' => $kidsworld_vc_border_type,
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'border_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Icon Box Border Color', 'kids-world'),	
						'description' => __('Skip this option if "Icon Display Style" is "Simple Icon"', 'kids-world'),		
						'std' => '#e6e6e6',
						'holder' => 'div',
						'save_always' => true
					),					
					array(
					'param_name' => 'responsive_width',
						'std' => '767px',
						'type' => 'textfield',
						'heading' => esc_html__('Responsive Width', 'kids-world'),
						'description' => esc_html__('Enter responsive width where icon will move from left or right to center. It depends on column and icon size. If you are using services in 4 column then responsive width should be iPad width (979) and for 2 column iPhone horizontal (767). Responsive Width Number is flexible to any size (e.g. 0 to 1200 or more).', 'kids-world'),		
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);


		/* ======= SERVICES - STYLE IMAGE ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_service_style_image',
				'name'        => esc_html__( 'Services - Image Style', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'services',
				'category'    => esc_html__( 'Advanced', 'kids-world' ),
				'description' => esc_html__( 'Display services with image style', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_services',
				'params'      => array(
					array(
					'param_name' => 'title_text',
						'std' => esc_html__('Service Title', 'kids-world'),
						'type' => 'textfield',
						'heading' => esc_html__('Service Title', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'content',
						'std' => esc_html__('Service description text here', 'kids-world'),
						'type' => 'textarea_html',
						'heading' => esc_html__('Service Description', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'title_text_size',
						'std' => '18px',
						'type' => 'textfield',
						'heading' => esc_html__('Title Text Size', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'title_text_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Title Text Color', 'kids-world'),			
						'std' => '#444444',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'title_bottom_margin',
						'type' => 'textfield',
						'heading' => esc_html__('Title Text Bottom Margin', 'kids-world'),
						'std' => '10px',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'title_image_link',
						'std' => '',
						'type' => 'textfield',
						'heading' => esc_html__('Link on Title Text and Image', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'target',
						'type' => 'dropdown',
						'heading' => esc_html__('Link Target', 'kids-world'),
						'value' => array(				
							esc_html__('Open page in same window', 'kids-world') => '_self',
							esc_html__('Open page in new window', 'kids-world') => '_blank'																				
						),
						'std' => '_self',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'image_space',
						'std' => '20px',
						'type' => 'textfield',
						'heading' => esc_html__('Space Between Image and Content', 'kids-world'),
						'description' => esc_html__('Enter margin between icon and content in pixels', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'image_src',
						'type' => 'attach_image',
						'heading' => esc_html__('Image', 'kids-world'),
						'description' => esc_html__('Upload image. Image width and height size is flexible.', 'kids-world'),
						'holder' => 'div',
						'save_always' => true			
					),
					array(
					'param_name' => 'image_position',
						'type' => 'dropdown',
						'heading' => esc_html__('Image Position', 'kids-world'),
						'std' => 'center',
						'value' => $kidsworld_vc_left_center_right,
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'border_width',
						'std' => '1px',
						'type' => 'textfield',
						'heading' => esc_html__('Image Border Width', 'kids-world'),
						'description' => esc_html__('You can hide border with "0px" image width size.', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'border_radius',
						'std' => '5px',
						'type' => 'textfield',
						'heading' => esc_html__('Image Border Radius', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'border_type',
						'type' => 'dropdown',
						'heading' => esc_html__('Image Border Type', 'kids-world'),
						'std' => 'medium',
						'value' => $kidsworld_vc_border_type,
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'border_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Image Border Color', 'kids-world'),
						'std' => '#e6e6e6',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'padding',
						'std' => '0px',
						'type' => 'textfield',
						'heading' => esc_html__('Padding', 'kids-world'),
						'description' => esc_html__('Space between image and border.', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'responsive_width',
						'std' => '767px',
						'type' => 'textfield',
						'heading' => esc_html__('Responsive Width', 'kids-world'),
						'description' => esc_html__('Enter responsive width where icon will move from left or right to center. It depends on column and icon size. If you are using services in 4 column then responsive width should be iPad width (979) and for 2 column iPhone horizontal (767). Responsive Width Number is flexible to any size (e.g. 0 to 1200 or more).', 'kids-world'),
						'holder' => 'div',
						'save_always' => true		
					),
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

		/* ======= SIMPLE ICON AND TITLE ======= */

		vc_map(
		  	array(
				'base'        => 'swmsc_icon_title',
				'name'        => esc_html__( 'Simple Icon and Title', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'services',
				'category'    => esc_html__( 'Advanced', 'kids-world' ),
				'description' => esc_html__( 'Display Simple Icon with Title', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_services',
				'params'      => array(
					array(
					'param_name' => 'title_text',
						'std' => esc_html__('Service Title', 'kids-world'),
						'type' => 'textfield',
						'heading' => esc_html__('Service Title', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'text_icon_size',
						'std' => '18px',
						'type' => 'textfield',
						'heading' => esc_html__('Title Text & Icon Size', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'title_text_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Title Text Color', 'kids-world'),			
						'std' => '#444444',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'title_icon_link',
						'std' => '',
						'type' => 'textfield',
						'heading' => esc_html__('Link on Title Text and Icon', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					array(
						'param_name' => 'target',
						'type' => 'dropdown',
						'heading' => esc_html__('Link Target', 'kids-world'),
						'value' => array(				
							esc_html__('Open page in same window', 'kids-world') => '_self',
							esc_html__('Open page in new window', 'kids-world') => '_blank'																				
						),
						'std' => '_self',
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'margin_bottom',
						'std' => '20px',
						'type' => 'textfield',
						'heading' => esc_html__('Space Between Icon and Content', 'kids-world'),
						'description' => esc_html__('Enter margin between icon and content in pixels', 'kids-world'),
						'holder' => 'div',
						'save_always' => true
					),
					$kidsworld_fontawesome_icon_name,
					array(
					'param_name' => 'text_align',
						'type' => 'dropdown',
						'heading' => esc_html__('Text Align', 'kids-world'),
						'std' => 'left',
						'value' => $kidsworld_vc_left_right,
						'holder' => 'div',
						'save_always' => true
					),
					array(
					'param_name' => 'icon_color',
						'type' => 'colorpicker',
						'heading' => esc_html__('Icon Color', 'kids-world'),			
						'std' => '#444444',
						'holder' => 'div',
						'save_always' => true
					),		
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);

	/* ======= CLEAR ======= */

		vc_map(
		  	array(
				'base'        => 'clear',
				'name'        => esc_html__( 'Clear', 'kids-world' ),
				'weight'      => 1,
				'icon'        => 'clear',
				'category'    => esc_html__( 'Typography', 'kids-world' ),
				'description' => esc_html__( 'Clear floating elements.', 'kids-world' ),
				'class'       => 'kidsworld_content_element kidsworld_content_element_clear',
				'params'      => array(
					$kidsworld_sc_element_unique_id,
					$kidsworld_sc_element_unique_class,
					$kidsworld_sc_element_inline_style
				)
			)
		);


	}    /* End of function -- kidsworld_visual_composer_map_shortcodes */

  	add_action( 'vc_before_init', 'kidsworld_visual_composer_map_shortcodes' );
  	

  	/* ======= EXTEND NESTED SHORTCODE PARENT ======= */

	class WPBakeryShortCode_Swmsc_Image_Slider extends WPBakeryShortCodesContainer { }
	class WPBakeryShortCode_Swmsc_Counter_Boxes extends WPBakeryShortCodesContainer { }
	class WPBakeryShortCode_Icon_List extends WPBakeryShortCodesContainer { }
	class WPBakeryShortCode_Swmsc_Toggle_Accordion_Container extends WPBakeryShortCodesContainer { }
	class WPBakeryShortCode_Swmsc_Tabs extends WPBakeryShortCodesContainer { }
	class WPBakeryShortCode_Swmsc_Social_Media_Icons extends WPBakeryShortCodesContainer { }
	class WPBakeryShortCode_Swmsc_Simple_Section extends WPBakeryShortCodesContainer { }
	class WPBakeryShortCode_Swmsc_Section extends WPBakeryShortCodesContainer { }
	class WPBakeryShortCode_Swmsc_Content_Box extends WPBakeryShortCodesContainer { }
	class WPBakeryShortCode_Swmsc_Half_Bg_Content extends WPBakeryShortCodesContainer { }


	/* ======= EXTEND NESTED SHORTCODE CHILDREN ======= */

	class WPBakeryShortCode_Swmsc_Image_Slide extends WPBakeryShortCode { }
	class WPBakeryShortCode_Swmsc_Counter_Box extends WPBakeryShortCode { }
	class WPBakeryShortCode_Swmsc_List_Icon extends WPBakeryShortCode { }
	class WPBakeryShortCode_Swmsc_Toggle_Accordion extends WPBakeryShortCode { }
	class WPBakeryShortCode_Swmsc_Tab extends WPBakeryShortCode { }
	class WPBakeryShortCode_Swmsc_Social_Media_Icon extends WPBakeryShortCode { }	

}

/* ======= REMOVE DEFAULT SHORTCODES ======= */

if ( ! function_exists( 'kidsworld_vc_remove_default_shortcodes' ) && kidsworld_vc_settings_on() ) {
  	function kidsworld_vc_remove_default_shortcodes() {

	    //vc_remove_element( 'vc_column_text' );
	    vc_remove_element( 'vc_separator' );
	    vc_remove_element( 'vc_text_separator' );
	    vc_remove_element( 'vc_message' );
	    vc_remove_element( 'vc_facebook' );
	    vc_remove_element( 'vc_tweetmeme' );
	    vc_remove_element( 'vc_googleplus' );
	    vc_remove_element( 'vc_pinterest' );
	    vc_remove_element( 'vc_toggle' );
	    //vc_remove_element( 'vc_single_image' );
	    vc_remove_element( 'vc_gallery' );
	    vc_remove_element( 'vc_images_carousel' );
	    vc_remove_element( 'vc_tabs' );
	    vc_remove_element( 'vc_tour' );
	    vc_remove_element( 'vc_accordion' );
	    vc_remove_element( 'vc_posts_grid' );
	    //vc_remove_element( 'vc_carousel' );
	    vc_remove_element( 'vc_posts_slider' );
	    vc_remove_element( 'vc_widget_sidebar' );
	    vc_remove_element( 'vc_button' );
	    vc_remove_element( 'vc_cta_button' );
	    vc_remove_element( 'vc_video' );
	    //vc_remove_element( 'vc_gmaps' );
	    //vc_remove_element( 'vc_raw_html' );
	    //vc_remove_element( 'vc_raw_js' );
	    vc_remove_element( 'vc_flickr' );
	    vc_remove_element( 'vc_progress_bar' );
	    vc_remove_element( 'vc_pie' );
	    //vc_remove_element( 'contact-form-7' );
	    //vc_remove_element( 'rev_slider_vc' );
	    vc_remove_element( 'vc_wp_search' );
	    vc_remove_element( 'vc_wp_meta' );
	    vc_remove_element( 'vc_wp_recentcomments' );
	    vc_remove_element( 'vc_wp_calendar' );
	    vc_remove_element( 'vc_wp_pages' );
	    vc_remove_element( 'vc_wp_tagcloud' );
	    vc_remove_element( 'vc_wp_custommenu' );
	    vc_remove_element( 'vc_wp_text' );
	    vc_remove_element( 'vc_wp_posts' );
	    vc_remove_element( 'vc_wp_links' );
	    vc_remove_element( 'vc_wp_categories' );
	    vc_remove_element( 'vc_wp_archives' );
	    vc_remove_element( 'vc_wp_rss' );
	    vc_remove_element( 'vc_button2' );
	    vc_remove_element( 'vc_cta_button2' );
	   // vc_remove_element( 'vc_custom_heading' );
	    vc_remove_element( 'vc_empty_space' );
		vc_remove_element( 'vc_masonry_grid' );
		vc_remove_element( 'vc_tta_tabs' );
		vc_remove_element( 'vc_tta_tour' );
		vc_remove_element( 'vc_tta_accordion' );
		vc_remove_element( 'vc_btn' );
		vc_remove_element( 'vc_line_chart' );
		vc_remove_element( 'vc_basic_grid' );
		vc_remove_element( 'vc_cta' );
		vc_remove_element( 'vc_round_chart' );

  	}

    if ( get_option( 'wpb_js_kidsworld_vc_remove_dafault_elements', true ) ) {
		add_action( 'vc_before_init', 'kidsworld_vc_remove_default_shortcodes' );
	}
}