<?php echo SCHED_HTML::elem('div', array(
	'class'				=> array('sched-list', 'sched-list-upcoming', $this->editor ? 'sched-editor-mode' : ''),
	'id'				=> $this->id_list,
	'data-id-schedule'	=> $this->id,
	'data-options'		=> array(json_encode($this->db_options)),
	'data-start'		=> SCHED_HTML::time($this->options['start'], 0, true, true),
	'data-end'			=> SCHED_HTML::time($this->options['end'], 0, true, true),
	'data-timetable-id'	=> $this->options['id'],
	'data-type'			=> 'list',
	'data-layout' => $this->layout,
)); ?>
	<div class="sched-list-top">
		<div class="sched-list-title"><?php echo ($this->get('upcoming_title') == 'timetable_title') ? $this->options['title'] : $this->get('upcoming_title_custom'); ?><?php if($this->get('upcoming_title_amount')) { echo ' ('.$amount.')'; } ?></div>
	</div>
	<?php $total_i = 0; foreach($this->options['columns'] as $column_i => $column) { if(count($column['events']) == 0 && $this->get('list_view_hide_empty_columns') == 1) { continue; } ?>
	<div class="sched-list-column">		
		<ul class="sched-list-column-events">
			<?php $i = 0; foreach($column['events'] as $event_index => $event) { ?>

			<li class="sched-list-event-li">
				<?php echo SCHED_HTML::elem('a', array(
					'class'			=> array(
										'sched-list-event',
										'sched-list-event-upcoming',
										$event['custom_class'],
										$this->get('list_view_event_bullets') == 1 ? 'sched-list-event-has-color' : '',
										$this->get('list_view_event_bullets') == 2 ? 'sched-list-event-has-background' : '',
									),
					'href' 			=> $event['onclick'] == 'link' ? $event['onclick_link'] : '#event-'.$event['id'],
					'data-event-id'	=> (int)$event['id'],
					'target' 		=> $event['onclick'] == 'link' && $event['onclick_link_new_page'] == 1 ? '_blank' : '',
					'style'			=> $this->get('list_view_event_bullets') == 2 ? 'background: '.$this->event_color($event, $column).';' : '',
					'data-color'	=> $this->event_color($event, $column),
				)); ?>
					<div class="sched-list-event-color" style="background: <?php echo $this->event_color($event, $column); ?>;"></div>
					<div class="sched-list-event-text">
						<div class="sched-list-event-title">
							<?php echo esc_html($event['title']); ?>
						</div>

						<div class="sched-list-event-upcoming-time">
							<?php echo esc_html($column['title']); ?>, <?php echo SCHED_HTML::time($event['start']); ?> - <?php echo SCHED_HTML::time($event['end']); ?>
						</div>
						
					</div>
				</a>
			</li>
			<?php $i++; $total_i++; } ?><!-- .sched-list-event-li -->
		</ul>
	</div>
	<?php } ?><!-- .sched-list-column -->
	
</div>