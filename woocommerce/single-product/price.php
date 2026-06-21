<?php
/**
 * Single Product Price
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product ) {
	return;
}

?>

<div class="irondesign-product-price">

	<?php echo wp_kses_post( $product->get_price_html() ); ?>

	<?php if ( $product->is_on_sale() ) : ?>

		<div class="product-discount">

			<?php

			if ( $product->is_type( 'simple' ) ) {

				$regular = (float) $product->get_regular_price();
				$sale    = (float) $product->get_sale_price();

				if ( $regular > 0 && $sale > 0 ) {

					$discount = round(
						( ( $regular - $sale ) / $regular ) * 100
					);

					printf(
						'<span class="discount-badge">-%d%%</span>',
						$discount
					);

				}

			}

			?>

		</div>

	<?php endif; ?>

</div>