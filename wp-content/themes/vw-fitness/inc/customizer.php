<?php
/**
 * VW Fitness Theme Customizer
 *
 * @package VW Fitness
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_fitness_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_fitness_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-fitness' ),
	    'description' => __( 'Description of what this panel does.', 'vw-fitness' ),
	) );

	//Layouts
	$wp_customize->add_section( 'vw_fitness_left_right', array(
    	'title'      => __( 'Theme Layout Settings', 'vw-fitness' ),
		'priority'   => 30,
		'panel' => 'vw_fitness_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_fitness_theme_options',array(
	        'default' => __('Left Sidebar','vw-fitness'),
	        'sanitize_callback' => 'vw_fitness_sanitize_choices'
	    )
    );

	$wp_customize->add_control('vw_fitness_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __( 'Do you want this section', 'vw-fitness' ),
	        'section' => 'vw_fitness_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','vw-fitness'),
	            'Right Sidebar' => __('Right Sidebar','vw-fitness'),
	            'One Column' => __('One Column','vw-fitness'),
	            'Three Columns' => __('Three Columns','vw-fitness'),
	            'Four Columns' => __('Four Columns','vw-fitness'),
	            'Grid Layout' => __('Grid Layout','vw-fitness')
	        ),
	    )
    );

	$font_array = array(
        '' => __( 'No Fonts', 'vw-fitness' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-fitness' ),
        'Acme' => __( 'Acme', 'vw-fitness' ),
        'Anton' => __( 'Anton', 'vw-fitness' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-fitness' ),
        'Arimo' => __( 'Arimo', 'vw-fitness' ),
        'Arsenal' => __( 'Arsenal', 'vw-fitness' ),
        'Arvo' => __( 'Arvo', 'vw-fitness' ),
        'Alegreya' => __( 'Alegreya', 'vw-fitness' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-fitness' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-fitness' ),
        'Bangers' => __( 'Bangers', 'vw-fitness' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-fitness' ),
        'Bad Script' => __( 'Bad Script', 'vw-fitness' ),
        'Bitter' => __( 'Bitter', 'vw-fitness' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-fitness' ),
        'BenchNine' => __( 'BenchNine', 'vw-fitness' ),
        'Cabin' => __( 'Cabin', 'vw-fitness' ),
        'Cardo' => __( 'Cardo', 'vw-fitness' ),
        'Courgette' => __( 'Courgette', 'vw-fitness' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-fitness' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-fitness' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-fitness' ),
        'Cuprum' => __( 'Cuprum', 'vw-fitness' ),
        'Cookie' => __( 'Cookie', 'vw-fitness' ),
        'Chewy' => __( 'Chewy', 'vw-fitness' ),
        'Days One' => __( 'Days One', 'vw-fitness' ),
        'Dosis' => __( 'Dosis', 'vw-fitness' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-fitness' ),
        'Economica' => __( 'Economica', 'vw-fitness' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-fitness' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-fitness' ),
        'Francois One' => __( 'Francois One', 'vw-fitness' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-fitness' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-fitness' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-fitness' ),
        'Handlee' => __( 'Handlee', 'vw-fitness' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-fitness' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-fitness' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-fitness' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-fitness' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-fitness' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-fitness' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-fitness' ),
        'Kanit' => __( 'Kanit', 'vw-fitness' ),
        'Lobster' => __( 'Lobster', 'vw-fitness' ),
        'Lato' => __( 'Lato', 'vw-fitness' ),
        'Lora' => __( 'Lora', 'vw-fitness' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-fitness' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-fitness' ),
        'Merriweather' => __( 'Merriweather', 'vw-fitness' ),
        'Monda' => __( 'Monda', 'vw-fitness' ),
        'Montserrat' => __( 'Montserrat', 'vw-fitness' ),
        'Muli' => __( 'Muli', 'vw-fitness' ),
        'Marck Script' => __( 'Marck Script', 'vw-fitness' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-fitness' ),
        'Open Sans' => __( 'Open Sans', 'vw-fitness' ),
        'Overpass' => __( 'Overpass', 'vw-fitness' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-fitness' ),
        'Oxygen' => __( 'Oxygen', 'vw-fitness' ),
        'Orbitron' => __( 'Orbitron', 'vw-fitness' ),
        'Patua One' => __( 'Patua One', 'vw-fitness' ),
        'Pacifico' => __( 'Pacifico', 'vw-fitness' ),
        'Padauk' => __( 'Padauk', 'vw-fitness' ),
        'Playball' => __( 'Playball', 'vw-fitness' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-fitness' ),
        'PT Sans' => __( 'PT Sans', 'vw-fitness' ),
        'Philosopher' => __( 'Philosopher', 'vw-fitness' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-fitness' ),
        'Poiret One' => __( 'Poiret One', 'vw-fitness' ),
        'Quicksand' => __( 'Quicksand', 'vw-fitness' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-fitness' ),
        'Raleway' => __( 'Raleway', 'vw-fitness' ),
        'Rubik' => __( 'Rubik', 'vw-fitness' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-fitness' ),
        'Russo One' => __( 'Russo One', 'vw-fitness' ),
        'Righteous' => __( 'Righteous', 'vw-fitness' ),
        'Slabo' => __( 'Slabo', 'vw-fitness' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-fitness' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-fitness'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-fitness' ),
        'Sacramento' => __( 'Sacramento', 'vw-fitness' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-fitness' ),
        'Tangerine' => __( 'Tangerine', 'vw-fitness' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-fitness' ),
        'VT323' => __( 'VT323', 'vw-fitness' ),
        'Varela Round' => __( 'Varela Round', 'vw-fitness' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-fitness' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-fitness' ),
        'Volkhov' => __( 'Volkhov', 'vw-fitness' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-fitness' )
    );

	//Typography
	$wp_customize->add_section( 'vw_fitness_typography', array(
    	'title'      => __( 'Typography', 'vw-fitness' ),
		'priority'   => 30,
		'panel' => 'vw_fitness_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'vw_fitness_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_fitness_paragraph_color', array(
		'label' => __('Paragraph Color', 'vw-fitness'),
		'section' => 'vw_fitness_typography',
		'settings' => 'vw_fitness_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('vw_fitness_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_fitness_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_fitness_paragraph_font_family', array(
	    'section'  => 'vw_fitness_typography',
	    'label'    => __( 'Paragraph Fonts','vw-fitness'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('vw_fitness_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_fitness_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','vw-fitness'),
		'section'	=> 'vw_fitness_typography',
		'setting'	=> 'vw_fitness_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'vw_fitness_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_fitness_atag_color', array(
		'label' => __('"a" Tag Color', 'vw-fitness'),
		'section' => 'vw_fitness_typography',
		'settings' => 'vw_fitness_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('vw_fitness_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_fitness_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_fitness_atag_font_family', array(
	    'section'  => 'vw_fitness_typography',
	    'label'    => __( '"a" Tag Fonts','vw-fitness'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'vw_fitness_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_fitness_li_color', array(
		'label' => __('"li" Tag Color', 'vw-fitness'),
		'section' => 'vw_fitness_typography',
		'settings' => 'vw_fitness_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('vw_fitness_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_fitness_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_fitness_li_font_family', array(
	    'section'  => 'vw_fitness_typography',
	    'label'    => __( '"li" Tag Fonts','vw-fitness'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'vw_fitness_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_fitness_h1_color', array(
		'label' => __('H1 Color', 'vw-fitness'),
		'section' => 'vw_fitness_typography',
		'settings' => 'vw_fitness_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('vw_fitness_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_fitness_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_fitness_h1_font_family', array(
	    'section'  => 'vw_fitness_typography',
	    'label'    => __( 'H1 Fonts','vw-fitness'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('vw_fitness_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_fitness_h1_font_size',array(
		'label'	=> __('H1 Font Size','vw-fitness'),
		'section'	=> 'vw_fitness_typography',
		'setting'	=> 'vw_fitness_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'vw_fitness_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_fitness_h2_color', array(
		'label' => __('h2 Color', 'vw-fitness'),
		'section' => 'vw_fitness_typography',
		'settings' => 'vw_fitness_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('vw_fitness_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_fitness_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_fitness_h2_font_family', array(
	    'section'  => 'vw_fitness_typography',
	    'label'    => __( 'h2 Fonts','vw-fitness'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('vw_fitness_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_fitness_h2_font_size',array(
		'label'	=> __('h2 Font Size','vw-fitness'),
		'section'	=> 'vw_fitness_typography',
		'setting'	=> 'vw_fitness_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'vw_fitness_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_fitness_h3_color', array(
		'label' => __('h3 Color', 'vw-fitness'),
		'section' => 'vw_fitness_typography',
		'settings' => 'vw_fitness_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('vw_fitness_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_fitness_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_fitness_h3_font_family', array(
	    'section'  => 'vw_fitness_typography',
	    'label'    => __( 'h3 Fonts','vw-fitness'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('vw_fitness_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_fitness_h3_font_size',array(
		'label'	=> __('h3 Font Size','vw-fitness'),
		'section'	=> 'vw_fitness_typography',
		'setting'	=> 'vw_fitness_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'vw_fitness_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_fitness_h4_color', array(
		'label' => __('h4 Color', 'vw-fitness'),
		'section' => 'vw_fitness_typography',
		'settings' => 'vw_fitness_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('vw_fitness_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_fitness_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_fitness_h4_font_family', array(
	    'section'  => 'vw_fitness_typography',
	    'label'    => __( 'h4 Fonts','vw-fitness'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('vw_fitness_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_fitness_h4_font_size',array(
		'label'	=> __('h4 Font Size','vw-fitness'),
		'section'	=> 'vw_fitness_typography',
		'setting'	=> 'vw_fitness_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'vw_fitness_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_fitness_h5_color', array(
		'label' => __('h5 Color', 'vw-fitness'),
		'section' => 'vw_fitness_typography',
		'settings' => 'vw_fitness_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('vw_fitness_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_fitness_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_fitness_h5_font_family', array(
	    'section'  => 'vw_fitness_typography',
	    'label'    => __( 'h5 Fonts','vw-fitness'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('vw_fitness_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_fitness_h5_font_size',array(
		'label'	=> __('h5 Font Size','vw-fitness'),
		'section'	=> 'vw_fitness_typography',
		'setting'	=> 'vw_fitness_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'vw_fitness_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_fitness_h6_color', array(
		'label' => __('h6 Color', 'vw-fitness'),
		'section' => 'vw_fitness_typography',
		'settings' => 'vw_fitness_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('vw_fitness_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_fitness_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_fitness_h6_font_family', array(
	    'section'  => 'vw_fitness_typography',
	    'label'    => __( 'h6 Fonts','vw-fitness'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('vw_fitness_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_fitness_h6_font_size',array(
		'label'	=> __('h6 Font Size','vw-fitness'),
		'section'	=> 'vw_fitness_typography',
		'setting'	=> 'vw_fitness_h6_font_size',
		'type'	=> 'text'
	));	

	//home page slider
	$wp_customize->add_section( 'vw_fitness_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-fitness' ),
		'priority'   => 30,
		'panel' => 'vw_fitness_panel_id'
	) );

	for ( $count = 1; $count <= 3; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_fitness_slidersettings-page-' . $count, array(
				'default'           => '',
				'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'vw_fitness_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-fitness' ),
			'section'  => 'vw_fitness_slidersettings',
			'type'     => 'dropdown-pages'
		) );

	}

	//OUR services
	$wp_customize->add_section('vw_fitness_our_services',array(
		'title'	=> __('Our Services','vw-fitness'),
		'description'=> __('This section will appear below the slider.','vw-fitness'),
		'panel' => 'vw_fitness_panel_id',
	));	

	for ( $count = 0; $count <= 3; $count++ ) {

		$wp_customize->add_setting( 'vw_fitness_servicesettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		));
		$wp_customize->add_control( 'vw_fitness_servicesettings-page-' . $count, array(
			'label'    => __( 'Select Service Page', 'vw-fitness' ),
			'section'  => 'vw_fitness_our_services',
			'type'     => 'dropdown-pages'
		));
	}

	//Footer Text
	$wp_customize->add_section('vw_fitness_footer',array(
		'title'	=> __('Footer Text','vw-fitness'),
		'description'=> __('This section will appear in footer.','vw-fitness'),
		'panel' => 'vw_fitness_panel_id',
	));
	
	
	$wp_customize->add_setting('vw_fitness_footer_copy',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_fitness_footer_copy',array(
		'label'	=> __('Copyright Text','vw-fitness'),
		'section'=> 'vw_fitness_footer',
		'setting'=> 'vw_fitness_footer_copy',
		'type'=> 'text'
	));	
	
}
add_action( 'customize_register', 'vw_fitness_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vw_fitness_customize_preview_js() {
	wp_enqueue_script( 'vw_fitness_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'vw_fitness_customize_preview_js' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class vw_fitness_customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'vw_fitness_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new vw_fitness_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'VW Fitness Pro Theme', 'vw-fitness' ),
					'pro_text' => esc_html__( 'Upgrade Pro', 'vw-fitness' ),
					'pro_url'  => 'https://www.vwthemes.com/premium/gym-fitness-wordpress-theme/'
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-fitness-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-fitness-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
vw_fitness_customize::get_instance();