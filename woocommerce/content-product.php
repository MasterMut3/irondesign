<?php
/**
 * Product Card - IronDesign Style
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>

<li <?php wc_product_class( 'irondesign-product-card', $product ); ?>>

    <div class="product-card-inner">

        <!-- Product Image -->
        <a class="product-image" href="<?php the_permalink(); ?>">

            <?php
            /**
             * Sale Badge
             */
            if ( $product->is_on_sale() ) :
                ?>
                <span class="onsale">
                    <?php esc_html_e( 'تخفیف', 'irondesign' ); ?>
                </span>
                <?php
            endif;

            /**
             * Product Image
             */
            echo woocommerce_get_product_thumbnail( 'woocommerce_thumbnail' );
            ?>

            <!-- Quick View Overlay (Optional) -->
            <div class="product-overlay">
                <span class="product-overlay-text">
                    <?php esc_html_e( 'مشاهده محصول', 'irondesign' ); ?>
                </span>
            </div>

        </a>

        <!-- Product Content -->
        <div class="product-content">

            <?php if ( $product->get_average_rating() ) : ?>
                <div class="product-rating">
                    <?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
                </div>
            <?php endif; ?>

            <h3 class="product-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>

            <div class="product-price">
                <?php echo wp_kses_post( $product->get_price_html() ); ?>
            </div>

            <div class="product-actions">
                <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
            </div>

        </div>

    </div>

</li>