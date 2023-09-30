<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $vc_animation = $this->getCSSAnimation( $tt_atts['css_animation'] );
    
    $campaign_id  = $tt_atts['post_source'];

    if($tt_atts['form_layout'] != 'details-form'){
        if (function_exists('charitable_get_campaign')) {
            $campaign = charitable_get_campaign( $campaign_id );
        }
        
    }

    ob_start();

    // Color option
   $separator_color = "";

    if ($tt_atts['separator_color_option'] == 'custom-color') :
        $separator_color = 'background-color:'.$tt_atts['separator_color'].'';
    endif;


    $show_hide_class = "";
    if($tt_atts['show_address']){
        $show_hide_class .= "show_address ";
    }
    if($tt_atts['show_address_two']){
        $show_hide_class .= "show_address_two ";
    }
    if($tt_atts['show_city']){
        $show_hide_class .= "show_city ";
    }
    if($tt_atts['show_state']){
        $show_hide_class .= "show_state ";
    }
    if($tt_atts['show_postcode']){
        $show_hide_class .= "show_postcode ";
    }
    if($tt_atts['show_phone']){
        $show_hide_class .= "show_phone ";
    }
    if($tt_atts['show_employer']){
        $show_hide_class .= "show_employer ";
    }
    if($tt_atts['show_occupation']){
        $show_hide_class .= "show_occupation ";
    }
    if($tt_atts['hide_payment']){
        $show_hide_class .= "hide_payment ";
    }
    if($tt_atts['hide_custom_donation']){
        $show_hide_class .= "hide_custom_donation ";
    }
    if($tt_atts['hide_first_child']){
        $show_hide_class .= "hide_first_child ";
    }
    if($tt_atts['hide_second_child']){
        $show_hide_class .= "hide_second_child ";
    }
    if($tt_atts['hide_third_child']){
        $show_hide_class .= "hide_third_child ";
    }
    if($tt_atts['hide_fourth_child']){
        $show_hide_class .= "hide_fourth_child ";
    }
    if($tt_atts['hide_fifth_child']){
        $show_hide_class .= "hide_fifth_child ";
    }
    if($tt_atts['hide_sixth_child']){
        $show_hide_class .= "hide_sixth_child ";
    }


if ( class_exists( 'Charitable' ) ) :  ?>

    <div class="tt-charitable-donation <?php echo esc_attr($tt_atts['form_layout'].' '.$vc_animation.' '.$tt_atts['el_class'].' '.$tt_atts['custom_content'].' '.$css_class.' '.$tt_atts['content_alignement'].' '.$tt_atts['donate_btn_color'].' '.$tt_atts['amount_btn_color'].' '.$tt_atts['amount_btn_active_color'].' '.$tt_atts['btn_outline'].' '.$tt_atts['input_border_style'].' '.$show_hide_class); ?>">
        <header class="donatioin-header <?php echo esc_attr($tt_atts['donate_content_color']); ?>">
        <?php if($tt_atts['form_layout'] != 'goal-form' and $tt_atts['form_layout'] != 'goal-form-portrait') : ?>

            <?php if($tt_atts['custom_content'] == 'custom-content-allow') : ?>
                <h3 class="nominee-donation-title"><?php echo esc_html($tt_atts['title']) ?></h3>
            <?php else : ?>
                <h3 class="nominee-donation-title"><?php echo get_the_title($campaign_id) ?></h3>
            <?php endif; ?>
            
            <?php if(wpb_js_remove_wpautop($content) && $tt_atts['custom_content'] == 'custom-content-allow') : ?>
                <?php echo wpb_js_remove_wpautop($content, true); ?>
            <?php endif; ?>
        <?php endif; ?>
        </header>
       
        <?php 
            if($tt_atts['form_layout'] == 'default-form' || $tt_atts['form_layout'] == 'portrait-form' || $tt_atts['form_layout'] == 'inline-form') : ?>
                <div class="default-layout">
                    <?php 
                        if ( ! $campaign || ! $campaign->can_receive_donations() ) :
                            return;
                        endif;
                        $suggested_donations = $campaign->get_suggested_donations();

                        if ( empty( $suggested_donations ) && ! $campaign->get( 'allow_custom_donations' ) ) :
                            return;
                        endif;
                        $form = new Charitable_Donation_Amount_Form( $campaign );
                        $form->render(); 
                    ?>
                    
                </div> <?php 
            elseif($tt_atts['form_layout'] == 'goal-form' || $tt_atts['form_layout'] == 'goal-form-portrait') :
                $args = array(
                    'post_type' => 'campaign',
                    'posts_per_page' => 1,
                    'p' => $campaign_id
                );
                $query = new WP_Query( $args ); 
               
                
                while ($query->have_posts()) : $query->the_post(); 
                    $goal = get_post_meta(get_the_ID(), '_campaign_goal');
                    $goal_desc = get_post_meta(get_the_ID(), '_campaign_description'); ?>

                    <div class="row goal-layout">
                        <div class="col-md-<?php echo esc_attr($tt_atts['form_layout'] == 'goal-form-portrait' ? '12' : '6') ?>">
                            <div class="donation-goal-thumb">
                                <?php 
                                    the_post_thumbnail('nominee-event-featured', array('alt' => get_the_title())); 
                                ?>
                            </div>
                        </div>
                        <div class="col-md-<?php echo esc_attr($tt_atts['form_layout'] == 'goal-form-portrait' ? '12' : '6') ?> align-self-center">
                            <div class="donation-goal-content">

                                <div class="donation-cat">
                                    <?php $donation_terms = wp_get_post_terms( get_the_ID(), 'campaign_category');
                                    $count = count($donation_terms);
                                    $increament = 0;

                                    foreach ( $donation_terms as $term ) :
                                        $increament++;
                                        echo '<a href="' . esc_url( get_term_link( $term, 'campaign_category' ) ) . '" title="' . sprintf( __( 'View all posts in %s', 'nominee' ), $term->name ) . '" ' . '>' . $term->name . '</a>';
                                        
                                        if ($increament < $count) :
                                            echo ' , ';
                                        endif;

                                    endforeach; ?>
                                </div>


                                <?php if($tt_atts['title']) : ?>
                                    <h3><?php echo esc_html($tt_atts['title']) ?></h3>
                                <?php else : ?>
                                    <h3><?php the_title() ?></h3>
                                <?php endif; ?>

                                <?php if ($tt_atts['separator'] == 'show'): ?>
                                    <span class="separator" style="<?php echo esc_attr($separator_color);?>" ></span>
                                <?php endif; ?>

                                <?php if(wpb_js_remove_wpautop($content)) : ?>
                                    <?php echo wpb_js_remove_wpautop($content, true); ?>
                                <?php else : ?>
                                    <?php echo wp_kses($goal_desc[0], array(
                                        'a'          => array(
                                            'href'   => array(),
                                            'title'  => array(),
                                            'target' => array()
                                        ),
                                        'br'     => array(),
                                        'em'     => array(),
                                        'strong' => array(),
                                        'ul'     => array(),
                                        'li'     => array(),
                                        'p'      => array(),
                                        'span'   => array(
                                            'class' => array()
                                        )
                                    )); ?>
                                <?php endif; ?>

                                <div class="donation-goal">
                                    <div class="fund-info">
                                        <span class="note"><?php esc_html_e('Raised:', 'nominee'); ?></span>  <span class="raised"><?php echo do_shortcode('[charitable_stat campaigns='.$campaign_id.']') ?></span> / <?php echo nominee_number_shorten($goal[0], 2); ?>
                                    </div>
                                    <?php echo do_shortcode('[charitable_stat display=progress goal='.$goal[0].' campaigns='.$campaign_id.']'); ?>
                                </div>

                                <div class="clearfix">
                                    <a href="<?php the_permalink() ?>" class="btn btn-primary"><?php esc_html_e('Donate Now', 'nominee'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div><?php 
                endwhile; ?>
            <?php else : ?>
                <div class="details-layout">
                    <?php echo do_shortcode('[charitable_donation_form campaign_id='.$campaign_id.']'); ?>
                </div><?php 
            endif; 
        ?>
        <span class="d-none form-alert-text" data-alert-text = "<?php echo esc_attr($tt_atts['alert_text']) ?>"></span>
    </div> <!-- .tt-paypal-donation -->

    <?php 

else:

    echo esc_html__('Please install Charitable plugin', 'nominee');

endif;

echo ob_get_clean();