<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue all theme scripts and styles
 */


// stylesheets
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {
	// 3rd party css
	wp_enqueue_style( 'fonts', kinter_google_fonts_url(['Barlow:400,600,700,800,900&display=swap', 'Montserrat:800&display=swap', 'Roboto:wght@400,500,700']), null,  KINTER_VERSION );
	wp_enqueue_style( 'bootstrap',  KINTER_CSS . '/bootstrap.min.css', null,  KINTER_VERSION );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'fontawesome-min',  KINTER_CSS . '/fontawesome.min.css', null,  KINTER_VERSION );
	wp_enqueue_style( 'kinter-iconfont',  KINTER_CSS . '/xs-icon-font.css', null,  KINTER_VERSION );
	wp_enqueue_style( 'kinter-woocommerce', KINTER_CSS . '/woocommerce.css', null, KINTER_VERSION );

	// theme css
	wp_enqueue_style( 'kinter-blog',  KINTER_CSS . '/blog.css', null,  KINTER_VERSION );
	wp_enqueue_style( 'kinter-gutenberg-custom',  KINTER_CSS . '/gutenberg-custom.css', null,  KINTER_VERSION );
	wp_enqueue_style( 'kinter-master',  KINTER_CSS . '/master.css', null,  KINTER_VERSION );
}

// javascripts
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {

	// 3rd party scripts
	wp_enqueue_script( 'bootstrap',  KINTER_JS . '/bootstrap.min.js', array( 'jquery' ),  KINTER_VERSION, true );
	wp_enqueue_script( 'popper',  KINTER_JS . '/Popper.js', array( 'jquery' ),  KINTER_VERSION, true );

	// 3rd party scripts
	wp_enqueue_script( 'vivus',  KINTER_JS . '/vivus.min.js', array( 'jquery' ),  KINTER_VERSION, true );
	wp_enqueue_script( 'waypoints',  KINTER_JS . '/jquery.waypoints.min.js', array( 'jquery' ),  KINTER_VERSION, true );

	// theme scripts
	wp_enqueue_script( 'kinter-script',  KINTER_JS . '/script.js', array( 'jquery' ),  KINTER_VERSION, true );

	// Load WordPress Comment js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}