(function($){
	$(document).ready(function() {
		
		// Load correct admin tab
		var $_GET = {};
		document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
		    function decode(s) {
		        return decodeURIComponent(s.split("+").join(" "));
		    }
		    $_GET[decode(arguments[1])] = decode(arguments[2]);
		});

		if('page' in $_GET && $_GET['page'] == 'sched-schedule' && 'tab' in $_GET) {
			var tab = $_GET['tab'];
			open_admin_tab(tab);
		}

		$(".sched-a-tabs a").click(function(e) {
			e.preventDefault();
			open_admin_tab($(this).attr('data-tab'));
		});

		$(".sched-submit").click(function(e) {
			$(this)
				.click(function(e) {
					e.preventDefault()
				})
				.addClass('sched-submit-clicked')
				.attr('value', 'Please Wait...');
		});

		function open_admin_tab(name) {
			var $this = $(".sched-a-tabs a[data-tab="+name+"]");
			if($this.parent().hasClass('sched-a-tabs-active')) {
				return;
			}
			$(".sched-a-tabs li").removeClass('sched-a-tabs-active');
			$this.parent().addClass('sched-a-tabs-active');
			$(".sched-a-tab").hide();
			$("#sched-a-tab-"+$this.attr('data-tab')).show();

			var action = $(".sched-a-form").attr('data-original-action');

			$(".sched-a-form").attr('action', action+'&tab='+name);
		}

		$(".sched-checkbox").click(function(e) {
			e.preventDefault();
			var $this = $(this),
				checked = ($this.attr('data-checked') == '1') ? true : false,
				check_id = $this.attr('data-id'),
				$checkbox = $this.siblings('#'+check_id);
				//console.log($checkbox);
			if(checked) {
				// $this.attr('data-checked', '0').html('NO');
				$this.attr('data-checked', '0').html('<i class="fa fa-times"></i>');
				$checkbox.val('0');
			}else {
				// $this.attr('data-checked', '1').html('YES');
				$this.attr('data-checked', '1').html('<i class="fa fa-check"></i>');
				$checkbox.val('1');
			}
			if($this.attr('data-toggle')) {
				var $el = $($this.attr('data-toggle'));
				$el.toggleClass('sched-a-checkbox-hide');
			}
		});

		$(".sched-checkbox").each(function() {
			if($(this).attr('data-toggle') && $(this).attr('data-checked') == 0) {
				$($(this).attr('data-toggle')).addClass('sched-a-checkbox-hide');
			}
		});

		$(".sched-radio-input").click(function(e) {
			var $this = $(this),
				$siblings = $('input[name='+$this.attr('name')+']');
				//this_value = $this.val(),
				//radio_value = $('input[name='+$this.attr('name')+']:checked').val();

			$siblings.each(function() {
				handle_radio_toggles($(this));
			});

		});

		$(".sched-radio-input").each(function() {
			handle_radio_toggles($(this));
		});

		$('.sched-color-picker').wpColorPicker({
			palettes: false,
		});

		$(".sched-a-notification-success, .sched-a-notification-error").click(function(e) {
			e.preventDefault();
			$(this).slideUp(300);
		});

		$(".sched-faq > .sched-faq-title").click(function() {
			$(this).parent().toggleClass('sched-faq-open')
		});

		$(".sched-open-help-tab").click(function(e) {
			e.preventDefault();
			open_admin_tab('help');
		});

	});

	function handle_radio_toggles($radio) {
		var this_value = $radio.val(),
			radio_value = $('input[name='+$radio.attr('name')+']:checked').val();
		
		// Search for image
		if(this_value == radio_value) {
			$radio.siblings('.sched-a-option-img').addClass('sched-a-option-img-selected');
		}else {
			$radio.siblings('.sched-a-option-img').removeClass('sched-a-option-img-selected');
		}
		
		// Toggle hide
		if($radio.attr('data-toggle') !== 'null') {
			if(this_value == radio_value) {
				$($radio.attr('data-toggle')).removeClass('sched-a-checkbox-hide');
			}else {
				$($radio.attr('data-toggle')).addClass('sched-a-checkbox-hide');
			}
		}
	}

})(jQuery);