<?php get_header(); ?>

	<section id="main-content" role="main">
	
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<h1 class="page-title"><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
				
				<?php comments_template( '', true ); // Remove if you don't want page comments ?>
			
			</article>
			
			<?php endwhile; else: ?>
			
			<article>
				<h2 class="page-title"><?php _e( 'Sorry, nothing found.', 'weaver' ); ?></h2>
			</article>	
		
		<?php endif; ?>
		
			<div class="inner-pagination">					
				<?php wp_link_pages(array( 'before' => '<ul class="page-numbers">', 'after' => '</ul>', 'link_before' => '<span>', 'link_after' => '</span>', 'next_or_number' => 'next_and_number', 'separator' => '', 'nextpagelink' => __( 'Next &raquo;', 'weaver' ), 'previouspagelink' => __( '&laquo; Previous', 'weaver' ), 'pagelink' => '%')); ?>
			</div>
			
	</section>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>