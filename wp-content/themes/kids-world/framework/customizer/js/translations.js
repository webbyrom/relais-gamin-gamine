jQuery(document).ready(function ($) {
 
// Header Style Options
    function kidsworldCustomizerHeader( targetElement, description ) {
      if ( description !== false ) {
        jQuery( '#input_kidsworld_header_style img.kidsworld_header_style_' + targetElement ).attr('title', description);
      }
    }

    // Tooltip Options
    function kidsworldCustomizerTooltip( targetElement, description ) {
      if ( description !== false ) {
        var kidsworldNewDescription = '<i class="dashicons dashicons-info" title="'+ description +'" rel="tooltip"></i>';
        jQuery( '#customize-control-' + targetElement + ' span.customize-control-title').append(kidsworldNewDescription);
      }
    }

    kidsworldCustomizerTooltip( 'kidsworld_footer_bg_color_two',kidsworld_c_translate.kidsworld_footer_bg_color_two );
    kidsworldCustomizerTooltip( 'kidsworld_footer_border_color',kidsworld_c_translate.kidsworld_footer_border_color );
    kidsworldCustomizerTooltip( 'kidsworld_footer_small_gotop',kidsworld_c_translate.kidsworld_footer_small_gotop );
    
    jQuery( '#input_kidsworld_full_width_header_on .kidsworld_image_switch_title span').append('<i class="dashicons dashicons-info" title="'+kidsworld_c_translate.input_kidsworld_full_width_header_on+'" rel="tooltip"></i>' );  

     // Info Text
    function kidsworldCustomizerInfotext( targetElement, description ) {
      if ( description !== false ) {
        var kidsworldNewDescription = '<span class="kidsworld_customizer_info_text">'+ description +'</span>';
        jQuery( '#customize-control-' + targetElement ).prepend(kidsworldNewDescription);
      }
    } 

    kidsworldCustomizerInfotext( 'kidsworld_logo_standard',kidsworld_c_translate.kidsworld_logo_standard_info );
    kidsworldCustomizerInfotext( 'kidsworld_icon1',kidsworld_c_translate.kidsworld_icon1_info );
    kidsworldCustomizerInfotext( 'kidsworld_post_single_section_ttl_col',kidsworld_c_translate.kidsworld_post_single_section_ttl_col_info );
    kidsworldCustomizerInfotext( 'kidsworld_blog_author_section_on',kidsworld_c_translate.kidsworld_blog_author_section_on_info );
    kidsworldCustomizerInfotext( 'kidsworld_excerpt_length',kidsworld_c_translate.kidsworld_excerpt_length_info );
    kidsworldCustomizerInfotext( 'kidsworld_skin_color',kidsworld_c_translate.kidsworld_skin_color_info );
    kidsworldCustomizerInfotext( 'kidsworld_archives_sidebar',kidsworld_c_translate.kidsworld_archives_sidebar_info );
    kidsworldCustomizerInfotext( 'kidsworld_advanced_styling_on',kidsworld_c_translate.kidsworld_advanced_styling_on_info );
    kidsworldCustomizerInfotext( 'kidsworld_sidebar_w1_title',kidsworld_c_translate.kidsworld_sidebar_w1_title_info );
    kidsworldCustomizerInfotext( 'kidsworld_logo_standard_width',kidsworld_c_translate.kidsworld_logo_standard_width_info );
    kidsworldCustomizerInfotext( 'kidsworld_google_map_api_customizer',kidsworld_c_translate.kidsworld_googlemap_api_info );

    function kidsworldCustomizerSubTitle( targetElement, subTitle ) {

        if ( subTitle !== false ) {

        subTitle = '<li class="customize-control kidsworld-customize-control-subtitle ' + targetElement + '-subtitle">' +
                     '<h4 class="customize-sub-title">' +
                       subTitle +
                     '</h4>' +
                   '</li>';

        jQuery( '#customize-control-' + targetElement ).before( subTitle );

        }    
    }

    kidsworldCustomizerSubTitle( 'kidsworld_body_font_family',kidsworld_c_translate.kidsworld_body_font_family_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_nav_font_family',kidsworld_c_translate.kidsworld_nav_font_family_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_headings_font_family',kidsworld_c_translate.kidsworld_headings_font_family_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_home_blog_header',kidsworld_c_translate.kidsworld_home_blog_header_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_google_map_api_customizer',kidsworld_c_translate.kidsworld_google_map_api_customizer_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_post_title_color',kidsworld_c_translate.kidsworld_post_title_color_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_date_on',kidsworld_c_translate.kidsworld_date_on_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_archives_sidebar',kidsworld_c_translate.kidsworld_archives_sidebar_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_single_post_title_size',kidsworld_c_translate.kidsworld_single_post_title_size_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_single_date_on',kidsworld_c_translate.kidsworld_single_date_on_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_post_single_section_ttl_col',kidsworld_c_translate.kidsworld_post_single_section_ttl_col_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_header_post_one',kidsworld_c_translate.kidsworld_header_post_one_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_advanced_styling_on',kidsworld_c_translate.kidsworld_advanced_styling_on_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_topmenu_links_text_color',kidsworld_c_translate.kidsworld_topmenu_links_text_color_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_dd_bg_color',kidsworld_c_translate.kidsworld_dd_bg_color_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_class_grid_year_bg',kidsworld_c_translate.kidsworld_class_grid_year_bg_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_class_single_table_icons',kidsworld_c_translate.kidsworld_class_single_table_icons_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_event_grid_date_bg',kidsworld_c_translate.kidsworld_event_grid_date_bg_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_event_single_table1_bg',kidsworld_c_translate.kidsworld_event_single_table1_bg_s_title );
   
    kidsworldCustomizerSubTitle( 'kidsworld_author_bio_on',kidsworld_c_translate.kidsworld_author_bio_on_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_sub_header_bg_color',kidsworld_c_translate.kidsworld_sub_header_bg_color_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_sub_header_title_on',kidsworld_c_translate.kidsworld_sub_header_title_on_s_title );    
    kidsworldCustomizerSubTitle( 'kidsworld_sub_header_breadcrumb_on',kidsworld_c_translate.kidsworld_sub_header_breadcrumb_on_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_mobile_menu_min_resolution',kidsworld_c_translate.kidsworld_mobile_menu_min_resolution_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_menu_dd_font_color',kidsworld_c_translate.kidsworld_menu_dd_font_color_s_title );

    kidsworldCustomizerSubTitle( 'kidsworld_menu_dd_mm_font_size',kidsworld_c_translate.kidsworld_menu_dd_mm_font_size_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_mm_icon',kidsworld_c_translate.kidsworld_mm_icon_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_sidebar_title_style',kidsworld_c_translate.kidsworld_sidebar_title_style_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_tab_wid_std_col',kidsworld_c_translate.kidsworld_tab_wid_std_col_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_f_tab_wid_std_col',kidsworld_c_translate.kidsworld_f_tab_wid_std_col_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_site_content_top_padding',kidsworld_c_translate.kidsworld_site_content_top_padding_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_body_bg_color',kidsworld_c_translate.kidsworld_body_bg_color_s_title );

    kidsworldCustomizerSubTitle( 'kidsworld_footer_wid_title_color',kidsworld_c_translate.kidsworld_footer_wid_title_color_s_title );
    kidsworldCustomizerSubTitle( 'kidsworld_footer_copyright_left',kidsworld_c_translate.kidsworld_footer_copyright_left_s_title );


 
});