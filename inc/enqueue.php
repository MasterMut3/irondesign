<?php
/**
 * IronDesign Asset Enqueueing
 * 
 * Registers and loads CSS and JS files in the correct order.
 * Manages dependencies to ensure tokens.css loads first.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue theme stylesheets and scripts.
 * 
 * Load order:
 * 1. tokens.css (design system — no deps)
 * 2. base.css (reset + defaults — depends on tokens)
 * 3. components.css (component styles — depends on base)
 * 4. woocommerce.css (shop overrides — depends on components)
 */
function irondesign_enqueue_assets() {
	
	// Enqueue tokens.css — must load first
	wp_enqueue_style(
		'irondesign-tokens',
		IRONDESIGN_URI . '/assets/css/tokens.css',
		array(),
		IRONDESIGN_VERSION
	);
	
	// Enqueue base.css — depends on tokens
	wp_enqueue_style(
		'irondesign-base',
		IRONDESIGN_URI . '/assets/css/base.css',
		array( 'irondesign-tokens' ),
		IRONDESIGN_VERSION
	);
	
	// Enqueue components.css — depends on base (file may not exist yet, that's okay)
	wp_enqueue_style(
		'irondesign-components',
		IRONDESIGN_URI . '/assets/css/components.css',
		array( 'irondesign-base' ),
		IRONDESIGN_VERSION
	);
	
	// Enqueue woocommerce.css — depends on components
	wp_enqueue_style(
		'irondesign-woocommerce',
		IRONDESIGN_URI . '/assets/css/woocommerce.css',
		array( 'irondesign-components' ),
		IRONDESIGN_VERSION
	);
}

// Hook to wp_enqueue_scripts (standard hook for both styles and scripts)
add_action( 'wp_enqueue_scripts', 'irondesign_enqueue_assets' );