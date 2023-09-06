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
$user_email = $user ? $user->user_email : '';

$plan_name = $user_id ? ppo_get_daycare_subscription_plan($user_id) : 'gratis';

$plan_data = ppo_subscription_detail($plan_name);

$icon = trim($plan_data['icon']);
$plan_name = $plan_data['plan'];
$annual_rate = $plan_data['annual_rate'];
$month_rate = $plan_data['month_rate'];

$certificates = ppo_get_daycare_user_certificates_owned($user_id) ? explode(",", ppo_get_daycare_user_certificates_owned($user_id)) : [];

// Personal Info
$road_number = ppo_get_daycare_road_number($user_id);
$building = ppo_get_daycare_building($user_id);
$house_number = ppo_get_daycare_house_number($user_id);
$post_code = ppo_get_daycare_postcode($user_id);
$does_smoke = ppo_get_daycare_user_does_smoke($user_id);
$kids_number = ppo_get_daycare_kids_number($user_id);
$mail_address = $user_email;
$tele_number = ppo_get_daycare_telephone_number($user_id);

$description = ppo_get_daycare_description($user_id);

// Store the year to
// the variable
$current_year = date("Y");
$next_year = intval($current_year) + 1;
$next_of_next_year = intval($next_year) + 1;

$price_included_items = ppo_get_daycare_user_included_in_price($user_id);
$bring_users_own_items = ppo_get_daycare_user_bring_your_own($user_id);
$keyword_items = ppo_get_daycare_user_keywords($user_id);

$price_included_item_arr = $price_included_items ? explode(',', $price_included_items) : [];
$bring_users_own_item_arr = $bring_users_own_items ? explode(',', $bring_users_own_items) : [];
$keyword_arr = $keyword_items ? explode(',', $keyword_items) : [];

$first_half_month_list = ['jan','feb','mar','apr','maj','jun'];
$last_half_month_list = ['jul','aug','sep','okt','nov','dec'];

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
        <div class="ppo-br-16 py-2 px-5 w-auto ppo-bg-secondary d-inline-flex">
            <h3 class="text-light fs-4 fw-bold mb-0">Din plan: <img src="<?php echo ppo_get_dir("/assets/images/member-stars/$icon.png") ?>" style="width: 30px;" /> <?php echo esc_html($plan_name); ?></h3>
        </div>
    </div>

    <!-- Top First Action Button -->
    <div class="row mb-4 justify-content-center">
        <div class="ppo-br-16 py-2 px-5 w-auto ppo-bg-secondary d-inline-flex">
            <h3 class="text-light fs-4 fw-bold mb-0">Udløber: 4/6/2023</h3>
        </div>
    </div>

    <!-- Plan Tabs Section -->
    <div class="row mb-5 px-3 py-2 justify-content-center ppo-br-20 ppo-bg-tab-section">

        <h1 class="fs-1 fw-bold text-light mb-1 text-center text-capitalize">
            <?php echo esc_html($user->display_name); ?>
        </h1>

        <div id="ppoTabs" class="d-flex justify-content-between my-2" style="gap:1rem;">
            <button class="d-flex btn justify-content-center text-light fs-5 ppo-plan-act-button active" style="flex-grow:1;" data-tab-content="#ppoChatTabContent">Beskeder</button>

            <button class="d-flex btn justify-content-center text-light fs-5 ppo-plan-act-button" style="flex-grow:1;" data-tab-content="#ppoSettingsTabContent">Indstillinger</button>

            <button class="d-flex btn justify-content-center text-light fs-5 ppo-plan-act-button" style="flex-grow:1;" data-tab-content="#ppoSubscriptionTabContent">Abonnement</button>
        </div>

    </div>

    <!-- Tab Content Section | Chat -->
    <div id="ppoChatTabContent" class="ppo-tab-content">
        <!-- Chat Room -->
        <?php ppo_chat_room(); ?>
    </div>

    <!-- Tab Content Section | Subscription -->
    <div id="ppoSubscriptionTabContent" class="ppo-tab-content" style="display:none;">
        <div class="row mb-3">
            <div class="p-0  ppo-br-16 ppo-bg-card">

                <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary ppo-br-16">
                    <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">Planer</h3>
                </div>

                <div class="p-3">

                    <div class="w-100 mb-2 text-center">
                        <div class="ppo-br-16 py-2 px-5 w-auto ppo-bg-secondary d-inline-flex">
                            <h3 class="text-light fs-4 fw-bold mb-0">Din plan: <img src="<?php echo ppo_get_dir("/assets/images/member-stars/$icon.png") ?>" style="width: 30px;" /> <?php echo esc_html($plan_name); ?></h3>
                        </div>
                    </div>

                    <div class="mb-2 text-center">
                        <div class="ppo-br-16 py-2 px-5 w-auto ppo-bg-secondary d-inline-flex">
                            <h3 class="text-light fs-4 fw-bold mb-0">Udløber: 4/6/2023</h3>
                        </div>
                    </div>

                    <!-- Stars -->
                    <div class="w-100 ppo-stars-content pt-3" style="gap:1rem;">
						
						<?php
							$plans = ppo_get_subscription_plan_list();
							foreach( $plans as $plan => $plan_detail ) :
						?>
								<button class="d-flex btn px-1 text-light fw-bold fs-5 flex-column" style="flex-grow:1;">
									<div class="ppo-br-12 text-center p-2<?php echo ($plan == strtolower($plan_name) ? ' ppo-b2-light' : ''); ?> ppo-bg-primary d-block w-100">
										<img src="<?php echo $plan_detail['star_icon']; ?>" style="width:30px;" />
									</div>
									<p class="text-light mb-2"><?php echo $plan_detail['plan']; ?></p>
								</button>
						<?php endforeach; ?>
						
                    </div>

                    <!-- Plan Details -->
                    <div class="row">
                        <div class="d-flex flex-column mb-3 px-4 py-2">

                            <h3 class="text-light fw-bold text-center">Ingen omkostninger</h2>
                            <h4 class="text-light text-center">Meget nedsat funktioner</h4>

                        </div>

                    </div>

                    <div class="text-center">
                        <button class="btn py-1 px-3 mb-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow text-light fs-4 w-auto ppo-bg-primary" data-bs-toggle="modal" data-bs-target="#ppoManagePlanPage">
                            Administrer plan
                        </button>
                    </div>

                </div>

            </div>
        </div>

        <div class="row mb-4 ppo-br-16 ppo-bg-card">
            <div class="ppo-br-16 ppo-box-shadow ppo-bg-primary">
                <h3 class="text-light fs-4 fw-bold text-center py-1">Fakturering & betaling</h3>
            </div>


            <div class="mt-4 mb-3 px-4 flex-column justify-content-start">

                <div class="d-flex justify-content-start align-items-center mb-3">
                    <img class="me-4" src="<?php echo ppo_get_dir("/assets/images/subscription-plans/credit-card.png") ?>" style="width:2.5rem;padding-top:6px;" />

                    <div class="ms-2">
                        <p class="mb-0 text-white fw-bold">Visa, der ender på ****1741</p>
                    </div>
                </div>

                <div class="d-flex justify-content-start align-items-start mb-3">
                    <img class="me-4" src="<?php echo ppo_get_dir("/assets/images/home/timetable.png") ?>" style="width:2.5rem;padding-top:6px;" />

                    <div class="ms-2">
                        <p class="mb-0 text-white fw-bold"><?php echo $annual_rate; ?> Kr./år</p>
                        <p class="mb-0 text-white fw-bold">Næste betaling er 29 sep. 2024</p>
                        <p class="mb-0 text-white fw-bold">Årsplan, forudbetalt</p>
                    </div>
                </div>

                <div class="d-flex justify-content-start align-items-center mb-3">
                    <img class="me-4" src="<?php echo ppo_get_dir("/assets/images/subscription-plans/billing.png") ?>" style="width:2.5rem;padding-top:6px;" />

                    <div class="ms-2">
                        <a href="<?php echo esc_url(home_url("/invoice/")); ?>" class="btn py-1 px-3 ppo-br-12 align-content-center justify-content-center ppo-b2-light w-auto ppo-bg-primary">
                            <span class="text-light fs-6">
                                Vis faktureringshistorik
                            </span>
                        </a>
                    </div>
                </div>


            </div>

            <div class="text-center mb-3">
                <button class="btn py-1 px-3 mb-3 ppo-br-16 align-content-center justify-content-center ppo-b3-light ppo-box-shadow text-light fs-4 w-auto ppo-bg-primary" data-bs-toggle="modal" data-bs-target="#ppoEditBillingNPaymentPage">
                    Rediger fakturering & betaling
                </button>
            </div>

        </div>
    </div>

    <!-- Tab Content Section | Settings -->
    <div id="ppoSettingsTabContent" class="ppo-tab-content" style="display:none;">

        <!-- Top Buttons -->
        <div class="row mb-5 px-3 py-2 justify-content-center ppo-br-20 w-75 ppo-bg-tab-section m-auto">

            <div id="ppoSettingsTabs" class="d-flex justify-content-between py-2" style="gap:1rem;">
				<!-- Preview -->
                <button class="d-flex btn justify-content-center text-light fs-5 ppo-plan-act-button active" style="flex-grow:1;" data-tab-content="#ppoProfilePreviewTabContent">Forhåndsvisning</button> 
				<!-- Profile settings -->
                <button class="d-flex btn justify-content-center text-light fs-5 ppo-plan-act-button" style="flex-grow:1;" data-tab-content="#ppoProfileSettingsTabContent">Profilindstillinger</button> 
            </div>
        </div>

        <!-- Profile Preview Tab Content -->
        <div id="ppoProfilePreviewTabContent" class="ppo-settings-tab-content">

            <div class="entry-header mb-3">
                <div class="row position-relative p-2 ppo-box-shadow ppo-br-16 ppo-bg-secondary">

                    <h2 class="fs-3 fw-bold text-light text-center text-capitalize" id="ppoDisplayNameLargePreview">
                        <?php echo esc_html($user->display_name); ?>
                    </h2>

<!--                     <a href="#!" rel="" title="" alt="" style="padding: 0 0 0 4px; top:10px;right:20px;" class="position-absolute w-auto text-decoration-none">
                        <img src="<?php echo ppo_get_dir('/assets/images/profile/heart-outline.png'); ?>" style="width:35px;height:35px;" />
                    </a> -->

                </div>
            </div><!-- .entry-header -->

            <div class="profile-content mb-3">
                <div class="row px-1 py-3 ppo-box-shadow ppo-br-16 ppo-bg-card">

                    <div class="col-4">
                        <div class="mb-3">
                            <img id="ppoProfilePicPreview" src="<?php echo esc_url(get_avatar_url($user_id)); ?>" class="d-block ppo-br-16 w-100" />
                        </div>
                        <h2 class="fs-5 text-light text-capitalize" id="ppoDisplayNamePreview"><?php echo esc_html($user->display_name); ?></h2>
                    </div>

                    <div class="col-8">

                        <div class="d-inline-flex justify-content-center align-items-center ppo-bg-secondary ppo-br-16 px-2 py-1 mb-2 m-1" style="gap:6px;">
                            <img src="<?php echo ppo_get_dir('/assets/images/profile/mailbox-outline.png'); ?>" style="width:20px;" />
                            <span class="fs-4 fw-bold text-light" id="ppoPostCodePreview"><?php echo esc_html($post_code); ?></span>
                        </div>

                        <div class="d-inline-flex justify-content-center align-items-center ppo-bg-secondary ppo-br-16 px-2 py-1 mb-2 m-1" style="gap:6px;">
                            <img src="<?php echo ppo_get_dir('/assets/images/profile/condo.png'); ?>" style="width:20px;" />
                            <span class="fs-4 fw-bold text-light" id="ppoBuildingPreview"><?php echo esc_html($building); ?></span>
                        </div>

                        <div class="d-inline-flex justify-content-center align-items-center ppo-bg-secondary ppo-br-16 px-2 py-1 mb-2 m-1" style="gap:6px;">
                            <img src="<?php echo ppo_get_dir('/assets/images/profile/location-outline.png'); ?>" style="width:20px;" />
<!--                             <span class="fs-4 fw-bold text-light" id="ppoAddressPreview">Hus nr. <?php echo esc_html($house_number); ?>, Vej nr. <?php echo esc_html($road_number); ?></span> -->
							<span class="fs-4 fw-bold text-light" id="ppoAddressPreview"><?php echo esc_html($post_code); ?> <?php echo esc_html($building); ?></span>
                        </div>

                        <div class="d-inline-flex justify-content-center align-items-center ppo-bg-secondary ppo-br-16 px-2 py-1 mb-2 m-1" style="gap:6px;">
                            <img src="<?php echo ppo_get_dir('/assets/images/profile/smoking.png'); ?>" style="width:20px;" />
                            <span class="fs-6 text-light" id="ppoSmokingStatusPreview"><?php echo ($does_smoke ? "Ryger" : "Ikke ryger" ); ?></span>
                        </div>

                        <div class="d-inline-flex justify-content-center align-items-center ppo-bg-secondary ppo-br-16 px-2 py-1 mb-2 m-1" style="gap:6px;">
                            <img src="<?php echo ppo_get_dir('/assets/images/profile/baby-boy.png'); ?>" style="width:20px;" />
                            <span class="fs-6 fw-bold text-light">Max antal born: <span id="ppoKidsNumberPreview"><?php echo $kids_number; ?></span></span>
                        </div>

                        <div class=" mb-2 mt-2" style="display:flex;gap:0.5rem;">
                            <a id="ppoEmailPreview" href="mailto:<?php echo esc_html($user->user_email); ?>" class="btn d-inline-flex justify-content-between align-items-center px-3 py-2 fw-bold text-light ppo-profile-primary-button" style="">
                                <img src="<?php echo ppo_get_dir('/assets/images/profile/mail-outline.png') ?>" style="width:20px;margin-right:8px;" />
                                <span class="fs-5">Skriv besked</span>
                            </a>
                            <a id="ppoTelephoneNumberPreview" href="tel:<?php echo $tele_number; ?>" class="btn d-inline-flex justify-content-between align-items-center px-3 py-1 fw-bold text-light ppo-profile-accent-button" style="">
                                <img src="<?php echo ppo_get_dir('/assets/images/profile/phone-call-outline.png') ?>" style="width:20px;margin-right:8px;" />
                                <span class="fs-5">Ring</span>
                            </a>
                        </div>

                    </div>

                </div>
            </div><!-- .profile-content -->

            <!-- Profile Info Buttons -->
            <div id="profileInfoTab" class="row mb-3 p-2 d-flex flex-row justify-content-between ppo-br-16 ppo-bg-card">
                <button class="btn text-light fw-bold w-25 me-1 ppo-br-16 ppo-bg-secondary active" data-tab-content="#generalInfo">Generelt info</button>

                <button class="btn text-light fw-bold w-25 me-1 ppo-br-16 ppo-bg-secondary" data-tab-content="#priceDetail">Pris & udstyr</button>

                <button class="btn text-light fw-bold w-25 me-1 ppo-br-16 ppo-bg-secondary" data-tab-content="#annualPlannerAndCertificate">Årsplan & Certifikater</button>

                <button class="btn text-light fw-bold w-auto ppo-br-16 ppo-bg-secondary" style="flex-grow:1;" data-tab-content="#holidays">Ferier</button>
            </div>

            <!-- Tab Contents -->
            <!-- General Info -->
            <div id="generalInfo" class="ppo-preview-tab-content">
                <!-- Profile Description -->
                <div class="row mb-3 ppo-br-16 ppo-bg-card">
                    <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                        <h3 class="text-light fs-5 fw-bold">Beskrivelse</h3>
                    </div>

                    <div class="ppo-profile-section-content p-3">
						<?php echo $description ? '<p class="text-white fs-6 mb-2" id="ppoDescriptionPreview">' . $description . '</p>' : ''; ?>
                    </div>
                </div>

                <!-- Calendar Available Spots -->
                <div class="row mb-3 ppo-br-16 ppo-bg-card">
                    <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                        <h3 class="text-light fs-5 fw-bold">Ledige pladser</h3>
                    </div>

                    <!-- Years -->
                    <div class="row py-2 mb-3">

                        <div class="col-2"></div>
						
                        <div class="col-3">
                            <button class="btn text-light fw-bold fs-5  ppo-profile-cal-button active" data-ppo-spot-year="<?php echo trim($current_year); ?>"><?php echo trim($current_year); ?></button>
                        </div>
                        <div class="col-3">
                            <button class="btn text-light fw-bold fs-5  ppo-profile-cal-button" data-ppo-spot-year="<?php echo trim($next_year); ?>"><?php echo $next_year; ?></button>
                        </div>
                        <div class="col-3">
                            <button class="btn text-light fw-bold fs-5  ppo-profile-cal-button" data-ppo-spot-year="<?php echo trim($next_of_next_year); ?>"><?php echo $next_of_next_year; ?></button>
                        </div>
                        <div class="col-1"></div>
                    </div>
					
					<!-- Months  - First 1/2 -->
					<div class="d-flex justify-content-between flex-wrap mb-3 px-4" style="gap:0.5rem;">
						<?php

						foreach($first_half_month_list as $month ) :
						?>
							<button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16 text-capitalize disabled" data-ppo-spot-month="<?php echo $month; ?>" style="flex-grow:1;"><?php echo $month; ?></button>
						<?php
						endforeach;
						?>
					</div>
					<!-- Months  - Last 1/2 -->
					<div class="d-flex justify-content-between flex-wrap mb-3 px-4" style="gap:0.5rem;">
						<?php
						foreach($last_half_month_list as $month ) :
						?>
							<button class="btn text-light fw-bold fs-6 ppo-bg-primary ppo-br-16 text-capitalize disabled" data-ppo-spot-month="<?php echo $month; ?>" style="flex-grow:1;"><?php echo $month; ?></button>
						<?php
						endforeach;
						?>

					</div>

                </div>

                <!-- Keywords -->
				<div class="row mb-3 ppo-br-16 ppo-bg-card">
					<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
						<h3 class="text-light fs-5 fw-bold">Nøgleord</h3>
					</div>

					<!-- Keywords -->
					<?php
							if( count($keyword_arr) ) : ?>
								<div class="ppo-prof-keyword-content py-3" id="ppoKeywordsPreview">
						<?php
								foreach($keyword_arr as $keyword ) :
						?>
									<button class="btn text-dark bg-light fw-bold fs-5"><?php echo esc_html($keyword); ?></button>
						<?php
								endforeach;
						?>
								</div>
						<?php
							else :
							?>
								<div class="py-3" id="ppoKeywordsPreview">
									<p class="text-white fs-5 text-center fw-bold mb-0">
										Ingen information
									</p>

								</div>
					<?php
							endif;
						?>
				</div>

            </div>

            <!-- Price Detail -->
            <div id="priceDetail" class="ppo-preview-tab-content" style="display:none;">
                <!-- Price Description -->
                <div class="row mb-3 ppo-br-16 ppo-bg-card">
                    <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                        <h3 class="text-light fs-5 fw-bold">Pris</h3>
                    </div>

					<?php
					$daycare_monthly_rate = ppo_get_daycare_user_monthly_rate($user_id);
					$daycare_municipality_subsidy_rate = ppo_get_daycare_user_municipality_subsidy_rate($user_id);
					$daycare_total = ppo_get_daycare_user_total_price($user_id);
					?>
					
                    <div class="row p-0 pt-3 mb-3 ms-1">
                        <div class="col d-flex flex-column justify-content-between align-items-center">
                            <p class="text-white mb-1 text-center">Egen betaling pr. maned</p>
                            <button class="btn fw-bold bg-white w-75 ppo-br-16" id="ppoDaycareMonthlyRatePreview"><?php echo $daycare_monthly_rate; ?> ,-</button>
                        </div>
                        <div class="col d-flex flex-column justify-content-between align-items-center">
                            <p class="text-white mb-1 text-center">Kommunens tilskud</p>
                            <button class="btn fw-bold bg-white w-75 ppo-br-16" id="ppoDaycareMunicipalitySubsidyRatePreview"><?php echo $daycare_municipality_subsidy_rate; ?> ,-</button>
                        </div>
                        <div class="col d-flex flex-column justify-content-between align-items-center">
                            <p class="text-white mb-1 text-center">Samlet pris</p>
                            <button class="btn fw-bold bg-white w-75 ppo-br-16" id="ppoDaycareTotalPreview"><?php echo $daycare_total; ?> ,-</button>
                        </div>
                    </div>
                </div>

                <!-- Included in the price -->
                <div class="row mb-3 ppo-br-16 ppo-bg-card">
                    <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                        <h3 class="text-light fs-5 fw-bold">Inkluderet i prisen</h3>
                    </div>

                    <!-- Included Items -->
                    <div class="ppo-prof-keyword-content py-3" id="ppoPricesIncludedItemsPreview">
						<?php
							if( count($price_included_item_arr) ) :
								foreach($price_included_item_arr as $included_item ) :
						?>
									<button class="btn text-dark bg-light fw-bold fs-5"><?php echo esc_html($included_item); ?></button>
						<?php
								endforeach;
							else :
							?>
								<p class="text-white fs-5 text-center fw-bold">
									Ingen information
								</p>
							<?php
							endif;
						?>

                    </div>

                </div>

                <!-- Bring User's own -->
                <div class="row mb-3 ppo-br-16 ppo-bg-card">
                    <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                        <h3 class="text-light fs-5 fw-bold">Medbring selv</h3>
                    </div>

                    <!-- Items -->
                    <div class="ppo-prof-keyword-content py-3" id="ppoUserOwnItemsPreview">
						<?php
							if( count($bring_users_own_item_arr) ) :
								foreach($bring_users_own_item_arr as $own_item ) :
						?>
									<button class="btn text-dark bg-light fw-bold fs-5"><?php echo esc_html($own_item); ?></button>
						<?php
								endforeach;
							else :
							?>
								<p class="text-white fs-5 text-center fw-bold">
									Ingen information
								</p>
							<?php
							endif;
						?>

                    </div>
                </div>

            </div>

            <!-- Annual Planner and Certificate Detail -->
            <div id="annualPlannerAndCertificate" class="ppo-preview-tab-content" style="display:none;">

                <!-- Certificates -->
                <div class="row mb-3 ppo-br-16 ppo-bg-card">
                    <div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
                        <h3 class="text-light fs-5 fw-bold">Certificater</h3>
                    </div>

                    <div class="d-flex justify-content-start pt-3 mb-3" id="ppoCertificatesPreview">
						<?php if(is_array($certificates) && count($certificates)) : ?>
							<?php foreach( $certificates as $certificate ) : ?>
								<div class="mx-1">
									<div class="px-3 py-1 fw-bold bg-white w-auto ppo-br-16"><?php echo esc_html(trim($certificate)); ?></div>
								</div>
							<?php endforeach; ?>
						<?php else : ?>
							<p class="text-white fs-5">Ingen tilgængelige certifikater!</p>
						<?php endif; ?>
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
                                <h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">Januar</h4>
                                <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanJanHeadingPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_jan_heading($user->ID) ? ppo_get_daycare_user_annual_plan_jan_heading($user->ID) : 'Ingen overskrift');
									?>
								</h4>
                            </div>
                            <div class="my-1">
                                <p class="text-white mb-1" id="ppoAnnualPLanJanDescriptionPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_jan_description($user->ID) ? ppo_get_daycare_user_annual_plan_jan_description($user->ID) : 'Ingen beskrivelse');
									?>
								</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="position-relative">
                                <h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">Februar</h4>
                                <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanFebHeadingPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_feb_heading($user->ID) ? ppo_get_daycare_user_annual_plan_feb_heading($user->ID) : 'Ingen overskrift');
									?>
								</h4>
                            </div>
                            <div class="my-1">
                                <p class="text-white mb-1" id="ppoAnnualPLanFebDescriptionPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_feb_description($user->ID) ? ppo_get_daycare_user_annual_plan_feb_description($user->ID) : 'Ingen beskrivelse');
									?>
								</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="position-relative">
                                <h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">Marts</h4>
                                <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanMarHeadingPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_mar_heading($user->ID) ? ppo_get_daycare_user_annual_plan_mar_heading($user->ID) : 'Ingen overskrift');
									?>
								</h4>
                            </div>
                            <div class="my-1">
                                <p class="text-white mb-1" id="ppoAnnualPLanMarDescriptionPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_mar_description($user->ID) ? ppo_get_daycare_user_annual_plan_mar_description($user->ID) : 'Ingen beskrivelse');
									?>
								</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="position-relative">
                                <h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">April</h4>
                                <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanAprHeadingPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_apr_heading($user->ID) ? ppo_get_daycare_user_annual_plan_apr_heading($user->ID) : 'Ingen overskrift');
									?>
								</h4>
                            </div>
                            <div class="my-1">
                                <p class="text-white mb-1" id="ppoAnnualPLanAprDescriptionPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_apr_description($user->ID) ? ppo_get_daycare_user_annual_plan_apr_description($user->ID) : 'Ingen beskrivelse');
									?>
								</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="position-relative">
                                <h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">Maj</h4>
                                <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanMayHeadingPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_may_heading($user->ID) ? ppo_get_daycare_user_annual_plan_may_heading($user->ID) : 'Ingen overskrift');
									?>
								</h4>
                            </div>
                            <div class="my-1">
                                <p class="text-white mb-1" id="ppoAnnualPLanMayDescriptionPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_may_description($user->ID) ? ppo_get_daycare_user_annual_plan_may_description($user->ID) : 'Ingen beskrivelse');
									?>
								</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="position-relative">
                                <h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">Juni</h4>
                                <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanJunHeadingPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_jun_heading($user->ID) ? ppo_get_daycare_user_annual_plan_jun_heading($user->ID) : 'Ingen overskrift');
									?>
								</h4>
                            </div>
                            <div class="my-1">
                                <p class="text-white mb-1" id="ppoAnnualPLanJunDescriptionPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_jun_description($user->ID) ? ppo_get_daycare_user_annual_plan_jun_description($user->ID) : 'Ingen beskrivelse');
									?>
								</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="position-relative">
                                <h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">Juli</h4>
                                <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanJulHeadingPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_jul_heading($user->ID) ? ppo_get_daycare_user_annual_plan_jul_heading($user->ID) : 'Ingen overskrift');
									?>
								</h4>
                            </div>
                            <div class="my-1">
                                <p class="text-white mb-1" id="ppoAnnualPLanJulDescriptionPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_jul_description($user->ID) ? ppo_get_daycare_user_annual_plan_jul_description($user->ID) : 'Ingen beskrivelse');
									?>
								</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="position-relative">
                                <h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">August</h4>
                                <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanAugHeadingPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_aug_heading($user->ID) ? ppo_get_daycare_user_annual_plan_aug_heading($user->ID) : 'Ingen overskrift');
									?>
								</h4>
                            </div>
                            <div class="my-1">
                                <p class="text-white mb-1" id="ppoAnnualPLanAugDescriptionPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_aug_description($user->ID) ? ppo_get_daycare_user_annual_plan_aug_description($user->ID) : 'Ingen beskrivelse');
									?>
								</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="position-relative">
                                <h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">September</h4>
                                <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanSepHeadingPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_sep_heading($user->ID) ? ppo_get_daycare_user_annual_plan_sep_heading($user->ID) : 'Ingen overskrift');
									?>
								</h4>
                            </div>
                            <div class="my-1">
                                <p class="text-white mb-1" id="ppoAnnualPLanSepDescriptionPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_sep_description($user->ID) ? ppo_get_daycare_user_annual_plan_sep_description($user->ID) : 'Ingen beskrivelse');
									?>
								</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="position-relative">
                                <h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">Oktober</h4>
                                <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanOctHeadingPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_oct_heading($user->ID) ? ppo_get_daycare_user_annual_plan_oct_heading($user->ID) : 'Ingen overskrift');
									?>
								</h4>
                            </div>
                            <div class="my-1">
                                <p class="text-white mb-1" id="ppoAnnualPLanOctDescriptionPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_oct_description($user->ID) ? ppo_get_daycare_user_annual_plan_oct_description($user->ID) : 'Ingen beskrivelse');
									?>
								</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="position-relative">
                                <h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">November</h4>
                                <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanNovHeadingPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_nov_heading($user->ID) ? ppo_get_daycare_user_annual_plan_nov_heading($user->ID) : 'Ingen overskrift');
									?>
								</h4>
                            </div>
                            <div class="my-1">
                                <p class="text-white mb-1" id="ppoAnnualPLanNovDescriptionPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_nov_description($user->ID) ? ppo_get_daycare_user_annual_plan_nov_description($user->ID) : 'Ingen beskrivelse');
									?>
								</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="position-relative">
                                <h4 class="d-inline-block text-white px-2 py-1 ppo-br-12 ppo-bg-secondary">December</h4>
                                <h4 class="position-absolute text-dark bg-white ppo-br-12 bg-white text-center px-2 py-1 fs-5" style="top:0;left:50%;transform:translateX(-50%);" id="ppoAnnualPLanDecHeadingPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_dec_heading($user->ID) ? ppo_get_daycare_user_annual_plan_dec_heading($user->ID) : 'Ingen overskrift');
									?>
								</h4>
                            </div>
                            <div class="my-1">
								<p class="text-white mb-1" id="ppoAnnualPLanDecDescriptionPreview">
									<?php
										echo (ppo_get_daycare_user_annual_plan_dec_description($user->ID) ? ppo_get_daycare_user_annual_plan_dec_description($user->ID) : 'Ingen beskrivelse');
									?>
								</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Holiday Details -->
            <div id="holidays" class="ppo-preview-tab-content" style="display:none;">

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
								<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanJanPreview">
									<?php
										echo (ppo_get_daycare_user_holliday_plan_jan_description($user->ID) ? ppo_get_daycare_user_holliday_plan_jan_description($user->ID) : '');
									?>
								</p>
                            </div>

                        </div>

                        <div class="my-3">
                            <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Februar</h4>
								<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanFebPreview">
									<?php
										echo (ppo_get_daycare_user_holliday_plan_feb_description($user->ID) ? ppo_get_daycare_user_holliday_plan_feb_description($user->ID) : '');
									?>
								</p>

                            </div>

                        </div>

                        <div class="my-3">
                            <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Marts</h4>
								<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanMarPreview">
									<?php
										echo (ppo_get_daycare_user_holliday_plan_mar_description($user->ID) ? ppo_get_daycare_user_holliday_plan_mar_description($user->ID) : '');
									?>
								</p>

                            </div>

                        </div>

                        <div class="my-3">
                            <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">April</h4>
								<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanAprPreview">
									<?php
										echo (ppo_get_daycare_user_holliday_plan_apr_description($user->ID) ? ppo_get_daycare_user_holliday_plan_apr_description($user->ID) : '');
									?>
								</p>

                            </div>

                        </div>

                        <div class="my-3">
                            <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Maj</h4>
								<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanMayPreview">
									<?php
										echo (ppo_get_daycare_user_holliday_plan_may_description($user->ID) ? ppo_get_daycare_user_holliday_plan_may_description($user->ID) : '');
									?>
								</p>

                            </div>

                        </div>

                        <div class="my-3">
                            <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Juni</h4>
								<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanJunPreview">
									<?php
										echo (ppo_get_daycare_user_holliday_plan_jun_description($user->ID) ? ppo_get_daycare_user_holliday_plan_jun_description($user->ID) : '');
									?>
								</p>

                            </div>

                        </div>

                        <div class="my-3">
                            <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">Juli</h4>
								<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanJulPreview">
									<?php
										echo (ppo_get_daycare_user_holliday_plan_jul_description($user->ID) ? ppo_get_daycare_user_holliday_plan_jul_description($user->ID) : '');
									?>
								</p>

                            </div>

                        </div>

                        <div class="my-3">
                            <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">August</h4>
								<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanAugPreview">
									<?php
										echo (ppo_get_daycare_user_holliday_plan_aug_description($user->ID) ? ppo_get_daycare_user_holliday_plan_aug_description($user->ID) : '');
									?>
								</p>

                            </div>

                        </div>

                        <div class="my-3">
                            <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">September</h4>
								<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanSepPreview">
									<?php
										echo (ppo_get_daycare_user_holliday_plan_sep_description($user->ID) ? ppo_get_daycare_user_holliday_plan_sep_description($user->ID) : '');
									?>
								</p>

                            </div>

                        </div>

                        <div class="my-3">
                            <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">Oktober</h4>
								<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanOctPreview">
									<?php
										echo (ppo_get_daycare_user_holliday_plan_oct_description($user->ID) ? ppo_get_daycare_user_holliday_plan_oct_description($user->ID) : '');
									?>
								</p>

                            </div>

                        </div>

                        <div class="my-3">
                            <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">November</h4>
								<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanNovPreview">
									<?php
										echo (ppo_get_daycare_user_holliday_plan_nov_description($user->ID) ? ppo_get_daycare_user_holliday_plan_nov_description($user->ID) : '');
									?>
								</p>

                            </div>

                        </div>

                        <div class="my-3">
                            <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 d-inline-block ppo-bg-secondary">December</h4>
								<p class="mb-0 px-3 w-75 d-inline-block" id="ppoHolidayPLanDecPreview">
									<?php
										echo (ppo_get_daycare_user_holliday_plan_dec_description($user->ID) ? ppo_get_daycare_user_holliday_plan_dec_description($user->ID) : '');
									?>
								</p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Profile Setting Tab Content -->
        <div id="ppoProfileSettingsTabContent" class="ppo-settings-tab-content" style="display:none;">

            <!-- Tabs | Profile Settings -->
            <div id="ppoProfileSettingsChildTabs" class="row d-flex flex-row justify-content-between py-2 px-2 ppo-br-20 mb-5 ppo-bg-tab-section" style="gap:0.5rem;">

                <button style="max-width:20%;flex-grow:1;" class="btn d-flex justify-content-center align-items-center text-light fs-5 ppo-plan-act-button w-auto active" data-tab-content="#ppoTebContentProfileOfProfileSettings">Profil</button> <!-- Profile -->

                <button style="max-width:20%;flex-grow:1;" class="btn d-flex justify-content-center align-items-center text-light fs-5 ppo-plan-act-button w-auto" data-tab-content="#ppoTebContentGeneralInfoOfProfileSettings">Generelt info</button> <!-- General Info -->

                <button style="max-width:20%;flex-grow:1;" class="btn d-flex justify-content-center align-items-center text-light fs-5 ppo-plan-act-button w-auto" data-tab-content="#ppoTebContentPriceOfProfileSettings">Pris & udstyr</button> <!-- Price -->

                <button style="max-width:20%;flex-grow:1;" class="btn d-flex justify-content-center align-items-center text-light fs-5 ppo-plan-act-button w-auto" data-tab-content="#ppoTebContentCertificateDetailsOfProfileSettings">Årsplan & certificater</button> <!-- Certificate Details -->

                <button style="max-width:20%;flex-grow:1;" class="btn d-flex justify-content-center align-items-center text-light fs-5 ppo-plan-act-button w-auto" data-tab-content="#ppoTebContentHolidayInfoOfProfileSettings">Ferie</button> <!-- Holiday -->

            </div>

            <!-- Tab Contents | Profile Settings | ## Profile -->
            <div id="ppoTebContentProfileOfProfileSettings" class="ppo-profile-settings-tab-content">

                <!-- Profile Pic Section -->
                <div class="row mb-4">
                    <div class="p-0  ppo-br-16 ppo-bg-card">

                        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary ppo-br-16">
                            <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">
                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/image-gallery.png"); ?>" class="p-1 ppo-b1-light ppo-br-8 me-2 ppo-bg-color-red" style="width:35px;" />Skift Profilbillede & Navn
                            </h3> <!-- Change Profile Picture & Name -->
                        </div>

                        <form action="" method="post">
                            <!-- Profile Img Upload Slots - 3 -->
                            <div class="row py-4 gx-0">

                                <div class="col-4 px-2">
                                    <div class="form-group">
                                        <!-- Image Preview -->
                                        <div class="position-relative mb-3">
                                            <label for="ppoProfileImg1" class="mx-4 p-3 ppo-b2-light ppo-br-20 ppo-bg-primary">
                                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/camera.png"); ?>" class="d-block w-100 ppo-cursor-pointer" />
                                            </label>
                                            <input type="file" class="position-absolute opacity-0 invisible" style="z-index:-999;scale:0;" name="ppo_profile_img_1" id="ppoProfileImg1" placeholder="" aria-describedby="">
                                        </div>

                                        <div class="position-relative">
                                            <!-- user Icon -->
                                            <div class="position-absolute" style="top:2px;left:5px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:24px;height:24px;">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                </svg>
                                            </div>
                                            <!-- Name for Image -->
                                            <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white" style="padding-left:32px;" name="" id="" aria-describedby="" placeholder="Indtast navn">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-4 px-2">
                                    <div class="form-group">
                                        <!-- Image Preview -->
                                        <div class="position-relative mb-3">
                                            <label for="ppoProfileImg2" class="mx-4 p-3 ppo-b2-light ppo-br-20 ppo-bg-primary">
                                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/camera.png"); ?>" class="d-block w-100 ppo-cursor-pointer" />
                                            </label>
                                            <input type="file" class="position-absolute opacity-0 invisible" style="z-index:-999;scale:0;" name="ppo_profile_img_2" id="ppoProfileImg2" placeholder="" aria-describedby="">
                                        </div>

                                        <div class="position-relative">
                                            <!-- user Icon -->
                                            <div class="position-absolute" style="top:2px;left:5px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:24px;height:24px;">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                </svg>
                                            </div>
                                            <!-- Name for Image -->
                                            <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white" style="padding-left:32px;" name="" id="" aria-describedby="" placeholder="Indtast navn">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-4 px-2">
                                    <div class="form-group">
                                        <!-- Image Preview -->
                                        <div class="position-relative mb-3">
                                            <label for="ppoProfileImg3" class="mx-4 p-3 ppo-b2-light ppo-br-20 ppo-bg-primary">
                                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/camera.png"); ?>" class="d-block w-100 ppo-cursor-pointer" />
                                            </label>
                                            <input type="file" class="position-absolute opacity-0 invisible" style="z-index:-999;scale:0;" name="ppo_profile_img_3" id="ppoProfileImg3" placeholder="" aria-describedby="">
                                        </div>

                                        <div class="position-relative">
                                            <!-- user Icon -->
                                            <div class="position-absolute" style="top:2px;left:5px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:24px;height:24px;">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                </svg>
                                            </div>
                                            <!-- Name for Image -->
                                            <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white" style="padding-left:32px;" name="" id="" aria-describedby="" placeholder="Indtast navn">
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button class="btn py-1 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow text-light fs-4 w-25 w-auto ppo-bg-primary">
                                    GEM
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Change pictures of the house Section -->
                <div class="row mb-4">
                    <div class="p-0  ppo-br-16 ppo-bg-card">

                        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary ppo-br-16">
                            <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">
                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/image-gallery.png"); ?>" class="p-1 ppo-b1-light ppo-br-8 me-2 ppo-bg-color-red" style="width:35px;" />Skift billeder af huset
                            </h3> <!-- Change pictures of the house -->
                        </div>

                        <form action="" method="post">
                            <!-- House Image Upload Slots - 9 -->
                            <div class="row py-4 gx-0">

                                <div class="col-4 px-2 mb-4">
                                    <div class="form-group">
                                        <!-- Image Preview -->
                                        <div class="position-relative mb-3">
                                            <label for="ppoHouseImg1" class="mx-4 p-3 ppo-b2-light ppo-br-20 ppo-bg-primary">
                                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/camera.png"); ?>" class="d-block w-100 ppo-cursor-pointer" />
                                            </label>
                                            <input type="file" class="position-absolute opacity-0 invisible" style="z-index:-999;scale:0;" name="ppo_house_img_1" id="ppoHouseImg1" placeholder="" aria-describedby="">
                                        </div>

                                        <div class="position-relative">
                                            <!-- user Icon -->
                                            <div class="position-absolute" style="top:2px;left:5px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:24px;height:24px;">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                </svg>
                                            </div>
                                            <!-- Name for Image -->
                                            <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white" style="padding-left:32px;" name="" id="" aria-describedby="" placeholder="Indtast navn">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-4 px-2 mb-4">
                                    <div class="form-group">
                                        <!-- Image Preview -->
                                        <div class="position-relative mb-3">
                                            <label for="ppoHouseImg2" class="mx-4 p-3 ppo-b2-light ppo-br-20 ppo-bg-primary">
                                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/camera.png"); ?>" class="d-block w-100 ppo-cursor-pointer" />
                                            </label>
                                            <input type="file" class="position-absolute opacity-0 invisible" style="z-index:-999;scale:0;" name="ppo_house_img_2" id="ppoHouseImg2" placeholder="" aria-describedby="">
                                        </div>

                                        <div class="position-relative">
                                            <!-- user Icon -->
                                            <div class="position-absolute" style="top:2px;left:5px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:24px;height:24px;">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                </svg>
                                            </div>
                                            <!-- Name for Image -->
                                            <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white" style="padding-left:32px;" name="" id="" aria-describedby="" placeholder="Indtast navn">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-4 px-2 mb-4">
                                    <div class="form-group">
                                        <!-- Image Preview -->
                                        <div class="position-relative mb-3">
                                            <label for="ppoHouseImg3" class="mx-4 p-3 ppo-b2-light ppo-br-20 ppo-bg-primary">
                                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/camera.png"); ?>" class="d-block w-100 ppo-cursor-pointer" />
                                            </label>
                                            <input type="file" class="position-absolute opacity-0 invisible" style="z-index:-999;scale:0;" name="ppo_house_img_3" id="ppoHouseImg3" placeholder="" aria-describedby="">
                                        </div>

                                        <div class="position-relative">
                                            <!-- user Icon -->
                                            <div class="position-absolute" style="top:2px;left:5px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:24px;height:24px;">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                </svg>
                                            </div>
                                            <!-- Name for Image -->
                                            <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white" style="padding-left:32px;" name="" id="" aria-describedby="" placeholder="Indtast navn">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-4 px-2 mb-4">
                                    <div class="form-group">
                                        <!-- Image Preview -->
                                        <div class="position-relative mb-3">
                                            <label for="ppoHouseImg4" class="mx-4 p-3 ppo-b2-light ppo-br-20 ppo-bg-primary">
                                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/camera.png"); ?>" class="d-block w-100 ppo-cursor-pointer" />
                                            </label>
                                            <input type="file" class="position-absolute opacity-0 invisible" style="z-index:-999;scale:0;" name="ppo_house_img_4" id="ppoHouseImg4" placeholder="" aria-describedby="">
                                        </div>

                                        <div class="position-relative">
                                            <!-- user Icon -->
                                            <div class="position-absolute" style="top:2px;left:5px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:24px;height:24px;">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                </svg>
                                            </div>
                                            <!-- Name for Image -->
                                            <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white" style="padding-left:32px;" name="" id="" aria-describedby="" placeholder="Indtast navn">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-4 px-2 mb-4">
                                    <div class="form-group">
                                        <!-- Image Preview -->
                                        <div class="position-relative mb-3">
                                            <label for="ppoHouseImg5" class="mx-4 p-3 ppo-b2-light ppo-br-20 ppo-bg-primary">
                                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/camera.png"); ?>" class="d-block w-100 ppo-cursor-pointer" />
                                            </label>
                                            <input type="file" class="position-absolute opacity-0 invisible" style="z-index:-999;scale:0;" name="ppo_house_img_5" id="ppoHouseImg5" placeholder="" aria-describedby="">
                                        </div>

                                        <div class="position-relative">
                                            <!-- user Icon -->
                                            <div class="position-absolute" style="top:2px;left:5px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:24px;height:24px;">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                </svg>
                                            </div>
                                            <!-- Name for Image -->
                                            <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white" style="padding-left:32px;" name="" id="" aria-describedby="" placeholder="Indtast navn">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-4 px-2 mb-4">
                                    <div class="form-group">
                                        <!-- Image Preview -->
                                        <div class="position-relative mb-3">
                                            <label for="ppoHouseImg6" class="mx-4 p-3 ppo-b2-light ppo-br-20 ppo-bg-primary">
                                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/camera.png"); ?>" class="d-block w-100 ppo-cursor-pointer" />
                                            </label>
                                            <input type="file" class="position-absolute opacity-0 invisible" style="z-index:-999;scale:0;" name="ppo_house_img_6" id="ppoHouseImg6" placeholder="" aria-describedby="">
                                        </div>

                                        <div class="position-relative">
                                            <!-- user Icon -->
                                            <div class="position-absolute" style="top:2px;left:5px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:24px;height:24px;">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                </svg>
                                            </div>
                                            <!-- Name for Image -->
                                            <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white" style="padding-left:32px;" name="" id="" aria-describedby="" placeholder="Indtast navn">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-4 px-2 mb-4">
                                    <div class="form-group">
                                        <!-- Image Preview -->
                                        <div class="position-relative mb-3">
                                            <label for="ppoHouseImg7" class="mx-4 p-3 ppo-b2-light ppo-br-20 ppo-bg-primary">
                                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/camera.png"); ?>" class="d-block w-100 ppo-cursor-pointer" />
                                            </label>
                                            <input type="file" class="position-absolute opacity-0 invisible" style="z-index:-999;scale:0;" name="ppo_house_img_7" id="ppoHouseImg7" placeholder="" aria-describedby="">
                                        </div>

                                        <div class="position-relative">
                                            <!-- user Icon -->
                                            <div class="position-absolute" style="top:2px;left:5px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:24px;height:24px;">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                </svg>
                                            </div>
                                            <!-- Name for Image -->
                                            <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white" style="padding-left:32px;" name="" id="" aria-describedby="" placeholder="Indtast navn">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-4 px-2 mb-4">
                                    <div class="form-group">
                                        <!-- Image Preview -->
                                        <div class="position-relative mb-3">
                                            <label for="ppoHouseImg8" class="mx-4 p-3 ppo-b2-light ppo-br-20 ppo-bg-primary">
                                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/camera.png"); ?>" class="d-block w-100 ppo-cursor-pointer" />
                                            </label>
                                            <input type="file" class="position-absolute opacity-0 invisible" style="z-index:-999;scale:0;" name="ppo_house_img_8" id="ppoHouseImg8" placeholder="" aria-describedby="">
                                        </div>

                                        <div class="position-relative">
                                            <!-- user Icon -->
                                            <div class="position-absolute" style="top:2px;left:5px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:24px;height:24px;">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                </svg>
                                            </div>
                                            <!-- Name for Image -->
                                            <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white" style="padding-left:32px;" name="" id="" aria-describedby="" placeholder="Indtast navn">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-4 px-2 mb-4">
                                    <div class="form-group">
                                        <!-- Image Preview -->
                                        <div class="position-relative mb-3">
                                            <label for="ppoHouseImg9" class="mx-4 p-3 ppo-b2-light ppo-br-20 ppo-bg-primary">
                                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/camera.png"); ?>" class="d-block w-100 ppo-cursor-pointer" />
                                            </label>
                                            <input type="file" class="position-absolute opacity-0 invisible" style="z-index:-999;scale:0;" name="ppo_house_img_9" id="ppoHouseImg9" placeholder="" aria-describedby="">
                                        </div>

                                        <div class="position-relative">
                                            <!-- user Icon -->
                                            <div class="position-absolute" style="top:2px;left:5px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:24px;height:24px;">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                </svg>
                                            </div>
                                            <!-- Name for Image -->
                                            <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white" style="padding-left:32px;" name="" id="" aria-describedby="" placeholder="Indtast navn">
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button class="btn py-1 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow text-light fs-4 w-25 w-auto ppo-bg-primary">
                                    GEM
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Change User Name Section -->
                <div class="row mb-4">
                    <div class="p-0  ppo-br-16 ppo-bg-card">

                        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary ppo-br-16">
                            <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">
                                <img src="<?php echo ppo_get_dir("/assets/images/user/man-user.png"); ?>" class="p-1 ppo-b1-light ppo-br-8 me-2 ppo-bg-color-red" style="width:35px;" />Skift PPO navn
                            </h3> <!-- Change PPO name -->
                        </div>

                        <form action="" method="post">
							<?php
								$name = @get_the_author_meta('display_name', $user->ID) ? esc_attr(get_the_author_meta('display_name', $user->ID)) : "";
							?>
                            <div class="form-group p-4">
                                <div class="position-relative w-75 m-auto">
                                    <!-- user Icon -->
                                    <div class="position-absolute" style="top:3px;left:10px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:32px;height:32px;">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                        </svg>
                                    </div>
                                    <!-- User Name Field -->
                                    <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5" style="padding-left:60px;" name="ppo_daycare_name" id="ppo_daycare_name" aria-describedby="" placeholder="Indtast PPO navn" value="<?php echo $name; ?>">
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button class="btn py-1 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow text-light fs-4 w-25 w-auto ppo-bg-primary" id="ppo_daycare_name_button">
                                    GEM
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Change Location/Address Section -->
                <div class="row mb-4">
                    <div class="p-0  ppo-br-16 ppo-bg-card">

                        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary ppo-br-16">
                            <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">
                                <img src="<?php echo ppo_get_dir("/assets/images/profile/location-outline.png"); ?>" class="p-1 ppo-b1-light ppo-br-8 me-2 ppo-bg-color-red" style="width:35px;" />Skift lokation
                            </h3> <!-- Change Location -->
                        </div>

                        <form action="" method="post">

                            <div class="form-group p-4">

                                <div class="d-flex flex-row">

                                    <!-- Post Code Detail -->
                                    <div class="position-relative mb-3 me-3">
                                        <!-- Post-Box Icon -->
                                        <div class="position-absolute" style="top:3px;left:10px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mailbox" viewBox="0 0 16 16" style="width:32px;height:32px;">
                                                <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z" />
                                                <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z" />

                                            </svg>
                                        </div>
                                        <!-- Post Code Field -->
                                        <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5" style="padding-left:60px;" name="ppo_daycare_post_code" id="ppo_daycare_post_code" aria-describedby="" placeholder="Indtast post nr." value="<?php echo $post_code; ?>">
                                    </div>

                                    <!-- Building Detail -->
                                    <div class="position-relative mb-3">
                                        <!-- Building Icon -->
                                        <div class="position-absolute" style="top:3px;left:10px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16" style="width:32px;height:32px;">
                                                <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                                                <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                                            </svg>
                                        </div>
                                        <!-- Building Field -->
                                        <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5" style="padding-left:60px;" name="ppo_daycare_building" id="ppo_daycare_building" aria-describedby="" placeholder="Indtast by" value="<?php echo $building; ?>">
                                    </div>

                                </div>

                                <!-- Road Detail -->
                                <div class="position-relative w-75 m-auto mb-3">
                                    <!-- Road Sign Icon -->
                                    <div class="position-absolute" style="top:3px;left:10px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-signpost-2" viewBox="0 0 16 16" style="width:32px;height:32px;">
                                            <path d="M7 1.414V2H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h5v1H2.5a1 1 0 0 0-.8.4L.725 8.7a.5.5 0 0 0 0 .6l.975 1.3a1 1 0 0 0 .8.4H7v5h2v-5h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H9V6h4.5a1 1 0 0 0 .8-.4l.975-1.3a.5.5 0 0 0 0-.6L14.3 2.4a1 1 0 0 0-.8-.4H9v-.586a1 1 0 0 0-2 0zM13.5 3l.75 1-.75 1H2V3h11.5zm.5 5v2H2.5l-.75-1 .75-1H14z" />
                                        </svg>
                                    </div>
                                    <!-- Road -->
                                    <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5" style="padding-left:60px;" name="ppo_daycare_road_num" id="ppo_daycare_road_num" aria-describedby="" placeholder="Indtast vejnavn" value="<?php echo $road_number; ?>">
                                </div>

                                <!-- House Detail -->
                                <div class="position-relative w-50 m-auto mb-3">
                                    <!-- House Icon -->
                                    <div class="position-absolute" style="top:3px;left:10px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16" style="width:32px;height:32px;">
                                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />

                                        </svg>
                                    </div>
                                    <!-- House -->
                                    <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5" style="padding-left:60px;" name="ppo_daycare_house_num" id="ppo_daycare_house_num" aria-describedby="" placeholder="Indtast hus nr." value="<?php echo $house_number; ?>">
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button class="btn py-1 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow text-light fs-4 w-25 w-auto ppo-bg-primary" id="ppo_daycare_address_button">
                                    GEM
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Change Contact Number Section -->
                <div class="row mb-4">
                    <div class="p-0  ppo-br-16 ppo-bg-card">

                        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary ppo-br-16">
                            <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">
                                <img src="<?php echo ppo_get_dir("/assets/images/profile/phone-call-outline.png"); ?>" class="p-1 ppo-b1-light ppo-br-8 me-2 ppo-bg-color-red" style="width:35px;" />Skift nummer
                            </h3> <!-- Change Number -->
                        </div>

                        <form action="" method="post">
							<?php
							$tele = @get_user_meta( $user->ID, '_daycare_telephone_number', true ) ? esc_attr(get_user_meta( $user->ID, '_daycare_telephone_number', true)) : "";
							?>
                            <div class="form-group p-4">
                                <div class="position-relative w-50 m-auto">
                                    <!-- Phone Icon -->
                                    <div class="position-absolute" style="top:4px;left:12px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16" style="width:30px;height:30px;">
                                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                        </svg>
                                    </div>
                                    <!-- Contact Number Field -->
                                    <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5" style="padding-left:50px;" name="ppo_daycare_tele" id="ppo_daycare_tele" aria-describedby="" placeholder="Indtast nummer" value="<?php echo $tele; ?>">
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button class="btn py-1 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow text-light fs-4 w-25 w-auto ppo-bg-primary" id="ppo_daycare_tele_button">
                                    GEM
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Change E-mail Section -->
                <div class="row mb-4">
                    <div class="p-0  ppo-br-16 ppo-bg-card">

                        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary ppo-br-16">
                            <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">
                                <img src="<?php echo ppo_get_dir("/assets/images/profile/mailbox-outline.png"); ?>" class="p-1 ppo-b1-light ppo-br-8 me-2 ppo-bg-color-red" style="width:35px;" />Skift e-mail
                            </h3> <!-- Change e-mail -->
                        </div>

                        <form action="" method="post">
							<?php
								$email = @get_the_author_meta('user_email', $user->ID) ? esc_attr(get_the_author_meta('user_email', $user->ID)) : "";
							?>
                            <div class="form-group p-4">
                                <div class="position-relative w-50 m-auto">
                                    <!-- Envelope Icon -->
                                    <div class="position-absolute" style="top:4px;left:12px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16" style="width:32px;height:32px;">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                        </svg>
                                    </div>
                                    <!-- Email Field -->
                                    <input type="email" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5" style="padding-left:50px;" name="ppo_daycare_email" id="ppo_daycare_email" aria-describedby="" placeholder="Indtast e-mail" value="<?php echo $email; ?>">
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button class="btn py-1 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow text-light fs-4 w-25 w-auto ppo-bg-primary" id="ppo_daycare_email_button">
                                    GEM
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

                <!-- Change Password Section -->
                <div class="row mb-4">
                    <div class="p-0  ppo-br-16 ppo-bg-card">

                        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary">
                            <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">
                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/shield-lock.png"); ?>" class="p-1 ppo-b1-light ppo-br-8 me-2 ppo-bg-color-red" style="width:35px;" />Skift adgangskode
                            </h3> <!-- Change Password -->
                        </div>

                        <form action="" method="post">
                            <div class="form-group p-4">

                                <!-- Current Password Field -->
                                <div class="position-relative mb-3">
                                    <!-- Shield Icon -->
                                    <div class="position-absolute" style="top:4px;left:12px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16" style="width:32px;height:32px;z-index:999;">
                                            <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                                            <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
                                        </svg>
                                    </div>

                                    <input type="password" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5" id="currentPassword" style="padding-left:50px;" name="" id="" aria-describedby="" placeholder="Nuvværende adgangskode" required>

                                    <a href="#!" onclick="toggleInputType(this, '#currentPassword');" class="position-absolute bg-transparent text-dark fw-bold text-decoration-none" style="top:6px;right:16px;z-index:9;">Vis</a>

                                </div>

                                <!-- New Password Field -->
                                <div class="position-relative mb-3">
                                    <!-- Key Icon -->
                                    <div class="position-absolute" style="top:4px;left:12px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16" style="width:32px;height:32px;rotate:-45deg;">
                                            <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </div>

                                    <input type="password" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5" id="newPassword" style="padding-left:50px;" name="" id="" aria-describedby="" placeholder="Ny adgangskode" required>

                                    <a href="#!" onclick="toggleInputType(this, '#newPassword');" class="position-absolute bg-transparent text-dark fw-bold text-decoration-none" style="top:6px;right:16px;z-index:9;">Vis</a>

                                </div>

                                <!-- Rewrite New Password Field -->
                                <div class="position-relative mb-3">
                                    <!-- Shield Icon -->
                                    <div class="position-absolute" style="top:4px;left:12px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16" style="width:32px;height:32px;rotate:-45deg;">
                                            <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </div>

                                    <input type="password" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5" id="rewriteNewPassword" style="padding-left:50px;" name="" id="" aria-describedby="" placeholder="Indtast ny adgangskode igen" required>

                                    <a href="#!" onclick="toggleInputType(this, '#rewriteNewPassword');" class="position-absolute bg-transparent text-dark fw-bold text-decoration-none" style="top:6px;right:16px;z-index:9;">Vis</a>

                                </div>


                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button class="btn py-1 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow text-light fs-4 w-25 ppo-bg-primary">
                                    GEM
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

                <!-- Change Kids Number Approve Section -->
                <div class="row mb-4">
                    <div class="p-0  ppo-br-16 ppo-bg-card">

                        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary">
                            <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">
                                Hvor mange børn er du/i godkendt til?
                            </h3> <!-- How many children are you approved for? -->
                        </div>

                        <form action="" method="post">

                            <div class="form-group mb-3">
								<?php
									$kids_num_array = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15');
									$selected = @get_user_meta( $user->ID, '_daycare_kids_number', true ) ? get_user_meta( $user->ID, '_daycare_kids_number', true ) : '';
								?>
                                <select class="form-select text-white w-25 ppo-br-16 ppo-b2-light m-auto  ppo-bg-primary" name="ppo_kids_num_approved" id="ppo_kids_num_approved"> <!-- .form-control >> bg-color white | default -->
                                    <option value="">Vælge her</option>
									<?php foreach( $kids_num_array as $option ) : ?>
									<option value="<?php echo $option; ?>"<?php echo ( $selected === $option ? ' selected' : '' ); ?>><?php echo $option; ?></option>
									<?php endforeach; ?>
                                    
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button class="btn py-1 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow ppo-bg-primary text-light fs-4 w-25" id="ppo_kids_num_approved_button">
                                    GEM
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

                <!-- Change Smoking Status Section -->
                <div class="row mb-4">
                    <div class="p-0  ppo-br-16 ppo-bg-card">

                        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary">
                            <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">
                                <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/smoking.png"); ?>" class="p-1 ppo-b1-light ppo-br-8 me-2 ppo-bg-color-red" style="width:35px;" />Ryger du?
                            </h3> <!-- Do you smoke? -->
                        </div>

                        <form action="" method="post">

                            <div class="w-25 m-auto">
								<?php
									$does_smoke = @get_user_meta( $user->ID, '_daycare_user_does_smoke', true ) ? 1 : 0; 
								?>

                                <div class="d-flex form-check align-items-center mb-3">
                                    <input class="form-check-input ppo-b2-light ppo-br-8 ppo-cursor-pointer ppo-bg-primary" type="checkbox" value="yes" id="smokingYes" style="width:42px;height:42px;margin-right:1rem;" required<?php echo ($does_smoke === 1 ? ' checked' : ''); ?>>
                                    <label class="form-check-label text-light fw-bold ppo-cursor-pointer fs-5" for="smokingYes">
                                        Ja
                                    </label>
                                </div>

                                <div class="d-flex form-check align-items-center mb-3">
                                    <input class="form-check-input ppo-b2-light ppo-br-8 ppo-cursor-pointer ppo-bg-primary" type="checkbox" value="no" id="smokingNo" style="width:42px;height:42px;margin-right:1rem;" required<?php echo ($does_smoke === 0 ? ' checked' : ''); ?>>
                                    <label class="form-check-label text-light fw-bold ppo-cursor-pointer fs-5" for="smokingNo">
                                        Nej
                                    </label>
                                </div>

                            </div>


                            <!-- Submit Button -->
                            <div class="text-center">
                                <button class="btn py-1 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow text-light fs-4 w-25 ppo-bg-primary" id="ppo_daycare_smoking_status">
                                    GEM
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

				<?php
// 				print_r( array_keys( get_user_meta( get_current_user_id() ) ) );
				?>
				
                <!-- Change Social Handler Section -->
                <div class="row mb-4">
                    <div class="p-0  ppo-br-16 ppo-bg-card">

                        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary">
                            <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">
                                Forbind til Sociale Medier
                            </h3> <!-- Change Social Handlers -->
                        </div>

                        <form action="" method="post">
							
							<?php
								$web = @get_the_author_meta('user_url', $user->ID) ? esc_url(get_the_author_meta('user_url', $user->ID)) : '';							
								$fb = @get_user_meta( $user->ID, '_daycare_fb_handler', true ) ? esc_url(get_user_meta( $user->ID, '_daycare_fb_handler', true )) : '';
								$instagram = @get_user_meta( $user->ID, '_daycare_instagram_handler', true ) ? esc_url(get_user_meta( $user->ID, '_daycare_instagram_handler', true )) : '';
								$tiktok = @get_user_meta( $user->ID, '_daycare_tiktok_handler', true ) ? esc_url(get_user_meta( $user->ID, '_daycare_tiktok_handler', true )) : '';
								$twitter = @get_user_meta( $user->ID, '_daycare_twitter_handler', true ) ? esc_url(get_user_meta( $user->ID, '_daycare_twitter_handler', true )) : '';
								$yt = @get_user_meta( $user->ID, '_daycare_yt_handler', true ) ? esc_url(get_user_meta( $user->ID, '_daycare_yt_handler', true )) : '';
							?>
							
                            <!-- Web -->
                            <div class="form-group px-4 py-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Social Logo -->
                                    <div class="" style="">
                                        <img src="<?php echo ppo_get_dir("/assets/images/social-icons/web.png"); ?>" style="width:60px;" />
                                    </div>
                                    <!-- Handler Field -->
                                    <input type="url" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 text-center" style="margin-left:40px;flex-grow:1;" name="ppo_social_web" id="ppo_social_web" aria-describedby="" placeholder="Indtast din hjemmeside" value="<?php echo $web; ?>">
                                </div>
                            </div>

                            <!-- Facebook -->
                            <div class="form-group px-4 py-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Social Logo -->
                                    <div class="" style="">
                                        <img src="<?php echo ppo_get_dir("/assets/images/social-icons/facebook-full.png"); ?>" style="width:60px;" />
                                    </div>
                                    <!-- Handler Field -->
                                    <input type="url" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 text-center" style="margin-left:40px;flex-grow:1;" name="ppo_social_fb" id="ppo_social_fb" aria-describedby="" placeholder="Indtast din Facebook side"<?php echo $fb; ?>>
                                </div>
                            </div>

                            <!-- Instagram -->
                            <div class="form-group px-4 py-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Social Logo -->
                                    <div class="" style="">
                                        <img src="<?php echo ppo_get_dir("/assets/images/social-icons/instagram.png"); ?>" style="width:60px;" />
                                    </div>
                                    <!-- Handler Field -->
                                    <input type="url" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 text-center" style="margin-left:40px;flex-grow:1;" name="ppo_social_instagram" id="ppo_social_instagram" aria-describedby="" placeholder="Indtast din Instagram side" value="<?php echo $instagram; ?>">
                                </div>
                            </div>

                            <!-- Tiktok -->
                            <div class="form-group px-4 py-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Social Logo -->
                                    <div class="" style="">
                                        <img src="<?php echo ppo_get_dir("/assets/images/social-icons/tiktok.png"); ?>" style="width:60px;" />
                                    </div>
                                    <!-- Handler Field -->
                                    <input type="url" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 text-center" style="margin-left:40px;flex-grow:1;" name="ppo_social_tiktok" id="ppo_social_tiktok" aria-describedby="" placeholder="Indtast din Tiktok side" value="<?php echo $tiktok; ?>">
                                </div>
                            </div>

                            <!-- Twitter -->
                            <div class="form-group px-4 py-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Social Logo -->
                                    <div class="" style="">
                                        <img src="<?php echo ppo_get_dir("/assets/images/social-icons/twitter.png"); ?>" style="width:60px;" />
                                    </div>
                                    <!-- Handler Field -->
                                    <input type="url" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 text-center" style="margin-left:40px;flex-grow:1;" name="ppo_social_twitter" id="ppo_social_twitter" aria-describedby="" placeholder="Indtast din Twitter side" value="<?php echo $twitter; ?>">
                                </div>
                            </div>

                            <!-- YT -->
                            <div class="form-group px-4 py-2 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Social Logo -->
                                    <div class="" style="">
                                        <img src="<?php echo ppo_get_dir("/assets/images/social-icons/youtube.png"); ?>" style="width:60px;" />
                                    </div>
                                    <!-- Handler Field -->
                                    <input type="url" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 text-center" style="margin-left:40px;flex-grow:1;" name="ppo_social_yt" id="ppo_social_yt" aria-describedby="" placeholder="Indtast din Youtube side" value="<?php echo $yt; ?>">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button class="btn py-1 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow text-light fs-4 w-25 ppo-bg-primary" id="ppo_social_handler_button">
                                    GEM
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

                <!-- Change Notification Section -->
                <div class="row mb-4">
                    <div class="p-0  ppo-br-16 ppo-bg-card">

                        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary">
                            <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">
                                Notifikationer
                            </h3> <!-- Do you smoke? -->
                        </div>

                        <form action="" method="post">

                            <div class="p-4">

                                <div class="d-flex form-check align-items-center mb-3">
                                    <input class="form-check-input ppo-b2-light ppo-br-8 ppo-cursor-pointer ppo-bg-primary" type="checkbox" value="yes" id="newsletterWithOffers" style="min-width:42px;height:42px;margin-right:1rem;" required>
                                    <label class="form-check-label text-light fw-bold ppo-cursor-pointer fs-5" for="newsletterWithOffers">
                                        Ja tak, jeg vil gerne have Find-Din-PPO's nyhedsbrev med tilbud fra PPO'er og opdateringer.
                                    </label> <!-- newsletter with offers updates -->
                                </div>

                                <div class="d-flex form-check align-items-center mb-3">
                                    <input class="form-check-input ppo-b2-light ppo-br-8 ppo-cursor-pointer ppo-bg-primary" type="checkbox" value="no" id="emailOnBasketReceiving" style="min-width:42px;height:42px;margin-right:1rem;" required>
                                    <label class="form-check-label text-light fw-bold ppo-cursor-pointer fs-5" for="emailOnBasketReceiving">
                                        jeg vil gerne modtage en e-mail, når jeg har modtaget en basked.
                                    </label> <!-- Got an email when received a basket -->
                                </div>

                                <div class="d-flex form-check align-items-center mb-3">
                                    <input class="form-check-input ppo-b2-light ppo-br-8 ppo-cursor-pointer ppo-bg-primary" type="checkbox" value="no" id="emailOnClicks" style="min-width:42px;height:42px;margin-right:1rem;" required>
                                    <label class="form-check-label text-light fw-bold ppo-cursor-pointer fs-5" for="emailOnClicks">
                                        jeg vil gerne modtage en e-mail, med hvor mange der har klikket og liket min konto.
                                    </label> <!-- Got email to see clicks count -->
                                </div>

                            </div>


                            <!-- Submit Button -->
                            <div class="text-center">
                                <button class="btn py-1 px-3 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light text-light fs-4 w-auto ppo-bg-primary">
                                    Opdater Profil
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

                <!-- Account Delete Section -->
                <div class="row mb-4">
                    <div class="p-0  ppo-br-16 ppo-bg-card">

                        <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary">
                            <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">
                                Vil du slette din konto?
                            </h3> <!-- Do you want to delete your account? -->
                        </div>

                        <div class="p-4">
                            <p class="fs-5 text-white mb-3">AEv, trist at du vil forlade os, men du kan altid blive medlem igen, hvis du skifter mening.</p>

                            <p class="fs-5 text-white mb-3">For at slette din konto, vil vi gerne høre hvorfor du gerne vil slette din konto.</p>

                            <p class="fs-5 text-white mb-3">Vi vil også gøre opmaerksom på, at du vil miste den betaling du har fortaget dig, til din plan/abonnement. Og vil ikke kunne fa det refunderet.</p>
                        </div>

                        <form action="<?php echo esc_url(home_url("/sletning-af-konto/")); ?>" method="post" class="px-4 mb-3">

                            <div class="form-group mb-3">
                                <select class="form-select text-white w-100 fs-5 fw-bold text-center ppo-br-16 ppo-b2-light m-auto ppo-bg-primary" name="ppo_kids_num_approved" id="">
                                    <option value="">Vælge årsag</option>
                                    <option value="1">Årsag 1</option>
                                    <option value="2">Årsag 2</option>
                                    <option value="3">Årsag 3</option>
                                    <option value="4">Årsag 4</option>
                                    <option value="5">Årsag 5</option>
                                    <option value="6">Årsag 6</option>
                                    <option value="7">Årsag 7</option>
                                    <option value="8">Årsag 8</option>
                                    <option value="9">Årsag 9</option>
                                    <option value="10">Årsag 10</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <textarea class="form-control ppo-br-16 bg-white ppo-b2-light" name="account_delete_reason" id="account_delete_reason" rows="4" placeholder="Uddyb venligst"></textarea>
                            </div>

                            <!-- Image Preview -->
                            <div class="position-relative mb-3">
                                <label for="file_img_attachment" class="align-items-center justify-content-start text-white fw-bold fs-5 ppo-cursor-pointer">
                                    <img src="<?php echo ppo_get_dir("/assets/images/subscription-plans/add.png"); ?>" class="" style="width:45px;margin-right:0.75rem;" />Tilføj fil
                                </label>
                                <input type="file" class="position-absolute opacity-0 invisible" style="z-index:-999;scale:0;" name="file_img_attachment" id="file_img_attachment" placeholder="" aria-describedby="">
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">

                                <button type="submit" class="btn py-1 px-3 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow ppo-bg-primary text-light fs-4 w-auto">
                                    Slet min konto
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <!-- Tab Contents | Profile Settings | ## General Info -->
            <div id="ppoTebContentGeneralInfoOfProfileSettings" class="ppo-profile-settings-tab-content" style="display:none;">

                <!-- Profile Description -->
                <div class="row mb-3 ppo-br-16 ppo-bg-card">
                    <div class="text-center ppo-box-shadow py-1 ppo-bg-secondary ppo-br-16">
                        <h3 class="text-light fs-5 fw-bold">Beskrivelse</h3>
                    </div>

                    <div class="ppo-profile-section-content p-4">

                        <p class="text-light fw-bold fs-5 mb-3">
                            Giv en beskrivelse om din private pasningsordning
                        </p> <!-- Give a description of your private care arrangement -->

                        <form action="" method="post">

                            <div class="form-group mb-3">
                                <textarea class="form-control ppo-br-16 bg-white ppo-b2-light" name="profile_description" id="profile_description" maxlength="300" minlength="250" rows="4" placeholder=""><?php echo $description; ?></textarea>
                            </div>

                            <p class="d-flex justify-content-end text-light fw-bold fs-5 mb-3">
                                Maks 300 ord - 250/300
                            </p>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button class="btn py-1 px-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow ppo-bg-primary text-light fs-4 w-25" id="ppo_daycare_description_button">
                                    GEM
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Calendar Available Spots -->
                <div class="row mb-3 ppo-br-16 ppo-bg-card">
                    <div class="text-center ppo-box-shadow py-1 ppo-bg-secondary ppo-br-16">
                        <h3 class="text-light fs-5 fw-bold">Ledige pladser</h3>
                    </div>

                    <div class="pt-4 px-4">
                        <p class="text-light fw-bold fs-5 mb-3">
                            Vælg dine ledige pladser nedenfor
                        </p> <!-- Choose your available places below -->
                    </div>

                    <!-- Years -->
                    <div class="row mb-4 px-4">

                        <div class="col-2"></div>
						
                        <div class="col-3">
                            <button class="btn text-light fw-bold fs-5  ppo-profile-cal-button active" data-ppo-spot-year="<?php echo $current_year; ?>"><?php echo trim($current_year); ?></button>
                        </div>
                        <div class="col-3">
                            <button class="btn text-light fw-bold fs-5  ppo-profile-cal-button" data-ppo-spot-year="<?php echo $next_year; ?>"><?php echo $next_year; ?></button>
                        </div>
                        <div class="col-3">
                            <button class="btn text-light fw-bold fs-5  ppo-profile-cal-button" data-ppo-spot-year="<?php echo $next_of_next_year; ?>"><?php echo $next_of_next_year; ?></button>
                        </div>
                        <div class="col-1"></div>
                    </div>

                    <form action="" method="post" class="mb-4">
						<!-- Months  - First 1/2 -->
                        <div class="d-flex justify-content-between flex-wrap mb-3 px-4" style="gap:0.5rem;">
							<?php
							
							foreach($first_half_month_list as $month ) :
							?>
								<button class="btn text-light fw-bold fs-5 ppo-bg-primary ppo-br-16 text-capitalize" data-ppo-spot-month="<?php echo $month; ?>" style="flex-grow:1;"><?php echo $month; ?></button>
							<?php
							endforeach;
							?>
                        </div>
						<!-- Months  - Last 1/2 -->
                        <div class="d-flex justify-content-between flex-wrap mb-3 px-4" style="gap:0.5rem;">
							<?php
							foreach($last_half_month_list as $month ) :
							?>
								<button class="btn text-light fw-bold fs-5 ppo-bg-primary ppo-br-16 text-capitalize" data-ppo-spot-month="<?php echo $month; ?>" style="flex-grow:1;"><?php echo $month; ?></button>
							<?php
							endforeach;
							?>

                        </div>


                        <!-- Submit Button -->
                        <div class="text-center">
                            <button class="btn py-1 px-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow ppo-bg-primary text-light fs-4 w-25" id="ppo_daycare_available_spots_button">
                                GEM
                            </button>
                        </div>

                    </form>

                </div>

                <!-- Keywords -->
                <div class="row mb-3 ppo-bg-card ppo-br-16">
                    <div class="text-center ppo-box-shadow py-1 ppo-bg-secondary ppo-br-16">
                        <h3 class="text-light fs-5 fw-bold">Nøgleord</h3>
                    </div>

                    <div class="pt-4 px-4">
                        <p class="text-light fw-bold fs-5 mb-3">
                            Skriv nøgleord om din private pasningsordning
                        </p> <!-- Write keywords about your private care arrangement -->
                    </div>

                    <form action="" method="post" class="mb-4 px-4" id="ppoDaycareKeywordsForm">

                        <!-- Keyword Inputs -->
                        <div class="ppo-prof-keyword-content py-3">
							<?php
								$index = 0;
								while($index < 9) :
							?>
									<input name="profile_keyword_<?php echo $index; ?>" id="profile_keyword_<?php echo $index; ?>" placeholder="Skriv her..." class="form-input text-center ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light" value="<?php echo ($keyword_arr[$index] ?? ''); ?>">
							<?php
									$index++;
								endwhile;
							?>
                        </div>

                        <p class="d-flex justify-content-end text-light fw-bold fs-5 mb-3">
                            Maks 9 nøgleord.
                        </p>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button class="btn py-1 px-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow ppo-bg-primary text-light fs-4 w-25" id="ppo_daycare_keywords_button">
                                GEM
                            </button>
                        </div>

                    </form>

                </div>

            </div>

            <!-- Tab Contents | Profile Settings | ## Price -->
            <div id="ppoTebContentPriceOfProfileSettings" class="ppo-profile-settings-tab-content" style="display:none;">

                <!-- Price Section -->
                <div class="row mb-3 ppo-bg-card ppo-br-16">
                    <div class="text-center ppo-box-shadow py-1 ppo-bg-secondary ppo-br-16">
                        <h3 class="text-light fs-5 fw-bold">Pris</h3>
                    </div>

                    <form action="" method="post" class="mb-4 px-4 pt-5">

                        <!-- Price Inputs -->
                        <div class="ppo-prof-keyword-content align-items-start mb-4">

                            <div class="d-flex flex-column">
                                <input name="price_1" id="price_1" placeholder="Skriv her..." class="form-input text-center ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-100 mb-2" value="<?php echo $daycare_monthly_rate; ?>">
                                <label for="price_1" class="text-center text-light fs-5">Egen betaling pr. måned</label>
                            </div>

                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <input name="price_2" id="price_2" placeholder="Skriv her..." class="form-input text-center ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-100 mb-2" value="<?php echo $daycare_municipality_subsidy_rate; ?>">
                                <label for="price_2" class="text-center text-light fs-5">Kommunens tilskud</label>
                            </div>

                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <input name="price_3" id="price_3" placeholder="Skriv her..." class="form-input text-center ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-100 mb-2" value="<?php echo $daycare_total; ?>">
                                <label for="price_3" class="text-center text-light fs-5">Samlet pris</label>
                            </div>

                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button class="btn py-1 px-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow ppo-bg-primary text-light fs-4 w-25" id="ppo_daycare_prices_button">
                                GEM
                            </button>
                        </div>

                    </form>

                </div>

                <!-- Included in the price -->
                <div class="row mb-3 ppo-bg-card ppo-br-16">
                    <div class="text-center ppo-box-shadow py-1 ppo-bg-secondary ppo-br-16">
                        <h3 class="text-light fs-5 fw-bold">Inkluderet i prisen</h3>
                    </div>

                    <form action="" method="post" class="mb-4 px-4 pt-5" id="ppoPriceIncludedListForm">
						<!-- Included in the price Inputs -->
                        <div class="ppo-prof-keyword-content mb-4">
						<?php
							$index = 0;
							while($index < 9) :
						?>
								<input name="profile_included_in_price_<?php echo $index; ?>" id="profile_included_in_price_<?php echo $index; ?>" placeholder="Skriv her..." class="form-input text-center ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light" value="<?php echo ($price_included_item_arr[$index] ?? ''); ?>">
						<?php
								$index++;
							endwhile;
						?>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button class="btn py-1 px-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow ppo-bg-primary text-light fs-4 w-25" id="ppo_daycare_price_included_list_button">
                                GEM
                            </button>
                        </div>

                    </form>

                </div>

                <!-- Bring user's own Section -->
                <div class="row mb-3 ppo-bg-card ppo-br-16">
                    <div class="text-center ppo-box-shadow py-1 ppo-bg-secondary ppo-br-16">
                        <h3 class="text-light fs-5 fw-bold">Medbring selv</h3>
                    </div>

                    <form action="" method="post" class="mb-4 px-4 pt-5" id="ppoBringUserOwnItemListForm">

                        <!-- Bring your own Inputs -->
                        <div class="ppo-prof-keyword-content mb-3">
						<?php
							$index = 0;
							while($index < 9) :
						?>
								<input name="profile_bring_users_own_<?php echo $index; ?>" id="profile_bring_users_own_<?php echo $index; ?>" placeholder="Skriv her..." class="form-input text-center ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light" value="<?php echo ($bring_users_own_item_arr[$index] ?? ''); ?>">
						<?php
								$index++;
							endwhile;
						?>

                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button class="btn py-1 px-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow ppo-bg-primary text-light fs-4 w-25" id="ppo_daycare_bring_user_own_item_list_button">
                                GEM
                            </button>
                        </div>

                    </form>

                </div>

            </div>

            <!-- Tab Contents | Profile Settings | ## Certificate Details -->
            <div id="ppoTebContentCertificateDetailsOfProfileSettings" class="ppo-profile-settings-tab-content" style="display:none;">

                <!-- Certificates -->
                <div class="row mb-3 ppo-br-16 ppo-bg-card">
                    <div class="text-center ppo-box-shadow py-1 ppo-bg-secondary ppo-br-16">
                        <h3 class="text-light fs-5 fw-bold">Certificater</h3>
                    </div>

					<form action="" method="post">
					
						<?php
						$certificate_list = array("Grønne spirer", "Spring ud i naturen", "Førstehjælps-kurusus",  "Mindfulness", "Musik", "Natur", "Motorik og Sanser", "Idræt"); // 'og' instead of '&' 
						
						$certificates = ppo_get_daycare_user_certificates_owned($user_id);
						$certificates = $certificates ? explode(",", $certificates) : array();
						?>
						
						<div class="d-flex justify-content-start flex-wrap p-4" style="gap:0.5rem;">

							<?php foreach($certificate_list as $certificate) : ?>
							
								<button class="ppo-certificate-btn btn text-white fw-bold ppo-bg-secondary w-auto ppo-br-16 <?php echo ( in_array( $certificate, $certificates ) ? ' selected' : '' ); ?>" style="flex-grow:1;" data-ppo-certificate="<?php echo $certificate; ?>"><?php echo $certificate; ?></button>
							
							<?php endforeach; ?>

						</div>
						
						<!-- Submit Button -->
						<div class="text-center mb-3">
							<button class="btn py-1 px-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow ppo-bg-primary text-light fs-4 w-25" id="ppo_daycare_certificate_selection_button">
								GEM
							</button>
						</div>
					
					</form>

                </div>

                <!-- Annual Planner Section -->
                <div class="row mb-3 ppo-br-16 ppo-bg-card">
                    <div class="text-center ppo-box-shadow py-1 ppo-bg-secondary ppo-br-16">
                        <h3 class="text-light fs-5 fw-bold">Årsplaner</h3>
                    </div>

                    <!-- Holiday Detail Section -->
                    <div class="p-4">

                        <form action="" method="post">

							<?php
								$jan_heading = ppo_get_daycare_user_annual_plan_jan_heading($user_id);
								$jan_description = ppo_get_daycare_user_annual_plan_jan_description($user_id);
							
								$feb_heading = ppo_get_daycare_user_annual_plan_feb_heading($user_id);
								$feb_description = ppo_get_daycare_user_annual_plan_feb_description($user_id);
							
								$mar_heading = ppo_get_daycare_user_annual_plan_mar_heading($user_id);
								$mar_description = ppo_get_daycare_user_annual_plan_mar_description($user_id);
							
								$apr_heading = ppo_get_daycare_user_annual_plan_apr_heading($user_id);
								$apr_description = ppo_get_daycare_user_annual_plan_apr_description($user_id);
							
								$may_heading = ppo_get_daycare_user_annual_plan_may_heading($user_id);
								$may_description = ppo_get_daycare_user_annual_plan_may_description($user_id);
							
								$jun_heading = ppo_get_daycare_user_annual_plan_jun_heading($user_id);
								$jun_description = ppo_get_daycare_user_annual_plan_may_description($user_id);
							
								$jul_heading = ppo_get_daycare_user_annual_plan_jul_heading($user_id);
								$jul_description = ppo_get_daycare_user_annual_plan_jul_description($user_id);
							
								$aug_heading = ppo_get_daycare_user_annual_plan_aug_heading($user_id);
								$aug_description = ppo_get_daycare_user_annual_plan_aug_description($user_id);
							
								$sep_heading = ppo_get_daycare_user_annual_plan_sep_heading($user_id);
								$sep_description = ppo_get_daycare_user_annual_plan_sep_description($user_id);
							
								$oct_heading = ppo_get_daycare_user_annual_plan_oct_heading($user_id);
								$oct_description = ppo_get_daycare_user_annual_plan_oct_description($user_id);
							
								$nov_heading = ppo_get_daycare_user_annual_plan_nov_heading($user_id);
								$nov_description = ppo_get_daycare_user_annual_plan_nov_description($user_id);
							
								$dec_heading = ppo_get_daycare_user_annual_plan_dec_heading($user_id);
								$dec_description = ppo_get_daycare_user_annual_plan_dec_description($user_id);
							?>
							
                            <div class="row">

                                <div class="position-relative">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">Januar</h4>

                                    <input name="jan_task" id="jan_task" placeholder="Overskrift" class="form-input ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-50 px-3 position-absolute" style="top:0;left:50%;transform:translateX(-50%);" value="<?php echo $jan_heading; ?>">

                                </div>

                                <div class="my-3">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control ppo-br-16 bg-white ppo-b2-light" name="jan_task_description" id="jan_task_description" maxlength="300" minlength="250" rows="4" placeholder=""><?php echo $jan_description; ?></textarea>
                                    </div>

                                    <p class="d-flex justify-content-end text-light fw-bold fs-5 mb-3">
                                        Maks 300 ord - 250/300
                                    </p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="position-relative">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">Februar</h4>

                                    <input name="feb_task" id="feb_task" placeholder="Overskrift" class="form-input ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-50 px-3 position-absolute" style="top:0;left:50%;transform:translateX(-50%);" value="<?php echo $feb_heading; ?>">

                                </div>

                                <div class="my-3">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control ppo-br-16 bg-white ppo-b2-light" name="feb_task_description" id="feb_task_description" maxlength="300" minlength="250" rows="4" placeholder=""><?php echo $feb_description; ?></textarea>
                                    </div>

                                    <p class="d-flex justify-content-end text-light fw-bold fs-5 mb-3">
                                        Maks 300 ord - 250/300
                                    </p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="position-relative">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">Marts</h4>

                                    <input name="march_task" id="march_task" placeholder="Overskrift" class="form-input ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-50 px-3 position-absolute" style="top:0;left:50%;transform:translateX(-50%);" value="<?php echo $mar_heading; ?>">

                                </div>

                                <div class="my-3">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control ppo-br-16 bg-white ppo-b2-light" name="march_task_description" id="march_task_description" maxlength="300" minlength="250" rows="4" placeholder=""><?php echo $mar_description; ?></textarea>
                                    </div>

                                    <p class="d-flex justify-content-end text-light fw-bold fs-5 mb-3">
                                        Maks 300 ord - 250/300
                                    </p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="position-relative">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">April</h4>

                                    <input name="april_task" id="apr_task" placeholder="Overskrift" class="form-input ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-50 px-3 position-absolute" style="top:0;left:50%;transform:translateX(-50%);" value="<?php echo $apr_heading; ?>">

                                </div>

                                <div class="my-3">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control ppo-br-16 bg-white ppo-b2-light" name="april_task_description" id="apr_task_description" maxlength="300" minlength="250" rows="4" placeholder=""><?php echo $apr_description; ?></textarea>
                                    </div>

                                    <p class="d-flex justify-content-end text-light fw-bold fs-5 mb-3">
                                        Maks 300 ord - 250/300
                                    </p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="position-relative">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">Maj</h4>

                                    <input name="may_task" id="may_task" placeholder="Overskrift" class="form-input ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-50 px-3 position-absolute" style="top:0;left:50%;transform:translateX(-50%);" value="<?php echo $may_heading; ?>">

                                </div>

                                <div class="my-3">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control ppo-br-16 bg-white ppo-b2-light" name="may_task_description" id="may_task_description" maxlength="300" minlength="250" rows="4" placeholder=""><?php echo $may_description; ?></textarea>
                                    </div>

                                    <p class="d-flex justify-content-end text-light fw-bold fs-5 mb-3">
                                        Maks 300 ord - 250/300
                                    </p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="position-relative">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">Juni</h4>

                                    <input name="jun_task" id="jun_task" placeholder="Overskrift" class="form-input ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-50 px-3 position-absolute" style="top:0;left:50%;transform:translateX(-50%);" value="<?php echo $jun_heading; ?>">

                                </div>

                                <div class="my-3">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control ppo-br-16 bg-white ppo-b2-light" name="jun_task_description" id="jun_task_description" maxlength="300" minlength="250" rows="4" placeholder=""><?php echo $jun_description; ?></textarea>
                                    </div>

                                    <p class="d-flex justify-content-end text-light fw-bold fs-5 mb-3">
                                        Maks 300 ord - 250/300
                                    </p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="position-relative">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">Juli</h4>

                                    <input name="jul_task" id="jul_task" placeholder="Overskrift" class="form-input ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-50 px-3 position-absolute" style="top:0;left:50%;transform:translateX(-50%);" value="<?php echo $jul_heading; ?>">

                                </div>

                                <div class="my-3">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control ppo-br-16 bg-white ppo-b2-light" name="jul_task_description" id="jul_task_description" maxlength="300" minlength="250" rows="4" placeholder=""><?php echo $jul_description; ?></textarea>
                                    </div>

                                    <p class="d-flex justify-content-end text-light fw-bold fs-5 mb-3">
                                        Maks 300 ord - 250/300
                                    </p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="position-relative">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">August</h4>

                                    <input name="aug_task" id="aug_task" placeholder="Overskrift" class="form-input ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-50 px-3 position-absolute" style="top:0;left:50%;transform:translateX(-50%);" value="<?php echo $aug_heading; ?>">

                                </div>

                                <div class="my-3">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control ppo-br-16 bg-white ppo-b2-light" name="aug_task_description" id="aug_task_description" maxlength="300" minlength="250" rows="4" placeholder=""><?php echo $aug_description; ?></textarea>
                                    </div>

                                    <p class="d-flex justify-content-end text-light fw-bold fs-5 mb-3">
                                        Maks 300 ord - 250/300
                                    </p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="position-relative">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">September</h4>

                                    <input name="sep_task" id="sep_task" placeholder="Overskrift" class="form-input ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-50 px-3 position-absolute" style="top:0;left:50%;transform:translateX(-50%);" value="<?php echo $sep_heading; ?>">

                                </div>

                                <div class="my-3">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control ppo-br-16 bg-white ppo-b2-light" name="sep_task_description" id="sep_task_description" maxlength="300" minlength="250" rows="4" placeholder=""><?php echo $sep_description; ?></textarea>
                                    </div>

                                    <p class="d-flex justify-content-end text-light fw-bold fs-5 mb-3">
                                        Maks 300 ord - 250/300
                                    </p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="position-relative">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">Oktober</h4>

                                    <input name="oct_task" id="oct_task" placeholder="Overskrift" class="form-input ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-50 px-3 position-absolute" style="top:0;left:50%;transform:translateX(-50%);" value="<?php echo $oct_heading; ?>">

                                </div>

                                <div class="my-3">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control ppo-br-16 bg-white ppo-b2-light" name="oct_task_description" id="oct_task_description" maxlength="300" minlength="250" rows="4" placeholder=""><?php echo $oct_description; ?></textarea>
                                    </div>

                                    <p class="d-flex justify-content-end text-light fw-bold fs-5 mb-3">
                                        Maks 300 ord - 250/300
                                    </p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="position-relative">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">November</h4>

                                    <input name="nov_task" id="nov_task" placeholder="Overskrift" class="form-input ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-50 px-3 position-absolute" style="top:0;left:50%;transform:translateX(-50%);" value="<?php echo $nov_heading; ?>">

                                </div>

                                <div class="my-3">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control ppo-br-16 bg-white ppo-b2-light" name="nov_task_description" id="nov_task_description" maxlength="300" minlength="250" rows="4" placeholder=""><?php echo $nov_description; ?></textarea>
                                    </div>

                                    <p class="d-flex justify-content-end text-light fw-bold fs-5 mb-3">
                                        Maks 300 ord - 250/300
                                    </p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="position-relative">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 ppo-bg-secondary d-inline-block">December</h4>

                                    <input name="dec_task" id="dec_task" placeholder="Overskrift" class="form-input ppo-br-16 text-dark bg-white fw-bold fs-5 ppo-b2-light w-50 px-3 position-absolute" style="top:0;left:50%;transform:translateX(-50%);" value="<?php echo $dec_heading; ?>">

                                </div>

                                <div class="my-3">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control ppo-br-16 bg-white ppo-b2-light" name="dec_task_description" id="dec_task_description" maxlength="300" minlength="250" rows="4" placeholder=""><?php echo $dec_description; ?></textarea>
                                    </div>

                                    <p class="d-flex justify-content-end text-light fw-bold fs-5 mb-3">
                                        Maks 300 ord - 250/300
                                    </p>
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button class="btn py-1 px-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow ppo-bg-primary text-light fs-4 w-25" id="ppo_daycare_annual_plan_button">
                                    GEM
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <!-- Tab Contents | Profile Settings | ## Holiday Info -->
            <div id="ppoTebContentHolidayInfoOfProfileSettings" class="ppo-profile-settings-tab-content" style="display:none;">

                <!-- All Holiday Section -->
                <div class="row mb-3 ppo-br-16 ppo-bg-card">
                    <div class="text-center ppo-box-shadow py-1 ppo-bg-secondary ppo-br-16">
                        <h3 class="text-light fs-5 fw-bold">Ferie/Helligdage/Lukkedage</h3>
                    </div>

                    <!-- Months Data -->
                    <div class="p-4">

                        <p class="text-light fw-bold fs-5 mb-4">
                            Indtast dine ferier for året (<?php echo date("Y"); ?>) her.
                        </p> <!-- Enter your holidays for the year (2023) here. -->

                        <form action="" method="post">

							<?php
								$jan_data = ppo_get_daycare_user_holliday_plan_jan_description($user_id);
								$feb_data = ppo_get_daycare_user_holliday_plan_feb_description($user_id);
								$mar_data = ppo_get_daycare_user_holliday_plan_mar_description($user_id);
								$apr_data = ppo_get_daycare_user_holliday_plan_apr_description($user_id);
								$may_data = ppo_get_daycare_user_holliday_plan_may_description($user_id);
								$jun_data = ppo_get_daycare_user_holliday_plan_may_description($user_id);
								$jul_data = ppo_get_daycare_user_holliday_plan_jul_description($user_id);
								$aug_data = ppo_get_daycare_user_holliday_plan_aug_description($user_id);
								$sep_data = ppo_get_daycare_user_holliday_plan_sep_description($user_id);
								$oct_data = ppo_get_daycare_user_holliday_plan_oct_description($user_id);
								$nov_data = ppo_get_daycare_user_holliday_plan_nov_description($user_id);
								$dec_data = ppo_get_daycare_user_holliday_plan_dec_description($user_id);
							?>
							
                            <div class="my-3">
                                <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Januar</h4>
                                    <input name="jan_holidays" id="jan_holidays" placeholder="Skriv her..." class="form-input text-dark px-2 bg-transparent border-0 w-75 ppo-br-16" value="<?php echo $jan_data; ?>">
                                </div>

                            </div>

                            <div class="my-3">
                                <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Februar</h4>
                                    <input name="feb_holidays" id="feb_holidays" placeholder="Skriv her..." class="form-input text-dark px-2 bg-transparent border-0 w-75 ppo-br-16" value="<?php echo $feb_data; ?>">
                                </div>

                            </div>

                            <div class="my-3">
                                <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Marts</h4>
                                    <input name="mar_holidays" id="mar_holidays" placeholder="Skriv her..." class="form-input text-dark px-2 bg-transparent border-0 w-75 ppo-br-16" value="<?php echo $mar_data; ?>">
                                </div>

                            </div>

                            <div class="my-3">
                                <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">April</h4>
                                    <input name="apr_holidays" id="apr_holidays" placeholder="Skriv her..." class="form-input text-dark px-2 bg-transparent border-0 w-75 ppo-br-16" value="<?php echo $apr_data; ?>">
                                </div>

                            </div>

                            <div class="my-3">
                                <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Maj</h4>
                                    <input name="may_holidays" id="may_holidays" placeholder="Skriv her..." class="form-input text-dark px-2 bg-transparent border-0 w-75 ppo-br-16" value="<?php echo $may_data; ?>">
                                </div>

                            </div>

                            <div class="my-3">
                                <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Juni</h4>
                                    <input name="jun_holidays" id="jun_holidays" placeholder="Skriv her..." class="form-input text-dark px-2 bg-transparent border-0 w-75 ppo-br-16" value="<?php echo $jun_data; ?>">
                                </div>

                            </div>

                            <div class="my-3">
                                <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Juli</h4>
                                    <input name="jul_holidays" id="jul_holidays" placeholder="Skriv her..." class="form-input text-dark px-2 bg-transparent border-0 w-75 ppo-br-16" value="<?php echo $jul_data; ?>">
                                </div>

                            </div>

                            <div class="my-3">
                                <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">August</h4>
                                    <input name="aug_holidays" id="aug_holidays" placeholder="Skriv her..." class="form-input text-dark px-2 bg-transparent border-0 w-75 ppo-br-16" value="<?php echo $aug_data; ?>">
                                </div>

                            </div>

                            <div class="my-3">
                                <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">September</h4>
                                    <input name="sep_holidays" id="sep_holidays" placeholder="Skriv her..." class="form-input text-dark px-2 bg-transparent border-0 w-75 ppo-br-16" value="<?php echo $sep_data; ?>">
                                </div>

                            </div>

                            <div class="my-3">
                                <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">Oktober</h4>
                                    <input name="oct_holidays" id="oct_holidays" placeholder="Skriv her..." class="form-input text-dark px-2 bg-transparent border-0 w-75 ppo-br-16" value="<?php echo $oct_data; ?>">
                                </div>

                            </div>

                            <div class="my-3">
                                <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">November</h4>
                                    <input name="nov_holidays" id="nov_holidays" placeholder="Skriv her..." class="form-input text-dark px-2 bg-transparent border-0 w-75 ppo-br-16" value="<?php echo $nov_data; ?>">
                                </div>

                            </div>

                            <div class="my-3">
                                <div class="d-flex justify-content-start align-items-center bg-white ppo-br-16">
                                    <h4 class="text-white px-2 py-1 ppo-br-12 mb-0 w-25 fs-5 ppo-bg-secondary d-inline-block">December</h4>
                                    <input name="dec_holidays" id="dec_holidays" placeholder="Skriv her..." class="form-input text-dark px-2 bg-transparent border-0 w-75 ppo-br-16" value="<?php echo $dec_data; ?>">
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button class="btn py-1 px-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow ppo-bg-primary text-light fs-4 w-25" id="ppo_daycare_holidays_button">
                                    GEM
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</article><!-- #post-<?php the_ID(); ?> -->

<!-- Modals -->
<?php ppo_manage_plan_modal(); ?>
<?php ppo_edit_manage_plan_modal(); ?>
<?php ppo_profile_page_popup_modal(); ?>

<script defer>
    "use strict";


    jQuery(document).ready(function() {
		function ppoMultiSelectionDataHandler(DataArr, dataAttrName) {
			const dataSet = [];
			jQuery.each( DataArr, (idx, item) => dataSet.push(item.dataset[dataAttrName]))
			return dataSet.toString();
		}
		function ppoUpdateAvailableMonthsPerYear( dataArr, obj, selectedYear ) {
			jQuery.each( dataArr, (idx, item) => {
				if( obj[`${selectedYear}`].includes(item.dataset.ppoSpotMonth) ) {
					if(item.classList.contains("disabled")) item.classList.remove('disabled')
					item.classList.add('enabled')
				}
			});
		}
		
		function ppoProcessingTimeStart(ele) {
			ele.target.innerText = 'GEM...'
			ele.target.classList.add("disabled")
		}
		function ppoProcessingTimeEnd(ele) {
			ele.target.innerText = 'GEM'
			ele.target.classList.remove("disabled")
		}
		
		/* +++ GENERAL INFO +++ */
		if( jQuery("#ppoTebContentGeneralInfoOfProfileSettings") ) {
			
			jQuery("#ppoTebContentGeneralInfoOfProfileSettings #ppo_daycare_description_button").on('click', (e) => {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				// Variable Declaration
				const description = jQuery('#ppoTebContentGeneralInfoOfProfileSettings #profile_description').val();
				
				// Ajax
				ppoAjaxHandler(
					{
						profile_description: description
					},
					'ppo_daycare_profile_description_action',
					afterAction
				);

				// after action func
				function afterAction() {
					if( jQuery("#generalInfo") ) {
						if(jQuery("#ppoDescriptionPreview")) jQuery("#ppoDescriptionPreview").html(description);
					}
					ppoProcessingTimeEnd(e);
				}
			})
			
			// Available Spots
			const availableSpotdata = ppo_data?.available_spots ? ppo_data?.available_spots : {};
			let selectedYear = jQuery( '#ppoTebContentGeneralInfoOfProfileSettings [data-ppo-spot-year].active' ).html()
			
			// Enabled Selected Months
			ppoUpdateAvailableMonthsPerYear( jQuery( '#generalInfo [data-ppo-spot-month]' ), availableSpotdata, selectedYear );
			ppoUpdateAvailableMonthsPerYear( jQuery( '#ppoTebContentGeneralInfoOfProfileSettings [data-ppo-spot-month]' ), availableSpotdata, selectedYear );			
			
			/* Preview Section */
			
			if("#generalInfo") {
				// Seclect Year
				jQuery( '#generalInfo [data-ppo-spot-year]' ).on('click', (e) => {
					e.preventDefault();

					// Reset Options
					jQuery( '#generalInfo [data-ppo-spot-year].active' ).removeClass("active");
					jQuery( '#generalInfo [data-ppo-spot-month].enabled' ).removeClass("enabled").addClass("disabled");

					// Actions
					e.target.classList.toggle("active")
					selectedYear = e.target.dataset.ppoSpotYear

					// Define Spot Obj Data
					availableSpotdata[`${selectedYear}`] = availableSpotdata[`${selectedYear}`] ? [...availableSpotdata[`${selectedYear}`]] : [];

					// Enabled Selected Months
					ppoUpdateAvailableMonthsPerYear( jQuery( '#generalInfo [data-ppo-spot-month]' ), availableSpotdata, selectedYear );
				});
			}
			
			/* End Preview Section */
			
			// Seclect Year
			jQuery( '#ppoTebContentGeneralInfoOfProfileSettings [data-ppo-spot-year]' ).on('click', (e) => {
				e.preventDefault();
				
				// Reset Options
				jQuery( '#ppoTebContentGeneralInfoOfProfileSettings [data-ppo-spot-year].active' ).removeClass("active");
				jQuery( '#ppoTebContentGeneralInfoOfProfileSettings [data-ppo-spot-month].enabled' ).removeClass("enabled");
				
				// Actions
				e.target.classList.toggle("active")
				selectedYear = e.target.dataset.ppoSpotYear
				
				// Define Spot Obj Data
				availableSpotdata[`${selectedYear}`] = availableSpotdata[`${selectedYear}`] ? [...availableSpotdata[`${selectedYear}`]] : [];
								
				// Enabled Selected Months
				ppoUpdateAvailableMonthsPerYear( jQuery( '#ppoTebContentGeneralInfoOfProfileSettings [data-ppo-spot-month]' ), availableSpotdata, selectedYear );
			});
			
			jQuery( '#ppoTebContentGeneralInfoOfProfileSettings [data-ppo-spot-month]' ).on('click', (e) => {
				e.preventDefault();
				e.target.classList.toggle("enabled")
				const selectedMonth = e.target.dataset.ppoSpotMonth
				availableSpotdata[`${selectedYear}`] = availableSpotdata[`${selectedYear}`] ? [...availableSpotdata[`${selectedYear}`]] : [];
				
				if( ! availableSpotdata[`${selectedYear}`].includes(selectedMonth) ) availableSpotdata[`${selectedYear}`].push(selectedMonth);
				else availableSpotdata[`${selectedYear}`].splice( availableSpotdata[`${selectedYear}`].indexOf( selectedMonth ), 1 );
												
			});
			
			// Submit
			jQuery("#ppoTebContentGeneralInfoOfProfileSettings #ppo_daycare_available_spots_button").on( 'click', (e) =>  {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				if( ! jQuery( '#ppoTebContentGeneralInfoOfProfileSettings [data-ppo-spot-month].enabled' )) return alert('Vælg venligst spots');
				
				// Ajax
				ppoAjaxHandler(
					{
						available_spots: availableSpotdata
					},
					'ppo_daycare_available_spots_action',
					afterAction
				);
				
				// After Action Func
				function afterAction() {
					// Update Preview Section
					jQuery("#generalInfo [data-ppo-spot-year].active").removeClass("active")
					jQuery(`#generalInfo [data-ppo-spot-year="${selectedYear}"]`).addClass("active")
					jQuery( '#generalInfo [data-ppo-spot-month].enabled').removeClass('enabled').addClass('disabled')
					ppoUpdateAvailableMonthsPerYear( jQuery( '#generalInfo [data-ppo-spot-month]' ), availableSpotdata, selectedYear );
					ppoProcessingTimeEnd(e);
				}
			});
			
			// Keywords
			jQuery("#ppoTebContentGeneralInfoOfProfileSettings #ppo_daycare_keywords_button").on( 'click', (e) =>  {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				// Data
				let keywordList = [];
				jQuery.each( jQuery("#ppoTebContentGeneralInfoOfProfileSettings #ppoDaycareKeywordsForm input"), (idx, item) => {
					if( item.value ) keywordList.push(item.value)
				});
				const parsedKeywordListIntoStr = keywordList.toString();
				
				// Ajax
				ppoAjaxHandler(
					{
						keywords: parsedKeywordListIntoStr
					},
					'ppo_daycare_keywords_action',
					afterAction
				);

				// after action func
				function afterAction() {
					if( jQuery("#generalInfo") ) {
						const keywordsArr = parsedKeywordListIntoStr.split(",");
						if(jQuery("#ppoKeywordsPreview")) jQuery("#ppoKeywordsPreview").html(keywordsArr.map( item => `<button class="btn text-dark bg-light fw-bold fs-5" style="pointer-events:none;">${item}</button>`));
					}
					ppoProcessingTimeEnd(e);
				}
				
			});
					
			
		}
		
		/* +++ PRICE +++ */
		// Price
		if( jQuery("#ppoTebContentPriceOfProfileSettings") ) {
			jQuery("#ppoTebContentPriceOfProfileSettings #ppo_daycare_prices_button").on('click', (e) => {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				// Variable Declaration
				const monthlyRate = jQuery('#ppoTebContentPriceOfProfileSettings #price_1').val(),
					msRate = jQuery('#ppoTebContentPriceOfProfileSettings #price_2').val(),
					total = jQuery('#ppoTebContentPriceOfProfileSettings #price_3').val();
				
				// Ajax
				ppoAjaxHandler(
					{
						user_monthly_rate: monthlyRate,
						user_municipality_subsidy_rate: msRate,
						user_total_price: total,
					},
					'ppo_daycare_prices_action',
					afterAction
				);

				// after action func
				function afterAction() {
					if( jQuery("#ppoTebContentCertificateDetailsOfProfileSettings") ) {
						const currency = ',-';
						if(jQuery("#ppoDaycareMonthlyRatePreview")) jQuery("#ppoDaycareMonthlyRatePreview").html(`${monthlyRate} ${currency}`);
						if(jQuery("#ppoDaycareMunicipalitySubsidyRatePreview")) jQuery("#ppoDaycareMunicipalitySubsidyRatePreview").html(`${msRate} ${currency}`);
						if(jQuery("#ppoDaycareTotalPreview")) jQuery("#ppoDaycareTotalPreview").html(`${total} ${currency}`);
						
					}
					ppoProcessingTimeEnd(e);
				}
				
			});
			
			// Price Included List
			jQuery('#ppoTebContentPriceOfProfileSettings #ppo_daycare_price_included_list_button').on('click', (e) => {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				// Data
				let includedList = [];
				jQuery.each( jQuery("#ppoTebContentPriceOfProfileSettings #ppoPriceIncludedListForm input"), (idx, item) => {
					if( item.value ) includedList.push(item.value)
				});
				const parsedIncludedListIntoStr = includedList.toString();

				// Ajax
				ppoAjaxHandler(
					{
						included_list_str: parsedIncludedListIntoStr,
					},
					'ppo_daycare_price_included_list_action',
					afterAction
				);

				// after action func
				function afterAction() {
					if( jQuery("#ppoTebContentCertificateDetailsOfProfileSettings") ) {
						const includedItemArr = parsedIncludedListIntoStr.split(",");
						if(jQuery("#ppoPricesIncludedItemsPreview")) jQuery("#ppoPricesIncludedItemsPreview").html(includedItemArr.map( item => `<button class="btn text-dark bg-light fw-bold fs-5" style="pointer-events:none;">${item}</button>`));
					}
					ppoProcessingTimeEnd(e);
				}
				
			});
						
			// Price Included List
			jQuery('#ppoTebContentPriceOfProfileSettings #ppo_daycare_bring_user_own_item_list_button').on('click', (e) => {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				// Data
				let listArr = [];
				jQuery.each( jQuery("#ppoTebContentPriceOfProfileSettings #ppoBringUserOwnItemListForm input"), (idx, item) => {
					if( item.value ) listArr.push(item.value)
				});
				const parsedBringUserOwnItemListIntoStr = listArr.toString();

				// Ajax
				ppoAjaxHandler(
					{
						own_item_list_str: parsedBringUserOwnItemListIntoStr,
					},
					'ppo_daycare_bring_user_own_item_list_action',
					afterAction
				);

				// after action func
				function afterAction() {
					if( jQuery("#ppoTebContentCertificateDetailsOfProfileSettings") ) {
						const userOwnItemArr = parsedBringUserOwnItemListIntoStr.split(",");
						if(jQuery("#ppoUserOwnItemsPreview")) jQuery("#ppoUserOwnItemsPreview").html(userOwnItemArr.map( item => `<button class="btn text-dark bg-light fw-bold fs-5" style="pointer-events:none;">${item}</button>`));
					}
					ppoProcessingTimeEnd(e);
				}
				
			});
			
			
		}
		
		
		
		/* +++ Certificates & Annual Plans +++ */ ppoTebContentCertificateDetailsOfProfileSettings
		if(jQuery("#ppoTebContentCertificateDetailsOfProfileSettings") ){

			// Certificates
			jQuery("#ppoTebContentCertificateDetailsOfProfileSettings #ppo_daycare_certificate_selection_button").on('click', (e) => {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				const parsedCertificateData = ppoMultiSelectionDataHandler(jQuery('#ppoTebContentCertificateDetailsOfProfileSettings [data-ppo-certificate].selected'), 'ppoCertificate');
				// Ajax
				ppoAjaxHandler(
					{certificates: parsedCertificateData},
					'ppo_daycare_certificates_action',
					afterAction
				);

				// after action func
				function afterAction() {
					if( jQuery("#ppoTebContentCertificateDetailsOfProfileSettings") ) {
						const certificateArr = parsedCertificateData.split(",");
						if(jQuery("#ppoCertificatesPreview")) jQuery("#ppoCertificatesPreview").html(certificateArr.map( item => `
							<div class="mx-1">
								<div class="px-3 py-1 fw-bold bg-white w-auto ppo-br-16">${item}</div>
							</div>
						`));
					}
					ppoProcessingTimeEnd(e);
				}
				
			});
			
			
			// Annual Plan
			jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #ppo_daycare_annual_plan_button').on('click', (e) => {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				// Variables Declaration
				const janHeading = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #jan_task').val(),
					febHeading = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #feb_task').val(),
					marHeading = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #mar_task').val(),
					aprHeading = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #apr_task').val(),
					mayHeading = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #may_task').val(),
					junHeading = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #jun_task').val(),
					julHeading = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #jul_task').val(),
					augHeading = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #aug_task').val(),
					sepHeading = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #sep_task').val(),
					octHeading = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #oct_task').val(),
					novHeading = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #nov_task').val(),
					decHeading = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #dec_task').val(),

					janDescription = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #jan_task_description').val(),
					febDescription =  jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #feb_task_description').val(),
					marDescription = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #mar_task_description').val(),
					aprDescription = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #apr_task_description').val(),
					mayDescription = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #may_task_description').val(),
					junDescription = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #jun_task_description').val(),
					julDescription = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #jul_task_description').val(),
					augDescription = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #aug_task_description').val(),
					sepDescription = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #sep_task_description').val(),
					octDescription = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #oct_task_description').val(),
					novDescription = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #nov_task_description').val(),
					decDescription = jQuery('#ppoTebContentCertificateDetailsOfProfileSettings #dec_task_description').val();
				
				// Ajax
				ppoAjaxHandler(
					{
						jan_heading: janHeading,
						feb_heading: febHeading,
						mar_heading: marHeading,
						apr_heading: aprHeading,
						may_heading: mayHeading,
						jun_heading: junHeading,
						jul_heading: julHeading,
						aug_heading: augHeading,
						sep_heading: sepHeading,
						oct_heading: octHeading,
						nov_heading: novHeading,
						dec_heading: decHeading,
						
						jan_description: janDescription,
						feb_description: febDescription,
						mar_description: marDescription,
						apr_description: aprDescription,
						may_description: mayDescription,
						jun_description: junDescription,
						jul_description: julDescription,
						aug_description: augDescription,
						sep_description: sepDescription,
						oct_description: octDescription,
						nov_description: novDescription,
						dec_description: decDescription,
					},
					'ppo_daycare_annual_plan_action',
					afterAction
				);

				// after action func
				function afterAction() {
					if( jQuery("#ppoTebContentCertificateDetailsOfProfileSettings") ) {
						if(jQuery("#ppoAnnualPLanJanHeadingPreview")) jQuery("#ppoAnnualPLanJanHeadingPreview").html(janHeading);
						if(jQuery("#ppoAnnualPLanFebHeadingPreview")) jQuery("#ppoAnnualPLanFebHeadingPreview").html(febHeading);
						if(jQuery("#ppoAnnualPLanMarHeadingPreview")) jQuery("#ppoAnnualPLanMarHeadingPreview").html(marHeading);
						if(jQuery("#ppoAnnualPLanAprHeadingPreview")) jQuery("#ppoAnnualPLanAprHeadingPreview").html(aprHeading);
						if(jQuery("#ppoAnnualPLanMayHeadingPreview")) jQuery("#ppoAnnualPLanMayHeadingPreview").html(mayHeading);
						if(jQuery("#ppoAnnualPLanJunHeadingPreview")) jQuery("#ppoAnnualPLanJunHeadingPreview").html(junHeading);
						if(jQuery("#ppoAnnualPLanJulHeadingPreview")) jQuery("#ppoAnnualPLanJulHeadingPreview").html(julHeading);
						if(jQuery("#ppoAnnualPLanAugHeadingPreview")) jQuery("#ppoAnnualPLanAugHeadingPreview").html(augHeading);
						if(jQuery("#ppoAnnualPLanSepHeadingPreview")) jQuery("#ppoAnnualPLanSepHeadingPreview").html(sepHeading);
						if(jQuery("#ppoAnnualPLanOctHeadingPreview")) jQuery("#ppoAnnualPLanOctHeadingPreview").html(octHeading);
						if(jQuery("#ppoAnnualPLanNovHeadingPreview")) jQuery("#ppoAnnualPLanNovHeadingPreview").html(novHeading);
						if(jQuery("#ppoAnnualPLanDecHeadingPreview")) jQuery("#ppoAnnualPLanDecHeadingPreview").html(decHeading);
						
						if(jQuery("#ppoAnnualPLanJanDescriptionPreview")) jQuery("#ppoAnnualPLanJanDescriptionPreview").html(janDescription);
						if(jQuery("#ppoAnnualPLanFebDescriptionPreview")) jQuery("#ppoAnnualPLanFebDescriptionPreview").html(febDescription);
						if(jQuery("#ppoAnnualPLanMarDescriptionPreview")) jQuery("#ppoAnnualPLanMarDescriptionPreview").html(marDescription);
						if(jQuery("#ppoAnnualPLanAprDescriptionPreview")) jQuery("#ppoAnnualPLanAprDescriptionPreview").html(aprDescription);
						if(jQuery("#ppoAnnualPLanMayDescriptionPreview")) jQuery("#ppoAnnualPLanMayDescriptionPreview").html(mayDescription);
						if(jQuery("#ppoAnnualPLanJunDescriptionPreview")) jQuery("#ppoAnnualPLanJunDescriptionPreview").html(junDescription);
						if(jQuery("#ppoAnnualPLanJulDescriptionPreview")) jQuery("#ppoAnnualPLanJulDescriptionPreview").html(julDescription);
						if(jQuery("#ppoAnnualPLanAugDescriptionPreview")) jQuery("#ppoAnnualPLanAugDescriptionPreview").html(augDescription);
						if(jQuery("#ppoAnnualPLanSepDescriptionPreview")) jQuery("#ppoAnnualPLanSepDescriptionPreview").html(sepDescription);
						if(jQuery("#ppoAnnualPLanOctDescriptionPreview")) jQuery("#ppoAnnualPLanOctDescriptionPreview").html(octDescription);
						if(jQuery("#ppoAnnualPLanNovDescriptionPreview")) jQuery("#ppoAnnualPLanNovDescriptionPreview").html(novDescription);
						if(jQuery("#ppoAnnualPLanDecDescriptionPreview")) jQuery("#ppoAnnualPLanDecDescriptionPreview").html(decDescription);
					}
					ppoProcessingTimeEnd(e);
				}
				
			});
		}
		
		/* +++ HOLIDAYS +++ */
		// Holidays
		if(jQuery("#ppoTebContentHolidayInfoOfProfileSettings #ppo_daycare_holidays_button")) {

			jQuery('#ppoTebContentHolidayInfoOfProfileSettings #ppo_daycare_holidays_button').on('click', (e) => {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				// Variables Declaration
				const janHolidayInfo = jQuery('#ppoTebContentHolidayInfoOfProfileSettings #jan_holidays').val(),
					febHolidayInfo = jQuery('#ppoTebContentHolidayInfoOfProfileSettings #feb_holidays').val(),
					marHolidayInfo = jQuery('#ppoTebContentHolidayInfoOfProfileSettings #mar_holidays').val(),
					aprHolidayInfo = jQuery('#ppoTebContentHolidayInfoOfProfileSettings #apr_holidays').val(),
					mayHolidayInfo = jQuery('#ppoTebContentHolidayInfoOfProfileSettings #may_holidays').val(),
					junHolidayInfo = jQuery('#ppoTebContentHolidayInfoOfProfileSettings #jun_holidays').val(),
					julHolidayInfo = jQuery('#ppoTebContentHolidayInfoOfProfileSettings #jul_holidays').val(),
					augHolidayInfo = jQuery('#ppoTebContentHolidayInfoOfProfileSettings #aug_holidays').val(),
					sepHolidayInfo = jQuery('#ppoTebContentHolidayInfoOfProfileSettings #sep_holidays').val(),
					octHolidayInfo = jQuery('#ppoTebContentHolidayInfoOfProfileSettings #oct_holidays').val(),
					novHolidayInfo = jQuery('#ppoTebContentHolidayInfoOfProfileSettings #nov_holidays').val(),
					decHolidayInfo = jQuery('#ppoTebContentHolidayInfoOfProfileSettings #dec_holidays').val();
				
				// Ajax
				ppoAjaxHandler(
					{
						jan: janHolidayInfo,
						feb: febHolidayInfo,
						mar: marHolidayInfo,
						apr: aprHolidayInfo,
						may: mayHolidayInfo,
						jun: junHolidayInfo,
						jul: julHolidayInfo,
						aug: augHolidayInfo,
						sep: sepHolidayInfo,
						oct: octHolidayInfo,
						nov: novHolidayInfo,
						dec: decHolidayInfo,
					},
					'ppo_daycare_update_holidays_action',
					afterAction
				);

				// after action func
				function afterAction() {
					if( jQuery("#ppoTebContentHolidayInfoOfProfileSettings") ) {
						if(jQuery("#ppoHolidayPLanJanPreview")) jQuery("#ppoHolidayPLanJanPreview").html(janHolidayInfo);
						if(jQuery("#ppoHolidayPLanFebPreview")) jQuery("#ppoHolidayPLanFebPreview").html(febHolidayInfo);
						if(jQuery("#ppoHolidayPLanMarPreview")) jQuery("#ppoHolidayPLanMarPreview").html(marHolidayInfo);
						if(jQuery("#ppoHolidayPLanAprPreview")) jQuery("#ppoHolidayPLanAprPreview").html(aprHolidayInfo);
						if(jQuery("#ppoHolidayPLanMayPreview")) jQuery("#ppoHolidayPLanMayPreview").html(mayHolidayInfo);
						if(jQuery("#ppoHolidayPLanJunPreview")) jQuery("#ppoHolidayPLanJunPreview").html(junHolidayInfo);
						if(jQuery("#ppoHolidayPLanJulPreview")) jQuery("#ppoHolidayPLanJulPreview").html(julHolidayInfo);
						if(jQuery("#ppoHolidayPLanAugPreview")) jQuery("#ppoHolidayPLanAugPreview").html(augHolidayInfo);
						if(jQuery("#ppoHolidayPLanSepPreview")) jQuery("#ppoHolidayPLanSepPreview").html(sepHolidayInfo);
						if(jQuery("#ppoHolidayPLanOctPreview")) jQuery("#ppoHolidayPLanOctPreview").html(octHolidayInfo);
						if(jQuery("#ppoHolidayPLanNovPreview")) jQuery("#ppoHolidayPLanNovPreview").html(novHolidayInfo);
						if(jQuery("#ppoHolidayPLanDecPreview")) jQuery("#ppoHolidayPLanDecPreview").html(decHolidayInfo);
					}
					ppoProcessingTimeEnd(e);
				}
				
			});
		}
		
		/* +++ PROFILE +++ */
		// Kids Number
		if(jQuery("#ppoTebContentProfileOfProfileSettings #ppo_kids_num_approved_button")) {

			jQuery('#ppoTebContentProfileOfProfileSettings #ppo_kids_num_approved_button').on('click', (e) => {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				// Variables Declaration
				const kidsNum = jQuery('#ppoTebContentProfileOfProfileSettings #ppo_kids_num_approved').val();
				
				// Ajax
				ppoAjaxHandler(
					{
						ppo_kids_num_approved: kidsNum
					},
					'ppo_daycare_kids_number_action',
					afterAction
				);

				// after action func
				function afterAction() {
					if( jQuery("#ppoProfilePreviewTabContent") ) {
						if(jQuery("#ppoKidsNumberPreview")) jQuery("#ppoKidsNumberPreview").html(kidsNum);
					}
					ppoProcessingTimeEnd(e);
				}
				
			});
		}
		// Does Smoke
		if(jQuery("#ppoTebContentProfileOfProfileSettings #ppo_daycare_smoking_status")) {

			jQuery('#ppoTebContentProfileOfProfileSettings #ppo_daycare_smoking_status').on('click', (e) => {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				// Variables Declaration
				const doesSmoke = jQuery('#ppoTebContentProfileOfProfileSettings #smokingYes').is(':checked') ? 1 : 0;
				// Ajax
				ppoAjaxHandler(
					{
						yes: doesSmoke,
					},
					'ppo_daycare_smoking_status_action',
					afterAction
				);

				// after action func
				function afterAction() {
					if( jQuery("#ppoProfilePreviewTabContent") ) {
						if(jQuery("#ppoSmokingStatusPreview")) jQuery("#ppoSmokingStatusPreview").html(doesSmoke ? 'Ryger' : 'Ikke ryger');
					}
					ppoProcessingTimeEnd(e);
				}
				
			});
		}
		// Social Handlers
		if(jQuery("#ppoTebContentProfileOfProfileSettings #ppo_social_handler_button")) {

			jQuery('#ppoTebContentProfileOfProfileSettings #ppo_social_handler_button').on('click', (e) => {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				// Variables Declaration
				const webAddress = jQuery('#ppoTebContentProfileOfProfileSettings #ppo_social_web').val();
				const fbLink = jQuery('#ppoTebContentProfileOfProfileSettings #ppo_social_fb').val();
				const instagramLink = jQuery('#ppoTebContentProfileOfProfileSettings #ppo_social_instagram').val();
				const tiktokLink = jQuery('#ppoTebContentProfileOfProfileSettings #ppo_social_tiktok').val();
				const twitterLink = jQuery('#ppoTebContentProfileOfProfileSettings #ppo_social_twitter').val();
				const ytLink = jQuery('#ppoTebContentProfileOfProfileSettings #ppo_social_yt').val();
					
				// Ajax
				ppoAjaxHandler(
					{
						web: webAddress,
						fb: fbLink,
						instagram: instagramLink,
						tiktok: tiktokLink,
						twitter: twitterLink,
						yt: ytLink,
					},
					'ppo_daycare_social_handler_action',
					afterAction
				);
				
				// After Action Func
				function afterAction() {
					ppoProcessingTimeEnd(e);
				}
				
			});
				   
		}
		// Email
		if(jQuery("#ppoTebContentProfileOfProfileSettings #ppo_daycare_email_button")) {

			jQuery('#ppoTebContentProfileOfProfileSettings #ppo_daycare_email_button').on('click', (e) => {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				// Variables Declaration
				const mailAddress = jQuery('#ppoTebContentProfileOfProfileSettings #ppo_daycare_email').val();
				// Ajax
				ppoAjaxHandler(
					{
						email: mailAddress,
					},
					'ppo_daycare_update_email_action',
					afterAction
				);

				// after action func
				function afterAction() {
					if( jQuery("#ppoProfilePreviewTabContent") ) {
						if(jQuery("#ppoEmailPreview")) jQuery("#ppoEmailPreview").html(mailAddress);
					}
					ppoProcessingTimeEnd(e);
				}
				
			});
				   
		}
		// Telephone Number
		if(jQuery("#ppoTebContentProfileOfProfileSettings #ppo_daycare_tele_button")) {

			jQuery('#ppoTebContentProfileOfProfileSettings #ppo_daycare_tele_button').on('click', (e) => {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				// Variables Declaration
				const teleNum = jQuery('#ppoTebContentProfileOfProfileSettings #ppo_daycare_tele').val();
				// Ajax
				ppoAjaxHandler(
					{
						tele: teleNum,
					},
					'ppo_daycare_tele_number_action',
					afterAction
				);

				// after action func
				function afterAction() {
					if( jQuery("#ppoProfilePreviewTabContent") ) {
						if(jQuery("#ppoTelephoneNumberPreview")) jQuery("#ppoTelephoneNumberPreview").prop('href', `tel:${teleNum}`);
					}
					ppoProcessingTimeEnd(e);
				}
				
			});
		}
		// Display Name
		if(jQuery("#ppoTebContentProfileOfProfileSettings #ppo_daycare_name_button")) {

			jQuery('#ppoTebContentProfileOfProfileSettings #ppo_daycare_name_button').on('click', (e) => {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				// Variables Declaration
				const displayName = jQuery('#ppoTebContentProfileOfProfileSettings #ppo_daycare_name').val();
				// Ajax
				ppoAjaxHandler(
					{
						name: displayName,
					},
					'ppo_daycare_name_action',
					afterAction
				);

				// after action func
				function afterAction() {
					if( jQuery("#ppoProfilePreviewTabContent") ) {
						if(jQuery("#ppoDisplayNameLargePreview")) jQuery("#ppoDisplayNameLargePreview").html(displayName);
						if(jQuery("#ppoDisplayNamePreview")) jQuery("#ppoDisplayNamePreview").html(displayName);
					}
					ppoProcessingTimeEnd(e);
				}
				
			});
		}
		
		// Address
		if(jQuery("#ppoTebContentProfileOfProfileSettings #ppo_daycare_address_button")) {

			jQuery('#ppoTebContentProfileOfProfileSettings #ppo_daycare_address_button').on('click', (e) => {
				e.preventDefault();
				ppoProcessingTimeStart(e);
				
				// Variables Declaration
				const postCode = jQuery('#ppoTebContentProfileOfProfileSettings #ppo_daycare_post_code').val();
				const building = jQuery('#ppoTebContentProfileOfProfileSettings #ppo_daycare_building').val();
				const roadNum = jQuery('#ppoTebContentProfileOfProfileSettings #ppo_daycare_road_num').val();
				const houseNum = jQuery('#ppoTebContentProfileOfProfileSettings #ppo_daycare_house_num').val();
				
				// Ajax
				ppoAjaxHandler(
					{
						post_code: postCode,
						building: building,
						road_num: roadNum,
						house_num: houseNum,
					},
					'ppo_daycare_address_action',
					afterAction
				);

				// after action func
				function afterAction() {
					if( jQuery("#ppoProfilePreviewTabContent") ) {
						if(jQuery("#ppoPostCodePreview")) jQuery("#ppoPostCodePreview").html(postCode);
						if(jQuery("#ppoBuildingPreview")) jQuery("#ppoBuildingPreview").html(building);
						if(jQuery("#ppoAddressPreview")) jQuery("#ppoAddressPreview").html( `${postCode} ${building}` );
					}
					ppoProcessingTimeEnd(e);
				}
				
			});
				   
		}

		
		
		// function AJAX Func
		function ppoAjaxHandler( dataSet, action, afterAction = () => {} ) {
			jQuery.ajax({
				url: ppo_data.ajax_url,
				type: "post",
				data: {
					...dataSet,
					action: action
				},
				beforeSend: function() {
					console.log("Sending Request...")
				},
				success: function(res) {
					console.log("SUCCESS")
					console.log(res)
					afterAction();
				},
				error: function(err) {
					console.log("ERROR")
					console.log(err)
				},
				complete: function() {
					console.log("COMPLETED")
				}
			});
		}
		
        if (jQuery("#ppoTabs")) jQuery("#ppoTabs button").on('click', function(e) {
            jQuery("#ppoTabs button.active").removeClass('active')

            e.target.classList.add('active');
            const targetedTabContentId = e.target.dataset.tabContent

            if (targetedTabContentId) {
                jQuery(".ppo-tab-content").fadeOut("slow")
                jQuery(targetedTabContentId).fadeIn("slow")
            }
        });

        if (jQuery("#ppoProfileSettingsChildTabs")) jQuery("#ppoProfileSettingsChildTabs button").on('click', function(e) {
            jQuery("#ppoProfileSettingsChildTabs button.active").removeClass('active')

            e.target.classList.add('active');
            const targetedTabContentId = e.target.dataset.tabContent

            if (targetedTabContentId) {
                jQuery(".ppo-profile-settings-tab-content").fadeOut("slow")
                jQuery(targetedTabContentId).fadeIn("slow")
            }
        });

        if (jQuery("#ppoSettingsTabs")) jQuery("#ppoSettingsTabs button").on('click', function(e) {
            jQuery("#ppoSettingsTabs button.active").removeClass('active')

            e.target.classList.add('active');
            const targetedTabContentId = e.target.dataset.tabContent

            if (targetedTabContentId) {
                jQuery(".ppo-settings-tab-content").fadeOut("slow")
                jQuery(targetedTabContentId).fadeIn("slow")
            }
        });

        if (jQuery("#profileInfoTab")) jQuery("#profileInfoTab button").on('click', function(e) {
            jQuery("#profileInfoTab button.active").removeClass('active')

            e.target.classList.add('active');
            const targetedTabContentId = e.target.dataset.tabContent

            if (targetedTabContentId) {
                jQuery(".ppo-preview-tab-content").fadeOut("slow")
                jQuery(targetedTabContentId).fadeIn("slow")
            }
        });



        if (jQuery("#smokingYes")) jQuery("#smokingYes").on("click", () => {
            if (jQuery("#smokingNo")) jQuery("#smokingNo").prop("checked", false)
        });
        if (jQuery("#smokingNo")) jQuery("#smokingNo").on("click", () => {
            if (jQuery("#smokingYes")) jQuery("#smokingYes").prop("checked", false)
        });

        if (jQuery(".ppo-certificate-btn")) jQuery(".ppo-certificate-btn").on("click", (e) => {
            e.preventDefault();
            e.target.classList.toggle("selected")
        });
    });

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })();

    function toggleInputType(ele, inputId) {
        const input = document.querySelector(inputId)
        if (input && input.type == 'password') {
            input.type = 'text';
            ele.innerText = 'Skjul';
            return
        }
        if (input && input.type == 'text') {
            input.type = 'password';
            ele.innerText = 'Vis';
            return
        }
    }
</script>