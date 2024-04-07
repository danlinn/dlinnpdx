<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // TT Donation element
    vc_map( array(
        'name'        => esc_html__( 'Donation Form', 'nominee' ),
        'base'        => 'tt_donation_form_charitable',
        'icon'        => 'fa fa-money',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Required charitable donation plugin', 'nominee' ),
        'params'      => array(

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Select Form', 'nominee'),
                'param_name' => 'post_source',
                'value' => nominee_post_data('campaign'),
                'admin_label' => true,
                'description' => esc_html__('Select donate form, that you would like to show.', 'nominee'),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Form Layout', 'nominee' ),
                'param_name'  => 'form_layout',
                'value'       => array(
                    esc_html__('Default', 'nominee') => 'default-form',
                    esc_html__('Details Form', 'nominee') => 'details-form',
                    esc_html__('Portrait Form', 'nominee') => 'portrait-form',
                    esc_html__('Inline Form', 'nominee') => 'inline-form',
                    esc_html__('Goal Form', 'nominee') => 'goal-form',
                    esc_html__('Goal Form (Portrait)', 'nominee') => 'goal-form-portrait',

                ),
                'admin_label' => true,
                'description' => esc_html__( 'Choose form layout', 'nominee' )
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Input Border Style', 'nominee'),
                'param_name' => 'input_border_style',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('details-form')
                ),
                'value' => array(
                    esc_html__('Default', 'nominee') => '',
                    esc_html__('Border Bottom Only', 'nominee') => 'input-border-bottom',
                ),

            ),

            array(
                'type' => 'textarea',
                'heading' => esc_html__('Alert Message', 'nominee'),
                'param_name' => 'alert_text',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('details-form')
                ),
                'description' => esc_html__('You may add Alert Message', 'nominee'),
                'std' => esc_html__('Offering a selection of donation levels can have a big impact on how much your donors choose to give. ', 'nominee'),
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Custom Title and Content', 'nominee'),
                'param_name' => 'custom_content',
                'value' => array(
                    esc_html__('No', 'nominee') => '',
                    esc_html__('Yes', 'nominee') => 'custom-content-allow',
                ),

            ),

            array(
                'type' => 'textfield',
                'param_name' => 'title',
                'heading' => 'Enter Title',
                'description' => esc_html__('You may add custom title', 'nominee'),
                'admin_label' => true,
                'dependency' => array(
                    'element' => 'custom_content',
                    'value' => array('custom-content-allow')
                )
            ),
            

            array(
                'type' => 'textarea_html',
                'param_name' => 'content',
                'heading' => 'Enter custom content',
                'description' => esc_html__('You may add custom content', 'nominee'),
                'admin_label' => true,
                'holder' => 'span',
                'dependency' => array(
                    'element' => 'custom_content',
                    'value' => array('custom-content-allow')
                )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Show/Hide separator', 'nominee' ),
                'param_name'  => 'separator',
                'value'       => array(
                    esc_html__('Show', 'nominee') => 'show',
                    esc_html__('Hide', 'nominee')  =>'hide' ,
                ),
                'description' => esc_html__( 'You can show or hide separator from here', 'nominee' )
            ),


            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Separator color', 'nominee' ),
                'param_name'  => 'separator_color_option',
                'value'       => array(
                    esc_html__('Default color', 'nominee') => '',
                    esc_html__('Custom color', 'nominee')  =>'custom-color',
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__( 'If you change default separator color then select custom color', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'separator',
                    'value'   => array( 'show' )
                ),
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom color', 'nominee' ),
                'param_name'  => 'separator_color',
                'description' => esc_html__( 'Change purpose text color', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'separator_color_option',
                    'value'   => array( 'custom-color' )
                ),
                'edit_field_class' => 'vc_col-sm-6'
            ),


            // Donation style option

            // Heading for Subtitle
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Donate Style Options', 'nominee'),
                'param_name' => 'heading_1',
                'edit_field_class' => 'vc_col-sm-12 hidden-element',
            ),
            
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Alignment', 'nominee' ),
                'param_name'  => 'content_alignement',
                'value'       => array(
                    esc_html__('Left', 'nominee') => '',
                    esc_html__('Center', 'nominee') => 'text-center',
                    esc_html__('Right', 'nominee')  =>'text-right'
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'admin_label' => true,
                'description' => esc_html__( 'Choose content alignment', 'nominee' )
            ),


            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Content Color', 'nominee' ),
                'param_name'  => 'donate_content_color',
                'value'       => array(
                    esc_html__('Black Color', 'nominee') => '',
                    esc_html__('White Color', 'nominee')  =>'donate-content-white',
                    esc_html__('Theme Background', 'nominee')  =>'donate-content-theme',
                    esc_html__('White Background', 'nominee')  =>'donate-content-white-bg',
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'admin_label' => true,
                'description' => esc_html__( 'Choose content color', 'nominee' )
            ),

            

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Amount Button BG Color', 'nominee' ),
                'param_name'  => 'amount_btn_color',
                'edit_field_class' => 'vc_col-sm-6',
                'value'       => array(
                    esc_html__('Default', 'nominee') => '',
                    esc_html__('White', 'nominee')  =>'amount-btn-white',
                    esc_html__('Black', 'nominee')  =>'amount-btn-black',
                    esc_html__('Gray', 'nominee')  =>'amount-btn-gray',
                    esc_html__('Blue', 'nominee')  =>'amount-btn-blue',
                    esc_html__('Theme Color', 'nominee')  =>'amount-btn-theme',
                    esc_html__('Theme Drak Color', 'nominee')  =>'amount-btn-theme-dark'
                ),
                'admin_label' => true,
                'description' => esc_html__( 'Choose amount button background color', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Amount Button Active Color', 'nominee' ),
                'param_name'  => 'amount_btn_active_color',
                'value'       => array(
                    esc_html__('Default', 'nominee') => '',
                    esc_html__('White', 'nominee')  =>'amount-btn-active-white',
                    esc_html__('Black', 'nominee')  =>'amount-btn-active-black',
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'admin_label' => true,
                'description' => esc_html__( 'Choose amount button active background color', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Donate Button BG Color', 'nominee' ),
                'param_name'  => 'donate_btn_color',
                'value'       => array(
                    esc_html__('Default', 'nominee') => '',
                    esc_html__('White', 'nominee')  =>'donate-btn-white',
                    esc_html__('Black', 'nominee')  =>'donate-btn-black',
                    esc_html__('Theme Color', 'nominee')  =>'donate-btn-theme'
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'admin_label' => true,
                'description' => esc_html__( 'Choose donate button background color.', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Button Outline', 'nominee' ),
                'param_name'  => 'btn_outline',
                'value'       => array(
                    esc_html__('Yes', 'nominee') => '',
                    esc_html__('No', 'nominee')  =>'no-btn-outline',
                ),
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__( 'Choose donate button background color.', 'nominee' )
            ),


            // Show or Hide Options
            // =====================================

            array(
                'type' => 'checkbox',
                'heading' => __( 'Show Address?', 'nominee' ),
                'param_name' => 'show_address',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('details-form')
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'description' => __( 'Check, if you would like to show this filed in this form', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Show Address 2?', 'nominee' ),
                'param_name' => 'show_address_two',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('details-form')
                ),
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
                'description' => __( 'Check, if you would like to show this filed in this form', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Show City?', 'nominee' ),
                'param_name' => 'show_city',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('details-form')
                ),
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
                'description' => __( 'Check, if you would like to show this filed in this form', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Show Employer?', 'nominee' ),
                'param_name' => 'show_employer',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('details-form')
                ),
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
                'description' => __( 'Check, if you would like to show this filed in this form', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Show Occupation?', 'nominee' ),
                'param_name' => 'show_occupation',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('details-form')
                ),
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
                'description' => __( 'Check, if you would like to show this filed in this form', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Show State?', 'nominee' ),
                'param_name' => 'show_state',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('details-form')
                ),
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
                'description' => __( 'Check, if you would like to show this filed in this form', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Show Post Code?', 'nominee' ),
                'param_name' => 'show_postcode',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('details-form')
                ),
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
                'description' => __( 'Check, if you would like to show this filed in this form', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Show Phone?', 'nominee' ),
                'param_name' => 'show_phone',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('details-form')
                ),
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
                'description' => __( 'Check, if you would like to show this filed in this form', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

             // Heading for Subtitle
             array(
                'type' => 'textfield',
                'heading' => esc_html__('Showing Options', 'nominee'),
                'param_name' => 'heading_3',
                'edit_field_class' => 'vc_col-sm-12 hidden-element',
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('default-form', 'details-form', 'portrait-form', 'inline-form')
                ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Hide Payment Method?', 'nominee' ),
                'param_name' => 'hide_payment',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('details-form')
                ),
                'admin_label' => true,
                'description' => __( 'Check, if you would like to hide this section in this form', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Hide "Custom Donation Button"?', 'nominee' ),
                'param_name' => 'hide_custom_donation',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('default-form', 'details-form', 'portrait-form', 'inline-form')
                ),
                'admin_label' => true,
                'description' => __( 'Check, if you would like to hide this section in this form', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            // Heading for Subtitle
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Donation amount showing options (Optional)', 'nominee'),
                'param_name' => 'heading_4',
                'edit_field_class' => 'vc_col-sm-12 hidden-element',
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('default-form', 'details-form', 'portrait-form', 'inline-form')
                ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Hide 1st Amount', 'nominee' ),
                'param_name' => 'hide_first_child',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('default-form', 'details-form', 'portrait-form', 'inline-form')
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'admin_label' => true,
                'description' => __( 'Check, if you would like to hide 1st amount', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Hide 2nd Amount', 'nominee' ),
                'param_name' => 'hide_second_child',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('default-form', 'details-form', 'portrait-form', 'inline-form')
                ),
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
                'description' => __( 'Check, if you would like to hide 2nd amount', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Hide 3rd Amount', 'nominee' ),
                'param_name' => 'hide_third_child',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('default-form', 'details-form', 'portrait-form', 'inline-form')
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'admin_label' => true,
                'description' => __( 'Check, if you would like to hide 3rd amount', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Hide 4th Amount', 'nominee' ),
                'param_name' => 'hide_fourth_child',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('default-form', 'details-form', 'portrait-form', 'inline-form')
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'admin_label' => true,
                'description' => __( 'Check, if you would like to hide 4th amount', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Hide 5th Amount', 'nominee' ),
                'param_name' => 'hide_fifth_child',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('default-form', 'details-form', 'portrait-form', 'inline-form')
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'admin_label' => true,
                'description' => __( 'Check, if you would like to hide 5th amount', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => __( 'Hide 6th Amount', 'nominee' ),
                'param_name' => 'hide_sixth_child',
                'dependency' => array(
                    'element' => 'form_layout',
                    'value' => array('default-form', 'details-form', 'portrait-form', 'inline-form')
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'admin_label' => true,
                'description' => __( 'Check, if you would like to hide 6th amount', 'nominee' ),
                'group'         => esc_html__( 'Show or Hide', 'nominee' ),
            ),

            vc_map_add_css_animation( false ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Extra class name', 'nominee' ),
                'param_name'    => 'el_class',
                'description'   => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
            ),

            array(
                'type'          => 'css_editor',
                'heading'       => esc_html__( 'Css', 'nominee' ),
                'param_name'    => 'css',
                'group'         => esc_html__( 'Design options', 'nominee' ),
            )
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_donation_form_charitable extends WPBakeryShortCode{
        }
    }
endif;