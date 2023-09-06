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

    <!-- Top Title Section -->
    <div class="row mb-4">
        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 ppo-bg-secondary">
            <h3 class="text-light fs-5 fw-bold text-center">Kontakt Os</h3>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="row mb-4 ppo-bg-card">
        <p class="text-white fs-5 pt-3 pb-2">
			<?php ppo_text_content_generator_from_customizer("contact_form_content_block"); ?>
        </p>

		<?php ppo_shortcode_form_generator_from_customizer("contact_form_shortcode_block"); ?>

	</div>

    <!-- /SEO Content -->
    <?php ppo_seo_content_embeded(); ?>

</article><!-- #post-<?php the_ID(); ?> -->