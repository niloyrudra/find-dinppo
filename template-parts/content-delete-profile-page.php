<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:100%; max-width: 600px; margin: 0 auto; padding: 1rem;">

    <!-- Top Title Section -->
    <div class="row mb-4 ppo-br-16 ppo-bg-card">
        <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary mb-3">
            <?php the_title('<h3 class="text-light fs-4 fw-bold text-center">', '</h3>'); ?>
        </div>

        <div class="mb-3 px-4">

            <div class="text-center mb-4">
                <img src="<?php echo ppo_get_dir("/assets/images/crying.png"); ?>" style="width:10rem;" />
            </div>
            <style>
                .entry-content p {
                    margin-bottom: 0.5rem;
                }
            </style>
            <div class="ppo-entry-content text-white">
                <?php the_content(); ?>
            </div>
        </div>

        <div class="row mb-4 text-center">
            <?php
            if (function_exists('the_custom_logo')) the_custom_logo();
            ?>
        </div>

    </div>


</article><!-- #post-<?php the_ID(); ?> -->