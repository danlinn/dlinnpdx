<?php
/**
 * @package Political Campaign
 * Setup the WordPress core custom header feature.
 *
 * @uses political_campaign_header_style()
*/
function political_campaign_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'political_campaign_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 80,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'political_campaign_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'political_campaign_custom_header_setup' );

if ( ! function_exists( 'political_campaign_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see political_campaign_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'political_campaign_header_style' );

function political_campaign_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .home-page-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: cover;
		}";
	   	wp_add_inline_style( 'political-campaign-basic-style', $custom_css );
	endif;
}
endif;