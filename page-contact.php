<?php
/**
 * Contact Page Template
 * 
 * Template Name: Contact
 * 
 * Displays the Contact page with contact info, form, and map.
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
			<?php echo esc_html__( 'با ما در تماس باشید', 'irondesign' ); ?>
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
	
	<!-- Contact Info Section -->
	<section class="contact-info glass-card">
		<div class="contact-info-grid">
			
			<!-- Address -->
			<div class="contact-info-item">
				<h3 class="contact-info-title">
					<?php echo esc_html__( 'آدرس', 'irondesign' ); ?>
				</h3>
				<p class="contact-info-text">
					<?php echo esc_html__( 'تهران، خیابان فردوسی، کوچه آیرون‌ها', 'irondesign' ); ?>
				</p>
			</div><!-- .contact-info-item -->
			
			<!-- Phone -->
			<div class="contact-info-item">
				<h3 class="contact-info-title">
					<?php echo esc_html__( 'تلفن', 'irondesign' ); ?>
				</h3>
				<p class="contact-info-text">
					<a href="tel:+989123456789">
						<?php echo esc_html( '+98 (912) 345-6789' ); ?>
					</a>
				</p>
			</div><!-- .contact-info-item -->
			
			<!-- Email -->
			<div class="contact-info-item">
				<h3 class="contact-info-title">
					<?php echo esc_html__( 'ایمیل', 'irondesign' ); ?>
				</h3>
				<p class="contact-info-text">
					<a href="mailto:info@irondesign.ir">
						<?php echo esc_html( 'info@irondesign.ir' ); ?>
					</a>
				</p>
			</div><!-- .contact-info-item -->
			
			<!-- Working Hours -->
			<div class="contact-info-item">
				<h3 class="contact-info-title">
					<?php echo esc_html__( 'ساعات کاری', 'irondesign' ); ?>
				</h3>
				<p class="contact-info-text">
					<?php echo esc_html__( 'شنبه تا چهارشنبه: ۹ صبح تا ۶ شام', 'irondesign' ); ?>
					<br>
					<?php echo esc_html__( 'پنج‌شنبه: بسته', 'irondesign' ); ?>
				</p>
			</div><!-- .contact-info-item -->
			
		</div><!-- .contact-info-grid -->
		
		<!-- Social Links -->
		<div class="contact-social">
			<h3>
				<?php echo esc_html__( 'شبکه‌های اجتماعی', 'irondesign' ); ?>
			</h3>
			<ul class="social-links">
				<li>
					<a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
						<?php echo esc_html__( 'اینستاگرام', 'irondesign' ); ?>
					</a>
				</li>
				<li>
					<a href="https://t.me" target="_blank" rel="noopener noreferrer">
						<?php echo esc_html__( 'تلگرام', 'irondesign' ); ?>
					</a>
				</li>
				<li>
					<a href="https://wa.me" target="_blank" rel="noopener noreferrer">
						<?php echo esc_html__( 'واتس‌اپ', 'irondesign' ); ?>
					</a>
				</li>
			</ul>
		</div><!-- .contact-social -->
	</section><!-- .contact-info -->
	
	<!-- Contact Form Section -->
	<section class="contact-form-section glass-card">
		<h2>
			<?php echo esc_html__( 'فرم تماس', 'irondesign' ); ?>
		</h2>
		<p>
			<?php echo esc_html__( 'پیام خود را برای ما ارسال کنید، ما در سریع‌ترین زمان پاسخ خواهیم داد.', 'irondesign' ); ?>
		</p>
		<!-- Contact form shortcode will be placed here on Day 5 -->
		<!-- [contact-form-7 id="123"] -->
	</section><!-- .contact-form-section -->
	
	<!-- Map Section -->
	<section class="contact-map-section">
		<h2>
			<?php echo esc_html__( 'موقعیت ما روی نقشه', 'irondesign' ); ?>
		</h2>
		<div class="contact-map">
			<!-- Map embed will be placed here on Day 5 -->
			<div class="contact-map-placeholder glass-card">
				<?php echo esc_html__( 'نقشه', 'irondesign' ); ?>
			</div>
		</div>
	</section><!-- .contact-map-section -->
	
</div><!-- .container -->

<?php
get_footer();