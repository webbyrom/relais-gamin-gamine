<?php

/* ======= ADD SETTINGS OPTIONS ======= */

function kidsworld_vc_add_setting_fields( $vc_settings ) {

  $vc_settings->addSection( 'kidsworld-vc-options', null, 'kidsworld_vc_options_description' );

  $vc_settings->addField( 'kidsworld-vc-options', esc_html__( 'Theme Settings', 'kids-world' ), 'kidsworld_vc_theme_settings', 'kidsworld_vc_sanitize_checkbox', 'kidsworld_vc_theme_settings' );

  if ( kidsworld_vc_settings_on() ) {
    $vc_settings->addField( 'kidsworld-vc-options', esc_html__( 'Hide Extra Metaboxes', 'kids-world' ), 'kidsworld_vc_hide_extra_metaboxes', 'kidsworld_vc_sanitize_checkbox', 'kidsworld_vc_callback_hide_extra_metaboxes' );
    $vc_settings->addField( 'kidsworld-vc-options', esc_html__( 'Remove Default Elements', 'kids-world' ), 'kidsworld_vc_remove_dafault_elements', 'kidsworld_vc_sanitize_checkbox', 'kidsworld_vc_callback_hide_default_elements' );
    $vc_settings->addField( 'kidsworld-vc-options', esc_html__( 'Remove Default Templates', 'kids-world' ), 'kidsworld_vc_remove_default_templates', 'kidsworld_vc_sanitize_checkbox', 'kidsworld_vc_callback_remove_default_templates' );
    $vc_settings->addField( 'kidsworld-vc-options', esc_html__( 'Remove Frontend Editor', 'kids-world' ), 'kidsworld_vc_disable_frontend_editor', 'kidsworld_vc_sanitize_checkbox', 'kidsworld_vc_callback_disable_frontend_editor' );
    $vc_settings->addField( 'kidsworld-vc-options', esc_html__( 'Hide Design Options', 'kids-world' ), 'kidsworld_vc_hide_design_options', 'kidsworld_vc_sanitize_checkbox', 'kidsworld_vc_callback_hide_design_options' );
  }

}

add_action( 'vc_settings_tab-kidsworld-vc-options', 'kidsworld_vc_add_setting_fields' );

/* ======= ADD CHECKBOXES ======= */

function kidsworld_vc_theme_settings() {
  return kidsworld_vc_options_checkbox( 'kidsworld_vc_theme_settings', true, esc_html__( 'Enable', 'kids-world' ), esc_html__( 'Enable this option to overwrite certain Visual Composer shortcodes to match with theme design.', 'kids-world' ) );
}

function kidsworld_vc_callback_hide_extra_metaboxes() {
  return kidsworld_vc_options_checkbox( 'kidsworld_vc_hide_extra_metaboxes', true, esc_html__( 'Enable', 'kids-world' ), esc_html__( 'Removes an uncommonly used metaboxes.', 'kids-world' ) );
}

function kidsworld_vc_callback_hide_default_elements() {
  return kidsworld_vc_options_checkbox( 'kidsworld_vc_remove_dafault_elements', true, esc_html__( 'Enable', 'kids-world' ), esc_html__( 'Enable to use only theme styled elements.', 'kids-world' ) );
}

function kidsworld_vc_callback_remove_default_templates() {
  return kidsworld_vc_options_checkbox( 'kidsworld_vc_remove_default_templates', true, esc_html__( 'Enable', 'kids-world' ), esc_html__( 'Enable it when you are hiding default Visual Composer elements.', 'kids-world' ) );
}

function kidsworld_vc_callback_disable_frontend_editor() {
  return kidsworld_vc_options_checkbox( 'kidsworld_vc_disable_frontend_editor', false, esc_html__( 'Enable', 'kids-world' ), esc_html__( 'Enable to hide Frontend editor access.', 'kids-world' ) );
}

function kidsworld_vc_callback_hide_design_options() {
  return kidsworld_vc_options_checkbox( 'kidsworld_vc_hide_design_options', true, esc_html__( 'Enable', 'kids-world' ), esc_html__( 'Hide design and styling options which are already provided with the theme.', 'kids-world' ) );
}

/* ======= CHECK THEME SETTINGS  ======= */

function kidsworld_vc_settings_on() {
  return get_option( 'wpb_js_kidsworld_vc_theme_settings', true );
}

/* ======= DISABLE AUTOMATIC UPDATE  ======= */

function kidsworld_vc_set_as_theme() {
  if ( get_option( 'wpb_js_kidsworld_vc_hide_design_options', true ) && kidsworld_vc_settings_on() ) {
    vc_set_as_theme( true );
  } else {
    add_action( 'admin_notices', 'kidsworld_vc_hide_update_notice', -99 );
    vc_manager()->disableUpdater();
  }
}

add_action( 'vc_before_init', 'kidsworld_vc_set_as_theme' );

function kidsworld_vc_hide_update_notice() {
  remove_action( 'admin_notices', array( vc_license(), 'adminNoticeLicenseActivation' ) );
}

/* ======= THEME SETTINGS TAB  ======= */

function kidsworld_vc_add_options_tab($tabs) {
  $tabs['kidsworld-vc-options'] = 'Theme Settings';
  return $tabs;
}

add_filter( 'vc_settings_tabs', 'kidsworld_vc_add_options_tab');

/* ======= SANITIZE CHECKBOX ======= */

function kidsworld_vc_sanitize_checkbox( $value ) {
  return $value;
}

/* ======= PAGE DESCRIPTION  ======= */

function kidsworld_vc_options_description( $tab ) {
  if ( $tab['id'] == 'wpb_js_composer_settings_kidsworld-vc-options' ) { ?>

    <div class="tab_intro">
      <p class="description">
        <?php _e( 'Enable / Disable Visual Composer custom settings for better integration with theme.', 'kids-world' ) ?>
      </p>
    </div>

  <?php }
}

/* ======= SETTINGS - CHECKBOX FUNCTION  ======= */

function kidsworld_vc_options_checkbox( $setting_id, $default, $label, $description ) {
  $kidsworld_vc_options_checked = ( $kidsworld_vc_options_checked = get_option( 'wpb_js_' . $setting_id, $default ) ) ? $kidsworld_vc_options_checked : false; ?>

  <label>
    <input type="checkbox"<?php echo( $kidsworld_vc_options_checked ? ' checked="checked";' : '' ) ?> value="1" id="wpb_js_<?php echo $setting_id ?>" name="<?php echo 'wpb_js_' . $setting_id ?>">
    <?php echo $label; ?>
  </label>
  <br/>
  <p class="description indicator-hint"><?php echo $description; ?></p>

  <?php
}

/* ======= REMOVE DEFAULT TEMPLATES  ======= */
if ( get_option( 'wpb_js_kidsworld_vc_remove_default_templates', true ) && kidsworld_vc_settings_on() ) {
  add_filter( 'vc_load_default_templates', '__return_empty_array', 1 );
}

/* ======= REMOVE META  ======= */

if ( ! function_exists( 'kidsworld_vc_remove_metaboxes' ) && kidsworld_vc_settings_on() ) {

  function kidsworld_vc_remove_metaboxes() {

    if ( is_admin() ) {
      foreach ( get_post_types() as $post_type ) {
        remove_meta_box( 'vc_teaser',  $post_type, 'side' );
      }
    }

  }

  if ( get_option( 'wpb_js_kidsworld_vc_hide_extra_metaboxes', true ) ) {
    add_action( 'do_meta_boxes', 'kidsworld_vc_remove_metaboxes' );
  }

}

/* ======= DISABLE FRONTEND EDITOR ======= */

if ( kidsworld_vc_settings_on() ) {

  if ( function_exists( 'vc_disable_frontend' ) && get_option( 'wpb_js_kidsworld_vc_disable_frontend_editor', false ) ) {
    vc_disable_frontend();
  }

}