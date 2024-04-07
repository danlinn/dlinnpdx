<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$tt_custom_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );


    // Color option
	$title_color = $subtitle_color = $title_size = $subtitle_size = "";

    if ($tt_atts['counted_number_color_option'] == 'custom-color') :
        $title_color = 'color:'.$tt_atts['title_color'].';';
    endif;

    if ($tt_atts['font-size']) :
        $title_size = 'font-size:'.$tt_atts['font-size'].';';
    endif;

    if ($tt_atts['subtitle-font-size']) :
        $subtitle_size = 'font-size:'.$tt_atts['subtitle-font-size'].';';
    endif;

    if ($tt_atts['subtitle_color_option'] == 'custom-color') :
        $subtitle_color = 'color:'.$tt_atts['subtitle_color'].';';
    endif;

ob_start(); ?>

<div class="counter-wrapper <?php echo esc_attr($tt_atts['grid_class'] .' '. $tt_atts['el_class'].' '.$tt_custom_css); ?>">
	
	<?php if ($tt_atts['flaticon_list']) : ?>
		<span class="icon"><i class="<?php echo esc_attr($tt_atts['flaticon_list']); ?>"></i></span>
	<?php endif; ?>

	<h2 class="timer <?php echo esc_attr($tt_atts['counted_number_color_option']);?>" style="<?php echo esc_attr($title_color.' '.$title_size);?>"><?php echo intval($tt_atts['counted_number']); ?></h2>
	
	<?php if ($tt_atts['subtitle']) : ?>
		<span class="description <?php echo esc_attr($tt_atts['subtitle_color_option']);?>" style="<?php echo esc_attr($subtitle_color.' '.$subtitle_size);?>"><?php echo esc_html($tt_atts['subtitle']); ?></span>
	<?php endif; ?>
</div>
<?php echo ob_get_clean();