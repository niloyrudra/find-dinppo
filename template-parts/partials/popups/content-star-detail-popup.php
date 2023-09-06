<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Find_Dinppo
 */

?>

<div class="modal fade" id="ppoModal" tabindex="-1" aria-labelledby="ppoModalCenterTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered">

		<div class="modal-content ppo-br-16 ppo-bg-primary">
			<div class="modal-header border-0">
				<a href="#!" class="text-white">
					<h5 class="modal-title text-white" id="ppoModalCenterTitle">Abonnomenter</h5>
				</a>
				<button type="button" class="btn-close fw-bolder text-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body text-white m-2 ppo-br-16 ppo-b4-light p-2">

				<div class="mb-3">
					<!-- Stars -->
					<div class="ppo-stars-content pb-3">

						<?php
							$plans = ppo_get_subscription_plan_list();
							foreach( $plans as $plan => $plan_detail ) :
						?>						
								<div class="text-center">
									<img src="<?php echo esc_url($plan_detail['star_icon']); ?>" style="width:32px;" class="ppo-br-12 p-1" />
									<p class="text-light mb-0"><?php echo $plan_detail['plan']; ?></p>
								</div>
						
						<?php endforeach; ?>
						
					</div>

				</div>

				<p class="text-white mb-3">Alle abonnementer der er på siden har forskellige fordele dvs. at "Gratis" har faerrer viste funktioner tilgængelige, end "Pro" eller "Premium" der har alle tilgængelige funktioner vist.</p>

				<p class="text-white mb-3">Disse funktioner kan være:</p>

				<ul class="ms-0 ps-0 mb-3 list-group list-group-flush">
					<li class="list-group-item border-0 bg-transparent px-0 py-1 text-white">Ring knap</li>
					<li class="list-group-item border-0 bg-transparent px-0 py-1 text-white">Besked knap</li>
					<li class="list-group-item border-0 bg-transparent px-0 py-1 text-white">Pris & Udstyr</li>
					<li class="list-group-item border-0 bg-transparent px-0 py-1 text-white">Årsplan & Certificater</li>
					<li class="list-group-item border-0 bg-transparent px-0 py-1 text-white">Ferie</li>
					<li class="list-group-item border-0 bg-transparent px-0 py-1 text-white">Osv.</li>
				</ul>

				<p class="text-white mb-3">Vi vil gøre opmaerksom på at alle Private Pasningsordninger's abonnoment har intet at gøre med hvor dygtige de er, men blot viser, hvorfor visse funktioner ikke er vist hos nogle af dem, og vist hos andre. :-)</p>

				<p class="text-white mb-2">Mvh.<br />Find Din PPO Teamet</p>
			</div>
		</div>

	</div>
</div>