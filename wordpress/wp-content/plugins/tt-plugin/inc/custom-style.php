<?php

    header('Content-type: text/css');

    $parse_uri = explode('wp-content', $_SERVER[ 'SCRIPT_FILENAME' ]);

    $wp_load = $parse_uri[ 0 ] . 'wp-load.php';
    require_once($wp_load);

    // color options
    $accent_color = nominee_option('accent-color', false, '#ef4836');
    $section_title = nominee_option('section-title-color', false, '#2f2f2f');
    $link_color = nominee_option('link-color', false, '#ef4836');

    // background color options
    $body_bg_color = nominee_option('body-bg-color', false, '#ffffff');
    
    // accent color darken
    $accent_darken = nominee_modify_color( $accent_color, -50 );
    $link_darken = nominee_modify_color( $link_color, -50 );

    // body typography
    $font_color = nominee_option('body-typography', 'color');
    $font_size = nominee_option('body-typography', 'font-size');
    $font_family = nominee_option('body-typography', 'font-family');
    $font_weight = nominee_option('body-typography', 'font-weight');
    $line_height = nominee_option('body-typography', 'line-height');

    // heading typography
    $heading_color = nominee_option('heading-typography', 'color');
    $heading_font_family = nominee_option('heading-typography', 'font-family');
    $heading_font_weight = nominee_option('heading-typography', 'font-weight');

    // specific title size and it's line height

    // for H1
    $h1_font_size = nominee_option('h1-typography', 'font-size');
    $h1_line_height = nominee_option('h1-typography', 'line-height');

    // for H2
    $h2_font_size = nominee_option('h2-typography', 'font-size');
    $h2_line_height = nominee_option('h2-typography', 'line-height');

    // for H3
    $h3_font_size = nominee_option('h3-typography', 'font-size');
    $h3_line_height = nominee_option('h3-typography', 'line-height');

    // for H4
    $h4_font_size = nominee_option('h4-typography', 'font-size');
    $h4_line_height = nominee_option('h4-typography', 'line-height'); 

    // for H5
    $h5_font_size = nominee_option('h5-typography', 'font-size');
    $h5_line_height = nominee_option('h5-typography', 'line-height');

    // for H6
    $h6_font_size = nominee_option('h6-typography', 'font-size');
    $h6_line_height = nominee_option('h6-typography', 'line-height');



    // MENU BACKGROUND COLORS
    // menu background for default header
    $menu_bg_color = nominee_option('menu-bg-color');
    if ($menu_bg_color) :
        $menu_bg_color = 'background-color:' .$menu_bg_color. '';
    endif;
    // menu background for default header
    $menu_bg_color_transparent = nominee_option('menu-bg-color-transparent');
    if ($menu_bg_color_transparent) :
        $menu_bg_color_transparent = 'background-color:' .$menu_bg_color_transparent. '';
    endif;
    // menu background for fullwidth header
    $menu_bg_color_fullwidth = nominee_option('menu-bg-color-fullwidth');
    if ($menu_bg_color_fullwidth) :
        $menu_bg_color_fullwidth = 'background-color:' .$menu_bg_color_fullwidth. '';
    endif;
    // menu background for center logo header
    $menu_bg_color_center_logo = nominee_option('menu-bg-color-center-logo');
    if ($menu_bg_color_center_logo) :
        $menu_bg_color_center_logo = 'background-color:' .$menu_bg_color_center_logo. '';
    endif;
    // menu background for box header style
    $menu_bg_color_box_style = nominee_option('menu-bg-color-box-style');
    if ($menu_bg_color_box_style) :
        $menu_bg_color_box_style = 'background-color:' .$menu_bg_color_box_style. '';
    endif;


    // MENU COLORS
    // menu color for default header
    $default_font_color = nominee_option('menu-color');
    if ($default_font_color) :
        $default_font_color = 'color:' .$default_font_color. '';
    endif;
    // menu color for transparent header
    $default_font_color_transparent = nominee_option('menu-color-transparent');
    if ($default_font_color_transparent) :
        $default_font_color_transparent = 'color:' .$default_font_color_transparent. '';
    endif;
    // menu color for fullwidth header
    $default_font_color_fullwidth = nominee_option('menu-color-fullwidth');
    if ($default_font_color_fullwidth) :
        $default_font_color_fullwidth = 'color:' .$default_font_color_fullwidth. '';
    endif;
    // menu color for center logo header
    $default_font_color_center_logo = nominee_option('menu-color-center-logo');
    if ($default_font_color_center_logo) :
        $default_font_color_center_logo = 'color:' .$default_font_color_center_logo. '';
    endif;
    // menu color for box style header
    $default_font_color_box_style = nominee_option('menu-color-box-style');
    if ($default_font_color_box_style) :
        $default_font_color_box_style = 'color:' .$default_font_color_box_style. '';
    endif;



    // MOBILE MENU BACKGROUND COLORS
    // mobile menu background for default header
    $mobile_menu_bg_color = nominee_option('mobile-menu-bg-color');
    if ($mobile_menu_bg_color) :
        $mobile_menu_bg_color = 'background-color:' .$mobile_menu_bg_color. '';
    endif;
    // mobile menu background for -transparent header
    $mobile_menu_bg_color_transparent = nominee_option('mobile-menu-bg-color-transparent');
    if ($mobile_menu_bg_color_transparent) :
        $mobile_menu_bg_color_transparent = 'background-color:' .$mobile_menu_bg_color_transparent. '';
    endif;
    // mobile menu background for fullwidth header
    $mobile_menu_bg_color_fullwidth = nominee_option('mobile-menu-bg-color-fullwidth');
    if ($mobile_menu_bg_color_fullwidth) :
        $mobile_menu_bg_color_fullwidth = 'background-color:' .$mobile_menu_bg_color_fullwidth. '';
    endif;
    // mobile menu background for center logo header
    $mobile_menu_bg_color_center_logo = nominee_option('mobile-menu-bg-color-center-logo');
    if ($mobile_menu_bg_color_center_logo) :
        $mobile_menu_bg_color_center_logo = 'background-color:' .$mobile_menu_bg_color_center_logo. '';
    endif;
    // mobile menu background for box style header
    $mobile_menu_bg_color_box_style = nominee_option('mobile-menu-bg-color-box-style');
    if ($mobile_menu_bg_color_box_style) :
        $mobile_menu_bg_color_box_style = 'background-color:' .$mobile_menu_bg_color_box_style. '';
    endif;



    // MOBILE MENU COLOR
    // mobile menu color for default header
    $mobile_menu_font_color = nominee_option('mobile-menu-color');
    if ($mobile_menu_font_color) :
        $mobile_menu_font_color = 'color:' .$mobile_menu_font_color. '';
    endif;
    // mobile menu color for transparent header
    $mobile_menu_font_color_transparent = nominee_option('mobile-menu-color-transparent');
    if ($mobile_menu_font_color_transparent) :
        $mobile_menu_font_color_transparent = 'color:' .$mobile_menu_font_color_transparent. '';
    endif;
    // mobile menu color for fullwidth header
    $mobile_menu_font_color_fullwidth = nominee_option('mobile-menu-color-fullwidth');
    if ($mobile_menu_font_color_fullwidth) :
        $mobile_menu_font_color_fullwidth = 'color:' .$mobile_menu_font_color_fullwidth. '';
    endif;
    // mobile menu color for center logo header
    $mobile_menu_font_color_center_logo = nominee_option('mobile-menu-color-center-logo');
    if ($mobile_menu_font_color_center_logo) :
        $mobile_menu_font_color_center_logo = 'color:' .$mobile_menu_font_color_center_logo. '';
    endif;
    // mobile menu color for box_style header
    $mobile_menu_font_color_box_style = nominee_option('mobile-menu-color-box-style');
    if ($mobile_menu_font_color_box_style) :
        $mobile_menu_font_color_box_style = 'color:' .$mobile_menu_font_color_box_style. '';
    endif;



    // STICKY MENU BACKGROUND COLOR
    // sticky menu BG color for default header
    $sticky_menu_bg_color = nominee_option('sticky-menu-bg-color');
    if ($sticky_menu_bg_color) :
        $sticky_menu_bg_color = 'background-color:' .$sticky_menu_bg_color. '';
    endif;
    // sticky menu BG color for transparent header
    $sticky_menu_bg_color_transparent = nominee_option('sticky-menu-bg-color-transparent');
    if ($sticky_menu_bg_color_transparent) :
        $sticky_menu_bg_color_transparent = 'background-color:' .$sticky_menu_bg_color_transparent. '';
    endif;
    // sticky menu BG color for fullwidth header
    $sticky_menu_bg_color_fullwidth = nominee_option('sticky-menu-bg-color-fullwidth');
    if ($sticky_menu_bg_color_fullwidth) :
        $sticky_menu_bg_color_fullwidth = 'background-color:' .$sticky_menu_bg_color_fullwidth. '';
    endif;
    // sticky menu BG color for center logo header
    $sticky_menu_bg_color_center_logo = nominee_option('sticky-menu-bg-color-center-logo');
    if ($sticky_menu_bg_color_center_logo) :
        $sticky_menu_bg_color_center_logo = 'background-color:' .$sticky_menu_bg_color_center_logo. '';
    endif;
    // sticky menu BG color for box_style header
    $sticky_menu_bg_color_box_style = nominee_option('sticky-menu-bg-color-box-style');
    if ($sticky_menu_bg_color_box_style) :
        $sticky_menu_bg_color_box_style = 'background-color:' .$sticky_menu_bg_color_box_style. '';
    endif;


    // STICKY MENU COLOR
    // sticky menu color for default header
    $sticky_font_color = nominee_option('sticky-menu-color');
    if ($sticky_font_color) :
        $sticky_font_color = 'color:' .$sticky_font_color. '';
    endif;
    // sticky menu color for transparent header
    $sticky_font_color_transparent = nominee_option('sticky-menu-color-transparent');
    if ($sticky_font_color_transparent) :
        $sticky_font_color_transparent = 'color:' .$sticky_font_color_transparent. '';
    endif;
    // sticky menu color for fullwidth header
    $sticky_font_color_fullwidth = nominee_option('sticky-menu-color-fullwidth');
    if ($sticky_font_color_fullwidth) :
        $sticky_font_color_fullwidth = 'color:' .$sticky_font_color_fullwidth. '';
    endif;
    // sticky menu color for center logo header
    $sticky_font_color_center_logo = nominee_option('sticky-menu-color-center-logo');
    if ($sticky_font_color_center_logo) :
        $sticky_font_color_center_logo = 'color:' .$sticky_font_color_center_logo. '';
    endif;
    // sticky menu color for box_style header
    $sticky_font_color_box_style = nominee_option('sticky-menu-color-box-style');
    if ($sticky_font_color_box_style) :
        $sticky_font_color_box_style = 'color:' .$sticky_font_color_box_style. '';
    endif;

?>

<?php if(nominee_option('site-typography')) : ?>
body{
    color: <?php echo esc_attr($font_color) ?>;
    font-size: <?php echo esc_attr($font_size) ?>;
    font-family: <?php echo esc_attr($font_family) ?>;
    line-height: <?php echo esc_attr($line_height) ?>;
}

h1, 
h2, 
h3, 
h4, 
h5, 
h6{
    color: <?php echo esc_attr($heading_color) ?>;
    font-family: <?php echo esc_attr($heading_font_family) ?>;
    font-weight: <?php echo esc_attr($heading_font_weight) ?>;
}
h1{
    font-size: <?php echo esc_attr($h1_font_size) ?>;
    line-height: <?php echo esc_attr($h1_line_height) ?>;
}
h2{
    font-size: <?php echo esc_attr($h2_font_size) ?>;
    line-height: <?php echo esc_attr($h2_line_height) ?>;
}
h3{
    font-size: <?php echo esc_attr($h3_font_size) ?>;
    line-height: <?php echo esc_attr($h3_line_height) ?>;
}
h4{
    font-size: <?php echo esc_attr($h4_font_size) ?>;
    line-height: <?php echo esc_attr($h4_line_height) ?>;
}
h5{
    font-size: <?php echo esc_attr($h5_font_size) ?>;
    line-height: <?php echo esc_attr($h5_line_height) ?>;
}
h6{
    font-size: <?php echo esc_attr($h6_font_size) ?>;
    line-height: <?php echo esc_attr($h6_line_height) ?>;
}

.counter-section{
    font-family: <?php echo esc_attr($heading_font_family) ?>;
}

<?php endif; //typography end ?>



<?php 
// Header default colors 
?>
.header-default .navbar-default{
    <?php echo esc_attr($menu_bg_color) ?>
}
.header-default .sticky .navbar-default {
    <?php echo esc_attr($sticky_menu_bg_color) ?>
}
.header-default .navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($default_font_color) ?>
}
.header-default .sticky .navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($sticky_font_color) ?>
}


<?php 
// Header transparent colors 
?>
.header-transparent .navbar-default{
    <?php echo esc_attr($menu_bg_color_transparent); ?>
}
.header-transparent .sticky.navbar-default {
    <?php echo esc_attr($sticky_menu_bg_color_transparent); ?>
}
.header-transparent .navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($default_font_color_transparent); ?>
}
.header-transparent .sticky.navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($sticky_font_color_transparent); ?>
}


<?php 
// Header fullwidth colors 
?>
.header-fullwidth .navbar-default{
    <?php echo esc_attr($menu_bg_color_fullwidth) ?>
}
.header-fullwidth.sticky .navbar-default {
    <?php echo esc_attr($sticky_menu_bg_color_fullwidth) ?>
}
.header-fullwidth .navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($default_font_color_fullwidth) ?>
}

.header-fullwidth.sticky .navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($sticky_font_color_fullwidth) ?>
}


<?php 
// Header center logo colors 
?>
.header-style-center-logo .navbar-default{
    <?php echo esc_attr($menu_bg_color_center_logo) ?>
}
.header-style-center-logo .sticky .navbar-default {
    <?php echo esc_attr($sticky_menu_bg_color_center_logo) ?>
}
.header-style-center-logo .navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($default_font_color_center_logo) ?>
}
.header-style-center-logo .sticky .navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($sticky_font_color_center_logo) ?>
}


<?php 
// Header box style colors 
?>
.tt-header-box-style .main-menu-wrapper{
    <?php echo esc_attr($menu_bg_color_box_style); ?>
}
.header-style-box-style .header-wrapper.sticky .main-menu-wrapper {
    <?php echo esc_attr($sticky_menu_bg_color_box_style); ?>
}
.tt-header-box-style .navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($default_font_color_box_style); ?>
}

.tt-header-box-style.sticky .navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($sticky_font_color_box_style); ?>
}

@media(min-width: 768px){
    .tt-header-box-style.header-wrapper.sticky::before{
        <?php echo esc_attr($sticky_menu_bg_color_box_style); ?>
    }
}

<?php
/**
*
* Media query
*/
?>

@media (max-width : 767px) {
    .header-default .navbar-default{
        <?php echo esc_attr($mobile_menu_bg_color)?>;
    }
    .header-default .navbar-default .navbar-nav li a{
        <?php echo esc_attr($mobile_menu_font_color) ?>;
    }

    .header-transparent .navbar-default{
        <?php echo esc_attr($mobile_menu_bg_color_transparent)?>;
    }
    .header-transparent .navbar-default .navbar-nav li a{
        <?php echo esc_attr($mobile_menu_font_color_transparent) ?>;
    }

    .header-fullwidth .navbar-default{
        <?php echo esc_attr($mobile_menu_bg_color_fullwidth)?>;
    }
    .header-style-fullwidth .navbar-nav li a{
        <?php echo esc_attr($mobile_menu_font_color_fullwidth) ?>;
    }

    .header-style-center-logo .navbar-default{
        <?php echo esc_attr($mobile_menu_bg_color_center_logo)?>;
    }
    .header-style-center-logo .navbar-default .navbar-nav li a{
        <?php echo esc_attr($mobile_menu_font_color_center_logo) ?>;
    }

    .tt-header-box-style .navbar-default {
        <?php echo esc_attr($mobile_menu_bg_color_box_style)?>;
    }
    .tt-header-box-style .navbar-default .navbar-nav>li>a{
        <?php echo esc_attr($mobile_menu_font_color_box_style) ?>;
    }
}




<?php if(nominee_option('site-preset-color')) :
/**
* Color preset
*
* Color
*/
?>

body{
    background-color: <?php echo esc_attr($body_bg_color) ?>;
}

a,
a:focus{
    color: <?php echo esc_attr($link_color) ?>;
}

a:hover {
    color: <?php echo esc_attr($link_darken) ?>;
}


<?php 
/**
*
* Section title color
*/
?>
.section-intro h2{
    color: <?php echo esc_attr($section_title); ?>;
}

.section-intro h2 span{
    color: <?php echo esc_attr($accent_color); ?>;
}

<?php 
/**
*
* Background color
*/
?>
.spotlight-card .tt-effect .theme-default-overlay,
.intro hr::after,
.owl-theme .owl-dots .owl-dot.active span, 
.owl-theme .owl-dots .owl-dot:hover span,
.team-carousel .owl-theme .owl-dots .owl-dot.active span, 
.team-carousel .owl-theme .owl-dots .owl-dot:hover span,
.btn-primary,
.btn-outline.active, 
.btn-outline.focus, 
.btn-outline:active, 
.btn-outline:focus, 
.btn-outline:hover,
.navbar-default .navbar-toggle:focus, 
.navbar-default .navbar-toggle:hover,
.open>.dropdown-toggle.btn-outline,
.tt-slider .slides-pagination a.current,
.tt-social-icon li a:hover,
.timeline>li:hover .posted-date,
.archivement-carousel .carousel-indicators .active,
.tt-filter li button.active,
.pagination>li>a:focus,
.pagination>li>a:hover,
.pagination>li>span:focus,
.pagination>li>span:hover,
.pagination>li>span.current,
.woocommerce nav.woocommerce-pagination ul li a:focus, 
.woocommerce nav.woocommerce-pagination ul li a:hover, 
.woocommerce nav.woocommerce-pagination ul li span.current,
.widget_archive > ul > li::before,
.widget_categories > ul > li::before,
.widget_mc4wp_form_widget,
.tagcloud a:hover,
.single-post-navigation a:hover,
.comment-author .comment-reply-link:hover,
.comment-author .comment-reply-login:hover,
.page-pagination a:hover,
.page-pagination > span,
.social-links li a:hover,
#toTop:hover,
span.separator,
span.separator span,
.abilities-tab .panel-heading a,
.schedule-wrap:hover,
.single-member-page .member-content .team-social a:hover,
.leader-social-profile ul li a:hover,
.tt-popup-wrapper:hover .tt-popup i,
.donate-button a,
.member-wrapper .member-biography a:hover,
.donate-amount .amount-button.active,
.icon-effect h3::after,
.modal-dialog .close::after,
.icon-effect .tt-icon i:after,
.vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a, 
.vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body,
.wpb-js-composer .vc_tta.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body,
.vc_tta-tabs.vc_tta-style-ultra-classic .vc_tta-tab.vc_active, 
.vc_tta-tabs.vc_tta-style-ultra-classic .vc_tta-tab:hover, 
.vc_tta-tabs.vc_tta-style-ultra-classic .vc_tta-tab:hover a,
.featured-event-video.has-event-video .tt-popup-wrapper::before,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce a.button,
.woocommerce button.button.alt,
.woocommerce input.button,
.woocommerce input.button.alt,
.woocommerce #respond input#submit,
.woocommerce .product .entry-summary a.single_add_to_cart_button,
.woocommerce #respond input#submit.alt, 
.woocommerce a.button.alt,
.widget.woocommerce #respond input#submit, 
.widget.woocommerce a.button, 
.widget.woocommerce button.button, 
.widget.woocommerce input.button,
.widget.woocommerce #respond input#submit:hover, 
.widget.woocommerce a.button:hover, 
.widget.woocommerce button.button:hover, 
.widget.woocommerce input.button:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active > a,
.card-wrapper .input-container .bar:before, 
.card-wrapper .input-container .bar:after,
.card-wrapper.alt .toggle,
.tt-cart-count .cart-contents .cart-count,
.comments-wrapper .form-submit input[type=submit],
.woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover,
.offcanvas-container .tt-close,
.offcanvas-container .footer-sidebar .widget_mc4wp_form_widget .btn,
.dropdown-menu-trigger.menu-collapsed i:last-child,
.charitable-submit-field .button,
.tt-charitable-donation.donate-btn-theme .charitable-submit-field .button,
.tt-charitable-donation.amount-btn-theme .charitable-donation-form .donation-amounts .donation-amount,
.report-button a:hover,
.tt-issue-wrapper .issue-inner:hover .issue-overlay,
.tt-issue-wrapper .owl-theme .owl-controls .owl-nav [class*=owl-]:hover{
    background-color: <?php echo esc_attr($accent_color) ?>;
}


.btn-primary.active, 
.btn-primary.focus, 
.btn-primary:active, 
.btn-primary:focus, 
.btn-primary:hover,
.btn-primary:active:hover,
.open>.dropdown-toggle.btn-primary,
.donate-button a:hover,
.donate-button a:focus,
.woocommerce a.button:hover,
.woocommerce a.button:focus,
.woocommerce a.button:active,
.woocommerce button.button.alt:hover,
.woocommerce button.button.alt:focus,
.woocommerce button.button.alt:active,
.woocommerce input.button:hover,
.woocommerce input.button:focus,
.woocommerce input.button:active,
.woocommerce input.button.alt:hover,
.woocommerce input.button.alt:focus,
.woocommerce input.button.alt:active,
.woocommerce #respond input#submit.alt:hover, 
.woocommerce a.button.alt:hover,
.woocommerce #respond input#submit:hover,
.woocommerce #respond input#submit:focus,
.woocommerce #respond input#submit:active,
.comments-wrapper .form-submit input[type=submit]:hover,
.woocommerce .product .entry-summary a.single_add_to_cart_button:hover,
.woocommerce .product .entry-summary a.single_add_to_cart_button:focus,
.woocommerce .product .entry-summary a.single_add_to_cart_button:active,
.offcanvas-container .footer-sidebar .widget_mc4wp_form_widget .btn:hover{
    background-color: <?php echo esc_attr($accent_darken)?>;
}

.vc_tta-tabs-position-top .vc_tta-tab > a:hover,
.vc_tta-tabs-position-top .vc_tta-tab > a:focus,
.vc_tta-tabs-position-top .vc_tta-tab.vc_active > a,
.vc_tta-tabs-position-bottom .vc_tta-tab > a:hover,
.vc_tta-tabs-position-bottom .vc_tta-tab > a:focus,
.vc_tta-tabs-position-bottom .vc_tta-tab.vc_active > a,
.vc_tta-tabs-position-left .vc_tta-tabs-list .vc_tta-tab>a:hover,
.vc_tta-tabs-position-right .vc_tta-tabs-list .vc_tta-tab>a:hover,
.vc_tta-tabs-position-left .vc_tta-tabs-list .vc_tta-tab.vc_active>a,
.vc_tta-tabs-position-right .vc_tta-tabs-list .vc_tta-tab.vc_active>a,
.vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body,
.campaign-progress-bar .bar, 
.charitable-donation-form .donation-amount.selected, 
.charitable-donation-amount-form .donation-amount.selected,
.content-wrapper .campaign-inner .donate-button,
.widget .charitable-submit-field .button{
    background-color: <?php echo esc_attr($accent_color) ?> !important;
}


<?php 
/**
*
* Color
*/
?>
.news-ticker li a:hover,
.btn-default,
.btn-default.active, 
.btn-default.focus, 
.btn-default:active, 
.btn-default:focus, 
.btn-default:hover, 
.open>.dropdown-toggle.btn-default,
.tt-effect figcaption .content .btn:hover,
.open>.dropdown-toggle.btn-default,
.navbar-default .navbar-nav>li>a:focus, 
.navbar-default .navbar-nav>li>a:hover,
.navbar-default .navbar-nav>.active>a, 
.navbar-default .navbar-nav>.active>a:focus, 
.navbar-default .navbar-nav>.active>a:hover,
.navbar-default .navbar-nav>.open>a, 
.navbar-default .navbar-nav>.open>a:focus, 
.navbar-default .navbar-nav>.open>a:hover,
.header-transparent .navbar-default .navbar-nav>.active>a, 
.header-transparent .navbar-default .navbar-nav>.active>a:focus, 
.header-transparent .navbar-default .navbar-nav>.active>a:hover,
.dropdown-menu>.active>a, 
.dropdown-menu>.active>a:focus, 
.dropdown-menu>.active>a:hover,
.dropdown-menu>li>a:focus, 
.dropdown-menu>li>a:hover,
.navbar-default .navbar-nav .open .dropdown-menu>li>a:focus, 
.navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,
.navbar-default .navbar-nav .open .dropdown-menu>.active>a, 
.navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus, 
.navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover,
.navbar-default .navbar-nav li a:focus, 
.navbar-default .navbar-nav li a:hover,
.intro-sub .clored-text,
.testimonial-carousel blockquote i,
.testimonial-carousel blockquote footer cite,
.icon-block i,
.timeline-heading h3 a:hover,
.timeline-body .readmore:hover,
.archivement-carousel .item i,
.twitterfeed i,
.social-count-plus .items .count,
.related-reformation .content .links a:hover,
.tt-grid .content .links a:hover,
.reformation-navigation a:hover,
.campaign-scoop .title a:hover,
.countdown li > span,
.entry-meta .the-time,
.entry-header .entry-title a:hover,
.entry-footer .readmore:hover,
.widget .entry-meta ul li a:hover,
.blog-wrapper .entry-meta ul li a:hover,
.widget a:hover,
.footer-sidebar .widget_nav_menu ul li a:hover,
.widget-title,
.tt-recent-comments .comment-content .comment-title a:hover,
.nav-tabs>li.active>a,
.nav-tabs>li.active>a:focus,
.nav-tabs>li.active>a:hover,
.nav-tabs>li>a:hover,
.nav-tabs>li>a:focus,
.navbar-default .navbar-nav>li.current-menu-parent>a,
.navbar-default .navbar-nav>li.current-menu-item>a,
.navbar-default .navbar-nav li.current-menu-ancestor>a,
.navbar-default .navbar-nav li.current-menu-parent>a, 
.navbar-default .navbar-nav li.current-menu-item>a,
.tt-popular-post h4 a:hover,
.widget_mc4wp_form_widget .btn:hover,
.widget_mc4wp_form_widget .btn:focus,
.tags-links a:hover,
.latest-post-carousel .entry-title a:hover,
#toTop,
.colored,
.team-social a,
.event-wrapper .event-info h3 a:hover,
.schedule-meta ul li i,
.schedule-wrap h3,
.zilla-likes,
.zilla-likes:hover,
.more-link,
.widget_calendar table a,
.single-post-navigation a,
.icon-block h3 a,
.error-message h2,
.issue-wrapper .entry-content h2 a:hover,
.single-member-page .member-content .designation,
.footer-menu ul li a:hover,
.contact-info ul li a:hover,
.tt-slider .intro-sub,
.footer-sidebar ul li i,
.footer-sidebar .widget_nav_menu ul li a::before,
.tt-latest-post .media-body h4 a:hover,
.post-category-wrapper .entry-meta ul li a:hover,
.footer-multi-wrapper .social-links-wrap li a:hover,
.footer-sidebar .widget-title,
.biography-info-wrapper .leader-name h3,
.career-info-wrapper h4,
.education-info-wrapper h4,
.icon-effect .tt-icon i,
.all-category-links a:hover,
.all-tweets-links a:hover,
.featured-event-video .campaign-scoop > ul li i,
.woocommerce .star-rating span,
.yith-wcwl-add-to-wishlist i,
.yith-wcwl-add-to-wishlist .add_to_wishlist:hover:before,
.woocommerce ul li.product a.button:hover, 
.woocommerce ul li.product a.added_to_cart:hover,
.entry-summary .yith-wcwl-add-to-wishlist .add_to_wishlist:hover::before,
.entry-summary .yith-wcwl-add-to-wishlist a:hover,
.woocommerce .entry-summary a.compare:hover,
.woocommerce .entry-summary a.compare:hover:before,
.product_meta span a:hover,
.woocommerce .quantity .btn-quantity:hover,
.header-transparent .header-top-wrapper a:hover,
.footer-sidebar .widget_meta ul li a:hover,
.footer-sidebar .widget_recent_comments ul li a:hover,
.footer-sidebar .widget_recent_entries ul li a:hover,
.card-wrapper .title,
.card-wrapper .footer a:hover,
.header-fullwidth .navbar-default .navbar-nav>li>a:hover,
.header-fullwidth .donate-button a:hover,
.header-fullwidth .news-ticker li a:hover,
.header-fullwidth .contact-info ul li a:hover,
.header-social-links .social-links li a:hover,
.tt-header-box-style .navbar-default .navbar-nav li a:focus, 
.tt-header-box-style .navbar-default .navbar-nav li a:hover,
.tt-donation-list-wrapper .donation-goal-content h3 a:hover,
.single-campaign .campaign-summary .campaign-raised .amount, 
.single-campaign .campaign-summary .campaign-figures .amount, 
.single-campaign .campaign-summary .donors-count, 
.single-campaign .campaign-summary .time-left,
.widget.widget_charitable_campaigns_widget .campaign .campaign-title a:hover,
.widget.widget_charitable_campaigns_widget .time-left,
.counter-wrapper .timer,
.tt-issue-wrapper .owl-theme .owl-controls .owl-nav [class*=owl-],
.press-release-wrapper.list-style.text-white .entry-header .entry-title a:hover, .press-release-wrapper.list-style.text-white .entry-content a:hover{
    color: <?php echo esc_attr($accent_color) ?>;
}



<?php 
/**
*
* Border color
*/
?>

.intro hr.colored,
.owl-theme .owl-dots .owl-dot.active span, 
.owl-theme .owl-dots .owl-dot:hover span,
.form-control:focus,
.navbar-default .navbar-nav>.active>a, 
.navbar-default .navbar-nav>.active>a:focus, 
.navbar-default .navbar-nav>.active>a:hover,
.navbar-default .navbar-nav>.open>a, 
.navbar-default .navbar-nav>.open>a:focus, 
.navbar-default .navbar-nav>.open>a:hover,
.navbar-default .navbar-toggle:focus, 
.navbar-default .navbar-toggle:hover,
.header-transparent .navbar-default .navbar-nav>.active>a, 
.header-transparent .navbar-default .navbar-nav>.active>a:focus, 
.header-transparent .navbar-default .navbar-nav>.active>a:hover,
.tt-slider .slides-pagination a.current,
.timeline>li:hover .posted-date,
.archivement-carousel .carousel-indicators .active,
.member-wrapper .thumbnail,
.widget_archive > ul ul li::before,
.widget_categories > ul ul li::before,
.tagcloud a:hover,
.single-post-navigation a,
#toTop,
.abilities-tab .panel-heading a,
.team-carousel .owl-dots .owl-dot span,
.schedule-wrap:hover,
.single-member-page .member-content .team-social a:hover,
.leader-social-profile ul li a:hover,
.vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a, 
.vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body,
.vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-body, .vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading,
.vc_tta-tabs.vc_tta-style-ultra-classic .vc_tta-tab.vc_active, 
.vc_tta-tabs.vc_tta-style-ultra-classic .vc_tta-tab:hover,
.woocommerce .select2-choice:focus, .woocommerce .input-text:focus,
.card-wrapper .title,
.tt-charitable-donation.amount-btn-theme .charitable-donation-form .donation-amounts .donation-amount,
.tt-charitable-donation.input-border-bottom .form-control:focus{
    border-color: <?php echo esc_attr($accent_color) ?>;
}

.charitable-donation-form .donation-amount.selected, 
.charitable-donation-amount-form .donation-amount.selected, 
.charitable-notice, 
.charitable-drag-drop-images li:hover a.remove-image, 
.supports-drag-drop .charitable-drag-drop-dropzone.drag-over{
    border-color: <?php echo esc_attr($accent_color) ?> !important;
}

.vc_tta-color-white.vc_tta-style-classic .vc_tta-tab>a:hover, 
.vc_tta-color-white.vc_tta-style-classic .vc_tta-tab.vc_active>a{
    border-color: <?php echo esc_attr($accent_color) ?> !important;
}

.vc_tta-tabs.vc_tta-style-ultra-classic .vc_tta-tab.vc_active::after{
    border-top-color: <?php echo esc_attr($accent_color) ?>;
}


<?php 
/**
*
* hex2rgb and darken
*/
?>

.tt-effect figcaption::before,
.blog-wrapper .post-thumbnail .thumb-overlay{
    background-color: rgba(<?php echo nominee_hex2rgb($accent_color)?>,.8);
}

.icon-block h3 a:hover,
.more-link:hover,
.widget_calendar table a:hover,
.location-info a:hover{
    color: <?php echo esc_attr($accent_darken)?>;
}

<?php endif; // preset color end ?>



<?php
/**
*
* custom css code
*/
?>

<?php echo esc_attr(nominee_option('custom_style'));?>