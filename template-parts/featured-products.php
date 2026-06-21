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
			irondesign_render_product_loop(
			$product_ids,
			4);
		?>

	</div>

</section>