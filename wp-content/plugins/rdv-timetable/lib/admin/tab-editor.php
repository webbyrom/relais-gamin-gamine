<div class="sched-a-tab-title"><i class="fa fa-edit"></i>Editor Settings</div>
<div class="sched-a-content">
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Editor Quick Tooltips</div>
			<div class="sched-a-option-description">
				Show quick tooltips to quickly change time, column and title when hovering over event.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_editor_quick_tooltips', SCHED_DB::get('editor_quick_tooltips')); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Time Picker Increments</div>
			<div class="sched-a-option-description">
				Select the scale of the timepickers in the editor.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_editor_timepicker_increments', array(
				array('1', '1 Minute'),
				array('5', '5 Minutes'),
				array('10', '10 Minutes'),
				array('15', '15 Minutes'),
				array('30', '30 Minutes'),
				array('60', '60 Minutes'),
			), SCHED_DB::get('editor_timepicker_increments')); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Editor Background</div>
			<div class="sched-a-option-description">
				Background color of the timetable editor. Default: <strong>#f5f5f5</strong>.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::color('sched_editor_bg', SCHED_DB::get('editor_bg')); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Editor Animations</div>
			<div class="sched-a-option-description">
				Show animations in the editor.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_animations_editor', SCHED_DB::get('animations_editor')); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Custom CSS</div>
			<div class="sched-a-option-description">
				Load custom css in the editor.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_editor_custom_css', SCHED_DB::get('editor_custom_css')); ?>
		</div>
	</div>
</div>