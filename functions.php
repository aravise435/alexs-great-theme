<?php
/**
 * alexs_great_theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package alexs_great_theme
 */

if ( ! function_exists( 'alexs_great_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function alexs_great_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on alexs_great_theme, use a find and replace
	 * to change 'alexs_great_theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'alexs_great_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'alexs_great_theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'alexs_great_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'alexs_great_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alexs_great_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alexs_great_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'alexs_great_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alexs_great_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alexs_great_theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        register_sidebar( array(
		'name'          => esc_html__( 'Slider Sidebar', 'great-theme' ),
		'id'            => 'slider-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'alexs_great_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function alexs_great_theme_scripts() {
    
wp_enqueue_style( 'alexs_great_theme-style', get_template_directory_uri().'/style.css' );    
    /**
* Enqueue Foundation scripts and styles.
*/    

/* Add Foundation CSS */
    wp_enqueue_style( 'foundation', get_template_directory_uri() . '/foundations/css/foundation.css' );  

/* Add Foundation JS */
    
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/foundations/js/foundation.min.js', array( 'jquery' ), '1', true );
   
    /* Foundation Init JS */
    
    wp_enqueue_script( 'foundation-init-js', get_template_directory_uri() . '/foundation.js', array( 'jquery' ), '1', true );
    
    /* ----- End Foundation Support ----- */
    
    
	wp_enqueue_style( 'alexs_great_theme-style', get_stylesheet_uri() );
    
    wp_enqueue_style('google-font-lato', '//fonts.googleapis.com/css?family=Lato');
    
    wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Italianno&text=My');
    
    wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() .'/custom.css');

	wp_enqueue_script( 'alexs_great_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'alexs_great_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'alexs_great_theme_scripts' );

