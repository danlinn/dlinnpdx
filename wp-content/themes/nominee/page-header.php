<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$tt_page_template = basename( get_page_template_slug() );

$page_header_visibility = NULL;

$header_page_options = nominee_option('page-header-visibility', false, true);
$single_post_header = nominee_option('blog-single-page-header', false, true);

// var_dump($single_post_header);

if (function_exists('rwmb_meta')) :
    $page_header_visibility = rwmb_meta('nominee_page_header_visibility');
endif;

if ($page_header_visibility == 'header-inherite-option' || $page_header_visibility == 'header-section-show' || $page_header_visibility == NULL) :

	if ($header_page_options == 'header-section-show' || $page_header_visibility == 'header-section-show') :
		if ( is_page() and $tt_page_template != 'template-home.php' ) : 
			get_template_part( 'template-parts/page-header', 'section' );
		endif; ?>

		<?php if ( ! is_page() && ! is_singular('tt-event') && $single_post_header == true) : 
			get_template_part( 'template-parts/page-header', 'section' );
		endif;
	endif;
endif;