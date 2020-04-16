<?php

function kidsworld_customizer_options_register( $wp_customize ) {

    $kidsworld_list_opacity = array(      'min' => '0',   'max' => '1',   'step' => '0.01');
    $zero_to_twenty = array(        'min' => '0',   'max' => '20',  'step' => '1');
    $zero_to_fifty = array(         'min' => '0',   'max' => '50',  'step' => '1');
    $zero_to_hundred = array(       'min' => '0',   'max' => '100', 'step' => '1');
    $zero_to_hundred_alt = array(    'min' => '-100',   'max' => '100', 'step' => '1');
    $zero_to_two_hundred = array(   'min' => '0',   'max' => '200', 'step' => '1');
    $zero_to_five_hundred = array(  'min' => '0',   'max' => '500', 'step' => '1');
    $zero_to_thousand = array(      'min' => '0',   'max' => '1000', 'step' => '1');
    $zero_to_fifteenhundred = array('min' => '0',   'max' => '1500', 'step' => '1');
    $kidsworld_font_size = array(         'min' => '8',   'max' => '100', 'step' => '1');
    $kidsworld_font_size_em = array(      'min' => '0.7', 'max' => '5',   'step' => '0.1');
    $kidsworld_menu_height = array(       'min' => '20',  'max' => '400', 'step' => '1');
    $kidsworld_letter_space = array(      'min' => '-10', 'max' => '10',  'step' => '0.1');
    $kidsworld_layout_width = array(      'min' => '70',  'max' => '90',  'step' => '1');
    $kidsworld_layout_max_width = array(  'min' => '500', 'max' => '1500','step' => '1');
    $kidsworld_content_width = array(     'min' => '60',  'max' => '74',  'step' => '1');
    $kidsworld_menu_resolution = array(   'min' => '300',  'max' => '1500',  'step' => '1');

    $kidsworld_on_off = array(
        'on'    => esc_html__( 'On', 'kids-world' ),
        'off'   => esc_html__( 'Off', 'kids-world' )
    );

    $kidsworld_align = array(
        'left'      => esc_html__( 'Left', 'kids-world' ),
        'center'    => esc_html__( 'Center', 'kids-world' ),
        'right'     => esc_html__( 'Right', 'kids-world' )
    );

    $kidsworld_background_position = array(
        "left-top"      => esc_html__( 'Left Top', 'kids-world' ),
        "left-center"   => esc_html__( 'Left Center', 'kids-world' ),
        "left-bottom"   => esc_html__( 'Left Bottom', 'kids-world' ),
        "right-top"     => esc_html__( 'Right Top', 'kids-world' ),
        "right-center"  => esc_html__( 'Right Center', 'kids-world' ),
        "right-bottom"  => esc_html__( 'Right Bottom', 'kids-world' ),
        "center-top"    => esc_html__( 'Center Top', 'kids-world' ),
        "center-center" => esc_html__( 'Center Center', 'kids-world' ),
        "center-bottom" => esc_html__( 'Center Bottom', 'kids-world' )
    );

    $kidsworld_background_repeat = array(
        'repeat'    => esc_html__( 'Repeat', 'kids-world' ),
        'no-repeat' => esc_html__( 'No Repeat', 'kids-world' ),
        'repeat-x'  => esc_html__( 'Repeat X', 'kids-world' ),
        'repeat-y'  => esc_html__( 'Repeat Y', 'kids-world' )
    );

    $kidsworld_background_attachment = array(
        'scroll'    => esc_html__( 'Scroll', 'kids-world' ),
        'fixed'     => esc_html__( 'Fixed', 'kids-world' )
    );

    $kidsworld_footer_column = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4"
    );

    $kidsworld_contact_footer_column = array(
        "kidsworld_column2" => "2",
        "kidsworld_column3" => "3",
        "kidsworld_column4" => "4"
    );

    $kidsworld_text_transform = array(
        'none'          => esc_html__( 'None', 'kids-world' ),
        'uppercase'     => esc_html__( 'Uppercase', 'kids-world' ),
        'lowercase'     => esc_html__( 'Lowercase', 'kids-world' )
    );

    $kidsworld_font_weight = array(
      '200' => esc_html__( '200', 'kids-world' ),
      '300' => esc_html__( '300', 'kids-world' ),
      '400' => esc_html__( '400', 'kids-world' ),
      '500' => esc_html__( '500', 'kids-world' ),
      '600' => esc_html__( '600', 'kids-world' ),
      '700' => esc_html__( '700', 'kids-world' ),
      '800' => esc_html__( '800', 'kids-world' ),
      '900' => esc_html__( '900', 'kids-world' )
    );

    $kidsworld_font_style_one = array(
      'normal' => esc_html__( 'Normal', 'kids-world' ),
      'italic' => esc_html__( 'Italic', 'kids-world' )
    );

    $kidsworld_blog_grid_column = array(
        "kidsworld_column2"      => esc_html__( '2 Column', 'kids-world' ),
        "kidsworld_column3"     => esc_html__( '3 Column', 'kids-world' ),
        "kidsworld_column4"    => esc_html__( '4 Column', 'kids-world' )
    );

    $kidsworld_blog_page_layout = array(
        "layout-sidebar-right"  => esc_html__( 'Sidebar Right', 'kids-world' ),
        "layout-sidebar-left"   => esc_html__( 'Sidebar Left', 'kids-world' ),
        "layout-full-width"     => esc_html__( 'Full Width', 'kids-world' )
     );

    $kidsworld_blog_post_style = array(
        "kidsworld_post_default"  => esc_html__( 'Standard', 'kids-world' ),
        "kidsworld_post_masonry"  => esc_html__( 'Grid', 'kids-world' )
     );

    $kidsworld_blog_pagination = array(
        "pg_standard"   => esc_html__( 'Standard', 'kids-world' ),
        "pg_next_prev"  => esc_html__( 'Next Previous', 'kids-world' ),
        "pg_infinite"   => esc_html__( 'Infinite Scroll', 'kids-world' )
    );

    $kidsworld_sort_post_single_section = array(
        'about_author'  => esc_html__( 'About Author', 'kids-world' ),
        'pagination'    => esc_html__( 'Next Previous Pagination', 'kids-world' ),
        'related_posts' => esc_html__( 'Related Posts', 'kids-world' ),
        'comments'      => esc_html__( 'Comments', 'kids-world' )
    );

    $kidsworld_header_display_style = array(
        "standard"   => esc_html__( 'Background Image', 'kids-world' ),
        "revolution_slider"  => esc_html__( 'Revolution Slider', 'kids-world' )
    );

    $kidsworld_google_fonts_list          = kidsworld_google_fonts_list();
    $kidsworld_google_fonts_weight        = kidsworld_google_fonts_weight();
    $kidsworld_google_fonts_weights_all   = kidsworld_fonts_all_weights();

    // Panels
    $kidsworld['panel'][] = array( 'footer_panel', esc_html__( 'Footer Options', 'kids-world' ),16  );
    $kidsworld['panel'][] = array( 'blog_panel', esc_html__( 'Blog Options', 'kids-world' ),  19 );
    $kidsworld['panel'][] = array( 'styling_panel', esc_html__( 'Advanced Styling', 'kids-world' ),  11  );

    $kidsworld['sect'][] = array( 'kidsworld_header_styling', esc_html__( 'Header - Logo, Top Menu', 'kids-world' ), 1, 'styling_panel');
    $kidsworld['sect'][] = array( 'kidsworld_sub_header_styling', esc_html__( 'Sub Header', 'kids-world' ), 2, 'styling_panel');
    $kidsworld['sect'][] = array( 'kidsworld_sidebar_styling', esc_html__( 'Sidebar', 'kids-world' ), 3, 'styling_panel');
    $kidsworld['sect'][] = array( 'kidsworld_classes_styling', esc_html__( 'Classes', 'kids-world' ), 6, 'styling_panel');
    $kidsworld['sect'][] = array( 'kidsworld_events_styling', esc_html__( 'Events', 'kids-world' ), 7, 'styling_panel');

    $kidsworld['sect'][] = array( 'kidsworld_footer_widget', esc_html__( 'Widget Footer', 'kids-world' ), 1, 'footer_panel');
    $kidsworld['sect'][] = array( 'kidsworld_footer_contact', esc_html__( 'Contact Footer', 'kids-world' ), 2, 'footer_panel');

    $kidsworld['sect'][] = array( 'kidsworld_blog_section', esc_html__( 'Blog', 'kids-world' ), 1, 'blog_panel');
    $kidsworld['sect'][] = array( 'kidsworld_blog_single_section', esc_html__( 'Blog Single', 'kids-world' ), 2, 'blog_panel');
    $kidsworld['sect'][] = array( 'kidsworld_blog_single_sort_section', esc_html__( 'Sort Blog Single Sections', 'kids-world' ), 3, 'blog_panel');
    $kidsworld['sect'][] = array( 'kidsworld_category_section', esc_html__( 'Category', 'kids-world' ), 6, 'blog_panel');

    // Sections
    $kidsworld['sect'][] = array( 'kidsworld_layout_options', esc_html__( 'Layout', 'kids-world' ), 9 );
    $kidsworld['sect'][] = array( 'kidsworld_styling_options', esc_html__( 'Styling', 'kids-world' ), 10);
    $kidsworld['sect'][] = array( 'kidsworld_topbar_options', esc_html__( 'Top Bar', 'kids-world' ), 11);
    $kidsworld['sect'][] = array( 'kidsworld_logo_options', esc_html__( 'Logo', 'kids-world' ), 12);
    $kidsworld['sect'][] = array( 'kidsworld_menu_options', esc_html__( 'Top Navigation', 'kids-world' ), 13);
    $kidsworld['sect'][] = array( 'kidsworld_sub_header_options', esc_html__( 'Sub Header', 'kids-world' ), 14);
    $kidsworld['sect'][] = array( 'kidsworld_sidebar_section', esc_html__( 'Sidebar', 'kids-world' ), 15 );
    $kidsworld['sect'][] = array( 'kidsworld_fonts_options', esc_html__( 'Fonts', 'kids-world' ), 17);
    $kidsworld['sect'][] = array( 'kidsworld_page_options', esc_html__( 'Page', 'kids-world' ), 18);
    $kidsworld['sect'][] = array( 'kidsworld_portfolio_section', esc_html__( 'Portfolio', 'kids-world' ), 20);
    $kidsworld['sect'][] = array( 'kidsworld_classes_section', esc_html__( 'Classes', 'kids-world' ), 21);
    $kidsworld['sect'][] = array( 'kidsworld_events_section', esc_html__( 'Events', 'kids-world' ), 22);

    $kidsworld['sect'][] = array( 'kidsworld_social_media_icons', esc_html__( 'Social Media Icons', 'kids-world' ), 24);
    $kidsworld['sect'][] = array( 'kidsworld_error_page_options', esc_html__( 'Error 404 Page', 'kids-world' ),25);
    $kidsworld['sect'][] = array( 'kidsworld_custom_css_js_options', esc_html__( 'Custom CSS', 'kids-world' ), 26);


    /* ******************************************************************** */
    /* FONTS OPTIONS */
    /* ******************************************************************** */

    $kidsworld['set'][] = array( 'kidsworld_google_font_weight_list', $kidsworld_google_fonts_weight, 'postMessage' );

    $kidsworld['set'][] = array( 'kidsworld_google_fonts_on', 'on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_google_fonts_on', 'radio-switch', esc_html__( 'Activate Google Fonts', 'kids-world' ), 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_google_fonts_subset_on', 'off' );
    $kidsworld['ctrl'][] = array( 'kidsworld_google_fonts_subset_on', 'radio-switch', esc_html__( 'Fonts Subsets', 'kids-world' ), 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_google_font_subset_cyrillic', 'off' );
    $kidsworld['ctrl'][] = array( 'kidsworld_google_font_subset_cyrillic', 'radio-switch', esc_html__( 'Cyrillic', 'kids-world' ), 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_google_font_subset_greek', 'off' );
    $kidsworld['ctrl'][] = array( 'kidsworld_google_font_subset_greek', 'radio-switch', esc_html__( 'Greek', 'kids-world' ), 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_google_font_subset_vietnamese', 'off' );
    $kidsworld['ctrl'][] = array( 'kidsworld_google_font_subset_vietnamese', 'radio-switch', esc_html__( 'Vietnamese', 'kids-world' ), 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_body_font_family', 'Dosis' );
    $kidsworld['ctrl'][] = array( 'kidsworld_body_font_family', 'select', esc_html__( 'Font Family', 'kids-world' ), $kidsworld_google_fonts_list, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_body_font_weight', '500' );
    $kidsworld['ctrl'][] = array( 'kidsworld_body_font_weight', 'radio', esc_html__( 'Font Weight', 'kids-world' ), $kidsworld_google_fonts_weights_all, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_body_font_size', 18 );
    $kidsworld['ctrl'][] = array( 'kidsworld_body_font_size', 'slider', esc_html__( 'Font Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_body_font_lineheight', 30 );
    $kidsworld['ctrl'][] = array( 'kidsworld_body_font_lineheight', 'slider', esc_html__( 'Line Height', 'kids-world' ), $kidsworld_font_size, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_nav_font_family', 'Dosis' );
    $kidsworld['ctrl'][] = array( 'kidsworld_nav_font_family', 'select', esc_html__( 'Font Family', 'kids-world' ), $kidsworld_google_fonts_list, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_nav_font_weight', '500' );
    $kidsworld['ctrl'][] = array( 'kidsworld_nav_font_weight', 'radio', esc_html__( 'Font Weight', 'kids-world' ), $kidsworld_google_fonts_weights_all, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_headings_font_family', 'Dosis' );
    $kidsworld['ctrl'][] = array( 'kidsworld_headings_font_family', 'select', esc_html__( 'Font Family', 'kids-world' ), $kidsworld_google_fonts_list, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_headings_font_weight', '700' );
    $kidsworld['ctrl'][] = array( 'kidsworld_headings_font_weight', 'radio', esc_html__( 'Font Weight', 'kids-world' ), $kidsworld_google_fonts_weights_all, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_h1_font_size', 48 );
    $kidsworld['ctrl'][] = array( 'kidsworld_h1_font_size', 'slider', esc_html__( 'Heading H1 - Font Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_h2_font_size', 40 );
    $kidsworld['ctrl'][] = array( 'kidsworld_h2_font_size', 'slider', esc_html__( 'Heading H2 - Font Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_h3_font_size', 36 );
    $kidsworld['ctrl'][] = array( 'kidsworld_h3_font_size', 'slider', esc_html__( 'Heading H3 - Font Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_h4_font_size', 30 );
    $kidsworld['ctrl'][] = array( 'kidsworld_h4_font_size', 'slider', esc_html__( 'Heading H4 - Font Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_h5_font_size', 26 );
    $kidsworld['ctrl'][] = array( 'kidsworld_h5_font_size', 'slider', esc_html__( 'Heading H5 - Font Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_h6_font_size', 20 );
    $kidsworld['ctrl'][] = array( 'kidsworld_h6_font_size', 'slider', esc_html__( 'Heading H6 - Font Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_h1_font_lineheight', 48 );
    $kidsworld['ctrl'][] = array( 'kidsworld_h1_font_lineheight', 'slider', esc_html__( 'Heading H1 - Line Height', 'kids-world' ), $kidsworld_font_size, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_h2_font_lineheight', 40 );
    $kidsworld['ctrl'][] = array( 'kidsworld_h2_font_lineheight', 'slider', esc_html__( 'Heading H2 - Line Height', 'kids-world' ), $kidsworld_font_size, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_h3_font_lineheight', 36 );
    $kidsworld['ctrl'][] = array( 'kidsworld_h3_font_lineheight', 'slider', esc_html__( 'Heading H3 - Line Height', 'kids-world' ), $kidsworld_font_size, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_h4_font_lineheight', 30 );
    $kidsworld['ctrl'][] = array( 'kidsworld_h4_font_lineheight', 'slider', esc_html__( 'Heading H4 - Line Height', 'kids-world' ), $kidsworld_font_size, 'kidsworld_fonts_options' );

    $kidsworld['set'][] = array( 'kidsworld_h5_font_lineheight', 26 );
    $kidsworld['ctrl'][] = array( 'kidsworld_h5_font_lineheight', 'slider', esc_html__( 'Heading H5 - Line Height', 'kids-world' ), $kidsworld_font_size, 'kidsworld_fonts_options' );

     $kidsworld['set'][] = array( 'kidsworld_h6_font_lineheight', 23 );
    $kidsworld['ctrl'][] = array( 'kidsworld_h6_font_lineheight', 'slider', esc_html__( 'Heading H6 - Line Height', 'kids-world' ), $kidsworld_font_size, 'kidsworld_fonts_options' );

    /* ******************************************************************** */
    /* PAGE OPTIONS */
    /* ******************************************************************** */

    $kidsworld['set'][] = array( 'kidsworld_page_comments_on','off' );
    $kidsworld['ctrl'][] = array( 'kidsworld_page_comments_on', 'radio-switch', esc_html__( 'Display Comments in Pages', 'kids-world' ), 'kidsworld_page_options' );

    /* ******************************************************************** */
    /* PORTFOLIO PAGE OPTIONS */
    /* ******************************************************************** */

    $kidsworld['set'][] = array( 'kidsworld_portfolio_page_title','Portfolio' );
    $kidsworld['ctrl'][] = array( 'kidsworld_portfolio_page_title', 'text', esc_html__( 'Portfolio Page Title for Breadcrumbs', 'kids-world' ), 'kidsworld_portfolio_section' );

    $kidsworld['set'][] = array( 'kidsworld_portfolio_page_url','#' );
    $kidsworld['ctrl'][] = array( 'kidsworld_portfolio_page_url', 'text', esc_html__( 'Portfolio Page URL for Breadcrumbs', 'kids-world' ), 'kidsworld_portfolio_section' );

    $kidsworld['set'][] = array( 'kidsworld_portfolio_comments_on','off' );
    $kidsworld['ctrl'][] = array( 'kidsworld_portfolio_comments_on', 'radio-switch', esc_html__( 'Comments', 'kids-world' ), 'kidsworld_portfolio_section' );

    /* ******************************************************************** */
    /* CLASS PAGE OPTIONS */
    /* ******************************************************************** */

    $kidsworld['set'][] = array( 'kidsworld_class_page_title','Classes' );
    $kidsworld['ctrl'][] = array( 'kidsworld_class_page_title', 'text', esc_html__( 'Class Page Title for Breadcrumbs', 'kids-world' ), 'kidsworld_classes_section' );

    $kidsworld['set'][] = array( 'kidsworld_class_page_url','#' );
    $kidsworld['ctrl'][] = array( 'kidsworld_class_page_url', 'text', esc_html__( 'Class Page URL for Breadcrumbs', 'kids-world' ), 'kidsworld_classes_section' );

    $kidsworld['set'][] = array( 'kidsworld_class_single_featured_img_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_class_single_featured_img_on', 'radio-switch', esc_html__( 'Featured Image', 'kids-world' ), 'kidsworld_classes_section' );

    $kidsworld['set'][] = array( 'kidsworld_class_comments_on','off' );
    $kidsworld['ctrl'][] = array( 'kidsworld_class_comments_on', 'radio-switch', esc_html__( 'Comments', 'kids-world' ), 'kidsworld_classes_section' );

    /* ******************************************************************** */
    /* EVENTS PAGE OPTIONS */
    /* ******************************************************************** */

    $kidsworld['set'][] = array( 'kidsworld_event_page_title','Events' );
    $kidsworld['ctrl'][] = array( 'kidsworld_event_page_title', 'text', esc_html__( 'Event Page Title for Breadcrumbs', 'kids-world' ), 'kidsworld_events_section' );

    $kidsworld['set'][] = array( 'kidsworld_event_page_url','#' );
    $kidsworld['ctrl'][] = array( 'kidsworld_event_page_url', 'text', esc_html__( 'Event Page URL for Breadcrumbs', 'kids-world' ), 'kidsworld_events_section' );

    $kidsworld['set'][] = array( 'kidsworld_event_single_featured_img_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_event_single_featured_img_on', 'radio-switch', esc_html__( 'Featured Image', 'kids-world' ), 'kidsworld_events_section' );

    $kidsworld['set'][] = array( 'kidsworld_event_comments_on','off' );
    $kidsworld['ctrl'][] = array( 'kidsworld_event_comments_on', 'radio-switch', esc_html__( 'Comments', 'kids-world' ), 'kidsworld_events_section' );

    /* ******************************************************************** */
    /* STYLING OPTIONS */
    /* ******************************************************************** */

    $kidsworld['set'][] = array( 'kidsworld_skin_color', '#fcb54d' );
    $kidsworld['ctrl'][] = array( 'kidsworld_skin_color', 'color', esc_html__( 'Theme Skin Color', 'kids-world' ), 'kidsworld_styling_options' );

    $kidsworld['set'][] = array( 'kidsworld_skin_text_color', '#ffffff' );
    $kidsworld['ctrl'][] = array( 'kidsworld_skin_text_color', 'color', esc_html__( 'Text Color on Theme Skin Color Background', 'kids-world' ), 'kidsworld_styling_options' );

    $kidsworld['set'][] = array( 'kidsworld_content_color', '#555555' );
    $kidsworld['ctrl'][] = array( 'kidsworld_content_color', 'color', esc_html__( 'Site Content Text Color', 'kids-world' ), 'kidsworld_styling_options' );

    $kidsworld['set'][] = array( 'kidsworld_content_link_color', '#000000' );
    $kidsworld['ctrl'][] = array( 'kidsworld_content_link_color', 'color', esc_html__( 'Site Content Link Color', 'kids-world' ), 'kidsworld_styling_options' );

    $kidsworld['set'][] = array( 'kidsworld_content_link_hover_color', '#000000' );
    $kidsworld['ctrl'][] = array( 'kidsworld_content_link_hover_color', 'color', esc_html__( 'Site Content Link Hover Color', 'kids-world' ), 'kidsworld_styling_options' );

    $kidsworld['set'][] = array( 'kidsworld_advanced_styling_on','off' );
    $kidsworld['ctrl'][] = array( 'kidsworld_advanced_styling_on', 'radio-switch', esc_html__( 'Advanced Styling', 'kids-world' ), 'kidsworld_styling_options' );


    /* ******************************************************************** */
    /* TOPBAR OPTIONS */
    /* ******************************************************************** */


    $kidsworld['set'][] = array( 'kidsworld_topbar_on','off' );
    $kidsworld['ctrl'][] = array( 'kidsworld_topbar_on', 'radio-switch', esc_html__( 'Top Bar', 'kids-world' ), 'kidsworld_topbar_options' );

    $kidsworld['set'][] = array( 'kidsworld_topbar_intro_text', 'Have any questions?' );
    $kidsworld['ctrl'][] = array( 'kidsworld_topbar_intro_text', 'text', esc_html__( 'Intro/Start line Text', 'kids-world' ), 'kidsworld_topbar_options' );

    $kidsworld['set'][] = array( 'kidsworld_topbar_phone_text', '987-654-3210' );
    $kidsworld['ctrl'][] = array( 'kidsworld_topbar_phone_text', 'text', esc_html__( 'Phone', 'kids-world' ), 'kidsworld_topbar_options' );

    $kidsworld['set'][] = array( 'kidsworld_topbar_email_text', 'info@loremips.com' );
    $kidsworld['ctrl'][] = array( 'kidsworld_topbar_email_text', 'text', esc_html__( 'Email', 'kids-world' ), 'kidsworld_topbar_options' );

    $kidsworld['set'][] = array( 'kidsworld_topbar_bg', '#f2f2f2' );
    $kidsworld['ctrl'][] = array( 'kidsworld_topbar_bg', 'color', esc_html__( 'Background Color', 'kids-world' ), 'kidsworld_topbar_options' );

    $kidsworld['set'][] = array( 'kidsworld_topbar_color', '#666666' );
    $kidsworld['ctrl'][] = array( 'kidsworld_topbar_color', 'color', esc_html__( 'Text Color', 'kids-world' ), 'kidsworld_topbar_options' );

    $kidsworld['set'][] = array( 'kidsworld_topbar_hover_color', '#000000' );
    $kidsworld['ctrl'][] = array( 'kidsworld_topbar_hover_color', 'color', esc_html__( 'Link Hover Color', 'kids-world' ), 'kidsworld_topbar_options' );

    $kidsworld['set'][] = array( 'kidsworld_topbar_font_size', '16px' );
    $kidsworld['ctrl'][] = array( 'kidsworld_topbar_font_size', 'text', esc_html__( 'Font Size', 'kids-world' ), 'kidsworld_topbar_options' );

    $kidsworld['set'][] = array( 'kidsworld_topbar_social_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_topbar_social_on', 'radio-switch', esc_html__( 'Social Icons', 'kids-world' ), 'kidsworld_topbar_options' );


    /* ******************************************************************** */
    /* ADVANCED STYLING OPTIONS */
    /* ******************************************************************** */

    if ( kidsworld_get_option('kidsworld_advanced_styling_on','off') == 'on' ) {

        // Header Styling =======================================

        $kidsworld['set'][] = array( 'kidsworld_main_header_bg', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_main_header_bg', 'color', esc_html__( 'Header Background', 'kids-world' ), 'kidsworld_header_styling' );

        $kidsworld['set'][] = array( 'kidsworld_header_thick_border', '#adcb69' );
        $kidsworld['ctrl'][] = array( 'kidsworld_header_thick_border', 'color', esc_html__( 'Top Thick Border - Right Side', 'kids-world' ), 'kidsworld_header_styling' );

        //top menu
        $kidsworld['set'][] = array( 'kidsworld_topmenu_links_text_color', '#555555' );
        $kidsworld['ctrl'][] = array( 'kidsworld_topmenu_links_text_color', 'color', esc_html__( 'All Links text color', 'kids-world' ), 'kidsworld_header_styling' );

        $kidsworld['set'][] = array( 'kidsworld_topmenu_icons_color', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_topmenu_icons_color', 'color', esc_html__( 'Icons Color', 'kids-world' ), 'kidsworld_header_styling' );

        $kidsworld['set'][] = array( 'kidsworld_topmenu_link1_color', '#8373ce' );
        $kidsworld['ctrl'][] = array( 'kidsworld_topmenu_link1_color', 'color', esc_html__( 'Link 1 Color', 'kids-world' ), 'kidsworld_header_styling' );

        $kidsworld['set'][] = array( 'kidsworld_topmenu_link2_color', '#fcb54d' );
        $kidsworld['ctrl'][] = array( 'kidsworld_topmenu_link2_color', 'color', esc_html__( 'Link 2 Color', 'kids-world' ), 'kidsworld_header_styling' );

        $kidsworld['set'][] = array( 'kidsworld_topmenu_link3_color', '#fc5b4e' );
        $kidsworld['ctrl'][] = array( 'kidsworld_topmenu_link3_color', 'color', esc_html__( 'Link 3 Color', 'kids-world' ), 'kidsworld_header_styling' );

        $kidsworld['set'][] = array( 'kidsworld_topmenu_link4_color', '#adca69' );
        $kidsworld['ctrl'][] = array( 'kidsworld_topmenu_link4_color', 'color', esc_html__( 'Link 4 Color', 'kids-world' ), 'kidsworld_header_styling' );

        $kidsworld['set'][] = array( 'kidsworld_topmenu_link5_color', '#84bed6' );
        $kidsworld['ctrl'][] = array( 'kidsworld_topmenu_link5_color', 'color', esc_html__( 'Link 5 Color', 'kids-world' ), 'kidsworld_header_styling' );

        $kidsworld['set'][] = array( 'kidsworld_topmenu_link6_color', '#c389ce' );
        $kidsworld['ctrl'][] = array( 'kidsworld_topmenu_link6_color', 'color', esc_html__( 'Link 6 Color', 'kids-world' ), 'kidsworld_header_styling' );

        $kidsworld['set'][] = array( 'kidsworld_topmenu_link7_color', '#8373ce' );
        $kidsworld['ctrl'][] = array( 'kidsworld_topmenu_link7_color', 'color', esc_html__( 'Link 7 Color', 'kids-world' ), 'kidsworld_header_styling' );

        $kidsworld['set'][] = array( 'kidsworld_topmenu_link8_color', '#fcb54d' );
        $kidsworld['ctrl'][] = array( 'kidsworld_topmenu_link8_color', 'color', esc_html__( 'Link 8 Color', 'kids-world' ), 'kidsworld_header_styling' );

        $kidsworld['set'][] = array( 'kidsworld_menu_bg_image_on','on' );
        $kidsworld['ctrl'][] = array( 'kidsworld_menu_bg_image_on', 'radio-switch', esc_html__( 'Light Dot Background On Menu Elements', 'kids-world' ), 'kidsworld_header_styling' );

        //dropdown menu
        $kidsworld['set'][] = array( 'kidsworld_dd_bg_color', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_dd_bg_color', 'color', esc_html__( 'Background Color', 'kids-world' ), 'kidsworld_header_styling' );

        $kidsworld['set'][] = array( 'kidsworld_dd_text_color', '#555555' );
        $kidsworld['ctrl'][] = array( 'kidsworld_dd_text_color', 'color', esc_html__( 'Text Color', 'kids-world' ), 'kidsworld_header_styling' );

        // Sub Header Styling =======================================

        $kidsworld['set'][] = array( 'kidsworld_breadcrumbs_bg', '#d07dd2' );
        $kidsworld['ctrl'][] = array( 'kidsworld_breadcrumbs_bg', 'color', esc_html__( 'Breadcrumb Bar Background', 'kids-world' ), 'kidsworld_sub_header_styling' );

        $kidsworld['set'][] = array( 'kidsworld_search_bar_bg', '#adcb69' );
        $kidsworld['ctrl'][] = array( 'kidsworld_search_bar_bg', 'color', esc_html__( 'Search Bar Background', 'kids-world' ), 'kidsworld_sub_header_styling' );

        $kidsworld['set'][] = array( 'kidsworld_search_breadcrumbs_text_color', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_search_breadcrumbs_text_color', 'color', esc_html__( 'Both Bars Text Color', 'kids-world' ), 'kidsworld_sub_header_styling' );

        // Sidebar Styling =======================================

        $kidsworld['set'][] = array( 'kidsworld_sidebar_w1_title', '#adca69' );
        $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_w1_title', 'color', esc_html__( 'Widget 1 Title ', 'kids-world' ), 'kidsworld_sidebar_styling' );

        $kidsworld['set'][] = array( 'kidsworld_sidebar_w2_title', '#fcb54d' );
        $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_w2_title', 'color', esc_html__( 'Widget 2 Title ', 'kids-world' ), 'kidsworld_sidebar_styling' );

        $kidsworld['set'][] = array( 'kidsworld_sidebar_w3_title', '#84bed6' );
        $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_w3_title', 'color', esc_html__( 'Widget 3 Title ', 'kids-world' ), 'kidsworld_sidebar_styling' );

        $kidsworld['set'][] = array( 'kidsworld_sidebar_w4_title', '#d07dd2' );
        $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_w4_title', 'color', esc_html__( 'Widget 4 Title ', 'kids-world' ), 'kidsworld_sidebar_styling' );

        $kidsworld['set'][] = array( 'kidsworld_sidebar_w5_title', '#59c79e' );
        $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_w5_title', 'color', esc_html__( 'Widget 5 Title ', 'kids-world' ), 'kidsworld_sidebar_styling' );

        $kidsworld['set'][] = array( 'kidsworld_sidebar_w6_title', '#8373ce' );
        $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_w6_title', 'color', esc_html__( 'Widget 6 Title ', 'kids-world' ), 'kidsworld_sidebar_styling' );

        $kidsworld['set'][] = array( 'kidsworld_sidebar_w7_title', '#fdd94f' );
        $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_w7_title', 'color', esc_html__( 'Widget 7 Title ', 'kids-world' ), 'kidsworld_sidebar_styling' );

        $kidsworld['set'][] = array( 'kidsworld_sidebar_w8_title', '#cc9966' );
        $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_w8_title', 'color', esc_html__( 'Widget 8 Title ', 'kids-world' ), 'kidsworld_sidebar_styling' );

        $kidsworld['set'][] = array( 'kidsworld_sidebar_w9_title', '#2ab2bf' );
        $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_w9_title', 'color', esc_html__( 'Widget 9 Title ', 'kids-world' ), 'kidsworld_sidebar_styling' );

        $kidsworld['set'][] = array( 'kidsworld_sidebar_w10_title', '#f97831' );
        $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_w10_title', 'color', esc_html__( 'Widget 10 Title ', 'kids-world' ), 'kidsworld_sidebar_styling' );

        // Classes =======================================

        // Grid Page
        $kidsworld['set'][] = array( 'kidsworld_class_grid_year_bg', '#adcb69' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_grid_year_bg', 'color', esc_html__( 'Date Year Background Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_grid_title', '#8374cf' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_grid_title', 'color', esc_html__( 'Title Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_grid_price', '#fbb54d' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_grid_price', 'color', esc_html__( 'Price Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_grid_time', '#777777' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_grid_time', 'color', esc_html__( 'Time Color ', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_grid_meta_text', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_grid_meta_text', 'color', esc_html__( 'Bottom Meta Text Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_grid_first_child', '#adcb69' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_grid_first_child', 'color', esc_html__( '"Age" field background color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_grid_second_child', '#f47c7d' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_grid_second_child', 'color', esc_html__( '"Class Size" field background color ', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_grid_third_child', '#fbb54d' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_grid_third_child', 'color', esc_html__( '"Arrow" field background color ', 'kids-world' ), 'kidsworld_classes_styling' );

        // Class Single Page
        $kidsworld['set'][] = array( 'kidsworld_class_single_table_icons', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_table_icons', 'color', esc_html__( 'Class Table Icons color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_single_first_text', '#777777' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_first_text', 'color', esc_html__( 'Class Table First Text Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_single_second_text', '#8373ce' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_second_text', 'color', esc_html__( 'Class table Second Text Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_single_icon_1_bg', '#adcb69' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_icon_1_bg', 'color', esc_html__( 'Icon 1 Background Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_single_icon_2_bg', '#f57d7d' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_icon_2_bg', 'color', esc_html__( 'Icon 2 Background Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_single_icon_3_bg', '#fbb54d' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_icon_3_bg', 'color', esc_html__( 'Icon 3 Background Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_single_icon_4_bg', '#d07dd2' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_icon_4_bg', 'color', esc_html__( 'Icon 4 Background Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_single_icon_5_bg', '#78d0e4' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_icon_5_bg', 'color', esc_html__( 'Icon 5 Background Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_single_icon_6_bg', '#5ec99f' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_icon_6_bg', 'color', esc_html__( 'Icon 6 Background Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_single_icon_7_bg', '#fdda4f' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_icon_7_bg', 'color', esc_html__( 'Icon 7 Background Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_single_icon_8_bg', '#d76e9f' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_icon_8_bg', 'color', esc_html__( 'Icon 8 Background Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_single_price_box_bg', '#8474d6' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_price_box_bg', 'color', esc_html__( 'Price Box Background Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_single_price_box_text', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_price_box_text', 'color', esc_html__( 'Price Box Text Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_single_register_btn_bg', '#adcb69' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_register_btn_bg', 'color', esc_html__( 'Register Button Background Color', 'kids-world' ), 'kidsworld_classes_styling' );

        $kidsworld['set'][] = array( 'kidsworld_class_single_register_btn_text', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_class_single_register_btn_text', 'color', esc_html__( 'Register Button Text Color', 'kids-world' ), 'kidsworld_classes_styling' );

        // Events =======================================

        // Event Grid Page
        $kidsworld['set'][] = array( 'kidsworld_event_grid_date_bg', '#adcb69' );
        $kidsworld['ctrl'][] = array( 'kidsworld_event_grid_date_bg', 'color', esc_html__( 'Event Date Background Color', 'kids-world' ), 'kidsworld_events_styling' );

        $kidsworld['set'][] = array( 'kidsworld_event_grid_date', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_event_grid_date', 'color', esc_html__( 'Event Date Text Color', 'kids-world' ), 'kidsworld_events_styling' );

        $kidsworld['set'][] = array( 'kidsworld_event_grid_time_bg', '#fbb54d' );
        $kidsworld['ctrl'][] = array( 'kidsworld_event_grid_time_bg', 'color', esc_html__( 'Event Time Background Color', 'kids-world' ), 'kidsworld_events_styling' );

        $kidsworld['set'][] = array( 'kidsworld_event_grid_time', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_event_grid_time', 'color', esc_html__( 'Event Time Text Color', 'kids-world' ), 'kidsworld_events_styling' );

        $kidsworld['set'][] = array( 'kidsworld_event_grid_title', '#8374cf' );
        $kidsworld['ctrl'][] = array( 'kidsworld_event_grid_title', 'color', esc_html__( 'Title Color', 'kids-world' ), 'kidsworld_events_styling' );

        // Event Single Page
        $kidsworld['set'][] = array( 'kidsworld_event_single_table1_bg', '#fdc36f' );
        $kidsworld['ctrl'][] = array( 'kidsworld_event_single_table1_bg', 'color', esc_html__( 'Table 1 Title Background Color', 'kids-world' ), 'kidsworld_events_styling' );

        $kidsworld['set'][] = array( 'kidsworld_event_single_table1', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_event_single_table1', 'color', esc_html__( 'Table 1 Title Text Color', 'kids-world' ), 'kidsworld_events_styling' );

        $kidsworld['set'][] = array( 'kidsworld_event_single_table2_bg', '#78d0e4' );
        $kidsworld['ctrl'][] = array( 'kidsworld_event_single_table2_bg', 'color', esc_html__( 'Table 2 Title Background Color', 'kids-world' ), 'kidsworld_events_styling' );

        $kidsworld['set'][] = array( 'kidsworld_event_single_table2', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_event_single_table2', 'color', esc_html__( 'Table 2 Title Text Color', 'kids-world' ), 'kidsworld_events_styling' );

        $kidsworld['set'][] = array( 'kidsworld_event_single_button_bg', '#adcb69' );
        $kidsworld['ctrl'][] = array( 'kidsworld_event_single_button_bg', 'color', esc_html__( 'Register Button Background Color', 'kids-world' ), 'kidsworld_events_styling' );

        $kidsworld['set'][] = array( 'kidsworld_event_single_button', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_event_single_button', 'color', esc_html__( 'Register Button Text Color', 'kids-world' ), 'kidsworld_events_styling' );


    }

    /* ******************************************************************** */
    /* BLOG OPTIONS */
    /* ******************************************************************** */

    $kidsworld['set'][] = array( 'kidsworld_blog_page_layout', 'layout-sidebar-right' );
    $kidsworld['ctrl'][] = array( 'kidsworld_blog_page_layout', 'buttontab', esc_html__( 'Blog Page Layout', 'kids-world' ), $kidsworld_blog_page_layout, 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_blog_post_style', 'kidsworld_post_default' );
    $kidsworld['ctrl'][] = array( 'kidsworld_blog_post_style', 'buttontab', esc_html__( 'Blog Post Style', 'kids-world' ), $kidsworld_blog_post_style, 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_blog_pagination', 'pg_standard' );
    $kidsworld['ctrl'][] = array( 'kidsworld_blog_pagination', 'buttontab', esc_html__( 'Pagination Style', 'kids-world' ), $kidsworld_blog_pagination, 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_featured_img_height','520' );
    $kidsworld['ctrl'][] = array( 'kidsworld_featured_img_height', 'text', esc_html__( 'Featured Image Height (Only Number)', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_featured_fullwidth_img_height','520' );
    $kidsworld['ctrl'][] = array( 'kidsworld_featured_fullwidth_img_height', 'text', esc_html__( 'Fullwidth Featured Image Height', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_home_blog_header','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_home_blog_header', 'radio-switch', esc_html__( 'Sub Header', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_home_blog_header_style', 'standard' );
    $kidsworld['ctrl'][] = array( 'kidsworld_home_blog_header_style', 'buttontab', esc_html__( 'Header Style', 'kids-world' ), $kidsworld_header_display_style, 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_header_rev_slider_shortcode','' );
    $kidsworld['ctrl'][] = array( 'kidsworld_header_rev_slider_shortcode', 'revslider-select', esc_html__( 'Revolution Slider', 'kids-world' ), 'kidsworld_blog_section' );

    //post title and databox
    $kidsworld['set'][] = array( 'kidsworld_post_title_color', '#8373ce' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_title_color', 'color', esc_html__( 'Title Color', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_title_hover_color', '#000000' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_title_hover_color', 'color', esc_html__( 'Title Hover Color', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_title_size', 36 );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_title_size', 'slider', esc_html__( 'Text Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_title_letter_space', '0' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_title_letter_space', 'slider', esc_html__( 'Letter Spacing', 'kids-world' ), $kidsworld_letter_space, 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_title_lineheight', 40 );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_title_lineheight', 'slider', esc_html__( 'Line Height', 'kids-world' ), $zero_to_hundred, 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_title_transform', 'none' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_title_transform', 'buttontab', esc_html__( 'Text Transform', 'kids-world' ),$kidsworld_text_transform, 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_title_text_style', 'normal' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_title_text_style', 'buttontab', esc_html__( 'Text Style', 'kids-world' ), $kidsworld_font_style_one, 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_box_bg', '#adcb69' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_box_bg', 'color', esc_html__( 'Date Box Background Color', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_box_text_color', '#ffffff' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_box_text_color', 'color', esc_html__( 'Date Box Text Color', 'kids-world' ), 'kidsworld_blog_section' );

    // on-off post meta
    $kidsworld['set'][] = array( 'kidsworld_date_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_date_on', 'radio-switch', esc_html__( 'Date', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_author_name_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_author_name_on', 'radio-switch', esc_html__( 'Author Name', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_cats_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cats_on', 'radio-switch', esc_html__( 'Category Names', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_comments_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_comments_on', 'radio-switch', esc_html__( 'Comments', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_views_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_views_on', 'radio-switch', esc_html__( 'Views', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_likes_on','off' );
    $kidsworld['ctrl'][] = array( 'kidsworld_likes_on', 'radio-switch', esc_html__( 'Likes', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_button_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_button_on', 'radio-switch', esc_html__( 'Readmore Button/Link', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_excerpt_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_excerpt_on', 'radio-switch', esc_html__( 'Excerpt', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_excerpt_length','50' );
    $kidsworld['ctrl'][] = array( 'kidsworld_excerpt_length', 'text', esc_html__( 'Excerpt Length', 'kids-world' ), 'kidsworld_blog_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_button_text','READ MORE' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_button_text', 'text', esc_html__( 'Readmore Button/Link Text', 'kids-world' ), 'kidsworld_blog_section' );

    //archive page
    $kidsworld['set'][] = array( 'kidsworld_archives_sidebar', 'blog-sidebar' );
    $kidsworld['ctrl'][] = array( 'kidsworld_archives_sidebar', 'sidebar-select', esc_html__( 'Select Sidebar Name', 'kids-world' ), 'kidsworld_blog_section' );

    // author archives page
    $kidsworld['set'][] = array( 'kidsworld_author_bio_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_author_bio_on', 'radio-switch', esc_html__( 'Display Author Bio', 'kids-world' ), 'kidsworld_blog_section' );

    /* ******************************************************************** */
    /* BLOG SINGLE SECTIONS */
    /* ******************************************************************** */

    $kidsworld['set'][] = array( 'kidsworld_blog_single_sort', 'about_author,pagination,related_posts,comments' );
    $kidsworld['ctrl'][] = array( 'kidsworld_blog_single_sort', 'dragndrop', esc_html__( 'Sort and On/Off Blog Single Sections', 'kids-world' ), $kidsworld_sort_post_single_section, 'kidsworld_blog_single_sort_section' );

    /* ******************************************************************** */
    /* BLOG SINGLE OPTIONS */
    /* ******************************************************************** */

    $kidsworld['set'][] = array( 'kidsworld_blog_single_header_title','Blog' );
    $kidsworld['ctrl'][] = array( 'kidsworld_blog_single_header_title', 'text', esc_html__( 'Header Title Text', 'kids-world' ), 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_blog_page_url','#' );
    $kidsworld['ctrl'][] = array( 'kidsworld_blog_page_url', 'text', esc_html__( 'Blog Page URL for Breadcrumbs', 'kids-world' ), 'kidsworld_blog_single_section' );

    //post title
    $kidsworld['set'][] = array( 'kidsworld_single_post_title_size', 36 );
    $kidsworld['ctrl'][] = array( 'kidsworld_single_post_title_size', 'slider', esc_html__( 'Text Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_single_post_title_letter_space', '0' );
    $kidsworld['ctrl'][] = array( 'kidsworld_single_post_title_letter_space', 'slider', esc_html__( 'Letter Spacing', 'kids-world' ), $kidsworld_letter_space, 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_single_post_title_lineheight', 40 );
    $kidsworld['ctrl'][] = array( 'kidsworld_single_post_title_lineheight', 'slider', esc_html__( 'Line Height', 'kids-world' ), $zero_to_hundred, 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_single_post_title_transform', 'none' );
    $kidsworld['ctrl'][] = array( 'kidsworld_single_post_title_transform', 'buttontab', esc_html__( 'Text Transform', 'kids-world' ),$kidsworld_text_transform, 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_single_post_title_text_style', 'normal' );
    $kidsworld['ctrl'][] = array( 'kidsworld_single_post_title_text_style', 'buttontab', esc_html__( 'Text Style', 'kids-world' ), $kidsworld_font_style_one, 'kidsworld_blog_single_section' );

    // on-off post meta
    $kidsworld['set'][] = array( 'kidsworld_single_date_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_single_date_on', 'radio-switch', esc_html__( 'Date', 'kids-world' ), 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_single_author_name_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_single_author_name_on', 'radio-switch', esc_html__( 'Author Name', 'kids-world' ), 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_single_tags_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_single_tags_on', 'radio-switch', esc_html__( 'Tags', 'kids-world' ), 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_single_cats_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_single_cats_on', 'radio-switch', esc_html__( 'Category Names', 'kids-world' ), 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_single_share_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_single_share_on', 'radio-switch', esc_html__( 'Share', 'kids-world' ), 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_single_comments_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_single_comments_on', 'radio-switch', esc_html__( 'Comments', 'kids-world' ), 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_single_views_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_single_views_on', 'radio-switch', esc_html__( 'Views', 'kids-world' ), 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_single_likes_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_single_likes_on', 'radio-switch', esc_html__( 'Likes', 'kids-world' ), 'kidsworld_blog_single_section' );

    // sections title

    $kidsworld['set'][] = array( 'kidsworld_post_single_section_ttl_col', '#8376c7' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_single_section_ttl_col', 'color', esc_html__( 'Color', 'kids-world' ), 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_single_section_ttl_size', 22 );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_single_section_ttl_size', 'slider', esc_html__( 'Text Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_single_section_ttl_letter_space', '0' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_single_section_ttl_letter_space', 'slider', esc_html__( 'Letter Spacing', 'kids-world' ), $kidsworld_letter_space, 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_single_section_ttl_lineheight', 30 );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_single_section_ttl_lineheight', 'slider', esc_html__( 'Line Height', 'kids-world' ), $zero_to_hundred, 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_single_section_ttl_transform', 'none' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_single_section_ttl_transform', 'buttontab', esc_html__( 'Text Transform', 'kids-world' ),$kidsworld_text_transform, 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_single_section_ttl_style', 'normal' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_single_section_ttl_style', 'buttontab', esc_html__( 'Text Style', 'kids-world' ), $kidsworld_font_style_one, 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_single_section_ttl_border', '#fdd94e' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_single_section_ttl_border', 'color', esc_html__( 'Border Color', 'kids-world' ), 'kidsworld_blog_single_section' );

    $kidsworld['set'][] = array( 'kidsworld_post_single_section_ttl_border_circle', '#acca69' );
    $kidsworld['ctrl'][] = array( 'kidsworld_post_single_section_ttl_border_circle', 'color', esc_html__( 'Border Small Circle Color', 'kids-world' ), 'kidsworld_blog_single_section' );


    /* ******************************************************************** */
    /* BLOG CATEGORY OPTIONS */
    /* ******************************************************************** */

    $kidsworld_get_categories=get_categories();

    if ($kidsworld_get_categories) {

        foreach($kidsworld_get_categories as $kidsworld_category) {

            if ($kidsworld_category->count > 1) {

                $kidsworld_cname = $kidsworld_category->slug.'_bg';
                $kidsworld_cname_img = $kidsworld_category->slug.'_bg_img';
                $kidsworld_cname_title = $kidsworld_category->slug.'_title';

                $kidsworld['set'][] = array( $kidsworld_cname, '#6e8b49' );
                $kidsworld['ctrl'][] = array( $kidsworld_cname, 'color', '"'.$kidsworld_category->name.'" Title Background', 'kidsworld_category_section' );

                $kidsworld['set'][] = array( $kidsworld_cname_title, '#ffffff' );
                $kidsworld['ctrl'][] = array( $kidsworld_cname_title, 'color', '"'.$kidsworld_category->name.'" Page Header Title Color', 'kidsworld_category_section' );

                $kidsworld['set'][] = array( $kidsworld_cname_img, '' );
                $kidsworld['ctrl'][] = array( $kidsworld_cname_img, 'image', '"'.$kidsworld_category->name.'" Page Header Background', 'kidsworld_category_section' );

            }
        }
    }

    /* ******************************************************************** */
    /* LAYOUT OPTIONS */
    /* ******************************************************************** */

    $kidsworld['set'][] = array( 'kidsworld_boxed_layout_on','off' );
    $kidsworld['ctrl'][] = array( 'kidsworld_boxed_layout_on', 'radio-switch', esc_html__( 'Boxed Layout', 'kids-world' ), 'kidsworld_layout_options' );

    $kidsworld['set'][] = array( 'kidsworld_layout_max_width', '1180' );
    $kidsworld['ctrl'][] = array( 'kidsworld_layout_max_width', 'slider', esc_html__( 'Max Width (px)', 'kids-world' ), $kidsworld_layout_max_width, 'kidsworld_layout_options' );

    $kidsworld['set'][] = array( 'kidsworld_layout_width', '90' );
    $kidsworld['ctrl'][] = array( 'kidsworld_layout_width', 'slider', esc_html__( 'Site Width (%)', 'kids-world' ), $kidsworld_layout_width, 'kidsworld_layout_options' );

    $kidsworld['set'][] = array( 'kidsworld_content_width', '74' );
    $kidsworld['ctrl'][] = array( 'kidsworld_content_width', 'slider', esc_html__( 'Content Width (%)', 'kids-world' ), $kidsworld_content_width, 'kidsworld_layout_options' );

    $kidsworld['set'][] = array( 'kidsworld_page_preloader_on','off' );
    $kidsworld['ctrl'][] = array( 'kidsworld_page_preloader_on', 'radio-switch', esc_html__( 'Page Preloader', 'kids-world' ), 'kidsworld_layout_options' );

    // Body Background
    $kidsworld['set'][] = array( 'kidsworld_body_bg_color', '#444444' );
    $kidsworld['ctrl'][] = array( 'kidsworld_body_bg_color', 'color', esc_html__( 'Background Color', 'kids-world' ), 'kidsworld_layout_options' );

    $kidsworld['set'][] = array( 'kidsworld_body_bg_opacity',1 );
    $kidsworld['ctrl'][] = array( 'kidsworld_body_bg_opacity', 'slider', esc_html__( 'Background Color Opacity', 'kids-world' ), $kidsworld_list_opacity, 'kidsworld_layout_options' );

    $kidsworld['set'][] = array( 'kidsworld_body_bg_img', '' );
    $kidsworld['ctrl'][] = array( 'kidsworld_body_bg_img', 'image', esc_html__( 'Background Image', 'kids-world' ), 'kidsworld_layout_options' );

    $kidsworld['set'][] = array( 'kidsworld_body_bg_position', 'center-top' );
    $kidsworld['ctrl'][] = array( 'kidsworld_body_bg_position', 'select', esc_html__( 'Background Image Position', 'kids-world' ), $kidsworld_background_position, 'kidsworld_layout_options' );

    $kidsworld['set'][] = array( 'kidsworld_body_bg_repeat', 'repeat' );
    $kidsworld['ctrl'][] = array( 'kidsworld_body_bg_repeat', 'buttontab', esc_html__( 'Background Image Repeat', 'kids-world' ), $kidsworld_background_repeat, 'kidsworld_layout_options' );

    $kidsworld['set'][] = array( 'kidsworld_body_bg_attachment', 'scroll' );
    $kidsworld['ctrl'][] = array( 'kidsworld_body_bg_attachment', 'buttontab', esc_html__( 'Background Attachment', 'kids-world' ), $kidsworld_background_attachment, 'kidsworld_layout_options' );

    $kidsworld['set'][] = array( 'kidsworld_body_bg_stretch','off' );
    $kidsworld['ctrl'][] = array( 'kidsworld_body_bg_stretch', 'radio-switch', esc_html__( '100% Background Image Width', 'kids-world' ), 'kidsworld_layout_options' );


    // content area padding

    $kidsworld['set'][] = array( 'kidsworld_site_content_top_padding', '75px' );
    $kidsworld['ctrl'][] = array( 'kidsworld_site_content_top_padding', 'text', esc_html__( 'Site Content Top Padding (#px or #em)', 'kids-world' ), 'kidsworld_layout_options' );

    $kidsworld['set'][] = array( 'kidsworld_site_content_bottom_padding', '75px' );
    $kidsworld['ctrl'][] = array( 'kidsworld_site_content_bottom_padding', 'text', esc_html__( 'Site Content Bottom Padding (#px or #em)', 'kids-world' ), 'kidsworld_layout_options' );

    /* ******************************************************************** */
    /* HEADER OPTIONS */
    /* ******************************************************************** */

    // Sub Header General
    $kidsworld['set'][] = array( 'kidsworld_sub_header_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_on', 'radio-switch', esc_html__( 'Sub Header', 'kids-world' ), 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_sub_header_top_padding', 120 );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_top_padding', 'slider', esc_html__( 'Sub Header Top Padding', 'kids-world' ), $zero_to_five_hundred, 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_sub_header_bottom_padding', 120 );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_bottom_padding', 'slider', esc_html__( 'Sub Header Bottom Padding', 'kids-world' ), $zero_to_five_hundred, 'kidsworld_sub_header_options' );

    // Sub Header Background
    $kidsworld['set'][] = array( 'kidsworld_sub_header_bg_color', '#6e8b49' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_bg_color', 'color', esc_html__( 'Background Color', 'kids-world' ), 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_sub_header_bg_img', '' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_bg_img', 'image', esc_html__( 'Background Image', 'kids-world' ), 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_sub_header_bg_position', 'center-top' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_bg_position', 'select', esc_html__( 'Background Image Position', 'kids-world' ), $kidsworld_background_position, 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_sub_header_bg_repeat', 'repeat' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_bg_repeat', 'buttontab', esc_html__( 'Background Image Repeat', 'kids-world' ), $kidsworld_background_repeat, 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_sub_header_bg_attachment', 'scroll' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_bg_attachment', 'buttontab', esc_html__( 'Background Attachment', 'kids-world' ), $kidsworld_background_attachment, 'kidsworld_sub_header_options' );

    // Sub Header Title

    $kidsworld['set'][] = array( 'kidsworld_sub_header_title_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_title_on', 'radio-switch', esc_html__( 'Title', 'kids-world' ), 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_sub_header_title_color', '#ffffff' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_title_color', 'color', esc_html__( 'Title Color', 'kids-world' ), 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_sub_header_title_font_size', 48 );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_title_font_size', 'slider', esc_html__( 'Title Font Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_sub_header_title_transform', 'uppercase' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_title_transform', 'buttontab', esc_html__( 'Title Text Transform', 'kids-world' ),$kidsworld_text_transform, 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_sub_header_breadcrumb_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_breadcrumb_on', 'radio-switch', esc_html__( 'Breadcrumbs', 'kids-world' ), 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_search_bar_header_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_search_bar_header_on', 'radio-switch', esc_html__( 'Search Bar in Header', 'kids-world' ), 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_sub_header_breadcrumb_font_size', 16 );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_breadcrumb_font_size', 'slider', esc_html__( 'Font Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_sub_header_breadcrumb_transform', 'none' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sub_header_breadcrumb_transform', 'buttontab', esc_html__( 'Text Transform', 'kids-world' ),$kidsworld_text_transform, 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_header_search_placeholder_text', 'Search Our Site' );
    $kidsworld['ctrl'][] = array( 'kidsworld_header_search_placeholder_text', 'text', esc_html__( 'Default Search Placeholder Text', 'kids-world' ), 'kidsworld_sub_header_options' );

    $kidsworld['set'][] = array( 'kidsworld_google_map_api_customizer', '' );
    $kidsworld['ctrl'][] = array( 'kidsworld_google_map_api_customizer', 'text', esc_html__( 'Google Maps API', 'kids-world' ), 'kidsworld_sub_header_options' );

    //logo options

    $kidsworld['set'][] = array( 'kidsworld_logo_standard', '' );
    $kidsworld['ctrl'][] = array( 'kidsworld_logo_standard', 'image', esc_html__( 'Standard Logo Image', 'kids-world' ), 'kidsworld_logo_options' );

    $kidsworld['set'][] = array( 'kidsworld_logo_retina', '' );
    $kidsworld['ctrl'][] = array( 'kidsworld_logo_retina', 'image', esc_html__( 'Retina Logo Image', 'kids-world' ), 'kidsworld_logo_options' );

    // Menu Options

    $kidsworld['set'][] = array( 'kidsworld_sticky_menu_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sticky_menu_on', 'radio-switch', esc_html__( 'Sticky Menu', 'kids-world' ), 'kidsworld_menu_options' );

    $kidsworld['set'][] = array( 'kidsworld_menu_items_size', 17 );
    $kidsworld['ctrl'][] = array( 'kidsworld_menu_items_size', 'slider', esc_html__( 'Text Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_menu_options' );

    $kidsworld['set'][] = array( 'kidsworld_menu_items_transform', 'none' );
    $kidsworld['ctrl'][] = array( 'kidsworld_menu_items_transform', 'buttontab', esc_html__( 'Text Transform', 'kids-world' ),$kidsworld_text_transform, 'kidsworld_menu_options' );

    $kidsworld['set'][] = array( 'kidsworld_min_width_menu_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_min_width_menu_on', 'radio-switch', esc_html__( 'Main Links with Minimum Width', 'kids-world' ), 'kidsworld_menu_options' );

    // mobile menu
    $kidsworld['set'][] = array( 'kidsworld_mobile_menu_min_resolution',979 );
    $kidsworld['ctrl'][] = array( 'kidsworld_mobile_menu_min_resolution', 'slider', esc_html__( 'Width At Which Menu Becomes Responsive', 'kids-world' ), $kidsworld_menu_resolution, 'kidsworld_menu_options' );

    // Dropdown Options
    $kidsworld['set'][] = array( 'kidsworld_menu_dd_font_color', '#444444' );
    $kidsworld['ctrl'][] = array( 'kidsworld_menu_dd_font_color', 'color', esc_html__( 'Text Color', 'kids-world' ), 'kidsworld_menu_options' );

    $kidsworld['set'][] = array( 'kidsworld_menu_dd_font_size', 16 );
    $kidsworld['ctrl'][] = array( 'kidsworld_menu_dd_font_size', 'slider', esc_html__( 'Text Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_menu_options' );

    //mega menu
    $kidsworld['set'][] = array( 'kidsworld_menu_dd_mm_font_size', 20 );
    $kidsworld['ctrl'][] = array( 'kidsworld_menu_dd_mm_font_size', 'slider', esc_html__( 'Column Title Text Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_menu_options' );

    $kidsworld['set'][] = array( 'kidsworld_menu_dd_mm_item_space',5 );
    $kidsworld['ctrl'][] = array( 'kidsworld_menu_dd_mm_item_space', 'slider', esc_html__( 'Space Between Two Items', 'kids-world' ), $zero_to_fifty, 'kidsworld_menu_options' );

    /* ******************************************************************** */
    /* FOOTER OPTIONS */
    /* ******************************************************************** */

    // Widget Footer
    $kidsworld['set'][] = array( 'kidsworld_footer_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_on', 'radio-switch', esc_html__( 'Widget Footer', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_bottom_go_top_scroll_btn_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_bottom_go_top_scroll_btn_on', 'radio-switch', esc_html__( 'Bottom Go to Top Arrow Button', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_column', 4 );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_column', 'buttontab', esc_html__( 'Footer Column', 'kids-world' ),$kidsworld_footer_column, 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_bg_img', '' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_bg_img', 'image', esc_html__( 'Background Image', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_bg_color', '#f2f2f2' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_bg_color', 'color', esc_html__( 'Background Color', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_bg_color_two', '#eeeeee' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_bg_color_two', 'color', esc_html__( 'Secondary Background Color', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_top_border_color', '#afc969' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_top_border_color', 'color', esc_html__( 'Top Border Color', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_border_color', '#dbdbdb' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_border_color', 'color', esc_html__( 'Elements Border Color', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_color', '#333333' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_color', 'color', esc_html__( 'Text Color', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_links_color', '#333333' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_links_color', 'color', esc_html__( 'Links Color', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_links_hover_color', '#000000' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_links_hover_color', 'color', esc_html__( 'Links Hover Color', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_text_size', 16 );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_text_size', 'slider', esc_html__( 'Font Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_line_height', 30 );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_line_height', 'slider', esc_html__( 'Line Height', 'kids-world' ), $kidsworld_font_size, 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_wid_title_color', '#8373ce' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_wid_title_color', 'color', esc_html__( 'Title Text Color', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_title_border_one', '#fcb54e' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_title_border_one', 'color', esc_html__( 'Title Border Color', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_title_transform', 'none' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_title_transform', 'buttontab', esc_html__( 'Title Text Transform', 'kids-world' ),$kidsworld_text_transform, 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_title_text_style', 'normal' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_title_text_style', 'buttontab', esc_html__( 'Title Text Style', 'kids-world' ), $kidsworld_font_style_one, 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_wid_title_size', 24 );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_wid_title_size', 'slider', esc_html__( 'Title Text Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_title_letter_space', 0 );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_title_letter_space', 'slider', esc_html__( 'Title Letter Spacing', 'kids-world' ), $kidsworld_letter_space, 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_title_lineheight', 40 );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_title_lineheight', 'slider', esc_html__( 'Title Line Height', 'kids-world' ), $zero_to_hundred, 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_widget_space', 50 );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_widget_space', 'slider', esc_html__( 'Space Between Two Widgets', 'kids-world' ), $zero_to_two_hundred, 'kidsworld_footer_widget' );

    //copyright info section
    $kidsworld['set'][] = array( 'kidsworld_footer_copyright_left', 'Copyright &copy; 2018, KidsWorld. All Rights Reserved.' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_copyright_left', 'textarea', esc_html__( 'Copyright Text Left', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_copyright_right', 'Designed by <a href="#" target="_blank">Softwebmedia Inc.</a>' );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_copyright_right', 'textarea', esc_html__( 'Copyright Text Right', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_footer_copyright_text_size', 16 );
    $kidsworld['ctrl'][] = array( 'kidsworld_footer_copyright_text_size', 'slider', esc_html__( 'Text Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_footer_widget' );

    //tab widget
    $kidsworld['set'][] = array( 'kidsworld_f_tab_wid_std_col', '#ffffff' );
    $kidsworld['ctrl'][] = array( 'kidsworld_f_tab_wid_std_col', 'color', esc_html__( 'Default Tab Text Color', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_f_tab_wid_std_bg', '#444444' );
    $kidsworld['ctrl'][] = array( 'kidsworld_f_tab_wid_std_bg', 'color', esc_html__( 'Default Tab Background', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_f_tab_wid_active_col', '#ffffff' );
    $kidsworld['ctrl'][] = array( 'kidsworld_f_tab_wid_active_col', 'color', esc_html__( 'Active Tab Text Color', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_f_tab_wid_active_bg', '#f47c7d' );
    $kidsworld['ctrl'][] = array( 'kidsworld_f_tab_wid_active_bg', 'color', esc_html__( 'Active Tab Background', 'kids-world' ), 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_f_tab_wid_title_transform', 'none' );
    $kidsworld['ctrl'][] = array( 'kidsworld_f_tab_wid_title_transform', 'buttontab', esc_html__( 'Tab Title Text Transform', 'kids-world' ), $kidsworld_text_transform, 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_f_tab_wid_title_size', 16 );
    $kidsworld['ctrl'][] = array( 'kidsworld_f_tab_wid_title_size', 'slider', esc_html__( 'Tab Title Text Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_footer_widget' );

    $kidsworld['set'][] = array( 'kidsworld_f_tab_wid_title_letter_space', 0 );
    $kidsworld['ctrl'][] = array( 'kidsworld_f_tab_wid_title_letter_space', 'slider', esc_html__( 'Tab Title Text Letter Spacing', 'kids-world' ), $kidsworld_letter_space, 'kidsworld_footer_widget' );

    // Contact Footer
    $kidsworld['set'][] = array( 'kidsworld_contact_footer_on','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_contact_footer_on', 'radio-switch', esc_html__( 'Contact Footer', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_location','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_location', 'radio-switch', esc_html__( 'Location', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_phone','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_phone', 'radio-switch', esc_html__( 'Phone', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_email','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_email', 'radio-switch', esc_html__( 'Email', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_socialmedia','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_socialmedia', 'radio-switch', esc_html__( 'Social Icons', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_column', 'kidsworld_column4' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_column', 'buttontab', esc_html__( 'Footer Column', 'kids-world' ),$kidsworld_contact_footer_column, 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_bg_img', '' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_bg_img', 'image', esc_html__( 'Background Image', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_bg_color', '#8272cd' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_bg_color', 'color', esc_html__( 'Background Color', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_color', '#ffffff' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_color', 'color', esc_html__( 'Text Color', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_text_hover', '#fdd94e' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_text_hover', 'color', esc_html__( 'Links Hover Color', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_font_size', '16px' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_font_size', 'slider', esc_html__( 'Text Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_location_text', '456, Lorem Street, Lorem Ips, New York, US 33454.' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_location_text', 'textarea', esc_html__( 'Location', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_location_phone_one', '+1 (409) 987- 5873' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_location_phone_one', 'text', esc_html__( 'Phone 1', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_location_phone_two', '+1 (409) 987- 5874' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_location_phone_two', 'text', esc_html__( 'Phone 2', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_location_email_one', 'info@loremips.com' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_location_email_one', 'text', esc_html__( 'Email 1', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_location_email_two', 'support@loremips.com' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_location_email_two', 'text', esc_html__( 'Email 2', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_icons_col', '#ffffff' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_icons_col', 'color', esc_html__( 'Icons Color', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_icon_location', '#afc969' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_icon_location', 'color', esc_html__( 'Location Icon Background', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_icon_phone', '#f47c7d' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_icon_phone', 'color', esc_html__( 'Phone Icon Background', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_icon_email', '#fcb54e' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_icon_email', 'color', esc_html__( 'Email Icon Background', 'kids-world' ), 'kidsworld_footer_contact' );

    $kidsworld['set'][] = array( 'kidsworld_cf_icon_social', '#5bc99f' );
    $kidsworld['ctrl'][] = array( 'kidsworld_cf_icon_social', 'color', esc_html__( 'Social Media Icon Background', 'kids-world' ), 'kidsworld_footer_contact' );


    /* ******************************************************************** */
    /* SIDEBAR OPTIONS */
    /* ******************************************************************** */

    $kidsworld['set'][] = array( 'kidsworld_sidebar_text_size', 14 );
    $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_text_size', 'slider', esc_html__( 'Sidebar Text Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_sidebar_text_col', '#444444' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_text_col', 'color', esc_html__( 'Sidebar Text Color', 'kids-world' ), 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_sidebar_link', '#444444' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_link', 'color', esc_html__( 'Sidebar Link Color', 'kids-world' ), 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_sidebar_link_hover', '#000000' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_link_hover', 'color', esc_html__( 'Sidebar Link Hover Color', 'kids-world' ), 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_sidebar_border_color', '#e6e6e6' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_border_color', 'color', esc_html__( 'Elements Borders Color', 'kids-world' ), 'kidsworld_sidebar_section' );

    // title
    $kidsworld['set'][] = array( 'kidsworld_sidebar_title_col', '#555555' );
    $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_title_col', 'color', esc_html__( 'Title Text Color', 'kids-world' ), 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_widget_title_transform', 'none' );
    $kidsworld['ctrl'][] = array( 'kidsworld_widget_title_transform', 'buttontab', esc_html__( 'Title Text Transform', 'kids-world' ), $kidsworld_text_transform, 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_widget_title_text_style', 'normal' );
    $kidsworld['ctrl'][] = array( 'kidsworld_widget_title_text_style', 'buttontab', esc_html__( 'Title Text Style', 'kids-world' ), $kidsworld_font_style_one, 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_sidebar_title_size', 20 );
    $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_title_size', 'slider', esc_html__( 'Title Text Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_sidebar_title_letter_space', 0 );
    $kidsworld['ctrl'][] = array( 'kidsworld_sidebar_title_letter_space', 'slider', esc_html__( 'Title Letter Spacing', 'kids-world' ), $kidsworld_letter_space, 'kidsworld_sidebar_section' );

    //tab widget
    $kidsworld['set'][] = array( 'kidsworld_tab_wid_std_col', '#555555' );
    $kidsworld['ctrl'][] = array( 'kidsworld_tab_wid_std_col', 'color', esc_html__( 'Default Tab Text Color', 'kids-world' ), 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_tab_wid_std_bg', '#f2f2f2' );
    $kidsworld['ctrl'][] = array( 'kidsworld_tab_wid_std_bg', 'color', esc_html__( 'Default Tab Background', 'kids-world' ), 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_tab_wid_active_col', '#ffffff' );
    $kidsworld['ctrl'][] = array( 'kidsworld_tab_wid_active_col', 'color', esc_html__( 'Active Tab Text Color', 'kids-world' ), 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_tab_wid_active_bg', '#fcb54e' );
    $kidsworld['ctrl'][] = array( 'kidsworld_tab_wid_active_bg', 'color', esc_html__( 'Active Tab Background', 'kids-world' ), 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_tab_wid_title_transform', 'none' );
    $kidsworld['ctrl'][] = array( 'kidsworld_tab_wid_title_transform', 'buttontab', esc_html__( 'Tab Text Transform', 'kids-world' ), $kidsworld_text_transform, 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_tab_wid_title_size', 16 );
    $kidsworld['ctrl'][] = array( 'kidsworld_tab_wid_title_size', 'slider', esc_html__( 'Tab Title Text Size', 'kids-world' ), $kidsworld_font_size, 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_tab_wid_title_letter_space', 0 );
    $kidsworld['ctrl'][] = array( 'kidsworld_tab_wid_title_letter_space', 'slider', esc_html__( 'Tab Title Text Letter Spacing', 'kids-world' ), $kidsworld_letter_space, 'kidsworld_sidebar_section' );

    $kidsworld['set'][] = array( 'kidsworld_tab_wid_title_lineheight', 30 );
    $kidsworld['ctrl'][] = array( 'kidsworld_tab_wid_title_lineheight', 'slider', esc_html__( 'Tab Title Text Line Height', 'kids-world' ), $zero_to_hundred, 'kidsworld_sidebar_section' );

    /* ******************************************************************** */
    /* SOCIAL ICONS */
    /* ******************************************************************** */

    $kidsworld['set'][] = array( 'kidsworld_open_sm_new_window','on' );
    $kidsworld['ctrl'][] = array( 'kidsworld_open_sm_new_window', 'radio-switch', esc_html__( 'Open Social Sites in New Window', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon1', 'facebook' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon1', 'text', esc_html__( 'Icon 1', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon1_url', '#' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon1_url', 'text', esc_html__( 'Icon 1 URL', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon2', 'twitter' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon2', 'text', esc_html__( 'Icon 2', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon2_url', '#' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon2_url', 'text', esc_html__( 'Icon 2 URL', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon3', 'pinterest' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon3', 'text', esc_html__( 'Icon 3', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon3_url', '#' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon3_url', 'text', esc_html__( 'Icon 3 URL', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon4', 'vine' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon4', 'text', esc_html__( 'Icon 4', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon4_url', '#' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon4_url', 'text', esc_html__( 'Icon 4 URL', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon5', 'dribbble' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon5', 'text', esc_html__( 'Icon 5', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon5_url', '#' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon5_url', 'text', esc_html__( 'Icon 5 URL', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon6', 'rss' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon6', 'text', esc_html__( 'Icon 6', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon6_url', '#' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon6_url', 'text', esc_html__( 'Icon 6 URL', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon7', 'linkedin' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon7', 'text', esc_html__( 'Icon 7', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon7_url', '#' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon7_url', 'text', esc_html__( 'Icon 7 URL', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon8', 'flickr' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon8', 'text', esc_html__( 'Icon 8', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon8_url', '#' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon8_url', 'text', esc_html__( 'Icon 8 URL', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon9', 'google-plus' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon9', 'text', esc_html__( 'Icon 9', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon9_url', '#' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon9_url', 'text', esc_html__( 'Icon 9 URL', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon10', 'instagram' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon10', 'text', esc_html__( 'Icon 10', 'kids-world' ), 'kidsworld_social_media_icons' );

    $kidsworld['set'][] = array( 'kidsworld_icon10_url', '#' );
    $kidsworld['ctrl'][] = array( 'kidsworld_icon10_url', 'text', esc_html__( 'Icon 10 URL', 'kids-world' ), 'kidsworld_social_media_icons' );

    /* ******************************************************************** */
    /* ERROR 404 PAGE */
    /* ******************************************************************** */


    $kidsworld['set'][] = array( 'kidsworld_error_image', '' );
    $kidsworld['ctrl'][] = array( 'kidsworld_error_image', 'image', esc_html__( 'Error 404 Image', 'kids-world' ), 'kidsworld_error_page_options' );

    $kidsworld['set'][] = array( 'kidsworld_error_title', 'Page Not Found' );
    $kidsworld['ctrl'][] = array( 'kidsworld_error_title', 'text', esc_html__( 'Error 404 Title Text', 'kids-world' ), 'kidsworld_error_page_options' );

    $kidsworld['set'][] = array( 'kidsworld_error_content', 'SORRY the page you are looking for does not exist.' );
    $kidsworld['ctrl'][] = array( 'kidsworld_error_content', 'textarea', esc_html__( 'Error 404 Message', 'kids-world' ), 'kidsworld_error_page_options' );

    $kidsworld['set'][] = array( 'kidsworld_error_text_color', '#333333' );
    $kidsworld['ctrl'][] = array( 'kidsworld_error_text_color', 'color', esc_html__( 'Error Message Text Color', 'kids-world' ), 'kidsworld_error_page_options' );

    /* ******************************************************************** */
    /* CUSTOM CSS-JAVASCRIPT */
    /* ******************************************************************** */

    $kidsworld['set'][] = array( 'kidsworld_custom_css', '' );
    $kidsworld['ctrl'][] = array( 'kidsworld_custom_css', 'textarea', esc_html__( 'Add Custom CSS', 'kids-world' ), 'kidsworld_custom_css_js_options' );

    /* ******************************************************************** */
    /* WOOCOMMERCE */
    /* ******************************************************************** */

    if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE && kidsworld_get_option('kidsworld_advanced_styling_on','off') == 'on' ) {

        $kidsworld['sect'][] = array( 'kidsworld_woocommerce_section', esc_html__( 'WooCommerce', 'kids-world' ), 8, 'styling_panel');

        $kidsworld['set'][] = array( 'kidsworld_logo_standard_width', '204px' );
        $kidsworld['ctrl'][] = array( 'kidsworld_logo_standard_width', 'text', esc_html__( 'Standard Logo Width (px) (Optional)', 'kids-world' ), 'kidsworld_logo_options' );

        // shop page
        $kidsworld['set'][] = array( 'kidsworld_woo_addtocart_text', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_woo_addtocart_text', 'color', esc_html__( 'Add to Cart Button Text Color', 'kids-world' ), 'kidsworld_woocommerce_section' );

        $kidsworld['set'][] = array( 'kidsworld_woo_addtocart_bg', '#adcb69' );
        $kidsworld['ctrl'][] = array( 'kidsworld_woo_addtocart_bg', 'color', esc_html__( 'Add to Cart Button Background Color', 'kids-world' ), 'kidsworld_woocommerce_section' );

        $kidsworld['set'][] = array( 'kidsworld_woo_featured_product_title_col', '#8373ce' );
        $kidsworld['ctrl'][] = array( 'kidsworld_woo_featured_product_title_col', 'color', esc_html__( 'Title Text Color', 'kids-world' ), 'kidsworld_woocommerce_section' );

        //shop single/inner pages
        $kidsworld['set'][] = array( 'kidsworld_woo_single_page_title_col', '#8373ce' );
        $kidsworld['ctrl'][] = array( 'kidsworld_woo_single_page_title_col', 'color', esc_html__( 'Product Single Page Title Text Color', 'kids-world' ), 'kidsworld_woocommerce_section' );

        $kidsworld['set'][] = array( 'kidsworld_woo_small_sections_title_col', '#8373ce' );
        $kidsworld['ctrl'][] = array( 'kidsworld_woo_small_sections_title_col', 'color', esc_html__( 'Small Sections Title Text Color', 'kids-world' ), 'kidsworld_woocommerce_section' );

        // cart icon
        $kidsworld['set'][] = array( 'kidsworld_woo_cart_icon_col', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_woo_cart_icon_col', 'color', esc_html__( 'Cart Icon Color', 'kids-world' ), 'kidsworld_woocommerce_section' );

        $kidsworld['set'][] = array( 'kidsworld_woo_cart_icon_bg', '#cb77cf' );
        $kidsworld['ctrl'][] = array( 'kidsworld_woo_cart_icon_bg', 'color', esc_html__( 'Cart Icon Background Color', 'kids-world' ), 'kidsworld_woocommerce_section' );

        $kidsworld['set'][] = array( 'kidsworld_woo_cart_icon_hover_color', '#ffffff' );
        $kidsworld['ctrl'][] = array( 'kidsworld_woo_cart_icon_hover_color', 'color', esc_html__( 'Hover Box Text Color', 'kids-world' ), 'kidsworld_woocommerce_section' );

        $kidsworld['set'][] = array( 'kidsworld_woo_cart_icon_hover_bg', '#8374cf' );
        $kidsworld['ctrl'][] = array( 'kidsworld_woo_cart_icon_hover_bg', 'color', esc_html__( 'Hover Box Background Color', 'kids-world' ), 'kidsworld_woocommerce_section' );

    }


    $wp_customize->get_section('title_tagline')->priority = 80;

    // Print Panels
    foreach ( $kidsworld['panel'] as $panel ) {
        $wp_customize->add_panel( $panel[0], array(
          'title'    => $panel[1],
          'priority' => $panel[2]
        ) );
    }

    // Print Sections
    foreach ( $kidsworld['sect'] as $section ) {

        $kidsworld_get_sec_one = !empty($section[1]) ? $section[1] : '';
        $kidsworld_get_sec_three = !empty($section[3]) ? $section[3] : '';

        $wp_customize->add_section( $section[0], array(
          'title'    => $kidsworld_get_sec_one,
          'priority' => $section[2],
          'panel'  => $kidsworld_get_sec_three
        ) );
    }

    // Print Settings
    foreach ( $kidsworld['set'] as $setting ) {

        $kidsworld_get_set_one = !empty($setting[1]) ? $setting[1] : '';
        $kidsworld_get_set_two = !empty($setting[2]) ? $setting[2] : 'refresh';

        $wp_customize->add_setting( $setting[0], array(
          'type'      => 'option',
          'default'   => $kidsworld_get_set_one,
          'transport' => $kidsworld_get_set_two,
          'sanitize_callback' => 'kidsworld_customizer_sanitization',
        ));
    }

    function kidsworld_customizer_sanitization($value) {
        return $value;
    }

    // Print Controls
    foreach ( $kidsworld['ctrl'] as $control ) {

        static $i = 1;

        switch ($control[1]) {

            case 'radio':

              $wp_customize->add_control( $control[0], array(
                'type'     => $control[1],
                'label'    => $control[2],
                'section'  => $control[4],
                'priority' => $i,
                'choices'  => $control[3]
              ));
              break;

            case 'radio-image':

              $wp_customize->add_control(
                 new kidsworld_Customize_Radio_Image_Control($wp_customize, $control[0], array(
                    'type'     => $control[1],
                    'label'    => $control[2],
                    'section'  => $control[4],
                    'priority' => $i,
                    'choices'  => $control[3]
              ))
              );
              break;

            case 'radio-switch':

              $wp_customize->add_control(
                 new kidsworld_Customize_Radio_Switch_Control($wp_customize, $control[0], array(
                    'type'     => $control[1],
                    'label'    => $control[2],
                    'section'  => $control[3],
                    'priority' => $i
              ))
              );
              break;

            case 'select':

              $wp_customize->add_control( $control[0], array(
                'type'     => $control[1],
                'label'    => $control[2],
                'section'  => $control[4],
                'priority' => $i,
                'choices'  => $control[3]
              ));
              break;

            case 'post-select':

                $wp_customize->add_control(
                  new kidsworld_Customize_Post_Control($wp_customize, $control[0], array(
                    'type'     => $control[1],
                    'label'    => $control[2],
                    'section'  => $control[3],
                    'priority' => $i
                  ))
                );
              break;

            case 'sidebar-select':

                $wp_customize->add_control(
                  new kidsworld_Customize_Sidebar_Control($wp_customize, $control[0], array(
                    'type'     => $control[1],
                    'label'    => $control[2],
                    'section'  => $control[3],
                    'priority' => $i
                  ))
                );
            break;

            case 'revslider-select':

                $wp_customize->add_control(
                  new kidsworld_Customize_RevSlider_Control($wp_customize, $control[0], array(
                    'type'     => $control[1],
                    'label'    => $control[2],
                    'section'  => $control[3],
                    'priority' => $i
                  ))
                );
              break;

            case 'post-multi-select':

                $wp_customize->add_control(
                  new kidsworld_Customize_Multi_Post_Control($wp_customize, $control[0], array(
                    'type'     => $control[1],
                    'label'    => $control[2],
                    'section'  => $control[3],
                    'priority' => $i
                  ))
                );
              break;

            case 'slider':

              $wp_customize->add_control(
                new kidsworld_Customize_Slider_Control( $wp_customize, $control[0], array(
                  'label'    => $control[2],
                  'section'  => $control[4],
                  'settings' => $control[0],
                  'priority' => $i,
                  'choices'  => $control[3]
                ))
              );
              break;

            case 'text':
              $wp_customize->add_control( $control[0], array(
                'type'     => $control[1],
                'label'    => $control[2],
                'section'  => $control[3],
                'priority' => $i
              ));
              break;

            case 'textarea':

              $wp_customize->add_control(
                new kidsworld_Customize_Control_Textarea( $wp_customize, $control[0], array(
                  'label'    => $control[2],
                  'section'  => $control[3],
                  'settings' => $control[0],
                  'priority' => $i
                ))
              );
              break;

            case 'checkbox':

              $wp_customize->add_control( $control[0], array(
                'type'     => $control[1],
                'label'    => $control[2],
                'section'  => $control[3],
                'priority' => $i
              ));
              break;

            case 'color':

              $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, $control[0], array(
                  'label'    => $control[2],
                  'section'  => $control[3],
                  'settings' => $control[0],
                  'priority' => $i
                ))
              );
              break;

            case 'buttontab':

                $wp_customize->add_control(
                    new kidsworld_Customize_Buttontab_Control( $wp_customize, $control[0], array(
                      'label'    => $control[2],
                      'section'  => $control[4],
                      'settings' => $control[0],
                      'priority' => $i,
                      'choices'  => $control[3]
                    ))
                );
            break;

            case 'dragndrop':

              $wp_customize->add_control(
                new kidsworld_Customize_Sort_Control( $wp_customize, $control[0], array(
                  'label'    => $control[2],
                  'section'  => $control[4],
                  'settings' => $control[0],
                  'priority' => $i,
                  'choices'  => $control[3]
                ))
              );
              break;

            case 'image':

              $wp_customize->add_control(
                new WP_Customize_Image_Control( $wp_customize, $control[0], array(
                  'label'    => $control[2],
                  'section'  => $control[3],
                  'settings' => $control[0],
                  'priority' => $i
                ))
              );
              break;
        }

    $i++;

    } //end foreach

}  // end kidsworld_customizer_options_register function

add_action( 'customize_register', 'kidsworld_customizer_options_register' );

 /* ******************************************************************** */
/* OPTIONS LIST */
/* ******************************************************************** */

function kidsworld_customizer_options_list() {

  $kidsworld_theme_options_list = array(
    'kidsworld_google_fonts_on' => 'on',
    'kidsworld_google_fonts_subset_on' => 'off',
    'kidsworld_google_font_subset_cyrillic' => 'off',
    'kidsworld_google_font_subset_greek' => 'off',
    'kidsworld_google_font_subset_vietnamese' => 'off',
    'kidsworld_body_font_family' => 'Dosis',
    'kidsworld_body_font_weight' => '500',
    'kidsworld_body_font_size' => '18',
    'kidsworld_body_font_lineheight' => '30',
    'kidsworld_nav_font_family' => 'Dosis',
    'kidsworld_nav_font_weight' => '500',
    'kidsworld_headings_font_family' => 'Dosis',
    'kidsworld_headings_font_weight' => '700',
    'kidsworld_h1_font_size' => '48',
    'kidsworld_h2_font_size' => '40',
    'kidsworld_h3_font_size' => '36',
    'kidsworld_h4_font_size' => '30',
    'kidsworld_h5_font_size' => '26',
    'kidsworld_h6_font_size' => '20',
    'kidsworld_h1_font_lineheight' => '48',
    'kidsworld_h2_font_lineheight' => '40',
    'kidsworld_h3_font_lineheight' => '36',
    'kidsworld_h4_font_lineheight' => '30',
    'kidsworld_h5_font_lineheight' => '26',
    'kidsworld_h6_font_lineheight' => '23',
    'kidsworld_page_comments_on' => 'off',
    'kidsworld_portfolio_page_title' => 'Portfolio',
    'kidsworld_portfolio_page_url' => '#',
    'kidsworld_portfolio_comments_on' => 'off',
    'kidsworld_class_page_title' => 'Classes',
    'kidsworld_class_page_url' => '#',
    'kidsworld_class_single_featured_img_on' => 'on',
    'kidsworld_class_comments_on' => 'off',
    'kidsworld_event_page_title' => 'Events',
    'kidsworld_event_page_url' => '#',
    'kidsworld_event_single_featured_img_on' => 'on',
    'kidsworld_event_comments_on' => 'off',
    'kidsworld_skin_color' => '#fcb54d',
    'kidsworld_skin_text_color' => '#ffffff',
    'kidsworld_content_color' => '#555555',
    'kidsworld_content_link_color' => '#000000',
    'kidsworld_content_link_hover_color' => '#000000',
    'kidsworld_topbar_on' => 'off',
    'kidsworld_topbar_intro_text' => 'Have any questions?',
    'kidsworld_topbar_phone_text' => '987-654-3210',
    'kidsworld_topbar_email_text' => 'info@loremips.com',
    'kidsworld_topbar_bg' => '#f2f2f2',
    'kidsworld_topbar_color' => '#666666',
    'kidsworld_topbar_hover_color' => '#000000',
    'kidsworld_topbar_font_size' => '16px',
    'kidsworld_topbar_social_on' => 'on',
    'kidsworld_blog_page_layout' => 'layout-sidebar-right',
    'kidsworld_blog_post_style' => 'kidsworld_post_default',
    'kidsworld_featured_img_height' => '520',
    'kidsworld_featured_fullwidth_img_height' => '520',
    'kidsworld_home_blog_header' => 'on',
    'kidsworld_home_blog_header_style' => 'standard',
    'kidsworld_header_rev_slider_shortcode' => '',
    'kidsworld_post_title_color' => '#8373ce',
    'kidsworld_post_title_hover_color' => '#000000',
    'kidsworld_post_title_size' => '36',
    'kidsworld_post_title_letter_space' => '0',
    'kidsworld_post_title_lineheight' => '40',
    'kidsworld_post_title_transform' => 'none',
    'kidsworld_post_title_text_style' => 'normal',
    'kidsworld_date_on' => 'on',
    'kidsworld_author_name_on' => 'on',
    'kidsworld_cats_on' => 'on',
    'kidsworld_comments_on' => 'on',
    'kidsworld_views_on' => 'on',
    'kidsworld_likes_on' => 'off',
    'kidsworld_post_button_on' => 'on',
    'kidsworld_excerpt_on' => 'on',
    'kidsworld_excerpt_length' => '50',
    'kidsworld_post_button_text' => 'READ MORE',
    'kidsworld_archives_sidebar' => 'blog-sidebar',
    'kidsworld_author_bio_on' => 'on',
    'kidsworld_blog_single_sort' => 'about_author,pagination,related_posts,comments',
    'kidsworld_blog_single_header_title' => 'Blog',
    'kidsworld_blog_page_url' => '#',
    'kidsworld_single_post_title_size' => '36',
    'kidsworld_single_post_title_letter_space' => '0',
    'kidsworld_single_post_title_lineheight' => '40',
    'kidsworld_single_post_title_transform' => 'none',
    'kidsworld_single_post_title_text_style' => 'normal',
    'kidsworld_single_date_on' => 'on',
    'kidsworld_single_author_name_on' => 'on',
    'kidsworld_single_tags_on' => 'on',
    'kidsworld_single_cats_on' => 'on',
    'kidsworld_single_share_on' => 'on',
    'kidsworld_single_comments_on' => 'on',
    'kidsworld_single_views_on' => 'on',
    'kidsworld_single_likes_on' => 'on',
    'kidsworld_post_single_section_ttl_col' => '#8376c7',
    'kidsworld_post_single_section_ttl_size' => '22',
    'kidsworld_post_single_section_ttl_letter_space' => '0',
    'kidsworld_post_single_section_ttl_lineheight' => '30',
    'kidsworld_post_single_section_ttl_transform' => 'none',
    'kidsworld_post_single_section_ttl_style' => 'normal',
    'kidsworld_boxed_layout_on' => 'off',
    'kidsworld_page_preloader_on' => 'off',
    'kidsworld_layout_max_width' => '1180',
    'kidsworld_layout_width' => '90',
    'kidsworld_content_width' => '74',
    'kidsworld_body_bg_color' => '#444444',
    'kidsworld_body_bg_opacity' => 1,
    'kidsworld_body_bg_img' => '',
    'kidsworld_body_bg_position' => 'center-top',
    'kidsworld_body_bg_repeat' => 'repeat',
    'kidsworld_body_bg_attachment' => 'scroll',
    'kidsworld_body_bg_stretch' => 'off',
    'kidsworld_site_content_top_padding' => '75px',
    'kidsworld_site_content_bottom_padding' => '75px',
    'kidsworld_bottom_go_top_scroll_btn_on' => 'on',
    'kidsworld_sub_header_on' => 'on',
    'kidsworld_sub_header_top_padding' => '120',
    'kidsworld_sub_header_bottom_padding' => '120',
    'kidsworld_sub_header_bg_color' => '#6e8b49',
    'kidsworld_sub_header_bg_img' => '',
    'kidsworld_sub_header_bg_position' => 'center-top',
    'kidsworld_sub_header_bg_repeat' => 'repeat',
    'kidsworld_sub_header_bg_attachment' => 'scroll',
    'kidsworld_sub_header_title_on' => 'on',
    'kidsworld_sub_header_title_color' => '#ffffff',
    'kidsworld_sub_header_title_font_size' => '48',
    'kidsworld_sub_header_title_transform' => 'uppercase',
    'kidsworld_sub_header_breadcrumb_on' => 'on',
    'kidsworld_search_bar_header_on' => 'on',
    'kidsworld_sub_header_breadcrumb_font_size' => '16',
    'kidsworld_sub_header_breadcrumb_transform' => 'none',
    'kidsworld_header_search_placeholder_text' => 'Search Our Site',
    'kidsworld_logo_standard' => '',
    'kidsworld_logo_retina' => '',
    'kidsworld_sticky_menu_on' => 'on',
    'kidsworld_menu_items_size' => '17',
    'kidsworld_menu_items_transform' => 'none',
    'kidsworld_min_width_menu_on' =>'on',
    'kidsworld_mobile_menu_min_resolution' => '979',
    'kidsworld_menu_dd_font_color' => '#444444',
    'kidsworld_menu_dd_font_size' => '16',
    'kidsworld_menu_dd_mm_font_size' => 20,
    'kidsworld_menu_dd_mm_item_space' => 5,
    'kidsworld_footer_on' => 'on',
    'kidsworld_footer_column' => '4',
    'kidsworld_footer_bg_img' => '',
    'kidsworld_footer_bg_color' => '#f2f2f2',
    'kidsworld_footer_bg_color_two' => '#eeeeee',
    'kidsworld_footer_top_border_color' => '#afc969',
    'kidsworld_footer_border_color' => '#dbdbdb',
    'kidsworld_footer_color' => '#333333',
    'kidsworld_footer_links_color' => '#333333',
    'kidsworld_footer_links_hover_color' => '#000000',
    'kidsworld_footer_text_size' => '16',
    'kidsworld_footer_line_height' => '30',
    'kidsworld_footer_wid_title_color' => '#8373ce',
    'kidsworld_footer_title_border_one' => '#fcb54e',
    'kidsworld_footer_title_transform' => 'none',
    'kidsworld_footer_title_text_style' => 'normal',
    'kidsworld_footer_wid_title_size' => '24',
    'kidsworld_footer_title_letter_space' => '0',
    'kidsworld_footer_title_lineheight' => '40',
    'kidsworld_footer_widget_space' => '50',
    'kidsworld_footer_copyright_left' => 'Copyright &copy; 2018, KidsWorld. All Rights Reserved.',
    'kidsworld_footer_copyright_right' => 'Designed by <a href="#" target="_blank">Softwebmedia Inc.</a>',
    'kidsworld_footer_copyright_text_size' => '16',
    'kidsworld_f_tab_wid_std_col' => '#ffffff',
    'kidsworld_f_tab_wid_std_bg' => '#444444',
    'kidsworld_f_tab_wid_active_col' => '#ffffff',
    'kidsworld_f_tab_wid_active_bg' => '#f47c7d',
    'kidsworld_f_tab_wid_title_transform' => 'none',
    'kidsworld_f_tab_wid_title_size' => '16',
    'kidsworld_f_tab_wid_title_letter_space' => '0',
    'kidsworld_contact_footer_on' => 'on',
    'kidsworld_cf_location' => 'on',
    'kidsworld_cf_phone' => 'on',
    'kidsworld_cf_email' => 'on',
    'kidsworld_cf_socialmedia' => 'on',
    'kidsworld_cf_column' => 'kidsworld_column4',
    'kidsworld_cf_bg_img' => '',
    'kidsworld_cf_bg_color' => '#8272cd',
    'kidsworld_cf_color' => '#ffffff',
    'kidsworld_cf_text_hover' => '#fdd94e',
    'kidsworld_cf_font_size' => '16px',
    'kidsworld_cf_location_text' => '456, Lorem Street, Lorem Ips, New York, US 33454.',
    'kidsworld_cf_location_phone_one' => '+1 (409) 987- 5873',
    'kidsworld_cf_location_phone_two' => '+1 (409) 987- 5874',
    'kidsworld_cf_location_email_one' => 'info@loremips.com',
    'kidsworld_cf_location_email_two' => 'support@loremips.com',
    'kidsworld_cf_icons_col' => '#ffffff',
    'kidsworld_cf_icon_location' => '#afc969',
    'kidsworld_cf_icon_phone' => '#f47c7d',
    'kidsworld_cf_icon_email' => '#fcb54e',
    'kidsworld_cf_icon_social' => '#5bc99f',
    'kidsworld_sidebar_text_size' => 14,
    'kidsworld_sidebar_text_col' => '#444444',
    'kidsworld_sidebar_link' => '#444444',
    'kidsworld_sidebar_link_hover' => '#000000',
    'kidsworld_sidebar_border_color' => '#e6e6e6',
    'kidsworld_sidebar_title_col' => '#555555',
    'kidsworld_widget_title_transform' => 'none',
    'kidsworld_widget_title_text_style' => 'normal',
    'kidsworld_sidebar_title_size' => '20',
    'kidsworld_sidebar_title_letter_space' => '0',
    'kidsworld_tab_wid_std_col' => '#555555',
    'kidsworld_tab_wid_std_bg' => '#f2f2f2',
    'kidsworld_tab_wid_active_col' => '#ffffff',
    'kidsworld_tab_wid_active_bg' => '#fcb54e',
    'kidsworld_tab_wid_title_transform' => 'none',
    'kidsworld_tab_wid_title_size' => '16',
    'kidsworld_tab_wid_title_letter_space' => '0',
    'kidsworld_tab_wid_title_lineheight' => '30',
    'kidsworld_open_sm_new_window' => 'on',
    'kidsworld_icon1' => 'facebook',
    'kidsworld_icon1_url' => '#',
    'kidsworld_icon2' => 'twitter',
    'kidsworld_icon2_url' => '#',
    'kidsworld_icon3' => 'pinterest',
    'kidsworld_icon3_url' => '#',
    'kidsworld_icon4' => 'vine',
    'kidsworld_icon4_url' => '#',
    'kidsworld_icon5' => 'dribbble',
    'kidsworld_icon5_url' => '#',
    'kidsworld_icon6' => 'rss',
    'kidsworld_icon6_url' => '#',
    'kidsworld_icon7' => 'linkedin',
    'kidsworld_icon7_url' => '#',
    'kidsworld_icon8' => 'flickr',
    'kidsworld_icon8_url' => '#',
    'kidsworld_icon9' => 'google-plus',
    'kidsworld_icon9_url' => '#',
    'kidsworld_icon10' => 'instagram',
    'kidsworld_icon10_url' => '#',
    'kidsworld_error_image' => '',
    'kidsworld_error_title' => 'Page Not Found',
    'kidsworld_error_content' => 'SORRY the page you are looking for does not exist.',
    'kidsworld_error_text_color' => '#333333',
    'kidsworld_custom_css' => '',
    'kidsworld_main_header_bg' => '#ffffff',
    'kidsworld_header_thick_border' => '#adcb69',
    'kidsworld_topmenu_links_text_color' => '#555555',
    'kidsworld_topmenu_icons_color' => '#ffffff',
    'kidsworld_topmenu_link1_color' => '#8373ce',
    'kidsworld_topmenu_link2_color' => '#fcb54d',
    'kidsworld_topmenu_link3_color' => '#fc5b4e',
    'kidsworld_topmenu_link4_color' => '#adca69',
    'kidsworld_topmenu_link5_color' => '#84bed6',
    'kidsworld_topmenu_link6_color' => '#c389ce',
    'kidsworld_topmenu_link7_color' => '#8373ce',
    'kidsworld_topmenu_link8_color' => '#fcb54d',
    'kidsworld_menu_bg_image_on' => 'on',
    'kidsworld_dd_bg_color' => '#ffffff',
    'kidsworld_dd_text_color' => '#555555',
    'kidsworld_breadcrumbs_bg' => '#d07dd2',
    'kidsworld_search_bar_bg' => '#adcb69',
    'kidsworld_search_breadcrumbs_text_color' => '#ffffff',
    'kidsworld_sidebar_w1_title' => '#adca69',
    'kidsworld_sidebar_w2_title' => '#fcb54d',
    'kidsworld_sidebar_w3_title' => '#84bed6',
    'kidsworld_sidebar_w4_title' => '#d07dd2',
    'kidsworld_sidebar_w5_title' => '#59c79e',
    'kidsworld_sidebar_w6_title' => '#8373ce',
    'kidsworld_sidebar_w7_title' => '#fdd94f',
    'kidsworld_sidebar_w8_title' => '#cc9966',
    'kidsworld_sidebar_w9_title' => '#2ab2bf',
    'kidsworld_sidebar_w10_title' => '#f97831',
    'kidsworld_class_grid_year_bg' => '#adcb69',
    'kidsworld_class_grid_title' => '#8374cf',
    'kidsworld_class_grid_price' => '#fbb54d',
    'kidsworld_class_grid_time' => '#777777',
    'kidsworld_class_grid_meta_text' => '#ffffff',
    'kidsworld_class_grid_first_child' => '#adcb69',
    'kidsworld_class_grid_second_child' => '#f47c7d',
    'kidsworld_class_grid_third_child' => '#fbb54d',
    'kidsworld_class_single_table_icons' => '#ffffff',
    'kidsworld_class_single_first_text' => '#777777',
    'kidsworld_class_single_second_text' => '#8373ce',
    'kidsworld_class_single_icon_1_bg' => '#adcb69',
    'kidsworld_class_single_icon_2_bg' => '#f57d7d',
    'kidsworld_class_single_icon_3_bg' => '#fbb54d',
    'kidsworld_class_single_icon_4_bg' => '#d07dd2',
    'kidsworld_class_single_icon_5_bg' => '#78d0e4',
    'kidsworld_class_single_icon_6_bg' => '#5ec99f',
    'kidsworld_class_single_icon_7_bg' => '#fdda4f',
    'kidsworld_class_single_icon_8_bg' => '#d76e9f',
    'kidsworld_class_single_price_box_bg' => '#8474d6',
    'kidsworld_class_single_price_box_text' => '#ffffff',
    'kidsworld_class_single_register_btn_bg' => '#adcb69',
    'kidsworld_class_single_register_btn_text' => '#ffffff',
    'kidsworld_event_grid_date_bg' => '#adcb69',
    'kidsworld_event_grid_date' => '#ffffff',
    'kidsworld_event_grid_time_bg' => '#fbb54d',
    'kidsworld_event_grid_time' => '#ffffff',
    'kidsworld_event_grid_title' => '#8374cf',
    'kidsworld_event_single_table1_bg' => '#fdc36f',
    'kidsworld_event_single_table1' => '#ffffff',
    'kidsworld_event_single_table2_bg' => '#78d0e4',
    'kidsworld_event_single_table2' => '#ffffff',
    'kidsworld_event_single_button_bg' => '#adcb69',
    'kidsworld_event_single_button' => '#ffffff',
    'kidsworld_logo_standard_width' => '204px',
    'kidsworld_woo_addtocart_text' => '#ffffff',
    'kidsworld_woo_addtocart_bg' => '#adcb69',
    'kidsworld_woo_featured_product_title_col' => '#8373ce',
    'kidsworld_woo_single_page_title_col' => '#8373ce',
    'kidsworld_woo_small_sections_title_col' => '#8373ce',
    'kidsworld_woo_cart_icon_col' => '#ffffff',
    'kidsworld_woo_cart_icon_bg' => '#cb77cf',
    'kidsworld_woo_cart_icon_hover_color' => '#ffffff',
    'kidsworld_woo_cart_icon_hover_bg' => '#8374cf',
    );

  return $kidsworld_theme_options_list;

}

add_filter( 'swmsc_customizer_options_list', 'kidsworld_customizer_options_list' );



