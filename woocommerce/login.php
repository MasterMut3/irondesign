<?php
/**
 * Login Page
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main">

    <div class="container">

        <div class="login-wrapper">

            <?php woocommerce_content(); ?>

        </div>

    </div>

</main>

<?php
get_footer();