<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	// Latest blog element
	vc_map( array(
		'name'        => esc_html__( 'Latest Blog Post', 'nominee'),
		'base'        => 'tt_latest_post',
		'icon'        => 'fa fa-qrcode',
		'category'    => esc_html__( 'Content', 'nominee'),
		'description' => esc_html__( 'Latest blog post', 'nominee'),
		'params'      => array(

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Layout Style', 'nominee'),
				'param_name' => 'layout_style',
				'value' => array(
					esc_html__( 'Default', 'nominee') => 'default',
					esc_html__( 'Featured Post', 'nominee') => 'featured',
					esc_html__( 'List Style', 'nominee') => 'list-style',
					esc_html__( 'Menu Style', 'nominee') => 'menu-style',
				 ),
				'admin_label' => true,
				'description' => esc_html__('Select blog layout', 'nominee'),
		   ),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Text Color Option', 'nominee'),
				'param_name' => 'text_color_option',
				'value' => array(
					esc_html__( 'Default', 'nominee') => '',
					esc_html__( 'White Text', 'nominee') => 'text-white',
				 ),
				'admin_label' => true,
				'description' => esc_html__('If you use dark background select White Text', 'nominee'),
		   ),

		   array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Post Limit', 'nominee'),
				'param_name'  => 'post_limit',
				'value'       => 3,
				'admin_label' => true,
				'description' => esc_html__( 'Enter number of post to show', 'nominee')
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Enable Border?', 'nominee'),
				'param_name' => 'default_border',
				'value' => array(
					esc_html__( 'Disable', 'nominee') => '',
					esc_html__( 'Enable', 'nominee') => 'enable',
				),
				'dependency' => array(
					'element' => 'layout_style',
					'value' => array('default'),
				),
				'admin_label' => true,
				'description' => esc_html__('Enable or disable border', 'nominee'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Select gid column', 'nominee'),
				'param_name' => 'grid_column',
				'value' => array(
					'1 Columns' => '12',
					'2 Columns' => '6',
					'3 Columns' => '4',
					'4 Columns' => '3',
				),
				'dependency' => array(
					'element' => 'layout_style',
					'value' => array('default'),
				),
				'admin_label' => true,
				'description' => esc_html__('Select grid column', 'nominee'),
			),

		   array(
				'type' => 'dropdown',
				'heading' => esc_html__('Posts Source', 'nominee'),
				'param_name' => 'post_source',
				'value' => array(
					esc_html__('From all post', 'nominee') => "most-recent",
					esc_html__('By Category', 'nominee') => "by-category",
					esc_html__('By Tag', 'nominee') => "by-tag",
					esc_html__('By Post ID', 'nominee') => "by-id",
					esc_html__('By Author', 'nominee') => "by-author",
				),
				'admin_label' => true,
				'description' => esc_html__('Select posts source that you like to show.', 'nominee'),
			),

			array(
				'type' => 'autocomplete',
				'heading' => esc_html__('Post from category', 'nominee'),
				'param_name' => 'taxonomies',
				'settings' => array(
					'multiple' => true,
					'values' => nominee_category_list(),
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
				'type' => 'autocomplete',
				'heading' => esc_html__('Post from tag', 'nominee'),
				'param_name' => 'tags',
				'settings' => array(
					'multiple' => true,
					'values' => nominee_tag_list(),
					'unique_values' => true,
					'display_inline' => true,
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => esc_html__('Enter tags name to show post from specific tag, multiple tag allowed', 'nominee'),
				'dependency' => array(
					'element' => 'post_source',
					'value' => array('by-tag'),
				),
			),

			array(
				'type' => 'autocomplete',
				'heading' => esc_html__('Post from author', 'nominee'),
				'param_name' => 'authors',
				'settings' => array(
					'multiple' => true,
					'values' => nominee_autor_list(),
					'unique_values' => true,
					'display_inline' => true,
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => esc_html__('Enter author name to show post from specific author, multiple author allowed', 'nominee'),
				'dependency' => array(
					'element' => 'post_source',
					'value' => array('by-author'),
				),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Post from ID', 'nominee'),
				'param_name' => 'post_id',
				'description' => esc_html__('Enter the post IDs you would like to display separated by comma', 'nominee'),
				'dependency' => array(
					'element' => 'post_source',
					'value' => array('by-id'),
				),
			),


			array(
				'type' => 'textfield',
				'heading' => esc_html__('Post offset', 'nominee'),
				'param_name' => 'offset',
				'description' => esc_html__('number of post to displace or pass over. The offset parameter is ignored when total item => -1 (show all posts) is used.', 'nominee'),
			),

			array(
				'type' => 'autocomplete',
				'heading' => esc_html__('Exclude', 'nominee'),
				'param_name' => 'exclude',
				'description' => esc_html__('Exclude posts by title.', 'nominee'),
				'settings' => array(
					'values' => nominee_post_data('post'),
					'multiple' => true,
				),
				'param_holder_class' => 'vc_grid-data-type-not-ids',
			),

			// Heading for Subtitle
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Others Settings', 'nominee'),
				'param_name' => 'heading_1',
				'edit_field_class' => 'vc_col-sm-12 hidden-element',
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Order by', 'nominee'),
				'param_name' => 'orderby',
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
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__('Select order type. If "Meta value" or "Meta value Number" is chosen then meta key is required.', 'nominee'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Sort order', 'nominee'),
				'param_name' => 'order',
				'value' => array(
					esc_html__('ASC', 'nominee') => 'ASC',
					esc_html__('DESC', 'nominee') => 'DESC',
				),
				'admin_label' => true,
				'std' => 'DESC',
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__('You can change default order, Default is DESC', 'nominee'),
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Word Limit', 'nominee'),
				'param_name'  => 'word_limit',
				'value'       => 15,
				'admin_label' => true,
				'dependency' => array(
					'element' => 'layout_style',
					'value' => array('default', 'featured'),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__( 'How many word would you like to show ?', 'nominee')
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Change readmore text', 'nominee'),
				'param_name'  => 'readmore_text',
				'value'		  => 'Read More',
				'admin_label' => true,
				'description' => esc_html__( 'You can change readmore text', 'nominee'),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'layout_style',
					'value' => array('default', 'featured'),
				),
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Change button text', 'nominee'),
				'param_name'  => 'button_text',
				'value'		  => esc_html__( 'View all news', 'nominee'),
				'admin_label' => true,
				'description' => esc_html__( 'You can change button text', 'nominee'),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'layout_style',
					'value' => array('menu-style'),
				),
			),

			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'nominee'),
				'param_name'  => 'custom_link',
				'description' => esc_html__( 'Enter link or select a page as link', 'nominee'),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'layout_style',
					'value' => array('menu-style'),
				),
			),


			// Heading for Subtitle
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Visibility Options', 'nominee'),
				'param_name' => 'heading_2',
				'edit_field_class' => 'vc_col-sm-12 hidden-element',
			),

			array(
		         'type' => 'dropdown',
		         'heading' => esc_html__('Post like visibility', 'nominee'),
		         'param_name' => 'post_like',
		         'value' => array(
		              'Visible' => 'show',
		              'Hidden' 	=> 'hide'
		          ),
				 'std'			=> 'show',
				 'edit_field_class' => 'vc_col-sm-6',
		         'description' 	=> esc_html__('Select post cat visibility option', 'nominee'),
		    ),

		    array(
		         'type' => 'dropdown',
		         'heading' => esc_html__('Post Date visibility', 'nominee'),
		         'param_name' => 'post_date',
		         'value' => array(
		              'Visible' => 'show',
		              'Hidden' 	=> 'hide'
		          ),
				 'std'			=> 'show',
				 'edit_field_class' => 'vc_col-sm-6',
		         'description' 	=> esc_html__('Select post date visibility option', 'nominee'),
		    ),

			array(
		         'type' => 'colorpicker',
		         'heading' => esc_html__('Border Bottom Color', 'nominee'),
		         'param_name' => 'border_color',
				 'edit_field_class' => 'vc_col-sm-6',
				 'dependency' => array(
					'element' => 'layout_style',
					'value' => array('menu-style', 'list-style'),
				),
		         'group'		=> esc_html__('Others Settings', 'nominee'),
		         'description' 	=> esc_html__('You may change border bottom color.', 'nominee'),
		    ),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Border Radius', 'nominee'),
				'param_name' => 'border_radius',
				'value' => array(
					'Enable' => 'enable',
					'Disable' => 'disable'
				),
				'std'			=> 'disable',
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'layout_style',
					'value' => array('default'),
				),
				'description' 	=> esc_html__('You may allow border radius every post', 'nominee'),
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Padding Bottom', 'nominee'),
				'param_name'  => 'padding_bottom',
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__( 'This is a optional field. You may increase or decrease padding bottom for adjusting.', 'nominee')
			),
			

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'nominee'),
				'param_name'  => 'el_class',
				'admin_label' => true,
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee')
			),

			// vc_map_add_css_animation( false ),

			// animation_delay(),

			array(
				'type' => 'css_editor',
				'heading' => esc_html__('Css', 'nominee'),
				'param_name' => 'css',
				'group' => esc_html__('Design options', 'nominee'),
			),

		)
	));


	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_tt_Latest_Post extends WPBakeryShortCode {
		}
	}
endif;