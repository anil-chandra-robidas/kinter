<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */

$options =[
    'general_settings' => [
            'title'		 => esc_html__( 'General settings', 'kinter' ),
            'options'	 => [
                'general_main_logo' => [
                    'label'	        => esc_html__( 'logo', 'kinter' ),
                    'desc'	           => esc_html__( 'It\'s the main logo, mostly it will be shown on "Default Menu" type area.', 'kinter' ),
                    'type'	           => 'upload',
                    'image_only'      => true,
                 ],
                
            ],
        ],
    ];
