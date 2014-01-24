<?php

/*** Customisations such as Admin changes, Login Logo, Footer Text and Custom Dashboard Widgets etc...

1. Disable default Dashboard Widgets
2. Enable Custom Dashboard Widget/s
3. Custom Login CSS / URL
4. Enable/Disable Admin Bar WordPress Logo/Icon
5. Customise Admin Footer Text

***/


// 1. Disable default dashboard widgets
function disable_default_dashboard_widgets() {
	remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget

	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	//remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //

	// removing plugin dashboard boxes
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Plugin Widget

}

add_action('admin_menu', 'disable_default_dashboard_widgets');


// 2. Enable Custom Dashboard Widget/s
function custom_dashboard_widget() {
	echo '<p>Custom Dashboard Widget - Great for adding a custom message and PDF Guide</p>';
	echo '<p><a target="_blank" title="Website Guide" href="';
	echo get_template_directory_uri();
	echo '/assets/includes/guide.pdf" class="button">Download Guide</a></p>';
}
function add_custom_dashboard_widget() {
	wp_add_dashboard_widget('custom_dashboard_widget', 'Website Guide', 'custom_dashboard_widget');
}

add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');


// 3. calling your own login css so you can style it
function custom_login_css() {
	echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/assets/css/vendor/wordpress/login.css">';
}

// changing the logo link from wordpress.org to your site
function custom_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function custom_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action('login_head', 'custom_login_css');
add_filter('login_headerurl', 'custom_login_url');
add_filter('login_headertitle', 'custom_login_title');


// 4. Remove WordPress logo from Admin Bar. (Off by default)
/*
	add_action( 'wp_before_admin_bar_render', function() {
		global $wp_admin_bar;
			$wp_admin_bar->remove_menu('wp-logo');
	}, 7 );
*/

// 5. Customise Admin Footer Text
function custom_admin_footer() { ?>	
	<span id="footer-thankyou">Developed by <a title="#" href="#" target="_blank">YOUR NAME</a> &middot; &copy; <?php echo date('Y'); ?> Copyright <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>.</span>
	
<?php }

add_filter('admin_footer_text', 'custom_admin_footer');

?>