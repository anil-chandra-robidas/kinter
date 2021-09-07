<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
//die('cpt found');
/**
 * hooks for wp blog part
 */

// if there is no excerpt, sets a defult placeholder
// ----------------------------------------------------------------------------------------

if ( class_exists( 'KinterCustomPost\Kinter_CustomPost' ) ) {
	
}

if (class_exists('ElementsKit_Lite')) {
	add_action('elementskit/template/before_header', function(){
		echo '<div class="xs_page_wrapper">';
	});

	add_action('elementskit/template/after_footer', function(){
		echo '</div>';
	});
}