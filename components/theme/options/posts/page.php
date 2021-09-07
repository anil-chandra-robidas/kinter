<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * metabox options for pages
 */
$options = array(
	'settings-page' => array(
		'title'		 => esc_html__( 'Page settings', 'kinter' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => array(
			'show_header' => array(
				'type'  => 'switch',
				'value' => 'yes',
				'label' => esc_html__('Show banner', 'kinter'),
				'desc'  => esc_html__('Turn on off banner', 'kinter'),
				'left-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'kinter'),
				),
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'kinter'),
				),
			),
			'header_title'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Banner title', 'kinter' ),
				'desc'	 => esc_html__( 'Add your Page hero title', 'kinter' ),
			),
			'header_image'	 => array(
				'label'	 => esc_html__( 'Banner image', 'kinter' ),
				'desc'	 => esc_html__( 'Upload a page header image', 'kinter' ),
				'help'	 => esc_html__( "This default header image will be used for all your service.", 'kinter' ),
				'type'	 => 'upload'
		   ),
        ),
	),
);