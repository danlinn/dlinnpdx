<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $tt_custom_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();

    // Color option
    $title_color = "";

    if ($tt_atts['title_color_option'] == 'custom-color') :
        $title_color = 'color:'.$tt_atts['title_color'].'';
    endif;
?>

<div class="item <?php echo esc_attr($tt_atts['el_class'].' '.$tt_custom_css); ?>">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php if ($tt_atts['show_icon'] == 'yes') :

                if ($tt_atts['icon_option'] == 'thumbicon') : ?>
                    <?php $image_attributes = wp_get_attachment_image_src( $tt_atts['thumb_icon'], 'nominee-testimonial-thumb' ); ?>
                        <img src="<?php echo esc_url($image_attributes[0]); ?>" alt="<?php echo esc_attr($tt_atts['title']); ?>"/>
               <?php else : ?>
                    <i class="<?php echo esc_attr($tt_atts['font_icon']);?>"></i>
                <?php endif;

            endif; ?>
            
            <?php if ($tt_atts['title']) : ?>
                <h3 style="<?php echo esc_attr($title_color);?>"><?php echo esc_html($tt_atts['title']);?></h3>
            <?php endif; ?>
            
            <?php echo wpb_js_remove_wpautop($content, true); ?>
        </div>
    </div>
</div>

<?php echo ob_get_clean();