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
<div class="blog-wrapper content-wrapper single-campaign">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($grid_column); ?>">
                <div class="campaign-inner"> 
                    <?php
                        while ( have_posts() ) : the_post(); ?>
                            
                            <?php if (has_post_thumbnail( )): ?>
                                <div class="campaign-thumb">
                                    <?php the_post_thumbnail( 'nominee-carousel-post', array('class' => 'img-responsive campaign-img') ); ?>
                                </div>
                            <?php endif ?>

                            <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                        
                            <?php the_content(); 

                            if (function_exists('rwmb_meta') && nominee_option('donation-map') === 'visible') :
                                $args = apply_filters('nominee_single_campaign_map', array(
                                    'type'         => 'map',
                                    'width'        => '1140px', 
                                    'height'       => '400px',
                                    'marker'       => true,
                                    'js_options' => array(
                                        'zoom'         => 15
                                    ),
                                    'marker_title' => rwmb_meta('campaign-location'),
                                    'info_window'  => rwmb_meta('campaign-location')
                                ));

                                echo rwmb_meta('nominee_campaign_location_map', $args);
                            endif;
                        endwhile; // End of the loop. 
                    ?>
                </div> <!-- .posts-content -->
            </div> <!-- col-## -->

            <!-- donation sidebar -->
            <?php get_sidebar('donation'); ?>

        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .content-wrapper -->
<?php get_footer();