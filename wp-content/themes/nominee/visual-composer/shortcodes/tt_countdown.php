<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

ob_start(); ?>

<div class="countdown-wrapper text-center <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    <ul class="countdown list-inline" data-countdown="<?php echo esc_attr($tt_atts['countdown_time']); ?>"></ul>
</div>

<?php echo ob_get_clean();