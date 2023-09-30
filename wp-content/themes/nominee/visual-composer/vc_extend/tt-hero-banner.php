<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	// Home banner element
	vc_map( array(
		'name'          => esc_html__( 'Hero Banner', 'nominee' ),
		'base'          => 'tt_hero_banner',
		'icon'        	=> 'fa fa-align-center',
        'category'    	=> esc_html__( 'TT Elements', 'nominee' ),
        'description' 	=> esc_html__( 'Hero banner text with bg image, video and parallax', 'nominee' ),
		'params'        => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Show/Hide intro text', 'nominee' ),
                'param_name'  => 'intro_text_option',
                'value'       => array(
                    esc_html__('Show', 'nominee') => 'show',
                    esc_html__('Hide', 'nominee')  =>'hide' ,
                ),
                'std'         => 'hide',
                'description' => esc_html__( 'You can show or hide intro text from here', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Intro text', 'nominee' ),
                'param_name'  => 'intro_text',
                'holder'      => 'p',
                'description' => esc_html__( 'Enter intro text', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'intro_text_option',
                    'value'   => array( 'show' )
                ),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Intro text color', 'nominee' ),
                'param_name'  => 'intro_color_option',
                'value'       => array(
                    esc_html__('Default color', 'nominee') => '',
                    esc_html__('Custom color', 'nominee')  =>'custom-color',
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__( 'If you change default intro color then select custom color', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'intro_text_option',
                    'value'   => array( 'show' )
                ),
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom color', 'nominee' ),
                'param_name'  => 'intro_color',
                'description' => esc_html__( 'Change intro color', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'intro_color_option',
                    'value'   => array( 'custom-color' )
                ),
                'edit_field_class' => 'vc_col-sm-6'
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Enter Hero Title', 'nominee' ),
                'param_name'  => 'title',
                'holder'      => 'h4',
                'description' => esc_html__( 'Enter hero title here', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title text color', 'nominee' ),
                'param_name'  => 'title_color_option',
                'value'       => array(
                    esc_html__('Default color', 'nominee') => '',
                    esc_html__('Custom color', 'nominee')  =>'custom-color',
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__( 'If you change default title color then select custom color', 'nominee' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom color', 'nominee' ),
                'param_name'  => 'title_color',
                'description' => esc_html__( 'Change title color', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'title_color_option',
                    'value'   => array( 'custom-color' )
                ),
                'edit_field_class' => 'vc_col-sm-6'
            ),

            array(
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Hero description', 'nominee' ),
                'param_name'  => 'content',
                'description' => esc_html__( 'Enter hero description', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Description text color', 'nominee' ),
                'param_name'  => 'details_color_option',
                'value'       => array(
                    esc_html__('Default color', 'nominee') => '',
                    esc_html__('Custom color', 'nominee')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default description color then select custom color', 'nominee' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom color', 'nominee' ),
                'param_name'  => 'details_color',
                'description' => esc_html__( 'Change description color', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'details_color_option',
                    'value'   => array( 'custom-color' )
                ),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Button show/hide', 'nominee' ),
                'param_name'  => 'hero_button',
                'group' => esc_html__( 'Button Settings', 'nominee' ),
                'value'       => array(
                    esc_html__('Show', 'nominee') => 'show',
                    esc_html__('Hide', 'nominee')  =>'hide' ,
                ),
                'std'         => 'show',
                'description' => esc_html__( 'You can show or hide button from here', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Button text', 'nominee' ),
                'param_name'  => 'link_text',
                'group' => esc_html__( 'Button Settings', 'nominee' ),
                'value' => esc_html__( 'Text on the button', 'nominee' ),
                'description' => esc_html__( 'Change button text', 'nominee' ),
                'dependency'  => array(
                    'element' => 'hero_button',
                    'value'   => array( 'show' )
                )
            ),

            array(
                'type'        => 'vc_link',
                'heading'     => esc_html__( 'link', 'nominee' ),
                'param_name'  => 'link',
                'group' => esc_html__( 'Button Settings', 'nominee' ),
                'description' => esc_html__( 'Select existing page or put an url to linking', 'nominee' ),
                'dependency'  => array(
                    'element' => 'hero_button',
                    'value'   => array( 'show' )
                )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Button Shape', 'nominee' ),
                'param_name'  => 'button_shape',
                'group' => esc_html__( 'Button Settings', 'nominee' ),
                'value'       => array(
                    esc_html__('Rounded', 'nominee') => 'shape-rounded',
                    esc_html__('Square', 'nominee')  =>'shape-square',
                    esc_html__('Round', 'nominee')  =>'shape-round' 
                ),
                'dependency'  => array(
                    'element' => 'hero_button',
                    'value'   => array( 'show' )
                ),
                'description' => esc_html__( 'Select button shape', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Button Size', 'nominee' ),
                'param_name'  => 'button_size',
                'group' => esc_html__( 'Button Settings', 'nominee' ),
                'value'       => array(
                    esc_html__('Mini', 'nominee') => 'btn-xs',
                    esc_html__('Small', 'nominee')  =>'btn-sm',
                    esc_html__('Normal', 'nominee')  =>'btn-md',
                    esc_html__('Large', 'nominee')  =>'btn-lg'
                ),
                'dependency'  => array(
                    'element' => 'hero_button',
                    'value'   => array( 'show' )
                ),
                'description' => esc_html__( 'Select button size', 'nominee' )
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
                'description' => esc_html__( 'Select content alignment', 'nominee' )
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
			),
		)
	));


	if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_Hero_Banner extends WPBakeryShortCode {
        }
    }
endif;