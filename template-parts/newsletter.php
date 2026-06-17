<?php
/**
 * Newsletter Section
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

                    Stay Connected

                </span>

                <h2 class="section-title">

                    Join the IronDesign Community

                </h2>

                <p class="section-subtitle">

                    Subscribe to receive exclusive offers, early access to new
                    collections, product launches, and style inspiration.

                </p>

            </div>

            <div class="newsletter-form">

                <form
                    action="#"
                    method="post"
                    class="irondesign-newsletter-form">

                    <label class="screen-reader-text" for="newsletter-email">

                        <?php esc_html_e( 'Email Address', 'irondesign' ); ?>

                    </label>

                    <input
                        id="newsletter-email"
                        type="email"
                        name="email"
                        placeholder="<?php esc_attr_e( 'Enter your email address', 'irondesign' ); ?>"
                        required>

                    <button
                        class="btn btn-primary"
                        type="submit">

                        <?php esc_html_e( 'Subscribe', 'irondesign' ); ?>

                    </button>

                </form>

            </div>

        </div>

    </div>

</section>