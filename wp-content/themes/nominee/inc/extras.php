<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Adds custom classes to the array of body classes.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_body_classes' ) ) :

	function nominee_body_classes( $classes ) {

		// header style classes
		$page_header = '';
		if (function_exists('rwmb_meta')) :
			$page_header = rwmb_meta('nominee_header_style');
		endif;

		if ($page_header == 'header-default') :
			$classes[] = 'header-default';
		elseif ($page_header == 'header-transparent') :
			$classes[] = 'header-transparent';
		elseif ($page_header == 'header-fullwidth') :
			$classes[] = 'header-style-fullwidth';
		elseif ($page_header == 'header-center-logo') :
			$classes[] = 'header-style-center-logo';
		elseif ($page_header == 'header-box-style') :
			$classes[] = 'header-style-box-style';
        elseif ($page_header == 'no-header') :
        	$classes[] = 'no-header';
		else :
			$page_header_opt = nominee_option('header-style', false, 'header-default');
			if ($page_header_opt == 'header-default') :
				$classes[] = 'header-default';
			elseif($page_header_opt == 'header-transparent') :
				$classes[] = 'header-transparent';
			elseif($page_header_opt == 'header-fullwidth') :
				$classes[] = 'header-style-fullwidth';
			elseif($page_header_opt == 'header-center-logo') :
				$classes[] = 'header-style-center-logo';
			elseif($page_header_opt == 'header-box-style') :
				$classes[] = 'header-style-box-style';
        	elseif ($page_header == 'no-header') :
        		$classes[] = 'no-header';
        	endif;
		endif;

		$topbar_page_opt = "";

	    if (function_exists('rwmb_meta')) :
	        $topbar_page_opt = rwmb_meta('nominee_topbar_visibility');
	    endif;

		if ($topbar_page_opt == 'inherit-from-theme-option' || empty($topbar_page_opt)) :
			if (nominee_option('header-top-visibility') == true) :
				$classes[] = 'has-header-topbar';
			endif;
		elseif($topbar_page_opt == 'show') : 
			$classes[] = 'has-header-topbar';
		endif;


		// offcanvas
		if (nominee_option('offcanvas-visibility') == true) {
			$classes[] = 'show-offcanvas';
		} else {
			$classes[] = 'hide-offcanvas';
		}

		// page layouts
		$layout_options = nominee_option('site-layout', false, 'fullwidth-layout');

	    $page_layout = "";
	    if (function_exists('rwmb_meta')) : 
	        $page_layout = rwmb_meta('nominee_page_layout');
	    endif;

	    if ($page_layout == 'inherit-from-theme-option' || empty($page_layout)) :
	        if ($layout_options == 'border-layout') :
		        $classes[] = 'border-layout';

		    elseif ($layout_options == 'box-framed-layout') :
		        $classes[] = 'box-framed-layout';

		    elseif ($layout_options == 'box-layout') :
		    	$classes[] = 'box-layout';

		    else :
		        $classes[] = 'fullwidth-layout';
		    endif;
	    elseif($page_layout == 'border-layout') :
	        $classes[] = 'border-layout';

	   	elseif($page_layout == 'box-framed-layout') :
	   		$classes[] = 'box-framed-layout';

	   	elseif($page_layout == 'box-layout') :
	   		$classes[] = 'box-layout';

	   	else :
	   		$classes[] = 'fullwidth-layout';
	    endif;
		
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) :
			$classes[ ] = 'group-blog';
		endif;

		return $classes;
	}
	add_filter( 'body_class', 'nominee_body_classes' );

endif;


// preloader
function nominee_preloader(){ ?>
	<?php 
	$preloader = nominee_option('page-preloader', false, true); 

	if ( ! $preloader) {
		return false;
	} ?>

    <div id="preloader" class="preloader">
        
        <?php if (nominee_option('loader-type') == true): ?>
            <div class="status-mes" style="background-image: url(<?php echo esc_url(nominee_option('tt-loader', 'url', get_template_directory_uri() . '/images/preloader.gif'));?>);"></div>
        <?php else : ?>
            <span class="loading-icon"> 
                <span class="bubble">
                    <span class="dot"></span>
                </span> 
                <span class="bubble">
                    <span class="dot"></span>
                </span> 
                <span class="bubble">
                    <span class="dot"></span>
                </span> 
            </span>
        <?php endif; ?>
        
    </div>
<?php

}

add_action('elementor/theme/before_do_header', 'nominee_preloader');
add_action('wp_body_open', 'nominee_preloader');


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_page_menu_args' ) ) :

	function nominee_page_menu_args( $args ) {

		$args[ 'show_home' ] = TRUE;

		return $args;
	}

	add_filter( 'wp_page_menu_args', 'nominee_page_menu_args' );

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Sets the authordata global when viewing an author archive.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_setup_author' ) ) :
	function nominee_setup_author() {
		global $wp_query;

		if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
			$GLOBALS[ 'authordata' ] = get_userdata( $wp_query->post->post_author );
		}
	}

	add_action( 'wp', 'nominee_setup_author' );

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page break button in editor
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_wp_page_pagination' ) ) :

	function nominee_wp_page_pagination( $mce_buttons ) {
		if ( get_post_type() == 'post' or get_post_type() == 'page' ) {
			$pos = array_search( 'wp_more', $mce_buttons, TRUE );
			if ( $pos !== FALSE ) {
				$buttons     = array_slice( $mce_buttons, 0, $pos + 1 );
				$buttons[ ]  = 'wp_page';
				$mce_buttons = array_merge( $buttons, array_slice( $mce_buttons, $pos + 1 ) );
			}
		}

		return $mce_buttons;
	}

	add_filter( 'mce_buttons', 'nominee_wp_page_pagination' );

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Set post view on single page
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_put_post_view_function' ) ) :

    function nominee_put_post_view_function( $contents ) {
        if ( function_exists( 'tt_set_post_views' ) and is_single() ) {
            tt_set_post_views(get_the_ID());
        }

        return $contents;
    }

    add_filter( 'the_content', 'nominee_put_post_view_function', 9999 );

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// PayPal donate modal
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_paypal_donate_modal' ) ) :

	function nominee_paypal_donate_modal() {

		get_template_part( 'template-parts/paypal', 'donation' );
	}

	add_action( 'wp_footer', 'nominee_paypal_donate_modal', 9999 );
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Get site url by replacing 'http://site_url/' for one page menu
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_get_site_url' ) ) :

	function nominee_get_site_url($output) {

		global $post;
		$front_id = get_option('page_on_front');
		
		if(is_object($post)) :
			$output = str_replace( 'http://site_url/', get_permalink($front_id), $output);	
			$output = str_replace( get_permalink($post->ID).'#', '#', $output );
		endif;

	    return $output;
	}
	add_filter( 'walker_nav_menu_start_el', 'nominee_get_site_url', 10, 4);
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Change number of products per row
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_product_per_row' ) ) :

	function nominee_product_per_row() {
		$product_per_row = 3;

		if (nominee_option('product-column')) :
			return nominee_option('product-column', false, true); // products per row
		else :
			return $product_per_row;
		endif;
	}
	
	add_filter('loop_shop_columns', 'nominee_product_per_row');

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Product per page
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('nominee_shop_per_page')) :
	function nominee_shop_per_page(){
		$product_per_page = 6;

		if (nominee_option('product-per-page')) :
			return nominee_option('product-per-page', false, true); // products per page
		else :
			return $product_per_page;
		endif;
	}
	add_filter( 'loop_shop_per_page', 'nominee_shop_per_page');
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Change shop thumbnail image size
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_shop_thumbnail_image_size' ) ):

    function nominee_shop_thumbnail_image_size( $size ) {
        $size[ 'width' ]  = 60;
        $size[ 'height' ] = 60;
        $size[ 'crop' ]   = 1;

        return $size;
    }

    add_filter( 'woocommerce_get_image_size_shop_thumbnail', 'nominee_shop_thumbnail_image_size' );

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Change shop catalog image size
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_shop_catalog_image_size' ) ):

    function nominee_shop_catalog_image_size( $size ) {
        $size[ 'width' ]  = 300;
        $size[ 'height' ] = 380;
        $size[ 'crop' ]   = 1;

        return $size;
    }

    add_filter( 'woocommerce_get_image_size_shop_catalog', 'nominee_shop_catalog_image_size' );
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Wishlist button
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if(!function_exists('nominee_wishlist_btn')) {
    function nominee_wishlist_btn() {
        if(!class_exists('YITH_WCWL_Shortcode')){
            return;
        }
        echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
    }
}

if( get_option('yith_wcwl_button_position') == 'shortcode' ) {
    add_action( 'woocommerce_after_add_to_cart_button', 'nominee_wishlist_btn', 30 );
}

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Wishlist button
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if( !function_exists('nominee_wishlist_text')):
    function nominee_wishlist_text(){
        return '<i class="fa fa-heart" aria-hidden="true"></i>';
    }
    add_filter('yith-wcwl-browse-wishlist-label', 'nominee_wishlist_text');
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Cart contents update when products are added to the cart via AJAX
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('nominee_header_add_to_cart_fragment')) :
    function nominee_header_add_to_cart_fragment( $fragments ) {
        ob_start(); ?>
        <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'nominee' ); ?>"><i class="fa fa-shopping-bag"></i><span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
        <?php $fragments['a.cart-contents'] = ob_get_clean();
        return $fragments;
    }
    add_filter( 'woocommerce_add_to_cart_fragments', 'nominee_header_add_to_cart_fragment' );
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  update wishlist count
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function nominee_update_wishlist_count(){
    if( function_exists( 'YITH_WCWL' ) ){
        wp_send_json( YITH_WCWL()->count_products() );
    }
}
add_action( 'wp_ajax_update_wishlist_count', 'nominee_update_wishlist_count' );
add_action( 'wp_ajax_nopriv_update_wishlist_count', 'nominee_update_wishlist_count' );

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Remove WooCommerce action
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20);


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Cart page wrapper html start
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('nominee_cart_wrapper_html_start')) :
	function nominee_cart_wrapper_html_start(){
		echo '<div class="nominee-shop nominee-cart">';
	}
	add_action( 'woocommerce_before_cart', 'nominee_cart_wrapper_html_start');
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Cart page wrapper html end
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('nominee_cart_wrapper_html_end')) :
	function nominee_cart_wrapper_html_end(){
		echo '</div>';
	}
	add_action( 'woocommerce_after_cart', 'nominee_cart_wrapper_html_end');
endif;