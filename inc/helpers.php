<?php
/**
 * IronDesign Helper Functions
 * 
 * Query helpers for products and categories.
 * All functions use transient caching (1 hour expiration).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get featured products.
 * 
 * Returns an array of featured product IDs.
 * Results are cached using transients for 1 hour.
 * 
 * @param int $limit Number of products to return. Default 8.
 * @return array Array of product IDs, empty array if none found.
 */
function irondesign_get_featured_products( $limit = 8 ) {
	
	// Build transient key with limit
	$transient_key = 'irondesign_featured_' . $limit;
	
	// Try to get from cache
	$cached = get_transient( $transient_key );
	if ( false !== $cached ) {
		return $cached;
	}
	
	// Query featured products
	$args = array(
		'status'   => 'publish',
		'featured' => true,
		'orderby'  => 'date',
		'order'    => 'DESC',
		'return'   => 'ids',
		'limit'    => $limit,
	);
	
	$query   = new WC_Product_Query( $args );
	$results = $query->get_products();
	
	// Cache for 1 hour
	set_transient( $transient_key, $results, HOUR_IN_SECONDS );
	
	return $results;
}

/**
 * Get new products (latest).
 * 
 * Returns an array of the newest product IDs.
 * Results are cached using transients for 1 hour.
 * 
 * @param int $limit Number of products to return. Default 8.
 * @return array Array of product IDs, empty array if none found.
 */
function irondesign_get_new_products( $limit = 8 ) {
	
	// Build transient key with limit
	$transient_key = 'irondesign_new_' . $limit;
	
	// Try to get from cache
	$cached = get_transient( $transient_key );
	if ( false !== $cached ) {
		return $cached;
	}
	
	// Query newest products
	$args = array(
		'status'  => 'publish',
		'orderby' => 'date',
		'order'   => 'DESC',
		'return'  => 'ids',
		'limit'   => $limit,
	);
	
	$query   = new WC_Product_Query( $args );
	$results = $query->get_products();
	
	// Cache for 1 hour
	set_transient( $transient_key, $results, HOUR_IN_SECONDS );
	
	return $results;
}

/**
 * Get home categories (top-level).
 * 
 * Returns an array of WP_Term objects for top-level product categories.
 * Only includes categories with products. Results cached for 1 hour.
 * 
 * @param int $limit Number of categories to return. Default 6.
 * @return array Array of WP_Term objects, empty array if none found.
 */
function irondesign_get_home_categories( $limit = 6 ) {
	
	// Build transient key with limit
	$transient_key = 'irondesign_categories_' . $limit;
	
	// Try to get from cache
	$cached = get_transient( $transient_key );
	if ( false !== $cached ) {
		return $cached;
	}
	
	// Query top-level categories
	$args = array(
		'taxonomy'   => 'product_cat',
		'hide_empty' => true,
		'parent'     => 0,
		'number'     => $limit,
	);
	
	$results = get_terms( $args );
	
	// Handle errors — return empty array if WP_Error
	if ( is_wp_error( $results ) ) {
		$results = array();
	}
	
	// Cache for 1 hour
	set_transient( $transient_key, $results, HOUR_IN_SECONDS );
	
	return $results;
}