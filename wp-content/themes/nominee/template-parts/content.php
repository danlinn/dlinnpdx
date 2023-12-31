<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<?php $page_template = get_post_meta(get_queried_object_id(), '_wp_page_template', true); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>
	        <div class="post-thumbnail">
	        	<?php 
	        		do_action( 'nominee_before_post_thumbnail');

	        		if ($page_template == 'page-templates/blog-grid.php' || $page_template == 'page-templates/blog-grid-left-sidebar.php' || $page_template == 'page-templates/blog-grid-right-sidebar.php') :
	        			the_post_thumbnail('nominee-grid-blog-thumbnail', array('alt' => get_the_title(), 'class' => 'img-responsive'));
					else :
						the_post_thumbnail('nominee-blog-thumbnail', array('alt' => get_the_title(), 'class' => 'img-responsive'));
	        		endif; ?>
					
					<?php if (nominee_option('blog-thumbnail-overlay', false, true)): ?>
						<div class="thumb-overlay">
							<a href="<?php the_permalink(); ?>" ><i class="fa fa-link"></i></a>
						</div>
					<?php endif; ?>
					
	            <?php do_action( 'nominee_after_post_thumbnail'); ?>

	        </div><!-- .post-thumbnail -->
		<?php endif; ?>

		<?php
			if ( is_single() ) :
				the_title( '<h2 class="entry-title">', '</h2>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>

		<div class="entry-meta">
			<?php if ($page_template == 'page-templates/blog-grid.php' || $page_template == 'page-templates/blog-grid-left-sidebar.php' || $page_template == 'page-templates/blog-grid-right-sidebar.php') :
				nominee_grid_posted_on();
			else :
				nominee_posted_on();
			endif; ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
			if (is_single() || !has_excerpt()) :
				the_content( '<span class="readmore">' . esc_html__( 'Read More', 'nominee' ) . '</span>' );
			else :
				the_excerpt();
			endif;

			wp_link_pages(array(
	            'before'      => '<div class="page-pagination"><span class="page-links-title">' . esc_html__('Pages:', 'nominee') . '</span>',
	            'after'       => '</div>',
	            'link_before' => '<span>',
	            'link_after'  => '</span>',
	        ));
		?>
    </div><!-- .entry-content -->

	<?php if (is_single()): ?>

		<footer class="entry-footer">
	    	<div class="post-tags">
		    	<?php $tags_list = get_the_tag_list('', esc_html__(', ', 'nominee'));
		            if ($tags_list) : ?>
		                <span class="tags-links">
		                	<i class="fa fa-tags"></i><?php printf(esc_html__('%1$s', 'nominee'), $tags_list); ?>
		                </span>
		        	<?php endif; 
		        ?>
		    </div> <!-- .post-tags -->

		    <?php get_template_part( 'template-parts/post', 'share'); ?>
		</footer>
		
		<?php
			if (get_the_author_meta( 'description' )) :
				get_template_part( 'author-bio' ); 
			endif;
		?>
		
	<?php endif; ?>
</article><!-- #post-## -->