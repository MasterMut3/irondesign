<?php
/**
 * Template Name: About Us
 *
 * @package IronDesign
 */

get_header();
?>

<main id="primary" class="site-main">

    <div class="container">

        <!-- Page Header -->
        <div class="page-header glass-card">
            <div class="page-header-content">
                <span class="hero-subtitle glass"><?php esc_html_e('درباره ما', 'irondesign'); ?></span>
                <h1 class="page-title"><?php the_title(); ?></h1>
                <p class="page-subtitle">
                    <?php esc_html_e('تلفیق هنر آهن‌گری و ظرافت چوب', 'irondesign'); ?>
                </p>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content-wrapper glass-card">

            <?php
            while (have_posts()) :
                the_post();
                ?>

                <div class="page-content">
                    <?php the_content(); ?>
                </div>

            <?php endwhile; ?>

        </div>

        <!-- About Stats -->
        <div class="about-stats">
            <div class="stat-item glass-card">
                <span class="stat-number" data-counter="5">0</span>
                <span class="stat-label"><?php esc_html_e('سال تجربه', 'irondesign'); ?></span>
            </div>
            <div class="stat-item glass-card">
                <span class="stat-number" data-counter="200">0</span>
                <span class="stat-label"><?php esc_html_e('محصول', 'irondesign'); ?></span>
            </div>
            <div class="stat-item glass-card">
                <span class="stat-number" data-counter="500">0</span>
                <span class="stat-label"><?php esc_html_e('مشتری راضی', 'irondesign'); ?></span>
            </div>
            <div class="stat-item glass-card">
                <span class="stat-number" data-counter="100">0</span>
                <span class="stat-label"><?php esc_html_e('تخفیف ویژه', 'irondesign'); ?></span>
            </div>
        </div>

    </div>

</main>

<style>
.page-header {
    padding: 40px 50px;
    margin: 20px 0 40px;
    border-radius: 24px;
    text-align: center;
}

.page-header-content {
    max-width: 700px;
    margin: 0 auto;
}

.page-title {
    font-size: clamp(36px, 5vw, 52px);
    font-weight: 800;
    margin: 15px 0 10px;
    background: linear-gradient(135deg, #fff, #a78bfa);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.page-subtitle {
    color: var(--color-secondary);
    font-size: 18px;
}

.page-content-wrapper {
    padding: 45px 50px;
    margin: 30px 0;
    border-radius: 24px;
}

.page-content {
    color: var(--color-secondary);
    line-height: 2;
    font-size: 16px;
}

.page-content h2 {
    color: #fff;
    font-size: 28px;
    margin: 35px 0 15px;
}

.page-content h3 {
    color: #fff;
    font-size: 22px;
    margin: 25px 0 12px;
}

.page-content p {
    margin-bottom: 18px;
    color: var(--color-secondary);
}

.page-content ul {
    padding-right: 24px;
    margin: 20px 0;
}

.page-content ul li {
    margin-bottom: 10px;
    color: var(--color-secondary);
    list-style: none;
    padding-right: 8px;
}

.page-content blockquote {
    padding: 20px 30px;
    margin: 30px 0;
    border-right: 4px solid var(--color-accent);
    background: rgba(139, 92, 246, 0.08);
    border-radius: 12px;
    font-size: 20px;
    color: #fff;
}

.about-cta {
    display: flex;
    gap: 18px;
    margin-top: 30px;
    flex-wrap: wrap;
}

.about-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    margin: 40px 0;
}

.stat-item {
    padding: 30px 20px;
    border-radius: 20px;
    text-align: center;
}

.stat-number {
    font-size: clamp(32px, 4vw, 48px);
    font-weight: 800;
    background: linear-gradient(135deg, #fff, #a78bfa);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    display: block;
}

.stat-label {
    color: var(--color-secondary);
    font-size: 14px;
    margin-top: 8px;
    display: block;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header {
        padding: 30px 24px;
    }
    
    .page-content-wrapper {
        padding: 28px 20px;
    }
    
    .about-stats {
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }
    
    .about-cta {
        flex-direction: column;
    }
    
    .about-cta .btn {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .about-stats {
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }
    
    .stat-item {
        padding: 20px 14px;
    }
}
</style>

<?php
get_footer();