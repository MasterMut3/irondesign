<?php
/**
 * Product Price
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

<div class="irondesign-product-price">

    <div class="price">
        <?php echo wp_kses_post( $product->get_price_html() ); ?>
    </div>

    <?php if ( $product->is_on_sale() ) : ?>
        <span class="discount-badge">
            <?php
            $regular_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();
            $percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
            echo esc_html( $percentage . '% ' . __( 'تخفیف', 'irondesign' ) );
            ?>
        </span>
    <?php endif; ?>

</div>