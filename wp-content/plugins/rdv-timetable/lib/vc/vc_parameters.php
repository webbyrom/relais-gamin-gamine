<?php

if(!defined('ABSPATH')) {
	exit;
}

if ( defined( 'WPB_VC_VERSION' ) ) {

	if ( ! function_exists( 'sched_timetable_load_param' ) ) {
		function sched_timetable_load_param($param, $settings, $value) {
			ob_start();
			include SCHED_DIR.'/lib/vc/parameters/'.$param.'.php';
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}
	}

	if ( ! function_exists( 'sched_timetable_vc_custom_param_tt_timetable' ) ) {
		function sched_timetable_vc_custom_param_tt_timetable( $settings, $value ) {
			return sched_timetable_load_param('tt_timetable', $settings, $value);
		}
		vc_add_shortcode_param( 'tt_timetable', 'sched_timetable_vc_custom_param_tt_timetable' );
		
	} // if function_exists sched_timetable_vc_custom_param_tt_timetable

	if ( ! function_exists( 'sched_timetable_vc_custom_param_tt_visible_columns' ) ) {
		function sched_timetable_vc_custom_param_tt_visible_columns( $settings, $value ) {
			return sched_timetable_load_param('tt_visible_columns', $settings, $value);
		}
		vc_add_shortcode_param( 'tt_visible_columns', 'sched_timetable_vc_custom_param_tt_visible_columns' );
		
	} // if function_exists sched_timetable_vc_custom_param_tt_visible_columns

	if ( ! function_exists( 'sched_timetable_vc_custom_param_tt_visible_filters' ) ) {
		function sched_timetable_vc_custom_param_tt_visible_filters( $settings, $value ) {
			return sched_timetable_load_param('tt_visible_filters', $settings, $value);
		}
		vc_add_shortcode_param( 'tt_visible_filters', 'sched_timetable_vc_custom_param_tt_visible_filters' );
		
	} // if function_exists sched_timetable_vc_custom_param_tt_visible_filters

	if ( ! function_exists( 'sched_timetable_vc_custom_param_tt_layout' ) ) {
		function sched_timetable_vc_custom_param_tt_layout( $settings, $value ) {
			return sched_timetable_load_param('tt_layout', $settings, $value);
		}
		vc_add_shortcode_param( 'tt_layout', 'sched_timetable_vc_custom_param_tt_layout' );
		
	} // if function_exists sched_timetable_vc_custom_param_tt_layout




} // if (defined WPB_VC_VERSION)