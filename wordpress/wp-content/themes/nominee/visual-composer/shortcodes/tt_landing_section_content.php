<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $vc_animation = $this->getCSSAnimation( $tt_atts['css_animation'] );
    $animation_delay = "";
    if ($tt_atts['animation_delay']) {
        $animation_delay = 'animation-delay:'.$tt_atts['animation_delay'].';';
    }

    // Color option
    $font_weight = $subtitle_font_weight = $subtitle_margin_bottom = $subtitle_font_size = $title_color = $title_intro_color = $description_color = $title_font_size = $text_transform = $content_width = $title_line_height = "";

    if ($tt_atts['title_color_option'] == 'custom-color') :
        $title_color = 'color:'.$tt_atts['title_color'].';';
    endif;

    if ($tt_atts['title_intro_color_option'] == 'custom-color') :
        $title_intro_color = 'color:'.$tt_atts['title_intro_color'].';';
    endif;

    if ($tt_atts['title_font_size']) :
        $title_font_size = 'font-size:'.$tt_atts['title_font_size'].';';
        $title_line_height = 'line-height:'.$tt_atts['title_font_size'].';';
    endif;

    if ($tt_atts['text_transform']) :
        $text_transform = 'text-transform:'.$tt_atts['text_transform'].';';
    endif;

    if ($tt_atts['description_color_option'] == 'custom-color') :
        $description_color = 'color:'.$tt_atts['description_color'].';';
    endif;

    if ($tt_atts['subtitle_font_size']) :
        $subtitle_font_size = 'font-size:'.$tt_atts['subtitle_font_size'].';';
    endif;

    if ($tt_atts['subtitle_margin_bottom']) :
        $subtitle_margin_bottom = 'margin-bottom:'.$tt_atts['subtitle_margin_bottom'].';';
    endif;

    if ($tt_atts['subtitle_font_weight'] != 'default') :
        $subtitle_font_weight = 'font-weight:'.$tt_atts['subtitle_font_weight'].';';
    endif;

    if ($tt_atts['width']) :
        $content_width = 'width:'.$tt_atts['width'].';';
    endif;

    if ($tt_atts['font_weight'] == 'default') :
        $font_weight = "";
    else : 
        $font_weight = 'font-weight:'.$tt_atts['font_weight'].';';
    endif;

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
    
    ob_start();
?>

    <div class="landing-content-wrapper <?php echo esc_attr($tt_atts['el_class'] .' '.$vc_animation.' '.$tt_atts['title_alignment'].' '.$css_class); ?>" style="<?php echo esc_attr($content_width.' '.$animation_delay); ?>" style="<?php echo esc_attr($animation_delay); ?>">
        <?php if ($tt_atts['title_intro']) : ?>
            <span class="landing-intro <?php echo esc_attr($tt_atts['title_intro_color_option']);?>" style="<?php echo esc_attr($title_intro_color .' '. $subtitle_font_size .' '. $subtitle_margin_bottom.' '.$subtitle_font_weight);?>"><?php echo esc_html($tt_atts['title_intro']); ?></span>
        <?php endif; ?>

        <?php if ($tt_atts['title']) : ?>
            <h2 style="<?php echo esc_attr($title_color.' '.$font_weight.' '.$title_font_size.' '.$text_transform.' '.$title_line_height);?>" class="landing-title <?php echo esc_attr($tt_atts['title_color_option']);?>"><?php echo esc_html($tt_atts['title']); ?></h2>
        <?php endif; ?>

        <?php if (wpb_js_remove_wpautop($content)) : ?>
            <div class="landing-sub" style="<?php echo esc_attr($description_color);?>"><?php echo wpb_js_remove_wpautop($content, true); ?></div>
        <?php endif; ?>

        <?php if ($tt_atts['continue_button'] == 'show'): 
            
            // vc_link
            $link     = vc_build_link($tt_atts['link']);
            $a_href   = $link['url'];
            $a_title  = $link['title'];
            $a_target = trim($link['target']);

            $target = '';
            $title = '';

            if ($a_target) :
                $target = 'target='.$a_target.'';
            endif;

            if ($a_title) :
                $title = 'title='.$a_title.'';
            endif; ?>

            <div class="continue-button">
                <a href="<?php echo esc_url($a_href);?>" <?php echo esc_attr($title.' '.$target);?>><?php echo esc_html($tt_atts['link_text']);?><i class="fa fa-arrow-right"></i></a>
            </div>
        <?php endif; ?>
    </div> <!-- .landing-content-wrapper -->

<?php echo ob_get_clean();