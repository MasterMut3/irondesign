<?php
/**
 * Product Rating
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->get_average_rating() ) {
    return;
}
?>

<div class="irondesign-product-rating">

    <div class="rating-stars">
        <?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
    </div>

    <div class="rating-summary">
        <strong><?php echo esc_html( $product->get_average_rating() ); ?></strong>
        <span>(<?php echo esc_html( $product->get_rating_count() ); ?> <?php esc_html_e( 'نظر', 'irondesign' ); ?>)</span>
    </div>

</div>