<?php
/**
 * Newsletter Subscription Section
 * 
 * Email subscription form for the newsletter.
 * Form handler will be added on Day 4.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="section newsletter-section">
	<div class="container">
		
		<!-- Newsletter Card -->
		<div class="newsletter-inner glass-card">
			
			<!-- Headline -->
			<h2 class="newsletter-headline">
				<?php echo esc_html__( 'عضویت در خبرنامه', 'irondesign' ); ?>
			</h2>
			
			<!-- Subtext -->
			<p class="newsletter-subtext">
				<?php echo esc_html__( 'از تخفیفها و محصولات جدید باخبر شوید', 'irondesign' ); ?>
			</p>
			
			<!-- Newsletter Form -->
			<!-- Form handler will be added on Day 4 -->
			<form class="newsletter-form" method="post" action="">
				
				<!-- Form Row (Email Input + Button) -->
				<div class="newsletter-form-row">
					
					<!-- Email Input -->
					<input 
						type="email" 
						name="newsletter_email" 
						class="newsletter-input"
						placeholder="<?php echo esc_attr__( 'ایمیل خود را وارد کنید', 'irondesign' ); ?>"
						required
					>
					
					<!-- Submit Button -->
					<button type="submit" class="btn btn-primary">
						<?php echo esc_html__( 'عضویت', 'irondesign' ); ?>
					</button>
					
				</div><!-- .newsletter-form-row -->
				
			</form><!-- .newsletter-form -->
			
		</div><!-- .newsletter-inner -->
		
	</div><!-- .container -->
</section><!-- .newsletter-section -->
