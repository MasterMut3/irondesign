<?php
/**
 * Single Product Short Description
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $post;

$short_description = apply_filters(
	'woocommerce_short_description',
	$post->post_excerpt
);

if ( ! $short_description ) {
	return;
}
?>

<div class="irondesign-short-description">

	<div class="product-short-description">

		<?php echo wp_kses_post( $short_description ); ?>

	</div>

	<div class="product-trust-badges">

		<div class="trust-badge">

			<span class="trust-icon">🚚</span>

			<span>

				<?php esc_html_e( 'Fast Shipping', 'irondesign' ); ?>

			</span>

		</div>

		<div class="trust-badge">

			<span class="trust-icon">🔒</span>

			<span>

				<?php esc_html_e( 'Secure Checkout', 'irondesign' ); ?>

			</span>

		</div>

		<div class="trust-badge">

			<span class="trust-icon">↩️</span>

			<span>

				<?php esc_html_e( 'Easy Returns', 'irondesign' ); ?>

			</span>

		</div>

	</div>

</div>