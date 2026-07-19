<?php
/**
 * Content Single Product - IronDesign Custom Layout
 *
 * @package IronDesign
 */

defined('ABSPATH') || exit;

global $product;

if (!$product) {
    return;
}
?>

<div class="single-product-wrapper">

    <div class="single-product-content">

        <!-- Product Gallery -->
        <div class="single-product-gallery glass-card">
            <?php wc_get_template('single-product/product-image.php'); ?>
        </div>

        <!-- Product Summary -->
        <div class="single-product-summary glass-card">

            <?php
            // Title
            wc_get_template('single-product/title.php');

            // Rating
            wc_get_template('single-product/rating.php');

            // Price
            wc_get_template('single-product/price.php');

            // Short Description
            wc_get_template('single-product/short-description.php');

            // Add to Cart
            if ($product->is_type('simple')) {
                wc_get_template('single-product/simple.php');
            } elseif ($product->is_type('variable')) {
                wc_get_template('single-product/variable.php');
            }

            // Meta
            wc_get_template('single-product/meta.php');
            ?>

        </div>

    </div>

    <!-- ========================================
    PRODUCT TABS (Description, Attributes, Reviews)
    ======================================== -->

    <div class="irondesign-product-tabs glass-card">

        <!-- Tab Navigation -->
        <ul class="tabs-nav" role="tablist">
            <li class="tab-item active" role="tab">
                <a href="#tab-description" class="tab-link"><?php esc_html_e('توضیحات', 'irondesign'); ?></a>
            </li>
            <?php if ($product->get_attributes()) : ?>
                <li class="tab-item" role="tab">
                    <a href="#tab-attributes" class="tab-link"><?php esc_html_e('مشخصات فنی', 'irondesign'); ?></a>
                </li>
            <?php endif; ?>
            <li class="tab-item" role="tab">
                <a href="#tab-reviews" class="tab-link"><?php esc_html_e('نظرات', 'irondesign'); ?></a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tabs-content">

            <!-- Tab 1: Description -->
            <div class="tab-panel active" id="tab-description" role="tabpanel">
                <?php
                $description = $product->get_description();
                if ($description) {
                    echo '<div class="product-description-content">' . wp_kses_post($description) . '</div>';
                } else {
                    echo '<p>' . esc_html__('توضیحاتی برای این محصول ثبت نشده است.', 'irondesign') . '</p>';
                }
                ?>
            </div>

            <!-- Tab 2: Attributes -->
            <?php if ($product->get_attributes()) : ?>
                <div class="tab-panel" id="tab-attributes" role="tabpanel">
                    <table class="woocommerce-product-attributes">
                        <tbody>
                            <?php foreach ($product->get_attributes() as $attribute) : ?>
                                <tr>
                                    <th><?php echo wp_kses_post(wc_attribute_label($attribute->get_name())); ?></th>
                                    <td><?php echo wp_kses_post($product->get_attribute($attribute->get_name())); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <!-- Tab 3: Reviews -->
            <div class="tab-panel" id="tab-reviews" role="tabpanel">
                <?php
                // Load WooCommerce reviews template
                comments_template();
                ?>
            </div>

        </div>

    </div>

    <!-- ========================================
    RELATED PRODUCTS
    ======================================== -->

    <?php wc_get_template('single-product/related.php'); ?>

</div>