<?php

/**
 * 
 * Schedule Editor
 *
 * @version 1.0
 * @author  Rik de Vos
 */
class SCHED_EDITOR {

	public $schedule = false;

	public $output_schedule = false;

	public $notification = false;

	function __construct() {

		$this->schedule = new SCHED_SCHEDULE();
		if(isset($_GET['id'])) {
			$this->schedule->load((int)$_GET['id']);
		}
		$this->schedule->editor = true;

		add_action('init', array($this, 'init'));
		
		if($this->output_schedule) {
			$this->show_editor();
		}


		// AJAX METHODS
		if(isset($_GET['method'])) {
			$method = $_GET['method'];
			switch ($method) {
				case 'ajax_update_column_order':
					$this->update_column_order();
					break;
				case 'ajax_edit_event':
					$this->edit_event();
					break;
				case 'ajax_duplicate_event':
					$this->duplicate_event();
					break;
				case 'ajax_edit_column':
					$this->edit_column();
					break;
				case 'ajax_update_event_tooltip':
					$this->update_event_tooltip();
					break;
				case 'ajax_remove_timeslot':
					$this->remove_timeslot();
					break;
			}
		}
		
	}

	function init() {
		$method = 'show';
		if(isset($_GET['method'])) {
			$method = $_GET['method'];
		}

		if($method !== 'show' && $method !== 'edit_event' && $method !== 'edit_column') {
			$this->update_last_edit();
		}

		switch ($method) {
			// case 'show':
			// 	$this->show_editor();
			// 	break;
			case 'update_meta':
				$this->update_meta();
				break;
			case 'create_meta':
				$this->create_meta();
				break;
			case 'delete_meta':
				$this->delete_meta();
				break;
			case 'create_filter':
				$this->create_filter();
				break;
			case 'delete_filter':
				$this->delete_filter();
				break;
			case 'update_filter':
				$this->update_filter();
				break;
			case 'update_schedule':
				$this->update_schedule();
				break;
			case 'create_schedule':
				$this->create_schedule();
				break;
			case 'duplicate_schedule':
				$this->duplicate_schedule();
				break;
			case 'create_column':
				$this->create_column();
				break;
			case 'create_event':
				$this->create_event();
				break;
			case 'update_column':
				$this->update_column();
				break;
			case 'update_event':
				$this->update_event();
				break;
			case 'delete_schedule':
				$this->delete_schedule();
				break;
			case 'delete_column':
				$this->delete_column();
				break;
			case 'delete_event':
				$this->delete_event();
				break;

		}
	}

	function show_editor() {

		include SCHED_DIR.'/lib/views/editor.php';
	}

	function method($method = false) {
		$notification = ($this->notification !== false) ? '&notification='.urlencode($this->notification) : '';
		if($method === false) {
			return admin_url('admin.php?page=sched-schedule-timetables&sched-tab=edit-timetable&id='.$_GET['id'].$notification);
		}
		return admin_url('admin.php?page=sched-schedule-timetables&sched-tab=edit-timetable&id='.$_GET['id'].'&'.$method.$notification);
	}

	function update_meta() {
		global $wpdb;
		$table_name = SCHED_DB::$table_meta_fields;
		$meta_field_ids = $_POST['meta_edit_order'];
		$meta_field_ids_array = explode(',', $meta_field_ids);
		if($meta_field_ids == '') {
			$meta_field_ids_array = array();
		}
		for($i = 0; $i < count($meta_field_ids_array); $i++) {
			$meta_field_id = $meta_field_ids_array[$i];
			$id = 'meta_edit_'.$meta_field_id;
			$wpdb->update($table_name, array(
				'enabled'			=> 1,
				'icon_enabled'		=> (int)$_POST[$id.'_icon_enabled'],
				'title'				=> sanitize_text_field(SCHED_DB::handle_quotes($_POST[$id.'_title'])),
				'icon'				=> sanitize_text_field(SCHED_DB::handle_quotes($_POST[$id.'_icon'])),
			),
				array('id' => $meta_field_id)
			);
		}

		$table_name = SCHED_DB::$table_schedules;
		$success = $wpdb->update($table_name, array(
			'meta_field_ids'		=> $meta_field_ids,
		),
			array('id' => $this->schedule->options['id'])
		);

		if($success === false) {
			$this->notification = 'An error occured while updating the custom field.';
		}else {
			$this->notification = 'The changes have been saved.';
		}		
		wp_redirect($this->method());
		exit();
	}

	function create_meta() {
		global $wpdb;
		$table_name = SCHED_DB::$table_meta_fields;

		$success = $wpdb->insert($table_name, array(
			'schedule_id'		=> $this->schedule->options['id'],
			'enabled'			=> 1,
			'icon_enabled'		=> $_POST['meta_field_create_icon_enabled'],
			'title'				=> sanitize_text_field(SCHED_DB::handle_quotes($_POST['meta_field_create_title'])),
			'icon'				=> SCHED_DB::handle_quotes($_POST['meta_field_create_icon']),
		));

		if(!$success) {
			die('Could not create custom field');
		}

		$meta_field_ids = $this->schedule->options['meta_field_ids'];
		if($meta_field_ids == '') {
			$meta_field_ids = $wpdb->insert_id;
		}else {
			$meta_field_ids .= ','.$wpdb->insert_id;
		}

		$table_name = SCHED_DB::$table_schedules;
		$success = $wpdb->update($table_name, array(
			'meta_field_ids'	=> $meta_field_ids
		),
			array('id' => $this->schedule->options['id'])
		);

		if($success === false) {
			$this->notification = 'An error occured while creating the custom field.';
		}else {
			$this->notification = 'The custom field has been created.';
		}		
		wp_redirect($this->method());
		exit();

	}

	function delete_meta() {
		global $wpdb;
		$meta_id = (int)$_GET['meta_id'];
		$table_name = SCHED_DB::$table_meta_fields;
		$success = $wpdb->query($wpdb->prepare("DELETE FROM `$table_name` WHERE id = %d", $meta_id));

		$table_name = SCHED_DB::$table_schedules;
		$meta_field_ids = $this->schedule->options['meta_field_ids'];

		$meta_field_ids_arr = explode(',', $meta_field_ids);

		if($meta_field_ids === $meta_id || count($meta_field_ids_arr) == 1) {
			$meta_field_ids = '';
		}else {
			for($i = 0; $i < count($meta_field_ids_arr); $i++) {
				if($meta_field_ids_arr[$i] == $meta_id) {
					unset($meta_field_ids_arr[$i]);
					break;
				}
			}
			$meta_field_ids = implode(',', $meta_field_ids_arr);
		}

		$table_name = SCHED_DB::$table_schedules;
		$success = $wpdb->update($table_name, array(
			'meta_field_ids'	=> $meta_field_ids
		),
			array('id' => $this->schedule->options['id'])
		);

		if($success === false) {
			$this->notification = 'An error occured while deleting the custom field.';
		}else {
			$this->notification = 'The custom field has been deleted.';
		}		
		wp_redirect($this->method());
		exit();
	}

	function create_filter() {
		global $wpdb;
		$table_name = SCHED_DB::$table_filters;

		$success = $wpdb->insert($table_name, array(
			'schedule_id'				=> $this->schedule->options['id'],
			'label'						=> SCHED_DB::handle_quotes($_POST['filter_0_label']),
			'source'					=> SCHED_DB::handle_quotes($_POST['filter_0_select_source']),
			'source_custom_field'		=> (isset($_POST['filter_0_select_source_custom_field'])) ? SCHED_DB::handle_quotes($_POST['filter_0_select_source_custom_field']) : '0',
			'source_custom_field_line'	=> SCHED_DB::handle_quotes($_POST['filter_0_select_source_custom_field_line']),
			'method'					=> SCHED_DB::handle_quotes($_POST['filter_0_select_method']),
			'matches'					=> SCHED_DB::handle_quotes($_POST['filter_0_select_matches']),
		));

		if($success === false) {
			die('Could not create filter');
		}

		$filter_ids = $this->schedule->options['filter_ids'];
		if($filter_ids == '') {
			$filter_ids = $wpdb->insert_id;
		}else {
			$filter_ids .= ','.$wpdb->insert_id;
		}

		$table_name = SCHED_DB::$table_schedules;
		$success = $wpdb->update($table_name, array(
			'filter_ids'	=> $filter_ids
		),
			array('id' => $this->schedule->options['id'])
		);

		if($success === false) {
			$this->notification = 'An error occured while creating the filter.';
		}else {
			$this->notification = 'The filter has been created.';
		}		
		wp_redirect($this->method());
		exit();
	}

	function update_filter() {
		global $wpdb;
		$table_name = SCHED_DB::$table_filters;
		$filter_ids = SCHED_DB::handle_quotes($_POST['filter_edit_order']);
		$filter_ids_array = explode(',', $filter_ids);
		if($filter_ids == '') {
			$filter_ids_array = array();
		}
		for($i = 0; $i < count($filter_ids_array); $i++) {
			$filter_id = (int)$filter_ids_array[$i];

			$wpdb->update($table_name, array(
				'schedule_id'				=> $this->schedule->options['id'],
				'label'						=> SCHED_DB::handle_quotes($_POST['filter_'.$filter_id.'_label']),
				'source'					=> SCHED_DB::handle_quotes($_POST['filter_'.$filter_id.'_select_source']),
				'source_custom_field'		=> (isset($_POST['filter_'.$filter_id.'_select_source_custom_field'])) ? SCHED_DB::handle_quotes($_POST['filter_'.$filter_id.'_select_source_custom_field']) : '0',
				'source_custom_field_line'	=> SCHED_DB::handle_quotes($_POST['filter_'.$filter_id.'_select_source_custom_field_line']),
				'method'					=> SCHED_DB::handle_quotes($_POST['filter_'.$filter_id.'_select_method']),
				'matches'					=> SCHED_DB::handle_quotes($_POST['filter_'.$filter_id.'_select_matches']),
			),
				array('id' => $filter_id)
			);
		}

		$table_name = SCHED_DB::$table_schedules;
		$success = $wpdb->update($table_name, array(
			'filter_ids'	=> $filter_ids
		),
			array('id' => $this->schedule->options['id'])
		);

		if($success === false) {
			$this->notification = 'An error occured while updating the filters.';
		}else {
			$this->notification = 'The filters have been updated.';
		}		
		wp_redirect($this->method());
		exit();

	}

	function delete_filter() {
		wp_redirect($this->method());
		exit();
	}

	function update_schedule() {
		global $wpdb;
		$table_name = SCHED_DB::$table_schedules;
		$start = SCHED_HTML::time_to_array($_POST['start']);
		$end = SCHED_HTML::time_to_array($_POST['end']);

		$scale_height = (int)SCHED_DB::handle_quotes($_POST['scale_height']);
		if($scale_height < 15) {
			$scale_height = 15;
		}
		$success = $wpdb->update($table_name, array(
			'name'				=> sanitize_title(SCHED_DB::handle_quotes($_POST['name'])),
			'title'				=> sanitize_text_field(SCHED_DB::handle_quotes($_POST['title'])),
			'start_hour'		=> $start[0],
			'start_minute'		=> $start[1],
			'end_hour'			=> $end[0],
			'end_minute'		=> $end[1],
			'length'			=> SCHED_HTML::length($start, $end),
			'styling'			=> SCHED_DB::handle_quotes($_POST['styling']), // event, column, schedule
			'scale'				=> (int)SCHED_DB::handle_quotes($_POST['scale']),
			'scale_height'		=> $scale_height,
			'event_color'		=> SCHED_DB::handle_quotes($_POST['event_color']),
			'assign_dates_enabled'		=> (int)SCHED_DB::handle_quotes($_POST['assign_dates_enabled']),
			'assign_dates_start'		=> SCHED_DB::handle_quotes($_POST['assign_dates_start']),
		),
			array('id' => $this->schedule->options['id'])
		);

		if($success === false) {
			$this->notification = 'An error occured while updating the timetable.';
		}else {
			$this->notification = 'The changes have been saved.';
		}		
		wp_redirect($this->method());
		exit();
	}

	function update_column_order() {
		global $wpdb;
		$order = json_decode(SCHED_DB::handle_quotes($_GET['order']));
		$table_name = SCHED_DB::$table_schedules;
		$success = $wpdb->update($table_name, array(
			'columns' => implode(',', $order),
		),
			array('id' => $this->schedule->options['id'])
		);
		if($success === false) {
			$this->notification = 'An error occured while updating the column order.';
		}
		//wp_redirect(admin_url('admin-ajax.php?action=sched_editor&id='.$this->schedule->options['id']));
		echo 'success';
		exit();
		// $order = 
	}

	function edit_event() {
		$this->output_schedule = false;
		$event = SCHED_DB::get_event((int)$_GET['event_id'], true, true);
		include SCHED_DIR.'/lib/views/editor/form_edit_event.php';
	}

	function duplicate_event() {
		$this->output_schedule = false;
		$table_name = SCHED_DB::$table_events;
		$event_id = (int)$_GET['event_id'];

		//duplicate event
		global $wpdb;

// 		CREATE TEMPORARY TABLE sched_tmp SELECT * FROM wp_sched_events WHERE id = 283;

// UPDATE sched_tmp SET id=290 WHERE id = 283;

// INSERT INTO wp_sched_events SELECT * FROM sched_tmp WHERE id = 290;

		$last = $wpdb->get_row("SHOW TABLE STATUS LIKE '".$table_name."'");
		$new_id = (int)$last->Auto_increment;

		$table_name = SCHED_DB::$table_events;

		$wpdb->query("CREATE TEMPORARY TABLE sched_tmp SELECT * FROM $table_name WHERE id = $event_id;");
		$wpdb->query("UPDATE sched_tmp SET id=$new_id,timeslots='' WHERE id = $event_id;");
		$wpdb->query("INSERT INTO $table_name SELECT * FROM sched_tmp WHERE id = $new_id;");

		$event = SCHED_DB::get_event($new_id, true, true);
		include SCHED_DIR.'/lib/views/editor/form_edit_event.php';
	}

	function edit_column() {
		$this->output_schedule = false;
		$column = false;
		foreach($this->schedule->options['columns'] as $column_db) {
			if($column_db['id'] == (int)$_GET['column_id']) {
				$column = $column_db;
				break;
			}
		}
		include SCHED_DIR.'/lib/views/editor/form_edit_column.php';
	}

	function create_schedule() {

	}

	function duplicate_schedule() {
		$schedule_id = (int)$_GET['id'];
		SCHED_Export::duplicate($schedule_id);
	}

	function create_column() {
		global $wpdb;
		$table_name = SCHED_DB::$table_columns;
		$success = $wpdb->insert($table_name, array(
			'schedule_id'				=> $this->schedule->options['id'],
			'title'						=> SCHED_DB::handle_quotes($_POST['column_create_title']),
			'description'				=> sanitize_text_field(SCHED_DB::handle_quotes($_POST['column_create_description'])),
			'color'						=> SCHED_DB::handle_quotes($_POST['column_create_color']),
			'custom_class'				=> SCHED_DB::handle_quotes($_POST['column_create_custom_class']),
		));

		$column_ids = $this->schedule->options['column_ids'];
		if($column_ids == '') {
			$column_ids = $wpdb->insert_id;
		}else {
			$column_ids .= ','.$wpdb->insert_id;
		}

		$table_name = SCHED_DB::$table_schedules;
		$success = $wpdb->update($table_name, array(
			'columns'	=> $column_ids
		),
			array('id' => $this->schedule->options['id'])
		);

		if($success === false) {
			$this->notification = 'An error occured while creating the column.';
		}else {
			$this->notification = 'The column has been created.';
		}		
		wp_redirect($this->method());
		exit();
	}

	function create_event() {
		global $wpdb;
		$table_name = SCHED_DB::$table_events;
		$start = SCHED_HTML::time_to_array($_POST['event_create_start']);
		$end = SCHED_HTML::time_to_array($_POST['event_create_end']);

		$meta_field_values = array();
		foreach($this->schedule->options['meta_fields'] as $i => $meta_field) {
			// if($meta_field['enabled'] == 0) {
			// 	continue;
			// }			
			$key = 'meta_create_event_'.$meta_field['id'];
			if(!isset($_POST[$key.'_enable'])) {
				continue;
			}
			$meta_field_values[$meta_field['id']] = array(
				'enabled' => (int)$_POST[$key.'_enable'],
				'line_1' => SCHED_DB::handle_quotes($_POST[$key.'_line_1']),
				'line_2' => SCHED_DB::handle_quotes($_POST[$key.'_line_2']),
			);
		}

		$timeslot_fields = array();
		foreach(SCHED_DB::$event_timeslot_ignore_fields as $i => $field_name) {
			if(isset($_POST['event_editable_fields_'.$field_name]) && $_POST['event_editable_fields_'.$field_name] == 1) {
				$timeslot_fields[$field_name] = 0; // Means it will be editable, checkbox in editor enabled
			}else {
				$timeslot_fields[$field_name] = 1; // Means it will be the same as the parent, checkbox in editor disabled
			}
		}



		$timeslot_fields['onclick_link'] = $timeslot_fields['onclick'];
		$timeslot_fields['onclick_link_new_page'] = $timeslot_fields['onclick'];
		$timeslot_fields['media_image'] = $timeslot_fields['media_type'];
		$timeslot_fields['media_youtube'] = $timeslot_fields['media_type'];
		$timeslot_fields['background_image_url'] = $timeslot_fields['background_type'];
		$timeslot_fields['background_image_darken'] = $timeslot_fields['background_type'];
		// dd($_POST);
		$success = $wpdb->insert($table_name, array(
			'schedule_id'				=> $this->schedule->options['id'],
			'column_id'					=> (int)$_POST['event_create_column'],
			'title'						=> sanitize_text_field(SCHED_DB::handle_quotes($_POST['event_create_title'])),
			'start_hour'				=> $start[0],
			'start_minute'				=> $start[1],
			'end_hour'					=> $end[0],
			'end_minute'				=> $end[1],
			'length'					=> SCHED_HTML::length($start, $end),
			'timeslot_parent_id'		=> 0,
			'timeslots'					=> '',
			'size'						=> (int)$_POST['event_create_size'],
			'timeslot_fields_method'	=> (int)$_POST['event_create_editable_fields'],
			'timeslot_fields'			=> serialize($timeslot_fields),
			'color'						=> SCHED_DB::handle_quotes($_POST['event_create_color']),
			'onclick'					=> SCHED_DB::handle_quotes($_POST['event_create_onclick']),
			'onclick_link'				=> SCHED_DB::handle_quotes($_POST['event_create_onclick_link']),
			'onclick_link_new_page'		=> (int)$_POST['event_create_onclick_link_new_page'],
			'media_type'				=> SCHED_DB::handle_quotes($_POST['event_create_media_type']),
			'media_image'				=> SCHED_DB::image_post_to_array('event_create_media_image'),
			'media_youtube'				=> SCHED_DB::handle_quotes($_POST['event_create_media_youtube']),
			'meta_fields'				=> serialize($meta_field_values),
			'custom_class'				=> SCHED_DB::handle_quotes($_POST['event_create_custom_class']),
			'description'				=> SCHED_DB::handle_quotes($_POST['event_create_description']),
			'description_inline'		=> SCHED_DB::handle_quotes($_POST['event_create_description_inline']),
			'background_type'			=> SCHED_DB::handle_quotes($_POST['event_create_background_type']),
			'background_image_url'		=> SCHED_DB::image_post_to_array('event_create_background_image_url'),
			'background_image_darken'	=> (int)$_POST['event_create_background_image_darken'],
		));

		$event_id = $wpdb->insert_id;

		// If there are time slots
		if(isset($_POST['event_create_timeslot_column'])) {
			$timeslot_ids = array();
			for($i = 0; $i < count($_POST['event_create_timeslot_column']); $i++) {
				$timeslot = array(
					'column' => $_POST['event_create_timeslot_column'][$i],
					'start' => SCHED_HTML::time_to_array($_POST['event_create_timeslot_start'][$i]),
					'end' => SCHED_HTML::time_to_array($_POST['event_create_timeslot_end'][$i]),
					'title' => sanitize_text_field(SCHED_DB::handle_quotes($_POST['event_create_title']))
				);
				$timeslot_id = SCHED_DB::create_timeslot($this->schedule->options['id'], $event_id, $timeslot);
				$timeslot_ids[] = $timeslot_id;
			}
			$success = $wpdb->update($table_name, array(
				'timeslots' => implode(',', $timeslot_ids),
			), 
				array('id' => $event_id)
			);
		}

		if($success === false) {
			$this->notification = 'An error occured while creating the event.';
		}else {
			$this->notification = 'The event has been created.';
		}		
		wp_redirect($this->method());
		exit();
	}

	function update_column() {
		global $wpdb;
		$table_name = SCHED_DB::$table_columns;
		$success = $wpdb->update($table_name, array(
			'title'						=> SCHED_DB::handle_quotes($_POST['column_edit_title']),
			'description'				=> sanitize_text_field(SCHED_DB::handle_quotes($_POST['column_edit_description'])),
			'color'						=> SCHED_DB::handle_quotes($_POST['column_edit_color']),
			'custom_class'				=> SCHED_DB::handle_quotes($_POST['column_edit_custom_class']),
		), 
			array('id' => (int)$_GET['column_id'])
		);

		if($success === false) {
			$this->notification = 'An error occured while updating the column.';
		}else {
			$this->notification = 'The column has been updated.';
		}		
		wp_redirect($this->method());
		exit();
	}

	function update_event() {
		global $wpdb;
		$table_name = SCHED_DB::$table_events;
		$start = SCHED_HTML::time_to_array($_POST['event_edit_start']);
		$end = SCHED_HTML::time_to_array($_POST['event_edit_end']);
		$event_id = (int)$_GET['event_id'];

		$meta_field_values = array();
		foreach($this->schedule->options['meta_fields'] as $i => $meta_field) {
			if($meta_field['enabled'] == 0) {
				continue;
			}
			$key = 'meta_edit_event_'.$meta_field['id'];
			if(!isset($_POST[$key.'_enable'])) {
				continue;
			}
			$meta_field_values[$meta_field['id']] = array(
				'enabled' => (int)$_POST[$key.'_enable'],
				'line_1' => SCHED_DB::handle_quotes($_POST[$key.'_line_1']),
				'line_2' => SCHED_DB::handle_quotes($_POST[$key.'_line_2']),
			);
		}

		$timeslot_fields = array();
		foreach(SCHED_DB::$event_timeslot_ignore_fields as $i => $field_name) {
			if(isset($_POST['event_editable_fields_'.$field_name]) && $_POST['event_editable_fields_'.$field_name] == 1) {
				$timeslot_fields[$field_name] = 0; // Means it will be editable, checkbox in editor enabled
			}else {
				$timeslot_fields[$field_name] = 1; // Means it will be the same as the parent, checkbox in editor disabled
			}
		}

		$timeslot_fields['onclick_link'] = $timeslot_fields['onclick'];
		$timeslot_fields['onclick_link_new_page'] = $timeslot_fields['onclick'];
		$timeslot_fields['media_image'] = $timeslot_fields['media_type'];
		$timeslot_fields['media_youtube'] = $timeslot_fields['media_type'];
		$timeslot_fields['background_image_url'] = $timeslot_fields['background_type'];
		$timeslot_fields['background_image_darken'] = $timeslot_fields['background_type'];
		//dd($timeslot_fields);
		// pd($_POST);

		$success = $wpdb->update($table_name, array(
			'schedule_id'				=> $this->schedule->options['id'],
			'column_id'					=> (int)$_POST['event_edit_column'],
			'title'						=> sanitize_text_field(SCHED_DB::handle_quotes($_POST['event_edit_title'])),
			'start_hour'				=> $start[0],
			'start_minute'				=> $start[1],
			'end_hour'					=> $end[0],
			'end_minute'				=> $end[1],
			'length'					=> SCHED_HTML::length($start, $end),
			'size'						=> (int)$_POST['event_edit_size'],
			'timeslot_fields_method'	=> (int)$_POST['event_edit_editable_fields'],
			'timeslot_fields'			=> serialize($timeslot_fields),
			'color'						=> SCHED_DB::handle_quotes($_POST['event_edit_color']),
			'onclick'					=> SCHED_DB::handle_quotes($_POST['event_edit_onclick']),
			'onclick_link'				=> SCHED_DB::handle_quotes($_POST['event_edit_onclick_link']),
			'onclick_link_new_page'		=> (int)$_POST['event_edit_onclick_link_new_page'],
			'media_type'				=> SCHED_DB::handle_quotes($_POST['event_edit_media_type']),
			'media_image'				=> SCHED_DB::image_post_to_array('event_edit_media_image'),
			'media_youtube'				=> SCHED_DB::handle_quotes($_POST['event_edit_media_youtube']),
			'meta_fields'				=> serialize($meta_field_values),
			'custom_class'				=> SCHED_DB::handle_quotes($_POST['event_edit_custom_class']),
			'description'				=> SCHED_DB::handle_quotes($_POST['event_edit_description']),
			'description_inline'		=> SCHED_DB::handle_quotes($_POST['event_edit_description_inline']),
			'background_type'			=> SCHED_DB::handle_quotes($_POST['event_edit_background_type']),
			'background_image_url'		=> SCHED_DB::image_post_to_array('event_edit_background_image_url'),
			'background_image_darken'	=> (int)$_POST['event_edit_background_image_darken'],
		), 
			array('id' => $event_id)
		);

		// If there are time slots
		if(isset($_POST['event_edit_timeslot_id'])) {
			$timeslot_ids = array();
			for($i = 0; $i < count($_POST['event_edit_timeslot_id']); $i++) {
				$id = (int)$_POST['event_edit_timeslot_id'][$i];

				if(!isset($_POST['event_edit_timeslot_column'][$i])) {
					$_POST['event_edit_timeslot_column'][$i] = (int)$_POST['event_edit_column'];
				}

				$timeslot = array(
					'column' => $_POST['event_edit_timeslot_column'][$i],
					'start' => SCHED_HTML::time_to_array($_POST['event_edit_timeslot_start'][$i]),
					'end' => SCHED_HTML::time_to_array($_POST['event_edit_timeslot_end'][$i]),
					'title' =>sanitize_text_field(SCHED_DB::handle_quotes($_POST['event_edit_title'])),
				);

				// If the timeslot is existing
				if($id !== 0) {
					$timeslot_ids[] = $id;
					SCHED_DB::update_timeslot($id, $timeslot);
				}else {
					$timeslot_id = SCHED_DB::create_timeslot($this->schedule->options['id'], $event_id, $timeslot);
					$timeslot_ids[] = $timeslot_id;
				}
			}
			$wpdb->update($table_name, array(
				'timeslots' => implode(',', $timeslot_ids),
			), 
				array('id' => $event_id)
			);
		}

		if($success === false) {
			$this->notification = 'An error occured while updating the event or you did not make any changes.';
		}else {
			$this->notification = 'The event has been updated.';
		}		
		wp_redirect($this->method());
		exit();
	}

	function update_event_tooltip() {
		global $wpdb;
		$table_name = SCHED_DB::$table_events;
		$event_id = (int)$_GET['event_id'];
		$column = (int)$_GET['column'];
		$title = SCHED_DB::handle_quotes($_GET['title']);
		$color = SCHED_DB::handle_quotes($_GET['color']);
		$start = SCHED_HTML::time_to_array($_GET['start']);
		$end = SCHED_HTML::time_to_array($_GET['end']);

		$success = $wpdb->update($table_name, array(
			'schedule_id'				=> $this->schedule->options['id'],
			'column_id'					=> $column,
			'title'						=> $title,
			'color'						=> $color,
			'start_hour'				=> $start[0],
			'start_minute'				=> $start[1],
			'end_hour'					=> $end[0],
			'end_minute'				=> $end[1],
			'length'					=> SCHED_HTML::length($start, $end),
		), 
			array('id' => $event_id)
		);

		$event = SCHED_DB::get_event($event_id, false, true);

		echo json_encode(array(
			'success' => '1',
			'height' => $this->schedule->calculate_event_length($event),
			'top' => $this->schedule->calculate_event_start($event),
			'title' => esc_html($event['title']),
			'column' => $event['column_id'],
			'event_id' => $event['id'],
			'color' => $color,
			'time_string' => SCHED_HTML::time($event['start']).' - '.SCHED_HTML::time($event['end']),
		));
		exit();
	}

	function delete_schedule() {
		global $wpdb;
		$table_name = SCHED_DB::$table_schedules;
		$success = $wpdb->query($wpdb->prepare("DELETE FROM `$table_name` WHERE id = %d", $this->schedule->options['id']));

		$table_name = SCHED_DB::$table_columns;
		$success = $wpdb->query($wpdb->prepare("DELETE FROM `$table_name` WHERE schedule_id = %d", $this->schedule->options['id']));

		$table_name = SCHED_DB::$table_events;
		$success = $wpdb->query($wpdb->prepare("DELETE FROM `$table_name` WHERE schedule_id = %d", $this->schedule->options['id']));

		$table_name = SCHED_DB::$table_filters;
		$success = $wpdb->query($wpdb->prepare("DELETE FROM `$table_name` WHERE schedule_id = %d", $this->schedule->options['id']));

		$table_name = SCHED_DB::$table_meta_fields;
		$success = $wpdb->query($wpdb->prepare("DELETE FROM `$table_name` WHERE schedule_id = %d", $this->schedule->options['id']));

		$this->notification = 'The timetable has been deleted.';
		wp_redirect(admin_url('admin.php?page=sched-schedule-timetables&sched-tab=timetables&notification=Timetable+removed'));
		exit();
	}

	function delete_column() {
		global $wpdb;
		$column_id = (int)$_GET['column_id'];
		$table_name = SCHED_DB::$table_columns;
		$success = $wpdb->query($wpdb->prepare("DELETE FROM `$table_name` WHERE id = %d", $column_id));

		$table_name = SCHED_DB::$table_events;
		$success = $wpdb->query($wpdb->prepare("DELETE FROM `$table_name` WHERE column_id = %d", $column_id));

		$table_name = SCHED_DB::$table_schedules;
		$column_ids = $this->schedule->options['column_ids'];

		$column_ids_arr = explode(',', $column_ids);

		if($column_ids === $column_id || count($column_ids_arr) == 1) {
			$column_ids = '';
		}else {
			for($i = 0; $i < count($column_ids_arr); $i++) {
				if($column_ids_arr[$i] == $column_id) {
					unset($column_ids_arr[$i]);
					break;
				}
			}
			$column_ids = implode(',', $column_ids_arr);
		}

		$table_name = SCHED_DB::$table_schedules;
		$success = $wpdb->update($table_name, array(
			'columns'	=> $column_ids
		),
			array('id' => $this->schedule->options['id'])
		);

		if($success === false) {
			$this->notification = 'An error occured while deleting the column.';
		}else {
			$this->notification = 'The column has been deleted.';
		}
		wp_redirect($this->method());
		exit();
	}

	function delete_event() {
		global $wpdb;
		$table_name = SCHED_DB::$table_events;
		
		$event_id = (int)$_GET['event_id'];
		$event = SCHED_DB::get_event($event_id);

		// If it's a timeslot, remove it from the parent
		if($event['timeslot_parent_id'] !== 0) {
			$parent = SCHED_DB::get_event($event['timeslot_parent_id']);
			if(($key = array_search($event_id, $parent['timeslots'])) !== false) {
				unset($parent['timeslots'][$key]);
			}

			$success = $wpdb->update($table_name, array(
				'timeslots' => implode(',', $parent['timeslots']),
			), array(
				'id' => (int)$parent['id']
			));
			if($success === false) {
				wp_die('An error occured while removing the timeslot from the parent');
			}
		}

		// If it has timeslots, remove the timeslots
		if(count($event['timeslots']) !== 0) {
			// dd($event['timeslots']);
			$timeslots = implode(',', $event['timeslots']);
			$success = $wpdb->query("DELETE FROM `$table_name` WHERE id IN ($timeslots)");
			if($success === false) {
				wp_die('An error occured while removing the timeslots of this event');
			}
		}

		// Next, just delete this event
		
		$success = $wpdb->query($wpdb->prepare("DELETE FROM `$table_name` WHERE id = %d",$event_id));

		if($success === false) {
			$this->notification = 'An error occured while deleting the event.';
		}else {
			$this->notification = 'The event has been deleted.';
		}		
		wp_redirect($this->method());
		exit();
	}

	function remove_timeslot() {
		global $wpdb;
		$table_name = SCHED_DB::$table_events;

		$event_id = (int)$_GET['timeslot_id'];
		$event = SCHED_DB::get_event($event_id);

		// If it's a timeslot, remove it from the parent
		if($event['timeslot_parent_id'] !== 0) {
			$parent = SCHED_DB::get_event($event['timeslot_parent_id']);
			if(($key = array_search($event_id, $parent['timeslots'])) !== false) {
				unset($parent['timeslots'][$key]);
			}

			$success = $wpdb->update($table_name, array(
				'timeslots' => implode(',', $parent['timeslots']),
			), array(
				'id' => (int)$parent['id']
			));
			if($success === false) {
				wp_die('An error occured while removing the timeslot from the parent.');
			}
		}

		$success = $wpdb->query($wpdb->prepare("DELETE FROM `$table_name` WHERE id = %d",$event_id));
		if($success === false) {
			echo 'error';
		}else {
			echo 'success';
		}
		exit();
	}

	function update_last_edit() {
		global $wpdb;
		$table_name = SCHED_DB::$table_schedules;
		$wpdb->update($table_name, array(
			'edited_at' => date('Y-m-d H:i:s'),
		),
			array('id' => $this->schedule->options['id'])
		);
	}

	function e_js($link) {
		echo '<script type="text/javascript" src="'.plugins_url($link, SCHED_FILE ).'"></script>';
	}

	function e_css($link) {
		echo '<link rel="stylesheet" type="text/css" href="'.plugins_url($link, SCHED_FILE ).'" />';
	}

	function e_meta_fields_create_event() {
		foreach($this->schedule->options['meta_fields'] as $i => $meta_field) {
			if($meta_field['enabled'] == 0) {
				continue;
			}

			$id = 'meta_create_event_'.$meta_field['id'];

			$event_meta_enabled = false;
			$event_meta_line_1 = '{custom_field_title}';
			$event_meta_line_2 = '';

			$enabled = $meta_field['enabled'];
			$icon_enabled = $meta_field['icon_enabled'];
			$title = $meta_field['title'];
			$icon = $meta_field['icon'];
			include SCHED_DIR.'/lib/views/editor/form_meta_field_fill.php';
		}
	}


}