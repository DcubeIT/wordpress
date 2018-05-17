<?php
	add_action( 'wp_enqueue_scripts', 'gymfitness_enqueue_styles' );
	function gymfitness_enqueue_styles() {
	    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	}
	
	function gymfitness_customize_register( $wp_customize ) {
		//home page slider
		$wp_customize->add_section( 'gymfitness_pricing' , array(
	    	'title'      => __( 'Pricing Plan', 'gymfitness' ),
			'panel' => 'vw_fitness_panel_id'
		));

		$wp_customize->add_setting('gymfitness_pricesec_title',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));
		$wp_customize->add_control('gymfitness_pricesec_title',array(
			'label'	=> __('Enter Title','gymfitness'),
			'section'	=> 'gymfitness_pricing',
			'type'	=> 'text'
		));

		$gymfitness_pricing_number_count =  get_theme_mod('gymfitness_pricing_number', 4);
		for($i=1;$i<=$gymfitness_pricing_number_count;$i++) {
			$wp_customize->add_setting('gymfitness_price_value'.$i,array(
				'default'	=> '',
				'sanitize_callback'	=> 'sanitize_text_field',
			));
			$wp_customize->add_control('gymfitness_price_value'.$i,array(
				'label'	=> __('Enter the price ','gymfitness'),
				'section'	=> 'gymfitness_pricing',
				'type'	=> 'text'
			));
			$wp_customize->add_setting('gymfitness_price_title'.$i,array(
				'default'	=> '',
				'sanitize_callback'	=> 'sanitize_text_field',
			));

			$wp_customize->add_control('gymfitness_price_title'.$i,array(
				'label'	=> __('Service name ','gymfitness'),
				'section'	=> 'gymfitness_pricing',
				'type'	=> 'text'
			));
			$wp_customize->add_setting('gymfitness_price_subcontent'.$i,array(
				'default'	=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			));
			$wp_customize->add_control('gymfitness_price_subcontent'.$i,array(
				'label'	=> __('Content','gymfitness'),
				'section'	=> 'gymfitness_pricing',
				'type'	=> 'text'
			));
			$wp_customize->add_setting('gymfitness_price_subcontent1'.$i,array(
				'default'	=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			));
			$wp_customize->add_control('gymfitness_price_subcontent1'.$i,array(
				'label'	=> __('Content','gymfitness'),
				'section'	=> 'gymfitness_pricing',
				'type'	=> 'text'
			));
			$wp_customize->add_setting('gymfitness_price_subcontent2'.$i,array(
				'default'	=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			));
			$wp_customize->add_control('gymfitness_price_subcontent2'.$i,array(
				'label'	=> __('Content','gymfitness'),
				'section'	=> 'gymfitness_pricing',
				'type'	=> 'text'
			));
			$wp_customize->add_setting('gymfitness_price_subcontent3'.$i,array(
				'default'	=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			));
			$wp_customize->add_control('gymfitness_price_subcontent3'.$i,array(
				'label'	=> __('Content','gymfitness'),
				'section'	=> 'gymfitness_pricing',
				'type'	=> 'text'
			));
			$wp_customize->add_setting('gymfitness_price_subcontent4'.$i,array(
				'default'	=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			));
			$wp_customize->add_control('gymfitness_price_subcontent4'.$i,array(
				'label'	=> __('Content','gymfitness'),
				'section'	=> 'gymfitness_pricing',
				'type'	=> 'text'
			));
			$wp_customize->add_setting('gymfitness_sign-up_button_text'.$i,array(
				'default'	=> '',
				'sanitize_callback'	=> 'sanitize_text_field',
			));
			$wp_customize->add_control('gymfitness_sign-up_button_text'.$i,array(
				'label'	=> __('Button text','gymfitness'),
				'section'	=> 'gymfitness_pricing',
				'type'		=> 'text'
			));
			$wp_customize->add_setting('gymfitness_sign-up_link'.$i,array(
				'default'	=> '',
				'sanitize_callback'	=> 'esc_url_raw',
			));
			$wp_customize->add_control('gymfitness_sign-up_link'.$i,array(
				'label'	=> __('Button Link','gymfitness'),
				'section'	=> 'gymfitness_pricing',
				'type'		=> 'text'
			));
		}
	}
	add_action( 'customize_register', 'gymfitness_customize_register');

	define('GYMFITNESS_CREDIT','https://wordpress.org/','gymfitness');

	if ( ! function_exists( 'gymfitness_credit' ) ) {
		function gymfitness_credit(){
			echo "<a href=".esc_url(GYMFITNESS_CREDIT)." target='_blank' rel='nofollow'>wordpress.org</a>";
		}
	}

	/*function gymfitness_before_headerblog() {	
		echo "hello";	
	}	
	add_action('gymfitness_before_headerblog','gymfitness_before_headerblog');*/


?>