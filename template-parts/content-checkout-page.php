<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */

$user = wp_get_current_user();
$user_id = $user ? $user->ID : null;
$plan_name = $user_id ? ppo_get_daycare_subscription_plan($user_id) : 'gratis';
$selected_plan = $plan_name ?? 'gratis';

// $selected_plan = ($_GET && $_GET['plan']) ? $_GET['plan'] : 'gratis';
// $subs_plan = $selected_plan ?? 'gratis';
// 
$discount_rate = 0.25;

$plan_data = ppo_subscription_detail($selected_plan);


$icon = trim($plan_data['icon']);
$plan_name = $plan_data['plan'];
$annual_rate = $plan_data['annual_rate'];
$month_rate = $plan_data['month_rate'];
$percentage_saved = $plan_data['saved_percentage'];
$discount = intval(esc_html($month_rate)) * $discount_rate;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:100%; max-width: 600px; margin: 0 auto; padding: 1rem;">

    <!-- Top Title Section -->
    <div class="row mb-4">
        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 ppo-bg-secondary">
            <?php the_title('<h3 class="text-light fs-4 fw-bold text-center">', '</h3>'); ?>
        </div>
    </div>

    <!-- Subs Plan Details -->
    <div class="row mb-4 ppo-br-16 ppo-bg-card">
        <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
            <h3 class="text-light fs-4 fw-bold text-center py-1">Vælge plan</h3>
        </div>

        <div class="d-flex justify-content-center align-content-center my-3 px-4 py-2 flex-column">

            <div class="mt-2 text-center flex-column">

                <p class="text-white fs-4 fw-bold text-center">Vælge den plam der passer dig bedst</p>

                <!-- Subscription Plan Options -->
                <?php ppo_select_plans(); ?>

                <p class="text-white fs-4 fw-bold text-center mb-3">Vælge betaling, månedlig eller årligt</p>

                <!-- Subscription Plan Detail Section -->
                <div class="row pb-4">

                    <div class="col text-center ppo-cursor-pointer" onclick="ppoSelectPlanHandler(this);">
                        <div class="py-1 text-center ppo-br-16 ppo-b1-red position-relative ppo-bg-secondary-light mx-auto" style="max-width:50%;margin-bottom:-3px;z-index:1;">
                            <span class="text-light fw-bold fs-4">Pr. år</span>
                        </div>
                        <div class="ppo-plan-details py-2 w-100 ppo-br-16 ppo-bg-secondary-light active">
                            <p class="text-light fw-bold fs-1 m-0"><span id="ppoYearlyRate"><?php echo esc_html($annual_rate); ?></span> Kr.</p>
                            <p class="text-light fw-bold fs-5 m-0"><span id="ppoCurrentMonthlyRate"><?php echo esc_html((intval($annual_rate) / 12)); ?></span> Kr. månedlige</p>
                        </div>
                    </div>

                    <div class="col text-center ppo-cursor-pointer" onclick="ppoSelectPlanHandler(this);">
                        <div class="py-1 text-center ppo-br-16 ppo-b1-red position-relative ppo-bg-secondary-light mx-auto" style="max-width:50%;margin-bottom:-3px;z-index:1;">
                            <span class="text-light fw-bold fs-4">Pr. måned</span>
                        </div>
                        <div class="ppo-plan-details py-2 w-100 ppo-br-16 ppo-bg-secondary-light">
                            <p class="text-light fw-bold fs-1 m-0"><span id="ppoMonthlyRate"><?php echo esc_html($month_rate); ?></span> Kr.</p>
                            <p class="text-light fw-bold fs-5 m-0"><span id="ppoCurrentYearlyRate"><?php echo esc_html((intval($month_rate) * 12)); ?></span> Kr. årlig</p>
                        </div>
                    </div>

                </div>

                <h3 class="text-light fw-bold">Spar <span id="ppoPercentageSaved"><?php echo esc_html($percentage_saved); ?></span> ved at betale årligt!</h3>
                <h5 class="text-light">(Alle priser er med moms (Inkl moms))</h5>

            </div>

        </div>

    </div>

    <!-- Payment Type Selection Section -->
    <div class="row mb-4 ppo-br-16 ppo-bg-card">
        <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
            <h3 class="text-light fs-4 fw-bold text-center py-1">Beltalingsmetode</h3>
        </div>

        <div class="my-3 px-4 py-2">

            <form action="" method="post" class="row g-3 needs-validation mb-3 p-3" novalidate>
                <!-- Checkboxes -->
                <div class="col-12">

                    <div class="d-flex form-check align-items-center mb-2">
                        <input class="form-check-input ppo-b2-light ppo-br-18 ppo-cursor-pointer bg-transparent" type="checkbox" value="1" id="creditCard" style="width:36px;height:36px;margin-right:1rem;" required>
                        <label class="form-check-label text-light fw-bold ppo-cursor-pointer me-3" for="creditCard">
                            Beltalingskort
                        </label>
                        <img src="<?php echo ppo_get_dir("/assets/images/cards/DK_Logo_CMYK_Konturstreg.webp") ?>" class="me-2" style="width:45px;" />
                        <img src="<?php echo ppo_get_dir("/assets/images/cards/Visa_Electron.png") ?>" class="me-2" style="width:45px;" />
                        <img src="<?php echo ppo_get_dir("/assets/images/cards/Maestro_logo.png") ?>" class="me-2" style="width:45px;" />
                        <img src="<?php echo ppo_get_dir("/assets/images/cards/MasterCard.webp") ?>" class="me-2" style="width:45px;" />
                    </div>

                    <div class="d-flex form-check align-items-center mb-2">
                        <input class="form-check-input ppo-b2-light ppo-br-18 ppo-cursor-pointer bg-transparent" type="checkbox" value="1" id="mobilePay" style="width:36px;height:36px;margin-right:1rem;" required>
                        <label class="form-check-label text-light fw-bold ppo-cursor-pointer me-5" for="mobilePay">
                            Mobilepay
                        </label>
                        <img src="<?php echo ppo_get_dir("/assets/images/cards/Mobilepay.webp") ?>" class="me-0" style="width:85px;" />
                    </div>

                </div>

                <!-- Coupon -->
                <style>
                    #ppoDiscountLabel>img {
                        transition: rotate 500ms ease-in;
                    }

                    #ppoDiscountLabel.clicked>img {
                        rotate: -180deg;
                    }

                    #ppoDiscountContainer button {
                        transition: background-color 350ms ease-in;
                    }

                    #ppoDiscountContainer button.selected {
                        background-color: rgb(73, 86, 73);
                    }
                </style>
                <div class="col-12">
                    <h4 id="ppoDiscountLabel" class="text-white" style="cursor: pointer;">Anvend rabatkode&nbsp;&nbsp;<img src="<?php echo ppo_get_dir("/assets/images/arrows/arrow-down-sign-to-navigate-white.png") ?>" style="width:20px;" /></h4>
                    <div id="ppoDiscountContainer" class="justify-content-between align-items-center" style="display:none;">
<!--                         <button class="btn fw-bold ppo-b2-light text-white ppo-br-12">Indtast rabatkode</button> -->
						<label for="ppoIsDiscount" class="fw-bold text-white me-2">Indtast rabatkode</label>
                        <button id="ppoIsDiscount" class="btn fw-bold ppo-b2-light text-white ppo-br-12">Anvend rabatkode</button>
                    </div>
                </div>

                <!-- Email Input -->
                <div class="col-12">
                    <div class="input-group has-validation flex-column">
                        <label class="d-block fw-bold fs-4 text-white mb-1" for="email">Faktura e-mail</label>
                        <input type="email" class="form-control w-100 bg-transparent ppo-b2-light ppo-br-16 text-light" id="email" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please choose a email.
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>

    <!-- Order Detail Section -->
    <div class="row mb-4 ppo-br-16 ppo-bg-card">
        <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
            <h3 class="text-light fs-4 fw-bold text-center py-1">Ordreoversigt</h3>
        </div>

        <div class="my-3 px-4 py-2">

            <div class="row align-items-center mb-2">
                <div class="col-6">
                    <h3 class="text-white fw-bold mb-0">Plan:</h3>
                </div>
                <div class="col-6">
                    <div class="ppo-b2-light ppo-br-12 fs-5 fw-bold py-1 text-white text-center"><img id="ppoOrderSubsPlanIcon" src="<?php echo ppo_get_dir("/assets/images/member-stars/$icon.png") ?>" style="width:32px;" />&nbsp;&nbsp;<span id="ppoOrderSubsPlanName"><?php echo esc_html($plan_name); ?></span> plan</div>
                </div>
            </div>

            <div class="row align-items-center mb-2">
                <div class="col-6">
                    <h3 class="text-white fw-bold mb-0">Betaling:</h3>
                </div>
                <div class="col-6">
                    <div class="ppo-b2-light ppo-br-12 fs-5 fw-bold py-1 text-white text-center"><span id="ppoOrderSelectedPlanSubscriptionRate"><?php echo esc_html($month_rate); ?></span> kr. Pr. måned</div>
                </div>
            </div>

            <div class="row align-items-center mb-2">
                <div class="col-6">
                    <h3 class="text-white fw-bold mb-0">Rabatkode:</h3>
                </div>
                <div class="col-6">
                    <div class="ppo-b2-light ppo-br-12 fs-5 fw-bold py-1 text-white text-center">Aktiveret</div>
                </div>
            </div>

            <!-- Amount -->
            <div class="py-3">

                <div class="mb-2 d-flex justify-content-between">
                    <h3 class="text-white fs-4">Moms:</h3>
                    <h3 class="text-white fs-4 fw-bold"><span id="ppoOrderSelectedPlanDiscount"><?php echo $discount; ?></span> kr</h3>
                </div>

                <div class="mb-2 d-flex justify-content-between">
                    <h3 class="text-white fs-4">Total beløb:</h3>
                    <h3 class="text-white fs-4 fw-bold"><span id="ppoOrderSelectedPlanSubscriptionTotal"><?php echo esc_html($month_rate); ?></span> kr</h3>
                </div>

            </div>

            <!-- Purchase Button -->
            <div class="text-center">
                <a href="<?php echo esc_url(home_url("/successful-purchase/")); ?>" class="btn ppo-b2-light ppo-br-16 w-50 fs-4 fw-bold text-white ppo-bg-primary">KØB</a>
            </div>

        </div>

    </div>


</article><!-- #post-<?php the_ID(); ?> -->

<script type="text/javascript" defer>
    "use strict";
    let selectContainer = document.querySelector(".select-container");
    let select = document.querySelector(".select");
    let input = document.getElementById("ppoInput");
    let options = document.querySelectorAll(".select-container .option");


    select.onclick = () => {
        selectContainer.classList.toggle("active");
    };

    // Discount Collapse Toggle action
    if (jQuery('#mobilePay')) jQuery('#mobilePay').on("input", (ele) => {
        jQuery('#creditCard').prop("checked", false)
    });
    if (jQuery('#creditCard')) jQuery('#creditCard').on("input", (ele) => {
        jQuery('#mobilePay').prop("checked", false)
    });

    // Discount Collapse Toggle action
    if (jQuery("#ppoDiscountLabel")) jQuery("#ppoDiscountLabel").on("click", () => {
        jQuery("#ppoDiscountLabel").toggleClass("clicked")
        if (jQuery("#ppoDiscountContainer")) jQuery("#ppoDiscountContainer").toggle(500);
    });

    // Discount Type Select action
    if (jQuery("#ppoIsDiscount")) jQuery("#ppoIsDiscount").on("click", (e) => {
        e.preventDefault();
        jQuery("#ppoIsDiscount").toggleClass("selected")
//         e.target.classList.add("selected")
    });

    options.forEach((e) => {
        e.addEventListener("click", () => {
            // input.value = e.innerText;
            input.innerHTML = e.querySelector("label").innerHTML;

            const selectedPlan = e.dataset.selectedPlan
            const data = ppo_data.subs_details_list[selectedPlan]

            if (data) {
                const {
                    plan,
                    month_rate,
                    annual_rate,
                    saved_percentage,
                    icon_url
                } = data;

                const currentMonthlyRate = annual_rate / 12;
                const currentYearlyRate = month_rate * 12;
                const discount = month_rate ? month_rate * 0.25 : 0;
                const total = month_rate ? month_rate * (1 - 0.25) : 0;

                // Plan Details Section
                jQuery("#ppoMonthlyRate").html(month_rate)
                jQuery("#ppoCurrentMonthlyRate").html(currentMonthlyRate)
                jQuery("#ppoYearlyRate").html(annual_rate)
                jQuery("#ppoCurrentYearlyRate").html(currentYearlyRate)
                jQuery("#ppoPercentageSaved").html(saved_percentage)
                // Order Section
                jQuery("#ppoOrderSubsPlanIcon").prop("src", icon_url)
                jQuery("#ppoOrderSubsPlanName").html(plan)
                jQuery("#ppoOrderSelectedPlanSubscription").html(month_rate)
                jQuery("#ppoOrderSelectedPlanDiscount").html(discount)
                jQuery("#ppoOrderSelectedPlanSubscriptionTotal").html(total)
            }

            selectContainer.classList.remove("active");
            options.forEach((e) => {
                e.classList.remove("selected");
            });
            e.classList.add("selected");
        });
    });

    function ppoSelectPlanHandler(ele) {
        jQuery(".ppo-plan-details.active").removeClass("active");
        ele.querySelector(".ppo-plan-details").classList.add("active")
		
		const monthlyPlanSelector = ele.querySelector(".ppo-plan-details #ppoMonthlyRate");
		const yearlyPlanSelector = ele.querySelector(".ppo-plan-details #ppoYearlyRate");
		if( monthlyPlanSelector ) {
			const monthly_rate = monthlyPlanSelector.innerText
			const discount = monthly_rate ? parseFloat(monthly_rate) * 0.25 : 0;
			const total = monthly_rate ? parseFloat(monthly_rate) * (1 - 0.25) : 0;
			jQuery("#ppoOrderSelectedPlanSubscription").html(monthly_rate)
			jQuery("#ppoOrderSelectedPlanDiscount").html(discount)
			jQuery("#ppoOrderSelectedPlanSubscriptionTotal").html(total)
		}
		else if(yearlyPlanSelector) {
			const yearly_rate = yearlyPlanSelector.innerText
			const discount = yearly_rate ? parseFloat(yearly_rate) * 0.25 : 0;
			const total = yearly_rate ? parseFloat(yearly_rate) * (1 - 0.25) : 0;
			jQuery("#ppoOrderSelectedPlanSubscription").html(yearly_rate)
			jQuery("#ppoOrderSelectedPlanDiscount").html(discount)
			jQuery("#ppoOrderSelectedPlanSubscriptionTotal").html(total)
		}
		

    }
</script>