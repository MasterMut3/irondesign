<?php
/**
 * WooCommerce Product Card Template
 * 
 * Renders a single product card in shop loops (archive, category, related, etc.).
 * Matches the homepage product card design.
 * This template is auto-loaded by WooCommerce when rendering product loops.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

// Exit early if no product
if ( ! $product ) {
	return;
}

// Get product data
$product_id    = $product->get_id();
$product_link  = get_permalink( $product_id );
$product_name  = esc_html( $product->get_name() );
$product_image = $product->get_image( 'irondesign-product', array( 'class' => 'product-card-image-img' ) );
$price_html    = $product->get_price_html();
$on_sale       = $product->is_on_sale();
?>

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
			<?php echo $product_name; ?>
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