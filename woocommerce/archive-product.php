<?php
/**
 * WooCommerce Shop Archive Template
 * 
 * Displays product archives (shop, category, tag, etc.).
 * Uses the custom .products-grid layout with content-product.php cards.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		
		<!-- Archive Header -->
		<header class="woocommerce-products-header">
			<h1 class="woocommerce-products-header__title page-title">
				<?php woocommerce_page_title(); ?>
			</h1>
			<?php
			/**
			 * Hook: woocommerce_archive_description.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
			?>
		</header><!-- .woocommerce-products-header -->
		
		<?php
		// Check if there are products to display
		if ( woocommerce_product_loop() ) {
			
			// Output result count and sorting options
			do_action( 'woocommerce_before_shop_loop' );
			
			?>
			<!-- Products Grid -->
			<div class="products-grid">
				<?php
				// Loop through products
				while ( have_posts() ) {
					the_post();
					
					/**
					 * Hook: woocommerce_shop_loop.
					 */
					do_action( 'woocommerce_shop_loop' );
					
					// Load product card (content-product.php)
					wc_get_template_part( 'content', 'product' );
				}
				?>
			</div><!-- .products-grid -->
			<?php
			
			// Output pagination
			do_action( 'woocommerce_after_shop_loop' );
			
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action( 'woocommerce_no_products_found' );
		}
		?>
		
	</div><!-- .container -->
</main><!-- #primary.site-main -->

<?php
get_footer();