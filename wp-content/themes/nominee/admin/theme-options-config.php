<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// ReduxFramework  Config File
// For full documentation, please visit: https://docs.reduxframework.com
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! class_exists( 'Redux' ) ) {
    return;
}


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// This is your option name where all the Redux data is stored.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

$opt_name = "nominee_theme_option";


/**
 * SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => TRUE,
    // Show the sections below the admin menu item or not
    'menu_title'           => sprintf( esc_html__( '%s Options', 'nominee' ), $theme->get( 'Name' ) ),
    'page_title'           => sprintf( esc_html__( '%s Theme Options', 'nominee' ), $theme->get( 'Name' ) ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => FALSE,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => TRUE,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => TRUE,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => FALSE,
    // Show the time the page took to load, etc
    'update_notice'        => TRUE,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => TRUE,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => '40',
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => TRUE,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => FALSE,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => TRUE,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => TRUE,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => TRUE,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    'footer_credit'        => sprintf( esc_html__( '%s Theme Options', 'nominee' ), $theme->get( 'Name' ) ),
    // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => TRUE,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => TRUE,
            'rounded' => FALSE,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);

Redux::setArgs( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// START SECTIONS
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

// General Settings
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-cogs',
    'title'  => esc_html__('General Settings', 'nominee'),
    'fields' => array(
        array(
            'id'        => 'site-layout',
            'type'      => 'select',
            'title'     => esc_html__( 'Select site layout', 'nominee' ),
            'options'   => array(
                'fullwidth-layout'      => esc_html__( 'Full Width Layout', 'nominee' ),
                'box-layout'    => esc_html__( 'Box Layout', 'nominee' ),
                'box-framed-layout'    => esc_html__( 'Box Frame Layout', 'nominee' ),
                'border-layout'    => esc_html__( 'Full width Box Layout', 'nominee' )
            ),
            'default'   => 'fullwidth-layout'
        ),

        array(
            'id'       => 'layout-background',
            'type'     => 'background',
            'title'    => esc_html__('Body Background image', 'nominee'),
            'subtitle' => esc_html__('Body background with image, color, etc.', 'nominee'),
            'output'    => array('body'),
            'default'   => array(
                'background-color'      => '#ffffff',
                'background-repeat'     => 'no-repeat',
                'background-position'   => 'center top',
                'background-size'       => 'cover',
                'background-attachment' => 'fixed'
            )
        ),

        array(
            'id'       => 'rtl',
            'type'     => 'switch',
            'title'    => esc_html__('RTL', 'nominee'),
            'subtitle' => esc_html__('Enable or Disabled RTL', 'nominee'),
            'on'       => esc_html__('Enable', 'nominee'),
            'off'      => esc_html__('Disabled', 'nominee'),
            'default'  => FALSE,
        )
    )
));

// Header settings
Redux::setSection( $opt_name, array(
    'icon'   => 'el el-website',
    'title'  => esc_html__( 'Header Settings', 'nominee' ),
    'fields' => array(
        
        // header style
        array(
            'id'       => 'header-style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Header styles', 'nominee' ),
            'subtitle' => esc_html__( 'Select Header Style.', 'nominee' ),
            'options'  => array(
                'header-default'   => array(
                    'alt' => esc_html__('Header default', 'nominee'),
                    'img' => get_template_directory_uri() . '/images/header-default.jpg'
                ),
                'header-transparent'   => array(
                    'alt' => esc_html__('Header transparent', 'nominee'),
                    'img' => get_template_directory_uri() . '/images/header-transparent.jpg'
                ),
                'header-fullwidth'   => array(
                    'alt' => esc_html__('Header fullwidth', 'nominee'),
                    'img' => get_template_directory_uri() . '/images/header-fullwidth.jpg'
                ),
                'header-center-logo'   => array(
                    'alt' => esc_html__('Header center logo', 'nominee'),
                    'img' => get_template_directory_uri() . '/images/header-center-logo.jpg'
                ),
                'header-box-style'   => array(
                    'alt' => esc_html__('Header box style', 'nominee'),
                    'img' => get_template_directory_uri() . '/images/header-box-style.jpg'
                ),
                'no-header'   => array(
                    'alt' => esc_html__('No Header', 'nominee'),
                    'img' => get_template_directory_uri() . '/images/no-header.jpg'
                )
            ),
            'default'  => 'header-default'
        ),


        /**
         * Social Icon Settings for center logo and box style header
         */
        array(
            'id'       => 'header-social_links',
            'type'     => 'switch',
            'title'    => esc_html__('Social Icons Visibility', 'nominee'),
            'subtitle' => esc_html__('Visible or Hidden social icons', 'nominee'),
            'desc'     => esc_html__('More settings you will be found in the Social Icon Settings Tab', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => TRUE,
            'required' => array('header-style', '=', array('header-center-logo', 'header-box-style')),
        ),

        /**
         * Offcanvas Settings for Fullwidth menu
         */
        array(
            'id'    => 'offcanvas_info_headding',
            'type'  => 'info',
            'class' => 'redux-heading',
            'required' => array('header-style', '=', 'header-fullwidth'),
            'title' => esc_html__('Offcanvas Settings', 'nominee'),
        ),
        array(
            'id'       => 'offcanvas-visibility',
            'type'     => 'switch',
            'title'    => esc_html__('Offcanvas visibility', 'nominee'),
            'subtitle' => esc_html__('Visible or Hidden offcanvas button', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => TRUE,
            'required' => array('header-style', '=', 'header-fullwidth'),
        ),

        array(
            'id'       => 'mobile-menu-text',
            'type'     => 'text',
            'required' => array('header-style', '=', 'header-fullwidth'),
            'title'    => esc_html__('Mobile menu text', 'nominee'),
            'default'  => esc_html__('Mobile Menu', 'nominee')
        ),

        array(
            'id'       => 'offcanvas-bg-color',
            'type'     => 'background',
            'output'    => array('.offcanvas-container'),
            'required' => array('header-style', '=', 'header-fullwidth'),
            'title'    => esc_html__( 'Offcanvas background color', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for offcanvas background.', 'nominee' ),
            'background-repeat' => false,
            'background-attachment' => false,
            'background-position' => false,
            'background-image' => false,
            'background-size' => false,
            'preview' => false,
        ),

        array(
            'id'       => 'offcanvas-text-color',
            'type'     => 'color',
            'output'    => array('.offcanvas-container', '.offcanvas-container .footer-sidebar .widget .widget-title', '.offcanvas-container p', '.offcanvas-container li', '.offcanvas-container a', '.offcanvas-container div'),
            'required' => array('header-style', '=', 'header-fullwidth'),
            'title'    => esc_html__( 'Offcanvas text color color', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for offcanvas text.', 'nominee' ),
            'transparent' => false
        ),


        /**
         * HEADER BOX STYLE CONTACT INFO
         */
        array(
            'id'    => 'header_contact_info_headding',
            'type'  => 'info',
            'class' => 'redux-heading',
            'required' => array('header-style', '=', 'header-box-style'),
            'title' => esc_html__('Contact Settings', 'nominee'),
        ),
        array(
            'id'       => 'header-box-contact-visibility',
            'type'     => 'switch',
            'required' => array('header-style', '=', 'header-box-style'),
            'title'    => esc_html__('Contact visibility', 'nominee'),
            'subtitle' => esc_html__('Visible or Hidden contact info', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => TRUE,
        ),
        array(
            'id'       => 'header-box-contact',
            'type'     => 'editor',
            'required' => array('header-style', '=', 'header-box-style'),
            'title'    => esc_html__('Header contact', 'nominee'),
            'subtitle' => esc_html__('Change header contact info', 'nominee'),
            'default'  => '<ul><li><i class="fa fa-phone"></i><span class="number-info">Give us a miss call<strong>8635 478 963</strong></span></li><li><i class="fa fa-envelope-o"></i><span class="number-info">Share your thoughts<strong><a href="mailto:hey@address.net">hey@address.net</a></strong></span></li></ul>'
        ),

        /**
         * HEADER BOX STYLE REPORT BUTTON
         */
        array(
            'id'    => 'report_btn_info_headding',
            'type'  => 'info',
            'class' => 'redux-heading',
            'required' => array('header-style', '=', 'header-box-style'),
            'title' => esc_html__('Report Button Settings', 'nominee'),
        ),
        array(
            'id'       => 'report-visibility',
            'type'     => 'switch',
            'required' => array('header-style', '=', 'header-box-style'),
            'title'    => esc_html__('Report visibility', 'nominee'),
            'subtitle' => esc_html__('Visible or Hidden report button', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'report-button-text',
            'type'     => 'text',
            'required' => array('report-visibility', '=', '1'),
            'title'    => esc_html__('Report button text', 'nominee'),
            'subtitle' => esc_html__('If you want to change report button then you can change text from here', 'nominee'),
            'default'  => esc_html__('Report an Issue', 'nominee')
        ),

        array(
            'id'       => 'report-page-link',
            'type'     => 'switch',
            'required' => array('report-visibility', '=', '1'),
            'title'    => esc_html__('Report page link', 'nominee'),
            'subtitle' => esc_html__('Select report page link', 'nominee'),
            'on'       => esc_html__('Default page link', 'nominee'),
            'off'      => esc_html__('External page link', 'nominee'),
            'default'  => TRUE,
        ),
        array(
            'id'       => 'report-page',
            'type'     => 'select',
            'required' => array('report-page-link', '=', '1'),
            'title'    => esc_html__('Report page', 'nominee'),
            'subtitle' => esc_html__('Select report page to linking with report button', 'nominee'),
            'multi'    => false,
            'data'     => 'page'
        ),

        array(
            'id'       => 'report-external-link',
            'type'     => 'text',
            'required' => array('report-page-link', '=', '0'),
            'title'    => esc_html__('External page URL', 'nominee'),
            'subtitle' => esc_html__('Enter external page url', 'nominee'),
            'default'  => 'http://report-link.com'
        ),
        array(
            'id'       => 'report-button-bg-color',
            'type'     => 'background',
            'output'    => array('.report-button a'),
            'required' => array('report-visibility', '=', '1'),
            'title'    => esc_html__( 'Report Button background', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for report button background.', 'nominee' ),
            'background-repeat' => false,
            'background-attachment' => false,
            'background-position' => false,
            'background-image' => false,
            'background-size' => false,
            'preview' => false,
        ),

        array(
            'id'       => 'report-button-text-color',
            'type'     => 'color',
            'output'    => array('.report-button a'),
            'required' => array('report-visibility', '=', '1'),
            'title'    => esc_html__( 'Button text color', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for report button text.', 'nominee' ),
            'transparent' => false
        ),
        array(
            'id'       => 'report-button-hover-bg-color',
            'type'     => 'background',
            'output'    => array('.report-button a:hover'),
            'required' => array('report-visibility', '=', '1'),
            'title'    => esc_html__( 'Report Button hover background', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for report button hover background.', 'nominee' ),
            'background-repeat' => false,
            'background-attachment' => false,
            'background-position' => false,
            'background-image' => false,
            'background-size' => false,
            'preview' => false,
        ),

        array(
            'id'       => 'report-button-hover-text-color',
            'type'     => 'color',
            'output'    => array('.report-button a:hover'),
            'required' => array('report-visibility', '=', '1'),
            'title'    => esc_html__( 'Button hover text color', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for report button hover text.', 'nominee' ),
            'transparent' => false
        ),



        /**
         * MENU BACKGROUND COLOR
         */
        // menu background color for DEFAULT HEADER
        array(
            'id'    => 'dheader_bg_info_headding',
            'type'  => 'info',
            'class' => 'redux-heading',
            'title' => esc_html__('Menu Background Color Settings', 'nominee'),
            'required'       => array('header-style', '!=', 'no-header'),
        ),

        array(
            'id'       => 'menu-bg-color',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-default'),
            'title'    => esc_html__( 'Menu background color for Default Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for menu background.', 'nominee' )
        ),

        // menu background color for TRANSPARENT HEADER
        array(
            'id'       => 'menu-bg-color-transparent',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-transparent'),
            'title'    => esc_html__( 'Menu background color for Transparent Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for menu background.', 'nominee' )
        ),

        // menu background color for FULLWIDTH HEADER
        array(
            'id'       => 'menu-bg-color-fullwidth',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-fullwidth'),
            'title'    => esc_html__( 'Menu background color for Fullwidth Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for menu background.', 'nominee' )
        ),
        // menu background color for center logo HEADER
        array(
            'id'       => 'menu-bg-color-center-logo',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-center-logo'),
            'title'    => esc_html__( 'Menu background color for center logo header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for menu background.', 'nominee' )
        ),

        // menu background color for BOX STYLE HEADER
        array(
            'id'       => 'menu-bg-color-box-style',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-box-style'),
            'title'    => esc_html__( 'Menu background color for box style header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for menu background.', 'nominee' )
        ),



        /**
         * MENU COLOR
         */

        // menu color for DEFAULT HEADER
        array(
            'id'       => 'menu-color',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-default'),
            'title'    => esc_html__( 'Menu font color for Default Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for menu.', 'nominee' ),
            'transparent' => false
        ),

        // menu color for TRANSPARENT HEADER
        array(
            'id'       => 'menu-color-transparent',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-transparent'),
            'title'    => esc_html__( 'Menu font color for Transparent Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for menu.', 'nominee' ),
            'transparent' => false
        ),

        // menu color for FULLWIDTH HEADER
        array(
            'id'       => 'menu-color-fullwidth',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-fullwidth'),
            'title'    => esc_html__( 'Menu font color for Fullwidth Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for menu.', 'nominee' ),
            'transparent' => false
        ),

        // menu color for center logo HEADER
        array(
            'id'       => 'menu-color-center-logo',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-center-logo'),
            'title'    => esc_html__( 'Menu font color for center logo header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for menu.', 'nominee' ),
            'transparent' => false
        ),

        // menu color for BOX STYLE HEADER
        array(
            'id'       => 'menu-color-box-style',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-box-style'),
            'title'    => esc_html__( 'Menu font color for box style header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for menu.', 'nominee' ),
            'transparent' => false
        ),



        /**
         * MOBILE MENU BACKGROUND COLOR
         */

        // mobile menu background color DEFAULT HEADER
        array(
            'id'       => 'mobile-menu-bg-color',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-default'),
            'title'    => esc_html__( 'Mobile menu background color for Default Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for mobile menu background.', 'nominee' )
        ),
        // mobile menu background color TRANSPARENT HEADER
        array(
            'id'       => 'mobile-menu-bg-color-transparent',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-transparent'),
            'title'    => esc_html__( 'Mobile menu background color for Transparent Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for mobile menu background.', 'nominee' )
        ),
        // mobile menu background color FULLWIDTH HEADER
        array(
            'id'       => 'mobile-menu-bg-color-fullwidth',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-fullwidth'),
            'title'    => esc_html__( 'Mobile menu background color for Fullwidth Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for mobile menu background.', 'nominee' )
        ),
        // mobile menu background color center logo HEADER
        array(
            'id'       => 'mobile-menu-bg-color-center-logo',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-center-logo'),
            'title'    => esc_html__( 'Mobile menu background color for center logo header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for mobile menu background.', 'nominee' )
        ),
        // mobile menu background color BOX STYLE HEADER
        array(
            'id'       => 'mobile-menu-bg-color-box-style',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-box-style'),
            'title'    => esc_html__( 'Mobile menu background color for box-style Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for mobile menu background.', 'nominee' )
        ),



        /**
         * MOBILE MENU COLOR
         */
        // mobile menu color for DEFAULT HEADER
        array(
            'id'       => 'mobile-menu-color',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-default'),
            'title'    => esc_html__( 'Mobile menu font color for Default Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for mobile menu.', 'nominee' ),
            'transparent' => false
        ),
        // mobile menu color for DEFAULT HEADER
        array(
            'id'       => 'mobile-menu-color-transparent',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-transparent'),
            'title'    => esc_html__( 'Mobile menu font color for Transparent Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for mobile menu.', 'nominee' ),
            'transparent' => false
        ),
        // mobile menu color for FULLWIDTH
        array(
            'id'       => 'mobile-menu-color-fullwidth',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-fullwidth'),
            'title'    => esc_html__( 'Mobile menu font color for Fullwidth Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for mobile menu.', 'nominee' ),
            'transparent' => false
        ),
        // mobile menu color for center logo header
        array(
            'id'       => 'mobile-menu-color-center-logo',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-center-logo'),
            'title'    => esc_html__( 'Mobile menu font color for center logo header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for mobile menu.', 'nominee' ),
            'transparent' => false
        ),
        // mobile menu color for box style
        array(
            'id'       => 'mobile-menu-color-box-style',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-box-style'),
            'title'    => esc_html__( 'Mobile menu font color for box style Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for mobile menu.', 'nominee' ),
            'transparent' => false
        ),


        /**
         * STICKY MENU BACKGROUND COLOR
         */
        // sticky menu background color for DEFAULT HEADER
        array(
            'id'       => 'sticky-menu-bg-color',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-default'),
            'title'    => esc_html__( 'Sticky menu background color for Default Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for sticky menu background.', 'nominee' )
        ),
        // sticky menu background color for TRANSPARENT HEADER
        array(
            'id'       => 'sticky-menu-bg-color-transparent',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-transparent'),
            'title'    => esc_html__( 'Sticky menu background color for Transparent Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for sticky menu background.', 'nominee' )
        ),
        // sticky menu background color for FULLWIDTH HEADER
        array(
            'id'       => 'sticky-menu-bg-color-fullwidth',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-fullwidth'),
            'title'    => esc_html__( 'Sticky menu background color for Fullwidth Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for sticky menu background.', 'nominee' )
        ),
        // sticky menu background color for center logo HEADER
        array(
            'id'       => 'sticky-menu-bg-color-center-logo',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-center-logo'),
            'title'    => esc_html__( 'Sticky menu background color for center logo header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for sticky menu background.', 'nominee' )
        ),
        // sticky menu background color for box style HEADER
        array(
            'id'       => 'sticky-menu-bg-color-box-style',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-box-style'),
            'title'    => esc_html__( 'Sticky menu background color for box style Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for sticky menu background.', 'nominee' )
        ),



        /**
         * STICKY MENU COLOR
         */
        // sticky menu color for DEFAULT HEADER
        array(
            'id'       => 'sticky-menu-color',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-default'),
            'title'    => esc_html__( 'Sticky menu font color for Default Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for sticky menu.', 'nominee' ),
            'transparent' => false
        ),
        // sticky menu color for TRANSPARENT HEADER
        array(
            'id'       => 'sticky-menu-color-transparent',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-transparent'),
            'title'    => esc_html__( 'Sticky menu font color for Transparent Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for sticky menu.', 'nominee' ),
            'transparent' => false
        ),
        // sticky menu color for FULLWIDTH HEADER
        array(
            'id'       => 'sticky-menu-color-fullwidth',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-fullwidth'),
            'title'    => esc_html__( 'Sticky menu font color for Fullwidth Header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for sticky menu.', 'nominee' ),
            'transparent' => false
        ),
        // sticky menu color for center logo HEADER
        array(
            'id'       => 'sticky-menu-color-center-logo',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-center-logo'),
            'title'    => esc_html__( 'Sticky menu font color for center logo header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for sticky menu.', 'nominee' ),
            'transparent' => false
        ),
        // sticky menu color for box style HEADER
        array(
            'id'       => 'sticky-menu-color-box-style',
            'type'     => 'color',
            'required' => array('header-style', '=', 'header-box-style'),
            'title'    => esc_html__( 'Sticky menu font color for box style header', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for sticky menu.', 'nominee' ),
            'transparent' => false
        ),



        /**
         * MENU MARGIN and PADDING
         */
        array(
            'id'    => 'menu_margin_info_headding',
            'type'  => 'info',
            'class' => 'redux-heading',
            'title' => esc_html__('Menu Margin and Padding Option', 'nominee'),
            'required'       => array('header-style', '!=', 'no-header'),
        ),

        array(
            'id'             => 'menu-margin',
            'required'       => array('header-style', '!=', 'no-header'),
            'type'           => 'spacing',
            'output'         => array('.main-menu-wrapper'),
            'mode'           => 'margin',
            'units'          => 'px',
            'units_extended' => 'false',
            'title'          => esc_html__('Menu Margin Option', 'nominee'),
            'subtitle'       => esc_html__('You can change menu margin if needed.', 'nominee'),
            'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'nominee')
        ),
        array(
            'id'             => 'menu-padding',
            'required'       => array('header-style', '!=', 'no-header'),
            'type'           => 'spacing',
            'output'         => array('.main-menu-wrapper'),
            'mode'           => 'padding',
            'units'          => 'px',
            'units_extended' => 'false',
            'title'          => esc_html__('Menu Padding Option', 'nominee'),
            'subtitle'       => esc_html__('You can change menu padding if needed.', 'nominee'),
            'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'nominee')
        )
    )
));


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Header donation
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-website-alt',
    'title'  => esc_html__('Header Donation', 'nominee'),
    'subsection'       => true,
    'fields' => array(
        array(
            'id'       => 'donate-visibility',
            'type'     => 'switch',
            'title'    => esc_html__('Donate visibility', 'nominee'),
            'subtitle' => esc_html__('Visible or Hidden donate button', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'donate-button-text',
            'type'     => 'text',
            'required' => array('donate-visibility', '=', '1'),
            'title'    => esc_html__('Donate button text', 'nominee'),
            'subtitle' => esc_html__('If you want to change donate button then you can change text from here', 'nominee'),
            'default'  => esc_html__('Donate', 'nominee')
        ),

        array(
            'id'       => 'donate-page-link',
            'type'     => 'switch',
            'required' => array('donate-visibility', '=', '1'),
            'title'    => esc_html__('Donate page link', 'nominee'),
            'subtitle' => esc_html__('Select donate page link', 'nominee'),
            'on'       => esc_html__('Default page link', 'nominee'),
            'off'      => esc_html__('External page link', 'nominee'),
            'default'  => TRUE,
        ),
        array(
            'id'       => 'donate-page',
            'type'     => 'select',
            'required' => array('donate-page-link', '=', '1'),
            'title'    => esc_html__('Donate page', 'nominee'),
            'subtitle' => esc_html__('Select donate page to linking with donate button', 'nominee'),
            'multi'    => false,
            'data'     => 'page'
        ),

        array(
            'id'       => 'donate-external-link',
            'type'     => 'text',
            'required' => array('donate-page-link', '=', '0'),
            'title'    => esc_html__('External page URL', 'nominee'),
            'subtitle' => esc_html__('Enter external page url', 'nominee'),
            'default'  => 'http://donate-link.com'
        ),
        array(
            'id'       => 'donate-link-target',
            'type'     => 'select',
            'required' => array('donate-page-link', '=', '0'),
            'title'    => esc_html__('Select link target', 'nominee'),
            'options'  => array(
                '_blank' => 'Load in a new window',
                '_self' => 'Load in the same frame as it was clicked',
            ),
            'default'  => '_blank',
            'subtitle' => esc_html__('Select link target option', 'nominee'),
        ),

        array(
            'id'       => 'donation-button-bg-color',
            'type'     => 'background',
            'output'    => array('.donate-button a'),
            'required' => array('donate-visibility', '=', '1'),
            'title'    => esc_html__( 'Donation Button background', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for donation button background.', 'nominee' ),
            'background-repeat' => false,
            'background-attachment' => false,
            'background-position' => false,
            'background-image' => false,
            'background-size' => false,
            'preview' => false,
        ),

        array(
            'id'       => 'donation-button-text-color',
            'type'     => 'color',
            'output'    => array('.donate-button a'),
            'required' => array('donate-visibility', '=', '1'),
            'title'    => esc_html__( 'Button text color', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for donation button text.', 'nominee' ),
            'transparent' => false
        ),
        array(
            'id'       => 'donation-button-hover-bg-color',
            'type'     => 'background',
            'output'    => array('.donate-button a:hover'),
            'required' => array('donate-visibility', '=', '1'),
            'title'    => esc_html__( 'Donation Button hover background', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for donation button hover background.', 'nominee' ),
            'background-repeat' => false,
            'background-attachment' => false,
            'background-position' => false,
            'background-image' => false,
            'background-size' => false,
            'preview' => false,
        ),

        array(
            'id'       => 'donation-button-hover-text-color',
            'type'     => 'color',
            'output'    => array('.donate-button a:hover'),
            'required' => array('donate-visibility', '=', '1'),
            'title'    => esc_html__( 'Button hover text color', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for donation button hover text.', 'nominee' ),
            'transparent' => false
        )
    )
));


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Header topbar
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-website-alt',
    'title'  => esc_html__('Header Topbar', 'nominee'),
    'subsection'       => true,
    'fields' => array(
        // header top wrapper
        array(
            'id'       => 'header-top-visibility',
            'type'     => 'switch',
            'title'    => esc_html__('Header topbar visibility', 'nominee'),
            'subtitle' => esc_html__('Visible or Hidden header topbar', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => TRUE,
        ),

        /**
         * NewsFeed Settings
         */
        array(
            'id'    => 'newsfeed_info_headding',
            'type'  => 'info',
            'class' => 'redux-heading',
            'title' => esc_html__('News Feed settings', 'nominee'),
            'required' => array('header-top-visibility', '=', '1'),
        ),
        array(
            'id'       => 'news-feed-visibility',
            'type'     => 'switch',
            'required' => array('header-top-visibility', '=', '1'),
            'title'    => esc_html__('News Feed visibility', 'nominee'),
            'subtitle' => esc_html__('Visible or Hidden topbar newsfeed', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'prefix-title',
            'type'     => 'text',
            'required' => array('news-feed-visibility', '=', '1'),
            'title'    => esc_html__('News Feed prefix', 'nominee'),
            'subtitle' => esc_html__('Change news prefix text', 'nominee'),
            'default'  => esc_html__('Press:', 'nominee')
        ),

        array(
            'id'       => 'post-source',
            'type'     => 'select',
            'required' => array('news-feed-visibility', '=', '1'),
            'title'    => esc_html__('Select post source', 'nominee'),
            'options'  => array(
                'latest-post' => 'Latest Post',
                'selected-post' => 'Selected Post',
                'category-post' => 'From Category'
            ),
            'default'  => 'latest-post',
            'subtitle' => esc_html__('Select post source', 'nominee'),
        ),

        array(
            'id'       => 'post-lists',
            'type'     => 'select',
            'required' => array('post-source', '=', 'selected-post'),
            'title'    => esc_html__('Select posts', 'nominee'),
            'data'     => 'posts',
            'args'     => array(
                'post_type'      => 'post',
                'posts_per_page' => -1
            ),
            'multi'    => true,
            'subtitle' => esc_html__('Select post to show on breaking news', 'nominee'),
        ),

        array(
            'id'       => 'category-lists',
            'type'     => 'select',
            'required' => array('post-source', '=', 'category-post'),
            'title'    => esc_html__('Select a category', 'nominee'),
            'data'     => 'categories',
            'multi'    => true,
            'subtitle' => esc_html__('Select a cateogry to show selected category post', 'nominee'),
        ),

        array(
            'id'       => 'news-feed-limit',
            'type'     => 'text',
            'required' => array('post-source', '=', array('category-post', 'latest-post')),
            'title'    => esc_html__('News feed limit', 'nominee'),
            'subtitle' => esc_html__('Change post limit from header topbar', 'nominee'),
            'default'  => 5
        ),

        array(
            'id'       => 'news-feed-title-limit',
            'type'     => 'text',
            'required' => array('news-feed-visibility', '=', '1'),
            'title'    => esc_html__('News feed title word limit', 'nominee'),
            'subtitle' => esc_html__('Change post title word limit', 'nominee'),
            'default'  => 5
        ),


        array(
            'id'    => 'header_topbar_contact_info_headding',
            'type'  => 'info',
            'class' => 'redux-heading',
            'title' => esc_html__('Contact settings', 'nominee'),
            'required' => array('header-top-visibility', '=', '1'),
        ),
        array(
            'id'       => 'header-contact',
            'type'     => 'editor',
            'required' => array('header-top-visibility', '=', '1'),
            'title'    => esc_html__('Header contact', 'nominee'),
            'subtitle' => esc_html__('Change header contact info', 'nominee'),
            'default'  => '<ul><li><i class="fa fa-phone"></i> +123 125 145</li><li><a href="mailto:username@host.com"><i class="fa fa-envelope-o"></i> username@host.com</a></li></ul>'
        ),

        array(
            'id'       => 'language-switcher-visibility',
            'type'     => 'switch',
            'required' => array('header-top-visibility', '=', '1'),
            'title'    => esc_html__('Language switcher visibility', 'nominee'),
            'subtitle' => esc_html__('Visible or Hidden language switcher', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'shopping-cart-visibility',
            'type'     => 'switch',
            'required' => array('header-top-visibility', '=', '1'),
            'title'    => esc_html__('Shopping cart visibility', 'nominee'),
            'subtitle' => esc_html__('Show or hide shopping cart icon', 'nominee'),
            'on'       => esc_html__('Show', 'nominee'),
            'off'      => esc_html__('Hide', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'topbar-social_links',
            'type'     => 'switch',
            'required' => array('header-top-visibility', '=', '1'),
            'title'    => esc_html__('Social Icons Visibility', 'nominee'),
            'subtitle' => esc_html__('Visible or Hidden social icons', 'nominee'),
            'desc'     => esc_html__('More settings you will be found in the Social Icon Settings Tab', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => FALSE,
        ),

        array(
            'id'    => 'info_headding',
            'type'  => 'info',
            'class' => 'redux-heading',
            'title' => esc_html__('Login page settings', 'nominee'),
            'required' => array('header-top-visibility', '=', '1'),
        ),

        array(
            'id'       => 'user-area-visibility',
            'type'     => 'switch',
            'required' => array('header-top-visibility', '=', '1'),
            'title'    => esc_html__('User area visibility', 'nominee'),
            'subtitle' => esc_html__('Visible or Hidden user area from topbar', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => false,
        ),

        array(
            'id'       => 'user-login-page',
            'type'     => 'select',
            'required' => array('user-area-visibility', '=', '1'),
            'title'    => esc_html__('Login page', 'nominee'),
            'subtitle' => esc_html__('Select login page to linking with user icon', 'nominee'),
            'multi'    => false,
            'data'     => 'page'
        ),

        array(
            'id'       => 'tt-login-redirect',
            'type'     => 'text',
            'required' => array('user-area-visibility', '=', '1'),
            'title'    => esc_html__('Login Redirect Custom url', 'nominee'),
            'desc'     => esc_html__('Enter custom url to redirect after login successfully', 'nominee'),
            'default'  => home_url('/')
        )
    )
));


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Logo settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-slideshare',
    'title'  => esc_html__('Logo Settings', 'nominee'),
    'fields' => array(
        array(
            'id'       => 'logo-type',
            'type'     => 'switch',
            'title'    => esc_html__('Logo Type', 'nominee'),
            'subtitle' => esc_html__('You can set text or image logo', 'nominee'),
            'on'       => esc_html__('Image Logo', 'nominee'),
            'off'      => esc_html__('Text Logo', 'nominee'),
            'default'  => TRUE,
        ),
        array(
            'id'       => 'text-logo',
            'type'     => 'text',
            'required' => array('logo-type', '=', '0'),
            'title'    => esc_html__('Logo Text', 'nominee'),
            'subtitle' => esc_html__('Change your logo text', 'nominee')
        ),
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'preview'  => 'true',
            'required' => array('logo-type', '=', '1'),
            'title'    => esc_html__('Site Logo.', 'nominee'),
            'subtitle' => esc_html__('Change Site logo dimension: 145px &times; 55px', 'nominee')
        ),
        array(
            'id'       => 'mobile-logo',
            'type'     => 'media',
            'preview'  => 'true',
            'required' => array('logo-type', '=', '1'),
            'title'    => esc_html__('Site Mobile Logo.', 'nominee'),
            'subtitle' => esc_html__('Change site mobile logo dimension: 145px &times; 55px', 'nominee')
        ),
        array(
            'id'             => 'logo-margin',
            'type'           => 'spacing',
            'output'         => array('.navbar-brand'),
            'mode'           => 'margin',
            'units'          => 'px',
            'units_extended' => 'false',
            'title'          => esc_html__('Margin Option', 'nominee'),
            'subtitle'       => esc_html__('You can change logo margin if needed.', 'nominee'),
            'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'nominee')
        ),
        array(
            'id'             => 'logo-padding',
            'type'           => 'spacing',
            'output'         => array('.navbar-brand'),
            'mode'           => 'padding',
            'units'          => 'px',
            'units_extended' => 'false',
            'title'          => esc_html__('Padding Option', 'nominee'),
            'subtitle'       => esc_html__('You can change logo padding if needed.', 'nominee'),
            'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'nominee')
        )
    )
));


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page header image settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-picture',
    'title'  => esc_html__('Page Header Settings', 'nominee'),
    'fields' => array(

        array(
            'id'       => 'page-header-visibility',
            'type'     => 'select',
            'title'    => esc_html__('Page header visibility', 'nominee'),
            'subtitle' => esc_html__('Visible or Hidden all page header section', 'nominee'),
            'options'  => array(
                'header-section-show' => esc_html__('Page Header Section Show', 'nominee'),
                'header-section-hide' => esc_html__('Page Header Section Hide', 'nominee')
            ),
            'desc'     => esc_html__('Will show/hide background image, title and breadcrumb', 'nominee'),
            'default'  => 'header-section-show'
        ),

        array(
            'id'       => 'tt-page-title',
            'type'     => 'switch',
            'title'    => esc_html__('Page title', 'nominee'),
            'required' => array('page-header-visibility', '=', 'header-section-show'),
            'subtitle' => esc_html__('Show or Hide page title', 'nominee'),
            'on'       => esc_html__('Show', 'nominee'),
            'off'      => esc_html__('Hide', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'tt-breadcrumb',
            'type'     => 'switch',
            'title'    => esc_html__('Breadcrumb', 'nominee'),
            'required' => array('page-header-visibility', '=', 'header-section-show'),
            'subtitle' => esc_html__('Show or Hide Your website Breadcrumb', 'nominee'),
            'on'       => esc_html__('Show', 'nominee'),
            'off'      => esc_html__('Hide', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'tt-image-overlay',
            'type'     => 'switch',
            'title'    => esc_html__('Image Overlay', 'nominee'),
            'required' => array('page-header-visibility', '=', 'header-section-show'),
            'subtitle' => esc_html__('Show or Hide image overlay', 'nominee'),
            'on'       => esc_html__('Show', 'nominee'),
            'off'      => esc_html__('Hide', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'page_header_color',
            'type'     => 'color',
            'title'    => esc_html__('Background color', 'nominee'),
            'required' => array('page-header-visibility', '=', 'header-section-show'),
            'subtitle' => esc_html__('Select background color for page header, N.B: You have to remove all image to apply the changes', 'nominee')
        ),

        array(
            'id'             => 'page-header-margin',
            'type'           => 'spacing',
            'output'         => array('.page-header-section'),
            'mode'           => 'margin',
            'units'          => 'px',
            'units_extended' => 'false',
            'title'          => esc_html__('Page Header Margin Option', 'nominee'),
            'subtitle'       => esc_html__('You can change page header margin if needed.', 'nominee'),
            'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'nominee')
        ),

        array(
            'id'             => 'page-header-padding',
            'type'           => 'spacing',
            'output'         => array('.header-default .page-header-section', '.header-transparent .page-header-section'),
            'mode'           => 'padding',
            'units'          => 'px',
            'units_extended' => 'false',
            'title'          => esc_html__('Page Header Padding Option', 'nominee'),
            'subtitle'       => esc_html__('You can change page header padding if needed.', 'nominee'),
            'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'nominee')
        ),

        array(
            'id'       => 'page-header-image',
            'type'     => 'media',
            'preview'  => 'true',
            'title'    => esc_html__('Page Header Background.', 'nominee'),
            'required' => array('page-header-visibility', '=', 'header-section-show'),
            'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'nominee')
        ),

        array(
            'id'       => 'product-header-image',
            'type'     => 'media',
            'preview'  => 'true',
            'title'    => esc_html__('Product Header Background.', 'nominee'),
            'required' => array('page-header-visibility', '=', 'header-section-show'),
            'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'nominee')
        ),

        array(
            'id'       => 'reformation-header-image',
            'type'     => 'media',
            'preview'  => 'true',
            'title'    => esc_html__('Reformation Header Background.', 'nominee'),
            'required' => array('page-header-visibility', '=', 'header-section-show'),
            'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'nominee')
        ),

        array(
            'id'       => 'blog-header-image',
            'type'     => 'media',
            'preview'  => 'true',
            'title'    => esc_html__('Blog Header Background.', 'nominee'),
            'required' => array('page-header-visibility', '=', 'header-section-show'),
            'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'nominee')
        ),

        array(
            'id'       => 'author-header-image',
            'type'     => 'media',
            'preview'  => 'true',
            'title'    => esc_html__('Author Header Background.', 'nominee'),
            'required' => array('page-header-visibility', '=', 'header-section-show'),
            'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'nominee')
        ),
        array(
            'id'       => 'category-header-image',
            'type'     => 'media',
            'preview'  => 'true',
            'title'    => esc_html__('Category Header Background.', 'nominee'),
            'required' => array('page-header-visibility', '=', 'header-section-show'),
            'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'nominee')
        ),

        array(
            'id'       => 'tag-header-image',
            'type'     => 'media',
            'preview'  => 'true',
            'title'    => esc_html__('Tag Header Background.', 'nominee'),
            'required' => array('page-header-visibility', '=', 'header-section-show'),
            'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'nominee')
        ),
        
        array(
            'id'       => 'search-header-image',
            'type'     => 'media',
            'preview'  => 'true',
            'title'    => esc_html__('Search Header Background.', 'nominee'),
            'required' => array('page-header-visibility', '=', 'header-section-show'),
            'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'nominee')
        ),
        array(
            'id'       => 'archive-header-image',
            'type'     => 'media',
            'preview'  => 'true',
            'title'    => esc_html__('Archive Header Background.', 'nominee'),
            'required' => array('page-header-visibility', '=', 'header-section-show'),
            'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'nominee')
        ),
        array(
            'id'       => 'header-404-image',
            'type'     => 'media',
            'preview'  => 'true',
            'title'    => esc_html__('404 Header Background.', 'nominee'),
            'required' => array('page-header-visibility', '=', 'header-section-show'),
            'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'nominee')
        )
    )
));


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Presets settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-brush',
    'title'  => esc_html__('Preset color', 'nominee'),
    'fields' => array(
        array(
            'id'       => 'site-preset-color',
            'type'     => 'switch',
            'title'    => esc_html__('Site Preset Color', 'nominee'),
            'subtitle' => esc_html__('Enable this option to customizing preset color', 'nominee'),
            'on'       => esc_html__('Enable', 'nominee'),
            'off'      => esc_html__('Disable', 'nominee'),
            'default'  => TRUE
        ),

        array(
            'id'       => 'body-bg-color',
            'type'     => 'color',
            'required' => array('site-preset-color', '=', '1'),
            'title'    => esc_html__( 'Body background color', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for the theme body background (default: #ffffff).', 'nominee' ),
            'default'  => '#ffffff',
        ),

        array(
            'id'       => 'accent-color',
            'type'     => 'color',
            'required' => array('site-preset-color', '=', '1'),
            'title'    => esc_html__( 'Site Accent Color', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for the theme accent color (default: #ef4836).', 'nominee' ),
            'default'  => '#ef4836',
        ),

        array(
            'id'       => 'link-color',
            'type'     => 'color',
            'required' => array('site-preset-color', '=', '1'),
            'title'    => esc_html__( 'Site Link Color', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for all link (default: #ef4836).', 'nominee' ),
            'default'  => '#ef4836',
        ),

        array(
            'id'       => 'section-title-color',
            'type'     => 'color',
            'required' => array('site-preset-color', '=', '1'),
            'title'    => esc_html__( 'Section title color', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for section title (default: #2f2f2f).', 'nominee' ),
            'default'  => '#2f2f2f',
        )
    )
));


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Typography
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-font',
    'title'  => esc_html__('Typography', 'nominee'),
    'fields' => array(

        array(
            'id'       => 'site-typography',
            'type'     => 'switch',
            'title'    => esc_html__('Site Typography', 'nominee'),
            'subtitle' => esc_html__('Enable this option to customizing typography', 'nominee'),
            'on'       => esc_html__('Enable', 'nominee'),
            'off'      => esc_html__('Disable', 'nominee'),
            'default'  => TRUE
        ),
        
        // body typography
        array(
            'id'       => 'body-typography',
            'type'     => 'typography',
            'required' => array('site-typography', '=', '1'),
            'title'    => esc_html__( 'Body Font', 'nominee' ),
            'subtitle' => esc_html__( 'Specify the body font properties.', 'nominee' ),
            'google'   => true,
            'text-align' => false,
            'default'  => array(
                'color'       => '#606060',
                'font-size'   => '14px',
                'font-family' => 'Open Sans',
                'font-weight' => '400',
                'line-height' => '26px'
            ),
        ),


        // Heading all typography
        array(
            'id'       => 'heading-typography',
            'type'     => 'typography',
            'required' => array('site-typography', '=', '1'),
            'title'    => esc_html__( 'Heading Font', 'nominee' ),
            'subtitle' => esc_html__( 'This settings for all heading font (h1, h2, h3, h4, h5, h6)', 'nominee' ),
            'google'   => true,
            'all_styles' => true,
            'text-align' => false,
            'font-size' => false,
            'line-height' => false,
            'default'  => array(
                'color'       => '#2f2f2f',
                'font-family' => 'Roboto Slab',
                'font-weight' => '700'
            ),
        ),

        // only H1 typography
        array(
            'id'       => 'h1-typography',
            'type'     => 'typography',
            'required' => array('site-typography', '=', '1'),
            'title'    => esc_html__( 'H1 (Heading one)', 'nominee' ),
            'subtitle' => esc_html__( 'This settings only for H1', 'nominee' ),
            'font-family' => false,
            'google'   => false,
            'text-align' => false,
            'font-size' => true,
            'line-height' => true,
            'color' => false,
            'font-weight' => false,
            'font-style' => false,
            'default'  => array(
                'font-size'   => '59px',
                'line-height' => '78px'
            ),
        ),


        // only H2 typography
        array(
            'id'       => 'h2-typography',
            'type'     => 'typography',
            'required' => array('site-typography', '=', '1'),
            'title'    => esc_html__( 'H2 (Heading two)', 'nominee' ),
            'subtitle' => esc_html__( 'This settings only for H2', 'nominee' ),
            'font-family' => false,
            'google'   => false,
            'text-align' => false,
            'font-size' => true,
            'line-height' => true,
            'color' => false,
            'font-weight' => false,
            'font-style' => false,
            'default'  => array(
                'font-size'   => '37px',
                'line-height' => '52px'
            ),
        ),


        // only H3 typography
        array(
            'id'       => 'h3-typography',
            'type'     => 'typography',
            'required' => array('site-typography', '=', '1'),
            'title'    => esc_html__( 'H3 (Heading three)', 'nominee' ),
            'subtitle' => esc_html__( 'This settings only for H3', 'nominee' ),
            'font-family' => false,
            'google'   => false,
            'text-align' => false,
            'font-size' => true,
            'line-height' => true,
            'color' => false,
            'font-weight' => false,
            'font-style' => false,
            'default'  => array(
                'font-size'   => '23px',
                'line-height' => '26px'
            ),
        ),

        // only H4 typography
        array(
            'id'       => 'h4-typography',
            'type'     => 'typography',
            'required' => array('site-typography', '=', '1'),
            'title'    => esc_html__( 'H4 (Heading four)', 'nominee' ),
            'subtitle' => esc_html__( 'This settings only for H4', 'nominee' ),
            'font-family' => false,
            'google'   => false,
            'text-align' => false,
            'font-size' => true,
            'line-height' => true,
            'color' => false,
            'font-weight' => false,
            'font-style' => false,
            'default'  => array(
                'font-size'   => '18px',
                'line-height' => '26px'
            ),
        ),

        // only H5 typography
        array(
            'id'       => 'h5-typography',
            'type'     => 'typography',
            'required' => array('site-typography', '=', '1'),
            'title'    => esc_html__( 'H5 (Heading five)', 'nominee' ),
            'subtitle' => esc_html__( 'This settings only for H5', 'nominee' ),
            'font-family' => false,
            'google'   => false,
            'text-align' => false,
            'font-size' => true,
            'line-height' => true,
            'color' => false,
            'font-weight' => false,
            'font-style' => false,
            'default'  => array(
                'font-size'   => '16px',
                'line-height' => '18px'
            ),
        ),

        // only H6 typography
        array(
            'id'       => 'h6-typography',
            'type'     => 'typography',
            'required' => array('site-typography', '=', '1'),
            'title'    => esc_html__( 'H6 (Heading six)', 'nominee' ),
            'subtitle' => esc_html__( 'This settings only for H6', 'nominee' ),
            'font-family' => false,
            'google'   => false,
            'text-align' => false,
            'font-size' => true,
            'line-height' => true,
            'color' => false,
            'font-weight' => false,
            'font-style' => false,
            'default'  => array(
                'font-size'   => '14px',
                'line-height' => '16px'
            ),
        ),

    )
));


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Blog settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-file-edit',
    'title'  => esc_html__('Blog Settings', 'nominee'),
    'fields' => array(

        array(
            'id'       => 'blog-title',
            'type'     => 'text',
            'title'    => esc_html__('Blog Page Title', 'nominee'),
            'subtitle' => esc_html__('Enter Blog page title here, if leave blank then site title will appear', 'nominee')
        ),

        array(
            'id'       => 'blog-single-page-header',
            'type'     => 'switch',
            'title'    => esc_html__('Blog single page header visibility', 'nominee'),
            'subtitle' => esc_html__('Show/Hide page header from single post', 'nominee'),
            'on'       => esc_html__('Show', 'nominee'),
            'off'      => esc_html__('Hide', 'nominee'),
            'default'  => TRUE
        ),

        array(
            'id'       => 'blog-sidebar',
            'type'     => 'image_select',
            'title'    => esc_html__('Blog sidebar setting', 'nominee'),
            'subtitle' => esc_html__('Select blog sidebar', 'nominee'),
            'options'  => array(
                'no-sidebar'    => array(
                    'alt' => 'No sidebar',
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left-sidebar'  => array(
                    'alt' => 'Left sidebar',
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right-sidebar' => array(
                    'alt' => 'Right sidebar',
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            ),
            'default'  => 'right-sidebar'
        ),
        
        array(
            'id'       => 'single-post-sidebar',
            'type'     => 'image_select',
            'title'    => esc_html__('Single post sidebar setting', 'nominee'),
            'subtitle' => esc_html__('Select single post sidebar', 'nominee'),
            'options'  => array(
                'no-sidebar'    => array(
                    'alt' => 'No sidebar',
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left-sidebar'  => array(
                    'alt' => 'Left sidebar',
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right-sidebar' => array(
                    'alt' => 'Right sidebar',
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            ),
            'default'  => 'right-sidebar'
        ),
        
        array(
            'id'       => 'blog-thumbnail-overlay',
            'type'     => 'switch',
            'title'    => esc_html__('Blog Thumbnail overlay visibility', 'nominee'),
            'subtitle' => esc_html__('Show/Hide thumbnail overlay', 'nominee'),
            'on'       => esc_html__('Show', 'nominee'),
            'off'      => esc_html__('Hide', 'nominee'),
            'default'  => TRUE
        ),

        array(
            'id'       => 'tt-post-meta',
            'type'     => 'checkbox',
            'title'    => esc_html__( 'Post meta options', 'nominee' ),
            'subtitle' => esc_html__( 'Check to show post meta', 'nominee' ),
            'options'  => array(
                'post-date'         => esc_html__( 'Post Date', 'nominee' ),
                'post-author'       => esc_html__( 'Post Author', 'nominee' ),
                'post-category'     => esc_html__( 'Post Category', 'nominee' ),
                'post-comment' => esc_html__( 'Post Comment', 'nominee' ),
                'post-like' => esc_html__( 'Post Like', 'nominee' )
            ),
            'default'  => array(
                'post-date' => '1',
                'post-author'  => '1',
                'post-category'   => '1',
                'post-comment' => '1',
                'post-like' => '1'
            )
        ),
        array(
            'id'       => 'tt-share-button',
            'type'     => 'checkbox',
            'title'    => esc_html__( 'Share button', 'nominee' ),
            'subtitle' => esc_html__( 'Check to show share button', 'nominee' ),
            'options'  => array(
                'facebook' => esc_html__( 'Facebook', 'nominee' ),
                'twitter'  => esc_html__( 'Twitter', 'nominee' ),
                'linkedin' => esc_html__( 'Linkedin', 'nominee' )
            ),
            'default'  => array(
                'facebook' => '1',
                'twitter'  => '1',
                'linkedin' => '1'
            )
        ),
        array(
            'id'       => 'blog-page-nav',
            'type'     => 'switch',
            'title'    => esc_html__('Blog Pagination or Navigation', 'nominee'),
            'subtitle' => esc_html__('Blog pagination style, posts pagination or newer / older posts', 'nominee'),
            'on'       => esc_html__('Pagination', 'nominee'),
            'off'      => esc_html__('Navigation', 'nominee'),
            'default'  => TRUE
        ),

        array(
            'id'       => 'blog-carousel-visibility',
            'type'     => 'switch',
            'title'    => esc_html__('Blog Carousel Visibility', 'nominee'),
            'subtitle' => esc_html__('You can show or hide post carousel from post grid view', 'nominee'),
            'on'       => esc_html__('Show', 'nominee'),
            'off'      => esc_html__('Hide', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'carousel-post-query',
            'type'     => 'switch',
            'required' => array('blog-carousel-visibility', '=', '1'),
            'title'    => esc_html__('Carousel post query', 'nominee'),
            'subtitle' => esc_html__('Select carousel post query', 'nominee'),
            'on'       => esc_html__('Recent post', 'nominee'),
            'off'      => esc_html__('Post from category', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'carousel-cat-post',
            'type'     => 'select',
            'required' => array('carousel-post-query', '=', '0'),
            'title'    => esc_html__('Category', 'nominee'),
            'subtitle' => esc_html__('Select Category', 'nominee'),
            'multi'    => true,
            'data'     => 'categories'
        ),

        array(
            'id'       => 'post-per-page',
            'type'     => 'text',
            'required' => array('blog-carousel-visibility', '=', '1'),
            'title'    => esc_html__('Carousel post number', 'nominee'),
            'subtitle' => esc_html__('Enter carousel post number to show', 'nominee'),
            'default'  => 5
        )
    )
));


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-file-edit',
    'title'  => esc_html__('Page Settings', 'nominee'),
    'fields' => array(

        array(
            'id'       => 'page-sidebar',
            'type'     => 'image_select',
            'title'    => esc_html__('Page Sidebar', 'nominee'),
            'subtitle' => esc_html__('Select page sidebar', 'nominee'),
            'options'  => array(
                'no-sidebar'    => array(
                    'alt' => 'No sidebar',
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left-sidebar'  => array(
                    'alt' => 'Left sidebar',
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right-sidebar' => array(
                    'alt' => 'Right sidebar',
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            ),
            'default'  => 'right-sidebar'
        )
    )
));


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Event settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-calendar',
    'title'  => esc_html__('Event Settings', 'nominee'),
    'fields' => array(

        array(
            'id'       => 'event-start-date-prefix',
            'type'     => 'text',
            'title'    => esc_html__('Event start date prefix', 'nominee'),
            'subtitle' => esc_html__('Change event start date prefix, default is: Its Beginning!', 'nominee'),
            'default'  => esc_html__('Its Beginning!', 'nominee')
        ),

        array(
            'id'       => 'event-date-counting',
            'type'     => 'switch',
            'title'    => esc_html__('Event date counting', 'nominee'),
            'subtitle' => esc_html__('Show or hide event counter from event single page', 'nominee'),
            'on'       => esc_html__('Show', 'nominee'),
            'off'      => esc_html__('Hide', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'event-map-visibility',
            'type'     => 'switch',
            'title'    => esc_html__('Event map visibility', 'nominee'),
            'subtitle' => esc_html__('Show or hide event map from event single page', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'event-passed-notice',
            'type'     => 'switch',
            'title'    => esc_html__('Event passed notice', 'nominee'),
            'subtitle' => esc_html__('Show or hide event passed notice from single event page.', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => TRUE
        ),

        array(
            'id'       => 'event-passed-notice-text',
            'type'     => 'text',
            'required' => array('event-passed-notice', '=', '1'),
            'title'    => esc_html__('Event passed notice text', 'nominee'),
            'default'  => esc_html__('This event is passed', 'nominee'),
        ),

        array(
            'id'    => 'counting_headding',
            'type'  => 'info',
            'class' => 'redux-heading',
            'title' => esc_html__('Counting Text', 'nominee'),
        ),

        array(
            'id'       => 'count-day',
            'type'     => 'text',
            'title'    => esc_html__('Day text', 'nominee'),
            'default'  => esc_html__('Days', 'nominee'),
        ),
        array(
            'id'       => 'count-hour',
            'type'     => 'text',
            'title'    => esc_html__('Hour text', 'nominee'),
            'default'  => esc_html__('Hour', 'nominee'),
        ),
        array(
            'id'       => 'count-minute',
            'type'     => 'text',
            'title'    => esc_html__('Minute text', 'nominee'),
            'default'  => esc_html__('Munites', 'nominee'),
        ),
        array(
            'id'       => 'count-second',
            'type'     => 'text',
            'title'    => esc_html__('Second text', 'nominee'),
            'default'  => esc_html__('Seconds', 'nominee'),
        )
    )
));


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Reformation settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-th-large',
    'title'  => esc_html__('Reformation Settings', 'nominee'),
    'fields' => array(
        array(
            'id'       => 'reformation-navigation',
            'type'     => 'switch',
            'title'    => esc_html__('Reformation navigation visibility', 'nominee'),
            'subtitle' => esc_html__('You can show or hide reformation navigation bar from single reformation page', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'all-reformation-link',
            'type'     => 'select',
            'required' => array('reformation-navigation', '=', '1'),
            'title'    => esc_html__('All Reformation page link', 'nominee'),
            'subtitle' => esc_html__('Select reformation page to linking with all reformation page', 'nominee'),
            'multi'    => false,
            'data'     => 'page'
        ),

        array(
            'id'       => 'reformation-share',
            'type'     => 'switch',
            'title'    => esc_html__('Reformation share button visibility', 'nominee'),
            'subtitle' => esc_html__('You can show or hide reformation share button from single reformation page', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'related-reformation',
            'type'     => 'switch',
            'title'    => esc_html__('Related reformation visibility', 'nominee'),
            'subtitle' => esc_html__('You can show or hide related reformation from single reformation page', 'nominee'),
            'on'       => esc_html__('Visible', 'nominee'),
            'off'      => esc_html__('Hidden', 'nominee'),
            'default'  => TRUE,
        )
    )
));


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Issue settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-bullhorn',
    'title'  => esc_html__('Issue Settings', 'nominee'),
    'fields' => array(
        array(
            'id'       => 'issue-limit',
            'type'     => 'text',
            'title'    => esc_html__('Issue post limit', 'nominee'),
            'subtitle' => esc_html__('Enter post number that would you like to show per page', 'nominee'),
            'default'  => 10
        ),
        array(
            'id'       => 'category-issue-limit',
            'type'     => 'text',
            'title'    => esc_html__('Issue post limit in category', 'nominee'),
            'subtitle' => esc_html__('Enter post number that would you like to show per page', 'nominee'),
            'default'  => 10
        )
    )
));

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Member settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-user',
    'title'  => esc_html__('Member Settings', 'nominee'),
    'fields' => array(
        array(
            'id'       => 'biography-text',
            'type'     => 'text',
            'title'    => esc_html__('Biography text', 'nominee'),
            'subtitle' => esc_html__('Change biography text from members', 'nominee'),
            'default'  => esc_html__('Biography', 'nominee')
        ),

        array(
            'id'       => 'more-member',
            'type'     => 'switch',
            'title'    => esc_html__('Related member show/hide', 'nominee'),
            'subtitle' => esc_html__('You can show or hide more member from single member page', 'nominee'),
            'on'       => esc_html__('Show', 'nominee'),
            'off'      => esc_html__('Hide', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'related-member-query',
            'type'     => 'select',
            'title'    => esc_html__('Related Member Query', 'nominee'),
            'required' => array('more-member', '=', '1'),
            'options'  => array(
                'member-cat' => esc_html__('Category Related Member', 'nominee'),
                'member-rand' => esc_html__('Random Member', 'nominee'),
            ),
            'desc'     => esc_html__('Select member query', 'nominee'),
            'default'  => 'member-rand'
        ),
        
        array(
            'id'       => 'more-staff-text',
            'type'     => 'text',
            'required' => array('more-member', '=', '1'),
            'title'    => esc_html__('More staff text', 'nominee'),
            'subtitle' => esc_html__('Change more staff text from single member page', 'nominee'),
            'default'  => esc_html__('More Staff', 'nominee')
        )
    )
));


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Donation settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-heart',
    'title'  => esc_html__('Nominee Donation', 'nominee'),
    'fields' => array(
        array(
            'id'       => 'paypal-type',
            'type'     => 'select',
            'title'    => esc_html__('Your Paypal Account type', 'nominee'),
            'options'  => array(
                'free' => 'Free Account',
                'pro'  => 'Pro Account'
            ),
            'default'  => 'free'
        ),
        array(
            'id'       => 'paypal-mail',
            'type'     => 'text',
            'title'    => esc_html__('PayPal Email', 'nominee'),
            'subtitle' => esc_html__('Enter PayPal email address', 'nominee'),
        ),
        array(
            'id'       => 'donate-currency',
            'type'     => 'switch',
            'title'    => esc_html__('Donate currency', 'nominee'),
            'subtitle' => esc_html__('Select currency option, default is dollar($)', 'nominee'),
            'on'       => esc_html__('Default($)', 'nominee'),
            'off'      => esc_html__('Custom', 'nominee'),
            'default'  => TRUE,
        ),
        array(
            'id'       => 'donate-custom-currency',
            'type'     => 'text',
            'required' => array('donate-currency', '=', '0'),
            'title'    => esc_html__('Custom currency sign', 'nominee'),
            'subtitle' => esc_html__('Enter your currency sign', 'nominee'),
            'default'  => '€'
        ),
        array(
            'id'       => 'donate-currency-code',
            'type'     => 'switch',
            'title'    => esc_html__('Donate currency Code', 'nominee'),
            'subtitle' => esc_html__('Select currency code option, default is USD', 'nominee'),
            'on'       => esc_html__('Default(USD)', 'nominee'),
            'off'      => esc_html__('Custom', 'nominee'),
            'default'  => TRUE,
        ),
        array(
            'id'       => 'donate-custom-currency-code',
            'type'     => 'text',
            'required' => array('donate-currency-code', '=', '0'),
            'title'    => esc_html__('Custom currency code', 'nominee'),
            'subtitle' => esc_html__('Enter your currency code', 'nominee'),
            'desc'     => 'All list can be found here: http://www.science.co.il/International/Currency-codes.asp',
            'default'  => 'EUR'
        ),
        array(
            'id'       => 'donate-amount-500',
            'type'     => 'text',
            'title'    => esc_html__('Default amount 500', 'nominee'),
            'subtitle' => esc_html__('You can change the value of the amount or leave blank to hide this option', 'nominee'),
            'default'  => '500'
        ),
        array(
            'id'       => 'donate-amount-200',
            'type'     => 'text',
            'title'    => esc_html__('Default amount 200', 'nominee'),
            'subtitle' => esc_html__('You can change the value of the amount or leave blank to hide this option', 'nominee'),
            'default'  => '200'
        ),
        array(
            'id'       => 'donate-amount-100',
            'type'     => 'text',
            'title'    => esc_html__('Default amount 100', 'nominee'),
            'subtitle' => esc_html__('You can change the value of the amount or leave blank to hide this option', 'nominee'),
            'default'  => '100'
        ),
        array(
            'id'       => 'donate-amount-50',
            'type'     => 'text',
            'title'    => esc_html__('Default amount 50', 'nominee'),
            'subtitle' => esc_html__('You can change the value of the amount or leave blank to hide this option', 'nominee'),
            'default'  => '50'
        ),
        array(
            'id'       => 'donate-amount',
            'type'     => 'text',
            'title'    => esc_html__('Others default amount', 'nominee'),
            'subtitle' => esc_html__('The default amount for a donation (Optional)', 'nominee')
        ),
        array(
            'id'       => 'donate-purpose',
            'type'     => 'text',
            'title'    => esc_html__('Purpose', 'nominee'),
            'subtitle' => esc_html__('The default purpose for a donation (Optional)', 'nominee')
        ),
        array(
            'id'       => 'donate-modal-title',
            'type'     => 'text',
            'title'    => esc_html__('Donate form title', 'nominee'),
            'subtitle' => esc_html__('Default reference for a donation (Optional)', 'nominee'),
            'default'  => esc_html__('How much would you like to donate?', 'nominee')
        ),
        array(
            'id'       => 'submit-button-text',
            'type'     => 'text',
            'title'    => esc_html__('Donate form submit button text', 'nominee'),
            'subtitle' => esc_html__('Change form submit button text', 'nominee'),
            'default'  => esc_html__('Donate Now', 'nominee')
        )
    )
));



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Charitable Donation page settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if ( class_exists( 'Charitable' ) ) :
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-file-edit',
        'title'  => esc_html__('Charitable Donation', 'nominee'),
        'fields' => array(
            array(
                'id'    => 'single_donation_headding',
                'type'  => 'info',
                'class' => 'redux-heading',
                'title' => esc_html__('Single Page Settings', 'nominee'),
            ),
            array(
                'id'       => 'donation-sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__('Donation Single Page Sidebar', 'nominee'),
                'subtitle' => esc_html__('Select donation single page sidebar', 'nominee'),
                'options'  => array(
                    'no-sidebar'    => array(
                        'alt' => 'No sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    'left-sidebar'  => array(
                        'alt' => 'Left sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'right-sidebar'
            ),

            array(
                'id'       => 'donation-map',
                'type'     => 'select',
                'title'    => esc_html__('Map Visibility', 'nominee'),
                'subtitle' => esc_html__('Visible or Hidden map from donation single page', 'nominee'),
                'options'  => array(
                    'visible' => esc_html__('Visible', 'nominee'),
                    'hidden' => esc_html__('Hidden', 'nominee')
                ),
                'default'  => 'visible'
            ),


            // Donations page settings
            array(
                'id'    => 'donation_headding',
                'type'  => 'info',
                'class' => 'redux-heading',
                'title' => esc_html__('Donation Page Settings', 'nominee'),
            ),
            array(
                'id'       => 'donation-header-visibility',
                'type'     => 'select',
                'title'    => esc_html__('Donation Form header visibility', 'nominee'),
                'subtitle' => esc_html__('Visible or Hidden all page header section', 'nominee'),
                'options'  => array(
                    'donation-section-show' => esc_html__('Donation Header Section Show', 'nominee'),
                    'donation-section-hide' => esc_html__('Donation Header Section Hide', 'nominee')
                ),
                'desc'     => esc_html__('Will show/hide background image and title', 'nominee'),
                'default'  => 'donation-section-show'
            ),

            array(
                'id'       => 'donation-title-intro',
                'type'     => 'text',
                'required' => array('donation-header-visibility', '=', 'donation-section-show'),
                'title'    => esc_html__('Donation title intro.', 'nominee')
            ),
            array(
                'id'       => 'donation-title',
                'type'     => 'text',
                'required' => array('donation-header-visibility', '=', 'donation-section-show'),
                'title'    => esc_html__('Donation title.', 'nominee')
            ),
            array(
                'id'       => 'donation-title-desc',
                'type'     => 'editor',
                'required' => array('donation-header-visibility', '=', 'donation-section-show'),
                'title'    => esc_html__('Donation title description', 'nominee')
            )
        )
    ));
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Shop settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (class_exists('WooCommerce')) :
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-shopping-cart',
        'title'  => esc_html__('Shop Settings', 'nominee'),
        'fields' => array(

            array(
                'id'       => 'shop-sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__('Shop Sidebar', 'nominee'),
                'subtitle' => esc_html__('Select shop sidebar', 'nominee'),
                'options'  => array(
                    'no-sidebar'    => array(
                        'alt' => 'No sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    'left-sidebar'  => array(
                        'alt' => 'Left sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'right-sidebar'
            ),

            array(
                'id'       => 'product-per-page',
                'type'     => 'text',
                'title'    => esc_html__('Product per page', 'nominee'),
                'subtitle' => esc_html__('Change number of products per page', 'nominee'),
                'default'  => '6'
            ),

            array(
                'id'       => 'product-column',
                'type'     => 'select',
                'title'    => esc_html__('Product per row', 'nominee'),
                'subtitle' => esc_html__('Change number of products per row', 'nominee'),
                'options'  => array(
                    '2' => 'Column 2',
                    '3' => 'Column 3',
                    '4' => 'Column 4'
                ),
                'default'  => '3'
            )
        )
    ));
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Newsletter popup
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-envelope',
    'title'  => esc_html__('Newsletter Popup', 'nominee'),
    'fields' => array(
        array(
            'id'       => 'newsletter-popup',
            'type'     => 'switch',
            'title'    => esc_html__( 'Newsletter popup', 'nominee' ),
            'subtitle' => esc_html__( 'Enable/disable newsletter popup.', 'nominee' ),
            'on'       => esc_html__( 'Enable', 'nominee' ),
            'off'      => esc_html__( 'Disable', 'nominee' ),
            'default'  => FALSE,
        ),
        array(
            'id'       => 'newsletter-popup-limit',
            'type'     => 'switch',
            'title'    => esc_html__( 'Newsletter popup showing limit', 'nominee' ),
            'subtitle' => esc_html__( 'Select showing option', 'nominee' ),
            'on'       => esc_html__( 'Show first time visit', 'nominee' ),
            'off'      => esc_html__( 'Show all time visit', 'nominee' ),
            'default'  => FALSE,
            'required' => array( 'newsletter-popup', '=', '1' ),
        ),
        array(
            'id'       => 'newsletter-popup-time',
            'type'     => 'text',
            'title'    => esc_html__( 'Newsletter popup time', 'nominee' ),
            'subtitle' => esc_html__( 'Enter popup display time in second.', 'nominee' ),
            'default'  => 3,
            'required' => array( 'newsletter-popup', '=', '1' ),
        ),
        array(
            'id'       => 'newsletter-popup-content',
            'type'     => 'editor',
            'title'    => esc_html__( 'Contents', 'nominee' ),
            'subtitle' => esc_html__( 'Newsletter popup contents', 'nominee' ),
            'required' => array( 'newsletter-popup', '=', '1' ),
            'default'  => wp_kses( '<p></p>', array(
                'h2'   => array( 'class' => array() ),
                'h3'   => array( 'class' => array() ),
                'span'   => array( 'class' => array() ),
                'strong' => array( 'class' => array() ),
                'ul'     => array( 'class' => array() ),
                'ol'     => array( 'class' => array() ),
                'a'      => array( 'class' => array(), 'href' => array(), 'target' => array() ),
                'li'     => array( 'class' => array() ),
                'p'      => array( 'class' => array() ),
                'div'    => array( 'class' => array() ),
                'img'    => array( 'class' => array(), 'src' => array(), 'alt' => array() ),
            ) ),
        )
    )
));


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Preloader settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-repeat-alt',
    'title'  => esc_html__('Preloader Settings', 'nominee'),
    'fields' => array(
        array(
            'id'       => 'page-preloader',
            'type'     => 'switch',
            'title'    => esc_html__('Page Preloader', 'nominee'),
            'subtitle' => esc_html__('You can enable or disable page preloader from here.', 'nominee'),
            'on'       => esc_html__('Enable', 'nominee'),
            'off'      => esc_html__('Disable', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'loader-bg-color',
            'type'     => 'background',
            'output'   => array('.preloader'),
            'required' => array( 'page-preloader', '=', '1' ),
            'title'    => esc_html__( 'Preloader background color', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for preloader background (default: #ffffff).', 'nominee' ),
            'background-repeat' => false,
            'background-attachment' => false,
            'background-position' => false,
            'background-image' => false,
            'background-size' => false,
            'preview' => false,
            'transparent' => false,
        ),

        array(
            'id'       => 'loader-type',
            'type'     => 'switch',
            'title'    => esc_html__('Loader Type', 'nominee'),
            'required' => array( 'page-preloader', '=', '1' ),
            'subtitle' => esc_html__('Select loader type', 'nominee'),
            'on'       => esc_html__('Image Loader', 'nominee'),
            'off'      => esc_html__('CSS Loader', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'tt-loader',
            'type'     => 'media',
            'preview'  => 'true',
            'required' => array( 'loader-type', '=', '1' ),
            'title'    => esc_html__('Animation file', 'nominee'),
            'subtitle' => esc_html__('Upload loader gif animation file', 'nominee')
        ),

        array(
            'id'       => 'dot-color',
            'type'     => 'background',
            'output'   => array('.preloader .loading-icon .dot'),
            'required' => array( 'loader-type', '=', '0' ),
            'title'    => esc_html__( 'Dot color', 'nominee' ),
            'subtitle' => esc_html__( 'Pick color for preloader dot (default: #23232c).', 'nominee' ),
            'background-repeat' => false,
            'background-attachment' => false,
            'background-position' => false,
            'background-image' => false,
            'background-size' => false,
            'preview' => false,
            'transparent' => false,
        )
    )
));

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Social settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-share',
    'title'  => esc_html__('Social Icon Settings', 'nominee'),
    'fields' => array(
        array(
            'id'       => 'facebook-link',
            'type'     => 'text',
            'title'    => esc_html__('Facebook Link', 'nominee'),
            'subtitle' => esc_html__('Enter facebook page or profile link. Leave blank to hide icon.', 'nominee'),
            'default'  => "#"
        ),
        array(
            'id'       => 'twitter-link',
            'type'     => 'text',
            'title'    => esc_html__('Twitter Link', 'nominee'),
            'subtitle' => esc_html__('Enter twitter link. Leave blank to hide icon.', 'nominee'),
            'default'  => "#"
        ),
        array(
            'id'       => 'google-plus-link',
            'type'     => 'text',
            'title'    => esc_html__('Google Plus Link', 'nominee'),
            'subtitle' => esc_html__('Enter google plus page or profile link. Leave blank to hide icon.', 'nominee'),
            'default'  => "#"
        ),
        array(
            'id'       => 'youtube-link',
            'type'     => 'text',
            'title'    => esc_html__('Youtube Link', 'nominee'),
            'subtitle' => esc_html__('Enter youtube chanel link. Leave blank to hide icon.', 'nominee'),
        ),
        array(
            'id'       => 'pinterest-link',
            'type'     => 'text',
            'title'    => esc_html__('Pinterest Link', 'nominee'),
            'subtitle' => esc_html__('Enter pinterest link. Leave blank to hide icon.', 'nominee'),
            'default'  => "#"
        ),
        array(
            'id'       => 'flickr-link',
            'type'     => 'text',
            'title'    => esc_html__('Flickr Link', 'nominee'),
            'subtitle' => esc_html__('Enter flicker link. Leave blank to hide icon.', 'nominee'),
        ),
        array(
            'id'       => 'linkedin-link',
            'type'     => 'text',
            'title'    => esc_html__('Linkedin Link', 'nominee'),
            'subtitle' => esc_html__('Enter linkedin profile link. Leave blank to hide icon.', 'nominee'),
        ),
        array(
            'id'       => 'vimeo-link',
            'type'     => 'text',
            'title'    => esc_html__('Vimeo Link', 'nominee'),
            'subtitle' => esc_html__('Enter vimeo chanel link. Leave blank to hide icon.', 'nominee'),
        ),
        array(
            'id'       => 'instagram-link',
            'type'     => 'text',
            'title'    => esc_html__('Instagram Link', 'nominee'),
            'subtitle' => esc_html__('Enter instagram page or profile link. Leave blank to hide icon.', 'nominee'),
        ),
        array(
            'id'       => 'dribbble-link',
            'type'     => 'text',
            'title'    => esc_html__('Dribbble Link', 'nominee'),
            'subtitle' => esc_html__('Enter dribbble profile link. Leave blank to hide icon.', 'nominee'),
        ),
        array(
            'id'       => 'behance-link',
            'type'     => 'text',
            'title'    => esc_html__('Behance Link', 'nominee'),
            'subtitle' => esc_html__('Enter behance profile link. Leave blank to hide icon.', 'nominee'),
        )
    )
));

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Footer settings
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-photo',
    'title'  => esc_html__('Footer Settings', 'nominee'),
    'fields' => array(

        // footer style
        array(
            'id'       => 'footer-style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Footer styles', 'nominee' ),
            'subtitle' => esc_html__( 'Select Footer Style.', 'nominee' ),
            'options'  => array(
                'footer-multipage'   => array(
                    'alt' => esc_html__('Footer multipage', 'nominee'),
                    'img' => get_template_directory_uri() . '/images/footer-multipage.jpg'
                ),
                'footer-onepage'   => array(
                    'alt' => esc_html__('Footer onepage', 'nominee'),
                    'img' => get_template_directory_uri() . '/images/footer-onepage.jpg'
                ),
                'no-footer'   => array(
                    'alt' => esc_html__('No Footer', 'nominee'),
                    'img' => get_template_directory_uri() . '/images/no-footer.jpg'
                )
            ),
            'default'  => 'footer-multipage'
        ),

        array(
            'id'       => 'footer-text',
            'type'     => 'editor',
            'title'    => esc_html__('Footer Copyright Text', 'nominee'),
            'subtitle' => esc_html__('Write footer copyright text here.', 'nominee')
        ),

        array(
            'id'       => 'social-icon-visibility',
            'type'     => 'switch',
            'title'    => esc_html__('Social icon visibility', 'nominee'),
            'subtitle' => esc_html__('Shor or hide social icon from footer', 'nominee'),
            'desc'     => esc_html__('More settings you will be found in the Social Icon Settings Tab', 'nominee'),
            'on'       => esc_html__('Show', 'nominee'),
            'off'      => esc_html__('Hide', 'nominee'),
            'default'  => TRUE,
        ),

        array(
            'id'       => 'social-intro-title',
            'type'     => 'text',
            'required' => array('social-icon-visibility', '=', '1'),
            'title'    => esc_html__('Social intro title', 'nominee'),
            'subtitle' => esc_html__('Enter social intro title here', 'nominee'),
            'default'  => esc_html__('We are social, Follow us in social media', 'nominee')
        )
    )
));


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Custom Style
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-css',
    'title'  => esc_html__('Custom CSS', 'nominee'),
    'fields' => array(
        array(
            'id'       => 'custom_style',
            'type'     => 'textarea',
            'title'    => esc_html__('CSS Code', 'nominee'),
            'desc' => esc_html__('You can write your custom CSS here.', 'nominee')
        )
    )
));