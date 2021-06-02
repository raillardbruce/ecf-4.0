<?php

/**
 * lepays functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lepays
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('lepays_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lepays_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on lepays, use a find and replace
		 * to change 'lepays' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('lepays', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'lepays'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'lepays_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'lepays_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lepays_content_width()
{
	$GLOBALS['content_width'] = apply_filters('lepays_content_width', 640);
}
add_action('after_setup_theme', 'lepays_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lepays_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'lepays'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'lepays'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'lepays_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function lepays_scripts()
{
	wp_enqueue_style('lepays-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('lepays-style', 'rtl', 'replace');
}
add_action('wp_enqueue_scripts', 'lepays_scripts');


// // register custom post type to work with
// function lc_create_post_type()
// {
// 	// set up labels
// 	$labels = array(
// 		'name' => 'Événements',
// 		'singular_name' => 'Événements',
// 		'add_new' => 'Ajouter',
// 		'add_new_item' => 'Ajouter un nouvel évenement',
// 		'edit_item' => 'Modifier',
// 		'new_item' => 'Ajouter',
// 		'all_items' => 'Tout les événements',
// 		'view_item' => 'Voir l événement',
// 		'search_items' => 'Rechercher un événement',
// 		'not_found' => 'Aucun événement trouvé',
// 		'not_found_in_trash' => 'Aucun événement trouvé dans la corbeille',
// 		'parent_item_colon' => '',
// 		'menu_name' => 'Événements'
// 	);
// 	//register post type
// 	register_post_type(
// 		'event',
// 		array(
// 			'labels' => $labels,
// 			'has_archive' => true,
// 			'public' => true,
// 			'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail'),
// 			'taxonomies' => array('post_tag', 'category'),
// 			'exclude_from_search' => false,
// 			'capability_type' => 'post',
// 			'rewrite' => array('slug' => 'events'),
// 			'show_in_rest' => true,
// 			'menu_icon' => 'dashicons-calendar-alt',
// 		)
// 	);
// }
// add_action('init', 'lc_create_post_type');


// add_filter('single_template', function ($single_template) {

// 	$parent     = '2';
// 	$categories = get_categories('child_of=' . $parent);
// 	$cat_names  = wp_list_pluck($categories, 'name');

// 	if (has_category('movies') || has_category($cat_names)) {
// 		$single_template = dirname(__FILE__) . 'templates-posts/article.php';
// 	}
// 	return $single_template;
// }, PHP_INT_MAX, 2);
