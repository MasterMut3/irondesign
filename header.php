<?php
/**
 * Header
 *
 * @package IronDesign
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <meta
        name="theme-color"
        content="#090909">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header id="site-header" class="site-header">

    <div class="header-backdrop"></div>

    <div class="container">

        <div class="header-inner">

            <!-- Mobile -->

            <button
                class="mobile-toggle"
                aria-label="<?php esc_attr_e( 'Open Menu', 'irondesign' ); ?>">

                <span></span>
                <span></span>
                <span></span>

            </button>

            <!-- Logo -->

            <div class="site-logo">

                <?php
                if ( has_custom_logo() ) {

                    the_custom_logo();

                } else {
                    ?>

                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">

                        <h1><?php bloginfo( 'name' ); ?></h1>

                    </a>

                    <?php
                }
                ?>

            </div>

            <!-- Navigation -->

            <nav
                id="primary-navigation"
                class="primary-navigation">

                <?php

                wp_nav_menu(
                    array(

                        'theme_location' => 'primary',

                        'container' => false,

                        'menu_class' => 'primary-menu',

                        'fallback_cb' => false,

                    )
                );

                ?>

            </nav>

            <!-- Actions -->

            <div class="header-actions">

                <!-- Search -->

                <a
                    class="header-icon"
                    href="<?php echo esc_url( home_url( '/' ) ); ?>">

                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">

                        <circle cx="9" cy="9" r="7"></circle>

                        <line x1="15" y1="15" x2="20" y2="20"></line>

                    </svg>

                </a>

                <!-- Account -->

                <a
                    class="header-icon"
                    href="<?php echo esc_url( wp_login_url() ); ?>">

                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">

                        <circle cx="10" cy="7" r="4"></circle>

                        <path d="M2 20c1.5-4 5-6 8-6s6.5 2 8 6"></path>

                    </svg>

                </a>

                <!-- Cart -->

                <a
                    class="header-icon cart-button"
                    href="<?php echo esc_url( wc_get_cart_url() ); ?>">

                    <svg width="21" height="21" fill="none" stroke="currentColor" stroke-width="2">

                        <circle cx="8" cy="19" r="1"></circle>

                        <circle cx="17" cy="19" r="1"></circle>

                        <path d="M2 2h2l2.5 11h10l2-8H6"></path>

                    </svg>

                    <span class="cart-count">

                        <?php
                        if ( class_exists( 'WooCommerce' ) ) {
                            echo esc_html( WC()->cart->get_cart_contents_count() );
                        } else {
                            echo '0';
                        }
                        ?>

                    </span>

                </a>

            </div>

        </div>

    </div>

</header>
