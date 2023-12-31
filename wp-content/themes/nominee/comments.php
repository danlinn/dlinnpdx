<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-wrapper">
    <?php if ( have_comments() ) : ?>
        <h3 class="comments-title">
            <?php
                $comments_number = get_comments_number();
                if ( '1' === $comments_number ) {
                    /* translators: %s: post title */
                    printf( esc_html__( 'One Reply to &ldquo;%s&rdquo;', 'nominee' ), get_the_title() );
                } else {
                    /* translators: 1: number of comments, 2: post title */
                    printf(esc_html__('%1$s Replies to &ldquo;%2$s&rdquo;', 'nominee'), intval(number_format_i18n( $comments_number )), '<span>' . get_the_title() . '</span>' );
                }
            ?>
        </h3>
        <ul class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'li',
                    'short_ping'  => true,
                    'avatar_size' => 50,
                    'callback'    => 'nominee_comments_list'
                ));
            ?>
        </ul><!-- .comment-list -->
    <?php endif; // have_comments()

    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h3 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'nominee' ); ?></h3>
            <ul class="pager comment-navigation">
                <li class="previous"><?php previous_comments_link( '<i class="fas fa-angle-double-left"></i> ' . esc_html__( 'Older Comments', 'nominee' ) ); ?></li>
                <li class="next"><?php next_comments_link( esc_html__( 'Newer Comments', 'nominee' ) . '<i class="fas fa-angle-double-right"></i>' ); ?></li>
            </ul>
        </nav><!-- .comment-navigation -->
    <?php endif;  // Check for comment navigation   ?>

    <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <div class="alert alert-warning no-comments"><?php esc_html_e( 'Comments are closed.' , 'nominee' ); ?></div>
    <?php else :
        comment_form();
    endif; ?>
</div><!-- /#comments -->