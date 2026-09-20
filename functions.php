<?php
/**
 * IronDesign Theme Functions
 * 
 * Bootstrap file that loads all theme functionality.
 * Defines constants and includes all inc/ files.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ======================================
// Theme Constants
// ======================================

if ( ! defined( 'IRONDESIGN_VERSION' ) ) {
	define( 'IRONDESIGN_VERSION', '1.0.0' );
}

if ( ! defined( 'IRONDESIGN_PATH' ) ) {
	define( 'IRONDESIGN_PATH', get_template_directory() );
}

if ( ! defined( 'IRONDESIGN_URI' ) ) {
	define( 'IRONDESIGN_URI', get_template_directory_uri() );
}

// ======================================
// Include Theme Files
// ======================================

/**
 * Array of theme include files.
 * These are loaded in order from inc/ folder.
 */
$irondesign_includes = array(
	'setup',
	'enqueue',
	'helpers',
	'head',
	'woocommerce',
	'customizer',
	'ajax',
	'custom-order',
	'admin',
);

/**
 * Require each include file if it exists.
 */
foreach ( $irondesign_includes as $file ) {
	$file_path = IRONDESIGN_PATH . '/inc/' . $file . '.php';
	
	if ( file_exists( $file_path ) ) {
		require_once $file_path;
	}
}