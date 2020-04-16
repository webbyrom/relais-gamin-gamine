<form action="admin.php?page=sched-schedule" data-original-action="admin.php?page=sched-schedule" class="sched-a-form" method="POST">
	<?php wp_nonce_field(SCHED_BASE, 'sched_nonce'); ?>
	<input type="hidden" name="sched_action" value="save_changes" />
	<div class="sched-a sched-admin">
		<div class="sched-a-header">
			<div class="sched-a-header-lines">
				<div class="sched-a-header-line" style="background: #a0cecb"></div>
				<div class="sched-a-header-line" style="background: #e8ce4d"></div>
				<div class="sched-a-header-line" style="background: #8067b7"></div>
				<div class="sched-a-header-line" style="background: #d8334a"></div>
				<div class="sched-a-header-line" style="background: #3c383d"></div>
			</div>
			<div class="sched-a-header-text">
				<div class="sched-a-title">Responsive Timetable for Wordpress</div>
				<strong>Version <?php $plugin  = get_plugin_data(SCHED_FILE); echo $plugin['Version']; ?></strong>
				<a href="<?php echo plugins_url('documentation.pdf', SCHED_FILE ); ?>" target="_blank" style="top: 12px;">Documentation</a>
				<a href="http://codecanyon.net/user/RikdeVos?ref=RikdeVos#message" target="_blank" style="bottom: 10px;">Support</a>
			</div>
		</div>
		<?php $this->print_notifications(); ?>
		<div class="sched-a-tabs">
			<ul>
				<li class="sched-a-tabs-active"><a href="#" data-tab="general"><i class="fa fa-cog"></i>General Settings</a></li>

				<li><a href="#" data-tab="events"><i class="fa fa-square"></i>Events</a></li>
				<li><a href="#" data-tab="popups"><i class="fa fa-square-o"></i>Event Popups</a></li>
				<li><a href="#" data-tab="columns"><i class="fa fa-columns"></i>Columns</a></li>
				

				<li><a href="#" data-tab="mobile"><i class="fa fa-mobile"></i>Responsive</a></li>
				<li><a href="#" data-tab="list"><i class="fa fa-list-alt"></i>List View</a></li>
				<li><a href="#" data-tab="upcoming"><i class="fa fa-globe"></i>Upcoming View</a></li>
				
				<li><a href="#" data-tab="filters"><i class="fa fa-filter"></i>Filters</a></li>
				<li><a href="#" data-tab="pdf"><i class="fa fa-cloud-download"></i>Download Button</a></li>
				<li><a href="#" data-tab="editor"><i class="fa fa-edit"></i>Editor</a></li>
				<li><a href="#" data-tab="custom-css"><i class="fa fa-code"></i>Custom Css</a></li>
				<li><a href="#" data-tab="help"><i class="fa fa-book"></i>Help</a></li>

				<li class="sched-a-tabs-addon"><a href="#" data-tab="horizontal"><i class="fa fa-ellipsis-h"></i>Horizontal View<span>Addon</span></a></li>
			</ul>
		</div>
		<div class="sched-a-tab" id="sched-a-tab-general" style="display: block;"><?php include 'tab-general.php'; ?></div>
		<div class="sched-a-tab" id="sched-a-tab-events" style="display: none;"><?php include 'tab-events.php'; ?></div>
		<div class="sched-a-tab" id="sched-a-tab-columns" style="display: none;"><?php include 'tab-columns.php'; ?></div>
		<div class="sched-a-tab" id="sched-a-tab-popups" style="display: none;"><?php include 'tab-popups.php'; ?></div>
		<div class="sched-a-tab" id="sched-a-tab-filters" style="display: none;"><?php include 'tab-filters.php'; ?></div>
		<div class="sched-a-tab" id="sched-a-tab-mobile" style="display: none;"><?php include 'tab-mobile.php'; ?></div>
		<div class="sched-a-tab" id="sched-a-tab-list" style="display: none;"><?php include 'tab-list.php'; ?></div>
		<div class="sched-a-tab" id="sched-a-tab-upcoming" style="display: none;"><?php include 'tab-upcoming.php'; ?></div>
		<div class="sched-a-tab" id="sched-a-tab-pdf" style="display: none;"><?php include 'tab-pdf.php'; ?></div>
		<div class="sched-a-tab" id="sched-a-tab-horizontal" style="display: none;"><?php include 'tab-horizontal.php'; ?></div>
		<div class="sched-a-tab" id="sched-a-tab-editor" style="display: none;"><?php include 'tab-editor.php'; ?></div>
		<div class="sched-a-tab" id="sched-a-tab-custom-css" style="display: none;"><?php include 'tab-custom-css.php'; ?></div>
		<div class="sched-a-tab" id="sched-a-tab-help" style="display: none;"><?php include 'tab-help.php'; ?></div>
	</div>
	<input type="submit" value="Save Changes" class="sched-button sched-submit" />
</form>