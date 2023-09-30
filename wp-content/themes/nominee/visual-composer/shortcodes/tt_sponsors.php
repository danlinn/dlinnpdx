<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
global $tt_sponsor_attr;

$tt_sponsor_attr =  $tt_atts;

ob_start(); ?>

<div class="tt-sponsors-wrapper opacity-<?php echo esc_attr($tt_atts['icon_hover_opacity']) ?> text-<?php echo esc_attr($tt_atts['logo_alignment']) ?> <?php echo esc_attr($tt_atts['el_class'].' '.$css_class);?>">
    <?php echo wpb_js_remove_wpautop( $content ); ?>
</div>

<?php $tt_sponsor_attr = array();
echo ob_get_clean();