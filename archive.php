<?php get_header(); ?>

	<section id="main-content" role="main">
	
		<h1><?php _e( 'Archives', 'canvas' ); ?></h1>
		
			<h2>Search Archives:</h2>
			<?php get_template_part('searchform'); ?>
	
		<?php get_template_part('loop'); ?>
		
		<?php get_template_part('pagination'); ?>
	
	</section>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>