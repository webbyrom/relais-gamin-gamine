(function ($) {    
    $(document).ready(function() {  

    /* Do not delete above code */

        /* Main Navigation ---------- */

        function kidsworld_main_navigation() {

            var kidsworldGetMegaMenuWidth = $('#kidsworld_header').width();
            var kidsworldFinalWidth = (kidsworldGetMegaMenuWidth * 2) / 100;
            var kidsworld_m_finalWidth = Math.round(kidsworldGetMegaMenuWidth - kidsworldFinalWidth);

            $('.kidsworld_fw_header ul.kidsworld_top_nav li.kidsworld-mega-menu > ul').css({"max-width": kidsworld_m_finalWidth + 'px', "width": kidsworld_m_finalWidth + 'px'});

            /* header title top margin */

            var kidsworldGetHeaderTitleHeight = $('.kidsworld_pg_title h1').height() / 2;
            $('.kidsworld_pg_title').css('margin-top','-' + kidsworldGetHeaderTitleHeight + 'px');

            var kidsworld_GetHeaderLargeTitleHeight = $('.kidsworld_large_title span').height() / 2;
            $('.kidsworld_large_title').css('margin-top','-' + kidsworld_GetHeaderLargeTitleHeight + 'px');    

            /* create mobile menu */

            $("ul#kidsworld_top_nav").clone().appendTo("#kidsworld_mobi_nav");
            $('#kidsworld_mobi_nav ul#kidsworld_top_nav').removeClass('kidsworld_top_nav');
            $('#kidsworld_mobi_nav').find('.kidsworld_nav_p_meta').remove();

            /* mobile dropdown menu */

            function kidsworld_mobile_menu(kidsworld_main_nav,click_button,nav_id) {
              
                var kidsworld_main_nav = $(kidsworld_main_nav);

                $(click_button).on('click', function(){
                    var kidsworld_dd_menu = $(nav_id);
                    if (kidsworld_dd_menu.hasClass('open')) { 
                        kidsworld_dd_menu.slideUp(400).removeClass('open');
                    }
                    else {
                        kidsworld_dd_menu.slideDown(400).addClass('open');
                    }
                });

                kidsworld_main_nav.find('li ul').parent().addClass('kidsworld-has-sub-menu');          
                kidsworld_main_nav.find(".kidsworld-has-sub-menu").prepend('<span class="kidsworld-mini-menu-arrow"><i class="fa fa-angle-down"></i></span>');

                kidsworld_main_nav.find('.kidsworld-mini-menu-arrow').on('click', function() {
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').hide('blind');
                    }
                    else {
                        $(this).siblings('ul').addClass('open').show('blind');
                    }
                });       

            }

            kidsworld_mobile_menu('#kidsworld_mobi_nav','#kidsworld_mobi_nav_btn','ul#kidsworld_top_nav');

            if ( !$('ul.kidsworld_top_nav > li > a > span > i').length > 0 ) {
                $('ul.kidsworld_top_nav').addClass('kidsworld_no_menu_icon');
            }
            

        }

        /* mega menu */

        function kidsworldGetCenter() {

            var kidsworldGetMegaMenuWidth =  $('#kidsworld_header .kidsworld_container .kidsworld_nav').width(),
                kidsworldGetMainNavUlWidth = $('.kidsworld_main_nav').width(),
                kidsworldCenterDiv = $('ul.kidsworld_top_nav > li.kidsworld-mega-menu > ul');
                kidsworldGetLeftMargin = (kidsworldGetMegaMenuWidth - kidsworldGetMainNavUlWidth) * (-1);

                $(kidsworldCenterDiv).css('left',kidsworldGetLeftMargin );

                $('ul.kidsworld_top_nav li.kidsworld-mega-menu > ul').css({"max-width": kidsworldGetMegaMenuWidth + 'px', "width": kidsworldGetMegaMenuWidth + 'px' });

        }



        /* Load All Functions ---------- */

        kidsworld_main_navigation();
        kidsworldGetCenter();
       

    /* Do not delete below code */

    }); 
})(jQuery);


