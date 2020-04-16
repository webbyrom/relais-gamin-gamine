<div class="sched-a-tab-title"><i class="fa fa-ellipsis-h"></i>Horizontal View</div>
<div class="sched-a-content">
	<?php if($this->addon_horizontal) { ?>

	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Display Time Indicator</div>
			<div class="sched-a-option-description">
				Display the time above the timetable.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_h_time_indicator', SCHED_DB::get('h_time_indicator')); ?>
			<?php echo SCHED_HTML::popover('h_time_indicator'); ?>
		</div>
	</div>

	<div class="sched-a-option-hr"></div>

	
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Row Height</div>
			<div class="sched-a-option-description">
				Height of each row.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::number('sched_h_row_height', SCHED_DB::get('h_row_height')); ?>
			<?php echo SCHED_HTML::popover('h_row_height'); ?>
		</div>
	</div>

	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Sidebar Width</div>
			<div class="sched-a-option-description">
				Width of the sidebar showing the column titles in pixels. Recommended: <strong>200</strong>.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::number('sched_h_column_width', SCHED_DB::get('h_column_width')); ?>
			<?php echo SCHED_HTML::popover('h_column_width'); ?>
		</div>
	</div>

	<div class="sched-a-option-hr"></div>

	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Column Title Multiline</div>
			<div class="sched-a-option-description">
				If enabled, the full title will show. Else it's limited to only 1 line.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_h_column_multiline', SCHED_DB::get('h_column_multiline')); ?>
			<?php echo SCHED_HTML::popover('h_column_multiline'); ?>
		</div>
	</div>

	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Column Title Vertical Position</div>
			<div class="sched-a-option-description">
				Vertical text alignment.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_h_column_title_position', array(
				array('top', 'Top'),
				array('middle', 'Middle (not possible for multiline)'),
			), SCHED_DB::get('h_column_title_position')); ?>
			<?php echo SCHED_HTML::popover('h_column_title_position'); ?>
		</div>
	</div>

	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Column Title Horizontal Align</div>
			<div class="sched-a-option-description">
				Horizontal text alignment.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_h_column_title_align', array(
				array('left', 'Left'),
				array('center', 'Center'),
				array('right', 'Right'),
			), SCHED_DB::get('h_column_title_align')); ?>
			<?php echo SCHED_HTML::popover('h_column_title_align'); ?>
		</div>
	</div>

	<div class="sched-a-option-hr"></div>

	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Collapse To List View On Smaller Screens</div>
			<div class="sched-a-option-description">
				Change appearance of timetable to list view when the width is too small.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_h_break', SCHED_DB::get('h_break'), '#sched-toggle-h-break'); ?>
			<?php echo SCHED_HTML::popover('h_break'); ?>
		</div>
	</div>

	<div id="sched-toggle-h-break">
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Collapse Min Width</div>
				<div class="sched-a-option-description">
					The minimum width for a timetable (excl. sidebar width), after this change the appearance to list view.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::number('sched_h_width_break_point', SCHED_DB::get('h_width_break_point')); ?>
				<?php echo SCHED_HTML::popover('h_width_break_point'); ?>
			</div>
		</div>
	</div>

	<div class="sched-a-option-hr"></div>

	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Background Color</div>
			<div class="sched-a-option-description">
				Background color behind the events.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::color('sched_h_bg_color', SCHED_DB::get('h_bg_color')); ?>
			<?php echo SCHED_HTML::popover('h_bg_color'); ?>
		</div>
	</div>

	<!-- <div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Time Indicator Height</div>
			<div class="sched-a-option-description">
				Height of the time indicator. Recommended: <strong>30</strong>
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::number('sched_h_time_indicator_height', SCHED_DB::get('h_time_indicator_height')); ?>
			<?php echo SCHED_HTML::popover('h_time_indicator_height'); ?>
		</div>
	</div> -->

	<?php }else { ?>

	<a href="http://rikdevos.com/demos/wordpress-responsive-timetable/horitontal-addon/" target="_blank" style="border: none; display: block;"><img src="<?php echo plugins_url('img/timetable-addon-purchase.jpg', SCHED_FILE); ?>" alt="Purchase Addon" style="width: 570px;" /></a>

	<a href="http://rikdevos.com/demos/wordpress-responsive-timetable/horitontal-addon/" target="_blank" class="sched-button">Purchase Addon</a> <a href="#" class="sched-button">View Demo</a>

	<p><a href="admin.php?page=sched-schedule&amp;tab=help">Already Purchased? Read how to install.</a></p>

	<?php } ?>

</div>