<div class="sched-a-custom-field <?php if($event_meta_enabled == 1) { echo 'sched-a-custom-field-visible'; } ?>">
	<div class="sched-a-custom-field-title">
		<!-- <i class="fa fa-chevron-up"></i>
		<i class="fa fa-chevron-down"></i> -->
		<i class="fa fa-<?php echo esc_html($icon); ?> sched-a-custom-field-icon"></i>
		<?php echo esc_html($title); ?>
		<i class="fa fa-eye-slash"></i>
		<i class="fa fa-eye"></i>
	</div>
	<div class="sched-a-custom-field-content">
		<div class="sched-a-option-title">Enable Custom Field</div>
		<?php echo SCHED_HTML::checkbox($id.'_enable', $event_meta_enabled, '.'.$id.'_panel'); ?><br /><br />

		
		<div class="sched-a-option-title">Custom Field Line 1</div>
		<div class="sched-clear">
			<div style="width: 60%; float: left;">
				<?php echo SCHED_HTML::textbox($id.'_line_1', $event_meta_line_1); ?>
			</div>
			<select class="sched-select sched-a-custom-field-select-automatic" onchange="jQuery(this).siblings('div').find('input').val(jQuery(this).val())" style="width: 35%; float: right;">
				<option selected="selected" disabled value=''>Select Automatic</option>
				<option value="{custom_field_title}">Custom Field Title</option>
				<option value="{column_title}">Column Title</option>
				<option value="{event_title}">Event Title</option>
				<option value="{time}">Time</option>
				<option value="{start_time}">Start Time</option>
				<option value="{end_time}">End Time</option>
			</select>
		</div>

		<div class="sched-a-option-title">Custom Field Line 2</div>
		<div class="sched-clear">
			<div style="width: 60%; float: left;">
				<?php echo SCHED_HTML::textbox($id.'_line_2', $event_meta_line_2); ?>
			</div>
			<select class="sched-select sched-a-custom-field-select-automatic" onchange="jQuery(this).siblings('div').find('input').val(jQuery(this).val())" style="width: 35%; float: right;">
				<option selected="selected" disabled value=''>Select Automatic</option>
				<option value="{custom_field_title}">Custom Field Title</option>
				<option value="{column_title}">Column Title</option>
				<option value="{event_title}">Event Title</option>
				<option value="{time}">Time</option>
				<option value="{start_time}">Start Time</option>
				<option value="{end_time}">End Time</option>
			</select>
		</div>
	</div>
</div>
<?php /*

<div class="panel panel-default">
	<div class="panel-heading">
		<strong style="width: 100px; text-align: right; display: inline-block; margin-right: 30px;">Meta Field</strong>
		<strong style="width: 352px; display: inline-block; font-weight: normal"><?php echo esc_html($title); ?></strong>
		<?php echo SCHED_HTML::checkbox($id.'_enable', $event_meta_enabled, '.'.$id.'_panel'); ?>
	</div>
	<div class="panel-body <?php echo $id.'_panel'; ?>"<?php if($event_meta_enabled == 0) { echo ' style="display: none;"'; } ?>>
		<div class="form-group">
			<label class="col-lg-2 control-label">Icon</label>
			<div class="col-lg-6">
				<?php if($icon_enabled == 1) { ?>
				<i class="fa fa-<?php echo esc_html($icon); ?>" style="font-size: 24px; line-height: 43px;"></i>
				<?php }else { ?>
				<em style="line-height: 43px;">Icon Disabled</em>
				<?php } ?>
			</div>
			<div class="col-lg-4">
				<p class="well">Change this in the meta settings.</p>
			</div>
		</div>
		<div class="form-group">
			<label for="<?php echo $id.'_line_1'; ?>" class="col-lg-2 control-label">Meta Line 1</label>
			<div class="col-lg-6 meta_field_fill">
				<input type="text" class="form-control" name="<?php echo $id.'_line_1'; ?>" id="<?php echo $id.'_line_1'; ?>" value="<?php echo esc_attr($event_meta_line_1); ?>">
				<?php include 'editor.meta_field_fill_dropdown.php'; ?>
			</div>
			<div class="col-lg-4">
				<p class="well">Line 1 of meta field.</p>
			</div>
		</div>
		<div class="form-group">
			<label for="<?php echo $id.'_line_2'; ?>" class="col-lg-2 control-label">Meta Line 2</label>
			<div class="col-lg-6 meta_field_fill">
				<input type="text" class="form-control" name="<?php echo $id.'_line_2'; ?>" id="<?php echo $id.'_line_2'; ?>" value="<?php echo esc_attr($event_meta_line_2); ?>">
				<?php include 'editor.meta_field_fill_dropdown.php'; ?>
			</div>
			<div class="col-lg-4">
				<p class="well">Line 2 of meta field. Leave blank to hide.</p>
			</div>
		</div>
	</div>
</div>*/ ?>