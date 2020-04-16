<?php

/**
 * 
 * VC Shortcode
 *
 * @version 1.0
 * @author  Rik de Vos
 */
class SCHED_VC_SCHEDULE {
	
	function __construct() {
		self::shortcode_timetable();
	}

	function shortcode_timetable() {
		vc_map( array(
			'name'          =>  'Responsive Timetable',
			'base'          =>  'sched_vc_tt',
			'description'   =>  'Timetable shortcode',
			'icon'          =>   plugins_url('img/vc_icon.png', SCHED_FILE),
			'category'      =>  'Timetable',
			'params'        =>  array(
				 array(
					'param_name'  => 'title',
					'heading'     => 'Title (optional)',
					'description' => '',
					"admin_label" => true,
					'type'        => 'textfield',
					'value'       => ''
				),
			),
		));
	}

}