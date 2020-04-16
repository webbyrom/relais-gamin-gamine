<?php
$event_start = $this->calculate_event_start($event);
$event_length = $this->calculate_event_length($event);
echo SCHED_HTML::elem('a', array(
	'class' => array(
		'sched-event',
		'sched-event-size-'.$event['size'],
		$event['background_type'] == 'image' ? 'sched-event-image-bg' : '',
		$event['custom_class'],
		$this->get('event_box_style') == 2 ? 'sched-event-invert' : ''
	),
	'href' => $event['onclick'] == 'link' ? $event['onclick_link'] : '#',
	'target' => $event['onclick'] == 'link' && $event['onclick_link_new_page'] == 1 ? '_blank' : '',
	'data-onclick' => $event['onclick'] == 'popup' ? SCHED_DB::hide_empty_event($event, $this->options['meta_fields']) : $event['onclick'],
	'data-color' => $this->event_color($event, $column),
	'title' => $event['title'],
	'data-event-id' => $event['id'],
	'data-children' => count($event['timeslots']) == 0 ? '0' : esc_attr(json_encode($event['timeslots'])),
	'data-children-match-color' => isset($event['timeslot_fields']['color']) && $event['timeslot_fields']['color'] == '1' ? '1' : '0',
	'style' => 'height: '.$event_length.'px; top: '.$event_start.'px',
	'data-top' => $event_start,
	'data-size' => $event['size'],
	'data-sort-index' => $event_index,
)); ?>
<!-- <a class="sched-event <?php if($event['background_type'] == 'image') { echo 'sched-event-image-bg'; } ?> <?php if($this->get('event_box_style') == 2) { echo 'sched-event-invert'; } ?> <?php echo esc_attr($event['custom_class']); ?>" href="<?php echo ($event['onclick'] == 'link') ? $event['onclick_link'] : '#'; ?>" <?php if($event['onclick'] == 'link' && $event['onclick_link_new_page'] == 1) { echo 'target="_blank"'; } ?> data-onclick="<?php echo $event['onclick']; ?>" data-color="<?php echo esc_attr($this->event_color($event, $column)); ?>" title="<?php echo esc_attr($event['title']); ?>" data-event-id="<?php echo $event['id']; ?>" data-children="<?php echo (count($event['timeslots']) == 0) ? '0' : esc_attr(json_encode($event['timeslots'])); ?>" data-children-match-color="<?php echo (isset($event['timeslot_fields']['color']) && $event['timeslot_fields']['color'] == '1') ? '1' : '0'; ?>" style="height: <?php echo $event_length; ?>px; top: <?php $top = $event_start; echo $top; ?>px" data-top="<?php echo $top; ?>"> -->
	<?php if($this->get('event_tooltip') == 1) { ?>
	<div class="sched-event-tooltip<?php if($column_i === 0) { echo ' sched-event-tooltip-first-child'; } ?>" style="width:<?php echo ($this->get('event_tooltip_width_type') == 'custom') ? $this->get('event_tooltip_width').'px' : '100%'; ?>; background: <?php echo $this->tooltip_background($event, $column); ?>; color: <?php echo $this->tooltip_color($event, $column); ?>;">
		<?php if($this->get('event_tooltip_title') == 1) { ?>
			<div class="sched-event-tooltip-title"><?php echo esc_html($event['title']); ?></div>
		<?php } ?>
		<?php if($this->get('event_tooltip_time') == 1) { ?>
			<div class="sched-event-tooltip-time"><?php echo SCHED_HTML::time($event['start']); ?> - <?php echo SCHED_HTML::time($event['end']); ?></div>
		<?php } ?>
		<?php if($this->get('event_tooltip_description') == 1 && $event['description_inline'] !== '') { ?>
			<div class="sched-event-tooltip-description"><?php echo esc_html($event['description_inline']); ?></div>
		<?php } ?>
		<div class="sched-event-tooltip-arrow">
			<div class="sched-event-tooltip-arrow-inside" style="border-color: <?php echo $this->tooltip_background($event, $column); ?> transparent transparent transparent;"></div>
		</div>
	</div>
	<?php } // if event_tooltip  ?>
	<div class="sched-event-inner" style="<?php if($this->get('event_box_style') == 2 && $event['background_type'] !== 'image') { echo 'color: '.$this->event_color($event, $column).';'; }else { echo 'background-color: '.$this->event_color($event, $column).';'; } ?> <?php if($event['background_type'] == 'image') { echo 'background-image: linear-gradient(to bottom, rgba(0,0,0,'.($event['background_image_darken']/100).') 0%,rgba(0,0,0,'.($event['background_image_darken']/100).') 100%), url('.$event['background_image_url']['url'].');'; } ?>" data-event-background-image-url="<?php echo ($event['background_image_url'] !== false) ? esc_attr($event['background_image_url']['url']) : ''; ?>" data-event-id="<?php echo $event['id']; ?>">
		<div class="sched-event-inner-bar"></div>
		<?php if($this->editor && $event['timeslot_parent_id'] !== 0) { ?>
			<div class="sched-event-copy-icon sched-edit-button"><i class="sched-icon sched-icon-lock"></i><span>Time Slot For: <strong><?php echo esc_html($event['parent']['title']); ?></strong></span></div>
		<?php } // if timeslot !== 0  ?>
		<div class="sched-event-title"><?php echo esc_html($event['title']); ?></div>
		<?php if($this->get('event_box_time') == 1 && $event_length >= 60) { ?>
			<div class="sched-event-subtitle"><?php echo SCHED_HTML::time($event['start']); ?> - <?php echo SCHED_HTML::time($event['end']); ?></div>
		<?php } ?>
		<?php if($this->get('event_box_description_method') != '0' && (($this->get('event_box_time') == 0 && $event_length >= 60) || ($this->get('event_box_time') == 1 && $event_length >= 85))) { ?>
			<?php $description = ($this->get('event_box_description_method') == 'short' || $this->get('event_box_description_method') == 'short_truncated') ? $event['description_inline'] : $event['description']; ?>
			<div class="sched-event-description" data-full="<?php echo esc_attr($description); ?>"><?php echo esc_html($description); ?></div>
		<?php } ?>
	</div>
	<?php if($this->editor) { ?>
	<div class="sched-event-edit-tooltip-html">
		<div class="sched-event-edit-tooltip sched-admin <?php if($column_i == 0) { echo ' sched-event-edit-tooltip-right'; } ?>">
			<form method="GET">
				<input type="hidden" value="<?php echo (int)$event['id']; ?>" name="sched-event-edit-tooltip-id" />
				<div class="sched-event-edit-tooltip-arrow"></div>
				<div class="sched-event-edit-tooltip-content" <?php if($event['parent'] !== false && $event['parent']['timeslot_fields']['title'] == 1) { echo 'style="display: none"'; } ?>>
					<div class="sched-event-edit-tooltip-row">
						<?php echo SCHED_HTML::textbox('sched-event-edit-tooltip-title', $event['title'], '', 'Event Title'); ?>
					</div>
				</div>
				<div class="sched-event-edit-tooltip-content">
					<div class="sched-event-edit-tooltip-row">
						<label>Start Time:</label>
						<select class="sched-select-time" name="sched-event-edit-tooltip-time-start">
							<?php
							$start = SCHED_HTML::time($this->options['start'], 0, true, true);
							$length = $this->options['length'];
							$now = strtotime($start);
							$event_time = SCHED_HTML::time($event['start'], 0, true, true);
							$time_increment = SCHED_DB::get('editor_timepicker_increments');

							$found = false;
							for($i = 0; $i <= $length/$time_increment; $i++) {
								$date = date("H:i",$now);
								echo '<option value="'.$date.'"'.($date == $event_time ? ' selected="selected"' : '').'>'.$date.'</option>';
								if($date == $event_time) {
									$found = true;
								}
								$now = strtotime('+'.$time_increment.' minutes',$now);
							}
							if($found == false) {
								echo '<option value="'.$event_time.'" selected="selected">'.$event_time.'</option>';
							}
							?>
						</select>
					</div>
					<div class="sched-event-edit-tooltip-row">
						<label>End Time:</label>
						<select class="sched-select-time" name="sched-event-edit-tooltip-time-end">
							<?php
							$start = SCHED_HTML::time($this->options['start'], 0, true, true);
							$length = $this->options['length'];
							$now = strtotime($start);
							$event_time = SCHED_HTML::time($event['end'], 0, true, true);
							$time_increment = SCHED_DB::get('editor_timepicker_increments');

							$found = false;
							for($i = 0; $i <= $length/$time_increment; $i++) {
								$date = date("H:i",$now);
								echo '<option value="'.$date.'"'.($date == $event_time ? ' selected="selected"' : '').'>'.$date.'</option>';
								if($date == $event_time) {
									$found = true;
								}
								$now = strtotime('+'.$time_increment.' minutes',$now);
							}
							if($found == false) {
								echo '<option value="'.$event_time.'" selected="selected">'.$event_time.'</option>';
							}
							?>
						</select>
					</div>
					<div class="sched-event-edit-tooltip-row">
						<select class="sched-select" name="sched-event-edit-tooltip-column">
							<option disabled value=''>Select Column</option>
							<?php foreach($this->options['columns'] as $column_tooltip) { ?>
							<option value="<?php echo $column_tooltip['id']; ?>" <?php if($event['column_id'] == $column_tooltip['id']) { echo 'selected="selected"'; } ?>><?php echo esc_html($column_tooltip['title']); ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="sched-event-edit-tooltip-content" <?php if(($event['parent'] !== false && $event['parent']['timeslot_fields']['color'] == 1) || $this->options['styling'] !== 'event') { echo 'style="display: none"'; } ?>>
					<div class="sched-event-edit-tooltip-row">
						<strong style="width: 100px; display: inline-block">Color:</strong>
						<?php echo SCHED_HTML::color('sched-event-edit-tooltip-color', $event['color']); ?>
					</div>
				</div>
				<div class="sched-event-edit-tooltip-footer">
					<div href="#" class="sched-button sched-event-edit-tooltip-submit"><i class="fa fa-save"></i> Save</div>
					<div class="sched-button sched-event-edit-tooltip-edit"><i class="sched-icon sched-icon-edit"></i> Edit</div>
					<?php if($this->editor && $event['timeslot_parent_id'] == 0) { ?>
					<div class="sched-button sched-event-edit-tooltip-duplicate"><i class="sched-icon sched-icon-copy"></i> Copy</div>
					<?php } ?>
					<div class="sched-button sched-event-edit-tooltip-delete"><i class="sched-icon sched-icon-times"></i> Delete</div>
				</div>
			</form>
		</div>
	</div>
	<?php } ?>
</a>

<div class="sched-event-fulldescription" data-event-id="<?php echo $event['id']; ?>" data-media-type="<?php echo esc_attr($event['media_type']); ?>" data-media-link="<?php echo $this->media_link_attr($event); ?>">
	<div class="sched-event-image-load">
		<?php if($event['media_image'] !== '' && $event['media_image'] === false) { ?>
		<img src="<?php echo $event['media_image']['url']; ?>" />
		<?php } // if $event['image'] ?>
	</div>
	<div class="sched-meta<?php if($event['description'] == '') { echo ' sched-event-no-description'; } ?>">
		<?php
		$meta_fields = $this->options['meta_fields'];
		foreach($meta_fields as $meta_field) {

			if(!isset($event['meta_fields'][$meta_field['id']])) { continue; }
			if($meta_field['enabled'] == 0) { continue; }

			$event_meta_field = $event['meta_fields'][$meta_field['id']];
			if($event_meta_field['enabled'] == 0) { continue; }

			$event_meta_field['line_1'] = $this->parse_meta_line($event_meta_field['line_1'], $event, $column, $meta_field);
			$event_meta_field['line_2'] = $this->parse_meta_line($event_meta_field['line_2'], $event, $column, $meta_field);

			if($event_meta_field['line_1'] == '') {
				$event_meta_field['line_1'] = '&nbsp;';
			}
			
			if($event_meta_field['line_2'] !== '') { ?>
			<div class="sched-meta-field<?php if($meta_field['icon_enabled'] == 0) { echo ' sched-meta-field-no-icon'; } ?>" data-meta-field-id="<?php echo (int)$meta_field['id']; ?>" data-meta-field-line-one="<?php echo esc_attr($event_meta_field['line_1']); ?>" data-meta-field-line-two="<?php echo esc_attr($event_meta_field['line_2']); ?>">
				<div class="sched-meta-icon"><i class="sched-icon sched-icon-<?php echo $meta_field['icon']; ?>"></i></div>
				<div class="sched-meta-right">
					<div class="sched-meta-name"><?php echo $event_meta_field['line_1']; ?></div>
					<div class="sched-meta-value"><?php echo $event_meta_field['line_2']; ?></div>
				</div>
			</div>
			<?php }else { ?>
			<div class="sched-meta-field sched-meta-field-single<?php if($meta_field['icon_enabled'] == 0) { echo ' sched-meta-field-no-icon'; } ?>" data-meta-field-id="<?php echo (int)$meta_field['id']; ?>" data-meta-field-line-one="<?php echo esc_attr($event_meta_field['line_1']); ?>" data-meta-field-line-two="">
				<div class="sched-meta-icon"><i class="sched-icon sched-icon-<?php echo $meta_field['icon']; ?>"></i></div>
				<div class="sched-meta-right">
					<div class="sched-meta-value"><?php echo $event_meta_field['line_1']; ?></div>
				</div>
			</div>
			<?php } ?>
		<?php } ?>
	</div>
	<p class="sched-popup-description-text<?php if($event['description'] == '') { echo ' sched-event-no-description'; } ?>">
		<?php if($this->get('shortcodes_in_descriptions')) {
			echo do_shortcode($event['description']);
		}else {
			echo $event['description'];
		} ?>
	</p>
</div>