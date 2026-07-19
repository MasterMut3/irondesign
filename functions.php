<?php
/**
 * IronDesign Theme
 *
 * @package IronDesign
 */

if (!defined('ABSPATH')) {
    exit;
}
    
define('IRONDESIGN_VERSION', '1.0.0');
define('IRONDESIGN_PATH', get_template_directory());
define('IRONDESIGN_URI', get_template_directory_uri());
    
$includes = array(
    'setup',
    'enqueue',
    'helpers',
    'homepage',
    'woocommerce',
    'customizer',
    'ajax',
    'admin',
);

foreach ($includes as $file) {
    $path = IRONDESIGN_PATH . "/inc/{$file}.php";

    if (file_exists($path)) {
        require_once $path;
    }
}

/**
 * ============================================
 * CLEAN: No database fixes needed!
 * Just template overrides
 * ============================================
 */

/**
 * Force WooCommerce template for shop
 */
add_filter('template_include', function($template) {
    if (!class_exists('WooCommerce')) {
        return $template;
    }
    
    if (is_shop() || is_product_category() || is_product_tag()) {
        $wc_template = WC()->template_path() . 'archive-product.php';
        $template_path = locate_template($wc_template);
        
        if (!$template_path) {
            $template_path = WC()->plugin_path() . '/templates/archive-product.php';
        }
        
        return $template_path;
    }
    return $template;
}, 999);
