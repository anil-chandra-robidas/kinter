<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: blog
 */

$options =[
    'blog_settings' => [
        'title'		 => esc_html__( 'Blog settings', 'kinter' ),

        'options'	 => [
            'post_layout' => [
                'label'	        => esc_html__( 'Post layout', 'kinter' ),
                'desc'	        => esc_html__( 'blog post\'s layout style.', 'kinter' ),
                'type'	        => 'image-picker',
                'choices'       => [
                    'style1'    => [
                        'small'     => KINTER_IMG . '/admin/post-layout/post_style1.jpg',
                        'large'     => KINTER_IMG . '/admin/post-layout/post_style1.jpg',
                    ],
                    'style2'    => [
                        'small'     => KINTER_IMG . '/admin/post-layout/post_style2.jpg',
                        'large'     => KINTER_IMG . '/admin/post-layout/post_style2.jpg',
                    ],
                    
                ],
                'value'         => 'style1',
            ],
           
            'blog_sidebar' =>[
                'type'  => 'select',
                              
                'label' => esc_html__('Sidebar', 'kinter'),
                'desc'  => esc_html__('Description', 'kinter'),
                'help'  => esc_html__('Help tip', 'kinter'),
                'choices' => array(
                    '1' => esc_html__('No sidebar','kinter'),
                    '2' => esc_html__('Left Sidebar', 'kinter'),
                    '3' => esc_html__('Right Sidebar', 'kinter'),
                 
                 ),
              
                'no-validate' => false,
            ],   

            'blog_author' => [
                'type'			 => 'switch',
                'label'			 => esc_html__( 'Blog author', 'kinter' ),
                'desc'			 => esc_html__( 'Do you want to show blog author?', 'kinter' ),
                'value'          => 'no',
                'left-choice' => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'kinter' ),
                ],
                'right-choice' => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'kinter' ),
                ],
           ],
            'blog_related_post' => [
                'type'			 => 'switch',
                'label'			 => esc_html__( 'Blog related post', 'kinter' ),
                'desc'			 => esc_html__( 'Do you want to show single blog related post?', 'kinter' ),
                'value'          => 'no',
                'left-choice' => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'kinter' ),
                ],
                'right-choice' => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'kinter' ),
                ],
           ],

           'blog_related_post_number' => [
            'label'	 => esc_html__( 'Related post count', 'kinter' ),
            'type'	 => 'text',
            'value'	 => 3,
           ],
        ],
            
        ]
    ];