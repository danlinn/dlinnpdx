<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$shop_sidebar = nominee_option('shop-sidebar', false, 'right-sidebar');

if ( $shop_sidebar == 'right-sidebar' and is_active_sidebar('nominee-shop-sidebar')) : ?>
    <div class="col-lg-3 col-md-4 sidebar-sticky">
        <div class="tt-sidebar-wrapper right-sidebar" role="complementary">
            <?php dynamic_sidebar('nominee-shop-sidebar'); ?>
        </div>
    </div>
<?php elseif ( $shop_sidebar == 'left-sidebar' and is_active_sidebar('nominee-shop-sidebar')) : ?>
    <div class="col-lg-3 col-lg-pull-9 col-md-4 col-md-pull-8 sidebar-sticky">
        <div class="tt-sidebar-wrapper left-sidebar" role="complementary">
            <?php dynamic_sidebar('nominee-shop-sidebar'); ?>
        </div>
    </div>
<?php endif;