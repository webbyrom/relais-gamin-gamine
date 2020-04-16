<input type="hidden" value="<?php echo $value; ?>" name="<?php echo $settings['param_name']; ?>" class="wpb_vc_param_value sched_vc_option_filter" />

<select multiple="true" class=" sched_vc_option_filters_select"></select>
<a href="#" class="sched_vc_option_filters_all">All</a> | 
<a href="#" class="sched_vc_option_filters_none">None</a>

<script type="text/javascript">

	(function($){

		<?php
		$schedules_db = SCHED_DB::get_schedules(true);
		$schedules = array();
		foreach($schedules_db as $schedule_db) {
			$schedules[$schedule_db['id']] = array();
			foreach($schedule_db['filters'] as $filter) {
				$schedules[$schedule_db['id']][] = array('id' => $filter['id'], 'title' => esc_html($filter['label']));
			}
		}
		?>

		var schedules = $.parseJSON('<?php echo str_replace("'", "\'", json_encode($schedules)); ?>'),
			selected = <?php
			$values = explode(',', $value);
			$selected = array();
			for($i = 0; $i < count($values); $i++) {
				// if($values[$i] !== '') {
					$selected[$values[$i]] = true;
				// }
			}
			echo json_encode($selected);
			?>;


		function sched_show_filters(schedule_id) {
			var schedule = schedules[schedule_id];
			var html = '';
			if(typeof(schedule) === typeof(undefined)) {
				schedule = [];
			}
			for(var i = 0; i < schedule.length; i++) {
				if(selected[schedule[i].id] == true) {
					html += '<option value="'+schedule[i].id+'" selected="selected">'+schedule[i].title+'</option>';
				}else {
					html += '<option value="'+schedule[i].id+'">'+schedule[i].title+'</option>';
				}
			}
			
			$(".sched_vc_option_filters_select").html(html);
			sched_update_filters_input();
		}

		function sched_update_filters_input() {
			var selected_str = $(".sched_vc_option_filters_select").val();
			if(selected_str === null) {
				$(".sched_vc_option_filter").val('');
				return;
			}
			$(".sched_vc_option_filter").val(selected_str.join(','));
		}

		$(".sched_vc_option_id").bind('input propertychange', function() {
			selected = [];
			sched_show_filters(parseFloat($(".sched_vc_option_id").val()));
		});

		$(".sched_vc_option_filters_select").bind('change', function() {
			sched_update_filters_input();
		});

		$(".sched_vc_option_filters_none").click(function(e) {
			e.preventDefault();
			$(".sched_vc_option_filter").val('');
			$(".sched_vc_option_filters_select option").each(function() {
				$(this).removeAttr('selected');
			})
		});

		$(".sched_vc_option_filters_all").click(function(e) {
			e.preventDefault();
			var values = [];
			$(".sched_vc_option_filters_select option").each(function() {
				$(this).attr('selected', 'selected');
				values.push($(this).attr('value'));
			});

			
			$(".sched_vc_option_filter").val(values.join(','));
		});

		sched_show_filters(parseFloat($(".sched_vc_option_id").val()));
	})(jQuery);
</script>