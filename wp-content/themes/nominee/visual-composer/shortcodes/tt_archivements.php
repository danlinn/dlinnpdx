<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$tt_custom_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

ob_start(); 

?>

<div class="archivement-carousel text-center <?php echo esc_attr($tt_atts['el_class'].' '.$tt_custom_css); ?>"
	data-loop="<?php echo esc_attr($tt_atts['loop']);?>" 
	data-autoplay="<?php echo esc_attr($tt_atts['autoplay']);?>" 
	data-autoplay-speed="<?php echo esc_attr($tt_atts['autoplay_speed']);?>" >

    <?php echo wpb_js_remove_wpautop( $content ); ?>
</div>

<?php 

echo ob_get_clean();