<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	// TT archivement element
	vc_map( array(
		'name'                    => esc_html__( 'TT Achivement', 'nominee' ),
		'base'                    => 'tt_archivements',
		'icon'                    => 'fa fa-picture-o',
		'description'             => esc_html__( 'Show off archivement', 'nominee' ),
		'as_parent'               => array( 'only' => 'tt_archivement' ),
		'content_element' 		  => true,
    	'show_settings_on_create' => false,
		'category'                => esc_html__( 'TT Elements', 'nominee' ),
		'params'                  => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Carousel Loop', 'nominee' ),
				'param_name'  => 'loop',
				'admin_label' => true,
				'value' 	  => array(
					esc_html__('True', 'nominee') => 'true',
					esc_html__('False', 'nominee') => 'false'
				),
				'std' => "true",
				'admin_label' => true,
				'description' => esc_html__( 'Select carousel loop option', 'nominee' )
			),

			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Carousel Autoplay', 'nominee' ),
				'param_name'  => 'autoplay',
				'admin_label' => true,
				'value' 	  => array(
					esc_html__('True', 'nominee') => 'true',
					esc_html__('False', 'nominee') => 'false'
				),
				'std' => "true",
				'admin_label' => true,
				'description' => esc_html__( 'Select carousel autoplay option', 'nominee' )
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Autoplay Speed', 'nominee' ),
				'param_name'  => 'autoplay_speed',
				'description' => esc_html__( 'Control your autoplay speed, default is: 5000, it means 5 second', 'nominee' ),
				'std' => "5000",
				'dependency'  => array(
					'element' => 'autoplay', 
					'value'   => array('true')
				)
			),
			
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'nominee' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
			),
			array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'nominee' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'nominee' ),
            )
		),
		'js_view'                 => 'VcColumnView',
	));

	vc_map( array(
		'name'            => esc_html__( 'Achivement item', 'nominee' ),
		'base'            => 'tt_archivement',
		'as_child'        => array( 'only' => 'tt_archivements' ),
		'content_element' => true,
		'icon'            => 'fa fa-picture-o',
		'class'			  => 'repeatable-content-wrap',
		'params'          => array(
			array(
                'type'        => 'dropdown',
                'class'       => '',
                'heading'     => esc_html__( 'Show icon ?', 'nominee' ),
                'param_name'  => 'show_icon',
                'value' => array(
                    esc_html__('select option', 'nominee') => '',
                    esc_html__('Yes', 'nominee') => 'yes',
                    esc_html__('No', 'nominee') => 'no'
                ),
                'description' => esc_html__( 'If you do not like to show icon then select no', 'nominee' ),
            ),

            array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Icon option', 'nominee' ),
				'param_name'  => 'icon_option',
				'admin_label' => true,
				'value' 	  => array(
					esc_html__('Select an option', 'nominee') => '',
					esc_html__('Thumb icon', 'nominee') => 'thumbicon',
					esc_html__('Font icon', 'nominee') => 'fonticon'
				),
				'admin_label' => true,
				'description' => esc_html__( 'Select an option to use icon', 'nominee' ),
				'dependency'  => Array(
					'element' => 'show_icon', 
					'value'   => array('yes')
				)
			),

			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Thumb icon', 'nominee' ),
				'param_name'  => 'thumb_icon',
				'description' => esc_html__( 'Select images from media library, dimension: 100x100', 'nominee' ),
				'dependency'  => Array(
					'element' => 'icon_option', 
					'value'   => array('thumbicon')
				)
			),

            array(
                'type'       => 'iconpicker',
                'heading'    => esc_html__('Font Icon', 'nominee'),
                'param_name' => 'font_icon',
                'settings'   => array(
                    'type' => 'flaticon'
                ),
                'description' => esc_html__( 'Flaticon list. Pickup your choice.', 'nominee'
                ),
                'dependency'  => Array(
                    'element' => 'icon_option',
                    'value'   => array( 'fonticon' )
                ),
            ),

            array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Title', 'nominee' ),
				'param_name'  	=> 'title',
				'holder'		=> 'h3',
				'description' 	=> esc_html__( 'Enter archivement name', 'nominee' )
			),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title color option', 'nominee' ),
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
				'type'        	=> 'textarea_html',
				'heading'     	=> esc_html__( 'Archivement details', 'nominee' ),
				'param_name'  	=> 'content',
				'description' 	=> esc_html__( 'Enter description of archivement', 'nominee' )
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

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_tt_Archivements extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_tt_Archivement extends WPBakeryShortCode {
		}
	}
endif;