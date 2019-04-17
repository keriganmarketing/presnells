<?php
/**
 * resort functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package resort
 */

use Includes\Modules;

require_once wp_normalize_path(get_template_directory() . '/vendor/autoload.php');
require_once wp_normalize_path(get_template_directory() . '/inc/acf-fields.php');

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
		'rewrite'            => array( 
				'slug' 			=> 'reviews',   		//string Customize the permalink structure slug. Defaults to the $post_type value. Should be translatable.
				'with_front' 	=> false, 				//bool Should the permalink structure be prepended with the front base. <br>
														//(example: if your permalink structure is /blog/, then your links will be: false-> /news/, true->/blog/news/). Defaults to true
				'feeds' 		=> true, 				//bool Should a feed permalink structure be built for this post type. Defaults to has_archive value
				'pages' 		=> false				//bool Should the permalink structure provide for pagination. Defaults to true
			),
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
	$GLOBALS['content_width'] = apply_filters( 'resort_content_width', 900 );
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
	wp_enqueue_style( 'resort-style', get_stylesheet_uri() );
	wp_enqueue_script( 'resort-js', get_template_directory_uri() . '/app.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'resort_scripts' );

/**
 * Register the block.
 */
function table_enqueue_block_editor_assets() {
	wp_enqueue_script(
		'table-gutenberg-block-editor-script',
		get_template_directory_uri() . '/js/editor.blocks.js',
		[ 'wp-blocks', 'wp-element', 'wp-edit-post' ]
	);
}
add_action( 'enqueue_block_editor_assets', 'table_enqueue_block_editor_assets' );


/**
 * Implement the Custom Header feature.
 */
require wp_normalize_path(get_template_directory() . '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require wp_normalize_path(get_template_directory() . '/inc/template-tags.php' );

/**
 * Custom functions that act independently of the theme templates.
 */
require wp_normalize_path(get_template_directory() . '/inc/extras.php' );

/**
 * Customizer additions.
 */
require wp_normalize_path(get_template_directory() . '/inc/customizer.php' );

/**
 * Load Jetpack compatibility file.
 */
require wp_normalize_path(get_template_directory() . '/inc/jetpack.php' );

  
function truncate($string,$length=50,$append="&hellip;") {
	$string = trim($string);

	if(strlen($string) > $length) {
		$string = wordwrap($string, $length);
		$string = explode("\n", $string, 2);
		$string = $string[0] . $append;
	}

	return $string;
}

function myfeed_request($qv) {
	if (isset($qv['feed']))
		$qv['post_type'] = get_post_types();
	return $qv;
}
add_filter('request', 'myfeed_request');

new KeriganSolutions\KMASlider\KMASliderModule();

// website menu data-only
function website_menu( $menuID ){

    $data = wp_get_nav_menu_items($menuID);
    $tempArray = [];
    $output = [];

    if(!is_array($data)){
        return '';
    }

    foreach($data as $key => $item){
        if($item->menu_item_parent == 0){
            $item->children = [];
            $tempArray[$item->ID] = $item;
        }else{
            $tempArray[$item->menu_item_parent]->children[] = $item;
        }
    }

    foreach($tempArray as $key => $item){
        $item->title = htmlspecialchars_decode($item->title);
        $item->classes = implode(' ', $item->classes);
        $output[$item->menu_order] = $item;
    }

    return json_encode($output);
}