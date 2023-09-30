<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $border_color = $border_radius = $layout_height = $grid_column =  $title_font_size = $padding_bottom = $extra_padding = $default_border = "";

    if($tt_atts['border_color'] && ($tt_atts['layout_style'] == 'list-style' || $tt_atts['layout_style'] == 'menu-style')){
        $border_color = "border-bottom: 1px solid ".$tt_atts['border_color']."; ";
    }
    if($tt_atts['border_radius'] == 'enable' && $tt_atts['layout_style'] == 'default'){
        $border_radius = "border-radius: 5px; ";
    }
    if($tt_atts['layout_style'] == 'default' && $tt_atts['grid_column'] != '12'){
        $layout_height = "height: 100%; ";
    }
    if($tt_atts['padding_bottom']){
        $padding_bottom = "padding-bottom: ".$tt_atts['padding_bottom'].";";
    }

    $thumb_size = 'nominee-blog-thumbnail';
    if($tt_atts['grid_column'] == '12'){
        $grid_column = 'col-md-12';
        if($tt_atts['layout_style'] == 'default'){
            $thumb_size = 'nominee-latest-press';
            $title_font_size = "font-size: 25px; line-height: 35px";
        }
        if($tt_atts['layout_style'] == 'featured'){
            $thumb_size = 'nominee-latest-featured-thumb';
        }
        if($tt_atts['layout_style'] == 'list-style'){
            $thumb_size = 'nominee-schedule-member';
        }
    } else{
        $grid_column = 'col-md-'.$tt_atts['grid_column'].' col-sm-6';
        if($tt_atts['layout_style'] == 'default'){
            $thumb_size = 'nominee-latest-press';
        }
    }
    if($tt_atts['layout_style'] == 'default'){
        if($tt_atts['default_border'] == 'enable') :
            $default_border = "border: 1px solid #e9edf0; ";
        endif;
    }


    $link     = vc_build_link($tt_atts['custom_link']);
    $a_href   = $link['url'];
    $a_title  = $link['title'];
    $a_target = trim($link['target']);

    $args = array(
        'post_type'     => 'post',
        'post_status'   => 'publish',
        'orderby'       => $tt_atts['orderby'],
        'order'         => $tt_atts['order'],
        'ignore_sticky_posts' => 1,
        'posts_per_page'    => $tt_atts['post_limit'],
    ); 

    if ($tt_atts['post_source'] == 'most-recent' || $tt_atts['post_source'] == 'by-category' || $tt_atts['post_source'] == 'by-tag' || $tt_atts['post_source'] == 'by-author') :
        $post_exclude = explode(',', $tt_atts['exclude']);
        $args = wp_parse_args(
            array(
                'post__not_in'      => $post_exclude,
                'offset'            => $tt_atts['offset'],
            )
        , $args );
    endif;

    if ($tt_atts['post_source'] == 'by-category' && $tt_atts['taxonomies']) :
        $args = wp_parse_args(
            array(
                'cat' => $tt_atts['taxonomies'],
            )
        , $args );
    endif;

    if ($tt_atts['post_source'] == 'by-tag' && $tt_atts['tags']) :
        $post_tag_array = explode(',', $tt_atts['tags']);

        $args = wp_parse_args(
            array(
                'tag_slug__in' => $post_tag_array,
            )
        , $args );
    endif;

    if ($tt_atts['post_source'] == 'by-author' && $tt_atts['authors']) :
        $args = wp_parse_args(
            array(
                'author' => $tt_atts['authors'],
            )
        , $args );
    endif;

    if ($tt_atts['post_source'] == 'by-id' && $tt_atts['post_id']) :
        $post_id_array = explode(',', $tt_atts['post_id']);
        $args = wp_parse_args(
            array(
                'post__in' => $post_id_array,
            )
        , $args );
    endif; 

    ob_start();

    ?>

    <div class="press-release-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$tt_atts['layout_style'].' '.$tt_atts['text_color_option'].' '.$css_class); ?>" >
        <div class="row">

            <?php $query = new WP_Query( $args ); ?>

            <?php if ( $query->have_posts() ) : ?>

                <!-- the loop -->
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                   <div class="<?php echo esc_attr($grid_column); ?>">

                        <article class="blog-wrap" style = "<?php echo esc_attr($border_color.' '.$default_border.' '.$border_radius.' '.$layout_height.' '.$padding_bottom) ?>">
                            <?php 
                            
                            if($tt_atts['layout_style'] != 'menu-style'){
                                if (has_post_thumbnail()) { ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($thumb_size, array('class' => 'img-fluid', 'alt' => get_the_title())); ?></a>
                                    </div><!-- /.post-thumbnail --><?php 
                                } 
                            }
                            
                            ?>
                            <div class="blog-content <?php echo esc_attr($default_border ? 'has-border' : '') ?>">

                                <header class="entry-header">


                                    <?php if ($tt_atts['layout_style'] != 'list-style' ): ?>
                                        
                                        <div class="entry-meta">
                                            <ul class="list-inline clearfix">
                                                <?php if ($tt_atts['post_date'] == 'show'): ?>
                                                    <li><span class="the-time"><?php the_time('j M, Y') ?></span></li>
                                                <?php endif; ?>

                                                <?php if (function_exists('zilla_likes') && $tt_atts['post_like'] == 'show') { ?>
                                                    <li>
                                                        <span class="likes">
                                                            <?php zilla_likes(); ?>
                                                        </span>
                                                    </li>
                                                <?php } ?>

                                            </ul>
                                        </div><!-- /.entry-meta -->

                                    <?php endif; ?>


                                    <h2 class="entry-title" style="<?php echo esc_attr($title_font_size) ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    
                                    <?php if ($tt_atts['layout_style'] == 'list-style'): ?>
                                        
                                        <div class="entry-meta">
                                            <ul class="list-inline clearfix">

                                                <?php if ($tt_atts['post_date'] == 'show'): ?>
                                                    <li><span class="the-time"><?php the_time('j M, Y') ?></span></li> /
                                                <?php endif; ?>

                                                <?php if (function_exists('zilla_likes') && $tt_atts['post_like'] == 'show') { ?>
                                                    <li>
                                                        <span class="likes">
                                                            <?php zilla_likes(); ?>
                                                        </span>
                                                    </li>
                                                <?php } ?>

                                            </ul>
                                        </div><!-- /.entry-meta -->

                                    <?php endif; ?>

                                </header><!-- /.entry-header -->

                                <?php if($tt_atts['layout_style'] != 'menu-style' && $tt_atts['layout_style'] != 'featured'){ ?>
                                    <div class="entry-content">
                                        <p>
                                            <?php
                                                $tt_trim_word = $tt_atts['word_limit'];
                                                $content = get_the_content();
                                                echo wp_trim_words( $content, $tt_trim_word);
                                            ?>
                                        </p>

                                        <?php if ($tt_atts['layout_style'] == 'list-style'): ?> 
                                            <a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html($tt_atts['readmore_text']); ?> </a>
                                        <?php endif; ?>

                                    </div><!-- /.entry-content -->
                                    
                                    <?php if ($tt_atts['readmore_text'] && $tt_atts['layout_style'] != 'list-style'): ?> 
                                        <footer class="entry-footer">
                                            <a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html($tt_atts['readmore_text']); ?> <i class="fa fa-long-arrow-right"></i></a>
                                        </footer><!-- /.entry-footer -->
                                    <?php endif; ?>
                                <?php } ?>
                            </div>
                            <?php if($tt_atts['layout_style'] == 'menu-style') : ?>
                                <a class="menu-style-link" href="<?php the_permalink(); ?>"></a>
                            <?php endif; ?>
                        </article>

                    </div>
                <?php endwhile; ?>
                <!-- end of the loop -->

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'nominee' ); ?></p>
            <?php endif; ?>

        </div> <!-- .row -->
        
        <?php if($tt_atts['button_text'] && $a_href) : ?>
            <footer class="entry-footer text-center pt-3 pb-3">
                <a href="<?php echo esc_url($a_href) ?>" class="readmore"><?php echo esc_html($tt_atts['button_text']); ?></a>
            </footer><!-- /.entry-footer -->
        <?php endif; ?>
        
    </div> <!-- .press-release-wrapper -->

<?php echo ob_get_clean();