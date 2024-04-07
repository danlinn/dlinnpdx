<div class="header-wrapper header-fullwidth navbar-fixed-top">
    <?php $topbar_opt = $topbar_page_opt = "";

    if (function_exists('rwmb_meta')) :
        $topbar_page_opt = rwmb_meta('nominee_topbar_visibility');
    endif;

    if ($topbar_page_opt == 'inherit-theme-option' || empty($topbar_page_opt)) : 
        if (nominee_option('header-top-visibility')) :
            get_template_part('template-parts/header', 'topbar' );
        endif;
    else :
        if ($topbar_page_opt == 'show') :
            get_template_part('template-parts/header', 'topbar' );
        endif;
    endif; ?>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="navbar-brand">
                    <?php get_template_part('template-parts/site', 'logo' );?>
                </div> <!-- .navbar-brand -->
            </div> <!-- .navbar-header -->

            <div class="main-menu-wrapper hidden-xs clearfix">
                <div class="main-menu">
                    <?php wp_nav_menu( apply_filters( 'nominee_primary_wp_nav_menu', array(
                        'container'      => false,
                        'theme_location' => 'primary',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s nav navbar-nav navbar-right">%3$s</ul>',
                        'walker'         => new Nominee_Navwalker(),
                        'fallback_cb'    => false
                    ))); ?>
                </div>
            </div> <!-- /navbar-collapse -->

            <?php if (nominee_option('donate-visibility')) : ?>
                <div class="donate-button">
                    <?php if (nominee_option('donate-page-link') == true): ?>
                        <a href="<?php echo get_page_link(nominee_option('donate-page')); ?>"><?php echo esc_html(nominee_option('donate-button-text', false, true))?></a>
                    <?php else : ?>
                        <a href="<?php echo esc_url(nominee_option('donate-external-link')); ?>" target="<?php echo esc_attr(nominee_option('donate-link-target')); ?>"><?php echo esc_html(nominee_option('donate-button-text', false, true))?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <div class="tt-toggle-button">
                <button type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

        </div><!-- .container-->
    </nav>
</div> <!-- .header-wrapper -->