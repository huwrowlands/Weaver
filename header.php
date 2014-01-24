<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		
		<link href="<?php echo get_template_directory_uri(); ?>/library/img/icons/favicon.ico" rel="shortcut icon">
		
		<?php wp_head(); ?>	
		<script>
    conditionizr.config({
      assets: '<?php echo get_template_directory_uri(); ?>/library/assets/conditionizr',
      tests: {
        'chrome': ['style', 'script', 'class'],
        'chromium': ['style', 'script', 'class'],
        'firefox': ['style', 'script', 'class'],
        'ie6': ['style', 'script', 'class'],
        'ie7': ['style', 'script', 'class'],
        'ie8': ['style', 'script', 'class'],
        'ie9': ['style', 'script', 'class'],
        'ie10': ['style', 'script', 'class'],
        'ie10touch': ['style', 'script', 'class'],
        'ie11': ['style', 'script', 'class'],
        'ios': ['style', 'script', 'class'],
        'linux': ['style', 'script', 'class'],
        'mac': ['style', 'script', 'class'],
        'opera': ['style', 'script', 'class'],
        'retina': ['style', 'script', 'class'],
        'safari': ['style', 'script', 'class'],
        'touch': ['style', 'script', 'class'],
        'windows': ['style', 'script', 'class'],
        'winPhone7': ['style', 'script', 'class'],
        'winPhone75': ['style', 'script', 'class'],
        'winPhone8': ['style', 'script', 'class']
      }
    });
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
				<?php weaver_nav(); ?>
			</nav>
			
		</header>