<?php
/**
 * Categories Section
 * 
 * Displays a grid of top-level product categories from WooCommerce.
 * Uses transient-cached query from irondesign_get_home_categories().
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get top-level categories
$categories = irondesign_get_home_categories( 6 );
?>

<section class="section categories-section">
	<div class="container">
		
		<!-- Section Header -->
		<div class="section-header">
			<h2><?php echo esc_html__( 'دستهبندیها', 'irondesign' ); ?></h2>
			<a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">
				<?php echo esc_html__( 'مشاهده همه', 'irondesign' ); ?>
			</a>
		</div><!-- .section-header -->
		
		<?php
		// Check if categories exist
		if ( ! empty( $categories ) ) {
			?>
			<!-- Categories Grid -->
			<div class="categories-grid">
				<?php
				foreach ( $categories as $category ) {
					
					// Get category link
					$category_link = get_term_link( $category );
					
					// Skip if error
					if ( is_wp_error( $category_link ) ) {
						continue;
					}
					
					// Get category thumbnail
					$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
					$image_url    = $thumbnail_id ? wp_get_attachment_image_url( $thumbnail_id, 'irondesign-category' ) : '';
					
					// Get category name and count
					$category_name  = esc_html( $category->name );
					$category_count = esc_html( $category->count . ' ' . __( 'محصول', 'irondesign' ) );
					
					?>
					<!-- Category Card -->
					<a href="<?php echo esc_url( $category_link ); ?>" class="category-card">
						
						<?php
						// Image or placeholder
						if ( $image_url ) {
							?>
							<img 
								src="<?php echo esc_url( $image_url ); ?>" 
								alt="<?php echo esc_attr( $category_name ); ?>"
								class="category-card-image"
							>
							<?php
						} else {
							?>
							<div class="category-card-image category-card-image-placeholder"></div>
							<?php
						}
						?>
						
						<!-- Overlay -->
						<div class="category-card-overlay"></div>
						
						<!-- Content -->
						<div class="category-card-content">
							<h3 class="category-card-title">
								<?php echo $category_name; ?>
							</h3>
							<span class="category-card-count">
								<?php echo $category_count; ?>
							</span>
						</div><!-- .category-card-content -->
						
					</a><!-- .category-card -->
					<?php
				}
				?>
			</div><!-- .categories-grid -->
			<?php
		} else {
			// No categories found — show empty message
			?>
			<p class="empty-message">
				<?php echo esc_html__( 'بهزودی دستهبندیها اضافه میشوند', 'irondesign' ); ?>
			</p>
			<?php
		}
		?>
		
	</div><!-- .container -->
</section><!-- .categories-section -->