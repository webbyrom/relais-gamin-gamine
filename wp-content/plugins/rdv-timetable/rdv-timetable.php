<?php

/*
Plugin Name:  Responsive Timetable For Wordpress
Description:  Our timetable is fully responsive and features a clean and modern flat interface with different lay-outs and scales. Manage your timetable's in our live editor. Create filters and add custom fields to your events and use them to display the event time or location, but also show characteristics of the event like number of guests, a link to make reservations, show prices, etc. Configure many options in the admin panel. Add timetables to your pages using shortcodes or widgets. Export timetables to PDF or a print-ready HTML page.
Version: 1.16.0
Author: Rik de Vos
Author URI: http://rikdevos.com/
License: Copyright (C) 2016 Rik de Vos
This is not free software!
*/

define('SCHED_FILE', __FILE__);
define('SCHED_DIR', dirname(__FILE__));
define('SCHED_BASE', basename(__FILE__));

require_once 'packages/dompdf-master/autoload.inc.php';

require_once('lib/class/class.db.php');
require_once('lib/class/class.editor.php');
require_once('lib/class/class.export.php');
require_once('lib/class/class.html.php');
require_once('lib/class/class.pdf_export.php');
require_once('lib/class/class.plugin.php');
require_once('lib/class/class.schedule.php');
require_once('lib/class/class.tinymce.php');
require_once('lib/class/class.widget.php');

$SCHED = new SCHED;
