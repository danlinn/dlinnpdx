<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

ob_start();

wp_enqueue_script('superslides'); 

$overlay_color_class = $overlay_color_opacity = "";

$overlay_color = $tt_atts['overlay_color'];

if ($overlay_color == 'yes') {
    $overlay_color_class = 'overlay-enabled';
    $overlay_color_opacity = $tt_atts['overlay_color_opacity'];
}

?>

<div id="slides" class="tt-slider <?php echo esc_attr($tt_atts['el_class'].' '.$overlay_color_class.' '.$overlay_color_opacity.' '.$css_class);?>">
    <ul class="slides-container">
        <?php echo wpb_js_remove_wpautop( $content ); ?>
    </ul>
</div>

<?php 

echo ob_get_clean();