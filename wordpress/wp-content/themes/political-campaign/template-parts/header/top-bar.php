<?php
/**
 * The template part for Middle Header
 *
 * @package Political Campaign
 * @subpackage political-campaign
 * @since political-campaign 1.0
 */
?>

<div id="topbar">
  <div class="top-inner">
    <div class="row outer-logo">
      <div class="col-lg-4 col-md-4 col-12 politics-logo text-center">
        <div class="container">
          <div class="logo">
            <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <?php if( get_theme_mod('political_campaign_logo_title_hide_show',true) == 1){ ?>
                    <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php else : ?>
                  <?php if( get_theme_mod('political_campaign_logo_title_hide_show',true) == 1){ ?>
                    <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php endif; ?>
              <?php endif; ?>
              <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
              ?>
              <?php if( get_theme_mod('political_campaign_tagline_hide_show',false) == 1){ ?>
                <p class="site-description mb-0">
                  <?php echo esc_html($description); ?>
                </p>
              <?php } ?>
            <?php endif; ?>
          </div>
        </div>
      </div>

        <div class="col-lg-8 col-md-8 col-12 align-self-end">
          <?php if( get_theme_mod( 'political_campaign_topbar_hide_show', true) == 1) { ?>
            <div class="row header-top ">
              <div class="col-lg-9 col-md-12 col-12 text-lg-start text-md-start text-center align-self-center top-bar-section-info">
                <?php if(get_theme_mod('political_campaign_email_address') != ''){ ?>
                    <span class="adress me-lg-5 me-md-5 me-0"><i class="<?php echo esc_attr(get_theme_mod('political_campaign_email_icon','fas fa-envelope')); ?>"></i> <a href="mailto:<?php echo esc_attr(get_theme_mod('political_campaign_email_address',''));?>"><?php echo esc_html(get_theme_mod('political_campaign_email_address',''));?></a></span>
                <?php }?>

                <?php if(get_theme_mod('political_campaign_phone_number') != ''){ ?>
                    <span class="phone-number me-lg-5 me-md-5 me-0"><i class="<?php echo esc_attr(get_theme_mod('political_campaign_phone_icon','fas fa-phone')); ?>"></i> <a href="tel:<?php echo esc_attr( get_theme_mod('political_campaign_phone_number','') ); ?>"><?php echo esc_html(get_theme_mod('political_campaign_phone_number',''));?></a></span>
                <?php }?>
              
                <?php if(get_theme_mod('political_campaign_location') != ''){ ?>
                  <span class="location"><i class="<?php echo esc_attr(get_theme_mod('political_campaign_location_icon','fas fa-map-marker-alt')); ?>"></i> <?php echo esc_html(get_theme_mod('political_campaign_location',''));?></span>
                <?php }?>
              </div>
              <div class="col-lg-3 col-md-12 col-12 text-lg-start text-md-center text-center social-box align-self-center topbar-social-icon">
                <div class="container p-0">
                <?php dynamic_sidebar('social-widget'); ?>
                </div>
              </div>
            </div>
          <?php } ?>

          <div class="header-menu ">
            <?php get_template_part('template-parts/header/main-header'); ?>
          </div>
        </div>
    </div>
  </div>
</div>

