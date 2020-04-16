<div class="sched-a-tab-title"><i class="fa fa-globe"></i>Upcoming View</div>
<div class="sched-a-content">
	<div class="sched-a-note"><i class="fa fa-exclamation-triangle"></i> You need to have the option &quot;COLUMNS REPRESENT DAYS&quot; checked in the Timetable Settings of the timetable you wish to use this view for.</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Maximum Amount</div>
			<div class="sched-a-option-description">
				Do not show more events than this amount.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::number('sched_upcoming_limit', SCHED_DB::get('upcoming_limit'), '', 1, 100, 1, ''); ?>
			<?php echo SCHED_HTML::popover('upcoming_limit'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Show Events</div>
			<div class="sched-a-option-description">
				Only show events that start after this value.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_upcoming_type', array(
				array('current_date', 'That started today, or in the future.', 'null'),
				array('current_datetime', 'That start right now, or in the future.', 'null'),
				array('custom', 'That happen after a custom date &amp; time.', '#sched_upcoming_type_toggle'),
			), SCHED_DB::get('upcoming_type')); ?>
			<?php echo SCHED_HTML::popover('upcoming_type'); ?>
		</div>
	</div>
	<div id="sched_upcoming_type_toggle">
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Custom Date &amp; Time</div>
				<div class="sched-a-option-description">
					Only show the events that happen on or after this date. Format YYYY:MM:DD HH:MM
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textbox('sched_upcoming_custom', SCHED_DB::get('upcoming_custom')); ?>
				<?php echo SCHED_HTML::popover('upcoming_custom'); ?>
			</div>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Title</div>
			<div class="sched-a-option-description">
				Choose what to use as title
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_upcoming_title', array(
				array('timetable_title', 'Timetable Title', 'null'),
				array('custom', 'Use Custom Title', '#sched_upcoming_title_toggle'),
			), SCHED_DB::get('upcoming_title')); ?>
			<?php echo SCHED_HTML::popover('upcoming_title'); ?>
		</div>
	</div>
	<div id="sched_upcoming_title_toggle">
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Custom Title</div>
				<div class="sched-a-option-description">
					Enter a custom title.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textbox('sched_upcoming_title_custom', SCHED_DB::get('upcoming_title_custom')); ?>
				<?php echo SCHED_HTML::popover('upcoming_title_custom'); ?>
			</div>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Show Event Amount</div>
			<div class="sched-a-option-description">
				Show the number of future events.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_upcoming_title_amount', SCHED_DB::get('upcoming_title_amount')); ?>
			<?php echo SCHED_HTML::popover('upcoming_title_amount'); ?>
		</div>
	</div>
</div>