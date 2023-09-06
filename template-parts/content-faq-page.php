<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:100%; max-width: 600px; margin: 0 auto; padding: 0 1rem 1rem;">

    <div class="row mb-3">
        <div style="padding-top: 2.5rem; margin-top:-1.5rem;" style="ppo-bg-card">
            <img src="<?php echo ppo_get_dir('/assets/images/faq/banner.png') ?>" class="d-block w-100" />
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="row mb-4 ppo-br-16 ppo-bg-secondary">
        <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
            <h3 class="text-light fs-5 fw-bold">Ofte stillede spørgsmål</h3>
        </div>

        <div class="ppo-profile-section-content pt-3">

            <!-- Home FAQ section -->
            <?php get_template_part('template-parts/partials/content', 'faq-all'); ?>

            <!-- Button -->
            <div class="row mb-4 justify-content-center">
                <button class="btn ppo-box-shadow ppo-br-16 py-1 px-5 ppo-bg-primary w-auto">
                    <span class="text-light fs-5 fw-bold">Flere spørgsmål</span>
                </button>
            </div>
        </div>
    </div>

    <!-- /SEO Content -->
    <?php ppo_seo_content_embeded(); ?>

</article><!-- #post-<?php the_ID(); ?> -->