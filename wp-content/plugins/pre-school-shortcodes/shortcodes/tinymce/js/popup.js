jQuery(document).ready(function($) {

    window.swmsc_thickBoxHeight = (92 / 100) * jQuery(window).height();
    window.swmsc_shortcodesFormHeight = (71 / 100) * jQuery(window).height();
    if(window.swmsc_shortcodesFormHeight > 550) {
        window.swmsc_shortcodesFormHeight = (82 / 100) * jQuery(window).height();
    }
    jQuery(window).resize(function() {
        window.swmsc_thickBoxHeight = (92 / 100) * jQuery(window).height();
        window.swmsc_shortcodesFormHeight = (71 / 100) * jQuery(window).height();

        if(window.swmsc_shortcodesFormHeight > 550) {
            window.swmsc_shortcodesFormHeight = (82 / 100) * jQuery(window).height();
        }
    });

    var swms = {
        loadVals: function()
        {
            var shortcode = $('#_swmsc_shortcode').text(),
                uShortcode = shortcode;
            
            // fill in the gaps eg {{param}}
            $('.swmsc-input').each(function() {
                var input = $(this),
                    id = input.attr('id'),
                    id = id.replace('swmsc_', ''),        // gets rid of the swmsc_ prefix
                    re = new RegExp("{{"+id+"}}","g");
                    var value = input.val();
                    if(value == null) {
                      value = '';
                    }
                    
                uShortcode = uShortcode.replace(re, input.val());
            });
            
            // adds the filled-in shortcode as hidden input
            $('#_swmsc_ushortcode').remove();
            $('#swmsc-sc-form-table').prepend('<div id="_swmsc_ushortcode" class="hidden">' + uShortcode + '</div>');            
           
        },
        cLoadVals: function()
        {
            var shortcode = $('#_swmsc_cshortcode').text(),
                pShortcode = '';
                shortcodes = '';
            
            // fill in the gaps eg {{param}}
            $('.child-clone-row').each(function() {
                var row = $(this),
                    rShortcode = shortcode;
                
                $('.swmsc-cinput', this).each(function() {
                    var input = $(this),
                        id = input.attr('id'),
                        id = id.replace('swmsc_', '')     // gets rid of the swmsc_ prefix
                        re = new RegExp("{{"+id+"}}","g");
                        var value = input.val();
                        if(value == null) {
                          value = '';
                        }
                        
                    rShortcode = rShortcode.replace(re, input.val());
                });
        
                shortcodes = shortcodes + rShortcode + "\n";
            });
            
            // adds the filled-in shortcode as hidden input
            $('#_swmsc_cshortcodes').remove();
            $('.child-clone-rows').prepend('<div id="_swmsc_cshortcodes" class="hidden">' + shortcodes + '</div>');
            
            // add to parent shortcode
            this.loadVals();
            pShortcode = $('#_swmsc_ushortcode').text().replace('{{child_shortcode}}', shortcodes);
            
            // add updated parent shortcode
            $('#_swmsc_ushortcode').remove();
            $('#swmsc-sc-form-table').prepend('<div id="_swmsc_ushortcode" class="hidden">' + pShortcode + '</div>');            
           
        },
        children: function()
        {
            // assign the cloning plugin
            $('.child-clone-rows').appendo({
                subSelect: '> div.child-clone-row:last-child',
                allowDelete: false,
                focusFirst: false,
                onAdd: function(row) {

                    // Get Upload ID
                    var prev_upload_id = jQuery(row).prev().find('.swmsc-upload-button').data('upid');
                    var new_upload_id = prev_upload_id + 1;
                    jQuery(row).find('.swmsc-upload-button').attr('data-upid', new_upload_id);

                   // activate color picker
                    jQuery('.wp-color-picker-field').wpColorPicker({
                        change: function(event, ui) {
                            swms.loadVals();
                            swms.cLoadVals();
                        }
                    });
                }
            });

            // remove button
            $('.child-clone-row-remove').live('click', function() {
                var btn = $(this),
                    row = btn.parent();
                
                if( $('.child-clone-row').size() > 1 )
                {
                    row.remove();
                }
                else
                {
                    alert('You need a minimum of one row');
                }
                
                return false;
            });

            
            // assign jUI sortable
            $( ".child-clone-rows" ).sortable({
                placeholder: "sortable-placeholder",
                items: '.child-clone-row',
                cancel: 'div.fonticon, input, select, textarea, a'
                
            });
        },
        
        resizeTB: function()
        {
            var ajaxCont = $('#TB_ajaxContent'),
                tbWindow = $('#TB_window'),
                swmPopup = $('#swmsc-popup');
            
            tbWindow.css({
                height: window.swmsc_thickBoxHeight,
                width: swmPopup.outerWidth(),
                marginLeft: -(swmPopup.outerWidth()/2)
            });

            ajaxCont.css({
                paddingTop: 0,
                paddingLeft: 0,
                paddingRight: 0,
                height: window.swmsc_thickBoxHeight,
                overflow: 'auto', // IMPORTANT
                width: swmPopup.outerWidth()
            });            
            
            tbWindow.show();
            $('#swmsc-popup').addClass('no_preview');
            $('#swmsc-sc-form-wrap #swmsc-sc-form').height(window.swmsc_shortcodesFormHeight);           
           
        },
        load: function()
        {
            var swms = this,
                popup = $('#swmsc-popup'),
                form = $('#swmsc-sc-form', popup),
                shortcode = $('#_swmsc_shortcode', form).text(),
                popupType = $('#_swmsc_popup', form).text(),
                uShortcode = '';
            
            // resize TB
            swms.resizeTB();
            $(window).resize(function() { swms.resizeTB() });
            
            // initialise
            swms.loadVals();
            swms.children();
            swms.cLoadVals();
            
            // update on children value change
            $('.swmsc-cinput', form).live('change', function() {
                swms.cLoadVals();
            });
            
            // update on value change
            $('.swmsc-input', form).change(function() {
                swms.loadVals();
            });          
           

            // update upload button ID
            jQuery('.swmsc-upload-button:not(:first)').each(function() {
                var prev_upload_id = jQuery(this).data('upid');
                var new_upload_id = prev_upload_id + 1;
                jQuery(this).attr('data-upid', new_upload_id);
            });
        }

    } 

    // run
    $('#swmsc-popup').livequery( function() { 
        swms.load();

        $('#swmsc-popup').closest('#TB_window').addClass('swmsc-shortcodes-popup'); 

        // activate color picker
        $('.wp-color-picker-field').wpColorPicker({
            change: function(event, ui) {
                setTimeout(function() {
                    swms.loadVals();
                    swms.cLoadVals();
                },
                1);
            }
        });
    });


    // when insert is clicked
    $('.swmsc-insert').live('click', function() {                        
        if(window.tinyMCE)
        {
            window.tinyMCE.activeEditor.execCommand('mceInsertContent', false, $('#_swmsc_ushortcode').html());
            tb_remove();
        }
    });


    // activate upload button
    $('.swmsc-upload-button').live('click', function(e) {
        e.preventDefault();

        upid = $(this).attr('data-upid');

        if($(this).hasClass('remove-image')) {
            $('.swmsc-upload-button[data-upid="' + upid + '"]').parent().find('img').attr('src', '').hide();
            $('.swmsc-upload-button[data-upid="' + upid + '"]').parent().find('input').attr('value', '');
            $('.swmsc-upload-button[data-upid="' + upid + '"]').html('<i class="fa fa-arrow-up" ></i>Upload').removeClass('remove-image');

            return;
        }

        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select Image',
            button: {
                text: 'Select Image',
            },
            frame: 'post',
            multiple: false  // Set to true to allow multiple files to be selected
        });

        file_frame.open();

        file_frame.on( 'select', function() {
            var selection = file_frame.state().get('selection');
                selection.map( function( attachment ) {
                attachment = attachment.toJSON();

                $('.swmsc-upload-button[data-upid="' + upid + '"]').parent().find('img').attr('src', attachment.url).show();
                $('.swmsc-upload-button[data-upid="' + upid + '"]').parent().find('input').attr('value', attachment.url);

                swms.loadVals();
                swms.cLoadVals();
            });

            $('.swmsc-upload-button[data-upid="' + upid + '"]').text('Remove').addClass('remove-image');
            $('.media-modal-close').trigger('click');
        });

        file_frame.on( 'insert', function() {
            var selection = file_frame.state().get('selection');
            var size = jQuery('.attachment-display-settings .size').val();

            selection.map( function( attachment ) {
                attachment = attachment.toJSON();

                if(!size) {
                    attachment.url = attachment.url;
                } else {
                    attachment.url = attachment.sizes[size].url;
                }

                $('.swmsc-upload-button[data-upid="' + upid + '"]').parent().find('img').attr('src', attachment.url).show();
                $('.swmsc-upload-button[data-upid="' + upid + '"]').parent().find('input').attr('value', attachment.url);

                swms.loadVals();
                swms.cLoadVals();
            });

            $('.swmsc-upload-button[data-upid="' + upid + '"]').text('Remove').addClass('remove-image');
            $('.media-modal-close').trigger('click');
        });
    });

    // activate fonticon
    $('.fonticon i').live('click', function(e) {
        e.preventDefault();

        var iconWithPrefix = $(this).attr('class');
        var fontName = $(this).attr('data-icon');

        if($(this).hasClass('active')) {
            $(this).parent().find('.active').removeClass('active');

            $(this).parent().parent().find('input').attr('value', '');
        } else {
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');

            $(this).parent().parent().find('input').attr('value', fontName);
        }

        swms.loadVals();
        swms.cLoadVals();
    });


    
});