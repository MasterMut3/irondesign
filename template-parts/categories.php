<?php
/**
 * Product Categories Section
 *
 * @package IronDesign
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$product_categories = get_terms(
	array(
		'taxonomy'   => 'product_cat',
		'hide_empty' => true,
		'number'     => 8,
		'parent'     => 0,
	)
);

if ( empty( $product_categories ) || is_wp_error( $product_categories ) ) {
	return;
}
?>

<section class="product-categories">

	<div class="container">

		<div class="section-header fade-up">

			<div>

				<span class="hero-subtitle glass">
					Categories
				</span>

				<h2 class="section-title">
					Shop by Category
				</h2>

				<p class="section-subtitle">
					Browse our collections and discover products that match your style.
				</p>

			</div>

		</div>

		<div class="categories-grid">

			<?php foreach ( $product_categories as $category ) : ?>

				<?php

				$thumbnail_id = get_term_meta(
					$category->term_id,
					'thumbnail_id',
					true
				);

				$image = wp_get_attachment_image_url(
					$thumbnail_id,
					'large'
				);

				if ( ! $image ) {
					$image = wc_placeholder_img_src();
				}

				?>

				<a
					class="category-card glass-card fade-up"
					href="<?php echo esc_url( get_term_link( $category ) ); ?>">

					<div class="category-image">

						<img
							src="<?php echo esc_url( $image ); ?>"
							alt="<?php echo esc_attr( $category->name ); ?>"
							loading="lazy">

					</div>

					<div class="category-overlay"></div>

					<div class="category-content">

						<span class="category-tag">

							<?php
							echo esc_html(
								sprintf(
									_n(
										'%d Product',
										'%d Products',
										$category->count,
										'irondesign'
									),
									$category->count
								)
							);
							?>

						</span>

						<h3 class="category-title">

							<?php echo esc_html( $category->name ); ?>

						</h3>

						<p>

							Explore Collection →

						</p>

					</div>

				</a>

			<?php endforeach; ?>

		</div>

	</div>

</section>