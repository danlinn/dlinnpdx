<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $border_color = $border_radius = $layout_height = $title_font_size = $title_font_line_height = $grid_column =  $title_font_size = $padding_bottom = $extra_padding = $default_border = "";

    if($tt_atts['border_radius'] == 'enable' && $tt_atts['layout_style'] == 'default'){
        $border_radius = "border-radius: 5px; ";
    }
    
    if ($tt_atts['title_font_size']) {
        $title_font_size = "font-size:".$tt_atts['title_font_size'].";";
    }
    if ($tt_atts['title_font_line_height']) {
        $title_font_line_height = "line-height:".$tt_atts['title_font_line_height'].";";
    }

    if ($tt_atts['layout_height']) {
        $layout_height = "height:".$tt_atts['layout_height'].";";
    }
    
    if($tt_atts['padding_bottom']){
        $padding_bottom = "padding-bottom: ".$tt_atts['padding_bottom'].";";
    }

    $thumb_size = 'nominee-blog-thumbnail';
    if($tt_atts['grid_column'] == '12'){
        $grid_column = 'col-md-12';
        $thumb_size = 'nominee-latest-press';
        $title_font_size = "font-size: 25px; line-height: 35px";
    } else{
        $grid_column = 'col-md-'.$tt_atts['grid_column'].' col-sm-6';
        $thumb_size = 'nominee-latest-press';
    }
    
    if($tt_atts['default_border'] == 'enable') :
        $default_border = "border: 1px solid #e9edf0; ";
    endif;


    $post_exclude = explode(',', $tt_atts['exclude']);
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    $args = array(
        'post_type'     => 'post',
        'post_status'   => 'publish',
        'orderby'       => $tt_atts['orderby'],
        'order'         => $tt_atts['order'],
        'ignore_sticky_posts' => 1,
        'posts_per_page'    => $tt_atts['post_limit'],
        'post__not_in'      => $post_exclude,
        'offset'            => $tt_atts['offset'],
        'cat' => $tt_atts['taxonomies'],
        'paged'          => $paged
    ); 

    ob_start();

    ?>

    <div class="press-release-wrapper post-category-pagination <?php echo esc_attr($tt_atts['el_class'].' '.$tt_atts['text_color_option'].' '.$css_class); ?>" >
        <div class="row">

            <?php $query = new WP_Query( $args );

            if ( $query->have_posts() ) : 

                while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="<?php echo esc_attr($grid_column); ?>">
                        <article class="blog-wrap" style = "<?php echo esc_attr($border_color.' '.$default_border.' '.$border_radius.' '.$padding_bottom) ?>">
                            <?php 
                            if (has_post_thumbnail()) { ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($thumb_size, array('class' => 'img-fluid', 'alt' => get_the_title())); ?></a>
                                </div><!-- /.post-thumbnail --><?php 
                            }
                            ?>
                            <div class="blog-content <?php echo esc_attr($default_border ? 'has-border' : '') ?>" style = "<?php echo esc_attr($layout_height); ?>">

                                <header class="entry-header">
                                    <div class="entry-meta">
                                        <ul class="list-inline clearfix">
                                            <?php if ($tt_atts['post_date'] == 'show'): ?>
                                                <li><span class="the-time"><?php the_time('j M, Y') ?></span></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div><!-- /.entry-meta -->

                                    <h2 class="entry-title" style="<?php echo esc_attr($title_font_size.' '.$title_font_line_height); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </header><!-- /.entry-header -->

                                
                                <div class="entry-content">
                                    <p>
                                        <?php
                                            $tt_trim_word = $tt_atts['word_limit'];
                                            $content = get_the_content();
                                            echo wp_trim_words( $content, $tt_trim_word);
                                        ?>
                                    </p>
                                </div><!-- /.entry-content -->
                                
                                <?php if ($tt_atts['readmore_text']): ?> 
                                    <footer class="entry-footer">
                                        <a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html($tt_atts['readmore_text']); ?> <i class="fa fa-long-arrow-right"></i></a>
                                    </footer><!-- /.entry-footer -->
                                <?php endif; ?>
                            </div>
                        </article>
                    </div>
                <?php endwhile; 

                if ($query->max_num_pages > 1) { ?>
                    <div class="col-md-12">
                        <?php
                        $big = 999999999; // need an unlikely integer
                        $items = paginate_links(array(
                            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format'    => '?paged=%#%',
                            'prev_next' => true,
                            'current'   => max(1, $paged),
                            'total'     => $query->max_num_pages,
                            'type'      => 'array',
                            'prev_text' => esc_html__('Prev.', 'nominee'),
                            'next_text' => esc_html__('Next', 'nominee')
                        ));

                        $pagination = "<ul class=\"pagination\">\n\t<li>";
                        $pagination .= join("</li>\n\t<li>", $items);
                        $pagination .= "</li>\n</ul>\n";

                        echo wp_kses_post($pagination); ?>
                    </div>
                <?php }

                wp_reset_postdata();

            else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'nominee' ); ?></p>
            <?php endif; ?>

        </div> <!-- .row -->
    </div> <!-- .press-release-wrapper -->
<?php echo ob_get_clean();