<?php
/**
 * Literacy functions and definitions
 *
 * @package Literacy
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'literacy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function literacy_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'literacy', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('literacy-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'literacy' ),
		'top'	=> __('Topbar Menu', 'literacy'),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style(array( 'editor-style.css', literacy_font_url() ));
}
endif; // literacy_setup
add_action( 'after_setup_theme', 'literacy_setup' );


function literacy_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'literacy' ),
		'description'   => __( 'Appears on blog page sidebar', 'literacy' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'literacy' ),
		'description'   => __( 'Appears on page sidebar', 'literacy' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'literacy_widgets_init' );

function literacy_font_url(){
		$font_url = '';
		
		/* Translators: If there are any character that are
		* not supported by Oswald, translate this to off, do not
		* translate into your own language.
		*/
		$oswald = _x('on', 'Oswald font:on or off','literacy');
		
		/* Translators: If there are any character that are
		* not supported by Oxygen, translate this to off, do not
		* translate into your own language.
		*/
		$oxygen = _x('on', 'Oxygen font:on or off','literacy');
		
		/* Translators: If there are any character that are
		* not supported by Arimo, translate this to off, do not
		* translate into your own language.
		*/
		$arimo = _x('on', 'Arimo font:on or off','literacy');
		
		if('off' !== $oswald || 'off' !==  $oxygen || 'off' !== $arimo){
			$font_family = array();
			
			if('off' !== $oswald){
				$font_family[] = 'Oswald:300,400,700';
			}
			
			if('off' !== $oxygen){
				$font_family[] = 'Oxygen:400,700';
			}
			
			if('off' !== $arimo){
				$font_family[] = 'Arimo:400,700';
			}
			
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'https://fonts.googleapis.com/css');
		}
		
	return $font_url;
	}
	

function literacy_scripts() {
	wp_enqueue_style( 'literacy-font', literacy_font_url(), array() );
	wp_enqueue_style( 'literacy-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'literacy-responsive-style', get_template_directory_uri().'/css/theme-responsive.css' );
	wp_enqueue_style( 'nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	if ( is_front_page() && !is_home() ) { 
		wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	}
	wp_enqueue_script( 'literacy-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'literacy_scripts' );


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

// URL DEFINES
define('literacy_pro_theme_url','https://flythemes.net/wordpress-themes/literacy-wordpress-theme/');
define('literacy_theme_doc','http://flythemesdemo.net/documentation/literacy-doc/');
define('literacy_site_url','https://flythemes.net/');