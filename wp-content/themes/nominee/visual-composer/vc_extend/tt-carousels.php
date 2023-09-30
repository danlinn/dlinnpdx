<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	// Fade Animation for title and subtitle
	$tt_css_animation = array(
		esc_html__('Select animation', 'nominee') 	=> '',
		esc_html__('fadeIn', 'nominee') 			=> 'fadeIn',
		esc_html__('fadeInDown', 'nominee') 		=> 'fadeInDown',
		esc_html__('fadeInDownBig', 'nominee') 		=> 'fadeInDownBig',
		esc_html__('fadeInLeft', 'nominee') 		=> 'fadeInLeft',
		esc_html__('fadeInLeftBig', 'nominee') 		=> 'fadeInLeftBig',
		esc_html__('fadeInRight', 'nominee') 		=> 'fadeInRight',
		esc_html__('fadeInRightBig', 'nominee') 	=> 'fadeInRightBig',
		esc_html__('fadeInUp', 'nominee') 			=> 'fadeInUp',
		esc_html__('fadeInUpBig', 'nominee') 		=> 'fadeInUpBig'
	);

	// animation delay
	$tt_animation_delay = array(
		esc_html__('Select delay option', 'nominee') 	=> '',
		esc_html__('Delay 100ms', 'nominee') 			=> 'delay-100',
		esc_html__('Delay 200ms', 'nominee') 			=> 'delay-200',
		esc_html__('Delay 300ms', 'nominee') 			=> 'delay-1',
		esc_html__('Delay 400ms', 'nominee') 			=> 'delay-400',
		esc_html__('Delay 500ms', 'nominee') 			=> 'delay-500',
		esc_html__('Delay 600ms', 'nominee') 			=> 'delay-2',
		esc_html__('Delay 700ms', 'nominee') 			=> 'delay-700',
		esc_html__('Delay 700ms', 'nominee') 			=> 'delay-700',
		esc_html__('Delay 800ms', 'nominee') 			=> 'delay-800',
		esc_html__('Delay 800ms', 'nominee') 			=> 'delay-800',
		esc_html__('Delay 1000ms', 'nominee') 			=> 'delay-1000',
		esc_html__('Delay 1200ms', 'nominee') 			=> 'delay-3',
		esc_html__('Delay 1500ms', 'nominee') 			=> 'delay-4',
		esc_html__('Delay 1800ms', 'nominee') 			=> 'delay-5'
	);

	// TT Carousel slider element
	vc_map( array(
		'name'                    => esc_html__( 'TT Carousel', 'nominee' ),
		'base'                    => 'tt_carousels',
		'icon'                    => 'fa fa-picture-o',
		'description'             => esc_html__( 'Slider for home page, but you can use it any where in the page', 'nominee' ),
		'as_parent'               => array( 'only' => 'tt_carousel' ),
		'content_element' 		  => true,
    	'show_settings_on_create' => false,
		'category'                => esc_html__( 'TT Elements', 'nominee' ),
		// 'default_content'         => '[home_slide /]',
		'params'                  => array(

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Slider Height', 'nominee' ),
                'param_name'  => 'slider_height',
                'value'       => array(
                    esc_html__('Select', 'nominee')  =>'',
                    esc_html__('Full Height', 'nominee') => 'tt-full-height',
                    esc_html__('Custom', 'nominee') => 'tt-custom-height'
				),
                'description' => esc_html__( 'Choose slider height.', 'nominee' )
			),
			
			array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Custom Height for large screen', 'nominee' ),
				'param_name' => 'custom_lg_height',
				'dependency' => array(
					'element' => 'slider_height',
					'value' => array('tt-custom-height')
				),
				'group' => esc_html__( 'Custom Height', 'nominee' ),
                'description' => esc_html__( 'Enter slider custom height in px. e.g: 700px', 'nominee' )
			),

			array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Custom Height for medium screen', 'nominee' ),
				'param_name' => 'custom_md_height',
				'dependency' => array(
					'element' => 'slider_height',
					'value' => array('tt-custom-height')
				),
				'group' => esc_html__( 'Custom Height', 'nominee' ),
                'description' => esc_html__( 'Enter slider custom height in px. e.g: 600px', 'nominee' )
			),

			array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Custom Height for tablet', 'nominee' ),
				'param_name' => 'custom_sm_height',
				'dependency' => array(
					'element' => 'slider_height',
					'value' => array('tt-custom-height')
				),
				'group' => esc_html__( 'Custom Height', 'nominee' ),
                'description' => esc_html__( 'Enter slider custom height in px. e.g: 500px', 'nominee' )
			),

			array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Custom Height for mobile large', 'nominee' ),
				'param_name' => 'custom_xs_height',
				'dependency' => array(
					'element' => 'slider_height',
					'value' => array('tt-custom-height')
				),
				'group' => esc_html__( 'Custom Height', 'nominee' ),
                'description' => esc_html__( 'Enter slider custom height in px. e.g: 400px', 'nominee' )
			),

			array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Custom Height for mobile small', 'nominee' ),
				'param_name' => 'custom_xxs_height',
				'dependency' => array(
					'element' => 'slider_height',
					'value' => array('tt-custom-height')
				),
				'group' => esc_html__( 'Custom Height', 'nominee' ),
                'description' => esc_html__( 'Enter slider custom height in px. e.g: 300px', 'nominee' )
			),
			

			// Autoplay
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Slider Autoplay', 'nominee' ),
                'param_name'  => 'autoplay',
                'value'       => array(
                    esc_html__('Enable', 'nominee')  => 'enable',
                    esc_html__('Disable', 'nominee')  => 'disable'
                ),
                'std'		  => 'enable',
                'description' => esc_html__( 'Enable or disable autoplay from here', 'nominee' )
			),

			// Autoplay timeout
			array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Autoplay timeout', 'nominee' ),
                'param_name'  => 'autoplay_timeout',
                'std'		  => '5000',
                'description' => esc_html__( 'Enable autoplay timeout, default is: 5000', 'nominee' )
			),

			// Loop
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Slider loop', 'nominee' ),
                'param_name'  => 'loop',
                'value'       => array(
                    esc_html__('Enable', 'nominee')  => 'enable',
                    esc_html__('Disable', 'nominee')  => 'disable'
                ),
                'std'		  => 'disable',
                'description' => esc_html__( 'Please loop disable if you have single slide', 'nominee' )
			),

			// Navigation
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Navigation visibility', 'nominee' ),
                'param_name'  => 'navigation',
                'value'       => array(
                    esc_html__('Visible', 'nominee')  => 'visible',
                    esc_html__('Hidden', 'nominee')  => 'hidden'
                ),
                'std'		  => 'visible',
                'description' => esc_html__( 'Enable or disable navigation from here', 'nominee' )
			),

			// pagination
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Pagination visibility', 'nominee' ),
                'param_name'  => 'pagination',
                'value'       => array(
                    esc_html__('Visible', 'nominee')  => 'visible',
                    esc_html__('Hidden', 'nominee')  => 'hidden'
                ),
                'std'		  => 'visible',
                'description' => esc_html__( 'Enable or disable pagination from here', 'nominee' )
			),

			// Mouse drag option
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Mouse Drag', 'nominee' ),
                'param_name'  => 'mousedrag',
                'value'       => array(
                    esc_html__('Enable', 'nominee')  => 'enable',
                    esc_html__('Disable', 'nominee')  => 'disable'
                ),
                'std'		  => 'enable',
                'description' => esc_html__( 'Enable or disable mouse drag from here', 'nominee' )
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Slider overlay enable?', 'nominee' ),
                'param_name'  => 'overlay_color',
                'value'       => array(
                    esc_html__('Select', 'nominee') => '',
                    esc_html__('Yes', 'nominee') => 'yes',
                    esc_html__('No', 'nominee')  =>'no'
                ),
                'description' => esc_html__( 'If you want to enable slider overlay color then select yes', 'nominee' )
            ),
			
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Overlay color opacity', 'nominee' ),
                'param_name'  => 'overlay_color_opacity',
                'value'       => array(
                    esc_html__('Select', 'nominee') => '',
                    esc_html__('Opacity 0.1', 'nominee') => 'opacity-one',
                    esc_html__('Opacity 0.2', 'nominee') => 'opacity-two',
                    esc_html__('Opacity 0.3', 'nominee') => 'opacity-three',
                    esc_html__('Opacity 0.4', 'nominee') => 'opacity-four',
                    esc_html__('Opacity 0.5', 'nominee') => 'opacity-five',
                    esc_html__('Opacity 0.6', 'nominee') => 'opacity-six',
                    esc_html__('Opacity 0.7', 'nominee') => 'opacity-seven'
                ),
                'std'		  => 'opacity-0.3',
                'dependency'  => array(
                    'element' => 'overlay_color',
                    'value'   => array( 'yes' )
                ),
                'description' => esc_html__( 'If you want to enable slider overlay color then select yes', 'nominee' )
            ),

            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'nominee' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'nominee' ),
            ),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'nominee' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
			)
		),
		'js_view'                 => 'VcColumnView',
	));


	vc_map( array(
		'name'            => esc_html__( 'Slide', 'nominee' ),
		'base'            => 'tt_carousel',
		'as_child'        => array( 'only' => 'tt_carousels' ),
		'content_element' => true,
		'icon'            => 'fa fa-picture-o',
		'class'			  => 'repeatable-content-wrap',
		'params'          => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'nominee' ),
				'param_name'  => 'slider_image',
				'description' => esc_html__( 'Select images from media library, dimension: min 1700x900', 'nominee' )
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Content alignment', 'nominee' ),
                'param_name'  => 'content_alignment',
                'value'       => array(
                    esc_html__('Select content alignment', 'nominee') => '',
                    esc_html__('Left', 'nominee') => 'text-left',
                    esc_html__('Center', 'nominee')  =>'text-center',
                    esc_html__('Right', 'nominee')  =>'text-right' 
                ),
                'std'		  => 'text-left',
                'description' => esc_html__( 'Select content alignment', 'nominee' )
            ),


			// Intro title tab start
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Intro title', 'nominee' ),
				'param_name'  	=> 'intro-title',
				'holder'		=> 'h5',
				'description' 	=> esc_html__( 'Enter intro title', 'nominee' ),
				'group' 		=> esc_html__( 'Intro Title', 'nominee' )
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Max Width', 'nominee' ),
                'param_name'  => 'intro-max-width',
                'value'       => array(
                    esc_html__('Select Max Width', 'nominee') => '',
                    esc_html__('100%', 'nominee') => 'max-width-100',
                    esc_html__('90%', 'nominee') => 'max-width-90',
                    esc_html__('80%', 'nominee') => 'max-width-80',
                    esc_html__('70%', 'nominee') => 'max-width-70',
                    esc_html__('60%', 'nominee') => 'max-width-60',
                    esc_html__('50%', 'nominee') => 'max-width-50',
                    esc_html__('40%', 'nominee') => 'max-width-40',
                    esc_html__('30%', 'nominee') => 'max-width-30'
                ),
                'description' => esc_html__( 'Select max width of intro title', 'nominee' ),
                'group' 		=> esc_html__( 'Intro Title', 'nominee' )
            ),
			
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Font size', 'nominee' ),
				'param_name'  	=> 'intro-font-size',
				'description' 	=> esc_html__( 'Enter intro font size in px, e.g: 24px', 'nominee' ),
				'group' 		=> esc_html__( 'Intro Title', 'nominee' )
			),

			array(
				'type'        	=> 'colorpicker',
				'heading'     	=> esc_html__( 'Font color', 'nominee' ),
				'param_name'  	=> 'title-intro-color',
				'description' 	=> esc_html__( 'Enter title intro font color', 'nominee' ),
				'group' 		=> esc_html__( 'Intro Title', 'nominee' )
			),
			
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Intro title animation', 'nominee' ),
				'param_name'  	=> 'intro_title_animation',
				'value'			=> $tt_css_animation,
				'description' 	=> esc_html__( 'Select animation for intro title, e.g: fadeInDown', 'nominee' ),
				'group' 		=> esc_html__( 'Intro Title', 'nominee' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'nominee' ),
				'param_name'  	=> 'intro_title_ani_delay',
				'value'			=> $tt_animation_delay,
				'description' 	=> esc_html__( 'Select animation delay for intro title, e.g: Delay 300ms', 'nominee' ),
				'group' 		=> esc_html__( 'Intro Title', 'nominee' )
			),
			// Intro title tab end


			// Title tab start
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Title', 'nominee' ),
				'param_name'  	=> 'title',
				'holder'		=> 'h3',
				'description' 	=> esc_html__( 'Enter banner title', 'nominee' ),
				'group' 		=> esc_html__( 'Large title', 'nominee' )
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Max Width', 'nominee' ),
                'param_name'  => 'title-max-width',
                'value'       => array(
                    esc_html__('Select Max Width', 'nominee') => '',
                    esc_html__('100%', 'nominee') => 'max-width-100',
                    esc_html__('90%', 'nominee') => 'max-width-90',
                    esc_html__('80%', 'nominee') => 'max-width-80',
                    esc_html__('70%', 'nominee') => 'max-width-70',
                    esc_html__('60%', 'nominee') => 'max-width-60',
                    esc_html__('50%', 'nominee') => 'max-width-50',
                    esc_html__('40%', 'nominee') => 'max-width-40',
                    esc_html__('30%', 'nominee') => 'max-width-30'
                ),
                'description' => esc_html__( 'Select max width of title', 'nominee' ),
                'group' 		=> esc_html__( 'Large title', 'nominee' )
            ),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title font size for large screen', 'nominee' ),
                'param_name'  => 'title-sizes-lg',
                'value'       => array(
                    esc_html__('Select title font size', 'nominee') => '',
                    esc_html__('100px', 'nominee') => 'lg-font-size-100',
                    esc_html__('90px', 'nominee') => 'lg-font-size-90',
                    esc_html__('80px', 'nominee') => 'lg-font-size-80',
                    esc_html__('70px', 'nominee') => 'lg-font-size-70',
                    esc_html__('60px', 'nominee') => 'lg-font-size-60',
                    esc_html__('50px', 'nominee') => 'lg-font-size-50',
                    esc_html__('40px', 'nominee') => 'lg-font-size-40',
                    esc_html__('30px', 'nominee') => 'lg-font-size-30'
                ),
                'description' => esc_html__( 'Select font size of title', 'nominee' ),
                'group' 		=> esc_html__( 'Large title', 'nominee' )
            ),
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title font size for medium screen', 'nominee' ),
                'param_name'  => 'title-sizes-md',
                'value'       => array(
                    esc_html__('Select title font size', 'nominee') => '',
                    esc_html__('100px', 'nominee') => 'md-font-size-100',
                    esc_html__('90px', 'nominee') => 'md-font-size-90',
                    esc_html__('80px', 'nominee') => 'md-font-size-80',
                    esc_html__('70px', 'nominee') => 'md-font-size-70',
                    esc_html__('60px', 'nominee') => 'md-font-size-60',
                    esc_html__('50px', 'nominee') => 'md-font-size-50',
                    esc_html__('40px', 'nominee') => 'md-font-size-40',
                    esc_html__('30px', 'nominee') => 'md-font-size-30'

                ),
                'description' => esc_html__( 'Select font size of title', 'nominee' ),
                'group' 		=> esc_html__( 'Large title', 'nominee' )
            ),
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title font size for small screen', 'nominee' ),
                'param_name'  => 'title-sizes-sm',
                'value'       => array(
                    esc_html__('Select title font size', 'nominee') => '',
                    esc_html__('100px', 'nominee') => 'sm-font-size-100',
                    esc_html__('90px', 'nominee') => 'sm-font-size-90',
                    esc_html__('80px', 'nominee') => 'sm-font-size-80',
                    esc_html__('70px', 'nominee') => 'sm-font-size-70',
                    esc_html__('60px', 'nominee') => 'sm-font-size-60',
                    esc_html__('50px', 'nominee') => 'sm-font-size-50',
                    esc_html__('40px', 'nominee') => 'sm-font-size-40',
                    esc_html__('30px', 'nominee') => 'sm-font-size-30'

                ),
                'description' => esc_html__( 'Select font size of title', 'nominee' ),
                'group' 		=> esc_html__( 'Large title', 'nominee' )
            ),
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title font size for mobile screen', 'nominee' ),
                'param_name'  => 'title-sizes-xs',
                'value'       => array(
                    esc_html__('Select title font size', 'nominee') => '',
                    esc_html__('100px', 'nominee') => 'xs-font-size-100',
                    esc_html__('90px', 'nominee') => 'xs-font-size-90',
                    esc_html__('80px', 'nominee') => 'xs-font-size-80',
                    esc_html__('70px', 'nominee') => 'xs-font-size-70',
                    esc_html__('60px', 'nominee') => 'xs-font-size-60',
                    esc_html__('50px', 'nominee') => 'xs-font-size-50',
                    esc_html__('40px', 'nominee') => 'xs-font-size-40',
                    esc_html__('30px', 'nominee') => 'xs-font-size-30'

                ),
                'description' => esc_html__( 'Select font size of title', 'nominee' ),
                'group' 		=> esc_html__( 'Large title', 'nominee' )
            ),

			array(
				'type'        	=> 'colorpicker',
				'heading'     	=> esc_html__( 'Font color', 'nominee' ),
				'param_name'  	=> 'title-font-color',
				'description' 	=> esc_html__( 'Enter title font color', 'nominee' ),
				'group' 		=> esc_html__( 'Large title', 'nominee' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Title animation', 'nominee' ),
				'param_name'  	=> 'title_animation',
				'value'			=> $tt_css_animation,
				'description' 	=> esc_html__( 'Select animation for title, e.g: fadeInUp', 'nominee' ),
				'group' 		=> esc_html__( 'Large title', 'nominee' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'nominee' ),
				'param_name'  	=> 'title_ani_delay',
				'value'			=> $tt_animation_delay,
				'description' 	=> esc_html__( 'Select animation delay for title, e.g: Delay 1200ms', 'nominee' ),
				'group' 		=> esc_html__( 'Large title', 'nominee' )
			),
			// Title tab End



			// Content tab start
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Content visibility', 'nominee' ),
                'param_name'  => 'content_visibility',
                'value'       => array(
                    esc_html__('Visible', 'nominee') => 'visible',
                    esc_html__('Hidden', 'nominee')  =>'hidden'
                ),
                'std'		  => 'hidden',
                'group' 		=> esc_html__( 'Content', 'nominee' ),
                'description' => esc_html__( 'Select content visibility option', 'nominee' )
            ),

			array(
				'type'        	=> 'textarea_html',
				'heading'     	=> esc_html__( 'Content', 'nominee' ),
				'param_name'  	=> 'content',
				'description' 	=> esc_html__( 'Enter banner content here', 'nominee' ),
				'group' 		=> esc_html__( 'Content', 'nominee' ),
				'dependency'  => array(
                    'element' => 'content_visibility',
                    'value'   => array( 'visible' )
                )
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Max Width', 'nominee' ),
                'param_name'  => 'content-max-width',
                'value'       => array(
                    esc_html__('Select Max Width', 'nominee') => '',
                    esc_html__('100%', 'nominee') => 'max-width-100',
                    esc_html__('90%', 'nominee') => 'max-width-90',
                    esc_html__('80%', 'nominee') => 'max-width-80',
                    esc_html__('70%', 'nominee') => 'max-width-70',
                    esc_html__('60%', 'nominee') => 'max-width-60',
                    esc_html__('50%', 'nominee') => 'max-width-50',
                    esc_html__('40%', 'nominee') => 'max-width-40',
                    esc_html__('30%', 'nominee') => 'max-width-30'
                ),
                'description' => esc_html__( 'Select max width of content', 'nominee' ),
                'group' 		=> esc_html__( 'Content', 'nominee' )
            ),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Font size', 'nominee' ),
				'param_name'  	=> 'content-font-size',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Enter content font size in px, e.g: 60px', 'nominee' ),
				'group' 		=> esc_html__( 'Content', 'nominee' ),
				'dependency'  => array(
                    'element' => 'content_visibility',
                    'value'   => array( 'visible' )
                )
			),

			array(
				'type'        	=> 'colorpicker',
				'heading'     	=> esc_html__( 'Font color', 'nominee' ),
				'param_name'  	=> 'content-font-color',
				'description' 	=> esc_html__( 'Enter content font color', 'nominee' ),
				'group' 		=> esc_html__( 'Content', 'nominee' ),
				'dependency'  => array(
                    'element' => 'content_visibility',
                    'value'   => array( 'visible' )
                )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Content animation', 'nominee' ),
				'param_name'  	=> 'content_animation',
				'value'			=> $tt_css_animation,
				'description' 	=> esc_html__( 'Select animation for content, e.g: fadeInUp', 'nominee' ),
				'group' 		=> esc_html__( 'Content', 'nominee' ),
				'dependency'  => array(
                    'element' => 'content_visibility',
                    'value'   => array( 'visible' )
                )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'nominee' ),
				'param_name'  	=> 'content_ani_delay',
				'value'			=> $tt_animation_delay,
				'description' 	=> esc_html__( 'Select animation delay for content, e.g: Delay 1200ms', 'nominee' ),
				'group' 		=> esc_html__( 'Content', 'nominee' ),
				'dependency'  => array(
                    'element' => 'content_visibility',
                    'value'   => array( 'visible' )
                )
			),
			//End content tab


			// Button tab start
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Button visibility', 'nominee' ),
                'param_name'  => 'button_visibility',
                'value'       => array(
                    esc_html__('Visible', 'nominee') => 'visible',
                    esc_html__('Hidden', 'nominee')  =>'hidden'
                ),
                'std'		  => 'hidden',
                'group' 		=> esc_html__( 'Button', 'nominee' ),
                'description' => esc_html__( 'Select button visibility option', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Button style', 'nominee' ),
                'param_name'  => 'button_style',
                'value'       => array(
                    esc_html__('Primary', 'nominee') => 'btn-primary',
                    esc_html__('Default', 'nominee') => 'btn-default',
                    esc_html__('Outline', 'nominee') => 'btn-outline'
                ),
                'description' => esc_html__( 'Select a button style', 'nominee' ),
                'group' 		=> esc_html__( 'Button', 'nominee' ),
                'dependency'  => array(
                    'element' => 'button_visibility',
                    'value'   => array( 'visible' )
                )
            ),

            array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Button text', 'nominee' ),
				'param_name'  	=> 'button_text',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Enter button text', 'nominee' ),
				'group' 		=> esc_html__( 'Button', 'nominee' ),
				'dependency'  => array(
                    'element' => 'button_visibility',
                    'value'   => array( 'visible' )
                )
			),

            array(
				'type' => 'vc_link',
				'heading' => esc_html__('Button Link', 'nominee'),
				'param_name' => 'link',
				'description' => esc_html__('Enter button url', 'nominee'),
				'group' 		=> esc_html__( 'Button', 'nominee' ),
				'dependency'  => array(
                    'element' => 'button_visibility',
                    'value'   => array( 'visible' )
                )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Button animation', 'nominee' ),
				'param_name'  	=> 'button_animation',
				'value'			=> $tt_css_animation,
				'description' 	=> esc_html__( 'Select animation for button, e.g: fadeInUp', 'nominee' ),
				'group' 		=> esc_html__( 'Button', 'nominee' ),
				'dependency'  => array(
                    'element' => 'button_visibility',
                    'value'   => array( 'visible' )
                )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'nominee' ),
				'param_name'  	=> 'button_ani_delay',
				'value'			=> $tt_animation_delay,
				'description' 	=> esc_html__( 'Select animation delay for button, e.g: Delay 1200ms', 'nominee' ),
				'group' 		=> esc_html__( 'Button', 'nominee' ),
				'dependency'  => array(
                    'element' => 'button_visibility',
                    'value'   => array( 'visible' )
                )
			),
            //End button tab


			// extra image tab
			array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Extra Image', 'nominee'),
                'param_name' => 'extra_image',
                'group' 		=> esc_html__( 'Extra Image', 'nominee' ),
                'description' => esc_html__( 'Use an extra image', 'nominee' )
            ),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Max Width', 'nominee' ),
                'param_name'  => 'image-max-width',
                'value'       => array(
                    esc_html__('Select Max Width', 'nominee') => '',
                    esc_html__('100%', 'nominee') => 'max-width-100',
                    esc_html__('90%', 'nominee') => 'max-width-90',
                    esc_html__('80%', 'nominee') => 'max-width-80',
                    esc_html__('70%', 'nominee') => 'max-width-70',
                    esc_html__('60%', 'nominee') => 'max-width-60',
                    esc_html__('50%', 'nominee') => 'max-width-50',
                    esc_html__('40%', 'nominee') => 'max-width-40',
                    esc_html__('30%', 'nominee') => 'max-width-30'
                ),
                'description' => esc_html__( 'Select max width of image', 'nominee' ),
                'group' 		=> esc_html__( 'Extra Image', 'nominee' )
            ),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Image Position', 'nominee' ),
                'param_name'  => 'image-position',
                'value'       => array(
                    esc_html__('Select image position', 'nominee') => '',
                    esc_html__('Left center', 'nominee') => 'img-left-center',
                    esc_html__('Left top', 'nominee') => 'img-left-top',
                    esc_html__('Left bottom', 'nominee') => 'img-left-bottom',
                    esc_html__('Right center', 'nominee') => 'img-right-center',
                    esc_html__('Right top', 'nominee') => 'img-right-top',
                    esc_html__('Right bottom', 'nominee') => 'img-right-bottom',
                ),
                'description' => esc_html__( 'Select image position', 'nominee' ),
                'group' 		=> esc_html__( 'Extra Image', 'nominee' )
            ),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Visibility', 'nominee' ),
                'param_name'  => 'image-visibility',
                'value'       => array(
                    esc_html__('Select image visibility', 'nominee') => '',
                    esc_html__('Hidden from mobile', 'nominee') => 'hidden-xs',
                    esc_html__('Hidden from tablet', 'nominee') => 'hidden-sm',
                    esc_html__('Hidden from mobile and tablet', 'nominee') => 'hidden-xs hidden-sm',
                    esc_html__('Hidden from laptop', 'nominee') => 'hidden-md',
                    esc_html__('Hidden from desktop', 'nominee') => 'hidden-lg',
                ),
                'description' => esc_html__( 'Select image position', 'nominee' ),
                'group' 		=> esc_html__( 'Extra Image', 'nominee' )
            ),

            array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Image animation', 'nominee' ),
				'param_name'  	=> 'image_animation',
				'value'			=> $tt_css_animation,
				'description' 	=> esc_html__( 'Select animation for image, e.g: fadeInUp', 'nominee' ),
				'group' 		=> esc_html__( 'Extra Image', 'nominee' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'nominee' ),
				'param_name'  	=> 'image_ani_delay',
				'value'			=> $tt_animation_delay,
				'description' 	=> esc_html__( 'Select animation delay for image, e.g: Delay 1200ms', 'nominee' ),
				'group' 		=> esc_html__( 'Extra Image', 'nominee' )
			),
            // end image tab

			array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'nominee' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'nominee' ),
            ),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'nominee' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
			)
		)
	));

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_tt_carousels extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_tt_carousel extends WPBakeryShortCode {
		}
	}
endif;