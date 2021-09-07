<?php

class Customizer extends \Devmonsta\Libs\Customizer
{

    public function register_controls()
    {

        /**
         * Add parent panels
         */

        include_once(get_template_directory(  ) . '/core/helpers/functions/global.php');

        $this->add_panel([
            'id'             => 'xs_theme_option_panel',
            'priority'       => 0,
            'theme_supports' => '',
            'title'          => esc_html__('Theme settings', 'kinter'),
            'description'    => esc_html__('Theme options panel', 'kinter'),
        ]);


        /**
         * General settings here
         */
        $this->add_section([
            'id'       => 'general_settings_section',
            'title'    => esc_html__('Optional Settings', 'kinter'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 20,
        ]);

        $this->add_control([
            'id'          => 'general_main_logo',
            'type'        => 'media',
            'section'     => 'general_settings_section',
            'label'       => esc_html__('Main Logo', 'kinter'),
            'description' => esc_html__( 'This is default logo. Our most of the menu built with elemnetsKit header builder. Go to header settings->Header builder enable->  and click "edit header content" to change the logo', 'kinter' ),
        ]);

        $this->add_control([
            'id'          => 'general_footer_logo',
            'type'        => 'media',
            'section'     => 'general_settings_section',
            'label'       => esc_html__('Footer Logo', 'kinter'),
            'description' => esc_html__( 'This is default footer logo. Our most of the menu built with elemnetsKit footer builder. Go to footer settings->Footer builder enable->  and click "edit footer content" to change the logo', 'kinter' ),
        ]);

        /**
         * Header settings here
         */
        $this->add_section([
            'id'       => 'xs_header_settings_section',
            'title'    => esc_html__('Header Settings', 'kinter'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 10,
        ]);

        /**
         * Header builder switch here
         */
        $this->add_control([
            'id'      => 'header_builder_enable',
            'type'    => 'switcher',
            'default' => 'no',
            'label'   => esc_html__('Header builder Enable ?', 'kinter'),
            'desc'    => esc_html__('Do you want to enable n in header ?', 'kinter'),
            'section' => 'xs_header_settings_section',
            'attr'    => ['class' => 'xs_header_builder_switch'],
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'      => 'header_builder_select',
            'type'    => 'select',
            'value'   => '0',
            'label'   => esc_html__('Header', 'kinter'),
            'section' => 'xs_header_settings_section',
            'choices' => kinter_ekit_headers(),
            'attr'    => ['class' => 'xs_header_builder_select'],
            'conditions' => [
                [
                    'control_name'  => 'header_builder_enable',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        $this->add_control([
            'id'      => 'header_builder_select_html',
            'section' => 'xs_header_settings_section',
            'type'    => 'html',
            'value'   => '<h2 class="header_builder_edit"><a class="xs_builder_edit_link" style="text-transform: uppercase; color:green" target="_blank" href="#">'. esc_html('Edit content here.'). '</a><h2><h3><a style="text-transform: uppercase; color:#17a2b8" target="_blank" href="https://support.xpeedstudio.com/knowledgebase/customize-kinter-header-and-footer-builder/">'. esc_html__('How to edit header', 'kinter'). '</a><h3>',
            'attr'    => ['class' => 'xs_header_builder_html'],
            'conditions' => [
                [
                    'control_name'  => 'header_builder_enable',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        $this->add_control([
            'id'      => 'header_nav_sticky',
            'type'    => 'switcher',
            'default' => 'right-choice',
            'label'   => esc_html__('Sticky header', 'kinter'),
            'desc'    => esc_html__('Do you want to enable sticky nav?', 'kinter'),
            'section' => 'xs_header_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'      => 'header_nav_search_section',
            'type'    => 'switcher',
            'default' => 'right-choice',
            'label'   => esc_html__('Search button show', 'kinter'),
            'desc'    => esc_html__('Do you want to show search button in header?', 'kinter'),
            'section' => 'xs_header_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'      => 'header_quota_button',
            'type'    => 'switcher',
            'default' => 'right-choice',
            'label'   => esc_html__('Show Quote button', 'kinter'),
            'section' => 'xs_header_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'          => 'header_quota_text',
            'type'        => 'text',
            'label'       => esc_html__('Quote text', 'kinter'),
            'description' => esc_html__('Navigation quote text.', 'kinter'),
            'default'     => esc_html__('Get a quote', 'kinter'),
            'section'     => 'xs_header_settings_section',
            'conditions' => [
                [
                    'control_name'  => 'header_quota_button',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        $this->add_control([
            'id'          => 'header_quota_url',
            'type'        => 'url',
            'label'       => esc_html__('Quote link', 'kinter'),
            'description' => esc_html__('Navigation quote link.', 'kinter'),
            'default'     => esc_url('#'),
            'section'     => 'xs_header_settings_section',
            'conditions' => [
                [
                    'control_name'  => 'header_quota_button',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);


        /**
         * Banner settings here
         */

        $this->add_panel([
            'id'             => 'banner_settings_section',
            'title'          => esc_html__( 'Banner settings', "kinter" ),
            'panel'          => 'xs_theme_option_panel',
        ]);

        /**
         * page banner panel
         */

        $this->add_section([
            'id'       => 'banner_page_settings',
            'title'    => esc_html__( 'Page banner', "kinter" ),
            'panel'    => 'banner_settings_section',
        ]);


        /**
         * page banner control start here
         */

        $this->add_control([
            'id'      => 'page_show_banner',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show banner?', 'kinter'),
            'desc'    => esc_html__('Show or hide the banner', 'kinter'),
            'section' => 'banner_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'      => 'page_show_breadcrumb',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show Breadcrumb?', 'kinter'),
            'desc'    => esc_html__('Show or hide the Breadcrumb', 'kinter'),
            'section' => 'banner_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'    => 'page_banner_title',
            'type'  => 'text',
            'label' => esc_html__('Banner Title', 'kinter'),
            'section' => 'banner_page_settings',
        ]);

        $this->add_control([
            'id'       => 'page_banner_title_color',
            'section'  => 'banner_page_settings',
            'type'     => 'color-picker',
            'default'  => '#FFFFFF',
            'label'    => esc_html__('Title Color', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'banner_page_image',
            'type'    => 'media',
            'section' => 'banner_page_settings',
            'label'   => esc_html__('Banner Background', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'show_page_banner_overlay',
            'type'    => 'switcher',
            'default' => 'no',
            'label'   => esc_html__('Show background overlay', 'kinter'),
            'section' => 'banner_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);


        $this->add_control([
            'id'       => 'page_banner_overlay_color',
            'section'  => 'banner_page_settings',
            'type'     => 'color-picker',
            'default'  => '#000000',
            'label'    => esc_html__('Banner Overlay Color', 'kinter'),
            'conditions' => [
                [
                    'control_name'  => 'show_page_banner_overlay',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        /**
         * blog banner panel
         */

        $this->add_section([
            'id'       => 'banner_blog_settings',
            'title'    => esc_html__( 'Blog banner', "kinter" ),
            'panel'    => 'banner_settings_section',
        ]);

        /**
         * blog banner control start here
         */

        $this->add_control([
            'id'      => 'blog_show_banner',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show banner?', 'kinter'),
            'desc'    => esc_html__('Show or hide the banner', 'kinter'),
            'section' => 'banner_blog_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_show_breadcrumb',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show Breadcrumb?', 'kinter'),
            'desc'    => esc_html__('Show or hide the Breadcrumb', 'kinter'),
            'section' => 'banner_blog_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'    => 'blog_banner_title',
            'type'  => 'text',
            'default' => esc_html__( 'Blog', 'kinter' ),
            'label' => esc_html__('Banner Title', 'kinter'),
            'section' => 'banner_blog_settings',
        ]);

        $this->add_control([
            'id'       => 'blog_banner_title_color',
            'section'  => 'banner_blog_settings',
            'type'     => 'color-picker',
            'default'  => '#FFFFFF',
            'label'    => esc_html__('Title Color', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'banner_blog_image',
            'type'    => 'media',
            'section' => 'banner_blog_settings',
            'label'   => esc_html__('Banner Background', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'show_blog_banner_overlay',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show background overlay', 'kinter'),
            'section' => 'banner_blog_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'       => 'blog_banner_overlay_color',
            'section'  => 'banner_blog_settings',
            'type'     => 'color-picker',
            'default'  => '#000000',
            'label'    => esc_html__('Banner Overlay Color', 'kinter'),
            'conditions' => [
                [
                    'control_name'  => 'show_blog_banner_overlay',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);


        /**
         * blog single banner panel
         */

        $this->add_section([
            'id'       => 'banner_blog_single_settings',
            'title'    => esc_html__( 'Blog single banner', "kinter" ),
            'panel'    => 'banner_settings_section',
        ]);

        /**
         * blog banner single control start here
         */

        $this->add_control([
            'id'      => 'blog_single_show_banner',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show banner?', 'kinter'),
            'desc'    => esc_html__('Show or hide the banner', 'kinter'),
            'section' => 'banner_blog_single_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_single_show_breadcrumb',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show Breadcrumb?', 'kinter'),
            'desc'    => esc_html__('Show or hide the Breadcrumb', 'kinter'),
            'section' => 'banner_blog_single_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'       => 'blog_single_banner_title_color',
            'section'  => 'banner_blog_single_settings',
            'type'     => 'color-picker',
            'default'  => '#FFFFFF',
            'label'    => esc_html__('Title Color', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'banner_blog_single_image',
            'type'    => 'media',
            'section' => 'banner_blog_single_settings',
            'label'   => esc_html__('Banner Background', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'show_blog_single_banner_overlay',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show background overlay', 'kinter'),
            'section' => 'banner_blog_single_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'       => 'blog_single_banner_overlay_color',
            'section'  => 'banner_blog_single_settings',
            'type'     => 'color-picker',
            'default'  => '#000',
            'label'    => esc_html__('Banner Overlay Color', 'kinter'),
            'conditions' => [
                [
                    'control_name'  => 'show_blog_single_banner_overlay',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        /**
         * trainer single banner panel
         */

        $this->add_section([
            'id'       => 'banner_trainer_single_settings',
            'title'    => esc_html__( 'Trainer single banner', "kinter" ),
            'panel'    => 'banner_settings_section',
        ]);

        /**
         * trainer banner control start here
         */

        $this->add_control([
            'id'      => 'trainer_single_show_banner',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show banner?', 'kinter'),
            'desc'    => esc_html__('Show or hide the banner', 'kinter'),
            'section' => 'banner_trainer_single_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'      => 'trainer_single_banner_title',
            'type'    => 'text',
            'default' => esc_html__( 'Trainer', 'kinter' ),
            'label'   => esc_html__('Banner Title', 'kinter'),
            'section' => 'banner_trainer_single_settings',
        ]);


        $this->add_control([
            'id'       => 'trainer_single_banner_title_color',
            'section'  => 'banner_trainer_single_settings',
            'type'     => 'color-picker',
            'default'  => '#FFFFFF',
            'label'    => esc_html__('Title Color', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'trainer_blog_single_image',
            'type'    => 'media',
            'section' => 'banner_trainer_single_settings',
            'label'   => esc_html__('Banner Background', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'show_trainer_single_banner_overlay',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show background overlay', 'kinter'),
            'section' => 'banner_trainer_single_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'       => 'trainer_single_banner_overlay_color',
            'section'  => 'banner_trainer_single_settings',
            'type'     => 'color-picker',
            'default'  => '#000',
            'label'    => esc_html__('Banner Overlay Color', 'kinter'),
            'conditions' => [
                [
                    'control_name'  => 'show_blog_single_banner_overlay',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        /**
         * table single banner panel
         */

        $this->add_section([
            'id'       => 'banner_table_single_settings',
            'title'    => esc_html__( 'Table single banner', "kinter" ),
            'panel'    => 'banner_settings_section',
        ]);

        /**
         * table banner control start here
         */

        $this->add_control([
            'id'      => 'table_single_show_banner',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show banner?', 'kinter'),
            'desc'    => esc_html__('Show or hide the banner', 'kinter'),
            'section' => 'banner_table_single_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'       => 'table_single_banner_title_color',
            'section'  => 'banner_table_single_settings',
            'type'     => 'color-picker',
            'default'  => '#FFFFFF',
            'label'    => esc_html__('Title Color', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'table_blog_single_image',
            'type'    => 'media',
            'section' => 'banner_table_single_settings',
            'label'   => esc_html__('Banner Background', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'show_table_single_banner_overlay',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show background overlay', 'kinter'),
            'section' => 'banner_table_single_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'       => 'table_single_banner_overlay_color',
            'section'  => 'banner_table_single_settings',
            'type'     => 'color-picker',
            'default'  => '#000',
            'label'    => esc_html__('Banner Overlay Color', 'kinter'),
            'conditions' => [
                [
                    'control_name'  => 'show_blog_single_banner_overlay',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        /**
         * Woocommerce settings here
         */

        /*============= Woo Panel ===================*/
        $this->add_panel([
            'id'             => 'woo_settings_section',
            'title'          => esc_html__( 'WooCommerce', "kinter" ),
            'panel'          => 'xs_theme_option_panel',
        ]);

        /*======================= woocommerce section ====================*/
        /*
            Shop page banner
        */
        $this->add_section([
            'id'       => 'woo_page_settings',
            'title'    => esc_html__( 'Shop page banner', "kinter" ),
            'panel'    => 'woo_settings_section',
        ]);

        $this->add_control([
            'id'      => 'woo_show_banner',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show banner?', 'kinter'),
            'desc'    => esc_html__('Show or hide the banner', 'kinter'),
            'section' => 'woo_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'       => 'woo_banner_title_color',
            'section'  => 'woo_page_settings',
            'type'     => 'color-picker',
            'default'  => '#FFFFFF',
            'label'    => esc_html__('Title Color', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'banner_woo_image',
            'type'    => 'media',
            'section' => 'woo_page_settings',
            'label'   => esc_html__('Banner Background', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'show_woo_banner_overlay',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show background overlay', 'kinter'),
            'section' => 'woo_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'       => 'woo_banner_overlay_color',
            'section'  => 'woo_page_settings',
            'type'     => 'color-picker',
            'default'  => '#000',
            'label'    => esc_html__('Banner Overlay Color', 'kinter'),
            'conditions' => [
                [
                    'control_name'  => 'show_woo_banner_overlay',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        /*
            Shop single page banner
        */
        $this->add_section([
            'id'       => 'woo_sigle_page_settings',
            'title'    => esc_html__( 'Shop single page banner', "kinter" ),
            'panel'    => 'woo_settings_section',
        ]);

        $this->add_control([
            'id'      => 'woo_single_show_banner',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show banner?', 'kinter'),
            'desc'    => esc_html__('Show or hide the banner', 'kinter'),
            'section' => 'woo_sigle_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'       => 'woo_single_banner_title_color',
            'section'  => 'woo_sigle_page_settings',
            'type'     => 'color-picker',
            'default'  => '#FFFFFF',
            'label'    => esc_html__('Title Color', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'banner_woo_single_image',
            'type'    => 'media',
            'section' => 'woo_sigle_page_settings',
            'label'   => esc_html__('Banner Background', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'show_woo_single_banner_overlay',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show background overlay', 'kinter'),
            'section' => 'woo_sigle_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'       => 'woo_single_banner_overlay_color',
            'section'  => 'woo_sigle_page_settings',
            'type'     => 'color-picker',
            'default'  => '#000',
            'label'    => esc_html__('Banner Overlay Color', 'kinter'),
            'conditions' => [
                [
                    'control_name'  => 'show_woo_banner_overlay',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        /*
            Woo custom control
        */
        $this->add_section([
            'id'       => 'woo_custom_settings',
            'title'    => esc_html__( 'WooCommerce Settings', "kinter" ),
            'panel'    => 'woo_settings_section',
        ]);

        $this->add_control([
            'id'      => 'woo_shop_page_setting',
            'type'    => 'select',
            'value'   => 'fluid',
            'label' => esc_html__('Sidebar', 'kinter'),
            'section' => 'woo_custom_settings',
            'choices' => [
                'fluid'   => esc_html__('No sidebar', 'kinter'),
                'lidebar' => esc_html__('Left Sidebar', 'kinter'),
                'rsidbar' => esc_html__('Right Sidebar', 'kinter'),
            ],
        ]);

        /**
         * Typography settings here
         */
        $this->add_section([
            'id'       => 'typography_settings_section',
            'title'    => esc_html__('Style settings', 'kinter'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 10,
        ]);

        /**
         * dark mode control
         */
        $this->add_control([
            'id'      => 'theme_dark_mode_enable',
            'type'    => 'switcher',
            'default' => 'no',
            'label'   => esc_html__('Enable Dark Mode?', 'kinter'),
            'section' => 'typography_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        /**
         * dark mode color
         */
        $this->add_control([
            'id'      => 'theme_dark_mode_color',
            'label'   => esc_html__('Dark mode background', 'kinter'),
            'type'    => 'color-picker',
            'section' => 'typography_settings_section',
            'default' => '#101010',
        ]);


        /**
         * body background control
         */
        $this->add_control([
            'id'      => 'style_body_bg',
            'label'   => esc_html__('Body background', 'kinter'),
            'type'    => 'color-picker',
            'section' => 'typography_settings_section',
            'default' => '#FFFFFF',
        ]);

        /**
         * primary color control
         */
        $this->add_control([
            'id'      => 'style_primary',
            'label'      => esc_html__('Primary color', 'kinter'),
            'type'    => 'color-picker',
            'section' => 'typography_settings_section',
            'default' => '#f63c25',
        ]);

        /**
         * secondary color control
         */
        $this->add_control([
            'id'      => 'secondary_color',
            'label'      => esc_html__('Secondary color', 'kinter'),
            'type'    => 'color-picker',
            'section' => 'typography_settings_section',
            'default' => '#f5260d',
        ]);

        /**
         * Control for body Typography Input
         */
        $this->add_control([
            'id'         => 'body_font',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'weight'         => 400,
                'size'           => 16,
                'line_height'    => 26,
                'color'          => '#777777',
                'letter_spacing' => 0
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Body Typhography', 'kinter'),
        ]);

        /**
         * Control for H1 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_one',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'weight'         => 700,
                'size'           => 36,
                'color'          => '#1a1a1a',
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading H1 Typhography', 'kinter'),
        ]);

        /**
         * Control for H2 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_two',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'weight'         => 700,
                'size'           => 30,
                'color'          => '#1a1a1a',
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading H2 Typhography', 'kinter'),
        ]);

        /**
         * Control for H3 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_three',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'weight'         => 700,
                'size'           => 24,
                'color'          => '#1a1a1a',
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading H3 Typhography', 'kinter'),
        ]);

        /**
         * Control for H4 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_four',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'weight'         => 700,
                'size'           => 18,
                'color'          => '#1a1a1a',
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading H4 Typhography', 'kinter'),
        ]);

        /**
         * Control for H5 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_five',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'weight'         => 700,
                'size'           => 16,
                'color'          => '#1a1a1a',
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading H5 Typhography', 'kinter'),
        ]);

        /**
         * Control for H6 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_six',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'weight'         => 700,
                'size'           => 14,
                'color'          => '#1a1a1a',
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading H6 Typhography', 'kinter'),
        ]);

        $this->add_control([
            'id'      => 'dm_toggle',
            'label'   => esc_html__('Toggle', 'kinter'),
            'section' => 'typography_settings_section',
            'type'    => 'toggle',
        ]);


        /**
         * Blog settings here
         */
        $this->add_section([
            'id'       => 'blog_settings_section',
            'title'    => esc_html__('Blog settings', 'kinter'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 10,
        ]);

        /**
         * Blog settings body controls here
         */
        $this->add_control([
            'id'      => 'blog_sidebar',
            'type'    => 'select',
            'label' => esc_html__('Sidebar', 'kinter'),
            'section' => 'blog_settings_section',
            'choices' => [
                '1' => esc_html__('No sidebar', 'kinter'),
                '2' => esc_html__('Left Sidebar', 'kinter'),
                '3' => esc_html__('Right Sidebar', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_author',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Blog author', 'kinter'),
            'desc'    => esc_html__('Do you want to show blog author?', 'kinter'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_related_post',
            'type'    => 'switcher',
            'default' => 'no',
            'label'      => esc_html__('Blog related post', 'kinter'),
            'desc'      => esc_html__('Do you want to show single blog related post?', 'kinter'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_related_post_number',
            'type'    => 'text',
            'label'   => esc_html__('Related post count', 'kinter'),
            'default' => '3',
            'section' => 'blog_settings_section',
        ]);


        /**
         * Footer Settings here
         */
        $this->add_section([
            'id'       => 'footer_settings_section',
            'title'    => esc_html__('Footer settings', 'kinter'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 10,
        ]);

        /**
         * Header builder switch here
         */
        $this->add_control([
            'id'      => 'footer_builder_control_enable',
            'type'    => 'switcher',
            'default' => 'no',
            'label'   => esc_html__('Footer builder Enable ?', 'kinter'),
            'desc'    => esc_html__('Do you want to enable footer builder ?', 'kinter'),
            'section' => 'footer_settings_section',
            'attr'    => ['class' => 'xs_footer_builder_switch'],
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control([
            'id'      => 'footer_builder_select',
            'type'    => 'select',
            'value'   => '1',
            'label' => esc_html__('Footer', 'kinter'),
            'section' => 'footer_settings_section',
            'choices' => kinter_ekit_footers(),
            'conditions' => [
                [
                    'control_name'  => 'footer_builder_control_enable',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        $this->add_control([
            'id'      => 'footer_builder_select_html',
            'section' => 'footer_settings_section',
            'type'    => 'html',
            'value'   => '<h2 class="header_builder_edit"><a class="xs_builder_edit_link" style="text-transform: uppercase; color:green" target="_blank" href="#">'. esc_html('Edit content here.'). '</a><h2><h3><a style="text-transform: uppercase; color:#17a2b8" target="_blank" href="https://support.xpeedstudio.com/knowledgebase/customize-kinter-header-and-footer-builder/">'. esc_html__('How to edit header', 'kinter'). '</a><h3>',
            'attr'    => ['class' => 'xs_footer_builder_html'],
            'conditions' => [
                [
                    'control_name'  => 'footer_builder_control_enable',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);
        /**
         * Footer bg control
         * */
        $this->add_control([
            'id'       => 'xs_footer_bg_color',
            'label'    => esc_html__('Background color', 'kinter'),
            'type'     => 'color-picker',
            'section'  => 'footer_settings_section',
            'default'  => '#042ff8',
            'desc'     => esc_html__('Footer background color of rgba-color-picker goes here', 'kinter'),
        ]);

        /**
         * Footer text control
         * */
        $this->add_control([
            'id'      => 'xs_footer_text_color',
            'label'   => esc_html__('Text color', 'kinter'),
            'type'    => 'color-picker',
            'section' => 'footer_settings_section',
            'default' => '#666',
            'desc'    => esc_html__('You can change the text color with rgba color or solid color', 'kinter'),
        ]);

        /**
         * Footer link control
         * */
        $this->add_control([
            'id'         => 'xs_footer_link_color',
            'label'      => esc_html__('Link Color', 'kinter'),
            'type'       => 'color-picker',
            'section'    => 'footer_settings_section',
            'default'    => '#666',
            'desc'       => esc_html__('You can change the link color with rgba color or solid color', 'kinter'),
        ]);

        /**
         * Footer widget title control
         * */
        $this->add_control([
            'id'        => 'xs_footer_widget_title_color',
            'label'     => esc_html__('Widget Title Color', 'kinter'),
            'type'      => 'color-picker',
            'section'   => 'footer_settings_section',
            'default'   => '#142355',
            'desc'      => esc_html__('You can change the widget title color with rgba color or solid color', 'kinter'),
        ]);

        /**
         * Footer copyright bg control
         * */
        $this->add_control([
            'id'        => 'copyright_bg_color',
            'label'     => esc_html__('Copyright Background Color', 'kinter'),
            'type'      => 'color-picker',
            'section'   => 'footer_settings_section',
            'default'   => '#eff1f4',
            'desc'      => esc_html__('You can change the copyright background color with rgba color or solid color', 'kinter'),

        ]);

        /**
         * Footer copyright color control
         * */
        $this->add_control([
            'id'        => 'footer_copyright_color',
            'label'     => esc_html__('Copyright Text Color', 'kinter'),
            'type'      => 'color-picker',
            'default'   => '#FFFFFF',
            'section'   => 'footer_settings_section',
            'desc'      => esc_html__('You can change the copyright tet color with rgba color or solid color', 'kinter'),
        ]);

        /**
         * Footer copyright text control
         * */
        $this->add_control([
            'id'          => 'footer_copyright',
            'type'        => 'textarea',
            'section'     => 'footer_settings_section',
            'value'       => esc_html__('&copy; 2021 kinter. All rights reserved', 'kinter'),
            'label'       => esc_html__('Copyright text', 'kinter'),
            'description' => esc_html__('This text will be shown at the footer of all pages.', 'kinter'),
        ]);

        /**
         * Footer spacing top control
         * */
        $this->add_control([
            'id'          => 'footer_padding_top',
            'label'       => esc_html__('Footer Padding Top', 'kinter'),
            'description' => esc_html__('Use Footer Padding Top', 'kinter'),
            'type'        => 'text',
            'section'     => 'footer_settings_section',
            'default'     => '100px',
        ]);

        /**
         * Footer spaceing bottom control
         * */
        $this->add_control([
            'id'          => 'footer_padding_bottom',
            'label'	      => esc_html__( 'Footer Padding Bottom', 'kinter' ),
            'description' => esc_html__( 'Use Footer Padding Bottom', 'kinter' ),
            'type'        => 'text',
            'section'     => 'footer_settings_section',
            'default'     => '100px',
        ]);

        /**
         * Footer back to top control
         * */
        $this->add_control([
            'id'      => 'back_to_top',
            'type'    => 'switcher',
            'default' => 'no',
            'label'   => esc_html__('Back to top', 'kinter'),
            'section' => 'footer_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);
    }
}
