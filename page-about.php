<?php
/**
 * About Us Page Template
 * 
 * Template Name: About Us
 * 
 * Displays the About page with page content, stats, and CTAs.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="container">
	
	<!-- Page Header -->
	<header class="page-header glass-card">
		<h1 class="page-title">
			<?php the_title(); ?>
		</h1>
		<p class="page-subtitle">
			<?php echo esc_html__( 'تلفیق هنر آهن‌گری و ظرافت چوب', 'irondesign' ); ?>
		</p>
	</header><!-- .page-header -->
	
	<!-- Page Content -->
	<div class="page-content glass-card">
		<div class="page-content-body">
			<?php
			// Output page editor content
			the_content();
			?>
		</div><!-- .page-content-body -->
	</div><!-- .page-content -->
	
	<!-- About Stats Section -->
	<section class="about-stats">
		<div class="about-stats-grid">
			
			<!-- Stat 1: Experience -->
			<div class="stat-item glass-card">
				<span class="stat-number">
					<?php echo esc_html__( '۵', 'irondesign' ); ?>
				</span>
				<span class="stat-label">
					<?php echo esc_html__( 'سال تجربه', 'irondesign' ); ?>
				</span>
			</div><!-- .stat-item -->
			
			<!-- Stat 2: Products -->
			<div class="stat-item glass-card">
				<span class="stat-number">
					<?php echo esc_html__( '۲۰۰', 'irondesign' ); ?>
				</span>
				<span class="stat-label">
					<?php echo esc_html__( 'محصول', 'irondesign' ); ?>
				</span>
			</div><!-- .stat-item -->
			
			<!-- Stat 3: Happy Customers -->
			<div class="stat-item glass-card">
				<span class="stat-number">
					<?php echo esc_html__( '۵۰۰', 'irondesign' ); ?>
				</span>
				<span class="stat-label">
					<?php echo esc_html__( 'مشتری راضی', 'irondesign' ); ?>
				</span>
			</div><!-- .stat-item -->
			
			<!-- Stat 4: Satisfaction -->
			<div class="stat-item glass-card">
				<span class="stat-number">
					<?php echo esc_html__( '۱۰۰٪', 'irondesign' ); ?>
				</span>
				<span class="stat-label">
					<?php echo esc_html__( 'رضایت', 'irondesign' ); ?>
				</span>
			</div><!-- .stat-item -->
			
		</div><!-- .about-stats-grid -->
	</section><!-- .about-stats -->
	
	<!-- About CTA Section -->
	<section class="about-cta">
		<h2>
			<?php echo esc_html__( 'می‌خواهید سفارش خود را ثبت کنید؟', 'irondesign' ); ?>
		</h2>
		<p>
			<?php echo esc_html__( 'برای مشاوره و ثبت سفارش سفارشی با ما در تماس باشید.', 'irondesign' ); ?>
		</p>
		
		<!-- CTA Buttons -->
		<div class="about-cta-buttons">
			<a href="<?php echo esc_url( home_url( '/custom-order/' ) ); ?>" class="btn btn-primary btn-lg">
				<?php echo esc_html__( 'سفارش سفارشی', 'irondesign' ); ?>
			</a>
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-ghost btn-lg">
				<?php echo esc_html__( 'تماس با ما', 'irondesign' ); ?>
			</a>
		</div><!-- .about-cta-buttons -->
	</section><!-- .about-cta -->
	
</div><!-- .container -->

<?php
get_footer();