<?php
/**
 * Political Campaign Theme Customizer
 *
 * @package Political Campaign
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
function political_campaign_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'political_campaign_custom_controls' );

function political_campaign_customize_register( $wp_customize ) { 

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'political_campaign_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'political_campaign_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'political_campaign_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'political-campaign' ),
		'priority' => 10,
	));

   	// Header Background color
	$wp_customize->add_setting('political_campaign_header_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'political_campaign_header_background_color', array(
		'label'    => __('Header Background Color', 'political-campaign'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('political_campaign_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','political-campaign'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'political-campaign' ),
			'center top'   => esc_html__( 'Top', 'political-campaign' ),
			'right top'   => esc_html__( 'Top Right', 'political-campaign' ),
			'left center'   => esc_html__( 'Left', 'political-campaign' ),
			'center center'   => esc_html__( 'Center', 'political-campaign' ),
			'right center'   => esc_html__( 'Right', 'political-campaign' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'political-campaign' ),
			'center bottom'   => esc_html__( 'Bottom', 'political-campaign' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'political-campaign' ),
		), 
	));

	//Topbar
	$wp_customize->add_section( 'political_campaign_topbar_section' , array(
    	'title' => __( 'Topbar Section', 'political-campaign' ),
		'panel' => 'political_campaign_panel_id'
	) );

	$wp_customize->add_setting( 'political_campaign_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'political_campaign_switch_sanitization'
    ));  
    $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','political-campaign' ),
      'section' => 'political_campaign_topbar_section'
    )));

    $wp_customize->add_setting('political_campaign_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('political_campaign_email_address',array(
		'label'	=> __('Add Email Address','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( 'support@example.com', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_topbar_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_email_icon',array(
		'default'	=> 'fas fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new political_campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_email_icon',array(
		'label'	=> __('Add Email Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_topbar_section',
		'setting'	=> 'political_campaign_email_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('political_campaign_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'political_campaign_sanitize_phone_number'
	));	
	$wp_customize->add_control('political_campaign_phone_number',array(
		'label'	=> __('Add Phone number.','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '+00 123 456 7890', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_topbar_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new political_campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_phone_icon',array(
		'label'	=> __('Add Phone Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_topbar_section',
		'setting'	=> 'political_campaign_phone_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('political_campaign_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('political_campaign_location',array(
		'label'	=> __('Add Location','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '107 bowmaan st.western', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_topbar_section',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('political_campaign_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new political_campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_location_icon',array(
		'label'	=> __('Add Location Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_topbar_section',
		'setting'	=> 'political_campaign_location_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('political_campaign_donate_now_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_donate_now_text',array(
		'label'	=> esc_html__('Add Donate Text','political-campaign'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Donate Now', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_topbar_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_donate_now_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('political_campaign_donate_now_link',array(
		'label'	=> esc_html__('Donate Now Link','political-campaign'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'https://example.com/page', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_topbar_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting('political_campaign_donate_icon',array(
		'default'	=> 'fas fa-dollar-sign',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new political_campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_donate_icon',array(
		'label'	=> __('Add 	Donate Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_topbar_section',
		'setting'	=> 'political_campaign_donate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('political_campaign_volunteer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_volunteer_text',array(
		'label'	=> esc_html__('Add Volunteer Text','political-campaign'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Become A Volunteer', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_topbar_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_volunteer_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('political_campaign_volunteer_link',array(
		'label'	=> esc_html__('Add Volunteer Link','political-campaign'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'https://example.com/page', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_topbar_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting('political_campaign_volunteer_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new political_campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_volunteer_icon',array(
		'label'	=> __('Add 	Volunteer Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_topbar_section',
		'setting'	=> 'political_campaign_volunteer_icon',
		'type'		=> 'icon'
	)));

	//Menus Settings
	$wp_customize->add_section( 'political_campaign_menu_section' , array(
    'title' => __( 'Menus Settings', 'political-campaign' ),
		'panel' => 'political_campaign_panel_id'
	) );

	$wp_customize->add_setting('political_campaign_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_navigation_menu_font_weight',array(
        'default' => 500,
        'transport' => 'refresh',
        'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','political-campaign'),
        'section' => 'political_campaign_menu_section',
        'choices' => array(
        	'100' => __('100','political-campaign'),
            '200' => __('200','political-campaign'),
            '300' => __('300','political-campaign'),
            '400' => __('400','political-campaign'),
            '500' => __('500','political-campaign'),
            '600' => __('600','political-campaign'),
            '700' => __('700','political-campaign'),
            '800' => __('800','political-campaign'),
            '900' => __('900','political-campaign'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('political_campaign_menu_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menus Text Transform','political-campaign'),
		'choices' => array(
            'Uppercase' => __('Uppercase','political-campaign'),
            'Capitalize' => __('Capitalize','political-campaign'),
            'Lowercase' => __('Lowercase','political-campaign'),
        ),
		'section'=> 'political_campaign_menu_section',
	));

	$wp_customize->add_setting('political_campaign_menus_item_style',array(
	    'default' => '',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_menus_item_style',array(
	    'type' => 'select',
	    'section' => 'political_campaign_menu_section',
			'label' => __('Menu Item Hover Style','political-campaign'),
			'choices' => array(
	            'None' => __('None','political-campaign'),
	            'Zoom In' => __('Zoom In','political-campaign'),
        ),
	) );

	$wp_customize->add_setting('political_campaign_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'political_campaign_header_menus_color', array(
		'label'    => __('Menus Color', 'political-campaign'),
		'section'  => 'political_campaign_menu_section',
	)));

	$wp_customize->add_setting('political_campaign_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'political_campaign_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'political-campaign'),
		'section'  => 'political_campaign_menu_section',
	)));

	$wp_customize->add_setting('political_campaign_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'political_campaign_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'political-campaign'),
		'section'  => 'political_campaign_menu_section',
	)));

	$wp_customize->add_setting('political_campaign_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'political_campaign_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'political-campaign'),
		'section'  => 'political_campaign_menu_section',
	)));

	//Slider
	$wp_customize->add_section( 'political_campaign_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'political-campaign' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/political-campaign-wordpress-theme/">GET PRO</a>','political-campaign'),
		'panel' => 'political_campaign_panel_id'
	) );

	$wp_customize->add_setting( 'political_campaign_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'political_campaign_switch_sanitization'
    ));  
    $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','political-campaign' ),
      'section' => 'political_campaign_slidersettings'
    )));

  	$wp_customize->add_setting('political_campaign_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'political_campaign_sanitize_choices'
	) );
	$wp_customize->add_control('political_campaign_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','political-campaign'),
        'section' => 'political_campaign_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','political-campaign'),
            'Advance slider' => __('Advance slider','political-campaign'),
        ),
	));

	$wp_customize->add_setting('political_campaign_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','political-campaign'),
		'section'=> 'political_campaign_slidersettings',
		'type'=> 'text',
		'active_callback' => 'political_campaign_advance_slider'
	));

     //Selective Refresh
    $wp_customize->selective_refresh->add_partial('political_campaign_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'political_campaign_customize_partial_political_campaign_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'political_campaign_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'political_campaign_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'political_campaign_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'political-campaign' ),
			'description' => __('Slider image size (1400 x 550)','political-campaign'),
			'section'  => 'political_campaign_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'political_campaign_default_slider'
		) );
	}

	$wp_customize->add_setting('political_campaign_slider_button_text',array(
		'default'=> 'SEE MORE DETAIL',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( 'SEE MORE DETAIL', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_slidersettings',
		'type'=> 'text',
		'active_callback' => 'political_campaign_default_slider'
	));

	$wp_customize->add_setting('political_campaign_slider_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('political_campaign_slider_button_link',array(
		'label'	=> esc_html__('Add Button Link','political-campaign'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example-info.com', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_slidersettings',
		'type'=> 'url'
	));

    //Slider content padding
    $wp_customize->add_setting('political_campaign_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','political-campaign'),
		'description'	=> __('Enter a value in %. Example:20%','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_slidersettings',
		'type'=> 'text',
		'active_callback' => 'political_campaign_default_slider'
	));

	$wp_customize->add_setting('political_campaign_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','political-campaign'),
		'description'	=> __('Enter a value in %. Example:20%','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_slidersettings',
		'type'=> 'text',
		'active_callback' => 'political_campaign_default_slider'
	));

	//content layout
	$wp_customize->add_setting('political_campaign_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control(new political_campaign_Image_Radio_Control($wp_customize, 'political_campaign_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','political-campaign'),
        'section' => 'political_campaign_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),
    	'active_callback' => 'political_campaign_default_slider'
	)));

    //Slider excerpt
	$wp_customize->add_setting( 'political_campaign_slider_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'political_campaign_sanitize_number_range'
	) );
	$wp_customize->add_control( 'political_campaign_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','political-campaign' ),
		'section'     => 'political_campaign_slidersettings',
		'type'        => 'range',
		'settings'    => 'political_campaign_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'political_campaign_default_slider'
	) );

	$wp_customize->add_setting( 'political_campaign_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'political_campaign_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','political-campaign'),
		'section' => 'political_campaign_slidersettings',
		'type'  => 'text',
		'active_callback' => 'political_campaign_default_slider'
	) );

	//Slider height
	$wp_customize->add_setting('political_campaign_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_slider_height',array(
		'label'	=> __('Slider Height','political-campaign'),
		'description'	=> __('Specify the slider height (px).','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_slidersettings',
		'type'=> 'text',
		'active_callback' => 'political_campaign_default_slider'
	));

	//Opacity
	$wp_customize->add_setting('political_campaign_slider_opacity_color',array(
      'default'              => 0.7,
      'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control( 'political_campaign_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','political-campaign' ),
		'section'     => 'political_campaign_slidersettings',
		'type'        => 'select',
		'settings'    => 'political_campaign_slider_opacity_color',
		'choices' => array(
			'0' =>  esc_attr('0','political-campaign'),
			'0.1' =>  esc_attr('0.1','political-campaign'),
			'0.2' =>  esc_attr('0.2','political-campaign'),
			'0.3' =>  esc_attr('0.3','political-campaign'),
			'0.4' =>  esc_attr('0.4','political-campaign'),
			'0.5' =>  esc_attr('0.5','political-campaign'),
			'0.6' =>  esc_attr('0.6','political-campaign'),
			'0.7' =>  esc_attr('0.7','political-campaign'),
			'0.8' =>  esc_attr('0.8','political-campaign'),
			'0.9' =>  esc_attr('0.9','political-campaign')
	),'active_callback' => 'political_campaign_default_slider'
	));

	$wp_customize->add_setting( 'political_campaign_slider_image_overlay',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'political_campaign_switch_sanitization'
  	));
  	$wp_customize->add_control( new political_campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_slider_image_overlay',array(
    	'label' => esc_html__( 'Slider Image Overlay','political-campaign' ),
    	'section' => 'political_campaign_slidersettings',
    	'active_callback' => 'political_campaign_default_slider'
  	)));

  	$wp_customize->add_setting('political_campaign_slider_image_overlay_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'political_campaign_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'political-campaign'),
		'section'  => 'political_campaign_slidersettings',
		'active_callback' => 'political_campaign_default_slider'
	)));

	$wp_customize->add_setting( 'political_campaign_slider_arrow_hide_show',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'political_campaign_switch_sanitization'
	));
	$wp_customize->add_control( new political_campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_slider_arrow_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Arrows','political-campaign' ),
		'section' => 'political_campaign_slidersettings',
		'active_callback' => 'political_campaign_default_slider'
	))); 

	$wp_customize->add_setting('political_campaign_slider_prev_icon',array(
		'default'	=> 'fas fa-angle-left',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new political_campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_slider_prev_icon',array(
		'label'	=> __('Add Slider Prev Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_slidersettings',
		'setting'	=> 'political_campaign_slider_prev_icon',
		'type'		=> 'icon',
		'active_callback' => 'political_campaign_default_slider'
	)));

	$wp_customize->add_setting('political_campaign_slider_next_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new political_campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_slider_next_icon',array(
		'label'	=> __('Add Slider Next Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_slidersettings',
		'setting'	=> 'political_campaign_slider_next_icon',
		'type'		=> 'icon',
		'active_callback' => 'political_campaign_default_slider'
	)));

	//feature Section
	$wp_customize->add_section('political_campaign_feature_section', array(
		'title'       => __('Feature Section', 'political-campaign'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','political-campaign'),
		'priority'    => null,
		'panel'       => 'political_campaign_panel_id',
	));

	$wp_customize->add_setting('political_campaign_feature_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_feature_text',array(
		'description' => __('<p>1. More options for feature section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for feature section.</p>','political-campaign'),
		'section'=> 'political_campaign_feature_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('political_campaign_feature_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_feature_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=political_campaign_guide') ." '>More Info</a>",
		'section'=> 'political_campaign_feature_section',
		'type'=> 'hidden'
	));

	//About  us Section
	$wp_customize->add_section('political_campaign_about_section', array(
		'title'       => __('About Us Section', 'political-campaign'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','political-campaign'),
		'priority'    => null,
		'panel'       => 'political_campaign_panel_id',
	));

	$wp_customize->add_setting('political_campaign_about_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_about_text',array(
		'description' => __('<p>1. More options for about us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for about us section.</p>','political-campaign'),
		'section'=> 'political_campaign_about_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('political_campaign_about_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_about_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=political_campaign_guide') ." '>More Info</a>",
		'section'=> 'political_campaign_about_section',
		'type'=> 'hidden'
	));

	//Contribute Section
	$wp_customize->add_section('political_campaign_contribute_section', array(
		'title'       => __('Contribute Section', 'political-campaign'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','political-campaign'),
		'priority'    => null,
		'panel'       => 'political_campaign_panel_id',
	));

	$wp_customize->add_setting('political_campaign_contribute_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_contribute_text',array(
		'description' => __('<p>1. More options for contribute section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for contribute section.</p>','political-campaign'),
		'section'=> 'political_campaign_contribute_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('political_campaign_contribute_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_contribute_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=political_campaign_guide') ." '>More Info</a>",
		'section'=> 'political_campaign_contribute_section',
		'type'=> 'hidden'
	));

	//Campaign Section
	$wp_customize->add_section('political_campaign_Campaign_priciples_section',array(
		'title'	=> __('Campaign Priciples Section','political-campaign'),
		'description' => __('For more options of campaign section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/political-campaign-wordpress-theme/">GET PRO</a>','political-campaign'),
		'panel' => 'political_campaign_panel_id',
	));

	$wp_customize->add_setting( 'political_campaign_Campaign_small_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'political_campaign_Campaign_small_title', array(
		'label'    => __( 'Add Section Small Title', 'political-campaign' ),
		'input_attrs' => array(
            'placeholder' => __( 'Policy Positions', 'political-campaign' ),
        ),
		'section'  => 'political_campaign_Campaign_priciples_section',
		'type'     => 'text'
	) );

	$wp_customize->add_setting('political_campaign_Campaign_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_Campaign_section_title',array(
		'label'	=> __('Add Section Title','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( 'Campaign Priciples', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_Campaign_priciples_section',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('political_campaign_Campaign_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'political_campaign_sanitize_choices',
	));
	$wp_customize->add_control('political_campaign_Campaign_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Campaign Principle Section','political-campaign'),
		'section' => 'political_campaign_Campaign_priciples_section',
	));

	//testimonial Section
	$wp_customize->add_section('political_campaign_testimonial_section', array(
		'title'       => __('Testimonial Section', 'political-campaign'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','political-campaign'),
		'priority'    => null,
		'panel'       => 'political_campaign_panel_id',
	));

	$wp_customize->add_setting('political_campaign_testimonial_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_testimonial_text',array(
		'description' => __('<p>1. More options for testimonial section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonial section.</p>','political-campaign'),
		'section'=> 'political_campaign_testimonial_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('political_campaign_testimonial_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_testimonial_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=political_campaign_guide') ." '>More Info</a>",
		'section'=> 'political_campaign_testimonial_section',
		'type'=> 'hidden'
	));

	//Policy Section
	$wp_customize->add_section('political_campaign_policy_section', array(
		'title'       => __('Policy Section', 'political-campaign'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','political-campaign'),
		'priority'    => null,
		'panel'       => 'political_campaign_panel_id',
	));

	$wp_customize->add_setting('political_campaign_policy_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_policy_text',array(
		'description' => __('<p>1. More options for policy section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for policy section.</p>','political-campaign'),
		'section'=> 'political_campaign_policy_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('political_campaign_policy_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_policy_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=political_campaign_guide') ." '>More Info</a>",
		'section'=> 'political_campaign_policy_section',
		'type'=> 'hidden'
	));

	//team Section
	$wp_customize->add_section('political_campaign_team_section', array(
		'title'       => __('Team Section', 'political-campaign'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','political-campaign'),
		'priority'    => null,
		'panel'       => 'political_campaign_panel_id',
	));

	$wp_customize->add_setting('political_campaign_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_team_text',array(
		'description' => __('<p>1. More options for team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for team section.</p>','political-campaign'),
		'section'=> 'political_campaign_team_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('political_campaign_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=political_campaign_guide') ." '>More Info</a>",
		'section'=> 'political_campaign_team_section',
		'type'=> 'hidden'
	));

	//video-Recordes Section
	$wp_customize->add_section('political_campaign_video_recordes_section', array(
		'title'       => __('Video Recordes Section', 'political-campaign'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','political-campaign'),
		'priority'    => null,
		'panel'       => 'political_campaign_panel_id',
	));

	$wp_customize->add_setting('political_campaign_video_recordes_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_video_recordes_text',array(
		'description' => __('<p>1. More options for video recordes section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for video recordes section.</p>','political-campaign'),
		'section'=> 'political_campaign_video_recordes_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('political_campaign_video_recordes_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_video_recordes_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=political_campaign_guide') ." '>More Info</a>",
		'section'=> 'political_campaign_video_recordes_section',
		'type'=> 'hidden'
	)); 

	//latest news Section
	$wp_customize->add_section('political_campaign_latest_news_section', array(
		'title'       => __('Latest News Section', 'political-campaign'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','political-campaign'),
		'priority'    => null,
		'panel'       => 'political_campaign_panel_id',
	));

	$wp_customize->add_setting('political_campaign_latest_news_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_latest_news_text',array(
		'description' => __('<p>1. More options for latest news section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for latest news section.</p>','political-campaign'),
		'section'=> 'political_campaign_latest_news_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('political_campaign_latest_news_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_latest_news_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=political_campaign_guide') ." '>More Info</a>",
		'section'=> 'political_campaign_latest_news_section',
		'type'=> 'hidden'
	)); 

	//partners Section
	$wp_customize->add_section('political_campaign_partners_section', array(
		'title'       => __('Partners Section', 'political-campaign'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','political-campaign'),
		'priority'    => null,
		'panel'       => 'political_campaign_panel_id',
	));

	$wp_customize->add_setting('political_campaign_partners_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_partners_text',array(
		'description' => __('<p>1. More options for partners section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for partners section.</p>','political-campaign'),
		'section'=> 'political_campaign_partners_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('political_campaign_partners_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_partners_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=political_campaign_guide') ." '>More Info</a>",
		'section'=> 'political_campaign_partners_section',
		'type'=> 'hidden'
	)); 

	//Footer Text
	$wp_customize->add_section('political_campaign_footer',array(
		'title'	=> esc_html__('Footer Settings','political-campaign'),
		'description' => __('For more options of footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/political-campaign-wordpress-theme/">GET PRO</a>','political-campaign'),
		'panel' => 'political_campaign_panel_id',
	));	

	$wp_customize->add_setting( 'political_campaign_footer_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'political_campaign_switch_sanitization'
    ));
    $wp_customize->add_control( new political_campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_footer_hide_show',array(
      'label' => esc_html__( 'Show / Hide Footer','political-campaign' ),
      'section' => 'political_campaign_footer'
    )));

 	// font size
	$wp_customize->add_setting('political_campaign_button_footer_font_size',array(
		'default'=> 30,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_button_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','political-campaign'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'political_campaign_footer',
	));

	$wp_customize->add_setting('political_campaign_button_footer_heading_letter_spacing',array(
		'default'=> 1,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_button_footer_heading_letter_spacing',array(
		'label'	=> __('Heading Letter Spacing','political-campaign'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'political_campaign_footer',
	));

	// text trasform
	$wp_customize->add_setting('political_campaign_button_footer_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_button_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','political-campaign'),
		'choices' => array(
      'Uppercase' => __('Uppercase','political-campaign'),
      'Capitalize' => __('Capitalize','political-campaign'),
      'Lowercase' => __('Lowercase','political-campaign'),
    ),
		'section'=> 'political_campaign_footer',
	));

	$wp_customize->add_setting('political_campaign_footer_heading_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_footer_heading_weight',array(
        'type' => 'select',
        'label' => __('Heading Font Weight','political-campaign'),
        'section' => 'political_campaign_footer',
        'choices' => array(
        	'100' => __('100','political-campaign'),
            '200' => __('200','political-campaign'),
            '300' => __('300','political-campaign'),
            '400' => __('400','political-campaign'),
            '500' => __('500','political-campaign'),
            '600' => __('600','political-campaign'),
            '700' => __('700','political-campaign'),
            '800' => __('800','political-campaign'),
            '900' => __('900','political-campaign'),
        ),
	) );
	
	$wp_customize->add_setting('political_campaign_footer_template',array(
	  'default'	=> esc_html('political_campaign-footer-one'),
	  'sanitize_callback'	=> 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_footer_template',array(
		'label'	=> esc_html__('Footer style','political-campaign'),
		'section'	=> 'political_campaign_footer',
		'setting'	=> 'political_campaign_footer_template',
		'type' => 'select',
		'choices' => array(
		  'political_campaign-footer-one' => esc_html__('Style 1', 'political-campaign'),
		  'political_campaign-footer-two' => esc_html__('Style 2', 'political-campaign'),
		  'political_campaign-footer-three' => esc_html__('Style 3', 'political-campaign'),
		  'political_campaign-footer-four' => esc_html__('Style 4', 'political-campaign'),
		  'political_campaign-footer-five' => esc_html__('Style 5', 'political-campaign'),
		  )
	));

	$wp_customize->add_setting('political_campaign_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'political_campaign_footer_background_color', array(
		'label'    => __('Footer Background Color', 'political-campaign'),
		'section'  => 'political_campaign_footer',
	)));

	$wp_customize->add_setting('political_campaign_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'political_campaign_footer_background_image',array(
        'label' => __('Footer Background Image','political-campaign'),
        'section' => 'political_campaign_footer'
	)));

	$wp_customize->add_setting('political_campaign_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','political-campaign'),
		'section' => 'political_campaign_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'political-campaign' ),
			'center top'   => esc_html__( 'Top', 'political-campaign' ),
			'right top'   => esc_html__( 'Top Right', 'political-campaign' ),
			'left center'   => esc_html__( 'Left', 'political-campaign' ),
			'center center'   => esc_html__( 'Center', 'political-campaign' ),
			'right center'   => esc_html__( 'Right', 'political-campaign' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'political-campaign' ),
			'center bottom'   => esc_html__( 'Bottom', 'political-campaign' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'political-campaign' ),
		),
	));

	// Footer
	$wp_customize->add_setting('political_campaign_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','political-campaign'),
		'choices' => array(
            'fixed' => __('fixed','political-campaign'),
            'scroll' => __('scroll','political-campaign'),
        ),
		'section'=> 'political_campaign_footer',
	));

	$wp_customize->add_setting('political_campaign_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','political-campaign'),
        'section' => 'political_campaign_footer',
        'choices' => array(
        	'Left' => __('Left','political-campaign'),
            'Center' => __('Center','political-campaign'),
            'Right' => __('Right','political-campaign')
        ),
	) );

	$wp_customize->add_setting('political_campaign_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','political-campaign'),
        'section' => 'political_campaign_footer',
        'choices' => array(
        	'Left' => __('Left','political-campaign'),
            'Center' => __('Center','political-campaign'),
            'Right' => __('Right','political-campaign')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('political_campaign_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'political-campaign' ),
    ),
		'section'=> 'political_campaign_footer',
		'type'=> 'text'
	));

	// footer social icon
	$wp_customize->add_setting( 'political_campaign_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
  	) );
	$wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_footer_icon',array(
		'label' => esc_html__( 'Show / Hide Footer Social Icon','political-campaign' ),
		'section' => 'political_campaign_footer'
  )));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('political_campaign_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'political_campaign_Customize_partial_political_campaign_footer_text', 
	));

	$wp_customize->add_setting( 'political_campaign_copyright_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'political_campaign_switch_sanitization'
    ));
    $wp_customize->add_control( new political_campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_copyright_hide_show',array(
      'label' => esc_html__( 'Show / Hide Copyright','political-campaign' ),
      'section' => 'political_campaign_footer'
    )));

	$wp_customize->add_setting('political_campaign_copyright_background_color', array(
		'default'           => '#163D80',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'political_campaign_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'political-campaign'),
		'section'  => 'political_campaign_footer',
	)));

	$wp_customize->add_setting('political_campaign_copyright_text_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'political_campaign_copyright_text_color', array(
		'label'    => __('Copyright Text Color', 'political-campaign'),
		'section'  => 'political_campaign_footer',
	)));
	
	$wp_customize->add_setting('political_campaign_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('political_campaign_footer_text',array(
		'label'	=> esc_html__('Copyright Text','political-campaign'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_copyright_font_weight',array(
	  'default' => 400,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_copyright_font_weight',array(
	    'type' => 'select',
	    'label' => __('Copyright Font Weight','political-campaign'),
	    'section' => 'political_campaign_footer',
	    'choices' => array(
	    	'100' => __('100','political-campaign'),
	        '200' => __('200','political-campaign'),
	        '300' => __('300','political-campaign'),
	        '400' => __('400','political-campaign'),
	        '500' => __('500','political-campaign'),
	        '600' => __('600','political-campaign'),
	        '700' => __('700','political-campaign'),
	        '800' => __('800','political-campaign'),
	        '900' => __('900','political-campaign'),
    ),
	));

	$wp_customize->add_setting('political_campaign_copyright_alingment',array(
    'default' => 'center',
    'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control(new Political_Campaign_Image_Radio_Control($wp_customize, 'political_campaign_copyright_alingment', array(
    'type' => 'select',
    'label' => esc_html__('Copyright Alignment','political-campaign'),
    'section' => 'political_campaign_footer',
    'settings' => 'political_campaign_copyright_alingment',
    'choices' => array(
        'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
        'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
        'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

  $wp_customize->add_setting( 'political_campaign_hide_show_scroll',array(
  	'default' => 1,
    	'transport' => 'refresh',
    	'sanitize_callback' => 'political_campaign_switch_sanitization'
  ));  
  $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_hide_show_scroll',array(
    	'label' => esc_html__( 'Show / Hide Scroll to Top','political-campaign' ),
    	'section' => 'political_campaign_footer'
  )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('political_campaign_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'political_campaign_Customize_partial_political_campaign_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('political_campaign_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Political_Campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_footer',
		'setting'	=> 'political_campaign_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('political_campaign_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_scroll_to_top_width',array(
		'label'	=> __('Icon Width','political-campaign'),
		'description'	=> __('Enter a value in pixels Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_scroll_to_top_height',array(
		'label'	=> __('Icon Height','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'political_campaign_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'political_campaign_sanitize_number_range'
	) );
	$wp_customize->add_control( 'political_campaign_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','political-campaign' ),
		'section'     => 'political_campaign_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('political_campaign_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control(new Political_Campaign_Image_Radio_Control($wp_customize, 'political_campaign_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','political-campaign'),
        'section' => 'political_campaign_footer',
        'settings' => 'political_campaign_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post
	$wp_customize->add_panel( 'political_campaign_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'political-campaign' ),
		'panel' => 'political_campaign_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'political_campaign_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'political-campaign' ),
		'panel' => 'political_campaign_blog_post_parent_panel',
	));

	//Blog layout
	$wp_customize->add_setting('political_campaign_blog_layout_option',array(
	  'default' => 'Default',
	  'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control(new Political_Campaign_Image_Radio_Control($wp_customize, 'political_campaign_blog_layout_option', array(
	  'type' => 'select',
	  'label' => __('Blog Post Layouts','political-campaign'),
	  'section' => 'political_campaign_post_settings',
	  'choices' => array(
	      'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
	      'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
	      'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
	))));

	$wp_customize->add_setting('political_campaign_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','political-campaign'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','political-campaign'),
        'section' => 'political_campaign_post_settings',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','political-campaign'),
            'Right Sidebar' => esc_html__('Right Sidebar','political-campaign'),
            'One Column' => esc_html__('One Column','political-campaign'),
				'Three Columns' => __('Three Columns','political-campaign'),
				'Four Columns' => __('Four Columns','political-campaign'),
            'Grid Layout' => esc_html__('Grid Layout','political-campaign')
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('political_campaign_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'political_campaign_Customize_partial_political_campaign_toggle_postdate', 
	));

  	$wp_customize->add_setting('political_campaign_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Political_Campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_post_settings',
		'setting'	=> 'political_campaign_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'political_campaign_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'political_campaign_switch_sanitization'
  ) );
  $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_toggle_postdate',array(
      'label' => esc_html__( 'Show / Hide Post Date','political-campaign' ),
      'section' => 'political_campaign_post_settings'
  )));

  $wp_customize->add_setting('political_campaign_toggle_author_icon',array(
	'default'	=> 'fas fa-user',
	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Political_Campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_post_settings',
		'setting'	=> 'political_campaign_toggle_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'political_campaign_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
  ) );
  $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','political-campaign' ),
		'section' => 'political_campaign_post_settings'
  )));

  $wp_customize->add_setting('political_campaign_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Political_Campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_post_settings',
		'setting'	=> 'political_campaign_toggle_comments_icon',
		'type'		=> 'icon'
	)));


  $wp_customize->add_setting( 'political_campaign_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
  ) );
  $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','political-campaign' ),
		'section' => 'political_campaign_post_settings'
  )));

  $wp_customize->add_setting('political_campaign_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Political_Campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_post_settings',
		'setting'	=> 'political_campaign_toggle_time_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'political_campaign_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
  ) );
  $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','political-campaign' ),
		'section' => 'political_campaign_post_settings'
  )));

  $wp_customize->add_setting( 'political_campaign_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
	));
  $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','political-campaign' ),
		'section' => 'political_campaign_post_settings'
  )));

  $wp_customize->add_setting( 'political_campaign_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'political_campaign_sanitize_number_range'
	) );
	$wp_customize->add_control( 'political_campaign_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','political-campaign' ),
		'section'     => 'political_campaign_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'political_campaign_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'political_campaign_sanitize_number_range'
	) );
	$wp_customize->add_control( 'political_campaign_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','political-campaign' ),
		'section'     => 'political_campaign_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('political_campaign_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'political_campaign_sanitize_choices'
	));
  	$wp_customize->add_control('political_campaign_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','political-campaign'),
		'section'	=> 'political_campaign_post_settings',
		'choices' => array(
			'default' => __('Default','political-campaign'),
			'custom' => __('Custom Image Size','political-campaign'),
      ),
  	));

	$wp_customize->add_setting('political_campaign_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'political-campaign' ),),
		'section'=> 'political_campaign_post_settings',
		'type'=> 'text',
		'active_callback' => 'political_campaign_blog_post_featured_image_dimension'
	));

	$wp_customize->add_setting('political_campaign_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'political-campaign' ),),
		'section'=> 'political_campaign_post_settings',
		'type'=> 'text',
		'active_callback' => 'political_campaign_blog_post_featured_image_dimension'
	));

  $wp_customize->add_setting( 'political_campaign_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'political_campaign_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'political_campaign_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','political-campaign' ),
		'section'     => 'political_campaign_post_settings',
		'type'        => 'range',
		'settings'    => 'political_campaign_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('political_campaign_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','political-campaign'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','political-campaign'),
		'section'=> 'political_campaign_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('political_campaign_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','political-campaign'),
        'section' => 'political_campaign_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','political-campaign'),
            'Excerpt' => esc_html__('Excerpt','political-campaign'),
            'No Content' => esc_html__('No Content','political-campaign')
        ),
	) );

	$wp_customize->add_setting('political_campaign_blog_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_blog_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'political_campaign_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
    ));
    $wp_customize->add_control( new political_campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','political-campaign' ),
		'section' => 'political_campaign_post_settings'
    )));

	$wp_customize->add_setting( 'political_campaign_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'political_campaign_sanitize_choices'
    ));
    $wp_customize->add_control( 'political_campaign_blog_pagination_type', array(
        'section' => 'political_campaign_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'political-campaign' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'political-campaign' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'political-campaign' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'political_campaign_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'political-campaign' ),
		'panel' => 'political_campaign_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('political_campaign_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'political_campaign_Customize_partial_political_campaign_button_text', 
	));

  $wp_customize->add_setting('political_campaign_button_text',array(
		'default'=> esc_html__('Read More','political-campaign'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_button_text',array(
		'label'	=> esc_html__('Add Button Text','political-campaign'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('political_campaign_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_button_font_size',array(
		'label'	=> __('Button Font Size','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'political-campaign' ),
    ),
    'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'political_campaign_button_settings',
	));

	$wp_customize->add_setting( 'political_campaign_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'political_campaign_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'political_campaign_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','political-campaign' ),
		'section'     => 'political_campaign_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('political_campaign_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_button_padding_top_bottom',array(
		'label'	=> esc_html__('Padding Top Bottom','political-campaign'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'political-campaign' ),
        ),
		'section' => 'political_campaign_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('political_campaign_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_button_padding_left_right',array(
		'label'	=> esc_html__('Padding Left Right','political-campaign'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'political-campaign' ),
        ),
		'section' => 'political_campaign_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('political_campaign_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'political-campaign' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'political_campaign_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('political_campaign_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','political-campaign'),
		'choices' => array(
            'Uppercase' => __('Uppercase','political-campaign'),
            'Capitalize' => __('Capitalize','political-campaign'),
            'Lowercase' => __('Lowercase','political-campaign'),
        ),
		'section'=> 'political_campaign_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'political_campaign_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'political-campaign' ),
		'panel' => 'political_campaign_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('political_campaign_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'political_campaign_Customize_partial_political_campaign_related_post_title', 
	));

    $wp_customize->add_setting( 'political_campaign_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
    ) );
    $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_related_post',array(
		'label' => esc_html__( 'Show / Hide Related Post','political-campaign' ),
		'section' => 'political_campaign_related_posts_settings'
    )));

    $wp_customize->add_setting('political_campaign_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','political-campaign'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('political_campaign_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'political_campaign_sanitize_number_absint'
	));
	$wp_customize->add_control('political_campaign_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','political-campaign'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'political_campaign_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'political_campaign_sanitize_number_range'
	) );
	$wp_customize->add_control( 'political_campaign_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','political-campaign' ),
		'section'     => 'political_campaign_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'political_campaign_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Post Settings
	$wp_customize->add_section( 'political_campaign_single_posts_settings', array(
		'title' => esc_html__( 'Single Posts Settings', 'political-campaign' ),
		'panel' => 'political_campaign_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('political_campaign_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Political_Campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_single_posts_settings',
		'setting'	=> 'political_campaign_single_postdate_icon',
		'type'		=> 'icon'
	)));

  	$wp_customize->add_setting( 'political_campaign_single_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'political_campaign_switch_sanitization'
	) );
	$wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_single_postdate',array(
	    'label' => esc_html__( 'Show / Hide Date','political-campaign' ),
	   'section' => 'political_campaign_single_posts_settings'
	)));

	$wp_customize->add_setting('political_campaign_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Political_Campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_single_author_icon',array(
		'label'	=> __('Add Author Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_single_posts_settings',
		'setting'	=> 'political_campaign_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'political_campaign_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'political_campaign_switch_sanitization'
	) );
	$wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','political-campaign' ),
	    'section' => 'political_campaign_single_posts_settings'
	)));

   	$wp_customize->add_setting('political_campaign_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Political_Campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_single_posts_settings',
		'setting'	=> 'political_campaign_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'political_campaign_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'political_campaign_switch_sanitization'
	) );
	$wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','political-campaign' ),
	    'section' => 'political_campaign_single_posts_settings'
	)));

  	$wp_customize->add_setting('political_campaign_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Political_Campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_single_time_icon',array(
		'label'	=> __('Add Time Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_single_posts_settings',
		'setting'	=> 'political_campaign_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'political_campaign_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'political_campaign_switch_sanitization'
	) );

	$wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_single_time',array(
	    'label' => esc_html__( 'Show / Hide Time','political-campaign' ),
	    'section' => 'political_campaign_single_posts_settings'
	)));

	$wp_customize->add_setting( 'political_campaign_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
    ) );
   	$wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','political-campaign' ),
		'section' => 'political_campaign_single_posts_settings'
    )));

    // Single Posts Category
	$wp_customize->add_setting( 'political_campaign_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
	) );
	$wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','political-campaign' ),
		'section' => 'political_campaign_single_posts_settings'
	)));

	$wp_customize->add_setting( 'political_campaign_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
	));
  	$wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','political-campaign' ),
		'section' => 'political_campaign_single_posts_settings'
  	)));

  	$wp_customize->add_setting( 'political_campaign_single_blog_post_navigation_show_hide',array(
	    'default' => 0,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'political_campaign_switch_sanitization'
  	));
	$wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_single_blog_post_navigation_show_hide', array(
	  'label' => esc_html__( 'Show / Hide Post Navigation','political-campaign' ),
	  'section' => 'political_campaign_single_posts_settings'
  	)));

  	$wp_customize->add_setting('political_campaign_meta_single_field_separator',array(
	    'default'=> '',
	    'sanitize_callback' => 'sanitize_text_field'
  	));
  	$wp_customize->add_control('political_campaign_meta_single_field_separator',array(
	    'label' => __('Add Meta Separator','political-campaign'),
	    'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','political-campaign'),
	    'section'=> 'political_campaign_single_posts_settings',
	    'type'=> 'text'
  	));

	//navigation text
	$wp_customize->add_setting('political_campaign_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_single_posts_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_single_posts_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('political_campaign_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','political-campaign'),
		'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'political-campaign' ),
    	),
		'section'=> 'political_campaign_single_posts_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('political_campaign_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_single_posts_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','political-campaign'),
		'description'	=> __('Enter a value in %. Example:50%','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_single_posts_settings',
		'type'=> 'text'
	));

	// Grid layout setting
	$wp_customize->add_section( 'political_campaign_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'political-campaign' ),
		'panel' => 'political_campaign_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('political_campaign_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Political_Campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_grid_layout_settings',
		'setting'	=> 'political_campaign_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'political_campaign_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'political_campaign_switch_sanitization'
    ) );
    $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_grid_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','political-campaign' ),
        'section' => 'political_campaign_grid_layout_settings'
    )));

	$wp_customize->add_setting('political_campaign_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Political_Campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_grid_author_icon',array(
		'label'	=> __('Add Author Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_grid_layout_settings',
		'setting'	=> 'political_campaign_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'political_campaign_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
    ) );
    $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','political-campaign' ),
		'section' => 'political_campaign_grid_layout_settings'
    )));

    $wp_customize->add_setting('political_campaign_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Political_Campaign_Fontawesome_Icon_Chooser(
        $wp_customize,'political_campaign_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','political-campaign'),
		'transport' => 'refresh',
		'section'	=> 'political_campaign_grid_layout_settings',
		'setting'	=> 'political_campaign_grid_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'political_campaign_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
    ) );
    $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','political-campaign' ),
		'section' => 'political_campaign_grid_layout_settings'
    )));

	$wp_customize->add_setting('political_campaign_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','political-campaign'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','political-campaign'),
		'section'=> 'political_campaign_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_grid_button_text',array(
		'default'=> esc_html__('Read More','political-campaign'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','political-campaign'),
		'input_attrs' => array(
        'placeholder' => esc_html__( 'Read More', 'political-campaign' ),
      ),
		'section'=> 'political_campaign_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_grid_layout_settings',
		'type'=> 'text'
	));

	 $wp_customize->add_setting( 'political_campaign_grid_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'political_campaign_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'political_campaign_grid_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','political-campaign' ),
		'section'     => 'political_campaign_grid_layout_settings',
		'type'        => 'range',
		'settings'    => 'political_campaign_grid_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

  	$wp_customize->add_setting('political_campaign_display_grid_posts_settings',array(
	    'default' => 'Into Blocks',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_display_grid_posts_settings',array(
	    'type' => 'select',
	    'label' => __('Display Grid Posts','political-campaign'),
	    'section' => 'political_campaign_grid_layout_settings',
	    'choices' => array(
	    	'Into Blocks' => __('Into Blocks','political-campaign'),
	      	'Without Blocks' => __('Without Blocks','political-campaign')
		),
	) );

	//Others Settings
	$wp_customize->add_panel( 'political_campaign_others_panel', array(
		'title' => esc_html__( 'Others Settings', 'political-campaign' ),
		'panel' => 'political_campaign_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'political_campaign_left_right', array(
    	'title' => esc_html__('General Settings', 'political-campaign'),
		'panel' => 'political_campaign_others_panel'
	) );

	$wp_customize->add_setting('political_campaign_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control(new Political_Campaign_Image_Radio_Control($wp_customize, 'political_campaign_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','political-campaign'),
        'description' => esc_html__('Here you can change the width layout of Website.','political-campaign'),
        'section' => 'political_campaign_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('political_campaign_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','political-campaign'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','political-campaign'),
        'section' => 'political_campaign_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','political-campaign'),
            'Right_Sidebar' => esc_html__('Right Sidebar','political-campaign'),
            'One_Column' => esc_html__('One Column','political-campaign')
        ),
	) );

	$wp_customize->add_setting( 'political_campaign_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
	  ) );
	$wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_single_page_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','political-campaign' ),
		'section' => 'political_campaign_left_right'
	  )));

    //Wow Animation
	$wp_customize->add_setting( 'political_campaign_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'political_campaign_switch_sanitization'
  	));
  	$wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_animation',array(
      'label' => esc_html__( 'Show / Hide Animations','political-campaign' ),
      'description' => __('Here you can disable overall site animation effect','political-campaign'),
	    'section' => 'political_campaign_left_right'
  	)));

    // Pre-Loader
	$wp_customize->add_setting( 'political_campaign_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'political_campaign_switch_sanitization'
    ) );
    $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_loader_enable',array(
        'label' => esc_html__( 'Show / Hide Pre-Loader','political-campaign' ),
        'section' => 'political_campaign_left_right'
    )));

	$wp_customize->add_setting('political_campaign_preloader_bg_color', array(
		'default'           => '#E22B25',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'political_campaign_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'political-campaign'),
		'section'  => 'political_campaign_left_right',
	)));

	$wp_customize->add_setting('political_campaign_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'political_campaign_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'political-campaign'),
		'section'  => 'political_campaign_left_right',
	)));

	$wp_customize->add_setting('political_campaign_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'political_campaign_preloader_bg_img',array(
        'label' => __('Preloader Background Image','political-campaign'),
        'section' => 'political_campaign_left_right'
	)));

    //404 Page Setting
	$wp_customize->add_section('political_campaign_404_page',array(
		'title'	=> __('404 Page Settings','political-campaign'),
		'panel' => 'political_campaign_others_panel',
	));	

	$wp_customize->add_setting('political_campaign_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('political_campaign_404_page_title',array(
		'label'	=> __('Add Title','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('political_campaign_404_page_content',array(
		'label'	=> __('Add Text','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_404_page_button_text',array(
		'label'	=> __('Add Button Text','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('political_campaign_no_results_page',array(
		'title'	=> __('No Results Page Settings','political-campaign'),
		'panel' => 'political_campaign_others_panel',
	));	

	$wp_customize->add_setting('political_campaign_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('political_campaign_no_results_page_title',array(
		'label'	=> __('Add Title','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('political_campaign_no_results_page_content',array(
		'label'	=> __('Add Text','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('political_campaign_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','political-campaign'),
		'panel' => 'political_campaign_others_panel',
	));

	$wp_customize->add_setting('political_campaign_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_social_icon_padding',array(
		'label'	=> __('Icon Padding','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_social_icon_width',array(
		'label'	=> __('Icon Width','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_social_icon_height',array(
		'label'	=> __('Icon Height','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_social_icon_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('political_campaign_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','political-campaign'),
		'panel' => 'political_campaign_others_panel',
	));

    $wp_customize->add_setting('political_campaign_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'political_campaign_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'political-campaign'),
		'section'  => 'political_campaign_responsive_media',
	)));

	$wp_customize->add_setting( 'political_campaign_resp_slider_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
	));  
	$wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_resp_slider_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider','political-campaign' ),
		'section' => 'political_campaign_responsive_media'
	)));

	$wp_customize->add_setting( 'political_campaign_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
	));  
	$wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_sidebar_hide_show',array(
		'label' => esc_html__( 'Show / Hide Sidebar','political-campaign' ),
		'section' => 'political_campaign_responsive_media'
	)));

	$wp_customize->add_setting( 'political_campaign_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
	));  
	$wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_resp_scroll_top_hide_show',array(
		'label' => esc_html__( 'Show / Hide Scroll To Top','political-campaign' ),
		'section' => 'political_campaign_responsive_media'
	)));

  //Woocommerce settings
	$wp_customize->add_section('political_campaign_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'political-campaign'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    //Shop Page Featured Image
	$wp_customize->add_setting( 'political_campaign_shop_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'political_campaign_sanitize_number_range'
	) );
	$wp_customize->add_control( 'political_campaign_shop_featured_image_border_radius', array(
		'label'       => esc_html__( 'Shop Page Featured Image Border Radius','political-campaign' ),
		'section'     => 'political_campaign_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'political_campaign_shop_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'political_campaign_sanitize_number_range'
	) );
	$wp_customize->add_control( 'political_campaign_shop_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Shop Page Featured Image Box Shadow','political-campaign' ),
		'section'     => 'political_campaign_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'political_campaign_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'political_campaign_customize_partial_political_campaign_woocommerce_shop_page_sidebar', ) );

    // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'political_campaign_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
    ) );
    $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','political-campaign' ),
		'section' => 'political_campaign_woocommerce_section'
    )));

    $wp_customize->add_setting('political_campaign_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','political-campaign'),
        'section' => 'political_campaign_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','political-campaign'),
            'Right Sidebar' => __('Right Sidebar','political-campaign'),
        ),
	) );

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'political_campaign_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'political_campaign_customize_partial_political_campaign_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'political_campaign_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'political_campaign_switch_sanitization'
	  ) );
	  $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','political-campaign' ),
		'section' => 'political_campaign_woocommerce_section'
	  )));

 	$wp_customize->add_setting('political_campaign_single_product_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','political-campaign'),
        'section' => 'political_campaign_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','political-campaign'),
            'Right Sidebar' => __('Right Sidebar','political-campaign'),
        ),
	) );

	//Products padding
	$wp_customize->add_setting('political_campaign_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'political_campaign_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'political_campaign_sanitize_number_range'
	) );
	$wp_customize->add_control( 'political_campaign_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','political-campaign' ),
		'section'     => 'political_campaign_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'political_campaign_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'political_campaign_sanitize_number_range'
	) );
	$wp_customize->add_control( 'political_campaign_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','political-campaign' ),
		'section'     => 'political_campaign_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('political_campaign_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('political_campaign_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'political_campaign_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'political_campaign_sanitize_number_range'
	) );
	$wp_customize->add_control( 'political_campaign_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','political-campaign' ),
		'section'     => 'political_campaign_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('political_campaign_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'political_campaign_sanitize_choices'
	));
	$wp_customize->add_control('political_campaign_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','political-campaign'),
        'section' => 'political_campaign_woocommerce_section',
        'choices' => array(
            'left' => __('Left','political-campaign'),
            'right' => __('Right','political-campaign'),
        ),
	) );

	$wp_customize->add_setting('political_campaign_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('political_campaign_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','political-campaign'),
		'description'	=> __('Enter a value in pixels. Example:20px','political-campaign'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'political-campaign' ),
        ),
		'section'=> 'political_campaign_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'political_campaign_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'political_campaign_sanitize_number_range'
	) );
	$wp_customize->add_control( 'political_campaign_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','political-campaign' ),
		'section'     => 'political_campaign_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  // Related Product
  $wp_customize->add_setting( 'political_campaign_related_product_show_hide',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'political_campaign_switch_sanitization'
  ) );
  $wp_customize->add_control( new Political_Campaign_Toggle_Switch_Custom_Control( $wp_customize, 'political_campaign_related_product_show_hide',array(
      'label' => esc_html__( 'Show / Hide Related product','political-campaign' ),
      'section' => 'political_campaign_woocommerce_section'
  ))); 
}

add_action( 'customize_register', 'political_campaign_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Political_Campaign_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Political_Campaign_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Political_Campaign_Customize_Section_Pro( $manager,'political_campaign_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'POLITICAL PRO', 'political-campaign' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'political-campaign' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/political-campaign-wordpress-theme/'),
		) )	);

		// Register sections.
		$manager->add_section(new Political_Campaign_Customize_Section_Pro($manager,'political_campaign_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'political-campaign' ),
			'pro_text' => esc_html__( 'DOCS', 'political-campaign' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-political-campaign/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'political-campaign-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'political-campaign-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Political_Campaign_Customize::get_instance();