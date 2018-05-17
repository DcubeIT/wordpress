<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title' => __('General', 'robot'),
		'type' => 'tab',
		'options' => array(
			'lsi_theme_layout' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'value' => array(
					'type' => 'fullwidth', ),
				'picker' => array(
					'type' => array(
						'label' => __('Theme Layout', 'robot'),
						'type' => 'radio',
						'choices' => array(
							'fullwidth' => __('Fullwidth', 'robot'),
							'boxed' => __('Boxed', 'robot'),
							'sidepadding' => __('Side Padding', 'robot')
						),
					)
				),
				'choices' => array(
					'boxed' => array(
						'lsi_boxed_width'     => array(
							'label'      => __( 'Box Width', 'robot'),
							'type'       => 'slider',
							'value'      => 1200,
							'properties' => array(
								'min' => 1200,
								'max' => 1920,
								'sep' => 1,
							),
							'desc'       => __( 'The width of the box.', 'robot'),
						),
						'lsi_boxed_margin_top' => array(
							'label' => __('Margin Top', 'robot'),
							'type' => 'slider',
							'value' => 0,
							'desc' => __('Margin at the top of the box. (px)', 'robot'),
						),
						'lsi_boxed_margin_bottom' => array(
							'label' => __('Margin Bottom', 'robot'),
							'type' => 'slider',
							'value' => 0,
							'desc' => __('Margin at the bottom of the box. (px)', 'robot'),
						),
						'lsi_boxed_background_color' => array(
							'label' => __('Body Background Color', 'robot'),
							'type' => 'rgba-color-picker',
							'value' => '#000000',
							'desc' => __('Pick a color for the background.', 'robot'),
						),
						'lsi_boxed_background_image' => array(
							'label' => __('Body Background Image', 'robot'),
							'desc' => __('Upload an image for the background.', 'robot'),
							'type' => 'upload',
						),
						'lsi_boxed_image_size' => array(
							'label' => __('Body Background Image Size', 'robot'),
							'type' => 'short-select',
							'value' => 'inherit',
							'choices' => array(
								'inherit' => __( 'inherit', 'robot'),
								'initial' => __( 'initial', 'robot'),
								'cover' => __( 'cover', 'robot'),
								'contain' => __( 'contain', 'robot'),
							),
						),
						'lsi_boxed_image_repeat' => array(
							'label' => __('Body Background Image Repeat', 'robot'),
							'type' => 'short-select',
							'value' => 'no-repeat',
							'choices' => array(
								'no-repeat' => __( 'no-repeat', 'robot'),
								'repeat' => __( 'repeat', 'robot'),
								'repeat-x' => __( 'repeat-x', 'robot'),
								'repeat-y' => __( 'repeat-y', 'robot'),
							),
						),
						'lsi_boxed_image_fixed' => array(
							'label'        => __( 'Fixed Body Background Image', 'robot'),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'yes',
								'label' => __( 'Yes', 'robot')
							),
							'left-choice'  => array(
								'value' => 'no',
								'label' => __( 'No', 'robot')
							),
							'value'        => 'no',
						),
					),
					'sidepadding' => array(
						'lsi_sidepadding'     => array(
							'label'      => __( 'Padding Size', 'robot' ),
							'type'       => 'slider',
							'value'      => 10,
							'properties' => array(
								'min' => 0,
								'max' => 150,
								'sep' => 1,
							),
							'desc'       => __( 'Padding in px.', 'robot' ),
						),
						'lsi_sidepadding_background_color' => array(
							'label' => __('Body Background Color', 'robot'),
							'type' => 'rgba-color-picker',
							'value' => '#000000',
							'desc' => __('Pick a color for the background.', 'robot'),
						),
						'lsi_sidepadding_background_image' => array(
							'label' => __('Body Background Image', 'robot'),
							'desc' => __('Upload an image for the background.', 'robot'),
							'type' => 'upload',
						),
						'lsi_sidepadding_image_size' => array(
							'label' => __('Body Background Image Size', 'robot'),
							'type' => 'short-select',
							'value' => 'inherit',
							'choices' => array(
								'inherit' => __( 'inherit', 'robot'),
								'initial' => __( 'initial', 'robot'),
								'cover' => __( 'cover', 'robot'),
								'contain' => __( 'contain', 'robot'),
							),
						),
						'lsi_sidepadding_image_repeat' => array(
							'label' => __('Body Background Image Repeat', 'robot'),
							'type' => 'short-select',
							'value' => 'no-repeat',
							'choices' => array(
								'no-repeat' => __( 'no-repeat', 'robot'),
								'repeat' => __( 'repeat', 'robot'),
								'repeat-x' => __( 'repeat-x', 'robot'),
								'repeat-y' => __( 'repeat-y', 'robot'),
							),
						),
						'lsi_sidepadding_image_fixed' => array(
							'label'        => __( 'Fixed Body Background Image', 'robot' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'yes',
								'label' => __( 'Yes', 'robot' )
							),
							'left-choice'  => array(
								'value' => 'no',
								'label' => __( 'No', 'robot' )
							),
							'value'        => 'no',
						),
					),
				),
				'show_borders' => false,
			),
			'lsi_page_background_color' => array(
				'label' => __('Page Background Color', 'robot'),
				'type' => 'rgba-color-picker',
				'value' => '#111111',
				'desc' => __('Pick a color for page background',
					'robot'),
			),
			'lsi_page_background_image' => array(
				'label' => __('Page Background Image', 'robot'),
				'desc' => __('Upload an image for page background.', 'robot'),
				'type' => 'upload',
			),
			'lsi_page_image_size' => array(
				'label' => __('Page Background Image Size', 'robot'),
				'type' => 'short-select',
				'value' => 'inherit',
				'choices' => array(
					'inherit' => __( 'inherit', 'robot'),
					'initial' => __( 'initial', 'robot'),
					'cover'   => __( 'cover', 'robot'),
					'contain' => __( 'contain', 'robot'),
				),
			),
			'lsi_page_image_repeat' => array(
				'label' => __('Page Background Image Repeat', 'robot'),
				'type' => 'short-select',
				'value' => 'no-repeat',
				'choices' => array(
					'no-repeat'=> __( 'no-repeat', 'robot'),
					'repeat'   => __( 'repeat', 'robot'),
					'repeat-x' => __( 'repeat-x', 'robot'),
					'repeat-y' => __( 'repeat-y', 'robot'),
				),
			),
			'lsi_enable_responsive'                    => array(
				'label'        => __( 'Enable Responsive', 'robot'),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => __( 'Yes', 'robot')
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => __( 'No', 'robot')
				),
				'value'        => 'yes',
				'desc'         => __( 'Enable the responsive behaviour of the theme.', 'robot'),
			),
			'lsi_read_more_text' => array(
				'label' => __('Read More', 'robot'),
				'desc' => __('Default "Read more" text on buttons.', 'robot'),
				'type' => 'text',
				'value' => 'Read more'
			),
			'lsi_404_page'          => array(
				'label'   => __( 'Unique 404 Page', 'robot'),
				'desc'    => __( 'If You need unique design, select the 404 error page', 'robot'),
				'value'   => '',
				'type'    => 'select',
				'choices' => lakshmi_lite_all_pages(),
			),
			'lsi_gmap_key' => array(
				'label' => __( 'Google Maps', 'robot' ),
				'type'  => 'text',
				'desc' => sprintf( __( 'Create an account in %1$sGoogle Console%2$s and add the API Key.', 'robot' ), '<a target="_blank" href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true">', '</a>' )
			),
			'lsi_custom_css'          => array(
				'label'   => __( 'Custom CSS', 'robot' ),
				'desc'    => __( 'Add Your custom CSS here', 'robot' ),
				'value'   => '',
				'type'    => 'textarea',
			),
		)
	)
);