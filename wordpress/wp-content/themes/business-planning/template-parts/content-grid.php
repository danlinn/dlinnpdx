<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Business Planning
 */
$business_planning_categories = get_the_category();
if ($business_planning_categories) {
	$business_planning_category = $business_planning_categories[mt_rand(0, count($business_planning_categories) - 1)];
} else {
	$business_planning_category = '';
}
?>
<div class="col-lg-4 mb-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('business-planning-list-item'); ?>>
		<div class="grid-blog-item p-3">
			<?php if (has_post_thumbnail()) : ?>
				<div class="grid-img">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php endif; ?>
			<div class="grid-deatls pb-3">
				<?php the_title('<h2 class="entry-title grid-title pt-4"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
				<?php the_excerpt(); ?>
				<div class="entry-meta grid-meta">
					<?php
					if ('post' === get_post_type()) {
						business_planning_posted_by();
					} ?>
					<span class="grid-meta-date"><?php echo esc_html(get_the_date()); ?></span>
				</div>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>