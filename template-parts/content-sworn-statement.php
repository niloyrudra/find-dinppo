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
            <?php the_title('<h3 class="text-light fs-4 fw-bold text-center mb-0 py-2">', '</h3>'); ?>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="row mb-4 p-3 ppo-bg-card">

        <div class="text-white">
            <?php the_content(); ?>
        </div>

    </div>


</article><!-- #post-<?php the_ID(); ?> -->