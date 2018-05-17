<?php
/**
 * Pro Blog Theme Customizer.
 *
 * @package Pro Blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pro_blog_customize_register( $wp_customize ) {

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'            => '.site-title a',
		'render_callback'     => 'pro_blog_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'            => '.site-description',
		'render_callback'     => 'pro_blog_customize_partial_blogdescription',
	) );
}

}
add_action( 'customize_register', 'pro_blog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pro_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pro_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


function pro_blog_customizer_option( $key ) {

	if ( empty( $key ) ) {
        return;
    }

    $value = '';

    $default = pro_blog_get_default_theme_options();

    $default_value = null;

    if ( is_array( $default ) && isset( $default[ $key ] ) ) {
        $default_value = $default[ $key ];
    }

    if ( null !== $default_value ) {
        $value = get_theme_mod( $key, $default_value );
    }
    else {
        $value = get_theme_mod( $key );
    }

    return $value;

}

function pro_blog_get_default_theme_options() {

	$defaults = array();

	//main options
    $defaults['top_bar']          		= 1;
    $defaults['nav_layout']          	= 'center';
    $defaults['site_layout']          	= 'full';
   
	//home/blogoptions
    $defaults['category_meta']          = 1;
    $defaults['author_meta']            = 1;
    $defaults['date_meta']              = 1;

    //page/post options
    $defaults['featured_img_meta']      = 1;
    $defaults['single_category_meta']   = 1;
    $defaults['single_author_meta']     = 1;
    $defaults['single_date_meta']       = 1;
    $defaults['single_tags_meta']       = 1;
    $defaults['show_post_nav']          = 1;

	// Footer.
	$defaults['copyright'] 				= esc_html__( 'Copyright &copy; All rights reserved.', 'pro-blog' );

	return $defaults;
}

// Get all options in array

function pro_blog_customizer_options() {

    $value = array();

    $value = get_theme_mods();

    return $value;

}

function pro_blog_register_theme_customizer( $wp_customize ) {

	// Load the radio image control class.
    require_once( trailingslashit( get_template_directory() ) . 'inc/control-radio-image.php' );

    // Register the radio image control class as a JS control type.
    $wp_customize->register_control_type( 'Pro_Blog_Customize_Control_Radio_Image' );

	$default = pro_blog_get_default_theme_options();


	// Main Options Section
	$wp_customize->add_section(
		'main', 
		array(    
			'title'       => esc_html__('Main Settings', 'pro-blog'), 
			'priority' 	  => 6,   
		)
	);

	$wp_customize->add_setting(
		'nav_layout',
		array(
			'default'           => 'center',
			'sanitize_callback' => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new Pro_Blog_Customize_Control_Radio_Image(
			$wp_customize,
			'nav_layout', 
			array(
				'label'    => esc_html__( 'Navigation Layout', 'pro-blog' ),
				'choices'  => array(
					'center'  => array(
                        'label' => esc_html__( 'Center', 'pro-blog' ),
                        'url'   => '%s/assets/images/nav_center.png'
                    ),
					'left'   => array(
                        'label' => esc_html__( 'Left', 'pro-blog' ),
                        'url'   => '%s/assets/images/nav_left.png'
                    ),
			),
			'section'  => 'main',
			'settings'   => 'nav_layout',
			'priority' => 6,
			)
		) 
	);

	$wp_customize->add_setting(
		'site_layout',
		array(
			'default'           => 'full',
			'sanitize_callback' => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new Pro_Blog_Customize_Control_Radio_Image(
			$wp_customize,
			'site_layout', 
			array(
				'label'    => esc_html__( 'Site Layout', 'pro-blog' ),
				'choices'  => array(
					'full'  => array(
                        'label' => esc_html__( 'Full Width', 'pro-blog' ),
                        'url'   => '%s/assets/images/full.png'
                    ),
					'box'   => array(
                        'label' => esc_html__( 'Box', 'pro-blog' ),
                        'url'   => '%s/assets/images/box.png'
                    ),
			),
			'section'  => 'main',
			'settings'   => 'site_layout',
			'priority' => 6,
			)
		) 
	);

	// Topbar Options Section
	$wp_customize->add_section(
		'topbar', 
		array(    
			'title'       => esc_html__('Topbar Settings', 'pro-blog'),
			'priority' 	  => 7,    
		)
	);
	
	// Setting top_bar.
	$wp_customize->add_setting( 
		'top_bar',
		array(
			'default'           => $default['top_bar'],
			'sanitize_callback' => 'pro_blog_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 
		'top_bar',
		array(
			'label'    		=> esc_html__( 'Show Topbar', 'pro-blog' ),
			'section'  		=> 'topbar',
			'type'     		=> 'checkbox',
		)
	);

	$wp_customize->add_setting('topbar_color', array(
		'default' 			=> '#000',
		'sanitize_callback' => 'sanitize_hex_color'
	));	

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'topbar_color',
			array(
				'label'       => esc_html__( 'Topbar Color', 'pro-blog' ),
				'settings'    => 'topbar_color',
				'section'     => 'topbar',	
				'priority' => 100,			   
			)
		)
	);

	// Home/Blog Options Section
	$wp_customize->add_section(
		'post_options', 
		array(    
			'title'       => esc_html__('Home/Blog Settings', 'pro-blog'),
			'priority' 	  => 8,    
		)
	);

	// Setting category_meta.
	$wp_customize->add_setting( 
		'category_meta',
		array(
			'default'           => $default['category_meta'],
			'sanitize_callback' => 'pro_blog_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 
		'category_meta',
		array(
			'label'    		=> esc_html__( 'Show Category', 'pro-blog' ),
			'section'  		=> 'post_options',
			'type'     		=> 'checkbox',
		)
	);

	// Setting author_meta.
	$wp_customize->add_setting( 
		'author_meta',
		array(
			'default'           => $default['author_meta'],
			'sanitize_callback' => 'pro_blog_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 
		'author_meta',
		array(
			'label'    		=> esc_html__( 'Show Author', 'pro-blog' ),
			'section'  		=> 'post_options',
			'type'     		=> 'checkbox',
		)
	);

	// Setting date_meta.
	$wp_customize->add_setting( 
		'date_meta',
		array(
			'default'           => $default['date_meta'],
			'sanitize_callback' => 'pro_blog_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 
		'date_meta',
		array(
			'label'    		=> esc_html__( 'Show Posted Date', 'pro-blog' ),
			'section'  		=> 'post_options',
			'type'     		=> 'checkbox',
		)
	);

	// Page/Post Options Section
	$wp_customize->add_section(
		'single_post_options', 
		array(    
			'title'       => esc_html__('Page/Post Settings', 'pro-blog'), 
			'priority' 	  => 9,  
		)
	);

	// Setting featured_img_meta.
	$wp_customize->add_setting( 
		'featured_img_meta',
		array(
			'default'           => $default['featured_img_meta'],
			'sanitize_callback' => 'pro_blog_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 
		'featured_img_meta',
		array(
			'label'    		=> esc_html__( 'Show featured image', 'pro-blog' ),
			'section'  		=> 'single_post_options',
			'type'     		=> 'checkbox',
		)
	);

	// Setting single_category_meta.
	$wp_customize->add_setting( 
		'single_category_meta',
		array(
			'default'           => $default['single_category_meta'],
			'sanitize_callback' => 'pro_blog_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 
		'single_category_meta',
		array(
			'label'    		=> esc_html__( 'Show Category', 'pro-blog' ),
			'section'  		=> 'single_post_options',
			'type'     		=> 'checkbox',
		)
	);

	// Setting author_meta.
	$wp_customize->add_setting( 
		'single_author_meta',
		array(
			'default'           => $default['single_author_meta'],
			'sanitize_callback' => 'pro_blog_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 
		'single_author_meta',
		array(
			'label'    		=> esc_html__( 'Show Author', 'pro-blog' ),
			'section'  		=> 'single_post_options',
			'type'     		=> 'checkbox',
		)
	);

	// Setting date_meta.
	$wp_customize->add_setting( 
		'single_date_meta',
		array(
			'default'           => $default['single_date_meta'],
			'sanitize_callback' => 'pro_blog_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 
		'single_date_meta',
		array(
			'label'    		=> esc_html__( 'Show Posted Date', 'pro-blog' ),
			'section'  		=> 'single_post_options',
			'type'     		=> 'checkbox',
		)
	);

	// Setting single_tags_meta.
	$wp_customize->add_setting( 
		'single_tags_meta',
		array(
			'default'           => $default['single_tags_meta'],
			'sanitize_callback' => 'pro_blog_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 
		'single_tags_meta',
		array(
			'label'    		=> esc_html__( 'Show Tags', 'pro-blog' ),
			'section'  		=> 'single_post_options',
			'type'     		=> 'checkbox',
		)
	);

	// Setting show_post_nav
	$wp_customize->add_setting( 
		'show_post_nav',
		array(
			'default'           => $default['show_post_nav'],
			'sanitize_callback' => 'pro_blog_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 
		'show_post_nav',
		array(
			'label'    => esc_html__( 'Show Post Navigation', 'pro-blog' ),
			'section'  => 'single_post_options',
			'type'     => 'checkbox',
		)
	);

	// Footer Section
	$wp_customize->add_section(
		'footer', 
		array(    
			'title'       => esc_html__('Footer Options', 'pro-blog'),
			'priority' 	  => 11,    
		)
	);

	$wp_customize->add_setting(
		'copyright', 
		array(
			'default' 			=>  $default['copyright'],
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'copyright', 
		array(
			'label'       => esc_html__('Copyright Text', 'pro-blog'),
			'description' => esc_html__('Copyright text of the site', 'pro-blog'),
			'settings'    => 'copyright',
			'section'     => 'footer',
			'type'        => 'text'
		)
	);

	// Basic Styling Section
	$wp_customize->add_section(
		'basic_styling', 
		array(    
			'title'       => esc_html__('Basic Styling', 'pro-blog'), 
			'priority' 	  => 10,  
		)
	);

	//Background color options
	$wp_customize->add_setting('site_color', array(
		'default' 			=> '#eeaa44',
		'sanitize_callback' => 'sanitize_hex_color'
	));	

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_color',
			array(
				'label'       => esc_html__( 'Site Color', 'pro-blog' ),
				'settings'    => 'site_color',
				'section'     => 'basic_styling',	
				'priority' => 100,			   
			)
		)
	);

//=============================================================
// Checkbox santitization
//=============================================================

function pro_blog_sanitize_checkbox( $checked ) {

	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

}
add_action( 'customize_register', 'pro_blog_register_theme_customizer' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pro_blog_customize_preview_js() {
	wp_enqueue_script( 'pro-blog-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'pro_blog_customize_preview_js' );



function pro_blog_customizer_css(){

    $site_color = pro_blog_customizer_options( 'site_color' );

    ?>
	<style>
		.top-bar{
            background-color: <?php echo esc_attr(get_theme_mod( 'topbar_color' )); ?>;
        }
        span.featured-post, .scrolltop, h2.widget-title:after, h2.widget-title:hover:after{
            background-color: <?php echo esc_attr(get_theme_mod( 'site_color' )); ?>;
        }
        a, a:hover, a:focus, span.cat-links a, span.author.vcard a{
            color: <?php echo esc_attr(get_theme_mod( 'site_color' )); ?>;
        }

    </style>  

    <?php }  

add_action( 'wp_head', 'pro_blog_customizer_css' );