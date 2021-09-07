<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * register required plugins
 */

function kinter_register_required_plugins() {
	$plugins	 = array(
		array(
			'name'		 => esc_html__( 'Elementor', 'kinter' ),
			'slug'		 => 'elementor',
			'required'	 => true,
		),
        array(
            'name'		 => esc_html__( 'Elementskit Lite', 'kinter' ),
            'slug'		 => 'elementskit-lite',
            'required'	 => true,
        ),
		array(
			'name'		 => esc_html__( 'Metform', 'kinter' ),
			'slug'		 => 'metform',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'WooCommerce', 'kinter' ),
			'slug'		 => 'woocommerce',
			'required'	 => false,
		),
		array(
			'name'		 => esc_html__( 'Devmonsta', 'kinter' ),
			'slug'		 => 'devmonsta',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'One Click Demo Import', 'kinter' ),
			'slug'		 => 'one-click-demo-import',
			'required'	 => true,
		),
		
	);


	$config = array(
		'id'			 => 'kinter', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	 => '', // Default absolute path to bundled plugins.
		'menu'			 => 'kinter-install-plugins', // Menu slug.
		'parent_slug'	 => 'themes.php', // Parent menu slug.
		'capability'	 => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	 => true, // Show admin notices or not.
		'dismissable'	 => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg'	 => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	 => false, // Automatically activate plugins after installation or not.
		'message'		 => '', // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'kinter_register_required_plugins' );