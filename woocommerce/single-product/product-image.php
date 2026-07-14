<?php
/**
 * Single Product Image - With Slider & Zoom
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;

$post_thumbnail_id = $product->get_image_id();
$gallery_ids = $product->get_gallery_image_ids();
$all_images = array_merge( array( $post_thumbnail_id ), $gallery_ids );
?>

<div class="irondesign-gallery">
    
    <!-- Main Image -->
    <div class="irondesign-main-image">
        <?php if ( $post_thumbnail_id ) : ?>
            <img 
                id="main-product-image"
                width="800" 
                height="800" 
                src="<?php echo esc_url( wp_get_attachment_image_url( $post_thumbnail_id, 'woocommerce_single' ) ); ?>" 
                class="main-product-image" 
                alt="<?php echo esc_attr( $product->get_name() ); ?>" 
                loading="eager" 
                fetchpriority="high"
                data-zoom-image="<?php echo esc_url( wp_get_attachment_image_url( $post_thumbnail_id, 'full' ) ); ?>"
            >
        <?php else : ?>
            <?php echo wc_placeholder_img(); ?>
        <?php endif; ?>
    </div>

    <!-- Thumbnails Slider -->
    <?php if ( count( $all_images ) > 1 ) : ?>
        <div class="irondesign-thumbnail-slider">
            <button class="slider-arrow prev" type="button">‹</button>
            
            <div class="irondesign-gallery-thumbnails">
                <?php foreach ( $all_images as $index => $image_id ) : 
                    $is_active = $index === 0 ? 'active' : '';
                ?>
                    <button 
                        class="gallery-thumb <?php echo esc_attr( $is_active ); ?>" 
                        type="button"
                        data-index="<?php echo esc_attr( $index ); ?>"
                        data-image="<?php echo esc_url( wp_get_attachment_image_url( $image_id, 'woocommerce_single' ) ); ?>"
                        data-zoom="<?php echo esc_url( wp_get_attachment_image_url( $image_id, 'full' ) ); ?>"
                    >
                        <?php
                        echo wp_get_attachment_image(
                            $image_id,
                            'woocommerce_gallery_thumbnail'
                        );
                        ?>
                    </button>
                <?php endforeach; ?>
            </div>
            
            <button class="slider-arrow next" type="button">›</button>
        </div>
    <?php endif; ?>
</div>