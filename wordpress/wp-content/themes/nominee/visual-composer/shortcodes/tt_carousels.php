<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

global $nominee_carousel;

$nominee_carousel =  $tt_atts;

ob_start();

wp_enqueue_script('superslides'); 

$overlay_color_class = $overlay_color_opacity = "";

$overlay_color = $tt_atts['overlay_color'];

if ($overlay_color == 'yes') {
    $overlay_color_class = 'overlay-enabled';
    $overlay_color_opacity = $tt_atts['overlay_color_opacity'];
}

$uid = uniqid();

?>

<div class="tt-carousel owl-carousel owl-theme <?php echo esc_attr($tt_atts['el_class'].' '.$tt_atts['slider_height'].' '.$overlay_color_class.' '.$overlay_color_opacity.' '.$css_class);?>" 
	data-lg-height="<?php echo esc_attr($tt_atts['custom_lg_height']); ?>" 
	data-md-height="<?php echo esc_attr($tt_atts['custom_md_height']); ?>" 
	data-sm-height="<?php echo esc_attr($tt_atts['custom_sm_height']); ?>" 
	data-xs-height="<?php echo esc_attr($tt_atts['custom_xs_height']); ?>" 
	data-xxs-height="<?php echo esc_attr($tt_atts['custom_xxs_height']); ?>"
	data-navigation="<?php echo esc_attr($tt_atts['navigation']); ?>"
	data-pagination="<?php echo esc_attr($tt_atts['pagination']); ?>"
	data-loop="<?php echo esc_attr($tt_atts['loop']); ?>"
	data-autoplay="<?php echo esc_attr($tt_atts['autoplay']); ?>"
	data-autoplaytimeout="<?php echo esc_attr($tt_atts['autoplay_timeout']); ?>"
	data-mousedrag="<?php echo esc_attr($tt_atts['mousedrag']); ?>">
    
    <?php echo wpb_js_remove_wpautop( $content ); ?>
    
</div>

<?php 
$nominee_carousel = array();
echo ob_get_clean();