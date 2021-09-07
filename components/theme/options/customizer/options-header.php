<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: Header
 */

$header_settings = kinter_option('theme_header_default_settings');
$header_id = '';
$header_builder_enable = kinter_option('header_builder_enable');
if($header_builder_enable=='yes'){
    $header_id =   $header_settings['yes']['kinter_header_builder_select'];
}

$options =[
    'header_settings' => [
        'title'		 => esc_html__( 'Header settings', 'kinter' ),

        'options'	 => [
            'header_builder_enable' => [
                'type'			   => 'switch',
                'label'			   => esc_html__( 'Header builder Enable', 'kinter' ),
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

            'theme_header_default_settings' => array(
                'type' => 'multi-picker',
                'picker' => 'header_builder_enable',
                'choices' => array(
                    'yes' => array(
                        'kinter_header_builder_select' =>array(
                            'type'  => 'select',

                            'attr'  => array( 'class' => 'kinter_header_builder_select', 'data-foo' => 'kinter_header_builder_select' ),
                            'label' => esc_html__('Header style', 'kinter'),

                            'choices' => kinter_ekit_headers(),

                            'no-validate' => false,
                        ),
                        'edit_header' => array(
                            'type'  => 'html',
                            'value' => '',

                            'label' => esc_html__('edit', 'kinter'),
                            'html'  => '<h3 class="header_builder_edit"><a class="kinter_header_builder_edit_link" target="_blank" href='. admin_url( 'post.php?action=elementor&post='.$header_id ). '>'. esc_html__('Edit content here.', 'kinter'). '</a><h3>' ,
                        ),
                    ),
                    'no' => array(

                    )
                )
            ),
             'header_nav_sticky' => [
               'type'			   => 'switch',
               'label'			   => esc_html__( 'Sticky header', 'kinter' ),
               'desc'			   => esc_html__('Do you want to enable sticky nav?', 'kinter' ),
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



             'header_top_info_show' => [
               'type'			    => 'switch',
               'label'			 => esc_html__( 'Show Topbar', 'kinter' ),
               'desc'			    => esc_html__( 'Do you want to show topbar?', 'kinter' ),
               'value'          => 'no',
               'left-choice'	 => [
                   'value'	 => 'yes',
                   'label'	 => esc_html__('Yes', 'kinter'),
               ],

               'right-choice'	 => [
                   'value'	 => 'no',
                   'label'	 => esc_html__('No', 'kinter'),
                  ],
               ],

               'header_contact_mail' => [
                  'type'			    => 'text',
                  'label'			    => esc_html__( 'Contact mail', 'kinter' ),
                  'desc'			    => esc_html__( 'Give mail.', 'kinter' ),
                  'value'            => esc_html__('contact@domain.com','kinter'),
               ],

               'header_contact_address' => [
                  'type'			    => 'text',
                  'label'		    	 => esc_html__( 'Contact address title', 'kinter' ),
                  'desc'			    => esc_html__( 'Give office address.', 'kinter' ),
                  'value'            => esc_html__('105 Roosevelt Street CA','kinter'),
               ],

               'header_Contact_number' => [
                  'type'			    => 'text',
                  'label'		    	 => esc_html__( 'Contact number title', 'kinter' ),
                  'desc'			    => esc_html__( 'Give Contact Number for header  style 3.', 'kinter' ),
                  'value'            => esc_html__('+1 212-554-1515','kinter'),
               ],
               'header_nav_search_section' => [
                  'type'			 => 'switch',
                  'label'		    => esc_html__( 'Search button show', 'kinter' ),
                  'desc'			 => esc_html__( 'Do you want to show search button in header ?', 'kinter' ),
                  'value'         => 'no',
                  'left-choice'	 => [
                     'value'     => 'yes',
                     'label'	   => esc_html__( 'Yes', 'kinter' ),
                  ],
                  'right-choice'	 => [
                     'value'	 => 'no',
                     'label'	 => esc_html__( 'No', 'kinter' ),
                  ],
                ],


                'header_quota_button' => array(
                  'type'         => 'multi-picker',
                  'label'        => false,
                  'desc'         => false,
                  'picker'       => array(
                      'style' => array(
                          'type'			 => 'switch',
                          'label'		 => esc_html__( 'Show CTA button ', 'kinter' ),
                          'value'       => 'no',
                          'left-choice'	 => [
                             'value'   	     => 'yes',
                             'label'	        => esc_html__( 'Yes', 'kinter' ),
                          ],
                          'right-choice'	 => [
                             'value'	 => 'no',
                             'label'	 => esc_html__( 'No', 'kinter' ),
                          ],

                      )
                  ),
                  'choices'      => array(
                       'yes' => array(
                        'header_quota_text' => [
                           'type'			    => 'text',
                           'label'			    => esc_html__( 'Quote text', 'kinter' ),
                           'desc'			    => esc_html__( 'Navigation quote text.', 'kinter' ),
                           'value'            => esc_html__('Get a quote','kinter'),
                        ],
                       'header_quota_url' => [
                           'type'			    => 'text',
                           'label'			    => esc_html__( 'Quote link', 'kinter' ),
                           'desc'			    => esc_html__( 'Navigation quote link.', 'kinter' ),
                           'value'            => esc_html__('#','kinter'),
                        ],
                       ),



                  ),
                  'show_borders' => false,
              ),




        ], //Options end
    ]
];