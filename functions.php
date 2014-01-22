<?php

/*
 *  Author: Huw Rowlands
 *  URL: inspiredworx.com
 *  Theme functions, custom functions etc
 *
 */	
	
	
// To Add:
// custom excerpt length and ending 
// disable theme editor (to stop users altering php, html and css)
// Remove width and height attributes to images.


/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

//require_once('library/inc/customisations.php');

/*------------------------------------*\
	Add Theme Support
\*------------------------------------*/

// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 960;

// Register Theme Features
function canvas_theme_support()  {

  // Add Menu Support
  add_theme_support('menus');

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Post Formats
	$formats = array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat', );
		add_theme_support( 'post-formats', $formats );	

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );	
		add_image_size('large', 700, '', true); // Large Thumbnail
		add_image_size('medium', 250, '', true); // Medium Thumbnail
		add_image_size('small', 120, '', true); // Small Thumbnail
		//add_image_size('custom-size', 700, 200, true);
		
	// Add theme support for Custom Background
	$background_args = array(
		'default-color'          => 'ffffff',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $background_args );

	// Add theme support for Custom Header
	$header_args = array(
		'default-image'          => '',
		'width'                  => 0,
		'height'                 => 0,
		'flex-width'             => true,
		'flex-height'            => true,
		'random-default'         => false,
		'header-text'            => false,
		'default-text-color'     => '000000',
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',

	);
	add_theme_support( 'custom-header', $header_args );

	// Add theme support for custom CSS in the TinyMCE visual editor
	add_editor_style( 'editor-styles.css' );	

	// Add theme support for Semantic Markup
	$markup = array( 'search-form', 'comment-form', 'comment-list', );
	add_theme_support( 'html5', $markup );	

	// Add theme support for Translation
	//load_theme_textdomain( 'weaver', get_template_directory() . '/library/languages' );	
}

// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'canvas_theme_support' );



/*------------------------------------*\
	Enqueue JS Scripts
\*------------------------------------*/

// Register Script/s
function canvas_scripts() {

	if (!is_admin()) {

		wp_deregister_script( 'jQuery' );
		wp_register_script( 'jQuery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2', false );
		wp_enqueue_script( 'jQuery' );
	
		wp_register_script( 'conditionizr', 'http://cdnjs.cloudflare.com/ajax/libs/conditionizr.js/2.2.0/conditionizr.min.js', false, '2.2.0', false );
		wp_enqueue_script( 'conditionizr' );
	
		wp_register_script( 'modernizr', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.0/modernizr.min.js', false, '2.7.0', false );
		wp_enqueue_script( 'modernizr' );

	  wp_register_script('flauntJS', get_template_directory_uri() . '/library/js/flaunt-ck.js', array(), '1.0.0', true); // Custom scripts
	  wp_enqueue_script('flauntJS'); // Enqueue it!
	  	
	  wp_register_script('canvas_scripts', get_template_directory_uri() . '/library/js/scripts-ck.js', array(), '1.0.0', true); // Custom scripts
	  wp_enqueue_script('canvas_scripts'); // Enqueue it!
  
  }
        
}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'canvas_scripts' );


/*------------------------------------*\
	Enqueue CSS File/s
\*------------------------------------*/

// Register Style
function canvas_styles() {

	wp_register_style( 'styles', get_template_directory_uri() . '/library/css/styles.css', false, '0.0.1', 'all' );
	wp_enqueue_style( 'styles' );

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'canvas_styles' );


/*------------------------------------*\
	Register Custom Menu/s
\*------------------------------------*/

// Register Navigation Menus
function canvas_navigation_menus() {

	$locations = array(
		'header_menu' => __( 'Header Menu', 'weaver' ),
		//'footer_menu' => __( 'Footer Menu', 'weaver' ),
	);
	register_nav_menus( $locations );

}

// Hook into the 'init' action
add_action( 'init', 'canvas_navigation_menus' );

// HTML5 Blank navigation
function canvas_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header_menu',
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => 'menu-{menu slug}-container', 
		'container_id'    => '',
		'menu_class'      => 'nav', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="nav-list">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function canvas_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

add_filter('wp_nav_menu_args', 'canvas_nav_menu_args'); // Remove surrounding <div> from WP Navigation


/*------------------------------------*\
	Register Sidebar/s
\*------------------------------------*/

// Register Sidebar
function canvas_sidebar()  {

	$args = array(
		'id'            => 'primary_sidebar',
		'name'          => __( 'Primary Sidebar', 'weaver' ),
		'description'   => __( 'Main Sidebar for posts and pages.', 'weaver' ),
		'class'         => 'widget',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
	);
	register_sidebar( $args );

	$args = array(
		'id'            => 'secondary_sidebar',
		'name'          => __( 'Secondary Sidebar', 'weaver' ),
		'description'   => __( 'Secondary Sidebar for posts and pages.', 'weaver' ),
		'class'         => 'widget',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
	);
	register_sidebar( $args );
	
}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'canvas_sidebar' );


/*------------------------------------*\
	Custom Comments Callback
\*------------------------------------*/

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

function canvas_comments_callback($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    
    
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    
		<?php if ( 'div' != $args['style'] ) : ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
	
		<div class="comment-author vcard">
			<div class="author-avatar">
				<?php echo get_avatar( $comment, 50); ?>
			</div>
			<div class="comment-meta commentmetadata">	
			
			<?php
				global $post;
				if( $comment->user_id === $post->post_author ) {
					echo '<span class="label label-blue">Author</span>';
				}
			?>
								
					<?php printf(__('<cite class="fn">%s</cite> <span class="says">said on</span>'), get_comment_author_link()) ?>
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
					<?php
						printf( __('%1$s at %2$s', 'weaver'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'weaver'),'  ','' );
					?>
			</div>				
		</div>
			
		<?php if ($comment->comment_approved == '0') : ?>
			<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'weaver') ?></em>
				<br />
		<?php endif; ?>

		<div class="comment-text">
			<?php comment_text() ?>
		</div>

		<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
		
		<?php if ( 'div' != $args['style'] ) : ?>
			</div>
		<?php endif; ?>
		
<?php }

/*------------------------------------*\
	Miscellaneous Functions
\*------------------------------------*/


// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action('wp_head', 'wp_generator');

// Remove P tags from images
function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)


// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function canvas_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'list'
    ));
}

add_action('init', 'canvas_pagination'); // Add our Pagination


// Editor Styles
function canvas_add_editor_styles() {
    add_editor_style( '/library/css/editor-styles.css' );
}
add_action( 'init', 'canvas_add_editor_styles' );


//WooCommerce Theme Support
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	
	add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
	
	function my_theme_wrapper_start() {
	  echo '<section id="main-content" role="main">';
	}
	
	function my_theme_wrapper_end() {
	  echo '</section>';
	}
	
	add_theme_support( 'woocommerce' );


/**
 * Filter wp_link_pages to do both next and number (Inner Page Pagination)
 * https://gist.github.com/drivenfaroff/7570106
 */
 
add_filter('wp_link_pages_args', 'wp_link_pages_args_prevnext_add');
/**
 * Add prev and next links to a numbered link list
 */
function wp_link_pages_args_prevnext_add($args)
{
    global $page, $numpages, $more, $pagenow;
 
    if (!$args['next_or_number'] == 'next_and_number') 
        return $args; # exit early
 
    $args['next_or_number'] = 'number'; # keep numbering for the main part
    if (!$more)
        return $args; # exit early
 
    if($page-1) # there is a previous page
        $args['before'] .= _wp_link_page($page-1)
            . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
        ;
 
    if ($page<$numpages) # there is a next page
        $args['after'] = _wp_link_page($page+1)
            . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
            . $args['after']
        ;
 
    return $args;
}
?>