<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */

?>

<div class="modal fade" id="ppoNonLoggedInUserInfoModal" tabindex="-1" aria-labelledby="ppoNonLoggedInUserInfoTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered">

		<div class="modal-content ppo-br-16 ppo-bg-primary">
			<div class="modal-header border-0">
				<h5 class="modal-title text-center text-white fs-4 w-100" id="ppoNonLoggedInUserInfoTitle">Denne funktion kræver login:</h5>
				<button type="button" class="btn-close fw-bolder text-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body text-white m-2 ppo-br-16 ppo-b4-light p-2">

				<p class="text-white text-center fs-5 mb-4">For at kunne benytte denne funktion, kræver vi at du skal oprette en bruger eller logge ind på en allerede eksisterende bruger</p>

				<p class="text-white text-center fs-5 mb-3">Vil du logge ind på eksisterede bruger?</p>

				<div class="text-center mb-4">
					<a href="<?php echo esc_url(home_url('/log-ind/')); ?>" class="btn w-50 text-decoration-none fs-3 fw-bold ppo-box-shadow ppo-br-16 ppo-b2-light bg-transparent text-white">
						Log in
					</a>
				</div>


				<p class="text-white text-center fs-5 mb-3">Vil du oprette en ny bruer?</p>

				<div class="text-center mb-4">
					<a href="<?php echo esc_url(home_url('/sign-up/')); ?>" class="btn w-50 text-decoration-none fs-3 fw-bold ppo-box-shadow ppo-br-16 ppo-b2-light bg-transparent text-white">
						Tilmeld
					</a>
				</div>
				
				<h3 class="text-white text-center mb-2 text-uppercase fs-3 fw-bold">Det er helt gratis</h3>
			</div>
		</div>

	</div>
</div>