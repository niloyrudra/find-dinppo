<?php
$user = wp_get_current_user();
$daycares = ppo_get_daycares(array(
	'number'  => 4,
	'paged'	=> 1
));
// 		$user_query = new WP_User_Query( array( 'role' => 'day_care' ) );
?>

<?php if (is_array($daycares) && count($daycares)) : ?>
    <!-- Daycares -->
	<?php foreach ($daycares as $daycare) : ?>
		<?php
		$id = $daycare->ID;
		$display_name = $daycare->display_name;
		$subscription_plan = ppo_get_daycare_subscription_plan($id);
		$star_icon = ppo_get_subscription_plan_icon( $subscription_plan );
		$address = ppo_get_daycare_address($id);
		?>
		<div class="col-6 mb-3">

			<div class="ppo-br-16 ppo-bg-card flex-column">

				<!-- Daycare Name -->
				<h3 class="w-100 text-light fs-5 fw-bold ppo-box-shadow ppo-br-16 py-2 px-3 ppo-bg-secondary text-capitalize"><?php echo esc_html($display_name); ?></h3>

				<!-- Daycare Details -->
				<div class="d-flex p-3 position-relative flex-column align-items-center">

					<!-- Floating Buttons -->
					<div class="ppo-floating-icons" style="margin-right:10px;">

						<?php ppo_heart_icon( $daycare, $user ); ?>

						<!-- Star -->
						<button class="border-0 bg-transparent p-0 w-auto" data-bs-toggle="modal" data-bs-target="#ppoModal">
							<img src="<?php echo esc_url($star_icon); ?>" style="width:32px;" />
						</button>
					</div>

					<!-- Profile Image -->
					<img src="<?php echo ppo_get_user_avatar($id); ?>" class="d-block w-75 shadow mb-4 ppo-br-8" alt="<?php echo esc_attr($display_name); ?>">

					<!-- Location -->
					<div class="d-flex py-2 w-100 ppo-br-16 align-content-center justify-content-center mb-3 ppo-bg-secondary">
						<img src="<?php echo ppo_get_dir('/assets/images/profile/location-outline.png') ?>" style="height:20px;width:auto;" class="mx-2  my-auto ppo-br-0" />
						<span class="text-white fs-5">
							<?php echo $address; ?>
						</span>
					</div>

					<!-- Date -->
					<div class="d-flex py-2 w-100 ppo-br-16 align-content-center mb-3 justify-content-center ppo-bg-secondary">
						<img src="<?php echo ppo_get_dir('/assets/images/home/timetable.png') ?>" style="height:20px;width:auto;" class="mx-2 my-auto ppo-br-0" />
						<span class="text-white fs-5">
							Ledig: Nu
						</span>
					</div>

					<form action="<?php echo esc_url( home_url('/profile-daycare/') ); ?>" method="post">
						<input type="hidden" id="ppo_daycare_user_id" value="<?php echo esc_attr( $id ); ?>" name="ppo_daycare_user_id">
						<input type="hidden" id="ppo_parent_page_link" value="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>" name="ppo_parent_page_link">
						<button type="submit" class="btn py-1 w-100 ppo-br-16 ppo-accent-button">
							<span class="text-light fs-5 ml-4 mb-2">
								Læs mere
							</span>
						</button>
					</form>

				</div>

			</div>

		</div>

	<?php endforeach; ?>

<?php endif; ?>