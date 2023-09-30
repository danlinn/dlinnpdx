<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
    
$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$tt_custom_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

ob_start();

    // Color option
    $intro_color = $title_color = "";

    if ($tt_atts['intro_color_option'] == 'custom-color') :
        $intro_color = 'color:'.$tt_atts['intro_color'].'';
    endif;

    if ($tt_atts['title_color_option'] == 'custom-color') :
        $title_color = 'color:'.$tt_atts['title_color'].'';
    endif;

    if ($tt_atts['details_color_option'] == 'custom-color') :
        $details_color = 'color:'.$tt_atts['details_color'].'';
    endif;


?>

<div class="tt-about-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$tt_custom_css); ?>">
    <div class="tt-about-intro">
        <?php if ($tt_atts['intro_text']): ?>
            <p style="<?php echo esc_attr($intro_color);?>" ><?php echo esc_html($tt_atts['intro_text']); ?></p>
        <?php endif; ?>

        <?php if ($tt_atts['title']): ?>
            <h2 style="<?php echo esc_attr($title_color);?>" ><?php echo esc_html($tt_atts['title']); ?></h2>
        <?php endif; ?>
    </div>
    
    <div class="tt-about-details"  style="<?php echo esc_attr($details_color);?>" >
        <?php echo wpb_js_remove_wpautop($content, true); ?>
    </div>

    <?php if ($tt_atts['digital_signature']): ?>
        <div class="about-sign">
            <?php $image_src = wp_get_attachment_image_src($tt_atts['digital_signature'], 'medium' ); ?>
            <img class="img-responsive" src="<?php echo esc_url( $image_src[ 0 ] ); ?>" alt="<?php echo esc_attr($tt_atts['title']); ?>">
        </div>
    <?php endif; ?>
</div><!-- /.tt-about-wrapper -->
<?php echo ob_get_clean();