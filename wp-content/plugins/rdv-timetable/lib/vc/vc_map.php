<?php
/*
 * Map for visual composer shortcodes, baby!
 */ 

if(!defined('ABSPATH')) {
	exit;
}

vc_map(
	array(
		'name'          =>  'Responsive Timetable',
		'base'          =>  'timetable',
		'description'   =>  'Timetable shortcode',
		'icon'          =>   plugins_url('img/vc_icon.png', SCHED_FILE),
		'category'      =>  'Timetable',
		'params'        =>  array(
			array(
				'param_name'  => 'id',
				'heading'     => 'Timetable',
				'description' => '',
				'type'        => 'tt_timetable',
				'value'       => '0'
			),
			array(
				'param_name'  => 'layout',
				'heading'     => 'Layout',
				'description' => 'Select timetable layout.', // default, horizontal, list_view
				'type'        => 'tt_layout',
				'value'       => 'default'
			),
			array(
				'param_name'  => 'columns',
				'heading'     => 'Columns',
				'description' => 'Select which columns should be visible. None checked = all columns.',
				'type'        => 'tt_visible_columns',
				'value'       => ''
			),
			array(
				'param_name'  => 'filters',
				'heading'     => 'Checked Filters',
				'description' => 'Select which filters should be checked upon loading the timetable.',
				'type'        => 'tt_visible_filters',
				'value'       => ''
			),
			array(
				'param_name'  => 'advanced_options',
				'heading'     => 'Advanced Options',
				'description' => 'Set advanced options, one per line. For example: <strong>sidebar_position="both"</strong>.',
				'type'        => 'textarea',
				'value'       => '',
				'group'			=> 'Advanced Options',
			),
		),
	));

vc_map(
	array(
		'name'          =>  'Responsive Timetable Upcoming Events',
		'base'          =>  'timetable_upcoming',
		'description'   =>  'Upcoming events',
		'icon'          =>   plugins_url('img/vc_icon.png', SCHED_FILE),
		'category'      =>  'Timetable',
		'params'        =>  array(
			array(
				'param_name'  => 'id',
				'heading'     => 'Timetable',
				'description' => '',
				'type'        => 'tt_timetable',
				'value'       => '0'
			),
			array(
				'param_name'  => 'upcoming_limit',
				'heading'     => 'Maximum Amount',
				'description' => 'Do not show more events than this amount.',
				'type'        => 'textfield',
				'value'       => '5'
			),
			array( 
				'param_name'  => 'upcoming_type', 
				'heading'     => 'Show Events',
				'description' => 'Only show events that start after this value.',
				'type'        => 'dropdown', 
				'value'       => array( 
					'That started today, or in the future.' => 'current_date',
					'That start right now, or in the future.' => 'current_datetime',
					'That happen after a custom date & time.' => 'custom',
				),
			),
			array(
				'param_name'  => 'upcoming_custom',
				'heading'     => 'Custom Date &amp; Time',
				'description' => 'Only show the events that happen on or after this date. Format YYYY:MM:DD HH:MM.',
				'type'        => 'textfield',
				'value'       => '2016-01-01 00:00',
				'dependency' => array( 'element' => 'upcoming_type', 'value' => array( 'custom' ) ), 
			),
			array( 
				'param_name'  => 'upcoming_title', 
				'heading'     => 'Title',
				'description' => 'Choose what to use as title.',
				'type'        => 'dropdown', 
				'value'       => array( 
					'Use Timetable Title.' => 'timetable_title',
					'Custom Title.' => 'custom',
				),
			),
			array(
				'param_name'  => 'upcoming_title_custom',
				'heading'     => 'Custom Title',
				'description' => 'Enter a custom title.',
				'type'        => 'textfield',
				'value'       => 'Upcoming Events',
				'dependency' => array( 'element' => 'upcoming_title', 'value' => array( 'custom' ) ), 
			),
			array(
				'param_name'  => 'columns',
				'heading'     => 'Columns',
				'description' => 'Select which columns should be visible. None checked = all columns.',
				'type'        => 'tt_visible_columns',
				'value'       => '',
				'group'			=> 'Columns &amp; Filters',
			),
			array(
				'param_name'  => 'filters',
				'heading'     => 'Checked Filters',
				'description' => 'Select which filters should be checked upon loading the timetable.',
				'type'        => 'tt_visible_filters',
				'value'       => '',
				'group'			=> 'Columns &amp; Filters',
			),
			array(
				'param_name'  => 'advanced_options',
				'heading'     => 'Advanced Options',
				'description' => 'Set advanced options, one per line. For example: <strong>sidebar_position="both"</strong>.',
				'type'        => 'textarea',
				'value'       => '',
				'group'			=> 'Advanced Options',
			),
		),
	)
);