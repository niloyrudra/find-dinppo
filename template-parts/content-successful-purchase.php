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
    <div class="row mb-4 ppo-br-16 ppo-bg-secondary">
        <div class="ppo-br-16 ppo-box-shadow ppo-bg-primary">
            <?php the_title('<h3 class="text-light fs-4 fw-bold text-center mb-0 py-2">', '</h3>'); ?>
        </div>

        <div class="my-3 px-4 py-2">

            <div class="text-center mb-2">
                <img src="<?php echo ppo_get_dir("/assets/images/emoji.png"); ?>" style="width:12rem;" />
            </div>
            <style>
                .ppo-successful-purchase-details p {
                    margin-bottom: 0.5rem;
                }
            </style>
            <div class="ppo-successful-purchase-details text-white">
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