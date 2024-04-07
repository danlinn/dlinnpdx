<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); 

$donation_sidebar = nominee_option('donation-sidebar', false, 'right-sidebar');
$grid_column = 'col-md-12';

if ($donation_sidebar == 'right-sidebar') :
    $grid_column = (is_active_sidebar('nominee-donation-sidebar')) ? 'col-md-8 col-sm-8' : $grid_column;
elseif ($donation_sidebar == 'left-sidebar') :
    $grid_column = (is_active_sidebar('nominee-donation-sidebar')) ? 'col-md-8 col-md-push-4 col-sm-8 col-sm-push-4' : $grid_column;
endif;
?>
<div class="tt-donation-list-wrapper enable-content-padding">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($grid_column); ?>">
                <div id="main" class="row" role="main">

                    <?php
                    // grid post $args
                    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                    $args  = array(
                        'post_type'      => 'campaign',
                        'posts_per_page' => 10,
                        'campaign_category'   => $term->slug,
                        'post_status'    => 'publish',
                        'paged'          => $paged
                    );

                    $query = new WP_Query( $args );
                    ?>
                    <?php if ( $query->have_posts() ) : ?>

                        <?php while ( $query->have_posts() ) : $query->the_post();


                            $goal = get_post_meta(get_the_ID(), '_campaign_goal');
                            $goal_desc = get_post_meta(get_the_ID(), '_campaign_description'); 

                            $post_column = (is_active_sidebar('nominee-donation-sidebar')) ? 'col-md-6 col-sm-6 col-xs-12' : 'col-md-4 col-sm-6 col-xs-12'; ?>

                            <div class="<?php echo esc_attr($post_column); ?> masonry-column">

                                <div class="donation-goal-thumb">
                                    <?php the_post_thumbnail('nominee-event-featured', array('class' => 'img-responsive', 'alt' => get_the_title())); ?>
                                </div>

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

                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>

                                    <span class="separator" style="<?php echo esc_attr($separator_color);?>" ></span>

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

                                    <div class="donation-goal">
                                        <div class="fund-info">
                                            <span class="note"><?php esc_html_e('Raised: ', 'nominee'); ?></span><span class="raised"><?php echo do_shortcode('[charitable_stat campaigns='.get_the_ID().']') ?></span><span class="fund-goal"> / <?php echo nominee_number_shorten($goal[0], 2); ?></span>
                                        </div>
                                        
                                        <?php echo do_shortcode('[charitable_stat display=progress goal='.$goal[0].' campaigns='.get_the_ID().']'); ?>
                                    </div>
                                </div>
                            </div> <!-- .col-# -->

                        <?php endwhile; ?>

                        <div class="col-md-12 text-center">
                            <?php nominee_list_posts_pagination(); ?>
                        </div>

                        <?php
                    else : ?>
                        <p><?php esc_html_e('Donation not found !', 'nominee');?></p>
                    <?php endif;
                        wp_reset_postdata();
                    ?>
                </div><!-- .posts-content -->
            </div> <!-- .col -->

            <!-- donation sidebar -->
            <?php get_sidebar('donation'); ?>

        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .blog-wrapper -->
<?php get_footer();