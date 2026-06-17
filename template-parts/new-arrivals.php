<?php
/**
 * New Arrivals
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

$cache_key = 'irondesign_new_arrivals';

$product_ids = get_transient( $cache_key );

if ( false === $product_ids ) {

	$query = new WC_Product_Query(
		array(
			'status'  => 'publish',
			'limit'   => 8,
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
}

if ( empty( $product_ids ) ) {
	return;
}
?>

<section class="new-arrivals">

	<div class="container">

		<div class="section-header fade-up">

			<div>

				<span class="hero-subtitle glass">
					Just Released
				</span>

				<h2 class="section-title">
					New Arrivals
				</h2>

				<p class="section-subtitle">
					Discover the latest additions to the IronDesign collection.
				</p>

			</div>

			<a
				class="btn btn-glass"
				href="<?php echo esc_url( add_query_arg( 'orderby', 'date', wc_get_page_permalink( 'shop' ) ) ); ?>">

				View All

			</a>

		</div>

		<?php

		wc_set_loop_prop( 'columns', 4 );

		woocommerce_product_loop_start();

		foreach ( $product_ids as $product_id ) {

			$post = get_post( $product_id );

			if ( ! $post ) {
				continue;
			}

			$GLOBALS['post'] = $post;

			setup_postdata( $post );

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