<?php

/* ======= REMOVE METABOXES ======= */

if ( ! function_exists( 'kidsworld_rv_slider_remove_metaboxes' ) ) {

  function kidsworld_rv_slider_remove_metaboxes() {

    if ( is_admin() ) {
		foreach ( get_post_types() as $post_type ) {
			remove_meta_box( 'mymetabox_revslider_0', $post_type, 'normal' );
		}
    }

  }

  add_action( 'do_meta_boxes', 'kidsworld_rv_slider_remove_metaboxes' );

}