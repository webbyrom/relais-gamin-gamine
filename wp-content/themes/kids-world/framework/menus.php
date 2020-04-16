<?php

/* **************************************************************************************
	Register WordPress Menus
************************************************************************************** */

if ( ! function_exists('kidsworld_register_menu')) {
	function kidsworld_register_menu() {
		register_nav_menus(array(
			'primary' => esc_html__('Top Navigation', 'kids-world'),
			'events' => esc_html__('Events Page Horizontal Menu', 'kids-world'),
			'portfolio' => esc_html__('Classic Portfolio Page Horizontal Menu', 'kids-world')
		));
	} // end function

	add_action( 'init' , 'kidsworld_register_menu' );

}

if ( ! function_exists('kidsworld_primary_nav')) {
	function kidsworld_primary_nav() {

		wp_nav_menu( array(
			'theme_location' => 'primary',
			'sort_column' => 'menu_order',
			'container' =>false,
			'menu_class' => 'kidsworld_top_nav',
			'menu_id' => 'kidsworld_top_nav',
			'echo' => true,
			'before' => '',
			'after' => '',
			'link_before' => '<span>',
			'link_after' => '</span>',
			'depth' => 0,
			'fallback_cb' => 'kidsworld_default_topmenu'
		) );

	}
} // end if

// fallback function

if ( ! function_exists('kidsworld_default_topmenu')) {
	function kidsworld_default_topmenu() {
		echo '<ul class="kidsworld-menu-setting-msg"><li>Assign Menu from Admin > Appearance > Menus > Manage Locations > Top Navigation</li></ul>';
	}
}


if ( ! function_exists('kidsworld_events_horizontal_menu')) {
	function kidsworld_events_horizontal_menu() {
		wp_nav_menu( array(
			'theme_location' => 'events',
			'sort_column' => 'menu_order',
			'container' =>false,
			'menu_class' => 'events_h_menu',
			'menu_id' => 'events_h_menu',
			'echo' => true,
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 0,
			'fallback_cb' => ''
		) );
	}
} // end if


if ( ! function_exists('kidsworld_display_portfolio_menu')) {
	function kidsworld_display_portfolio_menu() {

		if ( has_nav_menu( 'portfolio' )  ) {
			?>
			<div class="kidsworld_pf_classic_menu">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'portfolio',
					'sort_column' => 'menu_order',
					'container'       => '',
					'container_class' => '',
					'menu_class' => 'kidsworld_h_menu',
					'menu_id' => 'kidsworld_h_menu',
					'echo' => true,
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'depth' => 0,
					'fallback_cb' => ''
				) );
				?>
				<div class="clear"></div>
			</div>
			<?php
		}

	} // end function
} // end if


/* **************************************************************************************
	Main Navigation HTML
************************************************************************************** */

if ( ! function_exists('kidsworld_main_nav')) {
	function kidsworld_main_nav() {
		if ( kidsworld_get_option('kidsworld_menu_on','on') == 'on' ) :	?>
			<div class="kidsworld_main_nav">
				<?php echo kidsworld_primary_nav(); ?>
				<div class="clear"></div>
			</div> <?php
		endif;
	}
}


/* **************************************************************************************
	Add Active link custom class
************************************************************************************** */

add_filter('nav_menu_css_class', 'kidsworld_add_active_class', 10, 2 );

function kidsworld_add_active_class($classes, $item) {

	if( $item->menu_item_parent == 0 &&
		in_array( 'current-menu-item', $classes ) ||
		in_array( 'current-menu-ancestor', $classes ) ||
		in_array( 'current-menu-parent', $classes ) ||
		in_array( 'current_page_parent', $classes ) ||
		in_array( 'current_page_ancestor', $classes ) ) {
    	$classes[] = "kidsworld_m_active";
  	}

  	return $classes;
}

/* **************************************************************************************
	Extend Nav Menu Walker to add category items with title, thumb and meta
************************************************************************************** */

class kidsworld_main_nav_walker extends Walker_Nav_Menu {

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$kidsworld_menu_indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$kidsworld_menu_classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$kidsworld_menu_classes[] = 'menu-item-' . $item->ID;

		/**
		* Filter the CSS class(es) applied to a menu item's list item element.
		*
		* @since 3.0.0
		* @since 4.1.0 The `$depth` parameter was added.
		*
		* @param array  $kidsworld_menu_classes The CSS classes that are applied to the menu item's `<li>` element.
		* @param object $item    The current menu item.
		* @param array  $args    An array of {@see wp_nav_menu()} arguments.
		* @param int    $depth   Depth of menu item. Used for padding.
		*/
		$kidsworld_menu_class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $kidsworld_menu_classes ), $item, $args, $depth ) );
		$kidsworld_menu_class_names = $kidsworld_menu_class_names ? ' class="' . esc_attr( $kidsworld_menu_class_names ) . '"' : '';

		/**
		* Filter the ID applied to a menu item's list item element.
		*
		* @since 3.0.1
		* @since 4.1.0 The `$depth` parameter was added.
		*
		* @param string $menu_id The ID that is applied to the menu item's `<li>` element.
		* @param object $item    The current menu item.
		* @param array  $args    An array of {@see wp_nav_menu()} arguments.
		* @param int    $depth   Depth of menu item. Used for padding.
		*/
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $kidsworld_menu_indent . '<li' . $id . $kidsworld_menu_class_names .'>';

		$kidsworld_menu_atts = array();
		$kidsworld_menu_atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$kidsworld_menu_atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$kidsworld_menu_atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$kidsworld_menu_atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		/**
		* Filter the HTML attributes applied to a menu item's anchor element.
		*
		* @since 3.6.0
		* @since 4.1.0 The `$depth` parameter was added.
		*
		* @param array $kidsworld_menu_atts {
		*     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		*
		*     @type string $title  Title attribute.
		*     @type string $target Target attribute.
		*     @type string $rel    The rel attribute.
		*     @type string $href   The href attribute.
		* }
		* @param object $item  The current menu item.
		* @param array  $args  An array of {@see wp_nav_menu()} arguments.
		* @param int    $depth Depth of menu item. Used for padding.
		*/
		$kidsworld_menu_atts = apply_filters( 'nav_menu_link_attributes', $kidsworld_menu_atts, $item, $args, $depth );

		$kidsworld_menu_attributes = '';
		foreach ( $kidsworld_menu_atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$kidsworld_menu_attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;
		$item_output .= '<a'. $kidsworld_menu_attributes .'>';
		/** This filter is documented in wp-includes/post-template.php*/
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		/**
		* Filter a menu item's starting output.
		*
		* The menu item's starting output only includes `$args->before`, the opening `<a>`,
		* the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		* no filter for modifying the opening and closing `<li>` for a menu item.
		*
		* @since 3.0.0
		*
		* @param string $item_output The menu item's starting HTML output.
		* @param object $item        Menu item data object.
		* @param int    $depth       Depth of menu item. Used for padding.
		* @param array  $args        An array of {@see wp_nav_menu()} arguments.
		*/

		/**
		* Filter a menu item's starting output.
		*
		* The menu item's starting output only includes $args->before, the opening <a>,
		* the menu item's title, the closing </a>, and $args->after. Currently, there is
		* no filter for modifying the opening and closing <li> for a menu item.
		*
		* @since 3.0.0
		*
		* @param string $item_output The menu item's starting HTML output.
		* @param object $item        Menu item data object.
		* @param int    $depth       Depth of menu item. Used for padding.
		* @param array  $args        An array of arguments. @see wp_nav_menu()
		*/

		if ( $depth == 0 && $item->object == 'category' && $item->classes['0'] == "kidsworld-mega-menu" ) {
			$item_output .= '<ul class="kidsworld-nav-cat-posts">';
			global $post;
			$kidsworld_menuposts = get_posts( array( 'posts_per_page' => 3, 'category' => $item->object_id ) );
			foreach( $kidsworld_menuposts as $post ):
				$kidsworld_menu_post_title = get_the_title();
				$kidsworld_menu_post_link = get_permalink();
				$kidsworld_menu_post_image = wp_get_attachment_image_src( get_post_thumbnail_id(), "home_lfb" );
				$kidsworld_menu_post_img_link = '';

				if ( $kidsworld_menu_post_image != '' ){
					$kidsworld_menu_post_img_link .= '<a class="kidsworld_nav_p_img" href="' . $kidsworld_menu_post_link . '" title="' . $kidsworld_menu_post_title . '"><img src="' . esc_url($kidsworld_menu_post_image[0]). '" alt="' . $kidsworld_menu_post_title . '" /></a>';
				}

				$item_output .=
					'<li>'.$kidsworld_menu_post_img_link .'<a class="kidsworld_nav_p_title" href="' . $kidsworld_menu_post_link . '">' . $kidsworld_menu_post_title . '</a>
		                <div class="kidsworld_nav_p_meta">
		                	<span><i class="fa fa-clock-o"></i>' . get_the_time('d M Y') . '</span>
		                	<span><i class="fa fa-comment-o"></i>' . get_comments_number() . '</span>
		                	<span><i class="fa fa-eye"></i>'. kidsworld_get_post_views(get_the_ID()) .'</span>
		                </div>
		            </li>';

			endforeach;
			wp_reset_postdata();
			$item_output .= '</ul>';
			}
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}