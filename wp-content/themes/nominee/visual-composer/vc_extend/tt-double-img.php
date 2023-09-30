<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	vc_map( array(
        'name'        => esc_html__( 'TT Double Image', 'nominee' ),
        'base'        => 'tt_double_img',
        'icon'        => 'fa fa-user',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Displays Double Image', 'nominee' ),
        'params'      => array(
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Main Photo', 'nominee'),
                'param_name' => 'large_photo',
                'description' => esc_html__( 'Upload photo from media library', 'nominee' )
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Small Photo', 'nominee'),
                'param_name' => 'small_photo',
                'description' => esc_html__( 'Upload photo from media library', 'nominee' )
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
        class WPBakeryShortCode_tt_Double_Img extends WPBakeryShortCode {
        }
    }

endif; // function_exists( 'vc_map' )