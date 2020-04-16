<?php

/**
 * 
 * HTML Class
 *
 * @version 1.0
 * @author  Rik de Vos
 */
class SCHED_HTML {
	public static function checkbox($name, $checked, $toggle = '') {

		if(!empty($toggle)) {
			$toggle = ' data-toggle="'.$toggle.'"';
		}

		$checked = ($checked == 1) ? '1' : '0';

		//return '<a href="#" class="sched-checkbox" data-checked="'.($checked == 1 ? 'true' : 'false').'" data-id="'.$name.'"'.$toggle.'>'.($checked == 1 ? 'YES' : 'NO').'</a><input style="display: none;" type="checkbox" name="'.$name.'" id="'.$name.'"'.($checked == 1 ? ' checked="checked"' : '').' />';

		return '<a href="#" class="sched-checkbox" data-checked="'.$checked.'" data-id="'.$name.'"'.$toggle.'>'.($checked == 1 ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>').'</a><input style="display: none;" type="text" name="'.$name.'" id="'.$name.'" value="'.$checked.'" />';

	}

	public static function previous_colors() {
		//$colors = SCHED_DB::get('previous_colors');
		$colors = array();
		$html = '';
		foreach($colors as $color) {
			$html .= self::color($color);
		}
		return $html;
		// return '<a href="#" class="sched-meta-event-color" style="background: #872fe9" data-color="#872FE9"></a>
		// <a href="#" class="sched-meta-event-color" style="background: #977348" data-color="#977348"></a>
		// <a href="#" class="sched-meta-event-color" style="background: #eace77" data-color="#eace77"></a>
		// <a href="#" class="sched-meta-event-color" style="background: #1bbc9c" data-color="#1bbc9c"></a>';
	}

	public static function elem($tag, $attributes) {
		$html = '<'.$tag;
		foreach($attributes as $attr_name => $attr_value) {
			if($attr_value === '') {
				continue;
			}
			$html .= ' '.$attr_name.'="';
			if(is_array($attr_value)) {
				for($i = 0; $i < count($attr_value); $i++) {
					if($attr_value[$i] == '') {
						continue;
					}
					if($i-2 <= count($attr_value)) {
						$html .= ' '.esc_attr($attr_value[$i]);
					}else {
						$html .= esc_attr($attr_value[$i]);
					}
				}
			}else {
				$html .= esc_attr($attr_value);
			}
			$html .= '"';
		}
		$html .= '>';
		return $html;
	}

	// public static function color($color) {
	// 	return '<a href="#" class="sched-meta-event-color" style="background: '.$color.'" data-color="'.$color.'"></a>';
	// }

	public static function textbox($name, $value = "", $class = "", $placeholder = "") {
		return '<div class="sched-textbox"><input type="text" placeholder="'.esc_attr($placeholder).'" class="'.esc_attr($class).'" name="'.esc_attr($name).'" value="'.esc_attr($value).'" /></div>';
	}

	public static function timebox($name, $value = "", $class = "", $min = '00:00', $max = '23:55') {
		return '<div class="sched-timebox"><input type="text" class="'.esc_attr($class).' input-time" name="'.esc_attr($name).'" value="'.esc_attr($value).'" data-min="'.$min.'" data-max="'.$max.'" /></div>';
	}

	public static function textarea($name, $value = "", $class = "") {
		return '<div class="sched-textarea"><textarea name="'.esc_attr($name).'">'.esc_textarea($value).'</textarea></div>';
	}

	public static function percentage($name, $value = "", $class = "") {
		return '<div class="sched-number"><input type="number" min="0" max="100" step="5" class="'.esc_attr($class).'" name="'.esc_attr($name).'" value="'.esc_attr($value).'" /></div>';
	}

	public static function number($name, $value = "", $class = "", $min = 0, $max = 10000, $step = 1, $after = ' px') {
		return '<div class="sched-number"><input type="number" min="'.$min.'" max="'.$max.'" step="'.$step.'" class="'.esc_attr($class).'" name="'.esc_attr($name).'" value="'.esc_attr($value).'" /></div>'.$after;
	}

	public static function color($name, $color = "#000000") {
		$html = '<input type="text" class="sched-color-picker" name="'.esc_attr($name).'" value="'.esc_attr($color).'" />';
		return $html;
	}

	public static function radio($name, $options, $value) {
		$html = '';
		//$html = '<div class="sched-radio" style="display: inline-block;">';
		foreach($options as $i => $option) {
			$key = $option[0];
			$title = $option[1];
			$toggle = isset($option[2]) ? $option[2] : 'null';
			if($key == $value) {
				$html .= '<label style="margin: 4px 0; display: inline-block"><input class="sched-radio-input" type="radio" data-toggle="'.$toggle.'" name="'.$name.'" value="'.esc_attr($key).'" checked="checked" />'.$title.'</label>';
			}else {
				$html .= '<label style="margin: 4px 0; display: inline-block"><input class="sched-radio-input" type="radio" data-toggle="'.$toggle.'" name="'.$name.'" value="'.esc_attr($key).'" />'.$title.'</label>';
			}
			if($i !== count($options)-1) {
				$html .= '<br />';
			}
		}
		//$html .= '</div>';
		return $html;
	}

	public static function select($name, $options, $value) {
		$html = '<select name="'.$name.'">';
		foreach($options as $i => $option) {
			$key = $option[0];
			$title = $option[1];
			if($key == $value) {
				$html .= '<option value"'.$key.'" selected="selected">'.$title.'</option>';
			}else {
				$html .= '<option value"'.$key.'">'.$title.'</option>';
			}
		}
		$html .= '</select>';
		return $html;
	}

	public static function image_select($name, $image) {
		include SCHED_DIR.'/lib/views/editor/image_select.php';
		return;
		if(empty($value)) {
			return '<div class="sched-image-select"><a href="#" class="sched-image-select-button">Select Image</a><div class="sched-image-select-image"><img src="'.esc_attr($value).'" /><a href="#" class="sched-image-select-remove"><i class="fa fa-times"></i></a></div><br /><br />'.self::textbox($name, $value).'</div>';
		}
		return '<div class="sched-image-select sched-image-selected"><a href="#" class="sched-image-select-button">Select Image</a><div class="sched-image-select-image"><a href="'.esc_attr($value).'" target="_blank"><img src="'.esc_attr($value).'" border="0" /></a><a href="#" class="sched-image-select-remove"><i class="fa fa-times"></i></a></div><br /><br />'.self::textbox($name, $value).'</div>';
	}

	public static function popover($option_name = false, $custom_code = false, $offset = 0) {
		if($option_name !== false) {
			return '<div class="sched-a-option-popover" style="right: '.($offset*22).'px"><i class="fa fa-code"></i><div>[... '.$option_name.'="'.SCHED_DB::get($option_name).'" ...]</div></div>';
		}
		return '<div class="sched-a-option-popover" style="right: '.($offset*22).'px"><i class="fa fa-code"></i><div>'.$custom_code.'</div></div>';
	}

	public static function opacity_hex_to_rgba($opacity, $hex) {

		$rgb = self::hex_to_rgb($hex);

		$a = $opacity/100;
		if($a > 1) { $a = 1; }
		if($a < 0) { $a = 0; }
		$a_str = number_format($a, 2, '.', '');

		return 'rgba('.$rgb[0].','.$rgb[1].','.$rgb[2].','.$a_str.')';

	}

	public static function rgba_decode($rgba) {

		$pattern = '/^rgba\s*\(\s*([\d]+)\s*,\s*([\d]+)\s*,\s*([\d]+)\s*,\s*(\d\.*\d*)\s*\)$/';
		preg_match($pattern, $rgba, $matches);

		$r = $matches[1];
		$g = $matches[2];
		$b = $matches[3];
		$a = $matches[4];

		return array(
			'hex' => self::rgb_to_hex($r, $g, $b),
			'alpha' => $a,
		);

	}

	public static function hex_to_rgb($hex) {
		$hex = str_replace("#", "", $hex);

		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
		$rgb = array($r, $g, $b);
		//return implode(",", $rgb); // returns the rgb values separated by commas
		return $rgb; // returns an array with the rgb values
	}

	public static function rgb_to_hex($r, $g, $b) {
		$hex = "#";
		$hex.= str_pad(dechex($r), 2, "0", STR_PAD_LEFT);
		$hex.= str_pad(dechex($g), 2, "0", STR_PAD_LEFT);
		$hex.= str_pad(dechex($b), 2, "0", STR_PAD_LEFT);
		return $hex;
	}

	public static function time($hours = 0, $minutes = 0, $show_minutes = true, $force_24 = false) {
		$am_pm = SCHED_DB::get('am_pm');
		if($force_24) {
			$am_pm = false;
		}
		if(is_array($hours)) {
			$minutes = $hours[1];
			$hours = $hours[0];
		}
		if($hours > 23) {
			$hours -= 24;
		}
		if(strlen($minutes) < 2) {
			$minutes = '0'.$minutes;
		}
		if(strlen($hours) < 2) {
			$hours = '0'.$hours;
		}
		if($am_pm && $show_minutes) {
			return strtolower(date('g:i a', strtotime($hours.':'.$minutes)));
		}else if($am_pm && !$show_minutes) {
			return strtolower(date('g a', strtotime($hours.':'.$minutes)));
		}else if(!$am_pm && $show_minutes) {
			return $hours.':'.$minutes;
		}else if(!$am_pm && !$show_minutes) {
			return $hours;
		}
	}

	public static function time_to_array($time) {
		$time = explode(':', $time);
		if($time[0] == '24') {
			$time[0] = '00';
		}
		return array((int)($time[0]), (int)($time[1]));
	}

	public static function length($start, $end) {
		if(!is_array($start)) {
			$start = self::time_to_array($start);
			$end = self::time_to_array($end);
		}
		$start_hours = $start[0] + $start[1]/60;
		$end_hours = $end[0] + $end[1]/60;

		if($end_hours < $start_hours) {
			$end_hours += 24;
		}

		$length = $end_hours - $start_hours;
		//dd($start_hours);
		return round($length*60);
	}

}