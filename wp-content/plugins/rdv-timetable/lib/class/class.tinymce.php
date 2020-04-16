<?php

/**
 * 
 * Plugin Class
 *
 * @version 1.3
 * @author  Rik de Vos
 */
class SCHED_TinyMCE {

	public static function init() {
		add_action('init', array('SCHED_TinyMCE', 'add_button_plugin'));
		add_filter('tiny_mce_version', array('SCHED_TinyMCE', 'refresh_version'));
	}

	public static function add_button_plugin() {
		if (get_user_option('rich_editing') == 'true') {
			add_filter("mce_external_plugins", array('SCHED_TinyMCE', "add_plugin"));
			add_filter('mce_buttons', array('SCHED_TinyMCE', 'add_button'));
		}
	}

	public static function refresh_version($ver) {
		$ver += 3;
		return $ver;
	}

	public static function add_plugin($plugin_array) {
		$plugin_array['sched_button'] = plugins_url( 'js/tinymce-button.js', SCHED_FILE);
		return $plugin_array;
	}

	public static function add_button($buttons) {
		array_push($buttons, "|", "sched_button");
		return $buttons;
	}

}