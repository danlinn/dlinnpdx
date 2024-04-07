<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'political_campaign_before_slider' ); ?>

  <?php if( get_theme_mod( 'political_campaign_slider_hide_show', false) == 1 || get_theme_mod( 'political_campaign_resp_slider_hide_show', true) == 1) { ?>
    <section id="slider">
    <?php if(get_theme_mod('political_campaign_slider_type', 'Default slider') == 'Default slider' ){ ?>          
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'political_campaign_slider_speed',4000)) ?>">
        <?php $political_campaign_pages = array();
          for ( $count = 1; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'political_campaign_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $political_campaign_pages[] = $mod;
            }
          }
          if( !empty($political_campaign_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $political_campaign_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/slider.png" alt="" />
              <?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1 class="wow slideInRight delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p class="wow slideInRight delay-1000" data-wow-duration="2s"><?php $political_campaign_excerpt = get_the_excerpt(); echo esc_html( political_campaign_string_limit_words( $political_campaign_excerpt, esc_attr(get_theme_mod('political_campaign_slider_excerpt_number','20')))); ?></p>                  
                  <?php
                    $political_campaign_button_text = get_theme_mod('political_campaign_slider_button_text','SEE MORE DETAIL');
                    $political_campaign_button_link = get_theme_mod('political_campaign_slider_button_link', '');
                    if (empty($political_campaign_button_link)) {
                      $political_campaign_button_link = get_permalink();
                    }
                    if ($political_campaign_button_text || !empty($political_campaign_button_link)) { ?>
                    <div class="slider-btn mt-3 mt-md-4 wow slideInRight delay-1000" data-wow-duration="2s">
                      <?php if( get_theme_mod('political_campaign_slider_button_text','SEE MORE DETAIL') != ''){ ?>
                        <a href="<?php echo esc_url($political_campaign_button_link); ?>" class="button redmor">
                        <?php echo esc_html($political_campaign_button_text); ?><i class="fas fa-angle-double-right me-2"></i>
                          <span class="screen-reader-text"><?php echo esc_html($political_campaign_button_text); ?></span>
                        </a>
                      <?php } ?>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <?php if(get_theme_mod('political_campaign_slider_arrow_hide_show', true)){?>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" id="prev" data-bs-slide="prev">
            <i class="<?php echo esc_attr(get_theme_mod('political_campaign_slider_prev_icon','fas fa-angle-left')); ?>"></i>
            <span class="screen-reader-text"><?php echo esc_html('Previous','political-campaign'); ?></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" id="next">
            <i class="<?php echo esc_attr(get_theme_mod('political_campaign_slider_next_icon','fas fa-angle-right')); ?>"></i>
            <span class="screen-reader-text"><?php echo esc_html('Next','political-campaign'); ?></span>
          </button>
        <?php }?>
      </div> 
      <?php } else if(get_theme_mod('political_campaign_slider_type', 'Advance slider') == 'Advance slider'){?>
          <?php echo do_shortcode(get_theme_mod('political_campaign_advance_slider_shortcode')); ?>
        <?php } ?>
    </section>
  <?php }?>

  <?php do_action( 'political_campaign_after_slider' ); ?>

  <?php if( get_theme_mod('political_campaign_Campaign_category') != ''){ ?>
    <section id="Campaign-princi-section" class="py-5 px-2 wow bounceInDown delay-1000" data-wow-duration="3s">
      <div class="container">
        <div class="Campaign-content text-center">
          <?php if( get_theme_mod('political_campaign_Campaign_small_title') != '' ){ ?>
            <strong class="mb-1"><?php echo esc_html(get_theme_mod('political_campaign_Campaign_small_title',''));?></strong>
          <?php }?>
          <?php if( get_theme_mod( 'political_campaign_Campaign_section_title') != '' ) { ?>
            <h2 class="mb-5"><?php echo esc_html(get_theme_mod('political_campaign_Campaign_section_title','') ); ?></h2>
          <?php }?>
        </div>
        <div class="Campaign-box-outer">
          <div class="owl-carousel">
            <?php
              $political_campaign_catdata=  get_theme_mod('political_campaign_Campaign_category');
              if($political_campaign_catdata){
            $page_query = new WP_Query(array( 'category_name' => esc_html($political_campaign_catdata ,'political-campaign'))); ?>         
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="principle-box">
                  <div class="principle-box-img">
                    <?php the_post_thumbnail(); ?>
                    <div class="principle-box-inner-img">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/principle.png" alt="" />
                    </div>
                  </div>
                  <div class="box-content">
                    <h3 class="mt-3 mt-md-0 mt-lg-0 mb-0 text-center "><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                  </div>
                </div>
              <?php endwhile;
              wp_reset_postdata();}
            ?>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'political_campaign_after_campaign_principle_section' ); ?>

  <div id="content-vw" class="entry-content py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>