<?php

/**
 * 
 * DB
 *
 * @version 1.3
 * @author  Rik de Vos
 */
class SCHED_SCHEDULE {

	public $options = array();

	public $db_options = array();

	public $editor = false;

	public $html = '';

	public $id = 'sched-schedule-';

	public $id_list = false;

	public $pdf = false;

	public $selector = '';

	public $layout = 'default';

	public $shortcode_columns = false;

	public $shortcode_filters = false;

	function __construct() {
		
	}

	function load($id, $db_options = false) {
		$this->options = SCHED_DB::get_table($id);
		$this->id .= $this->options['id'].'-'.mt_rand();
		$this->id_list = $this->id.'-list';
		$this->selector = '#'.$this->id;
		$this->db_options = SCHED_DB::$options;
	}

	function set_db_options($db_options) {
		$this->db_options = $db_options;
	}

	function set_shortcode_columns($columns) {
		if($columns == 0 || $columns == '') {
			return;
		}
		//dd($columns);
		$this->shortcode_columns = explode(',', str_replace(' ', '', $columns));

		foreach($this->options['columns'] as $column_key => $column) {
			if(!in_array($column['id'], $this->shortcode_columns)) {
				unset($this->options['columns'][$column_key]);
			}
		}

	}

	function set_shortcode_filters($filters) {
		if($filters == 0 || $filters == '') {
			return;
		}
		//dd($filters);
		$this->shortcode_filters = explode(',', str_replace(' ', '', $filters));
	}

	function set_accepted_date($date) {

		foreach($this->options['columns'] as $column_key => $column) {
			if($date !== $column['datetime']->format('Y-m-d')) {
				unset($this->options['columns'][$column_key]);
			}
		}

		return count($this->options['columns']);

	}

	function set_upcoming() {
		
		
		if($this->get('upcoming_type') == 'current_datetime') {
			// do nothing
			$date = new DateTime();
		}else if($this->get('upcoming_type') == 'current_date') {
			$date = new DateTime();
			$date->setTime(0, 0);
		}else if($this->get('upcoming_type') == 'custom') {
			$date = new DateTime($this->get('upcoming_custom'));
		}


		$total_i = 0;
		foreach($this->options['columns'] as $column_key => $column) {

			$events = $column['events'];
			$this->options['columns'][$column_key]['events'] = array();

			foreach($events as $event) {
				if($total_i < $this->get('upcoming_limit') && $date <= $event['datetime']['start']) {
					$this->options['columns'][$column_key]['events'][] = $event;
					$total_i++;
				}
			}

		}
		return $total_i;
	}

	function set_layout($layout) {
		$this->layout = $layout;
	}

	function render() {
		ob_start();
		if(!$this->pdf) {
			include SCHED_DIR.'/lib/views/schedule.php';
		}
		$html = ob_get_contents();
		ob_end_clean();
		$html .= $this->render_list();
		return $html;
	}

	function render_horizontal() {
		ob_start();
		include SCHED_H_DIR.'/lib/views/schedule.horizontal.php';
		$html = ob_get_contents();
		ob_end_clean();
		$html .= $this->render_list();
		return $html;
	}

	function render_list() {
		ob_start();
		include SCHED_DIR.'/lib/views/schedule.list/schedule.list.php';
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}

	function render_upcoming() {
		$max = 5;

		$date = new DateTime();

		$amount = $this->set_upcoming();

		ob_start();
		include SCHED_DIR.'/lib/views/schedule.php';
		include SCHED_DIR.'/lib/views/schedule.upcoming/schedule.upcoming.php';
		$html = ob_get_contents();
		ob_end_clean();
		return $html;


		ob_start();
		// include SCHED_DIR.'/lib/views/schedule.list/schedule.list.php';
		include SCHED_DIR.'/lib/views/schedule.upcoming/schedule.upcoming.php';
		echo '<div style="display: none">';
		include SCHED_DIR.'/lib/views/schedule.php';
		echo '</div>';
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}

	function render_style() {

		//include SCHED_DIR.'/lib/views/schedule.style.php';
		//$id = 'sched-schedule-'.$this->options['id'].'-';
	}

	function render_horizontal_bar() {
		
		if($this->options['scale'] == 1) {
			// $time = array($this->options['start'][0], $this->options['start'][1]);
			$length = $this->count_blocks();
			for($i = 0; $i < $length; $i++) {
				$time = array($this->options['start'][0]+$i, 0);
				if(SCHED_DB::get('am_pm') == true) {
					echo '<div class="sched-h-content-scroll-time-value" data-i="'.$i.'" style="left: '.($i*100).'px;">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
					// echo '<div class="sched-time-value" style="padding-bottom: '.($this->options['scale_height']-14).'px">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
				}else {
					echo '<div class="sched-h-content-scroll-time-value" data-i="'.$i.'" style="left: '.($i*100).'px;">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
					// echo '<div class="sched-time-value" style="padding-bottom: '.($this->options['scale_height']-14).'px">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
				}
				// $time[1] += 30;
				// if($time[1] >= 60) {
				// 	$time[1] -= 60;
				// 	$time[0] += 1;
				// }
				
			}
		}elseif($this->options['scale'] == 2) {
			$length = $this->count_blocks();
			$time = array($this->options['start'][0], $this->options['start'][1]);
			for($i = 0; $i < $length; $i++) {
				if(SCHED_DB::get('am_pm') == true) {
					echo '<div class="sched-h-content-scroll-time-value" data-i="'.$i.'" style="left: '.($i*100).'px;">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
					// echo '<div class="sched-time-value" style="padding-bottom: '.($this->options['scale_height']-14).'px">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
				}else {
					echo '<div class="sched-h-content-scroll-time-value" data-i="'.$i.'" style="left: '.($i*100).'px;">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
					// echo '<div class="sched-time-value" style="padding-bottom: '.($this->options['scale_height']-14).'px">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
				}
				$time[1] += 30;
				if($time[1] >= 60) {
					$time[1] -= 60;
					$time[0] += 1;
				}
				
			}

		}elseif($this->options['scale'] == 3) {
			$length = $this->count_blocks();
			$time = array($this->options['start'][0], $this->options['start'][1]);
			for($i = 0; $i < $length; $i++) {
				if(SCHED_DB::get('am_pm') == true) {
					echo '<div class="sched-h-content-scroll-time-value" data-i="'.$i.'" style="left: '.($i*100).'px;">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
					// echo '<div class="sched-time-value" style="padding-bottom: '.($this->options['scale_height']-14).'px">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
				}else {
					echo '<div class="sched-h-content-scroll-time-value" data-i="'.$i.'" style="left: '.($i*100).'px;">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
					// echo '<div class="sched-time-value" style="padding-bottom: '.($this->options['scale_height']-14).'px">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
				}
				$time[1] += 10;
				if($time[1] >= 60) {
					$time[1] -= 60;
					$time[0] += 1;
				}
				
			}
		}
	}

	function render_sidebar() {
		$length = $this->count_blocks();
		if($this->options['scale'] == 1) {
			for($i = 0; $i < $length+1; $i++) {
				$time = array($this->options['start'][0]+$i, 0);
				if(SCHED_DB::get('am_pm') == true) {
					echo '<div class="sched-time-value" style="padding-bottom: '.($this->options['scale_height']-14).'px">'.SCHED_HTML::time($time[0], $time[1], false).'</div>';
				}else {
					echo '<div class="sched-time-value" style="padding-bottom: '.($this->options['scale_height']-14).'px">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
				}
				
			}
		}else if($this->options['scale'] == 2) {
			$time = array($this->options['start'][0], $this->options['start'][1]);
			for($i = 0; $i < $length+1; $i++) {
				if(SCHED_DB::get('am_pm') == true) {
					echo '<div class="sched-time-value" style="padding-bottom: '.($this->options['scale_height']-14).'px">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
				}else {
					echo '<div class="sched-time-value" style="padding-bottom: '.($this->options['scale_height']-14).'px">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
				}
				$time[1] += 30;
				if($time[1] >= 60) {
					$time[1] -= 60;
					$time[0] += 1;
				}
				
			}
		}else if($this->options['scale'] == 3) {
			$time = array($this->options['start'][0], $this->options['start'][1]);
			for($i = 0; $i < $length+1; $i++) {
				if(SCHED_DB::get('am_pm') == true) {
					echo '<div class="sched-time-value" style="padding-bottom: '.($this->options['scale_height']-14).'px">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
				}else {
					echo '<div class="sched-time-value" style="padding-bottom: '.($this->options['scale_height']-14).'px">'.SCHED_HTML::time($time[0], $time[1]).'</div>';
				}
				$time[1] += 10;
				if($time[1] >= 60) {
					$time[1] -= 60;
					$time[0] += 1;
				}
				
			}
		}
		
	}

	function render_column_bg() {
		$length = $this->count_blocks();
		//if(!$this->editor) {
			for($i = 0; $i < $length; $i++) {
				echo '<div class="sched-column-bg-block" style="height: '.($this->options['scale_height']-1).'px"></div>';
			}
		//}else {
		//	for($i = 0; $i < $length; $i++) {
		//		echo '<div class="sched-column-bg-block" style="height: '.($this->options['scale_height']-1).'px"><div class="sched-column-bg-block-button" data-index="'.($i*2).'"></div><div class="sched-column-bg-block-button sched-column-bg-block-button-even" data-index="'.($i*2+1).'"></div></div>';
		//	}
		//}
	}

	function calculate_event_start_horizontal($event, $scale_height = false) {
		return $this->calculate_event_start($event, $scale_height)*2;
	}

	function calculate_event_length_horizontal($event, $scale_height = false) {
		if(!$scale_height) {
			$scale_height = $this->options['scale_height'];
		}
		if($this->options['scale'] == 1) {
			return $event['length']/60*$scale_height*2;
		}else if($this->options['scale'] == 2) {
			return $event['length']/30*$scale_height*2;
		}else if($this->options['scale'] == 3) {
			return $event['length']/10*$scale_height*2;
		}
	}

	function calculate_event_start($event, $scale_height = false) {
		if(!$scale_height) {
			$scale_height = $this->options['scale_height'];
		}
		
		$schedule_start = $this->options['start'];

		$schedule_start = $this->options['start'][0] + $this->options['start'][1]/60;
		$event_start = $event['start'][0] + $event['start'][1]/60;

		$duration = $event_start - $schedule_start;

		if($duration < 0) {
			$duration += 24;
		}

		if($this->options['scale'] == 1) {
			return $duration * $scale_height;
		}else if($this->options['scale'] == 2) {
			return $duration * $scale_height * 2;
		}else if($this->options['scale'] == 3) {
			return $duration * $scale_height * 6;
		}

	}

	function calculate_event_length($event, $scale_height = false) {
		if(!$scale_height) {
			$scale_height = $this->options['scale_height'];
		}
		if($this->options['scale'] == 1) {
			return $event['length']/60*$scale_height-1;
		}else if($this->options['scale'] == 2) {
			return $event['length']/30*$scale_height-1;
		}else if($this->options['scale'] == 3) {
			return $event['length']/10*$scale_height-1;
		}
	}

	function event_color($event, $location) {
		if($this->options['styling'] == 'event') {
			return $event['color'];
		}else if($this->options['styling'] == 'column') {
			return $location['color'];
		}else if($this->options['styling'] == 'schedule') {
			return $this->options['event_color'];
		}
	}

	function count_blocks() {
		if($this->options['scale'] == 1) {
			return $this->options['length']/60;
		}else if($this->options['scale'] == 2) {
			return $this->options['length']/30;
		}else if($this->options['scale'] == 3) {
			return $this->options['length']/10;
		}
	}

	function count_columns() {
		return count($this->options['columns']);
	}

	function sidebar_margins() {
		$sidebar_left_width = 0;
		$sidebar_right_width = 0;

		if($this->get('sidebar_position') == 'left' || $this->get('sidebar_position') == 'both') {
			$sidebar_left_width = $this->get('sidebar_width');
		}
		if($this->get('sidebar_position') == 'right' || $this->get('sidebar_position') == 'both') {
			$sidebar_right_width = $this->get('sidebar_width');
		}

		return 'margin-left: '.$sidebar_left_width.'px; margin-right: '.$sidebar_right_width.'px;';
	}

	function tooltip_background($event, $column) {
		return ($this->get('event_tooltip_color_type') == 'event') ? $this->event_color($event, $column) : $this->get('event_tooltip_color_bg');;
	}

	function tooltip_color($event, $column) {
		return ($this->get('event_tooltip_color_type') == 'event') ? $this->get('event_box_text_color') : $this->get('event_tooltip_color_text');;
	}

	function media_link_attr($event) {
		if($event['media_type'] == 'image') {
			if($event['media_image'] === false) {
				return '';
			}else {
				return $event['media_image']['url'];
			}
			
		}elseif($event['media_type'] == 'youtube') {
			preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $event['media_youtube'], $matches);
			if(isset($matches[0])) {
				return $matches[0];
			}
		}
		return '';
	}

	function parse_meta_line($line, $event, $column, $meta_field) {
		// print_r($event);
		// dd($event);
		// die();
		// dd($event['title']);
		$line = str_replace('{column_title}', $column['title'], $line);
		$line = str_replace('{event_title}', $event['title'], $line);
		$line = str_replace('{meta_title}', $meta_field['title'], $line);
		$line = str_replace('{custom_field_title}', $meta_field['title'], $line);
		$line = str_replace('{start_time}', SCHED_HTML::time($event['start']), $line);
		$line = str_replace('{end_time}', SCHED_HTML::time($event['end']), $line);
		$line = str_replace('{time}', SCHED_HTML::time($event['start']).' - '.SCHED_HTML::time($event['end']), $line);

		//specials
		if(isset($event['datetime'])) {
			$line = str_replace('{date}', $event['datetime']['start']->format('F jS').' - '.$event['datetime']['end']->format('F jS'), $line);
			$line = str_replace('{start_date}', $event['datetime']['start']->format('F jS'), $line);
			$line = str_replace('{end_date}', $event['datetime']['end']->format('F jS'), $line);
		}
		
		return $line;
	}

	function get($name, $default = NULL) {
		return isset($this->db_options[$name]) ? $this->db_options[$name] : $default;
	}

}