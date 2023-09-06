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
            <h3 class="text-light fs-5 fw-bold text-center">Velkommen til Find Din PPO</h3>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="row d-flex flex-column mb-4 p-3 justify-content-center align-items-center ppo-bg-card">

        <p class="d-flex justify-content-center align-items-center text-white fw-bold fs-4 my-3 align-middle">
            <img src="<?php echo ppo_get_dir("/assets/images/checked-icons/check-box.png"); ?>" style="width:40px;" class="me-1" /> Din registrering er nu næsten fuldført
        </p>
        <p class="text-white text-center fs-5">
            I løbet af få minutter vil du modtage en e-mail, med et link der vil aktivere din konto.
        </p>

        <div class="text-center">
            <?php
            if (has_custom_logo()) the_custom_logo();
            ?>
        </div>

    </div>

    <!-- /SEO Content -->
    <?php ppo_seo_content_embeded(); ?>

</article><!-- #post-<?php the_ID(); ?> -->