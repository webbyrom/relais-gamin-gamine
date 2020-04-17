		<div class="clear"></div>		

	</div> <!-- .kidsworld_main_container -->

</div> <!-- .kidsworld_containers_holder -->

<?php if ( kidsworld_get_option('kidsworld_contact_footer_on','on') == 'on' ) { ?>

	<div class="kidsworld_main_container">
		<div class="kidsworld_cotact_footer">
			<div class="kidsworld_container">
				<div class="kidsworld_cotact_footer_wrap kidsworld_row">
					<?php if ( kidsworld_get_option('kidsworld_cf_location','on') == 'on' ) { ?>
					
						<div class="kidsworld_column <?php echo kidsworld_get_option('kidsworld_cf_column','kidsworld_column4'); ?> kidsworld_cf_column">
							<div class="kidsworld_column_gap cf_home">
								<div class="kidsworld_cf_icon_line">
									<div class="kidsworld_contact_icon ci_home">
										<i class="fa fa-map-marker"></i>							
									</div>
								</div>
								<p><?php echo wp_kses(kidsworld_get_option('kidsworld_cf_location_text','456, Lorem Street,<br/>New York, US 33454.'),kidsworld_kses_allowed_textarea()); ?></p>		
							</div>						
						</div>
							

				<?php } ?>

				<?php if ( kidsworld_get_option('kidsworld_cf_phone','on') == 'on' ) { ?>
					
						<div class="kidsworld_column <?php echo kidsworld_get_option('kidsworld_cf_column','kidsworld_column4') ?> kidsworld_cf_column">
							<div class="kidsworld_column_gap cf_phone">
								<div class="kidsworld_cf_icon_line">
									<div class="kidsworld_contact_icon ci_phone">
										<i class="fa fa-phone"></i>							
									</div>
								</div>
								<p><a href="tel:<?php echo sanitize_text_field(kidsworld_get_option('kidsworld_cf_location_phone_one','+1 (409) 987- 5873')); ?>"><?php echo sanitize_text_field(kidsworld_get_option('kidsworld_cf_location_phone_one','+1 (409) 987- 5873')); ?></a></p>
								<p><a href="tel:<?php echo sanitize_text_field(kidsworld_get_option('kidsworld_cf_location_phone_two','+1 (409) 987- 5873')); ?>"><?php echo sanitize_text_field(kidsworld_get_option('kidsworld_cf_location_phone_two','+1 (409) 987- 5873')); ?></a></p>
							</div>						
						</div>
					
				<?php } ?>

				<?php if ( kidsworld_get_option('kidsworld_cf_email','on') == 'on' ) {
					?>
					
						<div class="kidsworld_column <?php echo kidsworld_get_option('kidsworld_cf_column','kidsworld_column4') ?> kidsworld_cf_column">
							<div class="kidsworld_column_gap cf_email">
								<div class="kidsworld_cf_icon_line">
									<div class="kidsworld_contact_icon ci_email">
										<i class="fa fa-envelope"></i>							
									</div>
								</div>
								<p><a href="mailto:<?php echo sanitize_email( kidsworld_get_option('kidsworld_cf_location_email_one','info@loremips.com') ); ?>"><?php echo sanitize_email( kidsworld_get_option('kidsworld_cf_location_email_one','info@loremips.com') ); ?></a></p>
								<p><a href="mailto:<?php echo sanitize_email( kidsworld_get_option('kidsworld_cf_location_email_two','lorem@loremips.com') ) ?>"><?php echo sanitize_email( kidsworld_get_option('kidsworld_cf_location_email_two','lorem@loremips.com') ) ?></a></p>
							</div>						
						</div>
					
				<?php } ?>

				<?php if ( kidsworld_get_option('kidsworld_cf_socialmedia','on') == 'on' ) { ?>
					
						<div class="kidsworld_column <?php echo kidsworld_get_option('kidsworld_cf_column','kidsworld_column4') ?> kidsworld_cf_column">
							<div class="kidsworld_column_gap cf_social">
								<div class="kidsworld_cf_icon_line">
									<div class="kidsworld_contact_icon ci_smedia">
										<i class="fa fa-thumbs-o-up"></i>							
									</div>
								</div>
								<ul class="cf_sm_icons">
								<?php kidsworld_display_social_media(); ?>
								</ul>
							</div>						
						</div>				

				<?php } ?>

				<div class="clear"></div>
				</div>
				
			</div>
		</div>
	</div>
	
<?php } ?>

<?php 

if ( kidsworld_get_option( 'kidsworld_footer_on','on' ) == 'on') { ?>


<div class="kidsworld_main_container fwidget_container">

<div class="kidsworld_footer_border"><span></span></div>
	<footer class="footer kidsworld_css_transition" id="footer">	

		<div class="kidsworld_container">
			<?php 
			if ( kidsworld_get_option('kidsworld_footer_widget_on','on') == 'on' ) {
				kidsworld_display_footer_column();
			}					
			?>
			
		</div>
		<div class="clear"></div>

		<?php

		if ( class_exists( 'WPML_String_Translation' ) ) {
			$kidsworld_footer_copyright_left = icl_translate('Theme Mod', 'swm_footer_copyright', kidsworld_get_option('kidsworld_footer_copyright_left'));
			$kidsworld_footer_copyright_right = icl_translate('Theme Mod', 'swm_footer_copyright', kidsworld_get_option('kidsworld_footer_copyright_right'));
		} else {
			$kidsworld_footer_copyright_left = kidsworld_get_option('kidsworld_footer_copyright_left','Copyright &copy; 2018, KidsWorld. All Rights Reserved.'); 
			$kidsworld_footer_copyright_right = kidsworld_get_option('kidsworld_footer_copyright_right','Designed by <a href="#" target="_blank">Softwebmedia Inc.</a>'); 
		}
		
		if ( $kidsworld_footer_copyright_left != '' || $kidsworld_footer_copyright_right != '' ) {
			?>	
			<div class="kidsworld_footer_copyright">
				<div class="kidsworld_container">
					<?php 
					if ( $kidsworld_footer_copyright_left != '' ) { ?>
						<p class="left"><?php echo $kidsworld_footer_copyright_left; ?></p>
						<?php 
					} ?>
					<?php 
					if ( $kidsworld_footer_copyright_right != '' ) { ?>
						<p class="right"><?php echo $kidsworld_footer_copyright_right; ?></p>
						<?php 
					} ?>				
					<div class="clear"></div>
				</div>
			</div>
			<?php 
		} ?>
	
	</footer>
		
</div>

<?php } ?>

<?php if ( kidsworld_get_option( 'kidsworld_bottom_go_top_scroll_btn_on','on' ) == 'on') { ?>
	<a id="kidsworld_go_top_scroll_btn"><i class="fa fa-angle-up"></i></a> <?php
}

if ( is_single() && comments_open() ) { wp_enqueue_script( 'comment-reply' ); }
wp_footer();

?>

</body>
</html>