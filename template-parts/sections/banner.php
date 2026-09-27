<?php
/**
 * Promotional Banner Section
 * 
 * Full-width banner with headline, subtext, and call-to-action.
 * Content is currently hardcoded; will be moved to ACF fields later.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="section banner-section">
	
	<!-- Banner Wrapper -->
	<div class="banner">
		
		<!-- Banner Content -->
		<div class="banner-content">
			
			<!-- Banner Headline -->
			<h2 class="banner-headline">
				<?php echo esc_html__( '۲۰٪ تخفیف روی اولین سفارش', 'irondesign' ); ?>
			</h2>
			
			<!-- Banner Subtext -->
			<p class="banner-subtext">
				<?php echo esc_html__( 'با کد IRON20 از اولین خرید خود تخفیف بگیرید', 'irondesign' ); ?>
			</p>
			
			<!-- Banner CTA -->
			<a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="btn btn-primary btn-lg">
				<?php echo esc_html__( 'همین حالا سفارش دهید', 'irondesign' ); ?>
			</a>
			
		</div><!-- .banner-content -->
		
	</div><!-- .banner -->
	
</section><!-- .banner-section -->