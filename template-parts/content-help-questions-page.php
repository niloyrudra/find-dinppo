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
        <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
            <?php the_title('<h3 class="text-light fs-4 fw-bold text-center">', '</h3>'); ?>
        </div>

        <div class="py-5 text-center">
            <button class="btn text-white fw-bold fs-4 ppo-br-12 ppo-b2-light ppo-bg-primary mb-3 w-75">Problemer med konto</button>
            <button class="btn text-white fw-bold fs-4 ppo-br-12 ppo-b2-light ppo-bg-primary mb-3 w-75">Problemer med faktura</button>
            <button class="btn text-white fw-bold fs-4 ppo-br-12 ppo-b2-light ppo-bg-primary mb-3 w-75">Se og lær af vedeoer</button>
        </div>

    </div>


</article><!-- #post-<?php the_ID(); ?> -->