<?php

function kidsworld_breadcrumb_trail( $args = array() ) {

	/* Create an empty variable for the breadcrumb. */
	$kidsworld_breadcrumb = '';

	$kidsworld_breadcrumb_arrow = is_rtl() ? '<i class="fa fa-angle-left"></i>' :'<i class="fa fa-angle-right"></i>';

	/* Set up the default arguments for the breadcrumb. */
	$defaults = array(
		'separator' => $kidsworld_breadcrumb_arrow,
		'before' => '',
		'after' => false,
		'front_page' => true,
		'show_home' => esc_html__('Home','kids-world'),
		'echo' => true
	);	

	/* Allow singular post views to have a taxonomy's terms prefixing the trail. */
	if ( is_singular() ) {
		$post = get_queried_object();
		$defaults["singular_{$post->post_type}_taxonomy"] = false;
	}

	/* Apply filters to the arguments. */
	$args = apply_filters( 'breadcrumb_trail_args', $args );

	/* Parse the arguments and extract them for easy variable naming. */
	$args = wp_parse_args( $args, $defaults );

	/* Get the trail items. */
	$kidsworld_bc_trail = kidsworld_breadcrumb_trail_get_items( $args );

	/* Connect the breadcrumb trail if there are items in the trail. */
	if ( !empty( $kidsworld_bc_trail ) && is_array( $kidsworld_bc_trail ) ) {

		/* Open the breadcrumb trail containers. */
		$kidsworld_breadcrumb = '<div class="kidsworld_breadcrumbs">';

		/* If $before was set, wrap it in a container. */
		$kidsworld_breadcrumb .= ( !empty( $args['before'] ) ? '<span class="kidsworld-bc-trail-before">' . $args['before'] . '</span> ' : '' );

		/* Wrap the $kidsworld_bc_trail['trail_end'] value in a container. */
		$kidsworld_get_post_format = get_post_format();
		$kidsworld_bc_title_char_length = 250;

		if ( $kidsworld_get_post_format == 'quote') {
			$kidsworld_bc_title_char_length = 50;
		}

		if ( !empty( $kidsworld_bc_trail['trail_end'] ) )
			$kidsworld_bc_trail['trail_end'] = '<span class="kidsworld-bc-trail-end">' . substr($kidsworld_bc_trail['trail_end'],0,$kidsworld_bc_title_char_length) . '</span>';

		/* Format the separator. */
		$kidsworld_bc_separator = ( !empty( $args['separator'] ) ? '<span class="kidsworld_bc_sep">' . $args['separator'] . '</span>' : '<span class="kidsworld_bc_sep">/</span>' );

		/* Join the individual trail items into a single string. */
		$kidsworld_breadcrumb .= join( " {$kidsworld_bc_separator} ", $kidsworld_bc_trail );

		/* If $after was set, wrap it in a container. */
		$kidsworld_breadcrumb .= ( !empty( $args['after'] ) ? ' <span class="kidsworld-bc-trail-after">' . $args['after'] . '</span>' : '' );

		/* Close the breadcrumb trail containers. */
		$kidsworld_breadcrumb .= '<div class="clear"></div></div>';
	}

	/* Allow developers to filter the breadcrumb trail HTML. */
	$kidsworld_breadcrumb = apply_filters( 'kidsworld_breadcrumb_trail', $kidsworld_breadcrumb, $args );

	/* Output the breadcrumb. */
	if ( $args['echo'] )
		echo wp_kses( $kidsworld_breadcrumb,kidsworld_kses_allowed_text() );
	else
		return wp_kses( $kidsworld_breadcrumb,kidsworld_kses_allowed_text() );
}

function kidsworld_breadcrumb_trail_get_items( $args = array() ) {
	global $wp_rewrite;

	/* Set up an empty trail array and empty path. */
	$kidsworld_bc_trail = array();
	$kidsworld_bc_path = '';

	/* If $show_home is set and we're not on the front page of the site, link to the home page. */
	if ( !is_front_page() && $args['show_home'] )
		$kidsworld_bc_trail[] = '<a href="' . home_url() . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" class="kidsworld-bc-trail-begin">' . $args['show_home'] . '</a>';

	/* If viewing the front page of the site. */
	if ( is_front_page() ) {
		if ( $args['show_home'] && $args['front_page'] )
			$kidsworld_bc_trail['trail_end'] = "{$args['show_home']}";
	}

	/* If viewing the "home"/posts page. */
	elseif ( is_home() ) {
		$kidsworld_bc_home_page = get_page( get_queried_object_id() );
		$kidsworld_bc_trail = array_merge( $kidsworld_bc_trail, kidsworld_breadcrumb_trail_get_parents( $kidsworld_bc_home_page->post_parent, '' ) );
		$kidsworld_bc_trail['trail_end'] = get_the_title( $kidsworld_bc_home_page->ID );
	}

	/* If viewing a singular post (page, attachment, etc.). */
	elseif ( is_singular() ) {

		/* Get singular post variables needed. */
		$post = get_queried_object();
		$post_id = absint( get_queried_object_id() );
		$post_type = $post->post_type;
		$kidsworld_bc_parent = absint( $post->post_parent );

		/* Get the post type object. */
		$kidsworld_post_type_object = get_post_type_object( $post_type );	

		// post type post
		if ( class_exists( 'WPML_String_Translation' ) ) {
			$kidsworld_bc_blog_pg_title = icl_translate('Theme Mod', 'kidsworld_blog_single_header_title', kidsworld_get_option( 'kidsworld_blog_single_header_title','Blog' ));
		} else {
			$kidsworld_bc_blog_pg_title = do_shortcode( kidsworld_get_option('kidsworld_blog_single_header_title','Blog') ); 
		}	

		/* If viewing a singular 'post'. */
		if ( 'post' == $post_type ) {

			/* If $front has been set, add it to the $kidsworld_bc_path. */
			$kidsworld_bc_path .= trailingslashit( $wp_rewrite->front );

			/* If there's a path, check for parents. */
			if ( !empty( $kidsworld_bc_path ) )
				$kidsworld_bc_trail = array_merge( $kidsworld_bc_trail, kidsworld_breadcrumb_trail_get_parents( '', $kidsworld_bc_path ) );

			$kidsworld_blog_page_url = kidsworld_get_option( 'kidsworld_blog_page_url' );
			
			$kidsworld_bc_trail[] = '<a href="'. $kidsworld_blog_page_url .'" title="'. $kidsworld_bc_blog_pg_title .'">'.$kidsworld_bc_blog_pg_title.'</a>';

			/* Map the permalink structure tags to actual links. */
			$kidsworld_bc_trail = array_merge( $kidsworld_bc_trail, kidsworld_breadcrumb_trail_map_rewrite_tags( $post_id, get_option( 'permalink_structure' ), $args ) );			
			
		}

		// post type portfolio
		if ( class_exists( 'WPML_String_Translation' ) ) {
			$kidsworld_bc_portfolio_pg_title = icl_translate('Theme Mod', 'kidsworld_portfolio_page_title', kidsworld_get_option( 'kidsworld_portfolio_page_title','Portfolio' ));
		} else {
			$kidsworld_bc_portfolio_pg_title = do_shortcode( kidsworld_get_option('kidsworld_portfolio_page_title','Portfolio') ); 
		}

		$kidsworld_portfolio_page_url = kidsworld_get_option( 'kidsworld_portfolio_page_url' );

		if( $post_type == 'portfolio' ) {
			$kidsworld_bc_trail[] = '<a href="'. $kidsworld_portfolio_page_url .'" title="'. $kidsworld_bc_portfolio_pg_title .'">'.$kidsworld_bc_portfolio_pg_title.'</a>';
		}

		// post type class
		if ( class_exists( 'WPML_String_Translation' ) ) {
			$kidsworld_bc_classes_pg_title = icl_translate('Theme Mod', 'kidsworld_class_page_title', kidsworld_get_option( 'kidsworld_class_page_title','Classes' ));
		} else {
			$kidsworld_bc_classes_pg_title = do_shortcode( kidsworld_get_option('kidsworld_class_page_title','Classes') ); 
		}

		$kidsworld_classes_page_url = kidsworld_get_option( 'kidsworld_class_page_url' );

		if( $post_type == 'classes' ) {
			$kidsworld_bc_trail[] = '<a href="'. $kidsworld_classes_page_url .'" title="'. $kidsworld_bc_classes_pg_title .'">'.$kidsworld_bc_classes_pg_title.'</a>';
		}

		// post type events
		if ( class_exists( 'WPML_String_Translation' ) ) {
			$kidsworld_bc_events_pg_title = icl_translate('Theme Mod', 'kidsworld_event_page_title', kidsworld_get_option( 'kidsworld_event_page_title','Events' ));
		} else {
			$kidsworld_bc_events_pg_title = do_shortcode( kidsworld_get_option('kidsworld_event_page_title','Events') ); 
		}

		$kidsworld_events_page_url = kidsworld_get_option( 'kidsworld_event_page_url' );

		if( $post_type == 'events' ) {
			$kidsworld_bc_trail[] = '<a href="'. $kidsworld_events_page_url .'" title="'. $kidsworld_bc_events_pg_title .'">'.$kidsworld_bc_events_pg_title.'</a>';
		}
		
		/* WooCommerce */
		if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {
			$kidsworld_bc_shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
			$kidsworld_bc_shop_title = get_the_title( wc_get_page_id( 'shop' ) );
		}

		if ( is_singular('page') && KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {
			if ( is_cart() || is_checkout() ) {
				$kidsworld_bc_trail[] = '<a href="' . $kidsworld_bc_shop_page_url . '" title="' . $kidsworld_bc_shop_title . '">' . $kidsworld_bc_shop_title . '</a>';
			}
		}

		if( $post_type == 'product' ) {
			$kidsworld_bc_trail[] = '<a href="' . $kidsworld_bc_shop_page_url . '" title="' . $kidsworld_bc_shop_title . '">' . $kidsworld_bc_shop_title . '</a>';
		}


		/* If viewing a singular 'attachment'. */
		elseif ( 'attachment' == $post_type ) {

			/* If $front has been set, add it to the $kidsworld_bc_path. */
			$kidsworld_bc_path .= trailingslashit( $wp_rewrite->front );

			/* If there's a path, check for parents. */
			if ( !empty( $kidsworld_bc_path ) )
				$kidsworld_bc_trail = array_merge( $kidsworld_bc_trail, kidsworld_breadcrumb_trail_get_parents( '', $kidsworld_bc_path ) );

			/* Map the post (parent) permalink structure tags to actual links. */
			$kidsworld_bc_trail = array_merge( $kidsworld_bc_trail, kidsworld_breadcrumb_trail_map_rewrite_tags( $post->post_parent, get_option( 'permalink_structure' ), $args ) );
		}

		/* If a custom post type, check if there are any pages in its hierarchy based on the slug. */
		elseif ( 'page' !== $post_type ) {

			/* If $front has been set, add it to the $kidsworld_bc_path. */
			if (  !empty( $kidsworld_post_type_object->rewrite['with_front'] ) && $wp_rewrite->front )
				$kidsworld_bc_path .= trailingslashit( $wp_rewrite->front );

			/* If there's a slug, add it to the $kidsworld_bc_path. */
			if ( !empty( $kidsworld_post_type_object->rewrite['slug'] ) )
				$kidsworld_bc_path .= $kidsworld_post_type_object->rewrite['slug'];

			/* If there's a path, check for parents. */
			if ( !empty( $kidsworld_bc_path ) )
				$kidsworld_bc_trail = array_merge( $kidsworld_bc_trail, kidsworld_breadcrumb_trail_get_parents( '', $kidsworld_bc_path ) );

			/* If there's an archive page, add it to the trail. */
			if ( !empty( $kidsworld_post_type_object->has_archive ) )
				$kidsworld_bc_trail[] = '<a href="' . get_post_type_archive_link( $post_type ) . '" title="' . esc_attr( $kidsworld_post_type_object->labels->name ) . '">' . $kidsworld_post_type_object->labels->name . '</a>';
		}

		/* If the post type path returns nothing and there is a parent, get its parents. */
		if ( ( empty( $kidsworld_bc_path ) && 0 !== $kidsworld_bc_parent ) || ( 'attachment' == $post_type ) )
			$kidsworld_bc_trail = array_merge( $kidsworld_bc_trail, kidsworld_breadcrumb_trail_get_parents( $kidsworld_bc_parent, '' ) );

		/* Or, if the post type is hierarchical and there's a parent, get its parents. */
		elseif ( 0 !== $kidsworld_bc_parent && is_post_type_hierarchical( $post_type ) )
			$kidsworld_bc_trail = array_merge( $kidsworld_bc_trail, kidsworld_breadcrumb_trail_get_parents( $kidsworld_bc_parent, '' ) );

		/* Display terms for specific post type taxonomy if requested. */
		if ( !empty( $args["singular_{$post_type}_taxonomy"] ) && $terms = get_the_term_list( $post_id, $args["singular_{$post_type}_taxonomy"], '', ', ', '' ) )
			$kidsworld_bc_trail[] = $terms;

		/* End with the post title. */
		$post_title = get_the_title();
		if ( !empty( $post_title ) )
			$kidsworld_bc_trail['trail_end'] = $post_title;
	}

	/* If we're viewing any type of archive. */
	elseif ( is_archive() ) {

		/* If viewing a taxonomy term archive. */
		if ( is_tax() || is_category() || is_tag() ) {

			/* Get some taxonomy and term variables. */
			$term = get_queried_object();
			$taxonomy = get_taxonomy( $term->taxonomy );

			/* Get the path to the term archive. Use this to determine if a page is present with it. */
			if ( is_category() )
				$kidsworld_bc_path = get_option( 'category_base' );
			elseif ( is_tag() )
				$kidsworld_bc_path = get_option( 'tag_base' );
			else {
				if ( $taxonomy->rewrite['with_front'] && $wp_rewrite->front )
					$kidsworld_bc_path = trailingslashit( $wp_rewrite->front );
				$kidsworld_bc_path .= $taxonomy->rewrite['slug'];
			}

			/* Get parent pages by path if they exist. */
			if ( $kidsworld_bc_path )
				$kidsworld_bc_trail = array_merge( $kidsworld_bc_trail, kidsworld_breadcrumb_trail_get_parents( '', $kidsworld_bc_path ) );

			/* If the taxonomy is hierarchical, list its parent terms. */
			if ( is_taxonomy_hierarchical( $term->taxonomy ) && $term->parent )
				$kidsworld_bc_trail = array_merge( $kidsworld_bc_trail, kidsworld_breadcrumb_trail_get_term_parents( $term->parent, $term->taxonomy ) );

			/* Add the term name to the trail end. */
			$kidsworld_bc_trail['trail_end'] = single_term_title( '', false );
		}

		/* If viewing a post type archive. */
		elseif ( is_post_type_archive() ) {

			/* Get the post type object. */
			$kidsworld_post_type_object = get_post_type_object( get_query_var( 'post_type' ) );

			/* If $front has been set, add it to the $kidsworld_bc_path. */
			if ( $kidsworld_post_type_object->rewrite['with_front'] && $wp_rewrite->front )
				$kidsworld_bc_path .= trailingslashit( $wp_rewrite->front );

			/* If there's a slug, add it to the $kidsworld_bc_path. */
			if ( !empty( $kidsworld_post_type_object->rewrite['slug'] ) )
				$kidsworld_bc_path .= $kidsworld_post_type_object->rewrite['slug'];

			/* If there's a path, check for parents. */
			if ( !empty( $kidsworld_bc_path ) )
				$kidsworld_bc_trail = array_merge( $kidsworld_bc_trail, kidsworld_breadcrumb_trail_get_parents( '', $kidsworld_bc_path ) );

			/* Add the post type [plural] name to the trail end. */
			$kidsworld_bc_trail['trail_end'] = $kidsworld_post_type_object->labels->name;


			if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {
			
				if ( is_shop() ) {
					$kidsworld_bc_trail['trail_end'] = woocommerce_page_title($echo = false);
				}	
				
			}

		}

		/* If viewing an author archive. */
		elseif ( is_author() ) {

			/* If $front has been set, add it to $kidsworld_bc_path. */
			if ( !empty( $wp_rewrite->front ) )
				$kidsworld_bc_path .= trailingslashit( $wp_rewrite->front );

			/* If an $author_base exists, add it to $kidsworld_bc_path. */
			if ( !empty( $wp_rewrite->author_base ) )
				$kidsworld_bc_path .= $wp_rewrite->author_base;

			/* If $kidsworld_bc_path exists, check for parent pages. */
			if ( !empty( $kidsworld_bc_path ) )
				$kidsworld_bc_trail = array_merge( $kidsworld_bc_trail, kidsworld_breadcrumb_trail_get_parents( '', $kidsworld_bc_path ) );

			/* Add the author's display name to the trail end. */
			$kidsworld_bc_trail['trail_end'] = get_the_author_meta( 'display_name', get_query_var( 'author' ) );
		}

		/* If viewing a time-based archive. */
		elseif ( is_time() ) {

			if ( get_query_var( 'minute' ) && get_query_var( 'hour' ) )
				$kidsworld_bc_trail['trail_end'] = get_the_time( esc_html__( 'g:i a', 'kids-world' ) );

			elseif ( get_query_var( 'minute' ) )
				$kidsworld_bc_trail['trail_end'] = sprintf( esc_html__( 'Minute %1$s', 'kids-world' ), get_the_time( esc_html__( 'i', 'kids-world' ) ) );

			elseif ( get_query_var( 'hour' ) )
				$kidsworld_bc_trail['trail_end'] = get_the_time( esc_html__( 'g a', 'kids-world' ) );
		}

		/* If viewing a date-based archive. */
		elseif ( is_date() ) {

			/* If $front has been set, check for parent pages. */
			if ( $wp_rewrite->front )
				$kidsworld_bc_trail = array_merge( $kidsworld_bc_trail, kidsworld_breadcrumb_trail_get_parents( '', $wp_rewrite->front ) );

			if ( is_day() ) {
				$kidsworld_bc_trail[] = '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attr__( 'Y', 'kids-world' ) ) . '">' . get_the_time( esc_html__( 'Y', 'kids-world' ) ) . '</a>';
				$kidsworld_bc_trail[] = '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '" title="' . get_the_time( esc_attr__( 'F', 'kids-world' ) ) . '">' . get_the_time( esc_html__( 'F', 'kids-world' ) ) . '</a>';
				$kidsworld_bc_trail['trail_end'] = get_the_time( esc_html__( 'd', 'kids-world' ) );
			}

			elseif ( get_query_var( 'w' ) ) {
				$kidsworld_bc_trail[] = '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attr__( 'Y', 'kids-world' ) ) . '">' . get_the_time( esc_html__( 'Y', 'kids-world' ) ) . '</a>';
				$kidsworld_bc_trail['trail_end'] = sprintf( esc_html__( 'Week %1$s', 'kids-world' ), get_the_time( esc_attr__( 'W', 'kids-world' ) ) );
			}

			elseif ( is_month() ) {
				$kidsworld_bc_trail[] = '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attr__( 'Y', 'kids-world' ) ) . '">' . get_the_time( esc_html__( 'Y', 'kids-world' ) ) . '</a>';
				$kidsworld_bc_trail['trail_end'] = get_the_time( esc_html__( 'F', 'kids-world' ) );
			}

			elseif ( is_year() ) {
				$kidsworld_bc_trail['trail_end'] = get_the_time( esc_html__( 'Y', 'kids-world' ) );
			}
		}
	}

	/* If viewing search results. */
	elseif ( is_search() ) {		
		$kidsworld_bc_trail['trail_end'] = sprintf( esc_html__( 'Search results for &quot;%1$s&quot;', 'kids-world' ), esc_attr( get_search_query() ) );
	}

	/* If viewing a 404 error page. */
	elseif ( is_404() ) {
		$kidsworld_bc_trail['trail_end'] = esc_html__( '404 Not Found', 'kids-world');
	} 


	/* Allow devs to step in and filter the $kidsworld_bc_trail array. */
	return apply_filters( 'breadcrumb_trail_items', $kidsworld_bc_trail, $args );
}

function kidsworld_breadcrumb_trail_map_rewrite_tags( $post_id = '', $kidsworld_bc_path = '', $args = array() ) {

	/* Set up an empty $kidsworld_bc_trail array. */
	$kidsworld_bc_trail = array();

	/* Make sure there's a $kidsworld_bc_path and $post_id before continuing. */
	if ( empty( $kidsworld_bc_path ) || empty( $post_id ) )
		return $kidsworld_bc_trail;

	/* Get the post based on the post ID. */
	$post = get_post( $post_id );

	/* If no post is returned, an error is returned, or the post does not have a 'post' post type, return. */
	if ( empty( $post ) || is_wp_error( $post ) || 'post' !== $post->post_type )
		return $kidsworld_bc_trail;

	/* Trim '/' from both sides of the $kidsworld_bc_path. */
	$kidsworld_bc_path = trim( $kidsworld_bc_path, '/' );

	/* Split the $kidsworld_bc_path into an array of strings. */
	$kidsworld_bc_matches = explode( '/', $kidsworld_bc_path );

	/* If matches are found for the path. */
	if ( is_array( $kidsworld_bc_matches ) ) {

		/* Loop through each of the matches, adding each to the $kidsworld_bc_trail array. */
		foreach ( $kidsworld_bc_matches as $kidsworld_bc_match ) {

			/* Trim any '/' from the $kidsworld_bc_match. */
			$tag = trim( $kidsworld_bc_match, '/' );

			/* If using the %year% tag, add a link to the yearly archive. */
			if ( '%year%' == $tag )
				$kidsworld_bc_trail[] = '<a href="' . get_year_link( get_the_time( 'Y', $post_id ) ) . '" title="' . get_the_time( esc_attr__( 'Y', 'kids-world' ), $post_id ) . '">' . get_the_time( esc_html__( 'Y', 'kids-world' ), $post_id ) . '</a>';

			/* If using the %monthnum% tag, add a link to the monthly archive. */
			elseif ( '%monthnum%' == $tag )
				$kidsworld_bc_trail[] = '<a href="' . get_month_link( get_the_time( 'Y', $post_id ), get_the_time( 'm', $post_id ) ) . '" title="' . get_the_time( esc_attr__( 'F Y', 'kids-world' ), $post_id ) . '">' . get_the_time( esc_html__( 'F', 'kids-world' ), $post_id ) . '</a>';

			/* If using the %day% tag, add a link to the daily archive. */
			elseif ( '%day%' == $tag )
				$kidsworld_bc_trail[] = '<a href="' . get_day_link( get_the_time( 'Y', $post_id ), get_the_time( 'm', $post_id ), get_the_time( 'd', $post_id ) ) . '" title="' . get_the_time( esc_attr__( 'F j, Y', 'kids-world' ), $post_id ) . '">' . get_the_time( esc_html__( 'd', 'kids-world' ), $post_id ) . '</a>';

			/* If using the %author% tag, add a link to the post author archive. */
			elseif ( '%author%' == $tag )
				$kidsworld_bc_trail[] = '<a href="' . get_author_posts_url( $post->post_author ) . '" title="' . esc_attr( get_the_author_meta( 'display_name', $post->post_author ) ) . '">' . get_the_author_meta( 'display_name', $post->post_author ) . '</a>';

			/* If using the %category% tag, add a link to the first category archive to match permalinks. */
			elseif ( '%category%' == $tag && 'category' !== $args["singular_{$post->post_type}_taxonomy"] ) {

				/* Get the post categories. */
				$terms = get_the_category( $post_id );

				/* Check that categories were returned. */
				if ( $terms ) {

					/* Sort the terms by ID and get the first category. */
					usort( $terms, '_usort_terms_by_ID' );
					$term = get_term( $terms[0], 'category' );

					/* If the category has a parent, add the hierarchy to the trail. */
					if ( 0 !== $term->parent )
						$kidsworld_bc_trail = array_merge( $kidsworld_bc_trail, kidsworld_breadcrumb_trail_get_term_parents( $term->parent, 'category' ) );

					/* Add the category archive link to the trail. */
					$kidsworld_bc_trail[] = '<a href="' . get_term_link( $term, 'category' ) . '" title="' . esc_attr( $term->name ) . '">' . $term->name . '</a>';
				}
			}
		}
	}

	/* Return the $kidsworld_bc_trail array. */
	return $kidsworld_bc_trail;
}

function kidsworld_breadcrumb_trail_get_parents( $post_id = '', $kidsworld_bc_path = '' ) {

	/* Set up an empty trail array. */
	$kidsworld_bc_trail = array();

	/* Trim '/' off $kidsworld_bc_path in case we just got a simple '/' instead of a real path. */
	$kidsworld_bc_path = trim( $kidsworld_bc_path, '/' );

	/* If neither a post ID nor path set, return an empty array. */
	if ( empty( $post_id ) && empty( $kidsworld_bc_path ) )
		return $kidsworld_bc_trail;

	/* If the post ID is empty, use the path to get the ID. */
	if ( empty( $post_id ) ) {

		/* Get parent post by the path. */
		$kidsworld_bc_parent_page = get_page_by_path( $kidsworld_bc_path );

		/* If a parent post is found, set the $post_id variable to it. */
		if ( !empty( $kidsworld_bc_parent_page ) )
			$post_id = $kidsworld_bc_parent_page->ID;
	}

	/* If a post ID and path is set, search for a post by the given path. */
	if ( $post_id == 0 && !empty( $kidsworld_bc_path ) ) {

		/* Separate post names into separate paths by '/'. */
		$kidsworld_bc_path = trim( $kidsworld_bc_path, '/' );
		preg_match_all( "/\/.*?\z/", $kidsworld_bc_path, $kidsworld_bc_matches );

		/* If matches are found for the path. */
		if ( isset( $kidsworld_bc_matches ) ) {

			/* Reverse the array of matches to search for posts in the proper order. */
			$kidsworld_bc_matches = array_reverse( $kidsworld_bc_matches );

			/* Loop through each of the path matches. */
			foreach ( $kidsworld_bc_matches as $kidsworld_bc_match ) {

				/* If a match is found. */
				if ( isset( $kidsworld_bc_match[0] ) ) {

					/* Get the parent post by the given path. */
					$kidsworld_bc_path = str_replace( $kidsworld_bc_match[0], '', $kidsworld_bc_path );
					$kidsworld_bc_parent_page = get_page_by_path( trim( $kidsworld_bc_path, '/' ) );

					/* If a parent post is found, set the $post_id and break out of the loop. */
					if ( !empty( $kidsworld_bc_parent_page ) && $kidsworld_bc_parent_page->ID > 0 ) {
						$post_id = $kidsworld_bc_parent_page->ID;
						break;
					}
				}
			}
		}
	}

	/* While there's a post ID, add the post link to the $kidsworld_bc_parents array. */
	while ( $post_id ) {

		/* Get the post by ID. */
		$page = get_page( $post_id );

		/* Add the formatted post link to the array of parents. */
		$kidsworld_bc_parents[]  = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . get_the_title( $post_id ) . '</a>';

		/* Set the parent post's parent to the post ID. */
		$post_id = $page->post_parent;
	}

	/* If we have parent posts, reverse the array to put them in the proper order for the trail. */
	if ( isset( $kidsworld_bc_parents ) )
		$kidsworld_bc_trail = array_reverse( $kidsworld_bc_parents );

	/* Return the trail of parent posts. */
	return $kidsworld_bc_trail;
}

function kidsworld_breadcrumb_trail_get_term_parents( $kidsworld_bc_parent_id = '', $taxonomy = '' ) {

	/* Set up some default arrays. */
	$kidsworld_bc_trail = array();
	$kidsworld_bc_parents = array();

	/* If no term parent ID or taxonomy is given, return an empty array. */
	if ( empty( $kidsworld_bc_parent_id ) || empty( $taxonomy ) )
		return $kidsworld_bc_trail;

	/* While there is a parent ID, add the parent term link to the $kidsworld_bc_parents array. */
	while ( $kidsworld_bc_parent_id ) {

		/* Get the parent term. */
		$kidsworld_bc_parent = get_term( $kidsworld_bc_parent_id, $taxonomy );

		/* Add the formatted term link to the array of parent terms. */
		$kidsworld_bc_parents[] = '<a href="' . get_term_link( $kidsworld_bc_parent, $taxonomy ) . '" title="' . esc_attr( $kidsworld_bc_parent->name ) . '">' . $kidsworld_bc_parent->name . '</a>';

		/* Set the parent term's parent as the parent ID. */
		$kidsworld_bc_parent_id = $kidsworld_bc_parent->parent;
	}

	/* If we have parent terms, reverse the array to put them in the proper order for the trail. */
	if ( !empty( $kidsworld_bc_parents ) )
		$kidsworld_bc_trail = array_reverse( $kidsworld_bc_parents );

	/* Return the trail of parent terms. */
	return $kidsworld_bc_trail;
}

?>