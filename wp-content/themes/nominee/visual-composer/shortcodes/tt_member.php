<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();
?>

    <div class="member-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$tt_atts['designation_visibility']); ?>">
        <div class="row masonry-wrap">
            <?php 
            $args = array(
                'post_type'      => 'tt-member',
                'post_status'    => 'publish',
                'orderby'           => $tt_atts['orderby'],
                'order'             => $tt_atts['order'],
            );

            if ($tt_atts['member_source'] == 'all-member' || $tt_atts['member_source'] == 'category-member') :
                $post_exclude = explode(',', $tt_atts['exclude']);
                $args = wp_parse_args(
                    array(
                        'posts_per_page'    => $tt_atts['post_limit'],
                        'post__not_in'      => $post_exclude,
                        'offset'            => $tt_atts['offset'],
                    )
                , $args );
            endif;

            if ($tt_atts['member_source'] == 'category-member' && $tt_atts['taxonomies']) :

                $terms = explode(',', $tt_atts['taxonomies']);

                $args = wp_parse_args(
                    array(
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tt-member-cat',
                                'field'    => 'slug',
                                'terms'    => $terms,
                            ),
                        ),
                    )
                , $args );
            endif;

            if ($tt_atts['member_source'] == 'single-member' && $tt_atts['single_member']) :
                $args = wp_parse_args(
                    array(
                        'p' => $tt_atts['single_member'],
                    )
                , $args );
            endif;

            if ($tt_atts['member_source'] == 'by-id' && $tt_atts['member_id']) :
                $post_id_array = explode(',', $tt_atts['member_id']);
                $args = wp_parse_args(
                    array(
                        'post__in' => $post_id_array,
                    )
                , $args );
            endif;

            $query = new WP_Query($args);

            if ( $query->have_posts() ) : ?>
                <!-- the loop -->
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-md-<?php echo esc_attr($tt_atts['grid_column']); ?> col-sm-6 col-xs-12 masonry-column">
                        <figure class="thumbnail">
                            <div class="thumb-wrapper">
                                <?php the_post_thumbnail('nominee-member', array('alt'=> get_the_title(), 'class' => 'img-responsive' ));?>
                                
                                <?php if (function_exists('rwmb_meta') && $tt_atts['social_visibility'] == 'visible-social') : ?>
                                    
                                    <div class="team-social">
                                        <ul class="list-inline">
                                            <?php
                                            
                                            $facebook_link = rwmb_meta('nominee_facebook_link');
                                            if ($facebook_link) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($facebook_link); ?>"><i class="fa fa-facebook"></i></a>
                                                </li>
                                            <?php endif; 

                                            $twitter_link = rwmb_meta('nominee_twitter_link');
                                            if ($twitter_link) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($twitter_link); ?>"><i class="fa fa-twitter"></i></a>
                                                </li>
                                            <?php endif; 

                                            $instagram_link = rwmb_meta('nominee_instagram_link');
                                            if ($instagram_link) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($instagram_link); ?>"><i class="fa fa-instagram"></i></a>
                                                </li>
                                            <?php endif; 

                                            $google_plus_link = rwmb_meta('nominee_google_plus_link');
                                            if ($google_plus_link) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($google_plus_link); ?>"><i class="fa fa-google-plus"></i></a>
                                                </li>
                                            <?php endif; 

                                            $linkedin_link = rwmb_meta('nominee_linkedin_link');
                                            if ($linkedin_link) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($linkedin_link); ?>"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                            <?php endif;

                                            $flickr_link = rwmb_meta('nominee_flickr_link');
                                            if ($flickr_link) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($flickr_link); ?>"><i class="fa fa-flickr"></i></a>
                                                </li>
                                            <?php endif;

                                            $youtube_link = rwmb_meta('nominee_youtube_link');
                                            if ($youtube_link) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($youtube_link); ?>"><i class="fa fa-youtube"></i></a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div> <!-- .team-social -->

                                <?php endif; ?>

                            </div> <!-- .thumb-wrapper -->
                          
                            <figcaption class="caption text-center">
                                
                                <h3><?php the_title(); ?></h3>

                                <?php if (function_exists('rwmb_meta')) :
                                    $member_designation = rwmb_meta('nominee_member_designaion');
                                    if ($member_designation and $tt_atts['designation_visibility'] == 'visible-designation') : ?>
                                        <span><?php echo esc_html($member_designation); ?></span>
                                    <?php endif; 
                                endif; ?>
                                <?php if ($tt_atts['bio_visibility'] == 'visible-bio'): ?>
                                    <div class="member-biography">
                                        <a href="<?php the_permalink();?>"><?php echo esc_html(nominee_option('biography-text', false, true));?><i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                <?php endif ?>
                                
                            </figcaption>
                        </figure>
                    </div> <!-- .col-# -->

                <?php endwhile; ?>
                <!-- end of the loop -->

            <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e( 'Member not found !', 'nominee' ); ?></p>
            <?php endif; ?>
        </div><!-- .row -->
    </div><!-- .member-wrapper -->
<?php echo ob_get_clean();