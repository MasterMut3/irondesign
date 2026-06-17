<?php
/**
 * Features Section
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

$features = array(

	array(
		'icon'        => '🚚',
		'title'       => __( 'Free Shipping', 'irondesign' ),
		'description' => __( 'Free shipping on eligible orders with fast and reliable delivery.', 'irondesign' ),
	),

	array(
		'icon'        => '🔒',
		'title'       => __( 'Secure Payments', 'irondesign' ),
		'description' => __( 'Protected checkout powered by trusted payment gateways.', 'irondesign' ),
	),

	array(
		'icon'        => '⭐',
		'title'       => __( 'Premium Quality', 'irondesign' ),
		'description' => __( 'Every product is selected for quality, comfort and durability.', 'irondesign' ),
	),

	array(
		'icon'        => '💬',
		'title'       => __( '24/7 Support', 'irondesign' ),
		'description' => __( 'Our team is ready to help you whenever you need assistance.', 'irondesign' ),
	),

);

?>

<section class="features-section">

	<div class="container">

		<div class="section-header fade-up">

			<div>

				<span class="hero-subtitle glass">

					Why IronDesign

				</span>

				<h2 class="section-title">

					A Better Shopping Experience

				</h2>

				<p class="section-subtitle">

					Everything we do is focused on delivering premium products and outstanding customer service.

				</p>

			</div>

		</div>

		<div class="features-grid">

			<?php foreach ( $features as $feature ) : ?>

				<article class="feature-card glass-card fade-up">

					<div class="feature-icon">

						<?php echo esc_html( $feature['icon'] ); ?>

					</div>

					<h3 class="feature-title">

						<?php echo esc_html( $feature['title'] ); ?>

					</h3>

					<p class="feature-description">

						<?php echo esc_html( $feature['description'] ); ?>

					</p>

				</article>

			<?php endforeach; ?>

		</div>

	</div>

</section>