<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Pro Blog
 */

//=============================================================
// Alter body class function
//=============================================================

function pro_blog_body_classes( $classes ) {
	
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}


   	
	return $classes;
}

add_filter( 'body_class', 'pro_blog_body_classes' );

//=============================================================
// Pingback function
//=============================================================
function pro_blog_pingback_header() {

	if ( is_singular() && pings_open() ) {

		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';

	}
	
}

add_action( 'wp_head', 'pro_blog_pingback_header' );

if ( ! function_exists( 'pro_blog_footer_goto_top' ) ) :

	function pro_blog_footer_goto_top() {

		echo '<a href="#page" class="scrolltop" id="btn-scrolltop"><i class="fa fa-angle-up"></i></a>';
	
	}
	
endif;
add_action( 'wp_footer', 'pro_blog_footer_goto_top' );
