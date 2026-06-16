<?php
/**
 * Theme Setup
 *
 * @package IronDesign
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('irondesign_setup')) {

    function irondesign_setup()
    {

        load_theme_textdomain(
            'irondesign',
            get_template_directory() . '/languages'
        );

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        add_theme_support('custom-logo', array(
            'height'      => 120,
            'width'       => 300,
            'flex-width'  => true,
            'flex-height' => true,
        ));

        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        add_theme_support(
            'custom-background',
            array(
                'default-color' => '090909',
            )
        );

        add_theme_support(
            'custom-header',
            array(
                'width'  => 1920,
                'height' => 500,
                'flex-height' => true,
                'flex-width'  => true,
            )
        );

        add_theme_support('responsive-embeds');

        add_theme_support('align-wide');

        add_theme_support('wp-block-styles');

        add_theme_support('editor-styles');

        add_editor_style('assets/css/editor.css');

        add_theme_support('automatic-feed-links');

        add_theme_support('woocommerce');

        add_theme_support(
            'wc-product-gallery-zoom'
        );

        add_theme_support(
            'wc-product-gallery-lightbox'
        );

        add_theme_support(
            'wc-product-gallery-slider'
        );

        register_nav_menus(
            array(

                'primary' => __('Primary Menu', 'irondesign'),

                'secondary' => __('Secondary Menu', 'irondesign'),

                'footer' => __('Footer Menu', 'irondesign'),

                'mobile' => __('Mobile Menu', 'irondesign'),

            )
        );

        add_image_size(
            'irondesign-product',
            700,
            900,
            true
        );

        add_image_size(
            'irondesign-category',
            900,
            700,
            true
        );

        add_image_size(
            'irondesign-banner',
            1920,
            900,
            true
        );

    }

}

add_action(
    'after_setup_theme',
    'irondesign_setup'
);

/**
 * Content Width
 */

function irondesign_content_width()
{

    $GLOBALS['content_width'] = apply_filters(
        'irondesign_content_width',
        1200
    );

}

add_action(
    'after_setup_theme',
    'irondesign_content_width',
    0
);
