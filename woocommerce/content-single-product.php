<?php
/**
 * Content Single Product
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product ) {
    return;
}
?>

<div class="single-product-wrapper">

    <div class="single-product-content">

        <!-- Product Gallery -->
        <div class="single-product-gallery glass-card">

            <?php do_action( 'woocommerce_before_single_product_summary' ); ?>

        </div>

        <!-- Product Summary -->
        <div class="single-product-summary glass-card">

            <?php do_action( 'woocommerce_single_product_summary' ); ?>

            <!-- Trust Badges -->
            <div class="product-trust-badges">

                <div class="trust-badge">
                    <span class="trust-icon">🔨</span>
                    <span><?php esc_html_e( 'صنایع دستی', 'irondesign' ); ?></span>
                </div>

                <div class="trust-badge">
                    <span class="trust-icon">🌳</span>
                    <span><?php esc_html_e( 'چوب طبیعی', 'irondesign' ); ?></span>
                </div>

                <div class="trust-badge">
                    <span class="trust-icon">⚙️</span>
                    <span><?php esc_html_e( 'استحکام آهن', 'irondesign' ); ?></span>
                </div>

            </div>

        </div>

    </div>

</div>