<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	vc_map( array(
        'name'        => esc_html__( 'TT Intro', 'nominee' ),
        'base'        => 'tt_intro',
        'icon'        => 'fa fa-user',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Displays Important Information', 'nominee' ),
        'params'      => array(
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Intro text', 'nominee' ),
                'param_name'  => 'intro_text',
                'holder'      => 'p',
                'description' => esc_html__( 'Enter intro text', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Intro text color', 'nominee' ),
                'param_name'  => 'intro_color_option',
                'value'       => array(
                    esc_html__('Default color', 'nominee') => '',
                    esc_html__('Custom color', 'nominee')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default intro color then select custom color', 'nominee' )
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
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Enter Title', 'nominee' ),
                'param_name'  => 'title',
                'holder'      => 'h4',
                'description' => esc_html__( 'Enter title here', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title text color', 'nominee' ),
                'param_name'  => 'title_color_option',
                'value'       => array(
                    esc_html__('Default color', 'nominee') => '',
                    esc_html__('Custom color', 'nominee')  =>'custom-color',
                ),
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
            ),
            
            array(
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Intro details', 'nominee' ),
                'param_name'  => 'content',
                'description' => esc_html__( 'Enter details information', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Details text color', 'nominee' ),
                'param_name'  => 'details_color_option',
                'value'       => array(
                    esc_html__('Default color', 'nominee') => '',
                    esc_html__('Custom color', 'nominee')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default details color then select custom color', 'nominee' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom color', 'nominee' ),
                'param_name'  => 'details_color',
                'description' => esc_html__( 'Change details color', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'details_color_option',
                    'value'   => array( 'custom-color' )
                ),
            ),


            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Image/Signature', 'nominee'),
                'param_name' => 'digital_signature',
                'description' => esc_html__( 'Upload scan copy of signature/image if required', 'nominee' )
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
        )
    ));

	if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_Intro extends WPBakeryShortCode {
        }
    }

endif; // function_exists( 'vc_map' )