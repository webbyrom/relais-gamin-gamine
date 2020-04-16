<div class="form-meta-fields">
	<a href="#" class="sched-button sched-form-create-meta-field-button"><i class="fa fa-plus"></i>Create New Custom Field</a><br /><br />
	<form action="<?php echo $this->editor->method('method=create_meta'); ?>" method="POST" autocomplete="off" style="padding: 16px; background: #eee; display: none; margin-bottom: 16px;" class="sched-form-create-meta-field">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Custom Field Title</div>
					<div class="sched-a-option-description">
						Enter a title for the custom field.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::textbox('meta_field_create_title', ''); ?>
				</div>
			</div>
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Custom Field Icon</div>
					<div class="sched-a-option-description">
						What to do when the event is click in the timetable.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::radio('meta_field_create_icon_enabled', array(
						array('0', 'Disable Icon', 'null'),
						array('1', 'Enable Custom Field Icon', '#meta_field_create_choose_icon'),
					), '0'); ?>
				</div>
			</div>
			<div id="meta_field_create_choose_icon" class="sched-a-checkbox-show">
				<div class="sched-a-option">
					<div class="sched-a-option-left">
						<div class="sched-a-option-title">Custom Field Icon</div>
						<div class="sched-a-option-description">
							Select an icon for the custom field.
						</div>
					</div>
					<div class="sched-a-option-right">
						<div class="sched-a-iconpicker" style="">
							<span class="input-group-addon" style=""></span>
							<input type="text" class="form-control input-icon" name="meta_field_create_icon" id="meta_field_create_icon" value="clock-o" style="" />
						</div>
					</div>
				</div>
			</div>
			<input type="submit" class="sched-button" value="Create Custom Field" />
	</form>
	<div class="sched-a-option-hr"></div>
	<form action="<?php echo $this->editor->method('method=update_meta'); ?>" method="POST" autocomplete="off">
		<div class="sched-editor-notification form-meta-field-notification"><i class="fa fa-warning"></i><span>You need to click "Save Changes" to save your changes.</span></div>
		<input type="hidden" name="meta_edit_order" id="meta_edit_order" value="<?php echo $this->editor->schedule->options['meta_field_ids']; ?>" />
		<div class="meta_fields_sortable">
			<?php foreach($this->editor->schedule->options['meta_fields'] as $i => $meta_field) {
			$id = 'meta_edit_'.$meta_field['id'];
			$title = 'My Meta';
			$enabled = 1;
			//$url_field = 0;
			$icon = 'fa-info-circle';
			$icon_enabled = 1;
			$index = $i;
			?>
			<div class="sched-a-custom-field sched-a-custom-field-visible" data-meta-field-id="<?php echo $meta_field['id']; ?>">
				<div class="sched-a-custom-field-title">
					<!-- <i class="fa fa-chevron-up"></i>
					<i class="fa fa-chevron-down"></i> -->
					<?php if($meta_field['icon_enabled'] == 1) { ?>
					<i class="fa fa-<?php echo esc_attr($meta_field['icon']); ?> sched-a-custom-field-icon"></i>
					<?php } ?>
					<?php echo esc_html($meta_field['title']); ?>
					<i class="fa fa-bars sched-a-custom-field-handle"></i>
				</div>
				<div class="sched-a-custom-field-content">
					<div class="sched-a-option">
						<div class="sched-a-option-left">
							<div class="sched-a-option-title">Edit</div>
							<div class="sched-a-option-description">
								
							</div>
						</div>
						<div class="sched-a-option-right">
							<a href="#" class="sched-button sched-button-red sched-form-remove-meta-field-button" data-meta-field-id="<?php echo $meta_field['id']; ?>"><i class="fa fa-times"></i>Remove This Custom Field</a>
						</div>
					</div>
					<div class="sched-a-option">
						<div class="sched-a-option-left">
							<div class="sched-a-option-title">Custom Field Title</div>
							<div class="sched-a-option-description">
								Enter a title for the custom field.
							</div>
						</div>
						<div class="sched-a-option-right">
							<?php echo SCHED_HTML::textbox($id.'_title', $meta_field['title']); ?>
						</div>
					</div>
					<div class="sched-a-option">
						<div class="sched-a-option-left">
							<div class="sched-a-option-title">Custom Field Icon</div>
							<div class="sched-a-option-description">
								What to do when the event is click in the timetable.
							</div>
						</div>
						<div class="sched-a-option-right">
							<?php echo SCHED_HTML::radio($id.'_icon_enabled', array(
								array('0', 'Disable Icon', 'null'),
								array('1', 'Enable Custom Field Icon', '#'.$id.'_meta_field_choose_icon'),
							), $meta_field['icon_enabled']); ?>
						</div>
					</div>
					<div id="<?php echo $id; ?>_meta_field_choose_icon" class="sched-a-checkbox-show">
						<div class="sched-a-option">
							<div class="sched-a-option-left">
								<div class="sched-a-option-title">Custom Field Icon</div>
								<div class="sched-a-option-description">
									Select an icon for the custom field.
								</div>
							</div>
							<div class="sched-a-option-right">
								
								<div class="sched-a-iconpicker" style="">
									<span class="input-group-addon" style=""></span>
									<input type="text" class="form-control input-icon" name="<?php echo $id.'_icon'; ?>" id="<?php echo $id.'_icon'; ?>" value="<?php echo esc_attr($meta_field['icon']); ?>" style="" />
								</div>
							</div>
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