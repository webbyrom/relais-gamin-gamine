<div class="form-filter">
	<a href="#" class="sched-button sched-form-create-filter-button"><i class="fa fa-plus"></i>Create New Filter Option</a><br /><br />
	<form action="<?php echo $this->editor->method('method=create_filter'); ?>" method="POST" autocomplete="off" style="padding: 16px; background: #eee; display: none; margin-bottom: 16px;" class="sched-form-create-filter">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Label</div>
					<div class="sched-a-option-description">
						Label to filter by that will be shown to the user. Eg: <strong>Comedy</strong>
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::textbox('filter_0_label', ''); ?>
				</div>
			</div>
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Show Events Where</div>
					<div class="sched-a-option-description">
						Events that succeed the following logic will be shown to the user.
					</div>
				</div>
				<div class="sched-a-option-right sched-a-filter-select" data-filter-id="0">
					<!-- <strong>Show events where:</strong><br /> -->
					<select name="filter_0_select_source" style="width: 140px;">
						<option value="title" selected="selected">the title</option>
						<option value="custom_field">a custom field</option>
						<option value="specific_custom_field">the custom field</option>
					</select>
					<select name="filter_0_select_source_custom_field" style="width: 200px; display: none;">
						<option selected="selected" disabled value='0'>Select Custom Field</option>
						<?php foreach($this->editor->schedule->options['meta_fields'] as $i => $meta_field) { ?>
						<option value="<?php echo $meta_field['id']; ?>"><?php echo esc_html($meta_field['title']); ?></option>
						<?php } ?>
					</select>
					<select name="filter_0_select_source_custom_field_line" style="width: 100px; display: none;">
						<option value="line_1" selected="selected">line 1</option>
						<option value="line_2">line 2</option>
						<option value="line_1_or_2">line 1 or 2</option>
					</select>
					<select name="filter_0_select_method" style="width: 120px;">
						<option value="equals" selected="selected">equals</option>
						<option value="not_equals">doesn't equal</option>
						<option value="contains">contains</option>
					</select>
					<div class="sched-textbox" style="width: 120px; display: inline-block;"><input type="text" name="filter_0_select_matches" value=""></div>
				</div>
			</div>
			<input type="submit" class="sched-button" value="Create Filter Option" />
	</form>
	<div class="sched-a-option-hr"></div>
	<form action="<?php echo $this->editor->method('method=update_filter'); ?>" method="POST" autocomplete="off">
		<div class="sched-editor-notification form-filter-notification"><i class="fa fa-warning"></i><span>You need to click "Save Changes" to save your changes.</span></div>
		<input type="hidden" name="filter_edit_order" id="filter_edit_order" value="<?php echo $this->editor->schedule->options['filter_ids']; ?>" />
		<div class="filters_sortable">
			<?php foreach($this->editor->schedule->options['filters'] as $i => $filter) { ?>
				<div class="sched-a-custom-field sched-a-custom-field-visible" data-filter-id="<?php echo $filter['id']; ?>">
					<div class="sched-a-custom-field-title">
						<i class="fa fa-chevron-down sched-a-custom-field-icon"></i>
						<?php echo esc_html($filter['label']); ?>
						<span class="sched-a-custom-field-id-label">#<?php echo $filter['id']; ?></span>
						<i class="fa fa-bars sched-a-custom-field-handle"></i>
					</div>
					<div class="sched-a-custom-field-content">
						<div class="sched-a-option">
							<div class="sched-a-option-left">
								<div class="sched-a-option-title">Label</div>
								<div class="sched-a-option-description">
									Label to filter by that will be shown to the user. Eg: <strong>Comedy</strong>
								</div>
							</div>
							<div class="sched-a-option-right">
								<?php echo SCHED_HTML::textbox('filter_'.((int)$filter['id']).'_label', $filter['label']); ?>
							</div>
						</div>
						<div class="sched-a-option">
							<div class="sched-a-option-left">
								<div class="sched-a-option-title">Show Events Where</div>
								<div class="sched-a-option-description">
									Events that succeed the following logic will be shown to the user.
								</div>
							</div>
							<div class="sched-a-option-right sched-a-filter-select" data-filter-id="<?php echo (int)$filter['id']; ?>">
								<!-- <strong>Show events where:</strong><br /> -->
								<select name="filter_<?php echo (int)$filter['id']; ?>_select_source" style="width: 140px;">
									<option value="title"<?php if($filter['source'] == 'title') { echo ' selected="selected"'; } ?>>the title</option>
									<option value="custom_field"<?php if($filter['source'] == 'custom_field') { echo ' selected="selected"'; } ?>>a custom field</option>
									<option value="specific_custom_field"<?php if($filter['source'] == 'specific_custom_field') { echo ' selected="selected"'; } ?>>the custom field</option>
								</select>
								<select name="filter_<?php echo (int)$filter['id']; ?>_select_source_custom_field" style="width: 200px; display: none;">
									<option disabled value='0'>Select Custom Field</option>
									<?php foreach($this->editor->schedule->options['meta_fields'] as $i => $meta_field) { ?>
									<option value="<?php echo $meta_field['id']; ?>"<?php if($filter['source_custom_field'] == $meta_field['id']) { echo ' selected="selected"'; } ?>><?php echo esc_html($meta_field['title']); ?></option>
									<?php } ?>
								</select>
								<select name="filter_<?php echo (int)$filter['id']; ?>_select_source_custom_field_line" style="width: 100px; display: none;">
									<option value="line_1"<?php if($filter['source_custom_field_line'] == 'line_1') { echo ' selected="selected"'; } ?>>line 1</option>
									<option value="line_2"<?php if($filter['source_custom_field_line'] == 'line_2') { echo ' selected="selected"'; } ?>>line 2</option>
									<option value="line_1_or_2"<?php if($filter['source_custom_field_line'] == 'line_1_or_2') { echo ' selected="selected"'; } ?>>line 1 or 2</option>
								</select>
								<select name="filter_<?php echo (int)$filter['id']; ?>_select_method" style="width: 120px;">
									<option value="equals"<?php if($filter['method'] == 'equals') { echo ' selected="selected"'; } ?>>equals</option>
									<option value="not_equals"<?php if($filter['method'] == 'not_equals') { echo ' selected="selected"'; } ?>>doesn't equal</option>
									<option value="contains"<?php if($filter['method'] == 'contains') { echo ' selected="selected"'; } ?>>contains</option>
								</select>
								<div class="sched-textbox" style="width: 120px; display: inline-block;"><input type="text" name="filter_<?php echo (int)$filter['id']; ?>_select_matches" value="<?php echo esc_attr($filter['matches']); ?>"></div>
							</div>
						</div>
						<div class="sched-a-option">
							<div class="sched-a-option-left">
								<div class="sched-a-option-title">Edit</div>
								<div class="sched-a-option-description">
									
								</div>
							</div>
							<div class="sched-a-option-right">
								<a href="#" class="sched-button sched-button-red sched-form-remove-filter-button" data-filter-id="<?php echo $filter['id']; ?>"><i class="fa fa-times"></i>Remove This Filter Option</a>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="sched-modal-footer">
			<a href="#" class="sched-button sched-button-left sched-button-grey sched-modal-close-button">Cancel &amp; Close</a>
			
			<input type="submit" class="sched-button sched-button-right" value="Save Changes" />
		</div>
	</form>
</div>