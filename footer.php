<?php
/**
 * Footer
 *
 * @package IronDesign
 */
?>

<footer class="site-footer">

    <div class="container">

        <div class="footer-wrapper glass-card">

            <div class="footer-grid-compact">

                <!-- Brand Info -->
                <div class="footer-column">

                    <div class="footer-logo">
                        IronDesign
                    </div>

                    <p class="footer-description">
                        اعتمادی از جنس آهن. تلفیق هنر آهن‌گری و ظرافت چوب.
                    </p>

                    <div class="footer-social-compact">
                        <a href="#" aria-label="Instagram">اینستاگرام</a>
                        <a href="#" aria-label="Telegram">تلگرام</a>
                        <a href="#" aria-label="WhatsApp">واتساپ</a>
                    </div>

                </div>

                <!-- Quick Links -->
                <div class="footer-column">

                    <h4>دسترسی سریع</h4>

                    <ul class="footer-menu">

                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">صفحه اصلی</a></li>

                        <li><a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">محصولات</a></li>

                        <li><a href="<?php echo esc_url( home_url( '/custom-order/' ) ); ?>">سفارش اختصاصی</a></li>

                        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">درباره ما</a></li>

                    </ul>

                </div>

                <!-- Support -->
                <div class="footer-column">

                    <h4>پشتیبانی</h4>

                    <ul class="footer-menu">

                        <li><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">سوالات متداول</a></li>

                        <li><a href="<?php echo esc_url( home_url( '/shipping/' ) ); ?>">نحوه ارسال</a></li>

                        <li><a href="<?php echo esc_url( home_url( '/returns/' ) ); ?>">بازگشت کالا</a></li>

                        <li><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">حریم خصوصی</a></li>

                    </ul>

                </div>

                <!-- Contact -->
                <div class="footer-column">

                    <h4>ارتباط با ما</h4>

                    <ul class="footer-info">

                        <li>📞 <a href="tel:+982112345678">۰۲۱-۱۲۳۴-۵۶۷۸</a></li>

                        <li>📧 <a href="mailto:info@irondesign.ir">info@irondesign.ir</a></li>

                        <li>📍 تهران، ایران</li>

                    </ul>

                </div>

            </div>

            <div class="footer-bottom">

                <p>
                    © <?php echo date('Y'); ?> IronDesign.
                    تمامی حقوق محفوظ است.
                </p>

            </div>

        </div>

    </div>

</footer>

<?php wp_footer(); ?>

</body>
</html>