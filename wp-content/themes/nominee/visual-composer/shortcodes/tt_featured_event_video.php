<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();
?>

    <div class="event-wrapper featured-event-video <?php echo esc_attr($tt_atts['el_class'].' '.$css_class.' '.($tt_atts['video'] == 'yes' ? 'has-event-video' : '')); ?>">
        <div class="row">

            <?php $args = array(
               'p'              => $tt_atts['event_lists'],
               'post_type'      => 'tt-event',
               'post_status'    => 'publish'
            );

            $query = new WP_Query($args);

            if ( $query->have_posts() ) : ?>
                <!-- the loop -->
                <?php while ( $query->have_posts() ) : $query->the_post(); 

                    if (function_exists('rwmb_meta')) :
                        $event_start_time = rwmb_meta('nominee_event_start_time');
                        $event_end_time = rwmb_meta('nominee_event_end_time');
                    endif; ?>
                    
                    <div class="col-md-6 col-md-push-6">
                        <div class="campaign-scoop">
                            
                            <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                            
                            <ul class="list-inline">
                                <li>
                                    <?php if (function_exists('rwmb_meta')) : 
                                    $event_location = rwmb_meta('event-location');
                                    ?>
                                        <?php if ($event_location): ?>
                                            <address>
                                                <i class="fa fa-map-marker"></i><?php echo esc_html(rwmb_meta('event-location')); ?>
                                            </address>
                                        <?php endif ?>
                                    <?php endif; ?>
                                </li>
                                <li>
                                    <?php if ($event_start_time): ?>
                                        <span class="event-duration"><i class="fa fa-clock-o"></i><?php echo esc_html($event_start_time.' - '.$event_end_time); ?></span>
                                    <?php endif; ?>
                                </li>
                            </ul>

                            <div class="countdown-wrapper">
                                <?php if (function_exists('rwmb_meta')) :
                                
                                    $event_date = rwmb_meta('nominee_event_date');
                                    if ($event_date) : ?>
                                        <ul class="countdown list-inline" data-countdown="<?php echo esc_attr($event_date.' '.$event_start_time); ?>"></ul>
                                    <?php endif;

                                endif; ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-xl text-uppercase"><?php esc_html_e('View Events', 'nominee');?></a>
                            
                        </div><!-- .campaign-scoop -->
                    </div>

                    <div class="col-md-6 col-md-pull-6">
                        <div class="tt-popup-wrapper">
                            <?php the_post_thumbnail('nominee-reformation-thumb', array('alt' => get_the_title(), 'class' => 'img-responsive'));?>
                            <?php $source_url = $tt_atts['video_url'];
                            if ($source_url && $tt_atts['video'] == 'yes') : ?>
                                <a class="tt-popup" href="<?php echo esc_url($source_url); ?>"><i class="fa fa-youtube-play"></i></a>
                            <?php endif; ?>
                        </div> <!-- .tt-popup-wrapper -->
                    </div>

                <?php endwhile; ?>
                <!-- end of the loop -->

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e( 'Event not found !', 'nominee' ); ?></p>
            <?php endif; ?>
        </div>
    </div>

<?php echo ob_get_clean();