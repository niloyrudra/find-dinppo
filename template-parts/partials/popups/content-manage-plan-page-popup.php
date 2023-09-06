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

// $param = $_GET && $_GET['plan'] ? $_GET['plan'] : ($_POST && $_POST['plan'] ? $_POST['plan'] : 'gratis');
$user = wp_get_current_user();
$user_id = $user ? $user->ID : null;

$plan_name = $user_id ? ppo_get_daycare_subscription_plan($user_id) : 'gratis';

$plan_data = ppo_subscription_detail($plan_name);
$icon = trim($plan_data['icon']);
$plan_name = $plan_data['plan'];
$annual_rate = $plan_data['annual_rate'];
$month_rate = $plan_data['month_rate'];

$next_slug = ppo_get_next_subs_plan_slug(strtolower($plan_name));

?>

<div class="modal fade" id="ppoManagePlanPage" tabindex="-1" aria-labelledby="ppoManagePlanPageTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered">

		<div class="modal-content ppo-br-16 ppo-b1-primary ppo-bg-popup">

			<div class="modal-header border-0 justify-content-center">

				<h5 class="modal-title text-white w-auto ppo-br-16 ppo-box-shadow px-5 py-1 ppo-bg-secondary" id="ppoManagePlanPageTitle">Administrer Plan</h5>

				<button type="button" class="position-absolute btn-close fw-bolder text-white" data-bs-dismiss="modal" aria-label="Close" style="right:0.75rem;"></button>

			</div>

			<div class="modal-body m-2">

				<div class="row mb-3 ppo-br-12 ppo-bg-card">
					<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header">
						<h3 class="text-light fs-5 fw-bold">Din plan</h3>
					</div>

					<div class="d-flex flex-column justify-content-start align-content-center my-3 px-4 py-2">

						<div class="d-flex justify-content-between align-items-center mb-3">
							<div class="d-flex align-items-center">
								<img src="<?php echo ppo_get_dir("/assets/images/member-stars/$icon.png") ?>" style="width:40px;" />
								<h3 class="ms-2 mb-0 text-white fw-bold fs-4"><?php echo $plan_name; ?></h3>
							</div>

							<h3 class="mb-0 text-white fw-bold fs-4"><?php echo $annual_rate; ?> Kr. / år</h3>
						</div>

						<ul class="my-2 mx-0 p-0">

							<li class="text-light fw-bold fs-5 mb-1" style="list-style:none;">
								<span class="ppo-bg-red d-inline-flex justify-content-center ppo-br-18" style="width:35px;height:35px;margin-right:1.5rem;">1.</span>Gadenavn og nr.
							</li>

							<li class="text-light fw-bold fs-5 mb-1" style="list-style:none;">
								<span class="ppo-bg-red d-inline-flex justify-content-center ppo-br-18" style="width:35px;height:35px;margin-right:1.5rem;">2.</span>Alt under "General info"
							</li>

							<li class="text-light fw-bold fs-5 mb-1" style="list-style:none;">
								<span class="ppo-bg-red d-inline-flex justify-content-center ppo-br-18" style="width:35px;height:35px;margin-right:1.5rem;">3.</span>Max antal børn
							</li>

							<li class="text-light fw-bold fs-5" style="list-style:none;">
								<span class="ppo-bg-red d-inline-flex justify-content-center ppo-br-18" style="width:35px;height:35px;margin-right:1.5rem;">4.</span>Om mam er ryger eller ej
							</li>

						</ul>

						<p class="text-light fw-bold fs-5 mb-4"><?php ppo_field_required_indicator(); ?>Plus alt fra "<?php echo $plan_name; ?>" versionen</p>

					</div>

				</div>

				<div class="row mb-3 ppo-br-12 ppo-bg-card">
					<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header mb-3">
						<h3 class="text-light fs-5 fw-bold">Find en bedre plan</h3>
					</div>

					<p class="text-light mb-3">
						Ikke nok viste funktioner i den plan du har nu? Vil du skifte fra det månedlig betaling og over til det årlig, og spare penge? Lad os hjaelpe dig med at finde den rigtige plan til dine behov, og lav et skift hurtigt og nemt.
					</p>

					<div class="text-center">
						<a href="<?php echo esc_url(home_url("/$next_slug/")); ?>" class="btn py-1 px-3 mb-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light ppo-box-shadow text-light fs-5 ppo-bg-primary w-auto text-decoration-none">
							Skift din plan
						</a>
					</div>

				</div>

				<div class="row mb-3 ppo-br-12 ppo-bg-card">
					<div class="text-center ppo-box-shadow py-1 ppo-profile-section-header mb-3">
						<h3 class="text-light fs-5 fw-bold">Afslut din plan</h3>
					</div>

					<p class="text-light mb-3">
						Nogle gange vil man sige stop. Def forstår vi godt.
					</p>

					<div class="text-center">
						<a href="<?php echo esc_url(home_url("/cancel-subscription/?plan=" . strtolower($plan_name) )); ?>" class="btn py-1 px-3 mb-3 ppo-br-16 align-content-center justify-content-center ppo-b2-light text-light fs-5 w-auto bg-transparent text-decoration-none">
							Annuller din plan
						</a>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>