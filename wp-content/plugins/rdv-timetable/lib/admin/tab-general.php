<div class="sched-a-tab-title"><i class="fa fa-cog"></i>General Settings</div>
<div class="sched-a-content">
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Time Format</div>
			<div class="sched-a-option-description">
				Set time format to 12 or 24 hour.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_am_pm', array(
				array('1', '12 Hour (9:44 pm)'),
				array('0', '24 Hour (21:44)'),
			), SCHED_DB::get('am_pm')); ?>
			<?php echo SCHED_HTML::popover('am_pm'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Timetable Title</div>
			<div class="sched-a-option-description">
				Text color of the timetable title.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::color('sched_title_text_color', SCHED_DB::get('title_text_color')); ?>
			<?php echo SCHED_HTML::popover('title_text_color'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Timetable Background Pattern</div>
			<div class="sched-a-option-description">
				Background pattern colors.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::color('sched_pattern_color_1', SCHED_DB::get('pattern_color_1')); ?>
			<?php echo SCHED_HTML::color('sched_pattern_color_2', SCHED_DB::get('pattern_color_2')); ?>
			<?php echo SCHED_HTML::color('sched_pattern_color_3', SCHED_DB::get('pattern_color_3')); ?>
			<?php echo SCHED_HTML::popover('pattern_color_1', false, 2); ?>
			<?php echo SCHED_HTML::popover('pattern_color_2', false, 1); ?>
			<?php echo SCHED_HTML::popover('pattern_color_3'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Sidebar Position</div>
			<div class="sched-a-option-description">
				Set the position of the sidebar showing the time.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_sidebar_position', array(
				array('0', 'Hide Sidebar'),
				array('left', 'Display On Left Side'),
				array('right', 'Display On Right Side'),
				array('both', 'Display On Both Sides')
			), SCHED_DB::get('sidebar_position')); ?>
			<?php echo SCHED_HTML::popover('sidebar_position'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Sidebar Width</div>
			<div class="sched-a-option-description">
				Width of the sidebar showing the time in pixels. Recommended: <strong>100</strong>
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::number('sched_sidebar_width', SCHED_DB::get('sidebar_width')); ?>
			<?php echo SCHED_HTML::popover('sidebar_width'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Sidebar Text</div>
			<div class="sched-a-option-description">
				Text color of the sidebar showing the time.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::color('sched_sidebar_text_color', SCHED_DB::get('sidebar_text_color')); ?>
			<?php echo SCHED_HTML::popover('sidebar_text_color'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Top Buttons Position</div>
			<div class="sched-a-option-description">
				Select where you want to show the top buttons (filter &amp; download button). When there's not enough space the buttons will automatically change to <strong>Below</strong>.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::radio('sched_filter_position', array(
				array('left', 'Left Side, Next To Title'),
				array('right', 'Right Side'),
				array('below_title_left', 'Below The Title On The Left'),
			), SCHED_DB::get('filter_position')); ?>
			<?php echo SCHED_HTML::popover('filter_position'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Show Title Attributes</div>
			<div class="sched-a-option-description">
				Give Events &amp; Columns title attributes. When disabled they're only removed with JS so no SEO impact.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_title_attr', SCHED_DB::get('title_attr')); ?>
			<?php echo SCHED_HTML::popover('title_attr'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Enable Hashtags</div>
			<div class="sched-a-option-description">
				Use a hashtag in the URL which people can use to share events. Opening a URL with a hashtag will open the event.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_hashtag_url', SCHED_DB::get('hashtag_url')); ?>
			<?php echo SCHED_HTML::popover('hashtag_url'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-clear">
		<a href="<?php echo wp_nonce_url('admin.php?page=sched-schedule&amp;tab=general&amp;sched_action=reset_colors', SCHED_BASE, 'sched_nonce_reset_colors'); ?>" class="sched-button sched-button-open" style="float: left;" onclick="return confirm('Are you sure you want to reset the colors? Other settings will not be affected.')"><i class="fa fa-times"></i> Reset Colors To Default</a>
		<a href="<?php echo wp_nonce_url('admin.php?page=sched-schedule&amp;tab=general&amp;sched_action=reset_settings', SCHED_BASE, 'sched_nonce_reset_settings'); ?>" class="sched-button sched-button-red" style="float: right;" onclick="return confirm('Are you sure you want to reset the colors? Timetables &amp; Events will not be affected.')"><i class="fa fa-times"></i> Reset All Settings To Default</a>
	</div>
</div>