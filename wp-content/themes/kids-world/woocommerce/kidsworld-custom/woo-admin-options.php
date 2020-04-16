<?php 

// Create custom ptions in woocommerce general settings page

add_filter('woocommerce_general_settings','kidsworld_woocommerce_page_settings_filter');

if (!function_exists('kidsworld_woocommerce_page_settings_filter')) {

    function kidsworld_woocommerce_page_settings_filter($options) { 

    	for($i = 1; $i<101; $i++) { $kidsworld_one_to_hundred_count[$i] = $i; }	

        $kidsworld_two_to_five =  array (
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5'
                );

        $kidsworld_woo_shop_layout =  array(
            "layout-full-width" => esc_html__( 'Full Width', 'kids-world' ),
            "layout-sidebar-right" => esc_html__( 'Sidebar Right', 'kids-world' ),
            "layout-sidebar-left" => esc_html__( 'Sidebar Left', 'kids-world' )            
        );

        $options[] = array(
            'name' => esc_html__('Custom: General Options', 'kids-world') . ' ----------------------------------------------------',
            'type' => 'title',      
            'id'   => 'kidsworld_woo_general_options'
        );

        $options[] = array(
                'name' => esc_html__('Cart Icon Below Logo', 'kids-world'),
                'desc' => "",
                'id' => 'kidsworld_woo_cart_icon_onoff',            
                'desc' => esc_html__('Enable cart icon below logo in header section', 'kids-world'),
                'std' => '1',
                'type' => 'checkbox'            
        );
        

        $options[] = array(
            
                'type' => 'sectionend',
                'id' => 'column_options'
        );

    	$options[] = array(
    		'name' => esc_html__('Custom: Shop Page Options', 'kids-world'),
            'type' => 'title',      
            'id'   => 'kidsworld_woo_shop_page_options'
    	);
        $options[] = array(
                'name' => esc_html__('Sort by Default Menu', 'kids-world'),
                'desc' => "",
                'id' => 'kidsworld_woo_sort_by_default_menu_onoff',            
                'desc' => esc_html__('Disable sort by default,name, price, date etc. dropdown menu', 'kids-world'),
                'std' => '0',
                'type' => 'checkbox'            
        );
        $options[] = array(
                'name' => esc_html__('Products per Page menu', 'kids-world'),
                'desc' => "",
                'id' => 'kidsworld_woo_show_number_of_product_menu_onoff',            
                'desc' => esc_html__('Disable show 12,24,36 products dropdown menu', 'kids-world'),
                'std' => '0',
                'type' => 'checkbox'            
        );

        $options[] = array(
            'name' => esc_html__('Shop Layout', 'kids-world'),
            'desc' => '',
            'id' => 'kidsworld_woo_shop_page_layout',
            'css' => 'min-width:175px;',
            'std' => 'layout-full-width',
            'desc_tip' => esc_html__('Select layout for Shop page', 'kids-world'),
            'type' => 'select',
            'options' => $kidsworld_woo_shop_layout           
        );

        $options[] = array(
    		'name' => esc_html__('How Many Products Per Page?', 'kids-world'),            
            'id' => 'kidsworld_show_product_per_page',            
            'desc_tip' => esc_html__('Enter number of products to display per page', 'kids-world'),
            'std' => '12',
            'css' => 'width:50px;',
            'type' => 'text'            
    	);

        $options[] = array(
            'name' => esc_html__('Products Column', 'kids-world'),
            'desc' => '',
            'id' => 'kidsworld_woo_shop_p_column',
            'css' => 'min-width:175px;',
            'std' => '4',
            'desc_tip' => esc_html__('Select column number to display products in shop page', 'kids-world'),
            'type' => 'select',
            'options' => $kidsworld_two_to_five
        );

        $options[] = array(
            'name' => esc_html__('Title Text Size (in pixels)', 'kids-world'),            
            'id' => 'kidsworld_shop_product_box_title',            
            'desc_tip' => esc_html__('Enter featured products box title text size in pixels like "22px"', 'kids-world'),
            'std' => '22px',
            'css' => 'width:80px;',
            'type' => 'text'            
        );

        $options[] = array(
            'name' => esc_html__('Price Text Size (in pixels)', 'kids-world'),
            'id' => 'kidsworld_shop_product_box_price',     
            'desc_tip' => esc_html__('Enter featured products box price text size in pixels like "18px"', 'kids-world'),
            'std' => '18px',
            'css' => 'width:80px;',
            'type' => 'text'
        );

    	$options[] = array(    
            'type' => 'sectionend',
            'id' => 'shop_page_options'
        );

    	$options[] = array(
    		'name' => esc_html__('Custom: Product Single (Overview) Page Options', 'kids-world'),
            'type' => 'title',      
            'id'   => 'kidsworld_woo_single_page_options'
    	);

        $options[] = array(
            'name' => esc_html__('Product Overview Layout', 'kids-world'),
            'desc' => '',
            'id' => 'kidsworld_woo_product_page_layout',
            'css' => 'min-width:175px;',
            'std' => 'layout-sidebar-right',
            'desc_tip' => esc_html__('Select layout for product single page', 'kids-world'),
            'type' => 'select',
            'options' => $kidsworld_woo_shop_layout           
        );

        $options[] = array(
    			'name' => esc_html__('Display Next Previous links', 'kids-world'),
                'desc' => "",
                'id' => 'kidsworld_woo_next_prev_links_options',            
                'desc' => esc_html__('Enable next previous arrows on right side beside product title', 'kids-world'),
                'std' => '1',
                'type' => 'checkbox'            
    	);

        $options[] = array(
                'name' => esc_html__('Gallery Images Column', 'kids-world'),
                'desc' => '',
                'id' => 'kidsworld_woo_single_page_gallery_thumbnails',
                'css' => 'min-width:175px;',
                'std' => '5',
                'desc_tip' => esc_html__('Select column number to display thumanail images below large image', 'kids-world'),
                'type' => 'select',
                'options' => array(
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6'
                    )
        );

    	$options[] = array(
    			'name' => esc_html__('Related Products Column', 'kids-world'),
                'desc' => '',
                'id' => 'kidsworld_woo_related_p_column',
                'css' => 'min-width:175px;',
                'std' => '4',
                'desc_tip' => esc_html__('Select column number to display Related products', 'kids-world'),
                'type' => 'select',
                'options' => $kidsworld_two_to_five
    	);
    	
    	$options[] = array(
    			'name' => esc_html__('How Many Related Items?', 'kids-world'),
                'desc' => "",
                'id' => 'kidsworld_woo_related_p_nos',
                'css' => 'min-width:175px;',
                'desc_tip' => esc_html__('How many related products you want to display in the page, below product description section?', 'kids-world'),
                'std' => '4',
                'type' => 'select',
                'options' => $kidsworld_one_to_hundred_count
    	);

        $options[] = array(
                'name' => esc_html__('Up-Sells Products Column', 'kids-world'),
                'desc' => '',
                'id' => 'kidsworld_woo_upsells_p_column',
                'css' => 'min-width:175px;',
                'std' => '4',
                'desc_tip' => esc_html__('Select column number to display Up-Sells products', 'kids-world'),
                'type' => 'select',
                'options' => $kidsworld_two_to_five
        );
        
        $options[] = array(
                'name' => esc_html__('How Many Up-Sells Items?', 'kids-world'),
                'desc' => "",
                'id' => 'kidsworld_woo_upsells_p_nos',
                'css' => 'min-width:175px;',
                'desc_tip' => esc_html__('How many Up-Sells products you want to display in the page, below product description section?', 'kids-world'),
                'std' => '4',
                'type' => 'select',
                'options' => $kidsworld_one_to_hundred_count
        );

        $options[] = array(
            'name' => esc_html__('Title Text Size (in pixels)', 'kids-world'),            
            'id' => 'kidsworld_shop_single_page_title',            
            'desc_tip' => esc_html__('Enter shop single page title text size in pixels like "27px"', 'kids-world'),
            'std' => '27px',
            'css' => 'width:80px;',
            'type' => 'text'            
        );

        $options[] = array(
            'name' => esc_html__('Single and Innter Pages Section Title Text Size (in pixels)', 'kids-world'),            
            'id' => 'kidsworld_shop_single_page_sections_title',            
            'desc_tip' => esc_html__('Enter shop single page title text size in pixels like "22px"', 'kids-world'),
            'std' => '22px',
            'css' => 'width:80px;',
            'type' => 'text'            
        );
    	
    	$options[] = array(
            
                'type' => 'sectionend',
                'id' => 'column_options'
        );

        $options[] = array(
            'name' => esc_html__('Custom: Cart Page Options', 'kids-world'),
            'type' => 'title',      
            'id'   => 'kidsworld_woo_cart_page_options'
        );

        $options[] = array(
                'name' => esc_html__('Cross-Sells Products Column', 'kids-world'),
                'desc' => '',
                'id' => 'kidsworld_woo_cross_sells_p_column',
                'css' => 'min-width:175px;',
                'std' => '4',
                'desc_tip' => esc_html__('Select column number to display Cross-Sells products', 'kids-world'),
                'type' => 'select',
                'options' => $kidsworld_two_to_five
        );
        
        $options[] = array(
                'name' => esc_html__('How Many Cross-Sells Items?', 'kids-world'),
                'desc' => "",
                'id' => 'kidsworld_woo_cross_sells_p_nos',
                'css' => 'min-width:175px;',
                'desc_tip' => esc_html__('How many Cross-Sells products you want to display in the cart page, below Calculate Shipping and Order Total tables?', 'kids-world'),
                'std' => '4',
                'type' => 'select',
                'options' => $kidsworld_one_to_hundred_count
        );

        $options[] = array(
            
                'type' => 'sectionend',
                'id' => 'column_options'
        );

        $options[] = array(
            'name' => esc_html__('Custom: Sale Badge Options', 'kids-world'),
            'type' => 'title',      
            'id'   => 'kidsworld_woo_cart_page_options'
        );


        $options[] = array(
            'name' => esc_html__('Sale Badge Background Color', 'kids-world'),            
            'id' => 'kidsworld_onsale_badge_background',            
            'desc_tip' => esc_html__('Select "sale" badge background color', 'kids-world'),
            'std' => '#d07dd2',
            'css' => 'width:50px;',
            'type' => 'color'            
        );

        $options[] = array(
            'name' => esc_html__('Sale Badge Font Color', 'kids-world'),            
            'id' => 'kidsworld_onsale_badge_font_color',            
            'desc_tip' => esc_html__('Select "sale" badge font color', 'kids-world'),
            'std' => '#ffffff',
            'css' => 'width:50px;',
            'type' => 'color'            
        );



        $options[] = array(
            
                'type' => 'sectionend',
                'id' => 'column_options'
        );
    	
    	
    	return $options;
    }

}
