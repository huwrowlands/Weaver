<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		
		<link href="<?php echo get_template_directory_uri(); ?>/library/img/icons/favicon.ico" rel="shortcut icon">
		
		<?php wp_head(); ?>	
		<script>
		!function(){
			// configure legacy, retina, touch requirements @ conditionizr.com
			conditionizr()
		}()
		</script>
	</head>
	
	<body <?php body_class(); ?>>
	
	<div class="units-container">
	
		<header id="masthead" role="banner">
		
		<h1 class="site-title">
				<a href="<?php echo home_url(); ?>">
					<?php bloginfo('name'); ?>
				</a>	
		</h1>
		
		<h2 class="tagline">
			<?php bloginfo('description'); ?>
		</h2>		

		<?php if ( get_header_image() ) : ?>
		<div class="custom-header">
			<img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo('name'); ?>" />
		</div>
		<?php endif; ?>	
			
			<nav id="main-navigation" class="nav" role="navigation">
				<?php canvas_nav(); ?>
			</nav>
			
		</header>