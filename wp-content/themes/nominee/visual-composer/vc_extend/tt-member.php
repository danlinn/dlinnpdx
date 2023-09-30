<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // TT Member element
    vc_map( array(
        'name'                    => esc_html__( 'Members', 'nominee' ),
        'base'                    => 'tt_member',
        'icon'                    => 'fa fa-user',
        'category'                => esc_html__( 'TT Elements', 'nominee' ),
        'description'             => esc_html__( 'Show off member', 'nominee' ),
        'params'                  => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Member source', 'nominee' ),
                'param_name'  => 'member_source',
                'value'       => array(
                    esc_html__('From all member', 'nominee') => 'all-member',
                    esc_html__('By category', 'nominee')  => 'category-member',
                    esc_html__('By member', 'nominee')  => 'single-member',
                    esc_html__('By member ID', 'nominee')  => 'by-id'
                    ),
                'std' => 'all-member',
                'description' => esc_html__( 'Select member source', 'nominee' )
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__('Member from ID', 'nominee'),
                'param_name'    => 'member_id',
                'description'   => esc_html__('Enter the member IDs you would like to display, separated by comma.', 'nominee'),
                'dependency'    => array(
                    'element'   => 'member_source',
                    'value'     => array('by-id')
                )
            ),

            array(
                'type'          => 'autocomplete',
                'heading'       => esc_html__( 'Member from category', 'nominee' ),
                'param_name'    => 'taxonomies',
                'settings'      => array(
                    'multiple'      => true,
                    'values'        => nominee_category_slug('tt-member-cat'),
                    'unique_values' => true,
                    'display_inline' => true
                ),
                'param_holder_class' => 'vc_not-for-custom',
                'description' => esc_html__( 'Enter categories name to show member from specific category, multiple category allowed', 'nominee' ),
                'dependency'    => array(
                    'element'   => 'member_source',
                    'value'     => array('category-member')
                )
            ),

            array(
                'type'          => 'autocomplete',
                'heading'       => esc_html__( 'Specific single member', 'nominee' ),
                'param_name'    => 'single_member',
                'settings'      => array(
                    'multiple'      => false,
                    'values'        => nominee_post_data('tt-member'),
                    'unique_values' => true,
                    'display_inline' => true
                ),
                'param_holder_class' => 'vc_not-for-custom',
                'description' => esc_html__( 'Enter member name to show the member', 'nominee' ),
                'dependency'    => array(
                    'element'   => 'member_source',
                    'value'     => array('single-member')
                )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Member Limit', 'nominee' ),
                'param_name'  => 'post_limit',
                'value'       => -1,
                'admin_label' => true,
                'description' => esc_html__( 'Enter member post number to display member, -1 for no limit', 'nominee' ),
                'dependency'    => array(
                    'element'   => 'member_source',
                    'value'     => array('category-member', 'all-member')
                )
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Order by', 'nominee'),
                'param_name'    => 'orderby',
                'value'         => array(
                    esc_html__('Date', 'nominee') => 'date',
                    esc_html__('Order by post ID', 'nominee') => 'ID',
                    esc_html__('Author', 'nominee') => 'author',
                    esc_html__('Title', 'nominee') => 'title',
                    esc_html__('Last modified date', 'nominee') => 'modified',
                    esc_html__('Post parent ID', 'nominee') => 'parent',
                    esc_html__('Number of comments', 'nominee') => 'comment_count',
                    esc_html__('Menu order', 'nominee') => 'menu_order',
                    esc_html__('Meta value', 'nominee') => 'meta_value',
                    esc_html__('Meta value number', 'nominee') => 'meta_value_num',
                    esc_html__('Random order', 'nominee') => 'rand'
                ),
                'admin_label'   => true,
                'std'           => 'date',
                'description'   => esc_html__( 'Select order type. If "Meta value" or "Meta value Number" is chosen then meta key is required.', 'nominee'),
                'dependency'    => array(
                    'element'   => 'member_source',
                    'value'     => array('category-member', 'all-member', 'by-id')
                )
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Sort order', 'nominee'),
                'param_name'    => 'order',
                'value'         => array(
                    esc_html__('Descending', 'nominee') => 'DESC',
                    esc_html__('Ascending', 'nominee') => 'ASC',
                ),
                'admin_label'   => true,
                'std'           => 'DESC',
                'description'   => esc_html__( 'Select sorting order.', 'nominee'),
                'dependency'    => array(
                    'element'   => 'member_source',
                    'value'     => array('category-member', 'all-member', 'by-id')
                )
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__('Member offset', 'nominee'),
                'param_name'    => 'offset',
                'description'   => esc_html__('number of member to displace or pass over. The offset parameter is ignored when total item => -1 (show all members) is used.', 'nominee'),
                'dependency'    => array(
                    'element'   => 'member_source',
                    'value'     => array('category-member', 'all-member', 'by-id')
                )
            ),

            array(
                'type'          => 'autocomplete',
                'heading'       => esc_html__( 'Exclude', 'nominee' ),
                'param_name'    => 'exclude',
                'description'   => esc_html__( 'Exclude member by title.', 'nominee' ),
                'settings'      => array(
                    'values'    => nominee_post_data('tt-member'),
                    'multiple'  => true,
                ),
                'param_holder_class' => 'vc_grid-data-type-not-ids',
                'dependency'    => array(
                    'element'   => 'member_source',
                    'value'     => array('category-member', 'all-member', 'by-id')
                )
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__('Grid column', 'nominee'),
                'param_name'    => 'grid_column',
                'value'         => array(
                    esc_html__('1 Column', 'nominee') => '12',
                    esc_html__('2 Column', 'nominee') => '6',
                    esc_html__('3 Column', 'nominee') => '4',
                    esc_html__('4 Column', 'nominee') => '3',
                ),
                'admin_label'   => true,
                'std'           => '3',
                'description'   => esc_html__('Select member grid column', 'nominee')
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Biography option visibility', 'nominee' ),
                'param_name'  => 'bio_visibility',
                'value'       => array(
                    esc_html__('Visible', 'nominee') => 'visible-bio',
                    esc_html__('Hidden', 'nominee')  =>'hiddden-bio'
                    ),
                'admin_label' => true,
                'description' => esc_html__( 'If do not want to show bio option then select hidden', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Member designation visibility', 'nominee' ),
                'param_name'  => 'designation_visibility',
                'value'       => array(
                    esc_html__('Visible', 'nominee') => 'visible-designation',
                    esc_html__('Hidden', 'nominee')  =>'hiddden-designation'
                    ),
                'std'         => 'visible-designation',
                'admin_label' => true,
                'description' => esc_html__( 'If do not want to show member designation option then select hidden', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Member social icon visibility', 'nominee' ),
                'param_name'  => 'social_visibility',
                'value'       => array(
                    esc_html__('Visible', 'nominee') => 'visible-social',
                    esc_html__('Hidden', 'nominee')  =>'hiddden-social'
                    ),
                'std'         => 'visible-social',
                'admin_label' => true,
                'description' => esc_html__( 'If do not want to show member social icon option then select hidden', 'nominee' )
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

    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_TT_Member extends WPBakeryShortCode {
        }
    }

endif;