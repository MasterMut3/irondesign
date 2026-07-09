<?php
/**
 * Cart Page
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main">

    <div class="container">

        <div class="cart-wrapper glass-card">

            <div class="cart-header">

                <h1 class="cart-title"><?php esc_html_e( 'سبد خرید', 'irondesign' ); ?></h1>

                <p class="cart-subtitle">
                    <?php esc_html_e( 'محصولات خود را مرور کرده و سفارش را نهایی کنید', 'irondesign' ); ?>
                </p>

            </div>

            <?php woocommerce_content(); ?>

        </div>

    </div>

</main>

<?php
get_footer();