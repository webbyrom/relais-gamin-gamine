<?php
include_once( SWMSC_PLUGIN_DIR . '/setup-options/import-export.php' );

function swmsc_add_customizer_menu() {
  add_menu_page( esc_html__('Setup Options','pre-school-shortcodes'), esc_html__('Setup Options','pre-school-shortcodes'), 'edit_theme_options', 'setup-options-home', 'setup_options_home_content', NULL,59);
  
  add_submenu_page( 'setup-options-home', esc_html__('Customizer Import','pre-school-shortcodes'), esc_html__('Import Options','pre-school-shortcodes'), 'edit_theme_options', 'import-customizer-settings', 'swmsc_customizer_import_page' );
  add_submenu_page( 'setup-options-home', esc_html__('Customizer Export','pre-school-shortcodes'), esc_html__('Export Options','pre-school-shortcodes'), 'edit_theme_options', 'export-customizer-settings', 'swmsc_customizer_export_page' );
  add_submenu_page( 'setup-options-home', esc_html__('Customizer Reset','pre-school-shortcodes'), esc_html__('Reset Options','pre-school-shortcodes'), 'edit_theme_options', 'reset-customizer-settings', 'swmsc_customizer_reset_page' );
}

add_action( 'admin_menu', 'swmsc_add_customizer_menu' );

function setup_options_home_content() {

	?>
	<div class="setup_options_container">
		<div class="setup_options_content">
			<h2>Site Setup Options</h2>		

			<div class="setup_options_box">
				<span class="dashicons dashicons-admin-settings"></span>
				<h3><?php echo esc_html__('Live Customizer','pre-school-shortcodes'); ?></h3>
				<p><?php echo esc_html__('Customize webiste with live preview','pre-school-shortcodes'); ?></p>
				<p class="so_btn"><a href="<?php echo admin_url( 'customize.php');?>"><?php echo esc_html__('Start Now!','pre-school-shortcodes'); ?></a></p>
			</div>

			<div class="setup_options_box">
				<span class="dashicons dashicons-download"></span>
				<h3><?php echo esc_html__('Import Options','pre-school-shortcodes'); ?></h3>
				<p><?php echo esc_html__('Import customizer options settings','pre-school-shortcodes'); ?></p>
				<p class="so_btn"><a href="<?php echo admin_url( 'admin.php?page=import-customizer-settings');?>"><?php echo esc_html__('Read more','pre-school-shortcodes'); ?></a></p>
			</div>

			<div class="setup_options_box">
				<span class="dashicons dashicons-upload"></span>
				<h3><?php echo esc_html__('Export Options','pre-school-shortcodes'); ?></h3>
				<p><?php echo esc_html__('Backup your customizer settings','pre-school-shortcodes'); ?></p>
				<p class="so_btn"><a href="<?php echo admin_url( 'admin.php?page=export-customizer-settings');?>"><?php echo esc_html__('Read more','pre-school-shortcodes'); ?></a></p>
			</div>

			<div class="setup_options_box">
				<span class="dashicons dashicons-update"></span>
				<h3><?php echo esc_html__('Reset Options','pre-school-shortcodes'); ?></h3>
				<p><?php echo esc_html__('Reset all custmoizer options settings','pre-school-shortcodes'); ?></p>
				<p class="so_btn"><a href="<?php echo admin_url( 'admin.php?page=reset-customizer-settings');?>"><?php echo esc_html__('Read more','pre-school-shortcodes'); ?></a></p>
			</div>

			<div class="setup_options_box import-demo-datas">
				<div>
					<span class="dashicons dashicons-download"></span>
					<h3><?php echo esc_html__('Import Demo Data','pre-school-shortcodes'); ?></h3>
					<p><?php echo esc_html__('Import posts, pages, slider, widgets, images etc. with one click.','pre-school-shortcodes'); ?></p>
					<p class="so_btn"><a href="<?php echo admin_url( 'admin.php?page=radium_demo_installer');?>"><?php echo esc_html__('Read more','pre-school-shortcodes'); ?></a></p>
				</div>
				
			</div>

		</div>
	</div>

	<?php
}

function swmsc_enqueue_admin_styles() {
	wp_enqueue_style( 'swmsc-setup-options-page', SWMSC_PLUGIN_URL . 'setup-options/css/swmsc-setup-options.css', NULL, SWMSC_PLUGIN_VERSION, 'all' );
}
add_action( 'admin_enqueue_scripts', 'swmsc_enqueue_admin_styles' );