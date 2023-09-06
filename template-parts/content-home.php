<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */
$user = wp_get_current_user();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:100%; max-width: 600px; margin: 0 auto; padding: 1rem;">

    <!-- Home Top Section -->
    <div class="row mb-4 p-3 align-content-center justify-content-between ppo-box-shadow ppo-br-16 ppo-bg-card">
        <div class="col text-center">
            <div class="text-center">
                <img src="<?php echo ppo_get_dir('/assets/images/home/Billede2.png') ?>" style="width:3.6rem;" />
                <p class="mb-0 pt-2 text-light fw-bold">Søg</p>
            </div>
        </div>
        <div class="col text-center">
            <div class="text-center">
                <img src="<?php echo ppo_get_dir('/assets/images/home/Billede5.png') ?>" style="width:3.6rem;" />
                <p class="mb-0 pt-2 text-light fw-bold">Mød</p>
            </div>
        </div>
        <div class="col text-center">
            <div class="text-center">
                <img src="<?php echo ppo_get_dir('/assets/images/home/Billede6.png') ?>" style="width:3.6rem;" />
                <p class="mb-0 pt-2 text-light fw-bold">Aftal</p>
            </div>
        </div>
    </div>

    <!-- Home Top Section -->
    <div class="row mb-4 ppo-br-16 shadow bg-white">

        <div class="ppo-profile-section-content p-3">

            <?php if (get_theme_mod('home_top_text_section')) : ?>
                <?php echo get_theme_mod('home_top_text_section'); ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Home Second Section -->
    <div class="row mb-4 p-3 justify-content-between ppo-br-16 ppo-box-shadow ppo-bg-card">

        <div class="col text-center">
            <div class="text-center">
                <img src="<?php echo ppo_get_dir('/assets/images/home/quality.png') ?>" style="width:3.6rem;" />
                <p class="mb-0 pt-2 text-light fw-bold">Godkendte PPO'er</p>
            </div>
        </div>
        <div class="col text-center">
            <div class="text-center">
                <img src="<?php echo ppo_get_dir('/assets/images/home/safety.png') ?>" style="width:3.6rem;" />
                <p class="mb-0 pt-2 text-light fw-bold">Trygt</p>
            </div>
        </div>
        <div class="col text-center">
            <div class="text-center">
                <img src="<?php echo ppo_get_dir('/assets/images/home/customer-support.png') ?>" style="width:3.6rem;" />
                <p class="mb-0 pt-2 text-light fw-bold">24/7 Support</p>
            </div>
        </div>
    </div>

    <!-- Home Second Section -->
    <div class="row mb-4 ppo-br-16 shadow bg-white">

        <div class="ppo-profile-section-content p-3">
            <?php if (get_theme_mod('home_second_text_section')) : ?>
                <?php echo get_theme_mod('home_second_text_section'); ?>
            <?php endif; ?>
        </div>
    </div>


    <!-- Home Premium Home-care List Title -->
    <div class="row mb-4 justify-content-center">
        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 ppo-section-header w-auto d-inline-flex- ppo-bg-secondary">
            <h3 class="text-light fs-5 fw-bold">Premium PPO'er</h3>
        </div>
    </div>

    <!-- Keywords -->
    <!-- Get Premium Daycare list -->
    <?php ppo_get_premium_daycare_carousel(); ?>


    <!-- Home Frequently Asked Questions -->
    <div class="row mb-4 justify-content-center">
        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 ppo-section-header w-auto d-inline-flex- ppo-bg-secondary">
            <h3 class="text-light fs-5 fw-bold">Ofte stillede spørgsmål</h3>
        </div>
    </div>

    <!-- Home FAQ section -->
    <?php get_template_part('template-parts/partials/content', 'faq'); ?>

    <!-- Home More Questions -->
    <div class="row mb-4 justify-content-center">
        <a href="<?php echo esc_url(home_url("/faq/")); ?>" class="btn ppo-box-shadow ppo-br-16 py-2 px-5 ppo-section-header w-auto d-inline-flex- ppo-bg-secondary text-decoration-none" rel="link">
            <h3 class="text-light fs-5 fw-bold m-0">Flere spørgsmål</h3>
        </a>
    </div>

    <!-- /SEO Content -->
    <?php ppo_seo_content_embeded(); ?>

</article><!-- #post-<?php the_ID(); ?> -->