<?php

/**
 * 
 * DB
 *
 * @version 1.3
 * @author  Rik de Vos
 */
class SCHED_DB {


	public static $db_options_key = 'sched-db-options';
	public static $db_version_key = 'sched-db-version';

	public static $table_schedules = '';
	public static $table_meta_fields = '';
	public static $table_filters = '';
	public static $table_columns = '';
	public static $table_events = '';

	public static $defaults = array();

	public static $options = array(
		'am_pm'								=> false,
		'sidebar_width'						=> 100,
		'sidebar_position'					=> 'left', 		// 0, left, right, both
		'event_hover_color'					=> 'lighten', 	// 0, lighten, darken
		'event_box_text_align'				=> 'center',
		'event_box_time'					=> 1,
		'event_hover_text_color'			=> '#FFFFFF',
		'event_hover_background_color'		=> '#000000',
		//'event_box_description'			=> 1,										REMOVED IN 1.2.0
		'event_box_truncate_title'			=> 1,
		//'event_box_truncate_description'	=> 0,										REMOVED IN 1.2.0
		'event_tooltip'						=> 0,
		'event_tooltip_title'				=> 1,
		'event_tooltip_time'				=> 1,
		'event_tooltip_description'			=> 1,
		'event_tooltip_width_type'			=> 'event', 	// event, custom
		'event_tooltip_width'				=> 150,
		'event_tooltip_color_type'			=> 'event', 	// event, custom
		'event_tooltip_color_bg'			=> '#000000',
		'event_tooltip_color_text'			=> '#FFFFFF',
		'column_tooltip'					=> 0,
		'column_tooltip_title'				=> 1,
		'column_tooltip_description'		=> 1,
		'column_tooltip_width_type'			=> 'column', 	// column, custom
		'column_tooltip_width'				=> 150,
		'column_tooltip_color_bg'			=> '#000000',
		'column_tooltip_color_text'			=> '#FFFFFF',
		'animations'						=> 1,
		'animations_mobile'					=> 1,
		'animations_speed'					=> 'normal',
		'animations_css3'					=> 1,
		'tooltips_mobile'					=> 1,
		'editor_bg'							=> '#F5F5F5',
		'animations_editor'					=> 1,
		'popup_max_width'					=> 560,
		'popup_background_color'			=> '#ffffff',
		'popup_text_color'					=> '#535353',
		'popup_link_color'					=> '#18bc9c',
		'autoplay_videos'					=> 0,
		'column_color_bg'					=> '#e8e8e8',
		'column_color_text'					=> '#3f3f3f',
		'column_color_border'				=> '#ffffff',
		'pattern_color_1'					=> '#ffffff',
		'pattern_color_2'					=> '#e8e8e8',
		'pattern_color_3'					=> '#f5f5f5',
		'title_text_color'					=> '#3f3f3f',
		'sidebar_text_color'				=> '#3f3f3f',
		'event_box_text_color'				=> '#ffffff',
		'title_attr'						=> 0,

		// V1.1.0
		'column_break'						=> 1,
		'column_break_width'				=> 120,
		'column_break_hide_sidebar'			=> 0,

		// 1.2.0
		'editor_custom_css'					=> 1,
		'column_title'						=> 1,
		'event_box_description_method'		=> 'short',

		// 1.4.0
		'editor_quick_tooltips'				=> 1,

		// 1.5.0
		'editor_timepicker_increments'		=> 5,
		'event_box_style'					=> 1,

		// 1.6.0
		'filter_position'					=> 'right', // right, left
		'filter_multiple'					=> 1,
		'filter_hidden_events'				=> 'hide', // hide, opacity
		'filter_hidden_events_opacity'		=> 30,
		'filter_dropdown_width'				=> 100,
		'filter_dropdown_hover_width'		=> 180,
		'filter_dropdown_label'				=> '',
		'filter_dropdown_show_all_label'	=> 'Showing All',

		//1.7.0
		'hashtag_url'						=> 1,
		'hide_popup_for_empty_events'		=> 1,
		'event_box_padding_break'			=> 110,
		'popup_arrows'						=> 1,

		//1.9.0
		'filter_visible'					=> 1,

		//1.10.0
		'column_break_action'				=> 'list',
		'list_view_column_title_color'		=> '#3f3f3f',
		'list_view_event_title_color'		=> '#3f3f3f',
		'list_view_event_hover_title_color'	=> '#000',
		'list_view_event_title_bold'		=> 1,
		'list_view_event_bullets'			=> 1,
		'list_view_event_short_description_method' => 'short',
		'list_view_event_description_color'	=> '#666',
		'list_view_hide_empty_columns'		=> 0,

		//1.10.1
		'shortcodes_in_descriptions'		=> 1,

		//1.11.1
		'columns_sticky_header'				=> 1,
		'columns_sticky_header_offset'		=> 0,

		//1.12.0
		'h_row_height'						=> 90,
		'h_column_width'					=> 200,
		'h_time_indicator'					=> 1,
		'h_time_indicator_height'			=> 30,
		'h_column_multiline'				=> 0,
		'h_column_title_position'			=> 'middle',
		'h_column_title_align'				=> 'center',
		'h_break'							=> 1,
		'h_width_break_point'				=> 200,
		'h_bg_color'						=> '#f8f8f8',

		//1.13.0
		'pdf_type'							=> 'html',
		'pdf_enable'						=> 0,
		'pdf_enable_list'					=> 0,
		'pdf_label'							=> 'Download',
		'pdf_css'							=> '',

		//1.15.0
		'upcoming_type'						=> 'current_datetime', // current_datetime, current_date, custom
		'upcoming_custom'					=> '2016-01-01 00:00',
		'upcoming_limit'					=> 5,
		'upcoming_title'					=> 'timetable_title', // timetable_title, custom
		'upcoming_title_custom'				=> 'Upcoming Events',
		'upcoming_title_amount'				=> 1,

	);

	public static $event_timeslot_ignore_fields = array(
		'title',
		'color',
		'background_type',
		'background_image_url',
		'background_image_darken',
		'onclick',
		'onclick_link',
		'onclick_link_new_page',
		'media_type',
		'media_image',
		'media_youtube',
		'custom_class',
		'meta_fields',
		'description',
		'description_inline'
	);

	public static $db_version = 6;
	
	public static function init() {
		global $wpdb;

		self::$table_schedules = $wpdb->prefix.'sched_schedules';
		self::$table_meta_fields = $wpdb->prefix.'sched_meta_fields';
		self::$table_filters = $wpdb->prefix.'sched_filters';
		self::$table_columns = $wpdb->prefix.'sched_columns';
		self::$table_events = $wpdb->prefix.'sched_events';

		self::$defaults = self::$options;

		self::update_db();
		self::get_options();
	}

	public static function get_option($name, $default = NULL) {
		return get_option(self::$db_options_key.'-'.$name, $default);
	}

	public static function set_option($name, $value) {
		return update_option(self::$db_options_key.'-'.$name, $value);
	}

	public static function get($name, $default = NULL) {
		return isset(self::$options[$name]) ? self::$options[$name] : $default;
	}

	public static function set($name, $value, $update = true) {
		self::$options[$name] = $value;
		if($update) {
			self::update_options();
		}
	}

	public static function get_schedules($get_columns = true) {
		global $wpdb;
		$table = self::$table_schedules;
		$schedules_db = $wpdb->get_results("SELECT * FROM $table ORDER BY id DESC");
		$schedules = array();
		foreach($schedules_db as $schedule) {
			$schedules[] = self::get_table($schedule->id, $get_columns);
		}
		return $schedules;
	}

	// public static function get_schedules_on_date($ids, $date) {

	// 	for($i = 0; $i < count($ids); $i++) {
	// 		$ids[$i] = int($ids[$i]);
	// 	}

	// 	global $wpdb;
	// 	$table = self::$table_schedules;
	// 	$schedules = $wpdb->get_results("SELECT * FROM $table WHERE id in ($ids)");

	// 	foreach($schedules as $schedule) {
	// 		if((int)$schedules->assign_dates_enabled !== 1) {
	// 			continue;
	// 		}

	// 		$schedule_date = $schedules->assign_dates_start;

	// 	}

	
	// 	return print_r($ids, false);	
	// }

	public static function get_table($id, $get_columns = true, $sort_events = true) {
		global $wpdb;
		$table = self::$table_schedules;
		$id = (int)$id;

		$schedules = $wpdb->get_results("SELECT * FROM $table WHERE id = '$id'");

		if(count($schedules) !== 1) {
			echo ('<strong style="color: tomato; ">ERROR: No timetable found with id: <code>'.$id.'</code></strong>');
			return false;
		}

		$schedules = $schedules[0];
		$schedule = array(
			'id'				=> (int)$schedules->id,
			'edited_at'			=> strtotime($schedules->edited_at),
			'name'				=> $schedules->name,
			'title'				=> $schedules->title,
			'scale'				=> (int)$schedules->scale,
			'scale_height'		=> (int)$schedules->scale_height,
			'start'				=> array((int)$schedules->start_hour, (int)$schedules->start_minute),
			'end'				=> array((int)$schedules->end_hour, (int)$schedules->end_minute),
			'start_int'			=> $schedules->start_hour*60 + $schedules->start_minute,
			'end_int'			=> $schedules->end_hour*60 + $schedules->end_minute,
			'length'			=> (int)$schedules->length,
			'styling'			=> $schedules->styling, // event, column, schedule
			'event_color'		=> $schedules->event_color,
			'assign_dates_enabled' => (int)$schedules->assign_dates_enabled,
			'assign_dates_start' => $schedules->assign_dates_start,
			'column_ids'		=> $schedules->columns,
			'columns' 			=> array(),
			'meta_field_ids' 	=> $schedules->meta_field_ids,
			'meta_fields' 		=> array(),
			'filter_ids' 		=> $schedules->filter_ids,
			'filters' 			=> array(),
		);

		if($get_columns && $schedule['column_ids'] !== '') {
			$column_ids = $schedule['column_ids'];
			$schedule['columns'] = self::get_columns($column_ids);
			$events = self::get_events($id);
			foreach($schedule['columns'] as $key => $column) {
				if(isset($events['column_'.$column['id']])) {
					$schedule['columns'][$key]['events'] = $events['column_'.$column['id']];
				}
			}
		}

		if($schedule['meta_field_ids'] !== '') {
			$schedule['meta_fields'] = self::get_meta_fields($id, $schedule['meta_field_ids']);
		}

		if($schedule['filter_ids'] !== '') {
			$schedule['filters'] = self::get_filters($id, $schedule['filter_ids']);
		}

		if($get_columns && $sort_events) {

			//pd($schedule['columns']);

			foreach($schedule['columns'] as $i => $column) {
				foreach($column['events'] as $j => $event) {
					if($event['start_int'] < $schedule['start_int']) {
						$schedule['columns'][$i]['events'][$j]['start_int'] += 24*60;
					}
				}
				usort($schedule['columns'][$i]['events'], array('self', 'sched_sort_fn'));
				// usort($schedule['columns'][$i]['events'], function($a, $b) {
				// 	return $a['start_int']*100 - $b['start_int']*100;
				// });

				if($i == 1) {
					//pd($schedule['columns'][$i]);
				}
			}

		}

		if($schedule['assign_dates_enabled'] == 1) {
			foreach($schedule['columns'] as $i => $column) {
				$column_datetime = new DateTime($schedule['assign_dates_start']);

				// dd($schedule['assign_dates_start']);
				
				if($i == 0) {
					// add nothing
				}elseif($i == 1) {
					$column_datetime->modify('+1 day');
				}else {
					$column_datetime->modify('+'.$i.' days');
				}

				$column['datetime'] = $column_datetime;
				$schedule['columns'][$i] = $column;

				foreach($column['events'] as $j => $event) {
					$event_start = clone $column_datetime;
					// $event_start = new DateTime($column_datetime->format('Y-m-d H:i:s e'));
					// $event_end = $column_datetime;

					$event_start->setTime($event['start'][0], $event['start'][1], 0);
					// $event_end->setTime($event['end'][0], $event['end'][1], 0);

					// $event['datetime_start'] = ;
					if($event['start_int'] < $schedule['start_int']) {
						//starts on the next day
						$event_start->modify('+1 day');
						//$schedule['columns'][$i]['events'][$j]['start_int'] += 24*60;
					}
					$event_end = clone $event_start;
					// $event_end = new DateTime($event_start->format('Y-m-d H:i:s e'));
					$event_end->modify('+'.round($event['length']).' minutes');

					// $column['events'][$j]['title'] = $event['length'];

					$column['events'][$j]['datetime'] = array(
						'start' => $event_start,
						'end' => $event_end,
					);

				}

				$schedule['columns'][$i] = $column;
			}

		}

		return $schedule;
	}

	public static function get_columns($column_ids) {
		global $wpdb;
		$table = self::$table_columns;
		$columns_db = $wpdb->get_results("SELECT * FROM `$table` WHERE `id` IN ($column_ids) ORDER BY FIELD(`id`, $column_ids)");
		$columns = array();
		foreach($columns_db as $key => $column) {
			$columns[] = array(
				'id' 			=> (int)$column->id,
				'schedule_id' 	=> (int)$column->schedule_id,
				'title' 		=> $column->title,
				'description' 	=> $column->description,
				'color' 		=> $column->color,
				'custom_class' 	=> $column->custom_class,
				'events' 		=> array(),
				'datetime'		=> 0,
			);
		}
		return $columns;
	}

	public static function get_meta_fields($schedule_id, $meta_field_ids) {
		global $wpdb;
		$table = self::$table_meta_fields;
		$meta_fields_db = $wpdb->get_results("SELECT * FROM $table WHERE schedule_id = '$schedule_id' AND id IN ($meta_field_ids) ORDER BY FIELD(`id`, $meta_field_ids)");

		$meta_fields = array();
		foreach($meta_fields_db as $key => $meta_field) {
			$meta_fields[] = array(
				'id' 			=> (int)$meta_field->id,
				'schedule_id' 	=> (int)$meta_field->schedule_id,
				'enabled' 		=> (int)$meta_field->enabled,
				'icon_enabled' 	=> (int)$meta_field->icon_enabled,
				'title' 		=> $meta_field->title,
				'icon' 			=> $meta_field->icon,
			);
		}
		return $meta_fields;
	}

	public static function get_filters($schedule_id, $filter_ids) {
		global $wpdb;
		$table = self::$table_filters;
		$filters_db = $wpdb->get_results("SELECT * FROM $table WHERE schedule_id = '$schedule_id' AND id IN ($filter_ids) ORDER BY FIELD(`id`, $filter_ids)");

		$filters = array();
		foreach($filters_db as $key => $filter) {
			$filters[] = array(
				'id' 						=> (int)$filter->id,
				'schedule_id' 				=> (int)$filter->schedule_id,
				'label' 					=> $filter->label,
				'source' 					=> $filter->source,
				'source_custom_field' 		=> $filter->source_custom_field,
				'source_custom_field_line' 	=> $filter->source_custom_field_line,
				'method' 					=> $filter->method,
				'matches' 					=> $filter->matches,
			);
		}
		return $filters;
	}

	public static function get_events($schedule_id) {
		global $wpdb;
		$table = self::$table_events;
		$schedule_id = (int)$schedule_id;
		$events_db = $wpdb->get_results("SELECT * FROM `$table` WHERE `schedule_id` = '$schedule_id'");
		$events = array();
		$events_by_id = array();
		foreach($events_db as $key => $event) {
			$parsed_event = self::parse_event($event);
			$events['column_'.$event->column_id][] = $parsed_event;
			$events_by_id[$parsed_event['id']] = $parsed_event;
		}

		// Set copy events

		//$fields = self::$event_timeslot_ignore_fields;
		// Loop through columns
		foreach($events as $event_column_key => $event_column) {
			// $column_events = $events[$i];
			// Loop through events of column
			for($i = 0; $i < count($event_column); $i++) {
				$event = $event_column[$i];
				if($event['timeslot_parent_id'] !== 0) {

					// Remove this event if parent does not exist
					if(!isset($events_by_id[$event['timeslot_parent_id']])) {
						unset($events[$event_column_key][$i]);
						continue;
					}

					// Set parent
					$events[$event_column_key][$i]['parent'] = $events_by_id[$event['timeslot_parent_id']];
					$fields = $events_by_id[$event['timeslot_parent_id']]['timeslot_fields'];
					foreach($fields as $field_name => $overwrite) {
						if($overwrite == 0 && $events_by_id[$event['timeslot_parent_id']]['timeslot_fields_method'] == 1) {
							continue;
						}
						$events[$event_column_key][$i][$field_name] = $events_by_id[$event['timeslot_parent_id']][$field_name];
					}
					// Merge options of parent
					// for($j = 0; $j < count($fields); $j++) {
					// 	echo $fields[$j];
					// 	$events[$event_column_key][$i][$fields[$j]] = $events_by_id[$event['timeslot_parent_id']][$fields[$j]];
					// }

					// if($event['id'] == 62) {
					// 	pd($events[$event_column_key][$i]);
					// }
				}
			}
		}

		return $events;
	}

	public static function get_event($event_id, $include_timeslots = false, $overrule_fields_if_timeslot = false) {
		global $wpdb;
		$table = self::$table_events;
		$event_id = (int)$event_id;
		$events_db = $wpdb->get_results("SELECT * FROM `$table` WHERE `id` = '$event_id'");
		if(count($events_db) !== 1) {
			wp_die('Event with id '.$event_id.' does not exist');
		}

		$event = self::parse_event($events_db[0]);
		if($overrule_fields_if_timeslot && $event['timeslot_parent_id'] !== 0) {
			$parent = self::get_event($event['timeslot_parent_id']);
			$event['parent'] = $parent;

			$fields = $event['parent']['timeslot_fields'];
			foreach($fields as $field_name => $overwrite) {
				if($overwrite == 0 && $event['parent']['timeslot_fields_method'] == 1) {
					continue;
				}
				$event[$field_name] = $event['parent'][$field_name];
			}
			
		}
		if(!$include_timeslots) {
			return $event;
		}

		$event['timeslots_arr'] = array();
		for($i = 0; $i < count($event['timeslots']); $i++) {
			$event['timeslots_arr'][] = self::get_event($event['timeslots'][$i]);
		}

		return $event;
		
	}

	public static function parse_event($event) {
		$ev = array(
			'id' 							=> (int)$event->id,
			'column_id' 					=> (int)$event->column_id,
			'schedule_id' 					=> (int)$event->schedule_id,
			'title' 						=> $event->title,
			'location' 						=> $event->location,
			'start'							=> array((int)$event->start_hour, (int)$event->start_minute),
			'end'							=> array((int)$event->end_hour, (int)$event->end_minute),
			'start_int'						=> $event->start_hour*60 + $event->start_minute + ($event->size/44)/2,
			//'end_int'						=> $event->end_hour + $event->end_minute/60 + ($event->size/44)/100,
			'length' 						=> (int)$event->length,
			'size' 							=> (int)$event->size,
			'color' 						=> $event->color,
			'timeslot_parent_id'			=> ($event->timeslot_parent_id == '') ? 0 : (int)$event->timeslot_parent_id,
			'timeslots' 					=> ($event->timeslots == '') ? array() : explode(',', $event->timeslots),
			'timeslot_fields' 				=> ($event->timeslot_fields == '') ? array() : unserialize($event->timeslot_fields),
			'timeslot_fields_method' 		=> $event->timeslot_fields_method,
			'parent'						=> false,
			'onclick' 						=> $event->onclick,
			'onclick_link' 					=> $event->onclick_link,
			'onclick_link_new_page' 		=> (int)$event->onclick_link_new_page,
			'media_type' 					=> $event->media_type,
			'media_image' 					=> $event->media_image,
			'media_youtube' 				=> $event->media_youtube,
			'custom_class' 					=> $event->custom_class,
			'meta_fields' 					=> unserialize($event->meta_fields),
			'custom_class' 					=> $event->custom_class,
			'description_inline' 			=> $event->description_inline,
			'description' 					=> $event->description,
			'background_type'				=> $event->background_type,
			'background_image_url'			=> $event->background_image_url,
			'background_image_darken'		=> (int)$event->background_image_darken,
			// 'start_date_time'				=> null,
			// 'end_date_time'					=> null,
		);

		if(is_serialized($ev['media_image'])) {
			$ev['media_image'] = unserialize($ev['media_image']);
		}else if($ev['media_image'] == '') {
			$ev['media_image'] = false;
		}else {
			$ev['media_image'] = array(
				'id' => 0,
				'type' => 'url', // url or library
				'size' => '',
				'url' => $ev['media_image'],
			);
		}

		if(is_serialized($ev['background_image_url'])) {
			$ev['background_image_url'] = unserialize($ev['background_image_url']);
		}else if($ev['background_image_url'] == '') {
			$ev['background_image_url'] = false;
		}else {
			$ev['background_image_url'] = array(
				'id' => 0,
				'type' => 'url', // url or library
				'size' => '',
				'url' => $ev['background_image_url'],
			);
		}

		return $ev;

		/**
		 * $copy_time[$i] = array((array)'start', (array)'end', 'length', 'title', 'column_id', 'color')
		**/
		
	}

	public static function create_schedule() {
		global $wpdb;
		$table_name = SCHED_DB::$table_schedules;
		$start = array(9, 0);
		$end = array(12, 0);
		$success = $wpdb->insert($table_name, array(
			'name'				=> sanitize_title(date('Y-m-d H:i:s')),
			'title'				=> '',
			'start_hour'		=> $start[0],
			'start_minute'		=> $start[1],
			'end_hour'			=> $end[0],
			'end_minute'		=> $end[1],
			'length'			=> SCHED_HTML::length($start, $end),
			'styling'			=> 'event', // event, column, schedule
			'scale'				=> 1,
			'scale_height'		=> 50,
			'event_color'		=> '#01C0C8',
			'assign_dates_enabled' => 0,
			'assign_dates_start' => '2015-01-01',
		));
	}

	public static function create_timeslot($schedule_id, $event_id, $timeslot) {
		global $wpdb;
		$table_name = SCHED_DB::$table_events;
		$success = $wpdb->insert($table_name, array(
			'schedule_id'				=> $schedule_id,
			'column_id'					=> $timeslot['column'],
			'title'						=> $timeslot['title'],
			'start_hour'				=> $timeslot['start'][0],
			'start_minute'				=> $timeslot['start'][1],
			'end_hour'					=> $timeslot['end'][0],
			'end_minute'				=> $timeslot['end'][1],
			'length'					=> SCHED_HTML::length($timeslot['start'], $timeslot['end']),
			'timeslot_parent_id'		=> $event_id,
			'timeslot_fields'			=> serialize(array()),
			'meta_fields'				=> serialize(array()),
			'onclick'					=> 'popup',
			'media_type'				=> '0',
			'color'						=> '#8cc400',
		));
		
		return $wpdb->insert_id;
	}

	public static function update_timeslot($timeslot_id, $timeslot) {
		global $wpdb;
		$table_name = SCHED_DB::$table_events;
		$success = $wpdb->update($table_name, array(
			'column_id'					=> $timeslot['column'],
			'start_hour'				=> $timeslot['start'][0],
			'start_minute'				=> $timeslot['start'][1],
			'end_hour'					=> $timeslot['end'][0],
			'end_minute'				=> $timeslot['end'][1],
			'length'					=> SCHED_HTML::length($timeslot['start'], $timeslot['end']),
		), array(
			'id' => (int)$timeslot_id
		));
		
		return $success;
	}

	public static function hide_empty_event($event, $meta_fields) {
		if(SCHED_DB::get('hide_popup_for_empty_events') == 0) {
			return 'popup';
		}
		if($event['description'] !== '') {
			return 'popup';
		}
		if($event['media_type'] !== '0') {
			return 'popup';
		}
		foreach($meta_fields as $meta_field) {
			if(isset($event['meta_fields'][$meta_field['id']]) && $meta_field['enabled'] == 1 && $event['meta_fields'][$meta_field['id']]['enabled'] == 1) {
				return 'popup';
			}
		}
		// Does not have anything in the popup, so return 0 to hide popup.
		return '0';
	}

	public static function image_post_to_array($name) {
		// print_r($_POST);
		$source = $_POST[$name.'_source'] === 'library' ? 'library' : 'url';
		$size = isset($_POST[$name.'_size']) ? SCHED_DB::handle_quotes($_POST[$name.'_size']) : '';
		$id = (int)$_POST[$name.'_id'];
		$url = SCHED_DB::handle_quotes($_POST[$name.'_url']);

		if($url === '') {
			$image = '';
		}else if($source === 'library') {
			$image = serialize(array(
				'id' => $id,
				'type' => 'library', // 'url' or 'library'
				'size' => $size,
				'url' => $url,
			));
		}else if($source === 'url') {
			$image = serialize(array(
				'id' => 0,
				'type' => 'url', // 'url' or 'library'
				'size' => '',
				'url' => $url,
			));
		}

		return $image;

	}

	public static function reset_colors() {
		foreach(self::$defaults as $key => $default) {
			if(strpos($default, '#') === 0) {
				self::set($key, $default);
			}
		}
	}

	public static function reset_settings() {
		foreach(self::$defaults as $key => $default) {
			self::set($key, $default);
		}
	}

	public static function get_options() {
		$options = get_option(self::$db_options_key);
		if(empty($options)) {
			self::update_options();
			return;
		}
		foreach(self::$options as $name => $option) {
			if(isset($options[$name])) {
				self::$options[$name] = $options[$name];
			}
		}
		// foreach($options as $name=>$value) {
		// 	self::$options[$name] = $value;
		// }
	}

	public static function update_options() {
		return update_option(self::$db_options_key, self::$options);
	}

	public static function get_db_version() {
		$version = get_option(self::$db_version_key);
		if(!$version) {
			return 0;
		}
		return (int)$version;
	}

	public static function set_db_version($version) {
		update_option(self::$db_version_key, $version);
	}

	public static function update_db() {

		if(self::get_db_version() == 0) {
			self::install();
		}

		if(self::get_db_version() == 1) {
			global $wpdb;
			$wpdb->query("ALTER TABLE `".self::$table_events."` ADD `timeslot_parent_id` INT(11) NOT NULL AFTER `length`");
			$wpdb->query("ALTER TABLE `".self::$table_events."` ADD `timeslots` MEDIUMTEXT CHARACTER SET utf8 NOT NULL AFTER `timeslot_parent_id`");
			$wpdb->query("ALTER TABLE `".self::$table_events."` ADD `timeslot_fields` MEDIUMTEXT CHARACTER SET utf8 NOT NULL AFTER `timeslots`");
			$wpdb->query("ALTER TABLE `".self::$table_events."` ADD `timeslot_fields_method` INT(11) NOT NULL AFTER `timeslot_fields`");
			self::set_db_version(2);
		}

		if(self::get_db_version() == 2) {
			global $wpdb;
			$wpdb->query("ALTER TABLE `".self::$table_schedules."` ADD `filter_ids` MEDIUMTEXT CHARACTER SET utf8 NOT NULL AFTER `meta_field_ids`");

			$wpdb->query("CREATE TABLE IF NOT EXISTS `" . self::$table_filters . "` (
						`id` int(11) NOT NULL AUTO_INCREMENT,
						`schedule_id` int(11) NOT NULL,
						`label` mediumtext CHARACTER SET utf8 NOT NULL,
						`source` mediumtext CHARACTER SET utf8 NOT NULL,
						`source_custom_field` mediumtext CHARACTER SET utf8 NOT NULL,
						`source_custom_field_line` mediumtext CHARACTER SET utf8 NOT NULL,
						`method` mediumtext CHARACTER SET utf8 NOT NULL,
						`matches` mediumtext CHARACTER SET utf8 NOT NULL,
					PRIMARY KEY (`id`)
				);");

			self::set_db_version(3);
		}

		if(self::get_db_version() == 3) {
			global $wpdb;
			$wpdb->query("ALTER TABLE `".self::$table_events."` ADD `background_type` MEDIUMTEXT CHARACTER SET utf8 NOT NULL AFTER `description`");
			$wpdb->query("UPDATE `".self::$table_events."` SET background_type = 'color' WHERE background_type = ''");
			$wpdb->query("ALTER TABLE `".self::$table_events."` ADD `background_image_url` MEDIUMTEXT CHARACTER SET utf8 NOT NULL AFTER `background_type`");
			$wpdb->query("ALTER TABLE `".self::$table_events."` ADD `size` INT(11) NOT NULL DEFAULT '1' AFTER `length`");
			$wpdb->query("ALTER TABLE `".self::$table_events."` ADD `background_image_darken` INT(11) NOT NULL DEFAULT '0' AFTER `background_image_url`");
			self::set_db_version(4);
		}

		if(self::get_db_version() == 4) {
			global $wpdb;
			$wpdb->query("ALTER TABLE `".self::$table_schedules."` ADD `scale_height` INT(11) NOT NULL DEFAULT '50' AFTER `filter_ids`");
			self::set_db_version(5);
		}

		if(self::get_db_version() == 5) {
			global $wpdb;
			$wpdb->query("ALTER TABLE `".self::$table_schedules."`  ADD `assign_dates_enabled` INT NOT NULL DEFAULT '0' AFTER `scale_height`, ADD `assign_dates_start` DATE NOT NULL DEFAULT '2016-01-01' AFTER `assign_dates_enabled`");
			self::set_db_version(6);
		}

	}

	public static function handle_quotes($val) {
		return stripslashes_deep($val);
	}

	public static function sched_sort_fn($a, $b) {
		return $a['start_int']*100 - $b['start_int']*100;
	}

	public static function install() {
		global $wpdb;
		$wpdb->query("CREATE TABLE IF NOT EXISTS `" . self::$table_schedules . "` (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
					`name` mediumtext CHARACTER SET utf8 NOT NULL,
					`title` mediumtext CHARACTER SET utf8 NOT NULL,
					`scale` int(11) NOT NULL,
					`start_hour` int(11) NOT NULL,
					`start_minute` int(11) NOT NULL,
					`end_hour` int(11) NOT NULL,
					`end_minute` int(11) NOT NULL,
					`length` int(11) NOT NULL,
					`styling` tinytext CHARACTER SET utf8 NOT NULL,
					`event_color` tinytext CHARACTER SET utf8 NOT NULL,
					`columns` mediumtext CHARACTER SET utf8 NOT NULL,
					`meta_field_ids` mediumtext CHARACTER SET utf8 NOT NULL,
				PRIMARY KEY (`id`)
			);");

		$wpdb->query("CREATE TABLE IF NOT EXISTS `" . self::$table_meta_fields . "` (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`schedule_id` int(11) NOT NULL,
					`enabled` int(11) NOT NULL,
					`icon_enabled` int(11) NOT NULL,
					`title` mediumtext CHARACTER SET utf8 NOT NULL,
					`icon` tinytext CHARACTER SET utf8 NOT NULL,
				PRIMARY KEY (`id`)
			);");

		$wpdb->query("CREATE TABLE IF NOT EXISTS `" . self::$table_columns . "` (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`schedule_id` int(11) NOT NULL,
					`title` mediumtext CHARACTER SET utf8 NOT NULL,
					`description` mediumtext CHARACTER SET utf8 NOT NULL,
					`color` mediumtext CHARACTER SET utf8 NOT NULL,
					`custom_class` tinytext CHARACTER SET utf8 NOT NULL,
				PRIMARY KEY (`id`)
			);");

		$wpdb->query("CREATE TABLE IF NOT EXISTS `" . self::$table_events . "` (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`column_id` int(11) NOT NULL,
					`schedule_id` int(11) NOT NULL,
					`title` mediumtext CHARACTER SET utf8 NOT NULL,
					`location` mediumtext CHARACTER SET utf8 NOT NULL,
					`start_hour` int(11) NOT NULL,
					`start_minute` int(11) NOT NULL,
					`end_hour` int(11) NOT NULL,
					`end_minute` int(11) NOT NULL,
					`length` int(11) NOT NULL,
					`color` tinytext CHARACTER SET utf8 NOT NULL,
					`onclick` tinytext CHARACTER SET utf8 NOT NULL,
					`onclick_link` mediumtext CHARACTER SET utf8 NOT NULL,
					`onclick_link_new_page` int(11) NOT NULL,
					`media_type` text CHARACTER SET utf8 NOT NULL,
					`media_image` mediumtext CHARACTER SET utf8 NOT NULL,
					`media_youtube` mediumtext CHARACTER SET utf8 NOT NULL,
					`custom_class` tinytext CHARACTER SET utf8 NOT NULL,
					`meta_fields` longtext CHARACTER SET utf8 NOT NULL,
					`description_inline` mediumtext CHARACTER SET utf8 NOT NULL,
					`description` mediumtext CHARACTER SET utf8 NOT NULL,
				PRIMARY KEY (`id`)
			);");

		self::set_db_version(1);

	}

}

