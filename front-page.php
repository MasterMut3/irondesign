<?php
/**
 * Front Page Template
 * 
 * Assembles all homepage sections in order.
 * Opens with get_header() and closes with get_footer().
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// Hero section
get_template_part( 'template-parts/hero/hero-home' );

// Categories section
get_template_part( 'template-parts/sections/categories' );

// Featured products section
get_template_part( 'template-parts/sections/featured-products' );

// Promotional banner
get_template_part( 'template-parts/sections/banner' );

// New arrivals section
get_template_part( 'template-parts/sections/new-arrivals' );

// Wholesale section
get_template_part( 'template-parts/sections/wholesale' );

// Features section
get_template_part( 'template-parts/sections/features' );

// Newsletter section
get_template_part( 'template-parts/sections/newsletter' );

get_footer();