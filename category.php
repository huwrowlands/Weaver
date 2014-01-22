<?php get_header(); ?>

	<section id="main-content" role="main">
	
		<h1><?php _e( 'Category Archive for:', 'weaver' ); ?> <?php single_cat_title( $prefix = '', $display = true );?></h1>
	
		<?php get_template_part('loop'); ?>
		
		<?php get_template_part('pagination'); ?>
	
	</section>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>