<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Blog_Widget extends Widget_Base {

    public function get_name() {
        return 'kinter-blog';
    }

    public function get_title() {
        return esc_html__( 'Kinter Blog', 'kinter' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'kinter-elements' ];
    }

    protected function _register_controls() {
        // Main Controls
        $this->start_controls_section(
			'xs_blog_content_section',
			[
				'label' => esc_html__( 'Content', 'kinter' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
            'xs_blog_posts_order_by',
            [
                'label'   => esc_html__( 'Order by', 'kinter' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'date'          => esc_html__( 'Date', 'kinter' ),
                    'title'         => esc_html__( 'Title', 'kinter' ),
                    'author'        => esc_html__( 'Author', 'kinter' ),
                    'modified'      => esc_html__( 'Modified', 'kinter' ),
                    'comment_count' => esc_html__( 'Comments', 'kinter' ),
                ],
                'default' => 'date',
            ]
        );

        $this->add_control(
            'xs_blog_posts_sort',
            [
                'label'   => esc_html__( 'Order', 'kinter' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'ASC'  => esc_html__( 'ASC', 'kinter' ),
                    'DESC' => esc_html__( 'DESC', 'kinter' ),
                ],
                'default' => 'DESC',
            ]
        );

        $this->add_control(
            'xs_blog_posts_clumnn',
            [
                'label'   => esc_html__( 'Order', 'kinter' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    '4'  => esc_html__( '3 Column', 'kinter' ),
                    '6' => esc_html__( '2 Column', 'kinter' ),
                ],
                'default' => '4',
            ]
        );

        $this->add_control(
            'xs_blog_posts_num',
            [
                'label'     => esc_html__( 'Posts Count', 'kinter' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 3,
                'max'       => 100,
                'default'   => 3,
            ]
        );

        $this->add_control(
            'xs_blog_posts_offset',
            [
                'label'     => esc_html__( 'Offset', 'kinter' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 0,
                'max'       => 20,
                'default'   => 0,
            ]
        );

        $this->add_control('xs_post_cat',
            [
                'label'     => esc_html__( 'Category', 'kinter' ),
                'type'      => Controls_Manager::SELECT2,
                'multiple'  => true,
                'default'   => '',
                'options'   => $this->getCategories(),
                'label_block' => 'true'
            ]
        );

        $this->add_control(
			'xs_blog_post_total_word',
			[
				'label' => esc_html__( 'Exerpt Word', 'kinter' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 27,
				'max' => 100,
				'step' => 1,
				'default' => 27,
			]
		);

        $this->end_controls_section();


        $this->start_controls_section(
			'xs_blog_post_meta',
			[
				'label' => esc_html__( 'Post Meta', 'kinter' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'xs_blog_post_meta_color',
			[
				'label' => esc_html__( 'Color', 'kinter' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-blog__content__data a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .xs-blog__content__data span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .xs-blog__content__footer__avatar a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .xs-blog__content__footer__social .xs-social-share-icon' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'xs_blog_post_meta_color_hover',
			[
				'label' => esc_html__( 'Color Hover', 'kinter' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-blog:hover .xs-blog__content__data a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .xs-blog:hover .xs-blog__content__data span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .xs-blog:hover .xs-blog__content__footer__avatar a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .xs-blog:hover .xs-blog__content .xs-social-share-icon' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'xs_blog_post_meta_content_typography',
				'label' => esc_html__( 'Typography', 'kinter' ),
				'selector' => '{{WRAPPER}} .xs-blog__content__data span, .xs-blog__content__footer__avatar a, .xs-blog__content__footer__social .xs-social-share-icon',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'xs_blog_post_content',
			[
				'label' => esc_html__( 'Post Content', 'kinter' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'xs_blog_post_content_heading_one',
			[
				'label' => esc_html__( 'Title', 'kinter' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'xs_blog_post_title_color',
			[
				'label' => esc_html__( 'Color', 'kinter' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-blog__content__title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .xs-blog__content__title:before' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'xs_blog_post_title_color_hover',
			[
				'label' => esc_html__( 'Color Hover', 'kinter' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-blog:hover .xs-blog__content__title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .xs-blog:hover .xs-blog__content__title:before' => 'background-color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'xs_blog_post_title_content_typography',
				'label' => esc_html__( 'Typography', 'kinter' ),
				'selector' => '{{WRAPPER}} .xs-blog__content__title',
			]
		);

        $this->add_control(
			'xs_blog_post_content_heading_two',
			[
				'label' => esc_html__( 'Exerpt', 'kinter' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'xs_blog_post_exerpt_color',
			[
				'label' => esc_html__( 'Color', 'kinter' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-blog__content__excerpt p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'xs_blog_post_exerpt_color_hover',
			[
				'label' => esc_html__( 'Color Hover', 'kinter' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-blog:hover .xs-blog__content__excerpt p' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'xs_blog_post_exerpt_content_typography',
				'label' => esc_html__( 'Typography', 'kinter' ),
				'selector' => '{{WRAPPER}} .xs-blog__content__excerpt p',
			]
		);

		$this->end_controls_section();

    }

    protected function render( ) {
       $settings = $this->get_settings_for_display();

       extract($settings);
       $xs_blog_posts_offset = ($xs_blog_posts_offset == '') ? 0 : $xs_blog_posts_offset;

       $default    = [
           'orderby'           => array( $xs_blog_posts_order_by => $xs_blog_posts_sort ),
           'posts_per_page'    => $xs_blog_posts_num,
           'offset'            => $xs_blog_posts_offset,
           'cat'               => $xs_post_cat,
       ];

        $post_query = new \WP_Query( $default ); ?>

    <div class="row">
    <?php
        while ( $post_query->have_posts() ) {
        $post_query->the_post();
        if (has_post_thumbnail()) {
    ?>
        <div class="col-lg-<?php echo esc_attr($xs_blog_posts_clumnn); ?> col-md-6 mb-4">
            <article class="xs-blog">
                <div class="xs-blog__BgImg">
                    <figure class="xs-blog__BgImg__container">
                        <div class="post-image">
                           <?php
                             echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, array(
                                 'alt'  => get_the_title()
                             ));
                            ?>
                        </div>
                    </figure>
                </div>

                <div class="xs-blog__content">
                    <div class="xs-blog__content__data">
                        <span><i class="far fa-clock"></i> <?php kinter_post_meta_date(); ?></span>
                        <?php
                        $category_list = get_the_category_list( ', ' );
                        if( $category_list ){
                            echo '<span class="post-cat"><i class="fas fa-tag"></i> '.$category_list.' </span>';
                        }
                        ?>
                    </div>
                    <h3 class="xs-blog__content__title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>

                    <div class="xs-blog__content__excerpt">
                        <?php // echo the_excerpt(); ?>
                        <p><?php echo wp_trim_words(get_the_content(), $xs_blog_post_total_word, '...'); ?></p>
                    </div>

                    <div class="xs-blog__content__footer">
                        <div class="xs-blog__content__footer__avatar">
                            <div class="avatar-img">
                                <?php echo get_avatar( get_the_author_meta( "ID" )); ?>
                            </div>
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="author-name"><?php the_author_meta('display_name'); ?></a>
                        </div>
                        <?php if( function_exists('__wp_social_share_pro_check') ){
                            if( __wp_social_share_pro_check() ){
                            ?>
                            <div class="xs-blog__content__footer__social">
                                <i class="fas fa-share-alt icon icon-share  xs-social-share-icon"></i>
                                <?php echo __wp_social_share( 'all', ['class' => 'xs-social-share'] ); ?>
                            </div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </article><!-- .xs-blog -->
        </div>
    <?php } } ?>
    </div>

    <?php
    }
    protected function content_template() { }

    public function getCategories(){
        $terms = get_terms( array(
            'taxonomy'    => 'category',
            'hide_empty'  => false,
        ) );


        $cat_list = [];
        if(is_array($terms) && '' != $terms) :
        foreach($terms as $post) {

            $cat_list[$post->term_id]  = [$post->name];
        }
       endif;
        return $cat_list;
    }
}