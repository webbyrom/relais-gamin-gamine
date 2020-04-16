<?php

function kidsworld_customizer_options_output_css() {

  $kidsworld_output_folder = KIDSWORLD_ADMIN . '/customizer/output';

  require_once( $kidsworld_output_folder . '/option-variables.php' );

  ob_start();

  echo '<style id="kidsworld_customizer_css_output" type="text/css">';

  require_once( $kidsworld_output_folder . '/general-css.php' );
  require_once( $kidsworld_output_folder . '/header-css.php' );
  require_once( $kidsworld_output_folder . '/sidebar-css.php' );
  require_once( $kidsworld_output_folder . '/blog-css.php' );
  require_once( $kidsworld_output_folder . '/footer-css.php' );
  require_once( $kidsworld_output_folder . '/posts/'.kidsworld_get_option('kidsworld_post_style_name','post-a').'.php' );
  require_once( $kidsworld_output_folder . '/ie-fix.php' );
  require_once( $kidsworld_output_folder . '/external-plugin.php' );

  if ( kidsworld_get_option('kidsworld_advanced_styling_on','off') == 'on' ) {         
      require_once( $kidsworld_output_folder . '/advanced-styling.php' );
  }  
  
  echo kidsworld_get_option('kidsworld_custom_css');

  echo '</style>';

  $kidsworld_output_css = ob_get_contents(); 

  ob_end_clean();

  $kidsworld_clean_css = preg_replace( '#/\*.*?\*/#s', '', $kidsworld_output_css ); 		/* remove comments */
  $kidsworld_compress_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $kidsworld_clean_css ); 	/* remove white space */
  $kidsworld_final_css = preg_replace( '/\s\s+(.*)/', '$1', $kidsworld_compress_css );        	/* remove initial white space */

  echo $kidsworld_final_css;

}

add_action( 'wp_head', 'kidsworld_customizer_options_output_css', 9998, 0 );