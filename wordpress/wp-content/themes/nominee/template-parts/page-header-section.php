<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; 

$page_title_visibility = $overlay_visibility = $breadcrumb_visibility = NULL;
$header_image = $header_color = "";
if (function_exists('rwmb_meta')) :
    $overlay_visibility = rwmb_meta('nominee_background_overlay');
    $page_title_visibility = rwmb_meta('nominee_page_title_visibility');
    $breadcrumb_visibility = rwmb_meta('nominee_page_breadcrumb_show');
endif; 

if (nominee_page_header_background()) :
    $header_image = 'background-image:url('.nominee_page_header_background().')'.';';
endif;

if(nominee_option('page_header_color')) :
    $header_color = 'background-color:'.nominee_option('page_header_color').';';
endif; ?>


<div class="page-header-section" style="<?php echo esc_attr($header_image.''.$header_color); ?>" role="banner">
    <?php if ($overlay_visibility == 'overlay_inherite_option' || $overlay_visibility == NULL) : ?>
        <?php if (nominee_option('tt-image-overlay', false, true)): ?>
            <div class="tt-overlay"></div>
        <?php endif;
    elseif($overlay_visibility == 'bg_overlay_enable') : ?>
        <div class="tt-overlay"></div>
    <?php endif; ?>

    <div class="container">
        <div class="page-header">
            <?php if ($page_title_visibility == 'title-inherite-option' || $page_title_visibility == NULL) : 
                if (nominee_option('tt-page-title', false, true)) : ?>
                    <h2><?php echo esc_html( nominee_page_header_section_title() ); ?></h2>
                <?php endif;
            elseif($page_title_visibility == 'page-title-show') : ?>
                <h2><?php echo esc_html( nominee_page_header_section_title() ); ?></h2>
            <?php endif; ?>

            <?php if ($breadcrumb_visibility == "breadcrumb_inherite_option" || $breadcrumb_visibility == NULL) :
                if (nominee_option('tt-breadcrumb', false, true)) :
                    nominee_breadcrumbs();
                endif;
            elseif($breadcrumb_visibility == "page_breadcrumb_show"):
                nominee_breadcrumbs();
            endif; ?>
        </div><!-- /.page-header -->
    </div> <!-- /.container -->
</div> <!-- .page-header-section -->