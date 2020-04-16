(function($){
	$(document).ready(function() {
		var $schedule = $(".schedule-editor > div");

		$('<div class="sched-modal-overlay"></div>').appendTo($('body')).click(function() {
			sched_close_modal();
		});
		var $modal = $('<div class="sched-modal sched-admin"><div class="sched-modal-title"></div><div class="sched-modal-content"></div></div>').appendTo($('body'));

		var snap_offset = $(".sched-editor-header").offset(),
			$snap = $(".sched-editor-header-snap"),
			snap_limit = snap_offset.top - 32; // 32 is the height of the WP bar on top

		$(window).on('resize', function() {
			sched_resize_modal();
			sched_resize_admin($snap, snap_limit);
		});
		sched_resize_modal();
		sched_resize_admin($snap, snap_limit);

		$(window).scroll(function (event) {
			sched_resize_admin($snap, snap_limit);
		});

		$(".form-schedule-settings-open").click(function(e) {
			e.preventDefault();
			sched_open_modal('Timetable Settings', $(".form-schedule-settings").html());
		});

		$(".form-create-column-open").click(function(e) {
			e.preventDefault();
			sched_open_modal('Create Column', $(".form-create-column").html());
		});

		$(".form-create-event-open").click(function(e) {
			e.preventDefault();
			sched_open_modal('Create Event', $(".form-create-event").html());
		});

		$(".form-meta-fields-open").click(function(e) {
			e.preventDefault();
			sched_open_modal('Custom Fields', $(".form-meta-fields").html());
		});

		$(".form-filter-open").click(function(e) {
			e.preventDefault();
			sched_open_modal('Event Filters', $(".form-filter").html());
		});

		//sched_open_modal('Edit Event', 'HTML Here')
		//$('[data-toggle="popover"]').popover();
		
		$('.input-time').each(function() {
			var timepicker_options = {
				step: timepicker_step,
				timeFormat: 'H:i',
				minTime: $schedule.attr('data-start'),
				maxTime: $schedule.attr('data-end')
			}
			if($(this).is('.input-time-full')) {
				timepicker_options.minTime = '00:00';
				timepicker_options.maxTime = '23:50';
			}
			$(this).timepicker(timepicker_options);
		})

		// $('.input-icon').iconpicker({
		// 	// iconClassPrefix: ''
		// });

		$(".form-schedule-settings").on('submit', function(e) {
			var $this = $(this),
				scale = $this.find('input[name=scale]:checked').val(),
				start = $this.find('input[name=start]').val().split(':'),
				end = $this.find('input[name=end]').val().split(':');

			$this.find('.input-has-error').removeClass('input-has-error');

			var err = false;

			if(scale == 1) {
				if(parseFloat(start[1]) !== 0) {
					$this.find('input[name=start]').addClass('input-has-error');
					err = true;
				}
				if(parseFloat(end[1]) !== 0) {
					$this.find('input[name=end]').addClass('input-has-error');
					err = true;
				}
			}else if(scale == 2) {
				if(parseFloat(start[1]) !== 0 && parseFloat(start[1]) !== 30) {
					$this.find('input[name=start]').addClass('input-has-error');
					err = true;
				}
				if(parseFloat(end[1]) !== 0 && parseFloat(end[1]) !== 30) {
					$this.find('input[name=end]').addClass('input-has-error');
					err = true;
				}
			}else if(scale == 3) {
				if(parseFloat(start[1]) !== 0 && parseFloat(start[1])%10 !== 0) {
					$this.find('input[name=start]').addClass('input-has-error');
					err = true;
				}
				if(parseFloat(end[1])!== 0 && parseFloat(end[1])%10 !== 0) {
					$this.find('input[name=end]').addClass('input-has-error');
					err = true;
				}
			}

			if(err) {
				e.preventDefault();
				alert('The selected start- and/or end time cannot be used with the selected scale.');
				return;
			}

		});

		$(".sched-switch").click(function() {
			$(this).toggleClass('sched-switch-off');
		});

		// $(".meta_fields_sortable").sortable({
		// 	placeholder: 'draggable-placeholder',
		// 	handle: '.sched-a-custom-field-title',
		// 	update: function() {
		// 		$("#meta_edit_order").val(sched_implode(',', $(".meta_fields_sortable").sortable('toArray', {attribute: 'data-meta-field-id'})));
		// 	}
		// });
		// (".meta_fields_sortable").disableSelection();

		$(".sched-columns").sortable({
			opacity: 0.75,
			handle: '.sched-column-header',
			update: function() {
				var event_id = 0;
				var order = encodeURIComponent(JSON.stringify($(".sched-columns").sortable('toArray', {attribute: 'data-column-id'})));
				var url = sched_ajax_url + '&method=ajax_update_column_order&id='+schedule_id+'&order='+order;
				$.get(url, function(result) {
					if(result == 'success') {
						sched_notification('The column order has been updated');
					}
				});
			},
			placeholder: "sched-column-placeholder"
		});

		$(".color-input").each(function() {
			var $input = $(this);
			//sched_apply_iris($input);
			
		});

		$(".display_notification").each(function() {
			sched_show_message($(this).html());
		});

		$(".sched-editor-notification").click(function() {
			$(this).slideUp(300);
		});

	});

})(jQuery);

function sched_resize_admin($snap, limit) {
	(function($, $snap, limit){
		$snap.css('width', $snap.parent().innerWidth());
		
		var scroll = $(window).scrollTop();
		if(scroll > limit) {
			$snap.show();
		}else {
			$snap.hide();
		}
	})(jQuery, $snap, limit);
}

function sched_notification(text) {
	(function($){
		$(".sched-editor-notification").slideUp();
		var $notification = $('<div class="sched-editor-notification"><i class="fa fa-warning"></i><span>'+text+'</span></div>');

		$notification.hide()
			.click(function() {
				$notification.slideUp(300, function() {
					$notification.remove();
				});
			})
			.appendTo($('.sched-editor-notifications'))
			.slideDown();
	})(jQuery);
}

function sched_open_modal(title, html) {
	(function($){
		var $overlay = $('.sched-modal-overlay').stop().fadeTo(250, .5, function() {
			var $modal = $('.sched-modal').css({
				'top': $(window).scrollTop(),
				'opacity': 0,
				'display': 'block',
			});
			$modal.find('.sched-modal-title').html(title);
			if(typeof html == 'object') {
				$modal.find('.sched-modal-content').html('');
				html.clone().appendTo($modal.find('.sched-modal-content')).show();
			}else {
				$modal.find('.sched-modal-content').html(html);
			}
			sched_run_scripts($modal.find('.sched-modal-content'));

			$modal.find('.sched-modal-close-button').click(function(e) {
				e.preventDefault();
				sched_close_modal();
			});

			// tinyMCE.init({ selector: 'sched-ajax-editor'});
   //          tinyMCE.execCommand('mceAddEditor', false, 'sched-ajax-editor');

			$modal.animate({
				'top': $(window).scrollTop()+60,
				'opacity': 1
			}, 250);
		});
		
	})(jQuery);
}

function sched_close_modal() {
	(function($){
		var $modal = $('.sched-modal');
		$modal.animate({
			'top': $(window).scrollTop(),
			'opacity': 0
		}, 250, function() {
			$modal.css('display', 'none');
			var $overlay = $('.sched-modal-overlay').stop().fadeOut(250);
			
		});
	})(jQuery);
}

function sched_resize_modal() {
	(function($){
		var width = 800;
		if(width >= $(window).width()) {
			width = $(window).width() - 40;
		}
		//var popup_width = $('.sched-modal').innerWidth();
		$('.sched-modal').css({
			'width': width,
			'left': ($(window).width()-width)/2,
		});
	})(jQuery);
}

function sched_run_scripts($container) {
	(function($){

		$container.find(".sched-checkbox").click(function(e) {
				e.preventDefault();
				var $this = $(this),
					checked = ($this.attr('data-checked') == '1') ? true : false,
					check_id = $this.attr('data-id'),
					$checkbox = $this.siblings('#'+check_id);
				if(checked) {
					// $this.attr('data-checked', '0').html('NO');
					$this.attr('data-checked', '0').html('<i class="fa fa-times"></i>');
					$checkbox.val('0');
				}else {
					// $this.attr('data-checked', '1').html('YES');
					$this.attr('data-checked', '1').html('<i class="fa fa-check"></i>');
					$checkbox.val('1');
				}
				console.log($this.attr('data-toggle'));

				if($this.attr('data-toggle')) {
					var $el = $($this.attr('data-toggle'));
					//$el.toggleClass('sched-a-checkbox-hide');
					$el.toggleClass('sched-a-checkbox-hide');
				}
				// if($this.attr('data-toggle')) {

				// 	var $el = $($this.attr('data-toggle'));
				// 	if($el.css('display') == 'none') {
				// 		$el.fadeIn();
				// 	}else {
				// 		$el.hide();
				// 	}
				// }
			});

		$container.find("input[type=radio]").click(function(e) {
			var $this = $(this),
				$siblings = $('input[name='+$this.attr('name')+']');
				//this_value = $this.val(),
				//radio_value = $('input[name='+$this.attr('name')+']:checked').val();

			$siblings.each(function() {
				sched_handle_radio_toggles($(this), $container);
			});

		});

		$container.find("input[type=radio]").each(function() {
			sched_handle_radio_toggles($(this), $container);
		});

		$container.find('.meta_field_fill_dropdown a').click(function(e) {
			e.preventDefault();
			$(this).parent().parent().parent().siblings('input').val($(this).attr('data-val'));
		});

		$container.find('.input-time').each(function() {
			var $this = $(this);
			$this.timepicker({
				step: timepicker_step,
				timeFormat: 'H:i',
				minTime: $this.attr('data-min'),
				maxTime: $this.attr('data-max')
			});
		});

		$container.find('.input-icon').iconpicker({
			// iconClassPrefix: ''
		});

		$container.find('.sched-image-select').each(function() {
			var $this = $(this);

			$this.find('.sched-image-select-size').on('change', function() {
				var val = $(this).val();

				$this.find(".sched-image-select-image img").attr('src', val);
				$this.find('.sched-image-select-image a').attr('href', val);
				$this.find('.sched-image-select-url').val(val);
				// jQuery(this).closest('.sched-image-select').find('.sched-image-select-url').val(jQuery(this).val())
			});

			$this.find('.sched-image-select-source').change(function() {
				if($(this).val() === 'library') {
					$this.find('.sched-image-select-source-library').show();
					$this.find('.sched-image-select-source-url').hide();
				}else {
					$this.find('.sched-image-select-source-library').hide();
					$this.find('.sched-image-select-source-url').show();
				}
			})

			$this.find('.sched-image-select-button').click(function(e) {
				e.preventDefault();

				var custom_uploader = wp.media({
				    title: 'Select An Image',
				    button: {
				        text: 'Set Image'
				    },
				    multiple: false  // Set this to true to allow multiple files to be selected
				})
				.on('select', function() {
					var attachment = custom_uploader.state().get('selection').first().toJSON(),
						imgurl = attachment.url,
						img_id = attachment.id,
						sizes  = attachment.sizes;

					//sizes = sched_reverse_array(sizes);


					$this.find('.sched-image-select-url').val(imgurl);
					$this.find(".sched-image-select-image img").attr('src', imgurl);
					$this.find('.sched-image-select-image a').attr('href', imgurl);

					$this.find('.sched-image-select-id').val(img_id);
					
					$this.find('.sched-image-select-image').css('display', 'inline-block');
					$this.find('.sched-image-select-button').hide();

					var size_names = [],
						select_html = '';
					for(size_name in sizes) {
						size_names.push(size_name);
					}
					for(var i = size_names.length; i--; i >= 0) {
						var size_name = size_names[i],
							size = sizes[size_name];
							
						select_html += '<option'+(size_name === 'full' ? ' selected="selected"' : '')+' value="'+size.url+'">'+size_name+' ['+size.width+'x'+size.height+']</option>';
					}
					$this.find('.sched-image-select-size').html(select_html);
				})
				.open();
			});

			$this.find('.sched-image-select-remove').click(function(e) {
				e.preventDefault();
				$this.find('.sched-image-select-url').val('');
				$this.find('.sched-image-select-id').val('');
				$this.find('.sched-image-select-image').hide();
				$this.find('.sched-image-select-button').css('display', 'inline-block');
				$this.find('.sched-image-select-size').html('');

			});
		});


		$container.find('.color-input').each(function() {
			//sched_apply_iris($(this));
		});
		$container.find('.sched-color-picker').wpColorPicker({
			palettes: false,
		});

		$container.find('.sched-a-custom-field .sched-a-custom-field-title').click(function() {
			$(this).parent().toggleClass('sched-a-custom-field-open');
		});

		$container.find('.sched-a-open-custom-fields').click(function(e) {
			e.preventDefault();
			if(!confirm('Your current window with the changes you made will be closed. Continue?')) {
				return false;
			}
			sched_open_modal('Custom Fields', $(".form-meta-fields").html());

		});

		$container.find(".meta_fields_sortable").sortable({
			placeholder: 'draggable-placeholder',
			handle: '.sched-a-custom-field-title',
			update: function() {
				$container.find("#meta_edit_order").val(sched_implode(',', $container.find(".meta_fields_sortable").sortable('toArray', {attribute: 'data-meta-field-id'})));
				$container.find('.form-meta-field-notification').slideDown();
			}
		});
		$container.find(".meta_fields_sortable").disableSelection();

		$container.find(".filters_sortable").sortable({
			placeholder: 'draggable-placeholder',
			handle: '.sched-a-custom-field-title',
			update: function() {
				$container.find("#filter_edit_order").val(sched_implode(',', $container.find(".filters_sortable").sortable('toArray', {attribute: 'data-filter-id'})));
				$container.find('.form-filter-notification').slideDown();
			}
		});
		$container.find(".filters_sortable").disableSelection();

		$container.find('.sched-form-create-meta-field-button').click(function(e) {
			e.preventDefault();
			$(".sched-form-create-meta-field").slideDown();
		});

		$container.find('.sched-form-create-filter-button').click(function(e) {
			e.preventDefault();
			$(".sched-form-create-filter").slideDown();
		});

		$container.find('.sched-form-remove-meta-field-button').click(function(e) {
			e.preventDefault();
			if(!confirm('Are you sure you wish to remove this custom field?')) {
				return;
			}
			var $custom_field = $(this).closest('.sched-a-custom-field')

			$custom_field.slideUp(function() {
				$custom_field.remove();
				$container.find("#meta_edit_order").val(sched_implode(',', $container.find(".meta_fields_sortable").sortable('toArray', {attribute: 'data-meta-field-id'})));
				$container.find('.form-meta-field-notification').slideDown();
			});
		});

		$container.find('.sched-form-remove-filter-button').click(function(e) {
			e.preventDefault();
			if(!confirm('Are you sure you wish to remove this filter option?')) {
				return;
			}
			var $filter = $(this).closest('.sched-a-custom-field')

			$filter.slideUp(function() {
				$filter.remove();
				$container.find("#filter_edit_order").val(sched_implode(',', $container.find(".filters_sortable").sortable('toArray', {attribute: 'data-filter-id'})));
				$container.find('.form-filter-notification').slideDown();
			});
		});

		$container.find('.form-create-event-form').submit(function(e) {
			var $this = $(this);
			$this.find('.sched-editor-notification').hide();
			if($this.find('#event_create_column option:selected').val() == '0') {
				e.preventDefault();
				$this.find(".form-create-event-notification-no-column").slideDown();
				$('html, body').animate({
					scrollTop: $(".sched-modal").offset().top-60
				}, 300);
			}
			
		});

		$container.find('.sched-a-select-timeslot-remove').click(function(e) {
			e.preventDefault();
			var $timeslot = $(this).closest('.sched-a-select-timeslot'),
				timeslot_id = $timeslot.attr('data-timeslot-id');
			var url = sched_ajax_url + '&method=ajax_remove_timeslot&id='+schedule_id+'&timeslot_id='+timeslot_id;
			$.get(url, function(result) {
				if(result == 'success') {
					$timeslot.slideUp(300, function() {
						$timeslot.remove();
					});
				}else {
					alert('An error occured while removing the timeslot. '+result);
				}
			});
		});

		$container.find('.sched-a-select-timeslots-add').click(function(e) {
			e.preventDefault();
			var $this = $(this);
			$timeslots = $this.siblings('.sched-a-select-timeslots');
			var count = $timeslots.find('.sched-a-select-timeslot').length,
				html = $timeslots.find('.sched-a-select-timeslot-html').html();

			var $timeslot = $('<div class="sched-a-select-timeslot"></div>').html(html).hide().appendTo($timeslots).fadeIn(300);

			$timeslot.find('.sched_event_create_timeslot_column').attr('name', 'event_create_timeslot_column[]');
			$timeslot.find('.sched_event_create_timeslot_start').attr('name', 'event_create_timeslot_start[]');
			$timeslot.find('.sched_event_create_timeslot_end').attr('name', 'event_create_timeslot_end[]');

			$timeslot.find('.sched_event_edit_timeslot_column').attr('name', 'event_edit_timeslot_column[]');
			$timeslot.find('.sched_event_edit_timeslot_start').attr('name', 'event_edit_timeslot_start[]');
			$timeslot.find('.sched_event_edit_timeslot_end').attr('name', 'event_edit_timeslot_end[]');

			$('<input type="hidden" name="event_edit_timeslot_id[]" />').val('0').appendTo($timeslot);

			$timeslot.find('.sched-a-select-timeslot-remove').click(function(e) {
				e.preventDefault();
				$timeslot.remove();
			});

			$timeslot.find('.input-time').each(function() {
				var $this = $(this);
				$this.timepicker({
					step: timepicker_step,
					timeFormat: 'H:i',
					minTime: $this.attr('data-min'),
					maxTime: $this.attr('data-max')
				});
			});

		});

		$container.find('.sched-a-filter-select').each(function() {
			var $this = $(this),
				id = parseFloat($this.attr('data-filter-id'));

			var $source = $this.find('select[name=filter_'+id+'_select_source]'),
				$source_custom_field = $this.find('select[name=filter_'+id+'_select_source_custom_field]'),
				$source_custom_field_line = $this.find('select[name=filter_'+id+'_select_source_custom_field_line]'),
				$method = $this.find('select[name=filter_'+id+'_select_method]'),
				$matches = $this.find('input[name=filter_'+id+'_select_matches]');

			$source.on('change', function() {
				var val = $source.val();
				if(val === 'title') {
					$source_custom_field.hide();
					$source_custom_field_line.hide();
				}else if(val === 'custom_field') {
					$source_custom_field.hide();
					$source_custom_field_line.show();
				}else if(val === 'specific_custom_field'){
					$source_custom_field.show();
					$source_custom_field_line.show();
				}
			});
			var val = $source.val();
			if(val === 'title') {
				$source_custom_field.hide();
				$source_custom_field_line.hide();
			}else if(val === 'custom_field') {
				$source_custom_field.hide();
				$source_custom_field_line.show();
			}else if(val === 'specific_custom_field'){
				$source_custom_field.show();
				$source_custom_field_line.show();
			}

		});

		$container.find('.sched-a-size-select').each(function() {
			var $select = $(this),
				name = $select.attr('data-name'),
				selected = $select.attr('data-selected'),
				html = '';

			for(var i = 1; i <= 4; i++) {
				html += '<div class="sched-a-size-select-row">';

				for(var j = 1; j <= i; j++) {
					var size = i + '' + j;
					if(size == '11') {
						size = '1';
					}
					var width = 44*4/i-4;
					html += '<div class="sched-a-size-select-box'+(selected == size ? ' sched-a-size-select-box-selected' : '')+'" style="width: '+width+'px" data-size="'+size+'">'+Math.floor(100/i)+'%</div>';
				}

				html += '</div>';
			}
			$select.html(html);

			var $input = $('<input type="hidden" value="'+selected+'" name="'+name+'" />').appendTo($select);

			$select.find('.sched-a-size-select-box').click(function(e) {
				$select.find('.sched-a-size-select-box-selected').removeClass('sched-a-size-select-box-selected');
				$(this).addClass('sched-a-size-select-box-selected');
				$select.find('input').val($(this).attr('data-size'));
			})

			
		});

	})(jQuery);
}

function sched_apply_iris($input) {
	(function($){
		$input
			.iris({
				target: $input.parent().parent(),
				change: function(event, ui) {
					$input.siblings('span').children().css('background', ui.color.toString());
					$input.val(ui.color.toString());
				},
				width: 214,
				palettes: ['#7f64b5', '#54667a', '#01c0c8', '#2caae1', '#d1d1d1', '#18bc9c', '#95a5a6']
			})
			.focus(function() {
				$input.iris('show');
			})
			.siblings('span').children()
			.click(function() {
				$input.iris('toggle');
			})
			.css({
				"border": "2px solid #dde4ec",
				"margin": "-1px -1px -1px -2px",
				"padding": "9px 15px 9px 15px"
			});
	})(jQuery);
}

function sched_open_event_editor(event_id) {
	(function($){
		var url = sched_ajax_url + '&method=ajax_edit_event&event_id='+event_id;
		$.get(url, function(result) {
			sched_open_modal('Edit Event', result);

			//init quicktags
           // quicktags({id : 'sched-ajax-editor'});
            //init tinymce
         //   tinymce.init(tinyMCEPreInit.mceInit['sched-ajax-editor']);

           

		});
	})(jQuery);
}

function sched_open_event_copy(event_id) {
	(function($){
		var url = sched_ajax_url + '&method=ajax_duplicate_event&event_id='+event_id;
		$.get(url, function(result) {
			sched_open_modal('Edit Event', result);
		});
	})(jQuery);
}

function sched_open_column_editor(column_id) {
	(function($){
		var url = sched_ajax_url + '&method=ajax_edit_column&column_id='+column_id;
		$.get(url, function(result) {
			sched_open_modal('Edit Column', result);
		});
	})(jQuery);
}

function sched_show_message(content) {
	(function($){
		var $alert = $('<div class="editor-message"><div class="editor-message-content">'+content+'</div></div>')
			.appendTo('.schedule-editor-row');

		 $alert.find('.editor-message-content').slideDown(250, function() {
				setTimeout(function() {
					$alert.find('.editor-message-content').slideUp(250, function() {
						$alert.remove();
					});
					
				}, 2000)
			});
	})(jQuery);
}

function sched_handle_radio_toggles($radio, $container) {
	(function($){
		var this_value = $radio.val(),
			radio_value = $container.find('input[name='+$radio.attr('name')+']:checked').val();

		if($radio.attr('data-toggle') !== 'null') {
			if(this_value == radio_value) {
				$container.find($radio.attr('data-toggle')).removeClass('sched-a-checkbox-hide');
			}else {
				$container.find($radio.attr('data-toggle')).addClass('sched-a-checkbox-hide');
			}
		}
	})(jQuery);
}

function sched_implode(glue, pieces) {
	  var i = '',
	    retVal = '',
	    tGlue = '';
	  if (arguments.length === 1) {
	    pieces = glue;
	    glue = '';
	  }
	  if (typeof pieces === 'object') {
	    if (Object.prototype.toString.call(pieces) === '[object Array]') {
	      return pieces.join(glue);
	    }
	    for (i in pieces) {
	      retVal += tGlue + pieces[i];
	      tGlue = glue;
	    }
	    return retVal;
	  }
	  return pieces;
}

function sched_reverse_array(array)
{
   var i = null;
    var r = null;
    var length = array.length;
    for (i = 0; i < length / 2; i += 1)
    {
        r = length - 1 - i;
        var left = array[i];
        var right = array[r];
        left ^= right;
        right ^= left;
        left ^= right;
        array[i] = left;
        array[r] = right;
    }
    return array;
}
