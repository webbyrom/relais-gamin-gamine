<div class="sched-a-tab-title"><i class="fa fa-mobile"></i>Mobile</div>
<div class="sched-a-content">
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">When Width Is Too Small</div>
			<div class="sched-a-option-description">
			Change appearance of columns when their width is too small.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_column_break_action', array(
				array('0', 'Do Nothing'),
				array('stack', 'Stack Columns', '#sched_toggle_column_break_stack'),
				array('list', 'Change To List View', '#sched_toggle_column_break_list'),
			), SCHED_DB::get('column_break_action')); ?>
			<?php echo SCHED_HTML::popover('column_break_action'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Width Break Point</div>
			<div class="sched-a-option-description">
				The minimum width for a column, after this change the appearance
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::number('sched_column_break_width', SCHED_DB::get('column_break_width')); ?>
			<?php echo SCHED_HTML::popover('column_break_width'); ?>
		</div>
	</div>
	<!-- <div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Stack Columns When Width Is Too Small</div>
			<div class="sched-a-option-description">
				Stack columns on top of each other when their width is too small.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_column_break', SCHED_DB::get('column_break'), '#sched_toggle_column_break'); ?>
			<?php echo SCHED_HTML::popover('column_break'); ?>
		</div>
	</div> -->
	<div id="sched_toggle_column_break_stack">
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Hide Sidebar When Stacking</div>
				<div class="sched-a-option-description">
					Hide the time sidebar when stacking columns.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::checkbox('sched_column_break_hide_sidebar', SCHED_DB::get('column_break_hide_sidebar')); ?>
				<?php echo SCHED_HTML::popover('column_break_hide_sidebar'); ?>
			</div>
		</div>
	</div>
	<div id="sched_toggle_column_break_list">
		
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Enable Animations For Mobile</div>
			<div class="sched-a-option-description">
				Use animations in mobile browsers.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_animations_mobile', SCHED_DB::get('animations_mobile')); ?>
			<?php echo SCHED_HTML::popover('animations_mobile'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Show Tooltips For Mobile</div>
			<div class="sched-a-option-description">
				Show the <strong>EVENT TOOLTIP</strong> and/or <strong>COLUMN TOOLTIP</strong> on mobile browsers. Users will have to tap twice to open the event popup.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_tooltips_mobile', SCHED_DB::get('tooltips_mobile')); ?>
			<?php echo SCHED_HTML::popover('tooltips_mobile'); ?>
		</div>
	</div>
</div>