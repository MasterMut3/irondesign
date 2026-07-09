<?php
/**
 * Categories Section
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="product-categories">

    <div class="container">

        <div class="section-header fade-up">

            <div>

                <span class="hero-subtitle glass">

                    دسته‌بندی محصولات

                </span>

                <h2 class="section-title">

                    بر اساس سلیقه‌تان انتخاب کنید

                </h2>

                <p class="section-subtitle">

                    از میان مجموعه‌های متنوع ما، محصولی را بیابید که با سبک زندگی شما هماهنگ باشد.
                    هر قطعه، تلفیقی از هنر آهن‌گری و ظرافت چوب است.

                </p>

            </div>

        </div>

        <div class="categories-grid">

            <?php

            $categories = irondesign_get_home_categories( 4 );

            if ( ! empty( $categories ) ) :

                foreach ( $categories as $category ) :

                    $thumbnail_id = get_term_meta(
                        $category->term_id,
                        'thumbnail_id',
                        true
                    );

                    $image = wp_get_attachment_url( $thumbnail_id );

                    if ( ! $image ) {
                        $image = wc_placeholder_img_src();
                    }

                    ?>

                    <a
                        class="category-card glass-card fade-up"
                        href="<?php echo esc_url( get_term_link( $category ) ); ?>">

                        <div class="category-image">

                            <img
                                src="<?php echo esc_url( $image ); ?>"
                                alt="<?php echo esc_attr( $category->name ); ?>"
                                loading="lazy">

                        </div>

                        <div class="category-overlay"></div>

                        <div class="category-content">

                            <span class="category-tag">

                                <?php echo esc_html( $category->count ); ?>
                                محصول

                            </span>

                            <h3 class="category-title">

                                <?php echo esc_html( $category->name ); ?>

                            </h3>

                            <p>

                                مشاهده مجموعه →

                            </p>

                        </div>

                    </a>

                    <?php

                endforeach;

            endif;

            ?>

        </div>

    </div>

</section>