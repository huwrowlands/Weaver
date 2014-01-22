<?php get_header(); ?>
	
	<!-- section -->
	<section id="main-content" role="main">
	
		<h1><?php _e( 'Tag Archive: ', 'canvas' ); echo single_tag_title('', false); ?></h1>
	
		<?php get_template_part('loop'); ?>
		
		<?php get_template_part('pagination'); ?>
	
	</section>
	<!-- /section -->
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>