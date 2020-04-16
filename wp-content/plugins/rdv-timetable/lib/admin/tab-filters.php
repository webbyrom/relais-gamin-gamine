<div class="sched-a-tab-title"><i class="fa fa-filter"></i>Filters</div>
<div class="sched-a-content">
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Show Filter To Users</div>
			<div class="sched-a-option-description">
				Show the filter dropdown. Handy feature to turn off when setting the filter in the shortcode for example.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_filter_visible', SCHED_DB::get('filter_visible')); ?>
			<?php echo SCHED_HTML::popover('filter_visible'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Allow Multiple Options</div>
			<div class="sched-a-option-description">
				Allow users to check multiple options in the filter dropdown.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_filter_multiple', SCHED_DB::get('filter_multiple')); ?>
			<?php echo SCHED_HTML::popover('filter_multiple'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Filter Dropdown Width</div>
			<div class="sched-a-option-description">
				Width of the filter dropdown. 
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::number('sched_filter_dropdown_width', SCHED_DB::get('filter_dropdown_width')); ?>
			<?php echo SCHED_HTML::popover('filter_dropdown_width'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Filter Dropdown Hover Width</div>
			<div class="sched-a-option-description">
				Width of the filter dropdown upon hover. 
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::number('sched_filter_dropdown_hover_width', SCHED_DB::get('filter_dropdown_hover_width')); ?>
			<?php echo SCHED_HTML::popover('filter_dropdown_hover_width'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Hidden Events Style</div>
			<div class="sched-a-option-description">
				Select what to do with events that are be hidden because of the filter.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_filter_hidden_events', array(
				array('hide', 'Hide Them Completely', 'null'),
				array('opacity', 'Change Opacity', '#sched_filter_hidden_events_toggle_opacity'),
			), SCHED_DB::get('filter_hidden_events')); ?>
			<?php echo SCHED_HTML::popover('filter_hidden_events'); ?>
		</div>
	</div>
	<div id="sched_filter_hidden_events_toggle_opacity">
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Hidden Events Opacity</div>
				<div class="sched-a-option-description">
					Opacity percentage of hidden events. 0% is completely hidden.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::number('sched_filter_hidden_events_opacity', SCHED_DB::get('filter_hidden_events_opacity'), '', 0, 100, 5, ' %'); ?>
				<?php echo SCHED_HTML::popover('filter_hidden_events_opacity'); ?>
			</div>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Filter Dropdown Label</div>
			<div class="sched-a-option-description">
				The label on the left of the filter dropdown. Eg: <strong>Music Genre:</strong>. If left blank the label will be hidden. 
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::textbox('sched_filter_dropdown_label', SCHED_DB::get('filter_dropdown_label')); ?>
			<?php echo SCHED_HTML::popover('filter_dropdown_label'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Filter Show All Text</div>
			<div class="sched-a-option-description">
				Text to display when showing all events. Eg: <strong>All Genre's</strong>
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::textbox('sched_filter_dropdown_show_all_label', SCHED_DB::get('filter_dropdown_show_all_label')); ?>
			<?php echo SCHED_HTML::popover('filter_dropdown_show_all_label'); ?>
		</div>
	</div>
</div>