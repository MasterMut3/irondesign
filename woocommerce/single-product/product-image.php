<?php
/**
 * Single Product Image
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

global $product;

$post_thumbnail_id = $product->get_image_id();

$gallery_ids = $product->get_gallery_image_ids();
?>

<div class="irondesign-gallery">

    <div class="irondesign-main-image">

        <?php

        if ( $post_thumbnail_id ) {

            echo wp_get_attachment_image(
                $post_thumbnail_id,
                'woocommerce_single',
                false,
                array(
                    'class' => 'main-product-image',
                    'loading' => 'eager',
                    'fetchpriority' => 'high',
                )
            );

        } else {

            echo wc_placeholder_img();

        }

        ?>

    </div>

    <?php if ( ! empty( $gallery_ids ) ) : ?>

        <div class="irondesign-gallery-thumbnails">

            <?php foreach ( $gallery_ids as $image_id ) : ?>

                <button
                    class="gallery-thumb"
                    type="button">

                    <?php

                    echo wp_get_attachment_image(
                        $image_id,
                        'woocommerce_gallery_thumbnail'
                    );

                    ?>

                </button>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

</div>