<?php
/**
 * Wholesale Section
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

$wholesale_url = home_url( '/wholesale/' );

$image = get_theme_file_uri(
	'assets/images/wholesale.jpg'
);

?>

<section class="wholesale-section">

	<div class="container">

		<div class="glass-card wholesale-wrapper">

			<div class="wholesale-content fade-up">

				<span class="hero-subtitle glass">

					B2B Partnership

				</span>

				<h2 class="section-title">

					Become an
					<br>
					IronDesign Partner

				</h2>

				<p class="section-subtitle">

					Access exclusive wholesale pricing, premium
					collections, fast fulfillment and dedicated
					support for your business.

				</p>

				<ul class="wholesale-benefits">

					<li>

						✓ Exclusive wholesale pricing

					</li>

					<li>

						✓ Early access to new collections

					</li>

					<li>

						✓ Priority customer support

					</li>

					<li>

						✓ Flexible bulk ordering

					</li>

				</ul>

				<div class="hero-actions">

					<a
						href="<?php echo esc_url( $wholesale_url ); ?>"
						class="btn btn-primary">

						Apply Now

					</a>

					<a
						href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
						class="btn btn-glass">

						View Catalog

					</a>

				</div>

			</div>

			<div class="wholesale-image fade-up">

				<img
					src="<?php echo esc_url( $image ); ?>"
					alt="<?php esc_attr_e( 'Wholesale Program', 'irondesign' ); ?>"
					loading="lazy">

			</div>

		</div>

	</div>

</section>