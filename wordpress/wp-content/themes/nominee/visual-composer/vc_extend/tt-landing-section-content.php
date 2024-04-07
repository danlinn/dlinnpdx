<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	vc_map(array(
		'name' => esc_html__('Landing Section Conent', 'nominee'),
		'base' => 'tt_landing_section_content',
		'icon' => 'fa fa-align-center',
		'category' => esc_html__('TT Elements', 'nominee'),
		'description' => esc_html__('Customize landing section content', 'nominee'),
		'params' => array(

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Alignment', 'nominee'),
				'param_name' => 'title_alignment',
				'value' => array(
					esc_html__('Left', 'nominee') => 'text-left',
					esc_html__('Center', 'nominee') => 'text-center',
					esc_html__('Right', 'nominee') => 'text-right',
				),
				'std' => 'text-left',
				'description' => esc_html__('Select alignment', 'nominee'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Content area width', 'nominee'),
				'param_name' => 'width',
				'value' => '100%',
				'description' => esc_html__('Change content area width', 'nominee'),
			),

			// Heading for Intro Title
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Enable Intro Title', 'nominee'),
				'param_name' => 'enable_subtitle',
				'value' => array(
					esc_html__('Enable', 'nominee') => 'enable',
					esc_html__('Disable', 'nominee') => 'disable',
				),
				'std' => 'enable',
				'description' => esc_html__('You may add subtitle if you want', 'nominee'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Intro Title Settings', 'nominee'),
				'param_name' => 'heading_1',
				'dependency' => array(
					'element' => 'enable_subtitle',
					'value' => array('enable')
				),
				'edit_field_class' => 'vc_col-sm-12 hidden-element',
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Enter Intro Title Text', 'nominee'),
				'param_name' => 'title_intro',
				'holder' => 'span',
				'dependency' => array(
					'element' => 'enable_subtitle',
					'value' => array('enable')
				),
				'description' => esc_html__('Enter title intro text here, it will be displayed top of the title', 'nominee'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Font Weight', 'nominee'),
				'param_name' => 'subtitle_font_weight',
				'value' => array(
					esc_html__('Default', 'nominee') => 'default',
					esc_html__('Normal', 'nominee') => 'normal',
					esc_html__('Bold', 'nominee') => 'bold',
					esc_html__('Extra Bold', 'nominee') => '900',
				),
				'sdt' => 'default',
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'enable_subtitle',
					'value' => array('enable')
				),
				'description' => esc_html__('Choose font weight', 'nominee'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Font Size', 'nominee'),
				'param_name' => 'subtitle_font_size',
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'enable_subtitle',
					'value' => array('enable')
				),
				'description' => esc_html__('Enter font size by px. e.g. 12px', 'nominee'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Margin Bottom', 'nominee'),
				'param_name' => 'subtitle_margin_bottom',
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'enable_subtitle',
					'value' => array('enable')
				),
				'description' => esc_html__('Enter margin bottom by px. e.g. 20px', 'nominee'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Color', 'nominee'),
				'param_name' => 'title_intro_color_option',
				'value' => array(
					esc_html__('Default Color', 'nominee') => '',
					esc_html__('Theme Color', 'nominee') => 'theme-color',
					esc_html__('Custom Color', 'nominee') => 'custom-color',
				),
				'dependency' => array(
					'element' => 'enable_subtitle',
					'value' => array('enable')
				),
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__('Select color', 'nominee'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Custom color', 'nominee'),
				'param_name' => 'title_intro_color',
				'description' => esc_html__('Change color', 'nominee'),
				'dependency' => array(
					'element' => 'enable_subtitle',
					'value' => array('enable')
				),
				'dependency' => array(
					'element' => 'title_intro_color_option',
					'value' => array('custom-color'),
				),
			),

			// Heading for Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title Settings', 'nominee'),
				'param_name' => 'heading_2',
				'edit_field_class' => 'vc_col-sm-12 hidden-element',
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Enter Title Text', 'nominee'),
				'param_name' => 'title',
				'admin_label' => true,
				'description' => esc_html__('Enter title here', 'nominee'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Title Font Weight', 'nominee'),
				'param_name' => 'font_weight',
				'value' => array(
					esc_html__('Default', 'nominee') => 'default',
					esc_html__('Light 300', 'nominee') => '300',
					esc_html__('Regular 400', 'nominee') => '400',
					esc_html__('Medium 500', 'nominee') => '500',
					esc_html__('Bold 700', 'nominee') => '700',
				),
				'std' => 'default',
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__('Select title text transform', 'nominee'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Font Size', 'nominee'),
				'param_name' => 'title_font_size',
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__('Enter font size by px. e.g. 45px', 'nominee'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Text Transform', 'nominee'),
				'param_name' => 'text_transform',
				'value' => array(
					esc_html__('Default', 'nominee') => '',
					esc_html__('Uppercase', 'nominee') => 'uppercase',
					esc_html__('Capitalize', 'nominee') => 'capitalize',
					esc_html__('Lowercase', 'nominee') => 'lowercase',
				),
				'std' => 'capitalize',
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__('Select title text transform', 'nominee'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Color', 'nominee'),
				'param_name' => 'title_color_option',
				'value' => array(
					esc_html__('Default Color', 'nominee') => '',
					esc_html__('Theme Color', 'nominee') => 'theme-color',
					esc_html__('Custom Color', 'nominee') => 'custom-color',
				),
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__('Select title color', 'nominee'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Custom color', 'nominee'),
				'param_name' => 'title_color',
				'description' => esc_html__('Change title color', 'nominee'),
				'dependency' => array(
					'element' => 'title_color_option',
					'value' => array('custom-color'),
				),
				'edit_field_class' => 'vc_col-sm-6',
			),

			// Title Description
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Title description', 'nominee'),
				'param_name' => 'content',
				'holder' => 'span',
				'description' => esc_html__('Description will appear on after title bottom separator', 'nominee'),
				'group' => esc_html__('Title Description', 'nominee'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Description color option', 'nominee'),
				'param_name' => 'description_color_option',
				'value' => array(
					esc_html__('Default color', 'nominee') => '',
					esc_html__('Custom color', 'nominee') => 'custom-color',
				),
				'description' => esc_html__('If you change default description text color then select custom color', 'nominee'),
				'group' => esc_html__('Title Description', 'nominee'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Custom color', 'nominee'),
				'param_name' => 'description_color',
				'description' => esc_html__('Change description text color', 'nominee'),
				'dependency' => array(
					'element' => 'description_color_option',
					'value' => array('custom-color'),
				),
				'group' => esc_html__('Title Description', 'nominee'),
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Continue to the site link', 'nominee' ),
                'param_name'  => 'continue_button',
                'value'       => array(
                    esc_html__('Show', 'nominee') => 'show',
                    esc_html__('Hide', 'nominee')  =>'hide' ,
                ),
                'std'         => 'show',
                'admin_label' => true,
                'description' => esc_html__( 'You can show or hide Continue to the site link from here', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Link text', 'nominee' ),
                'param_name'  => 'link_text',
                'value' => esc_html__( 'Continue to the site', 'nominee' ),
                'description' => esc_html__( 'Change link text', 'nominee' ),
                'dependency'  => array(
                    'element' => 'continue_button',
                    'value'   => array( 'show' )
                )
            ),

            array(
                'type'        => 'vc_link',
                'heading'     => esc_html__( 'link', 'nominee' ),
                'param_name'  => 'link',
                'description' => esc_html__( 'Select existing page or put an url to linking', 'nominee' ),
                'dependency'  => array(
                    'element' => 'continue_button',
                    'value'   => array( 'show' )
                )
			),
			
			array(
				'type' => 'css_editor',
				'heading' => esc_html__('Css', 'nominee'),
				'param_name' => 'css',
				'group' => esc_html__('Design options', 'nominee'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'nominee'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee'),
			),
		),
	));

	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_TT_Landing_Section_Content extends WPBakeryShortCode {
		}
	}
endif;