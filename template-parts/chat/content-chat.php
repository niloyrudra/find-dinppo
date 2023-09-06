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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="max-width: 600px; margin: 0 auto;">

    <!-- Plan Badge Section -->
    <div class="row mt-5 mb-3 justify-content-center">
        <div class="position-relative w-75 ppo-badge-container ppo-b2-red ppo-br-16 px-3 pt-5 pb-3 justify-content-center ppo-bg-primary">
            <!-- Badge Icon -->
            <div class="ppo-premium-badge-icon-wrapper">
                <img src="<?php echo ppo_get_dir('/assets/images/badge/premium-badge.png') ?>" style="width:80px;" />
            </div>

            <!-- Button -->
            <a href="<?php echo esc_url(home_url("/be-a-member/")); ?>" class="btn py-1 w-100 ppo-br-16 ppo-bg-red ppo-b2-red ppo-box-shadow">
                <span class="text-light fs-5 fw-bold ml-4 mb-2">
                    Bliv medlem nu
                </span>
            </a>

        </div>
    </div>

    <!-- Plan Type -->
    <div class="row mb-3 justify-content-center">
        <div class="ppo-br-16 py-2 px-5 w-auto ppo-bg-secondary">
            <h3 class="text-light fs-4 fw-bold mb-0">Dit abonnement: <img src="<?php echo ppo_get_dir("/assets/images/member-stars/star-black.png") ?>" style="width: 30px;" /> Gratis</h3>
        </div>
    </div>

    <!-- Top First Action Button -->
    <div class="row mb-4 justify-content-center">
        <div class="ppo-br-16 py-2 px-5 w-50 ppo-bg-secondary">
            <h3 class="text-light fs-4 fw-bold mb-0 text-center">Udløber: Aldrig</h3>
        </div>
    </div>

    <!-- Plan Tabs Section -->
    <div class="row mb-5 px-3 py-2 justify-content-center ppo-br-20 ppo-bg-tab-section">

        <h1 class="fs-1 fw-bold text-light mb-1 text-center text-capitalize">
            <?php echo esc_html($user->display_name); ?>
        </h1>

        <div id="ppoTabs" class="d-flex my-2 justify-content-between" style="gap:1rem;">
            <button class="btn d-flex justify-content-center text-light fs-5 ppo-plan-act-button active" style="flex-grow:1;" data-tab-title="Beskeder">Beskeder</button>

            <button class="btn d-flex justify-content-center text-light fs-5 ppo-plan-act-button" style="flex-grow:1;text-align:center;" data-tab-title="Indstillinger">Indstillinger</button>

            <button class="btn d-flex justify-content-center text-light fs-5 ppo-plan-act-button" style="flex-grow:1;" data-tab-title="Planer">Abonnement</button>
        </div>


    </div>

    <!-- Tab Content Section | Chat Room -->
    <?php ppo_chat_room(); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<!-- Modals -->
<?php ppo_manage_plan_modal(); ?>

<script>
    "use strict";

    jQuery(document).ready(function() {
        if (jQuery("#ppoTabs")) jQuery("#ppoTabs button").on('click', function(e) {
            jQuery("#ppoTabs button.active").removeClass('active')

            e.target.classList.add('active');

            if (jQuery("#ppoTabContentTitle")) jQuery("#ppoTabContentTitle").html(e.target.dataset.tabTitle)
        });
    });
</script>