<?php
/**
 * Product Import Wizard - با قابلیت import از senjedchoob
 *
 * @package IronDesign
 */

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ============================================================
// FIND WORDPRESS ROOT - MULTIPLE METHODS
// ============================================================

$wp_root_candidates = array(
    dirname( dirname( dirname( __FILE__ ) ) ) . '/',
    $_SERVER['DOCUMENT_ROOT'] . '/irondesign/',
    $_SERVER['DOCUMENT_ROOT'] . '/',
    'D:/xamp/htdocs/irondesign/',
);

$wp_root = '';
foreach ( $wp_root_candidates as $candidate ) {
    if ( file_exists( $candidate . 'wp-load.php' ) ) {
        $wp_root = $candidate;
        break;
    }
}

if ( empty( $wp_root ) ) {
    die( '❌ wp-load.php not found. Tried these paths:<br><br>' . implode( '<br>', $wp_root_candidates ) );
}

// Load WordPress
require_once( $wp_root . 'wp-load.php' );

// ============================================================
// LOAD MEDIA FUNCTIONS FOR IMAGE IMPORT
// ============================================================

// Load WordPress media functions
require_once( ABSPATH . 'wp-admin/includes/media.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/image.php' );

// Check if user is admin
if ( ! current_user_can( 'manage_options' ) ) {
    wp_die( 'شما دسترسی به این صفحه ندارید.' );
}

// ============================================================
// PRODUCT DATA FROM SENJEDCHOOB (Rebranded)
// ============================================================

$senjedchoob_products = array(
    array(
        'original_name' => 'پایه میز فلزی طرح رابونا مدل le-1130',
        'new_name' => 'پایه میز فلزی طرح آرین مدل ID-1130',
        'new_sku' => 'ID-1130',
        'price' => '42000000',
        'height' => '73 سانتی متر',
        'width' => '60 سانتی متر',
        'material' => 'ورق آهنی',
        'warranty' => 'سلامت فیزیکی کالا',
        'production_time' => '30 روز کاری',
        'colors' => array('سفید کوره ای', 'طوسی کوره ای', 'مشکی کوره ای'),
        'image' => 'https://senjedchoob.com/wp-content/uploads/2026/05/le-1130-2.jpg',
        'gallery' => array(
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1130-1.jpg',
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1130-3.jpg',
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1130-5.jpg',
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1130-6.jpg'
        ),
        'description' => '<h2>پایه میز فلزی طرح آرین مدل ID-1130</h2>

<p>پایه میز فلزی طرح آرین به گونه ای طراحی شده که شما می توانید از آن در دو دکوراسیون اداری و خانگی استفاده کنید. شرکت IronDesign برای ساخت این پایه میز فلزی مدرن از ورق آهنی با کیفیت بالا استفاده کرده است.</p>

<h3>کیفیت ساخت</h3>
<p>پایه میز فلزی طرح آرین با به روزترین و پیشرفته ترین دستگاه ها و ابزارهای صنعت دکوراسیون ساخته شده است. برای ساخت پایه های فلزی از <strong>جوش CO2 و رنگ کوره ای الکترواستاتیک</strong> استفاده می شود.</p>

<p>شرکت IronDesign برای کالاهای فلزی از ضخامت فلز استاندارد با سطح گرید A استفاده می کند تا با توجه به زیبایی کالا، استحکام بالایی نیز داشته باشد.</p>

<h3>سفارشی سازی</h3>
<p>پایه میز فلزی طرح آرین <strong>در تمام ابعاد قابل سفارشی سازی</strong> است. برای ابعاد و طرح سفارشی خود و همچنین مشاوره خرید می توانید با راه های ارتباطی IronDesign تماس بگیرید تا شما را در انتخاب بهتر راهنمایی کنیم.</p>

<h3>مزایا</h3>
<ul>
<li>طراحی زیبا و مدرن</li>
<li>قابلیت استفاده در دکوراسیون اداری و خانگی</li>
<li>متریال فلزی با انتخاب رنگ بصورت تفکیک شده در زمان سفارش کالا</li>
<li>قیمت مناسب و <strong>کیفیت درجه +A</strong> در تمام کالای IronDesign</li>
<li><strong>امکان سفارشی سازی</strong> در ابعاد و آپشن های به روز</li>
<li><strong>ضمانت نامه یکساله</strong> و <strong>خدمات پس از فروش دائمی</strong></li>
</ul>',
        'short_description' => 'پایه میز فلزی طرح آرین با ورق آهنی در تنوع رنگی قابل سفارش است.

جنس پایه: ورق آهنی
ارتفاع: 73 سانتی متر
عرض: 60 سانتی متر'
    ),
    array(
        'original_name' => 'پایه میز فلزی طرح روما مدل le-1129',
        'new_name' => 'پایه میز فلزی طرح رادین مدل ID-1129',
        'new_sku' => 'ID-1129',
        'price' => '34000000',
        'height' => '73 سانتی متر',
        'width' => '60 سانتی متر',
        'material' => 'ورق آهنی',
        'warranty' => 'سلامت فیزیکی کالا',
        'production_time' => '30 روز کاری',
        'colors' => array('سفید کوره ای', 'طوسی کوره ای', 'مشکی کوره ای'),
        'image' => 'https://senjedchoob.com/wp-content/uploads/2026/05/le-1129-2.jpg',
        'gallery' => array(
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1129-1.jpg'
        ),
        'description' => '<h2>پایه میز فلزی طرح رادین مدل ID-1129</h2>

<p>پایه میز فلزی طرح رادین با طراحی منحصر به فرد و مدرن، انتخابی عالی برای دکوراسیون های اداری و خانگی است. شرکت IronDesign با استفاده از بهترین متریال و به روزترین تکنولوژی، این محصول را تولید کرده است.</p>

<h3>ویژگی‌های برجسته</h3>
<ul>
<li>طراحی مینیمال و مدرن</li>
<li>ساختار مقاوم و پایدار</li>
<li>قابلیت استفاده در فضاهای مختلف</li>
<li>رنگ کوره ای الکترواستاتیک با کیفیت بالا</li>
</ul>

<h3>سفارشی سازی</h3>
<p>این محصول <strong>در تمام ابعاد قابل سفارشی سازی</strong> است. برای اطلاعات بیشتر با تیم IronDesign تماس بگیرید.</p>',
        'short_description' => 'پایه میز فلزی طرح رادین با طراحی مدرن و کیفیت بالا.'
    ),
    array(
        'original_name' => 'پایه میز فلزی طرح روجا مدل le-1131',
        'new_name' => 'پایه میز فلزی طرح آریا مدل ID-1131',
        'new_sku' => 'ID-1131',
        'price' => '36000000',
        'height' => '73 سانتی متر',
        'width' => '65 سانتی متر',
        'material' => 'ورق آهنی',
        'warranty' => 'سلامت فیزیکی کالا',
        'production_time' => '30 روز کاری',
        'colors' => array('سفید کوره ای', 'طوسی کوره ای', 'مشکی کوره ای'),
        'image' => 'https://senjedchoob.com/wp-content/uploads/2026/05/le-1131-3.jpg',
        'gallery' => array(
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1131-2.jpg'
        ),
        'description' => '<h2>پایه میز فلزی طرح آریا مدل ID-1131</h2>

<p>پایه میز فلزی طرح آریا با طراحی خاص و منحصر به فرد، جلوهای مدرن به فضای شما می‌بخشد. این محصول با استفاده از ورق آهنی با ضخامت بالا و رنگ کوره ای الکترواستاتیک تولید شده است.</p>',
        'short_description' => 'پایه میز فلزی طرح آریا با طراحی منحصر به فرد.'
    ),
    array(
        'original_name' => 'پایه میز فلزی طرح روپیا مدل le-1132',
        'new_name' => 'پایه میز فلزی طرح آرمین مدل ID-1132',
        'new_sku' => 'ID-1132',
        'price' => '79000000',
        'height' => '73 سانتی متر',
        'width' => '60 سانتی متر',
        'material' => 'ورق آهنی',
        'warranty' => 'سلامت فیزیکی کالا',
        'production_time' => '30 روز کاری',
        'colors' => array('سفید کوره ای', 'طوسی کوره ای', 'مشکی کوره ای'),
        'image' => 'https://senjedchoob.com/wp-content/uploads/2026/05/le-1132-2.jpg',
        'gallery' => array(
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1132-1.jpg'
        ),
        'description' => '<h2>پایه میز فلزی طرح آرمین مدل ID-1132</h2>

<p>پایه میز فلزی طرح آرمین با طراحی لوکس و مدرن، یکی از بهترین محصولات IronDesign است. این محصول با استفاده از بهترین متریال و با دقت بالا تولید شده است.</p>',
        'short_description' => 'پایه میز فلزی طرح آرمین با طراحی لوکس و مدرن.'
    ),
    array(
        'original_name' => 'پایه میز فلزی طرح روهات مدل le-1128',
        'new_name' => 'پایه میز فلزی طرح رهام مدل ID-1128',
        'new_sku' => 'ID-1128',
        'price' => '75000000',
        'height' => '73 سانتی متر',
        'width' => '60 سانتی متر',
        'material' => 'ورق آهنی',
        'warranty' => 'سلامت فیزیکی کالا',
        'production_time' => '30 روز کاری',
        'colors' => array('سفید کوره ای', 'طوسی کوره ای', 'مشکی کوره ای'),
        'image' => 'https://senjedchoob.com/wp-content/uploads/2026/05/le-1128.jpg',
        'gallery' => array(
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1128-2.jpg'
        ),
        'description' => '<h2>پایه میز فلزی طرح رهام مدل ID-1128</h2>

<p>پایه میز فلزی طرح رهام با طراحی خاص و منحصر به فرد، انتخابی عالی برای دکوراسیون های مدرن است. این محصول با کیفیت بالا و قیمت مناسب عرضه می‌شود.</p>',
        'short_description' => 'پایه میز فلزی طرح رهام با طراحی خاص و منحصر به فرد.'
    ),
);

// ============================================================
// PROCESS FORM SUBMISSION
// ============================================================

$message = '';
$message_type = '';

// Import single product
if ( isset( $_POST['import_single'] ) && isset( $_POST['product_index'] ) ) {
    $index = intval( $_POST['product_index'] );
    if ( isset( $senjedchoob_products[ $index ] ) ) {
        $result = import_product( $senjedchoob_products[ $index ] );
        $message = $result;
        $message_type = 'success';
    }
}

// Import all products
if ( isset( $_POST['import_all'] ) ) {
    $results = array();
    $success_count = 0;
    $error_count = 0;
    
    foreach ( $senjedchoob_products as $index => $product_data ) {
        $result = import_product( $product_data );
        if ( strpos( $result, '✅' ) !== false ) {
            $success_count++;
        } else {
            $error_count++;
        }
        $results[] = $result;
    }
    
    $message = '📦 <strong>نتیجه import:</strong><br>';
    $message .= '✅ موفق: ' . $success_count . ' محصول<br>';
    $message .= '❌ ناموفق: ' . $error_count . ' محصول<br><br>';
    $message .= implode( '<br>', $results );
    $message_type = 'success';
}

// Create custom product from form
if ( isset( $_POST['create_product'] ) ) {
    $custom_product = array(
        'new_name' => sanitize_text_field( $_POST['product_name'] ),
        'new_sku' => sanitize_text_field( $_POST['sku'] ),
        'price' => sanitize_text_field( $_POST['price'] ),
        'height' => sanitize_text_field( $_POST['height'] ),
        'width' => sanitize_text_field( $_POST['width'] ),
        'material' => sanitize_text_field( $_POST['material'] ),
        'warranty' => sanitize_text_field( $_POST['warranty'] ),
        'production_time' => sanitize_text_field( $_POST['production_time'] ),
        'colors' => array_filter( array_map( 'trim', explode( "\n", $_POST['colors'] ) ) ),
        'image' => esc_url_raw( $_POST['featured_image'] ),
        'gallery' => array_filter( array_map( 'trim', explode( "\n", $_POST['gallery_images'] ) ) ),
        'description' => wp_kses_post( $_POST['description'] ),
        'short_description' => sanitize_textarea_field( $_POST['short_description'] ),
    );
    
    $result = import_product( $custom_product );
    $message = $result;
    $message_type = 'success';
}

// ============================================================
// IMPORT PRODUCT FUNCTION
// ============================================================

function import_product( $data ) {
    global $wpdb;
    
    // Check if WooCommerce is active
    if ( ! class_exists( 'WooCommerce' ) ) {
        return '⚠️ ووکامرس فعال نیست!';
    }
    
    // Check if product exists
    $existing = get_page_by_title( $data['new_name'], OBJECT, 'product' );
    if ( $existing ) {
        return '⚠️ محصول "' . $data['new_name'] . '" قبلاً وجود دارد!';
    }
    
    // Create attributes
    $attributes = array(
        'ارتفاع' => 'pa_arz',
        'عرض' => 'pa_arz2',
        'جنس' => 'pa_jens',
        'گارانتی' => 'pa_garanti',
        'زمان تولید' => 'pa_zaman-tolid',
    );
    
    foreach ( $attributes as $name => $slug ) {
        create_attribute_if_not_exists( $name, $slug );
    }
    
    create_attribute_if_not_exists( 'رنگ فلز', 'pa_color' );
    
    // Create attribute terms
    $specs = array(
        'pa_arz' => $data['height'],
        'pa_arz2' => $data['width'],
        'pa_jens' => $data['material'],
        'pa_garanti' => $data['warranty'],
        'pa_zaman-tolid' => $data['production_time'],
    );
    
    foreach ( $specs as $tax => $term ) {
        if ( ! empty( $term ) ) {
            add_term_if_not_exists( $tax, $term );
        }
    }
    
    // Colors
    $colors = $data['colors'];
    foreach ( $colors as $color ) {
        add_term_if_not_exists( 'pa_color', $color );
    }
    
    // Create product
    $product = new WC_Product_Variable();
    $product->set_name( $data['new_name'] );
    $product->set_sku( $data['new_sku'] );
    $product->set_status( 'publish' );
    $product->set_catalog_visibility( 'visible' );
    $product->set_description( $data['description'] );
    $product->set_short_description( $data['short_description'] );
    $product->set_regular_price( $data['price'] );
    $product->set_price( $data['price'] );
    
    // Set attributes
    $product_attributes = array();
    
    foreach ( $specs as $tax => $term ) {
        if ( ! empty( $term ) ) {
            $product_attributes[$tax] = array(
                'name' => $tax,
                'value' => $term,
                'position' => 0,
                'is_visible' => 1,
                'is_variation' => 0,
                'is_taxonomy' => 1,
            );
        }
    }
    
    if ( ! empty( $colors ) ) {
        $product_attributes['pa_color'] = array(
            'name' => 'pa_color',
            'value' => implode( ' | ', $colors ),
            'position' => 5,
            'is_visible' => 1,
            'is_variation' => 1,
            'is_taxonomy' => 1,
        );
    }
    
    $product->set_attributes( $product_attributes );
    
    // Create variations
    $counter = 1;
    foreach ( $colors as $color ) {
        $variation = new WC_Product_Variation();
        $variation->set_parent_id( $product->get_id() );
        $variation->set_sku( $data['new_sku'] . '-' . $counter );
        $variation->set_regular_price( $data['price'] );
        $variation->set_price( $data['price'] );
        $variation->set_manage_stock( true );
        $variation->set_stock_quantity( 10 );
        $variation->set_stock_status( 'instock' );
        $variation->set_attributes( array( 'pa_color' => $color ) );
        $variation->save();
        $counter++;
    }
    
    if ( ! empty( $colors ) ) {
        $product->set_default_attributes( array( 'pa_color' => $colors[0] ) );
    }
    
    $product_id = $product->save();
    
    // ============================================================
    // ADD IMAGES WITH ERROR HANDLING
    // ============================================================
    
    // Featured image
    if ( ! empty( $data['image'] ) ) {
        try {
            $image_url = esc_url_raw( $data['image'] );
            $image_id = media_sideload_image( $image_url, $product_id, 'تصویر اصلی', 'id' );
            
            if ( ! is_wp_error( $image_id ) && $image_id > 0 ) {
                set_post_thumbnail( $product_id, $image_id );
            }
        } catch ( Exception $e ) {
            // Image import failed - continue without image
        }
    }
    
    // Gallery images
    if ( ! empty( $data['gallery'] ) ) {
        $gallery_ids = array();
        foreach ( $data['gallery'] as $url ) {
            $url = trim( $url );
            if ( ! empty( $url ) ) {
                try {
                    $img_id = media_sideload_image( $url, $product_id, 'تصویر گالری', 'id' );
                    if ( ! is_wp_error( $img_id ) && $img_id > 0 ) {
                        $gallery_ids[] = $img_id;
                    }
                } catch ( Exception $e ) {
                    // Skip this image - continue with next
                }
            }
        }
        if ( ! empty( $gallery_ids ) ) {
            update_post_meta( $product_id, '_product_image_gallery', implode( ',', $gallery_ids ) );
        }
    }
    
    return '✅ محصول "' . $data['new_name'] . '" با موفقیت ایجاد شد!<br>
            <strong>SKU:</strong> ' . $data['new_sku'] . '<br>
            <strong>قیمت:</strong> ' . number_format( $data['price'] ) . ' تومان<br>
            <a href="' . get_permalink( $product_id ) . '" target="_blank">🔗 مشاهده محصول</a> | 
            <a href="' . admin_url( 'post.php?post=' . $product_id . '&action=edit' ) . '" target="_blank">✏️ ویرایش</a>';
}

// ============================================================
// HELPER FUNCTIONS
// ============================================================

function create_attribute_if_not_exists( $name, $slug ) {
    global $wpdb;
    
    $exists = $wpdb->get_var( $wpdb->prepare( "
        SELECT attribute_id 
        FROM {$wpdb->prefix}woocommerce_attribute_taxonomies 
        WHERE attribute_name = %s
    ", $slug ) );
    
    if ( ! $exists ) {
        $wpdb->insert(
            $wpdb->prefix . 'woocommerce_attribute_taxonomies',
            array(
                'attribute_name' => $slug,
                'attribute_label' => $name,
                'attribute_type' => 'select',
                'attribute_orderby' => 'menu_order',
                'attribute_public' => 0,
                'attribute_archive' => 0,
                'attribute_show_in_nav_menus' => 0,
                'attribute_show_in_quick_edit' => 1,
            )
        );
        delete_transient( 'wc_attribute_taxonomies' );
        flush_rewrite_rules();
    }
}

function add_term_if_not_exists( $taxonomy, $term_name ) {
    $term = term_exists( $term_name, $taxonomy );
    if ( ! $term ) {
        wp_insert_term( $term_name, $taxonomy );
    }
}

// ============================================================
// DISPLAY FORM
// ============================================================

?>
<!DOCTYPE html>
<html dir="rtl" lang="fa-IR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>وارد کننده محصول - IronDesign</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Vazir', 'Tahoma', sans-serif;
            background: #f5f6fa;
            padding: 40px 20px;
            color: #333;
            direction: rtl;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        h1 {
            font-size: 24px;
            color: #003366;
            margin-bottom: 8px;
        }
        .subtitle {
            color: #888;
            font-size: 14px;
            margin-bottom: 30px;
        }
        .form-group { margin-bottom: 20px; }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #444;
            font-size: 14px;
        }
        label .required { color: #e74c3c; }
        input[type="text"],
        input[type="number"],
        input[type="url"],
        textarea,
        select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            transition: border-color 0.2s;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #003366;
            box-shadow: 0 0 0 3px rgba(0,51,102,0.1);
        }
        textarea {
            min-height: 80px;
            resize: vertical;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .form-row-3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
        }
        .help-text {
            font-size: 12px;
            color: #999;
            margin-top: 4px;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: #003366;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            font-family: inherit;
        }
        .btn:hover { background: #004488; }
        .btn-success { background: #28a745; }
        .btn-success:hover { background: #218838; }
        .btn-warning { background: #ffc107; color: #333; }
        .btn-warning:hover { background: #e0a800; }
        .btn-secondary { background: #6c757d; }
        .btn-secondary:hover { background: #5a6268; }
        .btn-danger { background: #dc3545; }
        .btn-danger:hover { background: #c82333; }
        .btn-sm { padding: 6px 15px; font-size: 13px; }
        
        .message {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .message.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .message.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .divider {
            border: none;
            border-top: 1px solid #eee;
            margin: 30px 0;
        }
        .example-box {
            background: #f8f9fa;
            padding: 15px 20px;
            border-radius: 8px;
            font-size: 13px;
            color: #666;
            border-right: 3px solid #003366;
            margin-bottom: 20px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin: 15px 0;
        }
        .product-card {
            background: #f8f9fa;
            padding: 15px 20px;
            border-radius: 10px;
            border: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .product-card .info { flex: 1; }
        .product-card .name { font-weight: 600; font-size: 14px; }
        .product-card .sku { font-size: 12px; color: #888; }
        .product-card .price { font-size: 13px; color: #003366; font-weight: 600; }
        
        .tab-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .tab-btn {
            padding: 10px 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            background: #fff;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s;
        }
        .tab-btn.active {
            border-color: #003366;
            background: #003366;
            color: #fff;
        }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        
        @media (max-width: 600px) {
            .form-row, .form-row-3, .product-grid {
                grid-template-columns: 1fr;
            }
            .container { padding: 20px; }
            .tab-buttons { flex-wrap: wrap; }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>🧙 وارد کننده محصول - IronDesign</h1>
    <p class="subtitle">محصولات را از senjedchoob وارد کنید یا به صورت دستی ایجاد کنید</p>

    <?php if ( ! empty( $message ) ) : ?>
        <div class="message <?php echo $message_type; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <!-- ============================================================
    IMPORT FROM SENJEDCHOOB
    ============================================================ -->
    <div style="background: #e8f4fd; padding: 20px; border-radius: 12px; margin-bottom: 25px; border: 1px solid #b8d4f0;">
        <h3 style="color: #003366; margin-bottom: 10px;">📥 واردات از senjedchoob.com</h3>
        <p style="font-size: 14px; color: #555; margin-bottom: 15px;">
            محصولات زیر از senjedchoob.com با نام و مدل جدید IronDesign وارد می‌شوند.
        </p>
        
        <div class="product-grid">
            <?php foreach ( $senjedchoob_products as $index => $product ) : ?>
                <div class="product-card">
                    <div class="info">
                        <div class="name"><?php echo esc_html( $product['new_name'] ); ?></div>
                        <div class="sku">SKU: <?php echo esc_html( $product['new_sku'] ); ?></div>
                        <div class="price"><?php echo number_format( $product['price'] ); ?> تومان</div>
                    </div>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="product_index" value="<?php echo $index; ?>">
                        <button type="submit" name="import_single" class="btn btn-success btn-sm">📥 وارد کردن</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
        
        <form method="POST" style="margin-top: 10px;">
            <button type="submit" name="import_all" class="btn btn-success">📦 وارد کردن همه محصولات</button>
        </form>
    </div>

    <hr class="divider">

    <!-- ============================================================
    TABS: Manual Create
    ============================================================ -->
    <div class="tab-buttons">
        <button class="tab-btn active" onclick="switchTab('manual')">✏️ ایجاد دستی</button>
        <button class="tab-btn" onclick="switchTab('bulk')">📋 واردات گروهی</button>
    </div>

    <!-- Tab: Manual Create -->
    <div id="tab-manual" class="tab-content active">
        <h3 style="margin-bottom: 15px; color: #003366;">✏️ ایجاد محصول جدید</h3>
        
        <div class="example-box">
            <strong>📌 نمونه برای پایه میز فلزی:</strong><br>
            نام: پایه میز فلزی طرح آرین مدل ID-1130<br>
            SKU: ID-1130 | قیمت: 42000000
        </div>

        <form method="POST" action="">
            <div class="form-group">
                <label>نام محصول <span class="required">*</span></label>
                <input type="text" name="product_name" required placeholder="مثال: پایه میز فلزی طرح آرین مدل ID-1130">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>SKU (کد محصول) <span class="required">*</span></label>
                    <input type="text" name="sku" required placeholder="مثال: ID-1130">
                </div>
                <div class="form-group">
                    <label>قیمت (تومان) <span class="required">*</span></label>
                    <input type="number" name="price" required placeholder="مثال: 42000000">
                </div>
            </div>

            <div class="form-group">
                <label>توضیحات کوتاه</label>
                <textarea name="short_description" rows="3" placeholder="خلاصه ای از محصول..."></textarea>
            </div>

            <div class="form-group">
                <label>توضیحات کامل</label>
                <textarea name="description" rows="6" placeholder="توضیحات کامل محصول با HTML..."></textarea>
            </div>

            <hr class="divider">

            <div class="form-row-3">
                <div class="form-group">
                    <label>ارتفاع</label>
                    <input type="text" name="height" placeholder="مثال: 73 سانتی متر">
                </div>
                <div class="form-group">
                    <label>عرض</label>
                    <input type="text" name="width" placeholder="مثال: 60 سانتی متر">
                </div>
                <div class="form-group">
                    <label>جنس</label>
                    <input type="text" name="material" placeholder="مثال: ورق آهنی">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>گارانتی</label>
                    <input type="text" name="warranty" placeholder="مثال: سلامت فیزیکی کالا">
                </div>
                <div class="form-group">
                    <label>زمان تولید</label>
                    <input type="text" name="production_time" placeholder="مثال: 30 روز کاری">
                </div>
            </div>

            <hr class="divider">

            <div class="form-group">
                <label>رنگ‌های موجود (هر خط یک رنگ)</label>
                <textarea name="colors" rows="4" placeholder="سفید کوره ای&#10;طوسی کوره ای&#10;مشکی کوره ای"></textarea>
            </div>

            <hr class="divider">

            <div class="form-group">
                <label>تصویر اصلی (URL)</label>
                <input type="url" name="featured_image" placeholder="https://example.com/image.jpg">
            </div>

            <div class="form-group">
                <label>تصاویر گالری (هر خط یک URL)</label>
                <textarea name="gallery_images" rows="3" placeholder="https://example.com/image1.jpg&#10;https://example.com/image2.jpg"></textarea>
            </div>

            <hr class="divider">

            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                <button type="submit" name="create_product" class="btn">🚀 ایجاد محصول</button>
                <button type="reset" class="btn btn-secondary">🔄 پاک کردن فرم</button>
            </div>
        </form>
    </div>

    <!-- Tab: Bulk Import -->
    <div id="tab-bulk" class="tab-content">
        <h3 style="margin-bottom: 15px; color: #003366;">📋 واردات گروهی</h3>
        
        <div style="background: #fff3cd; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #ffc107;">
            <p style="font-size: 14px; color: #856404;">
                ⚠️ با کلیک روی دکمه زیر، تمام محصولات از senjedchoob وارد می‌شوند.
                محصولات تکراری ایجاد نمی‌شوند.
            </p>
        </div>

        <form method="POST">
            <button type="submit" name="import_all" class="btn btn-success" style="font-size: 18px; padding: 15px 40px;">
                📦 وارد کردن تمام محصولات
            </button>
        </form>

        <hr class="divider">

        <h4 style="margin-bottom: 10px;">📋 لیست محصولات قابل واردات:</h4>
        <ul style="list-style: none; padding: 0;">
            <?php foreach ( $senjedchoob_products as $product ) : ?>
                <li style="padding: 5px 0; border-bottom: 1px solid #f0f0f0;">
                    ✅ <?php echo esc_html( $product['new_name'] ); ?> 
                    (SKU: <?php echo esc_html( $product['new_sku'] ); ?>)
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <hr class="divider">

    <div style="text-align: center; font-size: 13px; color: #999;">
        <p>⚠️ این ابزار فقط برای مدیریت سایت در دسترس است.</p>
        <p>پس از استفاده، فایل <code>product-wizard.php</code> را حذف کنید.</p>
    </div>
</div>

<script>
function switchTab(tab) {
    // Hide all tabs
    document.querySelectorAll('.tab-content').forEach(el => {
        el.classList.remove('active');
    });
    // Show selected tab
    document.getElementById('tab-' + tab).classList.add('active');
    
    // Update buttons
    document.querySelectorAll('.tab-btn').forEach(el => {
        el.classList.remove('active');
    });
    // Find the clicked button
    var buttons = document.querySelectorAll('.tab-btn');
    for (var i = 0; i < buttons.length; i++) {
        if (buttons[i].textContent.trim() === (tab === 'manual' ? '✏️ ایجاد دستی' : '📋 واردات گروهی')) {
            buttons[i].classList.add('active');
        }
    }
}
</script>

</body>
</html>