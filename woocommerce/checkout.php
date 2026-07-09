<?php
/**
 * Checkout Page
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main">

    <div class="container">

        <div class="checkout-wrapper glass-card">

            <div class="checkout-header">

                <h1 class="checkout-title"><?php esc_html_e( 'تکمیل سفارش', 'irondesign' ); ?></h1>

                <p class="checkout-subtitle">
                    <?php esc_html_e( 'اطلاعات خود را وارد کرده و سفارش را نهایی کنید', 'irondesign' ); ?>
                </p>

            </div>

            <?php woocommerce_content(); ?>

        </div>

    </div>

</main>

<?php
get_footer();