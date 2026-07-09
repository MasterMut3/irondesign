<?php
/**
 * Shop Page - Custom
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main">

    <div class="container">

        <!-- Shop Header -->
        <div class="shop-header glass-card">

            <div class="shop-header-content">

                <span class="hero-subtitle glass">
                    <?php esc_html_e( 'مجموعه محصولات', 'irondesign' ); ?>
                </span>

                <h1 class="shop-title">
                    <?php woocommerce_page_title(); ?>
                </h1>

                <p class="shop-description">
                    <?php esc_html_e( 'ترکیبی از استحکام آهن و گرمای چوب در هر محصول', 'irondesign' ); ?>
                </p>

            </div>

        </div>

        <!-- Shop Filters -->
        <div class="shop-filters glass-card">

            <!-- Category Filter -->
            <div class="filter-categories">

                <span class="filter-label"><?php esc_html_e( 'دسته‌بندی:', 'irondesign' ); ?></span>

                <div class="category-filter-list">

                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="cat-filter active">
                        <?php esc_html_e( 'همه', 'irondesign' ); ?>
                    </a>

                    <?php
                    $categories = get_terms( array(
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => true,
                        'parent'     => 0,
                    ) );

                    foreach ( $categories as $category ) :
                        $cat_url = get_term_link( $category );
                        $is_active = ( is_product_category() && get_queried_object_id() === $category->term_id );
                    ?>

                        <a href="<?php echo esc_url( $cat_url ); ?>" class="cat-filter <?php echo $is_active ? 'active' : ''; ?>">
                            <?php echo esc_html( $category->name ); ?>
                            <span class="cat-count">(<?php echo esc_html( $category->count ); ?>)</span>
                        </a>

                    <?php endforeach; ?>

                </div>

            </div>

            <!-- Sort Panel -->
            <div class="filter-sort">

                <span class="filter-label"><?php esc_html_e( 'مرتب‌سازی:', 'irondesign' ); ?></span>

                <div class="sort-options">

                    <a href="<?php echo esc_url( add_query_arg( 'orderby', 'popularity' ) ); ?>" class="sort-option <?php echo ( isset( $_GET['orderby'] ) && $_GET['orderby'] === 'popularity' ) ? 'active' : ''; ?>">
                        <?php esc_html_e( 'محبوب‌ترین', 'irondesign' ); ?>
                    </a>

                    <a href="<?php echo esc_url( add_query_arg( 'orderby', 'rating' ) ); ?>" class="sort-option <?php echo ( isset( $_GET['orderby'] ) && $_GET['orderby'] === 'rating' ) ? 'active' : ''; ?>">
                        <?php esc_html_e( 'بالاترین امتیاز', 'irondesign' ); ?>
                    </a>

                    <a href="<?php echo esc_url( add_query_arg( 'orderby', 'date' ) ); ?>" class="sort-option <?php echo ( ! isset( $_GET['orderby'] ) || $_GET['orderby'] === 'date' ) ? 'active' : ''; ?>">
                        <?php esc_html_e( 'جدیدترین', 'irondesign' ); ?>
                    </a>

                    <a href="<?php echo esc_url( add_query_arg( 'orderby', 'price' ) ); ?>" class="sort-option <?php echo ( isset( $_GET['orderby'] ) && $_GET['orderby'] === 'price' ) ? 'active' : ''; ?>">
                        <?php esc_html_e( 'ارزان‌ترین', 'irondesign' ); ?>
                    </a>

                    <a href="<?php echo esc_url( add_query_arg( 'orderby', 'price-desc' ) ); ?>" class="sort-option <?php echo ( isset( $_GET['orderby'] ) && $_GET['orderby'] === 'price-desc' ) ? 'active' : ''; ?>">
                        <?php esc_html_e( 'گران‌ترین', 'irondesign' ); ?>
                    </a>

                </div>

            </div>

        </div>

        <?php if ( have_posts() ) : ?>

            <?php woocommerce_product_loop_start(); ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php wc_get_template_part( 'content', 'product' ); ?>

            <?php endwhile; ?>

            <?php woocommerce_product_loop_end(); ?>

            <?php do_action( 'woocommerce_after_shop_loop' ); ?>

        <?php else : ?>

            <div class="shop-empty glass-card">

                <h2><?php esc_html_e( 'هیچ محصولی یافت نشد.', 'irondesign' ); ?></h2>

            </div>

        <?php endif; ?>

    </div>

</main>

<?php
get_footer();