<?php
/**
 * Literacy Theme Customizer
 *
 * @package Literacy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function literacy_customize_register( $wp_customize ) {
	
function literacy_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#03a9f5',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','literacy'),
			'description'	=> __('<strong>Select default color.</strong>','literacy'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_section('contact_sec',array(
		'title'	=> __('Contact Details','literacy'),
		'description'	=> __('Add contact details here.','literacy'),
		'priority'		=> null
	));
	
	$wp_customize->add_setting('email_text',array(
		'default'	=> 'info@sitename.com',
		'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('email_text',array(
		'label'	=> __('Add email address here.','literacy'),
		'section'	=> 'contact_sec',
		'setting'	=> 'email_text',
		'type'		=> 'text'
	));
	
	
	$wp_customize->add_setting('call_text',array(
		'default'	=> __('12 8888 6666','literacy'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('call_text',array(
		'label'	=> __('Add phone number here','literacy'),
		'section'	=> 'contact_sec',
		'setting'	=> 'call_text',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('hide_contact',array(
			'default' => true,
			'sanitize_callback' => 'literacy_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_contact', array(
		   'settings' => 'hide_contact',
    	   'section'   => 'contact_sec',
    	   'label'     => __('Check this to hide contact','literacy'),
    	   'type'      => 'checkbox'
     ));
	
	$wp_customize->add_section('headertxt_sec',array(
		'title'	=> __('Announcement Text','literacy'),
		'description'	=> __('Add announcement text here.','literacy'),
		'priority'		=> null
	));
	
	$wp_customize->add_setting('anntext_left',array(
		'default'	=> __('University exam start  from March 10, 2016','literacy'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('anntext_left',array(
		'label'	=> __('Add left strip text here','literacy'),
		'section'	=> 'headertxt_sec',
		'setting'	=> 'anntext_left',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('anntext_right',array(
		'default'	=> __('Admission Open for 2016','literacy'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('anntext_right',array(
		'label'	=> __('Add right strip text here','literacy'),
		'section'	=> 'headertxt_sec',
		'setting'	=> 'anntext_right',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('hide_announcement',array(
			'default' => true,
			'sanitize_callback' => 'literacy_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_announcement', array(
		   'settings' => 'hide_announcement',
    	   'section'   => 'headertxt_sec',
    	   'label'     => __('Check this to hide announcement section.','literacy'),
    	   'type'      => 'checkbox'
     ));
	
	// Slider Section Start		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'literacy'),
            'priority' => null,
			'description'	=> __('Recommended image size (1420x567)','literacy'),	
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'literacy_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','literacy'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'literacy_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','literacy'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'literacy_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','literacy'),
			'section'	=> 'slider_section'
	));	
	
	
	$wp_customize->add_setting('hide_slider',array(
			'default' => true,
			'sanitize_callback' => 'literacy_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_slider', array(
		   'settings' => 'hide_slider',
    	   'section'   => 'slider_section',
    	   'label'     => __('Check this to hide slider','literacy'),
    	   'type'      => 'checkbox'
     ));
	 
	 $wp_customize->add_setting('slidelinktext',array(
			'default' => __('Read More','literacy'),
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'slidelinktext', array(
		   'settings' => 'slidelinktext',
    	   'section'   => 'slider_section',
    	   'label'     => __('Add slider link text here','literacy'),
    	   'type'      => 'text'
     ));	
	
	// Slider Section End

	
}
add_action( 'customize_register', 'literacy_customize_register' );

//Integer
function literacy_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function literacy_css(){
		?>
        <style>
				a, 
				.tm_client strong,
				.postmeta a:hover,
				#sidebar ul li a:hover,
				.blog-post h3.entry-title,
				.woocommerce ul.products li.product .price,
				h2.entry-title a:hover,
				#sidebar a:hover,
				.copyright a,
				.current-right h3 a,
				.top-left .fa-envelope, .top-left .fa-phone{
					color:<?php echo esc_html(get_theme_mod('color_scheme','#03a9f5')); ?>;
				}
				a.blog-more:hover,
				.nav-links .current, 
				.nav-links a:hover,
				#commentform input#submit,
				input.search-submit,
				.nivo-controlNav a.active,
				.blog-date .date,
				a.read-more,
				.contact-strip,
				.main-nav ul li.menu-item-has-children:hover a,
				.main-nav ul li a:hover,
				.main-nav ul li.current-menu-item a{
					background-color:<?php echo esc_html(get_theme_mod('color_scheme','#03a9f5')); ?>;
				}
		</style>
	<?php }
add_action('wp_head','literacy_css');

function literacy_custom_customize_enqueue() {
	wp_enqueue_script( 'literacy-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
	wp_localize_script( 'literacy-custom-customize', 'literacyjsvar', array(
	'upgrade' => __('Upgrade to PRO Version', 'literacy')
	));
}
add_action( 'customize_controls_enqueue_scripts', 'literacy_custom_customize_enqueue' );