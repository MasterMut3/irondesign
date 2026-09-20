<?php
/**
 * IronDesign Theme Setup
 * 
 * Registers theme support, navigation menus, image sizes, and ACF options page.
 * Runs on after_setup_theme and acf/init hooks.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Set up theme features, navigation menus, and image sizes.
 * 
 * Hooked to after_setup_theme at priority 10 (default).
 */
function irondesign_setup() {
	
	// Load theme text domain for translations
	load_theme_textdomain( 'irondesign', get_template_directory() . '/languages' );
	
	// ======================================
	// Theme Support
	// ======================================
	
	// Let WordPress generate <title> tag
	add_theme_support( 'title-tag' );
	
	// Enable featured images for posts and pages
	add_theme_support( 'post-thumbnails' );
	
	// Allow custom logo in customizer
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	
	// HTML5 markup for core features
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'script',
		'style',
	) );
	
	// Automatic feed links (RSS)
	add_theme_support( 'automatic-feed-links' );
	
	// ======================================
	// WooCommerce Support
	// ======================================
	
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
	// ======================================
	// Navigation Menus
	// ======================================
	
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'irondesign' ),
		'footer'  => esc_html__( 'Footer Menu', 'irondesign' ),
		'mobile'  => esc_html__( 'Mobile Menu', 'irondesign' ),
	) );
	
	// ======================================
	// Image Sizes
	// ======================================
	
	// Product featured image: 700x900, hard crop
	add_image_size( 'irondesign-product', 700, 900, true );
	
	// Category card: 900x700, hard crop
	add_image_size( 'irondesign-category', 900, 700, true );
	
	// Hero / Banner: 1920x900, hard crop
	add_image_size( 'irondesign-banner', 1920, 900, true );
	
	// Blog featured: 1200x675, hard crop
	add_image_size( 'irondesign-blog', 1200, 675, true );
}

add_action( 'after_setup_theme', 'irondesign_setup' );

/**
 * Register ACF options page for theme settings.
 * 
 * Hooked to acf/init. Allows admins to edit site-wide settings
 * (contact info, social links, logo, etc.) via ACF fields.
 * 
 * Only runs if ACF is active.
 */

