<?php get_header() ?>

	<section id="main-content" role="main">

		<h1><?php echo sprintf( __( '%s Search Results for ', 'weaver' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
		
		<?php get_template_part('loop'); ?>
		
		<?php get_template_part('pagination'); ?>

	
	</section>

<?php get_sidebar(); ?>

<?php get_footer();?>