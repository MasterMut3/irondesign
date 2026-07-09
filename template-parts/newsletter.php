<?php
/**
 * Free Consultation Section
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="newsletter-section">

    <div class="container">

        <div class="newsletter-wrapper glass-card fade-up">

            <div class="newsletter-content">

                <span class="hero-subtitle glass">

                    دریافت مشاوره رایگان

                </span>

                <h2 class="section-title">

                    با ما در تماس باشید
                    <br>
                    <span style="color: var(--color-accent);">رایگان مشاوره بگیرید</span>

                </h2>

                <p class="section-subtitle">

                    برای طراحی و ساخت محصولات سفارشی،
                    تیم IronDesign آماده ارائه مشاوره رایگان به شماست.
                    کافیست شماره تماس خود را وارد کنید تا در اسرع وقت با شما تماس بگیریم.

                </p>

            </div>

            <div class="newsletter-form">

                <form
                    action="<?php echo esc_url( home_url( '/' ) ); ?>#consultation"
                    method="post"
                    class="irondesign-newsletter-form consultation-form">

                    <label
                        class="screen-reader-text"
                        for="consultation-phone">

                        شماره تماس

                    </label>

                    <input
                        id="consultation-phone"
                        type="tel"
                        name="phone"
                        placeholder="شماره تماس خود را وارد کنید"
                        required
                        pattern="[0-9]{10,11}"
                        title="لطفاً شماره تماس معتبر وارد کنید">

                    <button
                        class="btn btn-primary"
                        type="submit">

                        درخواست مشاوره

                    </button>

                </form>

                <p style="font-size: 12px; color: #888; margin-top: 12px; text-align: center;">

                    ☎️ یا با شماره <strong style="color: #fff;">۰۲۱-۱۲۳۴-۵۶۷۸</strong> تماس بگیرید

                </p>

            </div>

        </div>

    </div>

</section>