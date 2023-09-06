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
            <h3 class="text-light fs-5 fw-bold text-center">Velkommen til Find Din PPO familien</h3>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="row d-flex flex-column mb-4 p-3 justify-content-center align-items-center ppo-bg-card">

        <div class="d-flex justify-content-center align-items-center my-3">
            <img src="<?php echo ppo_get_dir("/assets/images/checked-icons/check.png"); ?>" style="width:50px;" class="me-2" />
            <p class="text-white fw-bold fs-4 mb-0">Din email er nu blevet verificeret.<br />Tryk nedenfor, for at gå til log ind side!</p>
        </div>

        <a href="<?php echo esc_url(home_url("/log-ind-som-ppo/")); ?>" class="btn w-100 fw-bold fs-5 text-light ppo-br-16 ppo-box-shadow ppo-b2-light mb-5 mt-2 ppo-bg-primary" type="submit">Log ind</a>

        <div class="text-center">
            <?php
            if (has_custom_logo()) the_custom_logo();
            ?>
        </div>

    </div>

    <!-- /SEO Content -->
    <?php ppo_seo_content_embeded(); ?>

</article><!-- #post-<?php the_ID(); ?> -->