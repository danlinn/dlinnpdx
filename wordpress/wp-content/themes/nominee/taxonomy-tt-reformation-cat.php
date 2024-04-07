<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>
<div class="reformation-wrap content-wrapper">
    <div class="container">
        <div class="row tt-grid">

            <?php
            // grid post $args
            $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));

            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
            $args  = array(
                'post_type'      => 'tt-reformation',
                'posts_per_page' => -1,
                'tt-reformation-cat'   => $term->slug,
                'post_status'    => 'publish',
                'paged'          => $paged
            );

            $query = new WP_Query( $args ); ?>

            <?php if ( $query->have_posts() ) : ?>

                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    
                    <div class="tt-item reformation-padding col-md-4 col-sm-6 col-xs-12">

                        <figure class="tt-effect">
                            <?php echo get_the_post_thumbnail( get_the_ID(), 'nominee-reformation-thumb', array( 'class' => 'img-responsive', 'alt' => get_the_title())); ?>
                            <figcaption>
                                <div class="content">
                                    <div class="links">
                                        <?php $tt_attachment_id = get_post_thumbnail_id(get_the_ID());
                                            $tt_image_attr = wp_get_attachment_image_src($tt_attachment_id, 'full' ); ?>

                                        <a class="image-link" href="<?php echo esc_url($tt_image_attr[0]); ?>"><i class="fa fa-search-plus"></i></a>
                                        <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
                                    </div><!-- /.links -->

                                    <p>
                                        <?php echo wp_trim_words( get_the_content(), 8); ?>
                                    </p>
                                </div>
                            </figcaption>
                        </figure>
                    </div> <!-- /tt-item -->
                <?php endwhile; ?>
                
            <?php else : ?>
                <p><?php esc_html_e('Issue not found !', 'nominee');?></p>
            <?php endif;
                wp_reset_postdata();
            ?>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .blog-wrapper -->
<?php get_footer();