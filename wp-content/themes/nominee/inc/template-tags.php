<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Single blog post navigation
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('nominee_post_navigation')) :

    function nominee_post_navigation() {

        $prev_post = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next_post = get_adjacent_post(false, '', false);

        if (!$next_post && !$prev_post) :
            return;
        endif;
        ?>
        <?php do_action('nominee_before_single_post_navigation' );?>
        <nav class="single-post-navigation clearfix" role="navigation">
            <div class="row">
                <?php if ($prev_post): ?>
                    <!-- Previous Post -->
                    <div class="col-xs-6">
                        <div class="previous-post-link">
                            <?php previous_post_link('<div class="previous">%link</div>', '<i class="fa fa-angle-left"></i>' . esc_html__( 'Prev', 'nominee' )); ?>
                        </div>
                    </div>
                <?php endif ?>
                
                <?php if ($next_post): ?>
                    <!-- Next Post -->
                    <div class="col-xs-6 pull-right">
                        <div class="next-post-link">
                            <?php next_post_link('<div class="next">%link</div>', esc_html__( 'Next', 'nominee' ) . '<i class="fa fa-angle-right"></i>'); ?>
                        </div>
                    </div>
                <?php endif ?>
            </div> <!-- .row -->
        </nav> <!-- .single-post-navigation -->
        <?php do_action('nominee_after_single_post_navigation' );?>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Blog posts navigation
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('nominee_posts_navigation')) :

    function nominee_posts_navigation() { ?>
        <div class="blog-navigation clearfix">
            <?php if (get_next_posts_link()) : ?>
                <div class="col-xs-6 pull-left">
                    <div class="previous-page">
                        <?php next_posts_link('<i class="fa fa-long-arrow-left"></i>' . esc_html__('Older Posts', 'nominee')); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (get_previous_posts_link()) : ?>
                <div class="col-xs-6 pull-right">
                    <div class="next-page">
                        <?php previous_posts_link(esc_html__('Newer Posts', 'nominee') . '<i class="fa fa-long-arrow-right"></i>'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Blog posts pagination for default blog layout
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('nominee_posts_pagination')) :
    function nominee_posts_pagination() { 

        global $wp_query;

        $paged = get_query_var('paged');
        
        if ($wp_query->max_num_pages > 1) {
            $big = 999999999; // need an unlikely integer
            $items = paginate_links(array(
                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'    => '?paged=%#%',
                'prev_next' => true,
                'current'   => max(1, $paged),
                'total'     => $wp_query->max_num_pages,
                'type'      => 'array',
                'prev_text' => esc_html__('Prev.', 'nominee'),
                'next_text' => esc_html__('Next', 'nominee')
            ));

            $pagination = "<ul class=\"pagination\">\n\t<li>";
            $pagination .= join("</li>\n\t<li>", $items);
            $pagination .= "</li>\n</ul>\n";

            echo wp_kses_post($pagination);
        } 
        return;
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Blog list style posts pagination
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if ( ! function_exists( 'nominee_list_posts_pagination' ) ):

    function nominee_list_posts_pagination() { ?>
        <?php

        global $query;

        if(is_front_page()) {
            $paged = get_query_var('page');
        } else {
            $paged = get_query_var('paged');
        }

        if ($query->max_num_pages > 1) :
            $big   = 999999999; // need an unlikely integer
            $items = paginate_links(array(
                'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'    => '?paged=%#%',
                'prev_next' => TRUE,
                'current'   => max( 1, $paged ),
                'total'     => $query->max_num_pages,
                'type'      => 'array',
                'prev_text' => esc_html__( 'Prev.', 'nominee' ),
                'next_text' => esc_html__( 'Next', 'nominee' )
            ) );

            $pagination = '<ul class="pagination"><li>';
            $pagination .= join( "</li><li>", (array) $items );
            $pagination .= "</li></ul>";

            echo wp_kses_post($pagination);
            
        endif;

        return;
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Prints HTML with meta information for the current post-date/time, author & others.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('nominee_posted_on')) :
    function nominee_posted_on() { ?>

        <ul class="list-inline">
            <?php if ( nominee_option( 'tt-post-meta', 'post-date', TRUE ) ) : ?>
                <li>
                    <i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_time( get_option( 'date_format' ) ); ?></a>
                </li>
            <?php endif; ?>

            <?php if ( nominee_option( 'tt-post-meta', 'post-author', TRUE ) ) : ?>
                <li>
                    <span class="author vcard">
                        <i class="fa fa-user"></i><?php printf('<a class="url fn n" href="%1$s">%2$s</a>',
                            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                            esc_html(get_the_author())
                        ) ?>
                    </span>
                </li>
            <?php endif; ?>
            
            <?php if ( nominee_option( 'tt-post-meta', 'post-category', TRUE ) ) : ?>
                <li>
                    <span class="posted-in">
                        <i class="fa fa-folder-open"></i><?php echo get_the_category_list(esc_html_x(', ', 'Used between list items, there is a space after the comma.', 'nominee'));
                        ?>
                    </span>
                </li>
            <?php endif; ?>
            
            <?php if ( nominee_option( 'tt-post-meta', 'post-comment', TRUE ) ) : ?>
                <li>
                    <span class="post-comments-number">
                        <i class="fa fa-comments"></i><?php
                        comments_popup_link(
                            esc_html__('0', 'nominee'),
                            esc_html__('1', 'nominee'),
                            esc_html__('%', 'nominee'), '',
                            esc_html__('Comments are Closed', 'nominee')
                        ); ?>
                    </span>
                </li>
            <?php endif; ?>
            
            <?php if (function_exists('zilla_likes')) : 
                if ( nominee_option( 'tt-post-meta', 'post-like', TRUE ) ) : ?>
                    <li>
                        <span class="likes">
                            <?php zilla_likes(); ?>
                        </span>
                    </li>
                <?php endif;
            endif; ?>

            <?php echo edit_post_link(esc_html__('Edit Post', 'nominee'), '<li class="edit-link">', '</li>') ?>
        </ul>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Post meta for grid style post
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('nominee_grid_posted_on')) :
    function nominee_grid_posted_on() { ?>

        <ul class="list-inline">

            <?php if ( nominee_option( 'tt-post-meta', 'post-date', TRUE ) ) : ?>
                <li>
                    <i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_time( get_option( 'date_format' ) ); ?></a>
                </li>
            <?php endif; ?>

            <?php if ( nominee_option( 'tt-post-meta', 'post-author', TRUE ) ) : ?>
                <li>
                    <span class="author vcard">
                        <i class="fa fa-user"></i><?php printf('<a class="url fn n" href="%1$s">%2$s</a>',
                            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                            esc_html(get_the_author())
                        ) ?>
                    </span>
                </li>
            <?php endif; ?>

            <?php echo edit_post_link(esc_html__('Edit Post', 'nominee'), '<li class="edit-link">', '</li>') ?>
        </ul>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Returns true if a blog has more than 1 category.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('nominee_categorized_blog')) :
    
    function nominee_categorized_blog() {
        if (false === ($all_the_cool_cats = get_transient('nominee_categories'))) :
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories(array(
                'fields'     => 'ids',
                'hide_empty' => 1,

                // We only need to know if there is more than one category.
                'number'     => 2,
            ));

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count($all_the_cool_cats);

            set_transient('nominee_categories', $all_the_cool_cats);
        endif;

        if ($all_the_cool_cats > 1) :
            // This blog has more than 1 category so nominee_categorized_blog should return true.
            return true;
        else :
            // This blog has only 1 category so nominee_categorized_blog should return false.
            return false;
        endif;
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Flush out the transients used in nominee_categorized_blog.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('nominee_category_transient_flusher')) :

    function nominee_category_transient_flusher() {
        // Like, beat it. Dig?
        delete_transient('nominee_categories');
    }

    add_action('edit_category', 'nominee_category_transient_flusher');
    add_action('save_post', 'nominee_category_transient_flusher');

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Post Password form
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('nominee_post_password_form')) :

    function nominee_post_password_form() {
        global $post;
        $tt_label_text = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);

        return '
        <div class="row">
            <form class="clearfix" action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
                <div class="col-md-12">
                    <label for="' . $tt_label_text . '">' . esc_html__("This post is password protected. To view it please enter your password below:", 'nominee') . '</label>
                    <div class="input-group">
                        <input class="form-control" name="post_password" placeholder="' . esc_attr__("Password:", 'nominee') . '" id="' . $tt_label_text . '" type="password" /><div class="input-group-btn"><button class="btn btn-primary" type="submit" name="Submit">' . esc_attr__("Submit", 'nominee') . '</button></div>
                    </div>
                </div>
            </form>
        </div>';
    }

    add_filter('the_password_form', 'nominee_post_password_form');
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Breadcrumb
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('nominee_breadcrumbs')) :

    function nominee_breadcrumbs(){ ?>
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo esc_url(site_url()); ?>"><?php esc_html_e('Home', 'nominee') ?></a>
            </li>
            <li class="active">
                <?php if( is_tag() ) { ?>
                <?php esc_html_e('Posts Tagged ', 'nominee') ?><span class="raquo">/</span><?php single_tag_title(); echo('/'); ?>
                <?php } elseif (is_day()) { ?>
                <?php esc_html_e('Posts made in', 'nominee') ?> <?php echo get_the_time('F jS, Y'); ?>
                <?php } elseif (is_month()) { ?>
                <?php esc_html_e('Posts made in', 'nominee') ?> <?php echo get_the_time('F, Y'); ?>
                <?php } elseif (is_year()) { ?>
                <?php esc_html_e('Posts made in', 'nominee') ?> <?php echo get_the_time('Y'); ?>
                <?php } elseif (is_search()) { ?>
                <?php esc_html_e('Search results for', 'nominee') ?> <?php the_search_query() ?>
                <?php } elseif (is_404()) { ?>
                <?php esc_html_e('404', 'nominee') ?>
                <?php } elseif (is_single()) { ?>
                <?php $category = get_the_category();
                if ( $category ) { 
                    $catlink = get_category_link( $category[0]->cat_ID );
                    echo ('<a href="'.esc_url($catlink).'">'.esc_html($category[0]->cat_name).'</a> '.'<span class="raquo"> /</span> ');
                }
                echo get_the_title(); ?>
                <?php } elseif (is_category()) { ?>
                <?php single_cat_title(); ?>
                <?php } elseif (is_tax()) { ?>
                <?php 
                $tt_taxonomy_links = array();
                $tt_term = get_queried_object();
                $tt_term_parent_id = $tt_term->parent;
                $tt_term_taxonomy = $tt_term->taxonomy;

                while ( $tt_term_parent_id ) {
                    $tt_current_term = get_term( $tt_term_parent_id, $tt_term_taxonomy );
                    $tt_taxonomy_links[] = '<a href="' . esc_url( get_term_link( $tt_current_term, $tt_term_taxonomy ) ) . '" title="' . esc_attr( $tt_current_term->name ) . '">' . esc_html( $tt_current_term->name ) . '</a>';
                    $tt_term_parent_id = $tt_current_term->parent;
                }

                if ( !empty( $tt_taxonomy_links ) ) echo implode( ' <span class="raquo">/</span> ', array_reverse( $tt_taxonomy_links ) ) . ' <span class="raquo">/</span> ';

                echo esc_html( $tt_term->name ); 
                } elseif (is_author()) { 
                    global $wp_query;
                    $curauth = $wp_query->get_queried_object();

                    esc_html_e('Posts by: ', 'nominee'); echo ' ',$curauth->nickname; 
                } elseif (is_page()) { 
                    echo get_the_title(); 
                } elseif (is_home()) { 
                    esc_html_e('Blog', 'nominee');
                } elseif (class_exists('WooCommerce') and (is_shop())){
                    esc_html_e('Shop', 'nominee');
                } elseif(is_post_type_archive()){
                    echo post_type_archive_title( '', FALSE );
                }?>
            </li>
        </ul>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page header section background title
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('nominee_page_header_section_title')) :
    function nominee_page_header_section_title() {
        $tt_query = get_queried_object();

        if (is_archive()) :
            if (is_day()) :
                $archive_title = get_the_time('d F, Y');
                $page_header_title = sprintf(esc_html__('Archive of: %s', 'nominee'), $archive_title);
            elseif (is_month()) :
                $archive_title = get_the_time('F Y');
                $page_header_title = sprintf(esc_html__('Archive of: %s', 'nominee'), $archive_title);
            elseif (is_year()) :
                $archive_title = get_the_time('Y');
                $page_header_title = sprintf(esc_html__('Archive of: %s', 'nominee'), $archive_title);
            endif;
        endif;

        if (is_404()) :
            $page_header_title = esc_html__('404 Not Found', 'nominee');
        endif;

        if (is_search()) :
            $page_header_title = sprintf(esc_html__('Search result for: "%s"', 'nominee'), get_search_query());
        endif;

        if (is_category()) :
            $page_header_title = sprintf(esc_html__('Category: %s', 'nominee'), $tt_query->name);
        endif;

        if (is_tag()) :
            $page_header_title = sprintf(esc_html__('Tag: %s', 'nominee'), $tt_query->name);
        endif;

        if (is_author()) :
            $page_header_title = sprintf(esc_html__('Posts of: %s', 'nominee'), $tt_query->display_name);
        endif;

        if (is_tax()) {
            $page_header_title = sprintf(esc_html__('%s', 'nominee'), $tt_query->name);
        }

        if (is_page()) :
            $page_header_title = $tt_query->post_title;
        endif;

        if (is_home() or is_single()) :
            $page_header_title = nominee_option('blog-title');
        endif;

        if (is_single() || is_singular()) :
            $page_header_title = get_the_title();
        endif;

        if ( is_post_type_archive() ) {
            $page_header_title = post_type_archive_title( '', FALSE );
        }

        if ( class_exists( 'WooCommerce' ) ) {
            if ( is_post_type_archive( 'product' ) ) {
                $page_header_title = post_type_archive_title( '', false);
            }

            if ( is_product_category() ) {
                $page_header_title = sprintf( esc_html__( '%s', 'nominee' ), $tt_query->name );
            }

            if ( is_product_tag() ) {
                $page_header_title = sprintf( esc_html__( '%s', 'nominee' ), $tt_query->name );
            }
        }

        $page_header_title = apply_filters('nominee_page_header_section_title', $page_header_title, $page_header_title);

        if (empty($page_header_title)) :
            $page_header_title = get_bloginfo('name');
        endif;

        return $page_header_title;
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page header section background image
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('nominee_page_header_background')) :

    function nominee_page_header_background() {
        $tt_query = get_queried_object();

        $page_header_image = false;

        if (is_archive()) :
            $page_header_image = nominee_option('archive-header-image', 'url');
        endif;

        if (is_404()) :
            $page_header_image = nominee_option('header-404-image', 'url');
        endif;

        if (is_search()) :
            $page_header_image = nominee_option('search-header-image', 'url');
        endif;

        if (is_category()) :
            $page_header_image = nominee_option('category-header-image', 'url');
        endif;

        if (is_tag()) :
            $page_header_image = nominee_option('tag-header-image', 'url');
        endif;

        if (is_author()) :
            $page_header_image = nominee_option('author-header-image', 'url');
        endif;


        if (is_page()) :
            
            $page_header_image = nominee_option('page-header-image', 'url');
            
            if (function_exists('rwmb_meta')) :
                $single_image = rwmb_meta('nominee_page_header_image', 'type=image_advanced');
            endif;

            if (!empty($single_image)) {
                foreach ($single_image as $image) {
                    $page_header_image = $image['full_url'];
                }
            }

        endif;


        if (is_single()) :

            $page_header_image = nominee_option('blog-header-image', 'url');
            
            if (function_exists('rwmb_meta')) :
                $single_image = rwmb_meta('nominee_page_header_image', 'type=image_advanced');
            endif;

            if (!empty($single_image)) {
                foreach ($single_image as $image) {
                    $page_header_image = $image['full_url'];
                }
            }

        endif;

        if (empty ($single_image)) :
            if (is_singular('tt-reformation')) :
                $page_header_image = nominee_option('reformation-header-image', 'url');
            endif;
            if (is_singular('product')) :
                $page_header_image = nominee_option('product-header-image', 'url');
            endif;
        endif;

        if ( class_exists( 'WooCommerce' ) ) {
            if ( is_product_category() || is_product_tag() || is_post_type_archive( 'product' )) {
                $page_header_image = nominee_option('product-header-image', 'url');
            }
        }

        if (is_home()) :
            $page_header_image = nominee_option('blog-header-image', 'url');
        endif;

        if (!$page_header_image) :
            $page_header_image = nominee_option('blog-header-image', 'url');
        endif;

        $image_src = apply_filters('nominee_page_header_background', $page_header_image, $page_header_image);

        return $image_src;
    }
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Comments list
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists("nominee_comments_list")) :

    function nominee_comments_list($comment, $args, $depth) {
        $GLOBALS[ 'comment' ] = $comment;
        switch ($comment->comment_type) {
            // Display trackbacks differently than normal comments.
            case 'pingback' :
            case 'trackback' :
                ?>

                <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <p><?php esc_html_e('Pingback:', 'nominee'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(esc_html__('(Edit)', 'nominee'), '<span class="edit-link">', '</span>'); ?></p>

                <?php
                break;

            default :
                // Proceed with normal comments.
                global $post;
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>" class="comment media">
                    <div class="comment-author clearfix">
                        <?php
                            $get_avatar = get_avatar($comment, apply_filters('nominee_post_comment_avatar_size', 48));
                            //Comment author avatar
                        ?>
                        <img class="avatar" src="<?php echo nominee_get_avatar_url($get_avatar); ?>" alt="<?php echo get_comment_author(); ?>">

                        <div class="comment-meta media-heading">
                            <h4>
                                <span class="author-name">
                                    <?php esc_html_e('By', 'nominee'); ?>
                                    <strong><?php echo get_comment_author(); ?></strong>
                                </span>
                                <time datetime="<?php echo get_comment_date(); ?>">
                                    <?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?>
                                    <?php edit_comment_link(esc_html__('Edit', 'nominee'), '<small class="edit-link">', '</small>'); //edit link
                                    ?>
                                </time>
                            </h4>

                            <span class="reply pull-right">
                                <?php comment_reply_link(array_merge($args, array(
                                    'reply_text' => esc_html__('Reply', 'nominee'),
                                    'depth'      => $depth,
                                    'max_depth'  => $args[ 'max_depth' ]
                                ))); ?>
                            </span><!-- .reply -->
                        </div> <!-- .comment-meta -->
                    </div> <!-- .comment-author -->

                    <div class="media-body">
                        <?php if ('0' == $comment->comment_approved) { ?>
                            <div class="alert alert-info">
                                <?php esc_html_e('Your comment is awaiting moderation.', 'nominee'); ?>
                            </div>
                        <?php } ?>

                        <div class="comment-content">
                            <?php comment_text(); //Comment text
                            ?>
                        </div>
                        <!-- .comment-content -->
                    </div>
                    <!-- .media-body -->
                </div> <!-- #comment-## -->
                <?php
                break;
        } // end comment_type check

    }

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Fetching Avatar URL
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('nominee_get_avatar_url')) :

    function nominee_get_avatar_url($get_avatar) {
        preg_match("/src='(.*?)'/i", $get_avatar, $matches);

        return $matches[ 1 ];
    }

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Search form
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('nominee_blog_search_form')) :

    function nominee_blog_search_form($form) {
        $form = '<form role="search" method="get" id="searchform" class="search-form" action="' . esc_url(home_url('/')) . '">
        <input type="text" class="form-control" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search', 'nominee').'"/>
        <button type="submit"><i class="fa fa-search"></i></button>
        <input type="hidden" value="post" name="post_type" id="post_type" />
    </form>';

        return $form;
    }

    add_filter('get_search_form', 'nominee_blog_search_form');

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Associative array to html attribute conversion
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('nominee_array2attr')) :
  
    function nominee_array2attr($attr, $filter = '') {
        $attr = wp_parse_args($attr, array());
        if ($filter) {
            $attr = apply_filters($filter, $attr);
        }
        $html = '';
        foreach ($attr as $name => $value) {
            $html .= " $name=" . '"' . $value . '"';
        }

        return $html;
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Hex to RGB color
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('nominee_hex2rgb')) :
    
    function nominee_hex2rgb($hex) {
       $hex = str_replace("#", "", $hex);

       if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
       } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
       }
       $rgb = array($r, $g, $b);

       return $rgb[0].','.$rgb[1].','.$rgb[2];
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// color modify for darken/lighten
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('nominee_modify_color')) :
    
    function nominee_modify_color( $hex, $steps ) {
        $steps = max( -255, min( 255, $steps ) );
        // Format the hex color string
        $hex = str_replace( '#', '', $hex );
        if ( strlen( $hex ) == 3 ) {
            $hex = str_repeat( substr( $hex,0,1 ), 2 ).str_repeat( substr( $hex,1,1 ), 2 ).str_repeat( substr( $hex,2,1 ), 2 );
        }
        // Get decimal values
        $r = hexdec( substr( $hex,0,2 ) );
        $g = hexdec( substr( $hex,2,2 ) );
        $b = hexdec( substr( $hex,4,2 ) );
        // Adjust number of steps and keep it inside 0 to 255
        $r = max( 0,min( 255,$r + $steps ) );
        $g = max( 0,min( 255,$g + $steps ) );  
        $b = max( 0,min( 255,$b + $steps ) );
        $r_hex = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
        $g_hex = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
        $b_hex = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );
        return '#'.$r_hex.$g_hex.$b_hex;
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Nominee event date modify
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('nominee_event_date')) :
    
    function nominee_event_date(){
        if (function_exists('rwmb_meta')) :
            $tt_event_date =  rwmb_meta('nominee_event_date');
            echo date_i18n('d M Y', strtotime( $tt_event_date ));
        endif;
    }

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Shortens a number and attaches K, M, B, etc. accordingly
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('nominee_number_shorten')) {
    function nominee_number_shorten($number, $precision = 3, $divisors = null) {
        // Setup default $divisors if not provided
        if (!isset($divisors)) {
            $divisors = array(
                pow(1000, 0) => '', // 1000^0 == 1
                pow(1000, 1) => esc_html__('K', 'nominee'), // Thousand
                pow(1000, 2) => esc_html__('M', 'nominee'), // Million
                pow(1000, 3) => esc_html__('B', 'nominee'), // Billion
                pow(1000, 4) => esc_html__('T', 'nominee'), // Trillion
                pow(1000, 5) => esc_html__('Qa', 'nominee'), // Quadrillion
                pow(1000, 6) => esc_html__('Qi', 'nominee') // Quintillion
            );
        }

        // Loop through each $divisor and find the
        // lowest amount that matches
        foreach ($divisors as $divisor => $shorthand) {
            if (abs($number) < ($divisor * 1000)) {
                // We found a match!
                break;
            }
        }

        // We found our match, or there were no matches.
        // Either way, use the last defined value for $divisor.
        return number_format($number / $divisor, $precision) . $shorthand;
    }
}