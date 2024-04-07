<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $num_words = $tt_atts['num_words'];

    $overlay_bg = $box_shadow = $border_radius = "";

    if($tt_atts['overlay_bg']){
        $overlay_bg = 'background-color:'.$tt_atts['overlay_bg'].';';
    }

    if($tt_atts['border_radius']){
        $border_radius = 'border-radius:'.$tt_atts['border_radius'].';';
    }

    if($tt_atts['box_shadow'] == 'enable'){
        $box_shadow = 'has-box-shadow';
    }
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;	
    $args = array(
        'post_type'      => 'tt-issue',
        'post_status'    => 'publish',
        'posts_per_page' => $tt_atts['issue_limit'],
        'post__not_in'   => explode(',', $tt_atts['exclude']),
        'orderby'        => $tt_atts['orderby'],
        'order'          => $tt_atts['order'],
        'paged' => $paged
    );

    if ($tt_atts['post_source'] == 'by-category' && $tt_atts['taxonomies']) :
        $args = wp_parse_args(
            array(
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tt-issue-cat',
                        'field'    => 'term_id',
                        'terms'    => explode(',', $tt_atts['taxonomies'])
                    )
                )
            )
        , $args );
    endif;
    
    if ($tt_atts['post_source'] == 'by-id' && $tt_atts['post_id']) :
        $args = wp_parse_args(
            array(
                'post__in'    => explode(',', $tt_atts['post_id'])
            )
        , $args );
    endif;

    if($tt_atts['offset']){
        $args = wp_parse_args(
            array(
                'offset'         => $tt_atts['offset'],
            )
        , $args );
    }

    $grid_column = 'col-md-'.$tt_atts['grid_column'];
    // $tt_atts['issue_carousel'];
    if($tt_atts['issue_carousel'] == 'enable'){
        $grid_column = 'item';
    }

    ob_start();

    wp_enqueue_style('owl-carousel');
    wp_enqueue_style('owl-theme');
    wp_enqueue_script('owl-carousel');
    
?>

    <div class="tt-issue-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class.' '.$box_shadow); ?>">
    	<div class="<?php echo esc_attr($tt_atts['issue_carousel'] != 'enable' ? 'row' : 'issue-carousel owl-carousel') ?>" data-issue-nav = "<?php echo esc_attr($tt_atts['carousel_nav']) ?>" data-issue-play = "<?php echo esc_attr($tt_atts['carousel_play'] == 'enable' ? 'allow' : '') ?>"> 
            <?php 
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) : $issue_count = 1;
                    while ( $the_query->have_posts() ) : $the_query->the_post() ;?>
                        <div class="item <?php echo esc_attr($grid_column); ?> ">
                            <div class="issue-inner <?php echo esc_attr($box_shadow) ?>" style="<?php echo esc_attr($border_radius) ?>">
                                <?php the_post_thumbnail('nominee-spotlight-long-thumbnail', array('class' => 'img-fluid '));?>
                                <div class="issue-overlay" style="<?php echo esc_attr($overlay_bg.' '.$border_radius); ?>"></div>
                                <div class="issue-content">
                                    <span>
                                        <?php 
                                            if($issue_count < 10) echo 0;
                                            echo esc_html($issue_count);
                                        ?>
                                    </span>

                                    <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                    <div class="issue-content-inner">
                                        <?php if(function_exists('rwmb_meta') && rwmb_meta('nominee_issue_excerpt')) : ?>
                                            <p><?php echo wp_trim_words( rwmb_meta('nominee_issue_excerpt'), $num_words, '' ); ?></p>
                                        <?php endif; ?>
                                        <?php if($tt_atts['btn_text']) : ?>
                                            <a href="<?php the_permalink(); ?>"><?php echo esc_html($tt_atts['btn_text']) ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .col -->
                        <?php $issue_count++; 
                    endwhile; 

                    echo nominee_posts_pagination($the_query);

                    wp_reset_postdata(); 
                    
                else : ?>
                    <p><?php esc_html_e('issue not found !', 'nominee'); ?></p><?php 
                endif; 
            ?>

        </div> <!-- .row -->
    </div> <!-- .issue-wrapper -->

<?php echo ob_get_clean();