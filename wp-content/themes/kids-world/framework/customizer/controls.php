<?php

/* ************************************************************************************** 
  Custom Controls
************************************************************************************** */

function kidsworld_add_customizer_custom_controls( $wp_customize ) {

    class kidsworld_Customize_Control_Textarea extends WP_Customize_Control {
        public $type = 'textarea';
        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea <?php $this->link(); ?> rows="10" style="width: 98%;"><?php echo esc_textarea( $this->value() ); ?></textarea>
                </label>
            <?php
        }
    }

    class kidsworld_Customize_Control_Multiple_Select extends WP_Customize_Control {
        
        public $type = 'multiple-select';

        public function render_content() {

        if ( empty( $this->choices ) )
            return;
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
                    <?php
                        foreach ( $this->choices as $value => $label ) {
                            $selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
                            echo '<option value="' . esc_attr( $value ) . '"' . esc_attr($selected) . '>' . esc_html( $label ) . '</option>';
                        }
                    ?>
                </select>
            </label>
        <?php }
    }

    class kidsworld_Customize_Slider_Control extends WP_Customize_Control {            
        public $type = 'slider';     
       
        public function render_content() { ?>
            <div class="kidsworld_customizer_slider_control"> 
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>                         
                </label>     
                <div class="left">
                    <input type="range" name="points" min="<?php echo esc_html($this->choices['min']); ?>" max="<?php echo esc_html($this->choices['max']); ?>" step="<?php echo esc_html($this->choices['step']); ?>" <?php $this->link(); ?>>
                </div>
                <div class="right">
                    <input class="kidsworld_customizer_slider_value" name="<?php echo esc_attr( $this->id ); ?>" type="text" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />            
                    <div class="kidsworld_customizer_slider"></div>
                </div>
                <div class="clear"></div>
            </div>
        <?php
        }  
    }

    class kidsworld_Customize_Control_Mini_Text extends WP_Customize_Control {
        public $type = 'minitext';
        public function render_content() {
            ?>
            <div class="kidsworld_customizer_minitext">
                <label class="<?php echo esc_html($this->section); ?>"><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span></label>
                <input class="kidsworld_minitext_field <?php echo esc_attr($this->section); ?>" type="text" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
            </div>
        <?php
        }
    }

    class kidsworld_Customize_Control_Mini_Select extends WP_Customize_Control {
        public $type = 'miniselect';
        public function render_content() {
            
            if ( empty( $this->choices ) )
                return;
            ?>
            <label class="<?php echo esc_attr( $this->id ); ?>">
                <span class="customize-control-title kidsworld_customize_miniselect"><?php echo esc_html( $this->label ); ?></span>
                <select <?php $this->link(); ?>>
                    <?php
                    foreach ( $this->choices as $value => $label )
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( esc_attr( $this->value() ), $value, false ) . '>' . esc_html( $label ) . '</option>';
                    ?>
                </select>
            </label>                
        <?php
        }
    }

    class kidsworld_Customize_Category_Control extends WP_Customize_Control {
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . esc_attr( $this->id ),
                    'echo'              => 0,
                    'show_option_none'  => esc_html__( '-- Select --','kids-world' ),
                    'option_none_value' => '0',
                    'selected'          => esc_attr( $this->value() ),
                )
            );
 
            // Hackily add in the data link parameter.
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }

    class kidsworld_Customize_Post_Control extends WP_Customize_Control {

        private $posts = false;

        public function __construct($manager, $id, $args = array(), $options = array())
        {
            $postargs = wp_parse_args($options, array('numberposts' => '100'));
            $this->posts = get_posts($postargs);

            parent::__construct( $manager, $id, $args );
        }

        public function render_content() {

            if(!empty($this->posts)) { ?>
                    <label>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                        <select name="<?php echo esc_attr($this->id); ?>" id="<?php echo esc_attr($this->id); ?>" <?php $this->link(); ?>>
                        <?php
                                foreach ( $this->posts as $post ) {
                                    echo '<option value="' . esc_attr( $post->ID ) . '"' . selected( esc_attr( $this->value() ), $post->ID, false ) . '>' . esc_html( $post->post_title ) . '</option>';
                                }
                            ?>
                        </select>
                    </label>
                <?php
            }
        }
    }

    class kidsworld_Customize_Multi_Post_Control extends WP_Customize_Control {

        private $posts = false;

        public function __construct($manager, $id, $args = array(), $options = array())
        {
            $postargs = wp_parse_args($options, array('numberposts' => '100'));
            $this->posts = get_posts($postargs);

            parent::__construct( $manager, $id, $args );
        }

        public function render_content() {

            if(!empty($this->posts)) { ?>
                    <label>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                         <select <?php $this->link(); ?> multiple="multiple" class="kidsworld_customizer_multipost">
                            <?php
                                foreach ( $this->posts as $post ) {
                                    $selected = ( in_array( $post->ID, $this->value() ) ) ? selected( 1, 1, false ) : '';
                                    echo '<option value="' . esc_attr( $post->ID ) . '"' . $selected . '>' . esc_html( $post->post_title ) . '</option>';
                                }
                            ?>
                        </select>
                    </label>
                <?php
            }
        }
    }


    class kidsworld_Customize_Radio_Image_Control extends WP_Customize_Control {

        public $type = 'radio-image';  

        public function render_content() {

            if ( empty( $this->choices ) ) {
                return;
            }

            $name = '_customize-radio-'.$this->id;

            ?>
            <span class="customize-control-title">
                <?php echo esc_attr( $this->label ); ?>
            </span>
            <div id="input_<?php echo esc_attr( $this->id ); ?>" class="image">
                <?php foreach ( $this->choices as $value => $label ) : ?>
                  

                    <input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $this->id ).esc_attr( $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
                        <label for="<?php echo esc_attr( $this->id ).esc_attr( $value ); ?>">
                            <img src="<?php echo esc_html( $label ); ?>" rel="tooltip" class="<?php echo esc_attr( $this->id ).'_'.esc_attr( $value ); ?>">
                        </label>
                    </input>

                <?php endforeach; ?>
            </div>
            <script>jQuery(document).ready(function(jQuery) { jQuery( '[id="input_<?php echo esc_attr( $this->id ); ?>"]' ).buttonset(); });</script>
            <?php
        }

    }

    class kidsworld_Customize_Radio_Switch_Control extends WP_Customize_Control {

        public $type = 'radio-switch';  

        public function render_content() {

            $name = '_customize-radio-'.$this->id;

            ?>
           
            <div id="input_<?php echo esc_attr( $this->id ); ?>" class="image kidsworld-image-switch">     

                <div class="kidsworld-image-switch-block">
                    <input class="image-select" type="radio" value="on" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $this->id ).'-on'; ?>" <?php $this->link(); checked( $this->value(), 'on' ); ?>>
                        <label for="<?php echo esc_attr( $this->id ).'-on'; ?>">
                           <p rel="tooltip" title="On" class="mode_on"></p>
                        </label>
                    </input>

                     <input class="image-select" type="radio" value="off" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $this->id ).'-off'; ?>" <?php $this->link(); checked( $this->value(), 'off' ); ?>>
                        <label for="<?php echo esc_attr( $this->id ).'-off'; ?>">
                            <p rel="tooltip" title="Off" class="mode_off"></p>
                        </label>
                    </input>
                </div>              

                <div class="kidsworld_image_switch_title">
                    <span><?php echo esc_attr( $this->label ); ?></span> 
                </div>

            </div>
            <script>jQuery(document).ready(function(jQuery) { jQuery( '[id="input_<?php echo esc_attr( $this->id ); ?>"]' ).buttonset(); });</script>
            <?php
        }

    }

    class kidsworld_Customize_Sort_Control extends WP_Customize_Control {
        public function enqueue() {
            wp_enqueue_script( 'jquery-ui-core' );
            wp_enqueue_script( 'jquery-ui-sortable' );
        }
        public function render_content() { ?>
            <div class="kidsworld-sortable">
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php if ( '' != $this->description ) { ?>
                        <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
                    <?php } ?>
                </label>
                <?php
                // Get values and choices
                $values     = $this->value();
                $choices    = $this->choices;
                // Turn values into array
                if ( ! is_array( $values ) ) {
                    $values = explode( ',', $values );
                } ?>
                <ul id="<?php echo esc_attr( $this->id ); ?>_sortable">
                    <?php
                    // Loop through values
                    foreach ( $choices as $value => $label ) {
                        $kidsworld_sort_hide_footer    = '';
                        $kidsworld_sort_hide_icon      = 'green';
                        if ( ! in_array( $value, $values ) ) {
                            $kidsworld_sort_hide_footer    = ' kidsworld-hide';
                            $kidsworld_sort_hide_icon      = ' red';
                        } ?>
                        <li data-value="<?php echo esc_attr( $value ); ?>" class="kidsworld-sortable-li<?php echo $kidsworld_sort_hide_footer; ?>">
                            <?php echo esc_html($label); ?>
                            <span class="kidsworld-hide-sortee onofficons <?php echo $kidsworld_sort_hide_icon; ?>"></span>
                        </li>
                    <?php } ?>
                </ul>
            </div><!-- .kidsworld-sortable -->
            <div class="clear:both"></div>
            <?php
            // Return values as comma seperated string for input
            if ( is_array( $values ) ) {
                $values = array_keys( $values );
                $values = implode( ',', $values );
            } ?>
            <input id="<?php echo esc_attr( $this->id ); ?>_input" type='hidden' name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $values ); ?>" <?php echo $this->get_link(); ?> />
            <script>
            jQuery(document).ready(function($) {
                "use strict";
                // Define variables
                var sortableUl = $('#<?php echo esc_attr( $this->id ); ?>_sortable');

                // Create sortable
                sortableUl.sortable()
                sortableUl.disableSelection();

                // Update values on sortstop
                sortableUl.on( "sortstop", function( event, ui ) {
                    kidsworldUpdateSortableVal();
                });

                // Toggle classes
                sortableUl.find('li').each(function() {
                    $(this).find('.kidsworld-hide-sortee').click(function() {
                        $(this).toggleClass('green red').parents('li:eq(0)').toggleClass('kidsworld-hide');
                    });
                })
                // Update Sortable when hidding/showing items
                $('#<?php echo esc_attr( $this->id ); ?>_sortable span.kidsworld-hide-sortee').click(function() {
                    kidsworldUpdateSortableVal();
                });
                // Used to update the sortable input value
                function kidsworldUpdateSortableVal() {
                    var values = [];
                    sortableUl.find('li').each(function() {
                        if ( ! $(this).hasClass('kidsworld-hide') ) {
                            values.push( $(this).attr('data-value') );
                        }
                    });
                    $('#<?php echo esc_attr( $this->id ); ?>_input').val(values).trigger('change');
                }
            });
            </script>
            <?php
        }
    }





    class kidsworld_Customize_Buttontab_Control extends WP_Customize_Control {
        public $type = 'buttontab';

        public function enqueue() {
            wp_enqueue_script( 'jquery-ui-button' );
        }

        protected function render() {
            $id    = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', esc_attr( $this->id ) ) );
            $class = 'customize-control customize-control-buttonset ';

            ?><li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
                <?php $this->render_content(); ?>
            </li><?php
        }

        protected function render_content() {
            if ( empty( $this->choices ) ) {
                return;
            }

            $name = '_customize-radio-' . esc_attr( $this->id );
            $kidsworld_button_count = 1;
            ?>
            <div id="input_<?php echo esc_attr( $this->id ); ?>" class="kidsworld-control-buttonset">

                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif; ?>

                <div class="kidsworld_buttonset">
                    <?php
                        foreach ( $this->choices as $value => $label ) : ?>
                            <input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $this->id . $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                            <label for="<?php echo esc_attr( $this->id ) . $value; ?>" class="bt_count<?php echo $kidsworld_button_count; ?>">
                                <?php echo esc_html( $label ); ?>
                            </label>
                            <?php
                            $kidsworld_button_count++;

                        endforeach;
                    ?>
                    <div class="clear"></div>
                </div>

            </div>
        <?php
        }
    }

    class kidsworld_Customize_RevSlider_Control extends WP_Customize_Control {

        public function render_content() {

            $kidsworld_revslider_results = '';

            if (class_exists('RevSlider')) {
                $kidsworld_revslider_theslider     = new RevSlider();
                $kidsworld_revslider_arrSliders = $kidsworld_revslider_theslider->getArrSliders();
                $arrA     = array();
                $arrT     = array();
                foreach($kidsworld_revslider_arrSliders as $slider){
                    $arrA[]     = $slider->getAlias();
                    $arrT[]     = $slider->getTitle();
                }
                if($arrA && $arrT){
                    $kidsworld_revslider_results = array_combine($arrA, $arrT);
                }               
               
            }        

            if(!empty($kidsworld_revslider_results)) { ?>
                    <label>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                        <select name="<?php echo esc_attr($this->id); ?>" id="<?php echo esc_attr($this->id); ?>" <?php $this->link(); ?>>
                        <option value="none">Select</option>
                        <?php
                            foreach ( $kidsworld_revslider_results as $rev_alias => $rev_title ) {
                                echo '<option value="' . esc_attr( $rev_alias ) . '"' . selected( esc_attr( $this->value() ), $rev_alias, false ) . '>' . esc_html( $rev_title ) . '</option>';
                            }
                            ?>
                        </select>
                    </label>
                <?php
            } else { ?>
                <p><?php echo esc_html__('Note: Please create revolution slider to view list of all revolution slider(s) name from WordPress Admin > Revolution Slider','kids-world'); ?></p>
            <?php }
        }
    }


   
    class kidsworld_Customize_Sidebar_Control extends WP_Customize_Control {

        private $posts = false;

        public function __construct($manager, $id, $args = array(), $options = array()) {
            $postargs = wp_parse_args($options, array('numberposts' => '100'));
            $this->posts = get_posts($postargs);

            parent::__construct( $manager, $id, $args );
        }

        public function render_content() {

            global $post;
            $post_id = $post;
            if (is_object($post_id)) {
                $post_id = $post_id->ID;
            }
            $kidsworld_selected_sidebar = get_post_meta($post_id, 'sbg_selected_sidebar', true);
            if(!is_array($kidsworld_selected_sidebar)){
                $tmp = $kidsworld_selected_sidebar; 
                $kidsworld_selected_sidebar = array(); 
                $kidsworld_selected_sidebar[0] = $tmp;
            }
            $kidsworld_selected_sidebar_replacement = get_post_meta($post_id, 'sbg_selected_sidebar_replacement', true);
            if(!is_array($kidsworld_selected_sidebar_replacement)){
                $tmp = $kidsworld_selected_sidebar_replacement; 
                $kidsworld_selected_sidebar_replacement = array(); 
                $kidsworld_selected_sidebar_replacement[0] = $tmp;
            }

            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span> <?php
               global $wp_registered_sidebars;
                //var_dump($wp_registered_sidebars);        
               ?>
                    
                    <select name="sidebar_generator" style="display: none;" >
                        <option value="0"<?php if($kidsworld_selected_sidebar == ''){ echo " selected";} ?>>WP Default Sidebar</option>
                    <?php
                    $sidebars = $wp_registered_sidebars;// sidebar_generator::get_sidebars();
                    if(is_array($sidebars) && !empty($sidebars)){
                        foreach($sidebars as $sidebar){
                            if($kidsworld_selected_sidebar == $sidebar['id']){
                                echo "<option value='{$sidebar['id']}' selected>{$sidebar['name']}</option>\n";
                            }else{
                                echo "<option value='{$sidebar['id']}'>{$sidebar['name']}</option>\n";
                            }
                        }
                    }
                    ?>
                    </select>
                    <select id="sidebar_generator_replacement" <?php $this->link(); ?> >
                        
                    <?php
                    
                    $kidsworld_sidebar_replacements = $wp_registered_sidebars;//sidebar_generator::get_sidebars();
                    if(is_array($kidsworld_sidebar_replacements) && !empty($kidsworld_sidebar_replacements)){
                        foreach($kidsworld_sidebar_replacements as $sidebar){
                            if($kidsworld_selected_sidebar_replacement == $sidebar['id']){
                                echo "<option value='{$sidebar['id']}' selected>{$sidebar['name']}</option>\n";
                            }else{
                                echo "<option value='{$sidebar['id']}'>{$sidebar['name']}</option>\n";
                            }
                        }
                    }
                    ?>
                    </select> 
                
            </label>
                <?php
        }
    }


} // kidsworld_add_customizer_custom_controls function end

add_action( 'customize_register', 'kidsworld_add_customizer_custom_controls' );