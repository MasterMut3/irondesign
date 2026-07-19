<?php
/**
 * WooCommerce Functions
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme Support
 */
function irondesign_woocommerce_setup() {

	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 600,
			'single_image_width'    => 1200,

			'product_grid' => array(
				'default_rows'    => 2,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 2,
				'max_columns'     => 4,
			),
		)
	);

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

}

add_action(
	'after_setup_theme',
	'irondesign_woocommerce_setup'
);

/**
 * Products Per Page
 */
add_filter(
	'loop_shop_per_page',
	function () {
		return 12;
	},
	20
);

/**
 * Product Columns
 */
add_filter(
	'loop_shop_columns',
	function () {
		return 4;
	}
);

/**
 * Related Products
 */
add_filter(
	'woocommerce_output_related_products_args',
	function ( $args ) {

		$args['posts_per_page'] = 4;
		$args['columns'] = 4;

		return $args;

	}
);

/**
 * Upsells
 */
remove_action(
	'woocommerce_after_single_product_summary',
	'woocommerce_upsell_display',
	15
);

add_action(
	'woocommerce_after_single_product_summary',
	function () {

		woocommerce_upsell_display(
			4,
			4
		);

	},
	15
);

/**
 * Cross Sells
 */
add_filter(
	'woocommerce_cross_sells_columns',
	function () {
		return 4;
	}
);

add_filter(
	'woocommerce_cross_sells_total',
	function () {
		return 4;
	}
);

/**
 * Disable Default Styles
 */
add_filter(
	'woocommerce_enqueue_styles',
	'__return_empty_array'
);
remove_action(
    'woocommerce_before_single_product_summary',
    'woocommerce_show_product_images',
    20
);

function irondesign_template_product_image() {

	wc_get_template(
		'single-product/product-image.php'
	);

}

add_action(
	'woocommerce_before_single_product_summary',
	'irondesign_template_product_image',
	20
);
remove_action(
    'woocommerce_single_product_summary',
    'woocommerce_template_single_title',
    5
);

function irondesign_template_single_title() {

	wc_get_template(
		'single-product/title.php'
	);

}

add_action(
	'woocommerce_single_product_summary',
	'irondesign_template_single_title',
	5
);
remove_action(
	'woocommerce_single_product_summary',
	'woocommerce_template_single_rating',
	10
);
function irondesign_template_single_rating() {

	wc_get_template(
		'single-product/rating.php'
	);

}

add_action(
	'woocommerce_single_product_summary',
	'irondesign_template_single_rating',
	10
);
remove_action(
	'woocommerce_single_product_summary',
	'woocommerce_template_single_price',
	10
);

add_action(
	'woocommerce_single_product_summary',
	'irondesign_template_single_price',
	10
);

function irondesign_template_single_price() {

	wc_get_template(
		'single-product/price.php'
	);

}
remove_action(
	'woocommerce_single_product_summary',
	'woocommerce_template_single_excerpt',
	20
);

add_action(
	'woocommerce_single_product_summary',
	'irondesign_template_single_excerpt',
	20
);

function irondesign_template_single_excerpt() {

	wc_get_template(
		'single-product/short-description.php'
	);

}
remove_action(
	'woocommerce_single_product_summary',
	'woocommerce_template_single_meta',
	40
);

add_action(
	'woocommerce_single_product_summary',
	'irondesign_template_single_meta',
	40
);

function irondesign_template_single_meta() {

	wc_get_template(
		'single-product/meta.php'
	);

}
/**
 * Related Products Wrapper
 */

remove_action(
	'woocommerce_after_single_product_summary',
	'woocommerce_output_related_products',
	20
);

add_action(
	'woocommerce_after_single_product_summary',
	'irondesign_related_products',
	20
);

function irondesign_related_products() {

	wc_get_template(
		'single-product/related.php'
	);

}
/**
 * ============================================
 * ADD TO CART OVERRIDE
 * ============================================
 */

// Remove default add to cart
remove_action(
    'woocommerce_single_product_summary',
    'woocommerce_template_single_add_to_cart',
    30
);

// Add custom add to cart
add_action(
    'woocommerce_single_product_summary',
    'irondesign_template_single_add_to_cart',
    30
);

function irondesign_template_single_add_to_cart() {
    global $product;
    
    if ($product->is_type('simple')) {
        wc_get_template('single-product/simple.php');
    } elseif ($product->is_type('variable')) {
        wc_get_template('single-product/variable.php');
    }
}