<?php
/**
 * Template Name: Coming Soon
 * 
 * @package IronDesign
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <!-- Full Page Hero -->
    <section class="coming-soon-hero">
        
        <!-- Background Image -->
        <div class="coming-soon-bg" style="background-image:url('<?php 
            // Get background from custom field or use default
            $bg_image = get_post_meta(get_the_ID(), 'coming_soon_bg', true);
            if (empty($bg_image)) {
                $bg_image = get_template_directory_uri() . '/assets/images/coming-soon-bg.jpg';
            }
            echo esc_url($bg_image);
        ?>');">
        </div>
        
        <!-- Glass Overlay -->
        <div class="coming-soon-glass"></div>
        
        <!-- Content -->
        <div class="coming-soon-content">
            
            <!-- Badge -->
            <span class="coming-soon-badge"><?php _e('به زودی', 'irondesign'); ?></span>
            
            <!-- Title -->
            <h1 class="coming-soon-title">
                <?php 
                    $title = get_post_meta(get_the_ID(), 'coming_soon_title', true);
                    echo empty($title) ? __('در حال راه‌اندازی', 'irondesign') : esc_html($title);
                ?>
            </h1>
            
            <!-- Description -->
            <p class="coming-soon-desc">
                <?php 
                    $desc = get_post_meta(get_the_ID(), 'coming_soon_desc', true);
                    echo empty($desc) ? __('ما در حال طراحی بهترین تجربه برای شما هستیم', 'irondesign') : esc_html($desc);
                ?>
            </p>
            
            <!-- Divider -->
            <div class="coming-soon-divider"></div>
            
            <!-- Sub Text -->
            <p class="coming-soon-sub">
                <?php 
                    $sub = get_post_meta(get_the_ID(), 'coming_soon_sub', true);
                    echo empty($sub) ? __('به زودی بازمی‌گردیم', 'irondesign') : esc_html($sub);
                ?>
            </p>
            
        </div>
        
    </section>

</main>

<?php
get_footer();