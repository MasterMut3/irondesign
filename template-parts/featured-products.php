<?php
/**
 * Featured Products
 *
 * @package IronDesign
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/*
|--------------------------------------------------------------------------
| Cache Products
|--------------------------------------------------------------------------
*/

$cache_key = 'irondesign_featured_products';

$products = get_transient( $cache_key );

if ( false === $products ) {

	$query = new WC_Product_Query(
		array(
			'featured' => true,
			'status'   => 'publish',
			'limit'    => 8,
			'orderby'  => 'date',
			'order'    => 'DESC',
			'return'   => 'objects',
		)
	);

	$products = $query->get_products();

	set_transient(
		$cache_key,
		$products,
		HOUR_IN_SECONDS
	);

}

if ( empty( $products ) ) {
	return;
}

?>

<section class="featured-products">

	<div class="container">

		<div class="section-header fade-up">

			<div>

				<span class="hero-subtitle glass">

					Featured Collection

				</span>

				<h2 class="section-title">

					Featured Products

				</h2>

				<p class="section-subtitle">

					Hand-picked premium products selected for you.

				</p>

			</div>

			<a
				class="btn btn-glass"
				href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">

				View All

			</a>

		</div>

		<?php

		wc_set_loop_prop( 'columns', 4 );

		woocommerce_product_loop_start();

		foreach ( $products as $product ) {

			$post_object = get_post( $product->get_id() );

			setup_postdata( $GLOBALS['post'] = $post_object );

			wc_get_template_part(
				'content',
				'product'
			);

		}

		wp_reset_postdata();

		woocommerce_product_loop_end();

		?>

	</div>

</section>