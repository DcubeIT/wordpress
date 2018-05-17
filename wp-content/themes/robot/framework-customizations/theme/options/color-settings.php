<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'color' => array(
		'title'   => __( 'Colors', 'robot'),
		'type'    => 'tab',
		'options' => array(
			'lsi_header_colors_text'                      => array(
				'label' => __( 'Header Style', 'robot'),
				'type'  => 'html',
				'value' => '',
				'desc'  => __( 'Customize the header as You want.', 'robot'),
				'html'  => '',
			),
			'lsi_header_background_color' => array(
				'label' => __('Header Background Color', 'robot'),
				'type' => 'rgba-color-picker',
				'value' => '#111111',
				'desc' => __('Pick a color for header background.', 'robot'),
			),
			'lsi_footer_colors_text'                      => array(
				'label' => __( 'Footer Style', 'robot'),
				'type'  => 'html',
				'value' => '',
				'desc'  => __( 'Customize the footer as You want.', 'robot'),
				'html'  => '',
			),
			'lsi_fw_background_color' => array(
				'label' => __('Footer Widgets Background Color', 'robot'),
				'type' => 'rgba-color-picker',
				'value' => '#222222',
				'desc' => __('Pick a color for the background.', 'robot'),
			),
			'lsi_fwil_bc' => array(
				'label' => __('Footer Layer Color', 'robot'),
				'type' => 'rgba-color-picker',
				'value' => 'rgba(17,17,17,0.4)',
				'desc' => __('Pick a color for the background.', 'robot'),
			),
			'lsi_bf_bg' => array(
				'label' => __('Bottom Footer Background Color', 'robot'),
				'type' => 'rgba-color-picker',
				'value' => '#111111',
				'desc' => __('Pick a color for bottom footer background.',
					'robot'),
			),
		),
	),
);

