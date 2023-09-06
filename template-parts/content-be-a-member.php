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
        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 ppo-bg-card">
            <h3 class="text-light fs-4 fw-bold text-center">Abonneomenter</h3>
        </div>
    </div>

    <!-- FREE PLAN Section -->
    <div class="row mb-4 ppo-br-16 ppo-bg-card">
        <div class="pt-4 ppo-br-16" style="background-color:rgb(3,3,4);"></div>

        <div class="d-flex justify-content-center align-content-center my-3 px-3 py-2 flex-column">

            <div class="mt-2 mb-4 text-center flex-column">

                <div class="d-flex justify-content-center align-content-center mb-3">
                    <img src="<?php echo ppo_get_dir("/assets/images/member-stars/star-black.png"); ?>" style="width:45px;height:45px;margin-right:1rem;" />
                    <h2 class="text-light fw-bold">Gratis</h2>
                </div>

                <h2 class="text-light fw-bold">Ingen omkostninger</h2>
                <h4 class="text-light">Meget nedsat funktioner</h4>
            </div>

            <a href="<?php echo esc_url(home_url("/subscription/?plan=gratis")); ?>" class="btn text-light fw-bold fs-4 w-100 ppo-b2-light ppo-br-16 ppo-bg-primary">Læs mere</a>

        </div>

    </div>

    <!-- BASIC PLAN Section -->
    <div class="row mb-4 ppo-br-16 ppo-bg-card">
        <div class="pt-4 ppo-br-16" style="background-color:#00ff01;/*rgb(101, 179, 46)*/"></div>

        <div class="d-flex justify-content-center align-content-center my-3 px-3 py-2 flex-column">

            <div class="mt-2 mb-4 text-center flex-column">

                <div class="d-flex justify-content-center align-content-center mb-3">
                    <img src="<?php echo ppo_get_dir("/assets/images/member-stars/star-green.png"); ?>" style="width:45px;height:45px;margin-right:1rem;" />
                    <h2 class="text-light fw-bold">Basic</h2>
                </div>

                <h2 class="text-light fw-bold">15 Kr / Måned</h2>
                <h4 class="text-light">180 Kr / Årlig</h4>
            </div>

            <a href="<?php echo esc_url(home_url("/subscription/?plan=basic")); ?>" class="btn text-light fw-bold fs-4 w-100 ppo-b2-light ppo-br-16 ppo-bg-primary">Læs mere</a>

        </div>

    </div>

    <!-- STARTER PLAN Section -->
    <div class="row mb-4 ppo-br-16 ppo-bg-card">
        <div class="pt-4 ppo-br-16" style="background-color:rgb(254, 206, 21);"></div>

        <div class="d-flex justify-content-center align-content-center my-3 px-3 py-2 flex-column">

            <div class="mt-2 mb-4 text-center flex-column">

                <div class="d-flex justify-content-center align-content-center mb-3">
                    <img src="<?php echo ppo_get_dir("/assets/images/member-stars/star-yellow.png"); ?>" style="width:45px;height:45px;margin-right:1rem;" />
                    <h2 class="text-light fw-bold">Starter</h2>
                </div>

                <h2 class="text-light fw-bold">20 Kr / Måned</h2>
                <h4 class="text-light">240 Kr / Årlig</h4>
            </div>

            <a href="<?php echo esc_url(home_url("/subscription/?plan=starter")); ?>" class="btn text-light fw-bold fs-4 w-100 ppo-b2-light ppo-br-16 ppo-bg-primary">Læs mere</a>

        </div>

    </div>

    <!-- MOST POPULAR PLAN Section -->
    <div class="row mb-4 ppo-br-16 ppo-bg-card">
        <div class="py-2 ppo-br-16" style="background-color:rgb(85, 195, 232);">
            <h1 class="text-light text-center fw-bold py-2 m-0">Mest Populær</h1>
        </div>

        <div class="d-flex justify-content-center align-content-center my-3 px-3 py-2 flex-column">

            <div class="mt-2 mb-4 text-center flex-column">

                <div class="d-flex justify-content-center align-content-center mb-3">
                    <img src="<?php echo ppo_get_dir("/assets/images/member-stars/star-light-blue.png"); ?>" style="width:45px;height:45px;margin-right:1rem;" />
                    <h2 class="text-light fw-bold">Pro</h2>
                </div>

                <h2 class="text-light fw-bold">35 Kr / Måned</h2>
                <h4 class="text-light">420 Kr / Årlig</h4>
            </div>

            <a href="<?php echo esc_url(home_url("/subscription/?plan=pro")); ?>" class="btn text-light fw-bold fs-4 w-100 ppo-b2-light ppo-br-16 ppo-bg-red">Læs mere</a>

        </div>

    </div>

    <!-- PREMIUM PLAN Section -->
    <div class="row mb-4 ppo-br-16 ppo-bg-card">
        <div class="pt-4 ppo-br-16" style="background-color:rgb( 60, 67, 163);"></div>

        <div class="d-flex justify-content-center align-content-center my-3 px-3 py-2 flex-column">

            <div class="mt-2 mb-4 text-center flex-column">

                <div class="d-flex justify-content-center align-content-center mb-3">
                    <img src="<?php echo ppo_get_dir("/assets/images/member-stars/premium.png"); ?>" style="width:45px;height:45px;margin-right:1rem;" />
                    <h2 class="text-light fw-bold">Premium</h2>
                </div>

                <h2 class="text-light fw-bold">45 Kr / Måned</h2>
                <h4 class="text-light">540 Kr / Årlig</h4>
            </div>

            <a href="<?php echo esc_url(home_url("/subscription/?plan=premium")); ?>" class="btn text-light fw-bold fs-4 w-100 ppo-b2-light ppo-br-16 ppo-bg-red">Læs mere</a>

        </div>

    </div>


    </div>

</article><!-- #post-<?php the_ID(); ?> -->