<input type="hidden" value="<?php echo $value; ?>" name="<?php echo $settings['param_name']; ?>" class="wpb_vc_param_value sched_vc_option_layout" />

<style type="text/css">
	.sched-vc-options {

	}

	.sched-vc-options:after {
		content: ".";
		display: block;
		height: 0;
		clear: both;
		visibility: hidden;
	}

		.sched-vc-options .sched-vc-option {
			float: left;
			width: 33%;
			cursor: pointer;
		}

		.sched-vc-options .sched-vc-option-msg {
			text-align: center;
			margin-top: 10px;
			font-style: italic;
		}

		.sched-vc-options .sched-vc-option.sched-vc-option-required-addon .sched-vc-option-inside {
			opacity: .5;
		}

			.sched-vc-options .sched-vc-option .sched-vc-option-inside {
				/*margin: 5px;*/
				background: #e4e4e4;
				color: #6b6b6b;
				font-size: 14px;
				font-weight: bold;
				height: 60px;
				/*line-height: 55px;*/
				margin: 0 10px;
				padding: 0 0 0 10px;
				-webkit-transition: all .2s;
				-moz-transition: all .2s;
				-o-transition: all .2s;
				-ms-transition: all .2s;
				transition: all .2s;
			}

			.sched-vc-options .sched-vc-option.sched-vc-option-selected .sched-vc-option-inside {
				background: #305288;

			}

				.sched-vc-options .sched-vc-option.sched-vc-option-selected .sched-vc-option-title {
					color: #fff;

				}
				.sched-vc-options .sched-vc-option.sched-vc-option-selected .sched-vc-option-check {
					color: #305288;
					background: #4972b2;
				}

			.sched-vc-options .sched-vc-option .sched-vc-option-title {
				float: left;
				height: 40px;
				margin: 10px;
				line-height: 40px;
				-webkit-transition: all .2s;
				-moz-transition: all .2s;
				-o-transition: all .2s;
				-ms-transition: all .2s;
				transition: all .2s;
			}

			.sched-vc-options .sched-vc-option .sched-vc-option-check {
				float: right;
				width: 40px;
				height: 40px;
				margin: 10px;
				line-height: 40px;
				text-align: center;
				background: #f3f3f3;
				border-radius: 20px;
				color: transparent;
			}


</style>

<div class="sched-vc-options">
	<div class="sched-vc-option<?php if($value == 'default' || value == '') { echo ' sched-vc-option-selected'; } ?>" data-value="default">
		<div class="sched-vc-option-inside">
			<div class="sched-vc-option-title">Standard</div>
			<div class="sched-vc-option-check"><i class="fa fa-check"></i></div>
		</div>
	</div>
	<div class="sched-vc-option<?php if($value == 'list_view') { echo ' sched-vc-option-selected'; } ?>" data-value="list_view"> 
		<div class="sched-vc-option-inside">
			<div class="sched-vc-option-title">List</div>
			<div class="sched-vc-option-check"><i class="fa fa-check"></i></div>
		</div>
	</div>
	<div class="sched-vc-option<?php if($value == 'horizontal') { echo ' sched-vc-option-selected'; } ?><?php if(!defined('SCHED_H_FILE')) { ?> sched-vc-option-required-addon<?php } ?>" data-value="horizontal">
		<div class="sched-vc-option-inside">
			<div class="sched-vc-option-title">Horizontal</div>
			<div class="sched-vc-option-check"><i class="fa fa-check"></i></div>
		</div>
		<?php if(!defined('SCHED_H_FILE')) { ?>
		<div class="sched-vc-option-msg">Requires <a href="https://codecanyon.net/item/responsive-timetable-horizontal-addon/17365455?ref=RikdeVos" target="_blank">Addon</a></div>
		<?php } ?>
	</div>
</div>

<script type="text/javascript">
	(function($){

		$(".sched-vc-option .sched-vc-option-inside").click(function(e) {
			var $parent = $(this).parent();
			e.preventDefault();
			if($parent.hasClass('sched-vc-option-required-addon')) {
				return;
			}
			$(".sched-vc-option").removeClass('sched-vc-option-selected');
			$parent.addClass('sched-vc-option-selected');
			$(".sched_vc_option_layout").val($parent.attr('data-value'))
		})

	})(jQuery);
</script>

<!-- <label><input type="radio" name="<?php echo $settings['param_name']; ?>" class="wpb_vc_param_value" value="default" <?php if($value == 'default') { echo 'checked="checked"'; } ?> /> Default</label>
<label><input type="radio" name="<?php echo $settings['param_name']; ?>" class="wpb_vc_param_value" value="horizontal" <?php if($value == 'horizontal') { echo 'checked="checked"'; } ?> /> Horizontal</label>
<label><input type="radio" name="<?php echo $settings['param_name']; ?>" class="wpb_vc_param_value" value="list_view" <?php if($value == 'list_view') { echo 'checked="checked"'; } ?> /> List View</label> -->
