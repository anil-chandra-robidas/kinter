<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */
$options =[
    'style_settings' => [
            'title'		 => esc_html__( 'Style settings', 'kinter' ),
            'options'	 => [
                'theme_dark_mode_enable' => [
                    'type'			   => 'switch',
                    'label'			   => esc_html__( 'Enable Dark Mode', 'kinter' ),
                    'desc'			   => '' ,
                    'value'           => 'no',
                    'left-choice'	 => [
                        'value'	 => 'yes',
                        'label'	 => esc_html__('Yes', 'kinter'),
                    ],
                    'right-choice'	 => [
                        'value'	 => 'no',
                        'label'	 => esc_html__('No', 'kinter'),
                    ],
                ],
                'theme_dark_mode' => array(
                    'type' => 'multi-picker',
                    'picker' => 'theme_dark_mode_enable',
                    'choices' => array(
                        'yes' => array(
                            'theme_dark_mode_color' => array(
                                'type'  => 'color-picker',
                                'value' => '#101010',
                                'label'	        => esc_html__( 'Body background', 'kinter' ),
                                'desc'	           => esc_html__( 'Site\'s dark background color.', 'kinter' ),
                            ),
                        ),
                        'no' => array(
                            'style_body_bg' => [
                                'label'	        => esc_html__( 'Body background', 'kinter' ),
                                'desc'	           => esc_html__( 'Site\'s light background color.', 'kinter' ),
                                'type'	           => 'color-picker',
                                'value' => '#FFFFFF',
                             ],
                        )
                    )
                ),

                'style_primary' => [
                    'label'	        => esc_html__( 'Primary color', 'kinter' ),
                    'desc'	           => esc_html__( 'Site\'s main color.', 'kinter' ),
                    'type'	           => 'color-picker',
                    'value' => '#f63c25',
                ],

                'style_secondary' => [
                    'label'	        => esc_html__( 'Secondary color', 'kinter' ),
                    'desc'	           => esc_html__( 'Secondary color.', 'kinter' ),
                    'type'	           => 'color-picker',
                    'value' => '#e65b57',
                ],
                
                'title_color' => [
                    'label'	        => esc_html__( 'Title color', 'kinter' ),
                    'desc'	        => esc_html__( 'Blog title color.', 'kinter' ),
                    'type'	        => 'color-picker',
                    'value' => '#101010'
                ],

                'body_font'    => array(
                    'type' => 'typography-v2',
                    'label' => esc_html__('Body Font', 'kinter'),
                    'desc'  => esc_html__('Choose the typography for the title', 'kinter'),
                    'value' => array(
                        'family' => 'Barlow',
                        'size'  => '16',
                        'font-weight' => '400',
                        'line-height' => '26'
                    ),
                    'components' => array(
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ),
                ),
                
                'heading_font_one'	 => [
                    'type'		 => 'typography-v2',
                    'value'		 => [
                        'family'		 => 'Barlow',
                        'size'  => '36',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H1', 'kinter' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'kinter' ),
                ],

                'heading_font_two'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Barlow',
                        'size'        => '30',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H2 Fonts', 'kinter' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'kinter' ),
                ],

                'heading_font_three'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Barlow',
                        'size'        => '24',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H3 Fonts', 'kinter' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'kinter' ),
                ],            
                'heading_font_four'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Barlow',
                        'size'        => '18',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H4 Fonts', 'kinter' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'kinter' ),
                ],            
                'heading_font_five'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Barlow',
                        'size'        => '16',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H5 Fonts', 'kinter' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'kinter' ),
                ],            
                'heading_font_six'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Barlow',
                        'size'        => '14',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H6 Fonts', 'kinter' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'kinter' ),
                ],            
            ],
        ],
    ];