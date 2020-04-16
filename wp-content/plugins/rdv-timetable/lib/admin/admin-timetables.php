<div class="sched-admin">
	<!-- <form action="admin.php?page=sched-schedule-timetables" data-original-action="admin.php?page=sched-schedule-timetables" class="sched-a-form" method="POST"> -->
		<?php wp_nonce_field(SCHED_BASE, 'sched_nonce'); ?>
		<input type="hidden" name="sched_action" value="save_changes" />
		<div class="sched-a sched-a-timetables">
			<div class="sched-a-header">
				<div class="sched-a-header-lines">
					<div class="sched-a-header-line" style="background: #a0cecb"></div>
					<div class="sched-a-header-line" style="background: #e8ce4d"></div>
					<div class="sched-a-header-line" style="background: #8067b7"></div>
					<div class="sched-a-header-line" style="background: #d8334a"></div>
					<div class="sched-a-header-line" style="background: #3c383d"></div>
				</div>
				<div class="sched-a-header-text">
					<div class="sched-a-title">Responsive Timetable for Wordpress</div>
					<strong>Version <?php $plugin  = get_plugin_data(SCHED_FILE); echo $plugin['Version']; ?></strong>
					<a href="<?php echo plugins_url('documentation.pdf', SCHED_FILE ); ?>" target="_blank" style="top: 12px;">Documentation</a>
					<a href="http://codecanyon.net/user/RikdeVos?ref=RikdeVos#message" target="_blank" style="bottom: 10px;">Support</a>
				</div>
			</div>
			<?php
			// if(isset($_GET['notification'])) {
			// 	$this->add_notification($_GET['notification']);
			// }
			if(isset($_GET['notification']) && $_GET['notification'] == 'Timetable duplicated') {
				$this->add_notification('The timetable has been duplicated.');
			}
			?>
			<?php $this->print_notifications(); ?>
			<div class="sched-a-tab" id="sched-a-tab-timetables" style="display: <?php echo (!isset($_GET['sched-tab']) || $_GET['sched-tab'] == 'timetables') ? 'block' : 'none'; ?>;">
				<div class="sched-a-tab-title"><i class="fa fa-calendar"></i>Timetables<a href="<?php echo wp_nonce_url('admin.php?page=sched-schedule-timetables&sched-tab=import-timetable', SCHED_BASE, 'sched_nonce_create_schedule'); ?>" class="sched-button sched-button-purple" style="right: 200px;"><i class="fa fa-cloud-upload"></i>Import Timetable</a><a href="<?php echo wp_nonce_url('admin.php?page=sched-schedule&amp;tab=timetables&amp;sched_action=create_schedule', SCHED_BASE, 'sched_nonce_create_schedule'); ?>" class="sched-button"><i class="fa fa-plus"></i>Create Timetable</a></div>



				<div class="sched-a-content">
					<div class="sched-a-timetables">
						<?php $j = 1; foreach(SCHED_DB::get_schedules(true) as $schedule) { $j++; ?>
						<div class="sched-a-timetable"<?php if($j%2 == 1) { echo ' style="background: #f8f8f8;"'; } ?>>
							<div class="sched-a-timetable-col sched-a-timetable-col-1">
								<div class="sched-a-timetable-top"><a href="<?php echo admin_url('admin.php?page=sched-schedule-timetables&sched-tab=edit-timetable&id='.$schedule['id']); ?>"><?php echo esc_html($schedule['name']); ?></a></div>
								<div class="sched-a-timetable-bottom">Last Edit: <?php echo date(get_option('date_format').' '.get_option('time_format'), $schedule['edited_at']); ?></div>
							</div>
							<div class="sched-a-timetable-col sched-a-timetable-col-2">
								<div class="sched-a-timetable-top"><?php echo count($schedule['columns']); ?></div>
								<div class="sched-a-timetable-bottom">Columns</div>
							</div>
							<div class="sched-a-timetable-col sched-a-timetable-col-3">
								<div class="sched-a-timetable-top"><?php $i = 0; foreach($schedule['columns'] as $col) { $i += count($col['events']); } echo $i; ?></div>
								<div class="sched-a-timetable-bottom">Events</div>
							</div>
							<div class="sched-a-timetable-col sched-a-timetable-col-4">

								<div class="sched-a-drop">
									<div class="sched-a-drop-icon"><i class="fa fa-ellipsis-h"></i></div>
									<ul class="sched-a-drop-content">
									
										<li><a href="<?php echo admin_url('admin.php?page=sched-schedule-timetables&sched-tab=export-timetable&id='.$schedule['id']); ?>"><i class="fa fa-cloud-download"></i>Export</a></li>
										<li><a href="<?php echo admin_url('admin.php?page=sched-schedule-timetables&sched-tab=edit-timetable&method=duplicate_schedule&id='.$schedule['id']); ?>"><i class="fa fa-files-o"></i>Duplicate</a></li>
										<li><a href="<?php echo admin_url('admin.php?page=sched-schedule-timetables&sched-tab=edit-timetable&method=delete_schedule&id='.$schedule['id']); ?>" onclick="return confirm('WARNING! You are about to delete this timetable including all columns and events. Continue?')"><i class="fa fa-times"></i>Delete</a></li>
									</ul>
								</div>
								<a href="<?php echo admin_url('admin.php?page=sched-schedule-timetables&sched-tab=edit-timetable&id='.$schedule['id']); ?>" class="sched-button"><i class="fa fa-edit"></i> Edit Timetable</a>
								

							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php if(isset($_GET['sched-tab']) && $_GET['sched-tab'] == 'export-timetable') { ?>

			<div class="sched-a-tab" style="display: block;">
				<div class="sched-a-tab-title"><i class="fa fa-calendar"></i>Export</div>
				<div class="sched-a-content">
					<p>Copy the code below, and paste it in an import field. Please note that you cannot export/import images and other media.</p>
					<textarea style="display: block; width: 600px; height: 195px; font-weight: normal; font-size: 10px;"><?php

						$schedule_id = (int)$_GET['id'];
						$export = SCHED_Export::export($schedule_id);
						echo esc_html($export);

					?></textarea>
				</div>
				
			</div>

			<?php } ?>
			<?php if(isset($_GET['sched-tab']) && $_GET['sched-tab'] == 'import-timetable') { ?>

			<div class="sched-a-tab" style="display: block;">
				<div class="sched-a-tab-title"><i class="fa fa-cloud-upload"></i>Import <a href="admin.php?page=sched-schedule-timetables&amp;sched-tab=timetables" style="font-size: 14px; margin-left: 16px; text-transform: lowercase;">(back to timetables)</a></div>
				<div class="sched-a-content">
					<form method="POST" action="<?php echo wp_nonce_url('admin.php?page=sched-schedule-timetables&amp;sched_action=post_import', SCHED_BASE, 'sched_nonce_import'); ?>">
						
						<p>Paste the code below and press import. Please note that you cannot export/import images and other media.</p>
						<textarea name="import" style="display: block; width: 600px; height: 195px; font-weight: normal; font-size: 10px; margin-bottom: 10px;"></textarea>
						<input type="submit" class="sched-button" value="Import Timetable" />
					</form>
				</div>
				
			</div>

			<?php } ?>
			<?php if($this->editor !== false) { ?>
			<div class="sched-a-tab sched-editor" id="sched-a-tab-edit-timetable" style="display: <?php echo (isset($_GET['sched-tab']) && $_GET['sched-tab'] == 'edit-timetable') ? 'block' : 'none'; ?>;background: <?php echo SCHED_DB::get('editor_bg'); ?>;">
				
				<div class="sched-editor-header">
					<div class="sched-editor-title"><i class="fa fa-calendar"></i>Edit Timetable <a href="admin.php?page=sched-schedule-timetables&amp;sched-tab=timetables">(back to timetables)</a></div>
					<div class="sched-editor-buttons">
						<a href="#" class="sched-editor-button sched-button form-create-event-open"><i class="fa fa-plus"></i>Create Event</a>
						<a href="#" class="sched-editor-button sched-button form-create-column-open"><i class="fa fa-plus"></i>Create Column</a>
						<a href="#" class="sched-editor-button sched-button sched-button-yellow form-meta-fields-open"><i class="fa fa-bullhorn"></i>Custom Fields</a>
						<a href="#" class="sched-editor-button sched-button sched-button-purple form-filter-open"><i class="fa fa-filter"></i>Event Filters</a>
						<a href="#" class="sched-editor-button sched-button sched-button-grey form-schedule-settings-open"><i class="fa fa-cog"></i>Timetable Settings</a>
					</div>
				</div>
				<div class="sched-editor-header-snap">
					<div class="sched-editor-header">
						<div class="sched-editor-title"><i class="fa fa-calendar"></i>Edit Timetable <a href="admin.php?page=sched-schedule-timetables&amp;sched-tab=timetables">(back to timetables)</a></div>
						<div class="sched-editor-buttons">
							<a href="#" class="sched-editor-button sched-button form-create-event-open"><i class="fa fa-plus"></i>Create Event</a>
							<a href="#" class="sched-editor-button sched-button form-create-column-open"><i class="fa fa-plus"></i>Create Column</a>
							<a href="#" class="sched-editor-button sched-button sched-button-yellow form-meta-fields-open"><i class="fa fa-bullhorn"></i>Custom Fields</a>
							<a href="#" class="sched-editor-button sched-button sched-button-purple form-filter-open"><i class="fa fa-filter"></i>Event Filters</a>
							<a href="#" class="sched-editor-button sched-button sched-button-grey form-schedule-settings-open"><i class="fa fa-cog"></i>Timetable Settings</a>
						</div>
					</div>
				</div>
				<div class="sched-editor-notifications">
					<?php if(isset($_GET['notification'])) { ?>
						<div class="sched-editor-notification"><i class="fa fa-warning"></i><span><?php echo $_GET['notification']; ?></span></div>
					<?php } ?>
				</div>
				<div class="sched-editor-content" style="">
					<script type="text/javascript">
						var sched_ajax_url = "<?php echo admin_url('admin-ajax.php?action=sched_editor&id='.$this->editor->schedule->options['id']); ?>",
							sched_action_url = "<?php echo $this->editor->method(); ?>",
							timepicker_step = <?php echo SCHED_DB::get('editor_timepicker_increments'); ?>,
							schedule_id = <?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>
					</script>
					<style>
					<?php if(count($this->editor->schedule->options['columns']) !== 0) { ?>
					.sched-column-placeholder {
						width: <?php echo 100/count($this->editor->schedule->options['columns']); ?>%;
					}
					<?php } ?>
					</style>
					<?php echo $this->editor->schedule->render(); ?>
				</div>
			</div>
			<?php } ?>

		</div>
	<!-- </form> -->
	<?php if($this->editor !== false) { ?>
		<?php include SCHED_DIR.'/lib/views/editor/form_schedule_settings.php'; ?>
		<?php include SCHED_DIR.'/lib/views/editor/form_create_column.php'; ?>
		<?php include SCHED_DIR.'/lib/views/editor/form_create_event.php'; ?>
		<?php include SCHED_DIR.'/lib/views/editor/form_meta_fields.php'; ?>
		<?php include SCHED_DIR.'/lib/views/editor/form_filter.php'; ?>
	<?php } ?>
</div>