<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Pro Blog
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses pro_blog_header_style()
 */
function pro_blog_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'pro_blog_custom_header_args', array(
		'default-image'          => '',
		'width'                  => 1600,
		'height'                 => 400,
		'flex-height'            => true,
		'header-text'   		 => false,
	) ) );
}
add_action( 'after_setup_theme', 'pro_blog_custom_header_setup' );