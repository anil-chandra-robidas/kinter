<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue static files: javascript and css for backend
 */


wp_enqueue_style( 'kinter-admin',  KINTER_CSS . '/xs-admin.css', null,  KINTER_VERSION );
wp_enqueue_script('kinter-customize', KINTER_JS . '/xs-customize.js', array('jquery'), KINTER_VERSION, true);

wp_localize_script( 'kinter-customize', 'admin_url_object',array( 'admin_url' => admin_url( 'post.php?action=elementor&post=' ) ) );
