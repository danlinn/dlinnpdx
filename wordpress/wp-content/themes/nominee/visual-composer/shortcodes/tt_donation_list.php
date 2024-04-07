<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $tt_custom_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $goal_raise_visibility = $tt_atts['raise_goal_visibility'] == 'visible' ? 'raise-goal-visible' : '';

    ob_start();

if ( class_exists( 'Charitable' ) ) :  ?>

    <div class="tt-donation-list-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$tt_atts['content_padding'].' '.$tt_custom_css); ?>">
        <div class="row masonry-wrap">
            <?php 
            $args = array(
                'post_type'      => 'campaign',
                'post_status'    => 'publish',
                'orderby'        => $tt_atts['orderby'],
                'order'          => $tt_atts['order'],
            );

            if ($tt_atts['donation_source'] == 'all-donation' || $tt_atts['donation_source'] == 'category-donation') :
                $post_exclude = explode(',', $tt_atts['exclude']);
                $args = wp_parse_args(
                    array(
                        'posts_per_page'    => $tt_atts['post_limit'],
                        'post__not_in'      => $post_exclude,
                        'offset'            => $tt_atts['offset'],
                    )
                , $args );
            endif;

            if ($tt_atts['donation_source'] == 'category-donation' && $tt_atts['taxonomies']) :

                $terms = explode(',', $tt_atts['taxonomies']);

                $args = wp_parse_args(
                    array(
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'campaign_category',
                                'field'    => 'slug',
                                'terms'    => $terms,
                            ),
                        ),
                    )
                , $args );
            endif;

            if ($tt_atts['donation_source'] == 'single-donation' && $tt_atts['single_donation']) :
                $args = wp_parse_args(
                    array(
                        'p' => $tt_atts['single_donation'],
                    )
                , $args );
            endif;

            if ($tt_atts['donation_source'] == 'by-id' && $tt_atts['donation_id']) :
                $post_id_array = explode(',', $tt_atts['donation_id']);
                $args = wp_parse_args(
                    array(
                        'post__in' => $post_id_array,
                    )
                , $args );
            endif;

            $query = new WP_Query($args);

            if ( $query->have_posts() ) : ?>
                <!-- the loop -->
                <?php while ( $query->have_posts() ) : $query->the_post(); 
                    $goal = get_post_meta(get_the_ID(), '_campaign_goal');
                    $goal_desc = get_post_meta(get_the_ID(), '_campaign_description'); ?>

                    <div class="col-md-<?php echo esc_attr($tt_atts['grid_column']); ?> col-sm-6 col-xs-12 masonry-column">

                        <div class="donation-goal-thumb">
                            <?php the_post_thumbnail('nominee-event-featured', array('class' => 'img-responsive', 'alt' => get_the_title())); ?>
                        </div>

                        <div class="donation-goal-content">

                            <?php if ($tt_atts['category_visibility'] === 'visible') : ?>
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
                            <?php endif; ?>

                            
                            <?php if ($tt_atts['title_visibility'] === 'visible') : ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
                            <?php endif; ?>

                            <?php if ($tt_atts['separator_visibility'] === 'visible'): ?>
                                <span class="separator" style="<?php echo esc_attr($separator_color);?>" ></span>
                            <?php endif; ?>

                            
                            <?php if ($tt_atts['content_visibility'] === 'visible') : ?>
                                <div class="donation-content">
                                    <?php echo wp_kses(wp_trim_words($goal_desc[0], 12, ''), array(
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
                                </div>
                            <?php endif; ?>

                            <div class="donation-goal <?php echo esc_attr($tt_atts['progressbar_padding'].' '.$goal_raise_visibility); ?>">
                                <?php if ($tt_atts['raise_goal_visibility'] === 'visible') : ?>
                                    <div class="fund-info">
                                        <span class="note"><?php esc_html_e('Raised: ', 'nominee'); ?></span><span class="raised"><?php echo do_shortcode('[charitable_stat campaigns='.get_the_ID().']') ?></span><span class="fund-goal"> / <?php echo nominee_number_shorten($goal[0], 2); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($tt_atts['donation_progress'] === 'visible') : ?>
                                    <?php echo do_shortcode('[charitable_stat display=progress goal='.$goal[0].' campaigns='.get_the_ID().']'); ?>
                                <?php endif; ?>
                            </div>

                            <?php if ($tt_atts['donation_button'] === 'show') : ?>
                                <div class="clearfix">
                                    <a href="<?php the_permalink() ?>" class="btn btn-primary"><?php echo esc_html($tt_atts['button_text']); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div> <!-- .col-# -->

                <?php endwhile; ?>
                <!-- end of the loop -->

            <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e( 'donation not found !', 'nominee' ); ?></p>
            <?php endif; ?>
        </div><!-- .row -->
    </div><!-- .donation-wrapper -->

<?php else:

    echo esc_html__('Please install Charitable plugin', 'nominee');

endif;

echo ob_get_clean();