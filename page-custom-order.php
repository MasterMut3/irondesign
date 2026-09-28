<?php
/**
 * Custom Order Page Template
 * 
 * Template Name: Custom Order
 * 
 * Displays the custom order flow with 6-step progress tracking.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get current step from query param (default 1, clamp 1-6)
$current_step = isset( $_GET['step'] ) ? (int) $_GET['step'] : 1;
$current_step = max( 1, min( 6, $current_step ) );

// Get product ID from query param if set
$product_id = isset( $_GET['product'] ) ? (int) $_GET['product'] : 0;

// Array to store errors
$errors = array();

// Process form submission if POST
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$result = irondesign_process_custom_order();
	
	// If redirect is set, do the redirect
	if ( isset( $result['redirect'] ) && $result['redirect'] ) {
    wp_safe_redirect( $result['redirect'] );
    exit;
}
	
	// Store errors if any
	if ( isset( $result['errors'] ) && ! empty( $result['errors'] ) ) {
		$errors = $result['errors'];
	}
}

// Step definitions
$steps = array(
	1 => esc_html__( 'ارسال طرح', 'irondesign' ),
	2 => esc_html__( 'محاسبه قیمت', 'irondesign' ),
	3 => esc_html__( 'پیش فاکتور', 'irondesign' ),
	4 => esc_html__( 'پیش پرداخت', 'irondesign' ),
	5 => esc_html__( 'طراحی و ساخت', 'irondesign' ),
	6 => esc_html__( 'تسویه و ارسال', 'irondesign' ),
);

get_header();
?>

<div class="container">
	
	<!-- Page Header -->
	<header class="page-header glass-card">
		<h1 class="page-title">
			<?php the_title(); ?>
		</h1>
		<p class="page-subtitle">
			<?php echo esc_html__( 'سفارش محصولات سفارشی', 'irondesign' ); ?>
		</p>
	</header><!-- .page-header -->
	
	<?php
	// Display errors if any
	if ( ! empty( $errors ) ) {
		foreach ( $errors as $error ) {
			?>
			<div class="notice notice-error">
				<p><?php echo esc_html( $error ); ?></p>
			</div>
			<?php
		}
	}
	?>
	
	<!-- Step Progress Bar -->
	<div class="steps-progress">
		<div class="step-indicators">
			<?php
			for ( $i = 1; $i <= 6; $i++ ) {
				$is_active    = ( $i === $current_step );
				$is_completed = ( $i < $current_step );
				$step_class   = $is_active ? 'active' : ( $is_completed ? 'completed' : '' );
				?>
				<div class="step-indicator <?php echo esc_attr( $step_class ); ?>">
					<span class="step-number"><?php echo esc_html( $i ); ?></span>
					<span class="step-title"><?php echo esc_html( $steps[ $i ] ); ?></span>
				</div>
				<?php
			}
			?>
		</div><!-- .step-indicators -->
		<div class="progress-bar">
			<div class="progress-fill" style="width: <?php echo esc_attr( ( ( $current_step - 1 ) / 5 ) * 100 ); ?>%"></div>
		</div><!-- .progress-bar -->
	</div><!-- .steps-progress -->
	
	<?php
	// Step content
	switch ( $current_step ) {
		
		// Step 1: Custom Order Form
		case 1:
			?>
			<div class="step-form glass-card">
				<h2><?php echo esc_html__( 'ارسال طرح و ابعاد سفارشی', 'irondesign' ); ?></h2>
				<p><?php echo esc_html__( 'لطفاً اطلاعات زیر را تکمیل کنید تا همکاران ما با شما تماس بگیرند.', 'irondesign' ); ?></p>
				
				<?php
				// Show selected product if product ID in query string
				if ( $product_id > 0 ) {
					$product = wc_get_product( $product_id );
					if ( $product && $product->is_visible() ) {
						?>
						<div class="selected-product glass-card">
							<p><?php echo esc_html__( 'محصول انتخاب‌شده:', 'irondesign' ); ?></p>
							<strong><?php echo esc_html( $product->get_name() ); ?></strong>
						</div>
						<?php
					}
				}
				?>
				
				<form method="post" enctype="multipart/form-data" class="custom-order-form">
					<?php wp_nonce_field( 'irondesign_custom_order', 'custom_order_nonce' ); ?>
					
					<!-- Name Field -->
					<div class="form-group">
						<label for="custom_order_name">
							<?php echo esc_html__( 'نام', 'irondesign' ); ?> <span class="required">*</span>
						</label>
						<input 
							type="text" 
							id="custom_order_name" 
							name="custom_order_name" 
							required
						>
					</div>
					
					<!-- Phone Field -->
					<div class="form-group">
						<label for="custom_order_phone">
							<?php echo esc_html__( 'تلفن', 'irondesign' ); ?> <span class="required">*</span>
						</label>
						<input 
							type="tel" 
							id="custom_order_phone" 
							name="custom_order_phone" 
							required
						>
					</div>
					
					<!-- Email Field -->
					<div class="form-group">
						<label for="custom_order_email">
							<?php echo esc_html__( 'ایمیل', 'irondesign' ); ?>
						</label>
						<input 
							type="email" 
							id="custom_order_email" 
							name="custom_order_email"
						>
					</div>
					
					<!-- Product Reference Field -->
					<div class="form-group">
						<label for="custom_order_product">
							<?php echo esc_html__( 'محصول مشابه', 'irondesign' ); ?>
						</label>
						<select id="custom_order_product" name="custom_order_product">
							<option value="">
								<?php echo esc_html__( 'انتخاب کنید...', 'irondesign' ); ?>
							</option>
							<?php
							$products = wc_get_products( array(
								'limit'  => -1,
								'status' => 'publish',
							) );
							
							foreach ( $products as $prod ) {
								?>
								<option value="<?php echo esc_attr( $prod->get_id() ); ?>">
									<?php echo esc_html( $prod->get_name() ); ?>
								</option>
								<?php
							}
							?>
						</select>
					</div>
					
					<!-- Description Field -->
					<div class="form-group">
						<label for="custom_order_description">
							<?php echo esc_html__( 'توضیح درخواست', 'irondesign' ); ?> <span class="required">*</span>
						</label>
						<textarea 
							id="custom_order_description" 
							name="custom_order_description" 
							required
						></textarea>
					</div>
					
					<!-- Image Upload Field -->
					<div class="form-group">
						<label for="custom_order_image">
							<?php echo esc_html__( 'تصویر طرح', 'irondesign' ); ?>
						</label>
						<input 
							type="file" 
							id="custom_order_image" 
							name="custom_order_image" 
							accept="image/*"
						>
						<small><?php echo esc_html__( 'فرمت‌های پذیرفته‌شده: JPG, PNG, GIF', 'irondesign' ); ?></small>
					</div>
					
					<!-- Submit Button -->
					<button type="submit" class="btn btn-primary btn-lg">
						<?php echo esc_html__( 'ارسال سفارش', 'irondesign' ); ?>
					</button>
				</form><!-- .custom-order-form -->
			</div><!-- .step-form -->
			<?php
			break;
		
		// Step 2: Price Calculation
		case 2:
			?>
			<div class="step-info glass-card">
				<div class="step-icon">💰</div>
				<h2><?php echo esc_html__( 'محاسبه و اعلام قیمت', 'irondesign' ); ?></h2>
				<p><?php echo esc_html__( 'همکاران ما پس از بررسی طرح شما، قیمت دقیق را محاسبه و به شما اعلام میکنند.', 'irondesign' ); ?></p>
				<div class="info-box">
					<p><?php echo esc_html__( 'معمولاً این مرحله ۲۴ تا ۴۸ ساعت زمان می‌برد.', 'irondesign' ); ?></p>
					<p><?php echo esc_html__( 'ما از طریق تلفن یا ایمیل با شما تماس خواهیم گرفت.', 'irondesign' ); ?></p>
				</div>
				<a href="<?php echo esc_url( add_query_arg( 'step', 3, get_permalink() ) ); ?>" class="btn btn-primary btn-lg">
					<?php echo esc_html__( 'مرحله بعد: ارسال پیش فاکتور', 'irondesign' ); ?>
				</a>
			</div><!-- .step-info -->
			<?php
			break;
		
		// Step 3: Pro Forma Invoice
		case 3:
			?>
			<div class="step-info glass-card">
				<div class="step-icon">📄</div>
				<h2><?php echo esc_html__( 'ارسال پیش فاکتور', 'irondesign' ); ?></h2>
				<p><?php echo esc_html__( 'پس از تایید قیمت، پیش فاکتور برای شما ارسال خواهد شد.', 'irondesign' ); ?></p>
				<div class="info-box">
					<p><?php echo esc_html__( 'پیش فاکتور شامل جزئیات کامل سفارش و مبلغ نهایی است.', 'irondesign' ); ?></p>
				</div>
				<a href="<?php echo esc_url( add_query_arg( 'step', 4, get_permalink() ) ); ?>" class="btn btn-primary btn-lg">
					<?php echo esc_html__( 'مرحله بعد: پیش پرداخت', 'irondesign' ); ?>
				</a>
			</div><!-- .step-info -->
			<?php
			break;
		
		// Step 4: Pre-Payment
		case 4:
			?>
			<div class="step-info glass-card">
				<div class="step-icon">💳</div>
				<h2><?php echo esc_html__( 'پیش پرداخت', 'irondesign' ); ?></h2>
				<p><?php echo esc_html__( 'پس از تایید پیش فاکتور، ۳۰٪ از مبلغ کل به عنوان پیش پرداخت واریز میشود.', 'irondesign' ); ?></p>
				<div class="info-box">
					<p><strong><?php echo esc_html__( 'اطلاعات حساب بانکی:', 'irondesign' ); ?></strong></p>
					<p><?php echo esc_html__( 'نام: آیرون دیزاین', 'irondesign' ); ?></p>
					<p><?php echo esc_html__( 'بانک: بانک تجارت', 'irondesign' ); ?></p>
					<p><?php echo esc_html__( 'شماره حساب: 0123456789', 'irondesign' ); ?></p>
				</div>
				<a href="<?php echo esc_url( add_query_arg( 'step', 5, get_permalink() ) ); ?>" class="btn btn-primary btn-lg">
					<?php echo esc_html__( 'مرحله بعد: طراحی و ساخت', 'irondesign' ); ?>
				</a>
			</div><!-- .step-info -->
			<?php
			break;
		
		// Step 5: Design & Manufacturing
		case 5:
			?>
			<div class="step-info glass-card">
				<div class="step-icon">🎨</div>
				<h2><?php echo esc_html__( 'طراحی و ساخت', 'irondesign' ); ?></h2>
				<p><?php echo esc_html__( 'پس از تأیید پیش پرداخت، تیم طراحی و ساخت ما کار خود را شروع می‌کند.', 'irondesign' ); ?></p>
				<div class="info-box">
					<p><?php echo esc_html__( 'این مرحله معمولاً ۷ تا ۱۴ روز کاری زمان می‌برد.', 'irondesign' ); ?></p>
					<p><?php echo esc_html__( 'ما در طول مسیر به شما تصاویر پیشرفت کار را ارسال خواهیم کرد.', 'irondesign' ); ?></p>
				</div>
				<a href="<?php echo esc_url( add_query_arg( 'step', 6, get_permalink() ) ); ?>" class="btn btn-primary btn-lg">
					<?php echo esc_html__( 'مرحله بعد: تسویه و ارسال', 'irondesign' ); ?>
				</a>
			</div><!-- .step-info -->
			<?php
			break;
		
		// Step 6: Final Payment & Shipping
		case 6:
		default:
			?>
			<div class="step-info glass-card">
				<div class="step-icon">🚚</div>
				<h2><?php echo esc_html__( 'تسویه و ارسال', 'irondesign' ); ?></h2>
				<p><?php echo esc_html__( 'پس از تکمیل ساخت، ۷۰٪ باقی‌مانده مبلغ دریافت شده و محصول ارسال خواهد شد.', 'irondesign' ); ?></p>
				<div class="info-box">
					<p><?php echo esc_html__( 'ارسال به صورت ایمن و بیمه‌شده انجام می‌شود.', 'irondesign' ); ?></p>
					<p><?php echo esc_html__( 'شما کد رهگیری را دریافت خواهید کرد.', 'irondesign' ); ?></p>
				</div>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-lg">
					<?php echo esc_html__( 'بازگشت به صفحه اصلی', 'irondesign' ); ?>
				</a>
			</div><!-- .step-info -->
			<?php
			break;
	}
	?>
	
</div><!-- .container -->

<?php
get_footer();