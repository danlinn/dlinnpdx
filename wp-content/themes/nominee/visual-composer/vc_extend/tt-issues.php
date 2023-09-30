<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // issue element
    vc_map( array(
        'name'        => esc_html__( 'TT Issue', 'nominee' ),
        'base'        => 'tt_issues',
        'icon'        => 'fa fa-calendar',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Display issue', 'nominee' ),
        'params'      => array(
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Issue per page', 'nominee' ),
                'param_name'  => 'issue_limit',
                'value'       => 6,
                'admin_label' => true,
                'description' => esc_html__( 'Issues show at most 6 issues, you can change the value', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Grid Column', 'nominee' ),
                'param_name'  => 'grid_column',
                'value'       => array(
                    esc_html__('Select grid column', 'nominee')     => '',
                    esc_html__('2 columns', 'nominee')  => '6',
                    esc_html__('3 columns', 'nominee')  => '4',
                    esc_html__('4 columns', 'nominee')  => '3',
                ),
                'std'         => '4',
                'description' => esc_html__( 'Select Issue grid column', 'nominee' ),
                'dependency' => array(
                    'element' => 'issue_carousel',
                    'value' => array('disable'),
                ),
            ),

            array(
				'type' => 'dropdown',
				'heading' => esc_html__('Issue Source', 'nominee'),
				'param_name' => 'post_source',
				'value' => array(
					esc_html__('From all post', 'nominee') => "most-recent",
					esc_html__('By Category', 'nominee') => "by-category",
					esc_html__('By Post ID', 'nominee') => "by-id",
				),
				'admin_label' => true,
				'description' => esc_html__('Select issues source that you like to show.', 'nominee'),
			),

			array(
				'type' => 'autocomplete',
				'heading' => esc_html__('Issue from category', 'nominee'),
				'param_name' => 'taxonomies',
				'settings' => array(
					'multiple' => true,
					'values' => nominee_taxonomy_list('tt-issue-cat'),
					'unique_values' => true,
					'display_inline' => true,
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => esc_html__('Enter categories name to show post from specific category, multiple category allowed', 'nominee'),
				'dependency' => array(
					'element' => 'post_source',
					'value' => array('by-category'),
				),
			),

            array(
				'type' => 'textfield',
				'heading' => esc_html__('Issue from ID', 'nominee'),
				'param_name' => 'post_id',
				'description' => esc_html__('Enter the post IDs you would like to display separated by comma', 'nominee'),
				'dependency' => array(
					'element' => 'post_source',
					'value' => array('by-id'),
				),
			),
            
            array(
				'type' => 'dropdown',
				'heading' => esc_html__('Order by', 'nominee'),
				'param_name' => 'orderby',
				'edit_field_class' => 'vc_col-sm-6',
				'value' => array(
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
					esc_html__('Random order', 'nominee') => 'rand',
				),
				'admin_label' => true,
				'std' => 'date',
				'description' => esc_html__('Select order type. If "Meta value" or "Meta value Number" is chosen then meta key is required.', 'nominee'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Sort order', 'nominee'),
				'param_name' => 'order',
				'edit_field_class' => 'vc_col-sm-6',
				'value' => array(
					esc_html__('ASC', 'nominee') => 'ASC',
					esc_html__('DESC', 'nominee') => 'DESC',
				),
				'admin_label' => true,
				'std' => 'DESC',
				'description' => esc_html__('You can change default order, Default is DESC', 'nominee'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Issue offset', 'nominee'),
				'param_name' => 'offset',
				'description' => esc_html__('number of issue to displace or pass over. The offset parameter is ignored when total item => -1 (show all issues) is used.', 'nominee'),
			),

			array(
				'type' => 'autocomplete',
				'heading' => esc_html__('Exclude', 'nominee'),
				'param_name' => 'exclude',
				'description' => esc_html__('Exclude issues by title.', 'nominee'),
				'settings' => array(
					'values' => nominee_post_data('tt-issue'),
					'multiple' => true,
				),
				'param_holder_class' => 'vc_grid-data-type-not-ids',
			),

            // Heading 1
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Other Settings', 'nominee'),
                'param_name' => 'heading_1',
                'edit_field_class' => 'vc_col-sm-12 hidden-element',
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Issue Content Limit', 'nominee' ),
                'param_name'  => 'num_words',
                'value'       => 12,
                'admin_label' => true,
                'description' => esc_html__( 'Enter issue content limit', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'More Details Button Text', 'nominee' ),
                'param_name'  => 'btn_text',
                'value'       => 'Get more details',
                'admin_label' => true,
                'description' => esc_html__( 'Enter more details button text', 'nominee' )
            ),
            

            // Appearance Settings
            //=========================================================

            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Issue Background', 'nominee' ),
                'param_name' => 'overlay_bg',
                'group' => esc_html__( 'Appearance Settings', 'nominee' ),
            ),
            
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Apply Boxshadow', 'nominee' ),
                'param_name'  => 'box_shadow',
                'value'       => array(
                    esc_html__('Enable', 'nominee')     => 'enable',
                    esc_html__('Disable', 'nominee')  => 'disable',
                ),
                'std' => 'disable',
                'admin_label' => true,
                'description' => esc_html__( 'Enable or disable box-shadow', 'nominee' ),
                'group' => esc_html__( 'Appearance Settings', 'nominee' ),
            ),

            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Border Radius', 'nominee' ),
                'description' => esc_html__( 'Enter Border Radius. e.g. 5px', 'nominee' ),
                'param_name' => 'border_radius',
                'group' => esc_html__( 'Appearance Settings', 'nominee' ),
            ),



            // Heading for apprience
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Issue Carousel Settins', 'nominee'),
                'param_name' => 'heading_2',
                'edit_field_class' => 'vc_col-sm-12 hidden-element',
                'group' => esc_html__( 'Appearance Settings', 'nominee' ),
            ),
            
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Active Carousel', 'nominee' ),
                'param_name'  => 'issue_carousel',
                'value'       => array(
                    esc_html__('Enable', 'nominee')     => 'enable',
                    esc_html__('Disable', 'nominee')  => 'disable',
                ),
                'std' => 'disable',
                'admin_label' => true,
                'description' => esc_html__( 'Enable or disable issue carousel', 'nominee' ),
                'group' => esc_html__( 'Appearance Settings', 'nominee' ),
            ),
            
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Carousel Navigation Settings', 'nominee' ),
                'param_name'  => 'carousel_nav',
                'value'       => array(
                    esc_html__('Disable', 'nominee')     => 'disable',
                    esc_html__('Dots', 'nominee')  => 'dots',
                    esc_html__('Navigations', 'nominee')  => 'nav',
                ),
                'std' => 'nav',
                'admin_label' => true,
                'dependency' => array(
                    'element' => 'issue_carousel',
                    'value' => array('enable'),
                ),
                'description' => esc_html__( 'Select carouse options', 'nominee' ),
                'group' => esc_html__( 'Appearance Settings', 'nominee' ),
            ),
            
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Carousel Auto Play Mode', 'nominee' ),
                'param_name'  => 'carousel_play',
                'value'       => array(
                    esc_html__('Enable', 'nominee')  => 'enable',
                    esc_html__('Disable', 'nominee')     => 'disable',
                ),
                'std' => 'enable',
                'admin_label' => true,
                'dependency' => array(
                    'element' => 'issue_carousel',
                    'value' => array('enable'),
                ),
                'description' => esc_html__( 'Enable or disable autoplay mode', 'nominee' ),
                'group' => esc_html__( 'Appearance Settings', 'nominee' ),
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
        class WPBakeryShortCode_tt_issues extends WPBakeryShortCode {
        }
    }
endif;