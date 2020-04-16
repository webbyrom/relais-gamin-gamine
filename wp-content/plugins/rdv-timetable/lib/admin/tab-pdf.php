<div class="sched-a-tab-title"><i class="fa fa-cloud-download"></i>Download Button</div>
<div class="sched-a-content">
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Enable Download Button</div>
			<div class="sched-a-option-description">
				Add a button for users to download the schedule.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_pdf_enable', SCHED_DB::get('pdf_enable'), '#sched_toggle_button_enabled'); ?>
			<?php echo SCHED_HTML::popover('pdf_enable'); ?>
		</div>
	</div>
	<div id="sched_toggle_button_enabled">
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Enable Download Button In List View</div>
				<div class="sched-a-option-description">
					Show the button in list view
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::checkbox('sched_pdf_enable_list', SCHED_DB::get('pdf_enable_list')); ?>
				<?php echo SCHED_HTML::popover('pdf_enable_list'); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Download Type</div>
				<div class="sched-a-option-description">
				Type of the downloaded schedule. PDF or HTML. Choose HTML if the PDF export is not working, or if it takes too long.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('sched_pdf_type', array(
					array('html', 'HTML Schedule (Improved Performance)'),
					array('pdf', 'PDF Schedule'),
				), SCHED_DB::get('pdf_type')); ?>
				<?php echo SCHED_HTML::popover('pdf_type'); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Download Button Label</div>
				<div class="sched-a-option-description">
					The label of the download button.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textbox('sched_pdf_label', SCHED_DB::get('pdf_label')); ?>
				<?php echo SCHED_HTML::popover('pdf_label'); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Custom CSS</div>
				<div class="sched-a-option-description">
					Custom CSS for the exported timetable.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textarea('sched_pdf_css', SCHED_DB::get('pdf_css')); ?>
			</div>
		</div>
	</div>
</div>