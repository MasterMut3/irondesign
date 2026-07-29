<?php
/**
 * Template Name: Custom Order
 *
 * @package IronDesign
 */

get_header();

// Get product ID from URL query string
$product_id = isset($_GET['product']) ? intval($_GET['product']) : 0;
$product = $product_id ? wc_get_product($product_id) : null;

// Step tracking
$current_step = isset($_GET['step']) ? intval($_GET['step']) : 1;
if ($current_step < 1 || $current_step > 6) $current_step = 1;

// Form processing
$form_submitted = false;
$form_errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['custom_order_nonce'])) {
    if (!wp_verify_nonce($_POST['custom_order_nonce'], 'custom_order_form')) {
        $form_errors[] = 'خطای امنیتی. لطفاً دوباره تلاش کنید.';
    } else {
        // Validate fields
        $name = sanitize_text_field($_POST['name'] ?? '');
        $phone = sanitize_text_field($_POST['phone'] ?? '');
        $email = sanitize_email($_POST['email'] ?? '');
        $description = sanitize_textarea_field($_POST['description'] ?? '');
        $product_ref = intval($_POST['product_ref'] ?? 0);
        
        if (empty($name)) $form_errors[] = 'لطفاً نام خود را وارد کنید.';
        if (empty($phone)) $form_errors[] = 'لطفاً شماره تماس خود را وارد کنید.';
        if (empty($description)) $form_errors[] = 'لطفاً توضیحات خود را وارد کنید.';
        
        // Handle file upload
        $attachment_id = 0;
        if (!empty($_FILES['order_image']['name'])) {
            $upload = wp_handle_upload($_FILES['order_image'], array('test_form' => false));
            if (isset($upload['error'])) {
                $form_errors[] = 'خطا در آپلود تصویر: ' . $upload['error'];
            } else {
                $attachment = array(
                    'post_mime_type' => $upload['type'],
                    'post_title' => sanitize_file_name(pathinfo($_FILES['order_image']['name'], PATHINFO_FILENAME)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                $attachment_id = wp_insert_attachment($attachment, $upload['file']);
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attach_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
                wp_update_attachment_metadata($attachment_id, $attach_data);
            }
        }
        
        // If no errors, send email
        if (empty($form_errors)) {
            $product_name = $product_ref ? get_the_title($product_ref) : 'ندارد';
            $product_url = $product_ref ? get_permalink($product_ref) : '';
            
            $to = get_option('admin_email');
            $subject = 'درخواست سفارش جدید - ' . $name;
            $message = "نام: $name\n";
            $message .= "تلفن: $phone\n";
            $message .= "ایمیل: $email\n";
            $message .= "محصول: $product_name\n";
            $message .= "لینک محصول: $product_url\n\n";
            $message .= "توضیحات:\n$description\n";
            if ($attachment_id) {
                $message .= "تصویر: " . wp_get_attachment_url($attachment_id) . "\n";
            }
            
            wp_mail($to, $subject, $message);
            $form_submitted = true;
            
            // Redirect to next step (4 - پیش پرداخت)
            wp_redirect(add_query_arg('step', 4, get_permalink()));
            exit;
        }
    }
}
?>

<main id="primary" class="site-main">

    <div class="container">

        <!-- Page Header -->
        <div class="page-header glass-card">
            <div class="page-header-content">
                <span class="hero-subtitle glass"><?php esc_html_e('سفارش محصولات سفارشی', 'irondesign'); ?></span>
                <h1 class="page-title"><?php the_title(); ?></h1>
                <p class="page-subtitle"><?php esc_html_e('مراحل ثبت سفارش تا طراحی و تولید', 'irondesign'); ?></p>
            </div>
        </div>

        <!-- Step Progress Bar -->
        <div class="steps-progress">
            <div class="step-indicators">
                <?php
                $steps = array(
                    1 => 'ارسال طرح',
                    2 => 'محاسبه قیمت',
                    3 => 'پیش فاکتور',
                    4 => 'پیش پرداخت',
                    5 => 'طراحی و ساخت',
                    6 => 'تسویه و ارسال'
                );
                foreach ($steps as $num => $label) :
                    $is_active = $num === $current_step;
                    $is_completed = $num < $current_step;
                ?>
                    <div class="step-indicator <?php echo $is_active ? 'active' : ''; ?> <?php echo $is_completed ? 'completed' : ''; ?>">
                        <div class="step-circle">
                            <?php if ($is_completed) : ?>
                                ✓
                            <?php else : ?>
                                <?php echo $num; ?>
                            <?php endif; ?>
                        </div>
                        <span class="step-label"><?php echo esc_html($label); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: <?php echo (($current_step - 1) / 5) * 100; ?>%;"></div>
            </div>
        </div>

        <!-- Step Content -->
        <div class="step-content-wrapper glass-card">

            <?php if ($form_submitted && empty($form_errors)) : ?>
                <div class="step-success">
                    <h2>✅ فرم شما با موفقیت ارسال شد!</h2>
                    <p>همکاران ما به زودی با شما تماس خواهند گرفت.</p>
                    <a href="<?php echo home_url('/'); ?>" class="btn btn-primary">بازگشت به صفحه اصلی</a>
                </div>
            <?php else : ?>

                <?php if (!empty($form_errors)) : ?>
                    <div class="form-errors">
                        <?php foreach ($form_errors as $error) : ?>
                            <p class="error">❌ <?php echo esc_html($error); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Step 1: Form -->
                <?php if ($current_step === 1) : ?>
                    <div class="step-form">
                        <h2>ارسال طرح و ابعاد سفارشی</h2>
                        <p>لطفاً اطلاعات زیر را تکمیل کنید تا همکاران ما با شما تماس بگیرند.</p>

                        <?php if ($product) : ?>
                            <div class="selected-product">
                                <p><strong>محصول انتخاب شده:</strong></p>
                                <div class="product-preview">
                                    <?php echo $product->get_image('thumbnail'); ?>
                                    <div>
                                        <a href="<?php echo get_permalink($product_id); ?>" target="_blank">
                                            <?php echo esc_html($product->get_name()); ?>
                                        </a>
                                        <span class="price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <form method="post" enctype="multipart/form-data" class="custom-order-form">
                            <?php wp_nonce_field('custom_order_form', 'custom_order_nonce'); ?>

                            <div class="form-group">
                                <label for="name">نام و نام خانوادگی *</label>
                                <input type="text" id="name" name="name" required value="<?php echo esc_attr($_POST['name'] ?? ''); ?>">
                            </div>

                            <div class="form-group">
                                <label for="phone">شماره تماس *</label>
                                <input type="tel" id="phone" name="phone" required value="<?php echo esc_attr($_POST['phone'] ?? ''); ?>">
                            </div>

                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                <input type="email" id="email" name="email" value="<?php echo esc_attr($_POST['email'] ?? ''); ?>">
                            </div>

                            <div class="form-group">
                                <label for="product_ref">مرجع محصول (اختیاری)</label>
                                <select id="product_ref" name="product_ref">
                                    <option value="0">بدون مرجع</option>
                                    <?php
                                    $products = wc_get_products(array('limit' => -1));
                                    foreach ($products as $p) :
                                        $selected = ($p->get_id() === $product_id) ? 'selected' : '';
                                    ?>
                                        <option value="<?php echo esc_attr($p->get_id()); ?>" <?php echo $selected; ?>>
                                            <?php echo esc_html($p->get_name()); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">توضیحات سفارش *</label>
                                <textarea id="description" name="description" rows="5" required><?php echo esc_textarea($_POST['description'] ?? ''); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="order_image">آپلود تصویر (اختیاری)</label>
                                <input type="file" id="order_image" name="order_image" accept="image/*">
                                <small>فایل‌های مجاز: JPG, PNG, GIF (حداکثر ۵ مگابایت)</small>
                            </div>

                            <button type="submit" class="btn btn-primary">ارسال سفارش</button>
                        </form>
                    </div>

                <!-- Step 2: محاسبه قیمت -->
                <?php elseif ($current_step === 2) : ?>
                    <div class="step-info">
                        <div class="step-icon">💰</div>
                        <h2>محاسبه و اعلام قیمت</h2>
                        <p>همکاران ما پس از بررسی طرح شما، قیمت دقیق را محاسبه و به شما اعلام می‌کنند.</p>
                        <div class="info-box">
                            <p>⏱ زمان تقریبی محاسبه: <strong>۲۴ تا ۴۸ ساعت</strong></p>
                            <p>📞 پس از محاسبه، با شما تماس گرفته خواهد شد.</p>
                        </div>
                        <a href="<?php echo add_query_arg('step', 3, get_permalink()); ?>" class="btn btn-primary">
                            مرحله بعد: ارسال پیش فاکتور
                        </a>
                    </div>

                <!-- Step 3: ارسال پیش فاکتور -->
                <?php elseif ($current_step === 3) : ?>
                    <div class="step-info">
                        <div class="step-icon">📄</div>
                        <h2>ارسال پیش فاکتور</h2>
                        <p>پیش فاکتور شامل جزئیات دقیق سفارش، قیمت نهایی و شرایط پرداخت برای شما ارسال می‌شود.</p>
                        <div class="info-box">
                            <p>📧 پیش فاکتور از طریق ایمیل یا پیام‌رسان ارسال می‌شود.</p>
                            <p>✅ لطفاً پیش فاکتور را بررسی و تایید کنید.</p>
                        </div>
                        <a href="<?php echo add_query_arg('step', 4, get_permalink()); ?>" class="btn btn-primary">
                            مرحله بعد: پیش پرداخت
                        </a>
                    </div>

                <!-- Step 4: پیش پرداخت -->
                <?php elseif ($current_step === 4) : ?>
                    <div class="step-info">
                        <div class="step-icon">💳</div>
                        <h2>پیش پرداخت</h2>
                        <p>پس از تایید پیش فاکتور، <strong>۳۰٪</strong> از مبلغ کل به عنوان پیش پرداخت واریز می‌شود.</p>
                        <div class="info-box">
                            <p>🏦 واریز به شماره حساب:</p>
                            <p><strong>شماره حساب: [شماره حساب شما]</strong></p>
                            <p>🏦 بانک: [نام بانک]</p>
                            <p>👤 به نام: [صاحب حساب]</p>
                            <p>📱 یا از طریق درگاه پرداخت آنلاین</p>
                        </div>
                        <a href="<?php echo add_query_arg('step', 5, get_permalink()); ?>" class="btn btn-primary">
                            مرحله بعد: طراحی و ساخت
                        </a>
                    </div>

                <!-- Step 5: طراحی و ساخت -->
                <?php elseif ($current_step === 5) : ?>
                    <div class="step-info">
                        <div class="step-icon">🎨</div>
                        <h2>طراحی و ساخت</h2>
                        <p>پس از دریافت پیش پرداخت، فرآیند طراحی و ساخت آغاز می‌شود.</p>
                        <div class="info-box">
                            <p>🖌 طراحی ۳ بعدی محصول ارسال می‌شود.</p>
                            <p>✅ پس از تایید طراحی، ساخت آغاز می‌شود.</p>
                            <p>⏱ زمان ساخت: <strong>۷ تا ۱۴ روز کاری</strong></p>
                        </div>
                        <a href="<?php echo add_query_arg('step', 6, get_permalink()); ?>" class="btn btn-primary">
                            مرحله بعد: تسویه و ارسال
                        </a>
                    </div>

                <!-- Step 6: تسویه و ارسال -->
                <?php elseif ($current_step === 6) : ?>
                    <div class="step-info">
                        <div class="step-icon">🚚</div>
                        <h2>تسویه و ارسال</h2>
                        <p>پس از تکمیل ساخت، تصاویر محصول نهایی برای شما ارسال می‌شود.</p>
                        <div class="info-box">
                            <p>📸 ارسال تصاویر محصول نهایی</p>
                            <p>💰 تسویه حساب مابقی مبلغ</p>
                            <p>📦 ارسال کالا به آدرس شما</p>
                            <p>⏱ زمان ارسال: <strong>۲ تا ۵ روز کاری</strong></p>
                        </div>
                        <a href="<?php echo home_url('/'); ?>" class="btn btn-primary">
                            بازگشت به صفحه اصلی
                        </a>
                    </div>
                <?php endif; ?>

            <?php endif; ?>

        </div>

    </div>

</main>

<style>
/* Progress Bar */
.steps-progress {
    margin: 30px 0 40px;
    padding: 20px 30px;
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.06);
    border-radius: 16px;
}

.step-indicators {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    position: relative;
}

.step-indicator {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex: 1;
    text-align: center;
}

.step-circle {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.06);
    border: 2px solid rgba(255, 255, 255, 0.1);
    color: var(--color-secondary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 16px;
    transition: all 0.3s ease;
}

.step-indicator.active .step-circle {
    background: linear-gradient(135deg, #8B5CF6, #6D28D9);
    border-color: #8B5CF6;
    color: #fff;
    box-shadow: 0 0 25px rgba(139, 92, 246, 0.4);
}

.step-indicator.completed .step-circle {
    background: #22C55E;
    border-color: #22C55E;
    color: #fff;
}

.step-label {
    font-size: 12px;
    color: var(--color-secondary);
    margin-top: 8px;
    font-weight: 500;
    white-space: nowrap;
}

.step-indicator.active .step-label {
    color: #fff;
}

.progress-bar {
    width: 100%;
    height: 4px;
    background: rgba(255, 255, 255, 0.06);
    border-radius: 10px;
    margin-top: 8px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #8B5CF6, #6D28D9);
    border-radius: 10px;
    transition: width 0.8s ease;
}

/* Step Content */
.step-content-wrapper {
    padding: 45px 50px;
    margin: 30px 0;
    border-radius: 24px;
    min-height: 400px;
}

.step-form h2 {
    color: #fff;
    font-size: 28px;
    margin: 0 0 10px;
}

.step-form > p {
    color: var(--color-secondary);
    margin-bottom: 30px;
}

.selected-product {
    padding: 20px;
    margin-bottom: 25px;
    background: rgba(139, 92, 246, 0.08);
    border: 1px solid rgba(139, 92, 246, 0.15);
    border-radius: 12px;
}

.product-preview {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-top: 10px;
}

.product-preview img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 10px;
}

.product-preview a {
    color: #fff;
    font-weight: 600;
}

.product-preview .price {
    display: block;
    color: var(--color-accent-light);
    font-weight: 700;
    margin-top: 4px;
}

/* Form */
.custom-order-form {
    display: grid;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.form-group label {
    color: #fff;
    font-weight: 600;
    font-size: 14px;
}

.form-group input,
.form-group textarea,
.form-group select {
    padding: 12px 16px;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.08);
    color: #fff;
    transition: 0.3s;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    border-color: var(--color-accent);
    outline: none;
}

.form-group input[type="file"] {
    padding: 12px;
    background: rgba(255, 255, 255, 0.03);
}

.form-group small {
    color: var(--color-secondary);
    font-size: 12px;
}

/* Step Info */
.step-info {
    text-align: center;
    padding: 20px 0;
}

.step-icon {
    font-size: 56px;
    margin-bottom: 20px;
}

.step-info h2 {
    color: #fff;
    font-size: 28px;
    margin: 0 0 15px;
}

.step-info > p {
    color: var(--color-secondary);
    font-size: 18px;
    max-width: 600px;
    margin: 0 auto 30px;
}

.info-box {
    padding: 30px;
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.06);
    border-radius: 16px;
    max-width: 500px;
    margin: 0 auto 30px;
    text-align: right;
}

.info-box p {
    color: var(--color-secondary);
    margin: 8px 0;
}

.info-box strong {
    color: #fff;
}

.step-info .btn {
    min-width: 200px;
}

/* Form Errors */
.form-errors {
    margin-bottom: 20px;
}

.form-errors .error {
    color: #EF4444;
    padding: 10px 16px;
    background: rgba(239, 68, 68, 0.1);
    border: 1px solid rgba(239, 68, 68, 0.2);
    border-radius: 10px;
    margin: 8px 0;
}

/* Success */
.step-success {
    text-align: center;
    padding: 40px 20px;
}

.step-success h2 {
    color: #22C55E;
    font-size: 28px;
}

.step-success p {
    color: var(--color-secondary);
    font-size: 18px;
    margin: 15px 0 30px;
}

/* Responsive */
@media (max-width: 768px) {
    .steps-progress {
        padding: 16px 16px;
        overflow-x: auto;
    }

    .step-indicators {
        min-width: 600px;
        gap: 8px;
    }

    .step-circle {
        width: 36px;
        height: 36px;
        font-size: 13px;
    }

    .step-label {
        font-size: 10px;
        margin-top: 4px;
    }

    .step-content-wrapper {
        padding: 28px 20px;
    }

    .step-form h2 {
        font-size: 22px;
    }

    .product-preview {
        flex-direction: column;
        align-items: flex-start;
    }

    .step-info h2 {
        font-size: 22px;
    }

    .step-info > p {
        font-size: 15px;
    }

    .info-box {
        padding: 20px;
    }

    .step-info .btn {
        min-width: auto;
        width: 100%;
    }
}
</style>

<?php
get_footer();