<select name="<?php echo $settings['param_name']; ?>" class="wpb_vc_param_value sched_vc_option_id">
	<option disabled="disabled" value="0"<?php if($value == '0') { echo ' selected="selected"'; } ?>>Select Timetable</option>
	<?php foreach(SCHED_DB::get_schedules(true) as $schedule) { ?>
		<option value="<?php echo $schedule['id']; ?>"<?php if($value == $schedule['id']) { echo ' selected="selected"'; } ?>><?php echo esc_html($schedule['name']); ?></option>';
	<?php } ?> <!-- end foreach -->
</select>