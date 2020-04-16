( function($) {

    $(window).load(function() {

        $('#kidsworld_customizer_loading').delay(1000).fadeOut('slow');

            function kidsworld_is_exist_in_obj(field, object) {
            for (var i in object) {
                if (object[i] === field) {
                    return (true);
                }
            }
            return (false);
        }

        function kidsworld_GetFontWeight(selectField) {

            var fieldID = selectField.data('customize-setting-link').replace(/family/, "weight");
            var fontName = jQuery('option:selected', selectField).val();
            var fontWeight = _wpCustomizeSettings.settings.kidsworld_google_font_weight_list.value[fontName];

            $('input[name="_customize-radio-' + fieldID + '"]').each( function() {
                $this = $(this);
                if ( ! kidsworld_is_exist_in_obj( $this.val(), fontWeight ) ) {
                    $this.parent().attr('data-custmizer-hide', 'true');
                } else {
                    $this.parent().removeAttr('data-custmizer-hide');
                }
            });

        }

        var $kidsworldCheckedTrigger = jQuery('#sub-accordion-section-kidsworld_fonts_options select');

        $kidsworldCheckedTrigger.each( function() {
          kidsworld_GetFontWeight( $(this) );
        }).change( function() {
          kidsworld_GetFontWeight( $(this) );
        });

        $('#customize-control-x_custom_fonts input').change( function() {
          $kidsworldCheckedTrigger.each( function() {
            kidsworld_GetFontWeight( $(this) );
          });
        });

    });

    $(document).ready(function() {

        //mini select
        var kidsworldMiniSelectFields = jQuery('label.kidsworld_body_sw,label.kidsworld_top_nav_sw,label.kidsworld_headings_sw');
        kidsworldMiniSelectFields.parent().css({
            'width': '35%',
            'margin': 0
        });

        // display element on click

        function kidsworldCustomizerDefaultDisplay( value, targets ) {
          $.each( targets, function( index, item ) {
            if ( item.key !== value ) {
              $( item.target ).attr('data-custmizer-hide', 'true');
            } else {
              $( item.target ).removeAttr('data-custmizer-hide');
            }
          });
        }

        function kidsworldCustomizerNewDisplay( group, targets ) {
          group.change( function() {
            var $value = $(this).val();
            $.each( targets, function( index, item ) {
              if ( item.key !== $value ) {
                $( item.target ).attr('data-custmizer-hide', 'true');
              } else {
                $( item.target ).removeAttr('data-custmizer-hide');
              }
            });
          });
        }

        // sub header title ( show on click )

        var $subHeaderTitleDefault = $('#customize-control-kidsworld_sub_header_title_on input:checked').val();
        var $subHeaderTitleOptions = $('#customize-control-kidsworld_sub_header_title_on input');
        var $subHeaderTitleElements = [
          { key : 'on',  target : '#customize-control-kidsworld_sub_header_title_color,#customize-control-kidsworld_sub_header_title_font_size,#customize-control-kidsworld_sub_header_title_transform' }
        ];

        kidsworldCustomizerDefaultDisplay( $subHeaderTitleDefault, $subHeaderTitleElements );
        kidsworldCustomizerNewDisplay( $subHeaderTitleOptions, $subHeaderTitleElements );

        // sub header breadcrumb ( show on click )

        var $subHeaderBreadcrumbDefault = $('#customize-control-kidsworld_sub_header_breadcrumb_on input:checked').val();
        var $subHeaderBreadcrumbOptions = $('#customize-control-kidsworld_sub_header_breadcrumb_on input');
        var $subHeaderBreadcrumbElements = [
          { key : 'on',  target : '#customize-control-kidsworld_sub_header_breadcrumb_color,#customize-control-kidsworld_sub_header_breadcrumb_font_size,#customize-control-kidsworld_sub_header_breadcrumb_transform' }
        ];

        kidsworldCustomizerDefaultDisplay( $subHeaderBreadcrumbDefault, $subHeaderBreadcrumbElements );
        kidsworldCustomizerNewDisplay( $subHeaderBreadcrumbOptions, $subHeaderBreadcrumbElements );


        // sub header search ( show on click )

        var $subHeaderSearchDefault = $('#customize-control-kidsworld_search_bar_header_on input:checked').val();
        var $subHeaderSearchOptions = $('#customize-control-kidsworld_search_bar_header_on input');
        var $subHeaderSearchElements = [
          { key : 'on',  target : '#customize-control-kidsworld_header_search_placeholder_text' }
        ];

        kidsworldCustomizerDefaultDisplay( $subHeaderSearchDefault, $subHeaderSearchElements );
        kidsworldCustomizerNewDisplay( $subHeaderSearchOptions, $subHeaderSearchElements );


        // blog post content style grid

        var $siteBlogPostDefault = $('#customize-control-kidsworld_blog_post_style input:checked').val();
        var $siteBlogGridOption = $('#customize-control-kidsworld_blog_post_style input');
        var $siteBlogPostStyleElements = [
          { key : 'kidsworld_post_masonry',  target : '#customize-control-kidsworld_blog_grid_column' }
        ];

        kidsworldCustomizerDefaultDisplay( $siteBlogPostDefault, $siteBlogPostStyleElements );
        kidsworldCustomizerNewDisplay( $siteBlogGridOption, $siteBlogPostStyleElements );

         // blog archives page content style grid

        var $siteBlogArchivesPostDefault = $('#customize-control-kidsworld_archives_post_style input:checked').val();
        var $siteBlogArchivesGridOption = $('#customize-control-kidsworld_archives_post_style input');
        var $siteBlogArchivesPostStyleElements = [
          { key : 'kidsworld_post_masonry',  target : '#customize-control-kidsworld_archives_grid_column' }
        ];

        kidsworldCustomizerDefaultDisplay( $siteBlogArchivesPostDefault, $siteBlogArchivesPostStyleElements );
        kidsworldCustomizerNewDisplay( $siteBlogArchivesGridOption, $siteBlogArchivesPostStyleElements );   

        // post button 

        var $sitePostButtonDefault = $('#customize-control-kidsworld_post_button_on input:checked').val();
        var $sitePostButtonOptions = $('#customize-control-kidsworld_post_button_on input');
        var $sitePostButtonElements = [
          { key : 'on',  target : '#customize-control-kidsworld_post_button_text' }
        ];

        kidsworldCustomizerDefaultDisplay( $sitePostButtonDefault, $sitePostButtonElements );
        kidsworldCustomizerNewDisplay( $sitePostButtonOptions, $sitePostButtonElements );

        // post excerpt 
        var $sitePostExcerptDefault = $('#customize-control-kidsworld_excerpt_on input:checked').val();
        var $sitePostExcerptOptions = $('#customize-control-kidsworld_excerpt_on input');
        var $sitePostExcerptElements = [
          { key : 'on',  target : '#customize-control-kidsworld_excerpt_length' }
        ];

        kidsworldCustomizerDefaultDisplay( $sitePostExcerptDefault, $sitePostExcerptElements );
        kidsworldCustomizerNewDisplay( $sitePostExcerptOptions, $sitePostExcerptElements );

        // google sub set
        var $siteGoogleFontDefault = $('#customize-control-kidsworld_google_fonts_subset_on input:checked').val();
        var $siteGoogleFontOptions = $('#customize-control-kidsworld_google_fonts_subset_on input');
        var $siteGoogleFontElements = [
          { key : 'on',  target : '#customize-control-kidsworld_google_font_subset_cyrillic,#customize-control-kidsworld_google_font_subset_greek,#customize-control-kidsworld_google_font_subset_vietnamese' }
        ];

        kidsworldCustomizerDefaultDisplay( $siteGoogleFontDefault, $siteGoogleFontElements );
        kidsworldCustomizerNewDisplay( $siteGoogleFontOptions, $siteGoogleFontElements );

        // body bg
        var $siteBodyBgDefault = $('#customize-control-kidsworld_boxed_layout_on input:checked').val();
        var $siteBodyBgOptions = $('#customize-control-kidsworld_boxed_layout_on input');
        var $siteBodyBgElements = [
          { key : 'on',  target : '.kidsworld_body_bg_color-subtitle, #customize-control-kidsworld_body_bg_color, #customize-control-kidsworld_body_bg_opacity, #customize-control-kidsworld_body_bg_img, #customize-control-kidsworld_body_bg_position, #customize-control-kidsworld_body_bg_repeat, #customize-control-kidsworld_body_bg_attachment,#customize-control-kidsworld_body_bg_stretch' } ];

        kidsworldCustomizerDefaultDisplay( $siteBodyBgDefault, $siteBodyBgElements );
        kidsworldCustomizerNewDisplay( $siteBodyBgOptions, $siteBodyBgElements );

        // home Slider
        var $siteHomeSliderDefault = $('#customize-control-kidsworld_home_blog_header_style input:checked').val();
        var $siteHomeSliderOptions = $('#customize-control-kidsworld_home_blog_header_style input');
        var $siteHomeSliderElements = [         
          { key : 'revolution_slider',  target : '#customize-control-kidsworld_header_rev_slider_shortcode' }
        ];

        kidsworldCustomizerDefaultDisplay( $siteHomeSliderDefault, $siteHomeSliderElements );
        kidsworldCustomizerNewDisplay( $siteHomeSliderOptions, $siteHomeSliderElements );

        // home Slider
        var $siteBlogHomeDefault = $('#customize-control-kidsworld_home_blog_header input:checked').val();
        var $siteBlogHomeOptions = $('#customize-control-kidsworld_home_blog_header input');
        var $siteBlogHomeElements = [         
          { key : 'on',  target : '#customize-control-kidsworld_header_rev_slider_shortcode,#customize-control-kidsworld_home_blog_header_style' }
        ];

        kidsworldCustomizerDefaultDisplay( $siteBlogHomeDefault, $siteBlogHomeElements );
        kidsworldCustomizerNewDisplay( $siteBlogHomeOptions, $siteBlogHomeElements );

        // blog image
        var $siteBlogImageDefault = $('#customize-control-kidsworld_blog_page_layout input:checked').val();
        var $siteBlogImageOptions = $('#customize-control-kidsworld_blog_page_layout input');
        var $siteBlogImageElements = [         
          { key : 'layout-full-width',  target : '#customize-control-kidsworld_featured_fullwidth_img_height' }
        ];

        kidsworldCustomizerDefaultDisplay( $siteBlogImageDefault, $siteBlogImageElements );
        kidsworldCustomizerNewDisplay( $siteBlogImageOptions, $siteBlogImageElements );

        // Tooltip
        $( function() {var targets = $( '[rel~=tooltip]' ), target  = false, tooltip = false, title   = false; targets.bind( 'mouseenter', function() {target  = $( this ); tip     = target.attr( 'title' ); tooltip = $( '<div id="kidsworld_tooltip"></div>' ); if( !tip || tip == '' ) return false; target.removeAttr( 'title' ); tooltip.css( 'opacity', 0 ) .html( tip ) .appendTo( 'body' ); var init_tooltip = function() {if( $( window ).width() < tooltip.outerWidth() * 1.5 ) tooltip.css( 'max-width', $( window ).width() / 2 ); else tooltip.css( 'max-width', 250 ); var pos_left = target.offset().left + ( target.outerWidth() / 2 ) - ( tooltip.outerWidth() / 2 ), pos_top  = target.offset().top - tooltip.outerHeight() - 20; if( pos_left < 0 ) {pos_left = target.offset().left + target.outerWidth() / 2 - 20; tooltip.addClass( 'left' ); } else tooltip.removeClass( 'left' ); if( pos_left + tooltip.outerWidth() > $( window ).width() ) {pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20; tooltip.addClass( 'right' ); } else tooltip.removeClass( 'right' ); if( pos_top < 0 ) {var pos_top  = target.offset().top + target.outerHeight(); tooltip.addClass( 'top' ); } else tooltip.removeClass( 'top' ); tooltip.css( { left: pos_left, top: pos_top } ) .animate( { top: '+=10', opacity: 1 }, 50 ); }; init_tooltip(); $( window ).resize( init_tooltip ); var remove_tooltip = function() {tooltip.animate( { top: '-=10', opacity: 0 }, 50, function() {$( this ).remove(); }); target.attr( 'title', tip ); }; target.bind( 'mouseleave', remove_tooltip ); tooltip.bind( 'click', remove_tooltip ); }); });

        var kidsworldCustomControls = {
            cache: {},

            init: function() {
                // Populate cache
                this.cache.$buttonset  = $('.kidsworld-control-buttonset');

                // Initialize Button sets
                if (this.cache.$buttonset.length > 0) {
                    this.buttonset();
                }

            },

            buttonset: function() {
                this.cache.$buttonset.buttonset();
            }

        };

        kidsworldCustomControls.init();

    });

})(jQuery);