<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$donation_sidebar = nominee_option('donation-sidebar', false, 'right-sidebar');
if ( $donation_sidebar == 'right-sidebar' and is_active_sidebar( 'nominee-donation-sidebar' ) ) : ?>
    <div class="col-md-4 col-sm-4 sidebar-sticky">
        <div class="tt-sidebar-wrapper right-sidebar" role="complementary">
            <?php dynamic_sidebar( 'nominee-donation-sidebar' ); ?>
        </div>
    </div>
<?php elseif ( $donation_sidebar == 'left-sidebar' and is_active_sidebar( 'nominee-donation-sidebar' ) ) : ?>
    <div class="col-md-4 col-md-pull-8 col-sm-4 col-sm-pull-8 sidebar-sticky">
        <div class="tt-sidebar-wrapper left-sidebar" role="complementary">
            <?php dynamic_sidebar( 'nominee-donation-sidebar' ); ?>
        </div>
    </div>
<?php endif;