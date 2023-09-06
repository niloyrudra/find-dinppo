<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */
$user = wp_get_current_user();
$selected_plan = $_GET && $_GET["plan"] ? trim($_GET["plan"]) : 'gratis';
$subs_plan = $selected_plan ?? 'gratis';
$plan_data = ppo_subscription_detail($subs_plan);
$icon = trim($plan_data['icon']);
$plan_name = $plan_data['plan'];
$annual_rate = $plan_data['annual_rate'];
$month_rate = $plan_data['month_rate'];
$percentage_saved = $plan_data['saved_percentage'];

/**
 * Conditions
 */
$ele_conditional_class = ($subs_plan == 'gratis') ? ' ppo-element-blocked' : '';
$btn_conditional_class = ($subs_plan == 'gratis' || $subs_plan == 'basic' || $subs_plan == 'starter') ? ' ppo-element-blocked' : '';
$tabs_conditional_class = ($subs_plan == 'gratis' || $subs_plan == 'basic') ? ' ppo-element-blocked' : '';
$social_conditional_class = ($subs_plan != 'premium') ? ' ppo-element-blocked' : '';
$tabs_2_conditional_class = ($subs_plan == 'gratis' || $subs_plan == 'basic' || $subs_plan == 'starter') ? ' ppo-element-blocked' : '';
$section_conditional_class = ($subs_plan == 'gratis') ? ' ppo-section-blocked' : '';
?>

<style type="text/css">
    .select-container {
        position: relative;
        margin: 0 auto;
        width: 400px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    }

    .select-container .select {
        position: relative;
        background: #0f0e11;
        height: 60px;
    }

    .select-container .select::after {
        position: absolute;
        content: "";
        width: 15px;
        height: 15px;
        top: 50%;
        right: 15px;
        transform: translateY(-50%) rotate(45deg);
        border-bottom: 2px solid white;
        border-right: 2px solid white;
        cursor: pointer;
        transition: border-color 0.4s;
    }

    .select-container.active .select::after {
        border: none;
        border-left: 2px solid white;
        border-top: 2px solid white;
    }

    .select-container .select input {
        position: relative;
        width: 100%;
        height: 100%;
        padding: 0 15px;
        background: none;
        outline: none;
        border: none;
        font-size: 1.4rem;
        color: white;
        cursor: pointer;
    }

    .select-container .option-container {
        position: relative;
        background: transparent;
        /*#6e6477;*/
        height: 0;
        overflow-y: scroll;
        transition: 0.4s;
    }

    .select-container.active .option-container {
        height: 240px;
    }

    .select-container .option-container::-webkit-scrollbar {
        border-left: 1px solid rgba(0, 0, 0, 0.2);
        width: 10px;
    }

    .select-container .option-container::-webkit-scrollbar-thumb {
        background: #0f0e11;
    }

    .select-container .option-container .option {
        position: relative;
        padding-left: 15px;
        height: 60px;
        border-top: 1px solid rgba(0, 0, 0, 0.3);
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: 0.2s;
    }

    .select-container .option-container .option.selected {
        background: rgba(0, 0, 0, 0.5);
        pointer-events: none;
    }

    .select-container .option-container .option:hover {
        background: rgba(0, 0, 0, 0.2);
        padding-left: 20px;
    }

    .select-container .option-container .option label {
        font-size: 1.1rem;
        color: white;
        cursor: pointer;
    }
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:100%; max-width: 600px; margin: 2rem auto;">

    <!-- Subscription Detail Section -->
    <div class="row mb-4 ppo-br-16 ppo-bg-card">
        <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
            <a href="<?php //echo esc_url(home_url("/abonnement-$selected_plan")); ?>" class="text-decoration-none">
                <h3 class="text-light fs-4 fw-bold text-center mb-0 py-2">Abonneomenter</h3>
            </a>
        </div>

        <div class="d-flex  flex-column justify-content-center align-content-center my-3 px-4 py-2">

            <div class="mt-2 text-center flex-column">

                <!-- Select Subscription Options -->
                <?php ppo_select_plans(); ?>

                <h2 class="text-light fw-bold">Ingen omkostninger</h2>
                <h4 class="text-light">Meget nedsat funktioner</h4>
            </div>

        </div>

    </div>

    <!-- Subs PLAN Section -->
    <div class="row mb-4 ppo-br-16 ppo-bg-card">
        <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
            <h3 class="text-light fs-3 fw-bold text-center mb-0 py-2"><img class="ppo-subscription-plan-icon" src="<?php echo ppo_get_dir("/assets/images/member-stars/$icon.png"); ?>" style="width:35px;height:35px;margin-right:1rem;" /><span class="ppo-subscription-plan-name"><?php echo esc_html($plan_name); ?></span></h3>
        </div>

        <div class="d-flex flex-column justify-content-center align-content-center my-3 px-4 py-2">

            <ul class="my-2 mx-0 p-0">

                <li class="text-light fw-bold fs-3 mb-1" style="list-style:none;">
                    <span class="d-inline-block text-center ppo-bg-red" style="width:50px;height:50px;border-radius:25px;margin-right:1.5rem;">1.</span>Din Privat Pasningsordnings navn
                </li>

                <li class="text-light fw-bold fs-3 mb-1" style="list-style:none;">
                    <span class="d-inline-block text-center ppo-bg-red" style="width:50px;height:50px;border-radius:25px;margin-right:1.5rem;">2.</span>
                    <img src="<?php echo ppo_get_dir("/assets/images/profile/mailbox-outline.png") ?>" style="width:30px;margin-right:0.5rem;" />
                    Postnr. &
                    <img src="<?php echo ppo_get_dir("/assets/images/profile/condo.png") ?>" style="width:30px;margin-right:0.5rem;" />
                    by
                </li>

                <li class="text-light fw-bold fs-3 mb-1" style="list-style:none;">
                    <span class="d-inline-block text-center ppo-bg-red" style="width:50px;height:50px;border-radius:25px;margin-right:1.5rem;">3.</span>
                    <!-- <img src="<?php echo ppo_get_dir("/assets/images/profile/") ?>" style="width:30px;margin-right:0.5rem;" /> -->
                    Profilbillede & navn
                </li>

                <li class="text-light fw-bold fs-3" style="list-style:none;">
                    <span class="d-inline-block text-center ppo-bg-red" style="width:50px;height:50px;border-radius:25px;margin-right:1.5rem;">4.</span><img class="ppo-subscription-plan-icon" src="<?php echo ppo_get_dir("/assets/images/member-stars/$icon.png"); ?>" style="width:30px;height:30px;margin-right:1rem;" /><span class="ppo-subscription-plan-name"><?php echo esc_html($plan_name); ?></span> logoet vil kunne ses på din profil
                </li>

            </ul>

            <a id="ppoCheckoutLink" href="<?php echo esc_url(home_url("/checkout/?plan=" . strtolower(trim($plan_name)))); ?>" class="btn text-light fw-bold fs-4 w-50 ppo-b2-light ppo-br-16 mx-auto my-0 ppo-bg-primary" data-checkout-link="<?php echo esc_url(home_url("/checkout/?plan=")); ?>">Vælg denne plan</a>

        </div>

    </div>

    <div class="row mb-3">
        <div class="p-3 ppo-bg-red ppo-br-16 mb-1">
            <p class="text-white fs-5 fw-bold mb-0">
                <strong>Vælg</strong> et abonnement & se forhåndsvisning af din profil herunder som normale brugere vil se. <a href="#!" class="fs-3 fw-bold text-white">Bemærk</a> at hvert abonnement indholder forskellige fordele.
            </p>
        </div>
        <div class="text-center">
            <img src="<?php echo ppo_get_dir("/assets/images/arrows/right-arrow.png") ?>" style="width:40px;rotate:90deg;" alt="">
        </div>
    </div>
    <!-- Red Warning Section -->


    <div class="profile-content mb-4">

        <!-- Plan Name With Star Icon -->

        <div class="row px-1 py-3 ppo-box-shadow ppo-br-16 ppo-bg-card">

            <div class="col-12">
                <div class="text-center py-2 ppo-profile-section-header mb-4">
                    <h3 class="text-light fs-3 fw-bold mb-0">
                        "<span class="ppo-subscription-plan-name"><?php echo esc_html($plan_name); ?></span>"
                        &nbsp;
                        <img class="ppo-subscription-plan-icon" src="<?php echo ppo_get_dir("/assets/images/member-stars/$icon.png"); ?>" style="width:35px;" />
                    </h3>
                </div>
            </div>

            <div class="col-4">
                <div class="mb-3 position-relative">
                    <img src="<?php echo ppo_get_dir("/assets/images/profile/add-image.png"); ?>" style="display:block; width:100%;border-radius:16px;" />
                    <h2 class="fs-5 text-white text-center text-capitalize position-absolute w-100" style="top:6px;z-index:3;">"Dit profilbillede"</h2>
                </div>
                <h2 class="fs-5 text-white text-center text-capitalize">"Dit navn"</h2>
            </div>

            <div class="col-8">

                <div class="d-inline-flex justify-content-center align-items-center ppo-br-16 ppo-bg-secondary px-2 py-1 mb-2 m-1" style="gap:6px;">
                    <img src="<?php echo ppo_get_dir('/assets/images/profile/mailbox-outline.png'); ?>" style="width:20px;" />
                    <span class="fs-4 fw-bold text-light">6920</span>
                </div>

                <div class="d-inline-flex justify-content-center align-items-center ppo-br-16 ppo-bg-secondary px-2 py-1 mb-2 m-1" style="gap:6px;">
                    <img src="<?php echo ppo_get_dir('/assets/images/profile/condo.png'); ?>" style="width:20px;" />
                    <span class="fs-4 fw-bold text-light">Lem st.</span>
                </div>

                <div class="d-inline-flex justify-content-center align-items-center ppo-br-16 ppo-bg-secondary px-2 py-1 mb-2 m-1<?php echo $ele_conditional_class; ?>" data-ele-conditional-class style="gap:6px;">
                    <img src="<?php echo ppo_get_dir('/assets/images/profile/location-outline.png'); ?>" style="width:20px;" />
                    <span class="fs-4 fw-bold text-light">Adresse</span> <span class="fs-6 fw-bold text-light">(Log ind for at se)</span>
                </div>

                <div class="d-inline-flex justify-content-center align-items-center ppo-br-16 ppo-bg-secondary px-2 py-1 mb-2 m-1<?php echo $ele_conditional_class; ?>" data-ele-conditional-class style="gap:6px;">
                    <img src="<?php echo ppo_get_dir('/assets/images/profile/smoking.png'); ?>" style="width:20px;" />
                    <span class="fs-6 fw-bold text-light">Ikke ryger</span>
                </div>

                <div class="d-inline-flex justify-content-center align-items-center ppo-br-16 ppo-bg-secondary px-2 py-1 mb-2 m-1<?php echo $ele_conditional_class; ?>" data-ele-conditional-class style="gap:6px;">
                    <img src="<?php echo ppo_get_dir('/assets/images/profile/baby-boy.png'); ?>" style="width:20px;" />
                    <span class="fs-6 fw-bold text-light">Max antal born: 5</span>
                </div>

                <div class="d-flex mb-2 mt-2" style="gap:0.5rem;">
                    <button class="btn px-3 py-2 fw-bold text-light ppo-profile-primary-button<?php echo $btn_conditional_class; ?>" data-btn-conditional-class>
                        <img src="<?php echo ppo_get_dir('/assets/images/profile/mail-outline.png') ?>" style="margin-top: -10px;width:20px;margin-right:4px;" />
                        <span class="fs-5">Skriv besked</span>
                    </button>
                    <button class="btn px-3 py-1 fw-bold text-light ppo-profile-accent-button<?php echo $btn_conditional_class; ?>" data-btn-conditional-class>
                        <img src="<?php echo ppo_get_dir('/assets/images/profile/phone-call-outline.png') ?>" style="margin-top: -12px;width:20px;margin-right:4px;" />
                        <span class="fs-5">Ring</span>
                    </button>
                </div>

            </div>

        </div>
    </div>
    <!-- .profile-content -->

    <!-- Social Handler Buttons -->
    <div id="socialMediaSection" class="row mb-4 px-4 py-2 d-flex justify-content-between align-items-center ppo-br-16 ppo-bg-tab-section">
        <a href="#!" class="text-decoration-none w-auto me-1 bg-transparent<?php echo $social_conditional_class; ?>" data-social-conditional-class>
            <img src="<?php echo ppo_get_dir("/assets/images/social-icons/web.png") ?>" style="height:40px;" class="d-block" />
        </a>
        <a href="#!" class="text-decoration-none w-auto me-1 bg-transparent<?php echo $social_conditional_class; ?>" data-social-conditional-class>
            <img src="<?php echo ppo_get_dir("/assets/images/social-icons/youtube.png") ?>" style="height:40px;" class="d-block" />
        </a>
        <a href="#!" class="text-decoration-none w-auto me-1 bg-transparent<?php echo $social_conditional_class; ?>" data-social-conditional-class>
            <img src="<?php echo ppo_get_dir("/assets/images/social-icons/twitter.png") ?>" style="height:40px;" class="d-block" />
        </a>
        <a href="#!" class="text-decoration-none w-auto me-1 bg-transparent<?php echo $social_conditional_class; ?>" data-social-conditional-class>
            <img src="<?php echo ppo_get_dir("/assets/images/social-icons/tiktok.png") ?>" style="height:40px;" class="d-block" />
        </a>
        <a href="#!" class="text-decoration-none w-auto me-1 bg-transparent<?php echo $social_conditional_class; ?>" data-social-conditional-class>
            <img src="<?php echo ppo_get_dir("/assets/images/social-icons/facebook-full.png") ?>" style="height:40px;" class="d-block" />
        </a>
        <a href="#!" class="text-decoration-none w-auto me-1 bg-transparent<?php echo $social_conditional_class; ?>" data-social-conditional-class>
            <img src="<?php echo ppo_get_dir("/assets/images/social-icons/instagram.png") ?>" style="height:40px;" class="d-block" />
        </a>
    </div>

    <!-- Profile Info Buttons -->
    <div id="profileInfoTab" class="row mb-3 p-2 d-flex flex-row justify-content-between ppo-br-16 ppo-bg-card">
        <button class="btn text-light fw-bold w-25 me-1 ppo-br-16 ppo-bg-secondary<?php echo $ele_conditional_class; ?> active" data-ele-conditional-class data-tab-content="#generalInfo">Generelt info</button>

        <button class="btn text-light fw-bold w-25 me-1 ppo-br-16 ppo-bg-secondary<?php echo $tabs_2_conditional_class; ?>" data-tabs-2-conditional-class data-tab-content="#priceDetail">Pris & udstyr</button>

        <button class="btn text-light fw-bold w-25 me-1 ppo-br-16 ppo-bg-secondary<?php echo $tabs_conditional_class; ?>" data-tabs-conditional-class data-tab-content="#annualPlannerAndCertificate">Årsplan & Certifikater</button>

        <button class="btn text-light fw-bold w-auto ppo-br-16 ppo-bg-secondary<?php echo $tabs_conditional_class; ?>" data-tabs-conditional-class style="flex-grow:1;" data-tab-content="#holidays">Ferier</button>
    </div>

    <!-- Tab Contents -->
    <!-- General Info -->
    <div id="generalInfo" class="ppo-tab-content">

        <div class="row mb-3 ppo-br-16 ppo-bg-card<?php echo $section_conditional_class; ?>">
            <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                <h3 class="text-light fs-5 fw-bold">Beskrivelse</h3>
            </div>

            <!-- Profile Description -->
            <div class="ppo-profile-section-content pt-3">
                <p class="text-light">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio veniam officiis ipsum distinctio reprehenderit temporibus rerum commodi dignissimos voluptates ex?
                </p>
                <p class="text-light">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio veniam officiis ipsum distinctio reprehenderit temporibus rerum commodi dignissimos voluptates ex?
                </p>
            </div>
        </div>

        <!-- Calendar Available Spots -->
        <div class="row mb-3 ppo-br-16 ppo-bg-card<?php echo $section_conditional_class; ?>">
            <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                <h3 class="text-light fs-5 fw-bold">Ledige pladser</h3>
            </div>

            <!-- Years -->
            <div class="row py-2 mb-3">
                <?php
                // Store the year to
                // the variable
                $current_year = date("Y");
                $next_year = intval($current_year) + 1;
                $next_of_next_year = intval($next_year) + 1;
                ?>
                <div class="col-2"></div>
                <div class="col-3">
                    <button class="btn text-light fw-bold fs-5  ppo-profile-cal-button active"><?php echo trim($current_year); ?></button>
                </div>
                <div class="col-3">
                    <button class="btn text-light fw-bold fs-5  ppo-profile-cal-button"><?php echo $next_year; ?></button>
                </div>
                <div class="col-3">
                    <button class="btn text-light fw-bold fs-5  ppo-profile-cal-button"><?php echo $next_of_next_year; ?></button>
                </div>
                <div class="col-1"></div>
            </div>

            <!-- Months -->
            <!-- 1-6 -->
            <div class="d-flex justify-content-between flex-wrap mb-3 px-4" style="gap:0.5rem;">
                <button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16 " style="flex-grow:1;"><?php echo 'Jan'; ?></button>

                <button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16 " style="flex-grow:1;"><?php echo 'Feb'; ?></button>

                <button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16 " style="flex-grow:1;"><?php echo 'Mar'; ?></button>

                <button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16 " style="flex-grow:1;"><?php echo 'Apr'; ?></button>

                <button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16 " style="flex-grow:1;"><?php echo 'Maj'; ?></button>

                <button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16 " style="flex-grow:1;"><?php echo 'Jun'; ?></button>
            </div>

            <!-- 7-12 -->
            <div class="d-flex justify-content-between flex-wrap mb-3 px-4" style="gap:0.5rem;">
                <button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16 " style="flex-grow:1;"><?php echo 'Jul'; ?></button>

                <button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16 " style="flex-grow:1;"><?php echo 'Aug'; ?></button>

                <button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16 " style="flex-grow:1;"><?php echo 'Sep'; ?></button>

                <button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16 " style="flex-grow:1;"><?php echo 'Okt'; ?></button>

                <button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16  enabled" style="flex-grow:1;"><?php echo 'Nov'; ?></button>

                <button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16  enabled" style="flex-grow:1;"><?php echo 'Dec'; ?></button>

            </div>


        </div>

        <!-- Keywords -->
        <div class="row mb-3 ppo-br-16 ppo-bg-card<?php echo $section_conditional_class; ?>">
            <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                <h3 class="text-light fs-5 fw-bold">Nøgleord</h3>
            </div>

            <!-- Keyword List -->
            <div class="ppo-prof-keyword-content py-3">

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Natur'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Musik'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Motorik'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Har kæledyr'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Godkendt vikar'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Førstehjælps-kursus'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Legestue'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Økologi'; ?></button>

            </div>
        </div>

    </div>

    <!-- Price Detail -->
    <div id="priceDetail" class="ppo-tab-content" style="display:none;">
        <!-- Price Description -->
        <div class="row mb-3 ppo-br-16 ppo-bg-card">
            <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                <h3 class="text-light fs-5 fw-bold">Pris</h3>
            </div>

            <div class="row p-0 pt-3 mb-3 ms-1">
                <div class="col d-flex flex-column justify-content-between align-items-center">
                    <p class="text-white mb-1 text-center">Egen betaling pr. maned</p>
                    <button class="btn fw-bold bg-white w-75 ppo-br-16">2123 ,-</button>
                </div>
                <div class="col d-flex flex-column justify-content-between align-items-center">
                    <p class="text-white mb-1 text-center">Kommunens tilskud</p>
                    <button class="btn fw-bold bg-white w-75 ppo-br-16">5977 ,-</button>
                </div>
                <div class="col d-flex flex-column justify-content-between align-items-center">
                    <p class="text-white mb-1 text-center">Samlet pris</p>
                    <button class="btn fw-bold bg-white w-75 ppo-br-16">8100 ,-</button>
                </div>
            </div>
        </div>

        <!-- Included in the price -->
        <div class="row mb-3 ppo-br-16 ppo-bg-card">
            <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                <h3 class="text-light fs-5 fw-bold">Inkluderet i prisen</h3>
            </div>

            <!-- Included Items -->
            <div class="ppo-prof-keyword-content py-3">

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Bleer'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Salve'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Solcereme'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Vaskelude'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Vadsercietter'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Godkendt autostol'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Barnevogn & dyne'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Sund mad & drikke'; ?></button>
                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Ost'; ?></button>

            </div>

        </div>

        <!-- Bring User's own -->
        <div class="row mb-3 ppo-br-16 ppo-bg-card">
            <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                <h3 class="text-light fs-5 fw-bold">Medbring selv</h3>
            </div>

            <!-- Items -->
            <div class="ppo-prof-keyword-content py-3">

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Tøj der passer til arstiden'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Flyverdragt, hue & vanter'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Termotøj (Helst to-delt)'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Regntøj (Helst to-delt)'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Gummistøvler'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Skiftetøj'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Ekstra sut'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Sko til arstid (Vi er meget ude)'; ?></button>

                <button class="btn text-dark bg-light fw-bold fs-5"><?php echo 'Løbesko'; ?></button>

            </div>
        </div>

    </div>

    <!-- Annual Planner and Certificate Detail -->
    <div id="annualPlannerAndCertificate" class="ppo-tab-content" style="display:none;">

        <!-- Certificates -->
        <div class="row mb-3 ppo-br-16 ppo-bg-card">
            <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                <h3 class="text-light fs-5 fw-bold">Certificater</h3>
            </div>

            <div class="d-flex justify-content-start pt-3 mb-3">
                <div class="mx-1">
                    <button class="btn fw-bold bg-white w-auto ppo-br-16">Grønne spirer</button>
                </div>
                <div class="mx-1">
                    <button class="btn fw-bold bg-white w-auto ppo-br-16">Spring ud i naturen</button>
                </div>

            </div>
        </div>

        <!-- Annual Planner Section -->
        <div class="row mb-3 ppo-br-16 ppo-bg-card">
            <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                <h3 class="text-light fs-5 fw-bold">Årsplaner</h3>
            </div>

            <!-- Months Data -->
            <div class="py-3">

                <div class="row mb-2">
                    <div class="position-relative">
                        <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">Januar</h4>
                        <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);">Sne & kugler</h4>
                    </div>
                    <div class="my-1">
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non.</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="position-relative">
                        <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">Februar</h4>
                        <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);">Fastelavn & Vinter</h4>
                    </div>
                    <div class="my-1">
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non.</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="position-relative">
                        <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">Marts</h4>
                        <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);">Så & Spirer</h4>
                    </div>
                    <div class="my-1">
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non.</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="position-relative">
                        <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">April</h4>
                        <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);">Påske & Forår</h4>
                    </div>
                    <div class="my-1">
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non.</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="position-relative">
                        <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">Maj</h4>
                        <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);">Kripledyr & Dyreunger</h4>
                    </div>
                    <div class="my-1">
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non.</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="position-relative">
                        <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">Juni</h4>
                        <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);">Landsskue i Herning</h4>
                    </div>
                    <div class="my-1">
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non.</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="position-relative">
                        <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">Juli</h4>
                        <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);">Sol & Sommer</h4>
                    </div>
                    <div class="my-1">
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non.</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="position-relative">
                        <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">August</h4>
                        <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);">Høst & Afgrøder</h4>
                    </div>
                    <div class="my-1">
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non.</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="position-relative">
                        <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">September</h4>
                        <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);">Høst & Afgrøder</h4>
                    </div>
                    <div class="my-1">
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non.</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="position-relative">
                        <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">Oktober</h4>
                        <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);">Græskar, Halloween</h4>
                    </div>
                    <div class="my-1">
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non.</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="position-relative">
                        <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">November</h4>
                        <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);">Vind & Kulde</h4>
                    </div>
                    <div class="my-1">
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non.</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="position-relative">
                        <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">December</h4>
                        <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);">Jul, Sne & Hygge</h4>
                    </div>
                    <div class="my-1">
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p class="text-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam fugit molestiae quod dicta non.</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Holiday Details -->
    <div id="holidays" class="ppo-tab-content" style="display:none;">

        <!-- All Holiday Section -->
        <div class="row mb-3 ppo-br-16 ppo-bg-card">
            <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                <h3 class="text-light fs-5 fw-bold">Ferie/Helligdage/Lukkedage</h3>
            </div>

            <!-- Months Data -->
            <div class="p-3">

                <div class="my-3">
                    <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                        <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Januar</h4>

                    </div>

                </div>

                <div class="my-3">
                    <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                        <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Februar</h4>

                    </div>

                </div>

                <div class="my-3">
                    <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                        <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Marts</h4>

                    </div>

                </div>

                <div class="my-3">
                    <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                        <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">April</h4>

                    </div>

                </div>

                <div class="my-3">
                    <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                        <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Maj</h4>

                    </div>

                </div>

                <div class="my-3">
                    <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                        <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Juni</h4>

                    </div>

                </div>

                <div class="my-3">
                    <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                        <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">Juli</h4>

                    </div>

                </div>

                <div class="my-3">
                    <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                        <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">August</h4>

                    </div>

                </div>

                <div class="my-3">
                    <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                        <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">September</h4>

                    </div>

                </div>

                <div class="my-3">
                    <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                        <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">Oktober</h4>

                    </div>

                </div>

                <div class="my-3">
                    <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                        <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">November</h4>

                    </div>

                </div>

                <div class="my-3">
                    <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                        <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">December</h4>

                    </div>

                </div>

            </div>

        </div>

    </div>

</article><!-- #post-<?php the_ID(); ?> -->

<script type="text/javascript" defer>
    "use strict";

    jQuery(document).ready(function() {

        if (jQuery("#profileInfoTab")) jQuery("#profileInfoTab button").on('click', function(e) {
            jQuery("#profileInfoTab button.active").removeClass('active')

            e.target.classList.add('active');
            const targetedTabContentId = e.target.dataset.tabContent

            if (targetedTabContentId) {
                jQuery(".ppo-tab-content").fadeOut("slow")
                jQuery(targetedTabContentId).fadeIn("slow")
            }
        });

    });

    let selectContainer = document.querySelector(".select-container");
    let select = document.querySelector(".select");
    let input = document.getElementById("ppoInput");
    let options = document.querySelectorAll(".select-container .option");

    select.onclick = () => {
        selectContainer.classList.toggle("active");
    };

    options.forEach((e) => {
        e.addEventListener("click", () => {
            // input.value = e.innerText;
            input.innerHTML = e.querySelector("label").innerHTML;

            const selectedPlan = e.dataset.selectedPlan
            const data = ppo_data.subs_details_list[selectedPlan]

            jQuery(".ppo-element-blocked").removeClass('ppo-element-blocked');
            jQuery(".ppo-section-blocked").removeClass('ppo-section-blocked');

            if (data) {
                const {
                    plan,
                    icon_url
                } = data;

                if (selectedPlan == 'gratis') jQuery("[data-ele-conditional-class]").addClass('ppo-element-blocked');

                if (selectedPlan == 'gratis' || selectedPlan == 'basic' || selectedPlan == 'starter') jQuery("[data-btn-conditional-class]").addClass('ppo-element-blocked');

                if (selectedPlan == 'gratis' || selectedPlan == 'basic') jQuery("[data-tabs-conditional-class]").addClass('ppo-element-blocked');

                if (selectedPlan != 'premium') jQuery("[data-social-conditional-class]").addClass('ppo-element-blocked');

                if (selectedPlan == 'gratis' || selectedPlan == 'basic' || selectedPlan == 'starter') jQuery("[data-tabs-2-conditional-class]").addClass('ppo-element-blocked');

                if (selectedPlan == 'gratis') jQuery("[data-section-conditional-class]").addClass('ppo-section-blocked');

                jQuery(".ppo-subscription-plan-icon").prop("src", icon_url)
                jQuery(".ppo-subscription-plan-name").html(plan)
                jQuery("#ppoCheckoutLink").prop('href', jQuery("#ppoCheckoutLink").data("checkout-link") + selectedPlan)
            }

            selectContainer.classList.remove("active");
            options.forEach((e) => {
                e.classList.remove("selected");
            });
            e.classList.add("selected");
        });
    });
</script>