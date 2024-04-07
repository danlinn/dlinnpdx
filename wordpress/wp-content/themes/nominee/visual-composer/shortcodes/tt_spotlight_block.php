<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $tt_custom_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();

    $tt_link     = vc_build_link($tt_atts['custom_link']);
    $tt_a_href   = $tt_link['url'];
    $tt_a_title  = $tt_link['title'];
    //$tt_a_target = trim($tt_link['target']);

    $image_size = $readmore = $custom_overlay = $title_color = $subtitle_color = $content_color = $card_bg = "";

    if ($tt_atts['spotlight_style'] == 'spotlight-card') :
        $image_size = 'nominee-latest-press';
    
    elseif ($tt_atts['spotlight_style'] == 'spotlight-creative') :
        $image_size = 'nominee-latest-press';

    elseif ($tt_atts['spotlight_style'] == 'spotlight-bottom') :
        $image_size = 'nominee-spotlight-long-thumbnail';
    else :
        $image_size = 'nominee-upcoming-event';
    endif;

    if ($tt_atts['show_button'] == 'yes') {
        $readmore = 'has-readmore';
    }

    if ($tt_atts['image_overlay'] == 'custom-color') {
        $custom_overlay = 'background-color: '.$tt_atts['custom_overlay_color'].';';
    }
    if ($tt_atts['title_color']) {
        $title_color = 'color: '.$tt_atts['title_color'].';';
    }
    if ($tt_atts['subtitle_color']) {
        $subtitle_color = 'color: '.$tt_atts['subtitle_color'].';';
    }
    if ($tt_atts['content_color']) {
        $content_color = 'color: '.$tt_atts['content_color'].';';
    }
    if ($tt_atts['card_bg']) {
        $card_bg = 'background-color: '.$tt_atts['card_bg'].';';
    }

?>
    
    <div class="spotlight-wrap <?php echo esc_attr($tt_atts['spotlight_style'].' '.$readmore.' '.$tt_atts['el_class'].' '.$tt_custom_css); ?>">
        
        <figure class="tt-effect">

            <div class="spotlight-thumb-wrap">
                <?php if ($tt_atts['overlay_color'] == 'yes'): ?>
                    <span class="spotlight-image-overlay <?php echo esc_attr($tt_atts['image_overlay']); ?>" style="<?php echo esc_attr($custom_overlay); ?>"></span>
                <?php endif; ?>

                <?php $image_attributes = wp_get_attachment_image_src( $tt_atts['image'], $image_size ); ?>
                <img src="<?php echo esc_url($image_attributes[0]); ?>" alt="<?php echo esc_attr($tt_atts['title']); ?>">

                <?php if ($tt_atts['spotlight_style'] == 'spotlight-creative') : ?>
                    <a class="btn btn-outline <?php echo esc_attr($tt_atts['button_class']); ?>" href="<?php echo esc_url($tt_a_href);?>" title="<?php echo esc_attr($tt_a_title);?>"><?php echo esc_html($tt_atts['button_text']); ?></a>
                <?php endif; ?>
            </div>

            <?php if ($tt_atts['spotlight_style'] != 'spotlight-creative') : ?>
                <figcaption>
                    <?php if ($tt_atts['title'] && $tt_atts['spotlight_style'] != 'spotlight-creative' && $tt_atts['spotlight_style'] != 'spotlight-bottom') : ?>
                      <h2 style="<?php echo esc_attr($title_color); ?>"><?php echo esc_html($tt_atts['title']); ?></h2>
                    <?php endif; ?>
                    
                    <div class="content">
                        <?php if ($tt_atts['title'] && $tt_atts['spotlight_style'] == 'spotlight-bottom') : ?>
                          <h2 style="<?php echo esc_attr($title_color); ?>"><?php echo esc_html($tt_atts['title']); ?></h2>
                        <?php endif; ?>
                        <div style="<?php echo esc_attr($content_color); ?>">
                            <?php echo wpb_js_remove_wpautop($content, true);?>
                        </div>

                        <?php if ($tt_atts['show_button'] == 'yes') : ?>
                            <a class="btn btn-outline <?php echo esc_attr($tt_atts['button_class']); ?>" href="<?php echo esc_url($tt_a_href);?>" title="<?php echo esc_attr($tt_a_title);?>"><?php echo esc_html($tt_atts['button_text']); ?></a>
                        <?php endif; ?>
                    </div>
                </figcaption>
            <?php endif; ?>

            <?php if ($tt_atts['spotlight_style'] == 'spotlight-card'): ?>
                <div class="card-footer" style="<?php echo esc_attr($card_bg); ?>">
                    <?php if ($tt_atts['title']) : ?>
                      <h3 style="<?php echo esc_attr($title_color); ?>"><?php echo esc_html($tt_atts['title']); ?></h3>
                    <?php endif; ?>

                    <?php if ($tt_atts['subtitle']) : ?>
                      <span style="<?php echo esc_attr($subtitle_color); ?>"><?php echo esc_html($tt_atts['subtitle']); ?></span>
                    <?php endif; ?>
                </div>
            <?php endif ?>

            <?php if ($tt_atts['spotlight_style'] == 'spotlight-creative'): ?>
                <div class="card-footer">
                    <?php if ($tt_atts['title']) : ?>
                      <h3 style="<?php echo esc_attr($title_color); ?>"><?php echo esc_html($tt_atts['title']); ?></h3>
                    <?php endif; ?>
                    <div style="<?php echo esc_attr($content_color); ?>">
                        <?php echo wpb_js_remove_wpautop($content, true);?>
                    </div>
                </div>
            <?php endif ?>

        </figure>

    </div> <!-- spotlight-wrap -->
<?php
echo ob_get_clean();