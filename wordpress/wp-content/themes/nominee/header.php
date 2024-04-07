<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>">
    <?php wp_head(); ?>
</head>

<body id="home" <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="100">
    <?php wp_body_open(); ?>
    
    <?php 
    $tt_background_img = $tt_background_class = "";

    if (function_exists( 'rwmb_meta' )):
        $img_src = rwmb_meta('nominee_body_bg_image', 'type=image_advanced');
    endif; 

    if (!empty($img_src)) {
        $tt_background_class = 'has-background-image';
        foreach ($img_src as $url) {
            $tt_background_img = 'background-image:url('.$url['full_url'].')'.';';
        }
    } ?>
    
    <div class="site-wrapper <?php echo esc_attr($tt_background_class); ?>" style="<?php echo esc_attr($tt_background_img); ?>">

    <?php

    $tt_header_style = nominee_option('header-style', false, 'header-default');

    $page_header = "";
    if (function_exists('rwmb_meta')) : 
        $page_header = rwmb_meta('nominee_header_style');
    endif;

    if ($page_header == 'inherit-theme-option' || empty($page_header)) :
        if ($tt_header_style == 'header-default') :
            get_header('default');
        elseif ($tt_header_style == 'header-transparent') :
            get_header('transparent');
        elseif ($tt_header_style == 'header-fullwidth') :
            get_header('fullwidth');
        elseif ($tt_header_style == 'header-center-logo') :
            get_header('center-logo');
        elseif ($tt_header_style == 'header-box-style') :
            get_header('box-style');
        elseif ($tt_header_style == 'no-header') :
        else :
            get_header('default');
        endif;
    elseif($page_header == 'header-default') :
        get_header('default');
    elseif ($page_header == 'header-transparent') :
        get_header('transparent');
    elseif ($page_header == 'header-fullwidth') :
        get_header('fullwidth');
    elseif ($page_header == 'header-center-logo') :
        get_header('center-logo');
    elseif ($page_header == 'header-box-style') :
        get_header('box-style');
    elseif($page_header == 'no-header') :
    else :
        get_header('default');
    endif; ?>

<?php get_template_part( 'page', 'header' );