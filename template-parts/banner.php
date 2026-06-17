<?php
/**
 * Promotional Banner
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

$shop_url = class_exists( 'WooCommerce' )
	? wc_get_page_permalink( 'shop' )
	: home_url( '/' );

$banner_image = get_theme_file_uri(
	'assets/images/banner.jpg'
);

?>

<section class="banner-section">

	<div class="container">

		<div class="banner glass-card">

			<div class="banner-media">

				<img
					src="<?php echo esc_url( $banner_image ); ?>"
					alt="<?php esc_attr_e( 'IronDesign Collection', 'irondesign' ); ?>"
					loading="lazy">

			</div>

			<div class="banner-overlay"></div>

			<div class="banner-content fade-up">

				<span class="hero-subtitle glass">

					Limited Collection

				</span>

				<h2>

					Minimal Design.
					<br>
					Premium Quality.

				</h2>

				<p>

					Discover carefully selected clothing designed
					for comfort, durability and timeless style.

				</p>

				<div class="hero-actions">

					<a
						href="<?php echo esc_url( $shop_url ); ?>"
						class="btn btn-primary">

						Shop Collection

					</a>

					<a
						href="#featured-products"
						class="btn btn-glass">

						Explore Products

					</a>

				</div>

			</div>

		</div>

	</div>

</section>