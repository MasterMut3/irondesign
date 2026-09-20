<?php
/**
 * IronDesign Head Meta & Favicon Logic
 * 
 * Registers favicons and theme-color meta tag.
 * Rank Math SEO handles meta descriptions and OG tags.
 * WordPress Site Icon system is bypassed — we manage favicons directly.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output favicon and theme-color meta tags in <head>.
 * 
 * We override WordPress's native Site Icon system to have explicit control
 * over favicon naming, formats, and sizes. This ensures consistency across
 * browsers and prevents WordPress from auto-resizing or renaming our icons.
 */
function irondesign_head_meta() {
	$icons_uri = get_template_directory_uri() . '/assets/icons/';
	
	// Favicon 32x32 (standard browser favicon)
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . esc_url( $icons_uri . 'favicon-32x32.png' ) . '">' . "\n";
	
	// Favicon 192x192 (Android Chrome)
	echo '<link rel="icon" type="image/png" sizes="192x192" href="' . esc_url( $icons_uri . 'favicon-192x192.png' ) . '">' . "\n";
	
	// Apple touch icon 180x180 (iOS home screen)
	echo '<link rel="apple-touch-icon" sizes="180x180" href="' . esc_url( $icons_uri . 'apple-touch-icon.png' ) . '">' . "\n";
	
	// Theme color (browser chrome on Android)
	echo '<meta name="theme-color" content="#0C0B09">' . "\n";
}

// Hook to wp_head at priority 1 (early, before other meta tags)
add_action( 'wp_head', 'irondesign_head_meta', 1 );