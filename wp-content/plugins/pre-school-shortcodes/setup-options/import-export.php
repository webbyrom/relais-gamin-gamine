<?php 

ob_start();

// Import

function swmsc_customizer_import_page() {
?>
	<div class="setup_options_container">
		<div class="setup_options_content">
			<div class="box_import_export_reset">

				<?php
				if ( isset( $_FILES['import'] ) && check_admin_referer( 'swmsc-customizer-import' ) ) {
					if ( $_FILES['import']['error'] > 0 ) {
						wp_die( 'An error occured.' );
					} else {
						$swmsc_import_file_name = $_FILES['import']['name'];
						$swmsc_explode_filename = explode( '.', $swmsc_import_file_name );
						$swmsc_file_ext  = strtolower( end( $swmsc_explode_filename ) );
						$swmsc_file_size = $_FILES['import']['size'];
						if ( ( $swmsc_file_ext == 'json' ) && ( $swmsc_file_size < 500000 ) ) {
							$swmsc_encode_options = file_get_contents( $_FILES['import']['tmp_name'] );
							$swmsc_import_file_options = json_decode( $swmsc_encode_options, true );
							foreach ( $swmsc_import_file_options as $key => $value ) {
								update_option( $key, $value );
							}
							echo '<div class="import-export-success"><p><span class="dashicons dashicons-yes"></span>'.esc_html__('All options were restored successfully!','pre-school-shortcodes').'</p></div>';
						} else {
							echo '<div class="import-export-error"><p><span class="dashicons dashicons-no-alt"></span>'.esc_html__('Invalid file or file size too big.','pre-school-shortcodes').'</p></div>';
						}
					}
				}
				?>				
				<h2>Import Customizer Settings</h2>
				<form method="post" enctype="multipart/form-data">
					<?php wp_nonce_field( 'swmsc-customizer-import' ); 
					echo '<p class="info_text">' . esc_html__('Click "Choose File" button and choose a JSON file from your computer that you backup before.','pre-school-shortcodes') . '</p>';            
					?>
					<div class="import-export-input"><input type="file" id="customizer-upload" name="import"></p></div>					
					<p class="submit"> <input type="submit" name="submit" id="customizer-submit" class="button" value="Import Customizer Settings" disabled> </p> 
				</form>

			</div>
		</div>
	</div>

<?php
}

// Export

function swmsc_customizer_export_page() {
	if ( ! isset( $_POST['export'] ) ) {
	?>

		<div class="setup_options_container">
			<div class="setup_options_content">
				<div class="box_import_export_reset export_p">
					<h2>Export Customizer Settings</h2>
					<form method="post">
						<?php wp_nonce_field( 'swmsc-customizer-export' );

						echo '<p>'.esc_html__('When you click the button below WordPress will create an JSON file for you to save to your computer.','pre-school-shortcodes').'</p>';
						echo '<p>'.esc_html__('This format, which we call WordPress Customizer Settings, will contain your customizer settings for this theme.','pre-school-shortcodes').'</p>';

						echo '<p>'.esc_html__('Once you have saved the download file, you can use the Customizer Import function to import previously exported settings.','pre-school-shortcodes').'</p>';       
						?>
						<p class="submit"><input type="submit" name="export" class="button button-primary" value="Export Customizer Settings"></p>
					</form>
				</div>
			</div>
		</div>			
		
	<?php
	} elseif ( check_admin_referer( 'swmsc-customizer-export' ) ) {

		$swmsc_export_file_blogname  = strtolower( str_replace(' ', '', get_option( 'blogname' ) ) );
		$swmsc_export_file_date      = date( 'm-d-Y' );
		$swmsc_export_file_json_name = $swmsc_export_file_blogname . '-customizer-' . $swmsc_export_file_date;
		$swmsc_export_file_options   = swmsc_customizer_options_list();

		foreach ( $swmsc_export_file_options as $key => $value ) {
			$swmsc_export_file_get_value = maybe_unserialize( get_option( $key ) );
			
			if ( $swmsc_export_file_get_value == '' ) {
				$swmsc_export_file_get_value = $value;
			}

			$data[$key] = $swmsc_export_file_get_value;
		}

		$swmsc_export_json_file = json_encode( $data );

		ob_clean();

		echo $swmsc_export_json_file;

		header( 'Content-Type: text/json; charset=' . get_option( 'blog_charset' ) );
		header( 'Content-Disposition: attachment; filename=' . $swmsc_export_file_json_name . '.json' );

		exit();

	}
}

// Reset

function swmsc_customizer_reset_page() { ?>

	<div class="setup_options_container">
			<div class="setup_options_content">
				<div class="box_import_export_reset export_p">				
						
						<?php
							if ( isset( $_POST['reset'] ) && check_admin_referer( 'swmsc-customizer-options-reset' ) ) {

								$swmsc_customizer_options_list = swmsc_customizer_options_list();

								foreach (  $swmsc_customizer_options_list as $key => $value ) {
									delete_option( $key );
								}

								echo '<div class="import-export-success"><p>'.esc_html__('All Customizer settings were successfully reset.','pre-school-shortcodes').'</p></div>';

							}
						?>	

						<h2>Reset Customizer Settings</h2>
						<form method="post">
							<?php wp_nonce_field( 'swmsc-customizer-options-reset' ); ?>
							<p><?php echo esc_html__('When you click the button below WordPress will reset your Customizer settings as if it were a brand new installation.','pre-school-shortcodes'); ?></p>
							<p><span class="red_col bold"><?php echo esc_html__('Be extremely careful using this option','pre-school-shortcodes'); ?></span> <?php echo esc_html__('as there is no way to revert this option once it has been made unless you previously exported your settings to use as a backup.','pre-school-shortcodes'); ?></p>
							<p class="submit">
								<input type="submit" id="swmsc-customizer-options-reset-submit" class="button button-primary" value="Reset Customizer Settings">
								<input type="hidden" name="reset" value="reset">
							</p>
						</form>

				</div>
			</div>
		</div>	

<?php }

// Options List Filter

function swmsc_customizer_options_list() {   
    
  	$swmsc_theme_options_list = array('option_name' => 'default_value');
	return apply_filters( 'swmsc_customizer_options_list', $swmsc_theme_options_list );

}
