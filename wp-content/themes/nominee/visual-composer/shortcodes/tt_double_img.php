<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
    
$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$tt_custom_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

ob_start();
?>

<div class="dubble-img-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$tt_custom_css); ?>">
    <div class="large-image">
        <?php $image_src = wp_get_attachment_image_src($tt_atts['large_photo'], 'tt-leader-thumb' ); ?>
        <img class="img-responsive" src="<?php echo esc_url( $image_src[ 0 ] ); ?>" alt="<?php echo esc_attr($tt_atts['title']); ?>">
    </div>
    <div class="small-image">
        <?php $image_src = wp_get_attachment_image_src($tt_atts['small_photo'], 'tt-leader-thumb' ); ?>
        <img class="img-responsive" src="<?php echo esc_url( $image_src[ 0 ] ); ?>" alt="<?php echo esc_attr($tt_atts['title']); ?>">
    </div>
</div><!-- /.dubble-img-wrapper -->
<?php echo ob_get_clean();