<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header();
?>
<div class="page-wrapper content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="campaign-inner">
                    <?php 
                    if (nominee_option('donation-header-visibility') == 'donation-section-show') :
                        $donation_title_intro = nominee_option('donation-title-intro'); 
                        $donation_title = nominee_option('donation-title');
                        $donation_title_desc = nominee_option('donation-title-desc'); 

                        $words = explode('-', $donation_title);
                        if (isset($words[1])) :
                            $words[1] = '<span>'.$words[1].'</span>';
                        endif; ?>

                        <?php if ($donation_title || $donation_title_intro || $donation_title_desc): ?>
                            <div class="sction-title-wrapper text-center">
                                <?php if ($donation_title_intro): ?>
                                    <span class="donation-section-intro"><?php echo esc_html($donation_title_intro); ?></span>
                                <?php endif; ?>
                                
                                <?php if ($donation_title): ?>
                                    <h2 class="section-title "><?php echo implode(' ', $words); ?></h2>
                                <?php endif ?>
                                
                                <div class="donation-section-sub" style="">
                                    <?php if ($donation_title_desc) :
                                        echo wp_kses($donation_title_desc, array(
                                            'a'      => array(
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
                                        ));
                                    endif; ?>
                                </div>
                            </div>
                        <?php endif;
                    endif; ?>


                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php the_content(); 
                            
                    endwhile; // End of the loop. 
                    ?>
                </div> <!-- .posts-content -->
            </div> <!-- col-## -->

        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .content-wrapper -->
<?php get_footer();