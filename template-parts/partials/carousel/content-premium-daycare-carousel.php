<?php
$user = wp_get_current_user();
$daycares = ppo_get_premium_daycares(); //  ppo_get_daycares();
// print_r(count($daycares));
?>

<!-- Premium PPO'er -->
<div class="row mb-4 py-2">

    <div id="carouselHome" class="carousel carousel-dark slide" data-bs-ride="carousel"  style="cursor: url('https://niloyrudra.com/prototype/wp-content/themes/find-dinppo/assets/images/cursor/swipe.cur') 0 0, grab;">

        <?php if (is_array($daycares) && count($daycares)) :
            $iterate = 0;
        ?>

            <div class="carousel-inner">

                <?php foreach ($daycares as $daycare) : ?>
                    <?php
                    $id = $daycare->ID;
                    $display_name = $daycare->display_name;
					$subscription_plan = ppo_get_daycare_subscription_plan($id);
// 				echo $subscription_plan . "\n\n";
					$address = ppo_get_daycare_address($id);
                    ?>

                    <!-- <div class="carousel-item active" data-bs-interval="100000000"> -->
                    <div class="carousel-item <?php echo ($iterate == 0 ? ' active' : ''); ?>">

                        <div class="flex-column position-relative">

                            <h3 class="text-capitalize w-100 text-light fs-5 fw-bold ppo-box-shadow ppo-br-16 py-2 px-3 ppo-bg-secondary"><?php echo esc_html($display_name); ?></h3>

                            <div class="d-flex p-3 flex-column w-100">

                                <!-- Floating Buttons -->
                                <div class="ppo-floating-icons me-3">
                                    <!-- Heart -->
                                    <div class="border-0 bg-transparent p-0 w-auto">
                                        <img src="<?php echo ppo_get_dir("/assets/images/profile/heart-outline.png") ?>" style="width:32px;" class="ppo-not-liked" />
                                        <!-- <img src="<?php echo ppo_get_dir("/assets/images/heart-fill.png") ?>" style="width:32px;display:none;" class="ppo-liked" /> -->
                                    </div>

                                    <!-- Star -->
                                    <div class="border-0 bg-transparent p-0 w-auto">
                                        <img src="<?php echo ppo_get_subscription_plan_icon( $subscription_plan ); ?>" style="width:32px;" />
                                    </div>
                                </div>

								<!-- Profile Pic -->
                                <img src="<?php echo ppo_get_user_avatar($id); ?>" class="d-block w-75 shadow my-3" alt="<?php echo esc_attr($display_name); ?>">

                                <div class="d-flex py-1 w-100 ppo-br-16 align-content-center justify-content-center mb-3 ppo-bg-secondary">
                                    <img src="<?php echo ppo_get_dir('/assets/images/profile/location-outline.png') ?>" style="width:20px;" class="mx-2 ppo-br-0" />
                                    <span class="text-light fs-5">
                                        <?php echo $address; ?>
                                    </span>
                                </div>

                                <div class="d-flex py-1 w-100 ppo-br-16 align-content-center mb-3 justify-content-center ppo-bg-secondary">
                                    <img src="<?php echo ppo_get_dir('/assets/images/home/timetable.png') ?>" style="width:20px;" class="mx-2 ppo-br-0" />
                                    <span class="text-light fs-5">
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

                <?php
                    $iterate++;
                endforeach;
                ?>

            </div>

        <?php endif; ?>

    </div>

</div>