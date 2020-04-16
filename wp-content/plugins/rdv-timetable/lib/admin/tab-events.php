<div class="sched-a-tab-title"><i class="fa fa-square"></i>Events</div>
<div class="sched-a-content">
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Event Box Style</div>
			<div class="sched-a-option-description">
				Select a style for the event boxes inside the timetable.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_event_box_style', array(
				array(1, '<img class="sched-a-option-img" style="height:99px;" src="'.plugins_url('img/admin-event-type-1.png', SCHED_FILE).'" />', '#sched_event_box_fixed_text_color_toggle'),
				array(2, '<img class="sched-a-option-img" style="height:99px;" src="'.plugins_url('img/admin-event-type-2.png', SCHED_FILE).'" />', 'null'),
			), SCHED_DB::get('event_box_style')); ?>
			<?php echo SCHED_HTML::popover('event_box_style'); ?>
		</div>
	</div>
	<div id="sched_event_box_fixed_text_color_toggle">
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Event Hover Color</div>
				<div class="sched-a-option-description">
					Change the color of the event when hovering over it.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('sched_event_hover_color', array(
					array('0', 'Do Not Change', 'null'),
					array('lighten', 'Lighten Background', 'null'),
					array('darken', 'Darken Background', 'null'),
					array('custom', 'Custom Colors', '#sched_event_hover_color_toggle')
				), SCHED_DB::get('event_hover_color')); ?>
				<?php echo SCHED_HTML::popover('event_hover_color'); ?>
			</div>
		</div>
		<div id="sched_event_hover_color_toggle">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Event Hover Text &amp; Background Color</div>
					<div class="sched-a-option-description">
						Set custom colors of the event when hovering over it.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::color('sched_event_hover_text_color', SCHED_DB::get('event_hover_text_color')); ?>
					<?php echo SCHED_HTML::color('sched_event_hover_background_color', SCHED_DB::get('event_hover_background_color')); ?>
					<?php echo SCHED_HTML::popover('event_hover_text_color', false, 1); ?>
					<?php echo SCHED_HTML::popover('event_hover_background_color'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Width Of Event Box Before Removing Padding</div>
				<div class="sched-a-option-description">
					The minimum width for a column. After this the padding of the event box will be removed so there's more space for the title. Default: <strong>110</strong>
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::number('sched_event_box_padding_break', SCHED_DB::get('event_box_padding_break')); ?>
				<?php echo SCHED_HTML::popover('event_box_padding_break'); ?>
			</div>
		</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Event Box Text</div>
			<div class="sched-a-option-description">
				Text color of inside the event box.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::color('sched_event_box_text_color', SCHED_DB::get('event_box_text_color')); ?>
			<?php echo SCHED_HTML::popover('event_box_text_color'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Event Box Text Align</div>
			<div class="sched-a-option-description">
				Alignment of text within the event box.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_event_box_text_align', array(
				array('left', 'Left'),
				array('center', 'Center'),
				array('right', 'Right'),
			), SCHED_DB::get('event_box_text_align')); ?>
			<?php echo SCHED_HTML::popover('event_box_text_align'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Event Box Truncate Title</div>
			<div class="sched-a-option-description">
				Truncate the title to fit on one line.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_event_box_truncate_title', SCHED_DB::get('event_box_truncate_title')); ?>
			<?php echo SCHED_HTML::popover('event_box_truncate_title'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Event Box Time</div>
			<div class="sched-a-option-description">
				Show the start &amp; end time in the box of the event.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_event_box_time', SCHED_DB::get('event_box_time')); ?>
			<?php echo SCHED_HTML::popover('event_box_time'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Event Box Description</div>
			<div class="sched-a-option-description">
				Alignment of text within the event box.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_event_box_description_method', array(
				array('0', 'Do not show'),
				array('short', 'Show the <strong>Short Description</strong> field'),
				array('short_truncated', 'Show 1 line of the <strong>Short Description</strong> field'),
				array('full', 'Show the <strong>Description</strong> field'),
				array('full_truncated', 'Show 1 line of the <strong>Description</strong> field'),
			), SCHED_DB::get('event_box_description_method')); ?>
			<?php echo SCHED_HTML::popover('event_box_description_method'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Event Tooltip</div>
			<div class="sched-a-option-description">
				Display a tooltip when hovering over the event.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_event_tooltip', SCHED_DB::get('event_tooltip'), '#sched_toggle_event_tooltip'); ?>
			<?php echo SCHED_HTML::popover('event_tooltip'); ?>
		</div>
	</div>
	<div id="sched_toggle_event_tooltip">
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Event Tooltip Title</div>
				<div class="sched-a-option-description">
					Show the event title inside the tooltip.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::checkbox('sched_event_tooltip_title', SCHED_DB::get('event_tooltip_title')); ?>
				<?php echo SCHED_HTML::popover('event_tooltip_title'); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Event Tooltip Time</div>
				<div class="sched-a-option-description">
					Show the time inside the tooltip.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::checkbox('sched_event_tooltip_time', SCHED_DB::get('event_tooltip_time')); ?>
				<?php echo SCHED_HTML::popover('event_tooltip_time'); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Event Tooltip Description</div>
				<div class="sched-a-option-description">
					Show the <strong>Short Description</strong> inside the tooltip.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::checkbox('sched_event_tooltip_description', SCHED_DB::get('event_tooltip_description')); ?>
				<?php echo SCHED_HTML::popover('event_tooltip_description'); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Event Tooltip Width</div>
				<div class="sched-a-option-description">
					Set the width of the tooltip.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('sched_event_tooltip_width_type', array(
					array('event', 'Same As event'),
					array('custom', 'Use Custom Width')
				), SCHED_DB::get('event_tooltip_width_type')); ?>
				<?php echo SCHED_HTML::number('sched_event_tooltip_width', SCHED_DB::get('event_tooltip_width'), '', 0, 10000, 1); ?>
				<?php echo SCHED_HTML::popover(false, '[... event_tooltip_width_type="'.SCHED_DB::get('event_tooltip_width_type').'" event_tooltip_width="'.SCHED_DB::get('event_tooltip_width').'" ...]'); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Event Tooltip Custom Color</div>
				<div class="sched-a-option-description">
					Select a custom color for event tooltips instead of matching the event color.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('sched_event_tooltip_color_type', array(
					array('event', 'Match Event Color'),
					array('custom', 'Use Custom Color', '#sched_event_tooltip_custom_color'),
				), SCHED_DB::get('event_tooltip_color_type')); ?>
				<?php echo SCHED_HTML::popover('event_tooltip_color_type'); ?>
			</div>
		</div>
		<div id="sched_event_tooltip_custom_color">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Event Tooltip Background</div>
					<div class="sched-a-option-description">
						Background color of the tooltip.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::color('sched_event_tooltip_color_bg', SCHED_DB::get('event_tooltip_color_bg')); ?>
					<?php echo SCHED_HTML::popover('event_tooltip_color_bg'); ?>
				</div>
			</div>
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Event Tooltip Text</div>
					<div class="sched-a-option-description">
						Text color of the tooltip.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::color('sched_event_tooltip_color_text', SCHED_DB::get('event_tooltip_color_text')); ?>
					<?php echo SCHED_HTML::popover('event_tooltip_color_text'); ?>
				</div>
			</div>
		</div><!-- #sched_event_tooltip_custom_color -->
	</div><!-- #sched_toggle_event_tooltip -->
</div>