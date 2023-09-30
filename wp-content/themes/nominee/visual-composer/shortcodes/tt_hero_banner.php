<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    // Color option
    $intro_color = $title_color = $description_color = "";

    if ($tt_atts['intro_color_option'] == 'custom-color') :
        $intro_color = 'color:'.$tt_atts['intro_color'].'';
    endif;

    if ($tt_atts['title_color_option'] == 'custom-color') :
        $title_color = 'color:'.$tt_atts['title_color'].'';
    endif;

    if ($tt_atts['description_color_option'] == 'custom-color') :
        $description_color = 'color:'.$tt_atts['description_color'].'';
    endif;


    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

?>

    <div class="hero-banner-wrapper <?php echo esc_attr($tt_atts['el_class'] .' '. $tt_atts['content_alignment'].' '.$css_class); ?>">

        <?php if ($tt_atts['intro_text_option'] == 'show'): ?>
            <p class="intro-text" style="<?php echo esc_attr($intro_color);?>" ><?php echo esc_html($tt_atts['intro_text']); ?></p>
        <?php endif; ?>

        <?php if ($tt_atts['title']): ?>
            <h2 style="<?php echo esc_attr($title_color);?>" ><?php echo esc_html($tt_atts['title']); ?></h2>
        <?php endif; ?>


        <?php if (wpb_js_remove_wpautop($content)) : ?>
            <div class="banner-description" style="<?php echo esc_attr($description_color);?>">
                <?php echo wpb_js_remove_wpautop($content, true); ?>
            </div>
        <?php endif; ?>

        <?php if ($tt_atts['hero_button'] == 'show'): 
            
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

            <div class="hero-button">
                <a class="btn btn-primary <?php echo esc_attr($tt_atts['button_shape'] .' '. $tt_atts['button_size']); ?>" href="<?php echo esc_url($a_href);?>" <?php echo esc_attr($title.' '.$target);?>><?php echo esc_html($tt_atts['link_text']);?></a>
            </div>
        <?php endif; ?>
    </div> <!-- .section-intro -->
<?php echo ob_get_clean();