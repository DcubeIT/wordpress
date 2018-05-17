<?php
/**
 * Pro Blog functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pro Blog
 */

if ( ! function_exists( 'pro_blog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pro_blog_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
    
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( "title-tag" );

	/*
	* Enable support for editor style.
	*/  
	add_editor_style( 'assets/css/editor-style.css' );

	/*
	* Enable support for custom logo.
	*/  
	add_theme_support( 'custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'pro-blog-thumb', 338, 225, true );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'pro-blog' ),
		'menu-2' => esc_html__( 'Topbar', 'pro-blog' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'pro_blog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

}
endif;
add_action( 'after_setup_theme', 'pro_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pro_blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pro_blog_content_width', 708 );
}
add_action( 'after_setup_theme', 'pro_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function pro_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pro-blog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pro-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar(array(
        'name'			=> esc_html__( 'Topbar Widget', 'pro-blog' ),
        'id' 			=> 'topbarwidget',
        'description' 	=> esc_html__( 'Widgets in this area will be shown on menu.', 'pro-blog' ),
        'before_title'	=> '<h4 class="sidebar-title">',
        'after_title'	=> '</h4>',
        'before_widget' => '<div class="widget-item">',
        'after_widget'	=> '</div><!-- widget end -->',

    ) );

	register_sidebar( array(
		'name'			=> esc_html__( 'Footer 1', 'pro-blog' ),
		'id'            => 'footer1',
		'description'   => esc_html__( 'Add widgets here.', 'pro-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'pro-blog' ),
		'id'            => 'footer2',
		'description'   => esc_html__( 'Add widgets here.', 'pro-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'pro-blog' ),
		'id'            => 'footer3',
		'description'   => esc_html__( 'Add widgets here.', 'pro-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'pro-blog' ),
		'id'            => 'footer4',
		'description'   => esc_html__( 'Add widgets here.', 'pro-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pro_blog_widgets_init' );

if ( ! function_exists( 'pro_blog_fonts_url' ) ) {
	/**
	 * Register Google fonts.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function pro_blog_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Source Sans Pro, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Source Sans Pro: on or off', 'pro-blog' ) ) {
			$fonts[] = 'Source Sans Pro:400,700';
		}	
		if ( 'off' !== _x( 'on', 'Noto Serif: on or off', 'pro-blog' ) ) {
			$fonts[] = 'Noto Serif:600';
		}			

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}

/**
 * Enqueue scripts and styles.
 */
function pro_blog_scripts() {

	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/third-party/bootstrap/bootstrap.css');

	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/third-party/font-awesome/css/font-awesome.min.css');

	wp_enqueue_style( 'pro-blog-fonts', pro_blog_fonts_url(), array(), null );

	wp_enqueue_style( 'pro-blog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/third-party/bootstrap/bootstrap.min.js', array('jquery'), true );	

	wp_enqueue_script( 'pro-blog-js', get_template_directory_uri() . '/assets/js/problog.js', array('jquery'), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pro_blog_scripts' );

/**
 * Excerpt.
 */
function pro_blog_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'pro-blog' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'pro_blog_excerpt_more' );


// Template tags.
require_once trailingslashit( get_template_directory() ) . '/inc/template-tags.php';

// Custom functions.
require_once trailingslashit( get_template_directory() ) . '/inc/template-functions.php';

// Custom Header.
require_once trailingslashit( get_template_directory() ) . '/inc/custom-header.php';

// Jetpack.
require_once trailingslashit( get_template_directory() ) . '/inc/jetpack.php';

// Customizer.
require_once trailingslashit( get_template_directory() ) . '/inc/customizer.php';
