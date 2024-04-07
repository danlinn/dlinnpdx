<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    global $tt_sponsor_attr;

    // link
    $link     = vc_build_link($tt_atts['link']);
    $a_href   = $link['url'];
    $a_title  = $link['title'];
    $a_target = trim($link['target']);

    $logo_height = $tooltip_title = $icon_opacity = "";

    if($tt_sponsor_attr['logo_height']){
        $logo_height = 'height: '.$tt_sponsor_attr['logo_height'];
    }

    if($tt_sponsor_attr['icon_opacity']){
        $icon_opacity = 'opacity: '.$tt_sponsor_attr['icon_opacity'];
    }

    if($tt_atts['tooltip_title']){
        $tooltip_title = $tt_atts['tooltip_title'];
    } elseif($a_title) {
        $tooltip_title = $a_title;
    }

 
    $tt_img_src = wp_get_attachment_image_src($tt_atts['images'], 'full'); 
    ob_start();
?>

    <?php 
        if(! empty($a_href)) : ?>
            <a href="<?php echo esc_url($a_href);?>" target="<?php echo esc_attr($a_target ? $a_target : '_blank') ?>" data-toggle="tooltip" data-placement="<?php echo esc_attr($tt_atts['tooltip_position']) ?>" title="<?php echo esc_attr($tooltip_title) ?>">
                <img style="<?php echo esc_attr($logo_height.' '.$icon_opacity); ?>" class="img-responsive <?php echo esc_attr($css_class); ?>" src="<?php echo esc_url($tt_img_src[0]); ?>" alt="<?php echo esc_attr__('Sponsor Logo', 'nominee') ?>">
            </a>
        <?php else : ?>
            <img style="<?php echo esc_attr($logo_height.' '.$icon_opacity); ?>" class="img-responsive <?php echo esc_attr($css_class); ?>" src="<?php echo esc_url($tt_img_src[0]); ?>" <?php echo esc_attr__('Sponsor Logo', 'nominee') ?> data-toggle="tooltip" data-placement="<?php echo esc_attr($tt_atts['tooltip_position']) ?>" title="<?php echo esc_attr($tooltip_title) ?>">
        <?php endif; ?>
 
<?php echo ob_get_clean();