<?php
/**
 * Wholesale Section
 * 
 * Displays B2B offerings for cafes, restaurants, and offices.
 * Two-column layout with image and content.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Wholesale image path
$image_path = IRONDESIGN_PATH . '/assets/images/wholesale.jpg';
$image_url  = IRONDESIGN_URI . '/assets/images/wholesale.jpg';
$image_alt  = esc_html__( 'خرید عمده آیرون دیزاین', 'irondesign' );
?>

<section class="section wholesale-section">
	<div class="container">
		
		<!-- Wholesale Grid (2 columns) -->
		<div class="wholesale-grid">
			
			<!-- Column 1 (RTL: Right): Image -->
			<div class="wholesale-image">
				<?php
				if ( file_exists( $image_path ) ) {
					// Image exists — display it
					?>
					<img 
						src="<?php echo esc_url( $image_url ); ?>" 
						alt="<?php echo esc_attr( $image_alt ); ?>"
					>
					<?php
				} else {
					// Image does not exist — show placeholder
					?>
					<div class="wholesale-image-placeholder">
						<?php echo esc_html__( 'تصویر عمدهفروشی', 'irondesign' ); ?>
					</div>
					<?php
				}
				?>
			</div><!-- .wholesale-image -->
			
			<!-- Column 2 (RTL: Left): Content -->
			<div class="wholesale-content">
				
				<!-- Headline -->
				<h2 class="wholesale-headline">
					<?php echo esc_html__( 'خرید عمده و همکاری با کافهها', 'irondesign' ); ?>
				</h2>
				
				<!-- Subtext -->
				<p class="wholesale-subtext">
					<?php echo esc_html__( 'برای کافهها، رستورانها و دفاتر، امکان تأمین تجهیزات و مبلمان با قیمت ویژه و شرایط پرداخت انعطافپذیر فراهم است.', 'irondesign' ); ?>
				</p>
				
				<!-- Features List -->
				<ul class="wholesale-features">
					<li>
						<?php echo esc_html__( 'قیمت ویژه برای خرید عمده', 'irondesign' ); ?>
					</li>
					<li>
						<?php echo esc_html__( 'امکان سفارشیسازی بر اساس نیاز شما', 'irondesign' ); ?>
					</li>
					<li>
						<?php echo esc_html__( 'پشتیبانی اختصاصی و شرایط پرداخت منعطف', 'irondesign' ); ?>
					</li>
				</ul><!-- .wholesale-features -->
				
				<!-- CTA Button -->
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary btn-lg">
					<?php echo esc_html__( 'تماس برای مشاوره', 'irondesign' ); ?>
				</a>
				
			</div><!-- .wholesale-content -->
			
		</div><!-- .wholesale-grid -->
		
	</div><!-- .container -->
</section><!-- .wholesale-section -->