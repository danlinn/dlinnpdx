<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :
    vc_map( array(
        'name'                    => esc_html__( 'Donation List', 'nominee' ),
        'base'                    => 'tt_donation_list',
        'icon'                    => 'fa fa-user',
        'category'                => esc_html__( 'TT Elements', 'nominee' ),
        'description'             => esc_html__( 'Displays donation list, required charitable plugin', 'nominee' ),
        'params'                  => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Donation source', 'nominee' ),
                'param_name'  => 'donation_source',
                'value'       => array(
                    esc_html__('From all donation', 'nominee') => 'all-donation',
                    esc_html__('By category', 'nominee')  => 'category-donation',
                    esc_html__('By donation', 'nominee')  => 'single-donation',
                    esc_html__('By donation ID', 'nominee')  => 'by-id'
                    ),
                'std' => 'all-donation',
                'description' => esc_html__( 'Select donation source', 'nominee' )
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__('Donation from ID', 'nominee'),
                'param_name'    => 'donation_id',
                'description'   => esc_html__('Enter the donation IDs you would like to display, separated by comma.', 'nominee'),
                'dependency'    => array(
                    'element'   => 'donation_source',
                    'value'     => array('by-id')
                )
            ),

            array(
                'type'          => 'autocomplete',
                'heading'       => esc_html__( 'Donation from category', 'nominee' ),
                'param_name'    => 'taxonomies',
                'settings'      => array(
                    'multiple'      => true,
                    'values'        => nominee_category_slug('campaign_category'),
                    'unique_values' => true,
                    'display_inline' => true
                ),
                'param_holder_class' => 'vc_not-for-custom',
                'description' => esc_html__( 'Enter categories name to show donation from specific category, multiple category allowed', 'nominee' ),
                'dependency'    => array(
                    'element'   => 'donation_source',
                    'value'     => array('category-donation')
                )
            ),

            array(
                'type'          => 'autocomplete',
                'heading'       => esc_html__( 'Specific single donation', 'nominee' ),
                'param_name'    => 'single_donation',
                'settings'      => array(
                    'multiple'      => false,
                    'values'        => nominee_post_data('campaign'),
                    'unique_values' => true,
                    'display_inline' => true
                ),
                'param_holder_class' => 'vc_not-for-custom',
                'description' => esc_html__( 'Enter donation name to show the donation', 'nominee' ),
                'dependency'    => array(
                    'element'   => 'donation_source',
                    'value'     => array('single-donation')
                )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Donation Limit', 'nominee' ),
                'param_name'  => 'post_limit',
                'value'       => -1,
                'admin_label' => true,
                'description' => esc_html__( 'Enter donation post number to display donation, -1 for no limit', 'nominee' ),
                'dependency'    => array(
                    'element'   => 'donation_source',
                    'value'     => array('category-donation', 'all-donation')
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
                    'element'   => 'donation_source',
                    'value'     => array('category-donation', 'all-donation', 'by-id')
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
                    'element'   => 'donation_source',
                    'value'     => array('category-donation', 'all-donation', 'by-id')
                )
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__('Donation offset', 'nominee'),
                'param_name'    => 'offset',
                'description'   => esc_html__('number of donation to displace or pass over. The offset parameter is ignored when total item => -1 (show all donations) is used.', 'nominee'),
                'dependency'    => array(
                    'element'   => 'donation_source',
                    'value'     => array('category-donation', 'all-donation', 'by-id')
                )
            ),

            array(
                'type'          => 'autocomplete',
                'heading'       => esc_html__( 'Exclude', 'nominee' ),
                'param_name'    => 'exclude',
                'description'   => esc_html__( 'Exclude donation by title.', 'nominee' ),
                'settings'      => array(
                    'values'    => nominee_post_data('tt-donation'),
                    'multiple'  => true,
                ),
                'param_holder_class' => 'vc_grid-data-type-not-ids',
                'dependency'    => array(
                    'element'   => 'donation_source',
                    'value'     => array('category-donation', 'all-donation', 'by-id')
                )
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__('Grid column', 'nominee'),
                'param_name'    => 'grid_column',
                'value'         => array(
                    esc_html__('2 Column', 'nominee') => '6',
                    esc_html__('3 Column', 'nominee') => '4',
                    esc_html__('4 Column', 'nominee') => '3',
                ),
                'admin_label'   => true,
                'std'           => '4',
                'description'   => esc_html__('Select donation grid column', 'nominee')
            ),

            // content padding
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__('Enable content padding', 'nominee'),
                'param_name'    => 'content_padding',
                'value'         => array(
                    esc_html__('Enable', 'nominee') => 'enable-content-padding',
                    esc_html__('Disable', 'nominee') => 'disable-content-padding'
                ),
                'admin_label'   => true,
                'std'           => 'enable',
                'description'   => esc_html__('Select content padding option', 'nominee')
            ),

            // goal progressbar padding
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__('Enable progressbar wrapper padding', 'nominee'),
                'param_name'    => 'progressbar_padding',
                'value'         => array(
                    esc_html__('Enable', 'nominee') => 'enable-progressbar-padding',
                    esc_html__('Disable', 'nominee') => 'disable-progressbar-padding'
                ),
                'admin_label'   => true,
                'std'           => 'enable',
                'description'   => esc_html__('Select progressbar wrapper padding option', 'nominee')
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__('Show donation button', 'nominee'),
                'param_name'    => 'donation_button',
                'value'         => array(
                    esc_html__('Hide', 'nominee') => 'hide',
                    esc_html__('Show', 'nominee') => 'show'
                ),
                'admin_label'   => true,
                'std'           => 'hide',
                'description'   => esc_html__('Select donation button visibility option, link with donation single page', 'nominee')
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Button text', 'nominee' ),
                'param_name'    => 'button_text',
                'description'   => esc_html__( 'Enter button text', 'nominee' ),
                'value'         => esc_html__( 'Donate Now', 'nominee' ),
                'dependency'  => array(
                    'element' => 'donation_button',
                    'value'   => array( 'show' )
                )
            ),


            // Visibility options
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title botton separator visibility', 'nominee' ),
                'param_name'  => 'separator_visibility',
                'value'       => array(
                    esc_html__('Visible', 'nominee') => 'visible',
                    esc_html__('Hidden', 'nominee')  =>'hidden'
                ),
                'std'         => 'visible',
                'group'         => esc_html__( 'Visibility', 'nominee' ),
                'description' => esc_html__( 'Select title bottom separator visibility option', 'nominee' )
            ),

            // title visibility
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title visibility', 'nominee' ),
                'param_name'  => 'title_visibility',
                'value'       => array(
                    esc_html__('Visible', 'nominee') => 'visible',
                    esc_html__('Hidden', 'nominee')  =>'hidden'
                ),
                'std'         => 'visible',
                'group'         => esc_html__( 'Visibility', 'nominee' ),
                'description' => esc_html__( 'Select title visibility option', 'nominee' )
            ),

            // category visibility
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Category visibility', 'nominee' ),
                'param_name'  => 'category_visibility',
                'value'       => array(
                    esc_html__('Visible', 'nominee') => 'visible',
                    esc_html__('Hidden', 'nominee')  =>'hidden'
                ),
                'std'         => 'visible',
                'group'         => esc_html__( 'Visibility', 'nominee' ),
                'description' => esc_html__( 'Select category visibility option', 'nominee' )
            ),

            // content visibility
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Content visibility', 'nominee' ),
                'param_name'  => 'content_visibility',
                'value'       => array(
                    esc_html__('Visible', 'nominee') => 'visible',
                    esc_html__('Hidden', 'nominee')  =>'hidden'
                ),
                'std'         => 'visible',
                'group'         => esc_html__( 'Visibility', 'nominee' ),
                'description' => esc_html__( 'Select content visibility option', 'nominee' )
            ),

            // donation raised and goal
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Donation raise & goal visibility', 'nominee' ),
                'param_name'  => 'raise_goal_visibility',
                'value'       => array(
                    esc_html__('Visible', 'nominee') => 'visible',
                    esc_html__('Hidden', 'nominee')  =>'hidden'
                ),
                'std'         => 'visible',
                'group'         => esc_html__( 'Visibility', 'nominee' ),
                'description' => esc_html__( 'Select donation raise & goal visibility option', 'nominee' )
            ),

            // donation progressbar
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Donation progressbar visibility', 'nominee' ),
                'param_name'  => 'donation_progress',
                'value'       => array(
                    esc_html__('Visible', 'nominee') => 'visible',
                    esc_html__('Hidden', 'nominee')  =>'hidden'
                ),
                'std'         => 'visible',
                'group'         => esc_html__( 'Visibility', 'nominee' ),
                'description' => esc_html__( 'Select donation progress visibility option', 'nominee' )
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
        class WPBakeryShortCode_TT_Donation_List extends WPBakeryShortCode {
        }
    }

endif;