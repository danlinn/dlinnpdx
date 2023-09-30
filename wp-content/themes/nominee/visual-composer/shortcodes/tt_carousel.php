<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    global $nominee_carousel;

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $intro_font_size = $tt_atts['intro-font-size'];
    $intro_font_color = $tt_atts['title-intro-color'];

    $title_font_color = $tt_atts['title-font-color'];

    $content_font_size = $tt_atts['content-font-size'];
    $content_font_color = $tt_atts['content-font-color'];

    if ($intro_font_size) :
        $intro_font_size = 'font-size: '.$tt_atts['intro-font-size'].';';
    endif;
    if ($intro_font_color) :
        $intro_font_color = 'color: '.$tt_atts['title-intro-color'].';';
    endif;


    if ($title_font_color) :
        $title_font_color = 'color: '.$tt_atts['title-font-color'].';';
    endif;

    if ($content_font_size) :
        $content_font_size = 'font-size: '.$tt_atts['content-font-size'].';';
    endif;
    if ($content_font_color) :
        $content_font_color = 'color: '.$tt_atts['content-font-color'].';';
    endif;

    $tt_image_src = wp_get_attachment_image_src( $tt_atts['slider_image'], 'full' );
    
    $carousel_image = $has_intro_animation = $has_title_animation = $has_content_animation = $has_button_animation = '';

    if ($tt_image_src) {
        $carousel_image = 'background-image: url('.$tt_image_src[0].');';
    }

    // button style
    $link     = vc_build_link($tt_atts['link']);
    $a_href   = $link['url'];
    $a_title  = $link['title'];
    $a_target = trim($link['target']);


    if (empty($tt_atts['intro_title_animation']) || empty($tt_atts['title_animation']) || empty($tt_atts['content_animation']) || empty($tt_atts['button_animation'])) {
        $has_no_animation = 'has-no-animation';
    }

    // extra image
    $image_src = wp_get_attachment_image_src($tt_atts['extra_image'], 'full' );

    ob_start();
    ?>

    <div class="item <?php echo esc_attr($tt_atts['el_class'].' '.$css_class.' '.$has_no_animation); ?>" style="<?php echo esc_attr($carousel_image); ?>">
        
        <div class="tt-content-wrapper <?php echo esc_attr($tt_atts['content_alignment'])?>">
            <div class="container">
                <?php if ($tt_atts['intro-title']) : ?>
                    <span class="tt-intro-sub animated <?php echo esc_attr($tt_atts['intro_title_ani_delay'].' '.$tt_atts['intro-max-width']); ?>" data-animation-in="<?php echo esc_attr($tt_atts['intro_title_animation']); ?>" style="<?php echo esc_attr($intro_font_size.' '.$intro_font_color);?>"><?php echo esc_html($tt_atts['intro-title']);?></span>
                <?php endif; ?>
                
                <?php if ($tt_atts['title']) : ?>
                    <span class="tt-title animated <?php echo esc_attr($tt_atts['title_ani_delay'].' '.$tt_atts['title-max-width'].' '.$tt_atts['title-sizes-lg'].' '.$tt_atts['title-sizes-md'].' '.$tt_atts['title-sizes-sm'].' '.$tt_atts['title-sizes-xs']); ?>" data-animation-in="<?php echo esc_attr($tt_atts['title_animation']); ?>" style="<?php echo esc_attr($title_font_color);?>"><?php echo esc_html($tt_atts['title']);?></span>
                <?php endif; ?>

                <?php if (wpb_js_remove_wpautop( $content )) : ?>
                    <div class="tt-carousel-content animated <?php echo esc_attr($tt_atts['content_ani_delay'].' '.$tt_atts['content-max-width']); ?>" data-animation-in="<?php echo esc_attr($tt_atts['content_animation']); ?>" style="<?php echo esc_attr($content_font_size.' '.$content_font_color);?>"><?php echo wpb_js_remove_wpautop( $content ); ?></div>
                <?php endif; ?>

                <?php if ($tt_atts['button_visibility'] == 'visible'): ?>
                    <div class="tt-carousel-btn animated <?php echo esc_attr($tt_atts['button_ani_delay']); ?>" data-animation-in="<?php echo esc_attr($tt_atts['button_animation']); ?>">
                        <a class="btn btn-lg <?php echo esc_attr($tt_atts['button_style']); ?>" href="<?php echo esc_url($a_href) ?>" target="<?php echo esc_attr($a_target) ?>" title="<?php echo esc_attr($a_title ? $a_title : $tt_atts['title']) ?>"><?php echo esc_html($tt_atts['button_text']); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div> <!-- .intro -->

        <?php if ($image_src): ?>
            <div class="tt-extra-image animated <?php echo esc_attr($tt_atts['image-max-width'].' '.$tt_atts['image-position'].' '.$tt_atts['image_ani_delay'].' '.$tt_atts['image-visibility']); ?>" data-animation-in="<?php echo esc_attr($tt_atts['image_animation']); ?>">
                <img class="img-responsive" src="<?php echo esc_url( $image_src[ 0 ] ); ?>" alt="<?php echo esc_attr($tt_atts['title']); ?>">
            </div>
        <?php endif; ?>
    </div>

<?php echo ob_get_clean();