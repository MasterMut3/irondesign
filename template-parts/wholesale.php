<?php
/**
 * Custom Order Section
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="wholesale-section">

    <div class="container">

        <div class="glass-card wholesale-wrapper">

            <div class="wholesale-content fade-up">

                <span class="hero-subtitle glass">

                    سفارش اختصاصی

                </span>

                <h2 class="section-title">

                    طرح مورد نظرتان را
                    <br>
                    <span style="color: var(--color-accent);">به ما بسپارید</span>

                </h2>

                <p class="section-subtitle">

                    آیا ایده‌ای در ذهن دارید؟ ما آن را به واقعیت تبدیل می‌کنیم.
                    از طراحی مبلمان سفارشی گرفته تا اکسسوری‌های منحصربه‌فرد،
                    تیم IronDesign آماده است تا رویای شما را با آهن و چوب خلق کند.

                </p>

                <ul class="wholesale-benefits">

                    <li>

                        طراحی کاملاً سفارشی بر اساس سلیقه شما

                    </li>

                    <li>

                        استفاده از بهترین متریال آهن و چوب

                    </li>

                    <li>

                        اجرای دقیق با بالاترین کیفیت

                    </li>

                    <li>

                        تحویل در سریع‌ترین زمان ممکن

                    </li>

                </ul>

                <div class="hero-actions">

                    <a
                        href="<?php echo esc_url( home_url( '/custom-order/' ) ); ?>"
                        class="btn btn-primary">

                        ثبت سفارش

                    </a>

                    <a
                        href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
                        class="btn btn-glass">

                        مشاهده نمونه کارها

                    </a>

                </div>

            </div>

            <div class="wholesale-image fade-up">

                <img
                    src="<?php echo esc_url( IRONDESIGN_URI . '/assets/images/wholesale.jpg' ); ?>"
                    alt="سفارش اختصاصی IronDesign | هر طرحی که بخواهید"
                    loading="lazy">

            </div>

        </div>

    </div>

</section>