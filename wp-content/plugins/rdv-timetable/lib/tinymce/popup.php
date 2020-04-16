<?php
//Load Wordpress
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp . '/wp-load.php' );
header('HTTP/1.1 200 OK');

/*
if(!current_user_can('manage_sched_mce_options')) {
	wp_die( __('You do not have sufficient permissions to access this page.') );
}
*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'> -->
	<style type="text/css">
		#TB_window {
			height: 450px !important;
		}

		.sched_mce_container {
			/*width: 500px;*/
			margin: 0 auto;
			margin-top: 20px;
			font-family: 'Open Sans', sans-serif;
		}


		.sched-mce-shortcode-options-icon {
			background: #999;
			padding: 3px 4px;
			border-radius: 3px;
			color: #fff;
		}

		.sched-button-add-options {
			font-weight: bold;
			box-shadow: none !important;
		}

		.sched-button-add-options-toggle {
			display: none;
		}

		.sched-button-add-options-toggle-list:after {
			content: ".";
			display: block;
			height: 0;
			clear: both;
			visibility: hidden;
		}

		.sched-a-timetable-options {
			clear: both;
			padding-top: 1em;
			display: none;
		}

		.sched_mce_container .sched-a-timetable {
			padding: 10px;
		}

	</style>
</head>
<body>
	
	<div class="sched_mce_container">
		<p>Click <strong>+ INSERT</strong> to insert the shortcode of one of the timetable's below into your post.</p>

		<p><a href="#" class="sched-button-add-options"><i class="fa fa-plus"></i> Add Shortcode Options</a></p>

		<div class="sched-button-add-options-toggle">
			Overrule options by adding them to the shortcode. Example <strong>[timetable id="23" event_tooltip="1"]</strong> For a complete list of options refer to the documentation, or hover over the <i class="fa fa-code sched-mce-shortcode-options-icon"></i> icon next to each option in the admin panel. List of options:
			<div class="sched-button-add-options-toggle-list">
				<ul style="width: 50%; float: left;">
					<?php $i = 0; foreach(SCHED_DB::$options as $option_name => $option_value) { $i++; if($i%2 === 0) { continue; } ?>
					<li><label><input type="checkbox" class="sched-button-option" data-option="<?php echo $option_name.'=&quot;'.$option_value.'&quot;'; ?>" /> <?php echo $option_name; ?></label></li>
					<?php } ?>
				</ul>
				<ul style="width: 50%; float: right;">
					<?php $i = 0; foreach(SCHED_DB::$options as $option_name => $option_value) { $i++; if($i%2 !== 0) { continue; } ?>
					<li><label><input type="checkbox" class="sched-button-option" data-option="<?php echo $option_name.'=&quot;'.$option_value.'&quot;'; ?>" /> <?php echo $option_name; ?></label></li>
					<?php } ?>
				</ul>
			</div>
		</div>

		<div class="sched-a-timetables">
			<?php $int = 0; foreach(SCHED_DB::get_schedules(true) as $schedule) { $int++; ?>
			<div class="sched-a-timetable" style="width: 570px; margin: 0 auto; <?php echo ($int%2 === 0) ? 'background: #f0f0f0;' : ''; ?>">
				<div class="sched-a-timetable-col sched-a-timetable-col-1">
					<div class="sched-a-timetable-top"><a href="<?php echo admin_url('admin-ajax.php?action=sched_editor&id='.$schedule['id']); ?>" target="_blank"><?php echo esc_html($schedule['name']); ?></a></div>
					<div class="sched-a-timetable-bottom">Last Edit: <?php echo date(get_option('date_format').' '.get_option('time_format'), $schedule['edited_at']); ?></div>
				</div>
				<div class="sched-a-timetable-col sched-a-timetable-col-2">
					<div class="sched-a-timetable-top"><?php echo count($schedule['columns']); ?></div>
					<div class="sched-a-timetable-bottom">Columns</div>
				</div>
				<div class="sched-a-timetable-col sched-a-timetable-col-3">
					<div class="sched-a-timetable-top"><?php $i = 0; foreach($schedule['columns'] as $col) { $i += count($col['events']); } echo $i; ?></div>
					<div class="sched-a-timetable-bottom">Events</div>
				</div>
				<div class="sched-a-timetable-col sched-a-timetable-col-4">
					<a href="#" target="_blank" class="sched-button sched-button-small sched-button-grey sched-button-more" data-id="<?php echo $schedule['id']; ?>"><i class="fa fa-cog" style=""></i>Options</a>
					<a href="#" target="_blank" class="sched-button sched-button-small sched-button-insert-timetable" data-id="<?php echo $schedule['id']; ?>" style="background: #18bc9c;"><i class="fa fa-plus"></i> &nbsp;Insert</a>
				</div>
				<div class="sched-a-timetable-options">
					<strong>Choose Layout:</strong><br />
					<label><input type="radio" name="type_<?php echo $schedule['id']; ?>" value="timetable" checked="checked" /> Timetable</label><br />
					<label><input type="radio" name="type_<?php echo $schedule['id']; ?>" value="list_view" /> List View</label><br />
					<?php if(!defined('SCHED_H_FILE')) { ?>
					<label><input type="radio" disabled="disabled" name="type_<?php echo $schedule['id']; ?>" value="horizontal" /> <strong>Horizontal (requires <a href="admin.php?page=sched-schedule&amp;tab=horizontal" target="_blank">addon</a>)</strong></label><br />
					<?php }else { ?>
					<label><input type="radio" name="type_<?php echo $schedule['id']; ?>" value="horizontal" /> <strong>Horizontal (addon installed!)</strong></label><br />
					<?php } ?>
					<label><input type="radio" name="type_<?php echo $schedule['id']; ?>" value="upcoming" /> Upcoming View</label><br />
					<br /><br />
					<strong>Show Columns <em>(None selected = showing all)</em>:</strong>
					<ul>
					<?php for($i = 0; $i < count($schedule['columns']); $i++) { $column = $schedule['columns'][$i]; ?>
						<li><label><input type="checkbox" class="sched-columns-checked" data-schedule-id="<?php echo ($schedule['id']); ?>" data-column-id="<?php echo ($column['id']); ?>" /><?php echo $column['title']; ?> </label></li>
					<?php } ?>
					</ul>

					<?php if(count($schedule['filters']) !== 0) { ?>
					<strong>Checked Filters:</strong>
					<ul>
					<?php for($i = 0; $i < count($schedule['filters']); $i++) { $filter = $schedule['filters'][$i]; ?>
						<li><label><input type="checkbox" class="sched-filters-checked" data-schedule-id="<?php echo ($schedule['id']); ?>" data-filter-id="<?php echo ($filter['id']); ?>" /><?php echo $filter['label']; ?> </label></li>
					<?php } ?>
					<?php } ?>
				</ul>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>

	<script>
	(function($){

		$(".sched-button-add-options").click(function(e) {
			e.preventDefault();
			$(this).find('i').toggleClass('fa-plus').toggleClass('fa-minus');
			$(".sched-button-add-options-toggle").slideToggle();
		});

		$(".sched-button-more").click(function(e) {
			e.preventDefault();
			$(this).closest('.sched-a-timetable').find('.sched-a-timetable-options').stop().slideToggle(300);
		})

		$(".sched-button-insert-timetable").click(function(e) {
			e.preventDefault();
			var $checkboxes = $(".sched-button-option:checked"),
				shortcode = '',
				type = $('.sched_mce_container input[name="type_'+$(this).attr('data-id')+'"]:checked').val();

			var shortcode = '[';

			shortcode += (type === 'upcoming') ? 'timetable_upcoming' : 'timetable';

			shortcode += ' id="'+$(this).attr('data-id')+'"';

			$checkboxes.each(function() {
				shortcode += ' '+$(this).attr('data-option');
			});

			// Add columns
			var $columns_check = $('.sched_mce_container input.sched-columns-checked[data-schedule-id="'+$(this).attr('data-id')+'"]:checked');
			if($columns_check.length > 0) {
				shortcode += ' columns="';
				$columns_check.each(function() {
					shortcode += $(this).attr('data-column-id')+',';
				});
				shortcode = shortcode.slice(0, -1);
				shortcode += '"';
			}

			// Add filters
			var $filters_check = $('.sched_mce_container input.sched-filters-checked[data-schedule-id="'+$(this).attr('data-id')+'"]:checked');
			if($filters_check.length > 0) {
				shortcode += ' filters="';
				$filters_check.each(function() {
					shortcode += $(this).attr('data-filter-id')+',';
				});
				shortcode = shortcode.slice(0, -1);
				shortcode += '"';
			}

			
			if(type === 'list_view') {
				shortcode += ' layout="list_view"';
			}
			if(type === 'horizontal') {
				shortcode += ' layout="horizontal"';
			}
			

			shortcode += ']';

			sched_add_text(shortcode);
		});

		function sched_add_text(text) {
			tinymce.execCommand('mceInsertContent', false, text);
			tb_remove();
		}
	})(jQuery);

	</script>
</body>
</html>