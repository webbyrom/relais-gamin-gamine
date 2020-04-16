<div>
	<form action="<?php echo $this->method('method=update_event&event_id='.$_GET['event_id']); ?>" method="POST" autocomplete="off">
		<?php if($event['timeslot_parent_id'] !== 0) { ?>
			<div class="sched-editor-notification form-create-event-notification-editing-timeslot" style="margin-bottom: 16px;"><i class="fa fa-warning"></i><span>You're editing an event time slot. You can only edit the editable fields you enabled in the <a href="#">main event</a>.</span></div>
		<?php } ?>
		<?php
		//wp_editor('test content', 'sched-ajax-editor', $settings); ?>
		<div class="sched-a-option<?php if($event['parent'] !== false && $event['parent']['timeslot_fields']['title'] == 1) { echo ' sched-a-option-locked'; } ?>">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Title</div>
				<div class="sched-a-option-description">
					Title of the event.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textbox('event_edit_title', $event['title']); ?>
			</div>
			<div class="sched-a-option-locked-icon"><i class="fa fa-lock"></i></div>
		</div>
		<div class="sched-a-option-hr"></div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Column &amp; Time</div>
				<div class="sched-a-option-description">
					Select which column the event should be added to and add the start &amp; end time. You can add additional time slots.
				</div>
			</div>
			<div class="sched-a-option-right">
				<div class="sched-a-select-timeslots">
					<div class="sched-a-select-timeslot" style="background: none; padding: 0;">
						<select class="sched-select" id="event_edit_column" name="event_edit_column">
							<option disabled value='0'>Select Column</option>
							<?php foreach($this->schedule->options['columns'] as $column) { ?>
							<option value="<?php echo $column['id']; ?>" <?php if($event['column_id'] == $column['id']) { echo 'selected="selected"'; } ?>><?php echo esc_html($column['title']); ?></option>
							<?php } ?>
						</select>
						<br /><br />
						<?php echo SCHED_HTML::timebox('event_edit_start', SCHED_HTML::time($event['start'][0], $event['start'][1], true, true), '', SCHED_HTML::time($this->schedule->options['start'], 0, true, true), SCHED_HTML::time($this->schedule->options['end'], 0, true, true)); ?>
						<div class="sched-a-option-time-split">-</div>
						<?php echo SCHED_HTML::timebox('event_edit_end', SCHED_HTML::time($event['end'][0], $event['end'][1], true, true), '', SCHED_HTML::time($this->schedule->options['start'], 0, true, true), SCHED_HTML::time($this->schedule->options['end'], 0, true, true)); ?>
						
					</div>
					<?php if($event['timeslot_parent_id'] == 0) { ?>
						<?php foreach($event['timeslots_arr'] as $timeslot) { ?>

						<div class="sched-a-select-timeslot" data-timeslot-id="<?php echo (int)$timeslot['id']; ?>">
							<div class="sched-a-select-timeslot-data">
								<input type="hidden" name="event_edit_timeslot_id[]" value="<?php echo $timeslot['id']; ?>" />
								<select class="sched-select" name="event_edit_timeslot_column[]">
									<option disabled value='0'>Select Column</option>
									<?php foreach($this->schedule->options['columns'] as $column) { ?>
									<option value="<?php echo $column['id']; ?>" <?php if($timeslot['column_id'] == $column['id']) { echo 'selected="selected"'; } ?>><?php echo esc_html($column['title']); ?></option>
									<?php } ?>
								</select>
								<br /><br />
								<?php echo SCHED_HTML::timebox('event_edit_timeslot_start[]', SCHED_HTML::time($timeslot['start'], 0, true, true), '', SCHED_HTML::time($this->schedule->options['start'], 0, true, true), SCHED_HTML::time($this->schedule->options['end'], 0, true, true)); ?>
								<div class="sched-a-option-time-split">-</div>
								<?php echo SCHED_HTML::timebox('event_edit_timeslot_end[]', SCHED_HTML::time($timeslot['end'], 0, true, true), '', SCHED_HTML::time($this->schedule->options['start'], 0, true, true), SCHED_HTML::time($this->schedule->options['end'], 0, true, true)); ?>
							</div>
							<div class="sched-a-select-timeslot-bottom sched-clear">
								<a href="#" class="sched-button" style="float: left" onclick="sched_open_event_editor(<?php echo $timeslot['id']; ?>); return false;"><i class="fa fa-edit"></i>Edit Fields Of This Time Slot</a>
								<a href="#" class="sched-button sched-button-red sched-a-select-timeslot-remove" style="float: right"><i class="fa fa-times"></i>Remove</a>
							</div>
						</div>

						<?php } ?>
						<div class="sched-a-select-timeslot-html" style="display: none;">
							<div class="sched-a-select-timeslot-data">
								<!-- <input type="text" class="sched_event_edit_timeslot_id" value="0"> -->
								<select class="sched-select sched_event_edit_timeslot_column" name="_event_edit_timeslot_column">
									<option selected="selected" disabled value='0'>Select Column</option>
									<?php foreach($this->schedule->options['columns'] as $column) { ?>
									<option value="<?php echo $column['id']; ?>"><?php echo esc_html($column['title']); ?></option>
									<?php } ?>
								</select>
								<br /><br />
								<?php echo SCHED_HTML::timebox('_event_edit_timeslot_start', SCHED_HTML::time($this->schedule->options['start'], 0, true, true), 'sched_event_edit_timeslot_start', SCHED_HTML::time($this->schedule->options['start'], 0, true, true), SCHED_HTML::time($this->schedule->options['end'], 0, true, true)); ?>
								<div class="sched-a-option-time-split">-</div>
								<?php echo SCHED_HTML::timebox('_event_edit_timeslot_end', SCHED_HTML::time($this->schedule->options['start'], 0, true, true), 'sched_event_edit_timeslot_end', SCHED_HTML::time($this->schedule->options['start'], 0, true, true), SCHED_HTML::time($this->schedule->options['end'], 0, true, true)); ?>
							</div>
							<div class="sched-a-select-timeslot-bottom sched-clear">
								<!-- <a href="#" class="sched-button" style="float: left"><i class="fa fa-edit"></i>Edit Fields Of This Time Slot</a> -->
								<a href="#" class="sched-button sched-button-red sched-a-select-timeslot-remove" style="float: right"><i class="fa fa-times"></i>Remove</a>
							</div>
						</div>
					<?php } // if timeslot_parent_id == 0 ?>
				</div>
				<?php if($event['timeslot_parent_id'] == 0) { ?>
					<a href="#" class="sched-button sched-a-select-timeslots-add"><i class="fa fa-plus"></i>Add time slot</a>
				<?php } // if timeslot_parent_id == 0 ?>
			</div>
		</div>
		
		<div class="sched-a-option <?php if($event['parent'] !== false) { echo 'sched-a-option-hidden'; } ?>">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Time Slots Editable Fields</div>
				<div class="sched-a-option-description">
					Choose <strong>Edit fields per time slot</strong> if you want to edit more fields of the time slot instead of only the column and time.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('event_edit_editable_fields', array(
					array('0', 'Same as this event', 'null'),
					array('1', 'Edit fields per time slot', '#sched-toggle-select-editable-fields-edit'),
				), $event['timeslot_fields_method']); ?>
			</div>
			<div class="sched-a-option-locked-icon"><i class="fa fa-lock"></i></div>
		</div>
		<div id="sched-toggle-select-editable-fields-edit" class="sched-a-checkbox-show">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Select Editable Fields</div>
					<div class="sched-a-option-description">
						If a field is enabled, you can edit it for each event time slot. Click on the <strong><i class="fa fa-edit"></i> EDIT FIELDS OF THIS TIME SLOT</strong> button of an event time slot to edit these fields.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php
					$fields = array(
						'title' => 'Event Title',
						'color' => 'Event Color',
						'background_type' => 'Event Background',
						'onclick' => 'On Click',
						'media_type' => 'Media Type',
						'custom_class' => 'Custom Class',
						'meta_fields' => 'Custom Fields',
						'description_inline' => 'Short Description',
						'description' => 'Description',	
					);

					foreach($fields as $field_key => $field_title) {
						$field_key_long = 'event_editable_fields_title';
						$check = 1;
						if(isset($event['timeslot_fields'][$field_key]) && $event['timeslot_fields'][$field_key] == 0) {
							$check = 1;
						}else {
							$check = 0;
						}
						?>
						<div class="sched-a-checkbox-row"><?php echo SCHED_HTML::checkbox('event_editable_fields_'.$field_key, $check); ?><strong><?php echo $field_title; ?></strong></div>
					<?php } ?>
				</div>
			</div>
		</div>

		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Event Size</div>
				<div class="sched-a-option-description">
					Select the size and position of the event. This can be used when you have multiple simultaneous events.
				</div>
			</div>
			<div class="sched-a-option-right">
				<div class="sched-a-size-select" data-selected="<?php echo (int)$event['size']; ?>" data-name="event_edit_size"></div>
			</div>
			<div class="sched-a-option-locked-icon"><i class="fa fa-lock"></i></div>
		</div>

		<div class="sched-a-option-hr"></div>
		<div class="sched-a-option<?php if($event['parent'] !== false && $event['parent']['timeslot_fields']['color'] == 1) { echo ' sched-a-option-locked'; } ?>">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Event Color</div>
				<div class="sched-a-option-description">
					Only used if the <strong>Event Color</strong> option in the settings is set to <strong>Per Event</strong>.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::color('event_edit_color', $event['color']); ?>
			</div>
			<div class="sched-a-option-locked-icon"><i class="fa fa-lock"></i></div>
		</div>
		<div class="sched-a-option<?php if($event['parent'] !== false && $event['parent']['timeslot_fields']['background_type'] == 1) { echo ' sched-a-option-locked'; } ?>">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Background</div>
				<div class="sched-a-option-description">
					How to style the event backgorund.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('event_edit_background_type', array(
					array('color', 'Use Event Color', 'null'),
					array('image', 'Show An Image', '#event_edit_background_image'),
				), $event['background_type']); ?>
			</div>
			<div class="sched-a-option-locked-icon"><i class="fa fa-lock"></i></div>
		</div>
		<div id="event_edit_background_image" class="sched-a-checkbox-show<?php if($event['parent'] !== false && $event['parent']['timeslot_fields']['background_type'] == 1) { echo ' sched-a-checkbox-show-locked'; } ?>">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Image Link</div>
					<div class="sched-a-option-description">
						Link to an image.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::image_select('event_edit_background_image_url', $event['background_image_url']); ?>
					<br />
					<label>Darken Image</label><br />
					<div class="sched-number"><input type="number" min="0" max="100" step="5" class="sched-image-select-darken" name="event_edit_background_image_darken" value="<?php echo (int)$event['background_image_darken']; ?>"></div> %
					<em style="margin-left: 16px;">Increase to darken the image so the text is more readable.</em>
				</div>
			</div>
		</div>
		<div class="sched-a-option-hr"></div>
		<div class="sched-a-option<?php if($event['parent'] !== false && $event['parent']['timeslot_fields']['onclick'] == 1) { echo ' sched-a-option-locked'; } ?>">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">On Click</div>
				<div class="sched-a-option-description">
					What to do when the event is click in the timetable.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('event_edit_onclick', array(
					array('0', 'Do Nothing', 'null'),
					array('popup', 'Open Popup With Event Details', 'null'),
					array('link', 'Open Link', '#event_edit_onclick_link_toggle'),
				), $event['onclick']); ?>
			</div>
			<div class="sched-a-option-locked-icon"><i class="fa fa-lock"></i></div>
		</div>
		<div id="event_edit_onclick_link_toggle" class="sched-a-checkbox-show<?php if($event['parent'] !== false && $event['parent']['timeslot_fields']['onclick'] == 1) { echo ' sched-a-checkbox-show-locked'; } ?>">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Link To Open</div>
					<div class="sched-a-option-description">
						Link to open when the event is clicked.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::textbox('event_edit_onclick_link', $event['onclick_link']); ?>
				</div>
			</div>
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">New Tab</div>
					<div class="sched-a-option-description">
						Open the link in a separate tab.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::checkbox('event_edit_onclick_link_new_page', $event['onclick_link_new_page']); ?>
				</div>
			</div>
		</div>
		<div class="sched-a-option<?php if($event['parent'] !== false && $event['parent']['timeslot_fields']['media_type'] == 1) { echo ' sched-a-option-locked'; } ?>">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Media Type</div>
				<div class="sched-a-option-description">
					Media to show when opening the event popup.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('event_edit_media_type', array(
					array('0', 'No Media', 'null'),
					array('image', 'Show An Image', '#event_edit_media_image_toggle'),
					array('youtube', 'Show A YouTube Video', '#event_edit_media_youtube_toggle'),
				), $event['media_type']); ?>
			</div>
			<div class="sched-a-option-locked-icon"><i class="fa fa-lock"></i></div>
		</div>
		<div id="event_edit_media_image_toggle" class="sched-a-checkbox-show<?php if($event['parent'] !== false && $event['parent']['timeslot_fields']['media_type'] == 1) { echo ' sched-a-checkbox-show-locked'; } ?>">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Image Link</div>
					<div class="sched-a-option-description">
						Link to an image.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::image_select('event_edit_media_image', $event['media_image']); ?>
				</div>
			</div>
		</div>
		<div id="event_edit_media_youtube_toggle" class="sched-a-checkbox-show<?php if($event['parent'] !== false && $event['parent']['timeslot_fields']['media_type'] == 1) { echo ' sched-a-checkbox-show-locked'; } ?>">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">YouTube Link</div>
					<div class="sched-a-option-description">
						Link to a YouTube video.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::textbox('event_edit_media_youtube', $event['media_youtube']); ?>
				</div>
			</div>
		</div>
		<div class="sched-a-option-hr"></div>
		<div class="sched-a-option<?php if($event['parent'] !== false && $event['parent']['timeslot_fields']['custom_class'] == 1) { echo ' sched-a-option-locked'; } ?>">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Custom Class</div>
				<div class="sched-a-option-description">
					Optionally give this column a custom class so you can add custom styles.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textbox('event_edit_custom_class', $event['custom_class']); ?>
			</div>
			<div class="sched-a-option-locked-icon"><i class="fa fa-lock"></i></div>
		</div>
		
		<div class="sched-a-option-hr"></div>
		<div class="sched-a-option<?php if($event['parent'] !== false && $event['parent']['timeslot_fields']['meta_fields'] == 1) { echo ' sched-a-option-locked'; } ?>">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Custom Fields</div>
				<div class="sched-a-option-description">
					Enable/disable custom fields for the event and enter data. <a href="#" class="sched-a-open-custom-fields">Manage custom fields</a>.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php
				foreach($this->schedule->options['meta_fields'] as $i => $meta_field) {
					if($meta_field['enabled'] == 0) {
						continue;
					}

					$id = 'meta_edit_event_'.$meta_field['id'];

					$event_meta_enabled = false;
					$event_meta_line_1 = '{custom_field_title}';
					$event_meta_line_2 = '';

					$icon_enabled = $meta_field['icon_enabled'];
					$title = $meta_field['title'];
					$icon = $meta_field['icon'];

					if(isset($event['meta_fields'][$meta_field['id']])) {

						$event_meta_enabled = $event['meta_fields'][$meta_field['id']]['enabled'];
						$event_meta_line_1 = $event['meta_fields'][$meta_field['id']]['line_1'];
						$event_meta_line_2 = $event['meta_fields'][$meta_field['id']]['line_2'];

						$icon_enabled = $meta_field['icon_enabled'];
						$title = $meta_field['title'];
						$icon = $meta_field['icon'];
					}
					include SCHED_DIR.'/lib/views/editor/form_meta_field_fill.php';
				}
				?>
			</div>
			<div class="sched-a-option-locked-icon"><i class="fa fa-lock"></i></div>
		</div>
		<div class="sched-a-option-hr"></div>
		<div class="sched-a-option<?php if($event['parent'] !== false && $event['parent']['timeslot_fields']['description_inline'] == 1) { echo ' sched-a-option-locked'; } ?>">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Short Description</div>
				<div class="sched-a-option-description">
					Short version of the description.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textbox('event_edit_description_inline', $event['description_inline']); ?>
			</div>
			<div class="sched-a-option-locked-icon"><i class="fa fa-lock"></i></div>
		</div>
		<div class="sched-a-option<?php if($event['parent'] !== false && $event['parent']['timeslot_fields']['description'] == 1) { echo ' sched-a-option-locked'; } ?>">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Description</div>
				<div class="sched-a-option-description">
					Full description of the event. You can use HTML.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textarea('event_edit_description', $event['description']); ?>
			</div>
			<div class="sched-a-option-locked-icon"><i class="fa fa-lock"></i></div>
		</div>
		<div class="sched-modal-footer">
			<a href="#" class="sched-button sched-button-left sched-button-grey sched-modal-close-button">Cancel &amp; Close</a>
			<input type="submit" class="sched-button sched-button-right" value="Save Changes" />
		</div>
	</form>
</div>