<html lang="en-US">
<!--<![endif]-->
<head>
	<link rel='stylesheet' id='sched-icons-css'  href='<?php echo plugins_url('packages/icons/css/icons.min.css', SCHED_FILE); ?>' type='text/css' media='all' />
<link rel='stylesheet' id='google-fonts-lato-css'  href='http://fonts.googleapis.com/css?family=Lato%3A400%2C700&#038;ver=4.4.2' type='text/css' media='all' />

	<link rel='stylesheet' id='sched-style-css'  href='<?php echo plugins_url('css/schedule.css', SCHED_FILE); ?>' type='text/css' media='all' />


	<style type="text/css">
	body {
		width: 1200px;
		margin: 0;
		padding: 20px 50px;

	}
	html {
		margin: 0;
		padding: 0;
	}

	@media print {
		.sched-list {
			width: 1000px !important;
		}
		.sched-list-event-text {
			margin-left: 0px !important;
		}
		.sched-list-event-color {
			display: none !important;
		}
	}
	

	.wrap {
		/*position: relative;*/
	}

	.sched {
		opacity: 1 !important;
		margin-top: 30px !important;
		height: 1000px;
		overflow: hidden;
		display: none;
	}
	.sched-list {
		display: block !important;
		width: 700px;
	}
	.sched-loader {
		display: none;
	}

	a.sched-event {
		cursor: default;
		overflow: hidden !important;
	}

	.sched-column-bg {
		display: none;
	}

	.sched-columns {
		margin-left: 50px !important;
	}

	<?php echo SCHED_DB::get('pdf_css'); ?>

	</style>
</head>
<body style="page-break-before: avoid;">
	<div class="wrap" style="page-break-before: avoid;">
		<?php echo $schedule; ?>
	</div>
</body>
</html>