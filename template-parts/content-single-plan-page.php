<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */
// Get the current post or page's slug
$current_page_slug = get_post_field('post_name', get_post());

$subs_type = explode("-", $current_page_slug)[0];
$user = wp_get_current_user();
$plan_data = ppo_subscription_detail($subs_type);
$icon = trim($plan_data['icon']);
$plan_name = $plan_data['plan'];
$annual_rate = $plan_data['annual_rate'];
$month_rate = $plan_data['month_rate'];
$percentage_saved = $plan_data['saved_percentage'];
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
        <div class="ppo-br-16 py-2 px-5 w-auto d-inline-flex ppo-bg-secondary">
            <h3 class="text-light fs-4 fw-bold mb-0">Din plan: <img src="<?php echo ppo_get_dir("/assets/images/member-stars/$icon.png") ?>" style="width: 30px;" /> <?php echo esc_html($plan_name); ?></h3>
        </div>
    </div>

    <!-- Top First Action Button -->
    <div class="row mb-4 justify-content-center">
        <div class="ppo-br-16 py-2 px-5 w-auto d-inline-flex ppo-bg-secondary">
            <h3 class="text-light fs-4 fw-bold mb-0">Udløber: 4/6/2023</h3>
        </div>
    </div>

    <!-- Plan Tabs Section -->
    <div class="row mb-5 px-3 py-2 justify-content-center ppo-br-20 ppo-bg-card">

        <h1 class="fs-1 fw-bold text-light mb-1 text-center">
            <?php echo esc_html($user->display_name); ?>
        </h1>

        <div id="ppoTabs" class="d-flex my-2 justify-content-between" style="gap:1rem;">
            <button class="btn d-flex justify-content-center align-items-center text-light fs-5 ppo-plan-act-button" style="flex-grow:1;" data-tab-title="Beskeder">Beskeder</button>

            <button class="btn d-flex justify-content-center align-items-center text-light fs-5 ppo-plan-act-button" style="flex-grow:1;" data-tab-title="Indstillinger">Indstillinger</button>

            <button class="btn d-flex justify-content-center align-items-center text-light fs-5 ppo-plan-act-button active" style="flex-grow:1;" data-tab-title="Planer">Planer & betaling</button>
        </div>


    </div>

    <!-- Tab Content Section -->
    <div class="row mb-3">
        <div class="p-0  ppo-br-16 ppo-bg-card">

            <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center ppo-bg-secondary">
                <h3 id="ppoTabContentTitle" class="text-light fs-4 fw-bold mb-0">Planer</h3>
            </div>

            <div class="p-3">

                <div class="w-100 mb-2 text-center">
                    <div class="ppo-br-16 py-2 px-5 d-inline-flex w-auto ppo-bg-secondary">
                        <h3 class="text-light fs-4 fw-bold mb-0">Din plan: <img src="<?php echo ppo_get_dir("/assets/images/member-stars/$icon.png") ?>" style="width: 30px;" /> <?php echo esc_html($plan_name); ?></h3>
                    </div>
                </div>

                <div class="mb-2 text-center">
                    <div class="ppo-br-16 py-2 px-5 d-inline-flex w-auto ppo-bg-secondary">
                        <h3 class="text-light fs-4 fw-bold mb-0">Udløber: 4/6/2023</h3>
                    </div>
                </div>

                <!-- Stars -->
                <div class="w-100 ppo-stars-content pt-3" style="gap:1rem;">

                    <?php
                    $plans = ppo_get_subscription_plan_list();
                    foreach ($plans as $key => $plan) :
                    ?>
                        <button class="d-flex btn px-1 text-light fw-bold fs-5 flex-column" style="flex-grow:1;pointer-events:none;">
                            <div class="ppo-br-12 text-center p-2<?php echo (strtolower($plan_name) == $key ? ' ppo-b2-light' : ''); ?> w-100 d-block ppo-bg-primary">
                                <img src="<?php echo esc_html($plan['star_icon']); ?>" style="width:30px;" />
                            </div>
                            <p class="text-light mb-2"><?php echo esc_html($plan['plan']); ?></p>
                        </button>
                    <?php
                    endforeach;
                    ?>

                </div>

                <!-- Plan Details -->
                <div class="row">
                    <div class="d-flex justify-content-center align-content-center mb-3 px-4 py-2 flex-column">

                        <div class="text-center flex-column">

                            <div class="row pb-4 pt-1">

                                <div class="col text-center">
                                    <div class="py-1 text-center ppo-br-16 ppo-b1-red position-relative ppo-bg-secondary-light mx-auto my-0" style="max-width:50%;margin-bottom:-3px;z-index:1;">
                                        <span class="text-light fw-bold fs-4">Pr. år</span>
                                    </div>
                                    <div class="py-2 w-100 ppo-br-16 ppo-bg-secondary-light">
                                        <p class="text-light fw-bold fs-1 m-0"><?php echo esc_html($annual_rate); ?> Kr.</p>
                                        <p class="text-light fw-bold fs-5 m-0"><?php echo esc_html((intval($annual_rate) / 12)); ?> Kr. månedlige</p>
                                    </div>
                                </div>

                                <div class="col justify-content-center align-content-center">
                                    <div class="py-1 text-center ppo-br-16 ppo-b1-red position-relative ppo-bg-secondary-light mx-auto my-0" style="max-width:50%;margin-bottom:-3px;z-index:1;">
                                        <span class="text-light fw-bold fs-4">Pr. måned</span>
                                    </div>
                                    <div class="py-2 w-100 ppo-br-16 ppo-bg-secondary-light">
                                        <p class="text-light fw-bold fs-1 m-0"><?php echo esc_html($month_rate); ?> Kr.</p>
                                        <p class="text-light fw-bold fs-5 m-0"><?php echo esc_html((intval($month_rate) * 12)); ?> Kr. årlig</p>
                                    </div>
                                </div>

                            </div>

                            <h3 class="text-light fw-bold">Spar <?php echo esc_html($percentage_saved); ?> ved at betale arligt!</h2>
                                <h4 class="text-light">(Alle priser er med moms)</h4>
                        </div>

                    </div>

                </div>

                <div class="text-center">
                    <a href="<?php echo esc_url(home_url("/subscription/?plan=" . strtolower(trim($plan_name)))); ?>" class="btn py-1 px-3 mb-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow w-auto ppo-bg-primary">
                        <span class="text-light fs-4">
                            Laes mere om <?php echo esc_html($plan_name); ?> plan
                        </span>
                    </a>
                </div>

                <div class="text-center">
                    <a href="<?php echo esc_url(home_url("/checkout/?plan=" . strtolower(trim($plan_name)))); ?>" class="btn py-1 px-3 mb-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow w-auto ppo-bg-primary">
                        <span class="text-light fs-4">
                            Vaelg denne plan
                        </span>
                    </a>
                </div>

            </div>

        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->

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