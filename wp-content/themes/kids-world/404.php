<?php 

ob_start();
header("HTTP/1.1 404 Not Found");

get_header(); ?>
	<div class="kidsworld_container">	
		<div class="kidsworld_column kidsworld_one_half first">	
			<?php 
			$kidsworld_error_page_image = (kidsworld_get_option('kidsworld_error_image') <> '') ? kidsworld_get_option('kidsworld_error_image') : get_template_directory_uri().'/framework/images/error-404.png'; ?>			
			<img src="<?php echo esc_url($kidsworld_error_page_image); ?>" alt="" />		
		</div>		
		<div class="kidsworld_column kidsworld_one_half">		
			<?php 

			if ( class_exists( 'WPML_String_Translation' ) ) {
				echo icl_translate('Theme Mod', 'kidsworld_error_content', wp_kses(kidsworld_get_option('kidsworld_error_content'),kidsworld_kses_allowed_textarea()) );
			} else {
				echo do_shortcode( wp_kses_post(kidsworld_get_option('kidsworld_error_content')) ); 
			}
			
			?>			
		</div>
	</div>
<?php get_footer(); ?>