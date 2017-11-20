<?php
/**
 * resort functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package resort
 */

if ( ! function_exists( 'resort_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function resort_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on resort, use a find and replace
	 * to change 'resort' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'resort', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'resort' ),
		'footer-nav-one' => esc_html__( 'Footer Menu One', 'resort' ),
		'footer-nav-two' => esc_html__( 'Footer Menu Two', 'resort' ),
		'footer-nav-three' => esc_html__( 'Footer Menu Three', 'resort' ),
		'footer-areas' => esc_html__( 'Footer Areas', 'resort' ),
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
	add_theme_support( 'custom-background', apply_filters( 'resort_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	register_post_type( 'slide', array(
		'labels'             => array(
			'name' 		         => _x( 'Slide', 'post type general name', 'ride' ),
			'singular_name'      => _x( 'Slide', 'post type singular name', 'ride' ),
			'menu_name'          => _x( 'Home Page Slideshow', 'admin menu', 'ride' ),
			'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', 'ride' ),
			'add_new'            => _x( 'Add New', 'slide', 'ride' ),
			'add_new_item'       => __( 'Add New Slide', 'ride' ),
			'new_item'           => __( 'New Slide', 'ride' ),
			'edit_item'          => __( 'Edit Slides', 'ride' ),
			'view_item'          => __( 'View Slides', 'ride' ),
			'all_items'          => __( 'All Slides', 'ride' ),
			'search_items'       => __( 'Search Slides', 'ride' ),
			'parent_item_colon'  => __( 'Parent Slide:', 'ride' ),
			'not_found'          => __( 'No slides found.', 'ride' ),
			'not_found_in_trash' => __( 'No slides found in Trash.', 'ride' )
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slides', 'with_front' => FALSE ),
		'menu_icon'          => 'dashicons-images-alt2',
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'page-attributes', 'revisions', 'thumbnail', 'custom-fields' )
	));
	
	register_post_type( 'testimonial', array(
		'labels'             => array(
			'name' 		         => _x( 'Reviews', 'post type general name', 'ride' ),
			'singular_name'      => _x( 'Review', 'post type singular name', 'ride' ),
			'menu_name'          => _x( 'Reviews', 'admin menu', 'ride' ),
			'name_admin_bar'     => _x( 'Reviews', 'add new on admin bar', 'ride' ),
			'add_new'            => _x( 'Add New', 'review', 'ride' ),
			'add_new_item'       => __( 'Add New Review', 'ride' ),
			'new_item'           => __( 'New Review', 'ride' ),
			'edit_item'          => __( 'Edit Review', 'ride' ),
			'view_item'          => __( 'View Reviews', 'ride' ),
			'all_items'          => __( 'All Reviews', 'ride' ),
			'search_items'       => __( 'Search Reviews', 'ride' ),
			'parent_item_colon'  => __( 'Parent Review:', 'ride' ),
			'not_found'          => __( 'No reviews found.', 'ride' ),
			'not_found_in_trash' => __( 'No reviews found in Trash.', 'ride' )
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		//'rewrite' => false,
		'rewrite'            => array( 'slug' => 'reviews', 'with_front' => FALSE ),
		'menu_icon'			 => 'dashicons-format-quote',
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'revisions' )
	));
	
}
endif; // resort_setup
add_action( 'after_setup_theme', 'resort_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function resort_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'resort_content_width', 640 );
}
add_action( 'after_setup_theme', 'resort_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function resort_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'resort' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'resort_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function resort_scripts() {
	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Bitter:400,400italic,700');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	//wp_enqueue_style('bootstrap-tables', get_template_directory_uri() . '/css/responsive-tables.css');
	wp_enqueue_style( 'resort-style', get_stylesheet_uri() );
	//wp_enqueue_style('style-2', get_template_directory_uri() . '/style2.css');
	wp_enqueue_script( 'resort-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);
	//wp_enqueue_script('bootstrap-table-js', get_template_directory_uri() . '/js/responsive-tables.js', array('bootstrap-js'), '', true);
	wp_enqueue_script( 'resort-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'resort_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

  
function truncate($string,$length=50,$append="&hellip;") {
	$string = trim($string);

	if(strlen($string) > $length) {
		$string = wordwrap($string, $length);
		$string = explode("\n", $string, 2);
		$string = $string[0] . $append;
	}

	return $string;
}
