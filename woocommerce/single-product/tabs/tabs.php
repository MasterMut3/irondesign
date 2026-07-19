<?php
/**
 * Product Tabs
 *
 * @package IronDesign
 */

defined('ABSPATH') || exit;

global $product;

$tabs = apply_filters('woocommerce_product_tabs', array());

if (empty($tabs)) {
    return;
}
?>

<div class="irondesign-product-tabs glass-card">

    <ul class="tabs-nav" role="tablist">
        <?php foreach ($tabs as $key => $tab) : ?>
            <li class="tab-item <?php echo esc_attr($key); ?>_tab" id="tab-title-<?php echo esc_attr($key); ?>" role="tab" aria-controls="tab-<?php echo esc_attr($key); ?>">
                <a href="#tab-<?php echo esc_attr($key); ?>" class="tab-link">
                    <?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $tab['title'], $key)); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="tabs-content">
        <?php foreach ($tabs as $key => $tab) : ?>
            <div class="tab-panel" id="tab-<?php echo esc_attr($key); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr($key); ?>">
                <?php
                if (isset($tab['callback'])) {
                    call_user_func($tab['callback'], $key, $tab);
                }
                ?>
            </div>
        <?php endforeach; ?>
    </div>

</div>