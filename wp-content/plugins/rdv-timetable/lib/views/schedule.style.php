<?php $s = $this->selector; $l = $s.'-list'; ?>
/*
 * Custom CSS For Timetable
*/

<?php echo $s; ?> .sched-column-header,
<?php echo $s; ?> .sched-column-header-sticky {
	background: <?php echo $this->get('column_color_bg'); ?>;
	color: <?php echo $this->get('column_color_text'); ?>;
}

<?php echo $s; ?> .sched-column-header:after,
<?php echo $s; ?> .sched-column-header-sticky:after {
	background: <?php echo $this->get('column_color_border'); ?>;
}

<?php echo $s; ?> .sched-columns .sched-column:last-child .sched-column-header:after,
<?php echo $s; ?> .sched-columns .sched-column:last-child .sched-column-header-sticky:after {
	background: <?php echo $this->get('column_color_bg'); ?>;
}

<?php echo $s; ?> .sched-column-bg-block {
	background: <?php echo $this->get('pattern_color_1'); ?>;
	border-color: <?php echo $this->get('pattern_color_2'); ?>;
}

<?php echo $s; ?> .sched-column-bg-block:after {
	background: <?php echo $this->get('pattern_color_3'); ?>;
}

<?php echo $s; ?> .sched-row-no-title .sched-column .sched-column-bg {
	box-shadow: 0 -1px 0 <?php echo $this->get('pattern_color_2'); ?>;
}

<?php echo $s; ?> .sched-title {
	color: <?php echo $this->get('title_text_color'); ?>;
}

<?php echo $s; ?> .sched-time-value {
	color: <?php echo $this->get('sidebar_text_color'); ?>;
}

<?php echo $s; ?> .sched-event .sched-event-inner {
	color: <?php echo $this->get('event_box_text_color'); ?>;
	text-align: <?php echo $this->get('event_box_text_align'); ?>;
}

<?php echo $s; ?> .sched-event.sched-event-invert .sched-event-inner {
	<!-- background: #999; -->
}

<?php if($this->get('event_box_truncate_title') == 1) { ?>
<?php echo $s; ?> .sched-event-title {
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow: hidden;
}
<?php } ?>

<?php if($this->get('event_box_description_method') == 'short_truncated' || $this->get('event_box_description_method') == 'full_truncated') { ?>
<?php echo $s; ?> .sched-event-description {
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow: hidden;
}
<?php } ?>

/*<?php echo $s; ?> a.sched-event.sched-event-sort-hidden {
	opacity: <?php echo $this->get('filter_hidden_events') == 'hide' ? '0' : ((int)$this->get('filter_hidden_events_opacity'))/100; ?>;
}*/

<?php echo $s; ?> .sched-sort .sched-sort-current .sched-sort-current-label,
<?php echo $s; ?> .sched-top-buttons-below-title .sched-sort.sched-sort-open .sched-sort-dropdown .sched-sort-current .sched-sort-current-label,
<?php echo $s; ?>-list.sched-list .sched-sort .sched-sort-current .sched-sort-current-label {
	width: <?php echo $this->get('filter_dropdown_width'); ?>px;
}

<?php echo $s; ?> .sched-sort.sched-sort-open .sched-sort-dropdown .sched-sort-current .sched-sort-current-label {
	width: <?php echo $this->get('filter_dropdown_hover_width'); ?>px;
}

/*
 * Custom CSS Event Popup
 */

<?php echo $s; ?>-popup .sched-popup-description {
	
}

<?php echo $s; ?>-popup .sched-popup-description .sched-meta a,
<?php echo $s; ?>-popup .sched-popup-description .sched-popup-description-text a {
	color: <?php echo $this->get('popup_link_color'); ?>;
}

<?php echo $s; ?>-popup .sched-popup-description .sched-meta,
<?php echo $s; ?>-popup .sched-popup-description .sched-popup-description-text {
	color: <?php echo $this->get('popup_text_color'); ?>;
	background: <?php echo $this->get('popup_background_color'); ?>;
}

/*
 * List
 */

<?php echo $l; ?> .sched-list-title {
	color: <?php echo $this->get('title_text_color'); ?>;
}



<?php echo $l; ?> .sched-list-column-title {
	color: <?php echo $this->get('list_view_column_title_color'); ?>;
}

<?php echo $l; ?> .sched-list-event {
	color: <?php echo $this->get('list_view_event_title_color'); ?>;
	
	
}

<?php echo $l; ?> .sched-list-event:hover {
	color: <?php echo $this->get('list_view_event_hover_title_color'); ?>;
}

<?php echo $l; ?> .sched-list-event-description {
	color: <?php echo $this->get('list_view_event_description_color'); ?>;
}

<?php echo $l; ?> .sched-list-event-title {
	<?php if($this->get('list_view_event_title_bold') == 1) { ?>
	font-weight: bold;
	<?php } ?>;
}
