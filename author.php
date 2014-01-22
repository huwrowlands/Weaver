<?php get_header(); ?>

	<section id="main-content" role="main">

		<?php if (have_posts()): the_post(); ?>
		
		<article class="author-post">
				
			<h1><?php _e( 'Posts by: ', 'canvas' ); echo get_the_author(); ?></h1>
		
				<?php if ( get_the_author_meta('description')) : ?>				
				<?php echo get_avatar(get_the_author_meta('user_email')); ?>				
					<h2><?php _e( 'About ', 'canvas' ); echo get_the_author() ; ?></h2>				
					<p><?php the_author_meta('description'); ?></p>
				
				<?php endif; ?>
				
		</article>
			
			<?php rewind_posts(); while (have_posts()) : the_post(); ?>		
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<?php if ( has_post_thumbnail()) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php sprintf( __( 'Permanent Link to %s', 'canvas' ), the_title_attribute( 'echo=0' ) ); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				<?php endif; ?>	
				
				<h2 class="post-title">
					<a href="<?php the_permalink(); ?>" title="<?php sprintf( __('Permanent Link to %s', 'canvas' ), the_title_attribute( 'echo=0' ) ); ?><?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
				
				<aside class="post-meta">
					<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
					<span class="author"><?php _e( 'Published by', 'canvas' ); ?> <?php the_author_posts_link(); ?></span>
					<span class="comments"><?php comments_popup_link( __( 'Leave a comment', 'canvas' ), __( '1 Comment', 'canvas' ), __( '% Comments', 'canvas' )); ?></span>			
				</aside>
								
				<?php the_excerpt(); ?>							
			
			</article>
		
		<?php endwhile; else: ?>

			<article>
				<h2 class="post-title"><?php _e( 'Sorry, nothing found.', 'canvas' ); ?></h2>
			</article>		

		<?php endif; ?>
		
		<?php get_template_part('pagination'); ?>
		
	</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>