<?php
/**
 * Simple Add to Cart
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
    return;
}
?>

<div class="irondesign-add-to-cart">

    <?php if ( $product->is_in_stock() ) : ?>

        <div class="stock in-stock">
            <?php esc_html_e( 'موجود در انبار', 'irondesign' ); ?>
        </div>

        <?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

        <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype="multipart/form-data">

            <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

            <div class="quantity-wrapper">
                <label for="quantity"><?php esc_html_e( 'تعداد', 'irondesign' ); ?></label>
                <?php woocommerce_quantity_input(
                    array(
                        'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                        'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                        'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(),
                    )
                ); ?>
            </div>

            <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button btn btn-primary">
                <span><?php esc_html_e( 'افزودن به سبد خرید', 'irondesign' ); ?></span>
            </button>

            <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

        </form>

        <?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

    <?php else : ?>

        <div class="stock out-of-stock">
            <?php esc_html_e( 'ناموجود', 'irondesign' ); ?>
        </div>

    <?php endif; ?>

</div>