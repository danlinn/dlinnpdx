<?php
/*
*
* Home intro section for portfolix section
*
*
*/



function business_planning_intro_section_output()
{
  $business_planning_intro_show = get_theme_mod('business_planning_intro_show', 1);
  if (!$business_planning_intro_show) {
    return;
  }

  $business_planning_dfimgh = get_template_directory_uri() . '/assets/img/profile-img.png';
  $business_planning_intro_img = get_theme_mod('business_planning_intro_img', $business_planning_dfimgh);
  $business_planning_intro_subtitle = get_theme_mod('business_planning_intro_subtitle', __('Best Marketing Agency', 'business-planning'));
  $business_planning_intro_title = get_theme_mod('business_planning_intro_title', __('We Provide Business', 'business-planning'));
  $business_planning_intro_designation = get_theme_mod('business_planning_intro_designation', __('Planning Solution', 'business-planning'));
  $business_planning_intro_desc = get_theme_mod('business_planning_intro_desc');
  $business_planning_btn_text_one = get_theme_mod('business_planning_btn_text_one', __('Discover More', 'business-planning'));
  $business_planning_btn_url_one = get_theme_mod('business_planning_btn_url_one', '#');
  $business_planning_btn_text_two = get_theme_mod('business_planning_btn_text_two', __('Learn More', 'business-planning'));
  $business_planning_btn_url_two = get_theme_mod('business_planning_btn_url_two');
?>
  <!-- home -->
  <section class="home" id="home">
    <?php if (has_header_image()) : ?>
      <div class="header-img">
        <?php the_header_image_tag(); ?>

      <?php
      $business_planning_himg_class = 'has-header-img';
    else :
      $business_planning_himg_class = 'no-header-img';

    endif;
      ?>
      <div class="home-all-content <?php echo esc_attr($business_planning_himg_class); ?>">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">

              <div class="content">
                <?php if ($business_planning_intro_subtitle) : ?>
                  <h5><?php echo esc_html($business_planning_intro_subtitle); ?></h5>
                <?php endif; ?>
                <?php if ($business_planning_intro_title) : ?>
                  <h1><?php echo esc_html($business_planning_intro_title); ?> <br><span id="type1"><?php echo esc_html($business_planning_intro_designation); ?></span></h1>
                <?php endif; ?>
                <?php if ($business_planning_intro_desc) : ?>
                  <p><?php echo esc_html($business_planning_intro_desc); ?></p>
                <?php endif; ?>
                <?php if ($business_planning_btn_url_one || $business_planning_btn_url_two) : ?>
                  <div class="pc-intro-btns">
                    <?php if ($business_planning_btn_url_one) : ?>

                      <a href="<?php echo esc_url($business_planning_btn_url_one); ?>" class="btn btn-hero hero-btn1"><?php echo esc_html($business_planning_btn_text_one); ?></a>
                    <?php endif; ?>
                    <?php if ($business_planning_btn_url_two) : ?>
                      <a href="<?php echo esc_url($business_planning_btn_url_two); ?>" class="btn btn-hero hero-btn2"><?php echo esc_html($business_planning_btn_text_two); ?></a>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-lg-6">
              <?php if ($business_planning_intro_img) : ?>
                <div class="hero-img">
                  <img src="<?php echo esc_url($business_planning_intro_img); ?>" alt="<?php esc_attr($business_planning_intro_title); ?>">
                <?php else : ?>
                  <div class="hero-img px-noimg">
                  <?php endif; ?>
                  </div>

                </div>

            </div>
          </div>
        </div>
        <?php if (has_header_image()) : ?>
      </div>
    <?php endif; ?>
  </section>

<?php
}
add_action('business_planning_profile_intro', 'business_planning_intro_section_output');
