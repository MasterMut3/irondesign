<?php
/**
 * Fresh Product Import Wizard - Complete Database Cleanup
 * Access: http://localhost/irondesign/wp-content/themes/irondesign/fresh-product-wizard.php
 */

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ============================================================
// LOAD WORDPRESS
// ============================================================

$wp_load_paths = array(
    dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) . '/wp-load.php',
    dirname( dirname( dirname( __FILE__ ) ) ) . '/wp-load.php',
    $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php',
    $_SERVER['DOCUMENT_ROOT'] . '/irondesign/wp-load.php',
    'D:/xamp/htdocs/irondesign/wp-load.php',
);

$wp_loaded = false;
foreach ( $wp_load_paths as $path ) {
    if ( file_exists( $path ) ) {
        require_once( $path );
        $wp_loaded = true;
        break;
    }
}

if ( ! $wp_loaded ) {
    die( '❌ Could not load WordPress.' );
}

// Load required files
require_once( ABSPATH . 'wp-admin/includes/media.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/image.php' );

// Check admin access
if ( ! current_user_can( 'manage_options' ) ) {
    wp_die( 'شما دسترسی به این صفحه ندارید.' );
}

// ============================================================
// PRODUCT DATA
// ============================================================

$products_data = array(
    array(
        'name' => 'پایه میز فلزی طرح آرین مدل ID-1130',
        'sku' => 'ID-1130',
        'price' => '42000000',
        'height' => '73 سانتی متر',
        'width' => '60 سانتی متر',
        'depth' => '40 سانتی متر',
        'weight' => '15 کیلوگرم',
        'material' => 'ورق آهنی با ضخامت 2 میلی‌متر',
        'color_finish' => 'رنگ کوره ای الکترواستاتیک',
        'warranty' => 'یک سال گارانتی سلامت فیزیکی',
        'production_time' => '۲۰ تا ۳۰ روز کاری',
        'colors' => array('سفید کوره ای', 'طوسی کوره ای', 'مشکی کوره ای', 'آبی کوره ای'),
        'image' => 'https://senjedchoob.com/wp-content/uploads/2026/05/le-1130-2.jpg',
        'gallery' => array(
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1130-1.jpg',
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1130-3.jpg',
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1130-5.jpg',
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1130-6.jpg'
        ),
        'category' => 'پایه میز',
        'tags' => array('پایه فلزی', 'میز اداری', 'دکوراسیون مدرن'),
        'description' => '<h2>پایه میز فلزی طرح آرین مدل ID-1130</h2>

<p>پایه میز فلزی طرح آرین با طراحی منحصر به فرد و مدرن، انتخابی ایده‌آل برای دکوراسیون‌های اداری و خانگی است.</p>

<h3>کیفیت ساخت</h3>
<p>پایه میز فلزی طرح آرین با به روزترین دستگاه‌ها و ابزارهای صنعت دکوراسیون ساخته شده است.</p>

<h3>مشخصات فنی</h3>
<ul>
<li><strong>جنس:</strong> ورق آهنی با ضخامت ۲ میلی‌متر</li>
<li><strong>ارتفاع:</strong> ۷۳ سانتی‌متر</li>
<li><strong>عرض:</strong> ۶۰ سانتی‌متر</li>
<li><strong>عمق:</strong> ۴۰ سانتی‌متر</li>
<li><strong>رنگ:</strong> کوره ای الکترواستاتیک در ۴ رنگ</li>
<li><strong>گارانتی:</strong> یک ساله</li>
</ul>

<h3>مزایا</h3>
<ul>
<li>طراحی زیبا و مدرن</li>
<li>قابلیت استفاده در دکوراسیون اداری و خانگی</li>
<li>متریال فلزی با کیفیت درجه A+</li>
<li>امکان سفارشی‌سازی در ابعاد و آپشن‌ها</li>
</ul>',
        'short_description' => 'پایه میز فلزی طرح آرین با طراحی مدرن و کیفیت عالی.'
    ),
    array(
        'name' => 'پایه میز فلزی طرح رادین مدل ID-1129',
        'sku' => 'ID-1129',
        'price' => '34000000',
        'height' => '73 سانتی متر',
        'width' => '60 سانتی متر',
        'depth' => '35 سانتی متر',
        'weight' => '12 کیلوگرم',
        'material' => 'ورق آهنی با ضخامت 1.8 میلی‌متر',
        'color_finish' => 'رنگ کوره ای الکترواستاتیک',
        'warranty' => 'یک سال گارانتی سلامت فیزیکی',
        'production_time' => '۲۰ تا ۳۰ روز کاری',
        'colors' => array('سفید کوره ای', 'طوسی کوره ای', 'مشکی کوره ای'),
        'image' => 'https://senjedchoob.com/wp-content/uploads/2026/05/le-1129-2.jpg',
        'gallery' => array(
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1129-1.jpg'
        ),
        'category' => 'پایه میز',
        'tags' => array('پایه فلزی', 'میز مدرن'),
        'description' => '<h2>پایه میز فلزی طرح رادین مدل ID-1129</h2>
<p>پایه میز فلزی طرح رادین با طراحی ساده و مدرن، گزینه‌ای عالی برای فضاهای مینیمال است.</p>',
        'short_description' => 'پایه میز فلزی طرح رادین با طراحی مینیمال و کیفیت بالا.'
    ),
    array(
        'name' => 'پایه میز فلزی طرح آریا مدل ID-1131',
        'sku' => 'ID-1131',
        'price' => '36000000',
        'height' => '73 سانتی متر',
        'width' => '65 سانتی متر',
        'depth' => '45 سانتی متر',
        'weight' => '14 کیلوگرم',
        'material' => 'ورق آهنی با ضخامت 2 میلی‌متر',
        'color_finish' => 'رنگ کوره ای الکترواستاتیک',
        'warranty' => 'یک سال گارانتی سلامت فیزیکی',
        'production_time' => '۲۰ تا ۳۰ روز کاری',
        'colors' => array('سفید کوره ای', 'طوسی کوره ای', 'مشکی کوره ای', 'طلایی کوره ای'),
        'image' => 'https://senjedchoob.com/wp-content/uploads/2026/05/le-1131-3.jpg',
        'gallery' => array(
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1131-2.jpg'
        ),
        'category' => 'پایه میز',
        'tags' => array('پایه فلزی', 'میز لوکس'),
        'description' => '<h2>پایه میز فلزی طرح آریا مدل ID-1131</h2>
<p>پایه میز فلزی طرح آریا با طراحی لوکس و منحصر به فرد.</p>',
        'short_description' => 'پایه میز فلزی طرح آریا با طراحی لوکس و خاص.'
    ),
    array(
        'name' => 'پایه میز فلزی طرح آرمین مدل ID-1132',
        'sku' => 'ID-1132',
        'price' => '79000000',
        'height' => '73 سانتی متر',
        'width' => '60 سانتی متر',
        'depth' => '40 سانتی متر',
        'weight' => '18 کیلوگرم',
        'material' => 'ورق آهنی با ضخامت 2.5 میلی‌متر',
        'color_finish' => 'رنگ کوره ای الکترواستاتیک',
        'warranty' => 'دو سال گارانتی سلامت فیزیکی',
        'production_time' => '۲۵ تا ۳۵ روز کاری',
        'colors' => array('سفید کوره ای', 'طوسی کوره ای', 'مشکی کوره ای', 'برنزی کوره ای'),
        'image' => 'https://senjedchoob.com/wp-content/uploads/2026/05/le-1132-2.jpg',
        'gallery' => array(
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1132-1.jpg'
        ),
        'category' => 'پایه میز',
        'tags' => array('پایه فلزی', 'میز لوکس'),
        'description' => '<h2>پایه میز فلزی طرح آرمین مدل ID-1132</h2>
<p>پایه میز فلزی طرح آرمین با طراحی فوق‌لوکس و مدرن.</p>',
        'short_description' => 'پایه میز فلزی طرح آرمین با طراحی فوق‌لوکس.'
    ),
    array(
        'name' => 'پایه میز فلزی طرح رهام مدل ID-1128',
        'sku' => 'ID-1128',
        'price' => '75000000',
        'height' => '73 سانتی متر',
        'width' => '60 سانتی متر',
        'depth' => '38 سانتی متر',
        'weight' => '16 کیلوگرم',
        'material' => 'ورق آهنی با ضخامت 2.2 میلی‌متر',
        'color_finish' => 'رنگ کوره ای الکترواستاتیک',
        'warranty' => 'یک سال گارانتی سلامت فیزیکی',
        'production_time' => '۲۰ تا ۳۰ روز کاری',
        'colors' => array('سفید کوره ای', 'طوسی کوره ای', 'مشکی کوره ای'),
        'image' => 'https://senjedchoob.com/wp-content/uploads/2026/05/le-1128.jpg',
        'gallery' => array(
            'https://senjedchoob.com/wp-content/uploads/2026/05/le-1128-2.jpg'
        ),
        'category' => 'پایه میز',
        'tags' => array('پایه فلزی', 'میز مدرن'),
        'description' => '<h2>پایه میز فلزی طرح رهام مدل ID-1128</h2>
<p>پایه میز فلزی طرح رهام با طراحی خاص و منحصر به فرد.</p>',
        'short_description' => 'پایه میز فلزی طرح رهام با طراحی خاص.'
    ),
);

// ============================================================
// PROCESS FORM
// ============================================================

$message = '';
$message_type = '';

// Delete ALL products with complete database cleanup
if ( isset( $_POST['delete_all'] ) && isset( $_POST['confirm_delete'] ) && $_POST['confirm_delete'] === 'yes' ) {
    $deleted_count = complete_database_cleanup();
    $message = '✅ ' . $deleted_count . ' محصول با موفقیت حذف شدند!<br>دیتابیس کامل پاکسازی شد.';
    $message_type = 'success';
}

// Import all products
if ( isset( $_POST['import_all'] ) ) {
    $results = array();
    $success_count = 0;
    $error_count = 0;
    
    foreach ( $products_data as $product_data ) {
        $result = force_import_product( $product_data );
        if ( strpos( $result, '✅' ) !== false ) {
            $success_count++;
        } else {
            $error_count++;
        }
        $results[] = $result;
    }
    
    $message = '📦 <strong>نتیجه واردات:</strong><br>';
    $message .= '✅ موفق: ' . $success_count . ' محصول<br>';
    $message .= '❌ ناموفق: ' . $error_count . ' محصول<br><br>';
    $message .= implode( '<br>', $results );
    $message_type = 'success';
}

// ============================================================
// COMPLETE DATABASE CLEANUP
// ============================================================

function complete_database_cleanup() {
    global $wpdb;
    
    $count = 0;
    
    // STEP 1: Get ALL products including variations
    $all_products = $wpdb->get_results( "
        SELECT ID, post_type 
        FROM {$wpdb->posts} 
        WHERE post_type IN ('product', 'product_variation')
    " );
    
    // STEP 2: Delete all product meta
    $product_ids = array();
    foreach ( $all_products as $product ) {
        $product_ids[] = $product->ID;
    }
    
    if ( ! empty( $product_ids ) ) {
        $ids_string = implode( ',', $product_ids );
        
        // Delete all post meta for these products
        $wpdb->query( "
            DELETE FROM {$wpdb->postmeta} 
            WHERE post_id IN ({$ids_string})
        " );
        
        // Delete the products themselves
        foreach ( $all_products as $product ) {
            $result = wp_delete_post( $product->ID, true );
            if ( $result ) {
                $count++;
            }
        }
    }
    
    // STEP 3: Delete any orphaned meta
    $wpdb->query( "
        DELETE FROM {$wpdb->postmeta} 
        WHERE meta_key IN ('_sku', '_regular_price', '_sale_price', '_price', '_stock', '_stock_status', '_manage_stock', '_product_image_gallery', '_product_attributes', '_default_attributes', '_variation_attributes')
        AND post_id NOT IN (SELECT ID FROM {$wpdb->posts})
    " );
    
    // STEP 4: Clear all WooCommerce transients
    $wpdb->query( "
        DELETE FROM {$wpdb->options} 
        WHERE option_name LIKE '_transient_wc_%' 
        OR option_name LIKE '_transient_timeout_wc_%'
    " );
    
    // STEP 5: Clear cache
    delete_transient( 'wc_products_onsale' );
    delete_transient( 'wc_featured_products' );
    delete_transient( 'wc_products_onsale' );
    
    // STEP 6: Cleanup variations from attributes
    $wpdb->query( "
        DELETE FROM {$wpdb->postmeta} 
        WHERE meta_key LIKE 'attribute_%'
        AND post_id NOT IN (SELECT ID FROM {$wpdb->posts})
    " );
    
    // STEP 7: Reset auto-increment for faster inserts
    $wpdb->query( "ALTER TABLE {$wpdb->posts} AUTO_INCREMENT = 1" );
    $wpdb->query( "ALTER TABLE {$wpdb->postmeta} AUTO_INCREMENT = 1" );
    
    return $count;
}

// ============================================================
// FORCE IMPORT FUNCTION
// ============================================================

function force_import_product( $data ) {
    global $wpdb;
    
    // Check if WooCommerce is active
    if ( ! class_exists( 'WooCommerce' ) ) {
        return '⚠️ ووکامرس فعال نیست!';
    }
    
    // ============================================================
    // AGGRESSIVE CLEANUP - Delete ANYTHING with this SKU
    // ============================================================
    
    // Delete by SKU meta
    $sku_products = $wpdb->get_results( $wpdb->prepare( "
        SELECT post_id 
        FROM {$wpdb->postmeta} 
        WHERE meta_key = '_sku' 
        AND meta_value LIKE %s
    ", '%' . $data['sku'] . '%' ) );
    
    foreach ( $sku_products as $item ) {
        wp_delete_post( $item->post_id, true );
    }
    
    // Delete by title
    $existing = get_page_by_title( $data['name'], OBJECT, 'product' );
    if ( $existing ) {
        wp_delete_post( $existing->ID, true );
    }
    
    // ============================================================
    // CREATE ATTRIBUTES
    // ============================================================
    $attributes = array(
        'ارتفاع' => 'pa_arz',
        'عرض' => 'pa_arz2',
        'عمق' => 'pa_omgh',
        'وزن' => 'pa_vazn',
        'جنس' => 'pa_jens',
        'رنگ' => 'pa_color',
        'پوشش' => 'pa_pooshesh',
        'گارانتی' => 'pa_garanti',
        'زمان تولید' => 'pa_zaman-tolid',
    );
    
    foreach ( $attributes as $name => $slug ) {
        create_attribute_if_not_exists( $name, $slug );
    }
    
    // ============================================================
    // CREATE TERMS
    // ============================================================
    $specs = array(
        'pa_arz' => $data['height'],
        'pa_arz2' => $data['width'],
        'pa_omgh' => $data['depth'],
        'pa_vazn' => $data['weight'],
        'pa_jens' => $data['material'],
        'pa_pooshesh' => $data['color_finish'],
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
    
    // ============================================================
    // CREATE PRODUCT
    // ============================================================
    $product = new WC_Product_Variable();
    $product->set_name( $data['name'] );
    
    // Generate unique SKU to avoid conflicts
    $unique_sku = $data['sku'] . '-' . time();
    $product->set_sku( $unique_sku );
    
    $product->set_status( 'publish' );
    $product->set_catalog_visibility( 'visible' );
    $product->set_description( $data['description'] );
    $product->set_short_description( $data['short_description'] );
    $product->set_manage_stock( true );
    $product->set_stock_status( 'instock' );
    
    // ============================================================
    // ADD CATEGORY
    // ============================================================
    $category_ids = array();
    $categories = array( $data['category'] );
    foreach ( $categories as $category ) {
        $term = term_exists( $category, 'product_cat' );
        if ( ! $term ) {
            $term = wp_insert_term( $category, 'product_cat' );
        }
        if ( ! is_wp_error( $term ) ) {
            $category_ids[] = is_array( $term ) ? $term['term_id'] : $term;
        }
    }
    if ( ! empty( $category_ids ) ) {
        $product->set_category_ids( $category_ids );
    }
    
    // ============================================================
    // ADD TAGS
    // ============================================================
    if ( ! empty( $data['tags'] ) ) {
        $tag_ids = array();
        foreach ( $data['tags'] as $tag ) {
            $term = term_exists( $tag, 'product_tag' );
            if ( ! $term ) {
                $term = wp_insert_term( $tag, 'product_tag' );
            }
            if ( ! is_wp_error( $term ) ) {
                $tag_ids[] = is_array( $term ) ? $term['term_id'] : $term;
            }
        }
        if ( ! empty( $tag_ids ) ) {
            wp_set_object_terms( $product->get_id(), $tag_ids, 'product_tag' );
        }
    }
    
    // ============================================================
    // SET ATTRIBUTES
    // ============================================================
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
    
    // Save product to get ID
    $product_id = $product->save();
    
    // Now update the SKU to the correct one (now that we've created the product)
    update_post_meta( $product_id, '_sku', $data['sku'] );
    
    // ============================================================
    // CREATE VARIATIONS WITH PRICES
    // ============================================================
    $counter = 1;
    foreach ( $colors as $color ) {
        $variation = new WC_Product_Variation();
        $variation->set_parent_id( $product_id );
        
        // Generate unique variation SKU
        $variation_sku = $data['sku'] . '-' . $counter . '-' . time();
        $variation->set_sku( $variation_sku );
        
        $variation->set_regular_price( $data['price'] );
        $variation->set_price( $data['price'] );
        $variation->set_manage_stock( true );
        $variation->set_stock_quantity( 10 );
        $variation->set_stock_status( 'instock' );
        $variation->set_attributes( array( 'pa_color' => $color ) );
        $variation->save();
        
        // Update variation SKU to clean version
        update_post_meta( $variation->get_id(), '_sku', $data['sku'] . '-' . $counter );
        
        $counter++;
    }
    
    // Set default variation
    if ( ! empty( $colors ) ) {
        $product->set_default_attributes( array( 'pa_color' => $colors[0] ) );
    }
    $product->save();
    
    // ============================================================
    // ADD IMAGES
    // ============================================================
    // Featured image
    if ( ! empty( $data['image'] ) ) {
        try {
            $image_id = media_sideload_image( $data['image'], $product_id, 'تصویر اصلی', 'id' );
            if ( ! is_wp_error( $image_id ) && $image_id > 0 ) {
                set_post_thumbnail( $product_id, $image_id );
            }
        } catch ( Exception $e ) {
            // Image import failed
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
                    // Skip this image
                }
            }
        }
        if ( ! empty( $gallery_ids ) ) {
            update_post_meta( $product_id, '_product_image_gallery', implode( ',', $gallery_ids ) );
        }
    }
    
    return '✅ محصول "' . $data['name'] . '" با موفقیت ایجاد شد!<br>
            <strong>SKU:</strong> ' . $data['sku'] . '<br>
            <strong>قیمت:</strong> ' . number_format( $data['price'] ) . ' تومان<br>
            <strong>رنگ‌ها:</strong> ' . implode( ' - ', $colors ) . '<br>
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
// HTML OUTPUT (SAME AS BEFORE)
// ============================================================
?>
<!DOCTYPE html>
<html dir="rtl" lang="fa-IR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>واردات محصولات - IronDesign</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Vazir', 'Tahoma', sans-serif;
            background: #0a0a0a;
            padding: 40px 20px;
            color: #e0e0e0;
            direction: rtl;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: #1a1a1a;
            border-radius: 16px;
            padding: 40px;
            border: 1px solid rgba(255,255,255,0.05);
        }
        h1 {
            font-size: 28px;
            color: #8B5CF6;
            margin-bottom: 8px;
        }
        .subtitle {
            color: #888;
            font-size: 14px;
            margin-bottom: 30px;
        }
        .message {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid;
        }
        .message.success {
            background: rgba(74, 222, 128, 0.1);
            color: #4ade80;
            border-color: rgba(74, 222, 128, 0.2);
        }
        .message.error {
            background: rgba(248, 113, 113, 0.1);
            color: #f87171;
            border-color: rgba(248, 113, 113, 0.2);
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: inherit;
            text-decoration: none;
        }
        .btn-primary { background: #8B5CF6; color: #fff; }
        .btn-primary:hover { background: #7C3AED; transform: translateY(-2px); }
        .btn-danger { background: #ef4444; color: #fff; }
        .btn-danger:hover { background: #dc2626; transform: translateY(-2px); }
        .btn-success { background: #22c55e; color: #fff; }
        .btn-success:hover { background: #16a34a; transform: translateY(-2px); }
        .btn-secondary { background: #374151; color: #fff; }
        .btn-secondary:hover { background: #4B5563; }
        
        .divider {
            border: none;
            border-top: 1px solid rgba(255,255,255,0.05);
            margin: 30px 0;
        }
        
        .product-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin: 15px 0;
        }
        .product-card {
            background: rgba(255,255,255,0.03);
            padding: 15px 20px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .product-card:hover {
            border-color: rgba(139, 92, 246, 0.3);
        }
        .product-card .info { flex: 1; }
        .product-card .name { font-weight: 600; font-size: 14px; color: #fff; }
        .product-card .sku { font-size: 12px; color: #888; }
        .product-card .price { font-size: 13px; color: #8B5CF6; font-weight: 600; }
        
        .warning-box {
            background: rgba(245, 158, 11, 0.1);
            border: 1px solid rgba(245, 158, 11, 0.2);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            color: #f59e0b;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin: 20px 0;
        }
        .stat-item {
            background: rgba(255,255,255,0.03);
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.05);
        }
        .stat-item .number {
            font-size: 28px;
            font-weight: 700;
            color: #8B5CF6;
        }
        .stat-item .label {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }
        
        .actions-row {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin: 20px 0;
        }
        
        @media (max-width: 600px) {
            .product-grid, .stats {
                grid-template-columns: 1fr;
            }
            .container { padding: 20px; }
            .actions-row { flex-direction: column; }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>🧙 Fresh Product Import Wizard</h1>
    <p class="subtitle">واردات کامل محصولات با پاکسازی کامل دیتابیس</p>
    
    <?php if ( ! empty( $message ) ) : ?>
        <div class="message <?php echo $message_type; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    
    <!-- ============================================================
    STATS
    ============================================================ -->
    <?php
    global $wpdb;
    $product_count = $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = 'product' AND post_status = 'publish'" );
    $variation_count = $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = 'product_variation'" );
    $all_count = $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type IN ('product', 'product_variation')" );
    ?>
    <div class="stats">
        <div class="stat-item">
            <div class="number"><?php echo $product_count; ?></div>
            <div class="label">محصولات منتشر شده</div>
        </div>
        <div class="stat-item">
            <div class="number"><?php echo $variation_count; ?></div>
            <div class="label">تنوع‌های محصول</div>
        </div>
        <div class="stat-item">
            <div class="number"><?php echo $all_count; ?></div>
            <div class="label">کل در دیتابیس</div>
        </div>
        <div class="stat-item">
            <div class="number"><?php echo count($products_data); ?></div>
            <div class="label">در صف واردات</div>
        </div>
    </div>
    
    <?php if ( $all_count > 0 ) : ?>
        <div class="warning-box">
            ⚠️ <strong><?php echo $all_count; ?> آیتم</strong> در دیتابیس وجود دارد.
            برای شروع تازه، ابتدا <strong>"پاکسازی کامل دیتابیس"</strong> را بزنید.
        </div>
    <?php endif; ?>
    
    <hr class="divider">
    
    <!-- ============================================================
    PRODUCTS TO IMPORT
    ============================================================ -->
    <h3 style="color: #fff; margin-bottom: 15px;">📦 محصولات قابل واردات</h3>
    <div class="product-grid">
        <?php foreach ( $products_data as $product ) : ?>
            <div class="product-card">
                <div class="info">
                    <div class="name"><?php echo esc_html( $product['name'] ); ?></div>
                    <div class="sku">SKU: <?php echo esc_html( $product['sku'] ); ?></div>
                    <div class="price"><?php echo number_format( $product['price'] ); ?> تومان</div>
                </div>
                <span style="color: #4ade80; font-size: 12px;">✅ آماده</span>
            </div>
        <?php endforeach; ?>
    </div>
    
    <hr class="divider">
    
    <!-- ============================================================
    ACTIONS
    ============================================================ -->
    <h3 style="color: #fff; margin-bottom: 15px;">⚡ عملیات</h3>
    
    <div class="actions-row">
        <!-- Import All -->
        <form method="POST" style="display:inline;">
            <button type="submit" name="import_all" class="btn btn-success">
                📥 واردات همه محصولات
            </button>
        </form>
        
        <!-- Delete All -->
        <form method="POST" style="display:inline;" onsubmit="return confirm('⚠️ آیا از پاکسازی کامل دیتابیس مطمئن هستید؟ این عمل غیرقابل بازگشت است!');">
            <input type="hidden" name="confirm_delete" value="yes">
            <button type="submit" name="delete_all" class="btn btn-danger">
                🗑️ پاکسازی کامل دیتابیس
            </button>
        </form>
        
        <!-- View Products -->
        <a href="<?php echo admin_url('edit.php?post_type=product'); ?>" class="btn btn-secondary" target="_blank">
            📋 مشاهده محصولات
        </a>
    </div>
    
    <hr class="divider">
    
    <!-- ============================================================
    STEP BY STEP
    ============================================================ -->
    <h3 style="color: #fff; margin-bottom: 15px;">📋 راهنمای گام به گام</h3>
    <ol style="color: #b8b8b8; line-height: 2.2; padding-right: 20px;">
        <li><strong style="color: #ef4444;">مرحله ۱:</strong> کلیک کنید <strong>"🗑️ پاکسازی کامل دیتابیس"</strong></li>
        <li><strong style="color: #22c55e;">مرحله ۲:</strong> کلیک کنید <strong>"📥 واردات همه محصولات"</strong></li>
        <li><strong style="color: #8B5CF6;">مرحله ۳:</strong> منتظر بمانید تا عملیات کامل شود</li>
        <li><strong style="color: #f59e0b;">مرحله ۴:</strong> محصولات را در <a href="<?php echo admin_url('edit.php?post_type=product'); ?>" style="color: #8B5CF6;" target="_blank">بخش محصولات</a> بررسی کنید</li>
        <li><strong style="color: #ef4444;">مرحله ۵:</strong> این فایل را پس از استفاده حذف کنید</li>
    </ol>
    
    <div style="text-align: center; font-size: 12px; color: #555; margin-top: 30px;">
        <p>⚠️ این ابزار فقط برای مدیریت سایت در دسترس است.</p>
    </div>
</div>
</body>
</html>