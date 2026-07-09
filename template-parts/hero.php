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

                اعتمادی از جنس آهن

            </span>

            <h1 class="hero-title">

                هنر آهن
                <br>
                در
                <span class="gradient-text">

                    طراحی چوب

                </span>

            </h1>

            <p class="hero-description">

                ترکیبی از استحکام آهن و گرمای چوب در محصولاتی منحصربه‌فرد. 
                از مبلمان صنعتی تا اکسسوری‌های دکوراتیو، هر قطعه با عشق و 
                دقت، توسط هنرمندان IronDesign خلق شده است.

            </p>

            <div class="hero-actions">

    <a
        href="<?php echo esc_url( $shop_url ); ?>"
        class="btn btn-primary">

        مشاهده محصولات

    </a>

    <a
        href="<?php echo esc_url( home_url( '/custom-order/' ) ); ?>"
        class="btn btn-glass">

        ثبت سفارش

    </a>

</div>

            <div class="hero-stats mt-5">

                <div class="glass-card hero-stat">

                    <h2 data-counter="1500">

                        0

                    </h2>

                    <p>

                        محصولات منحصربه‌فرد

                    </p>

                </div>

                <div class="glass-card hero-stat">

                    <h2 data-counter="25000">

                        0

                    </h2>

                    <p>

                        مشتریان راضی

                    </p>

                </div>

                <div class="glass-card hero-stat">

                    <h2 data-counter="120">

                        0

                    </h2>

                    <p>

                        همکاران حرفه‌ای

                    </p>

                </div>

            </div>

        </div>

        <div class="hero-videos fade-up">

            <div class="hero-video-column">

                <article class="hero-video glass-card">

                    <img
                        src="<?php echo esc_url( IRONDESIGN_URI . '/assets/images/hero-small-1.jpg' ); ?>"
                        alt="مبل آهنی و چوبی صنعتی">

                    <div class="video-caption">

                        <h3>

                            مجموعه صنعتی

                        </h3>

                    </div>

                </article>

                <article class="hero-video glass-card">

                    <img
                        src="<?php echo esc_url( IRONDESIGN_URI . '/assets/images/hero-small-2.jpg' ); ?>"
                        alt="اکسسوری چوبی و آهنی دکوراتیو">

                    <div class="video-caption">

                        <h3>

                            دکوراسیون داخلی

                        </h3>

                    </div>

                </article>

            </div>

            <article class="hero-video large glass-card">

                <img
                    src="<?php echo esc_url( IRONDESIGN_URI . '/assets/images/hero-large.jpg' ); ?>"
                    alt="IronDesign | ترکیب آهن و چوب در هنر صنایع دستی">

                <div class="video-caption">

                    <h2>

                        کلکسیون بهاری

                    </h2>

                    <p>

                        تلفیق استحکام و زیبایی

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