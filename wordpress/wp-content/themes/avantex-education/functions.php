<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( ! function_exists( 'education_chld_thm_cfg_locale_css' ) ) :
	function education_chld_thm_cfg_locale_css( $uri ) {
		if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) ) {
			$uri = get_template_directory_uri() . '/rtl.css';
		}
		return $uri;
	}
endif;
add_filter( 'locale_stylesheet_uri', 'education_chld_thm_cfg_locale_css' );

if ( ! function_exists( 'education_chld_thm_cfg_parent_css' ) ) :
	function education_chld_thm_cfg_parent_css() {
		wp_enqueue_style( 'education_chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'twentytwenty-print-style', 'bootstrap-min-css', 'animate-css', 'font-awesome-min-css', 'Swiper-min-css', 'owl-carousel-css', 'odometer-css', 'bxslider-css', 'switcher-css', 'avantex-skin-default' ) );
	}
endif;
add_action( 'wp_enqueue_scripts', 'education_chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

// Check if plugin Active.
require_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'avantex-companion/avantex-companion.php' ) ) {
	function avantex_education_set_plugins_mods() {
		// set_theme_mod( 'avantex-services-image', AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/service/auto_service_back.png' );
	}
	add_action( 'after_switch_theme', 'avantex_education_set_plugins_mods' );
}

function avantex_education_set_theme_mods() {

	set_theme_mod( 'avantex_slider_overlay', '0' );
	set_theme_mod( 'avantex-styling-primary-color', '#47cf73' );
	set_theme_mod( 'avantex-styling-dark-color', '#222428' );
	set_theme_mod( 'avantex-styling-light-color', '#d3cbc2' );
	set_theme_mod( 'avantex-styling-links-color', '#39b17a' );
	set_theme_mod( 'avantex-services-title', 'SERVICES WE OFFER' );
	set_theme_mod( 'avantex-services-subtitle', 'Tailored Solutions for Your Unique Needs' );
	set_theme_mod( 'avantex-services-title-color', '#fff' );
	set_theme_mod( 'avantex-services-description-color', '#fff' );
	set_theme_mod( 'avantex-portfolio-size', 'container-full' );
	set_theme_mod( 'avantex-portfolio-description-color', '#000' );
	set_theme_mod( 'avantex-callout-title', 'LET US CREATE SOMETHING EXCEPTIONAL' );
	set_theme_mod( 'avantex-callout-subtitle', 'Experience the magic of collaboration with us.' );
	set_theme_mod( 'avantex-testimonial-description-color', '#000' );
}
add_action( 'after_switch_theme', 'avantex_education_set_theme_mods' );
