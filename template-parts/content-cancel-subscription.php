<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */
$user = wp_get_current_user();
$param = $_GET && $_GET['plan'] ? $_GET['plan'] : 'gratis';
$plan_data = ppo_subscription_detail($param);
$icon = trim($plan_data['icon']);
$plan_name = $plan_data['plan'];
$annual_rate = $plan_data['annual_rate'];
$month_rate = $plan_data['month_rate'];
$month_rate = $plan_data['month_rate'];
$saved_percentage = $plan_data['saved_percentage'];
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:100%; max-width: 600px; margin: 0 auto; padding: 1rem;">

    <div id="cancellationSec1">
        <!-- Reasons for Cancellation -->
        <div class="row mb-4 ppo-br-16 ppo-bg-card">
            <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
                <h3 class="text-light fs-4 fw-bold text-center py-1">Annuller plan</h3>
            </div>

            <div class="d-flex flex-column justify-content-start p-4">

                <div class="mt-2 flex-column justify-content-start flex-column">

                    <h2 class="text-white fw-bold mb-4">
                        "<?php echo esc_html($user->display_name); ?>", vi vil nødig miste dig som kunde.
                    </h2>

                    <p class="text-light fw-bold fs-5">Hvorfor vil du annullere?</p>


                    <form action="" method="post" class="row g-3 needs-validation py-3" novalidate>

                        <!-- Checkbox Inputs -->
                        <div class="col-12">

                            <div class="d-flex form-check align-items-center mb-2">
                                <input class="form-check-input ppo-b2-light ppo-br-8 ppo-cursor-pointer bg-white" type="checkbox" value="1" id="complicatedFeatures" style="width:32px;height:32px;margin-right:1rem;" required>
                                <label class="form-check-label text-light fw-bold ppo-cursor-pointer fs-5" for="complicatedFeatures">
                                    Funktionerne er for kompliceret for mig.
                                </label>
                            </div>

                            <div class="d-flex form-check align-items-center mb-2">
                                <input class="form-check-input ppo-b2-light ppo-br-8 ppo-cursor-pointer bg-white" type="checkbox" value="1" id="changePlan" style="width:32px;height:32px;margin-right:1rem;" required>
                                <label class="form-check-label text-light fw-bold ppo-cursor-pointer fs-5" for="changePlan">
                                    Jeg ønsker at ændre min plan.
                                </label>
                            </div>

                            <div class="d-flex form-check align-items-center mb-2">
                                <input class="form-check-input ppo-b2-light ppo-br-8 ppo-cursor-pointer bg-white" type="checkbox" value="1" id="technicalProblem" style="width:32px;height:32px;margin-right:1rem;" required>
                                <label class="form-check-label text-light fw-bold ppo-cursor-pointer fs-5" for="technicalProblem">
                                    Jeg har mange tekniske problemer.
                                </label>
                            </div>

                            <div class="d-flex form-check align-items-center mb-2">
                                <input class="form-check-input ppo-b2-light ppo-br-8 ppo-cursor-pointer bg-white" type="checkbox" value="1" id="notWorkAsExpected" style="width:32px;height:32px;margin-right:1rem;" required>
                                <label class="form-check-label text-light fw-bold ppo-cursor-pointer fs-5" for="notWorkAsExpected">
                                    Tingene fungere ikke som forventet.
                                </label>
                            </div>

                            <div class="d-flex form-check align-items-center mb-2">
                                <input class="form-check-input ppo-b2-light ppo-br-8 ppo-cursor-pointer bg-white" type="checkbox" value="1" id="can'tUseTheSite" style="width:32px;height:32px;margin-right:1rem;" required>
                                <label class="form-check-label text-light fw-bold ppo-cursor-pointer fs-5" for="can'tUseTheSite">
                                    Jeg kan ikke finde ud af at bruge siden.
                                </label>
                            </div>

                            <div class="d-flex form-check align-items-center mb-2">
                                <input class="form-check-input ppo-b2-light ppo-br-8 ppo-cursor-pointer bg-white" type="checkbox" value="1" id="expensive" style="width:32px;height:32px;margin-right:1rem;" required>
                                <label class="form-check-label text-light fw-bold ppo-cursor-pointer fs-5" for="expensive">
                                    Det er for dyrt.
                                </label>
                            </div>

                            <div id="otherContent" class="d-flex form-check align-items-center mb-2">
                                <input class="form-check-input ppo-b2-light ppo-br-8 ppo-cursor-pointer bg-white" type="checkbox" value="1" id="other" style="width:32px;height:32px;margin-right:1rem;" data-bs-toggle="collapse" data-bs-target="#collapseTextareaField" aria-expanded="true" aria-controls="collapseTextareaField">
                                <label class="form-check-label text-light fw-bold ppo-cursor-pointer fs-5" for="other" id="otherLabel">
                                    Andet (Uddyb venligst).
                                </label>
                            </div>

                            <div id="collapseTextareaField" class="collapse" aria-labelledby="otherLabel" data-bs-parent="#otherContent">
                                <div class="form-group text-white py-2">
                                    <label for="otherTextareaField" class="fw-bold fs-5 mb-1">Kommentar (valgfrit)</label>
                                    <textarea class="form-control ppo-br-16 bg-white text-dark" name="" id="otherTextareaField" rows="4" placeholder="Fortæl os mere, så vi kan forbedre vores tilbud."></textarea>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>

            </div>

        </div>

        <!-- Plan information Section -->
        <div class="row mb-4 ppo-br-16 ppo-bg-card">
            <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
                <h3 class="text-light fs-3 fw-bold text-center py-1 mb-0">Din planoplysninger</h3>
            </div>

            <div class="p-4">

                <h3 class="fw-bold fs-4 text-white mb-3 d-flex align-items-center">
                    <img src="<?php echo ppo_get_dir("/assets/images/member-stars/$icon.png"); ?>" style="width:32px;" class="me-2" /><?php echo esc_html($plan_name); ?>
                </h3>

                <p class="text-white fs-5 mb-0">Binding</p>

                <p class="text-white fw-bold fs-4 mb-0">Årsplan, forudbetalt - <?php echo esc_html($annual_rate); ?> Kr. / år</p>

            </div>

        </div>
    </div>

    <div id="cancellationSec2" style="display:none;">
        <!-- Reasons for Cancellation -->
        <div class="row mb-4 ppo-br-16 ppo-bg-card">
            <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
                <h3 class="text-light fs-4 fw-bold text-center py-1">Annuller plan</h3>
            </div>

            <div class="d-flex flex-column justify-content-start p-4">

                <div class="mt-2 flex-column justify-content-start flex-column">

                    <h2 class="text-white fw-bold mb-4">
                        Hvis du opsiger din plan idag, sker der følgende.
                    </h2>

                    <!-- TODO -> Plan Type and Purchasing Date -->
                    <p class="text-light fw-bold fs-5 mb-2">1. Du vil ikke længere have en Starter plan, fra d. 24. dec. 2023.</p>

                    <p class="text-light fw-bold fs-5 mb-2">2. Du vil blive nedgraderet til Gratis plan, fra d. 24. dec. 2023.</p>

                    <p class="text-light fw-bold fs-5 mb-2">3. Du vil ikke længere have dine fordele med din plan.</p>

                    <p class="text-light fw-bold fs-5 mb-2">4. Dine potentielle kunder vil få begrænset adgang til din profil, og vil ikke kunne se de funktioner, som din plan giver dig og de fordele har overfor konkurrenterne.</p>

                </div>

            </div>

        </div>
    </div>

    <div id="cancellationSec3" style="display:none;">
        <div class="row mb-4 ppo-br-16 ppo-bg-card">
            <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
                <h3 class="text-light fs-4 fw-bold text-center py-1">Annuller plan</h3>
            </div>

            <div class="d-flex flex-column justify-content-start p-4">

                <div class="mt-2 flex-column justify-content-start flex-column">

                    <h2 class="text-white fw-bold mb-4">
                        "<?php echo esc_html($user->display_name); ?>", overvej disse tilbud, inden du beslutter at opsige:
                    </h2>

                    <div class="text-center mb-4">
                        <img src="<?php echo ppo_get_dir("/assets/images/cancel/question-dark.png"); ?>" style="width:64px;" class="bg-white ppo-br-16" />
                    </div>

                    <!-- TODO -> Plan Type and Purchasing Date -->
                    <p class="text-light fw-bold fs-5 mb-4">Har du brug for hjælp til din plan?</p>

                    <p class="text-light fw-bold fs-5 mb-2">Kæmper du med en tjeneste eller har du tekniske problemer? Få hjælp til det her, eler kontakt os og vi vil gøre vores bedste for at hjælpe dig.</p>

                    <div class="pt-4">
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="<?php echo esc_url(home_url("/contact-us/")); ?>" class="btn fw-bold fs-4 text-light ppo-profile-primary-button ppo-b2-light px-3 me-3 ppo-bg-primary">Kontakt os</a>
                            <a href="<?php echo esc_url(home_url("/help-center/")); ?>" class="btn fw-bold fs-4 text-light ppo-profile-primary-button ppo-b2-light px-3 ppo-bg-primary">Få hjælp</a>

                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="row mb-4 ppo-br-16 ppo-bg-card">
            <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
                <h3 class="text-light fs-4 fw-bold text-center py-1">Annuller plan</h3>
            </div>

            <div class="p-3">

                <!-- Stars -->
                <div class="w-100 ppo-stars-content pt-3" style="gap:1rem;">

					<button class="d-flex btn px-1 text-light fw-bold fs-5" style="flex-direction:column;flex-grow:1;">
                        <div class="ppo-br-12 text-center p-2<?php echo (strtolower($plan_name) == 'gratis' ? ' ppo-b2-light' : ''); ?> d-block w-100 ppo-bg-primary">
                            <img src="<?php echo ppo_get_dir("/assets/images/member-stars/star-black.png") ?>" style="width:30px;" />
                        </div>
                        <p class="text-light mb-2">Gratis</p>
                    </button>
					
					<button class="d-flex btn px-1 text-light fw-bold fs-5" style="flex-direction:column;flex-grow:1;">
                        <div class="ppo-br-12 text-center p-2<?php echo (strtolower($plan_name) == 'basic' ? ' ppo-b2-light' : ''); ?> d-block w-100 ppo-bg-primary">
                            <img src="<?php echo ppo_get_dir("/assets/images/member-stars/star-green.png") ?>" style="width:30px;" />
                        </div>
                        <p class="text-light mb-2">Basic</p>
                    </button>
					
					<button class="d-flex btn px-1 text-light fw-bold fs-5" style="flex-direction:column;flex-grow:1;">
                        <div class="ppo-br-12 text-center p-2<?php echo (strtolower($plan_name) == 'starter' ? ' ppo-b2-light' : ''); ?> d-block w-100 ppo-bg-primary">
                            <img src="<?php echo ppo_get_dir("/assets/images/member-stars/star-yellow.png") ?>" style="width:30px;" />
                        </div>
                        <p class="text-light mb-2">Starter</p>
                    </button>
					
					<button class="d-flex btn px-1 text-light fw-bold fs-5" style="flex-direction:column;flex-grow:1;">
                        <div class="ppo-br-12 text-center p-2<?php echo (strtolower($plan_name) == 'pro' ? ' ppo-b2-light' : ''); ?> d-block w-100 ppo-bg-primary">
                            <img src="<?php echo ppo_get_dir("/assets/images/member-stars/star-light-blue.png") ?>" style="width:30px;" />
                        </div>
                        <p class="text-light mb-2">Pro</p>
                    </button>
					
                    <button class="d-flex btn px-1 text-light fw-bold fs-5" style="flex-direction:column;flex-grow:1;">
                        <div class="ppo-br-12 text-center p-2<?php echo (strtolower($plan_name) == 'premium' ? ' ppo-b2-light' : ''); ?> d-block w-100 ppo-bg-primary">
                            <img src="<?php echo ppo_get_dir("/assets/images/profile/premium.png") ?>" style="width:30px;" />
                        </div>
                        <p class="text-light mb-0">Premium</p>
                    </button>

                </div>

                <!-- Plan Details -->
                <div class="row">
                    <div class="d-flex justify-content-center align-content-center mb-3 px-4 py-2 flex-column">

                        <div class="text-center flex-column">

                            <div class="row pb-4 pt-1">

                                <div class="col text-center">
                                    <div class="py-1 text-center ppo-br-16" style="margin: 0 auto;max-width:50%;background-color:#7c897d;margin-bottom:-3px;border:1px solid red;z-index:1;position: relative;">
                                        <span class="text-light fw-bold fs-4">Pr. år</span>
                                    </div>
                                    <div class="py-2 w-100 ppo-br-16" style="background-color:#7c897d;">
                                        <p class="text-light fw-bold fs-1 m-0"><?php echo esc_html($annual_rate); ?> Kr.</p>
                                        <p class="text-light fw-bold fs-5 m-0"><?php echo (intval($annual_rate)/12); ?> Kr. månedlige</p>
                                    </div>
                                </div>

                                <div class="col justify-content-center align-content-center">
                                    <div class="py-1 text-center ppo-br-16" style="margin: 0 auto;max-width:50%;background-color:#7c897d;margin-bottom:-3px;border:1px solid red;z-index:1;position: relative;">
                                        <span class="text-light fw-bold fs-4">Pr. måned</span>
                                    </div>
                                    <div class="py-2 w-100 ppo-br-16" style="background-color:#7c897d;">
                                        <p class="text-light fw-bold fs-1 m-0"><?php echo esc_html($month_rate); ?> Kr.</p>
                                        <p class="text-light fw-bold fs-5 m-0"><?php echo (intval($month_rate)*12); ?> Kr. årlig</p>
                                    </div>
                                </div>

                            </div>

                            <h3 class="text-light fw-bold">Spar <?php echo esc_html($saved_percentage); ?> ved at betale arligt!</h2>
                                <h4 class="text-light">(Alle priser er med moms)</h4>
                        </div>

                    </div>

                </div>

                <div class="text-center">
                    <a href="<?php echo esc_url(home_url('/'.strtolower(esc_html($plan_name)).'-plan/')); ?>" class="btn py-1 px-3 mb-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow w-auto ppo-bg-primary">
                        <span class="text-light fs-4">
                            Laes mere om <?php echo esc_html($plan_name); ?> plan
                        </span>
                    </a>
                </div>

            </div>


        </div>
    </div>

    <div id="cancellationSec4" style="display:none;">
        <div class="row mb-4 ppo-br-16 ppo-bg-card">
            <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
                <h3 class="text-light fs-4 fw-bold text-center py-1">Annuller plan</h3>
            </div>

            <div class="d-flex flex-column justify-content-start p-4">

                <div class="mt-2 flex-column justify-content-start flex-column">

                    <h2 class="text-white fw-bold mb-4">
                        Gennemgå hvad der sker, når du opsiger
                    </h2>

                    <!-- TODO -> Plan Type and Purchasing Date -->
                    <p class="text-light fw-bold fs-5 mb-4">Opsigelses oplysningerne omfatter:</p>

                    <div class="">

                        <div class="d-flex justify-content-start align-items-start mb-3">
                            <img src="<?php echo ppo_get_dir("/assets/images/cancel/timetable.png") ?>" style="width:32px;padding-top:6px;" />

                            <div class="ms-2">
                                <h4 class="mb-0 text-white">Plandato</h4>
                                <p class="mb-0 text-white">Din plan slutter på faktureringsdato <b>24. dec. 2013</b>.</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start align-items-start mb-3">
                            <img src="<?php echo ppo_get_dir("/assets/images/member-stars/star-black.png") ?>" style="width:32px;padding-top:6px;" />

                            <div class="ms-2">
                                <h4 class="mb-0 text-white">Plan version</h4>
                                <p class="mb-0 text-white">Efter <b>24. dec. 2013</b> vil din konto plan ændres til Gratis.</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start align-items-start mb-3">
                            <img src="<?php echo ppo_get_dir("/assets/images/cancel/lock.png") ?>" style="width:32px;padding-top:6px;" />

                            <div class="ms-2">
                                <p class="mb-0 text-white">Du vil miste en masse funcktioner af visning af din profil, da den gratis plan har nedsatte funktioner og knapper på ens profil til kunderne.</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div id="cancellationSec5" style="display:none;">
        <div class="row mb-4 ppo-br-16 ppo-bg-card">
            <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary">
                <h3 class="text-light fs-4 fw-bold text-center py-1">Annullering fuldført</h3>
            </div>

            <div class="p-4">

                <p class="text-light fw-bold fs-5 mb-4">Din annullering er nu fuldført, og du vil modtage en bekræftigelse på mail om få minutter.</p>

                <p class="text-light fw-bold fs-5 mb-4">Vi er kede af ikke at have levet op til dine behov, og håber på at ses igen.</p>

                <p class="text-light fw-bold fs-5 mb-4">På gensyn.</p>

                <p class="text-light fw-bold fs-5 mb-5">M.v.h<br />Find Din PPO Teamet</p>

                <div class="text-center">
                    <?php
                    if (function_exists('the_custom_logo')) the_custom_logo();
                    ?>
                </div>

            </div>

        </div>

    </div>

    <!-- Action Buttons -->
    <div class="mb-3" id="ppoActionBtnContainer">
        <div class="d-flex justify-content-between ppo-br-16 align-items-center p-3 ppo-box-shadow ppo-bg-card">
            <a href="<?php echo esc_url(home_url("/tak/")); ?>" class="btn fw-bold text-light ppo-profile-primary-button ppo-b2-light px-3 ppo-bg-primary">Luk</a>
            <button id="ppoContinueBtn" class="btn fw-bold text-light ppo-profile-primary-button ppo-b2-light bg-transparent px-3">Fortsæt</button>
        </div>
    </div><!-- .action-button -->

</article><!-- #post-<?php the_ID(); ?> -->

<!-- Modal -->
<?php ppo_cancel_modal(); ?>

<script type="text/javascript" defer>
    "use strict";
    let idx = 1;
    jQuery("#ppoContinueBtn").on("click", (e) => {
        if (jQuery("#changePlan").prop("checked") || jQuery("#expensive").prop("checked")) return

        jQuery(`#cancellationSec${idx}`).fadeOut("fast");
        idx++;
        jQuery(`#cancellationSec${idx}`).fadeIn("slow");

        if (idx == 4) jQuery("#ppoContinueBtn").text("Bekræft").removeClass("ppo-b2-light").removeClass("text-white").addClass("ppo-b2-red").addClass("ppo-color-red")

        if (idx > 4) jQuery("#ppoActionBtnContainer").fadeOut("fast")
        // }
    });

    jQuery('#changePlan').on("change", (e) => {
        if (jQuery("#changePlan").prop("checked")) jQuery("#ppoContinueBtn").attr("data-bs-toggle", "modal").attr("data-bs-target", "#reasonOfCancelPopup")

        else {
            if (!jQuery("#expensive").is(":checked")) jQuery("#ppoContinueBtn").removeAttr("data-bs-toggle").removeAttr("data-bs-target")
        }
    });

    jQuery('#expensive').on("change", (e) => {
        if (jQuery("#expensive").prop("checked")) jQuery("#ppoContinueBtn").attr("data-bs-toggle", "modal").attr("data-bs-target", "#reasonOfCancelPopup")

        else {
            if (!jQuery("#changePlan").is(":checked")) jQuery("#ppoContinueBtn").removeAttr("data-bs-toggle").removeAttr("data-bs-target")
        }
    });
</script>