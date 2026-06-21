<?php
/**
 * Homepage Functions
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

/**
 * Get Featured Products
 */
function irondesign_get_featured_products( $limit = 8 ) {

	$cache_key = 'irondesign_featured_' . $limit;

	$product_ids = get_transient( $cache_key );

	if ( false !== $product_ids ) {
		return $product_ids;
	}

	$query = new WC_Product_Query(
		array(
			'featured' => true,
			'status'   => 'publish',
			'limit'    => $limit,
			'return'   => 'ids',
			'orderby'  => 'date',
			'order'    => 'DESC',
		)
	);

	$product_ids = $query->get_products();

	set_transient(
		$cache_key,
		$product_ids,
		HOUR_IN_SECONDS
	);

	return $product_ids;

}

/**
 * Get New Products
 */
function irondesign_get_new_products( $limit = 8 ) {

	$cache_key = 'irondesign_new_' . $limit;

	$product_ids = get_transient( $cache_key );

	if ( false !== $product_ids ) {
		return $product_ids;
	}

	$query = new WC_Product_Query(
		array(
			'status'  => 'publish',
			'limit'   => $limit,
			'orderby' => 'date',
			'order'   => 'DESC',
			'return'  => 'ids',
		)
	);

	$product_ids = $query->get_products();

	set_transient(
		$cache_key,
		$product_ids,
		HOUR_IN_SECONDS
	);

	return $product_ids;

}

/**
 * Get Home Categories
 */
function irondesign_get_home_categories( $limit = 8 ) {

	$cache_key = 'irondesign_categories_' . $limit;

	$categories = get_transient( $cache_key );

	if ( false !== $categories ) {
		return $categories;
	}

	$categories = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => true,
			'parent'     => 0,
			'number'     => $limit,
		)
	);

	set_transient(
		$cache_key,
		$categories,
		HOUR_IN_SECONDS
	);

	return $categories;

}
