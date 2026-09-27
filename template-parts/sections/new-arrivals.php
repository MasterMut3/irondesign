<?php
/**
 * New Arrivals Section
 * 
 * Displays a grid of latest WooCommerce products.
 * Uses transient-cached query from irondesign_get_new_products().
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get new products
$product_ids = irondesign_get_new_products( 8 );
?>

<section class="section new-arrivals-section">
	<div class="container">
		
		<!-- Section Header -->
		<div class="section-header">
			<h2><?php echo esc_html__( 'جدیدترین محصولات', 'irondesign' ); ?></h2>
			<a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">
				<?php echo esc_html__( 'مشاهده همه', 'irondesign' ); ?>
			</a>
		</div><!-- .section-header -->
		
		<?php
		// Check if new products exist
		if ( ! empty( $product_ids ) ) {
			?>
			<!-- Products Grid -->
			<div class="products-grid">
				<?php
				foreach ( $product_ids as $product_id ) {
					
					// Get product object
					$product = wc_get_product( $product_id );
					
					// Skip if product not found or not visible
					if ( ! $product || ! $product->is_visible() ) {
						continue;
					}
					
					// Get product data
					$product_link  = get_permalink( $product_id );
					$product_title = esc_html( $product->get_name() );
					$product_image = $product->get_image( 'irondesign-product', array( 'class' => 'product-card-image-img' ) );
					$price_html    = $product->get_price_html();
					$on_sale       = $product->is_on_sale();
					
					?>
					<!-- Product Card -->
					<div class="product-card">
						
						<!-- Product Image -->
						<a href="<?php echo esc_url( $product_link ); ?>" class="product-card-image">
							<?php
							// Product image (already safe HTML from WooCommerce)
							echo wp_kses_post( $product_image );
							
							// Sale badge if on sale
							if ( $on_sale ) {
								?>
								<span class="badge badge-sale">
									<?php echo esc_html__( 'تخفیف', 'irondesign' ); ?>
								</span>
								<?php
							}
							?>
						</a><!-- .product-card-image -->
						
						<!-- Product Title -->
						<h3 class="product-card-title">
							<a href="<?php echo esc_url( $product_link ); ?>">
								<?php echo $product_title; ?>
							</a>
						</h3><!-- .product-card-title -->
						
						<!-- Product Price -->
						<div class="product-card-price">
							<?php
							// Price HTML (already safe from WooCommerce)
							echo wp_kses_post( $price_html );
							?>
						</div><!-- .product-card-price -->
						
					</div><!-- .product-card -->
					<?php
				}
				?>
			</div><!-- .products-grid -->
			<?php
		} else {
			// No new products — show empty message
			?>
			<p class="empty-message">
				<?php echo esc_html__( 'هنوز محصولی ثبت نشده است', 'irondesign' ); ?>
			</p>
			<?php
		}
		?>
		
	</div><!-- .container -->
</section><!-- .new-arrivals-section -->