<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */
$user = wp_get_current_user();
$user_roles = ppo_get_current_user_roles();
$is_daycare = (is_array($user_roles) && count($user_roles) && in_array('day_care', $user_roles)) ? true : false;
?>

<div class="modal fade" id="ppoMenu" tabindex="-1" aria-labelledby="ppoMenuTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog"><!-- modal-dialog-centered -->

		<div class="modal-content ppo-br-16 py-3 px-3" style="background-color:#e8eae8;border:1px solid #e8eae8;">

			<div class="px-2 pt-3 pb-2 ppo-br-24 mb-3" style="background-color:#cacfc7;">

				<?php if (is_user_logged_in()) : ?>

					<div class="modal-header border-0 justify-content-start">

						<h3 class="modal-title text-dark fs-3 fw-bold" id="ppoMenuTitle">Hej, <?php echo esc_html($user->display_name); ?></h3>

						<button type="button" class="position-absolute btn-close fw-bolder text-dark" data-bs-dismiss="modal" aria-label="Close" style="right:2.5rem;"></button>

					</div>

					<div class="modal-body px-1 mt-2">

						<a href="<?php echo esc_url(home_url("/profile/")); ?>" class="d-flex flex-row justify-content-start align-content-center mb-3 px-4 py-2 ppo-bg-<?php echo ($is_daycare ? 'primary' : 'red'); ?> ppo-br-16 ppo-b2-light text-decoration-none">
							<img src="<?php echo ppo_get_dir("/assets/images/user/man-user.png") ?>" style="width:40px;" />
							<p class="ms-3 mb-0 text-white fw-bold fs-4">Min profil</p>
						</a>

						<?php if ($is_daycare) : ?>
							<a href="<?php echo esc_url(home_url("/be-a-member/")); ?>" class="d-flex flex-row justify-content-start align-content-center mb-3 px-4 py-2 ppo-bg-red ppo-br-16 ppo-b2-light text-decoration-none">
								<img src="<?php echo ppo_get_dir("/assets/images/menu-icons/crowns.png") ?>" style="width:40px;" />
								<p class="ms-3 mb-0 text-white fw-bold fs-4">Abonnement</p>
							</a>
						<?php endif; ?>

						<a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="d-flex flex-row justify-content-start align-content-center px-4 py-2 ppo-bg-primary ppo-br-16 ppo-b2-light text-decoration-none">
							<img src="<?php echo ppo_get_dir("/assets/images/menu-icons/door.png") ?>" style="width:40px;" />
							<p class="ms-3 mb-0 text-white fw-bold fs-4">Log ud</p>
						</a>

					</div>

				<?php else : ?>

					<div class="modal-header border-0 justify-content-end">
						<button type="button" class="position-absolute btn-close fw-bolder text-dark" data-bs-dismiss="modal" aria-label="Close" style="right:2.5rem;"></button>
					</div>

					<div class="modal-body px-1 mt-2">

						<!-- <div class="row"> -->

						<a href="<?php echo esc_url(home_url("/log-ind/")); ?>" class="d-flex flex-row justify-content-start align-content-center mb-3 px-4 py-2 ppo-bg-red ppo-br-16 ppo-b2-light text-decoration-none">
							<img src="<?php echo ppo_get_dir("/assets/images/user/man-user.png") ?>" style="width:40px;" />
							<p class="ms-3 mb-0 text-white fw-bold fs-4">Log ind</p>
						</a>

						<a href="<?php echo esc_url(home_url("/sign-up/")); ?>" class="d-flex flex-row justify-content-start align-content-center px-4 py-2 ppo-bg-red ppo-br-16 ppo-b2-light text-decoration-none">
							<img src="<?php echo ppo_get_dir("/assets/images/singup/registration.png") ?>" style="width:40px;" />
							<p class="ms-3 mb-0 text-white fw-bold fs-4">Tilmelding</p>
						</a>

						<!-- </div> -->

					</div>

				<?php endif; ?>


			</div>

			<div class="p-2 ppo-br-24 mb-3" style="background-color:#cacfc7;">

				<div class="modal-body px-1">

					<a href="<?php echo esc_url(home_url("/hjaelpecenter/")); ?>" class="d-flex flex-row justify-content-start align-content-center mb-3 px-4 py-2 ppo-bg-primary ppo-br-16 ppo-b2-light text-decoration-none">
						<img src="<?php echo ppo_get_dir("/assets/images/menu-icons/support.png") ?>" style="width:40px;" />
						<p class="ms-3 mb-0 text-white fw-bold fs-4">Hjælp & Spørgsmål</p>
					</a>

					<a href="<?php echo esc_url(home_url("/contact-us")); ?>" class="d-flex flex-row justify-content-start align-content-center mb-3 px-4 py-2 ppo-bg-primary ppo-br-16 ppo-b2-light text-decoration-none">
						<img src="<?php echo ppo_get_dir("/assets/images/menu-icons/question.png") ?>" style="width:40px;" />
						<p class="ms-3 mb-0 text-white fw-bold fs-4">Kontakt os</p>
					</a>

					<a href="<?php echo esc_url(home_url("/om-os/")); ?>" class="d-flex flex-row justify-content-start align-content-center px-4 py-2 ppo-bg-primary ppo-br-16 ppo-b2-light text-decoration-none">
						<img src="<?php echo ppo_get_dir("/assets/images/menu-icons/group.png") ?>" style="width:40px;" />
						<p class="ms-3 mb-0 text-white fw-bold fs-4">Om os</p>
					</a>

				</div>

			</div>

		</div>

	</div>
</div>