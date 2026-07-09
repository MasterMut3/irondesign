<?php
/**
 * My Account Page
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main">

    <div class="container">

        <div class="account-wrapper glass-card">

            <div class="account-header">

                <h1 class="account-title"><?php esc_html_e( 'حساب کاربری', 'irondesign' ); ?></h1>

                <p class="account-subtitle">
                    <?php esc_html_e( 'مدیریت اطلاعات و سفارش‌های خود', 'irondesign' ); ?>
                </p>

            </div>

            <?php woocommerce_content(); ?>

        </div>

    </div>

</main>

<?php
get_footer();