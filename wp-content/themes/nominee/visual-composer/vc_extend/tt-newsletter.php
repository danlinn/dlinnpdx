<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :


    // TT Newsletter element
    vc_map(array(
        'name' => esc_html__('TT Newsletter', 'nominee'),
        'base' => 'tt_newsletter',
        'icon' => 'fa fa-envelope',
        'category' => esc_html__('TT Elements', 'nominee'),
        'description' => esc_html__('Newsletter subscribe form', 'nominee'),
        'params' => array(

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Choose Newsletter Layout', 'nominee'),
                'param_name' => 'newsletter_style',
                'value'       => array(
                    esc_html__('Standard Layout', 'nominee') => 'mc-default',
                    esc_html__('Creative Layout', 'nominee') => 'mc-creative',
                ),
                'admin_label' => true,
            ),

            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra class name', 'nominee'),
                'param_name' => 'el_class',
                'admin_label' => true,
                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee'),
            ),

            array(
                'type' => 'css_editor',
                'heading' => esc_html__('Css', 'nominee'),
                'param_name' => 'css',
                'group' => esc_html__('Design options', 'nominee'),
            ),
        ),
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_newsletter extends WPBakeryShortCode {
        }
    }


endif;


