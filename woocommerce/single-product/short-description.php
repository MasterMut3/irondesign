<?php
/**
 * Product Short Description
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;

$short_description = apply_filters( 'woocommerce_short_description', $product->get_short_description() );

if ( ! $short_description ) {
    return;
}
?>

<div class="irondesign-short-description">

    <div class="product-short-description">
        <?php echo wp_kses_post( $short_description ); ?>
    </div>

</div>