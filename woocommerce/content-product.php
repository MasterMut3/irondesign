<?php
/**
 * Product Card
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<li <?php wc_product_class( 'irondesign-product-card', $product ); ?>>

	<div class="product-card-inner">

		<a
			class="product-image"
			href="<?php the_permalink(); ?>">

			<?php

			/**
			 * Sale Flash
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );

			/**
			 * Product Image
			 */
			echo woocommerce_get_product_thumbnail(
				'woocommerce_thumbnail'
			);

			?>

		</a>

		<div class="product-content">

			<?php if ( $product->get_average_rating() ) : ?>

				<div class="product-rating">

					<?php

					echo wc_get_rating_html(
						$product->get_average_rating()
					);

					?>

				</div>

			<?php endif; ?>

			<h3 class="product-title">

				<a href="<?php the_permalink(); ?>">

					<?php the_title(); ?>

				</a>

			</h3>

			<div class="product-price">

				<?php echo wp_kses_post( $product->get_price_html() ); ?>

			</div>

			<div class="product-actions">

				<?php

				do_action(
					'woocommerce_after_shop_loop_item'
				);

				?>

			</div>

		</div>

	</div>

</li>