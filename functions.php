<?php
/**
 * IronDesign Theme
 *
 * @package IronDesign
 */

if (!defined('ABSPATH')) {
    exit;
}

define('IRONDESIGN_VERSION', '1.0.0');
define('IRONDESIGN_PATH', get_template_directory());
define('IRONDESIGN_URI', get_template_directory_uri());

require_once IRONDESIGN_PATH . '/inc/setup.php';
require_once IRONDESIGN_PATH . '/inc/enqueue.php';
require_once IRONDESIGN_PATH . '/inc/helpers.php';
require_once IRONDESIGN_PATH . '/inc/customizer.php';
