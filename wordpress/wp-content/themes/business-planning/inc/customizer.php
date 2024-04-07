<?php

/**
 * Business Planning Theme Customizer
 *
 * @package Business Planning
 */



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_planning_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    //select sanitization function
    function business_planning_sanitize_select($input, $setting)
    {
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
    function business_planning_sanitize_image($file, $setting)
    {
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
        //check file type from file name
        $file_ext = wp_check_filetype($file, $mimes);
        //if file has a valid mime type return it, otherwise return default
        return ($file_ext['ext'] ? $file : $setting->default);
    }

    $wp_customize->add_setting('business_planning_site_tagline_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('business_planning_site_tagline_show', array(
        'label'      => __('Hide Site Tagline Only? ', 'business-planning'),
        'section'    => 'title_tagline',
        'settings'   => 'business_planning_site_tagline_show',
        'type'       => 'checkbox',

    ));

    $wp_customize->add_panel('business_planning_settings', array(
        'priority'       => 50,
        'title'          => __('Business Planning Theme settings', 'business-planning'),
        'description'    => __('All Business Planning theme settings', 'business-planning'),
    ));
    $wp_customize->add_section('business_planning_header', array(
        'title' => __('Business Planning Header Settings', 'business-planning'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Business Planning theme header settings', 'business-planning'),
        'panel'    => 'business_planning_settings',

    ));
    $wp_customize->add_setting('business_planning_main_menu_style', array(
        'default'        => 'style1',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'business_planning_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_planning_main_menu_style', array(
        'label'      => __('Main Menu Style', 'business-planning'),
        'description' => __('You can set the menu style one or two. ', 'business-planning'),
        'section'    => 'business_planning_header',
        'settings'   => 'business_planning_main_menu_style',
        'type'       => 'select',
        'choices'    => array(
            'style1' => __('Style One', 'business-planning'),
            'style2' => __('Style Two', 'business-planning'),
        ),
    ));

    //Business Planning  Home intro
    $wp_customize->add_section('business_planning_intro', array(
        'title' => __('Home Intro Settings', 'business-planning'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Portfoli profile Intro Settings', 'business-planning'),
        'panel'    => 'business_planning_settings',

    ));
    $wp_customize->add_setting('business_planning_intro_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  1,
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('business_planning_intro_show', array(
        'label'      => __('Show Header Intro? ', 'business-planning'),
        'section'    => 'business_planning_intro',
        'settings'   => 'business_planning_intro_show',
        'type'       => 'checkbox',

    ));
    $wp_customize->add_setting('business_planning_intro_img', array(
        'capability'        => 'edit_theme_options',
        'default'           => get_template_directory_uri() . '/assets/img/profile-img.png',
        'sanitize_callback' => 'business_planning_sanitize_image',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'business_planning_intro_img',
        array(
            'label'    => __('Upload Profile Image', 'business-planning'),
            'description'    => __('Image size should be 450px width & 460px height for better view.', 'business-planning'),
            'section'  => 'business_planning_intro',
            'settings' => 'business_planning_intro_img',
        )
    ));
    $wp_customize->add_setting('business_planning_intro_subtitle', array(
        'default' => __('Best Marketing Agency', 'business-planning'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_planning_intro_subtitle', array(
        'label'      => __('Intro Subtitle', 'business-planning'),
        'section'    => 'business_planning_intro',
        'settings'   => 'business_planning_intro_subtitle',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('business_planning_intro_title', array(
        'default' => __('We Provide Business', 'business-planning'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_planning_intro_title', array(
        'label'      => __('Intro Title', 'business-planning'),
        'section'    => 'business_planning_intro',
        'settings'   => 'business_planning_intro_title',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('business_planning_intro_designation', array(
        'default' => __('Planning Solution', 'business-planning'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_planning_intro_designation', array(
        'label'      => __('Designation', 'business-planning'),
        'section'    => 'business_planning_intro',
        'settings'   => 'business_planning_intro_designation',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('business_planning_intro_desc', array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_planning_intro_desc', array(
        'label'      => __('Intro Description', 'business-planning'),
        'section'    => 'business_planning_intro',
        'settings'   => 'business_planning_intro_desc',
        'type'       => 'textarea',
    ));
    $wp_customize->add_setting('business_planning_btn_text_one', array(
        'default' => __('Discover More', 'business-planning'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('business_planning_btn_text_one', array(
        'label'      => __('Button one text', 'business-planning'),
        'section'    => 'business_planning_intro',
        'settings'   => 'business_planning_btn_text_one',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('business_planning_btn_url_one', array(
        'default' => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_planning_btn_url_one', array(
        'label'      => __('Button one url', 'business-planning'),
        'description'      => __('Keep url empty for hide this button', 'business-planning'),
        'section'    => 'business_planning_intro',
        'settings'   => 'business_planning_btn_url_one',
        'type'       => 'url',
    ));
    $wp_customize->add_setting('business_planning_btn_text_two', array(
        'default'     => __('Learn More', 'business-planning'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('business_planning_btn_text_two', array(
        'label'      => __('Button two text', 'business-planning'),
        'section'    => 'business_planning_intro',
        'settings'   => 'business_planning_btn_text_two',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('business_planning_btn_url_two', array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_planning_btn_url_two', array(
        'label'      => __('Button two url', 'business-planning'),
        'description'      => __('Keep url empty for hide this button', 'business-planning'),
        'section'    => 'business_planning_intro',
        'settings'   => 'business_planning_btn_url_two',
        'type'       => 'text',
    ));

    //Business Planning  blog settings
    $wp_customize->add_section('business_planning_blog', array(
        'title' => __('Business Planning Blog Settings', 'business-planning'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Business Planning theme blog settings', 'business-planning'),
        'panel'    => 'business_planning_settings',

    ));
    $wp_customize->add_setting('business_planning_blog_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'business_planning_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_planning_blog_container', array(
        'label'      => __('Container type', 'business-planning'),
        'description' => __('You can set standard container or full width container. ', 'business-planning'),
        'section'    => 'business_planning_blog',
        'settings'   => 'business_planning_blog_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'business-planning'),
            'container-fluid' => __('Full width Container', 'business-planning'),
        ),
    ));
    $wp_customize->add_setting('business_planning_blog_layout', array(
        'default'        => 'fullwidth',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'business_planning_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_planning_blog_layout', array(
        'label'      => __('Select Blog Layout', 'business-planning'),
        'description' => __('Right and Left sidebar only show when sidebar widget is available. ', 'business-planning'),
        'section'    => 'business_planning_blog',
        'settings'   => 'business_planning_blog_layout',
        'type'       => 'select',
        'choices'    => array(
            'rightside' => __('Right Sidebar', 'business-planning'),
            'leftside' => __('Left Sidebar', 'business-planning'),
            'fullwidth' => __('No Sidebar', 'business-planning'),
        ),
    ));
    $wp_customize->add_setting('business_planning_blog_style', array(
        'default'        => 'grid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'business_planning_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_planning_blog_style', array(
        'label'      => __('Select Blog Style', 'business-planning'),
        'section'    => 'business_planning_blog',
        'settings'   => 'business_planning_blog_style',
        'type'       => 'select',
        'choices'    => array(
            'grid' => __('Grid Style', 'business-planning'),
            'list' => __('List Style', 'business-planning'),
            'classic' => __('Classic Style', 'business-planning'),
        ),
    ));
    //Business Planning  page settings
    $wp_customize->add_section('business_planning_page', array(
        'title' => __('Business Planning Page Settings', 'business-planning'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Business Planning theme blog settings', 'business-planning'),
        'panel'    => 'business_planning_settings',

    ));
    $wp_customize->add_setting('business_planning_page_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'business_planning_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_planning_page_container', array(
        'label'      => __('Page Container type', 'business-planning'),
        'description' => __('You can set standard container or full width container for page. ', 'business-planning'),
        'section'    => 'business_planning_page',
        'settings'   => 'business_planning_page_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'business-planning'),
            'container-fluid' => __('Full width Container', 'business-planning'),
        ),
    ));
    $wp_customize->add_setting('business_planning_page_header', array(
        'default'        => 'show',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'business_planning_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('business_planning_page_header', array(
        'label'      => __('Show Page header', 'business-planning'),
        'section'    => 'business_planning_page',
        'settings'   => 'business_planning_page_header',
        'type'       => 'select',
        'choices'    => array(
            'show' => __('Show all pages', 'business-planning'),
            'hide-home' => __('Hide Only Front Page', 'business-planning'),
            'hide' => __('Hide All Pages', 'business-planning'),
        ),
    ));




    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'business_planning_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'business_planning_customize_partial_blogdescription',
            )
        );
    }
}
add_action('customize_register', 'business_planning_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function business_planning_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function business_planning_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_planning_customize_preview_js()
{
    wp_enqueue_script('business-planning-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), BUSINESS_PLANNING_VERSION, true);
}
add_action('customize_preview_init', 'business_planning_customize_preview_js');
