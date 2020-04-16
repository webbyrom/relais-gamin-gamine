(function($) {
"use strict";
    
	tinymce.PluginManager.add( 'swmShortcodes', function( editor, url ) {
		
		editor.addCommand("swmPopup", function ( a, params )
		{
			var popup = params.identifier;
			tb_show("Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 850);
		});

        editor.addButton( 'swmsc_button', {
            type: 'menubutton',
            icon: 'swmcustomicon',                    
			title:  'Shortcodes',					
			menu: 
			[
				{text: 'Column',
					menu: 
					[
						{text: '1/1',onclick:function(){
							editor.insertContent('[swmsc_one_full first] Add Content Here [/swmsc_one_full]');
						}},
						{text: '1/2 + 1/2',onclick:function(){
							editor.insertContent('[swmsc_one_half first] Add Content Here [/swmsc_one_half] <br /><br /> [swmsc_one_half] Add Content Here [/swmsc_one_half]');
						}},
						{text: '1/3 + 1/3 + 1/3',onclick:function(){
							editor.insertContent('[swmsc_one_third first] Add Content Here [/swmsc_one_third] <br /><br /> [swmsc_one_third] Add Content Here [/swmsc_one_third] <br /><br /> [swmsc_one_third] Add Content Here [/swmsc_one_third]');
						}},
						{text: '1/3 + 2/3',onclick:function(){
							editor.insertContent('[swmsc_one_third first] Add Content Here [/swmsc_one_third] <br /><br /> [swmsc_two_third] Add Content Here [/swmsc_two_third]');
						}},
						{text: '2/3 + 1/3',onclick:function(){
							editor.insertContent('[swmsc_two_third first] Add Content Here [/swmsc_two_third] <br /><br /> [swmsc_one_third] Add Content Here [/swmsc_one_third]');
						}},
						{text: '1/4 + 1/4 + 1/4 + 1/4',onclick:function(){
							editor.insertContent('[swmsc_one_fourth first] Add Content Here [/swmsc_one_fourth] <br /><br /> [swmsc_one_fourth] Add Content Here [/swmsc_one_fourth] <br /><br /> [swmsc_one_fourth] Add Content Here [/swmsc_one_fourth] <br /><br /> [swmsc_one_fourth] Add Content Here [/swmsc_one_fourth]');
						}},
						{text: '1/4 + 3/4',onclick:function(){
							editor.insertContent('[swmsc_one_fourth first] Add Content Here [/swmsc_one_fourth] <br /><br /> [swmsc_three_fourth] Add Content Here [/swmsc_three_fourth]');
						}},
						{text: '1/5 + 1/5 + 1/5 + 1/5 + 1/5',onclick:function(){
							editor.insertContent('[swmsc_one_fifth first] Add Content Here [/swmsc_one_fifth] <br /><br /> [swmsc_one_fifth] Add Content Here [/swmsc_one_fifth]  <br /><br /> [swmsc_one_fifth] Add Content Here [/swmsc_one_fifth]  <br /><br /> [swmsc_one_fifth] Add Content Here [/swmsc_one_fifth]  <br /><br /> [swmsc_one_fifth] Add Content Here [/swmsc_one_fifth]');
						}},
						{text: '1/5 + 4/5',onclick:function(){
							editor.insertContent('[swmsc_one_fifth first] Add Content Here [/swmsc_one_fifth] <br /><br /> [swmsc_four_fifth] Add Content Here [/swmsc_four_fifth]');
						}},
						{text: '1/6 + 1/6 + 1/6 + 1/6 + 1/6 + 1/6',onclick:function(){
							editor.insertContent('[swmsc_one_sixth first] Add Content Here [/swmsc_one_sixth] <br /><br /> [swmsc_one_sixth] Add Content Here [/swmsc_one_sixth]  <br /><br /> [swmsc_one_sixth] Add Content Here [/swmsc_one_sixth]  <br /><br /> [swmsc_one_sixth] Add Content Here [/swmsc_one_sixth]  <br /><br /> [swmsc_one_sixth] Add Content Here [/swmsc_one_sixth]  <br /><br /> [swmsc_one_sixth] Add Content Here [/swmsc_one_sixth]');
						}},						
						{text: '1/6 + 5/6',onclick:function(){
							editor.insertContent('[swmsc_one_sixth first] Add Content Here [/swmsc_one_sixth] <br /><br /> [swmsc_five_sixth] Add Content Here [/swmsc_five_sixth]');
						}}											
					]
				},

				{text: 'Common Elements',
					menu: 
					[                    	
                    	{text: 'Animated Colulmns',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Animated Colulmns',identifier: 'animatedcolumn'})
						}},
                    	{text: 'Block Quote',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Block Quote',identifier: 'blockquote'})
						}},
                    	{text: 'Button',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Button',identifier: 'button'})
						}},	
						{text: 'Dropcaps',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Dropcaps',identifier: 'dropcaps'})
						}},						
						{text: 'Font',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Font',identifier: 'font'})
						}},
						{text: 'Gap',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Gap',identifier: 'gap'})
						}},	
						{text: 'Horizontal Line',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Horizontal Line',identifier: 'hrline'})
						}},
						{text: 'Dividers',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Horizontal Line',identifier: 'dividers'})
						}},
							
						{text: 'Icon',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Icon',identifier: 'icon'})
						}},											
						
						{text: 'Pricing Table',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Pricing Table',identifier: 'tables'})
						}},	

						{text: 'Promo Box',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Promotion Box',identifier: 'promotionbox'})
						}},											
						{text: 'Pull Quote',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Pull Quote',identifier: 'pullquote'})
						}},						
						{text: 'Tooltip',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Tooltip',identifier: 'tooltip'})
						}},						
						{text: 'Warning Box',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Warning Box',identifier: 'infoboxes'})
						}},
						{text: 'Video',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Video',identifier: 'video'})
						}}
						
	                ]
				},			

				{text: 'Counters and Bars',
					menu: 
					[
						{text: 'Counter Boxes',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Counter Boxes',identifier: 'counterboxes'})
						}},
						{text: 'Progress Bars',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Progress Bars',identifier: 'progressbars'})
						}}
					]
				},

				{text: 'Custom Posts',
					menu: 
					[
						{text: 'Classes',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Classes',identifier: 'classes'})
						}},

						{text: 'Events - Large',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Events - Large',identifier: 'events'})
						}},

						{text: 'Events - Square Box',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Events - Square Box',identifier: 'eventssquare'})
						}},

						{text: 'Portfolio',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Portfolio',identifier: 'portfolio'})
						}},	

						{text: 'Testimonials',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Testimonials Posts',identifier: 'testimonialsposts'})
						}},

						{text: 'Logos',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Logos',identifier: 'logogrid'})
						}}

					]
				},

				{text: 'Fancy Heading',onclick:function(){
					editor.execCommand("swmPopup", false, {title: 'Fancy Heading',identifier: 'fancyheading'})
				}},

				{text: 'Full Width Section',
					menu: 
					[
						{text: 'Section with Content',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Section with Content',identifier: 'fullwidthsection'})
						}},
						{text: 'Half width Content and Background',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Half width Content and Background',identifier: 'halfbgcontent'})
						}},
						{text: 'Simple Section',onclick:function(){
							editor.insertContent('[swmsc_simple_section id=""] Your Content Here - Use this shortcode in 100% width page template and section which do not require any special background effect or color [/swmsc_simple_section]');
						}}
										
					]
				},

				{text: 'Image',
					menu: 
					[
						{text: 'Single Image',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Single Image',identifier: 'image'})
						}},
						{text: 'Image Gallery',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Image Gallery',identifier: 'customgallery'})
						}}
					]
				},
				
				{text: 'List Styles',
					menu: 
					[
						{text: 'Icons List',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Icons List',identifier: 'iconlist'})
						}},
						{text: 'Ordered List',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Ordered List',identifier: 'textlist'})
						}}						
					]
				},

				{text: 'Services',
					menu: 
					[
						{text: 'Services',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Services - Default Style',identifier: 'services'})
						}},		
						{text: 'Services - Icon Style',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Services - Icon Style',identifier: 'servicesicons'})
						}},
						{text: 'Services - Image Style',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Services - Image Style',identifier: 'servicesimages'})
						}},
						{text: 'Services - Simple Icon and Title',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Services - Simple Icon and Title',identifier: 'servicesiconstitles'})
						}},	
						{text: 'Services - Content Box',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Services - Content Box',identifier: 'servicesbox'})
						}},
														
					]
				},

				{text: 'Sliders',
					menu: 
					[
						{text: 'Image Slider',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Image Slider',identifier: 'imageslider'})
						}},			
						{text: 'Testimonials Box Slider',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Testimonials Box Slider',identifier: 'testimonialsboxslider'})
						}},
						{text: 'Testimonials Wide Slider',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Testimonials Wide Slider',identifier: 'testimonialswideslider'})
						}},
						{text: 'Logo Slider',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Logo Slider',identifier: 'logoslider'})
						}}									
					]
				},	

				{text: 'Standard Posts',
					menu: 
					[
						{text: 'Recent Posts - Large',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Recent Posts - Large',identifier: 'recentpostsfull'})
						}},
						{text: 'Recent Posts - Tiny',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Recent Posts - Tiny',identifier: 'recentpoststiny'})
						}},
						{text: 'Recent Posts - Square Box',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Recent Posts - Square Box',identifier: 'recentpostssquare'})
						}}				
					]
				},	

				{text: 'Social Media Icons',onclick:function(){
					editor.execCommand("swmPopup", false, {title: 'Social Media Icons',identifier: 'socialmedia'})
				}},

				{text: 'Tabs - Toggles',
					menu: 
					[
						{text: 'Tabs',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Tabs',identifier: 'tabs'})
						}},
						{text: 'Toggle Accordion',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Toggle Accordion',identifier: 'toggleaccordion'})
						}},
						{text: 'Toggle Simple',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Toggle Simple',identifier: 'toggle'})
						}},				
					]
				},

				{text: 'Team Members',
					menu: 
					[
						{text: 'Team Member - Full',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Team Member - Full',identifier: 'teammember'})
						}},
						{text: 'Team Member - Small',onclick:function(){
							editor.execCommand("swmPopup", false, {title: 'Team Member - Small',identifier: 'teammembersmall'})
						}}			
					]
				}						
						
			
			]			
        
	  });
 
	});
 
})(jQuery);
