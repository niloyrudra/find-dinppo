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
            <h3 class="text-light fs-5 fw-bold text-center">Tilmeldning</h3>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="row mb-4 py-3 ppo-login-container ppo-bg-card">

        <div class="col">
            <div class="d-flex flex-column h-100 py-3 px-2">

                <a href="<?php echo esc_url(home_url("/opret-konto-som-burger/")); ?>" class="d-flex flex-column btn ppo-b2-light align-items-center justify-content-center ppo-br-12 ppo-login-button p-3 mb-3 ppo-box-shadow position-relative overflow-hidden" style="min-height:150px;background-color:rgba(0,0,0,0.5);z-index:1;">
                    <img src="<?php echo ppo_get_dir("/assets/images/bg-img-signup.jpg"); ?>" class="position-absolute w-100 h-100" style="z-index:-1;opacity:0.67" />

                    <div class="btn ppo-box-shadow mb-3 text-light ppo-b2-light fw-bold ppo-br-12 ppo-bg-primary">Tilmeld</div>
                    <h3 class="text-light fs-5 fw-bold">Som almindelig bruger</h3>
                </a>

                <div class="d-flex flex-column h-100 justify-content-between">
                    <div class="">
                        <h4 class="text-light fs-5 fw-bold">Allerede medlem? Log ind herunder.</h4>
                        <p class="text-light">(Pga. hensyn for de Private pasningsordninger, kan vi desværre ikke dele tlf, mail mm. medmindre du har en konto.)</p>
                    </div>

                    <div class="text-center">
                        <a href="<?php echo esc_url(home_url("/log-ind/")); ?>" class="btn w-75 text-light ppo-b2-light ppo-br-16 fw-bold ppo-box-shadow ppo-bg-primary">Log ind</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="col">
            <div class="d-flex flex-column h-100 py-3 px-2">

                <a href="<?php echo esc_url(home_url("/opret-konto-som-ppo/")); ?>" class="d-flex flex-column btn ppo-b2-light align-items-center justify-content-center ppo-br-12 ppo-login-button p-3 mb-3 ppo-box-shadow position-relative overflow-hidden" style="min-height:150px;background-color:rgba(0,0,0,0.5);z-index:1;">
                    <img src="<?php echo ppo_get_dir("/assets/images/bg-img-signup.jpg"); ?>" class="position-absolute w-100 h-100" style="z-index:-1;opacity:0.67" />

                    <div class="btn ppo-box-shadow mb-3 text-light fw-bold ppo-box-shadow mb-2 ppo-b2-light ppo-br-12 ppo-bg-primary">Tilmeld</div>
                    <h3 class="text-light fs-5 fw-bold">Som Privat Pasningsordning</h3>
                </a>

                <div class="d-flex flex-column h-100 justify-content-between">
                    <div>
                        <h4 class="text-light fs-5 fw-bold">Allerede medlem? Log ind som PPO herunder.</h4>
                        <p class="text-light">(Vi gør opmærksomt på at du skal udfylde en tro og love erklaering, da vi ikke vil have falske profiler på vores side, og vi vil tjekke op på det med myndighederne.)</p>
                    </div>

                    <div class="text-center">
                        <a href="<?php echo esc_url(home_url("/log-ind/")); ?>" class="btn w-75 text-light fw-bold ppo-b2-light ppo-br-16 ppo-box-shadow ppo-bg-primary">Log ind som PPO</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- /SEO Content -->
    <?php ppo_seo_content_embeded(); ?>

</article><!-- #post-<?php the_ID(); ?> -->