<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */
$footer_settings = kinter_option('theme_header_default_settings');
$footer_id = '';
$footer_builder_enable = kinter_option('header_builder_enable');
if($footer_builder_enable=='yes'){
    $footer_id =   $footer_settings['yes']['kinter_header_builder_select'];
}

$options =[
    'footer_settings' => [
        'title'		 => esc_html__( 'Footer settings', 'kinter' ),

        'options'	 => [
            'footer_builder_enable' => [
                'type'			   => 'switch',
                'label'			   => esc_html__( 'Footer builder Enable', 'kinter' ),
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

            'theme_footer_default_settings' => array(
                'type' => 'multi-picker',
                'picker' => 'footer_builder_enable',

                'choices' => array(
                    'yes' => array(
                        'kinter_footer_builder_select' =>array(
                            'type'  => 'select',

                            'attr'  => array( 'class' => 'kinter_header_builder_select', 'data-foo' => 'kinter_header_builder_select' ),
                            'label' => esc_html__('Footer style', 'kinter'),

                            'choices' => kinter_ekit_footers(),

                            'no-validate' => false,
                        ),
                        'edit_footer' => array(
                            'type'  => 'html',
                            'value' => '',

                            'label' => esc_html__('edit', 'kinter'),
                            'html'  => '<h3 class="header_builder_edit"><a class="kinter_header_builder_edit_link" target="_blank" href='. admin_url( 'post.php?action=elementor&post='.$footer_id ). '>'. esc_html__('Edit content here.', 'kinter'). '</a><h3>' ,
                        ),
                    ),



                    'no' => array(

                    )
                )
            ),
            'xs_footer_bg_color' => [
                'label'	 => esc_html__( 'Background color', 'kinter'),
                'type'	 => 'color-picker',
                'value'  => '#f2f2f2',
                'desc'	 => esc_html__( 'You can change the  background color with rgba color or solid color', 'kinter'),
            ],
            'xs_footer_text_color' => [
                'label'	 => esc_html__( 'Text color', 'kinter'),
                'type'	 => 'color-picker',
                'value'  => '#666666',
                'desc'	 => esc_html__( 'You can change the text color with rgba color or solid color', 'kinter'),
            ],
            'xs_footer_link_color' => [
                'label'	 => esc_html__( 'Link color', 'kinter'),
                'type'	 => 'color-picker',
                'value'  => '#666666',
                'desc'	 => esc_html__( 'You can change the text color with rgba color or solid color', 'kinter'),
            ],
            'xs_footer_widget_title_color' => [
                'label'	 => esc_html__( 'Widget Title color', 'kinter'),
                'type'	 => 'color-picker',
                'value'  => '#142355',
                'desc'	 => esc_html__( 'You can change the text color with rgba color or solid color', 'kinter'),
            ],
            'footer_bg_color' => [
                'label'	 => esc_html__( 'Copyright Background color', 'kinter'),
                'type'	 => 'color-picker',
                'value'  => '#000000',
                'desc'	 => esc_html__( 'You can change the copyright background color with rgba color or solid color', 'kinter'),
            ],
            'footer_copyright_color' => [
                'label'	 => esc_html__( 'Footer Copyright color', 'kinter'),
                'type'	 => 'color-picker',
                'desc'	 => esc_html__( 'You can change the footer\'s background color with rgba color or solid color', 'kinter'),
            ],
            'footer_social_links' => [
                'type'  => 'addable-popup',
                'template' => '{{- title }}',
                'popup-title' => null,
                'label' => esc_html__( 'Social links', 'kinter' ),
                'desc'  => esc_html__( 'Add social links and it\'s icon class bellow. These are all fontaweseome-4.7 icons.', 'kinter' ),
                'add-button-text' => esc_html__( 'Add new', 'kinter' ),
                'popup-options' => [
                    'title' => [
                        'type' => 'text',
                        'label'=> esc_html__( 'Title', 'kinter' ),
                    ],
                    'icon_class' => [
                        'type' => 'new-icon',
                        'label'=> esc_html__( 'Social icon', 'kinter' ),
                    ],
                    'url' => [
                        'type' => 'text',
                        'label'=> esc_html__( 'Social link', 'kinter' ),
                    ],
                ],
                'value' => [

                ],
            ],
            'footer_copyright'	 => [
                'type'	 => 'textarea',
                'value'  =>  esc_html__('&copy; 2021 kinter. All rights reserved','kinter'),
                'label'	 => esc_html__( 'Copyright text', 'kinter' ),
                'desc'	 => esc_html__( 'This text will be shown at the footer of all pages.', 'kinter' ),
            ],

            'footer_padding_top' => [
                'label'	        => esc_html__( 'Footer Padding Top', 'kinter' ),
                'desc'	        => esc_html__( 'Use Footer Padding Top', 'kinter' ),
                'type'	        => 'text',
                'value'         => '100px',
             ],
            'footer_padding_bottom' => [
                'label'	        => esc_html__( 'Footer Padding Bottom', 'kinter' ),
                'desc'	        => esc_html__( 'Use Footer Padding Bottom', 'kinter' ),
                'type'	        => 'text',
                'value'         => '100px',
             ],
             'back_to_top'				 => [
                'type'			 => 'switch',
                'value'			 => 'hello',
                'label'			 => esc_html__( 'Back to top', 'kinter'),
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'kinter'),
                ],
                'right-choice'	 => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'kinter'),
                ],
            ],

        ],

        ]
    ];