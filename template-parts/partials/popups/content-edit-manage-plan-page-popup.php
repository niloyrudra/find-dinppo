<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */
// global $post;
// $post_slug = $post->post_name;
$user = wp_get_current_user();
$user_id = $user ? $user->ID : null;
$plan_name = $user_id ? ppo_get_daycare_subscription_plan($user_id) : 'gratis';
$selected_plan = $plan_name ?? 'gratis';

// $param = $_GET && $_GET['plan'] ? $_GET['plan'] : 'gratis';


$plan_data = ppo_subscription_detail($selected_plan);

$icon = trim($plan_data['icon']);
$plan_name = $plan_data['plan'];
$annual_rate = $plan_data['annual_rate'];
$month_rate = $plan_data['month_rate'];
?>

<div class="modal fade" id="ppoEditBillingNPaymentPage" tabindex="-1" aria-labelledby="ppoEditBillingNPaymentPageTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered">

		<div class="modal-content ppo-br-16 ppo-b1-primary ppo-bg-popup">

			<div class="modal-header border-0 justify-content-center">

				<h5 class="modal-title text-white w-auto ppo-br-16 ppo-box-shadow px-5 py-1 ppo-bg-secondary" id="ppoEditBillingNPaymentPageTitle">Administrer betalingsmetode</h5>

				<button type="button" class="position-absolute btn-close fw-bolder text-white" data-bs-dismiss="modal" aria-label="Close" style="right:0.75rem;"></button>

			</div>

			<form action="" method="post" id="ppoCardForm">

				<div class="modal-body m-2" id="ppoCardList">
					<div class="row mb-3 ppo-br-12 ppo-bg-card">
						<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
							<h3 class="text-light fs-4 fw-bold">Din betalingsmetode</h3>
						</div>

						<div class="position-relative d-flex flex-column justify-content-start align-content-center px-2 pt-3" id="ppoCardsAccordion">

							<div class="position-absolute w-auto text-decoration-none collapsed ppo-cursor-pointer" id="ppoCardRevealBtn" style="right:1.4rem;top:16px;" data-bs-toggle="collapse" data-bs-target="#ppoInactiveCards" aria-expanded="false" aria-controls="ppoInactiveCards">
								<img src="<?php echo ppo_get_dir("/assets/images/arrows/arrow-down-sign-to-navigate-white.png"); ?>" style="width:50px;" />
							</div>

							<div id="ppoActiveCard" class="px-2">

								<div class="d-flex justify-content-start align-items-center mb-3">
									<div class="d-flex justify-content-start align-items-center">
										<img src="<?php echo ppo_get_dir("/assets/images/cards/visa-dark-blue.png") ?>" style="width:70px;" class="ppo-br-16" />

										<div class="ms-3 mb-0">
											<p class="text-light fw-bold fs-5 mb-0">Visa, der ender på *****1741</p>
											<p class="text-light fw-normal fs-5 mb-0">Udløber 09/24 - <span class="text-capitalize"><?php echo esc_html($user->display_name); ?></span></p>
										</div>
									</div>
								</div>

							</div>


							<div id="ppoInactiveCards" class="px-2 py-2 ppo-bg-secondary ppo-br-16 mb-2 accordion-collapse collapse" aria-labelledby="ppoCardRevealBtn" data-bs-parent="#ppoCardsAccordion">

								<div class="ppo-inactivate-card ppo-cursor-pointer" onclick="ppoUpdateActiveCardHandler(this);">
									<div class="d-flex justify-content-start align-items-center mb-3">
										<div class="d-flex justify-content-start align-items-center">
											<img src="<?php echo ppo_get_dir("/assets/images/cards/visa-dark-blue.png") ?>" style="width:70px;" class="ppo-br-16" />

											<div class="ms-3 mb-0">
												<p class="text-light fw-bold fs-5 mb-0">Visa, der ender på *****6897</p>
												<p class="text-light fw-normal fs-5 mb-0">Udløber 10/24 - <span class="text-capitalize"><?php echo esc_html($user->display_name); ?></span></p>
											</div>
										</div>
									</div>
								</div>

								<div class="ppo-inactivate-card ppo-cursor-pointer" onclick=" ppoUpdateActiveCardHandler(this);">
									<div class="d-flex justify-content-start align-items-center mb-3 ppo-cursor-pointer">
										<div class="d-flex justify-content-start align-items-center">
											<img src="<?php echo ppo_get_dir("/assets/images/cards/visa-dark-blue.png") ?>" style="width:70px;" class="ppo-br-16" />

											<div class="ms-3 mb-0">
												<p class="text-light fw-bold fs-5 mb-0">Visa, der ender på *****0754</p>
												<p class="text-light fw-normal fs-5 mb-0">Udløber 02/25 - <span class="text-capitalize"><?php echo esc_html($user->display_name); ?></span></p>
											</div>
										</div>
									</div>
								</div>

							</div>

						</div>

					</div>
				</div>

				<div class="row mb-3 px-4" id="ppoCardActionBtn">
					<div class="col-2">
						<img src="<?php echo ppo_get_dir("/assets/images/padlock.png") ?>" style="width:40px;" class="d-block" />
					</div>
					<div class="col-8">
						<div class="d-flex justify-content-between align-items-center w-100" style="gap:0.5rem;">
							<div onclick="ppoRevealAddCardSection();" class="btn ppo-br-16 ppo-bg-primary w-100 text-white fw-bold text-decoration-none">Tilføj ny</div>
							<div onclick="ppoRevealEditCardSection();" class="btn ppo-br-16 ppo-bg-primary w-100 text-white fw-bold text-decoration-none">Rediger</div>
						</div>
					</div>
					<div class="col-2"></div>
				</div>

				<div class="text-center mb-3">
					<button class="btn py-1 px-3 ppo-br-16 ppo-b2-light ppo-box-shadow text-white fs-4 fw-bold w-auto ppo-bg-primary">
						GEM
					</button>
				</div>

			</form>


			<div class="modal-body m-2" id="ppoCurrentPlan">

				<div class="row mb-3 ppo-br-12 ppo-bg-card">
					<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
						<h3 class="text-light fs-4 fw-bold">Din plan</h3>
					</div>

					<div class="d-flex flex-column justify-content-start align-content-center my-3 px-4 py-2">

						<div class="d-flex justify-content-start align-items-center mb-3">
							<div class="d-flex align-items-center">
								<img src="<?php echo ppo_get_dir("/assets/images/member-stars/$icon.png") ?>" style="width:40px;" />
								<h3 class="ms-2 mb-0 text-white fw-bold fs-4"><?php echo $plan_name; ?></h3>
							</div>

						</div>

						<div class="mb-3">
							<p class="text-light fw-normal fs-5 mb-0">Binding</p>
							<p class="text-light fw-bold fs-5 mb-0">Årsplan, forudbetalt</p>
						</div>

						<div class="mb-3">
							<p class="text-light fw-normal fs-5 mb-0">Næste regelmæssige betaling</p>
							<p class="text-light fw-bold fs-5 mb-0"><?php echo $annual_rate; ?> Kr./år (inkl. moms) 29. september 2024</p>
						</div>

					</div>

				</div>

			</div>

			<!-- ***** -->
			<form action="" method="post" id="ppoEditCardForm" style="display:none;">

				<div class="modal-body m-2" id="ppoCardList">
					<div class="row mb-1 ppo-br-12 ppo-bg-card">
						<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header position-relative">
							<div onclick="ppoHideEditCardSection();" class="position-absolute w-auto ppo-cursor-pointer" style="top:7px;">
								<img src="<?php echo ppo_get_dir("/assets/images/arrows/arrow-down-sign-to-navigate-black.png") ?>" style="width:24px;rotate:90deg;" />
							</div>
							<h3 class="text-light fs-4 fw-bold">Rodiger kortoplysninger</h3>
						</div>

						<div class="position-relative d-flex flex-column justify-content-center align-content-center px-4 pt-3 mb-4">

							<div class="form-group mb-3">
								<label for="ppo_card_number" class="text-white mb-1 fw-bold fs-5">Kortnummer</label>
								<input type="text" class="form-control ppo-b2-light text-white ppo-br-12 w-100 bg-transparent text-white px-2 py-2" name="ppo_card_number" id="ppo_card_number" aria-describedby="helpId" placeholder="**** **** **** 1741" required>
								<!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
							</div>

							<div class="d-flex justify-content-between align-items-center w-100 mb-3" style="gap:1rem;">

								<div class="form-group w-50">
									<label for="ppo_card_exp_month" class="text-white mb-1 fw-bold fs-5">Udløbsmåned</label>
									<select class="form-control bg-transparent ppo-br-12 ppo-b2-light text-white" name="ppo_card_exp_month" id="ppo_card_exp_month">
										<option value="01">01 | Januar</option>
										<option value="02" selected="selected">02 | Februar</option>
										<option value="03">03 | Marts</option>
										<option value="04">04 | April</option>
										<option value="05">05 | Maj</option>
										<option value="06">06 | Juni</option>
										<option value="07">07 | Juli</option>
										<option value="08">08 | August</option>
										<option value="09">09 | September</option>
										<option value="10">10 | Oktober</option>
										<option value="11">11 | November</option>
										<option value="12">12 | December</option>
									</select>
								</div>

								<div class="form-group w-50">
									<label for="ppo_card_exp_year" class="text-white mb-1 fw-bold fs-5">Udløbsår</label>
									<select class="form-control bg-transparent ppo-br-12 ppo-b2-light text-white" name="ppo_card_exp_year" id="ppo_card_exp_year">
										<option value="23">2023</option>
										<option value="24">2024</option>
										<option value="25">2025</option>
										<option value="26" selected="selected">2026</option>
										<option value="27">2027</option>
										<option value="28">2028</option>
										<option value="29">2029</option>
										<option value="30">2030</option>
										<option value="31">2031</option>
										<option value="32">2032</option>
										<option value="33">2033</option>
										<option value="34">2034</option>
									</select>
								</div>

							</div>


							<div class="form-group mb-3">
								<label for="ppo_card_holder_name" class="text-white mb-1 fw-bold fs-5">Kortholders navn</label>
								<input type="text" class="form-control ppo-b2-light text-white ppo-br-12 w-100 bg-transparent text-white px-2 py-2" name="ppo_card_holder_name" id="ppo_card_holder_name" aria-describedby="helpId" placeholder="" required>
								<!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
							</div>

							<p class="fw-bold fs-4 text-white mb-4">Valgfri information</p>

							<div class="form-group">
								<?php ppo_label_with_tooltip('ppo_card_cvr'); ?>
								<input type="password" class="form-control ppo-b2-light text-white ppo-br-12 w-50 bg-transparent text-white px-2 py-2" name="ppo_card_cvr" id="ppo_card_cvr" aria-describedby="helpId" placeholder="" required>
								<!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
							</div>

						</div>

					</div>
				</div>

				<div class="d-flex justify-content-center align-items-center mb-4" style="gap:1.4rem;">
					<div class="d-inline-block">
						<img src="<?php echo ppo_get_dir("/assets/images/padlock.png") ?>" style="width:40px;" class="d-block" />
					</div>
					<button class="btn py-1 px-3 ppo-br-16 ppo-b2-light ppo-box-shadow text-white fs-4 fw-bold w-25 ppo-bg-primary">
						GEM
					</button>
				</div>

			</form>

			<form action="" method="post" id="ppoAddCardForm" style="display:none;">

				<div class="modal-body m-2" id="ppoCardList">
					<div class="row mb-1 ppo-br-12 ppo-bg-card">
						<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header position-relative">
							<div onclick="ppoHideAddCardSection();" class="position-absolute w-auto ppo-cursor-pointer" style="top:7px;">
								<img src="<?php echo ppo_get_dir("/assets/images/arrows/arrow-down-sign-to-navigate-black.png") ?>" style="width:24px;rotate:90deg;" />
							</div>
							<h3 class="text-light fs-4 fw-bold">Tilføj ny kort</h3>
						</div>

						<div class="position-relative d-flex flex-column justify-content-center align-content-center px-4 pt-3 mb-4">
							<p class="mb-2 text-white text-center fw-bold fs-4">Her kan du tilføje følgende kort</p>

							<div class="d-flex justify-content-between align-items-center mb-3" style="gap:0.75rem;">
								<img src="<?php echo ppo_get_dir("/assets/images/cards/DK_Logo_CMYK_Konturstreg.webp") ?>" class="d-block" style="height:36px;" />
								<img src="<?php echo ppo_get_dir("/assets/images/cards/Visa_Electron.png") ?>" class="d-block" style="height:36px;" />
								<img src="<?php echo ppo_get_dir("/assets/images/cards/Visa_Electron.png") ?>" class="d-block" style="height:36px;" />
								<img src="<?php echo ppo_get_dir("/assets/images/cards/Maestro_logo.png") ?>" class="d-block" style="height:36px;" />
								<img src="<?php echo ppo_get_dir("/assets/images/cards/MasterCard.webp") ?>" class="d-block" style="height:36px;" />
							</div>

							<div class="form-group mb-3">
								<label for="ppo_card_number" class="text-white mb-1 fw-bold fs-5">Kortnummer</label>
								<input type="text" class="form-control ppo-b2-light text-white ppo-br-12 w-100 bg-transparent" name="ppo_card_number" id="ppo_card_number" aria-describedby="helpId" placeholder="" required>
								<!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
							</div>

							<div class="d-flex justify-content-between align-items-center w-100 mb-3" style="gap:1rem;">

								<div class="form-group w-50">
									<label for="ppo_card_exp_month" class="text-white mb-1 fw-bold fs-5">Udløbsmåned</label>
									<select class="form-control bg-transparent ppo-br-12 ppo-b2-light text-white" name="ppo_card_exp_month" id="ppo_card_exp_month">
										<option value="01">01 | Januar</option>
										<option value="02">02 | Februar</option>
										<option value="03">03 | Marts</option>
										<option value="04">04 | April</option>
										<option value="05">05 | Maj</option>
										<option value="06">06 | Juni</option>
										<option value="07">07 | Juli</option>
										<option value="08">08 | August</option>
										<option value="09">09 | September</option>
										<option value="10">10 | Oktober</option>
										<option value="11">11 | November</option>
										<option value="12">12 | December</option>
									</select>
								</div>

								<div class="form-group w-50">
									<label for="ppo_card_exp_year" class="text-white mb-1 fw-bold fs-5">Udløbsår</label>
									<select class="form-control bg-transparent ppo-br-12 ppo-b2-light text-white" name="ppo_card_exp_year" id="ppo_card_exp_year">
										<option value="23">2023</option>
										<option value="24">2024</option>
										<option value="25">2025</option>
										<option value="26">2026</option>
										<option value="27">2027</option>
										<option value="28">2028</option>
										<option value="29">2029</option>
										<option value="30">2030</option>
										<option value="31">2031</option>
										<option value="32">2032</option>
										<option value="33">2033</option>
										<option value="34">2034</option>
									</select>
								</div>

							</div>


							<div class="form-group mb-3">
								<label for="ppo_card_holder_name" class="text-white mb-1 fw-bold fs-5">Kortholders navn</label>
								<input type="text" class="form-control ppo-b2-light text-white ppo-br-12 w-100 bg-transparent" name="ppo_card_holder_name" id="ppo_card_holder_name" aria-describedby="helpId" placeholder="" required>
								<!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
							</div>

							<p class="fw-bold fs-4 text-white mb-4">Valgfri information</p>

							<div class="form-group mb-3">
								<?php ppo_label_with_tooltip('ppo_card_CVR'); ?>
								<input type="password" class="form-control ppo-b2-light text-white ppo-br-12 w-50 bg-transparent" name="ppo_card_CVR" id="ppo_card_CVR" aria-describedby="helpId" placeholder="" required>
								<!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
							</div>

						</div>

					</div>
				</div>

				<div class="d-flex justify-content-center align-items-center mb-4" style="gap:1.4rem;">
					<div class="d-inline-block">
						<img src="<?php echo ppo_get_dir("/assets/images/padlock.png") ?>" style="width:40px;" class="d-block" />
					</div>
					<button class="btn py-1 px-3 ppo-br-16 ppo-b2-light ppo-box-shadow text-white fs-4 fw-bold w-25 ppo-bg-primary">
						GEM
					</button>
				</div>

			</form>

		</div>

	</div>
</div>

<script defer>
	"use strict";
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	  return new bootstrap.Tooltip(tooltipTriggerEl)
	})

	// (function() {
	function ppoUpdateActiveCardHandler(ele) {
		let html = jQuery("#ppoActiveCard").html()
		if (jQuery("#ppoActiveCard")) jQuery("#ppoActiveCard").html(ele.innerHTML)
		ele.innerHTML = html
	}

	function ppoHideAddCardSection() {
		ppoToggleVisibilityExistingSections();
		jQuery("#ppoAddCardForm").fadeOut("slow")
	}

	function ppoHideEditCardSection() {
		ppoToggleVisibilityExistingSections();
		jQuery("#ppoEditCardForm").fadeOut("slow")
	}

	function ppoRevealAddCardSection() {
		ppoToggleVisibilityExistingSections();
		jQuery("#ppoAddCardForm").fadeIn("slow")
	}

	function ppoRevealEditCardSection() {
		ppoToggleVisibilityExistingSections();
		jQuery("#ppoEditCardForm").fadeIn("slow")
	}

	function ppoToggleVisibilityExistingSections() {
		jQuery("#ppoCardForm").toggle("slow")
		jQuery("#ppoCurrentPlan").toggle("slow")
	}
</script>