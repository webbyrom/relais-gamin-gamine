<div class="form-schedule-settings">
	<form action="<?php echo $this->editor->method('method=update_schedule'); ?>" method="POST" autocomplete="off">
		
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Name</div>
				<div class="sched-a-option-description">
					Name to distinguish timetables from eachother.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textbox('name', $this->editor->schedule->options['name']); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Title</div>
				<div class="sched-a-option-description">
					Title above the timetable. Leave it blank to hide the title.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textbox('title', $this->editor->schedule->options['title']); ?>
			</div>
		</div>
		<div class="sched-a-option-hr"></div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Start &amp; End Time</div>
				<div class="sched-a-option-description">
					Start and end time of the timetable formatted hh:mm.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::timebox('start', SCHED_HTML::time($this->editor->schedule->options['start'], 0, true, true)); ?>
				<div class="sched-a-option-time-split">-</div>
				<?php echo SCHED_HTML::timebox('end', SCHED_HTML::time($this->editor->schedule->options['end'], 0, true, true)); ?>
			</div>
		</div>
		<div class="sched-a-option-hr"></div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Scale</div>
				<div class="sched-a-option-description">
					Select in which scale users see the timetable
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('scale', array(
					array('1', 'Scale Per Hour'),
					array('2', 'Scale Per 1/2 Hour'),
					array('3', 'Scale Per 10 Minutes'),
				), $this->editor->schedule->options['scale']); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Scale Height</div>
				<div class="sched-a-option-description">
					Height of a block in the timetable, minimum <strong>15</strong>. Default: <strong>50</strong>.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::number('scale_height', $this->editor->schedule->options['scale_height']); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Styling</div>
				<div class="sched-a-option-description">
					<strong>All The Same:</strong> All events will have the same color, set the color below. <br /><strong>Per Column:</strong> Events in the same column will have the same color, set the color in the column settings. <br /><strong>Per Event:</strong> Give each event a unique color in the event settings.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('styling', array(
					array('schedule', 'All The Same', '#styling_color_toggle'),
					array('column', 'Per Column', null),
					array('event', 'Per Event', null),
				), $this->editor->schedule->options['styling']); ?>
			</div>
		</div>
		<div id="styling_color_toggle" class="sched-a-checkbox-show">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Event Color</div>
					<div class="sched-a-option-description">
						Only used then <strong>Styling</strong> is set to <strong>All The Same</strong>.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::color('event_color', $this->editor->schedule->options['event_color']); ?>
				</div>
			</div>
		</div>

		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Columns Represent Days</div>
				<div class="sched-a-option-description">
					Enable this checkbox if the columns inside the timetable represent consecutive days, then set the start date of the timetable in the option below. You can now use advanced shortcodes to show upcomming events and current events.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::checkbox('assign_dates_enabled', $this->editor->schedule->options['assign_dates_enabled'], '.sched-modal-content #assign_dates_enabled_toggle_sdf'); ?>
			</div>
		</div>

		<div id="assign_dates_enabled_toggle_sdf" class="sched-a-checkbox-show <?php if($this->editor->schedule->options['assign_dates_enabled'] == 0) { echo 'sched-a-checkbox-hide'; } ?>">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Timetable Start Date</div>
					<div class="sched-a-option-description">
						Enter the date the timetable starts in <strong>YYYY-MM-DD</strong>, so it can automatically assing date's to all events.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::textbox('assign_dates_start', $this->editor->schedule->options['assign_dates_start']); ?>
				</div>
			</div>
		</div>

		<div class="sched-modal-footer">
			<a href="#" class="sched-button sched-button-left sched-button-grey sched-modal-close-button">Cancel &amp; Close</a>
			<a href="<?php echo $this->editor->method('method=delete_schedule'); ?>" class="sched-button sched-button-left sched-button-red" onclick="return confirm('WARNING! You are about to delete this timetable including all columns and events. Continue?')"><i class="fa fa-remove"></i> Delete Timetable</a>
			<input type="submit" class="sched-button sched-button-right" value="Save Changes" />
		</div>
	</form>
</div>