<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new swmsc_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<div id="swmsc-popup">

	<div id="swmsc-shortcode-wrap">
		
		<div id="swmsc-sc-form-wrap">
		
			<div id="swmsc-sc-form-head">
			
				<?php echo $shortcode->popup_title; ?>
			
			</div>
			<!-- /#swmsc-sc-form-head -->
			
			<form method="post" id="swmsc-sc-form">
			
				<table id="swmsc-sc-form-table">
				
					<?php echo $shortcode->output; ?>
					
					<tbody>
						<tr class="form-row">
							<?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
							<td class="field"><a href="#" class="button button-primary swmsc-insert button-large "><?php _e('Insert Shortcode', 'pre-school-shortcodes') ?></a></td>							
						</tr>
					</tbody>
				
				</table>
				<!-- /#swmsc-sc-form-table -->
				
			</form>
			<!-- /#swmsc-sc-form -->
		
		</div>
		<!-- /#swmsc-sc-form-wrap -->		
		
		<div class="clear"></div>
		
	</div>
	<!-- /#swmsc-shortcode-wrap -->

</div>
<!-- /#swmsc-popup -->

</body>
</html>