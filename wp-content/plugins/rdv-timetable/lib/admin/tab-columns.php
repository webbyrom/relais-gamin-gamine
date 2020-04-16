<div class="sched-a-tab-title"><i class="fa fa-columns"></i>Columns</div>
<div class="sched-a-content">
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Column Background &amp; Text</div>
			<div class="sched-a-option-description">
				Background and text color of the column title.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::color('sched_column_color_bg', SCHED_DB::get('column_color_bg')); ?>
			<?php echo SCHED_HTML::color('sched_column_color_text', SCHED_DB::get('column_color_text')); ?>
			<?php echo SCHED_HTML::popover('column_color_bg', false, 1); ?>
			<?php echo SCHED_HTML::popover('column_color_text'); ?>
		</div>
	</div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Column Border Color</div>
			<div class="sched-a-option-description">
				Border color between the column titles.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::color('sched_column_color_border', SCHED_DB::get('column_color_border')); ?>
			<?php echo SCHED_HTML::popover('column_color_border'); ?>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Show Column Title</div>
			<div class="sched-a-option-description">
				When disabled the column title's will not be shown.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_column_title', SCHED_DB::get('column_title'), '#sched_toggle_column_sticky'); ?>
			<?php echo SCHED_HTML::popover('column_title'); ?>
		</div>
	</div>
	<div id="sched_toggle_column_sticky">
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Sticky Column Title</div>
				<div class="sched-a-option-description">
					When enabled the column will stick to the top when viewing the timetable.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::checkbox('sched_columns_sticky_header', SCHED_DB::get('columns_sticky_header'), '#sched_toggle_column_sticky_offset'); ?>
				<?php echo SCHED_HTML::popover('columns_sticky_header'); ?>
			</div>
		</div>
		<div id="sched_toggle_column_sticky_offset">
			<div class="sched-a-option">
				<div class="sched-a-option-left">
					<div class="sched-a-option-title">Sticky Column Title Offset</div>
					<div class="sched-a-option-description">
						Offset to the top. Use this if you already have a sticky navigation from another plugin/theme.
					</div>
				</div>
				<div class="sched-a-option-right">
					<?php echo SCHED_HTML::number('sched_columns_sticky_header_offset', SCHED_DB::get('columns_sticky_header_offset'), '', 0, 10000, 1); ?>
					<?php echo SCHED_HTML::popover('columns_sticky_header_offset'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="sched-a-option-hr"></div>
	<div class="sched-a-option">
		<div class="sched-a-option-left">
			<div class="sched-a-option-title">Column Tooltip</div>
			<div class="sched-a-option-description">
				Display a tooltip when hovering over the column.
			</div>
		</div>
		<div class="sched-a-option-right">
			<?php echo SCHED_HTML::checkbox('sched_column_tooltip', SCHED_DB::get('column_tooltip'), '#sched_toggle_column_tooltip'); ?>
			<?php echo SCHED_HTML::popover('column_tooltip'); ?>
		</div>
	</div>
	<div id="sched_toggle_column_tooltip">
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Column Tooltip Title</div>
				<div class="sched-a-option-description">
					Show the column title inside the tooltip.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::checkbox('sched_column_tooltip_title', SCHED_DB::get('column_tooltip_title')); ?>
				<?php echo SCHED_HTML::popover('column_tooltip_title'); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Column Tooltip Description</div>
				<div class="sched-a-option-description">
					Show the <strong>Column Description</strong> inside the tooltip.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::checkbox('sched_column_tooltip_description', SCHED_DB::get('column_tooltip_description')); ?>
				<?php echo SCHED_HTML::popover('column_tooltip_description'); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Column Tooltip Width</div>
				<div class="sched-a-option-description">
					Set the width of the tooltip.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::radio('sched_column_tooltip_width_type', array(
					array('column', 'Same As Column'),
					array('custom', 'Use Custom Width')
				), SCHED_DB::get('column_tooltip_width_type')); ?>
				<?php echo SCHED_HTML::number('sched_column_tooltip_width', SCHED_DB::get('column_tooltip_width'), '', 0, 10000, 1); ?>
				<?php echo SCHED_HTML::popover(false, '[... column_tooltip_width_type="'.SCHED_DB::get('column_tooltip_width_type').'" column_tooltip_width="'.SCHED_DB::get('column_tooltip_width').'" ...]'); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Column Tooltip Background</div>
				<div class="sched-a-option-description">
					Background color of the tooltip.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::color('sched_column_tooltip_color_bg', SCHED_DB::get('column_tooltip_color_bg')); ?>
				<?php echo SCHED_HTML::popover('column_tooltip_color_bg'); ?>
			</div>
		</div>
		<div class="sched-a-option">
			<div class="sched-a-option-left">
				<div class="sched-a-option-title">Column Tooltip Text</div>
				<div class="sched-a-option-description">
					Text color of the tooltip.
				</div>
			</div>
			<div class="sched-a-option-right">
				<?php echo SCHED_HTML::color('sched_column_tooltip_color_text', SCHED_DB::get('column_tooltip_color_text')); ?>
				<?php echo SCHED_HTML::popover('column_tooltip_color_text'); ?>
			</div>
		</div>
	</div><!-- #sched_toggle_column_tooltip -->
</div>