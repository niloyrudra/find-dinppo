<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */
$user = wp_get_current_user();

$param = $_GET && $_GET['plan'] ? $_GET['plan'] : '';
$param = $_POST && $_POST['plan'] ? $_POST['plan'] : 'gratis';

$plan_data = ppo_subscription_detail($param);
$icon = trim($plan_data['icon']);
$plan_name = $plan_data['plan'];
$annual_rate = $plan_data['annual_rate'];
$month_rate = $plan_data['month_rate'];

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="max-width: 600px; margin: 2rem auto;">



    <!-- Plan Tabs Section -->
    <div class="row mb-5 p-3 justify-content-center ppo-br-20 ppo-bg-tab-section">

        <?php ppo_edit_family_member_profile_image(); ?>

        <h1 class="fs-1 fw-bold text-light mb-1 text-center text-capitalize">
            <?php echo esc_html($user->display_name); ?>
        </h1>

        <!-- Tabs -->
        <div id="ppoTabs" class="d-flex justify-content-between my-2" style="gap:1rem;">
            <button class="d-flex btn justify-content-center text-light fs-5 ppo-plan-act-button active" style="flex-grow:1;" data-tab-content="#ppoChatTabContent">Beskeder</button>

            <button class="d-flex btn justify-content-center text-light fs-5 ppo-plan-act-button" style="flex-grow:1;" data-tab-content="#ppoProfileSettingsTabContent">Indstillinger</button>

            <button class="d-flex btn justify-content-center text-light fs-5 ppo-plan-act-button" style="flex-grow:1;" data-tab-content="#ppoFabDaycareTabContent">Gemte PPO'er</button>
        </div>

    </div>

    <!-- Tab Content Section -->
    <div id="ppoChatTabContent" class="ppo-tab-content">

        <!-- Chat Room -->
        <?php ppo_chat_room(); ?>

        <div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary mb-4">
            <h3 class="text-light fs-4 fw-bold text-center py-2">Premium PPO'er</h3>
        </div>
        <!-- Get Daycare list -->
        <?php ppo_get_premium_daycare_carousel(); ?>

    </div>

    <div id="ppoFabDaycareTabContent" class="ppo-tab-content" style="display:none;">
        <div class="row mb-3">
            <div class="p-0 bg-transparent">

                <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary ppo-br-16">
                    <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">Gemte private pasningsordninger</h3>
                </div>

                <?php ppo_get_daycare_grid_list(); ?>

            </div>
        </div>
		
		<div class="ppo-br-16 ppo-box-shadow ppo-bg-secondary mb-4">
            <h3 class="text-light fs-4 fw-bold text-center py-2">Premium PPO'er</h3>
        </div>
		<!-- Get Daycare list -->
        <?php ppo_get_premium_daycare_carousel(); ?>

    </div>

    <!-- Tab Section | Settings -->
    <!-- Profile Setting Tab Content -->
    <div id="ppoProfileSettingsTabContent" class="ppo-tab-content" style="display:none;">

        <!-- Tab Contents | Profile Settings | ## Profile -->
        <div id="ppoTebContentProfileOfProfileSettings" class="ppo-profile-settings-tab-content">


            <!-- Personal Information Section -->
            <div class="row mb-4">
                <div class="p-0  ppo-br-16 ppo-bg-card">

                    <div class="ppo-box-shadow ppo-br-16 py-1 px-5 text-center mb-3 ppo-bg-secondary ppo-br-16">
                        <h3 id="ppoTabContentTitle" class="text-light fs-3 fw-bold mb-0">
                            Personlig information
                        </h3> <!-- Change PPO name -->
                    </div>

                    <form action="" method="post">

                        <div class="form-group row p-4">

                            <!-- First Name -->
                            <div class="col-6">
                                <div class="position-relative w-100 mb-3">
                                    <!-- user Icon -->
                                    <div class="position-absolute" style="top:3px;left:10px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:32px;height:32px;color:#fff;">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                        </svg>
                                    </div>
                                    <!-- First Name Field -->
                                    <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 bg-transparent" style="padding-left:60px;" name="" id="" aria-describedby="" placeholder="Fornavn">
                                </div>
                            </div>


                            <!-- Last Name -->
                            <div class="col-6">
                                <div class="position-relative w-100 mb-3">
                                    <!-- user Icon -->
                                    <div class="position-absolute" style="top:3px;left:10px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="width:32px;height:32px;color:#fff;">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                        </svg>
                                    </div>
                                    <!-- Last Name Field -->
                                    <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 bg-transparent" style="padding-left:60px;" name="" id="" aria-describedby="" placeholder="Efternavn">
                                </div>
                            </div>

                            <!-- Contact Number -->
                            <div class="col-6">
                                <div class="position-relative w-100 mb-3">
                                    <!-- Phone Icon -->
                                    <div class="position-absolute" style="top:4px;left:12px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16" style="width:30px;height:30px;color:#fff;">
                                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                        </svg>
                                    </div>
                                    <!-- Contact Number Field -->
                                    <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 bg-transparent" style="padding-left:50px;" name="" id="" aria-describedby="" placeholder="Mobilnummer">
                                </div>
                            </div>

                            <!-- Post Code Detail -->
                            <div class="col-6">
                                <div class="position-relative w-100 mb-3">
                                    <!-- Post-Box Icon -->
                                    <div class="position-absolute" style="top:3px;left:10px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mailbox" viewBox="0 0 16 16" style="width:32px;height:32px;color:#fff;">
                                            <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z" />
                                            <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z" />

                                        </svg>
                                    </div>
                                    <!-- Post Code Field -->
                                    <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 bg-transparent" style="padding-left:60px;" name="" id="" aria-describedby="" placeholder="Postnummer.">
                                </div>
                            </div>

                            <!-- City Detail -->
                            <div class="col-6">
                                <div class="position-relative w-100 mb-3">
                                    <!-- Building Icon -->
                                    <div class="position-absolute" style="top:3px;left:10px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16" style="width:32px;height:32px;color:#fff;">
                                            <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                                            <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                                        </svg>
                                    </div>
                                    <!-- City Field -->
                                    <input type="text" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 bg-transparent bg-transparent" style="padding-left:60px;" name="" id="" aria-describedby="" placeholder="By">
                                </div>
                            </div>

                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button class="btn py-1 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow text-light fs-4 w-25 w-auto ppo-bg-primary">
                                Opdater Profil
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
                        <div class="form-group p-4">
                            <div class="position-relative w-50 m-auto">
                                <!-- Envelope Icon -->
                                <div class="position-absolute" style="top:4px;left:12px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16" style="width:32px;height:32px;color:#fff;">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                    </svg>
                                </div>
                                <!-- Email Field -->
                                <input type="email" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 bg-transparent" style="padding-left:50px;" name="" id="" aria-describedby="" placeholder="Indtast e-mail">
                            </div>

                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button class="btn py-1 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow text-light fs-4 w-25 w-auto ppo-bg-primary">
                                Opdater Profil
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16" style="width:32px;height:32px;z-index:999;color:#fff;">
                                        <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                                        <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
                                    </svg>
                                </div>

                                <input type="password" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 bg-transparent" id="currentPassword" style="padding-left:50px;" name="" id="" aria-describedby="" placeholder="Nuvværende adgangskode" required>

                                <?php ppo_password_toggle_text("#currentPassword") ?>

                            </div>

                            <!-- New Password Field -->
                            <div class="position-relative mb-3">
                                <!-- Key Icon -->
                                <div class="position-absolute" style="top:4px;left:12px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16" style="width:32px;height:32px;color:#fff;rotate:-45deg;">
                                        <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                        <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                    </svg>
                                </div>

                                <input type="password" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 bg-transparent" id="newPassword" style="padding-left:50px;" name="" id="" aria-describedby="" placeholder="Ny adgangskode" required>

                                <?php ppo_password_toggle_text("#newPassword") ?>

                            </div>

                            <!-- Rewrite New Password Field -->
                            <div class="position-relative mb-3">
                                <!-- Shield Icon -->
                                <div class="position-absolute" style="top:4px;left:12px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16" style="width:32px;height:32px;color:#fff;rotate:-45deg;">
                                        <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                        <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                    </svg>
                                </div>

                                <input type="password" class="form-control ppo-b2-light ppo-br-16 bg-white fs-5 bg-transparent" id="rewriteNewPassword" style="padding-left:50px;" name="" id="" aria-describedby="" placeholder="Indtast ny adgangskode igen" required>

                                <?php ppo_password_toggle_text("#rewriteNewPassword") ?>

                            </div>


                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button class="btn py-1 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow text-light fs-4 w-auto ppo-bg-primary">
                                Opdater Profil
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

                            <a href="<?php echo esc_url(home_url("/slet-min-konto/")); ?>" type="submit" class="btn py-1 px-3 mb-4 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow ppo-bg-primary text-light fs-4 w-auto">
                                Slet min konto
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>


</article><!-- #post-<?php the_ID(); ?> -->

<!-- Modals -->
<?php ppo_popup_modal(); ?>

<script defer>
    "use strict";

    jQuery(document).ready(function() {

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