<?php
/**
 * Product Meta
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

<div class="irondesign-product-meta">

    <?php if ( wc_product_sku_enabled() && $product->get_sku() ) : ?>
        <div class="meta-item">
            <span class="meta-label"><?php esc_html_e( 'شناسه محصول:', 'irondesign' ); ?></span>
            <span class="meta-value"><?php echo esc_html( $product->get_sku() ); ?></span>
        </div>
    <?php endif; ?>

    <?php if ( $product->get_categories() ) : ?>
        <div class="meta-item">
            <span class="meta-label"><?php esc_html_e( 'دسته‌بندی:', 'irondesign' ); ?></span>
            <span class="meta-value"><?php echo wp_kses_post( $product->get_categories( ', ' ) ); ?></span>
        </div>
    <?php endif; ?>

    <?php if ( $product->get_tags() ) : ?>
        <div class="meta-item">
            <span class="meta-label"><?php esc_html_e( 'برچسب‌ها:', 'irondesign' ); ?></span>
            <span class="meta-value"><?php echo wp_kses_post( $product->get_tags( ', ' ) ); ?></span>
        </div>
    <?php endif; ?>

</div>