<div class="news-ticker-wrapper">
	<?php if (nominee_option('prefix-title')): ?>
		<span><i class="fa fa-rss"></i> <?php echo esc_html(nominee_option('prefix-title', false, 'Press:')); ?> </span>
	<?php endif; ?>
    
    <ul class="news-ticker">
    	<?php 
    	$args  = array(
			'post_type'     => 'post',
			'post_status'   => 'publish',
			'post__not_in'	=> get_option( 'sticky_posts' )
		);


    	if (nominee_option('post-source') == 'selected-post') {
    		$args = wp_parse_args(
	    		array(
	    			'post__in' => nominee_option('post-lists'),
	    		)
	    	, $args );
    	}

    	if (nominee_option('post-source') == 'latest-post' || nominee_option('post-source') == 'category-post') {
    		$args = wp_parse_args(
	    		array(
	    			'posts_per_page' => nominee_option('news-feed-limit', false, 5),
	    		)
	    	, $args );
    	}

    	if (nominee_option('post-source') == 'category-post') {
    		$args = wp_parse_args(
	    		array(
	    			'cat' => nominee_option('category-lists')
	    		)
	    	, $args );
    	}

		$query = new WP_Query( $args ); ?>

		<?php if ( $query->have_posts() ) : ?>

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php $title_limit = nominee_option('news-feed-title-limit', false, true); ?>

				<li><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $title_limit); ?></a></li>

			<?php endwhile; ?>

		<?php wp_reset_postdata();

		else : ?>
			<p><?php esc_html_e( 'Post not found !', 'nominee' ); ?></p>
		<?php endif; ?>
    </ul>
</div>