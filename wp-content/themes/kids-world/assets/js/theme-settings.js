(function ($) {

    /* Tooltip ------------------------- */

    function kidsworld_toolTip() {
        $('.kidsworld_tooltip').tooltipster();
        $('.tipUp').tooltipster({ position: 'top' });
        $('.tipDown').tooltipster({ position: 'bottom' });
        $('.tipRight').tooltipster({ position: 'right' });
        $('.tipLeft').tooltipster({ position: 'left' });
    }

    /* Retina ------------------------- */

    function kidsworld_retinaRatioCookies() {
        var kidsworldDevicePixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio : 1;
        if (!$.cookie("pixel_ratio")) {
            if (kidsworldDevicePixelRatio > 1 && navigator.cookieEnabled === true) {
                $.cookie("pixel_ratio", kidsworldDevicePixelRatio, {expires : 360});
                location.reload();
            }
        }
    }

    /* Post Format Gallery ------------------------- */

    function kidsworld_pf_gallery() {
        $('.pfi_gallery').imagesLoaded( function() {
            $('.pfi_gallery').flexslider({
                animation: 'fade',
                animationSpeed: 500,
                slideshow: false,
                smoothHeight: false,
                controlNav: false,
                directionNav: true,
                prevText: '<i class="fa fa-chevron-left"></i>',
                nextText: '<i class="fa fa-chevron-right"></i>'
            });
        });
    }


    /* Go top scroll ------------------------- */


    function kidsworld_go_top_scroll() {

        var kidsworldPageScroll = false;
        var $kidsworldPageScrollElement = $('#kidsworld_go_top_scroll,#kidsworld_go_top_scroll_btn');

        $kidsworldPageScrollElement.click(function(e) {
            $('body,html').animate({ scrollTop: "0" }, 750, 'easeOutExpo' );
            e.preventDefault();
        });

        $(window).scroll(function() {
            kidsworldPageScroll = true;
        });

        var $kidsworldScrollButton = $('#kidsworld_go_top_scroll_btn');

        setInterval(function() {
            if( kidsworldPageScroll ) {
                kidsworldPageScroll = false;

                if( $(window).scrollTop() > 300 ) {
                    $kidsworldScrollButton.fadeIn('fast');
                } else {
                    $kidsworldScrollButton.fadeOut('fast');
                }
            }
        }, 250);
    }

    /* Share Post Link ------------------------- */

    function kidsworld_share_post_links() {

        $(".kidsworld_post_share").each(function(){

            var $this = $(this),
            kidsworldElementId = $this.attr("data-postid"),
            kidsworldClickElement = '.post-share-id-'+kidsworldElementId,
            kidsworldOpenElement = '.kidsworld-share-id-box-'+kidsworldElementId+' ul';

            $(kidsworldClickElement).addClass('active');

            $(kidsworldClickElement).click( function(e){
                e.preventDefault();
                if ($(this).hasClass("active") ) {
                    $(kidsworldOpenElement).animate({ left: '30' }, 500);
                    $(this).removeClass("active");
                } else {
                    $(kidsworldOpenElement).animate({ left: '-300' }, 500);
                    $(this).addClass("active");
                }
                return false;
            });

        });

    }

    /* Post Like ------------------------- */

    function kidsworld_post_like() {

        $('.kidsworld-love').click(function() {
            var el = $(this);
            if( el.hasClass('loved') ) return false;

            var post = {
                action: 'kidsworld_love',
                post_id: el.attr('data-id')
            };

            $.post(window.kidsworld_ajax, post, function(data){
                el.find('.label').html(data);
                el.addClass('loved');
            });

            return false;
        });
    }

    /* Element Horizontal and Verticel Center ------------------------- */

    function kidsworld_js_H_Center() {

        $(".kidsworld_js_center").each(function(){
            var $this = $(this);
            kidsworldElementWidth = $this.width(),
            kidsworldElementMargin = kidsworldElementWidth/-2;
            $this.css('margin-left',kidsworldElementMargin);
        });

    }

    function kidsworld_js_V_Center() {

        $(".kidsworld_js_center_top").each(function(){

            var $this = $(this);
            kidsworldElementWidth = $this.height(),
            kidsworldElementMargin = kidsworldElementWidth/-2;

            $this.css('margin-top',kidsworldElementMargin);

        });

    }

    /* Image Lightbox ------------------------- */

    function kidsworld_magnificPopup() {

        $('.kidsworld_popup_img').magnificPopup({
            type: 'image'
        });

        $('.kidsworld_popup_gallery').magnificPopup({
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

        $('.popup-youtube, .popup-vimeo, .popup-gmaps,.kidsworld_popup_video').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });


        $('.kidsworld_popup_gallery_alt').magnificPopup(
            {
                delegate: 'a',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1]
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                }
            }
        });

    }

    /* WordPress Gallery ------------------------- */

    function kidsworld_WPGallery() {
        if ( $('.gallery').length ){

            var kidsworldLayoutModeStyle = 'fitRows';

            if ($("body").hasClass('kidsworld_img_gallery_masonry')) {
                kidsworldLayoutModeStyle = 'masonry';
            }

            $('.gallery').imagesLoaded( function() {
                $('.gallery').isotope({
                    itemSelector: '.gallery-item',
                    layoutMode: kidsworldLayoutModeStyle
                });
            });

        }
    }

    /* Portfolio Page ------------------------- */

    function kidsworld_portfolio_items() {

        if ($(window).width() < 768) {
            $('div .kidsworld_horizontal_menu').addClass('h_responsive');
        }
    }

    function kidsworld_universal_filter_items_menu() {
        $('.kidsworld_universal_filter_items_menu a').click(function(){
            var selector = $(this).attr('data-filter');
            $('.kidsworld_universal_filter_items_section').isotope({filter: selector});
            $('.kidsworld_universal_filter_items_menu a.kidsworld-active-sort').removeClass('kidsworld-active-sort');
            $(this).addClass('kidsworld-active-sort');
            return false;
        });
    }

    function kidsworld_smooth_scroll() {
        $('a.smooth-scroll').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html, body').animate({
                    scrollTop: target.offset().top - 140
                }, 1000);
                return false;
                }
            }

        });
    }

    /* Sticky Header ------------------------- */

    function kidsworld_sticky_header() {

        if ($("body").hasClass('kidsworld_stickyOn')) {

            var kidsworld_header_height = $('#kidsworldHeader').innerHeight(),
                kidsworld_start_y = kidsworld_header_height + 142,
                kidsworld_window_y = $(window).scrollTop();

            if( kidsworld_window_y > kidsworld_start_y ){
                $('#kidsworldHeader').addClass('kidsworld_smaller_menu');
            }
            else {
                $('#kidsworldHeader').removeClass('kidsworld_smaller_menu');
            }

            if ( $(window).width() > 768 ) {

                if  ( $("body").hasClass('topbarOn') ) {
                    var topBarHeight = $('.kidsworld_topbar').innerHeight() + 142;
                    $('.kidsworld_containers_holder').css('margin-top',topBarHeight+'px');
                }

            }

            if ( $(window).width() < 768 ) {

                if  ( $("body").hasClass('topbarOn') ) {
                    $('.kidsworld_containers_holder').css('margin-top','0');
                }

            }

        }

    }


    /* Document ready load functions =================== */

    $(document).ready(function() {

        $(".fitVids").fitVids();
        kidsworld_toolTip();
        kidsworld_retinaRatioCookies();
        kidsworld_pf_gallery();
        kidsworld_go_top_scroll();
        kidsworld_share_post_links();
        kidsworld_post_like();
        kidsworld_js_H_Center();
        kidsworld_js_V_Center();
        kidsworld_magnificPopup();
        kidsworld_WPGallery();
        kidsworld_sticky_header();
        kidsworld_portfolio_items();
        kidsworld_universal_filter_items_menu();
        kidsworld_smooth_scroll();



    });

    $('.swmsc_tabs ul.tab-nav li a').click(function() {
        kidsworld_WPGallery();
    });

    /* Scroll Events ---------- */

    $(window).scroll(function(){

        kidsworld_sticky_header();

    });


    function kidsworld_infinite_scroll() {

        var $kidsworldContainerInfiniteScroll = $("#kidsworld-item-entries");
        $kidsworldContainerInfiniteScroll.infinitescroll({
            loading: {
                msg: null,
                finishedMsg: null,
                msgText: '<div class="kidsworld_infiniteScroll_loader"></div>',
            },
            navSelector: "div.kidsworld_infiniteScroll_pagination",
            nextSelector: "div.kidsworld_infiniteScroll_pagination div.post-next a",
            itemSelector: ".kidsworld-infinite-item-selector",
        }, function (newElements) {
            var $kidsworldNewInfiniteScrollElems = $(newElements).css({
                opacity: 0
            });
            $(".fitVids").fitVids();
            kidsworld_js_H_Center();
            kidsworld_js_V_Center();
            kidsworld_post_like();
            kidsworld_share_post_links();
            kidsworld_portfolio_items();
            kidsworld_magnificPopup();
            kidsworld_universal_filter_items_menu();
            kidsworld_smooth_scroll();

            $kidsworldNewInfiniteScrollElems.imagesLoaded(function () {
                $kidsworldNewInfiniteScrollElems.animate({
                    opacity: 1
                });

                if ($("#kidsworld-item-entries").hasClass('isotope')) {
                    $kidsworldContainerInfiniteScroll.isotope("appended", $kidsworldNewInfiniteScrollElems);
                }

            });
        });

    }



    /* Window load functions =================== */

    var $window = $(window);

    $(window).load(function () {

        if ( $('.kidsworld_site_loader').length ){
            $(".kidsworld_site_loader").fadeOut("slow");
        }

        // Blog masonry grid
        function kidsworld_BlogGridIsotope() {
           if ($("#kidsworld-item-entries").hasClass('isotope')) {
                $('.kidsworld_blog_grid_sort').imagesLoaded( function() {
                    $('.kidsworld_blog_grid_sort').isotope({
                        itemSelector: '.kidsworld_blog_grid'
                    });
                });
            }
        }

        // Global masonry
        function kidsworld_UniversalGridIsotope() {
           if ($("#kidsworld-item-entries").hasClass('isotope')) {
                $('.kidsworld_universal_grid_sort').imagesLoaded( function() {
                    $('.kidsworld_universal_grid_sort').isotope({
                        itemSelector: '.kidsworld_universal_grid'
                    });
                });
            }
        }

        kidsworld_BlogGridIsotope();
        kidsworld_UniversalGridIsotope();

        $window.resize(function () {
            kidsworld_BlogGridIsotope();
            kidsworld_UniversalGridIsotope();
            kidsworld_sticky_header();
        });
        window.addEventListener("orientationchange", function() {
            kidsworld_BlogGridIsotope();
            kidsworld_UniversalGridIsotope();
        });

        $('iframe').css('max-width','100%').css('width','100%');
        kidsworld_infinite_scroll();

    });

})(jQuery);