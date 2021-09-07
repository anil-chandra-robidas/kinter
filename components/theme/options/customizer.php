<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * options for wp customizer
 * section name format: kinter_section_{section name}
 */
$options = [
	'kinter_section_theme_settings' => [
		'title'				 => esc_html__( 'Theme settings', 'kinter' ),
		'options'			 => Kinter_Theme_Includes::_customizer_options(),
		'wp-customizer-args' => [
			'priority' => 1,
		],
	],
];
