<?php
/**
 * Related Products
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product ) {
	return;
}

$related_ids = wc_get_related_products(
	$product->get_id(),
	4
);

if ( empty( $related_ids ) ) {
	return;
}

?>

<section class="irondesign-related-products">

	<div class="section-header">

		<div>

			<span class="hero-subtitle glass">

				You May Also Like

			</span>

			<h2 class="section-title">

				Related Products

			</h2>

		</div>

	</div>

	<?php

irondesign_render_product_loop(
	$related_ids,
	4
);

?>

</section>