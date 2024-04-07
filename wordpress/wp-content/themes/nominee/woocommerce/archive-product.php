<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); 


$shop_sidebar = nominee_option('shop-sidebar', false, 'right-sidebar');
	$grid_column = 'col-md-12';
	
	if ($shop_sidebar == 'right-sidebar') :
		$grid_column = (is_active_sidebar('nominee-shop-sidebar')) ? 'col-lg-9 col-md-8' : $grid_column;
	elseif ($shop_sidebar == 'left-sidebar') :
		$grid_column = (is_active_sidebar('nominee-shop-sidebar')) ? 'col-lg-9 col-lg-push-3 col-md-8 col-md-push-4' : $grid_column;
	endif;
?>

<div class="nominee-shop">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($grid_column); ?>">

				<div class="woocommerce-products-header">
					<?php
						/**
						 * woocommerce_archive_description hook.
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action( 'woocommerce_archive_description' );
					?>
			    </div>
				
				<?php if ( have_posts() ) {

					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked wc_print_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );

					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 *
							 * @hooked WC_Structured_Data::generate_product_data() - 10
							 */
							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				} ?>

			</div> <!-- .col-## -->

			<!-- Sidebar -->
			<?php get_sidebar('shop'); ?>

		</div> <!-- .row -->
	</div> <!-- .container -->
</div> <!-- .nominee-shop -->
<?php get_footer(); ?>