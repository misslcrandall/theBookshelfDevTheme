<?php
 // THEME SUPPORT
 function theme_setup(){
	
	add_theme_support( 'title-tag' );
	
	add_theme_support('menus');
	
	add_theme_support( 'custom-logo', array(
		'width'       => 400,
		'height'      => 100,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	add_theme_support('post-thumbnails');
	//add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
	
	register_nav_menus( array(
		'header' => __('Header Menu'),
		//'main-left' => __('Main Menu (Left)'),
		//'main-right' => __('Main Menu (Right)'),
		'mobile-menu' => __('Mobile Menu'),
		'footer' => __('Footer Menu')
	) );
	
	add_theme_support( 'html5', array(
		'comment-list',
		'comment-form',
		'search-form',
		'gallery',
		'caption'
	) );
	
	register_sidebar(array(
		'name'          => 'Blog Sidebar',
		'id' 			=> 'blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	));
};
add_action( 'after_setup_theme', 'theme_setup' );

// ACF Options
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Site Options',
		'menu_title'	=> 'Site Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

//Rewrite Blog URLs
/*function posts_add_rewrite_rules( $wp_rewrite )
{
    $new_rules = [
        'blog/page/([0-9]{1,})/?$' => 'index.php?post_type=post&paged='. $wp_rewrite->preg_index(1),
        'blog/(.+?)/?$' => 'index.php?post_type=post&name='. $wp_rewrite->preg_index(1),
    ];
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
    return $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'posts_add_rewrite_rules');

function posts_change_blog_links($post_link, $id=0){
    $post = get_post($id);
    if( is_object($post) && $post->post_type == 'post'){
        return home_url('/blog/'. $post->post_name.'/');
    }
    return $post_link;
}
add_filter('post_link', 'posts_change_blog_links', 1, 3);*/

add_action('after_setup_theme', 'wp_essentials_setup');
function wp_essentials_setup() {
	
	// Remove unnecessary meta tags
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'rel_canonical');
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	
	// Removes WordPress version from styles and scripts
	add_filter('style_loader_src', 'remove_wp_version', 9999);
	add_filter('script_loader_src', 'remove_wp_version', 9999);
	function remove_wp_version($src) {
		if(strpos($src, 'ver='))
			$src = remove_query_arg('ver', $src);
		return $src;
	}

	// Add browser specific body classes
	function custom_body_classes($classes){
		// the list of WordPress global browser checks
		// https://codex.wordpress.org/Global_Variables#Browser_Detection_Booleans
		$browsers = ['is_iphone', 'is_chrome', 'is_safari', 'is_NS4', 'is_opera', 'is_macIE', 'is_winIE', 'is_gecko', 'is_lynx', 'is_IE', 'is_edge'];
		// check the globals to see if the browser is in there and return a string with the match
		$classes[] = join(' ', array_filter($browsers, function ($browser) {
			return $GLOBALS[$browser];
		}));
		return $classes;
	}
	add_filter('body_class', 'custom_body_classes');

	// Add page slug to body class
	add_filter('body_class', 'add_slug_to_body_class');
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

	// Helper function to get assets
	function get_asset( $type, $file ) {
		return get_stylesheet_directory_uri() . '/assets/' . $type . '/' . $file;
	}
	
	// Make WordPress to Stop Guessing URLS
	// If you write the URL of a page in a WordPress site incorrectly, WordPress will try to guess what page you were trying to access and “fix” your request so that you get the proper page and not a 404 error
	add_filter('redirect_canonical', 'stop_guessing');
	function stop_guessing($url) {
	 if (is_404()) {
	   return false;
	 }
	 return $url;
	}

	// Remove Auto Paragraph
	//remove_filter ('the_content', 'wpautop');
	//remove_filter ('acf_the_content', 'wpautop');

	// Remove height/width attributes on images so they can be responsive
	add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
	add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
	function remove_thumbnail_dimensions( $html ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}


	// Removes the page jump when read more is clicked through
	if ( !function_exists( 'remove_more_jump_link' ) ) {
		function remove_more_jump_link($link) {
			$offset = strpos($link, '#more-');
			if ($offset) {
			$end = strpos($link, '"',$offset);
			}
			if ($end) {
			$link = substr_replace($link, '', $offset, $end-$offset);
			}
			return $link;
		}
		add_filter('the_content_more_link', 'remove_more_jump_link');
	}
}

