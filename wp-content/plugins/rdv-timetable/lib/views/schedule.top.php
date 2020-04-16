<div class="sched-top" style="margin-left: <?php echo ($this->get('sidebar_position') == 'left' || $this->get('sidebar_position') == 'both') ? $this->get('sidebar_width') : '0'; ?>px; margin-right: <?php echo ($this->get('sidebar_position') == 'right' || $this->get('sidebar_position') == 'both') ? $this->get('sidebar_width') : '0'; ?>px">
	<?php if($this->options['title'] !== '') { ?>
		<h2 class="sched-title"><?php echo $this->options['title']; ?></h2>
	<?php } ?>
	
	<div class="sched-top-buttons <?php
	if($this->get('filter_position') == 'below_title_left' || $this->layout == 'list') {
		echo 'sched-top-buttons-below-title';
	}else if($this->get('filter_position') == 'right') {
		echo 'sched-top-buttons-right';
	}else  {
		echo 'sched-top-buttons-left';
	}
	?>">
		<?php if($this->get('pdf_enable') == 1) { ?>
		<a target="_blank" title="<?php echo esc_attr($this->get('pdf_label')); ?>" href="<?php echo admin_url( 'admin-ajax.php?action=sched_pdf_export'.($this->get('pdf_type') == 'html' ? '_view' : '').'&id='.$this->options['id'] ); ?>" class="sched-download-button"><?php echo $this->get('pdf_label'); ?><i class="sched-icon sched-icon-cloud-download"></i></a>
		<?php } ?>
	
		<?php if(count($this->options['filters']) !== 0) { ?>
			<div class="sched-sort sched-sort-multiselect sched-sort-empty <?php if($this->get('filter_visible') == 0 && !$this->editor) { echo ' sched-sort-hidden'; } ?>" data-sort-id="1" data-all-string="<?php echo esc_html($this->get('filter_dropdown_show_all_label')); ?>">
				<?php if($this->get('filter_dropdown_label') !== '') { ?>
					<div class="sched-sort-label"><?php echo esc_html($this->get('filter_dropdown_label')); ?></div>
				<?php } ?>
				<div class="sched-sort-dropdown">
					<div class="sched-sort-current">
						<div class="sched-sort-current-label"><?php echo esc_html($this->get('filter_dropdown_show_all_label')); ?></div>
						<div class="sched-sort-current-icon"><i class="sched-icon sched-icon-chevron-up"></i><i class="sched-icon sched-icon-chevron-down"></i></div>
					</div>
					<div class="sched-sort-dropdown-select">
						<?php foreach($this->options['filters'] as $i => $filter) { ?>
							<div class="sched-sort-item" data-sort-item-id="1" data-sort-item-json="<?php echo esc_attr(json_encode($filter)); ?>" data-checked-on-load="<?php echo ($this->shortcode_filters !== false && in_array($filter['id'], $this->shortcode_filters)) ? '1' : '0'; ?>">
								<div class="sched-sort-item-icon"><i class="sched-icon sched-icon-check"></i></div>
								<div class="sched-sort-item-label"><?php echo $filter['label']; ?></div>
							</div>
						<?php } ?>
					</div><!-- .sched-sort-dropdown-select -->
				</div><!-- .sched-dropdown -->
			</div><!-- .sched-sort -->
		<?php } ?>
	</div><!-- .sched-top-buttons -->

</div><!-- .sched-top -->