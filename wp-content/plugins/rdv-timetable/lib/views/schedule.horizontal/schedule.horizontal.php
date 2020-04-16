<div class="sched-loader"><div class="sched-loader-icon"></div><div class="sched-loader-text"></div></div>
<?php echo SCHED_HTML::elem('div', array(
	'class' => array(
		'sched',
		$this->editor ? 'sched-editor-mode' : '',
		'sched-horizontal',
		'sched-horizontal-medium',
	),
	'id' => $this->id,
	'data-options' => array(json_encode($this->db_options)),
	'data-start' => SCHED_HTML::time($this->options['start'], 0, true, true),
	'data-end' => SCHED_HTML::time($this->options['end'], 0, true, true),
	'data-timetable-id' => $this->options['id'],
	'data-type' => 'full',
	'data-list-id' => $this->id_list == false ? 0 : '#'.$this->id_list,
	'data-layout' => $this->layout,
)); ?>
	<div class="sched-style"><style type="text/css"><?php include 'schedule.horizontal.style.php'; ?></style></div>
	<?php include 'schedule.horizontal.top.php'; ?>
	<div class="sched-row<?php if($this->get('column_title') == 0 && !$this->editor) { echo ' sched-row-no-title'; } ?>">
		<?php if($this->get('sidebar_position') == 'left' || $this->get('sidebar_position') == 'both') { ?>
			<!-- <div class="sched-sidebar" style="width: <?php echo $this->get('sidebar_width'); ?>px;">
				<div class="sched-time">
					<?php $this->render_sidebar(); ?>
				</div>
			</div> -->
		<?php } // if sidebar_position == left|both  ?>
		<?php if($this->get('sidebar_position') == 'right' || $this->get('sidebar_position') == 'both') { ?>
			<!-- <div class="sched-sidebar sched-sidebar-right" style="width: <?php echo $this->get('sidebar_width'); ?>px;">
				<div class="sched-time">
					<?php $this->render_sidebar(); ?>
				</div>
			</div> -->
		<?php } // if sidebar_position == left|both  ?>
		<div class="sched-h-columns">
			<?php foreach($this->options['columns'] as $column_i => $column) { ?>
				<div class="sched-h-column" style="height: <?php echo $this->get('h_row_height')-32; ?>px; line-height: <?php echo $this->get('h_row_height')-32; ?>px; width: <?php echo $this->get('h_column_width')-32; ?>px">
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
					<div class="sched-h-column-title<?php if($this->get('h_column_multiline') == 1) { echo ' sched-h-column-title-multiline'; }elseif($this->get('h_column_title_position') == 'top') { echo ' sched-h-column-title-top'; }?>">
						<?php echo ($column['title']); ?>
					</div>
				</div>
			<?php } // foreach $this->options['columns'] ?>
		</div>
		<div class="sched-h-content">
			<div class="sched-h-content-scroll">
				<?php if($this->get('h_time_indicator') == 1) { ?>
				<div class="sched-h-content-scroll-time">
					<?php echo $this->render_horizontal_bar(); ?>
				</div>
				<?php } ?>
				<div class="sched-h-content-columns">
				<?php foreach($this->options['columns'] as $column_i => $column) { ?>
					<div class="sched-h-row" style="height: <?php echo $this->get('h_row_height'); ?>px; width: <?php echo $this->count_blocks()*100; ?>px">
						<div class="sched-h-row-events">
							<?php
							$row_height = $this->get('h_row_height')+1;
							$schedule_start = $this->options['start'][0] + $this->options['start'][1]/60;
							$schedule_end = $this->options['end'][0] + $this->options['end'][1]/60;
							foreach($column['events'] as $event_index => $event) {
								$event_start = $event['start'][0] + $event['start'][1]/60;
								include 'schedule.horizontal.event.php';
							}
							?>
						</div>
					</div>
				<?php } // foreach $this->options['columns'] ?>
				</div>
			</div>
		</div>

	</div>
</div>