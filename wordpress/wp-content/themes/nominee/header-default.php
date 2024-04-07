<div class="header-wrapper navbar-fixed-top">
    
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
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <?php if (nominee_option('donate-visibility')) : ?>
                    <div class="mobile-donate-button pull-right visible-xs">
                        <?php if (nominee_option('donate-page-link') == true): ?>
                            <a class="btn btn-primary" href="<?php echo get_page_link(nominee_option('donate-page')); ?>"><i class="fa fa-money"></i></a>
                        <?php else : ?>
                            <a class="btn btn-primary" href="<?php echo esc_url(nominee_option('donate-external-link')); ?>" target="<?php echo esc_attr(nominee_option('donate-link-target')); ?>"><i class="fa fa-money"></i></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mobile-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <div class="navbar-brand">
                    <?php get_template_part('template-parts/site', 'logo' );?>
                </div> <!-- .navbar-brand -->
            </div> <!-- .navbar-header -->

            <div class="main-menu-wrapper hidden-xs clearfix">
                <div class="main-menu">
                    <?php if (nominee_option('donate-visibility')) : ?>
                        <div class="donate-button pull-right">
                            <?php if (nominee_option('donate-page-link') == true): ?>
                                <a href="<?php echo get_page_link(nominee_option('donate-page')); ?>"><?php echo esc_html(nominee_option('donate-button-text', false, true))?></a>
                            <?php else : ?>
                                <a href="<?php echo esc_url(nominee_option('donate-external-link')); ?>" target="<?php echo esc_attr(nominee_option('donate-link-target')); ?>"><?php echo esc_html(nominee_option('donate-button-text', false, true))?></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php wp_nav_menu( apply_filters( 'nominee_primary_wp_nav_menu', array(
                        'container'      => false,
                        'theme_location' => 'primary',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s nav navbar-nav navbar-right">%3$s</ul>',
                        'walker'         => new Nominee_Navwalker(),
                        'fallback_cb'    => false
                    ))); ?>
                </div>
            </div> <!-- /navbar-collapse -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="visible-xs">
                <div id="mobile-toggle" class="mobile-menu collapse navbar-collapse">
                    <?php wp_nav_menu( apply_filters( 'nominee_primary_wp_nav_menu', array(
                        'container'      => false,
                        'theme_location' => 'primary',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>',
                        'walker'         => new Nominee_Mobile_Navwalker(),
                        'fallback_cb'    => false
                    ))); ?>
                </div> <!-- /.navbar-collapse -->
            </div>
        </div><!-- .container-->
    </nav>
</div> <!-- .header-wrapper -->