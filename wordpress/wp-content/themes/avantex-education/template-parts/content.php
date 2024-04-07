<?php
/**
 * Posts Contents Post Lists.
 *
 * @package avantex-education
 */

?>
<div class="blog-grid col-xl-4 col-lg-4">
	<article class="post">
			<figure class="post-thumbnail" style="min-height:374px;">
				<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'avantex-thumb' ); ?></a>
				<?php } ?>
			</figure>
		<div class="blog-head">
			<div class="news-date">
				<?php
				$current_year = gmdate( 'Y' );
				$post_year    = get_the_date( 'Y' );

				if ( $post_year !== $current_year ) {
					$date_format = 'F j, Y';
				} else {
					$date_format = 'F j';
				}
				?>
				<span><?php echo get_the_date( $date_format ); ?></span>
			</div>
			<div class="entry-meta">
			<?php $avantex_author_name = get_the_author_meta( 'display_name' ); ?>
			<span class="byline"> by <span class="author vcard"><a class="url fn n" href="#"><?php echo esc_html( $avantex_author_name ); ?></a></span></span>
			</div>
			<header class="entry-header">
				<?php $post_title_trimmed = wp_trim_words( get_the_title(), 5, '...' ); ?>
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo esc_html( $post_title_trimmed ); ?></a></h3>
			</header>
		</div>

		<div class="full-content" style="min-height:300px;margin-left: 40px !important,;padding: 30px 36px 10px !important;">
			<div class="entry-content">
				<?php
				// For Exerpt size limit.
				$avantex_post_excerpt = get_the_excerpt();

				$avantex_post_excerpt  = substr( $avantex_post_excerpt, 0, 160 );
				$avantex_exerpt_result = substr( $avantex_post_excerpt, 0, strrpos( $avantex_post_excerpt, ' ' ) );
				?>
				<p><?php echo esc_html( $avantex_exerpt_result ); ?></p>
				<p><a href="<?php echo esc_url( the_permalink() ); ?>" class="more-link"><?php echo esc_html__( 'READ MORE', 'avantex-education' ); ?></a></p>
			</div>
		</div>
	</article>
</div>
<?php

