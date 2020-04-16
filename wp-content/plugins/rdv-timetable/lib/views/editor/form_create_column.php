<div class="form-create-column">
	<form action="<?php echo $this->editor->method('method=create_column'); ?>" method="POST" autocomplete="off">
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Title</div>
				<div class="sched-a-option-description">
					Title of the column which will be displayed at the top.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textbox('column_create_title', ''); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Column Description</div>
				<div class="sched-a-option-description">
					Optional column description for inside the tooltip.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textbox('column_create_description', ''); ?>
			</div>
		</div>
		<div class="sched-a-option" style="<?php if($this->editor->schedule->options['styling'] !== 'column') { echo 'display: none;'; } ?>">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Column Color</div>
				<div class="sched-a-option-description">
					Only used if the <strong>Event Color</strong> option in the settings is set to <strong>Per Column</strong>.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::color('column_create_color', '#F00'); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Custom Class</div>
				<div class="sched-a-option-description">
					Optionally give this column a custom class so you can add custom styles.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::textbox('column_create_custom_class', ''); ?>
			</div>
		</div>
		<div class="sched-modal-footer">
			<a href="#" class="sched-button sched-button-left sched-button-grey sched-modal-close-button">Cancel &amp; Close</a>
			<input type="submit" class="sched-button sched-button-right" value="Create Column" />
		</div>
	</form>
</div>