<?php
/**
 * Single Product
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main single-product-page">

    <div class="container">

        <?php
        /**
         * Before Main Content
         *
         * - Wrapper
         * - Breadcrumbs
         */
        do_action( 'woocommerce_before_main_content' );
        ?>

        <?php while ( have_posts() ) : ?>

            <?php the_post(); ?>

            <?php wc_get_template_part( 'content', 'single-product' ); ?>

        <?php endwhile; ?>

        <?php
        /**
         * Closing wrapper
         */
        do_action( 'woocommerce_after_main_content' );
        ?>

    </div>

</main>

<?php
get_footer();