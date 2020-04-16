<?php

/**
 * 
 * DB
 *
 * @since 1.8
 * @author  Rik de Vos
 */
class SCHED_Export {

	function __construct() {
		
	}

	public static function duplicate($schedule_id) {

		$schedule_id = (int)$schedule_id;

		$export = self::export($schedule_id);

		self::import($export);

		//$this->notification = 'The timetable has been duplicated.';
		wp_redirect(admin_url('admin.php?page=sched-schedule-timetables&sched-tab=timetables&notification=Timetable+duplicated'));
		
	}

	public static function export($schedule_id) {

		$schedule_id = (int)$schedule_id;

		global $wpdb;
		$table_schedules = SCHED_DB::$table_schedules;
		$table_filters = SCHED_DB::$table_filters;
		$table_meta_fields = SCHED_DB::$table_meta_fields;
		$table_columns = SCHED_DB::$table_columns;
		$table_events = SCHED_DB::$table_events;

		// Get the schedule
		$schedule_db = $wpdb->get_results("SELECT * FROM $table_schedules WHERE id='$schedule_id'");
		$schedule = json_decode(json_encode($schedule_db[0]), true);
		unset($schedule['id']);
		
		// Add the Filters
		$filter_ids = $schedule['filter_ids'];
		$filters = array();
		if($filter_ids !== '') {
			$filters = $wpdb->get_results("SELECT * FROM $table_filters WHERE schedule_id = '$schedule_id' AND id IN ($filter_ids) ORDER BY FIELD(`id`, $filter_ids)");
			for($i = 0; $i < count($filters); $i++) {
				$filters[$i] = json_decode(json_encode($filters[$i]), true);
				$filters[$i]['schedule_id'] = 0;
			}
		}
		$schedule['filter_ids'] = $filters;

		// Add the meta fields
		$meta_field_ids = $schedule['meta_field_ids'];
		$meta_fields = array();
		if($meta_field_ids !== '') {
			$meta_fields = $wpdb->get_results("SELECT * FROM $table_meta_fields WHERE schedule_id = '$schedule_id' AND id IN ($meta_field_ids) ORDER BY FIELD(`id`, $meta_field_ids)");
			for($i = 0; $i < count($meta_fields); $i++) {
				$meta_fields[$i] = json_decode(json_encode($meta_fields[$i]), true);
				$meta_fields[$i]['schedule_id'] = 0;
			}
		}
		$schedule['meta_field_ids'] = $meta_fields;

		// Add the columns
		$column_ids = $schedule['columns'];
		$columns = '';
		if($column_ids !== '') {
			$columns = $wpdb->get_results("SELECT * FROM `$table_columns` WHERE `id` IN ($column_ids) ORDER BY FIELD(`id`, $column_ids)");
			for($i = 0; $i < count($columns); $i++) {
				$columns[$i] = json_decode(json_encode($columns[$i]), true);
				$columns[$i]['schedule_id'] = 0;
				//$columns[$i]['events'] = array();
			}
		}
		$schedule['columns'] = $columns;

		//Add the events
		$events = $wpdb->get_results("SELECT * FROM $table_events WHERE schedule_id = '$schedule_id'");
		for($i = 0; $i < count($events); $i++) {
			$events[$i] = json_decode(json_encode($events[$i]), true);

			// for($j = 0; $j < count($columns); $j++) {
			// 	if($columns[$j]['id'] === $events[$i]['column_id']) {
			// 		$columns[$j]['events'][] = $events[$i];
			// 		break;
			// 	}
			// }
			//$columns[$events[$i]['column_id']]
		}

		$schedule['events'] = $events;

		$export = array(
			'version' => SCHED_DB::$db_version,
			'schedule' => $schedule,
		);

		// print_r($export);
		// exit();
		
		return json_encode($export);

		//exit();

	}

	public static function import($data, $name = false) {

		global $wpdb;
		$table_schedules = SCHED_DB::$table_schedules;
		$table_filters = SCHED_DB::$table_filters;
		$table_meta_fields = SCHED_DB::$table_meta_fields;
		$table_columns = SCHED_DB::$table_columns;
		$table_events = SCHED_DB::$table_events;

		$data = @json_decode($data, true);
		if($data === null && json_last_error() !== JSON_ERROR_NONE) {
			wp_die('The timetable you\'re trying to import is of an unknown format.');
			exit();
		}

		if($data['version'] !== SCHED_DB::$db_version) {
			wp_die('Cannot import timetable, versions must match.');
			exit();
		}

		$schedule = $data['schedule'];

		$columns = $schedule['columns'];
		$filters = $schedule['filter_ids'];
		$meta_fields = $schedule['meta_field_ids'];
		$events = $schedule['events'];

		$schedule['columns'] = '';
		$schedule['filter_ids'] = '';
		$schedule['meta_field_ids'] = '';

		unset($schedule['events']);

		// print_r($events);
		// exit();

		if(!$name) {
			$name = $schedule['name'].' (copy)';
		}
		$schedule['name'] = $name;

		$success = $wpdb->insert($table_schedules, $schedule);
		if(!$success) {
			wp_die('An error occured while creating the timetable.');
			exit();
		}

		$schedule_id = $wpdb->insert_id;


		// Import the custom fields
		$meta_field_linked_ids = array(); // index = old id, value = new id
		$meta_field_ids = array();
		for($i = 0; $i < count($meta_fields); $i++) {
			$meta_field_original_id = $meta_fields[$i]['id'];
			unset($meta_fields[$i]['id']);
			$meta_fields[$i]['schedule_id'] = $schedule_id;
			$success = $wpdb->insert($table_meta_fields, $meta_fields[$i]);
			if(!$success) {
				wp_die('An error occured while creating the custom field: <strong>'.$meta_fields[$i]['title'].'</strong>.');
				exit();
			}
			$meta_field_id = $wpdb->insert_id;

			$meta_field_linked_ids[$meta_field_original_id] = $meta_field_id;
			$meta_field_ids[] = $meta_field_id;
		}

		// Import the filters
		$filter_linked_ids = array(); // index = old id, value = new id
		$filter_ids = array();
		for($i = 0; $i < count($filters); $i++) {
			$filter_original_id = $filters[$i]['id'];
			unset($filters[$i]['id']);
			$filters[$i]['schedule_id'] = $schedule_id;
			if($filters[$i]['source'] === 'specific_custom_field') {
				if(isset($meta_field_linked_ids[$filters[$i]['source_custom_field']])) {
					$filters[$i]['source_custom_field'] = $meta_field_linked_ids[$filters[$i]['source_custom_field']];
				}else {
					$filters[$i]['source'] = 'title';
				}
			}
			$success = $wpdb->insert($table_filters, $filters[$i]);
			if(!$success) {
				wp_die('An error occured while creating the filter: <strong>'.$filter[$i]['title'].'</strong>.');
				exit();
			}
			$filter_id = $wpdb->insert_id;

			$filter_linked_ids[$filter_original_id] = $filter_id;
			$filter_ids[] = $filter_id;
		}

		// Import the columns
		$column_linked_ids = array(); // index = old id, value = new id
		$column_ids = array();
		if(!empty($columns)) {
			for($i = 0; $i < count($columns); $i++) {
				$column_original_id = $columns[$i]['id'];
				unset($columns[$i]['id']);
				$columns[$i]['schedule_id'] = $schedule_id;
				$success = $wpdb->insert($table_columns, $columns[$i]);
				if(!$success) {
					wp_die('An error occured while creating the column: <strong>'.$column[$i]['title'].'</strong>.');
					exit();
				}
				$column_id = $wpdb->insert_id;

				$column_linked_ids[$column_original_id] = $column_id;
				$column_ids[] = $column_id;
			}
		}

		//Import the events
		$event_linked_ids = array(); // index = old id, value = new id
		$event_ids = array();
		for($i = 0; $i < count($events); $i++) {
			$event_original_id = $events[$i]['id'];
			unset($events[$i]['id']);

			$events[$i]['schedule_id'] = $schedule_id;
			$events[$i]['column_id'] = isset($column_linked_ids[$events[$i]['column_id']]) ? $column_linked_ids[$events[$i]['column_id']] : 0;

			$meta_fields = array();
			$meta_fields_old = @unserialize($events[$i]['meta_fields']);
			if($meta_fields_old !== false && count($meta_fields_old) > 0) {
				foreach($meta_fields_old as $id => $meta_field) {
					$new_id = isset($meta_field_linked_ids[$id]) ? $meta_field_linked_ids[$id] : 0;
					$meta_fields[$new_id] = $meta_field;
				}
			}
			$events[$i]['meta_fields'] = serialize($meta_fields);

			$success = $wpdb->insert($table_events, $events[$i]);
			if(!$success) {
				wp_die('An error occured while creating the event: <strong>'.$event[$i]['title'].'</strong>.');
				exit();
			}
			$event_id = $wpdb->insert_id;

			$event_linked_ids[$event_original_id] = $event_id;
			$event_ids[] = $event_id;
		}

		// Update timeslots linked ids
		$events_db = $wpdb->get_results("SELECT * FROM `$table_events` WHERE `schedule_id` = '$schedule_id'");
		foreach($events_db as $key => $event) {
			if($event->timeslot_parent_id !== '0') {
				$new_id = (isset($event_linked_ids[$event->timeslot_parent_id])) ? $event_linked_ids[$event->timeslot_parent_id] : '0';
				$success = $wpdb->update($table_events, array(
					'timeslot_parent_id'	=> $new_id,
				), array(
					'id' => (int)$event->id
				));
			}
			if($event->timeslots !== '') {
				$new_timeslots = array();
				$timeslots = explode(',', $event->timeslots);
				for($i = 0; $i < count($timeslots); $i++) {
					if(isset($event_linked_ids[$timeslots[$i]])) {
						$new_timeslots[] = $event_linked_ids[$timeslots[$i]];
					}
				}
				$new_timeslots = implode(',', $new_timeslots);
				$success = $wpdb->update($table_events, array(
					'timeslots'	=> $new_timeslots,
				), array(
					'id' => (int)$event->id
				));
			}
		}

		// Add the linked data to the schedule
		$success = $wpdb->update($table_schedules, array(
			'meta_field_ids'	=> implode(',', $meta_field_ids),
			'columns'			=> implode(',', $column_ids),
			'filter_ids'		=> implode(',', $filter_ids),
		), array(
			'id' => $schedule_id
		));

	}

}