<?php
/**
 * Banner Section
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="banner-section">

    <div class="container">

        <div class="banner glass-card">

            <div class="banner-media">

                <img
                    src="<?php echo esc_url( IRONDESIGN_URI . '/assets/images/banner.jpg' ); ?>"
                    alt="IronDesign | مجموعه صنایع دستی آهن و چوب"
                    loading="lazy">

            </div>

            <div class="banner-overlay"></div>

            <div class="banner-content fade-up">

                <span class="hero-subtitle glass">

                    کلکسیون ویژه

                </span>

                <h2>

                    استحکام آهن
                    <br>
                    گرمای چوب

                </h2>

                <p>

                    محصولاتی که با عشق و مهارت دست‌ساز شده‌اند.
                    هر قطعه، داستانی از تعهد به کیفیت و زیبایی را روایت می‌کند.

                </p>

                <div class="hero-actions">

                    <a
                        href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
                        class="btn btn-primary">

                        مشاهده کلکسیون

                    </a>

                    <a
                        href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) . '?orderby=date' ); ?>"
                        class="btn btn-glass">

                        محصولات جدید

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>