<?php
/**
 * Hero Section — Homepage
 * 
 * Displays the main hero banner with headline, subtext, CTAs, and image.
 * Content is currently hardcoded; will be moved to ACF fields on Day 4.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Hero image path
$hero_image_path = IRONDESIGN_PATH . '/assets/images/hero.jpg';
$hero_image_url  = IRONDESIGN_URI . '/assets/images/hero.jpg';
$hero_image_alt  = esc_html__( 'مبلمان دستساز آیرون دیزاین', 'irondesign' );
?>

<section class="hero">
	<div class="container">
		
		<!-- Hero Content (Right side in RTL) -->
		<div class="hero-content">
			
			<!-- Headline -->
			<h1 class="hero-headline">
				<?php echo esc_html__( 'آهن و چوب، دستساز برای زندگی شما', 'irondesign' ); ?>
			</h1>
			
			<!-- Subtext -->
			<p class="hero-subtext">
				<?php echo esc_html__( 'مبلمان و دکور سفارشی ساختهشده از چوب طبیعی و آهن گالوانیزه', 'irondesign' ); ?>
			</p>
			
			<!-- Call-to-Action Buttons -->
			<div class="hero-ctas">
				
				<!-- CTA 1: Shop -->
				<a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="btn btn-primary btn-lg">
					<?php echo esc_html__( 'مشاهده فروشگاه', 'irondesign' ); ?>
				</a>
				
				<!-- CTA 2: Custom Order -->
				<a href="<?php echo esc_url( home_url( '/custom-order/' ) ); ?>" class="btn btn-ghost btn-lg">
					<?php echo esc_html__( 'سفارش سفارشی', 'irondesign' ); ?>
				</a>
				
			</div><!-- .hero-ctas -->
			
		</div><!-- .hero-content -->
		
		<!-- Hero Image (Left side in RTL) -->
		<div class="hero-image">
			<?php
			if ( file_exists( $hero_image_path ) ) {
				// Image exists — display it
				?>
				<img 
					src="<?php echo esc_url( $hero_image_url ); ?>" 
					alt="<?php echo esc_attr( $hero_image_alt ); ?>"
				>
				<?php
			} else {
				// Image does not exist — show placeholder
				?>
				<div class="hero-image-placeholder">
					<?php echo esc_html__( 'تصویر هیرو', 'irondesign' ); ?>
				</div>
				<?php
			}
			?>
		</div><!-- .hero-image -->
		
	</div><!-- .container -->
</section><!-- .hero -->