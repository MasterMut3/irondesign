<?php
/**
 * IronDesign Theme
*
* @package IronDesign
*/

if (!defined('ABSPATH')) {
    exit;
    }
    
    define('IRONDESIGN_VERSION', '1.0.0');
    define('IRONDESIGN_PATH', get_template_directory());
    define('IRONDESIGN_URI', get_template_directory_uri());
    
    $includes = array(
	'setup',
	'enqueue',
	'helpers',
	'homepage',
	'woocommerce',
	'customizer',
	'ajax',
    'admin',
);

foreach ( $includes as $file ) {
	$path = IRONDESIGN_PATH . "/inc/{$file}.php";

	if ( file_exists( $path ) ) {
		require_once $path;
	}
}
 