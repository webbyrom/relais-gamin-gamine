<?php

if ( ! function_exists( 'kidsworld_load_customizer_translations' ) ) {
    function kidsworld_load_customizer_translations() {

        wp_enqueue_script('kidsworld-customizer-translations', KIDSWORLD_THEME_DIR . '/framework/customizer/js/translations.js','jquery','1.0', TRUE );
        wp_localize_script('kidsworld-customizer-translations', 'kidsworld_c_translate', array(
            
            'kidsworld_footer_bg_color_two'           => esc_html__('Add little dark color from primary background color to apply in tags hover, forms fields etc.','kids-world'),
            'kidsworld_footer_border_color'           => esc_html__('Border color for form borders, link list separator borders, tags borders etc.','kids-world'),
            'kidsworld_sidebar_border_color'          => esc_html__('Border color for form borders, link list separator borders, tags borders etc.','kids-world'),
            'kidsworld_footer_small_gotop'            => esc_html__('Leave this field blank to hide Go Top link text','kids-world'),
 
            'kidsworld_body_font_family_s_title'      => esc_html__('Body Fonts','kids-world'),
            'kidsworld_nav_font_family_s_title'       => esc_html__('Main Navigation Fonts','kids-world'),
            'kidsworld_headings_font_family_s_title'  => esc_html__('Headings Fonts','kids-world'),
            'kidsworld_sub_header_bg_color_s_title'   => esc_html__('Sub Header - Background','kids-world'),
            'kidsworld_sub_header_title_on_s_title'   => esc_html__('Sub Header Title','kids-world'),
            'kidsworld_sub_header_breadcrumb_on_s_title' => esc_html__('Breadcrumbs and Search','kids-world'),
            'kidsworld_home_blog_header_s_title'      => esc_html__('Sub Header (If Blog as a Home)','kids-world'),
            'kidsworld_post_title_color_s_title'      => esc_html__('Post Title and Date Box','kids-world'),
            'kidsworld_date_on_s_title'               => esc_html__('On/Off Post Meta','kids-world'),
            'kidsworld_archives_sidebar_s_title'  => esc_html__('Archives Pages Options','kids-world'),
            'kidsworld_author_bio_on_s_title'         => esc_html__('Author Archives Page','kids-world'),
            'kidsworld_single_post_title_size_s_title'=> esc_html__('Post Title','kids-world'),
            'kidsworld_single_date_on_s_title'        => esc_html__('On/Off Post Meta','kids-world'),
            'kidsworld_post_single_section_ttl_col_s_title'=> esc_html__('Sections Title','kids-world'),
            'kidsworld_header_bg_color_s_title'       => esc_html__('Header Background','kids-world'),
            'kidsworld_google_map_api_customizer_s_title' => esc_html__('Google Maps API','kids-world'),
            'kidsworld_advanced_styling_on_s_title'   => esc_html__('Advanced Styling - On/Off','kids-world'),
            'kidsworld_topmenu_links_text_color_s_title'   => esc_html__('Top Menu','kids-world'),
            'kidsworld_dd_bg_color_s_title'   => esc_html__('Dropdown Menu','kids-world'),
            'kidsworld_class_grid_year_bg_s_title'   => esc_html__('Class Grid Page','kids-world'),
            'kidsworld_class_single_table_icons_s_title'   => esc_html__('Class Single Page','kids-world'),   
            'kidsworld_event_grid_date_bg_s_title'   => esc_html__('Events Grid Page','kids-world'),   
            'kidsworld_event_single_table1_bg_s_title'   => esc_html__('Events Single Page','kids-world'),

            'kidsworld_mobile_menu_min_resolution_s_title'=> esc_html__('Responsive/Mobile Menu','kids-world'),
            'kidsworld_menu_dd_font_color_s_title'    => esc_html__('Dropdown Menu','kids-world'),
            'kidsworld_menu_dd_mm_font_size_s_title'  => esc_html__('Mega Menu','kids-world'),
            'kidsworld_mm_icon_s_title'               => esc_html__('Mobile Menu','kids-world'),
            'kidsworld_footer_wid_title_color_s_title'=> esc_html__('Widget Title','kids-world'),
            'kidsworld_footer_copyright_left_s_title' => esc_html__('Copyright Info Section','kids-world'),
            'kidsworld_footer_logo_width_s_title'     => esc_html__('Logo','kids-world'),
            'kidsworld_cf_socialmedia_s_title'        => esc_html__('Social Media Icons','kids-world'),
            'kidsworld_footer_sm_title_s_title'       => esc_html__('Title and Description','kids-world'),
            'kidsworld_footer_sm_icon_color_s_title'  => esc_html__('Social Media Icons','kids-world'),
            'kidsworld_sidebar_title_style_s_title'   => esc_html__('Sidebar Widget Box and Title','kids-world'),
            'kidsworld_tab_wid_std_col_s_title'       => esc_html__('Sidebar Widget Tabs Styling','kids-world'),
            'kidsworld_f_tab_wid_std_col_s_title'     => esc_html__('Footer Widget Tabs Styling','kids-world'),
            'kidsworld_search_box_style_s_title'      => esc_html__('Search Box','kids-world'),
            'kidsworld_site_content_top_padding_s_title' => esc_html__('Content area between header and footer','kids-world'),
            'kidsworld_body_bg_color_s_title'         => esc_html__('Body Background','kids-world'),

            'kidsworld_logo_standard_info'              => esc_html__('Upload standard and retina logo. Retina logo should be double of standard logo. For example standard logo size is 100x50 then retina logo size should be 200x100. If you do not want to add retina logo then use standard logo in retina logo upload section.','kids-world'),
            'kidsworld_icon1_info'                      => esc_html__('Rererence icon site: <a href="https://fontawesome.com/v4.7.0/icons/#brand" target="_blank">Font Awesome</a>','kids-world'),
            'kidsworld_post_single_section_ttl_col_info'=> esc_html__('Add styles to section titles like About Author, Comments, Related Posts, Leave a Reply form in blog single page.','kids-world'),

            'kidsworld_excerpt_length_info'             => esc_html__('If you are not using excerpt box to display summery text then you can control summery text from <strong>content</strong> text. If you are adding summery text in post excerpt section then it will display all excerpt content.','kids-world'),
            'kidsworld_skin_color_info'                 => esc_html__('Skin color will apply in small elements like buttons, scroll top top arrow etc.','kids-world'),
            'kidsworld_archives_sidebar_info'           => esc_html__('Select your preferred sidebar for blog pages like archives, categories, author and tags etc.','kids-world'),
            'kidsworld_advanced_styling_on_info'        => esc_html__('Edit styling of  top menu, sidebar widget titles, events, classes etc. sections. Set "ON" mode, "Save and Publish" customizer and "REFRESH" Page to see "Advanced Styling" below "Styling" tab in customizer main tabs list. This option will add css styles in page head section which can make page speed little slow. If you have basic skill in css then you can quickly edit theme styles options from ../wp-content/themes/kids-world/styling.css OR from admin > appearance > editor > click on right side "styling.css" file name.', 'kids-world'),
            'kidsworld_sidebar_w1_title_info'           => esc_html__('Set sidebar widget titles stripe colors.','kids-world'),
            'kidsworld_logo_standard_width_info'        => esc_html__('If you are not using WooCommerce plugin then leave logo width field blank. ','kids-world'),
            'kidsworld_googlemap_api_info'              => esc_html__('To set up your Google Map API key please do follow their detailed instructions in the "Get API Key" article. <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Click here to read full article.</a>','kids-world'),
            
        ));
  }

    add_action( 'customize_controls_print_footer_scripts', 'kidsworld_load_customizer_translations' );
}
