<div class="sched-loader"><div class="sched-loader-icon"></div><div class="sched-loader-text"></div></div>
<?php echo SCHED_HTML::elem('div', array(
	'class' => array('sched', $this->editor ? 'sched-editor-mode' : ''),
	'id' => $this->id,
	'data-options' => array(json_encode($this->db_options)),
	'data-start' => SCHED_HTML::time($this->options['start'], 0, true, true),
	'data-end' => SCHED_HTML::time($this->options['end'], 0, true, true),
	'data-timetable-id' => $this->options['id'],
	'data-type' => 'full',
	'data-list-id' => $this->id_list == false ? 0 : '#'.$this->id_list,
	'data-layout' => $this->layout,
)); ?>
	<div class="sched-style"><style type="text/css"><?php include 'schedule.style.php'; ?></style></div>
	<?php include 'schedule.top.php'; ?>
	<div class="sched-row<?php if($this->get('column_title') == 0 && !$this->editor) { echo ' sched-row-no-title'; } ?>">
		<?php if($this->get('sidebar_position') == 'left' || $this->get('sidebar_position') == 'both') { ?>
			<div class="sched-sidebar" style="width: <?php echo $this->get('sidebar_width'); ?>px;">
				<div class="sched-time">
					<?php $this->render_sidebar(); ?>
				</div>
			</div>
		<?php } // if sidebar_position == left|both  ?>
		<?php if($this->get('sidebar_position') == 'right' || $this->get('sidebar_position') == 'both') { ?>
			<div class="sched-sidebar sched-sidebar-right" style="width: <?php echo $this->get('sidebar_width'); ?>px;">
				<div class="sched-time">
					<?php $this->render_sidebar(); ?>
				</div>
			</div>
		<?php } // if sidebar_position == left|both  ?>
		<div class="sched-columns" style="<?php echo $this->sidebar_margins(); ?>">
			<?php if($this->editor && count($this->options['columns']) == 0) { ?>
			<br /><br />
			<strong>You have not yet created a column. Start by creating a column.</strong>
			
			<?php } ?>
			<?php foreach($this->options['columns'] as $column_i => $column) { ?>
			<div class="sched-column <?php echo esc_attr($column['custom_class']); ?>" style="width: <?php echo 100/$this->count_columns(); ?>%" data-column-id="<?php echo $column['id']; ?>">
				<?php if($this->get('column_tooltip') == 1) { ?>
				<div class="sched-column-tooltip <?php if($column_i === 0) { echo ' sched-column-tooltip-first-child'; } ?>" style="width:<?php echo ($this->get('column_tooltip_width_type') == 'custom') ? $this->get('column_tooltip_width').'px' : '100%'; ?>; background: <?php echo $this->get('column_tooltip_color_bg'); ?>; color: <?php echo $this->get('column_tooltip_color_text'); ?>;">
					<?php if($this->get('column_tooltip_title') == 1 && $column['title'] !== '') { ?>
						<div class="sched-column-tooltip-title"><?php echo esc_html($column['title']); ?></div>
					<?php } ?>
					<?php if($this->get('column_tooltip_description') == 1 && $column['description'] !== '') { ?>
						<div class="sched-column-tooltip-description"><?php echo esc_html($column['description']); ?></div>
					<?php } ?>
					<div class="sched-column-tooltip-arrow">
						<div class="sched-column-tooltip-arrow-inside" style="border-color: <?php echo $this->get('column_tooltip_color_bg'); ?> transparent transparent transparent;"></div>
					</div>
				</div>
				<?php } // if column_tooltip  ?>
				<div class="sched-column-header" title="<?php echo esc_html($column['title']); ?>">
					<?php echo ($column['title']); ?>
					<?php if($this->editor) { ?>
					<a href="<?php echo admin_url('admin.php?page=sched-schedule-timetables&sched-tab=edit-timetable&method=delete_column&id='.$this->options['id'].'&column_id='.$column['id']); ?>" class="sched-popup-edit-event text-danger column-button-delete sched-edit-button" title="Delete Column" onclick="return confirm('Are you sure you want to delete this column and its events?')"><i class="sched-icon sched-icon-times"></i></a>
					<a href="#" onclick="sched_open_column_editor(<?php echo $column['id']; ?>); return false;" class="sched-popup-edit-event text-success column-button-edit sched-edit-button" title="Edit Column"><i class="sched-icon sched-icon-edit"></i></a>
					<i class="sched-icon sched-icon-bars sched-column-header-handle sched-edit-button" title="Grab to sort column"></i>
					<div class="column-button-id">#<?php echo $column['id']; ?></div>
					<?php } ?>
				</div>
				<?php if(!$this->editor) { ?>
				<div class="sched-column-header-sticky">
					<?php echo ($column['title']); ?>
				</div>
				<?php } ?>
				<div class="sched-column-content">
					<?php
					$schedule_start = $this->options['start'][0] + $this->options['start'][1]/60;
					$schedule_end = $this->options['end'][0] + $this->options['end'][1]/60;
					foreach($column['events'] as $event_index => $event) {
						$event_start = $event['start'][0] + $event['start'][1]/60;
						include 'schedule.event.php';
					}
					?>
				</div>

				<div class="sched-column-bg">
					<?php $this->render_column_bg(); ?>
				</div>
			</div><!-- #sched-column -->
			<?php } // foreach $this->options['columns'] ?>
		</div><!-- #sched-columns -->
	</div>
</div>