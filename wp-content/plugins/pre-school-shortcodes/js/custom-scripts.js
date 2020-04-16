(function ($) {$(document).ready(function() {
// Do not delete above line

    /* Steps List Style ------------------------- */

    $(".steps ol li:first").addClass("first");
    $(".steps ol li:last").addClass("last");

    $(".steps_with_circle ol").each (function () {
        $("li", this).each (function (i) {
            $(this).prepend("<span>" + (i+1) + "</span>" );
        });
    });

    /* Image Slider ------------------------- */

    $(".swmsc_image_slider").each(function(){

    	var $this				= $(this),
    		slideAnimation		= $this.attr("data-slideAnimation") || 'fade',
    		autoslideOn			= $this.attr("data-autoSlide") || 0,
    		autoslideInterval	= $this.attr("data-autoSlideInterval") || 7000,
    		bulletNav			= $this.attr("data-bulletNavigation") || true,
    		arrowNav			= $this.attr("data-arrowNavigation") || true;

    	if(autoslideOn === "true") { autoslideOn = true; } else { autoslideOn = false; }
    	if(bulletNav === "true") { bulletNav = true; } else { bulletNav = false; }
    	if(arrowNav === "true") { arrowNav = true; } else { arrowNav = false; }

    	$this.imagesLoaded( function() {
    		$this.flexslider({
    		animation: slideAnimation,
    		slideshow: autoslideOn,
    		controlNav: bulletNav,
    		directionNav : arrowNav,
    		slideshowSpeed: autoslideInterval,
    		smoothHeight: true,
    		useCSS: false,
    		prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
    		start: function(){
    			$('body').removeClass('loading');
    		}
    		});
    	});

    });

    /* Toggles ------------------------- */

    $(".swmsc_toggle_accordion_container").each( function () {
    	if($(this).attr('data-id') === 'closed') {
    		$(this).accordion({ header: '.swmsc_toggle_box_title_accordion', collapsible: true, active: false, heightStyle: 'content', autoHeight: false  });
    	} else {
    		$(this).accordion({ header: '.swmsc_toggle_box_title_accordion', collapsible: true, heightStyle: 'content', autoHeight: false });
    	}
    });

    $(".swmsc_toggle_box").each( function () {
    	if($(this).attr('data-id') === 'closed') {
    		$(this).accordion({ header: '.swmsc_toggle_box_title', collapsible: true, active: false, heightStyle: 'content'  });
    	} else {
    		$(this).accordion({ header: '.swmsc_toggle_box_title', collapsible: true, heightStyle: 'content'});
    	}
    });

    /* Tabs ------------------------- */

    $('.swmsc_tabs').tabslet({
        mouseevent: 'click',
        attribute: 'href',
        animation: true
    });

    /* Hide Info Boxes ------------------------- */

    function hide_boxes(){
    	$('span.swmsc_hide_boxes,span.swmsc_hide_boxes2').click(function() {
    		$(this).parent().fadeOut();
    	});
    }

    /* Custom Gallery ------------------------- */

    function swmsc_image_gallery() {
         $(".swmsc_image_gallery").each(function() {
            var $this       = $(this),
                dataGrid    = $this.attr("data-grid") || 'masonry';

            $this.imagesLoaded( function() {
                $this.isotope({
                    itemSelector: '.swmsc_image_gallery_item',
                    layoutMode: dataGrid,
                    masonry: {
                        //custom addition
                    }
                });

            });
        });

    }

    /* Masonry Fit Raws Items ------------------------- */

    function swmsc_masonry_fitrow() {
        $(".swmsc_masonry_fitrow").imagesLoaded( function() {
            $('.swmsc_masonry_fitrow').isotope({
            itemSelector: '.swmsc_masonry_fitrow_item',
            layoutMode: 'fitRows',
            masonry: {
                //custom addition
            }
            });
        });

    }

    function swmsc_UniversalGridIsotope() {
       if ($("#swmsc-item-entries").hasClass('isotope')) {
            $('.swmsc_universal_grid_sort').imagesLoaded( function() {
                $('.swmsc_universal_grid_sort').isotope({
                    itemSelector: '.swmsc_universal_grid'
                });
            });
        }
    }

    /* Testimonials ------------------------- */

    // testimonials slider shortcode

    function swmsc_testimonialsBoxSlider() {

         $(".swmsc_testimonials_box_slider").each(function() {
            var $this       = $(this),
                arrowNav    = $this.attr("data-navArrow") || true,
                autoPlay    = $this.attr("data-autoplay") || true,
                playInterval = parseInt($this.attr("data-autoPlayTimeOut") || 5000);

            if (arrowNav === "true") { arrowNav = true; } else { arrowNav = false; }
            if (autoPlay === "true") { autoPlay = true; } else { autoPlay = false; }

            $this.imagesLoaded( function() {
                $this.owlCarousel({
                    items:1,
                    loop:true,
                    margin:0,
                    autoplay:autoPlay,
                    autoplayTimeout:playInterval,
                    autoplayHoverPause:true,
                    nav:arrowNav,
                    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                    autoHeight:true,
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn'
                });

            });
        });

    }

    function swmsc_testimonialsWideSlider() {

        $(".swmsc_testimonials_wide_slider").each(function() {
            var $this       = $(this),
                arrowNav    = $this.attr("data-navArrow") || true,
                autoPlay    = $this.attr("data-autoplay") || true,
                navDots    = $this.attr("data-navDots") || true,
                playInterval = parseInt($this.attr("data-autoPlayTimeOut") || 5000);

            if (arrowNav === "true") { arrowNav = true; } else { arrowNav = false; }
            if (autoPlay === "true") { autoPlay = true; } else { autoPlay = false; }
            if (navDots === "true") { navDots = true; } else { navDots = false; }

            $this.imagesLoaded( function() {
                $this.owlCarousel({
                    items:1,
                    loop:true,
                    margin:0,
                    autoplay:autoPlay,
                    autoplayTimeout:playInterval,
                    autoplayHoverPause:true,
                    nav:arrowNav,
                    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                    autoHeight:true,
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn',
                    dots:navDots,
                    dotsEach:true,
                    dotData:true
                });

            });
        });
    }

    function swmsc_logoSlider() {

        $(".swmsc_logo_slider").each(function() {
            var $this       = $(this),
                arrowNav   = $this.attr("data-nav") || false,
                autoPlay    = $this.attr("data-autoplay") || true,
                rightMargin = parseInt($this.attr("data-margin") || 0),
                playInterval = parseInt($this.attr("data-autoPlayTimeOut") || 5000),
                desktopItems = parseInt($this.attr("data-desktop") || 5),
                tabletItems = parseInt($this.attr("data-tablet") || 4),
                mobileHorizontalItems = parseInt($this.attr("data-mobileHorizontal") || 2),
                mobileVerticalItems = parseInt($this.attr("data-mobileVertical") || 1);

            if (arrowNav === "true") { arrowNav = true; } else { arrowNav = false; }
            if (autoPlay === "true") { autoPlay = true; } else { autoPlay = false; }

            $this.imagesLoaded( function() {
                $this.owlCarousel({
                    loop:true,
                    autoplay:autoPlay,
                    autoplayTimeout:playInterval,
                    autoplayHoverPause:true,
                    margin:rightMargin,
                    responsiveClass:true,
                    nav:arrowNav,
                    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                    responsive:{
                        0:{ items:mobileVerticalItems },
                        321:{ items:mobileHorizontalItems },
                        481:{ items:mobileHorizontalItems },
                        768:{ items:tabletItems },
                        980:{ items:desktopItems }
                    }
                });
            });

       });

    }

    /* Element Horizontal and Verticel Center ------------------------- */

    function swmsc_js_H_Center() {

        $(".swmsc_js_center").each(function(){

            var $this = $(this);
            elementWidth = $this.width(),
            elementMargin = elementWidth/-2;

            $this.css('margin-left',elementMargin);

        });

    }

    function swmsc_js_V_Center() {

        $(".swmsc_js_center_top").each(function(){

            var $this = $(this);
            elementWidth = $this.height(),
            elementMargin = elementWidth/-2;

            $this.css('margin-top',elementMargin);

        });

    }

    /* Tabs Widget ------------------------- */

    function swmsc_tabs_widget() {
        $('.swmsc_widget_tabs').each(function() {
        $(this).find(".swmsc_wid_tab_content").hide();
            if(document.location.hash && $(this).find("ul.swmsc_wid_tabs li a[href='"+document.location.hash+"']").length >= 1) {
                $(this).find("ul.swmsc_wid_tabs li a[href='"+document.location.hash+"']").parent().addClass("active").show();
                $(this).find(document.location.hash+".swmsc_wid_tab_content").show();
            } else {
                $(this).find("ul.swmsc_wid_tabs li:first").addClass("active").show();
                $(this).find(".swmsc_wid_tab_content:first").show();
            }
        });
        $("ul.swmsc_wid_tabs li").click(function(e) {
            $(this).parents('.swmsc_widget_tabs').find("ul.swmsc_wid_tabs li").removeClass("active");
            $(this).addClass("active");
            $(this).parents('.swmsc_widget_tabs').find(".swmsc_wid_tab_content").hide();
            var activeTab = $(this).find("a").attr("href");
            $(this).parents('.swmsc_widget_tabs').find(activeTab).fadeIn();
            e.preventDefault();
        });
    }

    /* Media Lightbox ------------------------- */

    function swmsc_magnificPopup() {

        $('.swmsc_popup_img').magnificPopup({
            type: 'image'
        });

        $('.swmsc_popup_gallery').magnificPopup({
            type: 'image',
            gallery:{
                enabled:true,
                tCounter:''
            },
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out'
            }
        });

        $('.popup-youtube, .popup-vimeo, .popup-gmaps,.swmsc_popup_video').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

    }

    /* Flickr Widget ------------------------- */

    function swmsc_widget_flickr_photos() {

        $(".sidebar .flickr_photos").each(function(){

            var $this = $(this),
            swmSidebarFlickrId = $this.attr("data-flickr-id") || '90291761@N02',
            flickrDisplayPhotos = parseInt($this.attr("data-display-photos") || 6);

            $this.append('<ul id="cbox1" class="thumbs sidebar_flickr_photos ">');

            $('#cbox1').jflickrfeed({
                limit   : flickrDisplayPhotos,
                qstrings: {
                    id: swmSidebarFlickrId  // replace example flickr id with your flickr id
                },
                itemTemplate: '<li>'+'<a href="{{link}}" title="{{title}}" >' + '<img src="{{image_q}}" alt="{{title}}" />' + '</a>' + '</li>'
            }, function(data) {

            });

            $this.append('<div class="clear"></div>');

        });

        $(".footer .flickr_photos").each(function(){

            var $this = $(this),
            flickrId = $this.attr("data-flickr-id") || '90291761@N02',
            flickrDisplayPhotos = parseInt($this.attr("data-display-photos") || 6);

            $this.append('<ul id="cbox2" class="thumbs footer_flickr_photos">');

            $('#cbox2').jflickrfeed({
                limit   : flickrDisplayPhotos,
                qstrings: {
                    id: flickrId  // replace example flickr id with your flickr id
                },
                itemTemplate: '<li>'+'<a href="{{link}}" title="{{title}}" >' + '<img src="{{image_q}}" alt="{{title}}" />' + '</a>' + '</li>'
            }, function(data) {

            });

            $this.append('<div class="clear"></div>');

        });

    }

    /* Twitter Widget ------------------------- */

    function swmsc_twitter_widget() {

        var $this = $('.swmsc_ft_wrap'),
        twitterName = $this.attr("data-username") || 'softwebmedia';

        $('.swmsc_ft_wrap').tweecool({
            username : twitterName,
            limit : 1,
            profile_image_size:'_bigger'
        });
    }

    /* Animated Elements, Counter, Pie Chart with WayPoints ------------------------- */

    if ( typeof window['swmsc_waypoint'] !== 'function' ) {
        function swmsc_waypoint() {

            if (typeof jQuery.fn.waypoint !== 'undefined') {

                var element = $('.swmsc_element_visible'),
                    isMobile = document.documentElement.ontouchstart !== undefined ? true : false;

                /* Element Animations ----------------------------------------- */

                if(isMobile) {
                    element.addClass('swmsc_animation_start');
                }
                else {
                    element.waypoint(function(direction) {
                        $(this).addClass('swmsc_animation_start');
                    }, { offset: '85%' } );
                }

                /* Stat Counter ----------------------------------------- */

                $('.swmsc_stat_counter').waypoint(function(direction) {
                    $(this).each(function(){

                        var datafinalnumber = $(this).attr('data-finalNumber'),
                            dataspeed = $(this).attr('data-speed');

                        $(this).find('.swmsc_counter_box_count').delay(5000).countTo({
                            from: 0,
                            to: datafinalnumber,
                            speed: dataspeed,
                            refreshInterval: 10
                        });

                    });
                }, {
                	triggerOnce: true,
                	offset: '90%'
                	}
                );

                /* Pie Chart ----------------------------------------- */

    		    $('.swmsc_counter_circle').waypoint(function() {
    		        $(this).each(function() {
    		        	var $element = $(this).children(".swmsc_counter_circle_text");
    		            $(this).children(".swmsc_counter_circle_text").easyPieChart({
    		                barColor: $element.attr('data-trackColor'),
    		                trackColor: $element.attr('data-barColor'),
    		                scaleColor: false,
    		                scaleLength: 5,
    		                lineCap: "round",
    		                lineWidth: $element.attr('data-lineWidth'),
    		                size: $element.attr('data-chartSize'),
    		                rotate: 0,
    		                animate: $element.attr('data-speed'),
    		            });
    		        });
    		    }, {
    		        triggerOnce: true,
    		        offset: '100%'
    		    });


                /* Progress Bar ----------------------------------------- */

                $('.swmsc_progress_bar .swmsc_progress_bar_out').waypoint(function(direction) {

                    var $element = $(this);

                    $element.each(function () {
                        $element.animate({
                            width: $(this).attr("data-width") + '%'
                        }, 2000);
                    });

                 }, {
                	triggerOnce: true,
                	offset: '90%'
                	}
                );


            } // if fn.waypoint end
        }
    }

    /* Logo Grid ----------------------------------------- */

    function swmsc_logo_grids() {

            $(".swmsc_client_logos").each(function() {

                var $this               = $(this),
                    totalColumn         = parseInt($this.attr("data-column") || 4),
                    columnWidth         = '25%',
                    logoItem            = $this.children();

                    if ( totalColumn == 6 ) {
                        columnWidth = '16.66%';
                    } else if ( totalColumn == 5 ) {
                        columnWidth = '20%';
                    } else if ( totalColumn == 4 ) {
                        columnWidth = '25%';
                    } else if ( totalColumn == 3 ) {
                        columnWidth = '33.33%';
                    } else if ( totalColumn == 2 ) {
                        columnWidth = '50%';
                    } else if ( totalColumn == 1 ) {
                        columnWidth = '100%';
                    }

                $this.imagesLoaded( function() {
                    if ($(window).width() > 978) {
                        logoItem.css('width',columnWidth);
                    } else if (($(window).width() < 979) && ($(window).width() > 767))  {
                        logoItem.css('width','25%');
                    } else if (($(window).width() < 768) && ($(window).width() > 480))  {
                        logoItem.css('width','33.33%');
                     } else if (($(window).width() < 481) && ($(window).width() > 320))  {
                        logoItem.css('width','50%');
                    }else if ($(window).width() < 321)  {
                        logoItem.css('width','100%');
                    } else {
                        logoItem.css('width',columnWidth);
                    }
                });

            });

    }

    /* Services Style Responsive Grid ----------------------------------------- */

    function swmsc_services_icons() {

        $(".swmsc_responsive_services").each(function() {

            var $this           = $(this),
                responsiveWidth = parseInt($this.attr("data-responsive") || 800),
                elementMargin = parseInt($this.attr("data-margin") || 20)+'px';

            if ( $this.hasClass('swmsc_services_item_left') ) {
                 if ($(window).width() <= responsiveWidth) {
                    $this.addClass('swm_services_responsive');
                    $this.find('.swmsc_services_item_holder').css('margin-bottom',elementMargin);
                    $this.find('.swmsc_services_item_holder').css('margin-right','0');
                } else {
                    $this.removeClass('swm_services_responsive');
                    $this.find('.swmsc_services_item_holder').css('margin-bottom','0');
                    $this.find('.swmsc_services_item_holder').css('margin-right',elementMargin);
                }
            }
            if ( $this.hasClass('swmsc_services_item_right') ) {
                 if ($(window).width() <= responsiveWidth) {
                    $this.addClass('swm_services_responsive');
                    $this.find('.swmsc_services_item_holder').css('margin-bottom',elementMargin);
                    $this.find('.swmsc_services_item_holder').css('margin-left','0');
                } else {
                    $this.removeClass('swm_services_responsive');
                    $this.find('.swmsc_services_item_holder').css('margin-bottom','0');
                    $this.find('.swmsc_services_item_holder').css('margin-left',elementMargin);
                }
            }

        });

    }

    /* All functions ----------------------------------------- */

    hide_boxes();
    swmsc_image_gallery();
    swmsc_masonry_fitrow();
    swmsc_UniversalGridIsotope();
    swmsc_testimonialsBoxSlider();
    swmsc_testimonialsWideSlider();
    swmsc_logoSlider();
    swmsc_js_H_Center();
    swmsc_js_V_Center();
    swmsc_tabs_widget();
    swmsc_magnificPopup();
    swmsc_widget_flickr_photos();
    swmsc_twitter_widget();
    swmsc_waypoint();
    swmsc_logo_grids();
    swmsc_services_icons();

    $('.swmsc_tabs ul.tab-nav li a').click(function() {
        swmsc_image_gallery();
    });

    $(window).resize(function () {
        swmsc_logo_grids();
        swmsc_services_icons();
    });

/****************************************************************/
}); })(jQuery);
// Do not delete above lines