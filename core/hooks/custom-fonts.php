<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * hooks for adding custom fonts
 */

function kinter_custom_fonts( $fonts ) {

	$gilroy			 = array(
		'family' => 'gilroylight'
	);
	$gilroyextrabold = array(
		'family' => 'gilroyextrabold'
	);
	array_push( $fonts, 'gilroylight', 'gilroyextrabold' );
	return $fonts;
} //add_filter( 'dms_option_type_typography_v2_standard_fonts', 'kinter_custom_fonts' );
