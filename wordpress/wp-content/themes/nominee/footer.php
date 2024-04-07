<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

            $page_header = "";
            if (function_exists('rwmb_meta')) : 
                $page_header = rwmb_meta('nominee_header_style');
            endif;


            if (nominee_option('header-style') == 'header-fullwidth' || $page_header == 'header-fullwidth'): ?>
                <div class="tt-offcanvas-sidebar">
                    <div class="offcanvas-overlay"></div>
                    
                    <div class="offcanvas-container">
                        <span class="tt-close"><i class="fa fa-times"></i></span>
                        <div class="tt-sidebar-wrapper footer-sidebar" role="complementary">
                            
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="visible-xs mobile-menu widget">
                                <h3 class="widget-title"><?php echo esc_html(nominee_option('mobile-menu-text')); ?></h3>

                                <?php wp_nav_menu( apply_filters( 'nominee_primary_wp_nav_menu', array(
                                    'container'      => false,
                                    'theme_location' => 'primary',
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>',
                                    'walker'         => new Nominee_Mobile_Navwalker(),
                                    'fallback_cb'    => false
                                ))); ?>
                            </div>
                            
                            <?php if (nominee_option('offcanvas-visibility')): ?>
                                <?php dynamic_sidebar( 'nominee-offcanvas-sidebar' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <?php

            $tt_footer_style = nominee_option('footer-style', false, 'footer-multipage');

            $page_footer = "";
            if (function_exists('rwmb_meta')) : 
                $page_footer = rwmb_meta('nominee_footer_style');
            endif;

            if ($page_footer == 'inherit-theme-option' || empty($page_footer)) :
                if ($tt_footer_style == 'footer-onepage') :
                    get_footer('onepage');
                elseif ($tt_footer_style == 'no-footer') :
                else :
                    get_footer('multipage');
                endif;
            elseif($page_footer == 'footer-onepage') :
                get_footer('onepage');
            elseif($page_footer == 'no-footer') :
            else :
                get_footer('multipage');
            endif; ?>

            <!-- newsletter subscription popup -->
            <?php if ( nominee_option( 'newsletter-popup', false, true ) ) :
        		get_template_part( 'template-parts/newsletter', 'popup' );
        	endif; ?>
        </div> <!-- .site-wrapper -->
        
        <?php wp_footer(); ?>
    </body>
</html>