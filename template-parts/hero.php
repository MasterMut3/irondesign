<?php
/**
 * Hero Section
 *
 * @package IronDesign
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shop_url = class_exists( 'WooCommerce' )
	? get_permalink( wc_get_page_id( 'shop' ) )
	: home_url( '/' );

$new_url = class_exists( 'WooCommerce' )
	? add_query_arg(
		array(
			'orderby' => 'date',
		),
		$shop_url
	)
	: home_url( '/' );

?>

<section class="hero">

    <div class="hero-background">

        <?php

        if ( has_post_thumbnail() ) {

            the_post_thumbnail(
                'full',
                array(
                    'loading' => 'eager',
                    'fetchpriority' => 'high'
                )
            );

        }

        ?>

    </div>

    <div class="container">

        <div class="hero-content fade-up">

            <span class="hero-subtitle glass">

                Premium Fashion Experience

            </span>

            <h1 class="hero-title">

                Elevate Your Style

                <br>

                With

                <span class="gradient-text">

                    IronDesign

                </span>

            </h1>

            <p class="hero-description">

                Modern clothing, premium quality and a shopping experience
                designed for people who appreciate minimal design and
                exceptional craftsmanship.

            </p>

            <div class="hero-actions">

                <a
                    href="<?php echo esc_url( $shop_url ); ?>"
                    class="btn btn-primary">

                    Shop Now

                </a>

                <a
                    href="<?php echo esc_url( $new_url ); ?>"
                    class="btn btn-glass">

                    New Arrivals

                </a>

            </div>

            <div class="hero-stats mt-5">

                <div class="glass-card hero-stat">

                    <h2 data-counter="1500">

                        0

                    </h2>

                    <p>

                        Premium Products

                    </p>

                </div>

                <div class="glass-card hero-stat">

                    <h2 data-counter="25000">

                        0

                    </h2>

                    <p>

                        Happy Customers

                    </p>

                </div>

                <div class="glass-card hero-stat">

                    <h2 data-counter="120">

                        0

                    </h2>

                    <p>

                        Brand Partners

                    </p>

                </div>

            </div>

        </div>

        <div class="hero-videos fade-up">

            <div class="hero-video-column">

                <article class="hero-video glass-card">

                    <img
                        src="<?php echo esc_url( IRONDESIGN_URI . '/assets/images/hero-small-1.jpg' ); ?>"
                        alt="Fashion">

                    <div class="video-caption">

                        <h3>

                            Summer Collection

                        </h3>

                    </div>

                </article>

                <article class="hero-video glass-card">

                    <img
                        src="<?php echo esc_url( IRONDESIGN_URI . '/assets/images/hero-small-2.jpg' ); ?>"
                        alt="Streetwear">

                    <div class="video-caption">

                        <h3>

                            Street Wear

                        </h3>

                    </div>

                </article>

            </div>

            <article class="hero-video large glass-card">

                <img
                    src="<?php echo esc_url( IRONDESIGN_URI . '/assets/images/hero-large.jpg' ); ?>"
                    alt="IronDesign">

                <div class="video-caption">

                    <h2>

                        New Collection

                    </h2>

                    <p>

                        Discover premium fashion.

                    </p>

                </div>

                <div class="video-play">

                    ▶

                </div>

            </article>

        </div>

    </div>

    <div class="scroll-indicator">

        <span></span>

    </div>

</section>