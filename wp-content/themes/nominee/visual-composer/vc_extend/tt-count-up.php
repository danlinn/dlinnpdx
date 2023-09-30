<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	// Counting element
	vc_map( array(
		'name'              => esc_html__( 'TT Counting', 'nominee' ),
		'base'              => 'tt_counts',
		'controls'          => 'full',
		'icon'              => 'fa fa-history',
		'show_settings_on_create'   => FALSE,
		'description'       => esc_html__( 'Display Counting', 'nominee' ),
		'as_parent'         => array( 'only' => 'tt_count' ),
		'content_element'   => TRUE,
		'category'          => esc_html__( 'TT Elements', 'nominee' ),
		'default_content'   => "[tt_count counted_number='' subtitle=''/]",
		'params'            => array(
			
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
		'name'                      => esc_html__( 'Single counting', 'nominee' ),
		'base'                      => 'tt_count',
		'content_element'           => true,
		'show_settings_on_create'   => TRUE,
		'as_child'                  => array( 'only' => 'tt_counts' ),
		'is_container'              => TRUE,
		'params'                    => array(

			array(
                'type'       	=> 'iconpicker',
                'heading'    	=> esc_html__('Select Icon', 'nominee'),
                'param_name' 	=> 'flaticon_list',
                'settings'   	=> array(
                    'type' 	=> 'flaticon'
                ),
                'description' 	=> esc_html__( 'If you wish to use icon on top of counted number, pickup your choice.', 'nominee' )
            ),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Counted Number', 'nominee' ),
				'param_name'  	=> 'counted_number',
				'admin_label'	=> true,
				'edit_field_class' => 'vc_col-sm-12',
				'description' 	=> esc_html__( 'Put your counted number', 'nominee' )
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Text Color', 'nominee'),
				'param_name' => 'counted_number_color_option',
				'value' => array(
					esc_html__('Default Color', 'nominee') => '',
					esc_html__('Custom Color', 'nominee') => 'custom-color',
				),
				'edit_field_class' => 'vc_col-sm-4',
				'description' => esc_html__('Select counted number color', 'nominee'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Custom Color', 'nominee'),
				'param_name' => 'title_color',
				'description' => esc_html__('Change counted number color', 'nominee'),
				'edit_field_class' => 'vc_col-sm-4',
				'dependency' => array(
					'element' => 'counted_number_color_option',
					'value' => array('custom-color'),
				)
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Font size', 'nominee' ),
				'param_name'  => 'font-size',
				'edit_field_class' => 'vc_col-sm-4',
				'description' => esc_html__( 'Font size for counted number', 'nominee' )
			),


			// subtitle
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Subtitle', 'nominee' ),
				'param_name'  => 'subtitle',
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-12',
				'description' => esc_html__( 'Enter subtitle', 'nominee' )
			),			

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Subtitle Color', 'nominee'),
				'param_name' => 'subtitle_color_option',
				'value' => array(
					esc_html__('Default Color', 'nominee') => '',
					esc_html__('Custom Color', 'nominee') => 'custom-color',
				),
				'edit_field_class' => 'vc_col-sm-4',
				'description' => esc_html__('Select subtitle color', 'nominee'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Custom Color', 'nominee'),
				'param_name' => 'subtitle_color',
				'description' => esc_html__('Change subtitle color', 'nominee'),
				'edit_field_class' => 'vc_col-sm-4',
				'dependency' => array(
					'element' => 'subtitle_color_option',
					'value' => array('custom-color'),
				)
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Subtitle Font size', 'nominee' ),
				'param_name'  => 'subtitle-font-size',
				'edit_field_class' => 'vc_col-sm-4',
				'description' => esc_html__( 'Font size for subtitle', 'nominee' )
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Grid Class', 'nominee' ),
				'param_name'  => 'grid_class',
				'description' => esc_html__( 'Enter bootstrap grid class', 'nominee' ),
				'value' => 'col-sm-3',
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


	//Your 'container' content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Tt_Counts extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Tt_Count extends WPBakeryShortCode {
		}
	}
endif;