<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start(); 

?>

    <div class="testimonial-carousel <?php echo esc_attr($tt_atts['el_class']);?>"
    	data-loop="<?php echo esc_attr($tt_atts['loop']);?>" 
    	data-autoplay="<?php echo esc_attr($tt_atts['autoplay']);?>" 
    	data-autoplay-speed="<?php echo esc_attr($tt_atts['autoplay_speed']);?>" >
        
        <?php echo wpb_js_remove_wpautop( $content ); ?>

    </div>

<?php echo ob_get_clean();