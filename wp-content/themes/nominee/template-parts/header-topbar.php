<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<div class="header-top-wrapper">
    <div class="container">
        <div class="row">
            <?php if (nominee_option('news-feed-visibility', false, true)) : ?>
                <div class="col-sm-5 col-md-6">
                    <?php get_template_part( 'template-parts/news', 'ticker' ); ?>
                </div>
            <?php endif; ?>
            
            <div class="col-sm-7 col-md-6 pull-right hidden-xs">
                <?php if (class_exists('SitePress') && nominee_option('language-switcher-visibility', false, true)): ?>
                    <div class="language-switcher pull-right">
                        <?php do_action('wpml_add_language_selector'); ?>
                    </div>
                <?php endif; ?>

                <?php if (nominee_option('topbar-social_links')): ?>
                    <div class="header-social-links pull-right">
                        <?php get_template_part('template-parts/social', 'icons' ); ?>
                    </div>
                <?php endif; ?>

                <?php if (nominee_option('shopping-cart-visibility', false, true)):
                    if (class_exists('woocommerce')): ?>
                        <div class="tt-cart-count pull-right">
                            <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'nominee' ); ?>"><i class="fa fa-shopping-bag"></i><span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
                        </div>
                    <?php endif;
                endif; ?>

                <?php if (nominee_option('user-area-visibility')): ?>
	                <div class="user-area pull-right">
	                	<?php if (is_user_logged_in()): ?>
	                		<a href="<?php echo wp_logout_url( nominee_option('tt-login-redirect', false, home_url('/'))); ?>" title="<?php esc_attr_e('Logout', 'nominee'); ?>" <?php esc_attr_e('Logout', 'nominee'); ?>><i class="fa fa-user"></i> <?php esc_html_e('Logout', 'nominee'); ?></a>
	                	<?php else : ?>
	                		<a href="<?php echo get_page_link(nominee_option('user-login-page')); ?>" title="<?php esc_attr_e('Login', 'nominee'); ?>"><i class="fa fa-user"></i> <?php esc_html_e('Login', 'nominee'); ?></a>
	                	<?php endif; ?>
	                </div>
	            <?php endif; ?>

                <?php if (nominee_option('header-contact')) : ?>
                    <div class="contact-info hidden-sm hidden-md">
                        <?php echo wp_kses(nominee_option('header-contact', false, true), array(
                            'a'  => array(
                                'href'   => array(),
                                'title'  => array(),
                                'target' => array()
                            ),
                            'br' => array(),
                            'i'  => array('class' => array()),
                            'ul' => array('class' => array()),
                            'li' => array(),
                        )); ?>
                    </div>
                <?php endif; ?>
            </div> <!-- .col-# -->
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .header-top-wrapper -->