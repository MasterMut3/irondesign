<?php
/**
 * Enqueue Scripts & Styles
 *
 * @package IronDesign
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue Theme Assets
 */

function irondesign_enqueue_assets()
{

    /**
     * Main Stylesheet
     */

    wp_enqueue_style(
        'irondesign-style',
        get_stylesheet_uri(),
        array(),
        IRONDESIGN_VERSION
    );

    /**
     * Theme Styles
     */

    wp_enqueue_style(
        'irondesign-theme',
        IRONDESIGN_URI . '/assets/css/theme.css',
        array('irondesign-style'),
        IRONDESIGN_VERSION
    );

    /**
     * WooCommerce Styles (ADD THIS!)
     */

    // Check if WooCommerce is active
    if ( class_exists( 'WooCommerce' ) ) {
        wp_enqueue_style(
            'irondesign-woocommerce',
            IRONDESIGN_URI . '/assets/css/woocommerce.css',
            array('irondesign-theme'),
            IRONDESIGN_VERSION . '.' . time(), // Force reload during development
            'all'
        );
    }

    /**
     * Google Fonts
     * (Replace later with local fonts if desired)
     */

    wp_enqueue_style(
        'irondesign-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap',
        array(),
        null
    );

    /**
     * Main JavaScript
     */

    wp_enqueue_script(
        'irondesign-theme',
        IRONDESIGN_URI . '/assets/js/theme.js',
        array(),
        IRONDESIGN_VERSION,
        true
    );

    /**
     * Pass PHP variables to JS
     */

    wp_localize_script(
        'irondesign-theme',
        'IronDesignData',
        array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'homeUrl' => home_url('/'),
            'themeUrl' => IRONDESIGN_URI,
            'isLoggedIn' => is_user_logged_in(),
            'nonce' => wp_create_nonce('irondesign_nonce'),
        )
    );

    /**
     * Threaded Comments
     */

    if (
        is_singular() &&
        comments_open() &&
        get_option('thread_comments')
    ) {

        wp_enqueue_script(
            'comment-reply'
        );

    }

}

add_action(
    'wp_enqueue_scripts',
    'irondesign_enqueue_assets'
);

/**
 * Preconnect for Google Fonts
 */

function irondesign_resource_hints($urls, $relation_type)
{

    if ($relation_type === 'preconnect') {

        $urls[] = array(

            'href' => 'https://fonts.gstatic.com',

            'crossorigin',

        );

    }

    return $urls;

}

add_filter(
    'wp_resource_hints',
    'irondesign_resource_hints',
    10,
    2
);