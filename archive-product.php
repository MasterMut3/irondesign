<?php
/**
 * Archive Product (Shop Page)
 *
 * @package IronDesign
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        
        <?php if ( have_posts() ) : ?>
            
            <div class="shop-header">
                <h1 class="shop-title">
                    <?php woocommerce_page_title(); ?>
                </h1>
                <?php do_action( 'woocommerce_archive_description' ); ?>
            </div>
            
            <?php do_action( 'woocommerce_before_shop_loop' ); ?>
            
            <div class="shop-products">
                <?php woocommerce_product_loop_start(); ?>
                
                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <?php wc_get_template_part( 'content', 'product' ); ?>
                    
                <?php endwhile; ?>
                
                <?php woocommerce_product_loop_end(); ?>
            </div>
            
            <?php do_action( 'woocommerce_after_shop_loop' ); ?>
            
        <?php else : ?>
            
            <div class="shop-empty">
                <p><?php esc_html_e( 'No products found.', 'irondesign' ); ?></p>
            </div>
            
        <?php endif; ?>
        
    </div>
</main>

<?php
get_footer();