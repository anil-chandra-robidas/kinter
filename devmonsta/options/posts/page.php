<?php

use Devmonsta\Libs\Posts;

class Page extends Posts
{

    public function register_controls()
    {
        $this->add_box([
            'id' => 'page_post_meta',
            'post_type' => 'page',
            'title' => esc_html__('Page Settings', 'kinter'),
        ]);
        /**
         * control for text input
         */

        $this->add_control( [
            'box_id' => 'page_post_meta',
            'type'   => 'switcher',
            'name'   => 'page_meta_show_banner',
            'value'  => 'yes',
            'label'  => esc_html__('Show banner?', 'kinter'),
            'desc'   => esc_html__('Show or hide the banner', 'kinter'),
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control( [
            'box_id' => 'page_post_meta',
            'type'   => 'switcher',
            'name'   => 'page_meta_show_breadcumb',
            'value'  => 'yes',
            'label'  => esc_html__('Show Breadcumb?', 'kinter'),
            'desc'   => esc_html__('Show or hide the breadcumb', 'kinter'),
            'left-choice'  => [
                'no' => esc_html__('No', 'kinter'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'kinter'),
            ],
        ]);

        $this->add_control( [
            'box_id' => 'page_post_meta',
            'label'  => esc_html__( 'Banner Title', 'kinter' ),
            'desc'   => esc_html__( 'Add your Page hero title', 'kinter' ),
            'type'   => 'wp-editor',
            'name'   => 'header_title',
        ] );

        $this->add_control([
            'box_id' => 'page_post_meta',
            'type'   => 'upload',
            'name'   => 'header_image',
            'desc'   => esc_html__('Upload a page header image', 'kinter'),
            'label'  => esc_html__('Banner image', 'kinter'),
        ]);
    }
}
