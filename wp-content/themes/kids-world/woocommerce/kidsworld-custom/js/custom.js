(function ($) {	$(document).ready(function() {


	$('.kidsworld-woo-sort-order .sortBy .current-select a').html($('.kidsworld-woo-sort-order .sortBy ul li.current a').html());
	$('.kidsworld-woo-sort-order .sort-count .current-select a').html($('.kidsworld-woo-sort-order .sort-count ul li.current a').html());	

	jQuery('a.add_to_cart_button').click(function(e) {
		var link = this;
		jQuery(link).parents('.kidsworld-featured-product-block').find('.cart-loading').find('i').removeClass('fa-check').addClass('fa-spinner');
		jQuery(this).parents('.kidsworld-featured-product-block').find('.cart-loading').fadeIn();
		setTimeout(function(){			
			jQuery(link).parents('.kidsworld-featured-product-block').find('.cart-loading').find('i').hide().removeClass('fa-spinner').addClass('fa-check').fadeIn();			
		}, 2000);
	});

	$('li.product').mouseenter(function() {
		if($(this).find('.cart-loading').find('i').hasClass('fa-check')) {
			$(this).find('.cart-loading').fadeIn();
		}
	}).mouseleave(function() {
		if($(this).find('.cart-loading').find('i').hasClass('fa-check')) {
			$(this).find('.cart-loading').fadeOut();
		}
	});

	// Replace woocommerce button with theme button
	var woo_btn_selectors = '.add_review a.show_review_form.button,button.single_add_to_cart_button.button.alt,form.shipping_calculator p button.button,td.actions input.button,a.added_to_cart,#respond input[type="submit"],form.checkout_coupon input[type="submit"],#payment input[type="submit"],.cart_totals .wc-proceed-to-checkout a,.shipping-calculator-form button ';
	var woo_btn_selectors_tiny = '.woocommerce-message a.button,.price_slider_amount button,table.my_account_orders tbody tr td a.button';

	$(woo_btn_selectors).addClass('kidsworld_button round small shadow_dark skin_color kidsworld_woo_btn');		
	$(woo_btn_selectors_tiny).addClass('kidsworld_button round tiny shadow_dark skin_color');

	function kidsworld_woo_products_list() {
        if ( $('.woocommerce ul.products').length ){ 
            $('.woocommerce ul.products').imagesLoaded( function() {
                $('.woocommerce ul.products').isotope({
                    itemSelector: '.woocommerce ul.products li',
                    layoutMode: 'fitRows'
                });
            });

        }
    }

    kidsworld_woo_products_list();	

    function kidsworld_cart_icon_and_menu() {

	    function kidsworld_cart_icon_hover() {
	        if ( $('.kidsworld_cart_icon_wrap').length ){ 
	            var getLogoWidth = $('.kidsworld_logo_img a img').width();
	            $('.kidsworld_cart_icon_wrap').css('width',getLogoWidth);

	            if ( $('.kidsworld_smaller_menu').length ){
		            var getLogoWidthOnScroll = $('.kidsworld_smaller_menu .kidsworld_logo_img a img').width();
		            $('.kidsworld_smaller_menu .kidsworld_cart_icon_wrap').css('width',getLogoWidthOnScroll);
		        } else {
		        	var getLogoWidth = $('.kidsworld_logo_img a img').width();
		            $('.kidsworld_cart_icon_wrap').css('width',getLogoWidth);    
		        }

	        }
	    }

	    kidsworld_cart_icon_hover();

		var t;

		$(window).scroll(function() {
			clearTimeout(t);
			t = setTimeout(function() {
				RunFunction();
			}, 500);
		});		

		function RunFunction() {
			kidsworld_cart_icon_hover();
		};

	}

	$(window).load(function () {

		kidsworld_cart_icon_and_menu();

	});

	$( ".kidsworld-product-price-cart .kidsworld_woo_add_to_cart a.button" ).click(function() {
	  	kidsworld_cart_icon_and_menu();
	});


}); })(jQuery);



