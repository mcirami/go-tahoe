<?php
/**
 * boiler functions and definitions
 *
 * @package boiler
 */

if ( ! function_exists( 'boiler_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function boiler_setup() {

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'boiler' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // boiler_setup
add_action( 'after_setup_theme', 'boiler_setup' );

// add parent class to menu items 
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {

	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'parent-item'; 
		}
	}
	
	return $items;
}

// Thumbnail image sizes
add_image_size( 'thumb-1280-650', 1280, 650, true );
add_image_size( 'thumb-640-840', 640, 840, true );
add_image_size( 'thumb-640-440', 640, 440, true);
add_image_size( 'thumb-1280-400', 1280, 400, true );
add_image_size( 'thumb-640-740', 640, 740, true );
add_image_size( 'thumb-351-251', 351, 251, true );
/* remove some of the header bloat */

// EditURI link
remove_action( 'wp_head', 'rsd_link' );
// windows live writer
remove_action( 'wp_head', 'wlwmanifest_link' );
// index link
remove_action( 'wp_head', 'index_rel_link' );
// previous link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
// start link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
// links for adjacent posts
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
// WP version
remove_action( 'wp_head', 'wp_generator' );

// remove pesky injected css for recent comments widget
add_filter( 'wp_head', 'boiler_remove_wp_widget_recent_comments_style', 1 );
// clean up comment styles in the head
add_action('wp_head', 'boiler_remove_recent_comments_style', 1);
// clean up gallery output in wp
add_filter('gallery_style', 'boiler_gallery_style');

// Thumbnail image sizes
// add_image_size( 'thumb-400', 400, 400, true );

// remove injected CSS for recent comments widget
function boiler_remove_wp_widget_recent_comments_style() {
   if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from recent comments widget
function boiler_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}

// remove injected CSS from gallery
function boiler_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

/**
 * Register widgetized area and update sidebar with default widgets
 */
function boiler_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'boiler' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'boiler_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function boiler_scripts_styles() {
	// style.css just initializes the theme. This is compiled from /sass
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main.css');

    wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/js/mmenu/jquery.mmenu.css');

    wp_enqueue_style( 'mmenu-positioning', get_template_directory_uri() . '/js/mmenu/jquery.mmenu.positioning.css');
    
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css');
    
    wp_enqueue_style( 'tooltipster', get_template_directory_uri() . '/js/tooltipster/tooltipster.css');

	wp_enqueue_script( 'jquery' , array(), '', true );
	
	wp_enqueue_script('jquery-ui-datepicker');

	wp_enqueue_style( 'jquery-style', get_template_directory_uri() . '/css/jquery-ui/jquery-ui.css');
	
	wp_enqueue_script( 'ddslick', get_template_directory_uri() . '/js/ddslick.js', array(), '', true);

    wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/js/mmenu/jquery.mmenu.min.js', array('jquery'), true );
    
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/idangerous.swiper.js', array('jquery'), true );
    
    wp_enqueue_script( 'tooltipster', get_template_directory_uri() . '/js/tooltipster/jquery.tooltipster.min.js', array('jquery'), true );
    
     wp_enqueue_script( 'picturefill', get_template_directory_uri() . '/js/vendor/picturefill.min.js', true );

	//wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', '2.6.2', true );

	//wp_enqueue_script( 'boiler-plugins', get_template_directory_uri() . '/js/plugins.js', array(), '20120206', true );

	//wp_enqueue_script( 'boiler-main', get_template_directory_uri() . '/js/main.js', array(), '20120205', true );
	
	// Return concatenated version of JS. If you add a new JS file add it to the concatenation queue in the gruntfile. 
	// current files: js/vendor.mordernizr-2.6.2.min.js, js/plugins.js, js/main.js
	wp_enqueue_script( 'boiler-concat', get_template_directory_uri() . '/js/built.min.js', array(), '', true );
	
	wp_localize_script( 'boiler-concat', 'ajaxObject', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

}
add_action( 'wp_enqueue_scripts', 'boiler_scripts_styles' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Short codes.
 */
require get_template_directory() . '/inc/short-codes.php';

/**
 * Short codes.
 */
require get_template_directory() . '/inc/ajax-functions.php';

/**
 * Post Types
 */
require get_template_directory() . '/inc/post-types.php';

// Auto wrap embeds with video container to make video responsive
function wrap_embed_with_div($html, $url, $attr) {
     return '<div class="video_container">' . $html . '</div>';
}

add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);

/**
* ACF Option Pages
*/

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Header');
	acf_add_options_page('Footer');
	acf_add_options_page('Social Media');
	acf_add_options_page('Menu');
	acf_add_options_page('Hero');
	acf_add_options_page('Snow Report');
	acf_add_options_page('Featured Items');
	acf_add_options_page('Default Sidebar');
    acf_add_options_page('Deal of the Day');
}

/**
* Changes the character limit
*/

 function custom_excerpt_length($length) {
     return 20;
 }
add_filter( 'excerpt_length', 'custom_excerpt_length', 999);

/**
 * Removes 'more info' after excerpt call
 */

 function remove_excerpt_more( $more ) {
     global $post;
     return ' ';
 }
add_filter('excerpt_more', 'remove_excerpt_more');


/**
 * Removes 'more info' after excerpt call
 */
function change_days_of_week( $week_days ) {
	$week_days = array( 'SU', 'M', 'T', 'W', 'TH', 'F', 'S' );
	return $week_days;
}
add_filter('awesome_weather_days_of_week', 'change_days_of_week');

/**
 * Exclude Events and Search Results pages from Search query
 */
function search_filter( $query ) {
	if ( $query->is_search ) {
		$search_results_page = get_page_by_path( 'search-results' );
		$query->set( 'post__not_in', array( $search_results_page->ID ) ); 
	}
	return $query;
}
add_filter( 'pre_get_posts','search_filter' );

// function for hiding posts from users that they are not the author on if they don't have 'manage_options' capability
function mypo_parse_query_useronly( $wp_query ) {
    if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/edit.php' ) !== false ) {
        if ( !current_user_can( 'manage_options' ) ) {
            global $current_user;
            $wp_query->set( 'author', $current_user->id );
        }
    }
}

add_filter('parse_query', 'mypo_parse_query_useronly' );

function listing_connection_post_object( $args, $field, $post ) {
	global $current_user;
    if ( !current_user_can( 'manage_options' ) ) {
    	// modify the order
    	$args['author'] = $current_user->id;
	}
    return $args;
}

// filter for a specific field based on it's name
add_filter('acf/fields/post_object/query/name=listing_connection', 'listing_connection_post_object', 10, 3);


function featured_activity_post_object( $args, $field, $post ) {
	$args['meta_query'][] = array(
		'key' => '_wp_page_template',
		'value' => 'page-template-activity.php'
	);
    return $args;
}

// filter for a specific field based on it's name
add_filter('acf/fields/post_object/query/name=featured_activity', 'featured_activity_post_object', 10, 3);

// Adds custom excerpt for acf fields
function custom_field_excerpt() {
    global $post;
    $text = get_field('deal_content', 'options');
    if ('' != $text ) {
        $text = strip_shortcodes( $text );
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]&gt',']]&gt', $text);
        $excerpt_length = 20; // This is where you change the word count
        $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    }
    return apply_filters('the_excerpt', $text );
}

/**
 * Populate Vendor Listing Type dropdown with all terms from all taxonomies
 */
function acf_load_vendor_listing_dropdown( $field ) {
	// reset choices
	$field['choices'] = array();

	// get post type taxonomies
	$taxonomies = get_object_taxonomies( 'directory_listing' );
	
	$args = array(
			'orderby'    => 'name',
			'order'      => 'ASC',
			'hide_empty' => false,
			);	
	$terms = get_terms( $taxonomies, $args );
	
	if( $terms ) {
		foreach( $terms as $term ) {
			$field['choices'][ $term->slug ] = $term->name;
		}
	}

	return $field;
}
add_filter('acf/load_field/name=vendor_listing_type', 'acf_load_vendor_listing_dropdown');

function my_modify_main_query( $query ) {
	if ( ($query->is_archive() && $query->is_main_query()) || ($query->is_tax() && $query->is_main_query())  ) { // Run only on the homepage
		$query->query_vars['posts_per_page'] = -1; // Show only 5 posts on the homepage only
	}
}
add_action( 'pre_get_posts', 'my_modify_main_query' );