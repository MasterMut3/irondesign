<?php
/**
 * Product Rating
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count <= 0 ) {
	return;
}
?>

<div class="irondesign-product-rating">

	<div class="rating-stars">

		<?php echo wc_get_rating_html( $average, $rating_count ); ?>

	</div>

	<div class="rating-summary">

		<strong>

			<?php echo esc_html( number_format_i18n( $average, 1 ) ); ?>

		</strong>

		<span>

			<?php
			printf(
				esc_html(
					_n(
						'(%s review)',
						'(%s reviews)',
						$review_count,
						'irondesign'
					)
				),
				number_format_i18n( $review_count )
			);
			?>

		</span>

	</div>

</div>