<div class="form-create-event">
	<form action="<?php echo $this->editor->method('method=create_event'); ?>" method="POST" autocomplete="off" class="form-create-event-form">
		<div class="sched-editor-notification form-create-event-notification-no-column" style="margin-bottom: 16px; display: none;"><i class="fa fa-warning"></i><span>You have not selected a column for the event.</span></div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Title</div>
				<div class="sched-a-option-description">
					Title of the event.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textbox('event_create_title', ''); ?>
			</div>
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
						<select class="sched-select" id="event_create_column" name="event_create_column">
							<option selected="selected" disabled value='0'>Select Column</option>
							<?php foreach($this->editor->schedule->options['columns'] as $column) { ?>
							<option value="<?php echo $column['id']; ?>"><?php echo esc_html($column['title']); ?></option>
							<?php } ?>
						</select>
						<br /><br />
						<?php echo SCHED_HTML::timebox('event_create_start', SCHED_HTML::time($this->editor->schedule->options['start'], 0, true, true), '', SCHED_HTML::time($this->editor->schedule->options['start'], 0, true, true), SCHED_HTML::time($this->editor->schedule->options['end'], 0, true, true)); ?>
						<div class="sched-a-option-time-split">-</div>
						<?php echo SCHED_HTML::timebox('event_create_end', SCHED_HTML::time($this->editor->schedule->options['start'], 0, true, true), '', SCHED_HTML::time($this->editor->schedule->options['start'], 0, true, true), SCHED_HTML::time($this->editor->schedule->options['end'], 0, true, true)); ?>
						
					</div>
					<div class="sched-a-select-timeslot-html" style="display: none;">
						<div class="sched-a-select-timeslot-data">
							<select class="sched-select sched_event_create_timeslot_column" name="_event_create_timeslot_column">
								<option selected="selected" disabled value='0'>Select Column</option>
								<?php foreach($this->editor->schedule->options['columns'] as $column) { ?>
								<option value="<?php echo $column['id']; ?>"><?php echo esc_html($column['title']); ?></option>
								<?php } ?>
							</select>
							<br /><br />
							<?php echo SCHED_HTML::timebox('_event_create_timeslot_start', SCHED_HTML::time($this->editor->schedule->options['start'], 0, true, true), 'sched_event_create_timeslot_start', SCHED_HTML::time($this->editor->schedule->options['start'], 0, true, true), SCHED_HTML::time($this->editor->schedule->options['end'], 0, true, true)); ?>
							<div class="sched-a-option-time-split">-</div>
							<?php echo SCHED_HTML::timebox('_event_create_timeslot_end', SCHED_HTML::time($this->editor->schedule->options['start'], 0, true, true), 'sched_event_create_timeslot_end', SCHED_HTML::time($this->editor->schedule->options['start'], 0, true, true), SCHED_HTML::time($this->editor->schedule->options['end'], 0, true, true)); ?>
						</div>
						<div class="sched-a-select-timeslot-bottom sched-clear">
							<!-- <a href="#" class="sched-button" style="float: left"><i class="fa fa-edit"></i>Edit Fields Of This Time Slot</a> -->
							<a href="#" class="sched-button sched-button-red sched-a-select-timeslot-remove" style="float: right"><i class="fa fa-times"></i>Remove</a>
						</div>
					</div>
				</div>
				<a href="#" class="sched-button sched-a-select-timeslots-add"><i class="fa fa-plus"></i>Add time slot</a>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Time Slots Editable Fields</div>
				<div class="sched-a-option-description">
					Choose <strong>Edit fields per time slot</strong> if you want to edit more fields of the time slot instead of only the column and time.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('event_create_editable_fields', array(
					array('0', 'Same as this event', 'null'),
					array('1', 'Edit fields per time slot', '#sched-toggle-select-editable-fields'),
				), '0'); ?>
			</div>
		</div>
		<div id="sched-toggle-select-editable-fields" class="sched-a-checkbox-show">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Select Editable Fields</div>
					<div class="sched-a-option-description">
						If a field is enabled, you can edit it for each event time slot. Click on the <strong><i class="fa fa-edit"></i> EDIT FIELDS OF THIS TIME SLOT</strong> button of an event time slot to edit these fields.
					</div>
				</div>
				<div class="sched-a-option-right">
					<div class="sched-a-checkbox-row"><?php echo SCHED_HTML::checkbox('event_editable_fields_title', 0); ?><strong>Event Title</strong></div>
					<div class="sched-a-checkbox-row"><?php echo SCHED_HTML::checkbox('event_editable_fields_color', 0); ?><strong>Event Color</strong></div>
					<div class="sched-a-checkbox-row"><?php echo SCHED_HTML::checkbox('event_editable_fields_background_type', 0); ?><strong>Event Background</strong></div>
					<div class="sched-a-checkbox-row"><?php echo SCHED_HTML::checkbox('event_editable_fields_onclick', 0); ?><strong>On Click</strong></div>
					<div class="sched-a-checkbox-row"><?php echo SCHED_HTML::checkbox('event_editable_fields_media_type', 0); ?><strong>Media Type</strong></div>
					<div class="sched-a-checkbox-row"><?php echo SCHED_HTML::checkbox('event_editable_fields_custom_class', 0); ?><strong>Custom Class</strong></div>
					<div class="sched-a-checkbox-row"><?php echo SCHED_HTML::checkbox('event_editable_fields_meta_fields', 0); ?><strong>Custom Fields</strong></div>
					<div class="sched-a-checkbox-row"><?php echo SCHED_HTML::checkbox('event_editable_fields_description_inline', 0); ?><strong>Short Description</strong></div>
					<div class="sched-a-checkbox-row"><?php echo SCHED_HTML::checkbox('event_editable_fields_description', 0); ?><strong>Description</strong></div>
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
				<div class="sched-a-size-select" data-selected="1" data-name="event_create_size"></div>
			</div>
			<div class="sched-a-option-locked-icon"><i class="fa fa-lock"></i></div>
		</div>
		<div class="sched-a-option-hr"></div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Event Color</div>
				<div class="sched-a-option-description">
					Only used if the <strong>Event Color</strong> option in the settings is set to <strong>Per Event</strong>.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::color('event_create_color', '#000000'); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Background</div>
				<div class="sched-a-option-description">
					How to style the event backgorund.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('event_create_background_type', array(
					array('color', 'Use Event Color', 'null'),
					array('image', 'Show An Image', '#event_create_background_image'),
				), 'color'); ?>
			</div>
			<div class="sched-a-option-locked-icon"><i class="fa fa-lock"></i></div>
		</div>
		<div id="event_create_background_image" class="sched-a-checkbox-show">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Image Link</div>
					<div class="sched-a-option-description">
						Link to an image.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php SCHED_HTML::image_select('event_create_background_image_url', false); ?>
					<br />
					<label>Darken Image</label><br />
					<div class="sched-number"><input type="number" min="0" max="100" step="5" class="sched-image-select-darken" name="event_create_background_image_darken" value="0"></div> %
					<em style="margin-left: 16px;">Increase to darken the image so the text is more readable.</em>
				</div>
			</div>
		</div>
		<div class="sched-a-option-hr"></div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">On Click</div>
				<div class="sched-a-option-description">
					What to do when the event is click in the timetable.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('event_create_onclick', array(
					array('0', 'Do Nothing', 'null'),
					array('popup', 'Open Popup With Event Details', 'null'),
					array('link', 'Open Link', '#event_create_onclick_link_toggle'),
				), 'popup'); ?>
			</div>
		</div>
		<div id="event_create_onclick_link_toggle" class="sched-a-checkbox-show">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Link To Open</div>
					<div class="sched-a-option-description">
						Link to open when the event is clicked.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::textbox('event_create_onclick_link', ''); ?>
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
					<?php echo SCHED_HTML::checkbox('event_create_onclick_link_new_page', 0); ?>
				</div>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Media Type</div>
				<div class="sched-a-option-description">
					Media to show when opening the event popup.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('event_create_media_type', array(
					array('0', 'No Media', 'null'),
					array('image', 'Show An Image', '#event_create_media_image_toggle'),
					array('youtube', 'Show A YouTube Video', '#event_create_media_youtube_toggle'),
				), '0'); ?>
			</div>
		</div>
		<div id="event_create_media_image_toggle" class="sched-a-checkbox-show">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Image Link</div>
					<div class="sched-a-option-description">
						Link to an image.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php SCHED_HTML::image_select('event_create_media_image', false); ?>
					<!-- <div class="sched-image-select">
						<input type="hidden" name="event_create_media_image" value="" />
						<a href="#" class="sched-image-select-button">Select Image</a>
						<div class="sched-image-select-image">
							<img src="" />
							<a href="#" class="sched-image-select-remove"><i class="fa fa-times"></i></a>
						</div>
					</div> -->
				</div>
			</div>
		</div>
		<div id="event_create_media_youtube_toggle" class="sched-a-checkbox-show">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">YouTube Link</div>
					<div class="sched-a-option-description">
						Link to a YouTube video.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::textbox('event_create_media_youtube', ''); ?>
				</div>
			</div>
		</div>
		<div class="sched-a-option-hr"></div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Custom Class</div>
				<div class="sched-a-option-description">
					Optionally give this column a custom class so you can add custom styles.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textbox('event_create_custom_class', ''); ?>
			</div>
		</div>
		
		<div class="sched-a-option-hr"></div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Custom Fields</div>
				<div class="sched-a-option-description">
					Enable/disable custom fields for the event and enter data. <a href="#" class="sched-a-open-custom-fields">Manage custom fields</a>.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php $this->editor->e_meta_fields_create_event(); ?>
			</div>
		</div>
		<div class="sched-a-option-hr"></div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Short Description</div>
				<div class="sched-a-option-description">
					Short version of the description.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textbox('event_create_description_inline', ''); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Description</div>
				<div class="sched-a-option-description">
					Full description of the event. You can use HTML.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textarea('event_create_description', ''); ?>
				<?php //wp_editor('', 'event_create_description'); ?>
			</div>
		</div>
		<div class="sched-modal-footer">
			<a href="#" class="sched-button sched-button-left sched-button-grey sched-modal-close-button">Cancel &amp; Close</a>
			<input type="submit" class="sched-button sched-button-right" value="Create Event" />
		</div>
	</form>
</div>