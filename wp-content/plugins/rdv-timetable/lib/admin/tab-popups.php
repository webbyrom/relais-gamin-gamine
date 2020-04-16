<div class="sched-a-tab-title"><i class="fa fa-square-o"></i>Popups</div>
<div class="sched-a-content">
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Execute Shortcodes In Description Field</div>
			<div class="sched-a-option-description">
				If enabled the shortcode's will be executed inside the event popup description field.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_shortcodes_in_descriptions', SCHED_DB::get('shortcodes_in_descriptions')); ?>
			<?php echo SCHED_HTML::popover('shortcodes_in_descriptions'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Automatically Hide Popups For Empty Events</div>
			<div class="sched-a-option-description">
				If enabled and the event has no description and custom fields, it will not be clickable.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_hide_popup_for_empty_events', SCHED_DB::get('hide_popup_for_empty_events')); ?>
			<?php echo SCHED_HTML::popover('hide_popup_for_empty_events'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Show Arrows To Navigate Through Events</div>
			<div class="sched-a-option-description">
				Show arrows left and right of the popup, that open the next/previous event when clicked.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_popup_arrows', SCHED_DB::get('popup_arrows')); ?>
			<?php echo SCHED_HTML::popover('popup_arrows'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Popup Max Width</div>
			<div class="sched-a-option-description">
				Maximum width of the event popup.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::number('sched_popup_max_width', SCHED_DB::get('popup_max_width')); ?>
			<?php echo SCHED_HTML::popover('popup_max_width'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Popup Background Color</div>
			<div class="sched-a-option-description">
				Background color of the event popup.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::color('sched_popup_background_color', SCHED_DB::get('popup_background_color')); ?>
			<?php echo SCHED_HTML::popover('popup_background_color'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Popup Text Color</div>
			<div class="sched-a-option-description">
				Text color of the event popup.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::color('sched_popup_text_color', SCHED_DB::get('popup_text_color')); ?>
			<?php echo SCHED_HTML::popover('popup_text_color'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Popup Link Color</div>
			<div class="sched-a-option-description">
				Color of the links in the event popup.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::color('sched_popup_link_color', SCHED_DB::get('popup_link_color')); ?>
			<?php echo SCHED_HTML::popover('popup_link_color'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Autoplay YouTube Videos</div>
			<div class="sched-a-option-description">
				Autoplay the YouTube video's inside the event popup.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_autoplay_videos', SCHED_DB::get('autoplay_videos')); ?>
			<?php echo SCHED_HTML::popover('autoplay_videos'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Enable Animations</div>
			<div class="sched-a-option-description">
				Use animations when showing the event popup.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_animations', SCHED_DB::get('animations'), '#sched_toggle_animations'); ?>
			<?php echo SCHED_HTML::popover('animations'); ?>
		</div>
	</div>
	<div id="sched_toggle_animations">
		
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Animation Speed</div>
				<div class="sched-a-option-description">
					Set the speed of the animations.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('sched_animations_speed', array(
					array('slow', 'Slow'),
					array('normal', 'Normal'),
					array('fast', 'Fast'),
				), SCHED_DB::get('animations_speed')); ?>
				<?php echo SCHED_HTML::popover('animations_speed'); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Use CSS3 Animations If Possible</div>
				<div class="sched-a-option-description">
					Use CSS3 animations where possible to increase performance in modern browsers.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::checkbox('sched_animations_css3', SCHED_DB::get('animations_css3')); ?>
				<?php echo SCHED_HTML::popover('animations_css3'); ?>
			</div>
		</div>
	</div>
</div>