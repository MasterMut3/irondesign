<?php
/**
 * IronDesign Custom Order Handler
 * 
 * Processes custom order form submissions, creates WooCommerce orders,
 * handles file uploads, and sends notifications.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Process custom order form submission.
 * 
 * Creates a pending WooCommerce order from form data, handles file uploads,
 * and sends admin notification email.
 * 
 * @return array Array with keys: success (bool), errors (array), redirect (string|null)
 */
function irondesign_process_custom_order() {
	
	// Check if POST request
	if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) {
		return array(
			'success'  => false,
			'errors'   => array(),
			'redirect' => null,
		);
	}
	
	// Verify nonce
	if ( ! isset( $_POST['custom_order_nonce'] ) || 
	     ! wp_verify_nonce( $_POST['custom_order_nonce'], 'irondesign_custom_order' ) ) {
		return array(
			'success'  => false,
			'errors'   => array( esc_html__( 'خطای امنیتی. لطفاً دوباره تلاش کنید.', 'irondesign' ) ),
			'redirect' => null,
		);
	}
	
	$errors = array();
	
	// ======================================
	// Sanitize & Validate Form Inputs
	// ======================================
	
	// Name (required)
	$name = isset( $_POST['custom_order_name'] ) ? sanitize_text_field( $_POST['custom_order_name'] ) : '';
	if ( empty( $name ) ) {
		$errors[] = esc_html__( 'لطفاً نام خود را وارد کنید.', 'irondesign' );
	}
	
	// Phone (required)
	$phone = isset( $_POST['custom_order_phone'] ) ? sanitize_text_field( $_POST['custom_order_phone'] ) : '';
	if ( empty( $phone ) ) {
		$errors[] = esc_html__( 'لطفاً شماره تلفن خود را وارد کنید.', 'irondesign' );
	}
	
	// Email (optional, but validate if present)
	$email = isset( $_POST['custom_order_email'] ) ? sanitize_email( $_POST['custom_order_email'] ) : '';
	if ( ! empty( $email ) && ! is_email( $email ) ) {
		$errors[] = esc_html__( 'آدرس ایمیل معتبر نیست.', 'irondesign' );
	}
	
	// Product reference (optional)
	$product_ref = isset( $_POST['custom_order_product'] ) ? (int) $_POST['custom_order_product'] : 0;
	if ( $product_ref > 0 ) {
		$product = wc_get_product( $product_ref );
		if ( ! $product ) {
			$product_ref = 0;
		}
	}
	
	// Description (required)
	$description = isset( $_POST['custom_order_description'] ) ? sanitize_textarea_field( $_POST['custom_order_description'] ) : '';
	if ( empty( $description ) ) {
		$errors[] = esc_html__( 'لطفاً توضیح درخواست خود را وارد کنید.', 'irondesign' );
	}
	
	// ======================================
	// Handle File Upload
	// ======================================
	
	$attachment_id = 0;
	
	if ( isset( $_FILES['custom_order_image'] ) && $_FILES['custom_order_image']['size'] > 0 ) {
		
		// Check for upload errors
		if ( $_FILES['custom_order_image']['error'] !== UPLOAD_ERR_OK ) {
			$errors[] = esc_html__( 'خطا در آپلود فایل. لطفاً دوباره تلاش کنید.', 'irondesign' );
		} else {
			
			// Validate file type (images only)
			$file_type = wp_check_filetype( $_FILES['custom_order_image']['name'] );
			$allowed_types = array( 'jpg', 'jpeg', 'png', 'gif' );
			
			if ( ! in_array( $file_type['ext'], $allowed_types, true ) ) {
				$errors[] = esc_html__( 'فقط فایل‌های تصویری پذیرفته می‌شوند.', 'irondesign' );
			} else {
				
				// Validate file size (max 5MB)
				$max_size = 5 * 1024 * 1024;
				if ( $_FILES['custom_order_image']['size'] > $max_size ) {
					$errors[] = esc_html__( 'حجم فایل نباید بیشتر از ۵ مگابایت باشد.', 'irondesign' );
				} else {
					
					// Handle upload
					require_once ABSPATH . 'wp-admin/includes/file.php';
					require_once ABSPATH . 'wp-admin/includes/media.php';
					
					$attachment_id = media_handle_upload( 'custom_order_image', 0 );
					
					if ( is_wp_error( $attachment_id ) ) {
						$errors[] = esc_html__( 'خطا در آپلود فایل.', 'irondesign' );
						$attachment_id = 0;
					}
				}
			}
		}
	}
	
	// ======================================
	// Return Errors if Any
	// ======================================
	
	if ( ! empty( $errors ) ) {
		return array(
			'success'  => false,
			'errors'   => $errors,
			'redirect' => null,
		);
	}
	
	// ======================================
	// Create WooCommerce Order
	// ======================================
	
	$order = wc_create_order( array(
		'customer_note' => '',
		'status'        => 'pending',
	) );
	
	if ( is_wp_error( $order ) ) {
		return array(
			'success'  => false,
			'errors'   => array( esc_html__( 'خطا در ایجاد سفارش. لطفاً دوباره تلاش کنید.', 'irondesign' ) ),
			'redirect' => null,
		);
	}
	
	// Set customer info
	$order->set_billing_first_name( $name );
	$order->set_billing_phone( $phone );
	if ( ! empty( $email ) ) {
		$order->set_billing_email( $email );
	}
	
	// Set order type to custom order (via order meta)
	$order->add_meta_data( '_irondesign_custom_order', true );
	
	// ======================================
	// Add Order Notes with Custom Details
	// ======================================
	
	$order_note = sprintf(
		"%s\n\n%s: %s\n%s: %s\n%s: %s\n%s:\n%s",
		esc_html__( 'سفارش سفارشی:', 'irondesign' ),
		esc_html__( 'نام', 'irondesign' ),
		esc_html( $name ),
		esc_html__( 'تلفن', 'irondesign' ),
		esc_html( $phone ),
		esc_html__( 'ایمیل', 'irondesign' ),
		esc_html( $email ),
		esc_html__( 'توضیح درخواست', 'irondesign' ),
		esc_html( $description )
	);
	
	if ( $product_ref > 0 ) {
		$ref_product = wc_get_product( $product_ref );
		if ( $ref_product ) {
			$order_note .= sprintf(
				"\n\n%s: %s (ID: %d)",
				esc_html__( 'محصول مرجع', 'irondesign' ),
				esc_html( $ref_product->get_name() ),
				esc_html( $product_ref )
			);
		}
	}
	
	if ( $attachment_id > 0 ) {
		$order_note .= sprintf(
			"\n\n%s: [ID: %d]",
			esc_html__( 'فایل پیوست', 'irondesign' ),
			$attachment_id
		);
	}
	
	$order->add_order_note( $order_note, 1 ); // 1 = private note
	// Store order details in meta for retrieval in email
	$order->update_meta_data( '_irondesign_custom_details', $order_note );
	
	// ======================================
	// Attach Image to Order (as meta)
	// ======================================
	
	if ( $attachment_id > 0 ) {
		$order->add_meta_data( '_irondesign_custom_image', $attachment_id );
	}
	
	// Save order
	$order->save();
	
	// ======================================
	// Send Admin Notification Email
	// ======================================
	
	irondesign_send_custom_order_notification( $order );
	
	// ======================================
	// Return Success with Redirect to Step 2
	// ======================================

	return array(
        'success'  => true,
        'errors'   => array(),
        'redirect' => add_query_arg(
            array(
                'step'  => 2,
                'order' => $order->get_id(),
            ),
            home_url( '/custom-order/' )
        ),
    );
}

/**
 * Send admin notification email for custom order.
 * 
 * @param WC_Order $order The order object.
 */
function irondesign_send_custom_order_notification( $order ) {
	
	// Get admin email
	$admin_email = get_option( 'admin_email' );
	
	if ( empty( $admin_email ) ) {
		return;
	}
	
	// Build email subject and body
	$order_id = $order->get_id();
	$subject  = sprintf(
		/* translators: %d = order ID */
		esc_html__( 'سفارش سفارشی جدید #%d', 'irondesign' ),
		$order_id
	);
	
	// Get order details from meta
	$order_note = $order->get_meta( '_irondesign_custom_details' );
	$order_url  = admin_url( 'post.php?post=' . $order_id . '&action=edit' );
	
	$body = sprintf(
		"%s\n\n%s:\n%s\n\n%s: %s\n\n%s:\n%s",
		esc_html__( 'سفارش سفارشی جدید از سایت آیرون دیزاین دریافت شده است.', 'irondesign' ),
		esc_html__( 'جزئیات سفارش', 'irondesign' ),
		esc_html( $order_note ),
		esc_html__( 'مشاهده سفارش', 'irondesign' ),
		esc_url( $order_url ),
		esc_html__( 'لطفاً به‌زودی با مشتری تماس بگیرید.', 'irondesign' )
	);
	
	// Send email
	wp_mail( $admin_email, $subject, $body );
}