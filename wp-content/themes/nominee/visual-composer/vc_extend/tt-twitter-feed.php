<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // TT Twitter feed element
    vc_map( array(
        'name'        => esc_html__( 'TT Twitter Feed', 'nominee' ),
        'base'        => 'tt_twitter_feed',
        'icon'        => 'fa fa-twitter',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Show off latest twitter feed', 'nominee' ),
        'params'      => array(

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Twitter username', 'nominee' ),
                'param_name'  => 'twitter_id',
                'admin_label' => true,
                'description' => esc_html__( 'Enter twitter username, e.g: trendy_theme', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Max tweet number', 'nominee' ),
                'param_name'  => 'twitter_number',
                'admin_label' => true,
                'description' => esc_html__( 'Enter number of twitter that you want to show', 'nominee' )
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
                'admin_label' => true,
                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
            )
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_Twitter_Feed extends WPBakeryShortCode {
        }
    }
endif;