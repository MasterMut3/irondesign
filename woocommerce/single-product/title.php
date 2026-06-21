<?php
/**
 * Single Product Title
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

<header class="irondesign-product-header">

    <?php if ( $product->is_on_sale() ) : ?>

        <span class="sale-badge">

            <?php esc_html_e( 'Sale', 'irondesign' ); ?>

        </span>

    <?php endif; ?>

    <h1 class="product_title entry-title">

        <?php the_title(); ?>

    </h1>

</header>