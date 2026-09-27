<?php
/**
 * Features Section
 * 
 * Displays 4 trust/feature items in a grid layout using glass cards.
 * Content is currently hardcoded; will be moved to ACF fields later.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="section features-section">
	<div class="container">
		
		<!-- Features Grid -->
		<div class="features-grid">
			
			<!-- Feature 1: Safe Shipping -->
			<div class="feature-item glass-card">
				<div class="feature-icon">📦</div>
				<h3 class="feature-title">
					<?php echo esc_html__( 'ارسال ایمن', 'irondesign' ); ?>
				</h3>
				<p class="feature-text">
					<?php echo esc_html__( 'بستهبندی حرفهای و ارسال به سراسر ایران', 'irondesign' ); ?>
				</p>
			</div><!-- .feature-item -->
			
			<!-- Feature 2: Quality Guarantee -->
			<div class="feature-item glass-card">
				<div class="feature-icon">✅</div>
				<h3 class="feature-title">
					<?php echo esc_html__( 'گارانتی کیفیت', 'irondesign' ); ?>
				</h3>
				<p class="feature-text">
					<?php echo esc_html__( '۱۸ ماه گارانتی روی تمام محصولات', 'irondesign' ); ?>
				</p>
			</div><!-- .feature-item -->
			
			<!-- Feature 3: Custom Design -->
			<div class="feature-item glass-card">
				<div class="feature-icon">🛠️</div>
				<h3 class="feature-title">
					<?php echo esc_html__( 'ساخت سفارشی', 'irondesign' ); ?>
				</h3>
				<p class="feature-text">
					<?php echo esc_html__( 'طراحی و ساخت بر اساس سلیقه شما', 'irondesign' ); ?>
				</p>
			</div><!-- .feature-item -->
			
			<!-- Feature 4: Support -->
			<div class="feature-item glass-card">
				<div class="feature-icon">📞</div>
				<h3 class="feature-title">
					<?php echo esc_html__( 'پشتیبانی', 'irondesign' ); ?>
				</h3>
				<p class="feature-text">
					<?php echo esc_html__( 'پاسخگویی ۷ روز هفته', 'irondesign' ); ?>
				</p>
			</div><!-- .feature-item -->
			
		</div><!-- .features-grid -->
		
	</div><!-- .container -->
</section><!-- .features-section -->