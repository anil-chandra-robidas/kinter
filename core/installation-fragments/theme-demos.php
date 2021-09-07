<?php

function oneclick_kinter_import_files() {
	$demo_content_installer	 = KINTER_REMOTE_CONTENT;
	return array(
	  array(
		'import_file_name'           => 'Default',
		'categories'                 => array( 'Multipage' ),
		'import_file_url'            => $demo_content_installer . '/default/f.xml',
		'import_widget_file_url'     => $demo_content_installer . '/default/f.wie',
		'import_customizer_file_url' => $demo_content_installer . '/default/f.dat',
		'import_preview_image_url'   => $demo_content_installer . '/default/screenshot.png',
		'preview_url'                => KINTER_LIVE_URL,
	  ),
	  array(
		'import_file_name'           => 'Home Dark',
		'categories'                 => array( 'Multipage' ),
		'import_file_url'            => $demo_content_installer . '/dark/f.xml',
		'import_widget_file_url'     => $demo_content_installer . '/dark/f.wie',
		'import_customizer_file_url' => $demo_content_installer . '/dark/f.dat',
		'import_preview_image_url'   => $demo_content_installer . '/dark/screenshot.png',
		'preview_url'                => KINTER_LIVE_URL . '/dark/',
	  ),
	  array(
		'import_file_name'           => 'Home Light',
		'categories'                 => array( 'Multipage' ),
		'import_file_url'            => $demo_content_installer . '/light/f.xml',
		'import_widget_file_url'     => $demo_content_installer . '/light/f.wie',
		'import_customizer_file_url' => $demo_content_installer . '/light/f.dat',
		'import_preview_image_url'   => $demo_content_installer . '/light/screenshot.png',
		'preview_url'                => KINTER_LIVE_URL . '/light/',
	  ),
	  array(
		'import_file_name'           => 'Default Landing',
		'categories'                 => array( 'Landing' ),
		'import_file_url'            => $demo_content_installer . '/default-landing/f.xml',
		'import_widget_file_url'     => $demo_content_installer . '/default-landing/f.wie',
		'import_customizer_file_url' => $demo_content_installer . '/default-landing/f.dat',
		'import_preview_image_url'   => $demo_content_installer . '/default-landing/screenshot.png',
		'preview_url'                => KINTER_LIVE_URL . '/default-landing/',
	  ),
	  array(
		'import_file_name'           => 'Dark Landing',
		'categories'                 => array( 'Landing' ),
		'import_file_url'            => $demo_content_installer . '/dark-landing/f.xml',
		'import_widget_file_url'     => $demo_content_installer . '/dark-landing/f.wie',
		'import_customizer_file_url' => $demo_content_installer . '/dark-landing/f.dat',
		'import_preview_image_url'   => $demo_content_installer . '/dark-landing/screenshot.png',
		'preview_url'                => KINTER_LIVE_URL . '/onepage/',
	  ),
	  array(
		'import_file_name'           => 'Light Landing',
		'categories'                 => array( 'Landing' ),
		'import_file_url'            => $demo_content_installer . '/light-landing/f.xml',
		'import_widget_file_url'     => $demo_content_installer . '/light-landing/f.wie',
		'import_customizer_file_url' => $demo_content_installer . '/light-landing/f.dat',
		'import_preview_image_url'   => $demo_content_installer . '/light-landing/screenshot.png',
		'preview_url'                => KINTER_LIVE_URL . '/light-landing/',
	  ),
	);
}
add_filter( 'pt-ocdi/import_files', 'oneclick_kinter_import_files' );
