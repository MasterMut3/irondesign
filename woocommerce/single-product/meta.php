<?php
/**
 * Product Meta
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

<div class="irondesign-product-meta">

	<?php if ( wc_product_sku_enabled() && $product->get_sku() ) : ?>

		<div class="meta-item">

			<span class="meta-label">

				<?php esc_html_e( 'SKU', 'irondesign' ); ?>

			</span>

			<span class="meta-value">

				<?php echo esc_html( $product->get_sku() ); ?>

			</span>

		</div>

	<?php endif; ?>

	<?php if ( wc_get_product_category_list( $product->get_id() ) ) : ?>

		<div class="meta-item">

			<span class="meta-label">

				<?php esc_html_e( 'Categories', 'irondesign' ); ?>

			</span>

			<span class="meta-value">

				<?php echo wp_kses_post( wc_get_product_category_list( $product->get_id(), ', ' ) ); ?>

			</span>

		</div>

	<?php endif; ?>

	<?php if ( wc_get_product_tag_list( $product->get_id() ) ) : ?>

		<div class="meta-item">

			<span class="meta-label">

				<?php esc_html_e( 'Tags', 'irondesign' ); ?>

			</span>

			<span class="meta-value">

				<?php echo wp_kses_post( wc_get_product_tag_list( $product->get_id(), ', ' ) ); ?>

			</span>

		</div>

	<?php endif; ?>

</div>