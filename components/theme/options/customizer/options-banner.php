<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: banner
 */


$options = [
    'banner_setting' => [
        'title' => esc_html__('Banner settings', 'kinter'),

        'options' => [
            'page_banner_setting' => [
                'type'        => 'popup',
                'label'       => esc_html__('Page Banner Settings', 'kinter'),
                'popup-title' => esc_html__('Page Banner Settings', 'kinter'),
                'button'      => esc_html__('Edit Page Banner', 'kinter'),
                'size'        => 'medium', // small, medium, large
                'popup-options' => [
                    'page_show_banner' => [
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show banner?', 'kinter' ),
                        'desc'          => esc_html__('Show or hide the banner', 'kinter'),
                        'value'         => 'yes',
                        'left-choice'	 => [
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'kinter' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'kinter' ),
                        ],
                    ],
                    'banner_page_title'	 => [
                        'type'	 => 'text',
                        'label'	 => esc_html__( 'Banner title', 'kinter' ),
                        'value'  => '',
                    ],
                    'banner_page_title_color' => [
                        'type'  => 'color-picker',
                        'value' => '#FFFFFF',
                        'label' => esc_html__('Title Color', 'kinter'),
                    ],
                    'banner_page_image'	 => [
                        'label'			 => esc_html__( 'Banner image', 'kinter' ),
                        'type'			 => 'upload',
                        'images_only'	 => true,
                        'files_ext'		 => array( 'jpg', 'png', 'jpeg', 'gif', 'svg' ),
                    ],
                ],
            ],

            'blog_banner_setting' => [
                'type'         => 'popup',
                'label'        => esc_html__('Blog banner settings', 'kinter'),
                'popup-title'  => esc_html__('Blog banner settings', 'kinter'),
                'button'       => esc_html__('Edit Blog Banner', 'kinter'),
                'size'         => 'medium', // small, medium, large
                'popup-options' => [
                    'blog_show_banner' => [
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show banner?', 'kinter' ),
                        'desc'          => esc_html__('Show or hide the banner', 'kinter'),
                        'value'         => 'yes',
                        'left-choice'	 => [
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'kinter' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'kinter' ),
                        ],
                    ],
                    'banner_blog_title'	 => [
                        'type'	 => 'text',
                        'label'	 => esc_html__( 'Banner title', 'kinter' ),
                    ],
                    'banner_blog_title_color' => [
                        'type'  => 'color-picker',
                        'value' => '#FFFFFF',
                        'label' => esc_html__('Title Color', 'kinter'),
                    ],
                    'banner_blog_image'	 =>array(
                        'type'  => 'upload',
                        'label' => esc_html__('Image', 'kinter'),
                        'desc'  => esc_html__('Banner blog image', 'kinter'),
                        'images_only' => true,
                        'files_ext' => array( 'PNG', 'JPEG', 'JPG','GIF'),
                    )

                ],
            ],

            'blog_single_banner_setting' => [
                'type'         => 'popup',
                'label'        => esc_html__('Blog Single banner settings', 'kinter'),
                'popup-title'  => esc_html__('Blog Single banner settings', 'kinter'),
                'button'       => esc_html__('Edit Blog Single Banner', 'kinter'),
                'size'         => 'medium', // small, medium, large
                'popup-options' => [
                    'blog_single_show_banner' => [
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show banner?', 'kinter' ),
                        'desc'          => esc_html__('Show or hide the banner', 'kinter'),
                        'value'         => 'yes',
                        'left-choice'	 => [
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'kinter' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'kinter' ),
                        ],
                    ],
                    'banner_single_blog_title_color' => [
                        'type'  => 'color-picker',
                        'value' => '#FFFFFF',
                        'label' => esc_html__('Title Color', 'kinter'),
                    ],
                    'banner_single_blog_image'	 =>array(
                        'type'  => 'upload',
                        'label' => esc_html__('Image', 'kinter'),
                        'desc'  => esc_html__('Banner blog image', 'kinter'),
                        'images_only' => true,
                        'files_ext' => array( 'PNG', 'JPEG', 'JPG','GIF'),
                    )

                ],
            ],

            'custom_post_banner_settings' => [
                'type'         => 'popup',
                'label'        => esc_html__('Trainer banner settings', 'kinter'),
                'popup-title'  => esc_html__('Trainer banner settings', 'kinter'),
                'button'       => esc_html__('Edit Trainer Post Banner', 'kinter'),
                'size'         => 'medium', // small, medium, large
                'popup-options' => [
                    'custom_post_show_banner' => [
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show banner?', 'kinter' ),
                        'desc'          => esc_html__('Show or hide the banner', 'kinter'),
                        'value'         => 'yes',
                        'left-choice'	 => [
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'kinter' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'kinter' ),
                        ],
                    ],
                    'custom_post_banner_title_color' => [
                        'type'  => 'color-picker',
                        'value' => '#FFFFFF',
                        'label' => esc_html__('Title Color', 'kinter'),
                    ],
                    'custom_post_banner_image'	 =>array(
                        'type'  => 'upload',
                        'label' => esc_html__('Image', 'kinter'),
                        'desc'  => esc_html__('Banner blog image', 'kinter'),
                        'images_only' => true,
                        'files_ext' => array( 'PNG', 'JPEG', 'JPG','GIF'),
                    )

                ],
            ],
        ],
    ],
];