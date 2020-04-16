<div class="sched-a-tab-title"><i class="fa fa-list-alt"></i>List View</div>
<div class="sched-a-content">
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Event Styling</div>
			<div class="sched-a-option-description">
				Choose how to style the events in the list.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_list_view_event_bullets', array(
				array('0', 'Default'),
				array('1', 'Show Coloured Bullets On The Left'),
				array('2', 'Show Coloured Event Background'),
			), SCHED_DB::get('list_view_event_bullets')); ?>
			<?php echo SCHED_HTML::popover('list_view_event_bullets'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Event Description</div>
			<div class="sched-a-option-description">
				Show the event description below the title.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_list_view_event_short_description_method', array(
				array('0', 'Do not show'),
				array('short', 'Show the <strong>Short Description</strong> field'),
				array('short_truncated', 'Show 1 line of the <strong>Short Description</strong> field'),
				array('full', 'Show the <strong>Description</strong> field'),
				array('full_truncated', 'Show 1 line of the <strong>Description</strong> field'),
			), SCHED_DB::get('list_view_event_short_description_method')); ?>
			<?php echo SCHED_HTML::popover('list_view_event_short_description_method'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Hide Empty Columns</div>
			<div class="sched-a-option-description">
				Hide the column if it contains no events.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_list_view_hide_empty_columns', SCHED_DB::get('list_view_hide_empty_columns')); ?>
			<?php echo SCHED_HTML::popover('list_view_hide_empty_columns'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Column Title Color</div>
			<div class="sched-a-option-description">
				Text color of the column title.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::color('sched_list_view_column_title_color', SCHED_DB::get('list_view_column_title_color')); ?>
			<?php echo SCHED_HTML::popover('list_view_column_title_color'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Event Color &amp; Hover Color</div>
			<div class="sched-a-option-description">
				Text color of the event title.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::color('sched_list_view_event_title_color', SCHED_DB::get('list_view_event_title_color')); ?>
			<?php echo SCHED_HTML::color('sched_list_view_event_hover_title_color', SCHED_DB::get('list_view_event_hover_title_color')); ?>
			<?php echo SCHED_HTML::popover('list_view_event_title_color', false, 1); ?>
			<?php echo SCHED_HTML::popover('list_view_event_hover_title_color'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Event Title Bold</div>
			<div class="sched-a-option-description">
				Make the event title bold. Recommended when showing the event description.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_list_view_event_title_bold', SCHED_DB::get('list_view_event_title_bold')); ?>
			<?php echo SCHED_HTML::popover('list_view_event_title_bold'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Event Description Color</div>
			<div class="sched-a-option-description">
				Text color of the event description.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::color('sched_list_view_event_description_color', SCHED_DB::get('list_view_event_description_color')); ?>
			<?php echo SCHED_HTML::popover('list_view_event_description_color'); ?>
		</div>
	</div>
</div>