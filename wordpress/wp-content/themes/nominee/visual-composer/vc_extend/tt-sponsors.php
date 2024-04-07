<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	// Client carousel element

	vc_map(array(
		'name' => esc_html__('TT Sponsors', 'nominee'),
		'base' => 'tt_sponsors',
		'icon' => 'fa fa-users',
		'as_parent' => array('only' => 'tt_sponsor'),
		'category' => esc_html__('TT Elements', 'nominee'),
		'show_settings_on_create' => true,
		'content_element' => true,
		'description' => esc_html__('Displays sponsors logo', 'nominee'),
		'params' => array(

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Logo Alignment', 'nominee'),
				'param_name' => 'logo_alignment',
				'value' => array(
					esc_html__('Left', 'nominee') => 'left',
					esc_html__('Center', 'nominee') => 'center',
					esc_html__('Right', 'nominee') => 'right',
				),
				'std' => 'left',
				'admin_label' => true,
				'description' => esc_html__('Choose Logo Alignment', 'nominee'),
			),
			
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Default Logo Opacity', 'nominee'),
				'param_name' => 'icon_opacity',
				'description' => esc_html__('Choose default logo opacity. Default opacity is 30%', 'nominee'),
				'value' => array(
					esc_html__('Select', 'nominee') => '',
					esc_html__('10%', 'nominee') => '.1',
					esc_html__('20%', 'nominee') => '.2',
					esc_html__('30%', 'nominee') => '.3',
					esc_html__('40%', 'nominee') => '.4',
					esc_html__('50%', 'nominee') => '.5',
					esc_html__('60%', 'nominee') => '.6',
					esc_html__('70%', 'nominee') => '.7',
					esc_html__('80%', 'nominee') => '.8',
					esc_html__('90%', 'nominee') => '.9',
					esc_html__('100%', 'nominee') => '1',
				),
				'edit_field_class' => 'vc_col-sm-6'
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Logo Hover Opacity', 'nominee'),
				'param_name' => 'icon_hover_opacity',
				'description' => esc_html__('Choose logo hover opacity. Default opacity is 100%', 'nominee'),
				'value' => array(
					esc_html__('Select', 'nominee') => '',
					esc_html__('10%', 'nominee') => '10',
					esc_html__('20%', 'nominee') => '20',
					esc_html__('30%', 'nominee') => '30',
					esc_html__('40%', 'nominee') => '40',
					esc_html__('50%', 'nominee') => '50',
					esc_html__('60%', 'nominee') => '60',
					esc_html__('70%', 'nominee') => '70',
					esc_html__('80%', 'nominee') => '80',
					esc_html__('90%', 'nominee') => '90',
					esc_html__('100%', 'nominee') => '100',
				),
				'edit_field_class' => 'vc_col-sm-6'
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Logo Height (Optional)', 'nominee'),
				'description' => esc_html__('Default height is 110px, leave blank if not required;', 'nominee'),
				'param_name' => 'logo_height',
				'edit_field_class' => 'vc_col-sm-6'
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'nominee'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee'),
			),

			array(
				'type' => 'css_editor',
				'heading' => esc_html__('Css', 'nominee'),
				'param_name' => 'css',
				'group' => esc_html__('Design options', 'nominee'),
			),
		),
		'js_view' => 'VcColumnView',
	));


	vc_map(array(
		'name' => esc_html__('Add Sponsor', 'nominee'),
		'base' => 'tt_sponsor',
		'icon' => 'fa fa-user',
		'as_child' => array('only' => 'tt_sponsors'),
		'content_element' => true,
		'class' => 'repeatable-content-wrap',
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Upload Sponsor Logo', 'nominee'),
				'param_name' => 'images',
				'description' => esc_html__('Upload sponsor logo from media library. You should resize images from photoshop before upload. Logo height will be 110px and width will be auto for best view.', 'nominee'),
			),

			array(
				'type' => 'vc_link',
				'heading' => esc_html__('Sponsor Link', 'nominee'),
				'param_name' => 'link',
				'description' => esc_html__('Enter link or select page as link', 'nominee'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Tooltip title', 'nominee'),
				'description' => esc_html__('Enter Tooltip title. e.g. Company Name', 'nominee'),
				'param_name' => 'tooltip_title',
			),
			
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Tooltip position', 'nominee'),
				'param_name' => 'tooltip_position',
				'value' => array(
					esc_html__('Top', 'nominee') => 'top',
					esc_html__('Bottom', 'nominee') => 'bottom',
					esc_html__('Left', 'nominee') => 'left',
					esc_html__('Right', 'nominee') => 'right',
				),
				'std' => 'bottom',
				'admin_label' => true,
				'description' => esc_html__('Choose Tooltip position', 'nominee'),
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
		)
	));



	if (class_exists('WPBakeryShortCodesContainer')) {
		class WPBakeryShortCode_tt_Sponsors extends WPBakeryShortCodesContainer {
		}
	}

	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_tt_Sponsor extends WPBakeryShortCode {
		}
	}
endif;