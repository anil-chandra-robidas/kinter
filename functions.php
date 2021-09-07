<?php

/**
 * theme's main functions and globally usable variables, contants etc
 * added: v1.0
 * textdomain: kinter, class: KINTER, var: $kinter_, constants: KINTER, function: kinter_
 */

// shorthand contants
// ------------------------------------------------------------------------
define('KINTER_THEME', 'Kinter WordPress Theme');
define('KINTER_VERSION', '1.0.0');
define('KINTER_MINWP_VERSION', '5.0');


// shorthand contants for theme assets url
// ------------------------------------------------------------------------
define('KINTER_THEME_URI', get_template_directory_uri());
define('KINTER_IMG', KINTER_THEME_URI . '/assets/images');
define('KINTER_CSS', KINTER_THEME_URI . '/assets/css');
define('KINTER_JS', KINTER_THEME_URI . '/assets/js');



// shorthand contants for theme assets directory path
// ----------------------------------------------------------------------------------------
define('KINTER_THEME_DIR', get_template_directory());
define('KINTER_IMG_DIR', KINTER_THEME_DIR . '/assets/images');
define('KINTER_CSS_DIR', KINTER_THEME_DIR . '/assets/css');
define('KINTER_JS_DIR', KINTER_THEME_DIR . '/assets/js');

define('KINTER_CORE', KINTER_THEME_DIR . '/core');
define('KINTER_COMPONENTS', KINTER_THEME_DIR . '/components');
define('KINTER_EDITOR', KINTER_COMPONENTS . '/editor');
define('KINTER_EDITOR_ELEMENTOR', KINTER_EDITOR . '/elementor');
define('KINTER_EDITOR_GUTENBERG', KINTER_EDITOR . '/gutenberg');
define('KINTER_SHORTCODE_DIR_STYLE', KINTER_EDITOR_ELEMENTOR . '/widgets/style');
define('KINTER_SHORTCODE_DIR_WIDGETS', KINTER_EDITOR_ELEMENTOR . '/widgets');
define('KINTER_INSTALLATION', KINTER_CORE . '/installation-fragments');
define('KINTER_REMOTE_CONTENT', esc_url(''));
define('KINTER_REMOTE_SLIDER_CONTENT', KINTER_THEME_DIR . "/sliders");
define('KINTER_LIVE_URL', esc_url('http://wp.xpressbuddy.com/kinter'));

// set up the content width value based on the theme's design
// ----------------------------------------------------------------------------------------
if (!isset($content_width)) {
    $content_width = 800;
}

// set up theme default and register various supported features.
// ----------------------------------------------------------------------------------------

function kinter_setup() {

    // make the theme available for translation
    $lang_dir = KINTER_THEME_DIR . '/languages';
    load_theme_textdomain('kinter', $lang_dir);

    // add support for post formats
    add_theme_support('post-formats', [
        'standard', 'image', 'video', 'audio','gallery'
    ]);

    // add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // let WordPress manage the document title
    add_theme_support('title-tag');

    // add support for post thumbnails
    add_theme_support('post-thumbnails');
     add_theme_support( 'woocommerce' );

    // hard crop center center
    set_post_thumbnail_size(750, 465, ['center', 'center']);
    add_image_size( 'kinter-small', 350, 250, ['center', 'center'] );
    add_image_size( 'kinter-case-study-box', 320, 200, ['center', 'center'] );



    // register navigation menus
    register_nav_menus(
        [
            'primary' => esc_html__('Primary Menu', 'kinter'),
            'footermenu' => esc_html__('Footer Menu', 'kinter'),
        ]
    );

    // HTML5 markup support for search form, comment form, and comments
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
    /*
     * Enable support for wide alignment class for Gutenberg blocks.
     */
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );

    // enable woocommerce support
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action('after_setup_theme', 'kinter_setup');


add_action('enqueue_block_editor_assets', 'kinter_action_enqueue_block_editor_assets' );
function kinter_action_enqueue_block_editor_assets() {
    wp_enqueue_style( 'kinter-fonts', kinter_google_fonts_url(['Poppins:300,400,500,600,700&display=swap', 'Rubik:300,400,500,700']), null, KINTER_VERSION );
    wp_enqueue_style( 'kinter-gutenberg-editor-font-awesome-styles', KINTER_CSS . '/font-awesome.css', null, KINTER_VERSION );
    wp_enqueue_style( 'kinter-gutenberg-editor-customizer-styles', KINTER_CSS . '/gutenberg-editor-custom.css', null, KINTER_VERSION );
    wp_enqueue_style( 'kinter-gutenberg-editor-styles', KINTER_CSS . '/gutenberg-custom.css', null, KINTER_VERSION );
    wp_enqueue_style( 'kinter-gutenberg-blog-styles', KINTER_CSS . '/blog.css', null, KINTER_VERSION );
}

// hooks for unyson framework
// ----------------------------------------------------------------------------------------
function kinter_framework_customizations_path($rel_path) {
    return '/components';
}
add_filter('dms_framework_customizations_dir_rel_path', 'kinter_framework_customizations_path');

function kinter_remove_dms_settings() {
    remove_submenu_page( 'themes.php', 'dms-settings' );
}
add_action( 'admin_menu', 'kinter_remove_dms_settings', 999 );


// include the init.php
// ----------------------------------------------------------------------------------------
require_once( KINTER_CORE . '/init.php');
require_once( KINTER_COMPONENTS . '/editor/elementor/elementor.php');